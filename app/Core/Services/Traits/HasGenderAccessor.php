<?php

namespace App\Core\Traits;

trait HasGenderAccessor
{
    public function getJenisKelaminLabelAttribute(): string
    {
        return match (data_get($this, 'jenis_kelamin')) {
            'L' => 'Laki-laki',
            'P' => 'Perempuan',
            default => '-',
        };
    }
}