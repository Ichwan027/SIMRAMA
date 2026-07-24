@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>

    <div class="card">

        <div class="card-body">

            <form action="{{ route($route . '.update', $absensi->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Santri
                            </label>

                            <input type="text" class="form-control" value="{{ $santri->nama }}" readonly>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">
                                Kelas
                            </label>

                            <input type="text" class="form-control" value="{{ $santri->kelas?->nama }}" readonly>

                        </div>

                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">
                                Sakit
                            </label>

                            <input type="number" name="sakit" class="form-control @error('sakit') is-invalid @enderror"
                                value="{{ old('sakit', $absensi->sakit) }}" min="0">

                            @error('sakit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">
                                Izin
                            </label>

                            <input type="number" name="izin" class="form-control @error('izin') is-invalid @enderror"
                                value="{{ old('izin', $absensi->izin) }}" min="0">

                            @error('izin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">
                                Alpha
                            </label>

                            <input type="number" name="alpha" class="form-control @error('alpha') is-invalid @enderror"
                                value="{{ old('alpha', $absensi->alpha) }}" min="0">

                            @error('alpha')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

                <div class="mt-3">

                    <button type="submit" class="btn btn-primary">

                        Simpan

                    </button>

                    <a href="{{ route($route . '.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
