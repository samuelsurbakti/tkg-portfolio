<?php

namespace App\Http\Livewire\Cc\System;

use Livewire\Component;
use App\Models\Sys\Menu;
use App\Models\RaP\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PermissionModalResource extends Component
{
    use LivewireAlert;

    public $types = [], $menus = [];
    public $permission_id, $permission_type, $permission_menu_id, $permission_name, $permission_number;

    protected $listeners = [
        'set_permission' => 'set_permission',
        'set_permission_field' => 'set_permission_field',
        'ask_to_delete_permission' => 'ask_to_delete_permission',
        'delete_permission' => 'delete_permission',
        'reset_permission' => 'reset_permission',
    ];

    protected $rules = [
        'permission_type' => 'required',
        'permission_menu_id' => 'required|string',
        'permission_name' => 'required|string',
        'permission_number' => 'required|numeric',
    ];

    protected $validationAttributes = [
        'permission_type' => 'Jenis',
        'permission_menu_id' => 'Menu',
        'permission_name' => 'Izin',
        'permission_number' => 'Urutan',
    ];

    public function hydrate()
    {
        $this->dispatchBrowserEvent('render-select2');
    }

    public function reset_permission()
    {
        $this->reset(['permission_id', 'permission_type', 'permission_menu_id', 'permission_name', 'permission_number']);
    }

    public function set_permission($permission_id)
    {
        $this->reset(['permission_id', 'permission_type', 'permission_menu_id', 'permission_name', 'permission_number']);
        $this->permission_id = $permission_id;
        $permission = Permission::where('uuid', $this->permission_id)->first();

        $this->emitSelf('set_permission_field', 'permission_type', $permission->type);
        $this->emitSelf('set_permission_field', 'permission_menu_id', $permission->menu_id);

        $this->permission_name = $permission->name;
        $this->permission_number = $permission->number;
    }

    public function set_permission_field($field, $value)
    {
        $this->$field = $value;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        if(is_null($this->permission_id)) {
            $menu = Permission::create([
                'type' => $this->permission_type,
                'menu_id' => $this->permission_menu_id,
                'name' => $this->permission_name,
                'guard_name' => 'web',
                'number' => $this->permission_number,
            ]);
        } else {
            $menu = Permission::findOrFail($this->permission_id);

            $menu->update([
                'type' => $this->permission_type,
                'menu_id' => $this->permission_menu_id,
                'name' => $this->permission_name,
                'guard_name' => 'web',
                'number' => $this->permission_number,
            ]);
        }

        $this->emit('close_modal_permission_resource');

        $this->alert('success', '', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
            'text' => 'Berhasil '.(is_null($this->permission_id) ? 'menambah' : 'mengubah').' Izin',
        ]);

        $this->reset(['permission_id', 'permission_type', 'permission_menu_id', 'permission_name', 'permission_number']);
    }

    public function ask_to_delete_permission($permission_id)
    {
        $this->permission_id = $permission_id;
        $permission = Permission::find($this->permission_id);
        $this->alert('question', 'Peringatan', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'text' => 'Perintah ini akan menghapus Izin '.$permission->name.', Anda yakin ingin melanjutkan?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Lanjutkan',
            'cancelButtonText' => 'Batalkan',
            'onConfirmed' => 'delete_permission'
        ]);
    }

    public function delete_permission()
    {
        $permission = Permission::find($this->permission_id);

        if($permission) {
            $permission->delete();

            $this->emit('close_modal_permission_resource');

            $this->alert('success', '', [
                'position' => 'bottom-end',
                'timer' => 3000,
                'toast' => true,
                'text' => 'Berhasil menghapus Izin',
            ]);

            $this->reset(['permission_id', 'permission_type', 'permission_menu_id', 'permission_name', 'permission_number']);
        }
    }

    public function mount()
    {
        $this->menus = Menu::orderBy('order_number')->get()->toArray();
        $this->types = ['Menu', 'Izin'];
    }

    public function render()
    {
        return view('livewire.cc.system.permission-modal-resource');
    }
}
