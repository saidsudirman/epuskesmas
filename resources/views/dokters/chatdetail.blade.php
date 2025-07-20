@extends('layouts.main')

@section('post')
<div class="container mt-4">
    <h3>Chat dengan User: <strong>{{ $user->name ?? 'Pasien' }}</strong></h3>

    <div class="card p-3 mb-3" id="chat-box" style="max-height: 400px; overflow-y: auto;">
        @forelse ($chats as $msg)
            <div class="mb-3 d-flex {{ $msg->sender === 'dokter' ? 'justify-content-end' : 'justify-content-start' }}">
                <div>
                    <div class="p-2 rounded 
                        {{ $msg->sender === 'dokter' ? 'bg-primary text-white' : 
                           ($msg->sender === 'user' ? 'bg-success text-white' : 'bg-secondary text-white') }}">
                        <strong>
                            {{
                                $msg->sender === 'dokter' ? ($dokter->nama ?? 'User') :
                                ($msg->sender === 'user' ? ($user->name ?? 'Pasien') : 'AI')
                            }}
                        </strong><br>
                        {{ $msg->message }}
                    </div>
                    <small class="text-muted">
                        {{ $msg->created_at->format('H:i') }} - {{ $msg->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Belum ada pesan.</p>
        @endforelse
    </div>

    <form method="POST" action="{{ route('chat.dokter.send', [$dokter_id, $user_id]) }}">
        @csrf
        <div class="input-group">
            <input type="text" name="message" class="form-control" placeholder="Ketik balasan..." required>
            <button type="submit" class="btn btn-primary">Balas</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    const chatBox = document.getElementById('chat-box');
    if(chatBox){
        chatBox.scrollTop = chatBox.scrollHeight;
    }
</script>
@endpush
@endsection
