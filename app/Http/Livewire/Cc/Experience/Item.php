<?php

namespace App\Http\Livewire\Cc\Experience;

use Livewire\Component;
use App\Models\Experience;

class Item extends Component
{
    public $experience;
    public $language;

    protected function getListeners() {
        return [
            "refresh_experience_component{$this->experience->id}" => '$refresh',
            "set_language{$this->experience->id}" => 'set_language'
        ];
    }

    public function set_language()
    {
        $this->language = ($this->language == 'id' ? 'en' : 'id');
    }

    public function mount($experience)
    {
        $this->experience = Experience::findOrFail($experience->id);
        $this->language = app()->getLocale();
    }

    public function render()
    {
        return view('livewire.cc.experience.item');
    }
}
