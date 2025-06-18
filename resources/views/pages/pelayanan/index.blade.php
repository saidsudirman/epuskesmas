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
        <h6 class="mb-4">PELAYANAN PUSKESMAS</h6>
        <div class="table-responsive">
            <a href="{{ route('pelayanan.create') }}" class="btn btn-primary">Tambah Data</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">LAYANAN</th>
                        <th scope="col">WAKTU LAYANAN</th>
                        <th scope="col">DESKRIPSI</th>
                        <th scope="col">ACTION</th>
                    </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_layanan }}</td>
                <td>{{ $data->waktu_layanan }}</td>
                <td>{{ $data->deskripsi }}</td>
                <td>
                    <form action="{{ route('pelayanan.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('pelayanan.edit', $data->id) }}" class="btn btn-sm btn-primary" title="Edit Data"><i class="fa fa-edit"></i></a>
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