<?php

namespace App\Http\Livewire\Cc\Home\Skill;

use App\Models\Skill;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ModalResource extends Component
{
    use LivewireAlert;

    public $skill_id, $skill_percentage;
    public $skill_tr_id_name, $skill_tr_en_name;

    protected $listeners = [
        'set_skill' => 'set_skill',
        'set_skill_field' => 'set_skill_field',
        'ask_to_delete_skill' => 'ask_to_delete_skill',
        'delete_skill' => 'delete_skill',
        'reset_skill' => 'reset_skill',
    ];

    function rules() {
        return [
                'skill_percentage' => [
                'required',
                'integer',
                'min:0',
                'max:100',
            ],
            'skill_tr_id_name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],
            'skill_tr_en_name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],
        ];
    }

    protected $validationAttributes = [
        'skill_percentage' => 'Persentase Skill',
        'skill_tr_id_name' => 'Nama Skill (Bahasa Indonesia)',
        'skill_tr_en_name' => 'Nama Skill (Bahasa Inggris)',
    ];

    public function hydrate()
    {
        // $this->dispatchBrowserEvent('render-select2');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_skill_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_skill()
    {
        $this->reset(['skill_id', 'skill_percentage', 'skill_tr_id_name', 'skill_tr_en_name']);
    }

    public function set_skill($skill_id)
    {
        $this->reset(['skill_id', 'skill_percentage', 'skill_tr_id_name', 'skill_tr_en_name']);
        $this->skill_id = $skill_id;

        $skill = Skill::findOrFail($this->skill_id);

        $this->skill_percentage = $skill->percentage;
        $this->skill_tr_id_name = $skill->translate('id')->name;
        $this->skill_tr_en_name = $skill->translate('en')->name;
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
            'percentage' => $this->skill_percentage,
            'id' => [
                'name' => $this->skill_tr_id_name,
            ],
            'en' => [
                'name' => $this->skill_tr_en_name,
            ]
        ];

        if(is_null($this->skill_id)) {
            $skill = Skill::create($data);

            $this->emit('re_render_container');
        } else {
            $skill = Skill::findOrFail($this->skill_id);
            $skill->update($data);

            $this->emit("refresh_skill_component{$skill->id}");
        }

        $this->emit('close_skill_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->skill_id) ? 'menambah' : 'mengubah').' keahlian',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['skill_id', 'skill_percentage', 'skill_tr_id_name', 'skill_tr_en_name']);
    }

    public function ask_to_delete_skill($skill_id)
    {
        $this->skill_id = $skill_id;
        $skill = Skill::find($this->skill_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus keahlian '.$skill->translate('id')->name.', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_skill'
        ]);
    }

    public function delete_skill()
    {
        $skill = Skill::find($this->skill_id);

        if($skill) {
            $skill->delete();

            $this->emit('close_skill_modal_resource');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus keahlian',
            ]);

            $this->reset(['skill_id', 'skill_percentage', 'skill_tr_id_name', 'skill_tr_en_name']);
        }
    }

    public function render()
    {
        return view('livewire.cc.home.skill.modal-resource');
    }
}
