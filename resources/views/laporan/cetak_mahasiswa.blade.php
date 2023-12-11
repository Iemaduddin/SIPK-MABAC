<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pegawai</title>
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
    <center class="mb-2">
        <img src="assets/images/logo/logo.png" alt="Logo" width="100px">
        <h5>Laporan Data Pegawai Penerima Peminjaman Koperasi</h4>
    </center>

    <table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Tempat & Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->nik }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->alamat }}, {{ $mahasiswa->village }}, {{ $mahasiswa->district }},
                        {{ $mahasiswa->city }}, {{ $mahasiswa->province }} </td>
                    <td>{{ $mahasiswa->email }}</td>
                    <td>{{ $mahasiswa->no_hp }}</td>
                    <td>{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}</td>
                    <td>{{ $mahasiswa->jk }}</td>
                    <td><img src="storage/{{ $mahasiswa->foto }}" alt="Foto" width="50px"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
