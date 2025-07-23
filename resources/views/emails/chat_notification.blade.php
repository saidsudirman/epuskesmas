<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Chat</title>
</head>
<body>
    <h2>Halo, ada pesan baru!</h2>
    <p><strong>Dari:</strong> {{ $senderName }}</p>
    <p><strong>Isi Pesan:</strong></p>
    <blockquote>{{ $messageText }}</blockquote>
    <p>Silakan balas melalui link berikut:</p>
    <a href="{{ $chatLink }}">{{ $chatLink }}</a>
</body>
</html>
