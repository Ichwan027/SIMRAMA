@extends('layouts.dashboard')

@section('content')
    <x-page-header title="{{ $title }}" subtitle="Kelola seluruh data nilai akademik santri">

    </x-page-header>

  <x-form-card>

    <div class="d-flex justify-content-between align-items-center mb-3">

        {{-- Search --}}
        <form action="{{ route('nilai.index') }}" method="GET"
            class="d-flex align-items-center gap-2">

            <input type="search"
                name="q"
                class="form-control"
                style="width: 260px"
                placeholder="Cari nama santri atau kelas"
                value="{{ request('q') }}">

            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
                Cari
            </button>

            @if(request('q'))
                <a href="{{ route('nilai.index') }}" class="btn btn-secondary">
                    Reset
                </a>
            @endif

        </form>

        {{-- Generate Nilai --}}
        <form action="{{ route('nilai.generate') }}" method="POST">
            @csrf

            <button type="submit"
                class="btn btn-success"
                onclick="return confirm('Generate data nilai semester aktif?')">

                <i class="bi bi-arrow-repeat"></i>
                Generate Nilai

            </button>

        </form>

    </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th width="60">No</th>
                        <th>Nama Santri</th>
                        <th>NIS</th>
                        <th>Jenis Kelamin</th>
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
                            <td>{{ $item->nomor_induk }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>

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
                                <a href="{{ route('nilai.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                @if ($item->nilaiAktif)
                                    <a href="{{ route('nilai.print', $item->nilaiAktif->id) }}"
                                        class="btn btn-danger btn-sm" target="_blank">
                                        <i class="bi bi-printer"></i>
                                    </a>
                                @else
                                    <button class="btn btn-secondary btn-sm" disabled>
                                        <i class="bi bi-printer"></i>
                                    </button>
                                @endif
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3 d-flex justify-content-end">
            {{ $data->appends(request()->except('page'))->links() }}
        </div>
    </x-form-card>
@endsection
