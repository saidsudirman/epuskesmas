@extends('layouts.admin')

@section('post') {{-- Ganti ke @section sesuai layout jika perlu --}}

    {{-- ALERT SUCCESS --}}
    <div class="col-12">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Pelayanan</h4>
                </div>
                <form action="{{ route('pelayanan.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nama_layanan">Nama Layanan</label>
                            <input type="text" name="nama_layanan" id="nama_layanan"
                                   class="form-control @error('nama_layanan') is-invalid @enderror"
                                   value="{{ old('nama_layanan', $data->nama_layanan) }}"
                                   placeholder="Contoh: Unit Gawat Darurat" required>
                            @error('nama_layanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="waktu_layanan">Waktu Layanan</label>
                            <input type="text" name="waktu_layanan" id="waktu_layanan"
                                   class="form-control @error('waktu_layanan') is-invalid @enderror"
                                   value="{{ old('waktu_layanan', $data->waktu_layanan) }}"
                                   placeholder="Contoh: 24 Jam / Senin - Jumat 08:00 - 16:00" required>
                            @error('waktu_layanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                      class="form-control @error('deskripsi') is-invalid @enderror"
                                      placeholder="Masukkan deskripsi lengkap layanan...">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('pelayanan.index') }}" class="btn btn-warning">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
