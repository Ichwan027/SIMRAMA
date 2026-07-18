<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'tahun_ajaran_id',
        'semester_id',
        'sakit',
        'izin',
        'alpha'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}