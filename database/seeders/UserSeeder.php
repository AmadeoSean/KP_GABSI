<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Nico Bagaskoro Utomo',
                'email' => 'nicobagaskoro927@gmail.com',
            ],
            [
                'name' => 'Mohammad Fathur Imanudin',
                'email' => 'moehammadfatuer@gmail.com',
            ],
            [
                'name' => 'Azzahra Naydelinecindy Prameygisca',
                'email' => 'azzahracindy955@gmail.com',
              ],
              [
                'name' => 'Galuh Rahmawati Putri',
                'email' => 'rahmawatigaluh73@gmail.com',
              ],
              [
                'name' => 'Kresna Raharja',
                'email' => 'kresnaraharja@gmail.com',
              ],
              [
                'name' => 'Heru Setiyawan',
                'email' => 'sheru7874@gmail.com',
              ],
              [
                'name' => 'Mohammad Wisolus Solihin',
                'email' => 'wisolussolihin@gmail.com',
              ],
              [
                'name' => 'Ainul Kiromah',
                'email' => 'ainulkiromah280498@gmail.com',
            ],
            [
                'name' => 'Sofi Chorina Ramadhani',
                'email' => 'sofichorina29@gmail.com',
            ],
            [
                'name' => 'Mohammad Robithus Sholihin',
                'email' => 'robithussholihin310@gmail.com',
            ],
            [
                'name' => 'Hasan Fikri',
                'email' => 'madeltakikuk18@gmail.com',
            ],
            [
                'name' => 'Enrico Airlangga',
                'email' => 'enrico.arlg77@gmail.com',
            ],
            [
                'name' => 'Agna Dwi Saputra',
                'email' => 'who.agna01@gmail.com',
            ],
            [
                'name' => 'Ferro Leonardo',
                'email' => 'ferroleonardo60@gmail.com',
            ],
            [
                'name' => 'Mohammad Aditya Rahman',
                'email' => 'adityarahman1904@gmail.com',
            ],
            [
                'name' => 'Dafin Apriyuda Maqriza',
                'email' => 'dafinapriyudamaqriza50@gmail.com',
            ],
            [
                'name' => 'Ayatullah Reza Khomaini',
                'email' => 'ayatullahreza987@gmail.com',
            ],
            [
                'name' => 'Sudarsini',
                'email' => 'sudarsini56@gmail.com',
            ],
            [
                'name' => 'Ismu Fikrul Ulla Agas Putra',
                'email' => 'ismufikrul28@gmail.com',
            ],
            [
                'name' => 'Muchamad Rifai',
                'email' => 'muchamadrifai063@gmail.com',
            ],
            [
                'name' => 'Fery Aldino Pujiyanto',
                'email' => 'dinonaknganjuk@gmail.com',
            ],
            [
                'name' => 'Mochamad Abhiegail Argo Pangestu',
                'email' => 'abhiegail2016@gmail.com',
            ],
            [
                'name' => 'Desi Agustini Pramita',
                'email' => 'desiagustinleeminho@gmail.com',
            ],
            [
                'name' => 'Heri Purnomo',
                'email' => 'heripurnomo195@gmail.com',
            ],
            [
                'name' => 'Permadi Sulistiyo Pramana',
                'email' => 'tiyouye98@gmail.com',
            ],
        ];
        foreach($data as $value){
            DB::table('users')->insert([
            'name' => $value['name'],
            'email' => $value['email'],
            'role_id' => 3,
            'password' => 'atlet',
            // 'created_at' => carbon::now(),
            // 'updated_at' => carbon::now(),
            ]);
        }
    }
}
