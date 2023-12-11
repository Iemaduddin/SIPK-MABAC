<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Kriteria Pegawai Penerima Peminjaman Koperasi</title>
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
        <h5>Laporan Data Kriteria Pegawai Penerima Peminjaman Koperasi</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                @forelse ($kriterias as $kriteria)
                    <th>{{ $kriteria->kriteria }}</th>
                @empty
                    <th>Belum Ada Kriteria</th>
                @endforelse
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    @forelse ($mahasiswa->subkriteria as $subkriteria)
                        <td>{{ $subkriteria->subkriteria }} - (Nilai : {{ $subkriteria->nilai }})</td>
                    @empty
                        <td colspan="{{ count($kriterias) }}" class="text-center">Tidak Ada Data</td>
                    @endforelse
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="text-center">
                <th colspan="2">Jenis</th>
                @forelse ($kriterias as $kriteria)
                    <th>{{ $kriteria->jenis }}</th>
                @empty
                    <th>Belum Ada Kriteria</th>
                @endforelse
            </tr>
        </tfoot>
    </table>

</body>

</html>
