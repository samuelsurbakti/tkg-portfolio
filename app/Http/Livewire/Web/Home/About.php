<?php

namespace App\Http\Livewire\Web\Home;

use App\Models\PersonalInformation;
use App\Models\Profession;
use App\Models\Statistic;
use Livewire\Component;

class About extends Component
{
    public $pi, $statistics, $profession;

    protected $listeners = [
        're_render_about_section' => 're_render_about_section',
    ];

    public function re_render_about_section()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
        $this->pi = PersonalInformation::first();
        $this->statistics = Statistic::orderByTranslation('label')->get();
        $this->profession = Profession::where('is_title', true)->first();
    }

    public function render()
    {
        return view('livewire.web.home.about');
    }
}
