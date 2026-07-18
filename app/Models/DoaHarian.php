<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoaHarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'urutan'
    ];

    public function nilaiDoas()
    {
        return $this->hasMany(NilaiDoa::class);
    }
}
