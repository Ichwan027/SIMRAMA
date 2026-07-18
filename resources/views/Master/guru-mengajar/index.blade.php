@extends('layouts.dashboard')

@section('content')

<div class="page-heading">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>

            <h3>{{ $title }}</h3>

            <p class="text-muted">
                Kelola data guru mengajar
            </p>

        </div>

        <a href="{{ route($route.'.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Tambah Data

        </a>

    </div>

</div>

<div class="card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-striped table-hover">

                <thead>

                    <tr>

                        <th width="5%">No</th>

                        <th>Guru</th>

                        <th>Kelas</th>

                        <th>Mapel</th>

                        <th>Tahun Ajaran</th>

                        <th>Semester</th>

                        <th width="150">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $item)

                    <tr>

                        <td>

                            {{ $loop->iteration + ($data->currentPage()-1) * $data->perPage() }}

                        </td>

                        <td>

                            {{ $item->guru->nama }}

                        </td>

                        <td>

                            {{ $item->kelas->nama }}

                        </td>

                        <td>

                            {{ $item->mapel->nama }}

                        </td>

                        <td>

                            {{ $item->tahunAjaran->tahun }}

                        </td>

                        <td>

                            {{ $item->semester->nama }}

                        </td>

                        <td>

                            <a href="{{ route($route.'.show',$item->id) }}"
                               class="btn btn-info btn-sm">

                                <i class="bi bi-eye"></i>

                            </a>

                            <a href="{{ route($route.'.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil"></i>

                            </a>

                            <form action="{{ route($route.'.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data ini?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7"
                            class="text-center">

                            Belum ada data.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{ $data->links() }}

    </div>

</div>

@endsection