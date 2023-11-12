<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Admin'],
            ['name' => 'Pelatih'],
            ['name' => 'Atlet'],
        ];
        foreach($data as $value){
            DB::table('roles')->insert([
            'name' => $value['name'],
            'created_at' => carbon::now(),
            'updated_at' => carbon::now(),
            ]);
        }
    }
}
