<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AtletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $data = [
            ['name' => 'General Motor Company', 'address'=> 'Jl. Taman Puspa Raya B No.33, Malang, Jawa Timur 13302'],
            ['name' => 'Lockheed Martin', 'address'=> 'Jl. Batik Kumeli No.50, Sukaluyu, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40123'],
            ['name' => 'Lenovo Group Limited', 'address'=> 'Jl. Ngagel Madya No.20, Surabaya, Jawa Timur 33020'],
            ['name' => 'Zara SA', 'address'=> 'Municipality of Arteixo, Spanyol'],
            ['name' => 'Uniqlo Co., Ltd.', 'address'=> ' Yamaguchi, Prefektur Yamaguchi, Jepang'],
        ];
    }
}
