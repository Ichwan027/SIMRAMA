<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Core\BaseCrudController;
use App\Http\Requests\Master\MapelRequest;
use App\Services\MapelService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MapelController extends BaseCrudController
{
    public function __construct(MapelService $service)
    {
        $this->service = $service;
        $this->view    = 'Master.mapel';
        $this->route   = 'mapel';
        $this->title   = 'Mata Pelajaran';
    }

    public function index(): View
    {
        return view($this->view.'.index', [
            'title' => $this->title,
            'route' => $this->route,
            'data'  => $this->service->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view($this->view.'.create', [
            'title' => 'Tambah '.$this->title,
            'route' => $this->route,
        ]);
    }

    public function store(MapelRequest $request): RedirectResponse
    {
        $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route($this->route.'.index')
            ->with('success', 'Data mata pelajaran berhasil ditambahkan.');
    }

    public function show(int $id): View
    {
        return view($this->view.'.show', [
            'title' => 'Detail '.$this->title,
            'route' => $this->route,
            'data'  => $this->service->find($id),
        ]);
    }

    public function edit(int $id): View
    {
        return view($this->view.'.edit', [
            'title' => 'Edit '.$this->title,
            'route' => $this->route,
            'data'  => $this->service->find($id),
        ]);
    }

    public function update(MapelRequest $request, int $id): RedirectResponse
    {
        $this->service->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route($this->route.'.index')
            ->with('success', 'Data mata pelajaran berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route($this->route.'.index')
            ->with('success', 'Data mata pelajaran berhasil dihapus.');
    }
}