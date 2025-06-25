<?php

namespace App\Http\Livewire\Cc\System;

use Livewire\Component;
use App\Models\RaP\Role;
use App\Models\Sys\Menu;
use Illuminate\Support\Str;
use App\Models\Sys\RoleMenu;
use App\Models\RaP\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ModalAuthorization extends Component
{
    use LivewireAlert;

    public $role, $menus;

    protected $listeners = [
        'set_authorization' => 'set_authorization',
    ];

    public function set_authorization($role_id)
    {
        $this->role = Role::where('uuid', $role_id)->first();
    }

    public function menu_switch($menu_id)
    {
        $menu = Menu::find($menu_id);
        $role = Role::find($this->role->uuid);
        $permission = Permission::where('menu_id', $menu_id)->where('type', 'Menu')->first();

        $status = (in_array($menu->id, $role->get_menu->pluck('menu_id')->toArray()) ? true : false);

        if($status) {
            $role_menu = RoleMenu::where('role_id', $this->role->uuid)->where('menu_id', $menu->id)->first();
            $role_menu->delete();
            $role->revokePermissionTo($permission->name);
        } else {
            RoleMenu::create([
                'role_id' => $this->role->uuid,
                'menu_id' => $menu->id,
            ]);
            $role->givePermissionTo($permission->name);
        }

        $this->emit('menu_switch_component', ['status' => $status, 'menu_id' => $menu->id]);

        $this->alert('success', '', [
            'position' => 'bottom-end',
            'text' => 'Berhasil '.($status ? 'menarik' : 'memberikan').' akses Menu '.$menu->title.' kepada '.$this->role->name,
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->emit('permission_table_reload');
    }

    public function permission_switch($permission)
    {
        $role = Role::find($this->role->uuid);

        $status = ($role->hasPermissionTo($permission) ? true : false);

        if($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
        } else {
            $role->givePermissionTo($permission);
        }

        if($status) {
            $role->revokePermissionTo($permission);
        } else {
            $role->givePermissionTo($permission);
        }

        $this->emit('permission_switch_component', ['status' => $status, 'permission_id' => Str::replace(' ', '', $permission)]);

        $this->alert('success', '', [
            'position' => 'bottom-end',
            'text' => 'Berhasil '.($status ? 'menarik' : 'memberikan').' akses Izin '.$permission.' kepada '.$this->role->name,
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->emit('permission_table_reload');
    }

    public function mount()
    {
        $this->role = [];
        $this->menus = Menu::orderBy('order_number', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.cc.system.modal-authorization');
    }
}
