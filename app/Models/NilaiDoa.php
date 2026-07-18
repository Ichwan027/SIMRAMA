<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiDoa extends Model
{
    use HasFactory;

    protected $fillable = [

        'santri_id',

        'doa_harian_id',

        'tahun_ajaran_id',

        'semester_id',

        'nilai'

    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function doa()
    {
        return $this->belongsTo(DoaHarian::class, 'doa_harian_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function getPredikatAttribute()
    {
        return Predikat::where('nilai_min', '<=', $this->nilai)
            ->where('nilai_max', '>=', $this->nilai)
            ->first();
    }
}
