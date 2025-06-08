@extends('layouts.admin')

@section('post')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Total Artikel</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Artikel</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Artikel</h2>
            <p class="section-lead">Portal Artikel Universitas DIPA Makassar</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Data Artikel</h4>
                            <div class="d-flex">
                                <form class="form-inline mr-2" method="GET" action="{{ route('artikel.index') }}">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search Judul" value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Artikel</th>
                                            <th>Isi Artikel</th>
                                            <th>Penulis</th>
                                            <th>Tanggal Terbit</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($artikels as $index => $artikel)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $artikel->judul }}</td>
                                                <td>{{ Str::limit($artikel->isi, 100) }}</td>
                                                <td>{{ $artikel->penulis }}</td>
                                                <td>{{ \Carbon\Carbon::parse($artikel->tanggal_terbit)->translatedFormat('l, d F Y') }}</td>
                                                <td>
                                                    @if ($artikel->gambar)
                                                        <img class="img img-fluid" width="150" src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar Artikel">
                                                    @else
                                                        <span class="text-muted">Tidak ada gambar</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning btn-sm mb-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center py-3 text-muted">Belum ada data artikel.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if (method_exists($artikels, 'links'))
                            <div class="card-footer text-right">
                                {{ $artikels->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection