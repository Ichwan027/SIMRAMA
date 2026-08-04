<?php

namespace App\Core\Repositories;

use App\Core\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Ambil seluruh data.
     */
    public function all(): Collection
    {
        return $this->model
            ->latest()
            ->get();
    }

    /**
     * Pagination data.
     */
    public function paginate(int $perPage = 10, ?string $search = null): LengthAwarePaginator
    {
        return $this->model
            ->latest()
            ->paginate($perPage);
    }

    /**
     * Cari berdasarkan ID.
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * Simpan data baru.
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Update data.
     */
    public function update(int $id, array $data): Model
    {
        $model = $this->model->findOrFail($id);

        $model->update($data);

        return $model;
    }

    /**
     * Hapus data.
     */
    public function delete(int $id): bool
    {
        return (bool) $this->model
            ->findOrFail($id)
            ->delete();
    }
}