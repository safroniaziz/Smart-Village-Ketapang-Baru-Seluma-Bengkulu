@extends('layouts.app-public')

@section('title', 'Pengumuman Desa - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* 🚀 ADVANCED PENGUMUMAN PAGE STYLES 🚀 */
    :root {
        --primary-blue-start: #0086c9;
        --primary-blue-mid: #0074b3;
        --primary-blue-end: #006ba3;
        --glow-primary: rgba(0, 134, 201, 0.4);
        --glow-warning: rgba(255, 193, 7, 0.6);
        --glow-danger: rgba(220, 53, 69, 0.6);
    }

    /* ✨ ADVANCED HERO BACKGROUND WITH SMOOTH ANIMATIONS ✨ */
    .hero-section {
        background: linear-gradient(135deg, var(--primary-blue-start) 0%, var(--primary-blue-mid) 25%, var(--primary-blue-end) 50%, #005b93 75%, #004d83 100%);
        background-size: 200% 200%;
        animation: heroGradientShift 8s ease infinite;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 50%, rgba(255, 193, 7, 0.15) 0%, transparent 60%),
            radial-gradient(circle at 80% 20%, rgba(220, 53, 69, 0.15) 0%, transparent 60%),
            radial-gradient(circle at 40% 80%, rgba(40, 167, 69, 0.15) 0%, transparent 60%);
        animation: colorShift 12s ease infinite;
    }

    @keyframes heroGradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes colorShift {
        0%, 100% { opacity: 1; }
        33% { opacity: 0.7; }
        66% { opacity: 0.9; }
    }

    /* 🎨 LOADING SKELETON ANIMATIONS */
    .skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* 🎯 ADVANCED CARD INTERACTIONS */
    .news-card, .announcement-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform-origin: center;
        background: white;
        overflow: hidden;
        border-radius: 1.5rem;
        position: relative;
    }

    .news-card:hover, .announcement-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    /* Enhanced card shimmer effect */
    .news-card::before, .announcement-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
        z-index: 1;
    }

    .news-card:hover::before, .announcement-card:hover::before {
        left: 100%;
    }

    /* Enhanced image effects */
    .news-card .relative, .announcement-card .relative {
        position: relative;
        z-index: 2;
        overflow: hidden;
    }

    .news-card img, .announcement-card img {
        transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .news-card:hover img, .announcement-card:hover img {
        transform: scale(1.08);
    }

    /* Simple priority backgrounds */
    .bg-gradient-tinggi {
        background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
    }

    .bg-gradient-sedang {
        background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
    }

    .bg-gradient-rendah {
        background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%);
    }

    /* Simple priority badges */
    .priority-badge-tinggi {
        background: #dc3545;
    }

    .priority-badge-sedang {
        background: #ffc107;
    }

    .priority-badge-rendah {
        background: #20c997;
    }

    /* 🌟 ADVANCED BADGE WITH BACKDROP FILTER */
    .featured-badge {
        background: rgba(59, 130, 246, 0.9);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
        transition: all 0.3s ease;
    }

    .featured-badge:hover {
        background: rgba(59, 130, 246, 1);
        transform: scale(1.05);
        box-shadow: 0 6px 25px rgba(59, 130, 246, 0.4);
    }

    /* 📱 FLOATING ACTION BUTTON */
    .fab {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.4);
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 50;
        opacity: 0;
        transform: scale(0.8);
    }

    .fab.show {
        opacity: 1;
        transform: scale(1);
    }

    .fab:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 30px rgba(59, 130, 246, 0.6);
    }

    /* 🎨 CUSTOM SCROLLBARS */
    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #CBD5E1 #F1F5F9;
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.05);
        border-radius: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-radius: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #2563eb, #7c3aed);
    }

    /* 🚀 ENHANCED BUTTONS WITH ADVANCED EFFECTS */
    .spectacular-btn-tinggi {
        background: linear-gradient(45deg, #dc3545, #fd7e14);
        border: none;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }

    .spectacular-btn {
        background: linear-gradient(45deg, #2563eb, #4f46e5);
        border: none;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }

    .spectacular-btn::before, .spectacular-btn-tinggi::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.6s ease;
    }

    .spectacular-btn:hover::before, .spectacular-btn-tinggi:hover::before {
        left: 100%;
    }

    .spectacular-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
    }

    .spectacular-btn-tinggi:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 20px rgba(220, 53, 69, 0.4);
    }

    /* 🎭 ADDITIONAL SMOOTH ANIMATIONS */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 40px, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }

    .fade-in-scale {
        animation: fadeInScale 0.6s ease-out;
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
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section relative text-white overflow-hidden min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)] flex items-center pt-8 py-8 lg:py-12 pb-0" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100"></div>

    <!-- Particle.js Container for Pengumuman -->
    <div id="particles-pengumuman" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-bullhorn text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">PENGUMUMAN RESMI</h2>
                            <p class="text-sm text-blue-100">Informasi Penting Desa</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Pengumuman</span><br>
                        <span class="text-yellow-400 font-extrabold">Desa Ketapang Baru</span>
                    </h1>

                    <!-- Badge Desa Digital -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-star mr-2 text-yellow-300 text-xs"></i>
                            Pusat Informasi Resmi
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        Dapatkan informasi penting dan pengumuman resmi dari pemerintah
                        <span class="font-semibold text-yellow-300">Desa Ketapang Baru</span>
                    </p>
                            </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ $pengumumans->total() }}</div>
                            <div class="text-sm text-blue-100">Total Pengumuman</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ \App\Models\Pengumuman::where('prioritas', 'Tinggi')->count() }}</div>
                        <div class="text-sm text-blue-100">Prioritas Tinggi</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ \App\Models\Pengumuman::active()->count() }}</div>
                        <div class="text-sm text-blue-100">Masih Berlaku</div>
                            </div>
                        </div>

                <!-- Search Bar -->
                <div class="relative z-20" data-aos="fade-up" data-aos-delay="800">
                    <form method="GET" action="{{ route('pengumuman') }}" class="flex flex-col sm:flex-row gap-3">
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Cari pengumuman...">
                        </div>
                        <button type="submit" class="bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-search mr-2"></i>
                            Cari Pengumuman
                        </button>
                    </form>
                            </div>
                        </div>

                    <!-- Right Side - Announcement Statistics Dashboard -->
                    <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                        <div class="group bg-white/10 backdrop-blur-sm rounded-3xl p-6 shadow-xl border border-white/20 hover:bg-white/20 hover:shadow-2xl transition-all duration-500">
                            <!-- Header -->
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-12 h-12 bg-white/20 rounded-2xl mb-3">
                                    <i class="fas fa-bullhorn text-white text-xl"></i>
                                </div>
                                <h3 class="text-lg font-bold text-white mb-1">Portal Pengumuman</h3>
                                <p class="text-sm text-blue-100">Statistik Terkini</p>
                            </div>

                            <!-- Statistics Grid -->
                            <div class="space-y-3 mb-6">
                                <!-- Row 1: 2 columns -->
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                        <div class="flex items-center justify-center text-sm">
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-blue-500/30 transition-all duration-300">
                                                <i class="fas fa-bullhorn text-white text-sm"></i>
                                            </div>
                                            <div class="text-center">
                                                <p class="font-bold text-gray-800 text-lg">{{ $pengumumans->total() }}</p>
                                                <p class="text-gray-600 text-sm">Total Pengumuman</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                        <div class="flex items-center justify-center text-sm">
                                            <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-red-500/30 transition-all duration-300">
                                                <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                                            </div>
                                            <div class="text-center">
                                                <p class="font-bold text-gray-800 text-lg">{{ \App\Models\Pengumuman::where('prioritas', 'Tinggi')->count() }}</p>
                                                <p class="text-gray-600 text-sm">Prioritas Tinggi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Row 2: 1 column full width -->
                                <div class="grid grid-cols-1 gap-3">
                                    <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-green-500/30 transition-all duration-300">
                                                    <i class="fas fa-check-circle text-white text-sm"></i>
                                                </div>
                                                <div>
                                                    <p class="font-bold text-gray-800 text-lg">{{ \App\Models\Pengumuman::active()->count() }}</p>
                                                    <p class="text-gray-600 text-sm">Masih Berlaku</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-purple-500/30 transition-all duration-300">
                                                    <i class="fas fa-eye text-white text-sm"></i>
                                                </div>
                                                <div>
                                                    <p class="font-bold text-gray-800 text-lg">{{ number_format(\App\Models\Pengumuman::sum('views')) }}</p>
                                                    <p class="text-gray-600 text-sm">Total Views</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Urgent Announcement Preview -->
                            @if($urgentPengumuman)
                            <div class="relative z-10 bg-gradient-to-br from-gray-900 via-red-900 to-orange-900 rounded-2xl p-4 shadow-xl group-hover:shadow-2xl group-hover:from-gray-800 group-hover:via-red-800 group-hover:to-orange-800 transition-all duration-500">
                                <div class="text-center mb-3">
                                    <div class="inline-flex items-center justify-center space-x-2 text-white/90 text-xs font-semibold mb-2">
                                        <i class="fas fa-exclamation-triangle text-red-400"></i>
                                        <span>Pengumuman Penting</span>
                                    </div>
                                </div>

                                <div class="flex flex-col items-center space-y-3">
                                    <div class="relative group-hover:scale-105 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-br from-red-400/30 to-orange-500/30 rounded-2xl blur-lg group-hover:from-red-400/50 group-hover:to-orange-500/50 transition-all duration-500"></div>
                                        <div class="relative bg-white p-4 rounded-2xl shadow-2xl border-2 border-white/20 group-hover:shadow-3xl group-hover:border-white/40 transition-all duration-500">
                                            <div class="text-center">
                                                <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-orange-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                                                    <i class="fas fa-bullhorn text-white text-lg"></i>
                                                </div>
                                                <h4 class="font-bold text-gray-800 text-sm mb-1 line-clamp-2">{{ Str::limit($urgentPengumuman->judul, 40) }}</h4>
                                                <p class="text-xs text-gray-600">{{ $urgentPengumuman->formatted_date }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <div class="flex items-center justify-center space-x-2 mb-1">
                                            <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse group-hover:bg-red-300 transition-colors duration-300"></div>
                                            <p class="text-sm text-white font-bold group-hover:text-red-100 transition-colors duration-300">Klik untuk Lihat</p>
                                            <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse group-hover:bg-red-300 transition-colors duration-300" style="animation-delay: 0.5s;"></div>
                                        </div>
                                        <p class="text-xs text-gray-300">{{ $urgentPengumuman->views }} views</p>
                                    </div>
                                </div>

                                <div class="flex justify-center mt-3">
                                    <a href="{{ route('pengumuman.show', $urgentPengumuman->slug) }}" class="inline-flex items-center bg-gradient-to-r from-red-500/20 to-orange-500/20 backdrop-blur-sm border border-red-400/30 rounded-full px-3 py-1 group-hover:from-red-500/30 group-hover:to-orange-500/30 group-hover:border-red-300/50 transition-all duration-300">
                                        <i class="fas fa-arrow-right text-red-400 text-xs mr-2 group-hover:text-red-300 transition-colors duration-300"></i>
                                        <span class="text-xs text-red-100 font-medium group-hover:text-white transition-colors duration-300">Lihat Pengumuman</span>
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
        </div>
    </div>
</section>

<!-- Urgent Announcement Section removed per request -->

<!-- Announcements Grid Section -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header (match statistik style) -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-15"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-2.5 rounded-full text-sm font-semibold shadow-md">
                    <i class="fas fa-bullhorn mr-2"></i>
                    Semua Pengumuman
                </div>
            </div>
            <h2 class="text-4xl lg:text-5xl font-black tracking-tight mb-4">
                <span class="bg-gradient-to-r from-gray-900 via-slate-800 to-blue-800 bg-clip-text text-transparent">
                    Pengumuman Resmi
                </span>
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Informasi resmi dan penting dari Pemerintah Desa Ketapang Baru
            </p>

            <!-- Filter Controls -->
            <div class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <form method="GET" action="{{ route('pengumuman') }}" class="flex gap-3">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="prioritas" class="px-4 py-2 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" onchange="this.form.submit()">
                        <option value="">Semua Prioritas</option>
                        <option value="Tinggi" {{ request('prioritas') == 'Tinggi' ? 'selected' : '' }}>Prioritas Tinggi</option>
                        <option value="Sedang" {{ request('prioritas') == 'Sedang' ? 'selected' : '' }}>Prioritas Sedang</option>
                        <option value="Rendah" {{ request('prioritas') == 'Rendah' ? 'selected' : '' }}>Prioritas Rendah</option>
                    </select>
                </form>
            </div>
        </div>

        @if($pengumumans->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($pengumumans as $index => $pengumuman)
                    <article class="news-card group bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="relative overflow-hidden">
                            <!-- Pengumuman always uses gradient background since no image field in database -->
                            <div class="w-full h-64 bg-gradient-to-br from-blue-500 to-indigo-600 relative">
                                <!-- Decorative pattern -->
                                <div class="absolute inset-0 opacity-10">
                                    <div class="absolute top-4 left-4 w-8 h-8 border-2 border-white rounded-full"></div>
                                    <div class="absolute top-8 right-8 w-4 h-4 bg-white rounded-full"></div>
                                    <div class="absolute bottom-8 left-8 w-6 h-6 border border-white rotate-45"></div>
                                    <div class="absolute bottom-4 right-4 w-10 h-10 border-2 border-white rounded-lg rotate-12"></div>
                                </div>
                                
                                <!-- Priority color overlay -->
                                @if($pengumuman->prioritas === 'Tinggi')
                                    <div class="absolute inset-0 bg-red-500/20"></div>
                                @elseif($pengumuman->prioritas === 'Sedang')
                                    <div class="absolute inset-0 bg-yellow-500/20"></div>
                                @endif
                            </div>


                            <!-- Enhanced Title Overlay with Professional Info -->
                            <div class="absolute inset-0 z-10">
                                <!-- Top Info Bar -->
                                <div class="absolute top-0 left-0 right-0 p-4">
                                    <div class="flex justify-between items-start">
                                        <!-- Category & Status -->
                                        <div class="flex flex-col gap-2">
                                            <div class="flex items-center gap-2">
                                                <!-- Priority Badge -->
                                                @if($pengumuman->prioritas)
                                                <span class="bg-white/20 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full border border-white/30">
                                                    <i class="fas fa-flag mr-1"></i>
                                                    {{ $pengumuman->prioritas }}
                                                </span>
                                                @endif

                                                <!-- Status Badge -->
                                                @if($pengumuman->tanggal_berakhir && $pengumuman->tanggal_berakhir < now())
                                                    <span class="bg-red-500/80 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">
                                                        <i class="fas fa-clock mr-1"></i>
                                                        Berakhir
                                                    </span>
                                                @else
                                                    <span class="bg-green-500/80 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">
                                                        <i class="fas fa-check-circle mr-1"></i>
                                                        Aktif
                                                    </span>
                                                @endif
                                            </div>

                                            <!-- Publication Date -->
                                            <span class="text-white/80 text-xs backdrop-blur-sm bg-black/20 px-2 py-1 rounded-full w-fit">
                                                <i class="fas fa-calendar mr-1"></i>
                                                {{ $pengumuman->formatted_date }}
                                            </span>
                                        </div>

                                        <!-- Priority Indicator -->
                                        @if($pengumuman->prioritas)
                                            <div class="text-right">
                                                @if($pengumuman->prioritas === 'Tinggi')
                                                    <div class="bg-red-500/80 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">
                                                        <i class="fas fa-exclamation-triangle mr-1"></i>
                                                        Penting
                                                    </div>
                                                @elseif($pengumuman->prioritas === 'Sedang')
                                                    <div class="bg-yellow-500/80 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">
                                                        <i class="fas fa-info-circle mr-1"></i>
                                                        Sedang
                                                    </div>
                                                @else
                                                    <div class="bg-blue-500/80 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">
                                                        <i class="fas fa-info mr-1"></i>
                                                        Normal
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Bottom Title Area -->
                                <div class="absolute inset-x-0 bottom-0">
                                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>
                                    <div class="relative px-5 py-4">
                                        <!-- Author Info -->
                                        <div class="flex items-center gap-2 mb-2">
                                            <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center">
                                                <i class="fas fa-user text-white text-xs"></i>
                                            </div>
                                            <span class="text-white/90 text-xs">{{ $pengumuman->penulis ?: 'Admin Desa' }}</span>
                                        </div>

                                        <!-- Title -->
                                        <h3 class="text-white text-lg lg:text-xl font-bold leading-snug line-clamp-2 drop-shadow-sm">
                                            {{ $pengumuman->judul }}
                                        </h3>

                                        <!-- Quick Stats -->
                                        <div class="flex items-center gap-4 mt-2 text-white/80 text-xs">
                                            <span><i class="fas fa-eye mr-1"></i>{{ number_format($pengumuman->views) }}</span>
                                            @if($pengumuman->tanggal_berakhir)
                                                <span><i class="fas fa-calendar-times mr-1"></i>Sampai {{ \Carbon\Carbon::parse($pengumuman->tanggal_berakhir)->format('d/m/Y') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <!-- Professional Content Area -->
                            <div class="space-y-4">
                                <!-- Excerpt with better typography -->
                                <p class="text-gray-700 text-sm leading-relaxed line-clamp-3">
                                    {{ Str::limit($pengumuman->excerpt, 150) }}
                                </p>

                                <!-- Enhanced Action Area -->
                                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                    <!-- Additional Info -->
                                    <div class="flex items-center gap-4 text-xs text-gray-500">
                                        @if($pengumuman->tanggal_berakhir)
                                            <span class="flex items-center">
                                                <i class="fas fa-hourglass-half mr-1"></i>
                                                {{ \Carbon\Carbon::parse($pengumuman->tanggal_berakhir)->diffForHumans() }}
                                            </span>
                                        @endif
                                        <span class="flex items-center">
                                            <i class="fas fa-building mr-1"></i>
                                            Pemerintah Desa
                                        </span>
                                    </div>

                                    <!-- Enhanced CTA Button -->
                                    <a href="{{ route('pengumuman.show', $pengumuman->slug) }}" class="spectacular-btn text-white px-6 py-2.5 rounded-xl text-sm font-semibold flex items-center gap-2 group">
                                        <span>Baca Selengkapnya</span>
                                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-300"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="text-center py-20" data-aos="fade-up">
                <div class="mb-8">
                    <i class="fas fa-bullhorn text-8xl text-gray-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-4">Belum Ada Pengumuman</h3>
                <p class="text-gray-500 mb-8">Pengumuman akan segera hadir. Silakan kembali lagi nanti.</p>
                <a href="{{ route('home') }}" class="spectacular-btn text-white font-semibold px-8 py-4 rounded-xl">
                    <i class="fas fa-home mr-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        @endif

        @if($pengumumans->hasPages())
            <div class="flex justify-center mt-16" data-aos="fade-up">
                <div class="bg-white rounded-2xl shadow-lg p-4">
                    {{ $pengumumans->onEachSide(2)->links() }}
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Floating Action Button -->
<div class="fab" id="fabButton" onclick="scrollToTop()" title="Kembali ke atas">
    <i class="fas fa-arrow-up"></i>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 🎨 Initialize AOS (Animate On Scroll)
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 100
    });

    // 🌟 Enhanced Particles.js with more dynamic effects
    if (document.getElementById('particles-pengumuman')) {
        particlesJS('particles-pengumuman', {
            "particles": {
                "number": {
                    "value": 100,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": ["#ffffff", "#3b82f6", "#8b5cf6"]
                },
                "shape": {
                    "type": ["circle", "triangle"],
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    }
                },
                "opacity": {
                    "value": 0.4,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 4,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 2,
                        "size_min": 0.5,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.3,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "bubble"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "bubble": {
                        "distance": 200,
                        "size": 8,
                        "duration": 2,
                        "opacity": 0.8,
                        "speed": 3
                    },
                    "push": {
                        "particles_nb": 4
                    }
                }
            },
            "retina_detect": true
        });
    }

    // 📱 Floating Action Button Logic
    const fab = document.getElementById('fabButton');
    let isScrolling = false;

    function toggleFAB() {
        if (window.scrollY > 300) {
            fab.classList.add('show');
        } else {
            fab.classList.remove('show');
        }
    }

    window.addEventListener('scroll', function() {
        if (!isScrolling) {
            window.requestAnimationFrame(function() {
                toggleFAB();
                isScrolling = false;
            });
            isScrolling = true;
        }
    });

    // 🚀 Smooth Scroll to Top Function
    window.scrollToTop = function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    };

    // 🎯 Enhanced Card Interactions
    const cards = document.querySelectorAll('.news-card, .announcement-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // 🌈 Add custom scrollbar to body
    document.body.classList.add('custom-scrollbar');

    // 🎊 Success message with enhanced styling
    console.log('🚀 ADVANCED PENGUMUMAN PAGE LOADED WITH SPECTACULAR EFFECTS! 🎊');

    // Add some sparkle effect on page load
    setTimeout(() => {
        const sparkles = document.querySelectorAll('[data-aos]');
        sparkles.forEach((el, index) => {
            setTimeout(() => {
                el.style.filter = 'brightness(1.1)';
                setTimeout(() => {
                    el.style.filter = 'brightness(1)';
                }, 200);
            }, index * 100);
        });
    }, 1000);
});
</script>
@endpush
