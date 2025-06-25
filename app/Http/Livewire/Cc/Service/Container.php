<?php

namespace App\Http\Livewire\Cc\Service;

use App\Models\Service;
use Livewire\Component;

class Container extends Component
{
    public $services;

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
        $this->services = Service::orderByTranslation('name')->get();
    }

    public function render()
    {
        return view('livewire.cc.service.container');
    }
}
