<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKepribadian extends Model
{
    use HasFactory;

    protected $table = 'nilai_kepribadians';

    protected $fillable = [

        'santri_id',

        'kepribadian_id',

        'tahun_ajaran_id',

        'semester_id',

        'nilai'

    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function kepribadian()
    {
        return $this->belongsTo(Kepribadian::class);
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