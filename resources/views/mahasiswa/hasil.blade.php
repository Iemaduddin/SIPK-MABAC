@extends('layouts.app')

@section('title', 'Hasil')

@section('heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Status Penilaian</h3>
                <p class="text-subtitle text-muted">Untuk Melihat Hasil Penilaian Berkas Anda</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_mahasiswa') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hasil Penilaian</li>
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
                <div class="nav nav-tabs col-lg-12" id="nav-tab" role="tablist">
                    <button class="nav-link active me-3" id="nav-kriteria-mahasiswa" data-bs-toggle="tab"
                        data-bs-target="#nav-kriteriaMahasiswa" type="button" role="tab"
                        aria-controls="nav-kriteriaMahasiswa" aria-selected="false">Kriteria Pegawai</button>

                    <button class="nav-link me-3" id="nav-ranking-alternatif" data-bs-toggle="tab"
                        data-bs-target="#nav-rankingAlternatif" type="button" role="tab"
                        aria-controls="nav-rankingAlternatif" aria-selected="false">Status</button>

                </div>

                <div class="tab-content mt-4" id="nav-tabContent">

                    {{-- CONTENT DATA KRITERIA MAHASISWA FIX --}}
                    <div class="tab-pane fade show active" id="nav-kriteriaMahasiswa" role="tabpanel"
                        aria-labelledby="nav-kriteria-mahasiswa">
                        <table class="table table-striped" id="tabel_mahasiswa">
                            <thead>
                                <tr>
                                    <th class="col-2">Nama Pegawai</th>
                                    @forelse ($kriterias as $kriteria)
                                        <th>{{ $kriteria->kriteria }}</th>
                                    @empty
                                        <th>Belum Ada Kriteria</th>
                                    @endforelse
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    @forelse ($mahasiswa->subkriteria as $subkriteria)
                                        <td>{{ $subkriteria->subkriteria }}</td>
                                    @empty
                                        <td colspan="{{ count($kriterias) }}" class="text-center">Tidak Ada Data</td>
                                    @endforelse

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- END CONTENT KRITERIA MAHASISWA --}}

                    {{-- CONTENT PERENGKINGAN --}}
                    <div class="tab-pane fade" id="nav-rankingAlternatif" role="tabpanel"
                        aria-labelledby="nav-ranking-alternatif">
                        <table class="table table-striped" id="ranking_alternatif">
                            <thead>
                                <tr>
                                    <th>Nama Pegawai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->status_kelayakan == 'layak' ? 'Selamat Permintaaan Peminjaman Anda Diterima' : 'Maaf Permintaan Anda ditolak' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- END PERENGKINGAN --}}
                </div>
            </div>
        </div>
    </section>
@endsection
