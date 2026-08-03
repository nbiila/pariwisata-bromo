{{--
    TEMPLATE FORM TAMBAH DESTINASI
    - Full Bootstrap 5, TIDAK ada CSS custom sama sekali
    - Setelah paham alurnya, silakan re-desain halaman ini sendiri (boleh dibantu AI)
    - Yang TIDAK BOLEH diubah: name="..." di setiap input, action route, @csrf
--}}

@extends('layouts.app')

@section('title', 'Tambah Destinasi')

@section('content')
<div class="container my-5">

    {{-- Breadcrumb navigasi (komponen bawaan Bootstrap) --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('destinasi') }}">Destinasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Destinasi</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Card bawaan Bootstrap, bukan custom --}}
            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h2 class="card-title mb-4">Tambah Destinasi Baru</h2>

                    {{-- Tampilkan pesan error validasi kalau ada --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('destinasi.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Destinasi</label>
                            <input
                                type="text"
                                class="form-control"
                                id="nama"
                                name="nama"
                                value="{{ old('nama') }}"
                                placeholder="contoh: Istana Siak Sri Indrapura"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea
                                class="form-control"
                                id="deskripsi"
                                name="deskripsi"
                                rows="4"
                                placeholder="Ceritakan tentang destinasi ini..."
                                required
                            >{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Nama File Gambar</label>
                            <input
                                type="text"
                                class="form-control"
                                id="gambar"
                                name="gambar"
                                value="{{ old('gambar') }}"
                                placeholder="contoh: istana-siak.jpg"
                                required
                            >
                            <div class="form-text">
                                Sementara isi nama file gambar yang sudah tersedia di folder public/images.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="jam_buka" class="form-label">Jam Buka</label>
                                <input
                                    type="time"
                                    class="form-control"
                                    id="jam_buka"
                                    name="jam_buka"
                                    value="{{ old('jam_buka') }}"
                                    required
                                >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="jam_tutup" class="form-label">Jam Tutup</label>
                                <input
                                    type="time"
                                    class="form-control"
                                    id="jam_tutup"
                                    name="jam_tutup"
                                    value="{{ old('jam_tutup') }}"
                                    required
                                >
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input
                                type="text"
                                class="form-control"
                                id="lokasi"
                                name="lokasi"
                                value="{{ old('lokasi') }}"
                                placeholder="contoh: Kecamatan Siak, Kabupaten Siak"
                            >
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                Simpan Destinasi
                            </button>
                            <a href="{{ route('destinasi') }}" class="btn btn-outline-secondary">
                                Batal
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
