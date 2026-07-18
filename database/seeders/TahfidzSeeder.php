<?php

namespace Database\Seeders;

use App\Models\Tahfidz;
use Illuminate\Database\Seeder;

class TahfidzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'nama' => 'Juz 30',
                'urutan' => 1,
                'aktif' => true,
            ],

            [
                'nama' => 'Juz 29',
                'urutan' => 2,
                'aktif' => true,
            ],

            [
                'nama' => 'Juz 28',
                'urutan' => 3,
                'aktif' => true,
            ],

            [
                'nama' => 'Surat Yasin',
                'urutan' => 4,
                'aktif' => true,
            ],

            [
                'nama' => 'Surat Al-Waqi\'ah',
                'urutan' => 5,
                'aktif' => true,
            ],

            [
                'nama' => 'Surat Ar-Rahman',
                'urutan' => 6,
                'aktif' => true,
            ],

            [
                'nama' => 'Surat Al-Mulk',
                'urutan' => 7,
                'aktif' => true,
            ],

        ];

        foreach ($data as $item) {

            Tahfidz::updateOrCreate(

                [
                    'nama' => $item['nama'],
                ],

                $item

            );
        }
    }
}
