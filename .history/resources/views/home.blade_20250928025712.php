@extends('layouts.app-public')

@section('title', 'Beranda - Smart Village Ketapang Baru')

@push('styles')
<style>
    /* Design System Integration for Home Page */
    :root {
        --primary-blue-start: #0086c9;
        --primary-blue-mid: #0074b3;
        --primary-blue-end: #006ba3;
    }

    /* Konsisten Hero Background dengan halaman lain */
    .hero-section {
        background: linear-gradient(135deg, var(--primary-blue-start) 0%, var(--primary-blue-mid) 50%, var(--primary-blue-end) 100%);
        background-size: 200% 200%;
        animation: heroGradientShift 8s ease infinite;
    }

    @keyframes heroGradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Enhanced search and interaction effects */
    .search-container {
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .search-container:hover {
        border-color: rgba(255, 255, 255, 0.4);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .info-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .info-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    /* AOS Animations - Enhanced */
    /* Remove the aos-disabled override to allow proper AOS functioning */

    /* Test AOS working */
    [data-aos="fade-up"] {
        transform: translateY(50px);
        opacity: 0;
        transition: all 0.8s ease;
    }

    [data-aos="fade-up"].aos-animate {
        transform: translateY(0);
        opacity: 1;
    }

    [data-aos="fade-in"] {
        opacity: 0;
        transition: all 0.8s ease;
    }

    [data-aos="fade-in"].aos-animate {
        opacity: 1;
    }

    /* QR Code Container */
    #qr-code-container {
        min-height: 80px;
        min-width: 80px;
    }

    #qr-code-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

</style>
@endpush

@section('content')
<!-- Hero Section - Konsisten dengan halaman lain -->
<section class="hero-section relative text-white overflow-hidden min-h-screen flex items-center" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="50"></div>

    <!-- Particle.js Container -->
    <div id="particles-js" class="absolute inset-0" data-aos="fade-in" data-aos-delay="100"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0" data-aos="fade-up" data-aos-delay="150">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-building text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">DESA KETAPANG BARU</h2>
                            <p class="text-sm text-blue-100">Kecamatan Semidang Alas Maras</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="200">
                        <span class="text-white">Smart Village</span><br>
                        <span class="text-yellow-400 font-extrabold">Ketapang Baru</span>
                    </h1>

                    <!-- Badge Desa Digital -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="250">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-star mr-2 text-yellow-300 text-xs"></i>
                            Desa Digital Terdepan
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="300">
                        Revolusi digital untuk pelayanan publik yang
                        <span class="font-semibold text-yellow-300">cepat, transparan, dan terpercaya</span>
                        bagi seluruh masyarakat Ketapang Baru
                    </p>
                </div>

                <!-- Enhanced Search Bar -->
                <div class="max-w-xl mb-8 relative z-20" data-aos="fade-up" data-aos-delay="350">
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
                <div class="flex flex-col sm:flex-row gap-3 relative z-20 mb-20" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('tentang') }}" class="group bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-info-circle mr-2 text-base"></i>
                            <span class="text-base">Profil Desa</span>
                        </div>
                    </a>
                </div>
            </div>

                        <!-- Clean Info Card (Right Side) -->
            <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                <!-- Enhanced Info Summary Card dengan class konsisten -->
                <div class="info-card group relative bg-gradient-to-br from-white via-blue-50 to-indigo-100 backdrop-blur-sm border border-blue-200/50 rounded-3xl p-6 shadow-2xl overflow-hidden hover:shadow-3xl hover:scale-105 hover:border-blue-300/70 cursor-pointer" data-aos="fade-up" data-aos-delay="400">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full -translate-y-16 translate-x-16 group-hover:scale-110 transition-transform duration-700"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-cyan-400 to-blue-500 rounded-full translate-y-12 -translate-x-12 group-hover:scale-110 transition-transform duration-700"></div>
                    </div>

                    <!-- Header Section -->
                    <div class="relative z-10 text-center mb-4">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl mb-3 shadow-lg group-hover:scale-110 group-hover:shadow-blue-500/40 transition-all duration-300">
                            <i class="fas fa-home text-white text-xl group-hover:text-blue-100 transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-lg font-black text-gray-800 mb-1 bg-gradient-to-r from-blue-600 to-indigo-700 bg-clip-text text-transparent">Desa Ketapang Baru</h3>
                        <p class="text-xs text-gray-600 font-medium">Kec. Semidang Alas Maras, Seluma, Bengkulu</p>
                    </div>

                    <!-- Info Grid -->
                    <div class="relative z-10 grid grid-cols-1 gap-3 mb-4">
                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-center text-xs">
                                <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-emerald-500/30 transition-all duration-300">
                                    <i class="fas fa-user-tie text-white text-xs"></i>
                                </div>
                                <div class="text-center">
                                    <p class="font-bold text-gray-800">Zultan Alhara</p>
                                    <p class="text-gray-600">Kepala Desa</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-center text-xs">
                                <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-purple-500/30 transition-all duration-300">
                                    <i class="fas fa-calendar text-white text-xs"></i>
                                </div>
                                <div class="text-center">
                                    <p class="font-bold text-gray-800">2023 - 2028</p>
                                    <p class="text-gray-600">Periode Jabatan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- QR Code Section -->
                    <div class="relative z-10 bg-gradient-to-br from-gray-900 via-blue-900 to-indigo-900 rounded-2xl p-4 shadow-xl group-hover:shadow-2xl group-hover:from-gray-800 group-hover:via-blue-800 group-hover:to-indigo-800 transition-all duration-500">
                        <div class="text-center mb-3">
                            <div class="inline-flex items-center justify-center space-x-2 text-white/90 text-xs font-semibold mb-2">
                                <i class="fas fa-building text-cyan-400"></i>
                                <span>Kantor Desa Ketapang Baru</span>
                            </div>
                        </div>

                        <!-- Enhanced QR Code -->
                        <div class="flex flex-col items-center space-y-3">
                            <div class="relative group-hover:scale-110 transition-transform duration-500">
                                <!-- QR Code Glow Effect -->
                                <div class="absolute inset-0 bg-gradient-to-br from-cyan-400/30 to-blue-500/30 rounded-2xl blur-lg group-hover:from-cyan-400/50 group-hover:to-blue-500/50 transition-all duration-500"></div>
                                <div class="relative bg-white p-3 rounded-2xl shadow-2xl border-2 border-white/20 group-hover:shadow-3xl group-hover:border-white/40 transition-all duration-500">
                                    <div id="qr-code-container" class="w-20 h-20 flex items-center justify-center bg-gray-100 rounded-xl overflow-hidden group-hover:bg-white transition-colors duration-300">
                                        <!-- QR Code langsung embed -->
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=https://maps.google.com/?q=-4.3221828,102.7635049"
                                             alt="QR Code Maps"
                                             class="w-full h-full object-contain rounded"
                                             title="Scan untuk membuka lokasi di Google Maps"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <!-- Fallback jika gambar gagal load -->
                                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-400" style="display: none;">
                                            <i class="fas fa-qrcode text-lg mb-1"></i>
                                            <span class="text-xs">QR Code</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Corner Decorations -->
                                <div class="absolute -top-1 -left-1 w-4 h-4 border-l-2 border-t-2 border-cyan-400 rounded-tl-lg"></div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 border-r-2 border-t-2 border-cyan-400 rounded-tr-lg"></div>
                                <div class="absolute -bottom-1 -left-1 w-4 h-4 border-l-2 border-b-2 border-cyan-400 rounded-bl-lg"></div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 border-r-2 border-b-2 border-cyan-400 rounded-br-lg"></div>
                            </div>

                            <div class="text-center">
                                <div class="flex items-center justify-center space-x-2 mb-1">
                                    <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse group-hover:bg-cyan-300 transition-colors duration-300"></div>
                                    <p class="text-sm text-white font-bold group-hover:text-cyan-100 transition-colors duration-300">Scan untuk Virtual Tour</p>
                                    <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse group-hover:bg-cyan-300 transition-colors duration-300" style="animation-delay: 0.5s;"></div>
                                </div>
                                <p class="text-xs text-gray-300">Street View 360° • Interactive</p>
                            </div>
                        </div>

                        <!-- Tech Badge -->
                        <div class="flex justify-center mt-3">
                            <div class="inline-flex items-center bg-gradient-to-r from-cyan-500/20 to-blue-500/20 backdrop-blur-sm border border-cyan-400/30 rounded-full px-3 py-1 group-hover:from-cyan-500/30 group-hover:to-blue-500/30 group-hover:border-cyan-300/50 transition-all duration-300">
                                <i class="fas fa-qrcode text-cyan-400 text-xs mr-2 group-hover:text-cyan-300 transition-colors duration-300"></i>
                                <span class="text-xs text-cyan-100 font-medium group-hover:text-white transition-colors duration-300">Smart QR Technology</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Services Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50" data-aos="fade-up">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up" data-aos-delay="50">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-delay="100">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6" data-aos="zoom-in" data-aos-delay="150">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-sparkles mr-2"></i>
                    Layanan Digital Terdepan
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8" data-aos="fade-up" data-aos-delay="400">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 bg-clip-text text-transparent">
                        Layanan Unggulan
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

                        <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-blue-700">Platform digital terintegrasi</span> untuk kemudahan akses layanan publik yang
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-purple-700">modern, cepat, dan terpercaya</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-blue-200 to-purple-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <!-- Services Grid & CTA -->
        <div data-aos="fade-up" data-aos-duration="600">
            <!-- Services Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-6">
                @php
                $services = [
                    [
                        'name' => 'Surat Online',
                        'description' => 'Layanan Surat Digital',
                        'icon' => 'fas fa-file-alt',
                        'color' => 'from-blue-500 to-blue-600',
                        'route' => route('surat.online')
                    ],
                    [
                        'name' => 'Data Warga',
                        'description' => 'Informasi Penduduk',
                        'icon' => 'fas fa-users',
                        'color' => 'from-green-500 to-green-600',
                        'route' => route('data.warga')
                    ],
                    [
                        'name' => 'Peta Desa',
                        'description' => 'Peta Digital',
                        'icon' => 'fas fa-map-marked-alt',
                        'color' => 'from-purple-500 to-purple-600',
                        'route' => route('peta.desa')
                    ],
                    [
                        'name' => 'Pengaduan',
                        'description' => 'Kritik & Saran',
                        'icon' => 'fas fa-comment-alt',
                        'color' => 'from-yellow-500 to-yellow-600',
                        'route' => route('pengaduan')
                    ],
                    [
                        'name' => 'Berita',
                        'description' => 'Informasi Terkini',
                        'icon' => 'fas fa-newspaper',
                        'color' => 'from-indigo-500 to-indigo-600',
                        'route' => '#'
                    ],
                    [
                        'name' => 'Pengumuman',
                        'description' => 'Info Penting',
                        'icon' => 'fas fa-bullhorn',
                        'color' => 'from-orange-500 to-orange-600',
                        'route' => '#'
                    ],
                    [
                        'name' => 'Kontak',
                        'description' => 'Hubungi Kami',
                        'icon' => 'fas fa-phone',
                        'color' => 'from-cyan-500 to-cyan-600',
                        'route' => '#'
                    ],
                    [
                        'name' => 'Galeri Desa',
                        'description' => 'Foto & Video',
                        'icon' => 'fas fa-images',
                        'color' => 'from-teal-500 to-teal-600',
                        'route' => '#'
                    ],
                    [
                        'name' => 'Dana Desa',
                        'description' => 'Transparansi APB',
                        'icon' => 'fas fa-chart-pie',
                        'color' => 'from-red-500 to-red-600',
                        'route' => '#'
                    ],
                    [
                        'name' => 'UMKM Desa',
                        'description' => 'Produk Lokal',
                        'icon' => 'fas fa-store',
                        'color' => 'from-pink-500 to-pink-600',
                        'route' => '#'
                    ]
                ];
                @endphp

                @foreach($services as $service)
                <a href="{{ $service['route'] }}" class="service-card-modern group">
                    <div class="service-icon-modern bg-gradient-to-br {{ $service['color'] }}">
                        <i class="{{ $service['icon'] }} text-white text-3xl"></i>
                    </div>
                    <h3 class="service-title-modern">{{ $service['name'] }}</h3>
                    <p class="service-desc-modern">{{ $service['description'] }}</p>
                </a>
                @endforeach
            </div>

            <!-- CTA Section -->
            <div class="text-center mt-16">
                <p class="text-gray-600 mb-6">Butuh bantuan atau informasi lebih lanjut?</p>
                <a href="https://wa.me/6282177123456?text=Halo,%20saya%20ingin%20bertanya%20tentang%20layanan%20desa" target="_blank" class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-green-500/25">
                    <i class="fab fa-whatsapp mr-3 text-xl"></i>
                    WhatsApp Pemerintahan
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50" data-aos="fade-up">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-delay="200">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-600 to-blue-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-slate-600 to-blue-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-chart-bar mr-2"></i>
                    Data Real-time Desa
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8" data-aos="fade-up" data-aos-delay="400">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-slate-800 to-blue-800 bg-clip-text text-transparent">
                        Statistik Desa
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-slate-500 to-blue-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Data statistik terkini</span> tentang perkembangan dan kondisi
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-blue-700">Desa Ketapang Baru</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-slate-200 to-blue-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <!-- Statistics Grid -->
        <div data-aos="fade-up" data-aos-duration="600">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="stat-card-modern">
                    <div class="stat-icon-modern bg-gradient-to-br from-blue-500 to-blue-600">
                        <i class="fas fa-users text-white text-3xl"></i>
                    </div>
                    <div class="stat-content-modern">
                        <div class="text-blue-700 text-4xl font-black">{{ number_format($totalWarga) }}</div>
                        <div class="text-gray-600 font-semibold">Total Warga</div>
                    </div>
                </div>

                <div class="stat-card-modern">
                    <div class="stat-icon-modern bg-gradient-to-br from-green-500 to-green-600">
                        <i class="fas fa-home text-white text-2xl"></i>
                    </div>
                    <div class="stat-content-modern">
                        <div class="text-green-700 text-4xl font-black">{{ number_format($totalDusun) }}</div>
                        <div class="text-gray-600 font-semibold">Dusun</div>
                    </div>
                </div>

                <div class="stat-card-modern">
                    <div class="stat-icon-modern bg-gradient-to-br from-purple-500 to-purple-600">
                        <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                    </div>
                    <div class="stat-content-modern">
                        <div class="text-purple-700 text-4xl font-black">{{ $luasWilayah }}</div>
                        <div class="text-gray-600 font-semibold">Luas Wilayah</div>
                    </div>
                </div>

                <div class="stat-card-modern">
                    <div class="stat-icon-modern bg-gradient-to-br from-orange-500 to-orange-600">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <div class="stat-content-modern">
                        <div class="text-orange-700 text-4xl font-black">{{ number_format($totalKepalaKeluarga) }}</div>
                        <div class="text-gray-600 font-semibold">Kepala Keluarga</div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Data Cards Grid (Without Charts) -->
            <div class="grid grid-cols-1 xl:grid-cols-5 gap-8 mt-16" data-aos="fade-up" >
                <!-- Gender Distribution - Data Only -->
                <div class="chart-card-premium xl:col-span-2" data-aos="fade-up" >
                    <div class="chart-header-premium">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="chart-icon-premium bg-gradient-to-br from-pink-500 to-rose-600">
                                    <i class="fas fa-venus-mars text-white text-xl"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="chart-title-premium">Distribusi Gender</h3>
                                    <p class="chart-subtitle-premium">Perbandingan jenis kelamin</p>
                                </div>
                            </div>
                            <div class="chart-metric-premium">
                                <span class="text-2xl font-black text-gray-800">{{ number_format($totalWarga) }}</span>
                                <p class="text-xs text-gray-500 mt-1">Total Warga</p>
                            </div>
                        </div>

                        <!-- Gender Stats Mini Cards -->
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <div class="mini-stat-card bg-gradient-to-br from-blue-50 to-blue-100 border-l-4 border-blue-500">
                                <div class="flex items-center">
                                    <i class="fas fa-mars text-blue-600 text-lg mr-2"></i>
                                    <div>
                                        <p class="text-xs text-blue-600 font-semibold">Laki-laki</p>
                                        <p class="text-lg font-black text-blue-800">{{ number_format($totalLakiLaki) }}</p>
                                        <p class="text-xs text-blue-500">{{ $persentaseLakiLaki }}%</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mini-stat-card bg-gradient-to-br from-pink-50 to-pink-100 border-l-4 border-pink-500">
                                <div class="flex items-center">
                                    <i class="fas fa-venus text-pink-600 text-lg mr-2"></i>
                                    <div>
                                        <p class="text-xs text-pink-600 font-semibold">Perempuan</p>
                                        <p class="text-lg font-black text-pink-800">{{ number_format($totalPerempuan) }}</p>
                                        <p class="text-xs text-pink-500">{{ $persentasePerempuan }}%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Chart Container -->
                    <div class="chart-container-premium">
                        <div id="genderChartLoading" class="absolute inset-0 flex items-center justify-center bg-gray-50 rounded-lg">
                            <div class="text-center bg-white p-6 rounded-xl shadow-lg">
                                <div class="relative mb-4">
                                    <i class="fas fa-spinner fa-spin text-4xl text-blue-500"></i>
                                    <div class="absolute inset-0 animate-ping">
                                        <i class="fas fa-circle text-xl text-blue-200"></i>
                                    </div>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">Memuat Grafik Gender</p>
                                <p class="text-xs text-gray-500 mt-1">Sedang memproses data...</p>
                            </div>
                        </div>
                        <div class="h-96 relative">
                            <canvas id="genderChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Age Distribution - Data Only -->
                <div class="chart-card-premium xl:col-span-3" data-aos="fade-up" >
                    <div class="chart-header-premium">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="chart-icon-premium bg-gradient-to-br from-indigo-500 to-purple-600">
                                    <i class="fas fa-users text-white text-xl"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="chart-title-premium">Distribusi Usia</h3>
                                    <p class="chart-subtitle-premium">Kelompok usia dan produktivitas</p>
                                </div>
                            </div>
                        </div>

                        <!-- Age Group Quick Stats -->
                        <div class="grid grid-cols-5 gap-4 mb-4">
                            <div class="age-quick-stat" data-age="0-17">
                                <div class="age-indicator bg-gradient-to-r from-green-400 to-green-500"></div>
                                <p class="text-xs font-semibold text-gray-700">0-17</p>
                                <p class="text-sm font-black text-green-700">{{ $usia0_17 }}</p>
                                <p class="text-xs text-gray-500">Anak</p>
                            </div>
                            <div class="age-quick-stat" data-age="18-30">
                                <div class="age-indicator bg-gradient-to-r from-blue-400 to-blue-500"></div>
                                <p class="text-xs font-semibold text-gray-700">18-30</p>
                                <p class="text-sm font-black text-blue-700">{{ $usia18_30 }}</p>
                                <p class="text-xs text-gray-500">Muda</p>
                            </div>
                            <div class="age-quick-stat active" data-age="31-45">
                                <div class="age-indicator bg-gradient-to-r from-purple-400 to-purple-500"></div>
                                <p class="text-xs font-semibold text-gray-700">31-45</p>
                                <p class="text-sm font-black text-purple-700">{{ $usia31_45 }}</p>
                                <p class="text-xs text-gray-500">Produktif</p>
                            </div>
                            <div class="age-quick-stat" data-age="46-60">
                                <div class="age-indicator bg-gradient-to-r from-orange-400 to-orange-500"></div>
                                <p class="text-xs font-semibold text-gray-700">46-60</p>
                                <p class="text-sm font-black text-orange-700">{{ $usia46_60 }}</p>
                                <p class="text-xs text-gray-500">Dewasa</p>
                            </div>
                            <div class="age-quick-stat" data-age="60+">
                                <div class="age-indicator bg-gradient-to-r from-red-400 to-red-500"></div>
                                <p class="text-xs font-semibold text-gray-700">60+</p>
                                <p class="text-sm font-black text-red-700">{{ $usia60Plus }}</p>
                                <p class="text-xs text-gray-500">Lansia</p>
                            </div>
                        </div>
                    </div>
                    <!-- Chart Container -->
                    <div class="chart-container-premium">
                        <div id="ageChartLoading" class="absolute inset-0 flex items-center justify-center bg-gray-50 rounded-lg">
                            <div class="text-center bg-white p-6 rounded-xl shadow-lg">
                                <div class="relative mb-4">
                                    <i class="fas fa-spinner fa-spin text-4xl text-purple-500"></i>
                                    <div class="absolute inset-0 animate-ping">
                                        <i class="fas fa-circle text-xl text-purple-200"></i>
                                    </div>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">Memuat Grafik Usia</p>
                                <p class="text-xs text-gray-500 mt-1">Sedang memproses data...</p>
                            </div>
                        </div>
                        <div class="h-96">
                            <canvas id="ageChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Aparatur Desa Section -->
<section class="py-20 bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50" data-aos="fade-up">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up" >
        <div class="text-center mb-16" data-aos="fade-up" >
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6" data-aos="zoom-in">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-users-cog mr-2"></i>
                    Pemerintahan Desa
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8" data-aos="fade-up" >
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-blue-800 to-indigo-800 bg-clip-text text-transparent">
                        Aparatur Desa
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto" data-aos="fade-up" >
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-blue-700">Tim profesional</span> yang berkomitmen melayani masyarakat dengan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-indigo-700">dedikasi dan integritas tinggi</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-blue-200 to-indigo-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <!-- Kepala Desa - Featured Large Card -->
        <div class="mb-16" data-aos="fade-up" data-aos-duration="600">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl p-8 lg:p-12 shadow-2xl relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full -translate-y-32 translate-x-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full translate-y-24 -translate-x-24"></div>
                </div>

                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-8">
                    <!-- Photo -->
                    <div class="flex-shrink-0">
                        <div class="w-48 h-48 lg:w-56 lg:h-56 rounded-2xl bg-white/20 backdrop-blur-sm border-4 border-white/30 overflow-hidden">
                            <img src="{{ asset('images/struktur/zultan.jpg') }}" alt="Kepala Desa" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-500 flex items-center justify-center" style="display: none;">
                                <div class="text-center text-white">
                                    <i class="fas fa-user-tie text-8xl mb-4"></i>
                                    <p class="text-sm font-medium">Zultan Alhara</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="flex-1 text-center lg:text-left text-white">
                        <div class="inline-flex items-center bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-semibold mb-4">
                            <i class="fas fa-crown mr-2 text-yellow-300"></i>
                            Kepala Desa
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-black mb-4">Zultan Alhara</h2>
                        <p class="text-xl text-blue-100 mb-2">Kepala Desa Ketapang Baru</p>
                        <p class="text-blue-200 mb-6">Periode: 2021 - 2027</p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <div class="bg-white/20 backdrop-blur-sm border-2 border-white/30 rounded-xl p-4 space-y-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-5 h-5 bg-yellow-400 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">T</span>
                                    </div>
                                    <span class="text-sm font-semibold text-yellow-100">Tugas & Wewenang:</span>
                                </div>
                                <p class="text-sm text-blue-100 leading-relaxed">Memimpin penyelenggaraan pemerintahan desa, pembangunan, dan pembinaan kemasyarakatan sesuai dengan peraturan perundang-undangan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aparatur Grid -->
        <div data-aos="fade-up" data-aos-duration="600">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                <!-- Sekretaris Desa -->
                <div class="aparatur-card-pro" data-aos="fade-up" >
                    <div class="aparatur-photo-pro">
                        <img src="{{ asset('images/struktur/merianto.jpg') }}" alt="Sekretaris Desa" class="w-full aspect-square object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-full aspect-square bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center" style="display: none;">
                            <div class="text-center text-white">
                                <i class="fas fa-user-edit text-4xl mb-2"></i>
                                <p class="text-xs font-medium">Merianto</p>
                            </div>
                        </div>
                        <div class="aparatur-overlay-pro">
                            <div class="aparatur-position-badge-pro">Sekretaris Desa</div>
                        </div>
                    </div>
                    <div class="aparatur-info-pro">
                        <h3 class="aparatur-name-pro">MERIANTO</h3>
                        <p class="aparatur-title-pro">Sekretaris Desa</p>
                        <div class="aparatur-contact-pro">
                            <div class="bg-emerald-50 rounded-lg p-3 space-y-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-4 h-4 bg-emerald-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">T</span>
                                    </div>
                                    <span class="text-xs font-semibold text-emerald-700">Tugas:</span>
                                </div>
                                <p class="text-xs text-gray-700 leading-relaxed">Koordinasi administrasi, membantu Kepala Desa, mengelola surat-menyurat dan dokumentasi desa</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kaur Keuangan -->
                <div class="aparatur-card-pro" data-aos="fade-up" >
                    <div class="aparatur-photo-pro">
                        <img src="{{ asset('images/struktur/sapta.jpg') }}" alt="Kaur Keuangan" class="w-full aspect-square object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-full aspect-square bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center" style="display: none;">
                            <div class="text-center text-white">
                                <i class="fas fa-calculator text-4xl mb-2"></i>
                                <p class="text-xs font-medium">Sapta Adi</p>
                            </div>
                        </div>
                        <div class="aparatur-overlay-pro">
                            <div class="aparatur-position-badge-pro">Keuangan</div>
                        </div>
                    </div>
                    <div class="aparatur-info-pro">
                        <h3 class="aparatur-name-pro">SAPTA ADI</h3>
                        <p class="aparatur-title-pro">Kepala Urusan Keuangan</p>
                        <div class="aparatur-contact-pro">
                            <div class="bg-purple-50 rounded-lg p-3 space-y-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-4 h-4 bg-purple-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">T</span>
                                    </div>
                                    <span class="text-xs font-semibold text-purple-700">Tugas:</span>
                                </div>
                                <p class="text-xs text-gray-700 leading-relaxed">Mengelola keuangan desa, menyusun laporan keuangan, dan mengawasi penggunaan anggaran APBDes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kaur Perencanaan -->
                <div class="aparatur-card-pro" data-aos="fade-up" >
                    <div class="aparatur-photo-pro">
                        <img src="{{ asset('images/struktur/marlan.jpg') }}" alt="Kaur Perencanaan" class="w-full aspect-square object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-full aspect-square bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center" style="display: none;">
                            <div class="text-center text-white">
                                <i class="fas fa-clipboard-list text-4xl mb-2"></i>
                                <p class="text-xs font-medium">Marlan</p>
                            </div>
                        </div>
                        <div class="aparatur-overlay-pro">
                            <div class="aparatur-position-badge-pro">Perencanaan</div>
                        </div>
                    </div>
                    <div class="aparatur-info-pro">
                        <h3 class="aparatur-name-pro">MARLAN</h3>
                        <p class="aparatur-title-pro">Kepala Urusan Perencanaan</p>
                        <div class="aparatur-contact-pro">
                            <div class="bg-orange-50 rounded-lg p-3 space-y-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-4 h-4 bg-orange-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">T</span>
                                    </div>
                                    <span class="text-xs font-semibold text-orange-700">Tugas:</span>
                                </div>
                                <p class="text-xs text-gray-700 leading-relaxed">Menyusun RPJMDes, RKPDes, dan mengkoordinasikan program pembangunan desa</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kasi Pemerintahan -->
                <div class="aparatur-card-pro" data-aos="fade-up" >
                    <div class="aparatur-photo-pro">
                        <img src="{{ asset('images/struktur/desmerti.jpg') }}" alt="Kasi Pemerintahan" class="w-full aspect-square object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-full aspect-square bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center" style="display: none;">
                            <div class="text-center text-white">
                                <i class="fas fa-landmark text-4xl mb-2"></i>
                                <p class="text-xs font-medium">Desmerti</p>
                            </div>
                        </div>
                        <div class="aparatur-overlay-pro">
                            <div class="aparatur-position-badge-pro">Pemerintahan</div>
                        </div>
                    </div>
                    <div class="aparatur-info-pro">
                        <h3 class="aparatur-name-pro">DESMERTI</h3>
                        <p class="aparatur-title-pro">Kepala Seksi Pemerintahan</p>
                        <div class="aparatur-contact-pro">
                            <div class="bg-red-50 rounded-lg p-3 space-y-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-4 h-4 bg-red-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">T</span>
                                    </div>
                                    <span class="text-xs font-semibold text-red-700">Tugas:</span>
                                </div>
                                <p class="text-xs text-gray-700 leading-relaxed">Mengelola administrasi pemerintahan, kependudukan, dan ketertiban keamanan desa</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kasi Kesejahteraan -->
                <div class="aparatur-card-pro" data-aos="fade-up" >
                    <div class="aparatur-photo-pro">
                        <img src="{{ asset('images/struktur/rozi.jpg') }}" alt="Kasi Kesejahteraan" class="w-full aspect-square object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-full aspect-square bg-gradient-to-br from-teal-500 to-teal-600 flex items-center justify-center" style="display: none;">
                            <div class="text-center text-white">
                                <i class="fas fa-heart text-4xl mb-2"></i>
                                <p class="text-xs font-medium">Rozi</p>
                            </div>
                        </div>
                        <div class="aparatur-overlay-pro">
                            <div class="aparatur-position-badge-pro">Kesejahteraan</div>
                        </div>
                    </div>
                    <div class="aparatur-info-pro">
                        <h3 class="aparatur-name-pro">ROZI</h3>
                        <p class="aparatur-title-pro">Kepala Seksi Kesejahteraan</p>
                        <div class="aparatur-contact-pro">
                            <div class="bg-green-50 rounded-lg p-3 space-y-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-4 h-4 bg-green-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">T</span>
                                    </div>
                                    <span class="text-xs font-semibold text-green-700">Tugas:</span>
                                </div>
                                <p class="text-xs text-gray-700 leading-relaxed">Mengkoordinasikan pembangunan infrastruktur, kesehatan, pendidikan, dan pemberdayaan masyarakat</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kepala Dusun 1 - Ajasseriani -->
                <div class="aparatur-card-pro" data-aos="fade-up" >
                    <div class="aparatur-photo-pro">
                        <img src="{{ asset('images/struktur/ajasseriani.jpg') }}" alt="Kepala Dusun 1" class="w-full aspect-square object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-full aspect-square bg-gradient-to-br from-cyan-500 to-cyan-600 flex items-center justify-center" style="display: none;">
                            <div class="text-center text-white">
                                <i class="fas fa-users text-4xl mb-2"></i>
                                <p class="text-xs font-medium">Ajasseriani</p>
                            </div>
                        </div>
                        <div class="aparatur-overlay-pro">
                            <div class="aparatur-position-badge-pro">Kepala Dusun 1</div>
                        </div>
                    </div>
                    <div class="aparatur-info-pro">
                        <h3 class="aparatur-name-pro">AJASSERIANI</h3>
                        <p class="aparatur-title-pro">Kepala Dusun 1</p>
                        <div class="aparatur-contact-pro">
                            <div class="bg-purple-50 rounded-lg p-3 space-y-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-4 h-4 bg-purple-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">T</span>
                                    </div>
                                    <span class="text-xs font-semibold text-purple-700">Tugas:</span>
                                </div>
                                <p class="text-xs text-gray-700 leading-relaxed">Memimpin dan mengkoordinasikan kegiatan masyarakat di wilayah Dusun 1</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kepala Dusun 2 - Meri -->
                <div class="aparatur-card-pro" data-aos="fade-up" >
                    <div class="aparatur-photo-pro">
                        <img src="{{ asset('images/struktur/meri.jpg') }}" alt="Kepala Dusun 2" class="w-full aspect-square object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-full aspect-square bg-gradient-to-br from-pink-500 to-pink-600 flex items-center justify-center" style="display: none;">
                            <div class="text-center text-white">
                                <i class="fas fa-female text-4xl mb-2"></i>
                                <p class="text-xs font-medium">Meri</p>
                            </div>
                        </div>
                        <div class="aparatur-overlay-pro">
                            <div class="aparatur-position-badge-pro">Kepala Dusun 2</div>
                        </div>
                    </div>
                    <div class="aparatur-info-pro">
                        <h3 class="aparatur-name-pro">MERI</h3>
                        <p class="aparatur-title-pro">Kepala Dusun 2</p>
                        <div class="aparatur-contact-pro">
                            <div class="bg-orange-50 rounded-lg p-3 space-y-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-4 h-4 bg-orange-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">T</span>
                                    </div>
                                    <span class="text-xs font-semibold text-orange-700">Tugas:</span>
                                </div>
                                <p class="text-xs text-gray-700 leading-relaxed">Memimpin dan mengkoordinasikan kegiatan masyarakat di wilayah Dusun 2</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kepala Dusun 3 - Basri -->
                <div class="aparatur-card-pro" data-aos="fade-up" >
                    <div class="aparatur-photo-pro">
                        <img src="{{ asset('images/struktur/basri.jpg') }}" alt="Kepala Dusun 3" class="w-full aspect-square object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-full aspect-square bg-gradient-to-br from-yellow-500 to-yellow-600 flex items-center justify-center" style="display: none;">
                            <div class="text-center text-white">
                                <i class="fas fa-male text-4xl mb-2"></i>
                                <p class="text-xs font-medium">Basri</p>
                            </div>
                        </div>
                        <div class="aparatur-overlay-pro">
                            <div class="aparatur-position-badge-pro">Kepala Dusun 3</div>
                        </div>
                    </div>
                    <div class="aparatur-info-pro">
                        <h3 class="aparatur-name-pro">BASRI</h3>
                        <p class="aparatur-title-pro">Kepala Dusun 3</p>
                        <div class="aparatur-contact-pro">
                            <div class="bg-cyan-50 rounded-lg p-3 space-y-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-4 h-4 bg-cyan-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">T</span>
                                    </div>
                                    <span class="text-xs font-semibold text-cyan-700">Tugas:</span>
                                </div>
                                <p class="text-xs text-gray-700 leading-relaxed">Memimpin dan mengkoordinasikan kegiatan masyarakat di wilayah Dusun 3</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Contact CTA -->
        <div class="text-center mt-16" data-aos="fade-up" >
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Butuh Bantuan Lebih Lanjut?</h3>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                    Tim aparatur desa siap membantu Anda dengan pelayanan terbaik. Hubungi kami untuk konsultasi atau informasi lebih lanjut.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://wa.me/6282177123456?text=Halo,%20saya%20ingin%20berkonsultasi%20dengan%20aparatur%20desa" target="_blank" class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-green-500/25">
                        <i class="fab fa-whatsapp mr-3 text-xl"></i>
                        WhatsApp Kantor Desa
                    </a>
                    <a href="{{ route('kontak') }}" class="inline-flex items-center bg-white hover:bg-gray-50 text-blue-600 font-semibold px-6 py-3 rounded-xl border-2 border-blue-200 hover:border-blue-300 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-map-marker-alt mr-3"></i>
                        Kunjungi Kantor Desa
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Street View Section -->
<section class="py-20 bg-gradient-to-br from-teal-50 via-cyan-50 to-blue-50" data-aos="fade-up">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up" >
        <div class="text-center mb-16" data-aos="fade-up" >
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6" data-aos="fade-up" data-aos-duration="600">
                <div class="absolute inset-0 bg-gradient-to-r from-teal-600 to-cyan-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-teal-600 to-cyan-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-street-view mr-2"></i>
                    Virtual Reality Tour
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8" data-aos="fade-up" >
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-teal-800 via-cyan-700 to-blue-800 bg-clip-text text-transparent">
                        Jelajah Virtual
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-teal-500 to-cyan-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description -->
            <div class="max-w-4xl mx-auto mb-12" data-aos="fade-up" >
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-teal-700">Jelajahi Balai Desa Ketapang Baru</span> secara virtual melalui
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-cyan-700">teknologi 360°</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-teal-200 to-cyan-200 opacity-60 rounded"></span>
                    </span>
                    dan lihat langsung kantor pemerintahan desa
                </p>
            </div>
        </div>

        <!-- Street View Container -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Street View Map -->
            <div class="lg:col-span-2" data-aos="fade-right" data-aos-duration="800">
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200">
                    <div class="bg-gradient-to-r from-teal-600 to-cyan-600 p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            </div>
                            <div class="text-white text-sm font-medium">
                                <i class="fas fa-map-marked-alt mr-2"></i>
                                Desa Ketapang Baru
                            </div>
                        </div>
                    </div>
                    <div class="relative" style="height: 450px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!4v1734567890!6m8!1m7!1sPFCbe1x0vFzhf8kg4ySPRA!2m2!1d102.7635049!2d-4.3221828!3f82.05!4f10.82!5f0.7820865974627469!5e0!3m2!1sen!2sid!4v1734567890!5m2!1sen!2sid"
                            class="w-full h-full rounded-b-2xl border-0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            allow="accelerometer; gyroscope; payment; geolocation"
                            sandbox="allow-scripts allow-same-origin allow-popups allow-forms allow-presentation"
                            title="Google Street View Balai Desa Ketapang Baru"
                            style="border: none;">
                        </iframe>
                        <div class="absolute inset-0 bg-gradient-to-br from-teal-500/5 to-cyan-500/5 pointer-events-none rounded-b-2xl"></div>
                    </div>
                </div>
            </div>

            <!-- Information Cards -->
            <div class="space-y-6" data-aos="fade-left" data-aos-duration="800">
                <!-- Location Info Card -->
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-200 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-gray-900">Lokasi Desa</h3>
                            <p class="text-gray-600 text-sm">Koordinat GPS</p>
                        </div>
                    </div>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-globe text-teal-500 w-5 mr-3"></i>
                            <span class="font-medium">Latitude:</span>
                            <span class="ml-2">-4.3221828</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-compass text-cyan-500 w-5 mr-3"></i>
                            <span class="font-medium">Longitude:</span>
                            <span class="ml-2">102.7635049</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-building text-teal-500 w-5 mr-3"></i>
                            <span class="font-medium">Lokasi:</span>
                            <span class="ml-2">Balai Desa</span>
                        </div>
                    </div>
                </div>



                <!-- Street View Controls Card -->
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-200 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-eye text-white text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-gray-900">Street View Tips</h3>
                            <p class="text-gray-600 text-sm">Cara Navigasi</p>
                        </div>
                    </div>
                    <div class="space-y-3 text-sm text-gray-700">
                        <div class="flex items-center">
                            <i class="fas fa-mouse text-teal-500 w-5 mr-3"></i>
                            <span>Klik & drag untuk melihat sekeliling</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-plus text-purple-500 w-5 mr-3"></i>
                            <span>Scroll untuk zoom in/out</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-arrows-alt text-cyan-500 w-5 mr-3"></i>
                            <span>Klik panah untuk berpindah lokasi</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-expand text-pink-500 w-5 mr-3"></i>
                            <span>Tombol fullscreen untuk layar penuh</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 text-white bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800" data-aos="fade-up">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up" >
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">Butuh Bantuan Layanan Desa?</h2>
            <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                Dapatkan akses mudah ke berbagai layanan desa melalui platform digital yang terpercaya.
                Hubungi kami atau kunjungi kantor desa untuk informasi lebih lanjut.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('surat.online') }}" class="btn-accent text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-envelope mr-2"></i>Layanan Surat
                </a>
                <a href="https://wa.me/6282177123456?text=Halo,%20saya%20ingin%20mendapatkan%20informasi%20layanan%20desa" target="_blank" class="btn-secondary text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fab fa-whatsapp mr-2"></i>WhatsApp Desa
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>

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

/* Modern Service Cards - Unique Shape Design */
.service-card-modern {
    background: white;
    border-radius: 2rem 0.5rem 2rem 0.5rem;
    padding: 2rem 1.5rem;
    text-align: center;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
    border: 2px solid #f1f5f9;
    transition: all 0.3s ease;
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
    top: -5px;
    right: -5px;
    width: 30px;
    height: 30px;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    border-radius: 50% 0 50% 0;
    opacity: 0.8;
}

.service-card-modern::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, transparent, var(--card-color, #3b82f6), transparent);
    border-radius: 0 0 2rem 0.5rem;
}

.service-card-modern:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
    border-color: var(--card-color, #3b82f6);
}

.service-icon-modern {
    width: 4.5rem;
    height: 4.5rem;
    border-radius: 50% 20% 50% 20%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
    position: relative;
}

.service-card-modern:hover .service-icon-modern {
    transform: scale(1.02);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.18);
}

/* Individual card colors */
.service-card-modern:nth-child(1) { --card-color: #3b82f6; }
.service-card-modern:nth-child(2) { --card-color: #f59e0b; }
.service-card-modern:nth-child(3) { --card-color: #eab308; }
.service-card-modern:nth-child(4) { --card-color: #10b981; }
.service-card-modern:nth-child(5) { --card-color: #6366f1; }
.service-card-modern:nth-child(6) { --card-color: #8b5cf6; }
.service-card-modern:nth-child(7) { --card-color: #06b6d4; }
.service-card-modern:nth-child(8) { --card-color: #0891b2; }
.service-card-modern:nth-child(9) { --card-color: #ef4444; }
.service-card-modern:nth-child(10) { --card-color: #ec4899; }

/* Compact Statistics Cards */
.stat-card-modern {
    background: white;
    border-radius: 16px;
    padding: 1.5rem 1rem;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06), 0 4px 16px rgba(0, 0, 0, 0.04);
    border: 1px solid #f1f5f9;
    transition: transform 0.2s ease-out, box-shadow 0.2s ease-out;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    min-height: 160px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.stat-card-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1), 0 8px 24px rgba(0, 0, 0, 0.06);
    border-color: #e2e8f0;
}

.stat-icon-modern {
    width: 3.5rem;
    height: 3.5rem;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-out, box-shadow 0.2s ease-out;
    position: relative;
}

.stat-card-modern:hover .stat-icon-modern {
    transform: translateY(-1px) scale(1.02);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
}

.stat-content-modern {
    text-align: center;
}

.stat-content-modern .counter {
    background: linear-gradient(135deg, currentColor 0%, currentColor 100%);
    -webkit-background-clip: text;
    background-clip: text;
    margin-bottom: 0.25rem;
    font-weight: 900;
    letter-spacing: -0.02em;
    font-size: 2.5rem;
    line-height: 1;
}

.stat-content-modern div:last-child {
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #64748b;
    font-weight: 600;
}

/* Responsive adjustments for stat cards */
@media (max-width: 768px) {
    .stat-card-modern {
        min-height: 140px;
        padding: 1.25rem 0.75rem;
        border-radius: 14px;
    }

    .stat-icon-modern {
        width: 3rem;
        height: 3rem;
        margin-bottom: 0.75rem;
        border-radius: 12px;
    }

    .stat-icon-modern i {
        font-size: 1.25rem !important;
    }

    .stat-content-modern .counter {
        font-size: 2rem !important;
    }

    .stat-content-modern div:last-child {
        font-size: 0.8rem;
    }
}

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
        border-radius: 1.5rem 0.3rem 1.5rem 0.3rem;
    }

    .service-card-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .service-card-modern::before {
        width: 20px;
        height: 20px;
        top: -3px;
        right: -3px;
    }

    .service-icon-modern {
        width: 3.5rem;
        height: 3.5rem;
        margin-bottom: 0.75rem;
        border-radius: 50% 15% 50% 15%;
    }

    .service-card-modern:hover .service-icon-modern {
        transform: scale(1.01);
    }

    .service-icon-modern i {
        font-size: 1.5rem !important;
    }

    .service-title-modern {
        font-size: 0.8rem;
    }

    .service-desc-modern {
        font-size: 0.7rem;
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

/* Premium Chart Cards Styling - Data Display Only */
.chart-card-premium {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 24px;
    padding: 2rem;
    box-shadow:
        0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 2px 4px -1px rgba(0, 0, 0, 0.06),
        0 20px 25px -5px rgba(0, 0, 0, 0.1),
        0 10px 10px -5px rgba(0, 0, 0, 0.04);
    border: 1px solid #e2e8f0;
    transition: all 0.2s ease-out;
    min-height: 550px;
    position: relative;
    overflow: hidden;
}

.chart-card-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #8b5cf6, #3b82f6, #06b6d4, #10b981);
    border-radius: 24px 24px 0 0;
}

.chart-card-premium:hover {
    transform: translateY(-4px);
    box-shadow:
        0 12px 24px -4px rgba(0, 0, 0, 0.15),
        0 0 0 1px rgba(139, 92, 246, 0.1);
    border-color: rgba(139, 92, 246, 0.2);
}

.chart-header-premium {
    position: relative;
    z-index: 10;
}

.chart-icon-premium {
    width: 3.5rem;
    height: 3.5rem;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    flex-shrink: 0;
    position: relative;
}

.chart-icon-premium::before {
    content: '';
    position: absolute;
    inset: -2px;
    border-radius: 18px;
    padding: 2px;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    mask-composite: exclude;
}

.chart-title-premium {
    font-size: 1.375rem;
    font-weight: 800;
    color: #111827;
    margin-bottom: 0.25rem;
    line-height: 1.2;
    background: linear-gradient(135deg, #111827, #4f46e5);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

.chart-subtitle-premium {
    font-size: 0.875rem;
    color: #64748b;
    line-height: 1.3;
    font-weight: 500;
}

.chart-metric-premium {
    text-align: center;
    padding: 1rem;
    background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    border-radius: 16px;
    border: 1px solid #e2e8f0;
}

.chart-container-premium {
    flex: 1;
    display: block;
    position: relative;
    min-height: 400px;
    margin-top: 1rem;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-radius: 16px;
    overflow: hidden;
    box-shadow:
        inset 0 1px 0 rgba(255, 255, 255, 0.6),
        0 4px 6px -1px rgba(0, 0, 0, 0.1),
        0 2px 4px -1px rgba(0, 0, 0, 0.06);
    padding: 0;
}

.chart-container-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg,
        rgba(59, 130, 246, 0.03) 0%,
        rgba(139, 92, 246, 0.03) 50%,
        rgba(236, 72, 153, 0.03) 100%);
    pointer-events: none;
    z-index: 1;
}

.chart-container-premium canvas {
    width: 100% !important;
    height: 100% !important;
    filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.07));
    will-change: auto;
    display: block !important;
    visibility: visible !important;
    position: relative;
    z-index: 10;
    transition: transform 0.3s ease;
}

.chart-container-premium:hover canvas {
    transform: scale(1.02);
}

/* Chart loading state */
.chart-container-premium .chart-loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #6b7280;
    font-size: 14px;
    z-index: 20;
    background: rgba(255, 255, 255, 0.95);
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    text-align: center;
}

.chart-container-premium .chart-loading i {
    color: #3b82f6;
    margin-bottom: 8px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Mini Stats Cards */
.mini-stat-card {
    padding: 1rem;
    border-radius: 12px;
    transition: transform 0.15s ease-out, box-shadow 0.15s ease-out;
    cursor: pointer;
}

.mini-stat-card:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Age Quick Stats */
.age-quick-stat {
    text-align: center;
    padding: 0.75rem;
    border-radius: 12px;
    background: white;
    border: 2px solid #f1f5f9;
    transition: transform 0.15s ease-out, border-color 0.15s ease-out, box-shadow 0.15s ease-out;
    cursor: pointer;
    position: relative;
}

.age-quick-stat:hover {
    transform: translateY(-1px);
    border-color: #e2e8f0;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.age-quick-stat.active {
    border-color: #8b5cf6;
    background: linear-gradient(135deg, #faf5ff, #f3e8ff);
}

.age-indicator {
    height: 4px;
    border-radius: 2px;
    margin-bottom: 0.5rem;
}

/* Insights Panel */
.insight-card {
    background: white;
    border-radius: 20px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    border: 1px solid #f1f5f9;
    transition: transform 0.2s ease-out, box-shadow 0.2s ease-out;
    position: relative;
    overflow: hidden;
}

.insight-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--insight-color-1, #10b981), var(--insight-color-2, #059669));
}

.insight-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 16px -4px rgba(0, 0, 0, 0.12);
}

.insight-icon {
    width: 3rem;
    height: 3rem;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.insight-content {
    flex: 1;
}

.insight-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 0.5rem;
}

.insight-desc {
    font-size: 0.875rem;
    color: #6b7280;
    line-height: 1.5;
    margin-bottom: 1rem;
}

.insight-trend {
    display: flex;
    align-items: center;
    font-size: 0.875rem;
}

/* Responsive adjustments */
@media (max-width: 1280px) {
    .chart-card-premium.xl\\:col-span-2 {
        grid-column: span 1;
    }
}

@media (max-width: 768px) {
    .chart-card-premium {
        min-height: 300px;
        padding: 1.5rem;
        border-radius: 20px;
    }

    .chart-icon-premium {
        width: 3rem;
        height: 3rem;
        border-radius: 12px;
    }

    .chart-title-premium {
        font-size: 1.25rem;
    }

    .age-quick-stat {
        padding: 0.5rem;
    }

    .age-quick-stat p {
        font-size: 0.75rem !important;
    }

    .mini-stat-card {
        padding: 0.75rem;
    }

    .insight-card {
        padding: 1.25rem;
    }
}

/* Professional Aparatur Cards - Inspired by Reference Design */
.aparatur-card-pro {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1), 0 2px 6px rgba(0, 0, 0, 0.06);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
}

.aparatur-card-pro:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15), 0 10px 20px rgba(0, 0, 0, 0.1);
    border-color: #d1d5db;
}

.aparatur-photo-pro {
    position: relative;
    overflow: hidden;
    aspect-ratio: 1;
}

.aparatur-overlay-pro {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.4), transparent);
    padding: 1rem;
    display: flex;
    justify-content: center;
    align-items: end;
}

.aparatur-position-badge-pro {
    background: rgba(255, 255, 255, 0.95);
    color: #374151;
    font-size: 0.7rem;
    font-weight: 700;
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.aparatur-info-pro {
    padding: 1rem;
    text-align: center;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
}

.aparatur-name-pro {
    font-size: 0.9rem;
    font-weight: 800;
    color: #111827;
    margin-bottom: 0.25rem;
    line-height: 1.2;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.aparatur-title-pro {
    font-size: 0.75rem;
    font-weight: 500;
    color: #6b7280;
    margin-bottom: 0.75rem;
    line-height: 1.3;
}

.aparatur-contact-pro {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
}

.contact-btn-text-pro {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem 1rem;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    color: #6b7280;
    border-radius: 12px;
    transition: all 0.3s ease;
    text-decoration: none;
    border: 1px solid #d1d5db;
    font-size: 0.75rem;
    font-weight: 600;
    white-space: nowrap;
}

.contact-btn-text-pro:hover {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(59, 130, 246, 0.4);
    border-color: #2563eb;
}

/* Individual card hover effects with unique colors */
.aparatur-card-pro:nth-child(1):hover .contact-btn-text-pro:hover {
    background: linear-gradient(135deg, #10b981, #059669);
    box-shadow: 0 6px 12px rgba(16, 185, 129, 0.4);
}

.aparatur-card-pro:nth-child(2):hover .contact-btn-text-pro:hover {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    box-shadow: 0 6px 12px rgba(139, 92, 246, 0.4);
}

.aparatur-card-pro:nth-child(3):hover .contact-btn-text-pro:hover {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    box-shadow: 0 6px 12px rgba(245, 158, 11, 0.4);
}

.aparatur-card-pro:nth-child(4):hover .contact-btn-text-pro:hover {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    box-shadow: 0 6px 12px rgba(239, 68, 68, 0.4);
}

.aparatur-card-pro:nth-child(5):hover .contact-btn-text-pro:hover {
    background: linear-gradient(135deg, #6366f1, #4f46e5);
    box-shadow: 0 6px 12px rgba(99, 102, 241, 0.4);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .aparatur-card-pro {
        border-radius: 12px;
    }

    .aparatur-info-pro {
        padding: 0.75rem;
    }

    .aparatur-name-pro {
        font-size: 0.8rem;
    }

    .aparatur-title-pro {
        font-size: 0.7rem;
    }

    .aparatur-position-badge-pro {
        font-size: 0.6rem;
        padding: 0.2rem 0.6rem;
    }

    .contact-btn-text-pro {
        padding: 0.375rem 0.75rem;
        font-size: 0.7rem;
    }
}

    /* Line clamp utility */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Enhanced hero spacing */
    .hero-section {
        padding: 4rem 0 0 0;
    }

    @media (min-width: 1024px) {
        .hero-section {
            padding: 6rem 0 0 0;
        }
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
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced Chart.js global defaults
    if (window.Chart) {
        Chart.defaults.font.family = 'Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, Helvetica Neue, Arial';
        Chart.defaults.color = '#0f172a';
        Chart.defaults.plugins.legend.labels.boxWidth = 12;
        Chart.defaults.plugins.legend.labels.boxHeight = 12;
        Chart.defaults.plugins.legend.labels.usePointStyle = true;
        Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(15,23,42,0.95)';
        Chart.defaults.plugins.tooltip.titleColor = '#fff';
        Chart.defaults.plugins.tooltip.bodyColor = '#e5e7eb';
        Chart.defaults.plugins.tooltip.cornerRadius = 8;
        Chart.defaults.responsive = true;
        Chart.defaults.maintainAspectRatio = false;
    }

    // Chart configurations
    const chartConfigs = {
        gender: {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [{{ $totalLakiLaki }}, {{ $totalPerempuan }}],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.9)',
                        'rgba(236, 72, 153, 0.9)'
                    ],
                    borderColor: [
                        'rgba(59, 130, 246, 1)',
                        'rgba(236, 72, 153, 1)'
                    ],
                    borderWidth: 3,
                    hoverOffset: 10,
                    hoverBorderWidth: 4,
                    hoverBackgroundColor: [
                        'rgba(59, 130, 246, 1)',
                        'rgba(236, 72, 153, 1)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: 20
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 25,
                            font: {
                                weight: 'bold',
                                size: 14
                            },
                            usePointStyle: true,
                            pointStyle: 'circle',
                            boxWidth: 15,
                            boxHeight: 15
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderWidth: 1,
                        cornerRadius: 12,
                        titleFont: { size: 16, weight: 'bold' },
                        bodyFont: { size: 14 },
                        padding: 15,
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((context.parsed / total) * 100).toFixed(1);
                                return '👥 ' + context.label + ': ' + context.parsed.toLocaleString() + ' (' + percentage + '%)';
                            }
                        }
                    }
                },
                animation: {
                    animateRotate: true,
                    duration: 1500,
                    easing: 'easeOutQuart'
                }
            }
        },
        age: {
            type: 'bar',
            data: {
                labels: ['👶 0-17', '🧑 18-30', '👨‍💼 31-45', '👨‍🦳 46-60', '👴 60+'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: [{{ $usia0_17 }}, {{ $usia18_30 }}, {{ $usia31_45 }}, {{ $usia46_60 }}, {{ $usia60Plus }}],
                    backgroundColor: [
                        'linear-gradient(135deg, #10b981, #059669)',
                        'linear-gradient(135deg, #3b82f6, #1d4ed8)',
                        'linear-gradient(135deg, #8b5cf6, #7c3aed)',
                        'linear-gradient(135deg, #f59e0b, #d97706)',
                        'linear-gradient(135deg, #ef4444, #dc2626)'
                    ],
                    borderColor: [
                        '#10b981',
                        '#3b82f6',
                        '#8b5cf6',
                        '#f59e0b',
                        '#ef4444'
                    ],
                    borderWidth: 2,
                    borderRadius: {
                        topLeft: 8,
                        topRight: 8,
                        bottomLeft: 0,
                        bottomRight: 0
                    },
                    hoverBackgroundColor: [
                        '#059669',
                        '#1d4ed8',
                        '#7c3aed',
                        '#d97706',
                        '#dc2626'
                    ],
                    hoverBorderWidth: 3,
                    categoryPercentage: 0.8,
                    barPercentage: 0.9
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 20,
                        bottom: 5
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgba(255, 255, 255, 0.1)',
                        borderWidth: 1,
                        cornerRadius: 12,
                        titleFont: { size: 16, weight: 'bold' },
                        bodyFont: { size: 14 },
                        padding: 15,
                        callbacks: {
                            title: function(context) {
                                return 'Kelompok Usia ' + context[0].label;
                            },
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((context.parsed.y / total) * 100).toFixed(1);
                                return '👥 Jumlah: ' + context.parsed.y.toLocaleString() + ' (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grace: '10%',
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                weight: 'bold',
                                size: 12
                            },
                            color: '#6b7280',
                            padding: 5,
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        },
                        border: {
                            display: false
                        }
                    },
                    x: {
                        offset: true,
                        grid: {
                            display: false,
                            drawBorder: false,
                            offset: true
                        },
                        ticks: {
                            font: {
                                weight: 'bold',
                                size: 10
                            },
                            color: '#374151',
                            padding: 0,
                            maxRotation: 0
                        },
                        border: {
                            display: false
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeOutBounce',
                    delay: (context) => {
                        return context.dataIndex * 200;
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        }
    };

    // Create charts with loading states
    Object.keys(chartConfigs).forEach(chartName => {
        const canvas = document.getElementById(chartName + 'Chart');
        const loadingEl = document.getElementById(chartName + 'ChartLoading');

        if (canvas) {
            // Show loading
            if (loadingEl) loadingEl.style.display = 'block';

            // Create chart with delay for smooth loading
            setTimeout(() => {
                const ctx = canvas.getContext('2d');

                // Create gradients for bar chart
                if (chartName === 'age') {
                    const gradients = [
                        ctx.createLinearGradient(0, 0, 0, 400),
                        ctx.createLinearGradient(0, 0, 0, 400),
                        ctx.createLinearGradient(0, 0, 0, 400),
                        ctx.createLinearGradient(0, 0, 0, 400),
                        ctx.createLinearGradient(0, 0, 0, 400)
                    ];

                    // Green gradient
                    gradients[0].addColorStop(0, '#10b981');
                    gradients[0].addColorStop(1, '#059669');

                    // Blue gradient
                    gradients[1].addColorStop(0, '#3b82f6');
                    gradients[1].addColorStop(1, '#1d4ed8');

                    // Purple gradient
                    gradients[2].addColorStop(0, '#8b5cf6');
                    gradients[2].addColorStop(1, '#7c3aed');

                    // Orange gradient
                    gradients[3].addColorStop(0, '#f59e0b');
                    gradients[3].addColorStop(1, '#d97706');

                    // Red gradient
                    gradients[4].addColorStop(0, '#ef4444');
                    gradients[4].addColorStop(1, '#dc2626');

                    chartConfigs[chartName].data.datasets[0].backgroundColor = gradients;
                }

                new Chart(canvas, chartConfigs[chartName]);

                // Hide loading after chart is created
                setTimeout(() => {
                    if (loadingEl) {
                        loadingEl.style.opacity = '0';
                        loadingEl.style.transition = 'opacity 0.5s ease';
                        setTimeout(() => {
                            loadingEl.style.display = 'none';
                        }, 500);
                    }
                }, 500);
            }, 300 + (chartName === 'age' ? 200 : 0)); // Stagger the loading
        }
    });
});
</script>

<!-- Particles.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<script>
    // Initialize AOS with faster settings
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 600,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });
    }

    // Particles.js Configuration - Initialize after DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('particles-js') && typeof particlesJS !== 'undefined') {
            particlesJS('particles-js', {
                "particles": {
                    "number": {
                        "value": 80,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#ffffff"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        }
                    },
                    "opacity": {
                        "value": 0.3,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.2,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 3,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            });
        }

        // Refresh AOS after particles are loaded
        setTimeout(function() {
            if (typeof AOS !== 'undefined') {
                AOS.refresh();
            }
        }, 1000);
    });

    // Additional AOS refresh on window resize and content changes
    $(window).on('resize', function() {
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    });
</script>
@endpush

