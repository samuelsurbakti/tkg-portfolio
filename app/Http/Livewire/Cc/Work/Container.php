<?php

namespace App\Http\Livewire\Cc\Work;

use App\Models\Work;
use Livewire\Component;

class Container extends Component
{
    public $works;

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
        $this->works = Work::orderByDesc('date')->get();
    }

    public function render()
    {
        return view('livewire.cc.work.container');
    }
}
