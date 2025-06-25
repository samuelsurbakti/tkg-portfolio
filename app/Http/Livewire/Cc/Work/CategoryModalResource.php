<?php

namespace App\Http\Livewire\Cc\Work;

use Livewire\Component;
use App\Models\Work\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Stichoza\GoogleTranslate\GoogleTranslate;

class CategoryModalResource extends Component
{
    use LivewireAlert;

    public $wc_id, $wc_tr_id_name, $wc_tr_en_name;

    protected $listeners = [
        'set_wc' => 'set_wc',
        'set_wc_field' => 'set_wc_field',
        'ask_to_delete_wc' => 'ask_to_delete_wc',
        'delete_wc' => 'delete_wc',
        'reset_wc' => 'reset_wc',
    ];

    function rules() {
        return [
            'wc_tr_id_name' => 'required|string',
            'wc_tr_en_name' => 'required|string',
        ];
    }

    protected $validationAttributes = [
        'wc_tr_id_name' => 'Nama (id)',
        'wc_tr_en_name' => 'Nama (en)',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_wc_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_wc()
    {
        $this->reset(['wc_id', 'wc_tr_id_name', 'wc_tr_en_name']);
    }

    public function set_wc($wc_id)
    {
        $this->reset(['wc_id', 'wc_tr_id_name', 'wc_tr_en_name']);
        $this->wc_id = $wc_id;

        $wc = Category::findOrFail($this->wc_id);

        $this->wc_tr_id_name = $wc->translate('id')->name;
        $this->wc_tr_en_name = $wc->translate('en')->name;
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
            'id' => [
                'name' => $this->wc_tr_id_name,
            ],
            'en' => [
                'name' => $this->wc_tr_en_name,
            ]
        ];

        if(is_null($this->wc_id)) {
            $wc = Category::create($data);
        } else {
            $wc = Category::findOrFail($this->wc_id);
            $wc->update($data);
        }

        $this->emit('close_category_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->wc_id) ? 'menambah' : 'mengubah').' kategori pekerjaan',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['wc_id', 'wc_tr_id_name', 'wc_tr_en_name']);
    }

    public function ask_to_delete_wc($wc_id)
    {
        $this->wc_id = $wc_id;
        $wc = Category::find($this->wc_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus kategori pekerjaan '.$wc->translate('id')->name.', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_wc'
        ]);
    }

    public function delete_wc()
    {
        $wc = Category::find($this->wc_id);

        if($wc) {
            $wc->delete();

            $this->emit('category_table_reload');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus kategori pekerjaan',
            ]);

            $this->reset(['wc_id', 'wc_tr_id_name', 'wc_tr_en_name']);
        }
    }

    public function render()
    {
        return view('livewire.cc.work.category-modal-resource');
    }
}
