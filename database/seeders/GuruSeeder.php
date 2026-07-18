<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::updateOrCreate(

            ['nama' => 'Kepala Madrasah'],

            [

                'jabatan' => 'Kepala Madrasah',

                'jenis_kelamin' => 'Laki-laki',

                'tempat_lahir' => null,

                'tanggal_lahir' => null,

                'alamat' => null,

                'telepon' => null,

                'email' => null,

                'foto' => null,

                'status' => true

            ]

        );
    }
}