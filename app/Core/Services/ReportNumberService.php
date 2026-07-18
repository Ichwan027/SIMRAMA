<?php

namespace App\Core\Services;

use App\Models\Nilai;

class ReportNumberService
{
    public function generate(
        string $tahun,
        string $semester
    ): string {

        $total = Nilai::count() + 1;

        return sprintf(
            '%04d/MDFU/%s/%s',
            $total,
            str_replace('/', '-', $tahun),
            $semester
        );
    }
}