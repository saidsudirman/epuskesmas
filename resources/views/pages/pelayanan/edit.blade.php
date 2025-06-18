@extends('layouts.admin')

@section('post')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4><i class="fas fa-edit me-2"></i>Edit Data Pelayanan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pelayanan.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_layanan" class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                            <input type="text" name="nama_layanan" id="nama_layanan" 
                                   class="form-control @error('nama_layanan') is-invalid @enderror"
                                   value="{{ old('nama_layanan', $data->nama_layanan) }}" 
                                   placeholder="Contoh: Unit Gawat Darurat" required>
                            @error('nama_layanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="waktu_layanan" class="form-label">Waktu Layanan <span class="text-danger">*</span></label>
                            <input type="text" name="waktu_layanan" id="waktu_layanan" 
                                   class="form-control @error('waktu_layanan') is-invalid @enderror"
                                   value="{{ old('waktu_layanan', $data->waktu_layanan) }}"
                                   placeholder="Contoh: 24 Jam atau Senin-Jumat 08:00-16:00" required>
                            @error('waktu_layanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                name="deskripsi" id="deskripsi" rows="4"
                                placeholder="Masukkan deskripsi lengkap layanan...">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-between">
                            <a href="{{ route('pelayanan.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection