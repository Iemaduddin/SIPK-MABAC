@extends('layouts.app')

@section('title', 'List Mahasiswa')

@section('heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data pegawai</h3>
                <p class="text-subtitle text-muted">Untuk Melihat List Data Pegawai</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_operator') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!DOCTYPE html>
    <html lang="en" data-theme="light" data-sidebar-behaviour="fixed" data-navigation-color="inverted"
        data-is-fluid="true">

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

        <section class="section">
            <div class="card">
                <div class="card-header d-flex">
                    <form action="{{ route('filter-mahasiswa') }}" method="post" class="d-flex me-2">
                        <div class="form-group me-2">
                            @csrf
                            <select name="tahun" class="form-control">
                                <option value="all">Semua Tahun</option>
                                @php
                                    $currentYear = date('Y');
                                    $startYear = 2018; // Tahun awal yang diinginkan
                                @endphp
                                @for ($year = $currentYear; $year >= $startYear; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>

                    <div class="ms-auto">
                        {{-- Tambah alternatif --}}
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><button type="button" class="btn btn-outline-success"
                                        data-bs-toggle="modal" data-bs-target="#tambahAlternatif">
                                        Tambah Alternatif
                                    </button></li>
                            </ol>
                            @include('operator.modal_tambah_alt')
                        </nav>
                    </div>
                </div>
                <div class="card-body shadow">
                    <table class="table table-striped" id="tabel_mahasiswa">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswas as $mahasiswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mahasiswa->nik }}</td>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->username }}</td>
                                    <td>{{ $mahasiswa->alamat }}</td>
                                    <td>{{ $mahasiswa->no_hp }}</td>
                                    <td>
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#updateBiodataMhs-{{ $mahasiswa->id }}">Update</button>
                                        <form action="{{ route('hapus-mahasiswa', $mahasiswa->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @include('operator.modal_update_biodata_mhs')

                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Belum Ada Mahasiswa Yang Mendaftar</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </section>
    @endsection
