<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Smart Village Ketapang Baru')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2c5530;
            --secondary-color: #4a7c59;
            --accent-color: #8fbc8f;
            --text-color: #333;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 100px 0;
        }

        .service-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 50px 0 20px;
        }

        .loading {
            display: none;
        }

        .alert {
            border-radius: 10px;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
                            <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="fas fa-home me-2"></i>
                    Smart Village Ketapang Baru
                </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-tools me-1"></i>Layanan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('surat.online') }}">
                                <i class="fas fa-envelope me-2"></i>Surat Online
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('data.warga') }}">
                                <i class="fas fa-users me-2"></i>Data Warga
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('peta.desa') }}">
                                <i class="fas fa-map me-2"></i>Peta Desa
                            </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-info-circle me-1"></i>Informasi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('berita') }}">
                                <i class="fas fa-newspaper me-2"></i>Berita Desa
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('pengumuman') }}">
                                <i class="fas fa-bullhorn me-2"></i>Pengumuman
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('statistik') }}">
                                <i class="fas fa-chart-bar me-2"></i>Statistik
                            </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-1"></i>Profil
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('tentang') }}">
                                <i class="fas fa-info me-2"></i>Tentang Desa
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('struktur') }}">
                                <i class="fas fa-sitemap me-2"></i>Struktur Organisasi
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('visi.misi') }}">
                                <i class="fas fa-bullseye me-2"></i>Visi & Misi
                            </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kontak') }}">
                            <i class="fas fa-phone me-1"></i>Kontak
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white px-3 ms-2" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="margin-top: 76px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-home me-2"></i>Smart Village Ketapang Baru</h5>
                    <p>Membangun desa yang maju, mandiri, dan sejahtera melalui teknologi digital.</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Layanan</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('surat.online') }}" class="text-white-50">Surat Online</a></li>
                        <li><a href="{{ route('data.warga') }}" class="text-white-50">Data Warga</a></li>
                        <li><a href="{{ route('peta.desa') }}" class="text-white-50">Peta Desa</a></li>
                        <li><a href="{{ route('pengaduan') }}" class="text-white-50">Pengaduan</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i>Desa Ketapang Baru, Kecamatan Ketapang</li>
                        <li><i class="fas fa-phone me-2"></i>(022) 1234567</li>
                        <li><i class="fas fa-envelope me-2"></i>info@Ketapang Baru.desa.id</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} Smart Village Ketapang Baru. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <!-- Global JavaScript -->
    <script>
        // Initialize AOS
        AOS.init();

        // CSRF Token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Global Functions
        function showLoading() {
            $('.loading').show();
        }

        function hideLoading() {
            $('.loading').hide();
        }

        function showAlert(message, type = 'success') {
            const alertHtml = `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            $('body').prepend(alertHtml);

            // Auto hide after 5 seconds
            setTimeout(() => {
                $('.alert').alert('close');
            }, 5000);
        }

        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
