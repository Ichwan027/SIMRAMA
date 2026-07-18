<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Core\BaseCrudController;
use App\Http\Requests\Master\GuruRequest;
use App\Services\GuruService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GuruController extends BaseCrudController
{
    public function __construct(GuruService $service)
    {
        $this->service = $service;

        $this->view = 'Master.Guru';

        $this->route = 'guru';

        $this->title = 'Guru';
    }

    /**
     * Tampilkan daftar guru.
     */
    public function index(): View
    {
        $data = $this->service->paginate(10);

        return view($this->view . '.index', [
            'data'  => $data,
            'title' => $this->title,
        ]);
    }

    /**
     * Simpan data guru.
     */
    public function store(GuruRequest $request): RedirectResponse
    {
        $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data Guru berhasil ditambahkan.');
    }

    /**
     * Update data guru.
     */
    public function update(
        GuruRequest $request,
        int $id
    ): RedirectResponse {

        $this->service->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data Guru berhasil diperbarui.');
    }

    /**
     * Hapus data guru.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data Guru berhasil dihapus.');
    }
}
