@extends('layouts.main')

@section('post')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row align-items-start g-5">

            {{-- Kolom Foto --}}
            <div class="col-md-4">
                <div class="card shadow-sm p-3 text-center" style="min-height: 400px;">
                    @if($dokter->foto)
                        <img src="{{ asset($dokter->foto) }}" class="img-fluid rounded mb-3" alt="{{ $dokter->nama }}">
                    @else
                        <img src="{{ asset('upload/dokter/default.jpg') }}" class="img-fluid rounded mb-3" alt="Default dokter image">
                    @endif
                    <h5 class="fw-bold text-primary">{{ $dokter->nama }}</h5>
                    <p class="text-muted">{{ $dokter->spesialis }}</p>
                </div>
            </div>

            {{-- Kolom Informasi --}}
            <div class="col-md-8">
                <div class="card shadow-sm p-4">
                    <h4 class="fw-bold text-primary mb-3">Profil Dokter</h4>
                    <p><strong>NIP:</strong> {{ $dokter->nip }}</p>
                    <p><strong>Email:</strong> {{ $dokter->email }}</p>
                    <p><strong>Jam Kerja:</strong> {{ $dokter->jam_kerja }}</p>
                    <p><strong>Konsultasi via WhatsApp:</strong></p>
                    <a href="https://wa.me/{{ $dokter->whatsapp }}" target="_blank" class="btn btn-success btn-sm">
                        <i class="fab fa-whatsapp"></i> Chat Sekarang
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
