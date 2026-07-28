<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Core\BaseCrudController;
use App\Http\Requests\Akademik\GuruMengajarRequest;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Semester;
use App\Models\TahunAjaran;
use App\Services\GuruMengajarService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Helpers\AccessHelper;

class GuruMengajarController extends BaseCrudController
{
    public function __construct(GuruMengajarService $service)
    {

        abort_unless(
            AccessHelper::isAdminOrKepala(),
            403,
            'Anda tidak memiliki hak akses.'
        );

        $this->service = $service;

        $this->view = 'Master.guru-mengajar';

        $this->route = 'guru-mengajar';

        $this->title = 'Guru Mengajar';
    }

    /**
     * Daftar data.
     */
    public function index(): View
    {
        return view($this->view . '.index', [

            'title' => $this->title,

            'route' => $this->route,

            'data' => $this->service->paginate(10),

        ]);
    }

    /**
     * Form tambah.
     */
    public function create(): View
    {
        return view($this->view . '.create', [

            'title' => 'Tambah ' . $this->title,

            'route' => $this->route,

            'gurus' => Guru::orderBy('nama')->get(),

            'kelas' => Kelas::orderBy('urutan')->get(),

            'mapels' => Mapel::orderBy('nama')->get(),

            'tahunAjarans' => TahunAjaran::orderByDesc('id')->get(),

            'semesters' => Semester::orderBy('id')->get(),

        ]);
    }

    /**
     * Simpan.
     */
    public function store(
        GuruMengajarRequest $request
    ): RedirectResponse {

        $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Detail.
     */
    public function show(int $id): View
    {
        return view($this->view . '.show', [

            'title' => 'Detail ' . $this->title,

            'route' => $this->route,

            'data' => $this->service->find($id),

        ]);
    }

    /**
     * Form edit.
     */
    public function edit(int $id): View
    {
        return view($this->view . '.edit', [

            'title' => 'Edit ' . $this->title,

            'route' => $this->route,

            'data' => $this->service->find($id),

            'gurus' => Guru::orderBy('nama')->get(),

            'kelas' => Kelas::orderBy('urutan')->get(),

            'mapels' => Mapel::orderBy('nama')->get(),

            'tahunAjarans' => TahunAjaran::orderByDesc('id')->get(),

            'semesters' => Semester::orderBy('id')->get(),

        ]);
    }

    /**
     * Update.
     */
    public function update(
        GuruMengajarRequest $request,
        int $id
    ): RedirectResponse {

        $this->service->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Hapus.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
