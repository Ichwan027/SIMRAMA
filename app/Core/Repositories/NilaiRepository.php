<?php

namespace App\Core\Repositories;

use App\Models\Nilai;
use App\Models\Santri;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Helpers\AccessHelper;

class NilaiRepository extends BaseRepository
{
    public function __construct(Nilai $model)
    {
        parent::__construct($model);
    }

    /**
     * Load seluruh relasi.
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        $query = Santri::with('kelas')
            ->orderBy('nama');

        // Admin & Kepala Madrasah
        if (AccessHelper::isSuperUser()) {
            return $query->paginate($perPage);
        }

        // Wali kelas
        if (AccessHelper::isUstadz()) {

            $kelasId = AccessHelper::kelasId();

            if ($kelasId) {
                $query->where('kelas_id', $kelasId);
            } else {
                $query->whereRaw('1 = 0');
            }
        }

        return $query->paginate($perPage);
    }

    public function find(int $id): ?\Illuminate\Database\Eloquent\Model
    {
        $nilai = $this->model
            ->with([
                'santri.kelas',
                'tahunAjaran',
                'semester',
                'details.guruMengajar.guru',
                'details.guruMengajar.mapel',
                'details.predikat',
            ])
            ->findOrFail($id);

        if (AccessHelper::isSuperUser()) {
            return $nilai;
        }

        if (AccessHelper::isUstadz()) {

            if ($nilai->santri->kelas_id != AccessHelper::kelasId()) {
                abort(403, 'Anda tidak memiliki hak mengakses data ini.');
            }

            return $nilai;
        }

        abort(403);
    }
}
