<?php

namespace App\Http\Livewire\Cc\Experience;

use Livewire\Component;
use App\Models\Experience;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ModalResource extends Component
{
    use LivewireAlert;

    public $experience_id, $experience_initial, $experience_end;
    public $experience_tr_id_institution, $experience_tr_id_position, $experience_tr_id_description, $experience_tr_en_institution, $experience_tr_en_position, $experience_tr_en_description;

    protected $listeners = [
        'set_experience' => 'set_experience',
        'set_experience_field' => 'set_experience_field',
        'ask_to_delete_experience' => 'ask_to_delete_experience',
        'delete_experience' => 'delete_experience',
        'reset_experience' => 'reset_experience',
    ];

    function rules() {
        return [
            'experience_initial' => 'required|digits:4|numeric|min:1900|max:' . date('Y'),
            'experience_end' => 'required|digits:4|numeric|min:1900|max:' . date('Y'),

            'experience_tr_id_institution' => 'required|string',
            'experience_tr_id_position' => 'required|string',
            'experience_tr_id_description' => 'nullable|string',
            'experience_tr_en_institution' => 'required|string',
            'experience_tr_en_position' => 'required|string',
            'experience_tr_en_description' => 'nullable|string',
        ];
    }

    protected $validationAttributes = [
        'experience_initial' => 'Tahun Mulai',
        'experience_end' => 'Tahun Selesai',

        'experience_tr_id_institution' => 'Institusi (id)',
        'experience_tr_id_position' => 'Posisi (id)',
        'experience_tr_id_description' => 'Keterangan (id)',
        'experience_tr_en_institution' => 'Institusi (en)',
        'experience_tr_en_position' => 'Posisi (en)',
        'experience_tr_en_description' => 'Keterangan (en)',
    ];

    public function hydrate()
    {
        $this->dispatchBrowserEvent('render-select2');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_experience_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_experience()
    {
        $this->reset(['experience_id', 'experience_initial', 'experience_end', 'experience_tr_id_institution', 'experience_tr_id_position', 'experience_tr_id_description', 'experience_tr_en_institution', 'experience_tr_en_position', 'experience_tr_en_description']);
    }

    public function set_experience($experience_id)
    {
        $this->reset(['experience_id', 'experience_initial', 'experience_end', 'experience_tr_id_institution', 'experience_tr_id_position', 'experience_tr_id_description', 'experience_tr_en_institution', 'experience_tr_en_position', 'experience_tr_en_description']);
        $this->experience_id = $experience_id;

        $experience = Experience::findOrFail($this->experience_id);

        $this->experience_initial = $experience->initial;
        $this->experience_end = $experience->end;
        $this->experience_tr_id_institution = $experience->translate('id')->institution;
        $this->experience_tr_id_position = $experience->translate('id')->position;
        $this->experience_tr_id_description = $experience->translate('id')->description;
        $this->experience_tr_en_institution = $experience->translate('en')->institution;
        $this->experience_tr_en_position = $experience->translate('en')->position;
        $this->experience_tr_en_description = $experience->translate('en')->description;
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
            'initial' => $this->experience_initial,
            'end' => $this->experience_end,
            'id' => [
                'institution' => $this->experience_tr_id_institution,
                'position' => $this->experience_tr_id_position,
                'description' => $this->experience_tr_id_description,
            ],
            'en' => [
                'institution' => $this->experience_tr_en_institution,
                'position' => $this->experience_tr_en_position,
                'description' => $this->experience_tr_en_description,
            ]
        ];

        if(is_null($this->experience_id)) {
            $experience = Experience::create($data);

            $this->emit('re_render_container');
        } else {
            $experience = Experience::findOrFail($this->experience_id);
            $experience->update($data);

            $this->emit("refresh_experience_component{$experience->id}");
        }

        $this->emit('close_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->experience_id) ? 'menambah' : 'mengubah').' pengalaman',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['experience_id', 'experience_initial', 'experience_end', 'experience_tr_id_institution', 'experience_tr_id_position', 'experience_tr_id_description', 'experience_tr_en_institution', 'experience_tr_en_position', 'experience_tr_en_description']);
    }

    public function ask_to_delete_experience($experience_id)
    {
        $this->experience_id = $experience_id;
        $experience = Experience::find($this->experience_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus pengalaman pada institusi '.$experience->translate('id')->institution.', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_experience'
        ]);
    }

    public function delete_experience()
    {
        $experience = Experience::find($this->experience_id);

        if($experience) {
            $experience->delete();

            $this->emit('re_render_container');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus pengalaman',
            ]);

            $this->reset(['experience_id', 'experience_initial', 'experience_end', 'experience_tr_id_institution', 'experience_tr_id_position', 'experience_tr_id_description', 'experience_tr_en_institution', 'experience_tr_en_position', 'experience_tr_en_description']);
        }
    }

    public function render()
    {
        return view('livewire.cc.experience.modal-resource');
    }
}
