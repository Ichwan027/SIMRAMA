@extends('layouts.dashboard')

@section('content')

<div class="page-heading">
    <h3>{{ $title }}</h3>
</div>

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h5 class="mb-0">Daftar Nilai Akademik</h5>

    </div>

    <div class="card-body">

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

                            <td>{{ $item->santri->nama }}</td>

                            <td>{{ $item->santri->kelas->nama }}</td>

                            <td>

                                <a href="{{ route('nilai.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="{{ route('nilai.print', $item->id) }}"
                                   class="btn btn-danger btn-sm"
                                   target="_blank">
                                    Cetak
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