<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChatNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $messageText;
    public $senderName;
    public $chatLink;

    public function __construct($messageText, $senderName, $chatLink)
    {
        $this->messageText = $messageText;
        $this->senderName = $senderName;
        $this->chatLink = $chatLink;
    }

    public function build()
    {
        return $this->subject('Notifikasi Chat Baru')
            ->view('emails.chat_notification');
    }
}
