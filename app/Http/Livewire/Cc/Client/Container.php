<?php

namespace App\Http\Livewire\Cc\Client;

use App\Models\Client;
use Livewire\Component;

class Container extends Component
{
    public $clients;

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
        $this->clients = Client::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.cc.client.container');
    }
}
