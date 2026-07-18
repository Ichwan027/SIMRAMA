<?php

namespace App\Services;

use App\Models\Mapel;

class MapelService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new Mapel());
    }
}