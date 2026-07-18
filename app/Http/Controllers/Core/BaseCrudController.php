<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Core\Contracts\CrudServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;



abstract class BaseCrudController extends Controller
{

    protected string $view;

    protected string $route;

    protected string $title;

    protected CrudServiceInterface $service;

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
     * Hapus data.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route($this->route . '.index')
            ->with('success', $this->title . ' berhasil dihapus.');
    }

    /**
     * Detail data.
     */
    public function show(int $id): View
    {
        return view($this->view . '.show', [

            'title' => 'Detail ' . $this->title,

            'route' => $this->route,

            'data' => $this->service->find($id),

        ]);
    }
}
