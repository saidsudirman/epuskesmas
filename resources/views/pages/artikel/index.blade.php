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

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">ARTIKEL PUSKESMAS</h6>
        <div class="table-responsive">
            <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah Data</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">JUDUL ARTIKEL</th>
                        <th scope="col">ISI ARTIKEL</th>
                        <th scope="col">PENULIS</th>
                        <th scope="col">TANGGAL TERBIT</th>
                        <th scope="col">GAMBAR</th>
                        <th scope="col">ACTION</th>
                    </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->judul }}</td>
                <td>{{ $data->isi }}</td>
                <td>{{ $data->penulis }}</td>
                <td>{{ $data->updated_at->translatedFormat('l, d F Y') }}</td>
                <td>
                    @if ($data->gambar)
                        <img class="img img-fluid" width="150" src="{{ asset($data->gambar) }}" alt="Gambar Artikel">
                    @else
                    <span class="text-muted">Tidak ada gambar</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('artikel.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('artikel.edit', $data->id) }}" class="btn btn-sm btn-primary" title="Edit Data"><i class="fa fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Konfirmasi untuk Hapus Data')" title="Hapus Data"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@endsection<!-- End #section -->