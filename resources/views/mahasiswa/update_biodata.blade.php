@extends('layouts.app')

@section('title', 'Dashboard')

@section('heading')
    <div class="page-heading">
        <h3>Halo! {{ $mahasiswa->nama }}</h3>
    </div>
@endsection


@section('content')

    <!DOCTYPE html>
    <html lang="en" data-theme="light" data-sidebar-behaviour="fixed" data-navigation-color="inverted" data-is-fluid="true">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Webinning" name="author">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="./assets/css/theme.bundle.css" id="stylesheetLTR">
        <link rel="stylesheet" href="./assets/css/theme.rtl.bundle.css" id="stylesheetRTL">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preload" as="style"
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">
        <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');"
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">
        <!-- Favicon -->
        <link rel="icon" href="./assets/favicon/favicon.ico" sizes="any">
        <!-- no-JS fallback -->
        <noscript>
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">
        </noscript>

        {{-- <script>
            // Theme switcher
            let themeSwitcher = document.getElementById('themeSwitcher');

            const getPreferredTheme = () => {
                if (localStorage.getItem('theme') != null) {
                    return localStorage.getItem('theme');
                }

                return document.documentElement.dataset.theme;
            };

            const setTheme = function(theme) {
                if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.dataset.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ?
                        'dark' : 'light';
                } else {
                    document.documentElement.dataset.theme = theme;
                }

                localStorage.setItem('theme', theme);
            };

            const showActiveTheme = theme => {
                const activeBtn = document.querySelector(`[data-theme-value="${theme}"]`);

                document.querySelectorAll('[data-theme-value]').forEach(element => {
                    element.classList.remove('active');
                });

                activeBtn && activeBtn.classList.add('active');

                // Set button if demo mode is enabled
                document.querySelectorAll('[data-theme-control="theme"]').forEach(element => {
                    if (element.value == theme) {
                        element.checked = true;
                    }
                });
            };

            function reloadPage() {
                window.location = window.location.pathname;
            }


            setTheme(getPreferredTheme());

            if (typeof themeSwitcher != 'undefined') {
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                    if (localStorage.getItem('theme') != null) {
                        if (localStorage.getItem('theme') == 'auto') {
                            reloadPage();
                        }
                    }
                });

                window.addEventListener('load', () => {
                    showActiveTheme(getPreferredTheme());

                    document.querySelectorAll('[data-theme-value]').forEach(element => {
                        element.addEventListener('click', () => {
                            const theme = element.getAttribute('data-theme-value');

                            localStorage.setItem('theme', theme);
                            reloadPage();
                        })
                    })
                });
            }
        </script> --}}


        <!-- Demo script -->
        {{-- <script>
            var themeConfig = {
                theme: JSON.parse('"light"'),
                isRTL: JSON.parse('false'),
                isFluid: JSON.parse('true'),
                sidebarBehaviour: JSON.parse('"fixed"'),
                navigationColor: JSON.parse('"inverted"')
            };

            var isRTL = localStorage.getItem('isRTL') === 'true',
                isFluid = localStorage.getItem('isFluid') === 'true',
                theme = localStorage.getItem('theme'),
                sidebarSizing = localStorage.getItem('sidebarSizing'),
                linkLTR = document.getElementById('stylesheetLTR'),
                linkRTL = document.getElementById('stylesheetRTL'),
                html = document.documentElement;

            if (isRTL) {
                linkLTR.setAttribute('disabled', '');
                linkRTL.removeAttribute('disabled');
                html.setAttribute('dir', 'rtl');
            } else {
                linkRTL.setAttribute('disabled', '');
                linkLTR.removeAttribute('disabled');
                html.removeAttribute('dir');
            }
        </script> --}}
    </head>

    <body>
        {{-- <!-- THEME CONFIGURATION -->
        <script>
            let themeAttrs = document.documentElement.dataset;

            for (let attr in themeAttrs) {
                if (localStorage.getItem(attr) != null) {
                    document.documentElement.dataset[attr] = localStorage.getItem(attr);

                    if (theme === 'auto') {
                        document.documentElement.dataset.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ?
                            'dark' : 'light';

                        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                            e.matches ? document.documentElement.dataset.theme = 'dark' : document.documentElement
                                .dataset.theme = 'light';
                        });
                    }
                }
            }
        </script> --}}
        <!-- MAIN CONTENT -->
        <main>

            <div class="d-flex align-items-baseline justify-content-between">
                <!-- Title -->
                <h1 class="h2">
                    Data Pegawai
                </h1>

                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_mahasiswa') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-md-4 col-xxl-3">

                    <!-- Card -->
                    <div class="card border-0 sticky-md-top top-10px">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <div class="avatar avatar-xl avatar-circle mb-3"
                                    style="width: 200px; height: 200px; overflow: hidden;">
                                    @if ($mahasiswa->foto == null)
                                        <img src="{{ asset('assets/images/default.png') }}" alt="Profile picture"
                                            style="width: 100%; height: 100%;">
                                    @else
                                        <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Profile picture"
                                            style="width: 100%; height: 100%;">
                                    @endif
                                </div>


                                <h3 style="color: black" class="mb-0">{{ $mahasiswa->nama }}</h3>
                                <span class="small text-secondary fw-semibold">{{ $mahasiswa->email }}</span>
                            </div>

                            <!-- Divider -->
                            <hr class="mb-0 mt-0">
                            <div style="text-align: justify">
                                <p style="color: rgb(124, 131, 137)">{{ $mahasiswa->about }} </p>
                            </div>
                        </div>

                        <ul class="scrollspy mb-5" id="account" data-scrollspy='{"offset": "30"}'>
                            <li class="active">
                                <a style="color: black" href="#profilSection" class="d-flex align-items-center py-3">
                                    Profil
                                </a>
                            </li>

                            <li>
                                <a style="color: black" href="#akunSection" class="d-flex align-items-center py-3">
                                    Akun
                                </a>
                            </li>
                            <li>
                                <a style="color: black" href="#berkasSection" class="d-flex align-items-center py-3">
                                    Pendataan Berkas
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col">
                    <form role="form" method="POST" action={{ route('update.biodata', $mahasiswa->id) }}
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Card -->
                        <div class="card border-0 scroll-mt-3" id="profilSection">
                            <div class="card-header">
                                <h2 class="h3 mb-0" style="color: black">Profil</h2>
                            </div>

                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="fullName" class="col-form-label">NIK</label>
                                    </div>

                                    <div class="col-lg">
                                        <input class="form-control" type="nik" name="nik"
                                            value="{{ old('nik', $mahasiswa->nik) }}">
                                        <div class="invalid-feedback">Silahkan Isi NIK Anda!</div>
                                    </div>
                                </div>

                                {{-- Start Nama Lengkap --}}
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="fullName" class="col-form-label">Nama Lengkap</label>
                                    </div>

                                    <div class="col-lg">
                                        <input class="form-control" type="nama" name="nama"
                                            value="{{ old('nama', $mahasiswa->nama) }}">
                                        <div class="invalid-feedback">Silahkan Isi Nama Anda!</div>
                                    </div>
                                </div> <!-- / .row -->
                                {{-- End Nama Lengkap --}}

                                {{-- Start Tempat Lahir --}}
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="fullName" class="col-form-label">Tempat Lahir</label>
                                    </div>

                                    <div class="col-lg">
                                        <input class="form-control" type="text" name="tempat_lahir"
                                            value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}">
                                        <div class="invalid-feedback">Silahkan Isi Tempat Lahir Anda!</div>
                                    </div>
                                </div> <!-- / .row -->
                                {{-- End Tempat Lahir --}}

                                {{-- Start Tanggal Lahir --}}
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="fullName" class="col-form-label">Tanggal Lahir</label>
                                    </div>

                                    <div class="col-lg">
                                        <input class="form-control" type="date" name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}">
                                        <div class="invalid-feedback">Silahkan Isi Tanggal Lahir Anda!</div>
                                    </div>
                                </div> <!-- / .row -->
                                {{-- End Tanggal Lahir --}}

                                {{-- Start Jenis Kelamin --}}
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="fullName" class="col-form-label">Jenis Kelamin</label>
                                    </div>

                                    <div class="col-lg">
                                        <select name="jk" class="form-select">
                                            <option selected value="{{ $mahasiswa->jk }}">{{ $mahasiswa->jk }}
                                            </option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                        <div class="invalid-feedback">Silahkan Pilih Jenis Kelamin Anda!</div>
                                    </div>
                                </div> <!-- / .row -->
                                {{-- End Jenis Kelamin --}}

                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="country" class="col-form-label">Alamat</label>
                                    </div>

                                    <div class="col-lg">
                                        <div class="mb-4">
                                            <select name="province" id="province" class="form-select">
                                                <option value="">
                                                    @if ($mahasiswa->province == null)
                                                        == Pilih Provinsi ==
                                                    @else
                                                        {{ $mahasiswa->province }}
                                                    @endif
                                                </option>
                                                @foreach ($provinces as $code => $name)
                                                    <option value="{{ $code }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Pilih Provinsi Anda!</div>
                                        </div>

                                        <div class="mb-4">
                                            <select name="city" id="city" class="form-select">
                                                <option value="">
                                                    @if ($mahasiswa->city == null)
                                                        == Pilih Kota ==
                                                    @else
                                                        {{ $mahasiswa->city }}
                                                    @endif
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">Pilih Kota Anda!</div>
                                        </div>

                                        <div class="mb-4">
                                            <select name="district" id="district" class="form-select">
                                                <option value="">
                                                    @if ($mahasiswa->district == null)
                                                        == Pilih Kecamatan ==
                                                    @else
                                                        {{ $mahasiswa->district }}
                                                    @endif
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">Pilih Kecamatan Anda!</div>
                                        </div>
                                        <div class="mb-4">
                                            <select name="village" id="village" class="form-select">
                                                <option value="">
                                                    @if ($mahasiswa->village == null)
                                                        == Pilih Kelurahan/Desa ==
                                                    @else
                                                        {{ $mahasiswa->village }}
                                                    @endif
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">Pilih Kelurahan/Desa Anda!</div>
                                        </div>
                                    </div>
                                </div> <!-- / .row -->

                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="addressLine1" class="col-form-label">Alamat Lengkap</label>
                                    </div>

                                    <div class="col-lg">
                                        <input class="form-control" type="text" name="alamat"
                                            value="{{ old('alamat', $mahasiswa->alamat) }}">
                                        <div class="invalid-feedback">Silahkan Isi Alamat Lengkap Anda!</div>
                                    </div>
                                </div> <!-- / .row -->

                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="foto" class="col-form-label">Foto</label>
                                    </div>

                                    <div class="col-lg">
                                        <input class="form-control" type="file" name="foto"
                                            value="{{ old('foto', $mahasiswa->foto) }}"{{ $mahasiswa->foto }}>
                                        <div class="invalid-feedback">Silahkan Unggah Foto Profil Anda!</div>
                                    </div>
                                </div> <!-- / .row -->

                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="phone" class="col-form-label">Nomor Handphone/WA</label>
                                    </div>

                                    <div class="col-lg">
                                        <input class="form-control" type="text" name="no_hp"
                                            value="{{ old('no_hp', $mahasiswa->no_hp) }}">
                                        <div class="invalid-feedback">Silahkan Isi Nomor Handphone/WA Anda!</div>
                                    </div>
                                </div> <!-- / .row -->

                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="overview" class="col-form-label">About Me</label>
                                    </div>

                                    <div class="col-lg">
                                        <textarea class="form-control" id="overview" rows="4" name="about"
                                            value="{{ old('about', $mahasiswa->about) }}">{{ $mahasiswa->about }}</textarea>
                                        <div class="invalid-feedback">Please tell something about yourself</div>
                                    </div>
                                </div> <!-- / .row -->

                                <div class="d-flex justify-content-end mt-5">

                                    <!-- Button -->
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card border-0 scroll-mt-3" id="akunSection">
                            <div class="card-header">
                                <h2 class="h3 mb-0" style="color: black">Akun</h2>
                            </div>

                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="emailAddress" class="col-form-label">E-mail</label>
                                    </div>

                                    <div class="col-lg">
                                        <div class="input-group">
                                            <span class="input-group-text" id="username-addon">
                                                <i class="bi bi-envelope"></i>
                                            </span>
                                            <input class="form-control" type="email" name="email"
                                                value="{{ old('email', $mahasiswa->email) }}">
                                        </div>
                                        <div class="invalid-feedback">Silahkan Isi Email Anda!</div>
                                    </div>
                                </div> <!-- / .row -->
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="username" class="col-form-label">Username</label>
                                    </div>

                                    <div class="col-lg">
                                        <div class="input-group">
                                            <span class="input-group-text" id="username-addon">
                                                <svg viewBox="0 0 24 24" height="20" width="15"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.25,12A5.25,5.25,0,1,1,12,6.75,5.25,5.25,0,0,1,17.25,12Z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                    <path d="M17.25,12v2.25a3,3,0,0,0,6,0V12a11.249,11.249,0,1,0-4.5,9"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                </svg>
                                            </span>
                                            <input class="form-control" type="text" name="username"
                                                value="{{ old('username', $mahasiswa->username) }}">
                                        </div>
                                        <div class="invalid-feedback">Silahkan Isi Username Anda!</div>
                                    </div>
                                </div> <!-- / .row -->
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="Password" class="col-form-label">Password</label>
                                    </div>

                                    <div class="col-lg">
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="tPassword" name="password"
                                                value="{{ old('password', $mahasiswa->password) }}">
                                            <span class="input-group-text" id="toggle-password" style="cursor: pointer;">
                                                <i class="bi bi-eye-slash" id="password-icon"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div> <!-- / .row -->
                                <div class="d-flex justify-content-end mt-5">

                                    <!-- Button -->
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 scroll-mt-3" id="berkasSection">
                            <div class="card-header">
                                <h2 class="h3 mb-0" style="color: black">Pendataan Berkas</h2>
                                @if ($mahasiswa->status_berkas == null)
                                    <p class="small text-secondary fw-semibold">*Status Berkas Belum Diverifikasi. Silahkan
                                        Tunggu!</p>
                                @elseif($mahasiswa->status_berkas == 'tidak lulus')
                                    <p class="small text-danger fw-semibold">*Status Berkas Anda Ditolak. Silahkan lengkapi
                                        dan perbaiki!</p>
                                @elseif($mahasiswa->status_berkas == 'lulus')
                                    <p class="small text-success fw-semibold">*Status Berkas Anda Diterima!</p>
                                @endif
                            </div>
                            <div class="card-body">
                                {{-- Surat Permohonan --}}
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="surat_permohonan" class="col-form-label">Surat Permohonan</label>
                                    </div>

                                    <div class="col-lg">
                                        @if (
                                            $mahasiswa->surat_permohonan == null ||
                                                $mahasiswa->status_berkas == 'tidak lulus' ||
                                                $mahasiswa->status_berkas == null)
                                            <input class="form-control" type="file" name="surat_permohonan"
                                                value="{{ old('surat_permohonan', $mahasiswa->surat_permohonan) }}"{{ $mahasiswa->surat_permohonan }}>
                                            <div class="invalid-feedback">Silahkan Unggah Surat Permohonan Anda!</div>
                                        @else
                                            <i class="bi bi-check-circle fs-2" style="color: green"></i>
                                        @endif
                                    </div>
                                </div> <!-- / .row -->

                                {{-- KTP --}}
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="ktp" class="col-form-label">Kartu Tanda Penduduk (KTP)</label>
                                    </div>

                                    <div class="col-lg">
                                        @if ($mahasiswa->ktp == null || $mahasiswa->status_berkas == 'tidak lulus' || $mahasiswa->status_berkas == null)
                                            <input class="form-control" type="file" name="ktp"
                                                value="{{ old('ktp', $mahasiswa->ktp) }}"{{ $mahasiswa->ktp }}>
                                            <div class="invalid-feedback">Silahkan Unggah Kartu Keluarga Anda!</div>
                                        @else
                                            <i class="bi bi-check-circle fs-2" style="color: green"></i>
                                        @endif
                                    </div>
                                </div> <!-- / .row -->

                                {{-- KK --}}
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="kk" class="col-form-label">Kartu Keluarga (KK)</label>
                                    </div>

                                    <div class="col-lg">
                                        @if ($mahasiswa->kk == null || $mahasiswa->status_berkas == 'tidak lulus' || $mahasiswa->status_berkas == null)
                                            <input class="form-control" type="file" name="kk"
                                                value="{{ old('kk', $mahasiswa->kk) }}"{{ $mahasiswa->kk }}>
                                            <div class="invalid-feedback">Silahkan Unggah Kartu Keluarga Anda!</div>
                                        @else
                                            <i class="bi bi-check-circle fs-2" style="color: green"></i>
                                        @endif
                                    </div>
                                </div> <!-- / .row -->

                                {{-- KTA --}}
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="kta" class="col-form-label">Kartu Tanda Anggota (KTA)</label>
                                    </div>

                                    <div class="col-lg">
                                        @if ($mahasiswa->kta == null || $mahasiswa->status_berkas == 'tidak lulus' || $mahasiswa->status_berkas == null)
                                            <input class="form-control" type="file" name="kta"
                                                value="{{ old('kta', $mahasiswa->kta) }}"{{ $mahasiswa->kta }}>
                                            <div class="invalid-feedback">Silahkan Unggah Kartu Tanda Anggota Anda!</div>
                                        @else
                                            <i class="bi bi-check-circle fs-2" style="color: green"></i>
                                        @endif
                                    </div>
                                </div> <!-- / .row -->

                                {{-- NPWP --}}
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="npwp" class="col-form-label">NPWP</label>
                                    </div>

                                    <div class="col-lg">
                                        @if ($mahasiswa->npwp == null || $mahasiswa->status_berkas == 'tidak lulus' || $mahasiswa->status_berkas == null)
                                            <input class="form-control" type="file" name="npwp"
                                                value="{{ old('npwp', $mahasiswa->npwp) }}"{{ $mahasiswa->npwp }}>
                                            <div class="invalid-feedback">Silahkan Unggah NPWP Anda!</div>
                                        @else
                                            <i class="bi bi-check-circle fs-2" style="color: green"></i>
                                        @endif
                                    </div>
                                </div> <!-- / .row -->

                                {{-- Pernyataan Peminjaman --}}
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="pernyataan_peminjaman" class="col-form-label">Surat Pernyataan
                                            Peminjaman</label>
                                    </div>

                                    <div class="col-lg">
                                        @if (
                                            $mahasiswa->pernyataan_peminjaman == null ||
                                                $mahasiswa->status_berkas == 'tidak lulus' ||
                                                $mahasiswa->status_berkas == null)
                                            <input class="form-control" type="file" name="pernyataan_peminjaman"
                                                value="{{ old('pernyataan_peminjaman', $mahasiswa->pernyataan_peminjaman) }}"{{ $mahasiswa->pernyataan_peminjaman }}>
                                            <div class="invalid-feedback">Silahkan Unggah Surat Pernyataan Peminjaman Anda!
                                            </div>
                                        @else
                                            <i class="bi bi-check-circle fs-2" style="color: green"></i>
                                        @endif
                                    </div>
                                </div> <!-- / .row -->

                                {{-- Berkas Jaminan --}}
                                <div class="row mb-4">
                                    <div class="col-lg-3">
                                        <label for="berkas_jaminan" class="col-form-label">Berkas Jaminan</label>
                                    </div>

                                    <div class="col-lg">
                                        @if (
                                            $mahasiswa->berkas_jaminan == null ||
                                                $mahasiswa->status_berkas == 'tidak lulus' ||
                                                $mahasiswa->status_berkas == null)
                                            <input class="form-control" type="file" name="berkas_jaminan"
                                                value="{{ old('berkas_jaminan', $mahasiswa->berkas_jaminan) }}"{{ $mahasiswa->berkas_jaminan }}>
                                        @else
                                            <i class="bi bi-check-circle fs-2" style="color: green"></i>
                                        @endif
                                    </div>
                                </div> <!-- / .row -->

                                <div class="d-flex justify-content-end mt-5">

                                    <!-- Button -->
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- / .row -->
            @push('scripts')
                {{-- Penting --}}
                <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                <script>
                    window.addEventListener("DOMContentLoaded", function() {
                        const populateCities = province => {
                            axios.post('{{ route('mahasiswa.getCity') }}', {
                                    code: province
                                })
                                .then(function(response) {
                                    $('#city').empty();
                                    $('#city').append(new Option('== Pilih Kota ==', ''))
                                    $('#district').empty();
                                    $('#district').append(new Option('== Pilih Kecamatan ==', ''))
                                    $('#village').empty();
                                    $('#village').append(new Option('== Pilih Kelurahan/Desa ==', ''))
                                    $.each(response.data, function(code, name) {
                                        $('#city').append(new Option(name, code))
                                    })
                                })
                        }
                        const populateDistricts = city => {
                            axios.post('{{ route('mahasiswa.getDistrict') }}', {
                                    code: city
                                })

                                .then(function(response) {
                                    $('#district').empty();
                                    $('#district').append(new Option('== Pilih Kecamatan ==', ''))
                                    $('#village').empty();
                                    $('#village').append(new Option('== Pilih Kelurahan/Desa ==', ''))
                                    $.each(response.data, function(code, name) {
                                        $('#district').append(new Option(name, code))
                                    })
                                });
                        }

                        const populateVillages = district => {
                            axios.post('{{ route('mahasiswa.getVillage') }}', {
                                    code: district
                                })

                                .then(function(response) {
                                    $('#village').empty();
                                    $('#village').append(new Option('== Pilih Kelurahan/Desa ==', ''))
                                    $.each(response.data, function(code, name) {
                                        $('#village').append(new Option(name, code))
                                    })
                                });
                        }

                        $('#province').on('change', function() {
                            console.log('Province selected:', $(this).val());
                            populateCities($(this).val());
                        });

                        $('#city').on('change', function() {
                            console.log('City selected:', $(this).val());
                            populateDistricts($(this).val());
                        });

                        $('#district').on('change', function() {
                            console.log('District selected:', $(this).val());
                            populateVillages($(this).val());
                        });
                    });
                </script>
            @endpush
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="{{ asset('assets/js/pages/password_eyes_update_biodata_pgw.js') }}"></script>
        </main> <!-- / main -->

    </html>
@endsection
