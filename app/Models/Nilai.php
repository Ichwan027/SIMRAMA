<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilais';

    protected $fillable = [

        'santri_id',

        'tahun_ajaran_id',

        'semester_id',

        'peringkat',

        'nomor_raport',

        'catatan'

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

    public function details()
    {
        return $this->hasMany(NilaiDetail::class);
    }
}