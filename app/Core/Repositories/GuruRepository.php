<?php

namespace App\Core\Repositories;

use App\Models\Guru;

class GuruRepository extends BaseRepository
{
    public function __construct(Guru $guru)
    {
        parent::__construct($guru);
    }
}
