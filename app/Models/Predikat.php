<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Predikat extends Model
{
    use HasFactory;

    protected $table = 'predikats';

    protected $fillable = [

        'nilai_min',

        'nilai_max',

        'predikat',

        'keterangan'

    ];

    public function nilaiDetails()
    {
        return $this->hasMany(NilaiDetail::class);
    }
}