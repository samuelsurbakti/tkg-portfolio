<?php

namespace App\Http\Livewire\Cc\Home\SocialMedia;

use App\Models\SocialMedia;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ModalResource extends Component
{
    use LivewireAlert;

    public $sm_id, $sm_name, $sm_icon_class, $sm_url;

    protected $listeners = [
        'set_sm' => 'set_sm',
        'set_sm_field' => 'set_sm_field',
        'ask_to_delete_sm' => 'ask_to_delete_sm',
        'delete_sm' => 'delete_sm',
        'reset_sm' => 'reset_sm',
    ];

    function rules() {
        return [
            'sm_name' => [
                'required',
                'string',
                'min:2',
                'max:50',
                // Contoh: Hanya huruf, angka, spasi, dan beberapa simbol umum untuk nama platform
                'regex:/^[a-zA-Z0-9\s\.\-_]+$/',
            ],
            'sm_icon_class' => [
                'required',
                'string',
                'min:2',
                'max:100',
                // Contoh: Hanya huruf, angka, spasi, titik, strip, underscore untuk nama kelas CSS
                'regex:/^[a-zA-Z0-9\s\.\-_]+$/',
            ],
            'sm_url' => [
                'required',
                'string',
                'url', // Memastikan formatnya adalah URL yang valid
                'max:255',
            ],
        ];
    }

    protected $validationAttributes = [
        'sm_name' => 'Nama Media Sosial',
        'sm_icon_class' => 'Kelas Ikon Media Sosial',
        'sm_url' => 'URL Media Sosial',
    ];

    public function hydrate()
    {
        // $this->dispatchBrowserEvent('render-select2');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_sm_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_sm()
    {
        $this->reset(['sm_id', 'sm_name', 'sm_icon_class', 'sm_url']);
    }

    public function set_sm($sm_id)
    {
        $this->reset(['sm_id', 'sm_name', 'sm_icon_class', 'sm_url']);
        $this->sm_id = $sm_id;

        $sm = SocialMedia::findOrFail($this->sm_id);

        $this->sm_name = $sm->name;
        $this->sm_icon_class = $sm->icon_class;
        $this->sm_url = $sm->url;
    }

    public function submit()
    {
        $this->validate();

        $data = [
            'name' => $this->sm_name,
            'icon_class' => $this->sm_icon_class,
            'url' => $this->sm_url,
        ];

        if(is_null($this->sm_id)) {
            $sm = SocialMedia::create($data);

            $this->emit('re_render_container');
        } else {
            $sm = SocialMedia::findOrFail($this->sm_id);
            $sm->update($data);
        }

        $this->emit('close_sm_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->sm_id) ? 'menambah' : 'mengubah').' media sosial',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['sm_id', 'sm_name', 'sm_icon_class', 'sm_url']);
    }

    public function ask_to_delete_sm($sm_id)
    {
        $this->sm_id = $sm_id;
        $sm = SocialMedia::find($this->sm_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus media sosial '.$sm->name.', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_sm'
        ]);
    }

    public function delete_sm()
    {
        $sm = SocialMedia::find($this->sm_id);

        if($sm) {
            $sm->delete();

            $this->emit('close_sm_modal_resource');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus media sosial',
            ]);

            $this->reset(['sm_id', 'sm_name', 'sm_icon_class', 'sm_url']);
        }
    }

    public function render()
    {
        return view('livewire.cc.home.social-media.modal-resource');
    }
}
