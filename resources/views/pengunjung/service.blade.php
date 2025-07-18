@extends('layouts.main')

@section('post')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Layanan Kami</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Services</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Layanan Kami</p>
                <h1>Solusi Kesehatan Anda</h1>
            </div>
                <div class="row g-4">
                    @foreach($pelayanans as $pelayanan)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.2 }}s">
                        <div class="service-item bg-light rounded h-100 p-5 position-relative overflow-hidden">
                            <!-- Decorative element -->
                            <div class="position-absolute top-0 end-0 bg-primary opacity-10" style="width: 150px; height: 150px; border-radius: 50%; transform: translate(50px, -50px);"></div>
                            
                            <!-- Service content -->
                            <div class="position-relative">
                                <h4 class="mb-3 text-dark">{{ $pelayanan->nama_layanan }}</h4>
                                <p class="mb-3 text-muted">{{ $pelayanan->deskripsi }}</p>
                                <h5> Waktu Layanan </h5>
                                <h6 class="mb-3 text-muted">{{ $pelayanan->waktu_layanan }}</h6>
                                <!-- Improved Service time display -->
                            </div>
                            
                            <!-- Hover effect -->
                            <div class="service-hover-overlay"></div>
                        </div> 
                    </div>
                    @endforeach
                </div>

<style>
    .service-item {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .service-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        border-color: rgba(var(--bs-primary-rgb), 0.2);
    }
    
    .service-hover-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.03) 0%, rgba(var(--bs-primary-rgb), 0.01) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .service-item:hover .service-hover-overlay {
        opacity: 1;
    }
</style>
        </div>
    </div>
    <!-- Service End -->

@endsection<!-- End #section -->