@extends('layouts.admin')

@section('post')

{{-- ALERT TAMBAH PENGUNJUNG --}}
<div class="col-12">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>



<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Informasi</h4>
                    </div>
                        <div class="card-body">
                            <form action="{{ route('informasi.store', $title) }}" method="POST">
                                @csrf
                                    <div class="form-group">
                                        <label for="title">Jam Operasional</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Masukkan Jam Operasional" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="body">Visi</label>
                                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="4" placeholder="Masukkan Visi" required>{{ old('body') }}</textarea>
                                        @error('body')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="body">Misi</label>
                                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="4" placeholder="Masukkan Misi" required>{{ old('body') }}</textarea>
                                        @error('body')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="body">Layanan</label>
                                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="4" placeholder="Masukkan Layanan" required>{{ old('body') }}</textarea>
                                        @error('body')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="body">Informasi</label>
                                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="4" placeholder="Masukkan Informasi" required>{{ old('body') }}</textarea>
                                    @error('body')
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

@endsection<!-- End #section -->