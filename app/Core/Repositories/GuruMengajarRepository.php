<?php

namespace App\Core\Repositories;

use App\Models\GuruMengajar;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GuruMengajarRepository extends BaseRepository
{
    public function __construct(GuruMengajar $model)
    {
        parent::__construct($model);
    }

    /**
     * Ambil seluruh data.
     */
    public function all(): Collection
    {
        return $this->model
            ->with([
                'guru',
                'kelas',
                'mapel',
                'tahunAjaran',
                'semester'
            ])
            ->latest()
            ->get();
    }

    /**
     * Pagination.
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model
            ->with([
                'guru',
                'kelas',
                'mapel',
                'tahunAjaran',
                'semester'
            ])
            ->latest()
            ->paginate($perPage);
    }
}