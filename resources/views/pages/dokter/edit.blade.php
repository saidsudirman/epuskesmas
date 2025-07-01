@extends('layouts.admin')

@section('post')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                    <h4>Form Edit Dokter</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('dokter.update', $dokter->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        

                        <div class="form-group mb-3">
                            <label for="nama">Nama Dokter</label>
                            <input type="text" name="nama" id="nama"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama', $dokter->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" id="nip"
                                class="form-control @error('nip') is-invalid @enderror"
                                value="{{ old('nip', $dokter->nip) }}" required>
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $dokter->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="whatsapp">WhatsApp</label>
                            <input type="text" name="whatsapp" id="whatsapp"
                                   class="form-control @error('whatsapp') is-invalid @enderror"
                                   value="{{ old('whatsapp', $dokter->whatsapp) }}" required>
                            @error('whatsapp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="spesialis">Spesialis</label>
                            <input type="text" name="spesialis" id="spesialis"
                                   class="form-control @error('spesialis') is-invalid @enderror"
                                   value="{{ old('spesialis', $dokter->spesialis) }}" required>
                            @error('spesialis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="jam_kerja">Jam Kerja</label>
                            <input type="text" name="jam_kerja" id="jam_kerja"
                                   class="form-control @error('jam_kerja') is-invalid @enderror"
                                   value="{{ old('jam_kerja', $dokter->jam_kerja) }}" required>
                            @error('jam_kerja')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="foto">foto dokter (kosongkan jika tidak ingin mengubah)</label>
                            <input type="file" name="foto" id="foto"
                                   class="form-control @error('foto') is-invalid @enderror"
                                   accept="image/*">
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($dokter->foto)
                                <small class="d-block mt-2">foto saat ini:</small>
                                <img src="{{ asset('storage/' . $dokter->foto) }}" alt="foto Artikel" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Update Dokter</button>
                            <a href="{{ route('artikel.index') }}" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
