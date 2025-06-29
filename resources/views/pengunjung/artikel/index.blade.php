@extends('layouts.main')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Artikel Kesehatan</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Artikel</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Articles Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Artikel Terkini</p>
            <h1 class="mb-3">Informasi Kesehatan Terbaru</h1>
            <p class="mb-0">Update informasi dan tips kesehatan dari tenaga medis profesional</p>
        </div>

        <div class="row g-4">
            @forelse($artikels as $artikel)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                <div class="card article-card h-100 border-0 shadow-sm">
                    @if($artikel->gambar)
                    <img src="{{ asset($artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->judul }}" style="height: 220px; object-fit: cover;">
                    @else
                    <img src="{{ asset('home/img/default-article.jpg') }}" class="card-img-top" alt="Artikel Default" style="height: 220px; object-fit: cover;">
                    @endif
                    
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary me-2">Kesehatan</span>
                            <small class="text-muted"><i class="far fa-calendar-alt me-1"></i>{{ $artikel->created_at->format('d M Y') }}</small>
                        </div>
                        <h5 class="card-title fw-bold">{{ $artikel->judul }}</h5>
                        <p class="card-text text-muted">{{ Str::limit(strip_tags($artikel->isi), 120) }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 pt-0 pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted"><i class="fas fa-user-md me-1"></i>{{ $artikel->penulis }}</small>
                            <a href="{{ route('artikel.show', $artikel->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                Baca <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="alert alert-info text-center py-4">
                    <i class="fas fa-info-circle fa-2x mb-3"></i>
                    <h5 class="mb-1">Belum ada artikel tersedia</h5>
                    <p class="mb-0">Silakan kembali lagi nanti</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($artikels->hasPages())
        <div class="mt-5 wow fadeInUp" data-wow-delay="0.3s">
            <nav aria-label="Page navigation">
                {{ $artikels->links('pagination::bootstrap-5') }}
            </nav>
        </div>
        @endif
    </div>
</div>
<!-- Articles End -->
@endsection

@section('styles')
<style>
    .article-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.08);
    }
    .article-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: rgba(13,110,253,0.2);
    }
    .card-img-top {
        transition: transform 0.7s ease;
    }
    .article-card:hover .card-img-top {
        transform: scale(1.08);
    }
    .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    .page-link {
        color: #0d6efd;
        border-radius: 50% !important;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 5px;
        border: 1px solid #dee2e6;
    }
    .breadcrumb {
        background-color: transparent;
        padding: 0;
    }
    .breadcrumb-item.active {
        color: #0d6efd;
        font-weight: 500;
    }
</style>
@endsection