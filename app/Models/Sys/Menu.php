<?php

namespace App\Models\Sys;

use App\Models\RaP\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'sys_menus';
    protected $fillable = ['title', 'icon', 'url', 'source', 'order_number', 'parent', 'member_of'];

    public function get_parent()
    {
        return $this->belongsTo(Menu::class, 'parent');
    }

    public function get_child()
    {
        return $this->hasMany(Menu::class, 'parent')->orderBy('order_number');
    }

    public function get_role_for_menu()
    {
        return $this->hasMany(RoleMenu::class, 'menu_id');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'menu_id')->where('type', 'Izin')->orderBy('number', 'asc');
    }
}
