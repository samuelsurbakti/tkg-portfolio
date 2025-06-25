<?php

namespace Database\Seeders;

use App\Models\RaP\Role;
use App\Models\Sys\Menu;
use App\Models\Sys\RoleMenu;
use App\Models\RaP\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dev = Role::where('name', 'Developer')->first();

        foreach (Menu::orderBy('order_number')->get() as $menu) {
            RoleMenu::create([
                'role_id' => $dev->uuid,
                'menu_id' => $menu->id
            ]);
        }

        foreach (Permission::orderBy('number')->get() as $permission) {
            $dev->givePermissionTo($permission->name);
        }
    }
}
