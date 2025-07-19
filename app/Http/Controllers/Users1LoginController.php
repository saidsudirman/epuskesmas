<?php
// app/Http/Controllers/Auth/Users1LoginController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Users1LoginController extends Controller
{
    public function userindex(Request $request)
    {
        // Simpan redirect URL ke session jika tersedia
        if ($request->has('redirect')) {
            session(['url.intended' => $request->query('redirect')]);
        }

        return view('loginuser.index', [
            "title" => "Login"
        ]);
    }

    public function userlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('users1')->attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect ke halaman yang disimpan di URL
            if ($request->filled('redirect')) {
                return redirect($request->input('redirect'));
            }

            // Jika tidak ada redirect, redirect default
            return redirect()->intended('/dokter/{id}/detail');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }


        public function userlogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/user/login');
    }
}