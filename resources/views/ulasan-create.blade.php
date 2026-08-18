@extends('layouts.app')

@section('title', 'Tulis Ulasan - ' . $destinasi->nama)

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endpush

@section('content')
<div class="review-page">
    <div class="container pt-4">

<nav class="breadcrumb-simple">
    <span><a href="{{ route('beranda') }}">Beranda</a></span>
    <span><a href="{{ route('destinasi.detail', $destinasi->id) }}">{{ $destinasi->nama }}</a></span>
    <span>Tulis Ulasan</span>
</nav>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-7">
                <div class="card review-card">

                    <div class="review-card-header">
                        <div class="eyebrow">Ceritakan Pengalamanmu</div>
                        <h2>Tulis Ulasan untuk {{ $destinasi->nama }}</h2>
                    </div>

                    <div class="review-card-body">
                        <form action="{{ route('ulasan.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="destinasi_id" value="{{ $destinasi->id }}">

 <div class="mb-4 d-flex align-items-center gap-2 flex-wrap">
    <label class="form-label mb-0">Menulis sebagai</label>
    <span class="menulis-sebagai-badge">{{ auth()->user()->name }}</span>
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    @error('user_id')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

                            <div class="mb-4">
                                <label class="form-label d-block">Rating</label>
                                <div class="star-rating">
                                    <input type="radio" name="rating" id="star5" value="5" {{ old('rating') == 5 ? 'checked' : '' }}>
                                    <label for="star5">&#9733;</label>

                                    <input type="radio" name="rating" id="star4" value="4" {{ old('rating') == 4 ? 'checked' : '' }}>
                                    <label for="star4">&#9733;</label>

                                    <input type="radio" name="rating" id="star3" value="3" {{ old('rating') == 3 ? 'checked' : '' }}>
                                    <label for="star3">&#9733;</label>

                                    <input type="radio" name="rating" id="star2" value="2" {{ old('rating') == 2 ? 'checked' : '' }}>
                                    <label for="star2">&#9733;</label>

                                    <input type="radio" name="rating" id="star1" value="1" {{ old('rating') == 1 ? 'checked' : '' }}>
                                    <label for="star1">&#9733;</label>
                                </div>
                                @error('rating')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Komentar</label>
                                <textarea name="komentar" class="form-control @error('komentar') is-invalid @enderror"
                                          rows="4" placeholder="Bagaimana pengalamanmu di sini?">{{ old('komentar') }}</textarea>
                                @error('komentar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-kirim">Kirim Ulasan</button>
                                <a href="{{ route('destinasi.detail', $destinasi->id) }}" class="btn btn-batal">Batal</a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection