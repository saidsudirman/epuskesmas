@extends('layouts.admin')

@section('post')
{{-- ALERT SUCCESS --}}
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- ALERT ERROR --}}
@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa fa-exclamation-circle me-2"></i> Terdapat beberapa kesalahan:
    <ul class="mb-0 mt-2">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Pelayanan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('pelayanan.store') }}" method="POST">
                    @csrf
                    
                    {{-- Nama Layanan --}}
                    <div class="mb-3">
                        <label for="nama_layanan" class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" name="nama_layanan" id="nama_layanan" 
                            class="form-control @error('nama_layanan') is-invalid @enderror"
                            value="{{ old('nama_layanan') }}" 
                            placeholder="Contoh: Unit Gawat Darurat" required>
                        @error('nama_layanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Waktu Layanan --}}
                    <div class="mb-3">
                        <label for="waktu_layanan" class="form-label">Waktu Layanan <span class="text-danger">*</span></label>
                        <input type="text" name="waktu_layanan" id="waktu_layanan" 
                            class="form-control @error('waktu_layanan') is-invalid @enderror"
                            value="{{ old('waktu_layanan') }}"
                            placeholder="Contoh: 24 Jam atau Senin-Jumat 08:00 - 16:00" required>
                        @error('waktu_layanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                            name="deskripsi" id="deskripsi" rows="4"
                            placeholder="Masukkan deskripsi lengkap layanan...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambah Layanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
