@extends('layouts.app')

@section('title', $atraksi->nama . ' - Wisata Bromo')

<?php
$tips = match ($atraksi->id) {
    1 => [
        'Datang di pagi hari untuk mendapatkan suasana yang segar dan dapat memiliki waktu lebih untuk disana',
        'Bawa uang tunai untuk keperluan sewa di lokasi',
        'Menggunakan sendal slip on untuk menghindari cidera',
        'Membawa minuman lebih karena perjalanan sampai sekitar 20 menitan',
        'Disarankan untuk memakai jasa pemandu agar memudahkan perjalanan'
    ],
    2 => [
        'Menggunakan baju yang nyaman untuk bermain air tetapi tetap sopan',
        'Disarankan menjauhi Air Terjun karna bisa berbahaya',
        'Gunakan alat jika tidak bisa berenang atau di bawah pengawasan'
    ],
    3 => [
        'Memakai outfit yang nyaman dan cocok dengan kondisi',
        'Membawa alat potret yang memadai untuk mengambil keindahan',
        'Datang sesuai jam yang disarankan agar dapat view yang bagus'
    ],
    4 => [
        'Membawa perlatan piknik',
        'Mencari tempat yang bagus dan cocok untuk berpiknik',
        'Menuyediakan Makan dan Minum untuk berpiknik',
        'Datang awal untuk mendapatkan tempat yang nyaman dan bagus',
    ],
    5 => [
        'Nego harga sewa kuda dengan pemandu sebelum naik',
        'Gunakan celana panjang dan sepatu tertutup agar kaki tidak lecet',
        'Pegang tali kekang atau pegangan pelana dengan erat, ikuti arahan pemandu',
        'Jangan memaksa kuda berlari kencang, biarkan berjalan sesuai ritmenya',
        'Bawa topi atau sunblock karena area savana terbuka dan minim naungan',
        'Kalau baru pertama kali, pilih rute pendek dulu sebelum coba yang lebih jauh',
        'Hindari membawa barang berharga lepas (HP, kacamata) tanpa tali pengaman',
    ],
    6 => [
        'Membawa perlatan piknik',
        'Mencari tempat yang bagus dan cocok untuk berpiknik',
        'Menuyediakan Makan dan Minum untuk berpiknik',
        'Datang awal untuk mendapatkan tempat yang nyaman dan bagus',
        'Membawa alat potret atau tripod untuk memudahkan dokumentasi',
    ],
    7 => [
        'Wajib didampingi pemandu lokal yang berpengalaman, jangan menyusuri sungai sendirian',
        'Pakai sepatu yang punya grip kuat (bukan sandal), jalur berbatu dan licin',
        'Gunakan pelampung/vest keselamatan yang disediakan pemandu',
        'Bawa pakaian ganti dan kantong plastik/dry bag untuk barang elektronik',
        'Hindari musim hujan deras karena debit air bisa naik drastis dan berbahaya',
        'Cek dulu kondisi cuaca dan status buka-tutup air terjun sebelum berangkat, sering ditutup saat hujan lebat',
        'Datang pagi hari supaya waktu eksplorasi lebih leluasa dan tidak terburu-buru',
    ],
    8 => [
        'Datang pagi hari (08.00–10.00) atau sore (15.30–17.00) untuk lighting foto terbaik dan tidak terlalu ramai',
        'Siapkan tiket terpisah, karena tiket Jembatan Kaca beda dari tiket masuk kawasan TNBTS',
        'Wajib pakai alat pengaman yang disediakan (pelindung kaki dan body harness) saat melintasi jembatan',
        'Pertimbangkan dulu kalau takut ketinggian, jembatan ini membentang di atas jurang sedalam 83 meter',
        'Jangan bawa barang lepas (topi, HP tanpa strap) yang bisa jatuh ke bawah jembatan',
        'Cuaca berkabut/hujan bisa bikin lantai kaca licin dan jarak pandang terbatas, cek dulu sebelum berangkat',
        'Ikuti batas jumlah pengunjung yang boleh naik jembatan bersamaan, biasanya dibatasi demi keamanan',
    ],
    9 => [
        'Siapkan tiket terpisah, karena tiket Jembatan Kaca beda dari tiket masuk kawasan TNBTS',
        'Wajib pakai alat pengaman yang disediakan (pelindung kaki dan body harness) saat melintasi jembatan',
        'Pertimbangkan dulu kalau takut ketinggian, jembatan ini membentang di atas jurang sedalam 83 meter',
        'Jangan bawa barang lepas (topi, HP tanpa strap) yang bisa jatuh ke bawah jembatan',
        'Cuaca berkabut/hujan bisa bikin lantai kaca licin dan jarak pandang terbatas, cek dulu sebelum berangkat',
        'Ikuti batas jumlah pengunjung yang boleh naik jembatan bersamaan, biasanya dibatasi demi keamanan',
    ],
    default => [
        'Gunakan alas kaki yang nyaman',
        'Datang sesuai jam operasional destinasi',
    ],
};

$perlengkapan = match ($atraksi->id) {
    1 => [
        ['icon' => 'bi bi-person-walking', 'label' => 'Tongkat Trekking'],
        ['icon' => 'bi bi-person-check', 'label' => 'Pemandu'],
        ['icon' => 'bi bi-droplet', 'label' => 'Air Minum'],
    ],
    2 => [
        ['icon' => 'bi bi-life-preserver', 'label' => 'Pelampung'],
        ['icon' => 'bi bi-house-door', 'label' => 'Area Ganti Baju'],
        ['icon' => 'bi bi-eye', 'label' => 'Pengawas Kolam'],
    ],
    3 => [
        ['icon' => 'bi bi-camera', 'label' => 'Spot Foto'],
        ['icon' => 'bi bi-stars', 'label' => 'Properti Foto'],
    ],
    4 => [
        ['icon' => 'bi bi-square', 'label' => 'Tikar/Alas Duduk'],
        ['icon' => 'bi bi-trash', 'label' => 'Tempat Sampah'],
        ['icon' => 'bi bi-shop', 'label' => 'Warung Terdekat'],
    ],
    5 => [
        ['icon' => 'bi bi-truck', 'label' => 'Kuda + Pelana'],
        ['icon' => 'bi bi-shield-check', 'label' => 'Helm Pengaman'],
        ['icon' => 'bi bi-person-check', 'label' => 'Penuntun Kuda'],
    ],
    6 => [
        ['icon' => 'bi bi-square', 'label' => 'Tikar/Alas Duduk'],
        ['icon' => 'bi bi-camera', 'label' => 'Spot Foto'],
    ],
    7 => [
        ['icon' => 'bi bi-life-preserver', 'label' => 'Vest Keselamatan'],
        ['icon' => 'bi bi-link-45deg', 'label' => 'Tali Pengaman'],
        ['icon' => 'bi bi-person-badge', 'label' => 'Pemandu Bersertifikat'],
    ],
    8 => [
        ['icon' => 'bi bi-camera', 'label' => 'Spot Foto'],
        ['icon' => 'bi bi-stars', 'label' => 'Properti Foto'],
    ],
    9 => [
        ['icon' => 'bi bi-tree', 'label' => 'Gazebo/Bangku'],
        ['icon' => 'bi bi-binoculars', 'label' => 'Spot Pandang Terbaik'],
    ],
    default => [
        ['icon' => 'bi bi-shield-check', 'label' => 'Alat Keamanan'],
        ['icon' => 'bi bi-person-check', 'label' => 'Petugas Pendamping'],
    ],
};
?>

@section('content')

<section class="detail-hero" style="background-image: url('{{ asset('storage/' . $atraksi->gambar) }}');">
    <div class="container detail-hero__inner">
        <p class="detail-hero__breadcrumb">
            <a href="{{ route('beranda') }}">Beranda</a> /
            <a href="{{ route('destinasi.detail', $atraksi->destinasi_id) }}">{{ $atraksi->destinasi->nama }}</a> /
            {{ $atraksi->nama }}
        </p>
        <span class="badge detail-hero__badge bg-secondary">{{ $atraksi->kategori }}</span>
        <h1 class="detail-hero__title">{{ $atraksi->nama }}</h1>
    </div>
</section>

<div class="detail-body">
    <div class="container">
        <div class="row g-4">

            <!-- KONTEN UTAMA -->
            <div class="col-lg-8">

                <section class="detail-section">
                    <h2 class="detail-section-title">Tentang Atraksi Ini</h2>
                    <p>{{ $atraksi->deskripsi }}</p>
                </section>

                <section class="detail-section">
                    <h2 class="detail-section-title">Tips Berkunjung</h2>
                    <ul class="detail-list detail-list--square">
                        @foreach ($tips as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="detail-section">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title detail-section-title" style="border-bottom: none; padding-bottom: 0; margin-bottom: 12px;">Perlengkapan yang Disediakan</h5>
                            <div class="row row-cols-2 row-cols-md-3 g-3 mt-2">
                                @foreach ($perlengkapan as $p)
                                    <div class="col"><i class="{{ $p['icon'] }}"></i> {{ $p['label'] }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">
                <div class="detail-panel detail-panel--info">
                    <p class="detail-panel__title"><i class="bi bi-info-circle"></i> Info Atraksi</p>

                    <div class="detail-panel__row">
                        <p class="detail-panel__label">Harga</p>
                        <p class="detail-panel__value">
                            {{ $atraksi->harga == 0 ? 'Gratis' : 'Rp ' . number_format($atraksi->harga, 0, ',', '.') }}
                        </p>
                    </div>

                    @if($atraksi->destinasi)
                    <div class="detail-panel__row">
                        <p class="detail-panel__label">Lokasi</p>
                        <p class="detail-panel__value">{{ $atraksi->destinasi->lokasi }}</p>
                    </div>
                    @endif

                    <div class="detail-panel__row">
                        <p class="detail-panel__label">Kategori</p>
                        <p class="detail-panel__value">{{ $atraksi->kategori }}</p>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('atraksi') }}" class="btn btn-outline-cancel flex-fill">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <form action="{{ route('atraksi.destroy', $atraksi->id) }}" method="POST"
                                 class="form-hapus"
                                data-nama="{{ $atraksi->nama }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-cancel w-100">
                                 <i class="bi bi-trash me-1"></i> Hapus Atraksi
                                </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@if($relatedAtraksi->count() > 0)
<div class="container">
    <div class="detail-atraksi mt-5 mb-5">
        <h2 class="section-title mb-4">
            <i class="bi bi-compass text-primary"></i> Atraksi Lainnya di Destinasi Ini
        </h2>
      <div class="row g-4">
    @forelse ($relatedAtraksi as $item)
        <div class="col-md-4">
            <a href="{{ route('atraksi.show', $item->id) }}" class="atraksi-card-link text-decoration-none text-dark d-block h-100">
                <div class="atraksi-card h-100">
                    <div class="atraksi-img-wrap">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="atraksi-img">
                        <span class="atraksi-badge">{{ $item->kategori }}</span>
                    </div>
                    <div class="atraksi-body">
                        <h6 class="atraksi-title">{{ $item->nama }}</h6>
                        @if($item->deskripsi)
                            <p class="atraksi-desc">{{ Str::limit($item->deskripsi, 70) }}</p>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-12 text-center">
            <p class="text-muted">Belum ada atraksi terkait.</p>
        </div>
    @endforelse
</div>
    </div>
</div>
@endif

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/atraksi.css') }}">
    <style>
        .atraksi-card-link:hover .atraksi-card { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.12); transition: transform 0.2s, box-shadow 0.2s; }
    </style>
@endpush