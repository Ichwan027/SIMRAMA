<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kepribadian;

class KepribadianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            ['nama' => 'Disiplin', 'urutan' => 1],
            ['nama' => 'Tanggung Jawab', 'urutan' => 2],
            ['nama' => 'Kejujuran', 'urutan' => 3],
            ['nama' => 'Kesopanan', 'urutan' => 4],
            ['nama' => 'Kerajinan', 'urutan' => 5],
            ['nama' => 'Kebersihan', 'urutan' => 6],
            ['nama' => 'Kerapian', 'urutan' => 7],
            ['nama' => 'Kerjasama', 'urutan' => 8],
            ['nama' => 'Percaya Diri', 'urutan' => 9],
            ['nama' => 'Akhlak', 'urutan' => 10],

        ];

        foreach ($data as $item) {

            Kepribadian::updateOrCreate(

                [

                    'nama' => $item['nama'],

                ],

                $item

            );
        }
    }
}
