@extends('layouts.admin')

@section('post')

{{-- ALERT ERROR --}}
@if ($errors->any())
<div class="col-12">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Dokter</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dokter.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="nama">ISI NAMA</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Dokter" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="nip">ISI NIP</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror"
                            id="nip" name="nip" value="{{ old('nip') }}" placeholder="Masukkan NIP Dokter" required>
                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">ISI EMAIL</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email Dokter" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="spesialis">ISI SPESIALIS</label>
                        <input type="text" class="form-control @error('spesialis') is-invalid @enderror"
                            id="spesialis" name="spesialis" value="{{ old('spesialis') }}" placeholder="Masukkan Spesialis Dokter" required>
                        @error('spesialis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="jam_kerja">ISI JAM KERJA</label>
                        <input type="text" class="form-control @error('jam_kerja') is-invalid @enderror"
                            id="jam_kerja" name="jam_kerja" value="{{ old('jam_kerja') }}" placeholder="Masukkan Jam Kerja Dokter" required>
                        @error('jam_kerja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="whatsapp">ISI NOMOR DOKTER</label>
                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror"
                            id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="Link WhatsApp (tanpa + atau 0, contoh: 6281234567890)" required>
                        @error('whatsapp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="foto">foto Dokter</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                            id="foto" name="foto" accept="image/*">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save me-1"></i> Simpan
                        </button>
                        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
