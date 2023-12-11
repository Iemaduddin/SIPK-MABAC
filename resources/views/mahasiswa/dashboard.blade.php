@extends('layouts.app')

@section('title', 'Dashboard')

@section('heading')
    <div class="page-heading">
        <h3>Selamat Datang {{ auth()->user()->username }}</h3>
    </div>
@endsection


@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body px-3 py-4-5 shadow text-secondary ">
                                <h4>Informasi</h4>
                                <hr>
                                @foreach ($informasis as $informasi)
                                    <h5>{{ $informasi->judul }}</h5>
                                    <p>{!! $informasi->deskripsi !!}</p>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4>Pendaftar Terakhir</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pegawai</th>
                                                <th>Tanggal Daftar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($mahasiswas as $mahasiswa)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $mahasiswa->nama }}</td>
                                                    <td>{{ $mahasiswa->created_at }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Belum Ada Pendaftar</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
