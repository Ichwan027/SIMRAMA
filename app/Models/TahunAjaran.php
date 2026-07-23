<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\SoftDeletes;

class TahunAjaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tahun_ajarans';

    protected $fillable = [

        'tahun',

        'urutan',

        'aktif',

    ];

    protected $casts = [

        'aktif' => 'boolean',

    ];

    public function guruMengajars()
    {
        return $this->hasMany(GuruMengajar::class);
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
