@extends('layouts.main') {{-- Ganti sesuai layout yang kamu pakai --}}

@section('post')

<div class="container mt-5">
    <ul class="nav nav-tabs" id="authTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane" type="button" role="tab">Login</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-tab-pane" type="button" role="tab">Register</button>
        </li>
    </ul>

    <div class="tab-content mt-4" id="authTabContent">
        {{-- Login Form --}}
        <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel">
            <form action="{{ route('userlogin.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button class="btn btn-primary" type="submit">Login</button>
            </form>
        </div>

        {{-- Register Form --}}
        <div class="tab-pane fade" id="register-tab-pane" role="tabpanel">
            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button class="btn btn-success" type="submit">Daftar</button>
            </form>
        </div>
    </div>
</div>
@endsection
