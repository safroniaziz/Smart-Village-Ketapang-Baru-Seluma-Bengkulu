<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Smart Village Ketapang Baru')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional CSS -->
    @stack('styles')
</head>
<body class="font-sans antialiased bg-white">
    <!-- Loading Screen -->
    <div class="loading-screen fixed inset-0 bg-white z-50 flex items-center justify-center">
        <div class="text-center">
            <div class="inline-block w-8 h-8 border-2 border-slate-200 border-t-slate-600 rounded-full animate-spin mb-4"></div>
            <h3 class="text-lg font-medium text-slate-900">Smart Village Ketapang Baru</h3>
            <p class="text-slate-500">Loading...</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-40 bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center shadow-sm group-hover:shadow-md transition-all duration-300 border border-white/30">
                        <svg class="w-6 h-6 lg:w-7 lg:h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg lg:text-xl font-bold text-white">Smart Village</h1>
                        <p class="text-xs lg:text-sm text-blue-100">Sistem Informasi Pemerintahan Desa</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="flex items-center px-4 py-2 rounded-lg text-white font-medium transition-all duration-200 {{ request()->routeIs('home') ? 'bg-white/20 backdrop-blur-sm shadow-lg' : 'hover:bg-white/10' }}">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        Beranda
                    </a>

                    <a href="{{ route('data.warga') }}" class="flex items-center px-4 py-2 rounded-lg text-white font-medium transition-all duration-200 hover:bg-white/10">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Monografi
                    </a>

                    <a href="{{ route('statistik') }}" class="flex items-center px-4 py-2 rounded-lg text-white font-medium transition-all duration-200 hover:bg-white/10">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                        Statistik
                    </a>

                    <a href="{{ route('berita') }}" class="flex items-center px-4 py-2 rounded-lg text-white font-medium transition-all duration-200 hover:bg-white/10">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                        </svg>
                        Artikel
                    </a>

                    <a href="{{ route('surat.online') }}" class="flex items-center px-4 py-2 rounded-lg text-white font-medium transition-all duration-200 hover:bg-white/10">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                        Rumah Data
                    </a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden lg:flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="px-4 py-2 text-white font-medium hover:bg-white/10 rounded-lg transition-all duration-200">
                        <svg class="w-5 h-5 mr-2 inline" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-white text-blue-600 font-medium rounded-lg hover:bg-gray-100 transition-all duration-200 shadow-sm">
                        <svg class="w-5 h-5 mr-2 inline" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                        </svg>
                        Daftar
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 rounded-lg text-white hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" x-show="!mobileMenuOpen">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" x-show="mobileMenuOpen">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition class="lg:hidden bg-white border-t border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 space-y-2">
                <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fas fa-home mr-3"></i>Beranda
                </a>

                <div class="border-t border-slate-100 pt-2 mt-2">
                    <h4 class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Layanan</h4>
                    <a href="{{ route('surat.online') }}" class="mobile-nav-link">
                        <i class="fas fa-envelope mr-3"></i>Surat Online
                    </a>
                    <a href="{{ route('data.warga') }}" class="mobile-nav-link">
                        <i class="fas fa-users mr-3"></i>Data Warga
                    </a>
                    <a href="{{ route('peta.desa') }}" class="mobile-nav-link">
                        <i class="fas fa-map mr-3"></i>Peta Desa
                    </a>
                    <a href="{{ route('pengaduan') }}" class="mobile-nav-link">
                        <i class="fas fa-comment mr-3"></i>Pengaduan
                    </a>
                </div>

                <div class="border-t border-slate-100 pt-2">
                    <h4 class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Informasi</h4>
                    <a href="{{ route('berita') }}" class="mobile-nav-link">
                        <i class="fas fa-newspaper mr-3"></i>Berita
                    </a>
                    <a href="{{ route('pengumuman') }}" class="mobile-nav-link">
                        <i class="fas fa-bullhorn mr-3"></i>Pengumuman
                    </a>
                    <a href="{{ route('statistik') }}" class="mobile-nav-link">
                        <i class="fas fa-chart-bar mr-3"></i>Statistik
                    </a>
                </div>

                <div class="border-t border-slate-100 pt-2">
                    <h4 class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-2">Profil</h4>
                    <a href="{{ route('tentang') }}" class="mobile-nav-link">
                        <i class="fas fa-info mr-3"></i>Tentang Desa
                    </a>
                    <a href="{{ route('struktur') }}" class="mobile-nav-link">
                        <i class="fas fa-sitemap mr-3"></i>Struktur Organisasi
                    </a>
                    <a href="{{ route('visi.misi') }}" class="mobile-nav-link">
                        <i class="fas fa-eye mr-3"></i>Visi & Misi
                    </a>
                </div>

                <div class="border-t border-slate-100 pt-2">
                    <a href="{{ route('kontak') }}" class="mobile-nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}">
                        <i class="fas fa-phone mr-3"></i>Kontak
                    </a>
                </div>

                <div class="border-t border-slate-100 pt-4 flex space-x-2">
                    <a href="{{ route('login') }}" class="flex-1 btn-secondary text-center text-sm">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <a href="{{ route('register') }}" class="flex-1 btn-primary text-center text-sm">
                        <i class="fas fa-user-plus mr-2"></i>Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16 lg:pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="lg:col-span-1">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm">
                            <i class="fas fa-home text-slate-900 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-medium">Smart Village</h3>
                            <p class="text-slate-400 text-sm">Ketapang Baru</p>
                        </div>
                    </div>
                    <p class="text-slate-400 mb-6 leading-relaxed">
                        MENINGKATKAN KESEJAHTERAAN MASYARAKAT YANG BERMARTABAT DAN RELIGIUS DENGAN MENGEMBANGKAN POTENSI SUMBERDAYA.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-slate-700 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-slate-700 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-slate-700 transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-slate-700 transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Layanan -->
                <div>
                    <h4 class="text-lg font-medium mb-6">Layanan</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('surat.online') }}" class="text-slate-400 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-slate-500"></i>Surat Online
                        </a></li>
                        <li><a href="{{ route('data.warga') }}" class="text-slate-400 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-slate-500"></i>Data Warga
                        </a></li>
                        <li><a href="{{ route('peta.desa') }}" class="text-slate-400 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-slate-500"></i>Peta Desa
                        </a></li>
                        <li><a href="{{ route('pengaduan') }}" class="text-slate-400 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-slate-500"></i>Pengaduan
                        </a></li>
                    </ul>
                </div>

                <!-- Informasi -->
                <div>
                    <h4 class="text-lg font-medium mb-6">Informasi</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('berita') }}" class="text-slate-400 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-slate-500"></i>Berita Desa
                        </a></li>
                        <li><a href="{{ route('pengumuman') }}" class="text-slate-400 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-slate-500"></i>Pengumuman
                        </a></li>
                        <li><a href="{{ route('statistik') }}" class="text-slate-400 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-slate-500"></i>Statistik
                        </a></li>
                        <li><a href="{{ route('tentang') }}" class="text-slate-400 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-slate-500"></i>Tentang Desa
                        </a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div>
                    <h4 class="text-lg font-medium mb-6">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-slate-400 mt-1 mr-3"></i>
                            <span class="text-slate-400">Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma, Provinsi Bengkulu</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-slate-400 mr-3"></i>
                            <span class="text-slate-400">(022) 1234567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-slate-400 mr-3"></i>
                            <span class="text-slate-400">info@ketapangbaru.desa.id</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-slate-400 mr-3"></i>
                            <span class="text-slate-400">Senin - Jumat: 08:00 - 16:00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-slate-400 text-sm">
                        &copy; {{ date('Y') }} Smart Village Ketapang Baru. All rights reserved.
                    </p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-slate-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                        <a href="#" class="text-slate-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                        <a href="#" class="text-slate-400 hover:text-white text-sm transition-colors">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-6 right-6 w-12 h-12 bg-slate-900 text-white rounded-full shadow-lg hover:bg-slate-800 transition-all duration-300 transform hover:scale-110 opacity-0 invisible">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <!-- Loading Screen Script -->
    <script>
        $(document).ready(function() {
            // Hide loading screen after page loads
            $('.loading-screen').fadeOut(500);
        });
    </script>

    <!-- Back to Top Script -->
    <script>
        $(document).ready(function() {
            const $backToTop = $('#backToTop');

            $(window).scroll(function() {
                if ($(this).scrollTop() > 300) {
                    $backToTop.removeClass('opacity-0 invisible').addClass('opacity-100 visible');
                } else {
                    $backToTop.removeClass('opacity-100 visible').addClass('opacity-0 invisible');
                }
            });

            $backToTop.click(function() {
                $('html, body').animate({scrollTop: 0}, 800);
            });
        });
    </script>

    @stack('scripts')
</body>
</html>

<style>
.nav-link {
    @apply text-slate-700 hover:text-slate-900 font-medium transition-colors duration-200 relative;
}

.nav-link.active {
    @apply text-slate-900;
}

.nav-link.active::after {
    content: '';
    @apply absolute bottom-0 left-0 right-0 h-0.5 bg-slate-900 rounded-full;
}

.mobile-nav-link {
    @apply block px-4 py-3 text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-lg transition-colors;
}

.mobile-nav-link.active {
    @apply bg-slate-50 text-slate-900;
}

.btn-primary {
    @apply bg-slate-900 hover:bg-slate-800 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2;
}

.btn-secondary {
    @apply bg-white text-slate-900 border border-slate-300 hover:bg-slate-50 font-medium px-6 py-3 rounded-lg transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2;
}
</style>
