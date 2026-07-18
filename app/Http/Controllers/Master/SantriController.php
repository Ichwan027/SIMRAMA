<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Core\BaseCrudController;
use App\Http\Requests\Master\SantriRequest;
use App\Models\Kelas;
use App\Services\SantriService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SantriController extends BaseCrudController
{
    public function __construct(SantriService $service)
    {
        $this->service = $service;

        $this->view = 'Master.santri';

        $this->route = 'santri';

        $this->title = 'Santri';
    }

    /**
     * Daftar santri.
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
            'kelas' => Kelas::orderBy('nama')->get(),
        ]);
    }

    /**
     * Simpan data.
     */
    public function store(SantriRequest $request): RedirectResponse
    {

        // dd($request->validated());
        $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data Santri berhasil ditambahkan.');
    }

    /**
     * Detail data.
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
        return view($this->view . '.edit', [
            'title' => 'Edit ' . $this->title,
            'route' => $this->route,
            'data'  => $this->service->find($id),
            'kelas' => Kelas::orderBy('nama')->get(),
        ]);
    }

    /**
     * Update data.
     */
    public function update(
        SantriRequest $request,
        int $id
    ): RedirectResponse {

        $this->service->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data Santri berhasil diperbarui.');
    }

    /**
     * Hapus data.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data Santri berhasil dihapus.');
    }
}
