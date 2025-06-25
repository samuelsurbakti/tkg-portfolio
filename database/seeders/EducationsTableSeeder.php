<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EducationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('educations')->delete();
        
        \DB::table('educations')->insert(array (
            0 => 
            array (
                'id' => '9f35c0fd-dbcf-4386-ac75-985369cd30a7',
                'initial' => '2011',
                'end' => '2016',
                'created_at' => '2025-06-22 01:56:39',
                'updated_at' => '2025-06-22 11:03:49',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '9f35d37d-0ea4-4a2f-b119-67898b1c04a6',
                'initial' => '2021',
                'end' => '2023',
                'created_at' => '2025-06-22 02:48:22',
                'updated_at' => '2025-06-22 11:17:43',
                'deleted_at' => '2025-06-22 11:17:43',
            ),
        ));
        
        
    }
}