@extends('layouts.admin')

@section('post')
<div class="col-12">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#"></a></div>
            </div>
        </div>
        
        <!-- Statistic Cards -->
        <div class="row">
            <!-- Informasi Card -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-sm">
                    <div class="card-icon bg-info-gradient">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Informasi</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="mb-3 font-35 ">{{ $artikelCount }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Artikel Card -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-sm">
                    <div class="card-icon bg-success-gradient">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Artikel</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="mb-3 font-35 ">{{ $informasiCount }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Jadwal Pelayanan Card -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-sm">
                    <div class="card-icon bg-warning-gradient">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jadwal Pelayanan</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="mb-3 font-35 ">{{ $pelayananCount }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Daftar Admin Card -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow-sm">
                    <div class="card-icon bg-danger-gradient">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Daftar Admin</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="mb-3 font-35 ">{{ $userCount }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Card Statistics */
    .card-statistic-1 {
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
    }
    
    .card-statistic-1:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .card-icon {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        border-radius: 10px;
        margin: 20px;
        float: left;
        color: white;
    }
    
    .bg-info-gradient {
        background: linear-gradient(135deg, #3abaf4 0%, #0d8ddb 100%);
    }
    
    .bg-success-gradient {
        background: linear-gradient(135deg, #47c363 0%, #2a8f3d 100%);
    }
    
    .bg-warning-gradient {
        background: linear-gradient(135deg, #ffa426 0%, #e67300 100%);
    }
    
    .bg-danger-gradient {
        background: linear-gradient(135deg, #fc544b 0%, #c21807 100%);
    }
    
    .card-wrap {
        padding: 20px;
    }
    
    .card-header h4 {
        font-size: 1.1rem;
        color: #34395e;
        margin-bottom: 5px;
    }
    
    .card-body {
        font-size: 1.8rem;
        font-weight: 700;
        color: #34395e;
    }
    
    .card-footer {
        font-size: 0.8rem;
        padding-top: 5px;
        border-top: 1px solid #f0f0f0;
    }
    
    .card-footer a {
        color: #6c757d;
        text-decoration: none;
    }
    
    .card-footer a:hover {
        color: #34395e;
    }
    
    /* Content Cards */
    .card {
        border-radius: 10px;
        border: none;
        transition: all 0.3s ease;
    }
    
    .card:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .article-card {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .article-title {
        padding: 10px;
        background: white;
    }
    
    .article-title h6 {
        margin-bottom: 0;
    }
    
    .article-details {
        padding: 0 10px 10px;
        font-size: 0.8rem;
        color: #6c757d;
    }
    
    .list-group-item {
        border-radius: 8px !important;
        margin-bottom: 10px;
        border: 1px solid #f0f0f0;
    }
    
    .table th {
        border-top: none;
    }
</style>
@endsection