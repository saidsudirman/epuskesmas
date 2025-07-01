@extends('layouts.main')

@section('post')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Tenaga Medis</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white">Home</a></li>
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
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative rounded overflow-hidden shadow-sm">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('upload/dokter/' . $dokter->foto) }}" alt="{{ $dokter->nama }}" style="height: 250px; object-fit: cover; width: 100%;">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5 class="mb-1">{{ $dokter->nama }}</h5>
                        <p class="text-primary mb-2">{{ $dokter->spesialis }}</p>
                        <a href="{{ route('dokter.detail', $dokter->id) }}" class="btn btn-sm btn-outline-primary rounded-pill">Baca Selengkapnya</a>
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
