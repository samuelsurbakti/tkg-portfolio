<?php

namespace App\Http\Livewire\Cc\Work;

use App\Models\Work;
use Livewire\Component;
use App\Models\Work\Photo;
use Livewire\WithFileUploads;
use App\Services\ImageService;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PhotoModalResource extends Component
{
    use LivewireAlert, WithFileUploads;

    public $wp_id, $wp_work_id, $wp_photo;

    protected $listeners = [
        'set_wp_field' => 'set_wp_field',
        'ask_to_delete_wp' => 'ask_to_delete_wp',
        'delete_wp' => 'delete_wp',
        'reset_wp' => 'reset_wp',
    ];

    function rules() {
        return [
            'wp_work_id' => 'required',
            'wp_photo' => [
                'required',
                'file',
                'mimes:jpg,png'
            ],
        ];
    }

    protected $validationAttributes = [
        'wp_photo' => 'Foto',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_wp_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_wp()
    {
        $this->reset(['wp_id', 'wp_work_id', 'wp_photo']);
    }

    public function submit()
    {
        $this->validate();

        $wp_photo_filename = ImageService::storeWithWebp(
            $this->wp_photo,
            uniqid('WP', true),
            'src/img/work/',
            null
        );

        $data = [
            'work_id' => $this->wp_work_id,
            'photo' => $wp_photo_filename,
        ];

        $wp = Photo::create($data);

        $this->emit("refresh_work_component{$wp->work_id}");

        $this->emit('close_photo_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil menambah foto pekerjaan',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['wp_id', 'wp_work_id', 'wp_photo']);
    }

    public function ask_to_delete_wp($wp_id)
    {
        $this->wp_id = $wp_id;
        $wp = Photo::find($this->wp_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus foto pekerjaan, Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_wp'
        ]);
    }

    public function delete_wp()
    {
        $wp = Photo::find($this->wp_id);

        if($wp) {
            $wp->delete();

            $this->emit('re_render_container');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus foto pekerjaan',
            ]);

            $this->reset(['wp_id', 'wp_work_id', 'wp_photo']);
        }
    }

    public function render()
    {
        return view('livewire.cc.work.photo-modal-resource');
    }
}
