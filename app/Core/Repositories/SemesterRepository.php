<?php

namespace App\Core\Repositories;

use App\Models\Semester;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class SemesterRepository extends BaseRepository
{
    public function __construct(Semester $model)
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

    /**
     * Menonaktifkan seluruh semester.
     */
    public function nonaktifkanSemua(): void
    {
        $this->model->query()->update([
            'aktif' => false
        ]);
    }

    
}