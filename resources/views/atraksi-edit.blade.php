@extends('layouts.app')

@section('title', 'Edit ' . $atraksi->nama)

@section('content')
<div class="container my-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('atraksi') }}">Atraksi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ $atraksi->nama }}</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card form-card">

                <div class="form-header">
                    <div class="icon-wrap"><i class="bi bi-pencil-square"></i></div>
                    <h2>Edit Atraksi</h2>
                    <p>Perbarui data {{ $atraksi->nama }}</p>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('atraksi.update', $atraksi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <select name="destinasi_id" class="form-select @error('destinasi_id') is-invalid @enderror">
    <option value="" selected disabled>-- Pilih Destinasi --</option>
    @foreach ($destinasiList as $destinasi)
        <option value="{{ $destinasi->id }}"
    {{ old('destinasi_id', $atraksi->destinasi_id) == $destinasi->id ? 'selected' : '' }}>
    {{ $destinasi->nama }}
</option>

    @endforeach
</select>

                        <div class="form-floating mb-3">
                            <input type="text" name="nama" id="nama"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   placeholder="Nama Atraksi"
                                   value="{{ old('nama', $atraksi->nama) }}">
                            <label for="nama">Nama Atraksi</label>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <textarea name="deskripsi" id="deskripsi" style="height: 110px"
                                      class="form-control @error('deskripsi') is-invalid @enderror"
                                      placeholder="Deskripsi">{{ old('deskripsi', $atraksi->deskripsi) }}</textarea>
                            <label for="deskripsi">Deskripsi</label>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <div class="role-options">
                                <div class="role-option">
                                    <input type="radio" name="kategori" id="kategori-budaya" value="Budaya" {{ old('kategori', $atraksi->kategori) == 'Budaya' ? 'checked' : '' }}>
                                    <label for="kategori-budaya"><i class="bi bi-mask"></i> Budaya</label>
                                </div>
                                <div class="role-option">
                                    <input type="radio" name="kategori" id="kategori-alam" value="Alam" {{ old('kategori', $atraksi->kategori) == 'Alam' ? 'checked' : '' }}>
                                    <label for="kategori-alam"><i class="bi bi-tree"></i> Alam</label>
                                </div>
                                <div class="role-option">
                                    <input type="radio" name="kategori" id="kategori-kuliner" value="Kuliner" {{ old('kategori', $atraksi->kategori) == 'Kuliner' ? 'checked' : '' }}>
                                    <label for="kategori-kuliner"><i class="bi bi-cup-hot"></i> Kuliner</label>
                                </div>
                            </div>
                            @error('kategori')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="harga" id="harga"
                                   class="form-control @error('harga') is-invalid @enderror"
                                   placeholder="Harga"
                                   value="{{ old('harga', $atraksi->harga) }}">
                            <label for="harga">Harga (Rp)</label>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" name="gambar" id="gambar"
                                   class="form-control @error('gambar') is-invalid @enderror"
                                   placeholder="Nama File Gambar"
                                   value="{{ old('gambar', $atraksi->gambar) }}">
                            <label for="gambar">Nama File Gambar</label>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-bromo">Simpan Perubahan</button>
                            <a href="{{ route('atraksi') }}" class="btn btn-outline-cancel">Batal</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection