@extends('layouts.app')

@section('title', 'List Informasi')

@section('heading')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Informasi</h3>
            <p class="text-subtitle text-muted">Data informasi kepada penerima beasiswa</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard_operator')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('informasi.index')}}">Informasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Informasi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Judul Berita</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                                value="{{ old('judul') }}" placeholder="Masukan judul" required>

                            <!-- error message untuk title -->
                            @error('judul')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Deskripsi</label>
                            <textarea id="summernote" class="form-control" name="deskripsi" rows="4"
                                placeholder="Masukan Isi Berita" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">Simpan Informasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('assets/vendors/summernote/summernote-lite.min.css') }}">

@endpush

@push('script')
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/summernote/summernote-lite.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
            ],
            height: 300
            , placeholder: 'Harap Masukan Isi Berita'
            , insertText: 'Hello World'

        });
    });

</script>
@endpush
