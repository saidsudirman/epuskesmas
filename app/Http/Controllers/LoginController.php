<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
        "title" => "login"]);
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        
        $user = Auth::user(); 
        
        switch ($user->role) {
            case 'admin':
                return redirect()->route('dashboard');
            case 'dokter':
                return redirect()->route('chat.dokter');
            default:
                // Handle other roles or no role
                Auth::logout(); // Log out if role is not recognized
                return back()->withErrors(['email' => 'Unauthorized access.']);
        }
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}

        public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
