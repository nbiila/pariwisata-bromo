@extends('layouts.app')
@section('title', 'Wisata Bromo - Beranda')
@section('content')

<section class="destinasi py-5">
    <div class="container">
                     <nav class="breadcrumb-simple">
                        <span><a href="{{ route('beranda') }}">Beranda</a></span>
                        <span><a href="{{ route('tentang') }}">Tentang</a></span>
                        <span><a href="{{ route('kontak') }}">Kontak</a></span>
                        
                     </nav>

        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #cdd7e2;">Destinasi Unggulan</h2>
            <p class="fw-bold" style="color: #cdd7e2;">Jelajahi beragam keindahan di Probolinggo, Jawa Timur.</p>
        </div>

        <div class="row g-4">

            @forelse ($destinasiList as $item)
                <?php
                date_default_timezone_set("Asia/Jakarta");
                $jamSekarang = date("H:i:s");
                $status = ($jamSekarang >= $item->jam_buka && $jamSekarang < $item->jam_tutup)
                    ? 'Wisata Buka'
                    : 'Wisata Tutup';
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm destinasi-card">
                        <div class="position-relative">
                            <img src="{{ asset('images/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 220px; object-fit: cover;">
                            <span class="badge position-absolute top-0 end-0 m-2 {{ $status == 'Wisata Buka' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $status }}
                            </span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold" style="color: #3f6ea1;">{{ $item->nama }}</h5>
                            <p class="card-text fw-bold">{{ $item->deskripsi }}</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="{{ route('destinasi.detail', $item->id) }}" class="btn btn-sm" style="background-color: #e8945a; color: white;">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p class="text-white">Belum tersedia Destinasi.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection