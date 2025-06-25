<?php

namespace App\Http\Livewire\Cc\Education;

use Livewire\Component;
use App\Models\Education;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ModalResource extends Component
{
    use LivewireAlert;

    public $education_id, $education_initial, $education_end;
    public $education_tr_id_institution, $education_tr_id_department, $education_tr_id_description, $education_tr_en_institution, $education_tr_en_department, $education_tr_en_description;

    protected $listeners = [
        'set_education' => 'set_education',
        'set_education_field' => 'set_education_field',
        'ask_to_delete_education' => 'ask_to_delete_education',
        'delete_education' => 'delete_education',
        'reset_education' => 'reset_education',
    ];

    function rules() {
        return [
            'education_initial' => 'required|digits:4|numeric|min:1900|max:' . date('Y'),
            'education_end' => 'required|digits:4|numeric|min:1900|max:' . date('Y'),

            'education_tr_id_institution' => 'required|string',
            'education_tr_id_department' => 'required|string',
            'education_tr_id_description' => 'nullable|string',
            'education_tr_en_institution' => 'required|string',
            'education_tr_en_department' => 'required|string',
            'education_tr_en_description' => 'nullable|string',
        ];
    }

    protected $validationAttributes = [
        'education_initial' => 'Tahun Mulai',
        'education_end' => 'Tahun Selesai',

        'education_tr_id_institution' => 'Institusi (id)',
        'education_tr_id_department' => 'Jurusan (id)',
        'education_tr_id_description' => 'Keterangan (id)',
        'education_tr_en_institution' => 'Institusi (en)',
        'education_tr_en_department' => 'Jurusan (en)',
        'education_tr_en_description' => 'Keterangan (en)',
    ];

    public function hydrate()
    {
        $this->dispatchBrowserEvent('render-select2');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_education_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_education()
    {
        $this->reset(['education_id', 'education_initial', 'education_end', 'education_tr_id_institution', 'education_tr_id_department', 'education_tr_id_description', 'education_tr_en_institution', 'education_tr_en_department', 'education_tr_en_description']);
    }

    public function set_education($education_id)
    {
        $this->reset(['education_id', 'education_initial', 'education_end', 'education_tr_id_institution', 'education_tr_id_department', 'education_tr_id_description', 'education_tr_en_institution', 'education_tr_en_department', 'education_tr_en_description']);
        $this->education_id = $education_id;

        $education = Education::findOrFail($this->education_id);

        $this->education_initial = $education->initial;
        $this->education_end = $education->end;
        $this->education_tr_id_institution = $education->translate('id')->institution;
        $this->education_tr_id_department = $education->translate('id')->department;
        $this->education_tr_id_description = $education->translate('id')->description;
        $this->education_tr_en_institution = $education->translate('en')->institution;
        $this->education_tr_en_department = $education->translate('en')->department;
        $this->education_tr_en_description = $education->translate('en')->description;
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
            'initial' => $this->education_initial,
            'end' => $this->education_end,
            'id' => [
                'institution' => $this->education_tr_id_institution,
                'department' => $this->education_tr_id_department,
                'description' => $this->education_tr_id_description,
            ],
            'en' => [
                'institution' => $this->education_tr_en_institution,
                'department' => $this->education_tr_en_department,
                'description' => $this->education_tr_en_description,
            ]
        ];

        if(is_null($this->education_id)) {
            $education = Education::create($data);

            $this->emit('re_render_container');
        } else {
            $education = Education::findOrFail($this->education_id);
            $education->update($data);

            $this->emit("refresh_education_component{$education->id}");
        }

        $this->emit('close_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->education_id) ? 'menambah' : 'mengubah').' pendidikan',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['education_id', 'education_initial', 'education_end', 'education_tr_id_institution', 'education_tr_id_department', 'education_tr_id_description', 'education_tr_en_institution', 'education_tr_en_department', 'education_tr_en_description']);
    }

    public function ask_to_delete_education($education_id)
    {
        $this->education_id = $education_id;
        $education = Education::find($this->education_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus pendidikan pada institusi '.$education->translate('id')->institution.', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_education'
        ]);
    }

    public function delete_education()
    {
        $education = Education::find($this->education_id);

        if($education) {
            $education->delete();

            $this->emit('re_render_container');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus pendidikan',
            ]);

            $this->reset(['education_id', 'education_initial', 'education_end', 'education_tr_id_institution', 'education_tr_id_department', 'education_tr_id_description', 'education_tr_en_institution', 'education_tr_en_department', 'education_tr_en_description']);
        }
    }

    public function render()
    {
        return view('livewire.cc.education.modal-resource');
    }
}
