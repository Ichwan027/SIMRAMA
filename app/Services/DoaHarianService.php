<?php

namespace App\Services;

use App\Core\Repositories\DoaHarianRepository;

class DoaHarianService extends BaseService
{
    public function __construct(DoaHarianRepository $repository)
    {
        $this->repository = $repository;
    }
}
