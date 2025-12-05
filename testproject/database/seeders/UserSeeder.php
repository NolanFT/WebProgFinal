<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // Admin
            [
                'name' => 'Jacky Hertanto',
                'email' => 'jackyh@gmail.com',
                'password' => Hash::make('jackyh'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // User 1
            [
                'name' => 'John',
                'email' => 'john12@gmail.com',
                'password' => Hash::make('john'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // User 2
            [
                'name' => 'Bobby',
                'email' => 'bobbyhuntrix@gmail.com',
                'password' => Hash::make('bobby'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
