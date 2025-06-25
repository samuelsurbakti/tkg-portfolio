<?php

namespace App\Http\Livewire\Cc\Education;

use App\Models\Education;
use Livewire\Component;

class Item extends Component
{
    public $education;
    public $language;

    protected function getListeners() {
        return [
            "refresh_education_component{$this->education->id}" => '$refresh',
            "set_language{$this->education->id}" => 'set_language'
        ];
    }

    public function set_language()
    {
        $this->language = ($this->language == 'id' ? 'en' : 'id');
    }

    public function mount($education)
    {
        $this->education = Education::findOrFail($education->id);
        $this->language = app()->getLocale();
    }

    public function render()
    {
        return view('livewire.cc.education.item');
    }
}
