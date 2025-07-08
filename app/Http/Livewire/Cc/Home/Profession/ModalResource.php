<?php

namespace App\Http\Livewire\Cc\Home\Profession;

use Livewire\Component;
use App\Models\Profession;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ModalResource extends Component
{
    use LivewireAlert;

    public $profession_id, $profession_is_title = false;
    public $profession_tr_id_name, $profession_tr_en_name;

    protected $listeners = [
        'set_profession' => 'set_profession',
        'set_profession_field' => 'set_profession_field',
        'ask_to_delete_profession' => 'ask_to_delete_profession',
        'delete_profession' => 'delete_profession',
        'reset_profession' => 'reset_profession',
    ];

    function rules() {
        return [
            'profession_is_title' => [
                'boolean',
            ],
            'profession_tr_id_name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],
            'profession_tr_en_name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],
        ];
    }

    protected $validationAttributes = [
        'profession_is_title' => 'Jadikan Judul Cerita',
        'profession_tr_id_name' => 'Nama Profesi (Bahasa Indonesia)',
        'profession_tr_en_name' => 'Nama Profesi (Bahasa Inggris)',
    ];

    public function hydrate()
    {
        // $this->dispatchBrowserEvent('render-select2');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_profession_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_profession()
    {
        $this->reset(['profession_id', 'profession_is_title', 'profession_tr_id_name', 'profession_tr_en_name']);
    }

    public function set_profession($profession_id)
    {
        $this->reset(['profession_id', 'profession_is_title', 'profession_tr_id_name', 'profession_tr_en_name']);
        $this->profession_id = $profession_id;

        $profession = Profession::findOrFail($this->profession_id);

        $this->profession_is_title = $profession->is_title;
        $this->profession_tr_id_name = $profession->translate('id')->name;
        $this->profession_tr_en_name = $profession->translate('en')->name;
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
            'is_title' => $this->profession_is_title,
            'id' => [
                'name' => $this->profession_tr_id_name,
            ],
            'en' => [
                'name' => $this->profession_tr_en_name,
            ]
        ];

        if(is_null($this->profession_id)) {
            $profession = Profession::create($data);

        } else {
            $profession = Profession::findOrFail($this->profession_id);
            $profession->update($data);
        }

        $this->emit('close_profession_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->profession_id) ? 'menambah' : 'mengubah').' profesi',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['profession_id', 'profession_is_title', 'profession_tr_id_name', 'profession_tr_en_name']);
    }

    public function ask_to_delete_profession($profession_id)
    {
        $this->profession_id = $profession_id;
        $profession = Profession::find($this->profession_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus profesi '.$profession->translate('id')->name.', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_profession'
        ]);
    }

    public function delete_profession()
    {
        $profession = Profession::find($this->profession_id);

        if($profession) {
            $profession->delete();

            $this->emit('close_profession_modal_resource');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus profesi',
            ]);

            $this->reset(['profession_id', 'profession_is_title', 'profession_tr_id_name', 'profession_tr_en_name']);
        }
    }

    public function render()
    {
        return view('livewire.cc.home.profession.modal-resource');
    }
}
