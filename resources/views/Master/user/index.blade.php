@extends('layouts.dashboard')

@section('content')

<div class="page-heading">
    <h3>{{ $title }}</h3>
</div>

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            Daftar User
        </h5>

        <a href="{{ route($route.'.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Tambah User

        </a>

    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="table-light">

                    <tr>

                        <th width="60">No</th>

                        <th>Nama</th>

                        <th>Username</th>

                        <th>Email</th>

                        <th width="170">Role</th>

                        <th width="120">Status</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration + ($data->firstItem()-1) }}
                            </td>

                            <td>{{ $item->name }}</td>

                            <td>{{ $item->username }}</td>

                            <td>{{ $item->email }}</td>

                            <td>

                                @switch($item->role)

                                    @case('admin')

                                        <span class="badge bg-danger">
                                            Admin
                                        </span>

                                        @break

                                    @case('kepala_madrasah')

                                        <span class="badge bg-primary">
                                            Kepala Madrasah
                                        </span>

                                        @break

                                    @default

                                        <span class="badge bg-success">
                                            Ustadz/Ustadzah
                                        </span>

                                @endswitch

                            </td>

                            <td>

                                @if($item->status)

                                    <span class="badge bg-success">

                                        Aktif

                                    </span>

                                @else

                                    <span class="badge bg-secondary">

                                        Nonaktif

                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route($route.'.edit',$item->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form
                                    action="{{ route($route.'.destroy',$item->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Hapus user ini?')"
                                        class="btn btn-danger btn-sm">

                                        Hapus

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

        <div class="mt-3">

            {{ $data->links() }}

        </div>

    </div>

</div>

@endsection