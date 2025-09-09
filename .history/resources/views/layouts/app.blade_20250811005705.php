<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
    <script>
        // Add class to allow non-AOS environments to show content
        document.documentElement.classList.add('aos-disabled');
    </script>
    <!-- Loading Screen -->
    <div class="loading-screen fixed inset-0 bg-white z-50 flex items-center justify-center">
        <div class="text-center">
            <div class="inline-block w-8 h-8 border-2 border-slate-200 border-t-slate-600 rounded-full animate-spin mb-4"></div>
            <h3 class="text-lg font-medium text-slate-900">Pemerintahan Desa Ketapang Baru</h3>
            <p class="text-slate-500">Loading...</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-40 shadow-lg" style="background-color: #0086c9;" x-data="{ mobileMenuOpen: false }" x-init="$watch('mobileMenuOpen', (v) => { document.body.classList.toggle('overflow-hidden', v) })">
        <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20 min-w-0 nav-container">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2 sm:space-x-3 group flex-shrink-0 min-w-0 logo-container">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center shadow-sm group-hover:shadow-md transition-all duration-300 border border-white/30 overflow-hidden flex-shrink-0">
                        <img src="{{ asset('assets/images/seluma.png') }}" alt="Logo Seluma" class="w-full h-full object-contain">
                    </div>
                    <div class="hidden sm:block min-w-0 flex-1 overflow-hidden">
                        <h1 class="text-lg lg:text-xl font-bold text-white truncate">Smart Village</h1>
                        <p class="text-xs lg:text-sm text-blue-100 truncate">Pemerintahan Desa Ketapang Baru</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-1 flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center px-4 py-2 rounded-lg text-white font-medium transition-all duration-200 {{ request()->routeIs('home') ? 'bg-white/20 backdrop-blur-sm shadow-lg' : 'hover:bg-white/10' }}">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        Beranda
                    </a>

                    <!-- Statistik - top-level link -->
                    <a href="{{ route('statistik') }}" class="flex items-center px-4 py-2 rounded-lg text-white font-medium transition-all duration-200 {{ request()->routeIs('statistik') ? 'bg-white/20 backdrop-blur-sm shadow-lg' : 'hover:bg-white/10' }}">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                        Statistik
                    </a>

                    <div class="relative group">
                        <button class="flex items-center px-4 py-2 rounded-lg text-white font-medium transition-all duration-200 hover:bg-white/10 group-hover:bg-white/10">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Layanan
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 py-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top scale-95 group-hover:scale-100 z-50">
                            <div class="px-4 py-2 border-b border-gray-100 mb-2">
                                <h3 class="text-sm font-semibold text-gray-900">Layanan Digital</h3>
                                <p class="text-xs text-gray-500">Akses layanan desa secara online</p>
                            </div>
                            <a href="{{ route('surat.online') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 group/item">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-blue-200 transition-colors">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">Surat Online</div>
                                    <div class="text-xs text-gray-500">Ajukan surat secara digital</div>
                                </div>
                            </a>
                            <a href="{{ route('data.warga') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all duration-200 group/item">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-green-200 transition-colors">
                                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">Data Warga</div>
                                    <div class="text-xs text-gray-500">Informasi data penduduk</div>
                                </div>
                            </a>
                            <a href="{{ route('peta.desa') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-all duration-200 group/item">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-purple-200 transition-colors">
                                    <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">Peta Desa</div>
                                    <div class="text-xs text-gray-500">Peta interaktif desa</div>
                                </div>
                            </a>
                            <a href="{{ route('pengaduan') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200 group/item">
                                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-red-200 transition-colors">
                                    <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">Pengaduan</div>
                                    <div class="text-xs text-gray-500">Sampaikan keluhan</div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="flex items-center px-4 py-2 rounded-lg text-white font-medium transition-all duration-200 hover:bg-white/10 group-hover:bg-white/10">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                            </svg>
                            Informasi
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 py-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top scale-95 group-hover:scale-100 z-50">
                            <div class="px-4 py-2 border-b border-gray-100 mb-2">
                                <h3 class="text-sm font-semibold text-gray-900">Informasi Desa</h3>
                                <p class="text-xs text-gray-500">Berita dan pengumuman terkini</p>
                            </div>
                            <a href="{{ route('berita') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 group/item">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-blue-200 transition-colors">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">Berita</div>
                                    <div class="text-xs text-gray-500">Berita terbaru desa</div>
                                </div>
                            </a>
                            <a href="{{ route('pengumuman') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition-all duration-200 group/item">
                                <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-yellow-200 transition-colors">
                                    <svg class="w-4 h-4 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">Pengumuman</div>
                                    <div class="text-xs text-gray-500">Pengumuman penting</div>
                                </div>
                            </a>
                            <a href="{{ route('kontak') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 group/item">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-blue-200 transition-colors">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">Kontak</div>
                                    <div class="text-xs text-gray-500">Hubungi kami</div>
                                </div>
                            </a>
                            <!-- Statistik di submenu Informasi dihapus -->
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="flex items-center px-4 py-2 rounded-lg text-white font-medium transition-all duration-200 hover:bg-white/10 group-hover:bg-white/10">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                            Profil
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 py-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top scale-95 group-hover:scale-100">
                            <div class="px-4 py-2 border-b border-gray-100 mb-2">
                                <h3 class="text-sm font-semibold text-gray-900">Profil Desa</h3>
                                <p class="text-xs text-gray-500">Informasi tentang desa</p>
                            </div>
                            <a href="{{ route('tentang') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 group/item">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-blue-200 transition-colors">
                                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">Tentang Desa</div>
                                    <div class="text-xs text-gray-500">Sejarah dan profil desa</div>
                                </div>
                            </a>
                            <a href="{{ route('struktur') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-all duration-200 group/item">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-purple-200 transition-colors">
                                    <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">Struktur Organisasi</div>
                                    <div class="text-xs text-gray-500">Struktur pemerintahan</div>
                                </div>
                            </a>
                            <a href="{{ route('visi.misi') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all duration-200 group/item">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover/item:bg-green-200 transition-colors">
                                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">Visi & Misi</div>
                                    <div class="text-xs text-gray-500">Visi dan misi desa</div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Kontak dipindah ke submenu Informasi -->
                </div>

                <!-- Auth Buttons -->
                <div class="hidden xl:flex items-center space-x-3 flex-shrink-0">
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
                <div class="lg:hidden flex-shrink-0 hamburger-container">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-lg text-white hover:bg-white/10 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" x-show="!mobileMenuOpen">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" x-show="mobileMenuOpen">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2" class="fixed inset-x-0 top-16 bottom-0 z-50 lg:hidden bg-gradient-to-b from-white to-gray-50 border-t border-blue-200 shadow-xl overflow-y-auto" style="-webkit-overflow-scrolling: touch;">
            <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <!-- Header -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Menu Navigasi</h3>
                    <p class="text-sm text-gray-600">Akses layanan dan informasi desa</p>
                </div>

                <!-- Beranda -->
                <div class="mb-6">
                    <a href="{{ route('home') }}" class="flex items-center p-4 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 {{ request()->routeIs('home') ? 'ring-2 ring-blue-500 bg-blue-50' : 'hover:bg-gray-50' }}">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Beranda</h4>
                            <p class="text-sm text-gray-600">Halaman utama desa</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>

                <!-- Layanan Section -->
                <div class="mb-6">
                    <h4 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-3 px-1">Layanan Digital</h4>
                    <div class="space-y-3">
                        <a href="{{ route('surat.online') }}" class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:bg-blue-50 group">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-900">Surat Online</h5>
                                <p class="text-xs text-gray-600">Ajukan surat secara digital</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </a>

                        <a href="{{ route('data.warga') }}" class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:bg-green-50 group">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-900">Data Warga</h5>
                                <p class="text-xs text-gray-600">Informasi data penduduk</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-green-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </a>

                        <a href="{{ route('peta.desa') }}" class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:bg-purple-50 group">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors">
                                <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-900">Peta Desa</h5>
                                <p class="text-xs text-gray-600">Peta interaktif desa</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-purple-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </a>

                        <a href="{{ route('pengaduan') }}" class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:bg-red-50 group">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-200 transition-colors">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-900">Pengaduan</h5>
                                <p class="text-xs text-gray-600">Sampaikan keluhan</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-red-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Informasi Section -->
                <div class="mb-6">
                    <h4 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-3 px-1">Informasi Desa</h4>
                    <div class="space-y-3">
                        <!-- Statistik quick access di mobile dihapus -->
                        <a href="{{ route('berita') }}" class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:bg-blue-50 group">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-900">Berita</h5>
                                <p class="text-xs text-gray-600">Berita terbaru desa</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </a>

                        <a href="{{ route('pengumuman') }}" class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:bg-yellow-50 group">
                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-yellow-200 transition-colors">
                                <svg class="w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-900">Pengumuman</h5>
                                <p class="text-xs text-gray-600">Pengumuman penting</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-yellow-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </a>

                        <a href="{{ route('statistik') }}" class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:bg-green-50 group">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-900">Statistik</h5>
                                <p class="text-xs text-gray-600">Data statistik desa</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-green-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Profil Section -->
                <div class="mb-6">
                    <h4 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-3 px-1">Profil Desa</h4>
                    <div class="space-y-3">
                        <a href="{{ route('tentang') }}" class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:bg-blue-50 group">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-900">Tentang Desa</h5>
                                <p class="text-xs text-gray-600">Sejarah dan profil desa</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </a>

                        <a href="{{ route('struktur') }}" class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:bg-purple-50 group">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors">
                                <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-900">Struktur Organisasi</h5>
                                <p class="text-xs text-gray-600">Struktur pemerintahan</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-purple-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </a>

                        <a href="{{ route('visi.misi') }}" class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:bg-green-50 group">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h5 class="font-medium text-gray-900">Visi & Misi</h5>
                                <p class="text-xs text-gray-600">Visi dan misi desa</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-green-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="mb-6">
                    <a href="{{ route('kontak') }}" class="flex items-center p-4 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:bg-blue-50 group">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-900">Kontak</h4>
                            <p class="text-sm text-gray-600">Hubungi kami</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>

                <!-- Auth Buttons -->
                <div class="pt-4 border-t border-gray-200">
                    <div class="flex space-x-3">
                        <a href="{{ route('login') }}" class="flex-1 flex items-center justify-center px-4 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300 font-medium">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="flex-1 flex items-center justify-center px-4 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-300 font-medium shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                            </svg>
                            Daftar
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white">
        <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="lg:col-span-1">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm overflow-hidden">
                            <img src="{{ asset('assets/images/seluma.png') }}" alt="Logo Seluma" class="w-full h-full object-contain">
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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
.stat-subnav { background: linear-gradient(to bottom, rgba(255,255,255,0.8), rgba(255,255,255,0.65)); backdrop-filter: saturate(120%) blur(10px); border-bottom: 1px solid rgba(30, 64, 175, 0.08); }
.subnav-surface { display: flex; align-items: center; overflow-x: auto; -webkit-overflow-scrolling: touch; scrollbar-width: none; gap: 0.5rem; padding: 0.75rem; border-radius: 9999px; box-shadow: 0 10px 25px -10px rgba(2, 6, 23, 0.15); background: rgba(255,255,255,0.9); border: 1px solid rgba(15,23,42,0.06); }
.subnav-surface::-webkit-scrollbar { display: none; }
.stat-tab { display: inline-flex; align-items: center; white-space: nowrap; padding: 0.5rem 0.875rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; color: #1e293b; transition: all 200ms ease; border: 1px solid transparent; }
.stat-tab:hover { background: #e0f2fe; color: #0c4a6e; border-color: rgba(37, 99, 235, 0.25); }
.stat-tab.active { background: linear-gradient(90deg, #2563eb, #4f46e5); color: #fff; box-shadow: 0 8px 20px -8px rgba(37, 99, 235, 0.6); border-color: transparent; }
.stat-tab i { opacity: 0.9; }
.stat-target { scroll-margin-top: var(--stat-offset, 140px); }

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

/* Mobile Navigation Fixes */
@media (max-width: 640px) {
    .nav-container {
        overflow: hidden;
        width: 100%;
    }

    .logo-container {
        flex-shrink: 1;
        min-width: 0;
        max-width: calc(100% - 60px); /* Leave space for hamburger */
    }

    .hamburger-container {
        flex-shrink: 0;
        margin-left: auto;
        width: 48px; /* Fixed width for hamburger */
    }
}

/* Prevent horizontal scroll on body */
body {
    overflow-x: hidden;
    max-width: 100vw;
}
</style>
