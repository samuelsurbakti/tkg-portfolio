<?php

namespace App\Http\Livewire\Cc\System;

use Livewire\Component;
use App\Models\RaP\Role;

class RoleList extends Component
{
    public $role;
    public $role_users_count;
    public $users = [];

    protected function getListeners() {
        return [
            "refresh_role_component{$this->role->uuid}" => '$refresh'
        ];
    }

    public function open_modal_hak_akses_resource()
    {
        $this->emit('role_edit', ['role_id' => $this->role->uuid]);
    }

    public function open_modal_hak_akses_izin()
    {
        $this->emit('role_permission_edit', ['role_id' => $this->role->uuid]);
    }

    public function mount($role)
    {
        $this->role = Role::where('uuid', $role->uuid)->withCount(['users'])->first();
        $this->role_users_count = $this->role->users_count;
        $this->users = $this->role->users;
    }

    public function render()
    {
        return view('livewire.cc.system.role-list');
    }
}
