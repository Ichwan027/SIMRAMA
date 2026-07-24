@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>

    <div class="card">

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead>

                        <tr>
                            <th width="60">No</th>
                            <th>Nama Santri</th>
                            <th>Kelas</th>
                            <th width="170">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                            <tr>

                                <td>{{ $loop->iteration + ($data->firstItem() - 1) }}</td>

                                <td>{{ $item->nama }}</td>

                                <td>{{ $item->kelas?->nama }}</td>

                                <td>

                                    <a href="{{ route('absensi.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm">

                                        Isi Absensi

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center">

                                    Tidak ada data

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