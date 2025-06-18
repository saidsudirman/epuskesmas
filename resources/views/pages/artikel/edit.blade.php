@extends('layouts.admin')

@section('post') {{-- Ubah dari 'post' ke 'content' atau sesuaikan dengan layout --}}
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
                    <h4>Form Edit Artikel</h4>
                </div>
                <form action="{{ route('artikel.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="judul">Judul Artikel</label>
                            <input type="text" name="judul" id="judul"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul', $data->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="isi">Isi Artikel</label>
                            <textarea name="isi" id="isi" rows="5"
                                      class="form-control @error('isi') is-invalid @enderror"
                                      required>{{ old('isi', $data->isi) }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="gambar">Gambar Artikel (kosongkan jika tidak ingin mengubah)</label>
                            <input type="file" name="gambar" id="gambar"
                                   class="form-control @error('gambar') is-invalid @enderror"
                                   accept="image/*">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($data->gambar)
                                <small class="d-block mt-2">Gambar saat ini:</small>
                                <img src="{{ asset('storage/' . $data->gambar) }}" alt="Gambar Artikel" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="penulis">Penulis</label>
                            <input type="text" name="penulis" id="penulis"
                                   class="form-control @error('penulis') is-invalid @enderror"
                                   value="{{ old('penulis', $data->penulis) }}" readonly>
                            @error('penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Update Artikel</button>
                        <a href="{{ route('artikel.index') }}" class="btn btn-warning">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection