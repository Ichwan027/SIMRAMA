@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="page-heading">
    <h3>Dashboard</h3>
</div>

<section class="section">

    <div class="row">

        <div class="card">

            <div class="card-header">

                <h5>Selamat Datang</h5>

            </div>

            <div class="card-body">

                Selamat datang di Sistem Informasi Raport Madrasah (SIMRAMA).

            </div>

        </div>

        {{-- Guru --}}
        <div class="col-xl-3 col-md-6 col-sm-6">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">Guru</h6>

                            <h3>{{ $guru }}</h3>

                        </div>

                        <div class="avatar avatar-lg bg-primary">

                            <span class="avatar-content">

                                <i class="bi bi-person-workspace fs-3"></i>

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Santri --}}
        <div class="col-xl-3 col-md-6 col-sm-6">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">Santri</h6>

                            <h3>{{ $santri }}</h3>

                        </div>

                        <div class="avatar avatar-lg bg-success">

                            <span class="avatar-content">

                                <i class="bi bi-people-fill fs-3"></i>

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Kelas --}}
        <div class="col-xl-3 col-md-6 col-sm-6">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">Kelas</h6>

                            <h3>{{ $kelas }}</h3>

                        </div>

                        <div class="avatar avatar-lg bg-warning">

                            <span class="avatar-content">

                                <i class="bi bi-building fs-3"></i>

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Mapel --}}
        <div class="col-xl-3 col-md-6 col-sm-6">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">Mata Pelajaran</h6>

                            <h3>{{ $mapel }}</h3>

                        </div>

                        <div class="avatar avatar-lg bg-danger">

                            <span class="avatar-content">

                                <i class="bi bi-book fs-3"></i>

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-6">

            <div class="card">

                <div class="card-header">

                    <h5>Semester Aktif</h5>

                </div>

                <div class="card-body">

                    <h3>

                        {{ $semester?->nama ?? '-' }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card">

                <div class="card-header">

                    <h5>Tahun Ajaran Aktif</h5>

                </div>

                <div class="card-body">

                    <h3>

                        {{ $tahun?->tahun ?? '-' }}

                    </h3>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection