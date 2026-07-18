<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Santri;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Semester;
use App\Models\TahunAjaran;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [

            'guru' => Guru::count(),

            'santri' => Santri::count(),

            'kelas' => Kelas::count(),

            'mapel' => Mapel::count(),

            'semester' => Semester::where('aktif', true)->first(),

            'tahun' => TahunAjaran::where('aktif', true)->first(),

        ]);
    }
}