<?php

namespace App\Core\Repositories;

use App\Models\Mapel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class MapelRepository extends BaseRepository
{
    public function __construct(Mapel $model)
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
     * Pagination data.
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model
            ->orderBy('urutan')
            ->paginate($perPage);
    }
}