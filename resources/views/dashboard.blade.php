@php

    use Carbon\Carbon;

    Carbon::setLocale('id');

    $user = auth()->user();

    $role = match ($user->role) {
        'admin' => 'Administrator Sistem',
        'ustadz' => 'Guru / Wali Kelas',
        default => 'Pengguna',
    };

    $deskripsi = match ($user->role) {
        'admin'
            => 'Kelola seluruh data master, pengguna, akademik, raport serta aktivitas Sistem Informasi Raport Madrasah (SIMRAMA).',

        'ustadz' => 'Input nilai, absensi dan raport santri pada kelas yang menjadi tanggung jawab Anda.',

        default => 'Selamat menggunakan Sistem Informasi Raport Madrasah.',
    };

@endphp

@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

    <div class="page-heading">

        <div class="d-flex justify-content-between align-items-start">

            {{-- Judul Halaman --}}
            <div>
                <h2 class="fw-bold mb-1">
                    Dashboard
                </h2>

                <small class="text-muted">
                    Sistem Informasi Raport Madrasah
                </small>
            </div>

            {{-- Informasi User --}}
            <div class="d-flex align-items-center gap-3 ms-auto">
                <span class="text-muted small d-none d-md-inline">
                    {{ auth()->user()->name }}
                </span>
                <span class="badge bg-primary rounded-pill d-none d-md-inline">
                    {{ ucfirst(str_replace('_', ' ', auth()->user()->role)) }}
                </span>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary btn-sm rounded-circle p-1"
                    title="Profile">
                    <i class="bi bi-person-circle fs-5"></i>
                </a>
            </div>

        </div>

    </div>

    <section class="section">

        <div class="container-fluid p-0">

            <div class="row g-4">

                {{-- ========================= --}}
                {{-- WELCOME CARD --}}
                {{-- ========================= --}}

                <div class="col-lg-8">

                    <div class="card border-0 shadow-lg welcome-card">

                        <div class="card-body p-4">

                            <div class="d-flex justify-content-between align-items-start">

                                <div>

                                    <span class="badge bg-light text-primary px-3 py-2 mb-3">

                                        SIMRAMA

                                    </span>

                                    <h2 class="fw-bold text-white">

                                        👋 Selamat Datang,

                                    </h2>

                                    <h2 class="fw-bold text-white mb-1">

                                        {{ $user->name }}

                                    </h2>

                                    <h5 class="text-white-50">

                                        {{ $role }}

                                    </h5>

                                </div>

                                <div>

                                    <i class="bi bi-mortarboard-fill text-white display-1 opacity-50"></i>

                                </div>

                            </div>

                            <p class="text-white-50 mt-4">

                                {{ $deskripsi }}

                            </p>

                            <div class="row mt-4">

                                <div class="col-md-4">

                                    <small class="text-white-50">

                                        Login Terakhir

                                    </small>

                                    <h6 class="text-white mt-2">

                                        {{ optional($user->last_login_at)->translatedFormat('l, d F Y • H:i') ?? 'Login Pertama' }}

                                        WIB

                                    </h6>

                                </div>

                                <div class="col-md-4">

                                    <small class="text-white-50">

                                        Username

                                    </small>

                                    <h6 class="text-white mt-2">

                                        {{ $user->username }}

                                    </h6>

                                </div>

                                <div class="col-md-4">

                                    <small class="text-white-50">

                                        Hak Akses

                                    </small>

                                    <br>

                                    <span class="badge bg-warning text-dark mt-2 px-3 py-2">

                                        {{ strtoupper($user->role) }}

                                        @if ($user->isUstadz() && isset($kelasWali) && $kelasWali)
                                            - {{ $kelasWali->nama }}
                                        @endif

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- ========================= --}}
                {{-- WEATHER CARD --}}
                {{-- ========================= --}}

                <div class="col-lg-4">

                    <div id="weatherCard" class="card border-0 shadow-lg weather-card">

                        <div class="card-body text-center p-4">

                            <div id="weatherIcon" class="display-1">

                                ☀️

                            </div>

                            <h1 id="temperature" class="text-white fw-bold mt-2">

                                --

                            </h1>

                            <div id="weatherDescription" class="text-white-50">

                                Memuat cuaca...

                            </div>

                            <hr class="border-light">

                            <h5 class="text-white">

                                📍 Surabaya

                            </h5>

                            <div class="row mt-4">

                                <div class="col-6">

                                    <small class="text-white-50">

                                        Kelembapan

                                    </small>

                                    <h4 id="humidity" class="text-white">

                                        --

                                    </h4>

                                </div>

                                <div class="col-6">

                                    <small class="text-white-50">

                                        Angin

                                    </small>

                                    <h4 id="wind" class="text-white">

                                        --

                                    </h4>

                                </div>

                            </div>

                            <hr class="border-light">

                            <h2 id="clock" class="text-white fw-bold">

                            </h2>

                            <div id="date" class="text-white-50">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- ===================================================== --}}
            {{-- STATISTIK --}}
            {{-- ===================================================== --}}

            <div class="row g-4 mt-1">

                {{-- Guru --}}
                <div class="col-xl-3 col-md-6">

                    <div class="card stat-card stat-primary border-0 shadow-sm h-100">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <small class="text-muted">

                                        Total Guru

                                    </small>

                                    <h2 class="fw-bold mt-2 mb-0">

                                        <span id="guruCounter">

                                            {{ $guru }}

                                        </span>

                                    </h2>

                                    <small class="text-muted">

                                        Orang

                                    </small>

                                </div>

                                <div class="stat-icon bg-primary">

                                    <i class="bi bi-person-workspace"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Santri --}}
                <div class="col-xl-3 col-md-6">

                    <div class="card stat-card stat-success border-0 shadow-sm h-100">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <small class="text-muted">

                                        Total Santri

                                    </small>

                                    <h2 class="fw-bold mt-2 mb-0">

                                        <span id="santriCounter">

                                            {{ $santri }}

                                        </span>

                                    </h2>

                                    <small class="text-muted">

                                        Santri

                                    </small>

                                </div>

                                <div class="stat-icon bg-success">

                                    <i class="bi bi-people-fill"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Kelas --}}
                <div class="col-xl-3 col-md-6">

                    <div class="card stat-card stat-warning border-0 shadow-sm h-100">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <small class="text-muted">

                                        Total Kelas

                                    </small>

                                    <h2 class="fw-bold mt-2 mb-0">

                                        <span id="kelasCounter">

                                            {{ $kelas }}

                                        </span>

                                    </h2>

                                    <small class="text-muted">

                                        Kelas

                                    </small>

                                </div>

                                <div class="stat-icon bg-warning">

                                    <i class="bi bi-building"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Mapel --}}
                <div class="col-xl-3 col-md-6">

                    <div class="card stat-card stat-danger border-0 shadow-sm h-100">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <small class="text-muted">

                                        Mata Pelajaran

                                    </small>

                                    <h2 class="fw-bold mt-2 mb-0">

                                        <span id="mapelCounter">

                                            {{ $mapel }}

                                        </span>

                                    </h2>

                                    <small class="text-muted">

                                        Mapel

                                    </small>

                                </div>

                                <div class="stat-icon bg-danger">

                                    <i class="bi bi-book-half"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- ===================================================== --}}
            {{-- SEMESTER & TAHUN AJARAN --}}
            {{-- ===================================================== --}}

            <div class="row g-4 mt-2">

                <div class="col-lg-6">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <div class="d-flex align-items-center">

                                <div class="feature-icon bg-primary me-3">

                                    <i class="bi bi-calendar-check"></i>

                                </div>

                                <div>

                                    <small class="text-muted">

                                        Imda Aktif

                                    </small>

                                    <h3 class="fw-bold mb-0">

                                        {{ $semester?->nama ?? '-' }}

                                    </h3>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <div class="d-flex align-items-center">

                                <div class="feature-icon bg-success me-3">

                                    <i class="bi bi-journal-bookmark-fill"></i>

                                </div>

                                <div>

                                    <small class="text-muted">

                                        Tahun Ajaran Aktif

                                    </small>

                                    <h3 class="fw-bold mb-0">

                                        {{ $tahun?->tahun ?? '-' }}

                                    </h3>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- PROGRESS RAPORT --}}
            {{-- ===================================================== --}}

            <div class="row g-4 mt-2">

                <div class="col-lg-8">

                    <div class="card border-0 shadow-lg h-100">
                        <div class="card-body p-4">

                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="fw-bold mb-1">Progress Pengisian Raport</h5>
                                    <p class="text-muted small mb-0">Persentase raport yang telah selesai diinput.</p>
                                </div>
                                <span class="badge bg-success px-3 py-2">
                                    {{ $raportSelesai }} / {{ $totalSantriWali }}
                                </span>
                            </div>

                            <div class="progress mt-3" style="height: 10px;">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: {{ $persenSelesai }}%;" aria-valuenow="{{ $persenSelesai }}"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>

                            <div class="row text-center mt-4">
                                <div class="col-4">
                                    <h4 class="fw-bold text-success mb-0">{{ $raportSelesai }}</h4>
                                    <small class="text-muted">Raport Selesai</small>
                                </div>
                                <div class="col-4">
                                    <h4 class="fw-bold text-warning mb-0">{{ $raportBelum }}</h4>
                                    <small class="text-muted">Belum Selesai</small>
                                </div>
                                <div class="col-4">
                                    <h4 class="fw-bold text-primary mb-0">{{ $totalSantriWali }}</h4>
                                    <small class="text-muted">Total Santri</small>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                {{-- ========================= --}}
                {{-- QUICK ACTION --}}
                {{-- ========================= --}}

                <div class="col-lg-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-header bg-white border-0 pt-4">

                            <h5 class="fw-bold">

                                Quick Action

                            </h5>

                        </div>

                        <div class="card-body">

                            <div class="d-grid gap-3">

                                <a href="{{ route('santri.index') }}" class="btn btn-primary">

                                    <i class="bi bi-person-plus-fill me-2"></i>

                                    Tambah Santri

                                </a>

                                <a href="{{ route('nilai.index') }}" class="btn btn-success">

                                    <i class="bi bi-pencil-square me-2"></i>

                                    Input Nilai

                                </a>

                                <a href="{{ route('guru.index') }}" class="btn btn-warning text-dark">

                                    <i class="bi bi-person-workspace me-2"></i>

                                    Kelola Guru

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- ===================================================== --}}
            {{-- AKTIVITAS TERBARU --}}
            {{-- ===================================================== --}}

            <div class="row mt-4">

                <div class="col-lg-12">

                    <div class="card border-0 shadow-sm">

                        <div class="card-header bg-white border-0 pt-4">

                            <h5 class="fw-bold">

                                Aktivitas Terbaru

                            </h5>

                        </div>

                        <div class="card-body">

                            <div class="timeline">

                                <div class="timeline-item">

                                    <i class="bi bi-check-circle-fill text-success"></i>

                                    <div>

                                        <strong>Login Sistem</strong>

                                        <br>

                                        <small class="text-muted">

                                            {{ $user->name }} berhasil login.

                                        </small>

                                    </div>

                                </div>

                                <div class="timeline-item">

                                    <i class="bi bi-file-earmark-text-fill text-primary"></i>

                                    <div>

                                        <strong>Dashboard SIMRAMA</strong>

                                        <br>

                                        <small class="text-muted">

                                            Selamat datang di Sistem Informasi Raport Madrasah.

                                        </small>

                                    </div>

                                </div>

                                <div class="timeline-item">

                                    <i class="bi bi-database-fill-check text-warning"></i>

                                    <div>

                                        <strong>Database</strong>

                                        <br>

                                        <small class="text-muted">

                                            Sistem siap digunakan.

                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            {{-- ===================================================== --}}
            {{-- STYLE --}}
            {{-- ===================================================== --}}

            <style>
                body {
                    background: #f4f7fb;
                }

                /* ========================= */

                .welcome-card {

                    background: linear-gradient(135deg, #2563eb, #2720aa);

                    border-radius: 24px;

                    overflow: hidden;

                }

                .weather-card {

                    border-radius: 24px;

                    background: linear-gradient(135deg, #38bdf8, #2563eb);

                    transition: .4s;

                    color: white;

                }

                .weather-card.sunny {

                    background: linear-gradient(135deg, #38bdf8, #2563eb);

                }

                .weather-card.cloudy {

                    background: linear-gradient(135deg, #64748b, #334155);

                }

                .weather-card.rain {

                    background: linear-gradient(135deg, #475569, #1e293b);

                }

                .weather-card.night {

                    background: linear-gradient(135deg, #312e81, #111827);

                }

                .weather-card:hover {

                    transform: translateY(-8px);

                }

                /* ========================= */

                .stat-card {

                    border-radius: 20px;

                    transition: .35s;

                }

                .stat-card:hover {

                    transform: translateY(-8px);

                    box-shadow: 0 18px 40px rgba(0, 0, 0, .15);

                }

                .stat-icon {

                    width: 70px;

                    height: 70px;

                    border-radius: 18px;

                    display: flex;

                    align-items: center;

                    justify-content: center;

                    color: white;

                    font-size: 30px;

                }

                /* ========================= */

                .feature-icon {

                    width: 60px;

                    height: 60px;

                    border-radius: 18px;

                    display: flex;

                    align-items: center;

                    justify-content: center;

                    color: white;

                    font-size: 24px;

                }

                /* ========================= */

                .progress {

                    height: 24px;

                    border-radius: 20px;

                }

                .progress-bar {

                    font-weight: bold;

                }

                /* ========================= */

                .timeline {

                    position: relative;

                }

                .timeline-item {

                    display: flex;

                    align-items: flex-start;

                    gap: 15px;

                    margin-bottom: 25px;

                }

                .timeline-item i {

                    font-size: 22px;

                    margin-top: 3px;

                }

                /* ========================= */

                .btn {

                    border-radius: 12px;

                    font-weight: 600;

                }

                /* ========================= */

                .card {

                    border-radius: 20px;

                }

                /* ========================= */

                @media(max-width:992px) {

                    .display-1 {

                        font-size: 55px;

                    }

                }
            </style>

            {{-- ===================================================== --}}
            {{-- SCRIPT --}}
            {{-- ===================================================== --}}

            <script>
                function updateClock() {

                    const now = new Date();

                    document.getElementById("clock").innerHTML =

                        now.toLocaleTimeString("id-ID") + " WIB";

                    document.getElementById("date").innerHTML =

                        now.toLocaleDateString("id-ID", {

                            weekday: "long",

                            day: "numeric",

                            month: "long",

                            year: "numeric"

                        });

                }

                setInterval(updateClock, 1000);

                updateClock();

                /* ========================================== */

                function animateCounter(id) {

                    let el = document.getElementById(id);

                    if (!el) return;

                    let target = parseInt(el.innerHTML);

                    let count = 0;

                    let speed = Math.max(1, Math.ceil(target / 40));

                    let timer = setInterval(function() {

                        count += speed;

                        if (count >= target) {

                            count = target;

                            clearInterval(timer);

                        }

                        el.innerHTML = count;

                    }, 20);

                }

                window.onload = function() {

                    animateCounter("guruCounter");

                    animateCounter("santriCounter");

                    animateCounter("kelasCounter");

                    animateCounter("mapelCounter");

                }

                /* ========================================== */

                async function loadWeather() {

                    try {

                        const response = await fetch(

                            "https://api.open-meteo.com/v1/forecast?latitude=-7.2575&longitude=112.7521&current=temperature_2m,relative_humidity_2m,wind_speed_10m,weather_code&timezone=Asia%2FBangkok"

                        );

                        const data = await response.json();

                        const current = data.current;

                        document.getElementById("temperature").innerHTML =

                            current.temperature_2m + "°C";

                        document.getElementById("humidity").innerHTML =

                            current.relative_humidity_2m + "%";

                        document.getElementById("wind").innerHTML =

                            current.wind_speed_10m + " km/jam";

                        let icon = "☀️";

                        let text = "Cerah";

                        let card = document.getElementById("weatherCard");

                        card.className = "card border-0 shadow-lg weather-card";

                        switch (current.weather_code) {

                            case 0:

                                icon = "☀️";

                                text = "Cerah";

                                card.classList.add("sunny");

                                break;

                            case 1:

                            case 2:

                            case 3:

                                icon = "🌤️";

                                text = "Cerah Berawan";

                                card.classList.add("cloudy");

                                break;

                            case 45:

                            case 48:

                                icon = "🌫️";

                                text = "Berkabut";

                                card.classList.add("cloudy");

                                break;

                            case 51:

                            case 53:

                            case 55:

                                icon = "🌦️";

                                text = "Gerimis";

                                card.classList.add("rain");

                                break;

                            case 61:

                            case 63:

                            case 65:

                                icon = "🌧️";

                                text = "Hujan";

                                card.classList.add("rain");

                                break;

                            case 80:

                            case 81:

                            case 82:

                                icon = "⛈️";

                                text = "Hujan Lebat";

                                card.classList.add("rain");

                                break;

                        }

                        document.getElementById("weatherIcon").innerHTML = icon;

                        document.getElementById("weatherDescription").innerHTML = text;

                        const hour = new Date().getHours();

                        if (hour >= 18 || hour <= 5) {

                            card.classList.remove("sunny");

                            card.classList.remove("cloudy");

                            card.classList.remove("rain");

                            card.classList.add("night");

                        }

                    } catch (e) {

                        console.log(e);

                    }

                }

                loadWeather();

                setInterval(loadWeather, 600000);
            </script>

        </div>

    </section>

@endsection
