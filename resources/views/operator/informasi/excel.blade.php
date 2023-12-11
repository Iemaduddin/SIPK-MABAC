@extends('layouts.app')

@section('title', 'List Informasi')

@section('heading')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Perhitungan Excel</h3>
                <p class="text-subtitle text-muted">Perhitungan MABAC menggunakan Excel</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_operator') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Perhitungan Excel</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <iframe src="https://onedrive.live.com/embed?resid=3C33F9BE4D26F1D1%211146&authkey=!ANLSi9BbsVVw4Kk&em=2"
                width="100%" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>

@endsection
