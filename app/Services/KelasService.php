<?php

namespace App\Services;

use App\Core\Repositories\KelasRepository;

class KelasService extends BaseService
{
    public function __construct(KelasRepository $repository)
    {
        $this->repository = $repository;
    }
}
