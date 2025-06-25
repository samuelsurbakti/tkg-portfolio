<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EducationTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('education_translations')->delete();
        
        \DB::table('education_translations')->insert(array (
            0 => 
            array (
                'id' => '9f35c0fe-642c-46bb-a297-f61a12451892',
                'locale' => 'id',
                'education_id' => '9f35c0fd-dbcf-4386-ac75-985369cd30a7',
                'institution' => 'Universitas Methodist',
                'department' => 'Manajemen Ekonomi',
                'description' => 'Lulus cumlaude, aktif di organisasi mahasiswa & riset ekonomi, memperdalam analisis pasar & manajemen strategis.',
            ),
            1 => 
            array (
                'id' => '9f35c0fe-6ac7-45fe-9b56-4648a1d93b09',
                'locale' => 'en',
                'education_id' => '9f35c0fd-dbcf-4386-ac75-985369cd30a7',
                'institution' => 'Methodist University',
                'department' => 'Economic management',
                'description' => 'Graduating cumlaude, active in student organizations & economic research, deepening market analysis & strategic management.',
            ),
            2 => 
            array (
                'id' => '9f35d37d-1c6a-4a88-9ccc-30512b933054',
                'locale' => 'id',
                'education_id' => '9f35d37d-0ea4-4a2f-b119-67898b1c04a6',
                'institution' => 'Universitas Sumatra Utara',
                'department' => 'Magister Manajemen',
                'description' => 'Berhasil meraih gelar Magister Manajemen, fokus pada riset strategis dan pengembangan kepemimpinan. Aktif berkontribusi dalam studi kasus bisnis dan proyek konsultasi.',
            ),
            3 => 
            array (
                'id' => '9f35d37d-1f3a-4532-876c-931f34b17e5e',
                'locale' => 'en',
                'education_id' => '9f35d37d-0ea4-4a2f-b119-67898b1c04a6',
                'institution' => 'University of North Sumatra',
                'department' => 'Master of Management',
                'description' => 'Successfully earned a Master of Management, focusing on strategic research and leadership development. Actively contributing to business study studies and consultation projects.',
            ),
        ));
        
        
    }
}