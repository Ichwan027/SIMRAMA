<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TilawatiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            ['nama' => 'Fashohah'],
            ['nama' => 'Tajwid'],
            ['nama' => 'Kelancaran'],
            ['nama' => 'Tartil / Irama Lagu'],
            ['nama' => 'Ilmu Al-Qur\'an'],

        ];

        foreach ($data as $i => $item) {

            DB::table('tilawatis')->insert([

                'nama' => $item['nama'],

                'urutan' => $i + 1,

                'status' => true,

                'created_at' => now(),

                'updated_at' => now(),

            ]);

        }
    }
}