<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Santri;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Semester;
use App\Models\TahunAjaran;
use App\Models\Nilai;
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

    $semesterAktif = Semester::where('aktif', true)->first();
    $tahunAktif    = TahunAjaran::where('aktif', true)->first();

    $totalSantri   = 0;
    $raportSelesai = 0;
    $raportBelum   = 0;

    if ($semesterAktif && $tahunAktif) {

        // ===========================
        // ADMIN / KEPALA MADRASAH
        // ===========================
        if ($user->isAdmin() || $user->isKepalaMadrasah()) {

            $santris = Santri::where('status', true)->get();
        }

        // ===========================
        // USTADZ (WALI KELAS)
        // ===========================
        else {

            if ($kelasWali) {

                $santris = Santri::where('kelas_id', $kelasWali->id)
                    ->where('status', true)
                    ->get();

            } else {

                $santris = collect();

            }

        }

        $totalSantri = $santris->count();

        foreach ($santris as $santri) {

            $sudahAdaNilai = Nilai::where('santri_id', $santri->id)
                ->where('tahun_ajaran_id', $tahunAktif->id)
                ->where('semester_id', $semesterAktif->id)
                ->whereHas('details', function ($q) {
                    $q->whereNotNull('nilai_angka');
                })
                ->exists();

            if ($sudahAdaNilai) {
                $raportSelesai++;
            } else {
                $raportBelum++;
            }
        }
    }

    return view('dashboard', [

        'guru' => Guru::count(),

        'santri' => Santri::count(),

        'kelas' => Kelas::count(),

        'mapel' => Mapel::count(),

        'semester' => $semesterAktif,

        'tahun' => $tahunAktif,

        'kelasWali' => $kelasWali,

        'totalSantriWali' => $totalSantri,

        'raportSelesai' => $raportSelesai,

        'raportBelum' => $raportBelum,

        'persenSelesai' => $totalSantri > 0
            ? round(($raportSelesai / $totalSantri) * 100)
            : 0,

    ]);
}
}