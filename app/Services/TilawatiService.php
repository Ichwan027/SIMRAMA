<?php

namespace App\Services;

use App\Core\Repositories\TilawatiRepository;

class TilawatiService extends BaseService
{
    public function __construct(TilawatiRepository $repository)
    {
        $this->repository = $repository;
    }
}