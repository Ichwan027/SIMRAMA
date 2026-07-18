<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoaHarian;

class DoaHarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            ['nama' => 'Doa Sebelum Belajar', 'urutan' => 1],
            ['nama' => 'Doa Sesudah Belajar', 'urutan' => 2],
            ['nama' => 'Doa Sebelum Makan', 'urutan' => 3],
            ['nama' => 'Doa Sesudah Makan', 'urutan' => 4],
            ['nama' => 'Doa Sebelum Tidur', 'urutan' => 5],
            ['nama' => 'Doa Bangun Tidur', 'urutan' => 6],
            ['nama' => 'Doa Masuk Rumah', 'urutan' => 7],
            ['nama' => 'Doa Keluar Rumah', 'urutan' => 8],
            ['nama' => 'Doa Masuk Masjid', 'urutan' => 9],
            ['nama' => 'Doa Keluar Masjid', 'urutan' => 10],
            ['nama' => 'Doa Masuk Kamar Mandi', 'urutan' => 11],
            ['nama' => 'Doa Keluar Kamar Mandi', 'urutan' => 12],
            ['nama' => 'Doa Sebelum Wudhu', 'urutan' => 13],
            ['nama' => 'Doa Sesudah Wudhu', 'urutan' => 14],
            ['nama' => 'Doa Bercermin', 'urutan' => 15],
            ['nama' => 'Doa Memakai Pakaian', 'urutan' => 16],
            ['nama' => 'Doa Melepas Pakaian', 'urutan' => 17],
            ['nama' => 'Doa Keluar Bepergian', 'urutan' => 18],
            ['nama' => 'Doa Naik Kendaraan', 'urutan' => 19],
            ['nama' => 'Doa Turun Kendaraan', 'urutan' => 20],
            ['nama' => 'Doa Ketika Hujan', 'urutan' => 21],
            ['nama' => 'Doa Setelah Hujan', 'urutan' => 22],
            ['nama' => 'Doa Melihat Petir', 'urutan' => 23],
            ['nama' => 'Doa Menjenguk Orang Sakit', 'urutan' => 24],
            ['nama' => 'Doa Memohon Kesembuhan', 'urutan' => 25],
            ['nama' => 'Doa Untuk Kedua Orang Tua', 'urutan' => 26],
            ['nama' => 'Doa Memohon Ilmu yang Bermanfaat', 'urutan' => 27],
            ['nama' => 'Doa Mohon Kemudahan Urusan', 'urutan' => 28],
            ['nama' => 'Doa Qunut', 'urutan' => 29],
            ['nama' => 'Doa Khatmil Qur\'an', 'urutan' => 30],

        ];

        foreach ($data as $item) {

            DoaHarian::updateOrCreate(

                ['urutan' => $item['urutan']],

                $item

            );
        }
    }
}
