<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'admin',
                    'email' => 'admin@mail.com',
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                ],
                [
                    'name' => 'user',
                    'email' => 'user@mail.com',
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                ],
                [
                    'name' => 'bambang',
                    'email' => 'bambang@mail.com',
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                ],
            ]
        );
    }
}
