<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Core\BaseCrudController;
use App\Http\Requests\Master\SantriRequest;
use App\Models\Kelas;
use App\Services\SantriService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Exports\SantriTemplateExport;
use App\Imports\SantriImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class SantriController extends BaseCrudController
{
    public function __construct(SantriService $service)
    {
        $this->service = $service;

        $this->view = 'Master.santri';

        $this->route = 'santri';

        $this->title = 'Santri';
    }

    public function downloadTemplate()
    {
        return Excel::download(
            new SantriTemplateExport(),
            'Template_Santri.xlsx'
        );
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(
            new SantriImport(),
            $request->file('file')
        );

        return redirect()
            ->route('santri.index')
            ->with('success', 'Import data santri berhasil.');
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
