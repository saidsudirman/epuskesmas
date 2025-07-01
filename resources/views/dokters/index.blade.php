@extends('layouts.main')

@section('post')
<div class="container-xxl py-5">
<div class="container"></div>
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('upload/dokter/' . $dokter->foto) }}" class="img-fluid rounded shadow" alt="{{ $dokter->nama }}">
        </div>
        <div class="col-md-8">
            <h2>{{ $dokter->nama }}</h2>
            <p><strong>Spesialis:</strong> {{ $dokter->spesialis }}</p>
            <p><strong>NIP:</strong> {{ $dokter->nip }}</p>
            <p><strong>Email:</strong> {{ $dokter->email }}</p>
            <p><strong>Konsultasi Di Whatsapp:                        <a href="https://wa.me/{{ $dokter->whatsapp }}" target="_blank" class="btn btn-success btn-sm">
                            <i class="fab fa-whatsapp"></i> Chat
                        </a>
            <p><strong>Jam Kerja:</strong> {{ $dokter->jam_kerja }}</p>
        </div>
    </div>
</div>
@endsection
