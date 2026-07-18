<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            'Al-Qur\'an',
            'Tajwid',
            'Fiqih',
            'Aqidah',
            'Akhlak',
            'Nahwu',
            'Shorof',
            'Bahasa Arab',

        ];

        foreach ($data as $mapel) {

            Mapel::updateOrCreate(

                [
                    'nama' => $mapel
                ],

                [
                    'aktif' => true
                ]

            );
        }
    }
}
