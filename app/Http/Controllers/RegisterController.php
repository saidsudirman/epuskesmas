<?php

namespace App\Http\Controllers;

use App\Models\Users1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('loginuser.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users1,email',
            'password' => 'required|string|confirmed',
        ]);

        Users1::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('userlogin.post')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
