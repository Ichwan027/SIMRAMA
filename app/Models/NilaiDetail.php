<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiDetail extends Model
{
    use HasFactory;

    protected $table = 'nilai_details';

    protected $fillable = [

        'nilai_id',

        'guru_mengajar_id',

        'kkm',

        'nilai_angka',

        'predikat_id',

        'deskripsi'

    ];

    protected $casts = [

        'kkm'=>'integer',

        'nilai_angka'=>'integer'

    ];

    public function nilai()
    {
        return $this->belongsTo(Nilai::class);
    }

    public function guruMengajar()
    {
        return $this->belongsTo(GuruMengajar::class);
    }

    public function predikat()
    {
        return $this->belongsTo(Predikat::class);
    }
}