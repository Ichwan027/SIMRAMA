<?php

namespace App\Services;

use App\Core\Repositories\TahfidzRepository;

class TahfidzService extends BaseService
{
    public function __construct(TahfidzRepository $repository)
    {
        $this->repository = $repository;
    }
}