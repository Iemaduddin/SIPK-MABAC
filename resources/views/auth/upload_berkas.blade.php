<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPKESDA</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
</head>

<body>
    @include('sweetalert::alert')
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-12 col-12 d-flex justify-content-center">


                <div class="container pt-4">
                    <div class="text-center">
                        <h1 class="auth-title">SIPKESDA - UPLOAD BERKAS</h1>
                        <p class="auth-subtitle mb-4">Silahkan Daftarkan Diri Anda Sebagai Calon Penerima Beasiswa
                            Daerah</p>
                    </div>

                    <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- nama --}}
                        <div class="row">

                            <div class="col-sm-6">

                                {{-- <input type="text" name="mahasiswa_id" value="{{ auth()->user()->mahasiswa_id }}"
                                    hidden> --}}

                                <h6>Surat Permohonan</h6>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control form-control-lg" name="surat_permohonan"
                                        required>
                                </div>

                                <h6>Surat Keterangan Telah Selesai Proposal</h6>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control form-control-lg"
                                        name="surat_keterangan_selesai_proposal" required>

                                </div>

                                <h6>Nomor Rekening / FC Buku Tabungan</h6>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control form-control-lg" name="rekening_aktif"
                                        required>
                                </div>

                                <h6>Kartu Tanda Penduduk</h6>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control form-control-lg" name="ktp" required>
                                </div>

                                <h6>Kartu Keluarga</h6>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control form-control-lg" name="kk" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <h6>Kartu Tanda Mahasiswa</h6>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control form-control-lg" name="ktm" required>
                                </div>

                                <h6>Transkip Nilai</h6>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control form-control-lg" name="transkip_nilai"
                                        required>
                                </div>

                                <h6>Surat Pernyataan Bukan Asn Materai 10.000</h6>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control form-control-lg" name="pernyataan_asn"
                                        required>
                                </div>

                                <h6>Surat Aktif Kuliah</h6>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control form-control-lg" name="surat_aktif_kuliah">
                                </div>

                                <h6>Surat Keterangan Tidak Menerima Beasiswa</h6>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control form-control-lg"
                                        name="surat_keterangan_bebas_beasiswa" required>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2" type="submit">Simpan</button>
                    </form>

                    <div class="auth-left">
                        <div class="text-center mt-5 text-lg fs-4">
                            <p class="text-gray-600">Sudah Punya Akun? <a href="{{route('home')}}"
                                    class="font-bold">Login</a>.</p>
                            <p><a class="font-bold" href="{{route('home')}}">Kembali Halaman Utama</a>.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</body>

</html>