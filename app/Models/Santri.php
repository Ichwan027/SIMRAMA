<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Santri extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'santris';

    protected $fillable = [

        'nama',

        'jenis_kelamin',

        'tempat_lahir',

        'tanggal_lahir',

        'alamat',

        'nama_wali',

        'telepon',

        'kelas_id',

        'foto',

        'status'

    ];

    protected $casts = [

        'tanggal_lahir'=>'date',

        'status'=>'boolean'

    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    public function nilaiDoas()
    {
        return $this->hasMany(NilaiDoa::class);
    }

    public function nilaiKepribadians()
    {
        return $this->hasMany(NilaiKepribadian::class);
    }

    public function nilaiTahfidzs()
    {
        return $this->hasMany(NilaiTahfidz::class);
    }
}