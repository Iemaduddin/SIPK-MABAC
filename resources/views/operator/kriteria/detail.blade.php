@extends('layouts.app')

@section('title', 'List Mahasiswa')

@section('heading')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Detail Kriteria</h3>
            <p class="text-subtitle text-muted">Untuk Melihat List Kriteria</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard_operator')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('kriteria.index')}}">Data Kriteria</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Kriteria</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4>Detail Kriteria {{$kriteria->kriteria}}</h4>
            </div>
            <div class="card-body shadow">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Kode Kriteria</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="{{$kriteria->kode}}" disabled
                                        id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-check"></i>
                                    </div>
                                </div>

                                <label for="first-name-icon">Nama Kriteria</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="{{$kriteria->kriteria}}"
                                        disabled id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-check"></i>
                                    </div>
                                </div>

                                <label for="first-name-icon">Bobot Kriteria</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="{{$kriteria->bobot}}" disabled
                                        id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-check"></i>
                                    </div>
                                </div>

                                <label for="first-name-icon">Jenis Kriteria</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="{{$kriteria->jenis}}" disabled
                                        id="first-name-icon">
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
    <div class="col-12 col-xl-8">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#tambahSubkriteria">
                    Tambah Subkriteria
                </button>
                <h4>Data Subkriteria</h4>
                @include('operator.kriteria.subkriteria.create')
            </div>
            <div class="card-body shadow">
                <div class="table-responsive">
                    <table class="table table-hover table-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Subkriteria</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kriteria->subkriteria as $subkriteria)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$subkriteria->subkriteria}}</td>
                                <td>{{$subkriteria->nilai}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-warning float-sm-start mb-2 me-2"
                                        data-bs-toggle="modal" data-bs-target="#editSubkriteria-{{$subkriteria->id}}">
                                        Edit
                                    </button>
                                    <form action="{{route('subkriteria.destroy', $subkriteria->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @include('operator.kriteria.subkriteria.edit')
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection