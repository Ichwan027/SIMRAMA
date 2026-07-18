@extends('layouts.dashboard')

@section('title', 'Data Guru')

@section('content')

<x-page-header
    title="Data Guru"
    subtitle="Kelola seluruh data guru madrasah">

    <a href="{{ route('guru.create') }}" class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Tambah Guru

    </a>

</x-page-header>

<x-form-card>

    <div class="table-responsive">

        <table class="table table-striped">

            <thead>

                <tr>

                    <th width="60">No</th>

                    <th>Nama</th>

                    <th>Jabatan</th>

                    <th>Telepon</th>

                    <th>Status</th>

                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($data as $guru)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $guru->nama }}</td>

                    <td>{{ $guru->jabatan }}</td>

                    <td>{{ $guru->telepon }}</td>

                    <td>

                        @if($guru->status)

                        <span class="badge bg-success">
                            Aktif
                        </span>

                        @else

                        <span class="badge bg-danger">
                            Nonaktif
                        </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('guru.show',$guru->id) }}"
                            class="btn btn-info btn-sm">

                            <i class="bi bi-eye"></i>

                        </a>

                        <a href="{{ route('guru.edit',$guru->id) }}"
                            class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil"></i>

                        </a>

                        <form
                            action="{{ route('guru.destroy',$guru->id) }}"
                            method="POST"
                            class="form-delete">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada data guru.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-form-card>

@endsection

@push('scripts')

<script>
    document.querySelectorAll('.form-delete').forEach(form => {

        form.addEventListener('submit', function(e) {

            e.preventDefault();

            Swal.fire({
                title: 'Yakin?',
                text: 'Data akan dihapus permanen.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });

        });

    });
</script>

@endpush