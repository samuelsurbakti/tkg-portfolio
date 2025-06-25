<?php

namespace App\Http\Livewire\Cc\Experience;

use App\Models\Experience;
use Livewire\Component;

class Container extends Component
{
    public $experiences;

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
        $this->experiences = Experience::orderBy('initial')->get();
    }

    public function render()
    {
        return view('livewire.cc.experience.container');
    }
}
