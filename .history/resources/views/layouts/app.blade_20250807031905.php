<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Smart Village Ketapang Baru')</title>

    <!-- Preload critical fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional CSS -->
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gradient-bg">
    <!-- Loading Screen -->
    <div class="loading-screen fixed inset-0 bg-white z-50 flex items-center justify-center">
        <div class="text-center">
                                    <div class="loading-spinner mb-4"></div>
                        <h3 class="text-lg font-semibold text-blue-600">Smart Village Ketapang Baru</h3>
            <p class="text-gray-500">Loading...</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-40 bg-white bg-opacity-90 backdrop-blur-md border-b border-gray-200 border-opacity-50" x-data="{ mobileMenuOpen: false }">
        <div class="container-custom">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300">
                        <i class="fas fa-home text-white text-lg lg:text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg lg:text-xl font-bold text-gray-900">Smart Village</h1>
                        <p class="text-xs lg:text-sm text-blue-600 font-medium">Ketapang Baru</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-home mr-2"></i>Beranda
                    </a>

                    <div class="relative group" x-data="{ open: false }">
                        <button @click="open = !open" class="nav-link flex items-center">
                            <i class="fas fa-cogs mr-2"></i>Layanan
                            <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-xl shadow-2xl border border-gray-100 py-2">
                            <a href="{{ route('surat.online') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <i class="fas fa-envelope mr-2"></i>Surat Online
                            </a>
                            <a href="{{ route('data.warga') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <i class="fas fa-users mr-2"></i>Data Warga
                            </a>
                            <a href="{{ route('peta.desa') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <i class="fas fa-map mr-2"></i>Peta Desa
                            </a>
                            <a href="{{ route('pengaduan') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <i class="fas fa-comment mr-2"></i>Pengaduan
                            </a>
                        </div>
                    </div>

                    <div class="relative group" x-data="{ open: false }">
                        <button @click="open = !open" class="nav-link flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>Informasi
                            <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-xl shadow-large border border-gray-100 py-2">
                            <a href="{{ route('berita') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <i class="fas fa-newspaper mr-2"></i>Berita
                            </a>
                            <a href="{{ route('pengumuman') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <i class="fas fa-bullhorn mr-2"></i>Pengumuman
                            </a>
                            <a href="{{ route('statistik') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <i class="fas fa-chart-bar mr-2"></i>Statistik
                            </a>
                        </div>
                    </div>

                    <div class="relative group" x-data="{ open: false }">
                        <button @click="open = !open" class="nav-link flex items-center">
                            <i class="fas fa-building mr-2"></i>Profil
                            <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition class="absolute top-full left-0 mt-2 w-48 bg-white rounded-xl shadow-large border border-gray-100 py-2">
                            <a href="{{ route('tentang') }}" class="block px-4 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                                <i class="fas fa-info mr-2"></i>Tentang Desa
                            </a>
                            <a href="{{ route('struktur') }}" class="block px-4 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                                <i class="fas fa-sitemap mr-2"></i>Struktur Organisasi
                            </a>
                            <a href="{{ route('visi.misi') }}" class="block px-4 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                                <i class="fas fa-eye mr-2"></i>Visi & Misi
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('kontak') }}" class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}">
                        <i class="fas fa-phone mr-2"></i>Kontak
                    </a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="btn-secondary text-sm">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary text-sm">
                        <i class="fas fa-user-plus mr-2"></i>Daftar
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors">
                    <i class="fas fa-bars text-xl" x-show="!mobileMenuOpen"></i>
                    <i class="fas fa-times text-xl" x-show="mobileMenuOpen"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition class="lg:hidden bg-white border-t border-gray-200">
            <div class="container-custom py-4 space-y-2">
                <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fas fa-home mr-3"></i>Beranda
                </a>

                <div class="border-t border-gray-100 pt-2 mt-2">
                    <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Layanan</h4>
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

                <div class="border-t border-gray-100 pt-2">
                    <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Informasi</h4>
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

                <div class="border-t border-gray-100 pt-2">
                    <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Profil</h4>
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

                <div class="border-t border-gray-100 pt-2">
                    <a href="{{ route('kontak') }}" class="mobile-nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}">
                        <i class="fas fa-phone mr-3"></i>Kontak
                    </a>
                </div>

                <div class="border-t border-gray-100 pt-4 flex space-x-2">
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
    <footer class="bg-gradient-to-br from-secondary-800 via-secondary-900 to-primary-900 text-white">
        <div class="container-custom py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="lg:col-span-1">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-accent-500 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-home text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">Smart Village</h3>
                            <p class="text-primary-300 text-sm">Ketapang Baru</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        MENINGKATKAN KESEJAHTERAAN MASYARAKAT YANG BERMARTABAT DAN RELIGIUS DENGAN MENGEMBANGKAN POTENSI SUMBERDAYA.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-primary-500 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-primary-500 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-primary-500 transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-primary-500 transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Layanan -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Layanan</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('surat.online') }}" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i>Surat Online
                        </a></li>
                        <li><a href="{{ route('data.warga') }}" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i>Data Warga
                        </a></li>
                        <li><a href="{{ route('peta.desa') }}" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i>Peta Desa
                        </a></li>
                        <li><a href="{{ route('pengaduan') }}" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i>Pengaduan
                        </a></li>
                    </ul>
                </div>

                <!-- Informasi -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Informasi</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('berita') }}" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i>Berita Desa
                        </a></li>
                        <li><a href="{{ route('pengumuman') }}" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i>Pengumuman
                        </a></li>
                        <li><a href="{{ route('statistik') }}" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i>Statistik
                        </a></li>
                        <li><a href="{{ route('tentang') }}" class="text-gray-300 hover:text-white transition-colors flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 text-primary-400"></i>Tentang Desa
                        </a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary-400 mt-1 mr-3"></i>
                            <span class="text-gray-300">Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma, Provinsi Bengkulu</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-primary-400 mr-3"></i>
                            <span class="text-gray-300">(022) 1234567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-primary-400 mr-3"></i>
                            <span class="text-gray-300">info@ketapangbaru.desa.id</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-primary-400 mr-3"></i>
                            <span class="text-gray-300">Senin - Jumat: 08:00 - 16:00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        &copy; {{ date('Y') }} Smart Village Ketapang Baru. All rights reserved.
                    </p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-6 right-6 w-12 h-12 bg-primary-600 text-white rounded-full shadow-lg hover:bg-primary-700 transition-all duration-300 transform hover:scale-110 opacity-0 invisible">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

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
    @apply text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200 relative;
}

.nav-link.active {
    @apply text-primary-600;
}

.nav-link.active::after {
    content: '';
    @apply absolute bottom-0 left-0 right-0 h-0.5 bg-primary-600 rounded-full;
}

.mobile-nav-link {
    @apply block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors;
}

.mobile-nav-link.active {
    @apply bg-primary-50 text-primary-600;
}
</style>
