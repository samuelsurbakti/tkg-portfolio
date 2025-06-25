<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StarterSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ClientTranslationsTableSeeder::class);
        $this->call(EducationsTableSeeder::class);
        $this->call(EducationTranslationsTableSeeder::class);
        $this->call(ExperiencesTableSeeder::class);
        $this->call(ExperienceTranslationsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(ServiceTranslationsTableSeeder::class);
    }
}
