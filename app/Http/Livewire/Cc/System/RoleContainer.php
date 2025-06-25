<?php

namespace App\Http\Livewire\Cc\System;

use Livewire\Component;
use App\Models\RaP\Role;

class RoleContainer extends Component
{
    public $roles;

    protected $listeners = [
        're_render_role_container' => 're_render_role_container',
    ];

    public function re_render_role_container()
    {
        $this->mount();
        $this->render();
    }

    public function mount()
    {
        $this->roles = (auth()->user()->getRoleNames()->first() == 'Developer' ? Role::withCount('users')->orderBy('name')->get() : Role::where('name', '!=', 'Developer')->orderBy('name')->withCount('users')->get());
    }

    public function render()
    {
        return view('livewire.cc.system.role-container');
    }
}
