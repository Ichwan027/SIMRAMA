<?php

namespace App\Services;

use App\Core\Repositories\AbsensiRepository;
use App\Models\Absensi;
use App\Models\Semester;
use App\Models\TahunAjaran;

class AbsensiService extends BaseService
{

    public function __construct(AbsensiRepository $repository)
    {

        $this->repository = $repository;
    }

    /**
     * Ambil absensi berdasarkan santri pada semester & tahun aktif.
     * Jika belum ada maka otomatis dibuat.
     */
    public function findOrCreateBySantri(int $santriId): Absensi
    {
        $tahun = TahunAjaran::where('aktif', 1)->firstOrFail();

        $semester = Semester::where('aktif', 1)->firstOrFail();

        $absensi = $this->repository->findBySantri(
            $santriId,
            $tahun->id,
            $semester->id
        );

        if (!$absensi) {

            $absensi = $this->repository->create([
                'santri_id'       => $santriId,
                'tahun_ajaran_id' => $tahun->id,
                'semester_id'     => $semester->id,
                'sakit'           => 0,
                'izin'            => 0,
                'alpha'           => 0,
            ]);

        }

        return $absensi;
    }

    /**
     * Simpan absensi.
     */
    public function updateAbsensi(int $id, array $data): Absensi
    {
        return $this->repository->update($id, [
            'sakit' => $data['sakit'],
            'izin'  => $data['izin'],
            'alpha' => $data['alpha'],
        ]);
    }
}