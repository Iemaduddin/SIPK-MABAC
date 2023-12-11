@extends('layouts.app')

@section('title', 'Data Beasiswa')

@section('heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Penerima Peminjaman</h3>
                <p class="text-subtitle text-muted">Untuk Melihat Nilai Pegawau Berdasarkan Kriteria</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_operator') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Penerima Peminjaman</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body shadow">
                <table class="table table-striped" id="tabel_mahasiswa">
                    <thead>
                        <tr>
                            <th>ID Pegawai</th>
                            <th class="col-2">Nama Lengkap</th>
                            @forelse ($kriterias as $kriteria)
                                <th>{{ $kriteria->kriteria }}</th>
                            @empty
                                <th>Belum Ada Kriteria</th>
                            @endforelse
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswas as $mahasiswa)
                            <tr>
                                <td>{{ $mahasiswa->id }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                @forelse ($mahasiswa->subkriteria as $subkriteria)
                                    <td>{{ $subkriteria->subkriteria }}</td>
                                @empty
                                    <td colspan="{{ count($kriterias) }}" class="text-center">Tidak Ada Data</td>
                                @endforelse
                                <td class="col-2">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a href="{{ route('detailMhs', $mahasiswa->id) }}"
                                            class="btn btn-outline-secondary">Detail</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center">Belum Ada Ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
