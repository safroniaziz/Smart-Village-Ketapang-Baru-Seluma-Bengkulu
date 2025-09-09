@extends('layouts.app')

@section('title', 'Beranda - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden min-h-screen flex items-center" style="background: linear-gradient(135deg, #0086c9 0%, #0056b3 50%, #003875 100%);">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 via-transparent to-purple-900/30"></div>

        <!-- Floating Geometric Shapes -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-white/5 rounded-full animate-pulse"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-yellow-400/10 rounded-full animate-bounce" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-40 left-1/4 w-16 h-16 bg-white/10 transform rotate-45 animate-spin" style="animation-duration: 20s;"></div>
        <div class="absolute bottom-20 right-1/3 w-20 h-20 bg-cyan-400/10 rounded-full animate-pulse" style="animation-delay: 2s;"></div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center mb-16">
            <!-- Badge -->
            <div class="inline-flex items-center bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-6 py-3 mb-8" data-aos="fade-down" data-aos-delay="200">
                <div class="w-3 h-3 bg-green-400 rounded-full mr-3 animate-pulse"></div>
                <span class="text-sm font-semibold text-white">🚀 Desa Digital Terdepan di Bengkulu</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-5xl lg:text-7xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                <span class="bg-gradient-to-r from-white via-blue-100 to-cyan-200 bg-clip-text text-transparent">Smart Village</span><br>
                <span class="bg-gradient-to-r from-yellow-400 via-orange-400 to-red-400 bg-clip-text text-transparent font-extrabold">Ketapang Baru</span>
            </h1>

            <!-- Tagline -->
            <p class="text-xl lg:text-2xl text-blue-100 leading-relaxed max-w-4xl mx-auto mb-12 font-light" data-aos="fade-up" data-aos-delay="600">
                Revolusi digital untuk pelayanan publik yang
                <span class="font-semibold text-yellow-300">cepat, transparan, dan terpercaya</span>
                bagi seluruh masyarakat Ketapang Baru
            </p>

            <!-- Search Bar Hero -->
            <div class="max-w-2xl mx-auto mb-12" data-aos="fade-up" data-aos-delay="800">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-white/10 rounded-2xl blur-xl"></div>
                    <div class="relative bg-white/15 backdrop-blur-md border border-white/30 rounded-2xl p-2 shadow-2xl">
                        <div class="flex items-center">
                            <div class="flex-1 flex items-center">
                                <i class="fas fa-search text-white/70 text-xl ml-6 mr-4"></i>
                                <input type="text" placeholder="Cari layanan desa... (contoh: surat domisili)"
                                       class="w-full bg-transparent text-white placeholder-white/60 text-lg font-medium focus:outline-none py-4 pr-4">
                            </div>
                            <button class="bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <i class="fas fa-arrow-right mr-2"></i>Cari
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Quick Search Suggestions -->
                <div class="flex flex-wrap justify-center gap-3 mt-6">
                    <span class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 text-sm text-white/90 cursor-pointer transition-all duration-300 hover:scale-105">
                        📄 Surat Domisili
                    </span>
                    <span class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 text-sm text-white/90 cursor-pointer transition-all duration-300 hover:scale-105">
                        👥 Data Warga
                    </span>
                    <span class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 text-sm text-white/90 cursor-pointer transition-all duration-300 hover:scale-105">
                        🗺️ Peta Desa
                    </span>
                </div>
            </div>
        </div>

        <!-- Quick Action Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16" data-aos="fade-up" data-aos-delay="1000">
            <a href="{{ route('surat.online') }}" class="group relative overflow-hidden bg-gradient-to-br from-white/15 to-white/5 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:scale-105 transition-all duration-500 hover:shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-purple-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Surat Online</h3>
                    <p class="text-blue-100 text-sm leading-relaxed">Ajukan surat resmi tanpa perlu datang ke kantor desa</p>
                    <div class="mt-4 flex items-center text-yellow-300 font-semibold text-sm">
                        <span>Mulai Ajukan</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                    </div>
                </div>
            </a>

            <a href="{{ route('data.warga') }}" class="group relative overflow-hidden bg-gradient-to-br from-white/15 to-white/5 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:scale-105 transition-all duration-500 hover:shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-br from-green-500/20 to-emerald-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Data Warga</h3>
                    <p class="text-blue-100 text-sm leading-relaxed">Informasi lengkap data penduduk dan statistik desa</p>
                    <div class="mt-4 flex items-center text-yellow-300 font-semibold text-sm">
                        <span>Lihat Data</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                    </div>
                </div>
            </a>

            <a href="{{ route('peta.desa') }}" class="group relative overflow-hidden bg-gradient-to-br from-white/15 to-white/5 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:scale-105 transition-all duration-500 hover:shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/20 to-pink-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Peta Desa</h3>
                    <p class="text-blue-100 text-sm leading-relaxed">Jelajahi wilayah desa dengan peta interaktif</p>
                    <div class="mt-4 flex items-center text-yellow-300 font-semibold text-sm">
                        <span>Buka Peta</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                    </div>
                </div>
            </a>

            <a href="{{ route('pengaduan') }}" class="group relative overflow-hidden bg-gradient-to-br from-white/15 to-white/5 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:scale-105 transition-all duration-500 hover:shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-br from-red-500/20 to-orange-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-orange-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-bullhorn text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Pengaduan</h3>
                    <p class="text-blue-100 text-sm leading-relaxed">Sampaikan aspirasi dan keluhan dengan mudah</p>
                    <div class="mt-4 flex items-center text-yellow-300 font-semibold text-sm">
                        <span>Buat Laporan</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Live Statistics -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-16" data-aos="fade-up" data-aos-delay="1200">
            <div class="text-center p-6 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl hover:scale-105 transition-all duration-300 hover:bg-white/15">
                <div class="text-4xl font-black text-white mb-2">
                    <span class="counter" data-count="2847">0</span>
                </div>
                <div class="text-blue-100 font-semibold mb-1">Total Warga</div>
                <div class="text-xs text-green-300 flex items-center justify-center">
                    <i class="fas fa-arrow-up mr-1"></i>+5.2% tahun ini
                </div>
            </div>

            <div class="text-center p-6 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl hover:scale-105 transition-all duration-300 hover:bg-white/15">
                <div class="text-4xl font-black text-white mb-2">
                    <span class="counter" data-count="8">0</span>
                </div>
                <div class="text-blue-100 font-semibold mb-1">Dusun</div>
                <div class="text-xs text-blue-200">24 RT/RW Aktif</div>
            </div>

            <div class="text-center p-6 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl hover:scale-105 transition-all duration-300 hover:bg-white/15">
                <div class="text-4xl font-black text-white mb-2">
                    <span class="counter" data-count="1250">0</span>
                </div>
                <div class="text-blue-100 font-semibold mb-1">Keluarga</div>
                <div class="text-xs text-green-300 flex items-center justify-center">
                    <i class="fas fa-arrow-up mr-1"></i>KK Aktif
                </div>
            </div>

            <div class="text-center p-6 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl hover:scale-105 transition-all duration-300 hover:bg-white/15">
                <div class="text-4xl font-black text-white mb-2">
                    <span class="counter" data-count="450">0</span>
                </div>
                <div class="text-blue-100 font-semibold mb-1">Hektar</div>
                <div class="text-xs text-blue-200">Luas Wilayah</div>
            </div>
        </div>

        <!-- CTA Buttons -->
        <div class="text-center" data-aos="fade-up" data-aos-delay="1400">
            <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
                <a href="{{ route('register') }}" class="group relative overflow-hidden bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 hover:from-yellow-500 hover:via-orange-600 hover:to-red-600 text-white font-bold px-8 py-4 rounded-2xl transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-yellow-500/25">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative flex items-center justify-center">
                        <i class="fas fa-rocket mr-3 text-lg"></i>
                        <span class="text-lg">Bergabung Sekarang</span>
                    </div>
                </a>

                <a href="{{ route('tentang') }}" class="group bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-8 py-4 rounded-2xl transition-all duration-300 transform hover:scale-105">
                    <div class="flex items-center justify-center">
                        <i class="fas fa-info-circle mr-3 text-lg"></i>
                        <span class="text-lg">Tentang Kami</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Modern Wave Animation -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-24" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,50 C150,100 350,0 500,50 C650,100 850,0 1000,50 C1100,75 1150,50 1200,50 L1200,120 L0,120 Z"
                  fill="white" fill-opacity="0.1" class="animate-pulse"></path>
            <path d="M0,60 C200,110 400,10 600,60 C800,110 1000,10 1200,60 L1200,120 L0,120 Z"
                  fill="white" fill-opacity="0.2"></path>
            <path d="M0,70 C250,120 450,20 650,70 C850,120 1050,20 1200,70 L1200,120 L0,120 Z"
                  fill="white"></path>
        </svg>
    </div>
</section>

<!-- Services Section -->
<section class="py-16 bg-white mt-8">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Layanan Unggulan</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kami menyediakan berbagai layanan digital untuk memudahkan warga dalam mengakses informasi dan layanan desa.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="service-card group" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="service-icon bg-gradient-to-br from-blue-500 to-blue-600">
                    <i class="fas fa-envelope text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Surat Online</h3>
                <p class="text-gray-600 mb-4">Ajukan surat secara online tanpa perlu antri. Proses cepat dan transparan.</p>
                <a href="{{ route('surat.online') }}" class="service-link">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="service-card group" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="service-icon bg-gradient-to-br from-green-500 to-green-600">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Data Warga</h3>
                <p class="text-gray-600 mb-4">Informasi data warga yang terintegrasi dan terupdate secara real-time.</p>
                <a href="{{ route('data.warga') }}" class="service-link">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="service-card group" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="service-icon bg-gradient-to-br from-purple-500 to-purple-600">
                    <i class="fas fa-map text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Peta Desa</h3>
                <p class="text-gray-600 mb-4">Eksplorasi peta desa interaktif dengan informasi detail setiap wilayah.</p>
                <a href="{{ route('peta.desa') }}" class="service-link">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="service-card group" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                <div class="service-icon bg-gradient-to-br from-red-500 to-red-600">
                    <i class="fas fa-comment text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Pengaduan</h3>
                <p class="text-gray-600 mb-4">Sampaikan pengaduan, saran, dan kritik untuk kemajuan desa.</p>
                <a href="{{ route('pengaduan') }}" class="service-link">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Statistik Desa</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Data statistik terkini tentang perkembangan dan kondisi Desa Ketapang Baru.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="stat-icon bg-blue-500">
                    <i class="fas fa-users text-white text-3xl"></i>
                </div>
                <div class="stat-content">
                    <div class="text-4xl lg:text-5xl font-bold text-blue-600 counter" data-count="2500">0</div>
                    <div class="text-gray-600 font-medium">Total Warga</div>
                </div>
            </div>

            <div class="stat-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="stat-icon bg-green-500">
                    <i class="fas fa-home text-white text-3xl"></i>
                </div>
                <div class="stat-content">
                    <div class="text-4xl lg:text-5xl font-bold text-green-600 counter" data-count="8">0</div>
                    <div class="text-gray-600 font-medium">Dusun</div>
                </div>
            </div>

            <div class="stat-card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="stat-icon bg-purple-500">
                    <i class="fas fa-map-marked-alt text-white text-3xl"></i>
                </div>
                <div class="stat-content">
                    <div class="text-4xl lg:text-5xl font-bold text-purple-600 counter" data-count="250">0</div>
                    <div class="text-gray-600 font-medium">Hektar Luas</div>
                </div>
            </div>

            <div class="stat-card" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                <div class="stat-icon bg-red-500">
                    <i class="fas fa-graduation-cap text-white text-3xl"></i>
                </div>
                <div class="stat-content">
                    <div class="text-4xl lg:text-5xl font-bold text-red-600 counter" data-count="95">0</div>
                    <div class="text-gray-600 font-medium">% Literasi</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="py-24 bg-white">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Berita Terbaru</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Dapatkan informasi terbaru seputar kegiatan dan perkembangan Desa Ketapang Baru.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="news-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="news-image">
                    <div class="w-full h-48 bg-gradient-to-br from-blue-500 to-blue-600 rounded-t-xl flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm font-medium">Berita Desa</p>
                        </div>
                    </div>
                    <div class="news-badge">Berita</div>
                </div>
                <div class="news-content">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Pembangunan Jalan Desa Selesai</h3>
                    <p class="text-gray-600 mb-4">Pembangunan jalan desa sepanjang 2 km telah selesai dan siap digunakan warga untuk akses transportasi yang lebih lancar.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>2 hari yang lalu</span>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <div class="news-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="news-image">
                    <div class="w-full h-48 bg-gradient-to-br from-green-500 to-green-600 rounded-t-xl flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                            </svg>
                            <p class="text-sm font-medium">Kegiatan Desa</p>
                        </div>
                    </div>
                    <div class="news-badge">Kegiatan</div>
                </div>
                <div class="news-content">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Pelatihan Pertanian Modern</h3>
                    <p class="text-gray-600 mb-4">Program pelatihan pertanian modern untuk meningkatkan produktivitas petani dan kesejahteraan warga desa.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>1 minggu yang lalu</span>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <div class="news-card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="news-image">
                    <div class="w-full h-48 bg-gradient-to-br from-purple-500 to-purple-600 rounded-t-xl flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm font-medium">Pengumuman</p>
                        </div>
                    </div>
                    <div class="news-badge">Pengumuman</div>
                </div>
                <div class="news-content">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Pelatihan UMKM Desa</h3>
                    <p class="text-gray-600 mb-4">Pelatihan UMKM untuk warga desa dalam rangka meningkatkan ekonomi dan kesejahteraan masyarakat.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>3 hari yang lalu</span>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
            <a href="{{ route('berita') }}" class="btn-primary text-lg px-8 py-4">
                <i class="fas fa-newspaper mr-2"></i>Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- Announcements Section -->
<section class="py-24 bg-gray-50">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Pengumuman Penting</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Informasi penting dan pengumuman resmi dari pemerintah desa untuk warga.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="announcement-card" data-aos="fade-right" data-aos-duration="800">
                <div class="announcement-icon bg-yellow-500">
                    <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                </div>
                <div class="announcement-content">
                    <div class="announcement-badge">Penting</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Jadwal Vaksinasi COVID-19</h3>
                    <p class="text-gray-600 mb-4">Vaksinasi COVID-19 akan dilaksanakan pada hari Senin, 15 Januari 2024. Semua warga diharapkan hadir sesuai jadwal yang telah ditentukan.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>Hari ini</span>
                        </div>
                        <a href="#" class="text-yellow-600 hover:text-yellow-700 font-medium">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <div class="announcement-card" data-aos="fade-left" data-aos-duration="800">
                <div class="announcement-icon bg-blue-500">
                    <i class="fas fa-info-circle text-white text-2xl"></i>
                </div>
                <div class="announcement-content">
                    <div class="announcement-badge">Informasi</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Pendaftaran Kartu Keluarga</h3>
                    <p class="text-gray-600 mb-4">Pendaftaran kartu keluarga baru akan dibuka mulai minggu depan. Persiapkan dokumen yang diperlukan untuk pendaftaran.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>3 hari yang lalu</span>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
            <a href="{{ route('pengumuman') }}" class="btn-secondary text-lg px-8 py-4">
                <i class="fas fa-bullhorn mr-2"></i>Lihat Semua Pengumuman
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 text-white" style="background-color: #0086c9;">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">Siap Bergabung dengan Smart Village?</h2>
            <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                Mari bersama-sama membangun desa yang lebih maju dan sejahtera melalui teknologi digital.
                Daftar sekarang dan nikmati berbagai layanan digital yang memudahkan.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="btn-accent text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                </a>
                <a href="{{ route('kontak') }}" class="btn-secondary text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-phone mr-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
/* Wave Animation - Ripple Effect */
@keyframes wave-slow {
    0% {
        transform: scaleY(1);
    }
    50% {
        transform: scaleY(1.3);
    }
    100% {
        transform: scaleY(1);
    }
}

@keyframes wave-medium {
    0% {
        transform: scaleY(1);
    }
    50% {
        transform: scaleY(1.2);
    }
    100% {
        transform: scaleY(1);
    }
}

@keyframes wave-fast {
    0% {
        transform: scaleY(1);
    }
    50% {
        transform: scaleY(1.15);
    }
    100% {
        transform: scaleY(1);
    }
}

.animate-wave-slow {
    animation: wave-slow 5s ease-in-out infinite;
}

.animate-wave-medium {
    animation: wave-medium 4s ease-in-out infinite;
}

.animate-wave-fast {
    animation: wave-fast 3s ease-in-out infinite;
}

/* Responsive wave height */
@media (max-width: 768px) {
    .animate-wave-slow {
        animation-duration: 3s;
    }
    .animate-wave-medium {
        animation-duration: 2.5s;
    }
    .animate-wave-fast {
        animation-duration: 2s;
    }
}
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-out',
        once: true,
        offset: 100
    });

    // Initialize Particles.js
    particlesJS('particles-js', {
        particles: {
            number: {
                value: 80,
                density: {
                    enable: true,
                    value_area: 800
                }
            },
            color: {
                value: '#ffffff'
            },
            shape: {
                type: 'circle',
                stroke: {
                    width: 0,
                    color: '#000000'
                }
            },
            opacity: {
                value: 0.5,
                random: false,
                anim: {
                    enable: false,
                    speed: 1,
                    opacity_min: 0.1,
                    sync: false
                }
            },
            size: {
                value: 3,
                random: true,
                anim: {
                    enable: false,
                    speed: 40,
                    size_min: 0.1,
                    sync: false
                }
            },
            line_linked: {
                enable: true,
                distance: 150,
                color: '#ffffff',
                opacity: 0.4,
                width: 1
            },
            move: {
                enable: true,
                speed: 6,
                direction: 'none',
                random: false,
                straight: false,
                out_mode: 'out',
                bounce: false,
                attract: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 1200
                }
            }
        },
        interactivity: {
            detect_on: 'canvas',
            events: {
                onhover: {
                    enable: true,
                    mode: 'repulse'
                },
                onclick: {
                    enable: true,
                    mode: 'push'
                },
                resize: true
            },
            modes: {
                grab: {
                    distance: 400,
                    line_linked: {
                        opacity: 1
                    }
                },
                bubble: {
                    distance: 400,
                    size: 40,
                    duration: 2,
                    opacity: 8,
                    speed: 3
                },
                repulse: {
                    distance: 200,
                    duration: 0.4
                },
                push: {
                    particles_nb: 4
                },
                remove: {
                    particles_nb: 2
                }
            }
        },
        retina_detect: true
    });

    // Counter animation
    $('.counter').each(function() {
        const $this = $(this);
        const countTo = $this.attr('data-count');

        $({ countNum: 0 }).animate({
            countNum: countTo
        }, {
            duration: 2000,
            easing: 'swing',
            step: function() {
                $this.text(Math.floor(this.countNum).toLocaleString());
            },
            complete: function() {
                $this.text(this.countNum.toLocaleString());
            }
        });
    });
});
</script>
@endpush




