<?php

namespace Database\Seeders;

use App\Models\Santri;
use Illuminate\Database\Seeder;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'nama' => 'Muhammad Ichwan',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2004-05-05',
                'alamat' => 'Surabaya',
                'nama_wali' => 'Ichwan',
                'telepon' => '081234567890',
                'kelas_id' => 10,
            ],

            [
                'nama' => 'Arhan Pratama Putra',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Sidoarjo',
                'tanggal_lahir' => '2010-10-10',
                'alamat' => 'Malang',
                'nama_wali' => 'Jono',
                'telepon' => '081234567891',
                'kelas_id' => 7,
            ],

        ];

        foreach ($data as $item) {

            Santri::updateOrCreate(

                [
                    'nama' => $item['nama'],
                ],

                $item

            );
        }
    }
}
