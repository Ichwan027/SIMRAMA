<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Core\BaseCrudController;
use App\Http\Requests\Master\KelasRequest;
use App\Services\KelasService;
use App\Models\Guru;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KelasController extends BaseCrudController
{
    public function __construct(KelasService $service)
    {
        $this->service = $service;

        $this->view = 'Master.kelas';

        $this->route = 'kelas';

        $this->title = 'Kelas';
    }

    /**
     * Daftar kelas.
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
     * Form tambah.
     */
    public function create(): View
    {
        return view($this->view . '.create', [
            'title' => 'Tambah ' . $this->title,
            'route' => $this->route,
            'gurus' => Guru::whereDoesntHave('kelasWali')
                ->orderBy('nama')
                ->get(),
        ]);
    }

    /**
     * Simpan data.
     */
    public function store(KelasRequest $request): RedirectResponse
    {
        $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    /**
     * Detail.
     */
    public function show(int $id): View
    {
        return view($this->view . '.show', [
            'title' => 'Detail ' . $this->title,
            'route' => $this->route,
            'data'  => $this->service->find($id),
        ]);
    }

    /**
     * Form edit.
     */
    public function edit(int $id): View
    {
        $kelas = $this->service->find($id);

        $gurus = Guru::whereDoesntHave('kelasWali')
            ->orWhere('id', $kelas->wali_guru_id)
            ->orderBy('nama')
            ->get();

        return view($this->view . '.edit', [
            'title' => 'Edit ' . $this->title,
            'route' => $this->route,
            'data'  => $kelas,
            'gurus' => $gurus,
        ]);
    }

    /**
     * Update.
     */
    public function update(
        KelasRequest $request,
        int $id
    ): RedirectResponse {

        $this->service->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Hapus.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}
