@extends('layouts.app')
@section('title', 'Edit Kategori')
@section('content')

<div class="container my-5" style="max-width:560px;">

    <nav class="breadcrumb-simple">
        <span><a href="{{ route('beranda') }}">Beranda</a></span>
        <span><a href="{{ route('kategori') }}">Kelola Kategori</a></span>
        <span>Edit</span>
    </nav>

    <div class="card form-card">
        <div class="form-header">
            <div class="icon-wrap">
                <i class="bi bi-pencil-square"></i>
            </div>
            <h2>Edit Kategori</h2>
            <p>Perbarui nama kategori ini.</p>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" name="nama_kategori" id="nama_kategori"
                           class="form-control @error('nama_kategori') is-invalid @enderror"
                           placeholder="Nama Kategori"
                           value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
                    <label for="nama_kategori">Nama Kategori</label>
                    @error('nama_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn-bromo">
                        <i class="bi bi-check-lg"></i> Update
                    </button>
                    <a href="{{ route('kategori') }}" class="btn btn-outline-cancel">Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection