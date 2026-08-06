@extends('layouts.app')
@section('title', $destinasi->nama . ' - Wisata Bromo')

<?php
date_default_timezone_set("Asia/Jakarta");
$jamSekarang = date("H:i:s");
$statusBuka = ($jamSekarang >= $destinasi->jam_buka && $jamSekarang < $destinasi->jam_tutup)
    ? 'Wisata Buka'
    : 'Wisata Tutup';

// Data tambahan yang belum ada kolomnya di database, ditulis manual per id
$aktivitas = match ($destinasi->id) {
    1 => [
        'Berburu momen matahari terbit dari titik pandang bukit',
        'Foto dengan latar empat gunung sekaligus',
        'Sewa jeep bersama dari Cemoro Lawang',
    ],
    2 => [
        'Trekking menyusuri sungai menuju air terjun utama',
        'Bermain air di kolam bawah air terjun',
        'Menyewa jas hujan/ponco dari warga sekitar',
    ],
    3 => [
        'Menunggang kuda berkeliling savana',
        'Piknik santai di atas bukit',
        'Sesi foto dengan latar bukit hijau berlapis',
    ],
    4 => [
        'Berjalan melintasi jembatan kaca sambil menikmati panorama Gunung Bromo, Batok, dan Semeru dari ketinggian',
        'Berfoto di atas lantai kaca dengan latar jurang sedalam 83 meter di bawahnya',
        'Bersantai di cafe area shuttle sambil menikmati pemandangan perbukitan dan Gunung Bromo',
    ],
    default => [],
};

$tips = match ($destinasi->id) {
    1 => [
        'Datang minimal jam 03.30 untuk dapat posisi terbaik',
        'Suhu dini hari bisa di bawah 10°C, bawa jaket tebal',
        'Bawa senter karena jalur menuju bukit masih minim penerangan',
    ],
    2 => [
        'Gunakan alas kaki anti-slip karena jalur berbatu dan licin',
        'Bawa pakaian ganti, area dekat air terjun pasti basah',
        'Hindari musim hujan deras karena debit air bisa sangat kuat',
    ],
    3 => [
        'Paling hijau saat musim hujan (Desember–April)',
        'Nego harga sewa kuda dengan pemandu sebelum naik',
        'Gunakan topi/sunblock karena area terbuka minim naungan',
    ],
    4 => [
        'Datang pagi hari (jam 08.00-10.00) atau sore (15.30-17.00) untuk lighting foto terbaik',
        'Siapkan tiket terpisah, karena tiket Jembatan Kaca beda dengan tiket masuk kawasan Taman Nasional Bromo Tengger Semeru',
        'Wajib pakai alat pengaman yang disediakan (pelindung kaki dan body harness) saat melintasi jembatan',
        'Kalau takut ketinggian, pertimbangkan dulu karena jembatan ini membentang di atas jurang cukup dalam (83 meter)',
    ],
    default => [],
};

$mapBbox = match ($destinasi->id) {
    1 => '112.9130,-7.9480,112.9930,-7.8680',
    2 => '112.8847,-8.0001,112.9647,-7.9201',
    3 => '112.9320,-7.9680,113.0120,-7.8880',
    4 => '112.9330,-7.9430,112.9730,-7.8830',
    default => '',
};

$mapMarker = match ($destinasi->id) {
    1 => '-7.9080,112.9530',
    2 => '-7.9601,112.9247',
    3 => '-7.9280,112.9720',
    4 => '-7.9130,112.9530',
    default => '',
};

$mapLat = match ($destinasi->id) {
    1 => '-7.9080',
    2 => '-7.9601',
    3 => '-7.9280',
    4 => '-7.9130',
    default => '',
};

$mapLon = match ($destinasi->id) {
    1 => '112.9530',
    2 => '112.9247',
    3 => '112.9720',
    4 => '112.9530',
    default => '',
};

$fasilitas = match ($destinasi->id) {
    1 => [
        ['icon' => 'bi bi-p-circle', 'label' => 'Area Parkir'],
        ['icon' => 'bi bi-house-door', 'label' => 'Toilet Umum'],
        ['icon' => 'bi bi-shop', 'label' => 'Warung'],
        ['icon' => 'bi bi-camera', 'label' => 'Spot Foto'],
        ['icon' => 'bi bi-bag', 'label' => 'Penyewaan Jaket/Tikar'],
        ['icon' => 'bi bi-building', 'label' => 'Mushola'],
    ],
    2 => [
        ['icon' => 'bi bi-p-circle', 'label' => 'Area Parkir'],
        ['icon' => 'bi bi-house-door', 'label' => 'Toilet Umum'],
        ['icon' => 'bi bi-shop', 'label' => 'Warung Makan'],
        ['icon' => 'bi bi-building', 'label' => 'Mushola'],
        ['icon' => 'bi bi-bag', 'label' => 'Penyewaan Jas Hujan'],
        ['icon' => 'bi bi-signpost', 'label' => 'Jasa Pemandu'],
    ],
    3 => [
        ['icon' => 'bi bi-p-circle', 'label' => 'Area Parkir'],
        ['icon' => 'bi bi-house-door', 'label' => 'Toilet Umum'],
        ['icon' => 'bi bi-shop', 'label' => 'Warung'],
        ['icon' => 'bi bi-camera', 'label' => 'Spot Foto'],
        ['icon' => 'bi bi-bag', 'label' => 'Penyewaan Kuda'],
    ],
    4 => [
        ['icon' => 'bi bi-p-circle', 'label' => 'Area Parkir'],
        ['icon' => 'bi bi-house-door', 'label' => 'Toilet Umum'],
        ['icon' => 'bi bi-shop', 'label' => 'Kios Suvenir'],
        ['icon' => 'bi bi-cup-hot', 'label' => 'Pujasera/Cafe'],
        ['icon' => 'bi bi-ticket-perforated', 'label' => 'Loket Tiket'],
    ],
    default => [
        ['icon' => 'bi bi-p-circle', 'label' => 'Area Parkir'],
        ['icon' => 'bi bi-house-door', 'label' => 'Toilet Umum'],
    ],
};
?>

@section('content')

<section class="detail-hero" style="background-image: url('{{ asset('images/' . $destinasi->gambar) }}');">
    <div class="container detail-hero__inner">
        <p class="detail-hero__breadcrumb">
            <a href="{{ route('beranda') }}">Beranda</a> /
            <a href="{{ route('destinasi') }}">Destinasi</a> /
            {{ $destinasi->nama }}
        </p>
        <h1 class="detail-hero__title">{{ $destinasi->nama }}</h1>
        <span class="badge detail-hero__badge {{ $statusBuka == 'Wisata Buka' ? 'bg-success' : 'bg-secondary' }}">
            {{ $statusBuka }}
        </span>
    </div>
</section>

<div class="detail-body">
    <div class="container">
        <div class="row g-4">

            <!-- KONTEN UTAMA -->
            <div class="col-lg-8">

                <section class="detail-section">
                    <h2 class="detail-section-title">Tentang {{ $destinasi->nama }}</h2>
                    <p>{{ $destinasi->deskripsi }}</p>
                </section>

                <section class="detail-section">
                    <h2 class="detail-section-title">Aktivitas</h2>
                    <ul class="detail-list detail-list--dot">
                        @foreach ($aktivitas as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
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
                            <h5 class="card-title detail-section-title" style="border-bottom: none; padding-bottom: 0; margin-bottom: 12px;">Fasilitas Tersedia</h5>
                            <div class="row row-cols-2 row-cols-md-4 g-3 mt-2">
                                @foreach ($fasilitas as $f)
                                    <div class="col"><i class="{{ $f['icon'] }}"></i> {{ $f['label'] }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">

                <div class="detail-panel detail-panel--info">
                    <p class="detail-panel__title"><i class="bi bi-info-circle"></i> Info Kunjungan</p>

                    <div class="detail-panel__row">
                        <p class="detail-panel__label">Harga Tiket</p>
                       <p>
    {{ $destinasi->harga_tiket == 0 ? 'Gratis' : 'Rp ' . number_format($destinasi->harga_tiket, 0, ',', '.') }}
</p>

                    </div>
                    <div class="detail-panel__row">
                        <p class="detail-panel__label">Jam Buka</p>
                        <p class="detail-panel__value">{{ substr($destinasi->jam_buka, 0, 5) }} – {{ substr($destinasi->jam_tutup, 0, 5) }} WIB</p>
                    </div>
                    <div class="detail-panel__row">
                        <p class="detail-panel__label">Lokasi</p>
                        <p class="detail-panel__value">{{ $destinasi->lokasi }}</p>
                    </div>

                    <a href="#" class="detail-panel__cta">
                        <i class="bi bi-cart"></i> Pesan Paket Wisata
                    </a>

  <form action="{{ route('destinasi.destroy', $destinasi->id) }}" method="POST"
      class="form-hapus"
      data-nama="{{ $destinasi->nama }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-cancel w-100">
        <i class="bi bi-trash me-1"></i> Hapus Destinasi
    </button>
</form>

                </div>

                <div class="detail-panel detail-panel--map">
                    <p class="detail-panel__title"><i class="bi bi-geo-alt"></i> Peta Lokasi</p>
                    <div class="detail-map">
                        <iframe
                            src="https://www.openstreetmap.org/export/embed.html?bbox={{ $mapBbox }}&layer=mapnik&marker={{ $mapMarker }}"
                            loading="lazy"
                            title="Peta lokasi {{ $destinasi->nama }}">
                        </iframe>
                    </div>
                    <a class="detail-map-link" target="_blank" rel="noopener"
                       href="https://www.openstreetmap.org/?mlat={{ $mapLat }}&mlon={{ $mapLon }}#map=13">
                        Buka di peta besar &rarr;
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection