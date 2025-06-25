<?php

namespace App\Http\Livewire\Cc\Client;

use App\Models\Client;
use Livewire\Component;

class Item extends Component
{
    public $client;
    public $language;
    public $full_stars;
    public $has_half_star;
    public $empty_stars;

    protected function getListeners() {
        return [
            "refresh_client_component{$this->client->id}" => 'reset_client_component',
            "set_language{$this->client->id}" => 'set_language'
        ];
    }

    public function set_language()
    {
        $this->language = ($this->language == 'id' ? 'en' : 'id');
    }

    public function reset_client_component()
    {
        $this->mount($this->client);
        $this->render();
    }

    public function mount($client)
    {
        $this->client = Client::findOrFail($client->id);
        $this->language = app()->getLocale();
        $this->full_stars = floor($client->star);
        $this->has_half_star = ($client->star - $this->full_stars) >= 0.5;
        $this->empty_stars = 5 - $this->full_stars - ($this->has_half_star ? 1 : 0);
    }

    public function render()
    {
        return view('livewire.cc.client.item');
    }
}
