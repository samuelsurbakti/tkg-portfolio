<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExperiencesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('experiences')->delete();
        
        \DB::table('experiences')->insert(array (
            0 => 
            array (
                'id' => '9f369bb6-f1bc-439e-935f-caac77e450dc',
                'initial' => '2024',
                'end' => '2025',
                'created_at' => '2025-06-22 12:08:15',
                'updated_at' => '2025-06-22 12:10:25',
                'deleted_at' => '2025-06-22 12:10:25',
            ),
            1 => 
            array (
                'id' => '9f369ce0-b5b7-47c9-968e-04174c8798f1',
                'initial' => '2023',
                'end' => '2025',
                'created_at' => '2025-06-22 12:11:30',
                'updated_at' => '2025-06-22 12:21:52',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}