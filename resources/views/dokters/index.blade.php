@extends('layouts.main')

@section('post')
<div class="container-xxl py-5">
<div class="container"></div>
<div class="container py-5">
<div class="row align-items-start">
    <div class="col-md-4">
        @if($dokter->foto)
            <img src="{{ asset($dokter->foto) }}" class="img-fluid rounded shadow" alt="{{ $dokter->nama }}">
        @else
            <img class="img-fluid rounded shadow" src="{{ asset('upload/dokter/' . $dokter->foto) }}" alt="Default dokter image">
        @endif
    </div>

    <div class="col-md-8">
        <h3 class="fw-bold text-primary">{{ $dokter->nama }}</h3>
        <p><strong>Spesialis:</strong> {{ $dokter->spesialis }}</p>
        <p><strong>NIP:</strong> {{ $dokter->nip }}</p>
        <p><strong>Email:</strong> {{ $dokter->email }}</p>
        <p><strong>Konsultasi Di Whatsapp:</strong> 
            <a href="{{ $dokter->whatsapp }}" target="_blank" class="btn btn-success btn-sm">
                <i class="fab fa-whatsapp"></i> Chat
            </a>
        </p>
        <p><strong>Jam Kerja:</strong> {{ $dokter->jam_kerja }}</p>
    </div>
</div>

</div>
@endsection
