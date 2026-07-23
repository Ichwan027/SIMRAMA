<?php

namespace App\Services;

use App\Core\Repositories\SemesterRepository;
use Illuminate\Database\Eloquent\Model;

class SemesterService extends BaseService
{
    /**
     * Override tipe repository agar Intelephense mengenali method custom.
     */


    public function __construct(SemesterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data): Model
    {
        /** @var \App\Core\Repositories\SemesterRepository $repository */
        $repository = $this->repository;

        if ($data['aktif']) {
            $repository->nonaktifkanSemua();
        }

        return parent::create($data);
    }

    public function update(int $id, array $data): Model
    {
        /** @var \App\Core\Repositories\SemesterRepository $repository */
        $repository = $this->repository;

        if ($data['aktif']) {
            $repository->nonaktifkanSemua();
        }

        return parent::update($id, $data);
    }
}
