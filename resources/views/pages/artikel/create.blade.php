@extends('layouts.admin')

@section('post')
{{-- ALERT SUCCESS --}}
<div class="col-12">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

@if($errors->any())
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Artikel</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul --}}
                    <div class="form-group mb-3">
                        <label for="judul">Judul Artikel</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                            id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul artikel" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Isi --}}
                    <div class="form-group mb-3">
                        <label for="isi">Isi Artikel</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror"
                                id="isi" name="isi" rows="5" placeholder="Masukkan isi artikel" required>{{ old('isi') }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group mb-3">
                        <label for="gambar">Gambar Artikel (opsional)</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                            id="gambar" name="gambar" accept="image/*">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Penulis --}}
                    <div class="form-group mb-3">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                            id="penulis" name="penulis" value="{{ old('penulis', 'Puskesmas Kalosi') }}" readonly>
                        @error('penulis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambah Artikel</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
