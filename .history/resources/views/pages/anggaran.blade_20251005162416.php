@extends('layouts.app-public')

@section('title', 'Anggaran Desa - Smart Village ' . ($villageName ?? 'Ketapang Baru'))

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* Custom CSS untuk Anggaran Page */

    /* Smooth gradient animation */
    .hero-gradient {
        background: linear-gradient(135deg, #0086c9 0%, #0074b3 25%, #006ba3 50%, #005b93 75%, #004d83 100%);
        background-size: 200% 200%;
        animation: gradientShift 8s ease infinite;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Loading skeleton */
    .skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* Enhanced card hover effects */
    .stat-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform-origin: center;
    }

    .stat-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }


    /* Chart loading state */
    .chart-container {
        position: relative;
    }

    .chart-loading {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #6b7280;
        font-size: 14px;
    }

    /* Custom Scrollbar */
    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #CBD5E1 #F1F5F9;
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #F1F5F9;
        border-radius: 3px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #CBD5E1;
        border-radius: 3px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94A3B8;
    }

    /* Floating action button */
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
    }

    .fab:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 30px rgba(59, 130, 246, 0.6);
    }

    /* Improved responsive grid */
    .responsive-grid {
        display: grid;
        gap: 1.5rem;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    }

    @media (min-width: 1024px) {
        .responsive-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Data visualization enhancements */
    .data-point {
        position: relative;
        overflow: hidden;
    }

    .data-point::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .data-point:hover::before {
        left: 100%;
    }

</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden min-h-[calc(100vh-8rem)] md:min-h-[calc(100vh-10rem)] flex items-center hero-gradient pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container for Anggaran -->
    <div id="particles-anggaran" class="absolute inset-0"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-chart-pie text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">TRANSPARANSI ANGGARAN</h2>
                            <p class="text-sm text-blue-100">{{ $districtName ?? 'Kecamatan Seluma Barat' }}</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Tranaparansi APBDes</span><br>
                        <span class="text-yellow-400 font-extrabold">{{ $villageName ?? 'Ketapang Baru' }}</span>
                    </h1>

                    <!-- Badge Data Terkini -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-coins mr-2 text-yellow-300 text-xs"></i>
                            Anggaran Tahun {{ $tahun }}
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        Transparansi lengkap <span class="font-semibold text-yellow-300">anggaran pendapatan, belanja, pagu earmark, dan program bantuan langsung tunai</span>
                        untuk mewujudkan akuntabilitas keuangan desa
                    </p>
                </div>

                <!-- Enhanced Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">Rp {{ number_format($totalPendapatan/1000000, 1) }}M</div>
                        <div class="text-sm text-blue-100 font-medium">Total Pendapatan</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-chart-line text-green-300 mr-1"></i>
                            <span>APBDes {{ $tahun }}</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">Rp {{ number_format($totalBelanja/1000000, 1) }}M</div>
                        <div class="text-sm text-blue-100 font-medium">Total Belanja</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-calculator text-blue-300 mr-1"></i>
                            <span>Realisasi {{ round(($totalBelanja / ($totalPendapatan ?: 1)) * 100, 1) }}%</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ $paguEarmarks->count() }}</div>
                        <div class="text-sm text-blue-100 font-medium">Program Aktif</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-users text-orange-300 mr-1"></i>
                            <span>Pagu Earmark</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ $bltDds->count() }}</div>
                        <div class="text-sm text-blue-100 font-medium">Penerima BLT</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-arrow-up text-green-300 mr-1"></i>
                            <span>Dana Desa</span>
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 relative z-10" data-aos="fade-up" data-aos-delay="800">
                    <a href="#stats" class="group bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-chart-pie mr-2 text-base"></i>
                            <span class="text-base">Lihat Detail Anggaran</span>
                        </div>
                    </a>
                    <a href="{{ route('home') }}" class="group bg-gradient-to-r from-yellow-400/20 to-orange-500/20 hover:from-yellow-400/30 hover:to-orange-500/30 backdrop-blur-md border-2 border-yellow-400/30 hover:border-yellow-400/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-home mr-2 text-base"></i>
                            <span class="text-base">Kembali ke Beranda</span>
                        </div>
                    </a>
                </div>

                <!-- Data Freshness Indicator -->
                <div class="flex items-center gap-2 text-sm text-blue-200" data-aos="fade-up" data-aos-delay="900">
                    <i class="fas fa-sync-alt text-green-300"></i>
                    <span>Data anggaran tahun {{ $tahun }} - Terkini & Terverifikasi</span>
                </div>

                <!-- Hidden Year Selector for functionality -->
                <select id="yearSelector" class="hidden">
                    @foreach($availableYears as $year)
                        <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Right Side - Anggaran Info Card -->
            <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                <!-- Enhanced Anggaran Summary Card -->
                <div class="info-card group relative bg-gradient-to-br from-white via-blue-50 to-indigo-100 backdrop-blur-sm border border-blue-200/50 rounded-3xl p-6 shadow-2xl overflow-hidden hover:shadow-3xl hover:scale-105 hover:border-blue-300/70 cursor-pointer" data-aos="fade-up" data-aos-delay="400">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-400 to-emerald-600 rounded-full -translate-y-16 translate-x-16 group-hover:scale-110 transition-transform duration-700"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-orange-400 to-red-500 rounded-full translate-y-12 -translate-x-12 group-hover:scale-110 transition-transform duration-700"></div>
                    </div>

                    <!-- Header Section -->
                    <div class="relative z-10 text-center mb-4">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl mb-3 shadow-lg group-hover:scale-110 group-hover:shadow-green-500/40 transition-all duration-300">
                            <i class="fas fa-coins text-white text-xl group-hover:text-green-100 transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-lg font-black text-gray-800 mb-1 bg-gradient-to-r from-green-600 to-emerald-700 bg-clip-text text-transparent">Ringkasan Anggaran</h3>
                        <p class="text-xs text-gray-600 font-medium">Tahun {{ $tahun }}</p>
                    </div>

                    <!-- Anggaran Grid - 2 Rows Layout -->
                    <div class="relative z-10 space-y-3 mb-4">
                        <!-- Row 1: 2 columns - Pendapatan & Belanja -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-green-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-center text-sm">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-green-500/30 transition-all duration-300">
                                        <i class="fas fa-arrow-up text-white text-sm"></i>
                                    </div>
                                    <div class="text-center">
                                        <p class="font-bold text-gray-800 text-lg">Rp {{ number_format($totalPendapatan/1000000, 1) }}M</p>
                                        <p class="text-gray-600 text-sm">Pendapatan</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-red-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-center text-sm">
                                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-red-500/30 transition-all duration-300">
                                        <i class="fas fa-arrow-down text-white text-sm"></i>
                                    </div>
                                    <div class="text-center">
                                        <p class="font-bold text-gray-800 text-lg">Rp {{ number_format($totalBelanja/1000000, 1) }}M</p>
                                        <p class="text-gray-600 text-sm">Belanja</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 2: 1 column full width - Program & Penerima -->
                        <div class="grid grid-cols-1 gap-3">
                            <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-blue-500/30 transition-all duration-300">
                                            <i class="fas fa-clipboard-list text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800 text-lg">{{ $paguEarmarks->count() }} Program</p>
                                            <p class="text-gray-600 text-sm">Pagu Earmark</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-orange-500/30 transition-all duration-300">
                                            <i class="fas fa-users text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800 text-lg">{{ $bltDds->count() }} Penerima</p>
                                            <p class="text-gray-600 text-sm">BLT Dana Desa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Preview Section -->
                    <div class="relative z-10 bg-gradient-to-br from-gray-900 via-green-900 to-emerald-900 rounded-2xl p-4 shadow-xl group-hover:shadow-2xl group-hover:from-gray-800 group-hover:via-green-800 group-hover:to-emerald-800 transition-all duration-500">
                        <div class="text-center mb-3">
                            <div class="inline-flex items-center justify-center space-x-2 text-white/90 text-xs font-semibold mb-2">
                                <i class="fas fa-chart-pie text-yellow-400"></i>
                                <span>Visualisasi Anggaran</span>
                            </div>
                        </div>

                        <!-- Chart Preview -->
                        <div class="flex flex-col items-center space-y-3">
                            <div class="relative group-hover:scale-110 transition-transform duration-500">
                                <!-- Chart Glow Effect -->
                                <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/30 to-orange-500/30 rounded-2xl blur-lg group-hover:from-yellow-400/50 group-hover:to-orange-500/50 transition-all duration-500"></div>
                                <div class="relative bg-white p-4 rounded-2xl shadow-2xl border-2 border-white/20 group-hover:shadow-3xl group-hover:border-white/40 transition-all duration-500">
                                    <div class="text-center">
                                        <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                                            <i class="fas fa-chart-pie text-white text-xl"></i>
                                        </div>
                                        <h4 class="font-bold text-gray-800 text-sm mb-1">Grafik Anggaran</h4>
                                        <p class="text-xs text-gray-600">Transparansi Keuangan</p>
                                    </div>
                                </div>
                                <!-- Corner Decorations -->
                                <div class="absolute -top-1 -left-1 w-4 h-4 border-l-2 border-t-2 border-yellow-400 rounded-tl-lg"></div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 border-r-2 border-t-2 border-yellow-400 rounded-tr-lg"></div>
                                <div class="absolute -bottom-1 -left-1 w-4 h-4 border-l-2 border-b-2 border-yellow-400 rounded-bl-lg"></div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 border-r-2 border-b-2 border-yellow-400 rounded-br-lg"></div>
                            </div>

                            <div class="text-center">
                                <div class="flex items-center justify-center space-x-2 mb-1">
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse group-hover:bg-yellow-300 transition-colors duration-300"></div>
                                    <p class="text-sm text-white font-bold group-hover:text-yellow-100 transition-colors duration-300">Scroll untuk Lihat</p>
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse group-hover:bg-yellow-300 transition-colors duration-300" style="animation-delay: 0.5s;"></div>
                                </div>
                                <p class="text-xs text-gray-300">Grafik APBDes • Pagu Earmark • BLT-DD</p>
                            </div>
                        </div>

                        <!-- Action Badge -->
                        <div class="flex justify-center mt-3">
                            <div class="inline-flex items-center bg-gradient-to-r from-yellow-500/20 to-orange-500/20 backdrop-blur-sm border border-yellow-400/30 rounded-full px-3 py-1 group-hover:from-yellow-500/30 group-hover:to-orange-500/30 group-hover:border-yellow-300/50 transition-all duration-300">
                                <i class="fas fa-arrow-down text-yellow-400 text-xs mr-2 group-hover:text-yellow-300 transition-colors duration-300"></i>
                                <span class="text-xs text-yellow-100 font-medium group-hover:text-white transition-colors duration-300">Lihat Detail Grafik</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section id="stats" class="py-20 relative">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <!-- Badge -->
            <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg mb-6">
                <i class="fas fa-chart-line mr-2 text-yellow-300"></i>
                Data Anggaran Tahun {{ $tahun }}
            </div>

            <h2 class="section-title">
                <span class="text-blue-600">Ringkasan</span> Keuangan Desa
            </h2>
            <div class="section-title-underline"></div>
            <p class="section-subtitle">
                <span class="font-semibold text-slate-700">Transparansi lengkap</span> <span class="font-semibold text-blue-600">anggaran pendapatan, belanja, pagu earmark,</span>
                dan program bantuan langsung tunai untuk mewujudkan <span class="font-semibold text-blue-700">akuntabilitas keuangan desa</span>
            </p>
        </div>

        <!-- Main Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            <!-- Total Pendapatan -->
            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #10b981, #065f46);">
                    <i class="fas fa-arrow-trend-up"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Total Pendapatan</h3>
                <p class="text-3xl font-bold text-green-600 mb-2" id="totalPendapatan">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </p>
                <p class="text-sm text-gray-500">{{ $pendapatan->count() }} item anggaran</p>
            </div>

            <!-- Total Belanja -->
            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #ef4444, #991b1b);">
                    <i class="fas fa-arrow-trend-down"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Total Belanja</h3>
                <p class="text-3xl font-bold text-red-600 mb-2" id="totalBelanja">
                    Rp {{ number_format($totalBelanja, 0, ',', '.') }}
                </p>
                <p class="text-sm text-gray-500">{{ $belanja->count() }} item anggaran</p>
            </div>

            <!-- Surplus/Defisit -->
            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, {{ $surplus >= 0 ? '#3b82f6, #1e40af' : '#f59e0b, #d97706' }});">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">
                    {{ $surplus >= 0 ? 'Surplus' : 'Defisit' }}
                </h3>
                <p class="text-3xl font-bold {{ $surplus >= 0 ? 'text-blue-600' : 'text-orange-600' }} mb-2" id="surplusDefisit">
                    Rp {{ number_format(abs($surplus), 0, ',', '.') }}
                </p>
                <p class="text-sm text-gray-500">Selisih Pendapatan - Belanja</p>
            </div>

            <!-- Total Penerima BLT-DD -->
            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #8b5cf6, #5b21b6);">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Penerima BLT-DD</h3>
                <p class="text-3xl font-bold text-purple-600 mb-2" id="totalPenerima">
                    {{ number_format($totalPenerimaBlt, 0, ',', '.') }}
                </p>
                <p class="text-sm text-gray-500">
                    Total bantuan: Rp {{ number_format($totalBantuanBlt, 0, ',', '.') }}
                </p>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <!-- APBDes Chart -->
            <div class="chart-container" data-aos="fade-right">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                    <i class="fas fa-chart-pie mr-3 text-blue-600"></i>
                    Komposisi APBDes
                </h3>
                <div style="position: relative; height: 300px;">
                    <canvas id="apbdesChart"></canvas>
                </div>
            </div>

            <!-- Pagu Earmark Chart -->
            <div class="chart-container" data-aos="fade-left">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                    <i class="fas fa-chart-bar mr-3 text-green-600"></i>
                    Top 10 Pagu Earmark
                </h3>
                <div style="position: relative; height: 300px;">
                    <canvas id="paguChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- APBDes Detail Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-title">Detail APBDes {{ $tahun }}</h2>
            <div class="section-title-underline"></div>
            <p class="text-lg text-gray-600">
                Rincian lengkap Anggaran Pendapatan dan Belanja Desa
            </p>
        </div>

        <!-- Filter Buttons -->
        <div class="text-center mb-12" data-aos="fade-up" data-aos-delay="100">
            <div class="inline-flex gap-4 p-2 bg-white rounded-full shadow-lg">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="pendapatan">Pendapatan</button>
                <button class="filter-btn" data-filter="belanja">Belanja</button>
            </div>
        </div>

        <!-- APBDes Tables -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Pendapatan Table -->
            <div class="data-table" data-aos="fade-right" data-category="pendapatan">
                <div class="bg-gradient-to-r from-green-600 to-green-700 p-6">
                    <h3 class="text-2xl font-bold text-white flex items-center">
                        <i class="fas fa-arrow-up mr-3"></i>
                        Pendapatan Desa
                    </h3>
                    <p class="text-green-100 mt-2">Total: Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left">No</th>
                                <th class="px-6 py-4 text-left">Keterangan</th>
                                <th class="px-6 py-4 text-right">Anggaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendapatan as $index => $item)
                                <tr>
                                    <td class="px-6 py-4 font-semibold text-gray-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800">{{ $item->keterangan }}</div>
                                        @if($item->keterangan_detail)
                                            <div class="text-sm text-gray-500 mt-1">{{ Str::limit($item->keterangan_detail, 50) }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right font-bold text-green-600">
                                        {{ $item->formatted_anggaran }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                                        Belum ada data pendapatan untuk tahun {{ $tahun }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Belanja Table -->
            <div class="data-table" data-aos="fade-left" data-category="belanja">
                <div class="bg-gradient-to-r from-red-600 to-red-700 p-6">
                    <h3 class="text-2xl font-bold text-white flex items-center">
                        <i class="fas fa-arrow-down mr-3"></i>
                        Belanja Desa
                    </h3>
                    <p class="text-red-100 mt-2">Total: Rp {{ number_format($totalBelanja, 0, ',', '.') }}</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-red-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left">No</th>
                                <th class="px-6 py-4 text-left">Keterangan</th>
                                <th class="px-6 py-4 text-right">Anggaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($belanja as $index => $item)
                                <tr>
                                    <td class="px-6 py-4 font-semibold text-gray-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800">{{ $item->keterangan }}</div>
                                        @if($item->keterangan_detail)
                                            <div class="text-sm text-gray-500 mt-1">{{ Str::limit($item->keterangan_detail, 50) }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right font-bold text-red-600">
                                        {{ $item->formatted_anggaran }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                                        Belum ada data belanja untuk tahun {{ $tahun }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pagu Earmark Section -->
@if($paguEarmarks->isNotEmpty())
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-title">Pagu Earmark {{ $tahun }}</h2>
            <div class="section-title-underline"></div>
            <p class="text-lg text-gray-600">
                Anggaran yang ditentukan penggunaannya untuk kegiatan spesifik
            </p>
        </div>

        <div class="data-table max-w-6xl mx-auto" data-aos="fade-up">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6">
                <h3 class="text-2xl font-bold text-white flex items-center">
                    <i class="fas fa-tasks mr-3"></i>
                    Daftar Kegiatan Pagu Earmark
                </h3>
                <p class="text-blue-100 mt-2">Total Pagu: Rp {{ number_format($paguEarmarks->sum('jumlah_pagu'), 0, ',', '.') }}</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-center">No</th>
                            <th class="px-6 py-4 text-left">Kegiatan</th>
                            <th class="px-6 py-4 text-center">Satuan</th>
                            <th class="px-6 py-4 text-right">Jumlah Pagu</th>
                            <th class="px-6 py-4 text-left">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paguEarmarks as $index => $pagu)
                            <tr>
                                <td class="px-6 py-4 text-center font-semibold text-gray-600">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-800">{{ $pagu->kegiatan }}</td>
                                <td class="px-6 py-4 text-center text-gray-600">{{ $pagu->satuan }}</td>
                                <td class="px-6 py-4 text-right font-bold text-blue-600">
                                    {{ $pagu->formatted_jumlah_pagu }}
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    {{ $pagu->keterangan ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endif

<!-- BLT-DD Section -->
@if($bltDds->isNotEmpty())
<section class="py-20 bg-gradient-to-br from-purple-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-title">Bantuan Langsung Tunai Desa {{ $tahun }}</h2>
            <div class="section-title-underline"></div>
            <p class="text-lg text-gray-600">
                Daftar penerima BLT-DD dan informasi demografinya
            </p>
        </div>

        <!-- BLT Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #8b5cf6, #5b21b6);">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Total Penerima</h3>
                <p class="text-2xl font-bold text-purple-600">{{ $totalPenerimaBlt }}</p>
            </div>

            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #ec4899, #be185d);">
                    <i class="fas fa-venus"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Perempuan</h3>
                <p class="text-2xl font-bold text-pink-600">{{ $bltDds->where('jenis_kelamin', 'P')->count() }}</p>
            </div>

            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #06b6d4, #0891b2);">
                    <i class="fas fa-mars"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Laki-laki</h3>
                <p class="text-2xl font-bold text-cyan-600">{{ $bltDds->where('jenis_kelamin', 'L')->count() }}</p>
            </div>
        </div>

        <div class="data-table" data-aos="fade-up">
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 p-6">
                <h3 class="text-2xl font-bold text-white flex items-center">
                    <i class="fas fa-hand-holding-usd mr-3"></i>
                    Daftar Penerima BLT-DD
                </h3>
                <p class="text-purple-100 mt-2">Total Bantuan: Rp {{ number_format($totalBantuanBlt, 0, ',', '.') }}</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-center">No</th>
                            <th class="px-6 py-4 text-left">Nama</th>
                            <th class="px-6 py-4 text-center">L/P</th>
                            <th class="px-6 py-4 text-left">NIK</th>
                            <th class="px-6 py-4 text-left">Alamat</th>
                            <th class="px-6 py-4 text-left">No. Rekening</th>
                            <th class="px-6 py-4 text-right">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bltDds->take(50) as $index => $blt)
                            <tr>
                                <td class="px-6 py-4 text-center font-semibold text-gray-600">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-800">{{ $blt->nama }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                        {{ $blt->jenis_kelamin === 'P' ? 'bg-pink-100 text-pink-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ $blt->jenis_kelamin }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600 font-mono">{{ $blt->nik }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ Str::limit($blt->alamat, 30) }}</td>
                                <td class="px-6 py-4 text-gray-600 font-mono">{{ $blt->no_rekening ?? '-' }}</td>
                                <td class="px-6 py-4 text-right font-bold text-purple-600">
                                    {{ $blt->formatted_nominal_bantuan }}
                                </td>
                            </tr>
                        @endforeach

                        @if($bltDds->count() > 50)
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500 font-semibold">
                                    ... dan {{ $bltDds->count() - 50 }} penerima lainnya
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Call to Action Section -->
<section class="py-20 bg-gradient-to-br from-blue-600 to-blue-800 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center text-white" data-aos="fade-up">
            <h2 class="section-title text-white">Transparansi dan Akuntabilitas</h2>
            <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto">
                Kami berkomitmen untuk menjaga transparansi dalam pengelolaan keuangan desa.
                Semua data anggaran dapat diakses publik sebagai bentuk akuntabilitas kepada masyarakat.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('kontak') }}" class="inline-flex items-center justify-center px-8 py-3 bg-white text-blue-600 font-semibold rounded-full hover:bg-gray-100 transition-all duration-300">
                    <i class="fas fa-phone mr-2"></i>
                    Hubungi Kami
                </a>
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-8 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-blue-600 transition-all duration-300">
                    <i class="fas fa-home mr-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        mirror: false
    });

    // Check if Chart.js is loaded
    if (typeof Chart === 'undefined') {
        console.error('Chart.js is not loaded. Please check your internet connection.');
        // Show fallback message to user
        const charts = document.querySelectorAll('.chart-container');
        charts.forEach(container => {
            container.innerHTML = '<div class="text-center p-8"><p class="text-gray-500">Grafik tidak dapat dimuat. Silakan refresh halaman.</p></div>';
        });
        return;
    }

    try {
        // Chart data from backend
        const chartData = @json($chartData);

        // APBDes Pie Chart
        const apbdesCtx = document.getElementById('apbdesChart').getContext('2d');
        new Chart(apbdesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Pendapatan', 'Belanja'],
            datasets: [{
                data: [
                    chartData.apbdes.pendapatan || 0,
                    chartData.apbdes.belanja || 0
                ],
                backgroundColor: [
                    '#10b981',
                    '#ef4444'
                ],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        font: {
                            size: 14,
                            weight: 'bold'
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const value = context.parsed;
                            const formatted = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }).format(value);
                            return context.label + ': ' + formatted;
                        }
                    }
                }
            }
        }
    });

    // Pagu Earmark Bar Chart
    const paguCtx = document.getElementById('paguChart').getContext('2d');
    new Chart(paguCtx, {
        type: 'bar',
        data: {
            labels: chartData.pagu.map(item => item.kegiatan.substring(0, 20) + (item.kegiatan.length > 20 ? '...' : '')),
            datasets: [{
                label: 'Pagu (Rp)',
                data: chartData.pagu.map(item => item.pagu),
                backgroundColor: 'rgba(34, 197, 94, 0.8)',
                borderColor: 'rgba(34, 197, 94, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }).format(value);
                        }
                    }
                },
                x: {
                    ticks: {
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const value = context.parsed.y;
                            const formatted = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }).format(value);
                            return 'Pagu: ' + formatted;
                        }
                    }
                }
            }
        }
    });

    } catch (error) {
        console.error('Error initializing charts:', error);
        const charts = document.querySelectorAll('.chart-container');
        charts.forEach(container => {
            container.innerHTML = '<div class="text-center p-8"><p class="text-red-500">Terjadi kesalahan saat memuat grafik.</p></div>';
        });
    }

    // Year selector change handler
    document.getElementById('yearSelector').addEventListener('change', function() {
        const selectedYear = this.value;
        window.location.href = `{{ route('anggaran') }}?tahun=${selectedYear}`;
    });

    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const tables = document.querySelectorAll('[data-category]');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;

            // Update active button
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            // Show/hide tables
            tables.forEach(table => {
                if (filter === 'all') {
                    table.style.display = 'block';
                } else {
                    table.style.display = table.dataset.category === filter ? 'block' : 'none';
                }
            });
        });
    });

    // Animate numbers on scroll
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                if (target.id === 'totalPendapatan' || target.id === 'totalBelanja' || target.id === 'surplusDefisit' || target.id === 'totalPenerima') {
                    animateNumber(target);
                }
            }
        });
    }, observerOptions);

    ['totalPendapatan', 'totalBelanja', 'surplusDefisit', 'totalPenerima'].forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            observer.observe(element);
        }
    });

    function animateNumber(element) {
        const text = element.textContent.replace(/[^\d]/g, '');
        const target = parseInt(text);
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }

            const formatted = new Intl.NumberFormat('id-ID').format(Math.floor(current));
            if (element.id === 'totalPenerima') {
                element.textContent = formatted;
            } else {
                element.textContent = 'Rp ' + formatted;
            }
        }, 16);
    }

    // Initialize Particles.js - SAME AS STATISTIK
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-anggaran', {
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
                        "distance": 140,
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
});
</script>

<!-- Particles.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
@endpush
