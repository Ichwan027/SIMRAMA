<?php

namespace App\Core\Repositories;

use App\Models\Tilawati;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TilawatiRepository extends BaseRepository
{
    public function __construct(Tilawati $model)
    {
        parent::__construct($model);
    }

    /**
     * Ambil seluruh data.
     */
    public function all(): Collection
    {
        return $this->model
            ->orderBy('urutan')
            ->get();
    }

    /**
     * Pagination.
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model
            ->orderBy('urutan')
            ->paginate($perPage);
    }
}