<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tilawati extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tilawatis';

    protected $fillable = [
        'nama',
        'urutan',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Relasi Nilai Tilawati
     */
    public function nilaiTilawatis()
    {
        return $this->hasMany(NilaiTilawati::class);
    }
}