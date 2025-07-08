<?php

namespace App\Http\Livewire\Web\Home;

use App\Models\Service as ModelsService;
use Livewire\Component;

class Service extends Component
{
    public $services;

    protected $listeners = [
        're_render_service_section' => 're_render_service_section',
    ];

    public function re_render_service_section()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
        $this->services = ModelsService::orderByTranslation('name')->get();
    }

    public function render()
    {
        return view('livewire.web.home.service');
    }
}
