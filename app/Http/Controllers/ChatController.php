<?php

namespace App\Http\Controllers;

use App\Models\massage_chat;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $chats = massage_chat::with(['user', 'dokter'])->get();
        $title = 'Chat Dokter';
        return view('dokters.chat', compact('title', 'chats'));
    }

    public function send(Request $request, $dokter_id)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $userId = Auth::guard('users1')->id();

        massage_chat::create([
            'user_id' => $userId,
            'dokter_id' => $dokter_id,
            'sender' => 'user',
            'message' => $request->message,
        ]);

        $totalChat = massage_chat::where('user_id', $userId)
            ->where('dokter_id', $dokter_id)
            ->count();

        if ($totalChat === 1) {
            massage_chat::create([
                'user_id' => $userId,
                'dokter_id' => $dokter_id,
                'sender' => 'bot',
                'message' => 'Terima kasih telah menghubungi kami, dokter akan membalas chat Anda.',
            ]);
        }

        return redirect()->route('chat.detail', ['dokter_id' => $dokter_id, 'user_id' => $userId]);
    }

    public function dokterChatDetail($dokter_id, $user_id)
    {
        $dokter = Dokter::findOrFail($dokter_id);
        $chats = massage_chat::with(['dokter'])
            ->where('dokter_id', $dokter_id)
            ->orderBy('created_at')
            ->get();

        $title = 'Chat dengan Dokter';

        return view('user.chat', compact('chats', 'dokter', 'dokter_id', 'user_id', 'title'));
    }

    public function userChatDetail($dokter_id, $user_id)
    {
        $dokter = Dokter::findOrFail($dokter_id);
        $chats = massage_chat::with(['user'])
            ->where('user_id', $user_id)
            ->orderBy('created_at')
            ->get();

        $title = 'Chat dengan Dokter';

        return view('dokters.chatdetail', compact('chats', 'dokter', 'dokter_id', 'user_id', 'title'));
    }

    public function replyByDokter(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'dokter_id' => 'required',
            'message' => 'required|string',
        ]);

        massage_chat::create([
            'user_id' => $request->user_id,
            'dokter_id' => $request->dokter_id,
            'sender' => 'dokter',
            'message' => $request->message,
        ]);

        return back();
    }

    public function chatWithUser($dokter_id, $user_id)
    {
        $dokter = Dokter::findOrFail($dokter_id);
        $chats = massage_chat::with(['user', 'dokter'])
            ->where('dokter_id', $dokter_id)
            ->where('user_id', $user_id)
            ->orderBy('created_at')
            ->get();
        $title = 'Chat dengan user';

        return view('user.chatdetail', compact('dokter', 'chats', 'user_id','title'));
    }

    public function sendByDokter(Request $request, $dokter_id, $user_id)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        massage_chat::create([
            'dokter_id' => $dokter_id,
            'user_id' => $user_id,
            'sender' => 'dokter',
            'message' => $request->message,
        ]);

        return redirect()->route('chat.dokter.detail', [$dokter_id, $user_id]);
    }
}
