<?php

namespace App\Http\Livewire\Cc\Home\Statistic;

use Livewire\Component;
use App\Models\Statistic;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ModalResource extends Component
{
    use LivewireAlert;

    public $statistic_id, $statistic_amount, $statistic_with_plus = false;
    public $statistic_tr_id_label, $statistic_tr_en_label;

    protected $listeners = [
        'set_statistic' => 'set_statistic',
        'set_statistic_field' => 'set_statistic_field',
        'ask_to_delete_statistic' => 'ask_to_delete_statistic',
        'delete_statistic' => 'delete_statistic',
        'reset_statistic' => 'reset_statistic',
    ];

    function rules() {
        return [
            'statistic_amount' => [
                'required',
                'numeric', // Bisa berupa integer atau float
                'min:0',   // Jumlah statistik biasanya tidak negatif
                'max:99999999999', // Batas maksimal yang sangat besar, sesuaikan jika perlu
            ],
            'statistic_with_plus' => [
                'boolean', // Harusnya true/false
            ],
            'statistic_tr_id_label' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'statistic_tr_en_label' => [
                'nullable', // Opsional
                'string',
                'min:3',
                'max:100',
            ],
        ];
    }

    protected $validationAttributes = [
        'statistic_amount' => 'Jumlah Statistik',
        'statistic_with_plus' => 'Tanda Plus Statistik',
        'statistic_tr_id_label' => 'Label Statistik (Bahasa Indonesia)',
        'statistic_tr_en_label' => 'Label Statistik (Bahasa Inggris)',
    ];

    public function hydrate()
    {
        // $this->dispatchBrowserEvent('render-select2');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function set_statistic_field($field, $value)
    {
        $this->$field = $value;
        $this->validateOnly($field);
    }

    public function reset_statistic()
    {
        $this->reset(['statistic_id', 'statistic_amount', 'statistic_with_plus', 'statistic_tr_id_label', 'statistic_tr_en_label']);
    }

    public function set_statistic($statistic_id)
    {
        $this->reset(['statistic_id', 'statistic_amount', 'statistic_with_plus', 'statistic_tr_id_label', 'statistic_tr_en_label']);
        $this->statistic_id = $statistic_id;

        $statistic = Statistic::findOrFail($this->statistic_id);

        $this->statistic_amount = $statistic->amount;
        $this->statistic_with_plus = $statistic->with_plus;
        $this->statistic_tr_id_label = $statistic->translate('id')->label;
        $this->statistic_tr_en_label = $statistic->translate('en')->label;
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
            'amount' => $this->statistic_amount,
            'with_plus' => $this->statistic_with_plus,
            'id' => [
                'label' => $this->statistic_tr_id_label,
            ],
            'en' => [
                'label' => $this->statistic_tr_en_label,
            ]
        ];

        if(is_null($this->statistic_id)) {
            $statistic = Statistic::create($data);
        } else {
            $statistic = Statistic::findOrFail($this->statistic_id);
            $statistic->update($data);
        }

        $this->emit('close_statistic_modal_resource');

        $this->alert('success', '', [
            'text' => 'Berhasil '.(is_null($this->statistic_id) ? 'menambah' : 'mengubah').' statistik',
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['statistic_id', 'statistic_amount', 'statistic_with_plus', 'statistic_tr_id_label', 'statistic_tr_en_label']);
    }

    public function ask_to_delete_statistic($statistic_id)
    {
        $this->statistic_id = $statistic_id;
        $statistic = Statistic::find($this->statistic_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus statistik '.$statistic->translate('id')->name.', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_statistic'
        ]);
    }

    public function delete_statistic()
    {
        $statistic = Statistic::find($this->statistic_id);

        if($statistic) {
            $statistic->delete();

            $this->emit('close_statistic_modal_resource');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus statistik',
            ]);

            $this->reset(['statistic_id', 'statistic_amount', 'statistic_with_plus', 'statistic_tr_id_label', 'statistic_tr_en_label']);
        }
    }

    public function render()
    {
        return view('livewire.cc.home.statistic.modal-resource');
    }
}
