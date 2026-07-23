<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Core\BaseCrudController;
use App\Http\Requests\Master\SemesterRequest;
use App\Services\SemesterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SemesterController extends BaseCrudController
{
    public function __construct(SemesterService $service)
    {
        $this->service = $service;
        $this->view    = 'Master.semester';
        $this->route   = 'semester';
        $this->title   = 'Semester';
    }

    public function index(): View
    {
        return view($this->view.'.index',[
            'title'=>$this->title,
            'route'=>$this->route,
            'data'=>$this->service->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view($this->view.'.create',[
            'title'=>'Tambah '.$this->title,
            'route'=>$this->route,
        ]);
    }

    public function store(SemesterRequest $request): RedirectResponse
    {
        $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route($this->route.'.index')
            ->with('success','Data semester berhasil ditambahkan.');
    }

    public function show(int $id): View
    {
        return view($this->view.'.show',[
            'title'=>'Detail '.$this->title,
            'route'=>$this->route,
            'data'=>$this->service->find($id),
        ]);
    }

    public function edit(int $id): View
    {
        return view($this->view.'.edit',[
            'title'=>'Edit '.$this->title,
            'route'=>$this->route,
            'data'=>$this->service->find($id),
        ]);
    }

    public function update(SemesterRequest $request,int $id): RedirectResponse
    {
        $this->service->update(
            $id,
            $request->validated()
        );

        return redirect()
            ->route($this->route.'.index')
            ->with('success','Data semester berhasil diperbarui.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route($this->route.'.index')
            ->with('success','Data semester berhasil dihapus.');
    }
}