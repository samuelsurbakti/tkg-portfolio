<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExperienceTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('experience_translations')->delete();
        
        \DB::table('experience_translations')->insert(array (
            0 => 
            array (
                'id' => '9f369bb7-6af0-4919-a241-84dc213e882e',
                'locale' => 'id',
                'experience_id' => '9f369bb6-f1bc-439e-935f-caac77e450dc',
                'institution' => 'Waskami Realty',
                'position' => 'Direktur',
                'description' => 'Memimpin Waskami Realty, mendorong pertumbuhan bisnis dan inovasi proyek properti. Fokus pada strategi pasar, peningkatan profitabilitas, dan pengembangan tim.',
            ),
            1 => 
            array (
                'id' => '9f369bb7-6d80-4980-a46d-6c06b78c1e7a',
                'locale' => 'en',
                'experience_id' => '9f369bb6-f1bc-439e-935f-caac77e450dc',
                'institution' => 'Waskami Realty',
                'position' => 'Director',
                'description' => 'Leading Waskami Realty, encouraging business growth and property project innovation. Focus on market strategies, increased profitability, and team development.',
            ),
            2 => 
            array (
                'id' => '9f369ce0-c719-4636-8da3-66852c9ccb06',
                'locale' => 'id',
                'experience_id' => '9f369ce0-b5b7-47c9-968e-04174c8798f1',
                'institution' => 'Waskami Realty',
                'position' => 'Direktur',
                'description' => 'Memimpin Waskami Realty, mendorong pertumbuhan bisnis dan inovasi proyek properti. Fokus pada strategi pasar, peningkatan profitabilitas, dan pengembangan tim.',
            ),
            3 => 
            array (
                'id' => '9f369ce0-c8e3-4f6d-b338-7c21cfa5416c',
                'locale' => 'en',
                'experience_id' => '9f369ce0-b5b7-47c9-968e-04174c8798f1',
                'institution' => 'Waskami Realty',
                'position' => 'Director',
                'description' => 'Leading Waskami Realty, encouraging business growth and property project innovation. Focus on market strategies, increased profitability, and team development.',
            ),
        ));
        
        
    }
}