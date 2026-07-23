<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoaHarian extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'nama',

        'urutan',

        'aktif',

    ];

    protected $casts = [

        'aktif' => 'boolean',

    ];

    public function nilaiDoas()
    {
        return $this->hasMany(NilaiDoa::class);
    }
}
