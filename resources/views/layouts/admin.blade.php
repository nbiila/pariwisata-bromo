<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        :root {
            --navy: #0a2472;
            --navy-light: #3f6ea1;
            --accent: #e8945a;
            --accent-light: #f0b374;
        }
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background: #f4f6f9;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: var(--navy);
            color: #cdd7e2;
            padding: 1.5rem 1rem;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
        }
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 0.5rem 1.5rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .sidebar-brand .icon-wrap {
            width: 36px; height: 36px;
            background: var(--accent);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 18px; flex-shrink: 0;
        }
        .sidebar-brand h5 { color: #fff; margin: 0; font-size: 15px; font-weight: 700; }
        .sidebar-brand small { color: #9fb0c9; font-size: 11px; }

        .sidebar-menu { flex: 1; }
        .sidebar-menu .menu-label {
            font-size: 11px; text-transform: uppercase; letter-spacing: .5px;
            color: #7c8db3; padding: 0 .8rem; margin: 1rem 0 .5rem;
        }
        .sidebar a {
            color: #cdd7e2;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.65rem 0.8rem;
            border-radius: 8px;
            margin-bottom: 0.25rem;
            font-size: 14px;
            transition: background .15s, color .15s;
        }
        .sidebar a i { font-size: 16px; width: 18px; text-align: center; }
        .sidebar a:hover { background: rgba(255,255,255,.08); color: #fff; }
        .sidebar a.active {
            background: var(--accent);
            color: #fff;
            font-weight: 600;
        }
        .sidebar-footer {
            border-top: 1px solid rgba(255,255,255,.1);
            padding-top: 1rem;
        }

        /* Main content */
        .main-content { flex: 1; min-width: 0; }
        .topbar {
            background: #fff;
            padding: 0.9rem 1.5rem;
            border-bottom: 1px solid #e3e7ee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .topbar h5 { margin: 0; font-weight: 700; color: var(--navy); font-size: 17px; }
        .topbar-user { display: flex; align-items: center; gap: 10px; }
        .topbar-user .avatar {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: var(--navy-light);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700;
        }
        .topbar-user .info { line-height: 1.2; }
        .topbar-user .info .name { font-size: 13px; font-weight: 600; color: var(--navy); display: block; }
        .topbar-user .info .role { font-size: 11px; color: #8a94a6; }

        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 22px;
            color: var(--navy);
        }

        @media (max-width: 900px) {
            .sidebar {
                position: fixed;
                left: -240px;
                z-index: 1000;
                transition: left .2s ease;
                box-shadow: 4px 0 12px rgba(0,0,0,.15);
            }
            .sidebar.show { left: 0; }
            .sidebar-toggle { display: block; }
        }
    </style>
        @stack('styles')
</head>
<body>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="icon-wrap"><i class="bi bi-triangle-fill"></i></div>
            <div>
                <h5>Wisata Bromo</h5>
                <small>Panel Admin</small>
            </div>
        </div>

        <div class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="menu-label">Konten Wisata</div>
            <a href="{{ route('destinasi') }}" class="{{ request()->routeIs('destinasi*') ? 'active' : '' }}">
                <i class="bi bi-geo-alt"></i> Kelola Destinasi
            </a>
            <a href="{{ route('atraksi') }}" class="{{ request()->routeIs('atraksi*') ? 'active' : '' }}">
                <i class="bi bi-signpost-split"></i> Kelola Atraksi
            </a>
                <a href="{{ route('kategori') }}" class="{{ request()->routeIs('kategori*') ? 'active' : '' }}">
                     <i class="bi bi-tags"></i> Kelola Kategori
                 </a>


            <div class="menu-label">Pengguna</div>
            <a href="{{ route('user') }}" class="{{ request()->routeIs('user*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Kelola User
            </a>
        </div>

        <div class="sidebar-footer">
            <a href="{{ route('beranda') }}">
                <i class="bi bi-box-arrow-left"></i> Kembali ke Situs
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <div class="d-flex align-items-center gap-2">
                <button class="sidebar-toggle" onclick="document.getElementById('sidebar').classList.toggle('show')">
                    <i class="bi bi-list"></i>
                </button>
                <h5>@yield('title')</h5>
            </div>

            <div class="topbar-user">
                <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div class="info">
                    <span class="name">{{ Auth::user()->name }}</span>
                    <span class="role">Administrator</span>
                </div>
            </div>
        </div>

        <div class="p-4">
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center gap-2">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
@stack('scripts')
</body>
</html>