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
        $this->call(PersonalInformationTableSeeder::class);
        $this->call(PersonalInformationTranslationsTableSeeder::class);
        $this->call(ProfessionsTableSeeder::class);
        $this->call(ProfessionTranslationsTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(SkillTranslationsTableSeeder::class);
        $this->call(SocialMediaTableSeeder::class);
        $this->call(StatisticsTableSeeder::class);
        $this->call(StatisticTranslationsTableSeeder::class);
        $this->call(WorkCategoriesTableSeeder::class);
        $this->call(WorkCategoryTranslationsTableSeeder::class);
        $this->call(WorkPhotosTableSeeder::class);
        $this->call(WorksTableSeeder::class);
        $this->call(WorkTranslationsTableSeeder::class);
        $this->call(SeoMetadataSeeder::class);
    }
}
