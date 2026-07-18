<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Semester;

class SemesterSeeder extends Seeder
{
    public function run(): void
    {
        Semester::updateOrCreate(
            ['nama'=>'Ganjil'],
            ['aktif'=>true]
        );

        Semester::updateOrCreate(
            ['nama'=>'Genap'],
            ['aktif'=>false]
        );
    }
}