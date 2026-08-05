@extends('layouts.app')

@section('title', 'Daftar Atraksi')

@section('content')
<div class="container my-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Atraksi</li>
        </ol>
    </nav>

    <div class="card form-card mb-4">
        <div class="form-header d-flex flex-column flex-md-row align-items-md-center justify-content-md-between">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-wrap"><i class="bi bi-signpost-split"></i></div>
                <div>
                    <h2 class="mb-0">Daftar Atraksi Wisata</h2>
                    <p class="mb-0">Kelola semua atraksi wisata di sini</p>
                </div>
            </div>
            <a href="{{ route('atraksi.create') }}" class="btn btn-bromo mt-3 mt-md-0">
                <i class="bi bi-plus-lg me-1"></i> Tambah Atraksi
            </a>
        </div>
    </div>

    <div class="row g-4">
        @forelse ($atraksiList as $atraksi)
            <div class="col-md-4">
                <div class="card form-card h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <span class="badge bg-secondary mb-2 align-self-start">{{ $atraksi->kategori }}</span>
                        <h5 class="card-title">{{ $atraksi->nama }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($atraksi->deskripsi, 80) }}</p>
                        <p class="fw-bold mb-3">
                            {{ $atraksi->harga == 0 ? 'Gratis' : 'Rp ' . number_format($atraksi->harga, 0, ',', '.') }}
                        </p>

                        <div class="d-flex gap-2">
                            <a href="{{ route('atraksi.edit', $atraksi->id) }}" class="btn btn-bromo btn-sm flex-fill">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>
                        <form action="{{ route('atraksi.destroy', $atraksi->id) }}" method="POST"
      class="form-hapus flex-fill"
      data-nama="{{ $atraksi->nama }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-cancel btn-sm w-100">
        <i class="bi bi-trash me-1"></i> Hapus
    </button>
</form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card form-card">
                    <div class="card-body p-4 text-center">
                        <div class="icon-wrap mx-auto mb-3"><i class="bi bi-signpost-split"></i></div>
                        <p class="mb-0">Belum ada atraksi yang ditambahkan.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection