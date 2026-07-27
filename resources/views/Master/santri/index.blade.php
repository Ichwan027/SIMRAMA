@extends('layouts.dashboard')

@section('title', 'Data Guru')

@section('content')

    <x-page-header title="Data Santri" subtitle="Kelola seluruh data santri madrasah">

        <a href="{{ route('santri.create') }}" class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Tambah Santri

        </a>

    </x-page-header>

    <x-form-card>

        <div class="table-responsive">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th width="60">No</th>

                        <th>Nama</th>

                        <th>NIS</th>

                        <th>Jenis Kelamin</th>

                        <th>Kelas</th>

                        <th>Status</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $santri)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $santri->nama }}</td>

                            <td>{{ $santri->nomor_induk }}</td>

                            <td>{{ $santri->jenis_kelamin }}</td>

                            <td>{{ $santri->kelas?->nama }}</td>

                            <td>

                                @if ($santri->status)
                                    <span class="badge bg-success">
                                        Aktif
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Nonaktif
                                    </span>
                                @endif

                            </td>

                            <td class="text-nowrap">

                                {{-- Show --}}
                                <a href="{{ route($route . '.show', $santri->id) }}" class="btn btn-info btn-sm" title="Detail">

                                    <i class="bi bi-eye"></i>

                                </a>

                                {{-- Edit --}}
                                <a href="{{ route($route . '.edit', $santri->id) }}" class="btn btn-warning btn-sm"
                                    title="Edit">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                {{-- Delete --}}
                                <form action="{{ route($route . '.destroy', $santri->id) }}" method="POST" class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center">

                                Belum ada data santri.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </x-form-card>

@endsection
