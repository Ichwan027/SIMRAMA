<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Core\BaseCrudController;
use App\Services\AbsensiService;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AbsensiController extends BaseCrudController
{
    public function __construct(AbsensiService $service)
    {
        $this->service = $service;

        $this->view  = 'Master.absensi';
        $this->route = 'absensi';
        $this->title = 'Absensi Santri';
    }

    /**
     * Daftar seluruh santri
     */
    public function index(): View
    {
        return view($this->view . '.index', [
            'title' => $this->title,
            'route' => $this->route,
            'data'  => $this->service->paginate(10),
        ]);
    }

    /**
     * Form isi absensi
     */
    public function edit(int $id): View
    {
        $santri = Santri::with('kelas')->findOrFail($id);

        $absensi = $this->service->findOrCreateBySantri($id);

        return view($this->view . '.edit', [
            'title'    => 'Isi Absensi',
            'route'    => $this->route,
            'santri'   => $santri,
            'absensi'  => $absensi,
        ]);
    }

    /**
     * Simpan absensi
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'sakit' => ['required', 'integer', 'min:0'],
            'izin'  => ['required', 'integer', 'min:0'],
            'alpha' => ['required', 'integer', 'min:0'],
        ]);

        $this->service->updateAbsensi($id, $request->only([
            'sakit',
            'izin',
            'alpha',
        ]));

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Absensi berhasil disimpan.');
    }
}
