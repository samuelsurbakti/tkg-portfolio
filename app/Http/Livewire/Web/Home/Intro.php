<?php

namespace App\Http\Livewire\Web\Home;

use Livewire\Component;
use App\Models\PersonalInformation;
use App\Models\Profession;

class Intro extends Component
{
    public $pi, $professions;

    protected $listeners = [
        're_render_intro_section' => 're_render_intro_section',
    ];

    public function re_render_intro_section()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
        $this->pi = PersonalInformation::first();
        $this->professions = Profession::orderByTranslation('name')->get();
    }

    public function render()
    {
        return view('livewire.web.home.intro');
    }
}
