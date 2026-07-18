<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kelas';

    protected $fillable = [
        'nama',
        'kode',
        'wali_guru_id',
        'urutan',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function waliGuru()
    {
        return $this->belongsTo(Guru::class, 'wali_guru_id');
    }

    public function santris()
    {
        return $this->hasMany(Santri::class);
    }

    public function guruMengajars()
    {
        return $this->hasMany(GuruMengajar::class);
    }
}
