@extends('layouts.main')

@section('post')

    <!-- Header Start -->
    <div class="container-fluid header bg-primary p-0 mb-5">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white mb-5">Puskesmas, Rumah Kesehatan Keluarga Anda</h1>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="{{ asset('home/img/carousel-1.jpg') }}" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Pelayanan Kesehatan Umum</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="{{ asset('home/img/carousel-2.jpg') }}" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Pelayanan Kesehatan Ibu dan Anak</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="{{ asset('home/img/carousel-3.jpg') }}" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Pelayanan Kesehatan Lingkungan</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-75 align-self-end" src="{{ asset('home/img/about-1.jpg') }}" alt="">
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="{{ asset('home/img/about-2.jpg') }}" alt="" style="margin-top: -25%;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Tentang Kami</p>
                    <h1 class="mb-4">Membangun Kesehatan Bersama Puskesmas, Kenali Layanan Kami!</h1>
                    <p>Pusat Kesehatan Masyarakat adalah lembaga pelayanan kesehatan yang memberikan berbagai jenis pelayanan kesehatan dengan harga yang terjangkau dan mudah diakses oleh masyarakat.</p>
                    <p class="mb-4">Memilih puskesmas yang tepat sangat penting untuk menjaga kesehatan keluarga. Datanglah ke Puskesmas kami untuk mendapatkan pelayanan kesehatanterbaik bagi Anda dan keluarga.</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Tim medis yang profesional dan terlatih</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Fasilitas kesehatan yang lengkap</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Pelayanan kesehatan terbaik dan ramah kepada pasien</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

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


    <!-- Feature Start -->
    <div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="p-lg-5 ps-lg-0">
                        <p class="d-inline-block border rounded-pill text-light py-1 px-4">Fitur Unggulan</p>
                        <h1 class="text-white mb-4">Mengapa Memilih Kami?</h1>
                        <p class="text-white mb-4 pb-2">'Puskesmas Sehat' menjadi program untuk mendorong masyarakat untuk hidup sehat dan aktif dengan cara memberikan fasilitas olahraga, edukasi tentang pola makan sehat, serta memberikan motivasi dan dukungan dalam mencapai gaya hidup sehat</p>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-user-md text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Berpengalaman</p>
                                        <h5 class="text-white mb-0">Dokter</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-check text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Berkualitas</p>
                                        <h5 class="text-white mb-0">Pelayanan</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-comment-medical text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Terjangkau</p>
                                        <h5 class="text-white mb-0">Biaya</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-headphones text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">24 Jam</p>
                                        <h5 class="text-white mb-0">Siap Melayani</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('home/img/feature.jpg') }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


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
                <div class="team-item bg-white rounded shadow-sm overflow-hidden position-relative">
                    <div class="team-img">
                        <img class="img-fluid w-100" src="{{ asset('upload/dokter/' . $dokter->foto) }}" alt="{{ $dokter->nama }}" style="height: 250px; object-fit: cover;">
                    </div>
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


@endsection<!-- End #section -->