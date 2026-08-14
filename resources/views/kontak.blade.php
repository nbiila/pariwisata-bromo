<?php
date_default_timezone_set("Asia/Jakarta");
$NamaDaerah = "Bromo";
?>

@extends('layouts.app')
@section('title', 'Kontak - Wisata Bromo')
@section('content')

<section class="pos-kontak">
    <div class="container">
        <div class="pos-kontak__intro">
            <span class="pos-kontak__eyebrow">Pos Pengamatan &middot; Titik Kontak</span>
            <h2 class="pos-kontak__title">Ada yang Ingin Ditanyakan Soal <?php echo $NamaDaerah; ?>?</h2>
            <p class="pos-kontak__subtitle">Kirim pesan, tim kami di lapangan akan segera membalas.</p>
        </div>

        <div class="pos-kontak__grid">

            <!-- Panel Info -->
            <div class="pos-kontak__panel pos-kontak__panel--info">
                <div class="pos-kontak__coord">7&deg;56&prime;33&Prime; S &nbsp;&middot;&nbsp; 112&deg;57&prime;00&Prime; E &nbsp;&middot;&nbsp; 2.329 MDPL</div>

                <ul class="pos-kontak__log">
                    <li>
                        <span class="pos-kontak__tag">[LOKASI]</span>
                        <span>
                            <a href="https://www.google.com/maps?q=Gunung+Bromo" target="_blank" rel="noopener noreferrer" class="pos-kontak__maplink">
                                Gunung Bromo, Probolinggo, Jawa Timur
                            </a>
                        </span>
                    </li>
                    <li>
                        <span class="pos-kontak__tag">[TELEPON]</span>
                        <span>0812-3456-7890</span>
                    </li>
                    <li>
                        <span class="pos-kontak__tag">[EMAIL]</span>
                        <span>info@wisatabromo.com</span>
                    </li>
                </ul>

                <div class="pos-kontak__divider"></div>

                <div class="pos-kontak__social">
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

                @if (session('success'))
             <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
             </ul>
         </div>
        @endif


            <!-- Panel Form -->
            <div class="pos-kontak__panel pos-kontak__panel--form">
            <form action="{{ route('kontak.send') }}" method="POST">
                  @csrf
                    <div class="pos-kontak__field">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda">
                    </div>

                    <div class="pos-kontak__field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email Anda">
                    </div>

                    <div class="pos-kontak__field">
                        <label for="pesan">Pesan</label>
                        <textarea id="pesan" name="pesan" rows="4" placeholder="Tulis pesan Anda"></textarea>
                    </div>

                    <button type="submit" class="pos-kontak__submit">Kirim Pesan</button>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection