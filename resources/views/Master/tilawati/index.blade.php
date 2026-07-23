@extends('layouts.dashboard')

@section('content')

<div class="page-heading">

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h3>{{ $title }}</h3>

            <p class="text-muted">
                Data Master Tilawati
            </p>

        </div>

        <a href="{{ route($route.'.create') }}" class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Tambah

        </a>

    </div>

</div>

<div class="card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th width="6%">No</th>

                        <th>Nama Tilawati</th>

                        <th width="10%">Urutan</th>

                        <th width="12%">Status</th>

                        <th width="18%">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $item)

                        <tr>

                            <td class="text-center">

                                {{ $loop->iteration + ($data->firstItem() - 1) }}

                            </td>

                            <td>

                                {{ $item->nama }}

                            </td>

                            <td class="text-center">

                                {{ $item->urutan }}

                            </td>

                            <td class="text-center">

                                @if($item->status)

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

                                <a href="{{ route($route.'.show',$item->id) }}"
                                   class="btn btn-info btn-sm">

                                    <i class="bi bi-eye"></i>

                                </a>

                                <a href="{{ route($route.'.edit',$item->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <form
                                    action="{{ route($route.'.destroy',$item->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Hapus data?')"
                                        class="btn btn-danger btn-sm">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center">

                                Tidak ada data.

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