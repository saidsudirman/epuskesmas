@extends('layouts.main')

@section('post')
<div class="container mt-4">
    <h3>Chat dengan Dokter: <strong>{{ $dokter->nama }}</strong></h3>

    <div class="card p-3 mb-3" id="chat-box" style="max-height: 400px; overflow-y: auto;">
        @foreach($chats as $msg)
            <div class="mb-3 d-flex {{ $msg->sender == 'user' ? 'justify-content-end' : 'justify-content-start' }}">
                <div>
                    <div class="p-2 rounded 
                        {{ $msg->sender == 'user' ? 'bg-primary text-white' : 
                           ($msg->sender == 'dokter' ? 'bg-success text-white' : 'bg-secondary text-white') }}">
                        <strong>
                            {{
                                $msg->sender == 'user' ? 'Anda' :
                                ($msg->sender == 'dokter' ? ($msg->dokter->nama ?? 'Dokter') : 'AI')
                            }}
                        </strong><br>
                        {{ $msg->message }}
                    </div>
                    <small class="text-muted">
                        {{ $msg->created_at->format('H:i') }} - {{ $msg->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        @endforeach
    </div>

    <form method="POST" action="{{ route('chat.withUser', [$dokter->id, $user_id]) }}">
        @csrf
        <div class="input-group">
            <input type="text" name="message" class="form-control" placeholder="Ketik pesan..." required>
            <button type="submit" class="btn btn-primary">Kirim</button>
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
