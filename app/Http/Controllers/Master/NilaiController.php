<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Core\BaseCrudController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\Master\NilaiRequest;
use App\Models\NilaiDetail;
use App\Models\Predikat;
use App\Models\Santri;
use App\Models\Semester;
use App\Models\TahunAjaran;
use App\Models\GuruMengajar;
use App\Models\DoaHarian;
use App\Models\Kepribadian;
use App\Models\NilaiKepribadian;
use App\Models\NilaiDoa;
use App\Models\Nilai;
use App\Models\Tahfidz;
use App\Models\NilaiTahfidz;
use App\Models\Absensi;
use App\Services\NilaiService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NilaiController extends BaseCrudController
{
    public function __construct(NilaiService $service)
    {
        $this->service = $service;

        $this->view = 'Master.nilai';

        $this->route = 'nilai';

        $this->title = 'Nilai Akademik';
    }

    /**
     * Daftar nilai.
     */
    public function index(): View
    {
        return view($this->view . '.edit', [

            'title' => $this->title,

            'route' => $this->route,

            'data' => $this->service->paginate(10),

        ]);
    }

    public function storeAkademik(Request $request, int $nilai)
    {

        foreach ($request->guru_mengajar_id as $i => $guruMengajar) {

            $angka = (int)$request->nilai_angka[$i];

            $predikat = Predikat::where('nilai_min', '<=', $angka)
                ->where('nilai_max', '>=', $angka)
                ->first();

            NilaiDetail::updateOrCreate(

                [

                    'nilai_id' => $nilai,

                    'guru_mengajar_id' => $guruMengajar,

                ],

                [

                    'kkm' => $request->kkm[$i],

                    'nilai_angka' => $angka,

                    'predikat_id' => $predikat?->id,

                    'deskripsi' => $request->deskripsi[$i],

                ]

            );
        }

        return back()->with(

            'success',

            'Nilai akademik berhasil disimpan.'

        );
    }

    /**
     * Form tambah.
     */
    public function create(): View
    {
        return view($this->view . '.create', [

            'title' => 'Tambah ' . $this->title,

            'route' => $this->route,

            'santris' => Santri::with('kelas')
                ->orderBy('nama')
                ->get(),

            'tahunAjarans' => TahunAjaran::where('aktif', 1)
                ->orderByDesc('id')
                ->get(),

            'semesters' => Semester::orderBy('id')
                ->get(),

        ]);
    }

    /**
     * Simpan.
     */
    public function store(
        NilaiRequest $request
    ): RedirectResponse {

        $nilai = $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.edit', $nilai->id)
            ->with('success', 'Silakan isi nilai raport.');
    }

    /**
     * Detail.
     */
    public function edit(int $id): View
    {
        $data = $this->service->find($id);

        // =========================
        // Nilai Akademik
        // =========================
        $guruMengajars = GuruMengajar::with([

            'guru',

            'mapel',

            'nilaiDetail' => function ($q) use ($id) {

                $q->where('nilai_id', $id)
                    ->with('predikat');
            }

        ])
            ->where('kelas_id', $data->santri->kelas_id)
            ->where('tahun_ajaran_id', $data->tahun_ajaran_id)
            ->where('semester_id', $data->semester_id)
            ->orderBy('mapel_id')
            ->get();

        // =========================
        // Nilai Doa
        // =========================
        $doaHarians = DoaHarian::orderBy('urutan')->get();

        $nilaiDoas = NilaiDoa::where('santri_id', $data->santri_id)
            ->where('tahun_ajaran_id', $data->tahun_ajaran_id)
            ->where('semester_id', $data->semester_id)
            ->get()
            ->keyBy('doa_harian_id');

        // =========================
        // Nilai Kepribadian
        // =========================
        $kepribadians = Kepribadian::orderBy('urutan')->get();

        $nilaiKepribadians = NilaiKepribadian::where('santri_id', $data->santri_id)
            ->where('tahun_ajaran_id', $data->tahun_ajaran_id)
            ->where('semester_id', $data->semester_id)
            ->get()
            ->keyBy('kepribadian_id');

        $tahfidzs = Tahfidz::orderBy('urutan')->get();

        $nilaiTahfidzs = NilaiTahfidz::where('santri_id', $data->santri_id)
            ->where('tahun_ajaran_id', $data->tahun_ajaran_id)
            ->where('semester_id', $data->semester_id)
            ->get()
            ->keyBy('tahfidz_id');

        $absensi = Absensi::firstOrCreate(
            [
                'santri_id'       => $data->santri_id,
                'tahun_ajaran_id' => $data->tahun_ajaran_id,
                'semester_id'     => $data->semester_id,
            ],
            [
                'sakit' => 0,
                'izin'  => 0,
                'alpha' => 0,
            ]
        );

        // =========================
        // View
        // =========================
        return view($this->view . '.edit', [

            'title' => 'Isi Raport',

            'route' => $this->route,

            'data' => $data,

            'guruMengajars' => $guruMengajars,

            'doaHarians' => $doaHarians,

            'nilaiDoas' => $nilaiDoas,

            'kepribadians' => $kepribadians,

            'nilaiKepribadians' => $nilaiKepribadians,

            'tahfidzs' => $tahfidzs,

            'nilaiTahfidzs' => $nilaiTahfidzs,

            'absensi' => $absensi,

        ]);
    }

    /**
     * Update.
     */
    public function update(
        NilaiRequest $request,
        int $id
    ): RedirectResponse {

        $this->service->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data nilai berhasil diperbarui.');
    }

    /**
     * Hapus.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data nilai berhasil dihapus.');
    }

    public function simpanNilaiDoa(Request $request, int $id)
    {
        $nilai = Nilai::findOrFail($id);

        foreach ($request->nilai as $doaId => $nilaiHuruf) {

            if (empty($nilaiHuruf)) {
                continue;
            }

            NilaiDoa::updateOrCreate(

                [

                    'santri_id'       => $nilai->santri_id,

                    'doa_harian_id'   => $doaId,

                    'tahun_ajaran_id' => $nilai->tahun_ajaran_id,

                    'semester_id'     => $nilai->semester_id,

                ],

                [

                    'nilai' => $nilaiHuruf,

                ]

            );
        }

        return back()->with(
            'success',
            'Nilai doa berhasil disimpan.'
        );
    }

    public function simpanNilaiKepribadian(Request $request, int $id)
    {
        $nilai = Nilai::findOrFail($id);

        foreach ($request->nilai as $kepribadianId => $nilaiHuruf) {

            if (empty($nilaiHuruf)) {
                continue;
            }

            NilaiKepribadian::updateOrCreate(

                [

                    'santri_id'       => $nilai->santri_id,

                    'kepribadian_id'  => $kepribadianId,

                    'tahun_ajaran_id' => $nilai->tahun_ajaran_id,

                    'semester_id'     => $nilai->semester_id,

                ],

                [

                    'nilai' => $nilaiHuruf,

                ]

            );
        }

        return back()->with(

            'success',

            'Nilai kepribadian berhasil disimpan.'

        );
    }

    public function simpanNilaiTahfidz(Request $request, int $id)
    {
        $nilai = Nilai::findOrFail($id);

        foreach ($request->nilai as $tahfidzId => $nilaiHuruf) {

            if (empty($nilaiHuruf)) {
                continue;
            }

            NilaiTahfidz::updateOrCreate(

                [

                    'santri_id'       => $nilai->santri_id,

                    'tahfidz_id'      => $tahfidzId,

                    'tahun_ajaran_id' => $nilai->tahun_ajaran_id,

                    'semester_id'     => $nilai->semester_id,

                ],

                [

                    'nilai' => $nilaiHuruf,

                ]

            );
        }

        return back()->with(
            'success',
            'Nilai Tahfidz berhasil disimpan.'
        );
    }

    public function simpanAbsensi(Request $request, int $id)
    {
        $request->validate([
            'sakit' => 'required|integer|min:0',
            'izin'  => 'required|integer|min:0',
            'alpha' => 'required|integer|min:0',
        ]);

        $nilai = Nilai::findOrFail($id);

        Absensi::updateOrCreate(

            [

                'santri_id'       => $nilai->santri_id,

                'tahun_ajaran_id' => $nilai->tahun_ajaran_id,

                'semester_id'     => $nilai->semester_id,

            ],

            [

                'sakit' => $request->sakit,

                'izin'  => $request->izin,

                'alpha' => $request->alpha,

            ]

        );

        return back()->with(

            'success',

            'Absensi berhasil disimpan.'

        );
    }

    public function simpanCatatan(Request $request, int $id)
    {
        $request->validate([

            'catatan' => 'nullable|string',

        ]);

        $nilai = Nilai::findOrFail($id);

        $nilai->update([

            'catatan' => $request->catatan,

        ]);

        return back()->with(

            'success',

            'Catatan berhasil disimpan.'

        );
    }

    public function cetak(int $id)
    {
        /*
    |--------------------------------------------------------------------------
    | Data Raport
    |--------------------------------------------------------------------------
    */

        $data = Nilai::with([
            'santri.kelas',
            'tahunAjaran',
            'semester',
        ])->findOrFail($id);

        /*
    |--------------------------------------------------------------------------
    | Nilai Akademik
    |--------------------------------------------------------------------------
    */

        $guruMengajars = GuruMengajar::with([
            'mapel',
            'guru',
            'nilaiDetail' => function ($q) use ($id) {
                $q->where('nilai_id', $id)
                    ->with('predikat');
            }
        ])
            ->where('kelas_id', $data->santri->kelas_id)
            ->where('tahun_ajaran_id', $data->tahun_ajaran_id)
            ->where('semester_id', $data->semester_id)
            ->orderBy('mapel_id')
            ->get();

        /*
    |--------------------------------------------------------------------------
    | Doa
    |--------------------------------------------------------------------------
    */

        $doaHarians = DoaHarian::orderBy('urutan')->get();

        $nilaiDoas = NilaiDoa::where('santri_id', $data->santri_id)
            ->where('tahun_ajaran_id', $data->tahun_ajaran_id)
            ->where('semester_id', $data->semester_id)
            ->get()
            ->keyBy('doa_harian_id');

        /*
    |--------------------------------------------------------------------------
    | Kepribadian
    |--------------------------------------------------------------------------
    */

        $kepribadians = Kepribadian::orderBy('urutan')->get();

        $nilaiKepribadians = NilaiKepribadian::where('santri_id', $data->santri_id)
            ->where('tahun_ajaran_id', $data->tahun_ajaran_id)
            ->where('semester_id', $data->semester_id)
            ->get()
            ->keyBy('kepribadian_id');

        /*
    |--------------------------------------------------------------------------
    | Tahfidz
    |--------------------------------------------------------------------------
    */

        $tahfidzs = Tahfidz::orderBy('urutan')->get();

        $nilaiTahfidzs = NilaiTahfidz::where('santri_id', $data->santri_id)
            ->where('tahun_ajaran_id', $data->tahun_ajaran_id)
            ->where('semester_id', $data->semester_id)
            ->get()
            ->keyBy('tahfidz_id');

        /*
    |--------------------------------------------------------------------------
    | Absensi
    |--------------------------------------------------------------------------
    */

        $absensi = Absensi::where('santri_id', $data->santri_id)
            ->where('tahun_ajaran_id', $data->tahun_ajaran_id)
            ->where('semester_id', $data->semester_id)
            ->first();

        $guruMengajars->each(function ($item) {

            $nilai = $item->nilaiDetail->nilai_angka ?? 0;

            $item->huruf = $this->terbilang($nilai);
        });

        /*
    |--------------------------------------------------------------------------
    | TEST HTML (sementara)
    |--------------------------------------------------------------------------
    | Aktifkan hanya untuk mengecek tampilan Blade.
    | Setelah normal, comment kembali.
    |--------------------------------------------------------------------------
    */


        return view('Master.nilai.print', compact(
            'data',
            'guruMengajars',
            'doaHarians',
            'nilaiDoas',
            'kepribadians',
            'nilaiKepribadians',
            'tahfidzs',
            'nilaiTahfidzs',
            'absensi'
        ));


        /*
    |--------------------------------------------------------------------------
    | Generate PDF
    |--------------------------------------------------------------------------
    */

        $pdf = Pdf::loadView(
            'Master.nilai.print',
            compact(
                'data',
                'guruMengajars',
                'doaHarians',
                'nilaiDoas',
                'kepribadians',
                'nilaiKepribadians',
                'tahfidzs',
                'nilaiTahfidzs',
                'absensi'
            )
        );

        $pdf->setPaper([0, 0, 595.28, 935.43], 'portrait');

        return $pdf->stream(
            'Raport-' . $data->santri->nama . '.pdf'
        );
    }

    private function terbilang(int $nilai): string
    {
        $angka = [
            "",
            "Satu",
            "Dua",
            "Tiga",
            "Empat",
            "Lima",
            "Enam",
            "Tujuh",
            "Delapan",
            "Sembilan"
        ];

        if ($nilai == 0) {
            return "-";
        }

        if ($nilai < 10) {
            return $angka[$nilai];
        }

        if ($nilai < 20) {
            return $angka[$nilai - 10] . " Belas";
        }

        if ($nilai < 100) {
            $puluh = intval($nilai / 10);
            $sisa = $nilai % 10;

            return $angka[$puluh] . " Puluh" . ($sisa ? " " . $angka[$sisa] : "");
        }

        if ($nilai == 100) {
            return "Seratus";
        }

        return (string) $nilai;
    }
}
