<?php

namespace App\Http\Livewire\Web\Home;

use App\Models\Client;
use Livewire\Component;

class Testimonial extends Component
{
    public $testimonials;

    protected $listeners = [
        're_render_testimonial_section' => 're_render_testimonial_section',
    ];

    public function re_render_testimonial_section()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
        $this->testimonials = Client::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.web.home.testimonial');
    }
}
