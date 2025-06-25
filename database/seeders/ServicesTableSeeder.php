<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => '9f3709ba-851f-4582-b002-4f7274f88b6d',
                'icon_class' => 'bxr  bx-wall',
                'created_at' => '2025-06-22 17:15:52',
                'updated_at' => '2025-06-22 17:31:49',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}