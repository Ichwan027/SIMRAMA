<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterCatatan;

class MasterCatatanSeeder extends Seeder
{

    public function run(): void
    {
        MasterCatatan::insert([

            [
                'nilai_min' => 80,
                'nilai_max' => 100,
                'catatan' =>
                'Semoga Allah Memberkahimu, Pertahankan Dan Tingkatkan Prestasimu Dalam Kejuaraan',
                'urutan' => 1
            ],

            [
                'nilai_min' => 65,
                'nilai_max' => 79,
                'catatan' =>
                'Tingkatkan Dan Perjuangkan Nilai Yang Terbaik Di Ujian Selanjutnya',
                'urutan' => 2
            ],

            [
                'nilai_min' => 0,
                'nilai_max' => 64,
                'catatan' =>
                'Berusahalah Yang Giat, Jangan Bermalas-Malasan Agar Mendapatkan Hasil Yang Diharapkan',
                'urutan' => 3
            ]

        ]);
    }
}
