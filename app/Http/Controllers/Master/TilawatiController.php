<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Core\BaseCrudController;
use App\Http\Requests\Master\TilawatiRequest;
use App\Services\TilawatiService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TilawatiController extends BaseCrudController
{
    public function __construct(TilawatiService $service)
    {
        $this->service = $service;

        $this->view = 'Master.tilawati';

        $this->route = 'tilawati';

        $this->title = 'Tilawati';
    }

    /**
     * Daftar data.
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
        ]);
    }

    /**
     * Simpan data.
     */
    public function store(TilawatiRequest $request): RedirectResponse
    {
        $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data Tilawati berhasil ditambahkan.');
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
        return view($this->view . '.edit', [
            'title' => 'Edit ' . $this->title,
            'route' => $this->route,
            'data'  => $this->service->find($id),
        ]);
    }

    /**
     * Update data.
     */
    public function update(
        TilawatiRequest $request,
        int $id
    ): RedirectResponse {

        $this->service->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data Tilawati berhasil diperbarui.');
    }

    /**
     * Hapus data.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data Tilawati berhasil dihapus.');
    }
}