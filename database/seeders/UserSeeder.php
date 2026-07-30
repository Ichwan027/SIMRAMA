<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(

            [
                'email' => 'admin@madin.com',
            ],

            [
                'name' => 'Administrator',

                'username' => 'admin',

                'email' => 'admin@madin.com',

                'password' => Hash::make('admin123'),

                'role' => 'admin',

                'email_verified_at' => now(),
            ]

        );
    }
}