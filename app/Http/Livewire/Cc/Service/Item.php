<?php

namespace App\Http\Livewire\Cc\Service;

use App\Models\Service;
use Livewire\Component;

class Item extends Component
{
    public $service;
    public $language;

    protected function getListeners() {
        return [
            "refresh_service_component{$this->service->id}" => '$refresh',
            "set_language{$this->service->id}" => 'set_language'
        ];
    }

    public function set_language()
    {
        $this->language = ($this->language == 'id' ? 'en' : 'id');
    }

    public function mount($service)
    {
        $this->service = Service::findOrFail($service->id);
        $this->language = app()->getLocale();
    }

    public function render()
    {
        return view('livewire.cc.service.item');
    }
}
