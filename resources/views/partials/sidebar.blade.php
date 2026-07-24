<div id="sidebar" class="active">

    <div class="sidebar-wrapper active">

        <div class="sidebar-header">

            <div class="d-flex align-items-center">

                <img src="{{ asset('images/madin.png') }}" width="80" class="me-3">

                <div>

                    <h3 class="mb-0 fw-bold text-primary">
                        SIMRAMA
                    </h3>

                </div>

            </div>

        </div>

        <div class="sidebar-menu">

            <ul class="menu">

                <li class="sidebar-title">

                    MENU UTAMA

                </li>

                <li class="sidebar-item">

                    <a href="{{ route('dashboard') }}" class="sidebar-link">

                        <i class="bi bi-grid-fill"></i>

                        <span>Dashboard</span>

                    </a>

                </li>

                <li class="sidebar-title">

                    MASTER DATA

                </li>

                <li class="sidebar-item has-sub">

                    <a href="#" class="sidebar-link">

                        <i class="bi bi-database-fill"></i>

                        <span>Master</span>

                    </a>

                    <ul class="submenu">

                        <li class="submenu-item">
                            <a href="{{ route('guru.index') }}">Guru</a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('santri.index') }}">Santri</a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('kelas.index') }}">Kelas</a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('mapel.index') }}">Mata Pelajaran</a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('semester.index') }}">Semester</a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('tahun-ajaran.index') }}">Tahun Ajaran</a>
                        </li>

                        {{-- <li class="submenu-item">
                            <a href="{{ route('predikat.index') }}">Predikat</a>
                        </li> --}}

                        <li class="submenu-item">
                            <a href="{{ route('doa-harian.index') }}">Doa Harian</a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('kepribadian.index') }}">Kepribadian</a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('tahfidz.index') }}">Tahfidz</a>
                        </li>

                    </ul>

                </li>

                <li class="sidebar-title">

                    AKADEMIK

                </li>

                <li class="sidebar-item">

                    <a href="{{ route('guru-mengajar.index') }}" class="sidebar-link">

                        <i class="bi bi-person-workspace"></i>

                        <span>Guru Mengajar</span>

                    </a>

                </li>

                <li class="sidebar-item">

                    <a href="{{ route('nilai.index') }}" class="sidebar-link">

                        <i class="bi bi-journal-check"></i>

                        <span>Nilai Akademik</span>

                    </a>

                

                {{-- <li class="sidebar-item">

                    <a href="{{ route('nilai-doa.index') }}" class="sidebar-link">

                        <i class="bi bi-book-half"></i>

                        <span>Nilai Doa</span>

                    </a>

                </li>

                <li class="sidebar-item">

                    <a href="{{ route('nilai-kepribadian.index') }}" class="sidebar-link">

                        <i class="bi bi-person-heart"></i>

                        <span>Nilai Kepribadian</span>

                    </a>

                </li>

                <li class="sidebar-item {{ request()->routeIs('tilawati.*') ? 'active' : '' }}">

                    <a href="{{ route('tilawati.index') }}" class="sidebar-link">

                        <i class="bi bi-book-half"></i>

                        <span>Tilawati</span>

                    </a>

                </li>

                <li class="sidebar-item">

                    <a href="{{ route('nilai-tahfidz.index') }}" class="sidebar-link">

                        <i class="bi bi-book"></i>

                        <span>Nilai Tahfidz</span>

                    </a>

                </li> --}}

                {{-- <li class="sidebar-title">

                    ABSENSI

                </li>

                <li class="sidebar-item">

                    <a href="{{ route('absensi.index') }}" class="sidebar-link">

                        <i class="bi bi-calendar-check"></i>

                        <span>Absensi Santri</span>

                    </a>

                </li> --}}

                {{-- <li class="sidebar-title">

                    RAPOR

                </li>

                <li class="sidebar-item">

                    <a href="{{ route('rapor.index') }}" class="sidebar-link">

                        <i class="bi bi-file-earmark-richtext"></i>

                        <span>Cetak Rapor</span>

                    </a>

                </li> --}}

                {{-- <li class="sidebar-title">

                    SISTEM

                </li>

                <li class="sidebar-item">

                    <a href="{{ route('pengaturan.index') }}" class="sidebar-link">

                        <i class="bi bi-gear-fill"></i>

                        <span>Pengaturan</span>

                    </a>

                </li> --}}

                <li class="sidebar-item">

                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button 
                        type="submit"
                        class="sidebar-link border-0 bg-transparent w-100 text-start">

                            <i class="bi bi-box-arrow-right"></i>

                            <span>Logout</span>

                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</div>
