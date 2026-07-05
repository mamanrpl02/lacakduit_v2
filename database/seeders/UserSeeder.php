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
                'name' => 'Manzz',
                'email' =>  'manz@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'sys_id_r_user' => (string) \Illuminate\Support\Str::uuid(),
                'name' => 'Maman',
                'email' =>  'maman@example.com',
                'password' => Hash::make('password123'),
            ],
        ];
        DB::table('r_user')->insert($users);
    }
}
