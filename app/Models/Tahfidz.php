<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tahfidz extends Model
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

    public function nilaiTahfidz()
    {
        return $this->hasMany(NilaiTahfidz::class);
    }
}
