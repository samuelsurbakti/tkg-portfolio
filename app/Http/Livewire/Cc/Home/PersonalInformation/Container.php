<?php

namespace App\Http\Livewire\Cc\Home\PersonalInformation;

use App\Models\PersonalInformation;
use Livewire\Component;

class Container extends Component
{
    public $personal_information;

    protected $listeners = [
        're_render_pi_container' => 're_render_pi_container',
    ];

    public function re_render_pi_container()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
        $this->personal_information = PersonalInformation::first();
    }

    public function render()
    {
        return view('livewire.cc.home.personal-information.container');
    }
}
