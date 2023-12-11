<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logo.png') }}"
                            class="rounded mx-auto d-block w-75 h-100" alt="Logo"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
            <hr>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                @if (auth()->user()->role == 'operator')
                    <li class="sidebar-item {{ Request::is('dashboard/operator') ? 'active' : '' }}">
                        <a href="{{ route('dashboard_operator') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Request::is('dashboard/operator/info/*') ? 'active' : '' }} has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-info-circle-fill"></i>
                            <span>Informasi</span>
                        </a>
                        <ul class="submenu {{ Request::is('dashboard/operator/info/*') ? 'active' : '' }}">

                            <li
                                class="submenu-item {{ Request::is('dashboard/operator/info/data-informasi') ? 'active' : '' }}">
                                <a href="{{ route('informasi.index') }}">Data Informasi</a>
                            </li>
                            <li
                                class="submenu-item {{ Request::is('dashboard/operator/info/jurnal') ? 'active' : '' }}">
                                <a href="{{ route('informasi.jurnal') }}">Jurnal</a>
                            </li>
                            <li
                                class="submenu-item {{ Request::is('dashboard/operator/info/excel') ? 'active' : '' }}">
                                <a href="{{ route('informasi.excel') }}">Perhitungan Excel</a>
                            </li>

                        </ul>
                    </li>

                    <li class="sidebar-item {{ Request::is('dashboard/operator/kriteria') ? 'active' : '' }}">
                        <a href="{{ route('kriteria.index') }}" class='sidebar-link'>
                            <i class="bi bi-card-checklist"></i>
                            <span>Data Kriteria</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('dashboard/operator/beasiswa') ? 'active' : '' }}">
                        <a href="{{ route('operator.beasiswa') }}" class='sidebar-link'>
                            <i class="bi bi-bag-check"></i>
                            <span>Data Peminjaman</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('dashboard/operator/hasil') ? 'active' : '' }}">
                        <a href="{{ route('hasil.index') }}" class='sidebar-link'>
                            <i class="bi bi-info-circle"></i>
                            <span>Proses Hitung</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('dashboard/operator/petugas') ? 'active' : '' }}">
                        <a href="{{ route('petugas.index') }}" class='sidebar-link'>
                            <i class="bi bi-person-badge"></i>
                            <span>Data Operator</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('dashboard/operator/mahasiswa') ? 'active' : '' }}">
                        <a href="{{ route('operator.mahasiswa') }}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>Data Pegawai</span>
                        </a>
                    </li>
                @elseif (auth()->user()->role == 'mahasiswa')
                    <li class="sidebar-item {{ Request::is('dashboard/mahasiswa') ? 'active' : '' }}">
                        <a href="{{ route('dashboard_mahasiswa') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('dashboard/mahasiswa/data-pribadi') ? 'active' : '' }}">
                        <a href="{{ route('mahasiswa') }}" class='sidebar-link'>
                            <i class="bi bi-person"></i>
                            <span>Data Pegawai</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Request::is('dashboard/mahasiswa/beasiswa') ? 'active' : '' }}">
                        <a href="{{ route('beasiswa') }}" class='sidebar-link'>
                            <i class="bi bi-bag-check"></i>
                            <span>Data Peminjaman</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('dashboard/mahasiswa/hasil') ? 'active' : '' }}">
                        <a href="{{ route('hasilMahasiswa') }}" class='sidebar-link'>
                            <i class="bi bi-arrow-clockwise"></i>
                            <span>Hasil</span>
                        </a>
                    </li>
                @else
                    <li class="sidebar-item {{ Request::is('dashboard/kepala') ? 'active' : '' }}">
                        <a href="{{ route('dashboard_kepala') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endif

                @auth
                    @if (auth()->user()->role != 'mahasiswa')
                        <li class="sidebar-item {{ Request::is('dashboard/laporan/*') ? 'active' : '' }} has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-earmark"></i>
                                <span>Laporan</span>
                            </a>
                            <ul class="submenu {{ Request::is('dashboard/laporan/*') ? 'active' : '' }}">

                                <li class="submenu-item {{ Request::is('dashboard/laporan/penerima') ? 'active' : '' }}">
                                    <a href="{{ route('laporan.penerima') }}">Data Pegawai</a>
                                </li>
                                <li class="submenu-item {{ Request::is('dashboard/laporan/beasiswa') ? 'active' : '' }}">
                                    <a href="{{ route('laporan.beasiswa') }}">Kriteria Peminjaman</a>
                                </li>
                                <li class="submenu-item {{ Request::is('dashboard/laporan/hasil') ? 'active' : '' }}">
                                    <a href="{{ route('laporan.hasil') }}">Hasil Perhitungan</a>
                                </li>

                            </ul>
                        </li>
                    @endif
                    <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class='sidebar-link'>
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                @endauth

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
