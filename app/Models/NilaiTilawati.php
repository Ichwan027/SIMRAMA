<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiTilawati extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'nilai_tilawatis';

    protected $fillable = [

        'nilai_id',

        'tilawati_id',

        'nilai',

        'predikat_id',

    ];

    public function nilai()
    {
        return $this->belongsTo(Nilai::class);
    }

    public function tilawati()
    {
        return $this->belongsTo(Tilawati::class);
    }

    public function predikat()
    {
        return $this->belongsTo(Predikat::class);
    }
}