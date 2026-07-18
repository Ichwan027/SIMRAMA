<?php

namespace App\Services;

use App\Core\Repositories\GuruMengajarRepository;

class GuruMengajarService extends BaseService
{
    public function __construct(
        GuruMengajarRepository $repository
    ) {
        $this->repository = $repository;
    }
}