<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TahunAjaran;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TahunAjaran::updateOrCreate(
            [
                'tahun' => '2025/2026'
            ],
            [
                'aktif' => true
            ]
        );
    }
}
