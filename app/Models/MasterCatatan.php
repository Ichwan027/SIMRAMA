<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterCatatan extends Model
{
    use HasFactory;

    protected $fillable = [

        'nilai_min',

        'nilai_max',

        'catatan',

        'urutan',

        'aktif'

    ];
}