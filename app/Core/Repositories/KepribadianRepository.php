<?php

namespace App\Core\Repositories;

use App\Models\Kepribadian;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class KepribadianRepository extends BaseRepository
{
    public function __construct(Kepribadian $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model
            ->orderBy('urutan')
            ->get();
    }

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model
            ->orderBy('urutan')
            ->paginate($perPage);
    }
}
