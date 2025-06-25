<?php

namespace App\Http\Livewire\Cc\Work;

use App\Models\Work;
use App\Models\Work\Category;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ModalResource extends Component
{
    use LivewireAlert;

    public $work_id, $work_category_id, $work_date;
    public $work_tr_id_title, $work_tr_id_info, $work_tr_en_title, $work_tr_en_info;
    public $categories = [];

    protected $listeners = [
        'set_work' => 'set_work',
        'set_work_field' => 'set_work_field',
        'ask_to_delete_work' => 'ask_to_delete_work',
        'delete_work' => 'delete_work',
        'reset_work' => 'reset_work',
    ];

    function rules() {
        return [
            'work_category_id' => 'required',
            'work_date' => 'required',

            'work_tr_id_title' => 'required|string',
            'work_tr_id_info' => 'required|string',
            'work_tr_en_title' => 'nullable|string',
            'work_tr_en_info' => 'required|string',
        ];
    }

    protected $validationAttributes = [
        'work_category_id' => 'Kategori',
        'work_date' => 'Tanggal',

        'work_tr_id_title' => 'Judul (id)',
        'work_tr_id_info' => 'Informasi (id)',
        'work_tr_en_title' => 'Judul (en)',
        'work_tr_en_info' => 'Informasi (en)',
    ];

    public function hydrate()
    {
        $this->dispatchBrowserEvent('render-select2');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_work_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_work()
    {
        $this->reset(['work_id', 'work_category_id', 'work_date', 'work_tr_id_title', 'work_tr_id_info', 'work_tr_en_title', 'work_tr_en_info']);
    }

    public function set_work($work_id)
    {
        $this->reset(['work_id', 'work_category_id', 'work_date', 'work_tr_id_title', 'work_tr_id_info', 'work_tr_en_title', 'work_tr_en_info']);
        $this->work_id = $work_id;

        $work = Work::findOrFail($this->work_id);

        $this->emitSelf('set_work_field', 'work_category_id', $work->category_id);
        $this->emitSelf('set_work_field', 'work_date', $work->date);
        $this->work_tr_id_title = $work->translate('id')->title;
        $this->work_tr_id_info = $work->translate('id')->info;
        $this->work_tr_en_title = $work->translate('en')->title;
        $this->work_tr_en_info = $work->translate('en')->info;
    }

    public function translate($locale, $ori_text, $target_field)
    {
        if($locale == 'id') {
            $source = 'id';
            $target = 'en';
        }

        if($locale == 'en') {
            $source = 'en';
            $target = 'id';
        }

        $trans_text = GoogleTranslate::trans($ori_text, $target, $source);

        $this->$target_field = $trans_text;
    }

    public function submit()
    {
        $this->validate();

        $data = [
            'category_id' => $this->work_category_id,
            'date' => $this->work_date,
            'id' => [
                'title' => $this->work_tr_id_title,
                'info' => $this->work_tr_id_info,
            ],
            'en' => [
                'title' => $this->work_tr_en_title,
                'info' => $this->work_tr_en_info,
            ]
        ];

        if(is_null($this->work_id)) {
            $work = Work::create($data);

            $this->emit('re_render_container');
        } else {
            $work = Work::findOrFail($this->work_id);
            $work->update($data);

            $this->emit("refresh_work_component{$work->id}");
        }

        $this->emit('close_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->work_id) ? 'menambah' : 'mengubah').' pekerjaan',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['work_id', 'work_category_id', 'work_date', 'work_tr_id_title', 'work_tr_id_info', 'work_tr_en_title', 'work_tr_en_info']);
    }

    public function ask_to_delete_work($work_id)
    {
        $this->work_id = $work_id;
        $work = Work::find($this->work_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus pekerjaan dengan judul '.$work->translate('id')->title.', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_work'
        ]);
    }

    public function delete_work()
    {
        $work = Work::find($this->work_id);

        if($work) {
            $work->delete();

            $this->emit('re_render_container');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus pekerjaan',
            ]);

            $this->reset(['work_id', 'work_category_id', 'work_date', 'work_tr_id_title', 'work_tr_id_info', 'work_tr_en_title', 'work_tr_en_info']);
        }
    }

    public function mount()
    {
        $this->categories = Category::orderByTranslation('name')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.cc.work.modal-resource');
    }
}
