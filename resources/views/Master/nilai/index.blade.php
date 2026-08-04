@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>

    <div class="card">

        <div class="d-flex justify-content-between mb-3">



            <form action="{{ route('nilai.generate') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-success" onclick="return confirm('Generate data nilai semester aktif?')">

                    <i class="bi bi-arrow-repeat"></i>
                    Generate Nilai

                </button>
            </form>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead>

                        <tr>
                            <th width="60">No</th>
                            <th>Nama Santri</th>
                            <th>Kelas</th>
                            <th>Status Raport</th>
                            <th width="170">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)
                            <tr>

                                <td>{{ $loop->iteration + ($data->firstItem() - 1) }}</td>

                                <td>{{ $item->nama }}</td>

                                <td>{{ $item->kelas?->nama ?? '-' }}</td>

                                <td>
                                    @if ($item->status_raport == 'lengkap')
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Lengkap
                                        </span>
                                    @elseif($item->status_raport == 'sebagian')
                                        <span class="badge bg-warning text-dark">
                                            <i class="bi bi-hourglass-split"></i>
                                            Sebagian
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            <i class="bi bi-x-circle-fill"></i>
                                            Belum
                                        </span>
                                    @endif
                                </td>

                                <td>

                                    <a href="{{ route('nilai.edit',$item->id) }}"
    class="btn btn-warning btn-sm">
    Edit
</a>

@if($item->nilaiAktif)

    <a href="{{ route('nilai.print',$item->nilaiAktif->id) }}"
        class="btn btn-danger btn-sm"
        target="_blank">
        Cetak
    </a>

@else

    <button class="btn btn-secondary btn-sm" disabled>
        Cetak
    </button>

@endif

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
