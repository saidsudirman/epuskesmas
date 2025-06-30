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

{{-- ERROR DISPLAY --}}
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
                <h4>Tambah Informasi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('informasi.store') }}" method="POST">
                    @csrf
                    
                    {{-- Fixed field names to match your controller validation --}}
                    <div class="form-group">
                        <label for="pelayanan_id">Nama Layanan</label>
                        <select class="form-control @error('pelayanan_id') is-invalid @enderror" id="pelayanan_id" name="pelayanan_id" required>
                            <option value="">-- Pilih Layanan --</option>
                            @foreach($pelayanans as $pelayanan)
                                <option value="{{ $pelayanan->id }}" {{ old('pelayanan_id') == $pelayanan->id ? 'selected' : '' }}>
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
                        <input type="text" class="form-control @error('jam_operasional') is-invalid @enderror" 
                            id="jam_operasional" name="jam_operasional" 
                            value="{{ old('jam_operasional') }}" 
                            placeholder="Masukkan Jam Operasional" required>
                        @error('jam_operasional')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="visi">Visi</label>
                        <textarea class="form-control @error('visi') is-invalid @enderror" 
                            id="visi" name="visi" rows="4" 
                            placeholder="Masukkan Visi" required>{{ old('visi') }}</textarea>
                        @error('visi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <textarea class="form-control @error('misi') is-invalid @enderror" 
                            id="misi" name="misi" rows="4" 
                            placeholder="Masukkan Misi" required>{{ old('misi') }}</textarea>
                        @error('misi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pengumuman">Informasi</label>
                        <textarea class="form-control @error('pengumuman') is-invalid @enderror" 
                            id="pengumuman" name="pengumuman" rows="4" 
                            placeholder="Masukkan Informasi">{{ old('pengumuman') }}</textarea>
                        @error('pengumuman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambah Informasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection