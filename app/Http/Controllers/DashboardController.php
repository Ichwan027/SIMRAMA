<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Santri;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Semester;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();

        $kelasWali = null;
        if ($user->guru_id) {
            $kelasWali = Kelas::where('wali_guru_id', $user->guru_id)->first();
        }
        return view('dashboard', [

            'guru' => Guru::count(),

            'santri' => Santri::count(),

            'kelas' => Kelas::count(),

            'mapel' => Mapel::count(),

            'semester' => Semester::where('aktif', true)->first(),

            'tahun' => TahunAjaran::where('aktif', true)->first(),

            'kelasWali' => $kelasWali,

        ]);
    }
}