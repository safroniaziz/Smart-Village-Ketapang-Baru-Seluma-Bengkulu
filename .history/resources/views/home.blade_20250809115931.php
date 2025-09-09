@extends('layouts.app')

@section('title', 'Beranda - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background-color: #0086c9;">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container -->
    <div id="particles-js" class="absolute inset-0"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
        <div class="flex flex-col lg:flex-row items-start justify-between gap-8">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-8 relative z-10">
                <div class="space-y-6">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-building text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">DESA KETAPANG BARU</h2>
                            <p class="text-sm text-blue-100">Kecamatan Semidang Alas Maras</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Smart Village</span><br>
                        <span class="text-yellow-400 font-extrabold">Ketapang Baru</span>
                    </h1>

                    <!-- Badge Desa Digital -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-star mr-2 text-yellow-300 text-xs"></i>
                            Desa Digital Terdepan
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        Revolusi digital untuk pelayanan publik yang
                        <span class="font-semibold text-yellow-300">cepat, transparan, dan terpercaya</span>
                        bagi seluruh masyarakat Ketapang Baru
                    </p>
                </div>

                <!-- Enhanced Search Bar -->
                <div class="max-w-xl mb-6 relative z-20" data-aos="fade-up" data-aos-delay="700">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-white/10 rounded-xl blur-lg"></div>
                        <div class="relative bg-white/15 backdrop-blur-md border border-white/30 rounded-xl p-2 shadow-xl z-20">
                            <div class="flex items-center">
                                <div class="flex-1 flex items-center">
                                    <i class="fas fa-search text-white/70 text-base ml-4 mr-3"></i>
                                    <input type="text" placeholder="Cari layanan desa..."
                                           class="w-full bg-transparent text-white placeholder-white/60 text-base font-medium py-3 pr-3 border-0 outline-0 focus:outline-none focus:ring-0 focus:border-0">
                                </div>
                                <button class="bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-white font-semibold px-6 py-3 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <i class="fas fa-arrow-right text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Search Tags -->
                    <div class="flex flex-wrap gap-2 mt-4">
                        <span class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 rounded-full px-3 py-1 text-xs text-white/90 cursor-pointer transition-all duration-300 hover:scale-105">
                            📄 Surat Domisili
                        </span>
                        <span class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 rounded-full px-3 py-1 text-xs text-white/90 cursor-pointer transition-all duration-300 hover:scale-105">
                            👥 Data Warga
                        </span>
                        <span class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 rounded-full px-3 py-1 text-xs text-white/90 cursor-pointer transition-all duration-300 hover:scale-105">
                            🗺️ Peta Desa
                        </span>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 relative z-20" data-aos="fade-up" data-aos-delay="800">
                    <a href="{{ route('surat.online') }}" class="group relative overflow-hidden bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 hover:from-yellow-500 hover:via-orange-600 hover:to-red-600 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-yellow-500/25">
                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative flex items-center justify-center">
                            <i class="fas fa-envelope mr-2 text-base"></i>
                            <span class="text-base">Layanan Surat Online</span>
                        </div>
                    </a>

                    <a href="{{ route('tentang') }}" class="group bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-info-circle mr-2 text-base"></i>
                            <span class="text-base">Profil Desa</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Clean Statistics (Right Side) -->
            <div class="lg:w-[420px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="600">
                <!-- Enhanced Statistics Grid -->
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <div class="group text-center p-4 bg-white/95 backdrop-blur-sm border-2 border-blue-200 rounded-2xl hover:scale-105 transition-all duration-500 shadow-xl hover:shadow-2xl hover:border-blue-300 hover:bg-white hover:shadow-blue-500/10">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform duration-300 shadow-lg group-hover:shadow-blue-500/30">
                            <i class="fas fa-users text-white text-base"></i>
                        </div>
                        <div class="text-2xl font-black text-gray-800 mb-1">
                            <span class="counter" data-count="2847">0</span>
                        </div>
                        <div class="text-gray-700 font-bold text-xs mb-1">Total Warga</div>
                        <div class="text-xs text-green-600 flex items-center justify-center font-semibold bg-green-50 rounded-full px-2 py-1">
                            <i class="fas fa-arrow-up mr-1"></i>+5.2%
                        </div>
                    </div>

                    <div class="group text-center p-4 bg-white/95 backdrop-blur-sm border-2 border-green-200 rounded-2xl hover:scale-105 transition-all duration-500 shadow-xl hover:shadow-2xl hover:border-green-300 hover:bg-white hover:shadow-green-500/10">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform duration-300 shadow-lg group-hover:shadow-green-500/30">
                            <i class="fas fa-map-marked-alt text-white text-base"></i>
                        </div>
                        <div class="text-2xl font-black text-gray-800 mb-1">
                            <span class="counter" data-count="8">0</span>
                        </div>
                        <div class="text-gray-700 font-bold text-xs mb-1">Dusun</div>
                        <div class="text-xs text-gray-600 font-semibold bg-gray-50 rounded-full px-2 py-1">24 RT/RW</div>
                    </div>

                    <div class="group text-center p-4 bg-white/95 backdrop-blur-sm border-2 border-purple-200 rounded-2xl hover:scale-105 transition-all duration-500 shadow-xl hover:shadow-2xl hover:border-purple-300 hover:bg-white hover:shadow-purple-500/10">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform duration-300 shadow-lg group-hover:shadow-purple-500/30">
                            <i class="fas fa-home text-white text-base"></i>
                        </div>
                        <div class="text-2xl font-black text-gray-800 mb-1">
                            <span class="counter" data-count="1250">0</span>
                        </div>
                        <div class="text-gray-700 font-bold text-xs mb-1">Keluarga</div>
                        <div class="text-xs text-green-600 flex items-center justify-center font-semibold bg-green-50 rounded-full px-2 py-1">
                            <i class="fas fa-arrow-up mr-1"></i>Aktif
                        </div>
                    </div>

                    <div class="group text-center p-4 bg-white/95 backdrop-blur-sm border-2 border-orange-200 rounded-2xl hover:scale-105 transition-all duration-500 shadow-xl hover:shadow-2xl hover:border-orange-300 hover:bg-white hover:shadow-orange-500/10">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform duration-300 shadow-lg group-hover:shadow-orange-500/30">
                            <i class="fas fa-seedling text-white text-base"></i>
                        </div>
                        <div class="text-2xl font-black text-gray-800 mb-1">
                            <span class="counter" data-count="450">0</span>
                        </div>
                        <div class="text-gray-700 font-bold text-xs mb-1">Hektar</div>
                        <div class="text-xs text-gray-600 font-semibold bg-gray-50 rounded-full px-2 py-1">Luas Wilayah</div>
                    </div>
                </div>

                <!-- Compact Info Summary Card -->
                <div class="bg-white/95 backdrop-blur-sm border border-gray-200 rounded-2xl p-4 shadow-lg" data-aos="fade-up" data-aos-delay="800">
                    <div class="text-center mb-3">
                        <h3 class="text-base font-bold text-gray-800 mb-1">Desa Ketapang Baru</h3>
                        <p class="text-xs text-gray-600">Kec. Semidang Alas Maras, Seluma, Bengkulu</p>
                    </div>

                    <div class="space-y-2 text-xs">
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-user-tie text-indigo-500 w-4 mr-2"></i>
                            <div>
                                <span class="font-semibold">Kepala Desa:</span> H. Ahmad Supriyadi, S.Pd
                            </div>
                        </div>

                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-calendar text-indigo-500 w-4 mr-2"></i>
                            <div>
                                <span class="font-semibold">Periode:</span> 2021 - 2027
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 text-center">
                        <div class="inline-flex items-center bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-md">
                            <i class="fas fa-award mr-1"></i>
                            Desa Mandiri 2024
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Animated Wave -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden">
        <svg class="relative w-full h-32" viewBox="0 0 1200 200" preserveAspectRatio="none">
            <path fill="#ffffff" fill-opacity="0.6" d="M0,150 C300,100 400,200 600,150 C800,100 900,200 1200,150 L1200,200 L0,200 Z" class="animate-wave-slow"></path>
            <path fill="#ffffff" fill-opacity="0.8" d="M0,160 C200,120 400,180 600,140 C800,100 1000,160 1200,120 L1200,200 L0,200 Z" class="animate-wave-medium" style="animation-delay: -3s;"></path>
            <path fill="#ffffff" fill-opacity="1" d="M0,170 C250,130 450,190 650,150 C850,110 1050,170 1200,130 L1200,200 L0,200 Z" class="animate-wave-fast" style="animation-delay: -6s;"></path>
        </svg>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-star mr-2"></i>
                Layanan Terbaik
            </div>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">Layanan Unggulan</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Platform digital terintegrasi untuk kemudahan akses layanan publik yang modern, cepat, dan terpercaya
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-6">
            <!-- Row 1 -->
            <a href="{{ route('surat.online') }}" class="service-card-modern group" data-aos="fade-up" data-aos-delay="100">
                <div class="service-icon-modern bg-gradient-to-br from-blue-500 to-blue-600">
                    <i class="fas fa-file-alt text-white text-3xl"></i>
                </div>
                <h3 class="service-title-modern">Pelayanan</h3>
                <p class="service-desc-modern">Surat & Dokumen</p>
            </a>

            <a href="#" class="service-card-modern group" data-aos="fade-up" data-aos-delay="150">
                <div class="service-icon-modern bg-gradient-to-br from-orange-500 to-orange-600">
                    <i class="fas fa-store text-white text-3xl"></i>
                </div>
                <h3 class="service-title-modern">Desamart</h3>
                <p class="service-desc-modern">UMKM Desa</p>
            </a>

            <a href="{{ route('pengaduan') }}" class="service-card-modern group" data-aos="fade-up" data-aos-delay="200">
                <div class="service-icon-modern bg-gradient-to-br from-yellow-500 to-yellow-600">
                    <i class="fas fa-comment-alt text-white text-3xl"></i>
                </div>
                <h3 class="service-title-modern">Pengaduan</h3>
                <p class="service-desc-modern">Kritik & Saran</p>
            </a>

            <a href="#" class="service-card-modern group" data-aos="fade-up" data-aos-delay="250">
                <div class="service-icon-modern bg-gradient-to-br from-green-500 to-green-600">
                    <i class="fas fa-images text-white text-3xl"></i>
                </div>
                <h3 class="service-title-modern">Galeri Desa</h3>
                <p class="service-desc-modern">Foto & Video</p>
            </a>

            <a href="#" class="service-card-modern group" data-aos="fade-up" data-aos-delay="300">
                <div class="service-icon-modern bg-gradient-to-br from-indigo-500 to-indigo-600">
                    <i class="fas fa-chart-pie text-white text-3xl"></i>
                </div>
                <h3 class="service-title-modern">Dana Desa</h3>
                <p class="service-desc-modern">Transparansi APB</p>
            </a>

            <!-- Row 2 -->
            <a href="{{ route('peta.desa') }}" class="service-card-modern group" data-aos="fade-up" data-aos-delay="350">
                <div class="service-icon-modern bg-gradient-to-br from-purple-500 to-purple-600">
                    <i class="fas fa-map-marked-alt text-white text-3xl"></i>
                </div>
                <h3 class="service-title-modern">Geodeskel</h3>
                <p class="service-desc-modern">Peta Digital</p>
            </a>

            <a href="#" class="service-card-modern group" data-aos="fade-up" data-aos-delay="400">
                <div class="service-icon-modern bg-gradient-to-br from-teal-500 to-teal-600">
                    <i class="fas fa-map text-white text-3xl"></i>
                </div>
                <h3 class="service-title-modern">Wilayah Administratif</h3>
                <p class="service-desc-modern">Batas Desa</p>
            </a>

            <a href="#" class="service-card-modern group" data-aos="fade-up" data-aos-delay="450">
                <div class="service-icon-modern bg-gradient-to-br from-cyan-500 to-cyan-600">
                    <i class="fas fa-cloud text-white text-3xl"></i>
                </div>
                <h3 class="service-title-modern">Produk Hukum & Informasi Publik</h3>
                <p class="service-desc-modern">Peraturan Desa</p>
            </a>

            <a href="#" class="service-card-modern group" data-aos="fade-up" data-aos-delay="500">
                <div class="service-icon-modern bg-gradient-to-br from-red-500 to-red-600">
                    <i class="fas fa-cogs text-white text-3xl"></i>
                </div>
                <h3 class="service-title-modern">Pembangunan</h3>
                <p class="service-desc-modern">Proyek Desa</p>
            </a>

            <a href="#" class="service-card-modern group" data-aos="fade-up" data-aos-delay="550">
                <div class="service-icon-modern bg-gradient-to-br from-pink-500 to-pink-600">
                    <i class="fas fa-users text-white text-3xl"></i>
                </div>
                <h3 class="service-title-modern">Lembaga & Kelompok</h3>
                <p class="service-desc-modern">Organisasi Desa</p>
            </a>
        </div>

        <!-- CTA Section -->
        <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="600">
            <p class="text-gray-600 mb-6">Butuh bantuan atau informasi lebih lanjut?</p>
            <a href="{{ route('kontak') }}" class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-blue-500/25">
                <i class="fas fa-phone mr-3"></i>
                Hubungi Kami
            </a>
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

/* Gradient Text Effects */
.bg-gradient-to-r.from-white.via-blue-100.to-cyan-200 {
    background: linear-gradient(135deg, #ffffff, #e0f2fe, #81d4fa);
}

.bg-gradient-to-r.from-yellow-400.via-orange-400.to-red-400 {
    background: linear-gradient(135deg, #fbbf24, #f59e0b, #dc2626);
}

.bg-clip-text {
    -webkit-background-clip: text;
    background-clip: text;
}

.text-transparent {
    -webkit-text-fill-color: transparent;
}

/* Enhanced Glass Morphism */
.backdrop-blur-md {
    backdrop-filter: blur(16px);
}

/* Search Bar Enhanced Effects */
.search-input:focus {
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    border-color: rgba(59, 130, 246, 0.5);
}

/* Button Ripple Effect */
.btn-ripple {
    position: relative;
    overflow: hidden;
}

@keyframes ripple {
    to {
        transform: scale(4);
        opacity: 0;
    }
}

/* Enhanced Hover Effects */
.hover\\:shadow-yellow-500\\/25:hover {
    box-shadow: 0 25px 50px -12px rgba(251, 191, 36, 0.25);
}

/* Progress Bar Animation */
@keyframes progressLoad {
    from { width: 0%; }
    to { width: var(--progress-width); }
}

.progress-bar {
    animation: progressLoad 2s ease-out forwards;
    animation-delay: 1s;
}

/* Performance Optimizations */
.gpu-accelerated {
    transform: translateZ(0);
    backface-visibility: hidden;
    perspective: 1000;
}

/* Professional Modern Service Cards */
.service-card-modern {
    background: white;
    border-radius: 12px;
    padding: 2rem 1.5rem;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04), 0 4px 16px rgba(0, 0, 0, 0.06);
    border: 1px solid #e2e8f0;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    position: relative;
    overflow: hidden;
    min-height: 160px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.service-card-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: var(--card-color, #3b82f6);
    border-radius: 12px 12px 0 0;
}

.service-card-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1), 0 16px 40px rgba(0, 0, 0, 0.08);
    border-color: #cbd5e1;
}

.service-icon-modern {
    width: 4rem;
    height: 4rem;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.25rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
}

.service-card-modern:hover .service-icon-modern {
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
}

/* Professional color scheme */
.service-card-modern:nth-child(1) { --card-color: #2563eb; }
.service-card-modern:nth-child(2) { --card-color: #dc2626; }
.service-card-modern:nth-child(3) { --card-color: #16a34a; }
.service-card-modern:nth-child(4) { --card-color: #7c3aed; }
.service-card-modern:nth-child(5) { --card-color: #ea580c; }
.service-card-modern:nth-child(6) { --card-color: #0891b2; }
.service-card-modern:nth-child(7) { --card-color: #be123c; }
.service-card-modern:nth-child(8) { --card-color: #4338ca; }
.service-card-modern:nth-child(9) { --card-color: #059669; }
.service-card-modern:nth-child(10) { --card-color: #9333ea; }

.service-title-modern {
    font-size: 0.875rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 0.25rem;
    line-height: 1.2;
}

.service-desc-modern {
    font-size: 0.75rem;
    color: #6b7280;
    line-height: 1.2;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .service-card-modern {
        min-height: 140px;
        padding: 1.5rem 1rem;
        border-radius: 10px;
    }

    .service-card-modern:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08), 0 12px 32px rgba(0, 0, 0, 0.06);
    }

    .service-icon-modern {
        width: 3.5rem;
        height: 3.5rem;
        margin-bottom: 1rem;
        border-radius: 10px;
    }

    .service-card-modern:hover .service-icon-modern {
        transform: translateY(-0.5px);
    }

    .service-icon-modern i {
        font-size: 1.5rem !important;
    }

    .service-title-modern {
        font-size: 0.875rem;
        font-weight: 600;
    }

    .service-desc-modern {
        font-size: 0.75rem;
    }
}

/* Glow effect for CTA */
@keyframes glow {
    0%, 100% { box-shadow: 0 0 5px rgba(59, 130, 246, 0.3); }
    50% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.6), 0 0 30px rgba(59, 130, 246, 0.4); }
}

.animate-glow {
    animation: glow 2s ease-in-out infinite;
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

    // Enhanced Counter Animation with better performance
    function animateCounter(element) {
        const target = parseInt(element.dataset.count);
        const duration = 2500;
        const startTime = performance.now();

        function easeOutQuart(t) {
            return 1 - (--t) * t * t * t;
        }

        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = easeOutQuart(progress);
            const current = Math.floor(target * easedProgress);

            element.textContent = current.toLocaleString();

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target.toLocaleString();
            }
        }

        requestAnimationFrame(updateCounter);
    }

    // Initialize counters with Intersection Observer for better performance
    const counters = document.querySelectorAll('.counter');
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                entry.target.classList.add('animated');
                setTimeout(() => animateCounter(entry.target), 300);
            }
        });
    }, observerOptions);

    counters.forEach(counter => observer.observe(counter));

    // Search functionality with enhanced UX
    const searchInput = document.querySelector('input[placeholder*="Cari layanan"]');
    const searchSuggestions = document.querySelectorAll('span[class*="cursor-pointer"]');

    if (searchInput) {
        // Add search input class for styling
        searchInput.classList.add('search-input');

        // Search input focus effects
        searchInput.addEventListener('focus', function() {
            this.closest('.relative').classList.add('animate-glow');
        });

        searchInput.addEventListener('blur', function() {
            this.closest('.relative').classList.remove('animate-glow');
        });

        // Search suggestions click handler
        searchSuggestions.forEach(suggestion => {
            suggestion.addEventListener('click', function() {
                const text = this.textContent.trim().replace(/^📄|👥|🗺️\s/, '');
                searchInput.value = text;
                searchInput.focus();
            });
        });
    }

    // Enhanced button ripple effects
    document.querySelectorAll('button, a[class*="bg-gradient"]').forEach(button => {
        button.classList.add('btn-ripple');

        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
                z-index: 0;
            `;

            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Add performance optimizations
    document.querySelectorAll('.animate-pulse, .animate-bounce, .animate-spin').forEach(el => {
        el.style.transform = 'translateZ(0)';
        el.style.backfaceVisibility = 'hidden';
    });
});

// Additional CSS for ripple effect
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    .search-input:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        border-color: rgba(59, 130, 246, 0.5);
    }
`;
document.head.appendChild(style);
</script>
@endpush




