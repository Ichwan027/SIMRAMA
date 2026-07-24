<?php

namespace App\Services;

use App\Core\Repositories\KepribadianRepository;

class KepribadianService extends BaseService
{
    public function __construct(KepribadianRepository $repository)
    {
        $this->repository = $repository;
    }
}
