<?php

namespace Database\Seeders;

use App\Models\Predikat;
use Illuminate\Database\Seeder;

class PredikatSeeder extends Seeder
{
    public function run(): void
    {
        Predikat::query()->delete();

        Predikat::insert([
            [
                'nilai_min'  => 90,
                'nilai_max'  => 100,
                'predikat'   => 'A',
                'keterangan' => 'Sangat Baik',
            ],
            [
                'nilai_min'  => 80,
                'nilai_max'  => 89,
                'predikat'   => 'B',
                'keterangan' => 'Baik',
            ],
            [
                'nilai_min'  => 70,
                'nilai_max'  => 79,
                'predikat'   => 'C',
                'keterangan' => 'Cukup',
            ],
            [
                'nilai_min'  => 60,
                'nilai_max'  => 69,
                'predikat'   => 'D',
                'keterangan' => 'Kurang',
            ],
            [
                'nilai_min'  => 0,
                'nilai_max'  => 59,
                'predikat'   => 'E',
                'keterangan' => 'Sangat Kurang',
            ],
        ]);
    }
}
