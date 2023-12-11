<!DOCTYPE html>
<html>

<head>
    <title>Laporan Hasil Pencapaian Penerima Pinjaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <img src="assets/images/logo/logo.png" alt="Logo" width="100px">
        <h5>Laporan Hasil Pencapaian Penerima Pinjaman</h4>
    </center>

    <div class="tab-content mt-4" id="nav-tabContent">
        {{-- CONTENT DATA KRITERIA MAHASISWA FIX --}}
        <h5>KRITERIA PENERIMA PEMINJAMAN</h5>
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
        {{-- END CONTENT KRITERIA MAHASISWA --}}

        {{-- CONTENT KEPUTASAN AWAL FIX --}}
        <h5>ELEMEN KEPUTUSAN AWAL</h5>
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
        {{-- END KEPUTASN AWAL --}}

        {{-- CONTENT NORMALISASI --}}
        <h5>NORMALISASI MATRIKS AWAL</h5>
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
        {{-- END NORMALISASI --}}

        {{-- CONTENT TERTIMBANG --}}
        <h5>ELEMEN MATRIKS TERTIMBANG</h5>
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
        {{-- END TERTIMBANG --}}

        {{-- CONTENT PERKIRAAN BATAS --}}
        <h5>MATRIKS AREA PERKIRAAN PERBATASAN</h5>
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
        {{-- END PERKIRAAN BATAS --}}

        {{-- CONTENT JARAK ALTERNATIF --}}
        <h5>ELEMEN MATRIKS JARAK ALTERNATIF DARI DAERAH PERKIRAAN PERBATASAN</h5>
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
        {{-- END JARAK ALTERNATIF --}}

        {{-- CONTENT PERENGKINGAN --}}
        <h5>RANKING HASIL CAPAIAN NILAI PEGAWAI</h5>
        <table class="table table-striped" id="ranking_alternatif">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Hasil Capaian</th>
                    <th>Rangking</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas->sortByDesc('hasil') as $mahasiswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->hasil }}</td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->status_kelayakan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center">Belum Ada Ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- END PERENGKINGAN --}}
    </div>

</body>

</html>
