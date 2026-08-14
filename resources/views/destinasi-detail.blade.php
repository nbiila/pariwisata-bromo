@extends('layouts.app')
@section('title', $destinasi->nama . ' - Wisata Bromo')

<?php
date_default_timezone_set("Asia/Jakarta");
$jamSekarang = date("H:i:s");
$statusBuka = ($jamSekarang >= $destinasi->jam_buka && $jamSekarang < $destinasi->jam_tutup)
    ? 'Wisata Buka'
    : 'Wisata Tutup';

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
    5 => [
        'Menyaksikan arsitektur pura suci Suku Tengger di tengah lautan pasir',
        'Berfoto dengan latar Gunung Batok dan lautan pasir Bromo',
        'Berdoa/bersembahyang bagi wisatawan yang beragama Hindu',
        'Melanjutkan trekking menuju kawah Bromo lewat ratusan anak tangga di dekat pura',
    ],
    6 => [
        'Berkendara jeep menyusuri hamparan lautan pasir dengan latar Gunung Bromo dan Batok',
        'Berfoto di spot ikonik dengan komposisi bukit pasir dan pegunungan Tengger, terutama saat pagi hari',
        'Berkuda menyusuri lautan pasir sebagai alternatif jeep',
        'Merasakan fenomena "bisikan pasir" saat angin kencang menyapu permukaan pasir',
        'Melanjutkan perjalanan menuju Pura Luhur Poten atau kawah Bromo, karena lokasinya berdekatan',
    ],
    7 => [
        'Menjelajahi goa alami sambil belajar sejarah dan nilai spiritualnya bagi Suku Tengger',
        'Melihat mata air jernih di dalam goa yang dipakai warga untuk membersihkan diri',
        'Mengamati patung yang menjadi tempat ritual masyarakat Tengger',
        'Menikmati panorama kaldera Bromo dari Bukit Widodaren dengan sudut pandang berbeda dari Penanjakan',
        'Trekking ringan menyusuri jalur menanjak menuju goa',
    ],
    8 => [
        'Menyaksikan kehidupan masyarakat Suku Tengger di desa terakhir sebelum kawasan lautan pasir Bromo',
        'Berburu spot foto dengan latar Gunung Bromo dari gapura ikonik Cemoro Lawang',
        'Menyewa jeep hardtop bersama warga lokal untuk menjelajah kawasan Bromo',
        'Mengunjungi rumah-rumah tradisional khas Tengger di sepanjang jalan desa',
        'Mencicipi kuliner khas seperti jagung bakar, wedang ronde, dan nasi aron Tengger',
        'Bermalam di homestay warga untuk merasakan suasana pagi dingin pegunungan sebelum sunrise',
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
    5 => [
        'Datang pagi hari agar bisa melihat pura dengan latar cahaya matahari menembus kabut',
        'Gunakan pakaian sopan dan jaga sikap karena ini tempat ibadah aktif, bukan sekadar objek foto',
        'Jangan masuk ke area inti pura kecuali untuk beribadah, minta izin dulu sebelum masuk',
        'Bawa masker debu dan air minum karena harus melintasi lautan pasir yang berangin',
    ],
    6 => [
        'Datang pagi hari untuk cahaya foto terbaik sekaligus suhu yang belum terlalu terik',
        'Gunakan masker dan kacamata pelindung karena pasir mudah beterbangan saat angin kencang',
        'Akses hanya bisa lewat jeep hardtop dari Cemoro Lawang, Tosari/Wonokitri, atau Ngadas — mobil pribadi/city car tidak disarankan menembus medan pasir',
        'Bawa air minum yang cukup, area terbuka dan minim tempat berteduh',
    ],
     7 => [
        'Wajib didampingi pemandu lokal karena jalur menanjak dan berliku, kurang cocok bagi pemula',
        'Bawa bekal dan air minum yang cukup karena perjalanan cukup menguras tenaga',
        'Gunakan alas kaki trekking yang nyaman dan anti-slip',
        'Jaga sikap dan hormati nilai sakral tempat ini, karena masih digunakan untuk ritual oleh warga Tengger',
    ],
    8 => [
        'Bawa jaket tebal karena suhu malam dan dini hari bisa di bawah 10°C',
        'Booking homestay/penginapan jauh-jauh hari, terutama saat musim liburan',
        'Nego harga sewa jeep di titik ini sebelum berangkat ke Bromo, karena Cemoro Lawang jadi salah satu pos utama',
        'Hormati adat dan budaya warga Tengger, terutama saat ada upacara adat berlangsung',
        'Datang sore hari agar sempat menikmati suasana desa sebelum berangkat dini hari mengejar sunrise',
    ],
    default => [],
};

$mapBbox = match ($destinasi->id) {
    1 => '112.9130,-7.9480,112.9930,-7.8680',
    2 => '112.8847,-8.0001,112.9647,-7.9201',
    3 => '112.9320,-7.9680,113.0120,-7.8880',
    4 => '112.9330,-7.9430,112.9730,-7.8830',
    5 => '112.9305,-7.9701,112.9705,-7.9101',
    6 => '112.9450,-7.9550,113.0050,-7.8950',
    7 => '112.9450,-7.9350,112.9850,-7.8750',
    8 => '112.9350,-7.9450,112.9750,-7.8850',
    default => '',
};

$mapMarker = match ($destinasi->id) {
    1 => '-7.9080,112.9530',
    2 => '-7.9601,112.9247',
    3 => '-7.9280,112.9720',
    4 => '-7.9130,112.9530',
    5 => '-7.9401,112.9505',
    6 => '-7.9250,112.9750',
    7 => '-7.9050,112.9650',
    8 => '-7.9150,112.9550',
    default => '',
};

$mapLat = match ($destinasi->id) {
    1 => '-7.9080',
    2 => '-7.9601',
    3 => '-7.9280',
    4 => '-7.9130',
    5 => '-7.9401',
    6 => '-7.9250',
    7 => '-7.9050',
    8 => '-7.9150',
    default => '',
};

$mapLon = match ($destinasi->id) {
    1 => '112.9530',
    2 => '112.9247',
    3 => '112.9720',
    4 => '112.9530',
    5 => '112.9505',
    6 => '112.9750',
    7 => '112.9650',
    8 => '112.9550',
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
    5 => [
        ['icon' => 'bi bi-p-circle', 'label' => 'Area Parkir'],
        ['icon' => 'bi bi-house-door', 'label' => 'Toilet Umum'],
        ['icon' => 'bi bi-shop', 'label' => 'Warung'],
        ['icon' => 'bi bi-camera', 'label' => 'Spot Foto'],
        ['icon' => 'bi bi-bag', 'label' => 'Penyewaan Kuda/Jeep'],
        ['icon' => 'bi bi-ticket-perforated', 'label' => 'Loket Tiket'],
    ],
    6 => [
        ['icon' => 'bi bi-p-circle', 'label' => 'Area Parkir/Transit Jeep'],
        ['icon' => 'bi bi-truck', 'label' => 'Penyewaan Jeep'],
        ['icon' => 'bi bi-bag', 'label' => 'Penyewaan Kuda'],
        ['icon' => 'bi bi-camera', 'label' => 'Spot Foto'],
        ['icon' => 'bi bi-signpost', 'label' => 'Jasa Pemandu'],
    ],
     7 => [
        ['icon' => 'bi bi-droplet', 'label' => 'Mata Air Alami'],
        ['icon' => 'bi bi-signpost', 'label' => 'Jasa Pemandu'],
        ['icon' => 'bi bi-camera', 'label' => 'Spot Foto'],
     ],
      8 => [
        ['icon' => 'bi bi-p-circle', 'label' => 'Area Parkir'],
        ['icon' => 'bi bi-house-door', 'label' => 'Toilet Umum'],
        ['icon' => 'bi bi-house', 'label' => 'Homestay'],
        ['icon' => 'bi bi-shop', 'label' => 'Warung Makan'],
        ['icon' => 'bi bi-truck', 'label' => 'Penyewaan Jeep'],
        ['icon' => 'bi bi-building', 'label' => 'Mushola'],
    ],
    default => [
        ['icon' => 'bi bi-p-circle', 'label' => 'Area Parkir'],
        ['icon' => 'bi bi-house-door', 'label' => 'Toilet Umum'],
    ],
};
?>

@section('content')

<section class="detail-hero" style="background-image: url('{{ asset('storage/' . $destinasi->gambar) }}');">
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
        @if($destinasi->kategori)
            <span class="badge bg-secondary">{{ $destinasi->kategori->nama_kategori }}</span>
        @endif
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

                    @if(Auth::check() && Auth::user()->role === 'admin')
                    <a href="{{ route('destinasi.edit', $destinasi->id) }}" class="btn btn-outline-cancel w-100 mt-2">
                        <i class="bi bi-pencil-square me-1"></i> Edit Destinasi
                    </a>
                    @endif

  <form action="{{ route('destinasi.destroy', $destinasi->id) }}" method="POST"
      class="form-hapus"
      data-nama="{{ $destinasi->nama }}">
    @csrf
    @method('DELETE')
    @if(Auth::check() && Auth::user()->role === 'admin')
    <button type="submit" class="btn btn-outline-cancel w-100 mt-2">
        <i class="bi bi-trash me-1"></i> Hapus Destinasi
    </button>
    @endif
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

<div class="container">
    <div class="detail-atraksi mt-5">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <h2 class="section-title mb-0">
                <i class="bi bi-geo-alt-fill text-primary"></i> Atraksi di Destinasi Ini
            </h2>

            @if(Auth::check() && Auth::user()->role === 'admin')
                <a href="{{ route('atraksi.create') }}" class="btn-bromo">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Atraksi
                </a>
            @endif
        </div>

        <div class="row g-4">
            @forelse ($destinasi->atraksi as $atraksi)
                <div class="col-md-4">
                    <div class="atraksi-card-link atraksi-card-trigger text-decoration-none text-dark d-block h-100"
                         role="button"
                         tabindex="0"
                         data-bs-toggle="modal"
                         data-bs-target="#atraksiModal{{ $atraksi->id }}">
                        <div class="atraksi-card h-100">
                            <div class="atraksi-img-wrap">
                                <img src="{{ asset('storage/' . $atraksi->gambar) }}"
                                     alt="{{ $atraksi->nama }}"
                                     class="atraksi-img">
                                <span class="atraksi-badge">{{ $atraksi->kategori }}</span>
                            </div>
                            <div class="atraksi-body">
                                <h6 class="atraksi-title">{{ $atraksi->nama }}</h6>
                                @if($atraksi->deskripsi)
                                    <p class="atraksi-desc">{{ Str::limit($atraksi->deskripsi, 70) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">Belum ada atraksi untuk destinasi ini.</p>
                </div>
            @endforelse
        </div>

        {{-- Popup card (modal) tiap atraksi, dipicu dari klik kartu di atas --}}
       @foreach ($destinasi->atraksi as $atraksi)
    @php
        $ikonKategori = match (strtolower($atraksi->kategori)) {
            'budaya' => 'bi-flower1',
            'alam' => 'bi-tree',
            'petualangan' => 'bi-compass',
            'kuliner' => 'bi-cup-hot',
            default => 'bi-stars',
        };
    @endphp

    <div class="modal fade" id="atraksiModal{{ $atraksi->id }}" tabindex="-1"
         aria-labelledby="atraksiModalLabel{{ $atraksi->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content atraksi-modal-content">

                <button type="button" class="btn-close position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal" aria-label="Close"
                        style="z-index: 10; filter: invert(1);"></button>

                <div class="atraksi-modal-media">
                    <img src="{{ asset('storage/' . $atraksi->gambar) }}"
                         alt="{{ $atraksi->nama }}"
                         class="atraksi-modal-img">
                    <div class="atraksi-modal-gradient"></div>

                    <span class="atraksi-modal-badge">
                        <i class="bi {{ $ikonKategori }}"></i> {{ $atraksi->kategori }}
                    </span>

                    <h5 class="atraksi-modal-title" id="atraksiModalLabel{{ $atraksi->id }}">
                        {{ $atraksi->nama }}
                    </h5>
                </div>

                <div class="modal-body">
                    <p class="atraksi-modal-desc mb-3">{{ $atraksi->deskripsi }}</p>

                    <div class="atraksi-modal-meta">
                        <i class="bi bi-geo-alt-fill"></i>
                        Bagian dari destinasi <strong>{{ $destinasi->nama }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
    </div>

    <div class="ulasan-section mt-5 mb-5">
        <div class="review-list-header">
            <div class="eyebrow">Kata Mereka</div>
            <h2>Ulasan Pengunjung</h2>
        </div>

        <div class="review-grid">
            @forelse ($destinasi->ulasan as $ulasan)
                <div class="review-item">
                    <div class="review-item-top">
                        <div class="review-item-avatar">
                            {{ strtoupper(substr($ulasan->user->name, 0, 1)) }}
                        </div>
                        <div class="review-item-meta">
                            <div class="review-item-user">{{ $ulasan->user->name }}</div>
                            <div class="review-item-stars">
                                {{ str_repeat('★', $ulasan->rating) }}{{ str_repeat('☆', 5 - $ulasan->rating) }}
                            </div>
                        </div>
                    </div>
                    <p class="review-item-komentar">{{ $ulasan->komentar }}</p>
                </div>
            @empty
                <div class="review-empty">
                    Belum ada ulasan untuk destinasi ini.
                </div>
            @endforelse
        </div>
    </div>
</div>

<a href="{{ route('ulasan.create', $destinasi->id) }}" class="btn btn-kirim mt-3">
    Tulis Ulasan
</a>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/atraksi.css') }}">
    <style>
        .atraksi-card-trigger { cursor: pointer; }
    </style>
@endpush