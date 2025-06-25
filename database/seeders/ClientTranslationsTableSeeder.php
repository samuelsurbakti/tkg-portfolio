<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('client_translations')->delete();
        
        \DB::table('client_translations')->insert(array (
            0 => 
            array (
                'id' => '9f36d9af-4052-4005-aee0-7d6b624125cf',
                'locale' => 'id',
                'client_id' => '9f36d9af-2ebd-4221-8854-393481685285',
                'description' => 'Pembeli rumah dari kota Medan',
                'testimonial' => 'Pengalaman jual rumah bersama bang Kawal sangat memuaskan! Beliau sangat profesional dan responsif, membantu kami di setiap langkah dari awal hingga akhir. Prosesnya cepat, transparan, dan harga yang didapat sesuai harapan. Sangat merekomendasikan layanan Bang Kawal untuk penjualan properti Anda!',
            ),
            1 => 
            array (
                'id' => '9f36d9af-4512-4c3f-a826-5599fcafbf5e',
                'locale' => 'en',
                'client_id' => '9f36d9af-2ebd-4221-8854-393481685285',
                'description' => 'Home buyers from the Medan City',
                'testimonial' => 'The experience of selling a house with brother Kawal is very satisfying! He is very professional and responsive, helping us at every step from beginning to end. The process is fast, transparent, and the price obtained as expected. Really recommend a brother Kawal service for your property sales!',
            ),
            2 => 
            array (
                'id' => '9f36e26a-1e8e-4692-ba2d-64a15efdc2d4',
                'locale' => 'id',
                'client_id' => '9f36e26a-0d4b-4646-8037-3301530edda5',
                'description' => 'Klien pembangunan rumah asal Deli Serdang',
                'testimonial' => 'Membangun rumah impian kami bersama Bang Kawal adalah keputusan terbaik. Kualitas bangunannya luar biasa, detail pengerjaannya rapi, dan sesuai dengan jadwal. Komunikasi selalu lancar, Bang Kawal dan timnya sangat ahli. Hasil akhirnya melebihi ekspektasi kami, benar-benar fantastis!',
            ),
            3 => 
            array (
                'id' => '9f36e26a-20fc-41fc-a740-d83963e73329',
                'locale' => 'en',
                'client_id' => '9f36e26a-0d4b-4646-8037-3301530edda5',
                'description' => 'Client construction of a house from Deli Serdang',
                'testimonial' => 'Building our dream house with Bang Kawal is the best decision. The quality of the building is extraordinary, the details of the process are neat, and according to the schedule. Communication is always smooth, Bang Kawal and his team are very expert. The end result exceeds our expectations, really fantastic!',
            ),
            4 => 
            array (
                'id' => '9f36e51b-8f25-4c51-8cf7-09a4e2f7a110',
                'locale' => 'id',
                'client_id' => '9f36e51b-8a83-4079-a31c-9840fd99a2e7',
                'description' => 'Klien desain rumah dari medan',
                'testimonial' => 'Layanan konsultasi desain rumah dari Mas Kawal sangat inspiratif dan solutif. Beliau memahami visi kami dan menerjemahkannya menjadi desain yang fungsional sekaligus estetis. Ide-idenya segar dan relevan, menjadikan rumah kami unik. Sangat membantu mewujudkan hunian impian!',
            ),
            5 => 
            array (
                'id' => '9f36e51b-90ec-4623-88b6-938c79a595b1',
                'locale' => 'en',
                'client_id' => '9f36e51b-8a83-4079-a31c-9840fd99a2e7',
                'description' => 'Home design clients from Medan',
                'testimonial' => 'Home design consultation services from Mas Kawal are very inspiring and solutive. He understood our vision and translated it into a functional and aesthetic design. His ideas are fresh and relevant, making our house unique. Very helpful to realize a dream residence!',
            ),
        ));
        
        
    }
}