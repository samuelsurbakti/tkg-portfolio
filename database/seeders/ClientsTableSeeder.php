<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clients')->delete();
        
        \DB::table('clients')->insert(array (
            0 => 
            array (
                'id' => '9f36d9af-2ebd-4221-8854-393481685285',
                'name' => 'Alex Suprun',
                'photo' => 'U6857b85bbff935.45255254.jpg',
                'star' => 4.5,
                'created_at' => '2025-06-22 15:01:31',
                'updated_at' => '2025-06-22 16:15:52',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '9f36e26a-0d4b-4646-8037-3301530edda5',
                'name' => 'Nicolas Horn',
                'photo' => 'U6857be14732b53.67645934.jpg',
                'star' => 5.0,
                'created_at' => '2025-06-22 15:25:56',
                'updated_at' => '2025-06-22 16:17:33',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '9f36e51b-8a83-4079-a31c-9840fd99a2e7',
                'name' => 'Hannah Bussing',
                'photo' => 'U6857bfd8573d14.48588626.jpg',
                'star' => 4.5,
                'created_at' => '2025-06-22 15:33:28',
                'updated_at' => '2025-06-22 15:33:28',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}