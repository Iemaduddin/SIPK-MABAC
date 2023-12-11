@extends('layouts.app')

@section('title', 'List Kriteria')

@section('heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kriteria</h3>
                <p class="text-subtitle text-muted">Untuk Melihat List Kriteria</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_operator') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
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
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><button type="button" class="btn btn-outline-primary"
                                    data-bs-toggle="modal" data-bs-target="#tambahKriteria">
                                    Tambah Kriteria
                                </button></li>
                        </ol>
                        @include('operator.kriteria.modal_tambah')
                    </nav>
                </div>
            </div>
            <div class="card-body shadow">
                <table class="table table-striped" id="tabel_mahasiswa">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Kode</th>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Jenis</th>
                            <th>Subkriteria</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kriterias as $kriteria)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $kriteria->kode }}</td>
                                <td>{{ $kriteria->kriteria }}</td>
                                <td>{{ $kriteria->bobot }}</td>
                                <td>
                                    @if ($kriteria->jenis == 'benefit')
                                        <span class="badge bg-success">{{ $kriteria->jenis }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $kriteria->jenis }}</span>
                                    @endif
                                </td>
                                <td class="col-3">
                                    @forelse ($kriteria->subkriteria as $subkriteria)
                                        <ul>
                                            <li>{{ $subkriteria->subkriteria }} ({{ $subkriteria->nilai }})</li>
                                        </ul>
                                    @empty
                                        <ul>
                                            <li>Belum Ada Subkriteria</li>
                                        </ul>
                                    @endforelse
                                </td>
                                <td class="col-2">
                                    <a type="button" class="btn btn-outline-secondary float-sm-start mb-2 me-2"
                                        href="{{ route('kriteria.show', $kriteria->id) }}">
                                        Detail
                                    </a>
                                    <button type="button" class="btn btn-outline-warning float-sm-start mb-2 me-2"
                                        data-bs-toggle="modal" data-bs-target="#editKriteria-{{ $kriteria->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @include('operator.kriteria.modal_edit')
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum Ada Kriteria</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
