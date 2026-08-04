<?php

namespace App\Services;

use App\Core\Contracts\BaseRepositoryInterface;
use App\Core\Contracts\CrudServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseService implements CrudServiceInterface
{
    protected BaseRepositoryInterface $repository;

    /**
     * Ambil seluruh data.
     */
    public function all(): Collection
    {
        return $this->repository->all();
    }

    /**
     * Pagination data.
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        // dd($this->repository);
        return $this->repository->paginate($perPage);
    }

    /**
     * Cari berdasarkan ID.
     */
    public function find(int $id): ?Model
    {
        return $this->repository->find($id);
    }

    /**
     * Simpan data baru.
     */
    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    /**
     * Update data.
     */
    public function update(int $id, array $data): Model
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Hapus data.
     */
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
