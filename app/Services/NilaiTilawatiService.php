<?php

namespace App\Services;

use App\Core\Repositories\NilaiTilawatiRepository;
use App\Models\Predikat;
use Illuminate\Support\Facades\DB;

class NilaiTilawatiService extends BaseService
{
    public function __construct(NilaiTilawatiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByNilai(int $nilaiId)
    {
        return $this->repository->getByNilai($nilaiId);
    }

    public function deleteByNilai(int $nilaiId): void
    {
        $this->repository->deleteByNilai($nilaiId);
    }

    /**
     * Simpan seluruh nilai Tilawati.
     */
    public function save(int $nilaiId, array $nilais): void
    {
        DB::transaction(function () use ($nilaiId, $nilais) {

            // Hapus data lama
            $this->repository->deleteByNilai($nilaiId);

            foreach ($nilais as $tilawatiId => $nilai) {

                if ($nilai === null || $nilai === '') {
                    continue;
                }

                $predikat = Predikat::query()
                    ->where('nilai_min', '<=', $nilai)
                    ->where('nilai_max', '>=', $nilai)
                    ->first();

                $this->repository->create([
                    'nilai_id'      => $nilaiId,
                    'tilawati_id'   => $tilawatiId,
                    'nilai'         => $nilai,
                    'predikat_id'   => $predikat?->id,
                ]);
            }
        });
    }
}