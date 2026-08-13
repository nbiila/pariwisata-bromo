@extends('layouts.app')
@section('title', 'Kelola Kategori')
@section('content')

<div class="container my-5">

    <nav class="breadcrumb-simple">
        <span><a href="{{ route('beranda') }}">Beranda</a></span>
        <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
        <span>Kelola Kategori</span>
    </nav>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="page-header">
        <div>
            <h2>Daftar Kategori</h2>
            <p>Kelola kategori destinasi wisata Bromo.</p>
        </div>
        <a href="{{ route('kategori.create') }}" class="btn-bromo">
            <i class="bi bi-plus-lg"></i> Tambah Kategori
        </a>
    </div>

    <div class="card user-table-card">
        <div class="card-body p-0">
            <table class="table user-table mb-0">
                <thead>
                    <tr>
                        <th style="width:60px;">No</th>
                        <th>Nama Kategori</th>
                        <th class="text-center" style="width:140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategoriList as $i => $kategori)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td class="user-name">{{ $kategori->nama_kategori }}</td>
                            <td>
                                <div class="action-btns">
                                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn-icon edit" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin hapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon delete" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="empty-state">
                                    <i class="bi bi-tags"></i>
                                    Belum ada kategori.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection