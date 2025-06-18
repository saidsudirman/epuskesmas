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
        <h6 class="mb-4">INFORMASI PUSKESMAS</h6>
        <div class="table-responsive">
            <a href="{{ route('informasi.create') }}" class="btn btn-primary">Tambah Data</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">JAM OPERASIONAL</th>
                        <th scope="col">VISI</th>
                        <th scope="col">MISI</th>
                        <th scope="col">LAYANAN</th>
                        <th scope="col">PENGUMUMAN</th>
                        <th scope="col">ACTION</th>
                    </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->jam_operasional }}</td>
                <td>{{ $data->visi }}</td>
                <td>{{ $data->misi }}</td>
                <td>{{ $data->layanan }}</td>
                <td>{{ $data->pengumuman }}</td>
                <td>
                    <form action="{{ route('informasi.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('informasi.edit', $data->id) }}" class="btn btn-sm btn-primary" title="Edit Data"><i class="fa fa-edit"></i></a>
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