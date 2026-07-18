<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTahfidz extends Model
{
    use HasFactory;

    protected $table = 'nilai_tahfidzs';

    protected $fillable = [

        'santri_id',

        'tahfidz_id',

        'tahun_ajaran_id',

        'semester_id',

        'nilai'

    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function tahfidz()
    {
        return $this->belongsTo(Tahfidz::class);
    }

    public function nilaiTahfidz()
    {
        return $this->hasMany(NilaiTahfidz::class);
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
