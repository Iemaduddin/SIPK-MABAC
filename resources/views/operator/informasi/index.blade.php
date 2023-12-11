@extends('layouts.app')

@section('title', 'List Informasi')

@section('heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Informasi</h3>
                <p class="text-subtitle text-muted">Data informasi kepada penerima beasiswa</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_operator') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Informasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="col-12 col-md-12 order-md-12 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-start"><a
                            href="{{ route('informasi.create') }}" type="button" class="btn btn-outline-primary">
                            Tambah Informasi
                        </a>
                    </nav>
                </div>
            </div>
            <div class="card-body shadow">
                <table class="table table-striped" id="tabel_mahasiswa">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Dibuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($informasis as $informasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="width:30%">{{ $informasi->judul }}</td>
                                <td style="width:30%">{{ Str::limit($informasi->deskripsi, 30) }}</td>
                                <td style="width:20%">
                                    {{ \Carbon\Carbon::parse($informasi->created_at)->format('\T\a\n\g\g\a\l d F Y, \J\a\m H:i') }}
                                </td>
                                <td>
                                    <a href="{{ route('informasi.edit', $informasi->id) }}"
                                        class="btn btn-sm btn-warning my-2"><i class="bi bi-pencil-square"></i></a>

                                    <form id="form-delete-{{ $informasi->id }}"
                                        action="{{ route('informasi.destroy', $informasi->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    <a href="#" class="btn btn-sm btn-danger"
                                        onclick="document.getElementById('form-delete-{{ $informasi->id }}').submit();"><i
                                            class="bi bi-trash-fill my-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
