@extends('layouts.app')
@section('title', 'Kelola Profil')
@section('content')

@php $foto = fotoProfil($user->id); @endphp

<div class="profile-page py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="profile-card">
                    <div class="profile-cover">
                        <div class="profile-avatar-wrap">
                            <div class="position-relative d-inline-block">
                                @if ($foto)
                                    <img src="{{ $foto }}" id="preview-foto"
                                         class="profile-avatar">
                                @else
                                    <div id="preview-foto-fallback" class="profile-avatar profile-avatar-fallback">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <img id="preview-foto" class="profile-avatar d-none">
                                @endif

                                <label for="foto-input" id="btn-kamera" class="profile-camera-btn d-none">
                                    <i class="bi bi-camera-fill"></i>
                                </label>
                                <input type="file" name="foto" id="foto-input" accept="image/*" class="d-none" form="form-profil">
                            </div>
                        </div>
                    </div>

                    <div class="profile-body">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold mb-0">{{ $user->name }}</h2>
                            <p class="text-muted mb-0">{{ $user->email }}</p>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                            </div>
                        @endif

                        <form id="form-profil" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @error('foto')
                                <div class="text-danger small text-center mb-3">{{ $message }}</div>
                            @enderror

                            <div class="profile-section">
                                <h6 class="profile-section-title"><i class="bi bi-person me-2"></i>Informasi Akun</h6>

                                {{-- MODE LIHAT (default) --}}
                                <div id="view-mode">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Nama</label>
                                            <p class="profil-display">{{ $user->name }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <p class="profil-display">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- MODE EDIT (muncul setelah klik Edit) --}}
                                <div id="edit-mode" class="d-none">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Nama</label>
                                            <input type="text" name="name" id="input-name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name', $user->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" id="input-email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <p class="text-muted small mb-3">Kosongkan password jika tidak ingin menggantinya</p>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Password Baru</label>
                                                <input type="password" name="password" id="input-password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       placeholder="••••••••">
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Konfirmasi Password</label>
                                                <input type="password" name="password_confirmation" id="input-password-confirm"
                                                       class="form-control" placeholder="••••••••">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="button" id="btn-edit" class="btn btn-profile-cancel">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </button>
                                <button type="button" id="btn-batal" class="btn btn-profile-cancel d-none">
                                    Batal
                                </button>
                                <button type="submit" id="btn-simpan" class="btn btn-profile-save d-none">
                                    <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
.profile-page { background-color: #f4f6f9; min-height: 80vh; }

.profile-card {
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(10,36,114,0.08);
}

.profile-cover {
    height: 130px;
    background: linear-gradient(120deg, #0a2472 0%, #3f6ea1 60%, #e8945a 130%);
    position: relative;
    display: flex;
    justify-content: center;
}

.profile-avatar-wrap {
    position: absolute;
    bottom: -55px;
}

.profile-avatar {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #fff;
    display: block;
    background: #fff;
}

.profile-avatar-fallback {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #e8945a;
    color: #fff;
    font-size: 2.4rem;
    font-weight: 700;
}

.profile-camera-btn {
    position: absolute;
    bottom: 4px;
    right: 4px;
    width: 32px;
    height: 32px;
    background-color: #e8945a;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border: 2px solid #fff;
    transition: background-color 0.2s ease;
}
.profile-camera-btn:hover { background-color: #d97f3f; }

.profile-body {
    padding: 70px 2.5rem 2.5rem;
}

.profile-section {
    border-top: 1px solid #eef0f3;
    padding-top: 1.25rem;
    margin-top: 1.25rem;
}
.profile-section:first-of-type {
    border-top: none;
    margin-top: 0;
}

.profile-section-title {
    font-weight: 600;
    color: #0a2472;
    margin-bottom: 1rem;
}

.profil-display {
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 6px;
    padding: 0.6rem 0.9rem;
    margin: 0;
    color: #333;
    user-select: none;
    pointer-events: none;
}

.btn-profile-save {
    background-color: #e8945a;
    border: none;
    color: #fff;
    font-weight: 600;
    padding: 0.55rem 1.5rem;
    border-radius: 8px;
    transition: background-color 0.2s ease;
}
.btn-profile-save:hover { background-color: #d97f3f; color: #fff; }

.btn-profile-cancel {
    background: transparent;
    border: 1px solid #dcdfe4;
    color: #5f5e5a;
    font-weight: 600;
    padding: 0.55rem 1.5rem;
    border-radius: 8px;
    transition: all 0.2s ease;
}
.btn-profile-cancel:hover { background-color: #f4f6f9; color: #5f5e5a; }
</style>

<script>
document.getElementById('foto-input').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (ev) {
        const img = document.getElementById('preview-foto');
        img.src = ev.target.result;
        img.classList.remove('d-none');

        const fallback = document.getElementById('preview-foto-fallback');
        if (fallback) fallback.classList.add('d-none');
    };
    reader.readAsDataURL(file);
});

const viewMode = document.getElementById('view-mode');
const editMode = document.getElementById('edit-mode');
const btnEdit = document.getElementById('btn-edit');
const btnBatal = document.getElementById('btn-batal');
const btnSimpan = document.getElementById('btn-simpan');
const btnKamera = document.getElementById('btn-kamera');

btnEdit.addEventListener('click', function () {
    viewMode.classList.add('d-none');
    editMode.classList.remove('d-none');
    btnKamera.classList.remove('d-none');

    btnEdit.classList.add('d-none');
    btnBatal.classList.remove('d-none');
    btnSimpan.classList.remove('d-none');

    document.getElementById('input-name').focus();
});

btnBatal.addEventListener('click', function () {
    document.getElementById('input-name').value = "{{ $user->name }}";
    document.getElementById('input-email').value = "{{ $user->email }}";
    document.getElementById('input-password').value = "";
    document.getElementById('input-password-confirm').value = "";

    document.querySelectorAll('#edit-mode .is-invalid').forEach(el => el.classList.remove('is-invalid'));

    editMode.classList.add('d-none');
    viewMode.classList.remove('d-none');
    btnKamera.classList.add('d-none');

    btnEdit.classList.remove('d-none');
    btnBatal.classList.add('d-none');
    btnSimpan.classList.add('d-none');
});
</script>
@endsection