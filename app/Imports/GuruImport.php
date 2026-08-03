<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Guru([

            'nama'            => $row['nama'],
            'jabatan'         => $row['jabatan'],
            'jenis_kelamin'   => $row['jenis_kelamin'],
            'tempat_lahir'    => $row['tempat_lahir'],
            'tanggal_lahir'   => $row['tanggal_lahir'],
            'alamat'          => $row['alamat'],
            'telepon'         => $row['telepon'],
            'email'           => $row['email'],

            // import tidak membawa foto
            'foto'            => null,

            'status' => strtolower($row['status']) == 'aktif',
        ]);
    }
}