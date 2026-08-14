<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wisata Bromo - Beranda')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=IBM+Plex+Mono:wght@400;500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    @stack('styles')
</head>
<body>

<header>
    <nav class="navbar navbar-dark navbar-expand-lg custom-navbar">
        <div class="container navbar-inner">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('beranda') }}" style="color:#c6d0dd;">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo Wisata Bromo"
                     style="height: 36px; width: 36px; object-fit: cover; border-radius: 50%; border: 2px solid #e8945a;">
                Wisata Bromo
            </a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('beranda') }}" style="color:#c6d0dd;">
                            <i class="bi bi-house-door"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('destinasi') }}" style="color:#c6d0dd;">
                            <i class="bi bi-geo-alt"></i> Destinasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('tentang') }}" style="color:#c6d0dd;">
                            <i class="bi bi-info-circle"></i> Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('kontak') }}" style="color:#c6d0dd;">
                            <i class="bi bi-envelope"></i> Kontak
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kuliner.index') ? 'active' : '' }}" href="{{ route('kuliner.index') }}">
                            Kuliner
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto align-items-center">
    @guest
        <li class="nav-item">
            <a href="{{ route('login') }}" class="btn btn-nav-outline btn-sm me-2">Login</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('register') }}" class="btn btn-nav-solid btn-sm">Daftar</a>
        </li>
    @else
        <li class="nav-item dropdown">
    <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle user-toggle"
       href="#" data-bs-toggle="dropdown">
        @php $fotoNavbar = fotoProfil(Auth::user()->id); @endphp
        @if ($fotoNavbar)
            <img src="{{ $fotoNavbar }}" class="rounded-circle user-avatar" style="object-fit:cover;">
        @else
            <span class="rounded-circle bg-light text-dark d-flex align-items-center justify-content-center fw-bold user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </span>
        @endif
        <span class="d-none d-lg-inline ms-2 user-name">{{ Str::limit(Auth::user()->name, 15) }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end user-dropdown-menu">
        <li class="px-3 py-2">
            <div class="fw-bold">{{ Auth::user()->name }}</div>
            <div class="small text-muted">{{ Auth::user()->email }}</div>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <a class="dropdown-item" href="{{ route('profil.edit') }}">
                <i class="bi bi-person-gear me-2"></i>Kelola Profil
            </a>
        </li>
@if(Auth::user()->role === 'admin')
    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
@endif
<li><hr class="dropdown-divider"></li>

        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </button>
            </form>
        </li>
    </ul>
</li>
    @endguest
</ul>
            </div>
        </div>
    </nav>
</header>

    @yield('content')

    <footer class="text-white pt-5 pb-4" style="background-color: #3f6ea1;">
        <div class="container">
            <div class="row gy-4">

                <!-- Kolom 1: Brand -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-3">Wisata Bromo</h5>
                    <p class="small" style="color: #d9e4f0;">
                        Temukan pesona sunrise dan berbagai destinasi alam Gunung Bromo bersama kami.
                    </p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="##" class="text-white fs-5"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white fs-5"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Kolom 2: Menu -->
                <div class="col-lg-2 col-md-6">
                    <h6 class="fw-bold mb-3">Menu</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('beranda') }}" class="text-white text-decoration-none">Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('destinasi') }}" class="text-white text-decoration-none">Destinasi</a></li>
                        <li class="mb-2"><a href="{{ route('tentang') }}" class="text-white text-decoration-none">Tentang</a></li>
                        <li class="mb-2"><a href="{{ route('kontak') }}" class="text-white text-decoration-none">Kontak</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Kontak -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold mb-3">Kontak Kami</h6>
                    <p class="small mb-2" style="color: #d9e4f0;">
                        <i class="bi bi-geo-alt-fill me-2"></i>Probolinggo, Jawa Timur
                    </p>
                    <p class="small mb-2" style="color: #d9e4f0;">
                        <i class="bi bi-telephone-fill me-2"></i>0812-3456-7890
                    </p>
                    <p class="small mb-2" style="color: #d9e4f0;">
                        <i class="bi bi-envelope-fill me-2"></i>info@wisatabromo.com
                    </p>
                </div>

                <!-- Kolom 4: Newsletter -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="fw-bold mb-3">Info Wisata</h6>
                    <p class="small" style="color: #d9e4f0;">Dapatkan info promo & tips liburan ke Bromo.</p>
                    <div class="input-group mt-2">
                        <input type="email" class="form-control form-control-sm" placeholder="Email kamu">
                        <button class="btn btn-sm" style="background-color: #d67f42; color: white;">Kirim</button>
                    </div>
                </div>

            </div>

            <hr class="my-4" style="border-color: rgba(255,255,255,0.2);">

            <div class="text-center small" style="color: #d9e4f0;">
                &copy; {{ date('Y') }} Wisata Bromo. Semua hak dilindungi.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.custom-navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const destinasi = document.querySelector(".destinasi");

        if (destinasi) {
          const observerDestinasi = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting) {
                entry.target.classList.add("show");
              }
            });
          }, { threshold: 0.15 });

          observerDestinasi.observe(destinasi);
        }
      });
    </script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const targets = document.querySelectorAll(".tentang-section");

        const observer = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add("show");
            }
          });
        }, { threshold: 0.2 });

        targets.forEach((el) => observer.observe(el));
      });
    </script>

    <!-- ===== Konfirmasi hapus (SweetAlert2) — berlaku untuk semua form dengan class "form-hapus" ===== -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('form.form-hapus').forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const namaItem = form.dataset.nama || 'data ini';

                    Swal.fire({
                        title: 'Hapus Data?',
                        html: `Yakin ingin menghapus <b>${namaItem}</b>?<br>Tindakan ini tidak bisa dibatalkan.`,
                        icon: 'warning',
                        background: '#1c2331',
                        color: '#e5e7eb',
                        showCancelButton: true,
                        confirmButtonText: '<i class="bi bi-trash me-1"></i> Ya, Hapus',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#8b1e1e',
                        cancelButtonColor: '#374151',
                        reverseButtons: true,
                        customClass: {
                            popup: 'rounded-4 shadow-lg',
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    <!-- ===== akhir snippet konfirmasi hapus ===== -->

    @stack('scripts')

</body>
</html>