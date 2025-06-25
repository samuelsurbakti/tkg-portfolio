<?php

namespace App\Http\Livewire\Cc\Client;

use App\Models\Client;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ModalResource extends Component
{
    use LivewireAlert, WithFileUploads;

    public $client_id, $client_name, $client_photo, $client_photo_recent, $client_star;
    public $client_tr_id_description, $client_tr_id_testimonial, $client_tr_en_description, $client_tr_en_testimonial;

    protected $listeners = [
        'set_client' => 'set_client',
        'set_client_field' => 'set_client_field',
        'ask_to_delete_client' => 'ask_to_delete_client',
        'delete_client' => 'delete_client',
        'reset_client' => 'reset_client',
    ];

    function rules() {
        return [
            'client_name' => 'required|string',
            'client_photo' => [
                is_null($this->client_id) ? 'required' : 'nullable',
                'file',
                'mimes:jpg,png',
                'dimensions:ratio=1/1'
            ],
            'client_star' => 'required',

            'client_tr_id_description' => 'required|string',
            'client_tr_id_testimonial' => 'required|string',
            'client_tr_en_description' => 'required|string',
            'client_tr_en_testimonial' => 'required|string',
        ];
    }

    protected $validationAttributes = [
        'client_name' => 'Nama',
        'client_photo' => 'Foto',
        'client_star' => 'Rating',

        'client_tr_id_description' => 'Keterangan (id)',
        'client_tr_id_testimonial' => 'Testimoni (id)',
        'client_tr_en_description' => 'Keterangan (en)',
        'client_tr_en_testimonial' => 'Testimoni (en)',
    ];

    public function hydrate()
    {
        $this->dispatchBrowserEvent('render-raty');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_client_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_client()
    {
        $this->reset(['client_id', 'client_name', 'client_photo', 'client_photo_recent', 'client_star', 'client_tr_id_description', 'client_tr_id_testimonial', 'client_tr_en_description', 'client_tr_en_testimonial']);
    }

    public function set_client($client_id)
    {
        $this->reset(['client_id', 'client_name', 'client_photo', 'client_photo_recent', 'client_star', 'client_tr_id_description', 'client_tr_id_testimonial', 'client_tr_en_description', 'client_tr_en_testimonial']);
        $this->client_id = $client_id;

        $client = Client::findOrFail($this->client_id);

        $this->client_name = $client->name;
        $this->client_photo_recent = $client->photo;
        $this->client_star = $client->star;
        $this->client_tr_id_description = $client->translate('id')->description;
        $this->client_tr_id_testimonial = $client->translate('id')->testimonial;
        $this->client_tr_en_description = $client->translate('en')->description;
        $this->client_tr_en_testimonial = $client->translate('en')->testimonial;

        $this->dispatchBrowserEvent('update-rating', ['score' => floatval($this->client_star)]);
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

        if ($this->client_photo) {
            $client_photo_name = uniqid('U', true);
            $extension = $this->client_photo->getClientOriginalExtension();
            $client_photo_filename = $client_photo_name . '.' . $extension;
            $this->client_photo->storeAs('src/img/client/', $client_photo_filename);
        } else {
            $client_photo_filename = $this->client_photo_recent;
        }

        $data = [
            'name' => $this->client_name,
            'photo' => $client_photo_filename,
            'star' => $this->client_star,
            'id' => [
                'description' => $this->client_tr_id_description,
                'testimonial' => $this->client_tr_id_testimonial,
            ],
            'en' => [
                'description' => $this->client_tr_en_description,
                'testimonial' => $this->client_tr_en_testimonial,
            ]
        ];

        if(is_null($this->client_id)) {
            $client = Client::create($data);

            $this->emit('re_render_container');
        } else {
            $client = Client::findOrFail($this->client_id);
            $client->update($data);

            $this->emit("refresh_client_component{$client->id}");
        }

        $this->emit('close_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->client_id) ? 'menambah' : 'mengubah').' klien',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['client_id', 'client_name', 'client_photo', 'client_photo_recent', 'client_star', 'client_tr_id_description', 'client_tr_id_testimonial', 'client_tr_en_description', 'client_tr_en_testimonial']);
    }

    public function ask_to_delete_client($client_id)
    {
        $this->client_id = $client_id;
        $client = Client::find($this->client_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus klien dengan nama '.$client->name.', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_client'
        ]);
    }

    public function delete_client()
    {
        $client = Client::find($this->client_id);

        if($client) {
            $client->delete();

            $this->emit('re_render_container');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus klien',
            ]);

            $this->reset(['client_id', 'client_name', 'client_photo', 'client_photo_recent', 'client_star', 'client_tr_id_description', 'client_tr_id_testimonial', 'client_tr_en_description', 'client_tr_en_testimonial']);
        }
    }

    public function render()
    {
        return view('livewire.cc.client.modal-resource');
    }
}
