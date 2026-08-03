<?php
date_default_timezone_set("Asia/Jakarta");
$NamaDaerah = "Bromo";
$jamsekarang = date("H");

if ($jamsekarang < 10) {
    $ucapan = "Selamat Pagi";
} elseif ($jamsekarang < 15) {
    $ucapan = "Selamat Siang";
} elseif ($jamsekarang < 18) {
    $ucapan = "Selamat Sore";
} else {
    $ucapan = "Selamat Malam";
}
?>

@extends('layouts.app')
@section('title', 'Wisata Bromo - Beranda')
@section('content')

<!-- HERO -->
<section class="hero-section d-flex align-items-center text-center text-white">
    <video autoplay muted loop playsinline poster="{{ asset('images/hero-bromo.jpg') }}" class="hero-video">
        <source src="{{ asset('videos/bromo.mp4') }}" type="video/mp4">
    </video>

    <div class="hero-overlay w-100">
        <div class="container">
            <p class="fw-light fs-5 mb-2 hero-fade" style="animation-delay: 0.1s;"><?php echo $ucapan; ?></p>
            <h1 class="fw-bold display-4 mb-3 hero-fade" style="animation-delay: 0.3s;">
                Selamat Datang di <?php echo $NamaDaerah; ?>
            </h1>
            <p class="lead mb-4 hero-fade" style="animation-delay: 0.5s;">
                Negeri di atas awan, tempat matahari terbit menyapa lebih dulu.
            </p>
            <div class="hero-fade" style="animation-delay: 0.7s;">
                <a href="/destinasi" class="btn btn-lg px-4" style="background-color: #e8945a; color: white;">
                    Lihat Destinasi
                </a>
            </div>
        </div>

        <a href="#tentang" class="scroll-indicator">
            <i class="bi bi-chevron-down"></i>
        </a>
    </div>
</section>

<!-- TENTANG -->
<section class="tentang-section" id="tentang">
    <div class="tentang-overlay">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <div class="text-center mb-5">
                        <span class="badge mb-3" style="background-color: #e8945a;">Tentang Kami</span>
                        <h2 class="fw-bold text-white">Mengenal <?php echo $NamaDaerah; ?> Lebih Dekat</h2>
                    </div>

                    <div class="tentang-card p-4 p-lg-5 rounded-4 shadow">
                        <p style="line-height: 1.8;">
                            Bromo dikenal dengan berbagai destinasi alam yang indah dan pemandangan yang sangat cantik.
                            Bromo menjadi salah satu destinasi alam yang sangat bagus di Jawa Timur.
                        </p>
                        <p style="line-height: 1.8;">
                            Kawasan ini berada di dalam Taman Nasional Bromo Tengger Semeru, rumah bagi lautan pasir
                            luas, savana hijau, dan kawah aktif. Waktu terbaik berkunjung adalah menjelang subuh
                            untuk menikmati sunrise dari balik gunung.
                        </p>
                        <p style="line-height: 1.8; margin-bottom: 0;">
                            Begitu kaki menapak di lautan pasir, suasana berubah total — udara dingin menusuk kulit,
                            kabut tipis menyapu permukaan tanah, dan langit perlahan berganti warna dari gelap menjadi
                            jingga keemasan. Suara jeep yang melintas dan derap kaki kuda menjadi musik pengiring
                            perjalanan menuju titik pandang terbaik. Saat matahari akhirnya muncul dari balik siluet
                            Gunung Semeru, seluruh lelah mendaki dan dinginnya subuh terbayar dalam sekejap. Bagi
                            banyak pelancong, momen inilah yang membuat Bromo bukan sekadar destinasi wisata, melainkan
                            pengalaman yang membekas lama setelah perjalanan usai.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DESTINASI -->
<section class="destinasi" id="destinasi">
    <h2>Destinasi Wisata</h2>
    <div class="kartu-container">
        @forelse ($destinasiList as $item)
            <?php
            $jamSekarang = date("H:i:s");
            $status = ($jamSekarang >= $item->jam_buka && $jamSekarang < $item->jam_tutup)
                ? 'Wisata Buka'
                : 'Wisata Tutup';
            ?>
            <div class="kartu">
                <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama }}">
                <h3>{{ $item->nama }}</h3>
                <p>{{ $item->deskripsi }}</p>
                <p>
                    <span class="status-badge {{ $status == 'Wisata Buka' ? 'status-buka' : 'status-tutup' }}">
                        {{ $status }}
                    </span>
                </p>
            </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-white">Belum tersedia Destinasi.</p>
                </div>
        @endforelse
    </div>
</section>


<section class="kontak">
    <h2>Hubungi Kami</h2>
    <form>
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda">
        </div>
        <div>
            <label for="pesan">Pesan</label>
            <textarea id="pesan" name="pesan" rows="4" placeholder="Tulis pesan Anda"></textarea>
        </div>
        <button type="submit">Kirim Pesan</button>
    </form>
</section>

@endsection