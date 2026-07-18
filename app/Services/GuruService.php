<?php

namespace App\Services;

use App\Core\Repositories\GuruRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GuruService extends BaseService
{
    protected UploadService $uploadService;

    public function __construct(
        GuruRepository $repository,
        UploadService $uploadService
    ) {
        $this->repository = $repository;
        $this->uploadService = $uploadService;
    }

    /**
     * Simpan guru baru.
     */
    public function create(array $data): Model
    {
        if (
            isset($data['foto']) &&
            $data['foto'] instanceof \Illuminate\Http\UploadedFile
        ) {
            $data['foto'] = $this->uploadService->upload(
                $data['foto'],
                'guru'
            );
        }

        return parent::create($data);
    }

    /**
     * Update data guru.
     */
    public function update(int $id, array $data): Model
    {
        $guru = $this->find($id);

        if (
            isset($data['foto']) &&
            $data['foto'] instanceof \Illuminate\Http\UploadedFile
        ) {
            $data['foto'] = $this->uploadService->replace(
                $data['foto'],
                $guru->foto,
                'guru'
            );
        }

        return parent::update($id, $data);
    }

    /**
     * Hapus guru beserta fotonya.
     */
    public function delete(int $id): bool
    {
        $guru = $this->repository->find($id);

        if (! $guru) {
            return false;
        }

        if (
            ! empty($guru->foto) &&
            Storage::disk('public')->exists($guru->foto)
        ) {
            Storage::disk('public')->delete($guru->foto);
        }

        return $this->repository->delete($id);
    }
}
