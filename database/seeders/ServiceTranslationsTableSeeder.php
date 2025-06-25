<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_translations')->delete();
        
        \DB::table('service_translations')->insert(array (
            0 => 
            array (
                'id' => '9f3709ba-946f-43f2-a9ec-438f9d5d12cc',
                'locale' => 'id',
                'service_id' => '9f3709ba-851f-4582-b002-4f7274f88b6d',
                'name' => 'Pembangunan Rumah',
                'description' => 'Wujudkan rumah impian Anda bersama kami! Kami membangun dengan kualitas terbaik, desain inovatif, dan sesuai budget. Garansi kepuasan, bangun sekarang!',
            ),
            1 => 
            array (
                'id' => '9f3709ba-9722-43c4-8c40-71d293ea156b',
                'locale' => 'en',
                'service_id' => '9f3709ba-851f-4582-b002-4f7274f88b6d',
                'name' => 'Home Construction',
                'description' => 'Make your dream home with us! We build with the best quality, innovative design, and according to the budget. Satisfaction guarantee, wake up now!',
            ),
        ));
        
        
    }
}