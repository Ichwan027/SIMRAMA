<?php

namespace App\Core\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasStatusScope
{
    public function scopeAktif(Builder $query): Builder
    {
        return $query->where('status', true);
    }

    public function scopeNonAktif(Builder $query): Builder
    {
        return $query->where('status', false);
    }
}