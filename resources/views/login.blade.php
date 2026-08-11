@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="auth-wrapper d-flex align-items-center justify-content-center py-5">
    <div class="auth-card shadow-lg">
        <div class="row g-0">
            <div class="col-lg-5 d-none d-lg-block auth-side"
                 style="background-image: url('{{ asset('images/Bromo.png') }}');">
                <div class="auth-side-overlay">
                    <h3 class="fw-bold text-white">Selamat Datang Kembali</h3>
                    <p class="text-white-50 mb-0">Jelajahi keindahan Gunung Bromo bersama kami.</p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold mb-1">Login</h2>
                    <p class="text-muted mb-4">Masuk untuk melanjutkan perjalananmu</p>

                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" placeholder="nama@email.com">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="••••••••">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-auth w-100">Login</button>
                    </form>

                    <p class="text-center text-muted mt-4 mb-0">
                        Belum punya akun? <a href="{{ route('register') }}" class="auth-link">Daftar sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection