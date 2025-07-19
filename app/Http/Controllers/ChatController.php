<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\massage_chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chats = massage_chat::all();
        $title = 'Chat Dokter';
        return view('dokters.chat', compact('title', 'chats'));
    }

    public function dokterChatDetail($dokter_id, $user_id)
{
        $dokter = auth()->guard('dokter')->user();
        if ($dokter->id != $dokter_id) abort(403);

        $chats = ChatMessage::where('dokter_id', $dokter_id)
            ->where('user_id', $user_id)
            ->orderBy('created_at')
            ->get();

        return view('dokters.chat', compact('chats'));
    }
    

}
