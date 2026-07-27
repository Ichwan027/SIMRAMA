<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Core\BaseCrudController;
use App\Http\Requests\Master\UserRequest;
use App\Models\Guru;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends BaseCrudController
{
    public function __construct(UserService $service)
    {
        $this->service = $service;

        $this->view  = 'Master.user';
        $this->route = 'user';
        $this->title = 'Kelola User';
    }

    /**
     * Daftar User.
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
     * Form tambah user.
     */
    public function create(): View
    {
        return view($this->view . '.create', [
            'title'  => 'Tambah ' . $this->title,
            'route'  => $this->route,
            'gurus'  => Guru::where('status', true)
                ->orderBy('nama')
                ->get(),
        ]);
    }

    /**
     * Simpan user.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Form edit user.
     */
    public function edit(int $id): View
    {
        return view($this->view . '.edit', [
            'title'  => 'Edit ' . $this->title,
            'route'  => $this->route,
            'data'   => $this->service->find($id),
            'gurus'  => Guru::where('status', true)
                ->orderBy('nama')
                ->get(),
        ]);
    }

    /**
     * Update user.
     */
    public function update(UserRequest $request, int $id): RedirectResponse
    {
        $this->service->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Hapus user.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route($this->route . '.index')
            ->with('success', 'User berhasil dihapus.');
    }
}
