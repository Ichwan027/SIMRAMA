<?php

namespace App\Services;

use App\Core\Repositories\MapelRepository;

class MapelService extends BaseService
{
    public function __construct(MapelRepository $repository)
    {
        $this->repository = $repository;
    }
}