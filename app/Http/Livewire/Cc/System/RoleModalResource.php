<?php

namespace App\Http\Livewire\Cc\System;

use Livewire\Component;
use App\Models\RaP\Role;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class RoleModalResource extends Component
{
    use LivewireAlert;

    public $role_id, $role_name;

    protected $listeners = [
        'set_role' => 'set_role',
        'reset_role' => 'reset_role'
    ];

    protected $rules = [
        'role_name' => 'required|string',
    ];

    protected $validationAttributes = [
        'role_name' => 'Nama',
    ];

    public function reset_role()
    {
        $this->reset(['role_id', 'role_name']);
    }

    public function set_role($role_id)
    {
        $this->role_id = $role_id;

        $role = Role::where('uuid', $this->role_id)->first();

        $this->role_name = $role->name;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        if(is_null($this->role_id)) {
            $role = Role::create([
                'name' => $this->role_name,
                'guard_name' => 'web',
            ]);
        } else {
            $role = Role::where('uuid', $this->role_id)->first();

            $role->update([
                'name' => $this->role_name,
            ]);
        }

        $this->emit('re_render_role_container');
        $this->emit("refresh_role_component{$role->uuid}");
        $this->emit('close_modal_role_resource');

        $this->alert('success', '', [
            'position' => 'bottom-end',
            'text' => 'Berhasil '.(is_null($this->role_id) ? 'menambah' : 'mengubah').' Peran',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->reset(['role_id', 'role_name']);
    }

    public function render()
    {
        return view('livewire.cc.system.role-modal-resource');
    }
}
