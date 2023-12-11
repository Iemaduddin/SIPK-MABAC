@extends('layouts.app')

@section('title', 'List Informasi')

@section('heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Jurnal</h3>
                <p class="text-subtitle text-muted">Jurnal MABAC</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_operator') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jurnal</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-8 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <iframe src="{{ asset('storage/jurnalMabac.pdf') }}" width="100%" height="800px"></iframe>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="color: black">Jurnal SPK - MABAC</h3>
                    <hr>
                    <h6 class="card-title" style="color: black">Penulis:</h6>
                    <p class="card-text">Tugiono, Hafizah, Khairun Nisa
                    </p>
                    <h6 class="card-title" style="color: black">Judul:</h6>
                    <p class="card-text">Optimalisasi Metode MABAC Dalam Menentukan Prioritas Penerima Pinjaman
                        Koperasi.
                        <br><br> <a href="https://ojs.trigunadharma.ac.id/index.php/jsk/article/view/5825" target="_blank"
                            class="btn btn-secondary me-4"><i class="bi bi-link-45deg fa-2x"></i>
                            PDF</a>
                </div>
            </div>
        </div>
    </div>
@endsection
