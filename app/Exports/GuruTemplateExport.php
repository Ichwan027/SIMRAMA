<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class GuruTemplateExport implements FromArray
{
    public function array(): array
    {
        return [

            [

                'Nama',
                'Jabatan',
                'Jenis_Kelamin',
                'Tempat_Lahir',
                'Tanggal_Lahir',
                'Alamat',
                'Telepon',
                'Email',
                'Status'

            ],

            [

                'Muhammad Ichwan',
                'Wali Kelas',
                'Laki-laki',
                'Surabaya',
                '1999-01-01',
                'Jl. Mawar No.1',
                '08123456789',
                'ichwan@gmail.com',
                'Aktif'

            ]

        ];
    }
}