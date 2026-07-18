<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaturan extends Model
{
    use HasFactory;

    protected $table = 'pengaturans';

    protected $fillable = [

        'nama_madrasah',

        'alamat',

        'kabupaten',

        'provinsi',

        'kode_pos',

        'telepon',

        'email',

        'website',

        'logo',

        'kepala_madrasah',

        'nip_kepala',

        'tempat_cetak',

        'footer_raport'

    ];
}
