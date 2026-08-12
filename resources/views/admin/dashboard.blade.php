@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

<div class="hero-banner">
    <div>
        <p class="hero-label">Ulasan bulan ini</p>
        <p class="hero-value">
            {{ $ulasanBulanIni }}
            <span class="hero-delta {{ $persenPerubahan >= 0 ? 'up' : 'down' }}">
                {{ $persenPerubahan >= 0 ? '+' : '' }}{{ $persenPerubahan }}% dari bulan lalu
            </span>
        </p>
    </div>
    <div class="hero-mini-stats">
        <div><p>Destinasi</p><h4>{{ $totalDestinasi }}</h4></div>
        <div><p>Atraksi</p><h4>{{ $totalAtraksi }}</h4></div>
        <div><p>User</p><h4>{{ $totalUser }}</h4></div>
        <div><p>Total Ulasan</p><h4>{{ $totalUlasan }}</h4></div>
    </div>
</div>

<div class="grid-2col-wide mb-3">
    <div class="panel-white accent-orange">
        <div class="panel-head">
            <p class="panel-title">Tren Ulasan Masuk</p>
            <span class="pill-tag">6 bulan terakhir</span>
        </div>
        <div style="position: relative; width: 100%; height: 190px;">
            <canvas id="trenChart" role="img" aria-label="Grafik garis tren jumlah ulasan per bulan">
                Data tren ulasan 6 bulan terakhir.
            </canvas>
        </div>
    </div>

    <div class="panel-navy">
        <p class="panel-title-white">Destinasi Terpopuler</p>
        @php $medali = ['🥇', '🥈', '🥉']; @endphp
        @forelse ($destinasiPopuler as $i => $d)
        <div class="populer-item">
            <div class="populer-row">
                <span>{{ $medali[$i] ?? '' }} {{ $d->nama }}</span>
                <span class="populer-count">{{ $d->ulasan_count }}</span>
            </div>
            <div class="populer-track">
                <div class="populer-fill" style="width: {{ ($d->ulasan_count / $maxUlasanDestinasi) * 100 }}%;"></div>
            </div>
        </div>
        @empty
        <p class="text-white-50 mb-0">Belum ada data ulasan.</p>
        @endforelse
    </div>
</div>

<div class="grid-2col-narrow mb-3">
   <div class="panel-white accent-blue">
    <p class="panel-title">Distribusi Rating</p>
    <div style="position: relative; width: 100%; height: 160px;">
        <canvas id="ratingChart" role="img" aria-label="Grafik donat distribusi rating 1 sampai 5 bintang">
            Distribusi rating ulasan.
        </canvas>
    </div>
    <div class="rating-legend">
        <div class="legend-item"><span class="legend-dot" style="background:#0a2472;"></span> 5 Bintang</div>
        <div class="legend-item"><span class="legend-dot" style="background:#3f6ea1;"></span> 4 Bintang</div>
        <div class="legend-item"><span class="legend-dot" style="background:#e8945a;"></span> 3 Bintang</div>
        <div class="legend-item"><span class="legend-dot" style="background:#e3e7ee;"></span> ≤2 Bintang</div>
    </div>
</div>

    <div class="panel-white accent-pink">
        <p class="panel-title">Aktivitas Terbaru</p>
        @forelse ($aktivitasTerbaru as $aktivitas)
        <div class="aktivitas-row">
            <span class="aktivitas-dot" style="background: {{ $aktivitas['dot'] }};"></span>
            <div>
                <p class="aktivitas-teks">{{ $aktivitas['teks'] }}</p>
                <p class="aktivitas-waktu">{{ $aktivitas['waktu']->diffForHumans() }}</p>
            </div>
        </div>
        @empty
        <p class="text-secondary mb-0">Belum ada aktivitas.</p>
        @endforelse
    </div>
</div>

<div class="card form-card">
    <div class="form-header d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2">
            <div class="icon-wrap"><i class="bi bi-star"></i></div>
            <h5 class="mb-0">Ulasan Terbaru</h5>
        </div>
        {{-- <a href="#" class="btn btn-sm btn-outline-cancel">Lihat Semua</a> --}}
    </div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr><th>User</th><th>Destinasi</th><th>Rating</th><th>Komentar</th></tr>
            </thead>
            <tbody>
                @forelse ($ulasanTerbaru as $ulasan)
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="ulasan-avatar">{{ strtoupper(substr($ulasan->user->name, 0, 1)) }}</div>
                            {{ $ulasan->user->name }}
                        </div>
                    </td>
                    <td>{{ $ulasan->destinasi->nama }}</td>
                    <td class="text-warning-bromo">
                        {{ str_repeat('★', $ulasan->rating) }}{{ str_repeat('☆', 5 - $ulasan->rating) }}
                    </td>
                    <td class="text-secondary">{{ Str::limit($ulasan->komentar, 50) }}</td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada ulasan masuk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('styles')
<style>
    .hero-banner {
        background: #0a2472;
        border-radius: 16px;
        padding: 22px 24px;
        margin-bottom: 16px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        flex-wrap: wrap;
        gap: 16px;
    }
    .hero-label { color: #9fb0c9; font-size: 12px; margin: 0 0 4px; }
    .hero-value { color: #fff; font-size: 34px; font-weight: 700; margin: 0; }
    .hero-delta { font-size: 13px; font-weight: 400; margin-left: 8px; }
    .hero-delta.up { color: #8fd19e; }
    .hero-delta.down { color: #f0997b; }
    .hero-mini-stats { display: flex; gap: 22px; }
    .hero-mini-stats p { color: #9fb0c9; font-size: 11px; margin: 0; }
    .hero-mini-stats h4 { color: #fff; font-size: 18px; font-weight: 700; margin: 0; }

    .grid-2col-wide { display: grid; grid-template-columns: 1.6fr 1fr; gap: 14px; }
    .grid-2col-narrow { display: grid; grid-template-columns: 1fr 1.6fr; gap: 14px; }
    @media (max-width: 900px) {
        .grid-2col-wide, .grid-2col-narrow { grid-template-columns: 1fr; }
    }

    .panel-white {
        background: #fff;
        border-radius: 16px;
        padding: 18px 20px;
        border-left: 4px solid transparent;
    }
    .panel-white.accent-orange { border-left-color: #e8945a; }
    .panel-white.accent-blue { border-left-color: #3f6ea1; }
    .panel-white.accent-pink { border-left-color: #993556; }
    .panel-title { font-weight: 700; font-size: 15px; color: #0a2472; margin: 0 0 12px; }
    .panel-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
    .pill-tag {
        background: #faeeda; color: #854f0b; font-size: 11px;
        padding: 3px 10px; border-radius: 20px; font-weight: 600;
    }

    .panel-navy { background: #0a2472; border-radius: 16px; padding: 18px 20px; color: #fff; }
    .panel-title-white { font-weight: 700; font-size: 15px; margin: 0 0 14px; }
    .populer-item { margin-bottom: 14px; }
    .populer-item:last-child { margin-bottom: 0; }
    .populer-row { display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 4px; }
    .populer-count { color: #9fb0c9; }
    .populer-track { background: rgba(255,255,255,.15); border-radius: 6px; height: 5px; }
    .populer-fill { background: #e8945a; height: 5px; border-radius: 6px; }

    .aktivitas-row { display: flex; gap: 10px; align-items: flex-start; margin-bottom: 11px; }
    .aktivitas-row:last-child { margin-bottom: 0; }
    .aktivitas-dot { width: 8px; height: 8px; border-radius: 50%; margin-top: 5px; flex-shrink: 0; }
    .aktivitas-teks { font-size: 13px; margin: 0; }
    .aktivitas-waktu { font-size: 11px; color: #8a94a6; margin: 0; }

    .stat-card {
        background: #fff; border-radius: 12px; border: 1px solid #e3e7ee;
        padding: 1.2rem; display: flex; align-items: center; gap: 14px; height: 100%;
    }
    .table-responsive { padding: 0 1rem 1rem; }
    .table th {
        font-size: 12px; text-transform: uppercase; color: #8a94a6;
        font-weight: 600; border-bottom: 1px solid #e3e7ee;
    }
    .table td { font-size: 14px; border-bottom: 1px solid #f0f2f5; }
    .ulasan-avatar {
        width: 28px; height: 28px; border-radius: 50%; background: #3f6ea1;
        color: #fff; font-size: 11px; font-weight: 700; display: flex;
        align-items: center; justify-content: center; flex-shrink: 0;
    }
    .text-warning-bromo { color: #854f0b; }

.rating-legend {
    display: flex;
    flex-wrap: wrap;
    gap: 10px 16px;
    margin-top: 12px;
    justify-content: center;
}
.legend-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    color: #4a5568;
}
.legend-dot {
    width: 9px;
    height: 9px;
    border-radius: 50%;
    display: inline-block;
    flex-shrink: 0;
}

</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script>
new Chart(document.getElementById('trenChart'), {
    type: 'line',
    data: {
        labels: @json($trenBulan),
        datasets: [{
            data: @json($trenJumlah),
            borderColor: '#e8945a',
            backgroundColor: 'rgba(232,148,90,0.15)',
            fill: true,
            tension: 0.4,
            borderWidth: 3,
            pointRadius: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
            y: { display: false },
            x: { grid: { display: false }, ticks: { color: '#8a94a6', font: { size: 11 } } }
        }
    }
});

new Chart(document.getElementById('ratingChart'), {
    type: 'doughnut',
    data: {
        labels: ['5', '4', '3', 'lainnya'],
        datasets: [{
            data: @json($distribusiRating),
            backgroundColor: ['#0a2472', '#3f6ea1', '#e8945a', '#e3e7ee'],
            borderWidth: 3,
            borderColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        cutout: '70%'
    }
});
</script>
@endpush