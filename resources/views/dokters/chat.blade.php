@extends('layouts.main')

@section('post')
<div class="container mt-4">
    <h3>{{ $title }}</h3>
    <div class="list-group mt-3">
        @forelse ($chats as $chat)
            <a href="{{ route('chat.dokter.detail', ['dokter_id' => $chat->dokter_id, 'user_id' => $chat->user_id]) }}"
               class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $chat->users1 ?? 'Pasien' }}</strong>
                        <p class="mb-0 text-muted">{{ Str::limit($chat->message, 50) }}</p>
                    </div>
                    <small>{{ $chat->created_at->diffForHumans() }}</small>
                </div>
            </a>
        @empty
            <p>Tidak ada pesan dari user.</p>
        @endforelse
    </div>
</div>
@endsection
