<?php

namespace App\Core\Repositories;

use App\Models\Nilai;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class NilaiRepository extends BaseRepository
{
    public function __construct(Nilai $model)
    {
        parent::__construct($model);
    }

    /**
     * Load seluruh relasi.
     */
    public function paginate(
        int $perPage = 10
    ): LengthAwarePaginator {
        return $this->model
            ->with([
                'santri.kelas',
                'tahunAjaran',
                'semester',
            ])
            ->latest()
            ->paginate($perPage);
    }

    public function find(int $id): ?\Illuminate\Database\Eloquent\Model
    {
        return $this->model
            ->with([
                'santri.kelas',
                'tahunAjaran',
                'semester',
                'details.guruMengajar.guru',
                'details.guruMengajar.mapel',
                'details.predikat',
            ])
            ->find($id);
    }
}
