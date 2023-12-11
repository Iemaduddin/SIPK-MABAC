@extends('layouts.app')

@section('title', 'Perhitungan')

@section('heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Proses Hitung</h3>
                <p class="text-subtitle text-muted">Untuk Melihat Proses Pehitungan Metode MABAC</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_operator') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Proses Hitung</li>
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
                <div class="nav nav-tabs col-lg-12 d-flex justify-content-center" id="nav-tab" role="tablist">
                    <button class="nav-link active me-3" id="nav-kriteria-mahasiswa" data-bs-toggle="tab"
                        data-bs-target="#nav-kriteriaMahasiswa" type="button" role="tab"
                        aria-controls="nav-kriteriaMahasiswa" aria-selected="false">Kriteria Pegawai</button>

                    <button class="nav-link me-3" id="nav-keputusan-awal" data-bs-toggle="tab"
                        data-bs-target="#nav-keputusanAwal" type="button" role="tab" aria-controls="nav-keputusanAwal"
                        aria-selected="false">Keputusan Awal</button>

                    <button class="nav-link me-3" id="na-normalisasi-awal" data-bs-toggle="tab"
                        data-bs-target="#nav-normalisasiAwal" type="button" role="tab"
                        aria-controls="nav-normalisasiAwal" aria-selected="false">Normalisasi</button>

                    <button class="nav-link me-3" id="nav-elemen-tertimbang" data-bs-toggle="tab"
                        data-bs-target="#nav-elemenTertimbang" type="button" role="tab"
                        aria-controls="nav-elemenTertimbang" aria-selected="false">Tertimbang</button>

                    <button class="nav-link me-3" id="nav-perkiraan-batas" data-bs-toggle="tab"
                        data-bs-target="#nav-perkiraanBatas" type="button" role="tab"
                        aria-controls="nav-perkiraanBatas" aria-selected="false">Perkiraan Batas</button>

                    <button class="nav-link me-3" id="nav-jarak-alternatif" data-bs-toggle="tab"
                        data-bs-target="#nav-jarakAlternatif" type="button" role="tab"
                        aria-controls="nav-jarakAlternatif" aria-selected="false">Jarak Alternatif</button>

                    {{-- <button class="nav-link me-3" id="nav-ranking-alternatif" data-bs-toggle="tab"
                    data-bs-target="#nav-rankingAlternatif" type="button" role="tab"
                    aria-controls="nav-rankingAlternatif" aria-selected="false">Perengkingan</button> --}}

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
                                @forelse ($mahasiswas as $mahasiswa)
                                    <tr>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        @forelse ($mahasiswa->subkriteria as $subkriteria)
                                            <td>{{ $subkriteria->subkriteria }}</td>
                                        @empty
                                            <td colspan="{{ count($kriterias) }}" class="text-center">Tidak Ada Data</td>
                                        @endforelse

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center">Belum Ada Ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- END CONTENT KRITERIA MAHASISWA --}}

                    {{-- CONTENT KEPUTASAN AWAL FIX --}}
                    <div class="tab-pane fade" id="nav-keputusanAwal" role="tabpanel" aria-labelledby="nav-keputusan-awal">
                        <table class="table table-striped" id="keputusan_awal">
                            <thead>
                                <tr>
                                    <th class="col-2">Nama Pegawai</th>
                                    @forelse ($kriterias as $kriteria)
                                        <th>{{ $kriteria->kriteria }} ({{ $kriteria->jenis }})</th>
                                    @empty
                                        <th>Belum Ada Kriteria</th>
                                    @endforelse
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswas as $mahasiswa)
                                    <tr>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        @forelse ($mahasiswa->subkriteria as $subkriteria)
                                            <td>{{ $subkriteria->nilai }}</td>
                                        @empty
                                            <td colspan="{{ count($kriterias) }}" class="text-center">Tidak Ada Data</td>
                                        @endforelse

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center">Belum Ada Ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- END KEPUTASN AWAL --}}

                    {{-- CONTENT NORMALISASI --}}
                    <div class="tab-pane fade" id="nav-normalisasiAwal" role="tabpanel"
                        aria-labelledby="nav-normalisasi-awal">
                        <table class="table table-striped" id="normalisasi_awal">
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
                                @forelse ($mahasiswas as $mahasiswa)
                                    <tr>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        @forelse ($mahasiswa->kriteria as $kriteria)
                                            <td>{{ $kriteria->pivot->normalisasi }}</td>
                                        @empty
                                            <td colspan="{{ count($kriterias) }}" class="text-center">Tidak Ada Data</td>
                                        @endforelse
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center">Belum Ada Ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- END NORMALISASI --}}

                    {{-- CONTENT TERTIMBANG --}}
                    <div class="tab-pane fade" id="nav-elemenTertimbang" role="tabpanel"
                        aria-labelledby="nav-elemen-tertimbang">
                        <table class="table table-striped" id="elemen_tertimbang">
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
                                @forelse ($mahasiswas as $mahasiswa)
                                    <tr>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        @forelse ($mahasiswa->kriteria as $kriteria)
                                            <td>{{ $kriteria->pivot->tertimbang }}</td>
                                        @empty
                                            <td colspan="{{ count($kriterias) }}" class="text-center">Tidak Ada Data</td>
                                        @endforelse

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center">Belum Ada Ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- END TERTIMBANG --}}

                    {{-- CONTENT PERKIRAAN BATAS --}}
                    <div class="tab-pane fade" id="nav-perkiraanBatas" role="tabpanel"
                        aria-labelledby="nav-perkiraan-batas">
                        <table class="table table-striped" id="perkiraan_batas">
                            <thead>
                                <tr>
                                    <th class="col-2">Perkiraan Batasan</th>
                                    @forelse ($kriterias as $kriteria)
                                        <th>{{ $kriteria->kriteria }}</th>
                                    @empty
                                        <th>Belum Ada Kriteria</th>
                                    @endforelse
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>G</td>
                                    @foreach ($kriterias as $kriteria)
                                        <td>{{ $kriteria->batasan }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- END PERKIRAAN BATAS --}}

                    {{-- CONTENT JARAK ALTERNATIF --}}
                    <div class="tab-pane fade" id="nav-jarakAlternatif" role="tabpanel"
                        aria-labelledby="nav-jarak-alternatif">
                        <table class="table table-striped" id="jarak_alternatif">
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
                                @forelse ($mahasiswas as $mahasiswa)
                                    <tr>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        @forelse ($mahasiswa->kriteria as $kriteria)
                                            <td>{{ $kriteria->pivot->jarak }}</td>
                                        @empty
                                            <td colspan="{{ count($kriterias) }}" class="text-center">Tidak Ada Data</td>
                                        @endforelse

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center">Belum Ada Ada</td>
                                    </tr>

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- END JARAK ALTERNATIF --}}

                    {{-- CONTENT PERENGKINGAN --}}
                    <div class="tab-pane fade" id="nav-rankingAlternatif" role="tabpanel"
                        aria-labelledby="nav-ranking-alternatif">
                        <table class="table table-striped" id="ranking_alternatif">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Hasil Capaian</th>
                                    <th>Status Berkas</th>
                                    <th>Status Kelayakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswas as $mahasiswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        <td>{{ $mahasiswa->hasil }}</td>
                                        <td>{{ $mahasiswa->status_berkas }}</td>
                                        <td>{{ $mahasiswa->status_kelayakan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- END PERENGKINGAN --}}
                </div>
            </div>
        </div>
    </section>
@endsection
