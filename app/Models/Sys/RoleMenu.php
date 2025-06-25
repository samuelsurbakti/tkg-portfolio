<?php

namespace App\Models\Sys;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleMenu extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'sys_role_has_menus';
    protected $fillable = ['role_id', 'menu_id'];

    public function get_menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
