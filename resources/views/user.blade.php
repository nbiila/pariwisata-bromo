@extends('layouts.app')

@section('title', 'Daftar User')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user-list.css') }}">
@endpush

@section('content')
<div class="container my-5">

              <nav class="breadcrumb-simple">
                        <span><a href="{{ route('beranda') }}">Beranda</a></span>
                        <span><a href="{{ route('user.create') }}">tambah user</a></span>
              </nav>

    <div class="page-header">
        <div>
            <h2>Daftar User</h2>
            <p>Kelola akun pengguna website Wisata Bromo</p>
        </div>
        <a href="{{ route('user.create') }}" class="btn btn-bromo">
            <i class="bi bi-person-plus-fill"></i> Tambah User
        </a>
    </div>

    <div class="card user-table-card">
        <div class="table-responsive">
            <table class="table user-table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Role</th>
                        <th class="text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($userList as $user)
                        <tr>
                            <td>
                                <div class="user-cell">
                                    <div class="user-avatar">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="user-name">{{ $user->name }}</div>
                                        <div class="user-email">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="role-badge {{ $user->role == 'admin' ? 'admin' : 'user' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="action-btns">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn-icon edit" title="Edit">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>

                                    <button type="button" class="btn-icon delete"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $user->id }}"
                                            title="Hapus">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="empty-state">
                                    <i class="bi bi-people"></i>
                                    Belum ada user yang ditambahkan.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modals -->
    @foreach ($userList as $user)
       <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-bromo">

            <div class="modal-visual">
                <div class="warning-badge">
                    <i class="bi bi-exclamation-lg"></i>
                </div>
                <svg viewBox="0 0 400 70" preserveAspectRatio="none">
                    <polygon points="0,70 60,25 110,50 170,10 230,45 280,20 340,55 400,30 400,70" fill="#0B1D30"/>
                    <polygon points="140,20 170,10 200,25" fill="#C9A02B" opacity="0.7"/>
                </svg>
            </div>

            <div class="modal-body">
                <div class="modal-eyebrow">Konfirmasi #{{ $user->id }}</div>
                <h5>Hapus akun <strong>{{ $user->name }}</strong>?</h5>
                <p>Data user ini akan dihapus secara permanen dari sistem dan tidak bisa dikembalikan.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel-modal" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete-modal">
                        <i class="bi bi-trash-fill"></i> Ya, hapus akun
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
    @endforeach

</div>
@endsection