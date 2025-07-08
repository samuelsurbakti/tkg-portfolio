<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $avatar = md5('Sammy');
        Avatar::create('Sammy')->save(storage_path('app/src/img/user/'.$avatar.'.png'), $quality = 100);

        $dev = User::create([
            'name' => 'Sammy',
            'username' => 'sammy',
            'email' => 'sammysurbakti@gmail.com',
            'password' => bcrypt('sammy'),
            'avatar' => $avatar.'.png',
            'account_status' => '1',
        ]);

        $dev->assignRole('Developer');

        $avatar_k = md5('Kawal Gurusinga');
        Avatar::create('Kawal Gurusinga')->save(storage_path('app/src/img/user/'.$avatar_k.'.png'), $quality = 100);

        $owner = User::create([
            'name' => 'Kawal Gurusinga',
            'username' => 'kawalgurusinga',
            'email' => 'gurusingakawal@gmail.com',
            'password' => bcrypt('Anjingkau@123'),
            'avatar' => $avatar_k.'.png',
            'account_status' => '1',
        ]);

        $owner->assignRole('Owner');
    }
}
