<?php

namespace App\Http\Livewire\Web\Home;

use Livewire\Component;
use App\Models\PersonalInformation;
use App\Models\SocialMedia;

class Contact extends Component
{
    public $pi, $social_medias;

    protected $listeners = [
        're_render_contact_section' => 're_render_contact_section',
    ];

    public function re_render_contact_section()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
        $this->pi = PersonalInformation::first();
        $this->social_medias = SocialMedia::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.web.home.contact');
    }
}
