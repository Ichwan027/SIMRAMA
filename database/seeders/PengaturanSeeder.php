<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengaturan::updateOrCreate(

            ['id' => 1],

            [

                'nama_madrasah' => 'Madrasah Diniyah Fatihul Ulum',

                'alamat' => 'Jl. ................................',

                'kabupaten' => 'Jember',

                'provinsi' => 'Jawa Timur',

                'kode_pos' => '',

                'telepon' => '',

                'email' => '',

                'website' => '',

                'logo' => null,

                'kepala_madrasah' => '',

                'nip_kepala' => '',

                'tempat_cetak' => 'Jember',

                'footer_raport' => 'SIMRAMA - Sistem Informasi Raport Madrasah'

            ]

        );
    }
}