<?php

namespace App\Services;

use App\Core\Repositories\SantriRepository;
use Illuminate\Database\Eloquent\Model;

class SantriService extends BaseService
{
    protected UploadService $uploadService;

    public function __construct(
        SantriRepository $repository,
        UploadService $uploadService
    ) {
        $this->repository = $repository;
        $this->uploadService = $uploadService;
    }

    /**
     * Simpan data santri baru.
     */
    public function create(array $data): Model
    {
        if (
            isset($data['foto']) &&
            $data['foto'] instanceof \Illuminate\Http\UploadedFile
        ) {
            $data['foto'] = $this->uploadService->upload(
                $data['foto'],
                'santri'
            );
        }

        return parent::create($data);
    }

    /**
     * Update data santri.
     */
    public function update(int $id, array $data): Model
    {
        $santri = $this->find($id);

        if (
            isset($data['foto']) &&
            $data['foto'] instanceof \Illuminate\Http\UploadedFile
        ) {
            $data['foto'] = $this->uploadService->replace(
                $data['foto'],
                $santri->foto,
                'santri'
            );
        }

        return parent::update($id, $data);
    }

    /**
     * Hapus data santri beserta fotonya.
     */
    public function delete(int $id): bool
    {
        $santri = $this->find($id);

        if ($santri && $santri->foto) {
            $this->uploadService->delete(
                $santri->foto
            );
        }

        return parent::delete($id);
    }
}
