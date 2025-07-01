@extends('layouts.admin')

@section('post')
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
                    <h4>Form Edit Informasi</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('informasi.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="pelayanan_id">Nama Layanan</label>
                            <select class="form-control @error('pelayanan_id') is-invalid @enderror" id="pelayanan_id" name="pelayanan_id" required>
                                <option value="">-- Pilih Layanan --</option>
                                @foreach($pelayanans as $pelayanan)
                                    <option value="{{ $pelayanan->id }}" {{ old('pelayanan_id', $data->pelayanan_id) == $pelayanan->id ? 'selected' : '' }}>
                                        {{ $pelayanan->nama_layanan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pelayanan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label for="jam_operasional">Jam Operasional</label>
                            <input type="text" name="jam_operasional" id="jam_operasional"
                                class="form-control @error('jam_operasional') is-invalid @enderror"
                                value="{{ old('jam_operasional', $data->jam_operasional) }}" required>
                            @error('jam_operasional')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="visi">Visi</label>
                            <textarea name="visi" id="visi" rows="3"
                                class="form-control @error('visi') is-invalid @enderror">{{ old('visi', $data->visi) }}</textarea>
                            @error('visi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="misi">Misi</label>
                            <textarea name="misi" id="misi" rows="3"
                                class="form-control @error('misi') is-invalid @enderror">{{ old('misi', $data->misi) }}</textarea>
                            @error('misi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pengumuman">Pengumuman</label>
                            <textarea name="pengumuman" id="pengumuman" rows="3"
                                class="form-control @error('pengumuman') is-invalid @enderror">{{ old('pengumuman', $data->pengumuman) }}</textarea>
                            @error('pengumuman')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('informasi.index') }}" class="btn btn-warning">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection