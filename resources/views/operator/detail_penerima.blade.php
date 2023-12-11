@extends('layouts.app')

@section('title', 'List Mahasiswa')

@section('heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Peminjaman</h3>
                <p class="text-subtitle text-muted">Untuk Melihat Data Penerima dan Detail Peminjaman</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_operator') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('operator.beasiswa') }}">Data Peminjaman</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Penerima</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Biodata Pegawai {{ $mahasiswa->nama }}</h4>
                </div>
                <div class="card-body shadow">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">NIK</label>
                                    <div class="position-relative mb-3">
                                        <input type="text" class="form-control" placeholder="{{ $mahasiswa->nik }}"
                                            disabled id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-check"></i>
                                        </div>
                                    </div>
                                    <label for="first-name-icon">Nama</label>
                                    <div class="position-relative mb-3">
                                        <input type="text" class="form-control" placeholder="{{ $mahasiswa->nama }}"
                                            disabled id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-check"></i>
                                        </div>
                                    </div>

                                    <label for="first-name-icon">Tempat Lahir & Tanggal Lahir</label>
                                    <div class="position-relative mb-3">
                                        <input type="text" class="form-control"
                                            placeholder="{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}"
                                            disabled id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-check"></i>
                                        </div>
                                    </div>

                                    <label for="first-name-icon">Jenis Kelamin</label>
                                    <div class="position-relative mb-3">
                                        <input type="text" class="form-control" placeholder="{{ $mahasiswa->jk }}"
                                            disabled id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-check"></i>
                                        </div>
                                    </div>

                                    <label for="first-name-icon">Alamat</label>
                                    <div class="position-relative mb-3">
                                        <input type="text" class="form-control" placeholder="{{ $mahasiswa->alamat }}"
                                            disabled id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-check"></i>
                                        </div>
                                    </div>

                                    <label for="first-name-icon">No. HP / WA</label>
                                    <div class="position-relative mb-3">
                                        <input type="text" class="form-control" placeholder="{{ $mahasiswa->no_hp }}"
                                            disabled id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-check"></i>
                                        </div>
                                    </div>

                                    <label for="first-name-icon">username</label>
                                    <div class="position-relative mb-3">
                                        <input type="text" class="form-control" placeholder="{{ $mahasiswa->username }}"
                                            disabled id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Detail Kriteria Beasiswa --}}
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Kriteria Peminjaman {{ $mahasiswa->nama }}</h4>
                </div>
                <div class="card-body shadow">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    @forelse ($subkriterias as $subkriteria)
                                        <label for="first-name-icon">{{ $subkriteria->kriteria->kriteria }}</label>
                                        <div class="position-relative mb-3">
                                            <input type="text" class="form-control"
                                                placeholder="{{ $subkriteria->subkriteria }}" disabled
                                                id="first-name-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-check"></i>
                                            </div>
                                        </div>
                                    @empty
                                        Kosong
                                    @endforelse
                                    <label for="first-name-icon">Status Berkas</label>
                                    <div class="position-relative mb-3">
                                        @if ($mahasiswa->status_berkas != null)
                                            <input type="text" class="form-control"
                                                placeholder="{{ $mahasiswa->status_berkas }}" disabled
                                                id="first-name-icon">
                                            @if ($mahasiswa->status_berkas == 'lulus')
                                                <div class="form-control-icon">
                                                    <i class="bi bi-check text-success"></i>
                                                </div>
                                            @elseif($mahasiswa->status_berkas == 'tidak lulus')
                                                <div class="form-control-icon">
                                                    <i class="bi bi-x text-danger"></i>
                                                </div>
                                            @endif
                                        @else
                                            <input type="text" class="form-control" placeholder="Belum Diverifikasi"
                                                disabled id="first-name-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-x"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <label for="first-name-icon">Status Kelayakan</label>
                                    <div class="position-relative mb-3">
                                        @if ($mahasiswa->status_kelayakan != null)
                                            <input type="text" class="form-control"
                                                placeholder="{{ $mahasiswa->status_kelayakan }}" disabled
                                                id="first-name-icon">
                                            @if ($mahasiswa->status_kelayakan == 'layak')
                                                <div class="form-control-icon">
                                                    <i class="bi bi-check text-success"></i>
                                                </div>
                                            @elseif($mahasiswa->status_kelayakan == 'tidak layak')
                                                <div class="form-control-icon">
                                                    <i class="bi bi-x text-danger"></i>
                                                </div>
                                            @endif
                                        @else
                                            <input type="text" class="form-control" placeholder="Belum Diproses"
                                                disabled id="first-name-icon">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- @if ($mahasiswa->status_berkas == null) --}}
        {{-- Berkas Beasiswa --}}
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-start">Berkas {{ $mahasiswa->nama }}</h4>
                    @if ($mahasiswa->status_berkas == 'lulus')
                        <p class="text-success">(*Diterima)</p>
                    @elseif ($mahasiswa->status_berkas == 'tidak lulus')
                        <p class="text-danger">(*Ditolak)</p>
                    @endif

                    {{-- </button> --}}
                    @if ($mahasiswa->status_berkas == null)
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="btn btn-outline-success float-end me-4"><i class="bi bi-check-circle pe-2"></i>
                            Verifikasi</button>
                    @elseif($mahasiswa->status_berkas == 'tidak lulus')
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="btn btn-outline-secondary float-end me-4"><i class="bi bi-check-circle pe-2"></i>
                            Verifikasi Ulang</button>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('verifikasi') }}" method="POST">
                                    @csrf
                                    <div class="modal-body ">
                                        <label for="">ID Mahasiswa : </label>
                                        <input type="text" class="form-control mb-4" name="mahasiswa_id"
                                            value="{{ $mahasiswa->id }}" readonly>
                                        <label>Verifikasi Berkas : </label>
                                        <div class="form-group">
                                            <select name="status_berkas" class="form-select">
                                                <option value="lulus">Lulus Berkas</option>
                                                <option value="tidak lulus">Berkas Ditolak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary">Verif</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <a href="{{ route('download-berkas', $mahasiswa->id) }}" class="btn btn-secondary float-end me-4"><i
                            class="bi bi-download pe-2"></i> Download</a>

                    {{-- <form action="{{ route('upload') }}" method="get">
                    <input type="text" name="mahasiswa_id" value="{{ $mahasiswa->id }}" hidden>
                    <button class="btn btn-outline-info float-end me-4"><i class="bi bi-upload pe-2"></i> Upload
                        Berkas</a>
                </form> --}}
                </div>
                <div class="card-body shadow">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Surat Permohonan Peminjaman Koperasi</label>
                                    <div class="position-relative mb-3">
                                        <iframe src="{{ asset('storage/' . $mahasiswa->surat_permohonan) }}"
                                            width="100%" height="400px"></iframe>
                                    </div>
                                </div>
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Kartu Tanda Penduduk (KTP)</label>
                                    <div class="position-relative mb-3">
                                        <iframe src="{{ asset('storage/' . $mahasiswa->ktp) }}" width="100%"
                                            height="400px"></iframe>
                                    </div>
                                </div>
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Kartu Keluarga (KK)</label>
                                    <div class="position-relative mb-3">
                                        <iframe src="{{ asset('storage/' . $mahasiswa->kk) }}" width="100%"
                                            height="400px"></iframe>
                                    </div>
                                </div>
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Kartu Tanda Anggota (KTA)</label>
                                    <div class="position-relative mb-3">
                                        <iframe src="{{ asset('storage/' . $mahasiswa->kta) }}" width="100%"
                                            height="400px"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">NPWP</label>
                                    <div class="position-relative mb-3">
                                        <iframe src="{{ asset('storage/' . $mahasiswa->npwp) }}" width="100%"
                                            height="400px"></iframe>
                                    </div>
                                </div>
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Surat Pernyataan Peminjaman</label>
                                    <div class="position-relative mb-3">
                                        <iframe src="{{ asset('storage/' . $mahasiswa->pernyataan_peminjaman) }}"
                                            width="100%" height="400px"></iframe>
                                    </div>
                                </div>
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Berkas Jaminan</label>
                                    <div class="position-relative mb-3">
                                        <iframe src="{{ asset('storage/' . $mahasiswa->berkas_jaminan) }}" width="100%"
                                            height="400px"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @endif --}}
@endsection
