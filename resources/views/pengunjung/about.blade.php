@extends('layouts.main')

@section('post')

<!-- Laravel Notify -->
<x-notify::notify />

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Tentang Kami</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('artikel') }}">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <img class="img-fluid rounded w-75 align-self-end" src="{{ asset('home/img/fotbar2.jpg') }}" alt="">
                    <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="{{ asset('home/img/fotbar3.jpg') }}" alt="" style="margin-top: -25%;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="d-inline-block border rounded-pill py-1 px-4">Tentang Kami</p>
                <h1 class="mb-4">Membangun Kesehatan Bersama Puskesmas, Kenali Layanan Kami!</h1>
                <p>Pusat Kesehatan Masyarakat adalah lembaga pelayanan kesehatan yang memberikan berbagai jenis pelayanan kesehatan dengan harga yang terjangkau dan mudah diakses oleh masyarakat.</p>
                <p class="mb-4">Memilih puskesmas yang tepat sangat penting untuk menjaga kesehatan keluarga. Datanglah ke Puskesmas kami untuk mendapatkan pelayanan kesehatan terbaik bagi Anda dan keluarga.</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Tim medis yang profesional dan terlatih</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Fasilitas kesehatan yang lengkap</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Pelayanan kesehatan terbaik dan ramah kepada pasien</p>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="{{ route('layanan') }}">Lihat Layanan Kami</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Feature Start -->
<div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
    <!-- ... tetap seperti sebelumnya ... -->
</div>
<!-- Feature End -->

<!-- Articles Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Artikel</p>
            <h1>Artikel Kesehatan Terbaru</h1>
            <p>Informasi dan tips kesehatan terkini dari tim medis kami</p>
        </div>
        <div class="row g-4">
            @forelse($artikels as $artikel)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card article-card h-100">
                    @if($artikel->gambar)
                    <img src="{{ asset($artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->judul }}" style="height: 200px; object-fit: cover;">
                    @else
                    <img src="{{ asset('home/img/default-article.jpg') }}" class="card-img-top" alt="Default Artikel Image" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <small class="me-3"><i class="far fa-user text-primary me-2"></i>{{ $artikel->penulis }}</small>
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $artikel->created_at->format('d M Y') }}</small>
                        </div>
                        <h5 class="card-title">{{ $artikel->judul }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($artikel->isi), 100) }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <a href="{{ route('artikel.detail', $artikel->id) }}" class="btn btn-link px-0">Baca Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada artikel yang tersedia.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Articles End -->

@endsection

@section('styles')
<style>
    .article-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        height: 100%;
    }
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
    }
    .card-img-top {
        transition: transform 0.5s ease;
    }
    .article-card:hover .card-img-top {
        transform: scale(1.05);
    }
</style>
@endsection
