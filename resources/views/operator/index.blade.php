@extends('layouts.app')

@section('title', 'List Operator')

@section('heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Operator</h3>
                <p class="text-subtitle text-muted">Untuk Melihat List Operator Yang Ada</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_operator') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Operator</li>
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
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-start">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><button type="button" class="btn btn-outline-primary"
                                    data-bs-toggle="modal" data-bs-target="#tambahOperator">
                                    Tambah Operator
                                </button></li>
                        </ol>

                        @include('operator.modal_tambah')
                    </nav>
                </div>
            </div>
            <div class="card-body shadow">
                <table class="table table-striped" id="tabel_mahasiswa">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($operators as $operator)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $operator->nama }}</td>
                                <td>{{ $operator->email }}</td>
                                <td>{{ $operator->username }}</td>
                                <td>{{ $operator->role }}</td>
                                <td class="col-sm-2">
                                    <button type="button" class="btn btn-outline-warning float-sm-start mb-2 me-4"
                                        data-bs-toggle="modal" data-bs-target="#editOperator-{{ $operator->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('petugas.destroy', $operator->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @include('operator.modal_edit')
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
