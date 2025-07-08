<?php

namespace App\Http\Livewire\Web\Home;

use App\Models\Work;
use App\Models\Work\Category;
use Livewire\Component;

class Portfolio extends Component
{
    public $portfolios, $categories;

    protected $listeners = [
        're_render_portfolio_section' => 're_render_portfolio_section',
    ];

    public function re_render_portfolio_section()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
        $this->portfolios = Work::orderByDesc('date')->get();
        $this->categories = Category::orderByTranslation('name')->get();
    }

    public function render()
    {
        return view('livewire.web.home.portfolio');
    }
}
