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

                'email' => 'admin@madin.com',

                'password' => Hash::make('admin123'),

                'email_verified_at' => now(),
            ]

        );
    }
}