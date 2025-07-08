<?php

namespace App\Http\Livewire\Web\Home;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use Livewire\Component;

class Summary extends Component
{
    public $educations, $experiences, $skills;

    protected $listeners = [
        're_render_summary_section' => 're_render_summary_section',
    ];

    public function re_re_render_summary_sectionrender_service_section()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
        $this->educations = Education::orderBy('initial')->get();
        $this->experiences = Experience::orderBy('initial')->get();
        $this->skills = Skill::orderByTranslation('name')->get();
    }



    public function render()
    {
        return view('livewire.web.home.summary');
    }
}
