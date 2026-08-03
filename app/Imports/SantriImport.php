<?php

namespace App\Imports;

use App\Models\Santri;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SantriImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            if (empty($row['nama'])) {
                continue;
            }

            Santri::create([

                'nama'            => $row['nama'],
                'nis'             => $row['nis'],
                'jenis_kelamin'   => $row['jenis_kelamin'],
                'tempat_lahir'    => $row['tempat_lahir'],
                'tanggal_lahir'   => $row['tanggal_lahir'],
                'alamat'          => $row['alamat'],
                'nama_ayah'       => $row['nama_ayah'],
                'nama_ibu'        => $row['nama_ibu'],
                'telepon'         => $row['telepon'],
                'kelas_id'        => $row['kelas_id'],
                'status'          => $row['status'],
            ]);
        }
    }
}