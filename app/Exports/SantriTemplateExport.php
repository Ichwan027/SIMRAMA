<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class SantriTemplateExport implements FromArray
{
    public function array(): array
    {
        return [
            [
                'nama',
                'nis',
                'jenis_kelamin',
                'tempat_lahir',
                'tanggal_lahir',
                'alamat',
                'nama_ayah',
                'nama_ibu',
                'telepon',
                'kelas_id',
                'status'
            ],

            [
                'Muhammad Ali',
                '240001',
                'Laki-laki',
                'Surabaya',
                '2012-05-10',
                'Jl. Mawar No.10',
                'Ahmad',
                'Fatimah',
                '08123456789',
                '3',
                '1'
            ],
        ];
    }
}