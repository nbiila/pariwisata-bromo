<?php
date_default_timezone_set("Asia/Jakarta");
$NamaDaerah = "Bromo";
?>

@extends('layouts.app')
@section('title', 'Tentang - Wisata Bromo')
@section('content')

<section class="tentang-section" id="tentang">
    <div class="tentang-overlay">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-9">

                      <nav class="breadcrumb-simple">
                        <span><a href="{{ route('beranda') }}">Beranda</a></span>
                        <span><a href="{{ route('kontak') }}">Kontak</a></span>
                        <span><a href="{{ route('destinasi') }}">Destinasi</a></span>
                        
                     </nav>

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


                    <div class="tentang-stats">
                        <div class="tentang-stat tentang-stat--tinggi">
                            <i class="bi bi-triangle-fill"></i>
                            <div class="tentang-stat__value">2.329 MDPL</div>
                            <div class="tentang-stat__label">Ketinggian</div>
                        </div>
                        <div class="tentang-stat tentang-stat--gunung">
                            <i class="bi bi-sun"></i>
                            <div class="tentang-stat__value">3 Gunung</div>
                            <div class="tentang-stat__label">Dalam kawasan</div>
                        </div>
                        <div class="tentang-stat tentang-stat--nasional">
                            <i class="bi bi-tree-fill"></i>
                            <div class="tentang-stat__value">1 Taman Nasional</div>
                            <div class="tentang-stat__label">Bromo Tengger Semeru</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection