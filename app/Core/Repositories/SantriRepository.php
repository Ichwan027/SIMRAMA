<?php

namespace App\Core\Repositories;

use App\Models\Santri;

class SantriRepository extends BaseRepository
{
    public function __construct(Santri $santri)
    {
        parent::__construct($santri);
    }
}
