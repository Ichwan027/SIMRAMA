<?php

namespace App\Services;

use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Model;
use App\Core\Repositories\TahunAjaranRepository;

class TahunAjaranService extends BaseService
{
    public function __construct(TahunAjaranRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data): Model
    {
        if ($data['aktif']) {
            TahunAjaran::query()->update([
                'aktif' => false,
            ]);
        }

        return parent::create($data);
    }

    public function update(int $id, array $data): Model
    {
        if ($data['aktif']) {
            TahunAjaran::query()->update([
                'aktif' => false,
            ]);
        }

        return parent::update($id, $data);
    }
}
