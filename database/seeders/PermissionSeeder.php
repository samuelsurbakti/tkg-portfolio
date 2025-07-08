<?php

namespace Database\Seeders;

use App\Models\Sys\Menu;
use App\Models\RaP\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu_number = 1;
        $global_permission = ['Layanan', 'Pendidikan', 'Pengalaman', 'Pekerjaan', 'Klien', 'Akun'];
        $exclude_delete_from_global = ['Akun'];

        foreach (Menu::orderBy('order_number')->get() as $menu) {
            Permission::create([
                'type' => 'Menu',
                'menu_id' => $menu->id,
                'name' => $menu->title,
                'guard_name' => 'web',
                'number' => $menu_number++,
            ]);

            $permission_number = 1;

            if(in_array($menu->title, $global_permission)) {
                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Melihat Data',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menambah Data',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Mengubah Data',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                if(!in_array($menu->title, $exclude_delete_from_global)) {
                    Permission::create([
                        'type' => 'Izin',
                        'menu_id' => $menu->id,
                        'name' => $menu->title.' - Menghapus Data',
                        'guard_name' => 'web',
                        'number' => $permission_number++,
                    ]);
                }
            }

            if($menu->title == 'Beranda') {
                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Melihat Informasi Pribadi',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Mengubah Informasi Pribadi',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Melihat Profesi',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menambah Profesi',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Mengubah Profesi',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menghapus Profesi',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Melihat Keahlian',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menambah Keahlian',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Mengubah Keahlian',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menghapus Keahlian',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Melihat Media Sosial',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menambah Media Sosial',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Mengubah Media Sosial',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menghapus Media Sosial',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Melihat Statistik',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menambah Statistik',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Mengubah Statistik',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menghapus Statistik',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);
            }

            if($menu->title == 'Sistem') {
                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Melihat Peran',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menambah Peran',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Mengubah Peran',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Melihat Izin',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menambah Izin',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Mengubah Izin',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Memberi Hak Akses',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);
            }

            if($menu->title == 'Akun') {
                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Mengubah Status Akun',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);
            }

            if($menu->title == 'Pekerjaan') {
                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menambah Foto Pekerjaan',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menghapus Foto Pekerjaan',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Melihat Kategori',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menambah Kategori',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Mengubah Kategori',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);

                Permission::create([
                    'type' => 'Izin',
                    'menu_id' => $menu->id,
                    'name' => $menu->title.' - Menghapus Kategori',
                    'guard_name' => 'web',
                    'number' => $permission_number++,
                ]);
            }
        }
    }
}
