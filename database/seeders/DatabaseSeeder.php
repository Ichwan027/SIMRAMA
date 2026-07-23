<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            RoleSeeder::class,

            UserSeeder::class,

            PengaturanSeeder::class,

            TahunAjaranSeeder::class,

            SemesterSeeder::class,

            PredikatSeeder::class,

            GuruSeeder::class,

            KelasSeeder::class,

            MapelSeeder::class,

            SantriSeeder::class,

            // KelasMapelSeeder::class,

            GuruMengajarSeeder::class,

            NilaiSeeder::class,

            NilaiDetailSeeder::class,

            AbsensiSeeder::class,

            DoaHarianSeeder::class,

            NilaiDoaSeeder::class,

            KepribadianSeeder::class,

            NilaiKepribadianSeeder::class,

            TahfidzSeeder::class,

            NilaiTahfidzSeeder::class,

            TilawatiSeeder::class,

            AuditLogSeeder::class,

        ]);
    }
}