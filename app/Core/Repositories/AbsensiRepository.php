<?php

namespace App\Core\Repositories;

use App\Models\Absensi;
use App\Models\Santri;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AbsensiRepository extends BaseRepository
{
    public function __construct(Absensi $model)
    {
        parent::__construct($model);
    }

    /**
     * Menampilkan seluruh santri
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return Santri::with('kelas')
            ->orderBy('nama')
            ->paginate($perPage);
    }

    /**
     * Ambil absensi berdasarkan santri, semester & tahun aktif
     */
    public function findBySantri(
        int $santriId,
        int $tahunAjaranId,
        int $semesterId
    ): ?Absensi {

        return $this->model
            ->where('santri_id', $santriId)
            ->where('tahun_ajaran_id', $tahunAjaranId)
            ->where('semester_id', $semesterId)
            ->first();

    }
}