<?php

namespace App\Core\Repositories;

use App\Models\Kelas;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class KelasRepository extends BaseRepository
{
    public function __construct(Kelas $model)
    {
        parent::__construct($model);
    }

    /**
     * Ambil seluruh data.
     */
    public function all(): Collection
    {
        return $this->model
            ->with('waliGuru')
            ->orderBy('urutan')
            ->get();
    }

    /**
     * Pagination data.
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model
            ->with('waliGuru')
            ->orderBy('urutan')
            ->paginate($perPage);
    }
}
