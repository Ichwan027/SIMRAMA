<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = [

            [
                'kode' => 'SHA',
                'nama' => 'Shifir A',
            ],

            [
                'kode' => 'SHB',
                'nama' => 'Shifir B',
            ],

            [
                'kode' => 'JLD1',
                'nama' => 'Jilid 1',
            ],

            [
                'kode' => 'JLD2',
                'nama' => 'Jilid 2',
            ],

            [
                'kode' => 'KLS1',
                'nama' => 'Kelas 1',
            ],

            [
                'kode' => 'KLS2',
                'nama' => 'Kelas 2',
            ],

            [
                'kode' => 'KLS3',
                'nama' => 'Kelas 3',
            ],

            [
                'kode' => 'KLS4',
                'nama' => 'Kelas 4',
            ],

            [
                'kode' => 'KLS5',
                'nama' => 'Kelas 5',
            ],

            [
                'kode' => 'KLS6',
                'nama' => 'Kelas 6',
            ],

        ];

        foreach ($kelas as $index => $item) {

            Kelas::updateOrCreate(

                [
                    'kode' => $item['kode'],
                ],

                [
                    'nama'   => $item['nama'],
                    'urutan' => $index + 1,
                    'status' => true,
                ]

            );
        }
    }
}
