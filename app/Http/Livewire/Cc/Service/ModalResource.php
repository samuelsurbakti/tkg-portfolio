<?php

namespace App\Http\Livewire\Cc\Service;

use App\Models\Service;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ModalResource extends Component
{
    use LivewireAlert;

    public $service_id, $service_icon_class;
    public $service_tr_id_name, $service_tr_id_description, $service_tr_en_name, $service_tr_en_description;

    protected $listeners = [
        'set_service' => 'set_service',
        'set_service_field' => 'set_service_field',
        'ask_to_delete_service' => 'ask_to_delete_service',
        'delete_service' => 'delete_service',
        'reset_service' => 'reset_service',
    ];

    function rules() {
        return [
            'service_icon_class' => 'required|string',

            'service_tr_id_name' => 'required|string',
            'service_tr_id_description' => 'nullable|string',
            'service_tr_en_name' => 'required|string',
            'service_tr_en_description' => 'nullable|string',
        ];
    }

    protected $validationAttributes = [
        'service_icon_class' => 'Class Ikon',

        'service_tr_id_name' => 'Nama (id)',
        'service_tr_id_description' => 'Keterangan (id)',
        'service_tr_en_name' => 'Nama (en)',
        'service_tr_en_description' => 'Keterangan (en)',
    ];

    public function hydrate()
    {
        // $this->dispatchBrowserEvent('render-select2');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_service_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_service()
    {
        $this->reset(['service_id', 'service_icon_class', 'service_tr_id_name', 'service_tr_id_description', 'service_tr_en_name', 'service_tr_en_description']);
    }

    public function set_service($service_id)
    {
        $this->reset(['service_id', 'service_icon_class', 'service_tr_id_name', 'service_tr_id_description', 'service_tr_en_name', 'service_tr_en_description']);
        $this->service_id = $service_id;

        $service = Service::findOrFail($this->service_id);

        $this->service_icon_class = $service->icon_class;
        $this->service_tr_id_name = $service->translate('id')->name;
        $this->service_tr_id_description = $service->translate('id')->description;
        $this->service_tr_en_name = $service->translate('en')->name;
        $this->service_tr_en_description = $service->translate('en')->description;
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
            'icon_class' => $this->service_icon_class,
            'id' => [
                'name' => $this->service_tr_id_name,
                'description' => $this->service_tr_id_description,
            ],
            'en' => [
                'name' => $this->service_tr_en_name,
                'description' => $this->service_tr_en_description,
            ]
        ];

        if(is_null($this->service_id)) {
            $service = Service::create($data);

            $this->emit('re_render_container');
        } else {
            $service = Service::findOrFail($this->service_id);
            $service->update($data);

            $this->emit("refresh_service_component{$service->id}");
        }

        $this->emit('close_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->service_id) ? 'menambah' : 'mengubah').' layanan',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['service_id', 'service_icon_class', 'service_tr_id_name', 'service_tr_id_description', 'service_tr_en_name', 'service_tr_en_description']);
    }

    public function ask_to_delete_service($service_id)
    {
        $this->service_id = $service_id;
        $service = Service::find($this->service_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus layanan dengan nama '.$service->translate('id')->name.', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_service'
        ]);
    }

    public function delete_service()
    {
        $service = Service::find($this->service_id);

        if($service) {
            $service->delete();

            $this->emit('re_render_container');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus layanan',
            ]);

            $this->reset(['service_id', 'service_icon_class', 'service_tr_id_name', 'service_tr_id_description', 'service_tr_en_name', 'service_tr_en_description']);
        }
    }

    public function render()
    {
        return view('livewire.cc.service.modal-resource');
    }
}
