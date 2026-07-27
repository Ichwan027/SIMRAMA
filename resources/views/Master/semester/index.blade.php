@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">

        <div class="page-title">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <h3>{{ $title }}</h3>

                </div>

                <div class="col-md-6 text-end">

                    <a href="{{ route($route . '.create') }}" class="btn btn-primary">

                        <i class="bi bi-plus-circle"></i>

                        Tambah Imda

                    </a>

                </div>

            </div>

        </div>

    </div>

    <section class="section">

        <div class="card">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-striped table-hover align-middle">

                        <thead>

                            <tr>

                                <th width="60">No</th>

                                <th>IMDA</th>

                                <th width="100">Urutan</th>

                                <th width="120">Status</th>

                                <th width="180" class="text-center">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($data as $item)
                                <tr>

                                    <td>

                                        {{ $loop->iteration + ($data->firstItem() - 1) }}

                                    </td>

                                    <td>

                                        <strong>{{ $item->nama }}</strong>

                                    </td>

                                    <td>

                                        {{ $item->urutan }}

                                    </td>

                                    <td>

                                        @if ($item->aktif)
                                            <span class="badge bg-success">

                                                Aktif

                                            </span>
                                        @else
                                            <span class="badge bg-danger">

                                                Nonaktif

                                            </span>
                                        @endif

                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route($route . '.show', $item->id) }}" class="btn btn-info btn-sm">

                                            <i class="bi bi-eye"></i>

                                        </a>

                                        <a href="{{ route($route . '.edit', $item->id) }}" class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <form action="{{ route($route . '.destroy', $item->id) }}" method="POST"
                                            class="d-inline">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center text-muted">

                                        Belum ada data.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-3">

                    {{ $data->links() }}

                </div>

            </div>

        </div>

    </section>
@endsection
