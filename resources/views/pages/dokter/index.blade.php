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
        <h6 class="mb-4">DOKTER PUSKESMAS</h6>
        <div class="table-responsive">
            <a href="{{ route('dokter.create') }}" class="btn btn-primary">Tambah Data</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NIP</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">SPESIALIS</th>
                        <th scope="col">JAM KERJA</th>
                        <th scope="col">WHATSAPP</th>
                        <th scope="col">FOTO</th>
                        <th scope="col">ACTION</th>
                    </tr>
            </thead>
            <tbody>
                @foreach($dokters as $dokter)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->nip }}</td>
                <td>{{ $dokter->email }}</td>
                <td>{{ $dokter->spesialis }}</td>
                <td>{{ $dokter->jam_kerja }}</td>
                    <td>
                        <a href="https://wa.me/{{ $dokter->whatsapp }}" target="_blank" class="btn btn-success btn-sm">
                            <i class="fab fa-whatsapp"></i> Chat
                        </a>
                    </td>
                <td>
                    @if($dokter->foto && file_exists(public_path($dokter->foto)))
                        <img src="{{ asset($dokter->foto) }}" alt="dokter" width="100">
                    @else
                        <span class="text-muted">Tidak ada foto</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST">
                        <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-sm btn-primary" title="Edit dokter"><i class="fa fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Konfirmasi untuk Hapus dokter')" title="Hapus Data"><i class="fa fa-trash"></i></button>
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