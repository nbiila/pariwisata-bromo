@extends('layouts.app')
@section('title', 'Daftar')
@section('content')
<div class="auth-wrapper d-flex align-items-center justify-content-center py-5">
    <div class="auth-card shadow-lg">
        <div class="row g-0">
            <div class="col-lg-5 d-none d-lg-block auth-side"
                 style="background-image: url('{{ asset('images/madaripura3.jpg') }}');">
                <div class="auth-side-overlay">
                    <h3 class="fw-bold text-white">Mulai Petualanganmu</h3>
                    <p class="text-white-50 mb-0">Daftar dan temukan destinasi terbaik di Bromo.</p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold mb-1">Daftar Akun</h2>
                    <p class="text-muted mb-4">Buat akun baru untuk mulai menjelajah</p>

                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" placeholder="Nama lengkap">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

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

                        <div class="mb-3">
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

                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" name="password_confirmation"
                                       class="form-control" placeholder="••••••••">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-auth w-100">Daftar</button>
                    </form>

                    <p class="text-center text-muted mt-4 mb-0">
                        Sudah punya akun? <a href="{{ route('login') }}" class="auth-link">Login di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection