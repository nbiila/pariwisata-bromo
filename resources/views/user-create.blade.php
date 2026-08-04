@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')

<div class="container my-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card form-card">

                <div class="form-header">
                    <div class="icon-wrap">
                        <i class="bi bi-person-plus-fill fs-5"></i>
                    </div>
                    <h2>Tambah User Baru</h2>
                    <p>Lengkapi data di bawah untuk menambahkan akun baru</p>
                </div>

                <div class="card-body p-4">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Nama" value="{{ old('name') }}" required>
                            <label for="name">Nama</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="Email" value="{{ old('email') }}" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="form-floating mb-4 password-wrap">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Password" required>
                            <label for="password">Password</label>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="bi bi-eye" id="toggleIcon"></i>
                            </button>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold mb-2">Role</label>
                            <div class="role-options">
                                <div class="role-option">
                                    <input type="radio" id="role-user" name="role" value="user" checked>
                                    <label for="role-user">
                                        <i class="bi bi-person"></i>
                                        User
                                    </label>
                                </div>
                                <div class="role-option">
                                    <input type="radio" id="role-admin" name="role" value="admin">
                                    <label for="role-admin">
                                        <i class="bi bi-shield-lock"></i>
                                        Admin
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-bromo">
                                <i class="bi bi-check2-circle me-1"></i> Simpan User
                            </button>
                            <a href="{{ route('user') }}" class="btn btn-outline-cancel">Batal</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>
@endsection