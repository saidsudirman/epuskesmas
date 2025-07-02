@extends('layouts.main')

@section('post')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Tentang Kami</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('artikel') }}">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Dokter</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Dokter</p>
            <h1>Tenaga Medis Berpengalaman</h1>
        </div>

        <div class="row g-4">
            @forelse($dokters as $dokter)
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                <div class="team-item bg-white rounded shadow-sm overflow-hidden position-relative h-100"
                     style="min-height: 420px; display: flex; flex-direction: column; justify-content: space-between;">

                    {{-- Foto Dokter --}}
                    @if($dokter->foto)
                        <img src="{{ asset($dokter->foto) }}" class="img-fluid w-100" alt="{{ $dokter->nama }}" style="height: 300px; object-fit: cover;">
                    @else
                        <img src="{{ asset('upload/dokter/default.jpg') }}" class="img-fluid w-100" alt="Default dokter" style="height: 300px; object-fit: cover;">
                    @endif

                    {{-- Informasi --}}
                    <div class="team-text text-center p-4">
                        <h5 class="fw-bold mb-1">{{ $dokter->nama }}</h5>
                        <p class="text-muted mb-2">{{ $dokter->spesialis }}</p>
                        <a href="{{ route('dokter.detail', $dokter->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 mt-2">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada data dokter yang tersedia.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Team End -->

@endsection
