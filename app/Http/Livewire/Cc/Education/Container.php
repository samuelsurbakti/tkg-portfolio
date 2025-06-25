<?php

namespace App\Http\Livewire\Cc\Education;

use App\Models\Education;
use Livewire\Component;

class Container extends Component
{
    public $educations;

    protected $listeners = [
        're_render_container' => 're_render_container',
    ];

    public function re_render_container()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
        $this->educations = Education::orderBy('initial')->get();
    }

    public function render()
    {
        return view('livewire.cc.education.container');
    }
}
