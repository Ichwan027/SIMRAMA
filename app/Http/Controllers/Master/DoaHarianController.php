<?php

namespace App\Http\Controllers\Master;

use Illuminate\View\View;
use App\Services\DoaHarianService;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Core\BaseCrudController;
use App\Http\Requests\Master\DoaHarianRequest;

class DoaHarianController extends BaseCrudController
{
    public function __construct(DoaHarianService $service)
    {
        $this->service = $service;
        $this->view    = 'Master.doa-harian';
        $this->route   = 'doa-harian';
        $this->title   = 'Doa Harian';
    }

    public function index(): View
    {
        return view($this->view . '.index', [
            'title' => $this->title,
            'route' => $this->route,
            'data' => $this->service->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view($this->view . '.create', [
            'title' => 'Tambah ' . $this->title,
            'route' => $this->route,
        ]);
    }

    public function store(DoaHarianRequest $request): RedirectResponse
    {
        $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(int $id): View
    {
        return view($this->view . '.show', [
            'title' => 'Detail ' . $this->title,
            'route' => $this->route,
            'data' => $this->service->find($id),
        ]);
    }

    public function edit(int $id): View
    {
        return view($this->view . '.edit', [
            'title' => 'Edit ' . $this->title,
            'route' => $this->route,
            'data' => $this->service->find($id),
        ]);
    }

    public function update(DoaHarianRequest $request, int $id): RedirectResponse
    {
        $this->service->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
