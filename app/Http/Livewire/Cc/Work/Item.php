<?php

namespace App\Http\Livewire\Cc\Work;

use App\Models\Work;
use Livewire\Component;

class Item extends Component
{
    public $work;
    public $language;

    protected function getListeners() {
        return [
            "refresh_work_component{$this->work->id}" => '$refresh',
            "set_language{$this->work->id}" => 'set_language'
        ];
    }

    public function set_language()
    {
        $this->language = ($this->language == 'id' ? 'en' : 'id');
    }

    public function mount($work)
    {
        $this->work = Work::findOrFail($work->id);
        $this->language = app()->getLocale();
    }

    public function render()
    {
        return view('livewire.cc.work.item');
    }
}
