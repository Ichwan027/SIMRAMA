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

            ['nama' => 'Makan & Setelah Makan', 'urutan' => 1],
            ['nama' => 'Tidur & Setelah Tidur', 'urutan' => 2],
            ['nama' => 'Setelah Berwudhu', 'urutan' => 3],
            ['nama' => 'Setelah Adzan', 'urutan' => 4],
            ['nama' => 'Masuk & Keluar Masjid', 'urutan' => 5],
            ['nama' => 'Kedua Orang Tua', 'urutan' => 6],
            ['nama' => 'Bepergian', 'urutan' => 7],
            ['nama' => 'Masuk & Keluar Kamar Mandi', 'urutan' => 8],

        ];

        foreach ($data as $item) {

            DoaHarian::updateOrCreate(

                ['urutan' => $item['urutan']],

                $item

            );
        }
    }
}
