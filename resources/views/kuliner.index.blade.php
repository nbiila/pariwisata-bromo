@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Kuliner Khas Bromo</h2>

    <div class="row g-4">
        @forelse ($kuliner as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 220px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item->nama }}</h5>
                        <p class="card-text text-primary fw-semibold mb-2">{{ $item->harga }}</p>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                        <p class="card-text mt-auto">
                            <i class="bi bi-geo-alt"></i>
                            <small class="text-muted">Ditemukan di: {{ $item->lokasi_ditemukan }}</small>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p>Belum ada data kuliner.</p>
        @endforelse
    </div>
</div>
@endsection