<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'sys_id_r_user' => (string) \Illuminate\Support\Str::uuid(),
                'name' => 'Admin Platform',
                'email' =>  'manzpkl11@gmail.com',
                'password' => Hash::make('mamanrpl123'),
            ],
            [
                'sys_id_r_user' => (string) \Illuminate\Support\Str::uuid(),
                'name' => 'Maman',
                'email' =>  'maman.mitratex@gmail.com',
                'password' => Hash::make('mamanrpl123'),
            ],
        ];
        DB::table('r_user')->insert($users);
    }
}
