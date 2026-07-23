<?php

namespace App\Core\Repositories;

use App\Models\NilaiTilawati;

class NilaiTilawatiRepository extends BaseRepository
{
    public function __construct(NilaiTilawati $model)
    {
        parent::__construct($model);
    }

    /**
     * Ambil seluruh nilai Tilawati berdasarkan Nilai.
     */
    public function getByNilai(int $nilaiId)
    {
        return $this->model
            ->with([
                'tilawati',
                'predikat'
            ])
            ->where('nilai_id', $nilaiId)
            ->orderBy('tilawati_id')
            ->get();
    }

    /**
     * Hapus seluruh nilai Tilawati milik satu nilai.
     */
    public function deleteByNilai(int $nilaiId): void
    {
        $this->model
            ->where('nilai_id', $nilaiId)
            ->delete();
    }
}