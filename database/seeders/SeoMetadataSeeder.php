<?php

namespace Database\Seeders;

use App\Models\SeoMetadata;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeoMetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeoMetadata::create([
            'slug' => 'home',
            'title' => [
                'id' => 'Teguh Kawal Gurusinga - Ahli Konstruksi & Properti',
                'en' => 'Teguh Kawal Gurusinga - Construction & Property Specialist',
            ],
            'description' => [
                'id' => 'Portofolio profesional Teguh Kawal Gurusinga, berbasis di Medan, Indonesia.',
                'en' => 'Professional portfolio of Teguh Kawal Gurusinga, based in Medan, Indonesia.',
            ],
            'keywords' => [
                'id' => 'konstruksi, properti, profesional, teguh kawal',
                'en' => 'construction, property, professional, teguh kawal',
            ],
        ]);
    }
}
