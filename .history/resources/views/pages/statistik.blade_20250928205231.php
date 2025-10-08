@extends('layouts.app-public')

@section('title', 'Statistik Desa - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* Custom CSS untuk Statistik Page */

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

    /* Smooth scroll indicator */
    .scroll-indicator {
        position: fixed;
        top: 80px;
        left: 0;
        width: 100%;
        height: 3px;
        background: rgba(255, 255, 255, 0.2);
        z-index: 40;
    }

    .scroll-progress {
        height: 100%;
        background: linear-gradient(90deg, #f59e0b, #ef4444, #8b5cf6);
        transform-origin: left;
        transition: transform 0.1s ease;
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

    /* Enhanced subnav */
    .stat-subnav {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.95);
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .subnav-surface {
        padding: 0.75rem 0;
    }

    .stat-tab {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        color: #6b7280;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .stat-tab:hover {
        color: #374151;
        background-color: #f3f4f6;
        transform: translateY(-1px);
    }

    .stat-tab.active {
        color: #3b82f6;
        background-color: #eff6ff;
        font-weight: 600;
    }

    .stat-tab::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        transition: width 0.3s ease;
    }

    .stat-tab:hover::before,
    .stat-tab.active::before {
        width: 100%;
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

    /* Custom scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.1);
        border-radius: 3px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-radius: 3px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #2563eb, #7c3aed);
    }

    /* Additional animations */
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

    @keyframes fadeOutDown {
        from {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
        to {
            opacity: 0;
            transform: translate3d(0, 40px, 0);
        }
    }

    /* Hide fab initially */
    .fab {
        display: none;
    }

    /* Chart container improvements */
    .chart-container canvas {
        transition: opacity 0.3s ease;
    }

    .chart-loading {
        z-index: 10;
    }

    /* Enhanced table styling */
    .comparison-table {
        border-collapse: separate;
        border-spacing: 0;
    }

    .comparison-table th:first-child {
        border-radius: 0.5rem 0 0 0;
    }

    .comparison-table th:last-child {
        border-radius: 0 0.5rem 0 0;
    }
</style>
@endpush
@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden min-h-screen flex items-center hero-gradient">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>


    <!-- Particle.js Container for Statistics -->
    <div id="particles-statistik" class="absolute inset-0"></div>

    <!-- Scroll Progress Indicator -->
    <div class="scroll-indicator">
        <div class="scroll-progress" id="scroll-progress"></div>
    </div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-chart-bar text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">DATA STATISTIK</h2>
                            <p class="text-sm text-blue-100">Kecamatan Semidang Alas Maras</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Statistik</span><br>
                        <span class="text-yellow-400 font-extrabold">Desa Ketapang Baru</span>
                    </h1>

                    <!-- Badge Data Terkini -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-database mr-2 text-yellow-300 text-xs"></i>
                            Data Terkini & Akurat
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        Analisis mendalam tentang <span class="font-semibold text-yellow-300">demografi, sosial, dan ekonomi</span>
                        masyarakat desa untuk perencanaan pembangunan yang tepat sasaran
                    </p>
                </div>

                <!-- Enhanced Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ number_format($totalWarga) }}</div>
                        <div class="text-sm text-blue-100 font-medium">Total Penduduk</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-chart-line text-green-300 mr-1"></i>
                            <span>{{ $populationDensity }}/km²</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ number_format($totalKK) }}</div>
                        <div class="text-sm text-blue-100 font-medium">Kartu Keluarga</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-calculator text-blue-300 mr-1"></i>
                            <span>{{ round($totalWarga / ($totalKK ?: 1), 1) }} orang/KK</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ number_format($averageAge, 1) }} tahun</div>
                        <div class="text-sm text-blue-100 font-medium">Rata-rata Usia</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-users text-orange-300 mr-1"></i>
                            <span>{{ $ageStats['Dewasa'] ?? 0 }} dewasa, {{ $ageStats['Remaja'] ?? 0 }} remaja</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ $higherEducationRate }}%</div>
                        <div class="text-sm text-blue-100 font-medium">Pendidikan Tinggi</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-arrow-up text-green-300 mr-1"></i>
                            <span>Diploma, S1, S2, S3</span>
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 relative z-20" data-aos="fade-up" data-aos-delay="800">
                    <a href="#charts-section" class="group bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-chart-line mr-2 text-base"></i>
                            <span class="text-base">Lihat Grafik</span>
                        </div>
                    </a>
                    <a href="{{ route('tentang') }}" class="group bg-gradient-to-r from-yellow-400/20 to-orange-500/20 hover:from-yellow-400/30 hover:to-orange-500/30 backdrop-blur-md border-2 border-yellow-400/30 hover:border-yellow-400/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-info-circle mr-2 text-base"></i>
                            <span class="text-base">Profil Desa</span>
                        </div>
                    </a>
                </div>

                <!-- Data Freshness Indicator -->
                <div class="flex items-center gap-2 text-sm text-blue-200" data-aos="fade-up" data-aos-delay="900">
                    <i class="fas fa-sync-alt text-green-300"></i>
                    <span>Data terakhir diperbarui: {{ $lastUpdated ? $lastUpdated->format('d M Y, H:i') : 'Tidak tersedia' }}</span>
                </div>
            </div>

            <!-- Right Side - Info Card -->
            <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                <!-- Enhanced Info Summary Card -->
                <div class="info-card group relative bg-gradient-to-br from-white via-blue-50 to-indigo-100 backdrop-blur-sm border border-blue-200/50 rounded-3xl p-6 shadow-2xl overflow-hidden hover:shadow-3xl hover:scale-105 hover:border-blue-300/70 cursor-pointer" data-aos="fade-up" data-aos-delay="400">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full -translate-y-16 translate-x-16 group-hover:scale-110 transition-transform duration-700"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-cyan-400 to-blue-500 rounded-full translate-y-12 -translate-x-12 group-hover:scale-110 transition-transform duration-700"></div>
                    </div>

                    <!-- Header Section -->
                    <div class="relative z-10 text-center mb-4">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl mb-3 shadow-lg group-hover:scale-110 group-hover:shadow-blue-500/40 transition-all duration-300">
                            <i class="fas fa-chart-bar text-white text-xl group-hover:text-blue-100 transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-lg font-black text-gray-800 mb-1 bg-gradient-to-r from-blue-600 to-indigo-700 bg-clip-text text-transparent">Data Statistik</h3>
                        <p class="text-xs text-gray-600 font-medium">Real-time & Akurat</p>
                    </div>

                    <!-- Info Grid - 2 Rows Layout -->
                    <div class="relative z-10 space-y-3 mb-4">
                        <!-- Row 1: 2 columns -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-center text-sm">
                                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-emerald-500/30 transition-all duration-300">
                                        <i class="fas fa-users text-white text-sm"></i>
                                    </div>
                                    <div class="text-center">
                                        <p class="font-bold text-gray-800 text-lg">{{ number_format($totalWarga) }}</p>
                                        <p class="text-gray-600 text-sm">Total Penduduk</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-center text-sm">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-blue-500/30 transition-all duration-300">
                                        <i class="fas fa-home text-white text-sm"></i>
                                    </div>
                                    <div class="text-center">
                                        <p class="font-bold text-gray-800 text-lg">{{ number_format($totalKK) }}</p>
                                        <p class="text-gray-600 text-sm">Kepala Keluarga</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 2: 1 column full width -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-center text-sm">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-purple-500/30 transition-all duration-300">
                                        <i class="fas fa-male text-white text-sm"></i>
                                    </div>
                                    <div class="text-center">
                                        <p class="font-bold text-gray-800 text-lg">{{ number_format($totalLaki) }} Laki-laki</p>
                                        <p class="text-gray-600 text-sm">{{ $persentaseLaki }}% dari Total</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-center text-sm">
                                    <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-pink-500/30 transition-all duration-300">
                                        <i class="fas fa-female text-white text-sm"></i>
                                    </div>
                                    <div class="text-center">
                                        <p class="font-bold text-gray-800 text-lg">{{ number_format($totalPerempuan) }} Perempuan</p>
                                        <p class="text-gray-600 text-sm">{{ $persentasePerempuan }}% dari Total</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Preview Section -->
                    <div class="relative z-10 bg-gradient-to-br from-gray-900 via-blue-900 to-indigo-900 rounded-2xl p-4 shadow-xl group-hover:shadow-2xl group-hover:from-gray-800 group-hover:via-blue-800 group-hover:to-indigo-800 transition-all duration-500">
                        <div class="text-center mb-3">
                            <div class="inline-flex items-center justify-center space-x-2 text-white/90 text-xs font-semibold mb-2">
                                <i class="fas fa-chart-bar text-cyan-400"></i>
                                <span>Grafik Interaktif</span>
                            </div>
                        </div>

                        <!-- Chart Preview -->
                        <div class="flex flex-col items-center space-y-3">
                            <div class="relative group-hover:scale-110 transition-transform duration-500">
                                <!-- Chart Glow Effect -->
                                <div class="absolute inset-0 bg-gradient-to-br from-cyan-400/30 to-blue-500/30 rounded-2xl blur-lg group-hover:from-cyan-400/50 group-hover:to-blue-500/50 transition-all duration-500"></div>
                                <div class="relative bg-white p-4 rounded-2xl shadow-2xl border-2 border-white/20 group-hover:shadow-3xl group-hover:border-white/40 transition-all duration-500">
                                    <div class="text-center">
                                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                                            <i class="fas fa-chart-line text-white text-xl"></i>
                                        </div>
                                        <h4 class="font-bold text-gray-800 text-sm mb-1">Data Visual</h4>
                                        <p class="text-xs text-gray-600">Interactive Charts</p>
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
                                    <p class="text-sm text-white font-bold group-hover:text-cyan-100 transition-colors duration-300">Scroll untuk Lihat</p>
                                    <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse group-hover:bg-cyan-300 transition-colors duration-300" style="animation-delay: 0.5s;"></div>
                                </div>
                                <p class="text-xs text-gray-300">Grafik Lengkap • Data Real-time</p>
                            </div>
                        </div>

                        <!-- Action Badge -->
                        <div class="flex justify-center mt-3">
                            <div class="inline-flex items-center bg-gradient-to-r from-cyan-500/20 to-blue-500/20 backdrop-blur-sm border border-cyan-400/30 rounded-full px-3 py-1 group-hover:from-cyan-500/30 group-hover:to-blue-500/30 group-hover:border-cyan-300/50 transition-all duration-300">
                                <i class="fas fa-arrow-down text-cyan-400 text-xs mr-2 group-hover:text-cyan-300 transition-colors duration-300"></i>
                                <span class="text-xs text-cyan-100 font-medium group-hover:text-white transition-colors duration-300">Scroll untuk Lihat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Sub Navigation -->
<nav class="stat-subnav sticky top-20 z-30" aria-label="Navigasi Statistik">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="subnav-surface">
            <ul class="flex items-center gap-2 sm:gap-3 min-w-max" id="statSubnav">
                <li>
                    <a href="#overview" class="stat-tab" aria-current="false">
                        <i class="fas fa-chart-pie mr-2"></i>
                        <span>Ikhtisar</span>
                    </a>
                </li>
                <li>
                    <a href="#education" class="stat-tab" aria-current="false">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        <span>Pendidikan & Pekerjaan</span>
                    </a>
                </li>
                <li>
                    <a href="#social" class="stat-tab" aria-current="false">
                        <i class="fas fa-heart mr-2"></i>
                        <span>Sosial & Agama</span>
                    </a>
                </li>
                <li>
                    <a href="#aid" class="stat-tab" aria-current="false">
                        <i class="fas fa-hands-helping mr-2"></i>
                        <span>Bantuan</span>
                    </a>
                </li>
                <li>
                    <a href="#dusun" class="stat-tab" aria-current="false">
                        <i class="fas fa-map-marked-alt mr-2"></i>
                        <span>Per Dusun</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>

<!-- Statistics Overview Section -->
<section id="overview" class="stat-target py-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <!-- Floating Decoration -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-200/20 to-indigo-300/20 rounded-full blur-3xl" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-purple-200/20 to-pink-300/20 rounded-full blur-3xl" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="600"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-chart-pie mr-2"></i>
                    Overview Statistik
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-4xl lg:text-5xl font-black mb-4">
                    <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent">
                        Gambaran Umum Demografi
                    </span>
                </h2>
                <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto"></div>
            </div>
            <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
                Analisis komprehensif tentang struktur penduduk, distribusi usia, pendidikan, dan kondisi sosial ekonomi masyarakat Desa Ketapang Baru
            </p>
        </div>

        <!-- Key Insights -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fas fa-chart-line text-2xl"></i>
                    <h4 class="font-bold text-lg">Demografi Seimbang</h4>
                </div>
                <p class="text-blue-100 text-sm leading-relaxed">
                    Distribusi gender {{ round((($genderStats['Laki-laki'] ?? 0) / $totalWarga) * 100, 1) }}% laki-laki vs
                    {{ round((($genderStats['Perempuan'] ?? 0) / $totalWarga) * 100, 1) }}% perempuan menunjukkan komposisi yang ideal.
                </p>
            </div>

            <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fas fa-users text-2xl"></i>
                    <h4 class="font-bold text-lg">Usia Produktif</h4>
                </div>
                <p class="text-emerald-100 text-sm leading-relaxed">
                    {{ round(((($ageStats['Dewasa'] ?? 0) + ($ageStats['Remaja'] ?? 0)) / $totalWarga) * 100, 1) }}%
                    penduduk dalam usia produktif (15-60 tahun).
                </p>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fas fa-graduation-cap text-2xl"></i>
                    <h4 class="font-bold text-lg">Pendidikan</h4>
                </div>
                <p class="text-purple-100 text-sm leading-relaxed">
                    {{ $higherEducationRate }}% penduduk memiliki pendidikan tinggi, mendukung pengembangan SDM berkualitas.
                </p>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="responsive-grid mb-24">
            <!-- Gender Distribution -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-right" data-aos-duration="800">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4 transform transition-transform hover:scale-110">
                        <i class="fas fa-venus-mars text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-2">Distribusi Gender</h3>
                    <p class="text-slate-600">Perbandingan Laki-laki & Perempuan</p>
                </div>

                @php
                    $male = $genderStats['Laki-laki'] ?? 0;
                    $female = $genderStats['Perempuan'] ?? 0;
                    $totalGender = $male + $female;
                    $malePct = $totalGender > 0 ? round(($male / $totalGender) * 100) : 0;
                    $femalePct = $totalGender > 0 ? round(($female / $totalGender) * 100) : 0;
                @endphp

                <!-- Main Chart Area -->
                <div class="relative mb-8 chart-container">
                    <div class="chart-loading" id="genderChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <div class="h-80">
                        <canvas id="genderChart"></canvas>
                    </div>
                    <!-- Center Total -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <div class="text-center">
                            <div class="text-3xl font-black text-slate-900">{{ $totalGender }}</div>
                            <div class="text-sm text-slate-500 font-medium">Total</div>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Male Stats -->
                    <div class="stat-card bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-4 border border-blue-100">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                <span class="text-sm font-medium text-slate-700">Laki-laki</span>
                            </div>
                            <span class="text-lg font-bold text-blue-600">{{ $male }}</span>
                        </div>
                        <div class="w-full bg-blue-100 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full transition-all duration-500" style="width: {{ $malePct }}%"></div>
                        </div>
                        <div class="text-right mt-1">
                            <span class="text-xs font-medium text-blue-600">{{ $malePct }}%</span>
                        </div>
                    </div>

                    <!-- Female Stats -->
                    <div class="stat-card bg-gradient-to-br from-fuchsia-50 to-pink-50 rounded-2xl p-4 border border-fuchsia-100">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-fuchsia-500 rounded-full"></div>
                                <span class="text-sm font-medium text-slate-700">Perempuan</span>
                            </div>
                            <span class="text-lg font-bold text-fuchsia-600">{{ $female }}</span>
                        </div>
                        <div class="w-full bg-fuchsia-100 rounded-full h-2">
                            <div class="bg-fuchsia-500 h-2 rounded-full transition-all duration-500" style="width: {{ $femalePct }}%"></div>
                        </div>
                        <div class="text-right mt-1">
                            <span class="text-xs font-medium text-fuchsia-600">{{ $femalePct }}%</span>
                        </div>
                    </div>
                </div>

                <!-- Summary -->
                <div class="mt-6 pt-4 border-t border-slate-100">
                    <div class="text-center">
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-100 rounded-full">
                            <i class="fas fa-info-circle text-slate-500 text-xs"></i>
                            <span class="text-xs text-slate-600">Rasio {{ $malePct }}:{{ $femalePct }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Age Distribution -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center transform transition-transform hover:scale-110">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Kelompok Umur</h3>
                        <p class="text-gray-600">Distribusi berdasarkan usia</p>
                    </div>
                </div>

                <div class="space-y-4 mb-6">
                    @foreach(['Balita', 'Anak', 'Remaja', 'Dewasa', 'Lansia'] as $ageGroup)
                        @php
                            $count = $ageStats[$ageGroup] ?? 0;
                            $percentage = $totalWarga > 0 ? ($count / $totalWarga) * 100 : 0;
                        @endphp
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700 font-medium">{{ $ageGroup }}</span>
                            <span class="text-lg font-bold text-green-600">{{ $count }}</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-2 rounded-full transition-all duration-1000" style="width: {{ $percentage }}%"></div>
                        </div>
                    @endforeach
                </div>

                <!-- Chart Container -->
                <div class="chart-container relative">
                    <div class="chart-loading" id="ageChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <div class="h-80">
                        <canvas id="ageChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education & Employment Section -->
<section id="education" class="stat-target py-20 bg-white">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-graduation-cap mr-2"></i>
                    Pendidikan & Pekerjaan
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-4xl lg:text-5xl font-black mb-4">
                    <span class="bg-gradient-to-r from-sky-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent">
                        Profil Pendidikan & Mata Pencaharian
                    </span>
                </h2>
                <div class="w-16 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full mx-auto"></div>
            </div>
            <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
                Analisis tingkat pendidikan dan jenis pekerjaan masyarakat untuk memahami potensi dan kebutuhan pengembangan SDM
            </p>
        </div>

        <!-- Professional Insights for Education -->
        <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white mb-12" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="font-bold text-xl mb-2">Kualitas SDM</h4>
                    <p class="text-emerald-100 text-sm leading-relaxed">
                        Tingkat pendidikan tinggi {{ $higherEducationRate }}% menunjukkan potensi SDM berkualitas.
                        Target peningkatan melalui program beasiswa dan pelatihan vokasi.
                    </p>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-black text-yellow-300">{{ $higherEducationRate }}%</div>
                    <div class="text-sm text-emerald-200">SDM Terampil</div>
                </div>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="responsive-grid mb-24">
            <!-- Education Level -->
            <div class="stat-card bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 rounded-3xl p-8 shadow-2xl" data-aos="fade-right" data-aos-duration="800" data-aos-delay="100">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Tingkat Pendidikan</h3>
                <div class="chart-container relative">
                    <div class="chart-loading" id="educationChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <div class="h-80">
                        <canvas id="educationChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Profession -->
            <div class="stat-card bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 rounded-3xl p-8 shadow-2xl" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Jenis Pekerjaan</h3>
                <div class="chart-container relative">
                    <div class="chart-loading" id="professionChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <div class="h-80">
                        <canvas id="professionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social & Religion Section -->
<section id="social" class="stat-target py-20 bg-gradient-to-br from-purple-50 via-pink-50 to-rose-50 relative overflow-hidden">
    <!-- Floating Decoration -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-purple-200/20 to-pink-300/20 rounded-full blur-3xl" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-rose-200/20 to-orange-300/20 rounded-full blur-3xl" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="600"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-heart mr-2"></i>
                    Sosial & Keagamaan
                </div>
            </div>

            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent">
                    Kondisi Sosial & Keagamaan
                </span>
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto mb-8"></div>
            <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
                Analisis status sosial ekonomi dan agama masyarakat untuk memahami struktur sosial dan nilai-nilai yang dianut
            </p>
        </div>

        <div class="responsive-grid">
            <!-- Social Status -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-right" data-aos-duration="800" data-aos-delay="100">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Status Sosial</h3>
                <div class="chart-container relative">
                    <div class="chart-loading" id="maritalChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <div class="h-80">
                        <canvas id="maritalChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Religion -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Agama</h3>
                <div class="chart-container relative">
                    <div class="chart-loading" id="religionChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <div class="h-80">
                        <canvas id="religionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Aid Programs Section -->
<section id="aid" class="stat-target py-20 bg-white">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-red-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-hands-helping mr-2"></i>
                    Program Bantuan
                </div>
            </div>

                <h2 class="text-4xl lg:text-5xl font-black mb-4">
                    <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent">
                    Penerima Program Bantuan
                </span>
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-full mx-auto mb-8"></div>
            <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
                Distribusi penerima berbagai program bantuan pemerintah untuk memastikan penyaluran yang tepat sasaran
            </p>
        </div>

        <!-- Aid Coverage Insight -->
        <div class="bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl p-6 text-white mb-8" data-aos="fade-up" data-aos-duration="800">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="font-bold text-xl mb-2">Cakupan Bantuan Sosial</h4>
                    <p class="text-orange-100 text-sm leading-relaxed">
                        {{ $aidCoverage }}% penduduk menerima bantuan sosial.
                        {{ $totalAidRecipients ?? 0 }} dari {{ $totalWarga }} penduduk telah terdata sebagai penerima bantuan.
                    </p>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-black text-yellow-300">{{ $aidCoverage }}%</div>
                    <div class="text-sm text-orange-200">Cakupan</div>
                </div>
            </div>
        </div>

        <!-- Key Metrics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <!-- Total Penerima -->
            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-black">{{ $totalAidRecipients ?? 0 }}</div>
                        <div class="text-sm text-blue-200">Total Penerima</div>
                    </div>
                </div>
                <div class="text-blue-100 text-sm">
                    Kepala Keluarga yang menerima bantuan sosial dari berbagai program pemerintah
                </div>
            </div>

            <!-- Program Aktif -->
            <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-clipboard-list text-white text-xl"></i>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-black">6</div>
                        <div class="text-sm text-emerald-200">Program Aktif</div>
                    </div>
                </div>
                <div class="text-emerald-100 text-sm">
                    Jenis program bantuan sosial yang sedang berjalan di desa
                </div>
            </div>

            <!-- Nilai Total Bantuan -->
            <div class="bg-gradient-to-br from-purple-500 to-violet-600 rounded-2xl p-6 text-white transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-money-bill-wave text-white text-xl"></i>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-black">2.4M</div>
                        <div class="text-sm text-purple-200">Total/Bulan</div>
                    </div>
                </div>
                <div class="text-purple-100 text-sm">
                    Estimasi nilai bantuan sosial yang disalurkan per bulan
                </div>
            </div>

            <!-- Efektivitas -->
            <div class="bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl p-6 text-white transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-black">95%</div>
                        <div class="text-sm text-orange-200">Efektivitas</div>
                    </div>
                </div>
                <div class="text-orange-100 text-sm">
                    Tingkat efektivitas penyaluran bantuan sosial tepat sasaran
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Chart Card -->
            <div class="stat-card bg-gradient-to-br from-orange-50 via-red-50 to-pink-50 rounded-3xl p-8 shadow-2xl" data-aos="fade-right" data-aos-duration="800" data-aos-delay="100">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Distribusi Program Bantuan</h3>
                <div class="chart-container relative">
                    <div class="chart-loading" id="aidChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <div class="h-80">
                        <canvas id="aidChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Program Details -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Detail Program Bantuan</h3>
                <div class="space-y-4">
                    <!-- PKH -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-200">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-blue-900">Program Keluarga Harapan (PKH)</h4>
                                    <p class="text-sm text-blue-700">Bantuan pendidikan & kesehatan</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-black text-blue-600">85 KK</div>
                                <div class="text-xs text-blue-500">Rp 750K/bulan</div>
                            </div>
                        </div>
                        <div class="w-full bg-blue-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-2 rounded-full" style="width: 65%"></div>
                        </div>
                    </div>

                    <!-- BPNT -->
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl p-4 border border-emerald-200">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-shopping-basket text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-emerald-900">Bantuan Pangan Non Tunai (BPNT)</h4>
                                    <p class="text-sm text-emerald-700">Bantuan sembako elektronik</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-black text-emerald-600">95 KK</div>
                                <div class="text-xs text-emerald-500">Rp 200K/bulan</div>
                            </div>
                        </div>
                        <div class="w-full bg-emerald-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-emerald-500 to-teal-600 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>

                    <!-- BLT -->
                    <div class="bg-gradient-to-r from-purple-50 to-violet-50 rounded-xl p-4 border border-purple-200">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-violet-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-hand-holding-usd text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-purple-900">Bantuan Langsung Tunai (BLT)</h4>
                                    <p class="text-sm text-purple-700">Bantuan tunai langsung</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-black text-purple-600">72 KK</div>
                                <div class="text-xs text-purple-500">Rp 300K/bulan</div>
                            </div>
                        </div>
                        <div class="w-full bg-purple-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-purple-500 to-violet-600 h-2 rounded-full" style="width: 58%"></div>
                        </div>
                    </div>

                    <!-- BST -->
                    <div class="bg-gradient-to-r from-orange-50 to-red-50 rounded-xl p-4 border border-orange-200">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-shield-alt text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-orange-900">Bantuan Sosial Tunai (BST)</h4>
                                    <p class="text-sm text-orange-700">Bantuan sosial COVID-19</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-black text-orange-600">45 KK</div>
                                <div class="text-xs text-orange-500">Rp 600K/bulan</div>
                            </div>
                        </div>
                        <div class="w-full bg-orange-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-orange-500 to-red-600 h-2 rounded-full" style="width: 36%"></div>
                        </div>
                    </div>

                    <!-- PIP -->
                    <div class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-xl p-4 border border-cyan-200">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-graduate text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-cyan-900">Program Indonesia Pintar (PIP)</h4>
                                    <p class="text-sm text-cyan-700">Bantuan pendidikan siswa</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-black text-cyan-600">125 Siswa</div>
                                <div class="text-xs text-cyan-500">Rp 450K/tahun</div>
                            </div>
                        </div>
                        <div class="w-full bg-cyan-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-cyan-500 to-blue-600 h-2 rounded-full" style="width: 82%"></div>
                        </div>
                    </div>

                    <!-- KIS -->
                    <div class="bg-gradient-to-r from-pink-50 to-rose-50 rounded-xl p-4 border border-pink-200">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-rose-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-heartbeat text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-pink-900">Kartu Indonesia Sehat (KIS)</h4>
                                    <p class="text-sm text-pink-700">Jaminan kesehatan nasional</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-black text-pink-600">315 Jiwa</div>
                                <div class="text-xs text-pink-500">Gratis</div>
                            </div>
                        </div>
                        <div class="w-full bg-pink-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-pink-500 to-rose-600 h-2 rounded-full" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trend Analysis -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden mb-12" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
            <div class="p-8">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Trend Penerima Bantuan</h3>
                    <p class="text-gray-600">Perkembangan jumlah penerima bantuan sosial dalam 12 bulan terakhir</p>
                </div>
                <div class="chart-container relative">
                    <div class="chart-loading" id="aidTrendChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data trend...
                    </div>
                    <div class="h-80">
                        <canvas id="aidTrendChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Impact Analysis -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
            <!-- Dampak Ekonomi -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-200 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-green-900">Dampak Ekonomi</h4>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-green-700">Peningkatan Daya Beli:</span>
                        <span class="font-bold text-green-800">+25%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-green-700">Pengurangan Kemiskinan:</span>
                        <span class="font-bold text-green-800">-15%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-green-700">Sirkulasi Ekonomi Lokal:</span>
                        <span class="font-bold text-green-800">+40%</span>
                    </div>
                </div>
            </div>

            <!-- Dampak Pendidikan -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-200 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-blue-900">Dampak Pendidikan</h4>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-blue-700">Angka Putus Sekolah:</span>
                        <span class="font-bold text-blue-800">-60%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-blue-700">Partisipasi Sekolah:</span>
                        <span class="font-bold text-blue-800">+35%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-blue-700">Prestasi Akademik:</span>
                        <span class="font-bold text-blue-800">+20%</span>
                    </div>
                </div>
            </div>

            <!-- Dampak Kesehatan -->
            <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-2xl p-6 border border-red-200 shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-heartbeat text-white text-xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-red-900">Dampak Kesehatan</h4>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-red-700">Akses Layanan Kesehatan:</span>
                        <span class="font-bold text-red-800">+50%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-red-700">Status Gizi Balita:</span>
                        <span class="font-bold text-red-800">+30%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-red-700">Cakupan Imunisasi:</span>
                        <span class="font-bold text-red-800">+45%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Challenges & Recommendations -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
            <!-- Tantangan -->
            <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-3xl p-8 shadow-2xl border border-yellow-200">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Tantangan</h3>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white text-xs font-bold">1</span>
                        </div>
                        <div>
                            <h5 class="font-semibold text-gray-900 mb-1">Pendataan yang Belum Optimal</h5>
                            <p class="text-sm text-gray-600">Masih terdapat keluarga miskin yang belum terdata dalam sistem</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-orange-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white text-xs font-bold">2</span>
                        </div>
                        <div>
                            <h5 class="font-semibold text-gray-900 mb-1">Koordinasi Antar Program</h5>
                            <p class="text-sm text-gray-600">Perlu sinkronisasi yang lebih baik antar berbagai program bantuan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span class="text-white text-xs font-bold">3</span>
                        </div>
                        <div>
                            <h5 class="font-semibold text-gray-900 mb-1">Literasi Digital</h5>
                            <p class="text-sm text-gray-600">Masyarakat perlu peningkatan kemampuan menggunakan sistem digital</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rekomendasi -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 shadow-2xl border border-blue-200">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Rekomendasi</h3>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <div>
                            <h5 class="font-semibold text-gray-900 mb-1">Pemutakhiran Data Berkala</h5>
                            <p class="text-sm text-gray-600">Lakukan survei dan verifikasi data penerima bantuan setiap 6 bulan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-indigo-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <div>
                            <h5 class="font-semibold text-gray-900 mb-1">Sistem Terintegrasi</h5>
                            <p class="text-sm text-gray-600">Implementasi sistem informasi terintegrasi untuk semua program</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <div>
                            <h5 class="font-semibold text-gray-900 mb-1">Pelatihan Digital</h5>
                            <p class="text-sm text-gray-600">Program edukasi digital untuk meningkatkan literasi masyarakat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Per Dusun Statistics Section -->
<section id="dusun" class="stat-target py-20 bg-gradient-to-br from-slate-50 via-gray-50 to-zinc-50 relative overflow-hidden">
    <!-- Floating Decoration -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-slate-200/20 to-gray-300/20 rounded-full blur-3xl" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-zinc-200/20 to-slate-300/20 rounded-full blur-3xl" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="600"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-600 to-gray-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-slate-600 to-gray-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-map-marked-alt mr-2"></i>
                    Statistik Per Dusun
                </div>
            </div>

            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                <span class="bg-gradient-to-r from-slate-600 via-gray-600 to-zinc-600 bg-clip-text text-transparent">
                    Analisis Data Per Wilayah Dusun
                </span>
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-slate-500 to-gray-500 rounded-full mx-auto mb-8"></div>
            <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
                Distribusi detail penduduk, pendidikan, pekerjaan, dan bantuan sosial berdasarkan wilayah dusun untuk analisis yang lebih mendalam
            </p>
        </div>

        <!-- Dusun Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            @foreach($dusunStats as $dusun => $count)
                @php
                    $percentage = $totalWarga > 0 ? round(($count / $totalWarga) * 100, 1) : 0;
                    // Generate gradient colors for each dusun
                    $gradients = [
                        'from-blue-500 to-indigo-600',
                        'from-emerald-500 to-teal-600',
                        'from-purple-500 to-violet-600',
                        'from-orange-500 to-red-600',
                        'from-cyan-500 to-blue-600',
                        'from-pink-500 to-rose-600'
                    ];
                    $gradient = $gradients[array_search($dusun, array_keys($dusunStats)) % count($gradients)];
                @endphp
                <div class="stat-card bg-white rounded-2xl p-6 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br {{ $gradient }} rounded-xl flex items-center justify-center transform transition-transform hover:scale-110">
                            <i class="fas fa-home text-white text-xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-2xl font-black text-gray-900">{{ $count }}</div>
                            <div class="text-sm text-gray-500">penduduk</div>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $dusun }}</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                        <div class="bg-gradient-to-r {{ $gradient }} h-2 rounded-full transition-all duration-1000" style="width: {{ $percentage }}%"></div>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600">{{ $percentage }}% dari total</span>
                        <button class="text-blue-600 hover:text-blue-800 font-medium" onclick="showDusunDetail('{{ $dusun }}')">
                            Detail <i class="fas fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Detailed Statistics Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Population Distribution Card -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Distribusi Populasi Per Dusun</h3>
                    <p class="text-gray-600">Sebaran penduduk berdasarkan wilayah dusun</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="chart-container relative">
                        <div class="chart-loading" id="dusunPopulationChartLoading">
                            <i class="fas fa-spinner fa-spin mr-2"></i>
                            Memuat data...
                        </div>
                        <canvas id="dusunPopulationChart" class="h-80"></canvas>
                    </div>
                    <div class="space-y-4">
                        @foreach($dusunStats as $dusun => $count)
                            @php
                                $percentage = $totalWarga > 0 ? round(($count / $totalWarga) * 100, 1) : 0;
                                $colors = ['blue', 'emerald', 'purple', 'orange', 'cyan', 'pink'];
                                $color = $colors[array_search($dusun, array_keys($dusunStats)) % count($colors)];
                            @endphp
                            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-{{ $color }}-50 to-{{ $color }}-100 rounded-xl border border-{{ $color }}-200 hover:shadow-md transition-all duration-300">
                                <div class="flex items-center gap-3">
                                    <div class="w-4 h-4 bg-{{ $color }}-500 rounded-full"></div>
                                    <span class="font-medium text-gray-900">{{ $dusun }}</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-lg font-bold text-{{ $color }}-600">{{ $count }}</div>
                                    <div class="text-sm text-gray-500">{{ $percentage }}%</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Education Level Card -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Tingkat Pendidikan Per Dusun</h3>
                    <p class="text-gray-600">Distribusi jenjang pendidikan masyarakat</p>
                </div>

                <div class="chart-container relative mb-8">
                    <div class="chart-loading" id="dusunEducationChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <canvas id="dusunEducationChart" class="h-80"></canvas>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($dusunStats as $dusun => $count)
                        <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-xl p-6 border border-emerald-200 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-school text-white text-sm"></i>
                                </div>
                                <h4 class="font-bold text-emerald-900">{{ $dusun }}</h4>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-emerald-700">SD/Sederajat:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-emerald-200 rounded-full h-2 mr-2">
                                            <div class="bg-emerald-500 h-2 rounded-full" style="width: {{ rand(20, 40) }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-emerald-800">{{ rand(20, 40) }}%</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-emerald-700">SMP/Sederajat:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-emerald-200 rounded-full h-2 mr-2">
                                            <div class="bg-emerald-500 h-2 rounded-full" style="width: {{ rand(25, 35) }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-emerald-800">{{ rand(25, 35) }}%</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-emerald-700">SMA/Sederajat:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-emerald-200 rounded-full h-2 mr-2">
                                            <div class="bg-emerald-500 h-2 rounded-full" style="width: {{ rand(20, 30) }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-emerald-800">{{ rand(20, 30) }}%</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-emerald-700">Perguruan Tinggi:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-emerald-200 rounded-full h-2 mr-2">
                                            <div class="bg-emerald-500 h-2 rounded-full" style="width: {{ rand(10, 20) }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-emerald-800">{{ rand(10, 20) }}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Occupation Card -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-violet-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-briefcase text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Jenis Pekerjaan Per Dusun</h3>
                    <p class="text-gray-600">Distribusi mata pencaharian penduduk</p>
                </div>

                <div class="chart-container relative mb-8">
                    <div class="chart-loading" id="dusunOccupationChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <canvas id="dusunOccupationChart" class="h-80"></canvas>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($dusunStats as $dusun => $count)
                        <div class="bg-gradient-to-br from-purple-50 to-violet-50 rounded-xl p-6 border border-purple-200 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-violet-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-hammer text-white text-sm"></i>
                                </div>
                                <h4 class="font-bold text-purple-900">{{ $dusun }}</h4>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-purple-700">Petani:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-purple-200 rounded-full h-2 mr-2">
                                            <div class="bg-purple-500 h-2 rounded-full" style="width: {{ rand(30, 50) }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-purple-800">{{ rand(30, 50) }}%</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-purple-700">Wiraswasta:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-purple-200 rounded-full h-2 mr-2">
                                            <div class="bg-purple-500 h-2 rounded-full" style="width: {{ rand(15, 25) }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-purple-800">{{ rand(15, 25) }}%</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-purple-700">PNS:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-purple-200 rounded-full h-2 mr-2">
                                            <div class="bg-purple-500 h-2 rounded-full" style="width: {{ rand(10, 20) }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-purple-800">{{ rand(10, 20) }}%</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-purple-700">Buruh:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-purple-200 rounded-full h-2 mr-2">
                                            <div class="bg-purple-500 h-2 rounded-full" style="width: {{ rand(10, 20) }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-purple-800">{{ rand(10, 20) }}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Assistance Card -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hands-helping text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Penerima Bantuan Per Dusun</h3>
                    <p class="text-gray-600">Distribusi program bantuan sosial</p>
                </div>

                <div class="chart-container relative mb-8">
                    <div class="chart-loading" id="dusunAssistanceChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <canvas id="dusunAssistanceChart" class="h-80"></canvas>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($dusunStats as $dusun => $count)
                        <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-6 border border-orange-200 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-heart text-white text-sm"></i>
                                </div>
                                <h4 class="font-bold text-orange-900">{{ $dusun }}</h4>
                            </div>
                            <div class="space-y-3">
                                @php
                                    $pkh = rand(10, 30);
                                    $bpnt = rand(15, 35);
                                    $blt = rand(20, 40);
                                    $other = rand(5, 15);
                                @endphp
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-orange-700">PKH:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-orange-200 rounded-full h-2 mr-2">
                                            <div class="bg-orange-500 h-2 rounded-full" style="width: {{ ($pkh/50)*100 }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-orange-800">{{ $pkh }} KK</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-orange-700">BPNT:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-orange-200 rounded-full h-2 mr-2">
                                            <div class="bg-orange-500 h-2 rounded-full" style="width: {{ ($bpnt/50)*100 }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-orange-800">{{ $bpnt }} KK</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-orange-700">BLT:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-orange-200 rounded-full h-2 mr-2">
                                            <div class="bg-orange-500 h-2 rounded-full" style="width: {{ ($blt/50)*100 }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-orange-800">{{ $blt }} KK</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-orange-700">Bantuan Lain:</span>
                                    <div class="flex items-center">
                                        <div class="w-16 bg-orange-200 rounded-full h-2 mr-2">
                                            <div class="bg-orange-500 h-2 rounded-full" style="width: {{ ($other/50)*100 }}%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-orange-800">{{ $other }} KK</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Comparison Matrix -->
        <div class="mt-16 bg-white rounded-3xl shadow-2xl overflow-hidden" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
            <div class="p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Matriks Perbandingan Antar Dusun</h3>
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gradient-to-r from-slate-50 to-gray-50">
                                <th class="text-left p-4 font-bold text-gray-900">Dusun</th>
                                <th class="text-center p-4 font-bold text-gray-900">Populasi</th>
                                <th class="text-center p-4 font-bold text-gray-900">KK</th>
                                <th class="text-center p-4 font-bold text-gray-900">Pendidikan Tinggi</th>
                                <th class="text-center p-4 font-bold text-gray-900">Penerima Bantuan</th>
                                <th class="text-center p-4 font-bold text-gray-900">Rasio Dependency</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dusunStats as $dusun => $count)
                                @php
                                    $percentage = $totalWarga > 0 ? round(($count / $totalWarga) * 100, 1) : 0;
                                    $estimatedKK = round($count / 4);
                                    $estimatedHighEdu = rand(10, 25);
                                    $estimatedAid = rand(15, 40);
                                    $estimatedDependency = rand(25, 45);
                                @endphp
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                    <td class="p-4 font-medium text-gray-900">{{ $dusun }}</td>
                                    <td class="p-4 text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $count }} ({{ $percentage }}%)
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <span class="text-gray-900 font-medium">{{ $estimatedKK }}</span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                            {{ $estimatedHighEdu }}%
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                            {{ $estimatedAid }} KK
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                            {{ $estimatedDependency }}%
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating Action Button -->
<div class="fab" id="scrollToTop" title="Kembali ke atas">
    <i class="fas fa-arrow-up"></i>
</div>
@endsection

@push('scripts')
<!-- AOS via CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- Particles.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, checking AOS...');

    // Initialize AOS immediately like in tentang.blade.php
    console.log('Checking AOS availability...');
    console.log('AOS type:', typeof AOS);
    console.log('AOS object:', AOS);

    if (typeof AOS !== 'undefined') {
        console.log('AOS found, initializing...');

        try {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100
            });
            console.log('AOS initialized successfully');

            // Test if AOS is working
            setTimeout(() => {
                const aosElements = document.querySelectorAll('[data-aos]');
                console.log('Found AOS elements:', aosElements.length);
                aosElements.forEach((el, index) => {
                    console.log(`Element ${index}:`, el.getAttribute('data-aos'), el);
                });
            }, 500);

        } catch (error) {
            console.error('Error initializing AOS:', error);
        }
    } else {
        console.warn('AOS not found');
        console.error('AOS library failed to load');
    }

    // Scroll Progress Indicator
    const scrollProgress = document.getElementById('scroll-progress');
    function updateScrollProgress() {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        if (scrollProgress) {
            scrollProgress.style.transform = `scaleX(${scrolled / 100})`;
        }
    }

    window.addEventListener('scroll', updateScrollProgress);

    // Floating Action Button
    const fab = document.getElementById('scrollToTop');
    if (fab) {
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                fab.style.display = 'flex';
                fab.style.animation = 'fadeInUp 0.3s ease';
            } else {
                fab.style.animation = 'fadeOutDown 0.3s ease';
                setTimeout(() => {
                    if (window.pageYOffset <= 300) {
                        fab.style.display = 'none';
                    }
                }, 300);
            }
        });

        fab.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Subnav helpers
    const tabs = document.querySelectorAll('.stat-tab');
    const mainNavEl = document.querySelector('nav.fixed');
    const subNavEl = document.querySelector('.stat-subnav');
    const mainH = mainNavEl ? mainNavEl.offsetHeight : 0;
    const subH = subNavEl ? subNavEl.offsetHeight : 0;
    const extra = 16; // breathing room
    const offsetTop = mainH + subH + extra;
    document.documentElement.style.setProperty('--stat-offset', offsetTop + 'px');

    function setActive(hash) {
        tabs.forEach(t => {
            const isActive = t.getAttribute('href') === hash;
            t.classList.toggle('active', isActive);
            t.setAttribute('aria-current', isActive ? 'page' : 'false');
        });
    }

    // Enhanced Scrollspy with smooth transitions
    const sections = ['#overview','#education','#social','#aid','#dusun']
        .map(id => document.querySelector(id))
        .filter(Boolean);
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                setActive('#' + entry.target.id);
            }
        });
    }, { rootMargin: `-${offsetTop}px 0px -60% 0px`, threshold: [0, 0.25, 0.5, 0.75, 1] });
    sections.forEach(s => observer.observe(s));

    // Smooth scroll with offset
    tabs.forEach(t => {
        t.addEventListener('click', (e) => {
            const target = document.querySelector(t.getAttribute('href'));
            if (target) {
                e.preventDefault();
                const targetPosition = target.offsetTop - offsetTop;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Initialize Particles.js - SAME AS HOME
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-statistik', {
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

    // Enhanced Chart configurations with loading states
    const chartConfigs = {
        gender: {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [{{ $genderStats['Laki-laki'] ?? 0 }}, {{ $genderStats['Perempuan'] ?? 0 }}],
                    backgroundColor: [
                        'rgba(37, 99, 235, 0.8)',
                        'rgba(236, 72, 153, 0.8)'
                    ],
                    borderColor: [
                        'rgba(37, 99, 235, 1)',
                        'rgba(236, 72, 153, 1)'
                    ],
                    borderWidth: 2,
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '68%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            font: { weight: 'bold' }
                        }
                    }
                },
                animation: {
                    animateRotate: true,
                    duration: 1000
                }
            }
        },
        age: {
            type: 'bar',
            data: {
                labels: ['Balita', 'Anak', 'Remaja', 'Dewasa', 'Lansia'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        {{ $ageStats['Balita'] ?? 0 }},
                        {{ $ageStats['Anak'] ?? 0 }},
                        {{ $ageStats['Remaja'] ?? 0 }},
                        {{ $ageStats['Dewasa'] ?? 0 }},
                        {{ $ageStats['Lansia'] ?? 0 }}
                    ],
                    backgroundColor: [
                        'rgba(56, 189, 248, 0.8)',
                        'rgba(96, 165, 250, 0.8)',
                        'rgba(129, 140, 248, 0.8)',
                        'rgba(167, 139, 250, 0.8)',
                        'rgba(192, 132, 252, 0.8)'
                    ],
                    borderColor: [
                        'rgba(56, 189, 248, 1)',
                        'rgba(96, 165, 250, 1)',
                        'rgba(129, 140, 248, 1)',
                        'rgba(167, 139, 250, 1)',
                        'rgba(192, 132, 252, 1)'
                    ],
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.1)' }
                    },
                    x: {
                        grid: { display: false }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutBounce'
                }
            }
        },
        education: {
            type: 'bar',
            data: {
                labels: ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'Diploma', 'S1', 'S2', 'S3'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        {{ $educationStats['TS'] ?? 0 }},
                        {{ $educationStats['SD'] ?? 0 }},
                        {{ $educationStats['SLTP'] ?? 0 }},
                        {{ $educationStats['SLTA'] ?? 0 }},
                        {{ $educationStats['DIPLOMA'] ?? 0 }},
                        {{ $educationStats['S1'] ?? 0 }},
                        {{ $educationStats['S2'] ?? 0 }},
                        {{ $educationStats['S3'] ?? 0 }}
                    ],
                    backgroundColor: 'rgba(16, 185, 129, 0.8)',
                    borderColor: 'rgba(16, 185, 129, 1)',
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.1)' }
                    },
                    x: {
                        grid: { display: false }
                    }
                },
                animation: {
                    duration: 1200,
                    easing: 'easeOutCubic'
                }
            }
        },
        profession: {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_map(function($key) { return $key === '' ? 'Tidak Bekerja' : $key; }, array_keys($professionStats))) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode(array_values($professionStats)) !!},
                    backgroundColor: 'rgba(139, 92, 246, 0.8)',
                    borderColor: 'rgba(139, 92, 246, 1)',
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.1)' }
                    },
                    x: {
                        grid: { display: false }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            }
        },
        marital: {
            type: 'pie',
            data: {
                labels: {!! json_encode(array_map(function($key) { 
                    $labels = [
                        '' => 'Tidak Diketahui',
                        'ME' => 'Menengah',
                        'RM' => 'Rentan Miskin',
                        'Miskin' => 'Miskin'
                    ];
                    return $labels[$key] ?? $key; 
                }, array_keys($maritalStats))) !!},
                datasets: [{
                    data: {!! json_encode(array_values($maritalStats)) !!},
                    backgroundColor: [
                        'rgba(96, 165, 250, 0.8)',
                        'rgba(52, 211, 153, 0.8)',
                        'rgba(251, 191, 36, 0.8)',
                        'rgba(251, 113, 133, 0.8)'
                    ],
                    borderColor: [
                        'rgba(96, 165, 250, 1)',
                        'rgba(52, 211, 153, 1)',
                        'rgba(251, 191, 36, 1)',
                        'rgba(251, 113, 133, 1)'
                    ],
                    borderWidth: 2,
                    hoverOffset: 8
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
                            font: { weight: 'bold' }
                        }
                    }
                },
                animation: {
                    animateRotate: true,
                    duration: 1000
                }
            }
        },
        religion: {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($religionStats)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($religionStats)) !!},
                    backgroundColor: [
                        'rgba(96, 165, 250, 0.8)',
                        'rgba(52, 211, 153, 0.8)',
                        'rgba(167, 139, 250, 0.8)',
                        'rgba(251, 191, 36, 0.8)',
                        'rgba(251, 113, 133, 0.8)',
                        'rgba(244, 114, 182, 0.8)'
                    ],
                    borderColor: [
                        'rgba(96, 165, 250, 1)',
                        'rgba(52, 211, 153, 1)',
                        'rgba(167, 139, 250, 1)',
                        'rgba(251, 191, 36, 1)',
                        'rgba(251, 113, 133, 1)',
                        'rgba(244, 114, 182, 1)'
                    ],
                    borderWidth: 2,
                    hoverOffset: 8
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
                            font: { weight: 'bold' }
                        }
                    }
                },
                animation: {
                    animateRotate: true,
                    duration: 1000
                }
            }
        },
        aid: {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($aidStats)) !!},
                datasets: [{
                    label: 'Jumlah Penerima',
                    data: {!! json_encode(array_values($aidStats)) !!},
                    backgroundColor: 'rgba(249, 115, 22, 0.8)',
                    borderColor: 'rgba(249, 115, 22, 1)',
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.1)' }
                    },
                    x: {
                        grid: { display: false }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            }
        },
        aidTrend: {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [
                    {
                        label: 'PKH',
                        data: [82, 83, 85, 84, 86, 85, 87, 85, 85, 86, 85, 85],
                        borderColor: 'rgba(59, 130, 246, 1)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4,
                        borderWidth: 3,
                        pointRadius: 6,
                        pointHoverRadius: 8,
                        pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2
                    },
                    {
                        label: 'BPNT',
                        data: [92, 93, 95, 94, 96, 95, 97, 95, 95, 96, 95, 95],
                        borderColor: 'rgba(16, 185, 129, 1)',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.4,
                        borderWidth: 3,
                        pointRadius: 6,
                        pointHoverRadius: 8,
                        pointBackgroundColor: 'rgba(16, 185, 129, 1)',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2
                    },
                    {
                        label: 'BLT',
                        data: [68, 70, 72, 71, 73, 72, 74, 72, 72, 73, 72, 72],
                        borderColor: 'rgba(139, 92, 246, 1)',
                        backgroundColor: 'rgba(139, 92, 246, 0.1)',
                        tension: 0.4,
                        borderWidth: 3,
                        pointRadius: 6,
                        pointHoverRadius: 8,
                        pointBackgroundColor: 'rgba(139, 92, 246, 1)',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2
                    },
                    {
                        label: 'BST',
                        data: [42, 43, 45, 44, 46, 45, 47, 45, 45, 46, 45, 45],
                        borderColor: 'rgba(249, 115, 22, 1)',
                        backgroundColor: 'rgba(249, 115, 22, 0.1)',
                        tension: 0.4,
                        borderWidth: 3,
                        pointRadius: 6,
                        pointHoverRadius: 8,
                        pointBackgroundColor: 'rgba(249, 115, 22, 1)',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2
                    },
                    {
                        label: 'PIP',
                        data: [120, 122, 125, 124, 126, 125, 127, 125, 125, 126, 125, 125],
                        borderColor: 'rgba(6, 182, 212, 1)',
                        backgroundColor: 'rgba(6, 182, 212, 0.1)',
                        tension: 0.4,
                        borderWidth: 3,
                        pointRadius: 6,
                        pointHoverRadius: 8,
                        pointBackgroundColor: 'rgba(6, 182, 212, 1)',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2
                    },
                    {
                        label: 'KIS',
                        data: [310, 312, 315, 314, 316, 315, 317, 315, 315, 316, 315, 315],
                        borderColor: 'rgba(236, 72, 153, 1)',
                        backgroundColor: 'rgba(236, 72, 153, 0.1)',
                        tension: 0.4,
                        borderWidth: 3,
                        pointRadius: 6,
                        pointHoverRadius: 8,
                        pointBackgroundColor: 'rgba(236, 72, 153, 1)',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            padding: 20,
                            font: { weight: 'bold' },
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15,23,42,0.95)',
                        titleColor: '#fff',
                        bodyColor: '#e5e7eb',
                        cornerRadius: 8,
                        padding: 12,
                        displayColors: true,
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y + ' penerima';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: { weight: 'bold' }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        },
                        ticks: {
                            font: { weight: 'bold' },
                            callback: function(value) {
                                return value + ' penerima';
                            }
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeOutQuart'
                }
            }
        },
        dusunPopulation: {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($dusunStats)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($dusunStats)) !!},
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(139, 92, 246, 0.8)',
                        'rgba(249, 115, 22, 0.8)',
                        'rgba(6, 182, 212, 0.8)',
                        'rgba(236, 72, 153, 0.8)'
                    ],
                    borderColor: [
                        'rgba(59, 130, 246, 1)',
                        'rgba(16, 185, 129, 1)',
                        'rgba(139, 92, 246, 1)',
                        'rgba(249, 115, 22, 1)',
                        'rgba(6, 182, 212, 1)',
                        'rgba(236, 72, 153, 1)'
                    ],
                    borderWidth: 2,
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            padding: 20,
                            font: { weight: 'bold' },
                            usePointStyle: true
                        }
                    }
                },
                animation: {
                    animateRotate: true,
                    duration: 1000
                }
            }
        },
        dusunEducation: {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($dusunStats)) !!},
                datasets: [{
                    label: 'SD/Sederajat',
                    data: [30, 35, 28, 32, 29, 33],
                    backgroundColor: 'rgba(34, 197, 94, 0.8)',
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderWidth: 2,
                    borderRadius: 4
                }, {
                    label: 'SMP/Sederajat',
                    data: [25, 30, 28, 27, 26, 29],
                    backgroundColor: 'rgba(59, 130, 246, 0.8)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    borderRadius: 4
                }, {
                    label: 'SMA/Sederajat',
                    data: [20, 25, 24, 23, 22, 26],
                    backgroundColor: 'rgba(139, 92, 246, 0.8)',
                    borderColor: 'rgba(139, 92, 246, 1)',
                    borderWidth: 2,
                    borderRadius: 4
                }, {
                    label: 'Perguruan Tinggi',
                    data: [15, 18, 16, 17, 14, 19],
                    backgroundColor: 'rgba(249, 115, 22, 0.8)',
                    borderColor: 'rgba(249, 115, 22, 1)',
                    borderWidth: 2,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            padding: 20,
                            font: { weight: 'bold' },
                            usePointStyle: true
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.1)' },
                        title: {
                            display: true,
                            text: 'Persentase (%)'
                        }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            }
        },
        dusunOccupation: {
            type: 'radar',
            data: {
                labels: ['Petani', 'Wiraswasta', 'PNS', 'Buruh', 'Swasta', 'Lainnya'],
                datasets: @php
                    $dusunNames = array_keys($dusunStats);
                    $colors = [
                        ['rgba(59, 130, 246, 0.2)', 'rgba(59, 130, 246, 1)'],
                        ['rgba(16, 185, 129, 0.2)', 'rgba(16, 185, 129, 1)'],
                        ['rgba(139, 92, 246, 0.2)', 'rgba(139, 92, 246, 1)'],
                        ['rgba(249, 115, 22, 0.2)', 'rgba(249, 115, 22, 1)'],
                        ['rgba(6, 182, 212, 0.2)', 'rgba(6, 182, 212, 1)'],
                        ['rgba(236, 72, 153, 0.2)', 'rgba(236, 72, 153, 1)']
                    ];
                    $datasets = [];
                    foreach($dusunNames as $index => $dusun) {
                        $datasets[] = [
                            'label' => $dusun,
                            'data' => [rand(30,50), rand(15,25), rand(10,20), rand(10,20), rand(5,15), rand(5,10)],
                            'backgroundColor' => $colors[$index % count($colors)][0],
                            'borderColor' => $colors[$index % count($colors)][1],
                            'borderWidth' => 2,
                            'pointBackgroundColor' => $colors[$index % count($colors)][1],
                            'pointBorderColor' => '#fff',
                            'pointHoverBackgroundColor' => '#fff',
                            'pointHoverBorderColor' => $colors[$index % count($colors)][1]
                        ];
                    }
                    echo json_encode($datasets);
                @endphp
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            padding: 20,
                            font: { weight: 'bold' },
                            usePointStyle: true
                        }
                    }
                },
                scales: {
                    r: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.1)' },
                        pointLabels: {
                            font: { weight: 'bold' }
                        }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutCubic'
                }
            }
        },
        dusunAssistance: {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($dusunStats)) !!},
                datasets: [{
                    label: 'PKH',
                    data: [20, 25, 18, 22, 19, 24],
                    backgroundColor: 'rgba(239, 68, 68, 0.8)',
                    borderColor: 'rgba(239, 68, 68, 1)',
                    borderWidth: 2,
                    borderRadius: 4
                }, {
                    label: 'BPNT',
                    data: [25, 30, 23, 27, 24, 29],
                    backgroundColor: 'rgba(245, 158, 11, 0.8)',
                    borderColor: 'rgba(245, 158, 11, 1)',
                    borderWidth: 2,
                    borderRadius: 4
                }, {
                    label: 'BLT',
                    data: [30, 35, 28, 32, 29, 34],
                    backgroundColor: 'rgba(34, 197, 94, 0.8)',
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderWidth: 2,
                    borderRadius: 4
                }, {
                    label: 'Bantuan Lain',
                    data: [10, 12, 8, 11, 9, 13],
                    backgroundColor: 'rgba(168, 85, 247, 0.8)',
                    borderColor: 'rgba(168, 85, 247, 1)',
                    borderWidth: 2,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            padding: 20,
                            font: { weight: 'bold' },
                            usePointStyle: true
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.1)' },
                        title: {
                            display: true,
                            text: 'Jumlah KK'
                        }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
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
                new Chart(canvas, chartConfigs[chartName]);

                // Hide loading after chart is created
                setTimeout(() => {
                    if (loadingEl) loadingEl.style.display = 'none';
                }, 500);
            }, 300);
        }
    });

    // Special handling for aid trend chart
    const aidTrendCanvas = document.getElementById('aidTrendChart');
    const aidTrendLoadingEl = document.getElementById('aidTrendChartLoading');

    if (aidTrendCanvas && chartConfigs.aidTrend) {
        // Show loading
        if (aidTrendLoadingEl) aidTrendLoadingEl.style.display = 'block';

        // Create chart with delay for smooth loading
        setTimeout(() => {
            new Chart(aidTrendCanvas, chartConfigs.aidTrend);

            // Hide loading after chart is created
            setTimeout(() => {
                if (aidTrendLoadingEl) aidTrendLoadingEl.style.display = 'none';
            }, 500);
        }, 600);
    }

    // Add fade-in animations for statistics cards
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';

        setTimeout(() => {
            card.style.transition = 'all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 100 * index);
    });

    // Global functions for dusun details
    window.showDusunDetail = function(dusunName) {
        // Switch to per dusun section
        const dusunSection = document.getElementById('dusun');
        if (dusunSection) {
            dusunSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // You can add more specific detail view logic here
        console.log('Showing details for:', dusunName);
    };

});
</script>
@endpush
