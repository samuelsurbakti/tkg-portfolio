<?php

namespace Database\Seeders;

use App\Models\Sys\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu_no = 1;

        Menu::create([
            'title' => 'Beranda',
            'icon' => 'bx bx-home-alt',
            'url' => 'home',
            'source' => 'Home',
            'order_number' => $menu_no++,
            'parent' => null,
            'member_of' => null
        ]);

        Menu::create([
            'title' => 'Layanan',
            'icon' => 'bx bx-grid-search',
            'url' => 'service',
            'source' => 'Service',
            'order_number' => $menu_no++,
            'parent' => null,
            'member_of' => null
        ]);

        Menu::create([
            'title' => 'Pendidikan',
            'icon' => 'bx bx-education',
            'url' => 'education',
            'source' => 'Education',
            'order_number' => $menu_no++,
            'parent' => null,
            'member_of' => null
        ]);

        Menu::create([
            'title' => 'Pengalaman',
            'icon' => 'bx bx-history',
            'url' => 'experience',
            'source' => 'Experience',
            'order_number' => $menu_no++,
            'parent' => null,
            'member_of' => null
        ]);

        Menu::create([
            'title' => 'Pekerjaan',
            'icon' => 'bx bx-briefcase-alt-2',
            'url' => 'work',
            'source' => 'Work',
            'order_number' => $menu_no++,
            'parent' => null,
            'member_of' => null
        ]);

        Menu::create([
            'title' => 'Klien',
            'icon' => 'bx bx-people-handshake',
            'url' => 'client',
            'source' => 'Client',
            'order_number' => $menu_no++,
            'parent' => null,
            'member_of' => null
        ]);

        Menu::create([
            'title' => 'Akun',
            'icon' => 'bx bx-group',
            'url' => 'account',
            'source' => 'Account',
            'order_number' => $menu_no++,
            'parent' => null,
            'member_of' => null
        ]);

        Menu::create([
            'title' => 'Sistem',
            'icon' => 'bx bx-compare-alt',
            'url' => 'system',
            'source' => 'System',
            'order_number' => $menu_no++,
            'parent' => null,
            'member_of' => null
        ]);
    }
}
