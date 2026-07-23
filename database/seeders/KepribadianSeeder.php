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

            ['nama' => 'Kedisiplinan', 'urutan' => 1],
            
            ['nama' => 'Kerajinan', 'urutan' => 2],

            ['nama' => 'Perilaku', 'urutan' => 3],

            ['nama' => 'Ketaatan', 'urutan' => 4],
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
