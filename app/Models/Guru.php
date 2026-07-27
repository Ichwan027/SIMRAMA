<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'gurus';

    protected $fillable = [

        'nama',

        'jabatan',

        'jenis_kelamin',

        'tempat_lahir',

        'tanggal_lahir',

        'alamat',

        'telepon',

        'email',

        'foto',

        'status'

    ];

    protected $casts = [

        'tanggal_lahir' => 'date',

        'status' => 'boolean'

    ];

    /**
     * User Login
     */
    public function user()
    {
        return $this->hasOne(User::class, 'guru_id');
    }

    /**
     * Wali Kelas
     */
    public function kelasWali()
    {
        return $this->hasOne(Kelas::class, 'wali_guru_id');
    }

    /**
     * Guru Mengajar
     */
    public function guruMengajars()
    {
        return $this->hasMany(GuruMengajar::class);
    }
}
