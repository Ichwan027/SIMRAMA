<?php

namespace App\Core\Repositories;

use App\Models\Nilai;
use App\Models\Santri;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Helpers\AccessHelper;

class NilaiRepository extends BaseRepository
{
    public function __construct(Nilai $model)
    {
        parent::__construct($model);
    }

    /**
     * Load seluruh relasi.
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        $query = Santri::with('kelas')
    ->orderBy('nama');

// Admin
if (AccessHelper::isSuperUser()) {

    // tidak perlu return
}

// Ustadz
elseif (AccessHelper::isUstadz()) {

    $kelasId = AccessHelper::kelasId();

    if ($kelasId) {
        $query->where('kelas_id', $kelasId);
    } else {
        $query->whereRaw('1=0');
    }
}

$paginator = $query->paginate($perPage);

        // dd('MASUK REPOSITORY');

        // Tambahkan atribut status_raport pada setiap item koleksi
        try {
            $semester = \App\Models\Semester::where('aktif', 1)->first();
            $tahun = \App\Models\TahunAjaran::where('aktif', 1)->first();

            // Kita akan menghitung required per-santri di dalam transform,
            // sehingga tilawati/tahfidz/doa hanya dihitung jika santri tersebut
            // benar-benar memiliki data untuk section tersebut.

            $paginator->getCollection()->transform(function ($santri) use ($semester, $tahun) {

                // Default
                $santri->status_raport = 'belum';

                if (! $semester || ! $tahun) {
                    return $santri;
                }

                $nilai = \App\Models\Nilai::where('santri_id', $santri->id)
                    ->where('tahun_ajaran_id', $tahun->id)
                    ->where('semester_id', $semester->id)
                    ->first();

                $santri->nilaiAktif = $nilai;

                if (! $nilai) {
                    $santri->status_raport = 'belum';
                    return $santri;
                }

                $sections = ['akademik'];
                $completed = 0;

                // Akademik
                if (\App\Models\NilaiDetail::where('nilai_id', $nilai->id)->exists()) {
                    $completed++;
                }

                // Doa (hitung hanya jika santri punya data doa)
                if (\App\Models\NilaiDoa::where('santri_id', $santri->id)
                    ->where('tahun_ajaran_id', $tahun->id)
                    ->where('semester_id', $semester->id)
                    ->exists()
                ) {
                    $sections[] = 'doa';
                    $completed++;
                }

                // Kepribadian
                if (\App\Models\NilaiKepribadian::where('santri_id', $santri->id)
                    ->where('tahun_ajaran_id', $tahun->id)
                    ->where('semester_id', $semester->id)
                    ->exists()
                ) {
                    $sections[] = 'kepribadian';
                    $completed++;
                }

                // Tilawati
                // if (\App\Models\NilaiTilawati::where('nilai_id', $nilai->id)->exists()) {
                //     $sections[] = 'tilawati';
                //     $completed++;
                // }

                // Tahfidz
                // if (\App\Models\NilaiTahfidz::where('santri_id', $santri->id)
                //     ->where('tahun_ajaran_id', $tahun->id)
                //     ->where('semester_id', $semester->id)
                //     ->exists()
                // ) {
                //     $sections[] = 'tahfidz';
                //     $completed++;
                // }

                // Absensi
                if (\App\Models\Absensi::where('santri_id', $santri->id)
                    ->where('tahun_ajaran_id', $tahun->id)
                    ->where('semester_id', $semester->id)
                    ->exists()
                ) {
                    $sections[] = 'absensi';
                    $completed++;
                }

                $totalSections = count($sections);

                if ($completed == 0) {
                    $santri->status_raport = 'belum';
                } elseif ($completed >= $totalSections) {
                    $santri->status_raport = 'lengkap';
                } else {
                    $santri->status_raport = 'sebagian';
                }

                return $santri;
            });
        } catch (\Throwable $e) {
            // Jika terjadi error, biarkan status default 'belum'
        }

        return $paginator;
    }

    public function find(int $id): ?\Illuminate\Database\Eloquent\Model
    {
        $nilai = $this->model
            ->with([
                'santri.kelas',
                'tahunAjaran',
                'semester',
                'details.guruMengajar.guru',
                'details.guruMengajar.mapel',
                'details.predikat',
            ])
            ->findOrFail($id);

        if (AccessHelper::isSuperUser()) {
            return $nilai;
        }

        if (AccessHelper::isUstadz()) {

            if ($nilai->santri->kelas_id != AccessHelper::kelasId()) {
                abort(403, 'Anda tidak memiliki hak mengakses data ini.');
            }

            return $nilai;
        }

        abort(403);
    }
}
