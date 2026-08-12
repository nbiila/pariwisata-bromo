<?php

namespace App\Http\Controllers;
use App\Models\Destinasi;
use App\Models\Atraksi;
use App\Models\User;
use App\Models\Ulasan;

use Illuminate\Http\Request;

class AdminController extends Controller
{
public function dashboard()
{
    $totalDestinasi = Destinasi::count();
    $totalAtraksi = Atraksi::count();
    $totalUser = User::count();
    $totalUlasan = Ulasan::count();
    $totalUlasan = Ulasan::count(); 

    $ulasanBulanIni = Ulasan::whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->count();
    $ulasanBulanLalu = Ulasan::whereMonth('created_at', now()->subMonth()->month)
        ->whereYear('created_at', now()->subMonth()->year)
        ->count();
    $persenPerubahan = $ulasanBulanLalu > 0
        ? round((($ulasanBulanIni - $ulasanBulanLalu) / $ulasanBulanLalu) * 100)
        : ($ulasanBulanIni > 0 ? 100 : 0);

    $ulasanTerbaru = Ulasan::with(['user', 'destinasi'])->latest()->take(5)->get();

    $trenBulan = [];
    $trenJumlah = [];
    for ($i = 5; $i >= 0; $i--) {
        $bulan = now()->subMonths($i);
        $trenBulan[] = $bulan->translatedFormat('M');
        $trenJumlah[] = Ulasan::whereYear('created_at', $bulan->year)
            ->whereMonth('created_at', $bulan->month)
            ->count();
    }

    $destinasiPopuler = Destinasi::withCount('ulasan')
        ->orderByDesc('ulasan_count')
        ->take(3)
        ->get();
    $maxUlasanDestinasi = $destinasiPopuler->max('ulasan_count') ?: 1;

    $distribusiRating = [];
    for ($r = 5; $r >= 1; $r--) {
        $distribusiRating[] = Ulasan::where('rating', $r)->count();
    }

    $aktivitasUlasan = Ulasan::with(['user', 'destinasi'])->latest()->take(5)->get()
        ->map(fn($item) => [
            'dot' => '#27500a',
            'teks' => $item->user->name . ' menambahkan ulasan untuk ' . $item->destinasi->nama,
            'waktu' => $item->created_at,
        ]);

    $aktivitasUser = User::latest()->take(5)->get()
        ->map(fn($item) => [
            'dot' => '#854f0b',
            'teks' => 'User baru ' . $item->name . ' mendaftar',
            'waktu' => $item->created_at,
        ]);

    $aktivitasDestinasi = Destinasi::latest('updated_at')->take(5)->get()
        ->map(fn($item) => [
            'dot' => '#0c447c',
            'teks' => 'Data destinasi ' . $item->nama . ' diperbarui',
            'waktu' => $item->updated_at,
        ]);

    $aktivitasTerbaru = $aktivitasUlasan
        ->concat($aktivitasUser)
        ->concat($aktivitasDestinasi)
        ->sortByDesc('waktu')
        ->take(6)
        ->values();

    return view('admin.dashboard', compact(
        'totalDestinasi', 'totalAtraksi', 'totalUser', 'totalUlasan',
        'ulasanBulanIni', 'persenPerubahan', 'ulasanTerbaru',
        'trenBulan', 'trenJumlah', 'destinasiPopuler', 'maxUlasanDestinasi',
        'distribusiRating', 'aktivitasTerbaru'
    ));
}
}
