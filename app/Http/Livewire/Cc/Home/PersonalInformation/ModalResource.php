<?php

namespace App\Http\Livewire\Cc\Home\PersonalInformation;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PersonalInformation;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ModalResource extends Component
{
    use LivewireAlert, WithFileUploads;

    public $pi_id, $pi_name, $pi_photo, $pi_email, $pi_phone, $pi_photo_recent, $pi_whatsapp, $pi_dob, $pi_origin;
    public $pi_tr_id_story, $pi_tr_id_address, $pi_tr_en_story, $pi_tr_en_address;

    protected $listeners = [
        'set_pi' => 'set_pi',
        'set_pi_field' => 'set_pi_field',
    ];

    function rules() {
        return [
            // Data Pribadi (PI - Personal Information)
            'pi_name' => [
                'required',
                'string',
                'min:3',
                'max:100',
                // Hanya huruf, spasi, titik, dan apostrof
                'regex:/^[a-zA-Z\s\.\']+$/',
            ],
            'pi_photo' => [
                // Jika pi_id tidak ada (misal, buat baru), maka 'required'.
                // Jika pi_id ada (misal, edit), maka 'nullable'.
                // Saya asumsikan ada properti `$this->pi_id` untuk menentukan ini.
                is_null($this->pi_id) ? 'required' : 'nullable',
                'file',
                'mimes:jpg,jpeg,png,gif',
                'max:2048', // 2MB
                'dimensions:ratio=1/1'
            ],
            'pi_email' => [
                'required',
                'string',
                'email',
                'max:255', // Panjang standar untuk email
                // Contoh validasi unik. Sesuaikan dengan nama tabel dan kolom Anda.
                // Misalnya: 'unique:users,email'
                // Jika Anda mengedit data, Anda perlu mengecualikan ID saat ini:
                // 'unique:users,email,'.$this->pi_id
                // Untuk lebih spesifik: Rule::unique('users', 'email')->ignore($this->pi_id),
            ],
            'pi_phone' => [
                'required',
                'string',
                'min:8',
                'max:15',
                'regex:/^\+?\d{8,15}$/', // Hanya angka, bisa diawali '+'
            ],
            'pi_whatsapp' => [
                'required', // Opsional
                'string',
                'min:8',
                'max:15',
                'regex:/^\+?\d{8,15}$/', // Hanya angka, bisa diawali '+'
                // Contoh: WhatsApp tidak boleh sama dengan telepon jika keduanya diisi
                // 'different:pi_phone', // Gunakan jika Anda ingin mereka berbeda
            ],
            'pi_dob' => [
                'required',
                'date',
                'before_or_equal:today', // Tidak boleh tanggal di masa depan
                'after_or_equal:1900-01-01', // Contoh: Batasan tanggal paling tua
                // Contoh validasi umur minimal 17 tahun:
                // 'before_or_equal:' . now()->subYears(17)->format('Y-m-d'),
            ],
            'pi_origin' => [
                'required',
                'string',
                'max:100',
                'regex:/^[a-zA-Z\s\,]+$/', // Hanya huruf dan spasi
            ],

            // Data Terjemahan (TR - Translation)
            'pi_tr_id_story' => [
                'required',
                'string',
                'min:10',
                'max:5000',
            ],
            'pi_tr_id_address' => [
                'required',
                'string',
                'min:5',
                'max:500',
            ],
            'pi_tr_en_story' => [
                'required',
                'string',
                'min:10',
                'max:5000',
            ],
            'pi_tr_en_address' => [
                'required',
                'string',
                'min:5',
                'max:500',
            ],
        ];
    }

    protected $validationAttributes = [
        // Data Pribadi (PI - Personal Information)
        'pi_name' => 'Nama Lengkap',
        'pi_photo' => 'Foto Profil',
        'pi_email' => 'Email',
        'pi_phone' => 'Nomor Telepon',
        'pi_whatsapp' => 'Nomor WhatsApp',
        'pi_dob' => 'Tanggal Lahir',
        'pi_origin' => 'Asal',

        // Data Terjemahan (TR - Translation)
        'pi_tr_id_story' => 'Cerita (Bahasa Indonesia)',
        'pi_tr_id_address' => 'Alamat (Bahasa Indonesia)',
        'pi_tr_en_story' => 'Cerita (Bahasa Inggris)',
        'pi_tr_en_address' => 'Alamat (Bahasa Inggris)',
    ];

    public function hydrate()
    {
        $this->dispatchBrowserEvent('render-select2');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_pi_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_pi()
    {
        $this->reset(['pi_name', 'pi_photo', 'pi_email', 'pi_phone', 'pi_whatsapp', 'pi_dob', 'pi_origin', 'pi_tr_id_story', 'pi_tr_id_address', 'pi_tr_en_story', 'pi_tr_en_address']);
    }

    public function set_pi($pi_id)
    {
        $this->reset(['pi_name', 'pi_photo', 'pi_email', 'pi_phone', 'pi_whatsapp', 'pi_dob', 'pi_origin', 'pi_tr_id_story', 'pi_tr_id_address', 'pi_tr_en_story', 'pi_tr_en_address']);
        $this->pi_id = $pi_id;

        $pi = PersonalInformation::findOrFail($this->pi_id);

        $this->pi_name = $pi->name;
        $this->pi_photo_recent = $pi->photo;
        $this->pi_email = $pi->email;
        $this->pi_phone = $pi->phone;
        $this->pi_whatsapp = $pi->whatsapp;
        $this->emitSelf('set_pi_field', 'pi_dob', $pi->dob);
        $this->pi_origin = $pi->origin;
        $this->pi_tr_id_story = $pi->translate('id')->story;
        $this->pi_tr_id_address = $pi->translate('id')->address;
        $this->pi_tr_en_story = $pi->translate('en')->story;
        $this->pi_tr_en_address = $pi->translate('en')->address;
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

        if ($this->pi_photo) {
            $pi_photo_name = uniqid('U', true);
            $extension = $this->pi_photo->getClientOriginalExtension();
            $pi_photo_filename = $pi_photo_name . '.' . $extension;
            $this->pi_photo->storeAs('src/img/pi/', $pi_photo_filename);
        } else {
            $pi_photo_filename = $this->pi_photo_recent;
        }

        $data = [
            'name' => $this->pi_name,
            'photo' => $pi_photo_filename,
            'email' => $this->pi_email,
            'phone' => $this->pi_phone,
            'whatsapp' => $this->pi_whatsapp,
            'dob' => $this->pi_dob,
            'origin' => $this->pi_origin,

            'id' => [
                'story' => $this->pi_tr_id_story,
                'address' => $this->pi_tr_id_address,
            ],
            'en' => [
                'story' => $this->pi_tr_en_story,
                'address' => $this->pi_tr_en_address,
            ]
        ];

        if(is_null($this->pi_id)) {
            $pi = PersonalInformation::create($data);
        } else {
            $pi = PersonalInformation::findOrFail($this->pi_id);
            $pi->update($data);
        }

        $this->emit('re_render_pi_container');
        $this->emit('close_pi_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->pi_id) ? 'menambah' : 'mengubah').' informasi pribadi',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['pi_name', 'pi_photo', 'pi_email', 'pi_phone', 'pi_whatsapp', 'pi_dob', 'pi_origin', 'pi_tr_id_story', 'pi_tr_id_address', 'pi_tr_en_story', 'pi_tr_en_address']);
    }

    public function render()
    {
        return view('livewire.cc.home.personal-information.modal-resource');
    }
}
