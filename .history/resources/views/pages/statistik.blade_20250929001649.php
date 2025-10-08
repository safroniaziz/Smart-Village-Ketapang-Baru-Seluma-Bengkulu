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
<section class="relative text-white overflow-hidden min-h-[calc(100vh-8rem)] md:min-h-[calc(100vh-10rem)] flex items-center hero-gradient pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>


    <!-- Particle.js Container for Statistics -->
    <div id="particles-statistik" class="absolute inset-0"></div>


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
                            <p class="text-sm text-blue-100">{{ $districtName }}</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Statistik</span><br>
                        <span class="text-yellow-400 font-extrabold">{{ $villageName }}</span>
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
                <div class="flex flex-col sm:flex-row gap-3 relative z-10" data-aos="fade-up" data-aos-delay="800">
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
<nav class="stat-subnav sticky top-20 z-10" aria-label="Navigasi Statistik">
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
                    <a href="#house" class="stat-tab" aria-current="false">
                        <i class="fas fa-home mr-2"></i>
                        <span>Perumahan</span>
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
<section id="overview" class="stat-target py-20 mt-16 md:mt-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
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
            <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Data statistik terkini</span> tentang perkembangan dan kondisi
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-blue-700">{{ $villageName }}</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-slate-200 to-blue-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
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

<!-- Per Dusun Statistics Section -->
<section id="dusun" class="stat-target py-20 pb-32 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 relative overflow-hidden">
    <!-- Floating Decoration -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-indigo-200/20 to-purple-300/20 rounded-full blur-3xl" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-pink-200/20 to-rose-300/20 rounded-full blur-3xl" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="600"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-map-marked-alt mr-2"></i>
                    Statistik Per Dusun
                </div>
            </div>

            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                    Analisis Data Per Wilayah Dusun
                </span>
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full mx-auto mb-8"></div>
            <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-indigo-700">Data detail penduduk per dusun</span> di
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-purple-700">{{ $villageName }}</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-indigo-200 to-purple-300 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
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

                <!-- Chart Section -->
                <div class="mb-8">
                    <div class="chart-container relative">
                        <div class="chart-loading" id="dusunPopulationChartLoading">
                            <i class="fas fa-spinner fa-spin mr-2"></i>
                            Memuat data...
                        </div>
                        <canvas id="dusunPopulationChart" class="h-96"></canvas>
                    </div>
                </div>

                <!-- Detailed Population Breakdown -->
                <div class="space-y-6">
                    @foreach($dusunStats as $dusun => $count)
                        @php
                            $percentage = $totalWarga > 0 ? round(($count / $totalWarga) * 100, 1) : 0;
                            $estimatedKK = round($count / 4);

                            // Get additional stats for this dusun
                            $lakiLaki = \App\Models\User::where('dusun', $dusun)
                                ->whereNotNull('nik')
                                ->where(function($q) {
                                    $q->where('jenis_kelamin', 'Laki-laki')->orWhere('jenis_kelamin', 'L');
                                })->count();

                            $perempuan = \App\Models\User::where('dusun', $dusun)
                                ->whereNotNull('nik')
                                ->where(function($q) {
                                    $q->where('jenis_kelamin', 'Perempuan')->orWhere('jenis_kelamin', 'P');
                                })->count();

                            $kepalaKeluarga = \App\Models\User::where('dusun', $dusun)
                                ->whereNotNull('nik')
                                ->where('is_kepala_keluarga', true)->count();

                            $colors = ['blue', 'emerald', 'purple', 'orange', 'pink', 'rose'];
                            $color = $colors[array_search($dusun, array_keys($dusunStats)) % count($colors)];
                        @endphp
                        <div class="bg-gradient-to-br from-{{ $color }}-50 to-{{ $color }}-100 rounded-2xl p-6 border border-{{ $color }}-200 hover:shadow-lg transition-all duration-300">
                            <!-- Header -->
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-br from-{{ $color }}-500 to-{{ $color }}-600 rounded-xl flex items-center justify-center mr-4">
                                        <i class="fas fa-home text-white text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-xl font-bold text-{{ $color }}-900">{{ $dusun }}</h4>
                                        <p class="text-sm text-{{ $color }}-700">{{ $count }} warga • {{ $estimatedKK }} KK diperkirakan</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-bold text-{{ $color }}-600">{{ $percentage }}%</div>
                                    <div class="text-sm text-{{ $color }}-700">Dari total penduduk</div>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="mb-6">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-{{ $color }}-700">Persentase Populasi</span>
                                    <span class="text-sm font-bold text-{{ $color }}-800">{{ $percentage }}%</span>
                                </div>
                                <div class="w-full bg-{{ $color }}-200 rounded-full h-3 overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-{{ $color }}-500 to-{{ $color }}-600 rounded-full transition-all duration-2000 ease-out"
                                         style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>

                            <!-- Detailed Stats -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div class="bg-white rounded-lg p-4 border border-{{ $color }}-200 hover:shadow-md transition-all duration-300">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-{{ $color }}-600">{{ $lakiLaki }}</div>
                                        <div class="text-xs text-{{ $color }}-700">Laki-laki</div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg p-4 border border-{{ $color }}-200 hover:shadow-md transition-all duration-300">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-{{ $color }}-600">{{ $perempuan }}</div>
                                        <div class="text-xs text-{{ $color }}-700">Perempuan</div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg p-4 border border-{{ $color }}-200 hover:shadow-md transition-all duration-300">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-{{ $color }}-600">{{ $kepalaKeluarga }}</div>
                                        <div class="text-xs text-{{ $color }}-700">Kepala KK</div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg p-4 border border-{{ $color }}-200 hover:shadow-md transition-all duration-300">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-{{ $color }}-600">{{ $estimatedKK }}</div>
                                        <div class="text-xs text-{{ $color }}-700">KK (est.)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Gender Ratio -->
                            <div class="mt-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-{{ $color }}-700">Rasio Gender</span>
                                    <span class="text-sm font-bold text-{{ $color }}-800">
                                        {{ $perempuan > 0 ? round($lakiLaki / $perempuan, 2) : 'N/A' }} : 1
                                    </span>
                                </div>
                                <div class="flex rounded-full overflow-hidden h-2">
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full transition-all duration-1500 ease-out"
                                         style="width: {{ $count > 0 ? round(($lakiLaki / $count) * 100, 1) : 0 }}%"></div>
                                    <div class="bg-gradient-to-r from-pink-500 to-pink-600 h-full transition-all duration-1500 ease-out"
                                         style="width: {{ $count > 0 ? round(($perempuan / $count) * 100, 1) : 0 }}%"></div>
                                </div>
                                <div class="flex justify-between text-xs text-{{ $color }}-600 mt-1">
                                    <span>Laki-laki {{ $count > 0 ? round(($lakiLaki / $count) * 100, 1) : 0 }}%</span>
                                    <span>Perempuan {{ $count > 0 ? round(($perempuan / $count) * 100, 1) : 0 }}%</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Detailed Aid Distribution Card -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hand-holding-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Detail Bantuan Per Dusun</h3>
                    <p class="text-gray-600">Breakdown program bantuan per dusun</p>
                </div>

                <!-- Chart Section -->
                <div class="mb-8">
                    <div class="chart-container relative">
                        <div class="chart-loading" id="dusunAidBreakdownChartLoading">
                            <i class="fas fa-spinner fa-spin mr-2"></i>
                            Memuat data...
                        </div>
                        <canvas id="dusunAidBreakdownChart" class="h-96"></canvas>
                    </div>
                </div>

                <div class="space-y-6">
                    @foreach($dusunStats as $dusun => $count)
                        @php
                            // Get detailed aid data per dusun
                            $aidData = \App\Models\PenerimaBantuan::whereHas('user', function($query) use ($dusun) {
                                $query->where('dusun', $dusun);
                            })
                            ->selectRaw('program, COUNT(DISTINCT user_id) as unique_recipients, COUNT(*) as total_recipients')
                            ->groupBy('program')
                            ->orderBy('unique_recipients', 'desc')
                            ->get();

                            $totalAidRecipients = $aidData->sum('unique_recipients');
                            $aidPercentage = $count > 0 ? round(($totalAidRecipients / $count) * 100, 1) : 0;
                            $colors = ['blue', 'emerald', 'purple', 'orange', 'pink', 'rose'];
                            $color = $colors[array_search($dusun, array_keys($dusunStats)) % count($colors)];
                        @endphp
                        <div class="bg-gradient-to-br from-{{ $color }}-50 to-{{ $color }}-100 rounded-2xl p-6 border border-{{ $color }}-200 hover:shadow-lg transition-all duration-300">
                            <!-- Header -->
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-br from-{{ $color }}-500 to-{{ $color }}-600 rounded-xl flex items-center justify-center mr-4">
                                        <i class="fas fa-home text-white text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-xl font-bold text-{{ $color }}-900">{{ $dusun }}</h4>
                                        <p class="text-sm text-{{ $color }}-700">{{ $count }} warga • {{ $totalAidRecipients }} KK menerima bantuan</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-bold text-{{ $color }}-600">{{ $aidPercentage }}%</div>
                                    <div class="text-sm text-{{ $color }}-700">Cakupan bantuan</div>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="mb-6">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-{{ $color }}-700">Progress Cakupan</span>
                                    <span class="text-sm font-bold text-{{ $color }}-800">{{ $aidPercentage }}%</span>
                                </div>
                                <div class="w-full bg-{{ $color }}-200 rounded-full h-3 overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-{{ $color }}-500 to-{{ $color }}-600 rounded-full transition-all duration-2000 ease-out"
                                         style="width: {{ $aidPercentage }}%"></div>
                                </div>
                            </div>

                            <!-- Program Details -->
                            @if($aidData->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($aidData as $program)
                                        @php
                                            $programColors = [
                                                'PKH' => 'red',
                                                'PBI/BPJS' => 'blue',
                                                'BPJS DAERAH' => 'indigo',
                                                'BPJS MANDIRI' => 'cyan',
                                                'SEMBAKO' => 'green',
                                                'BLTDD' => 'yellow',
                                                'BPMT_PPKM' => 'orange',
                                                'BST' => 'pink',
                                                'BLT_COVID' => 'purple',
                                                'BLT_BBM' => 'amber',
                                                'BPNT' => 'emerald',
                                                'BLT' => 'rose',
                                                'BSU' => 'violet',
                                                'BPUM' => 'teal'
                                            ];
                                            $progColor = $programColors[$program->program] ?? 'gray';
                                            $progPercentage = $count > 0 ? round(($program->unique_recipients / $count) * 100, 1) : 0;
                                        @endphp
                                        <div class="bg-white rounded-lg p-4 border border-{{ $progColor }}-200 hover:shadow-md transition-all duration-300">
                                            <div class="flex items-center justify-between mb-3">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-gradient-to-br from-{{ $progColor }}-500 to-{{ $progColor }}-600 rounded-lg flex items-center justify-center mr-3">
                                                        <i class="fas fa-gift text-white text-xs"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-bold text-{{ $progColor }}-900 text-sm">{{ $program->program }}</h5>
                                                        <p class="text-xs text-{{ $progColor }}-700">{{ $program->total_recipients }} total penerima</p>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <div class="text-lg font-bold text-{{ $progColor }}-600">{{ $program->unique_recipients }}</div>
                                                    <div class="text-xs text-{{ $progColor }}-700">KK</div>
                                                </div>
                                            </div>
                                            <div class="space-y-2">
                                                <div class="flex justify-between items-center">
                                                    <span class="text-xs text-{{ $progColor }}-700">Cakupan:</span>
                                                    <span class="text-xs font-bold text-{{ $progColor }}-800">{{ $progPercentage }}%</span>
                                                </div>
                                                <div class="w-full bg-{{ $progColor }}-200 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-{{ $progColor }}-500 to-{{ $progColor }}-600 h-2 rounded-full transition-all duration-1500 ease-out"
                                                         style="width: {{ $progPercentage }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <div class="w-16 h-16 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-exclamation-triangle text-gray-400 text-2xl"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-600 mb-2">Belum Ada Data Bantuan</h4>
                                    <p class="text-gray-500 text-sm">Data program bantuan untuk {{ $dusun }} akan muncul di sini</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Comparison Matrix -->
        <div class="mt-16 bg-gradient-to-br from-white via-indigo-50/30 to-purple-50/30 rounded-3xl shadow-2xl overflow-hidden border border-indigo-100" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
            <div class="p-8">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-bar text-white text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">Matriks Perbandingan Antar Dusun</h3>
                    <p class="text-gray-600">Perbandingan data statistik per dusun di {{ $villageName }}</p>
                </div>

                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gradient-to-r from-indigo-500 to-purple-600">
                                <th class="text-left p-6 font-bold text-white text-base">
                                    <i class="fas fa-map-marker-alt mr-2"></i>Dusun
                                </th>
                                <th class="text-center p-6 font-bold text-white text-base">
                                    <i class="fas fa-users mr-2"></i>Populasi
                                </th>
                                <th class="text-center p-6 font-bold text-white text-base">
                                    <i class="fas fa-home mr-2"></i>KK
                                </th>
                                <th class="text-center p-6 font-bold text-white text-base">
                                    <i class="fas fa-hand-holding-heart mr-2"></i>Penerima Bantuan
                                </th>
                                <th class="text-center p-6 font-bold text-white text-base">
                                    <i class="fas fa-percentage mr-2"></i>Persentase
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dusunStats as $dusun => $count)
                                @php
                                    $percentage = $totalWarga > 0 ? round(($count / $totalWarga) * 100, 1) : 0;
                                    $estimatedKK = round($count / 4);

                                    // Get aid recipients per dusun from database
                                    $aidRecipients = \App\Models\PenerimaBantuan::whereHas('user', function($query) use ($dusun) {
                                        $query->where('dusun', $dusun);
                                    })->distinct('user_id')->count();

                                    $aidPercentage = $count > 0 ? round(($aidRecipients / $count) * 100, 1) : 0;

                                    // Generate colors for each row
                                    $rowColors = [
                                        'from-blue-50 to-indigo-50',
                                        'from-emerald-50 to-teal-50',
                                        'from-purple-50 to-violet-50',
                                        'from-orange-50 to-red-50',
                                        'from-pink-50 to-rose-50',
                                        'from-cyan-50 to-blue-50'
                                    ];
                                    $rowColor = $rowColors[array_search($dusun, array_keys($dusunStats)) % count($rowColors)];
                                @endphp
                                <tr class="bg-gradient-to-r {{ $rowColor }} hover:shadow-lg transition-all duration-300 border-b border-gray-100">
                                    <td class="p-6 font-bold text-gray-900 text-base">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-home text-white text-sm"></i>
                                            </div>
                                            <span>{{ $dusun }}</span>
                                        </div>
                                    </td>
                                    <td class="p-6 text-center">
                                        <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg">
                                            <i class="fas fa-users mr-2"></i>
                                            {{ $count }}
                                        </div>
                                    </td>
                                    <td class="p-6 text-center">
                                        <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-gradient-to-r from-emerald-500 to-teal-600 text-white shadow-lg">
                                            <i class="fas fa-home mr-2"></i>
                                            {{ $estimatedKK }}
                                        </div>
                                    </td>
                                    <td class="p-6 text-center">
                                        <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-gradient-to-r from-orange-500 to-red-600 text-white shadow-lg">
                                            <i class="fas fa-hand-holding-heart mr-2"></i>
                                            {{ $aidRecipients }} KK
                                        </div>
                                    </td>
                                    <td class="p-6 text-center">
                                        <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-gradient-to-r from-purple-500 to-pink-600 text-white shadow-lg">
                                            <i class="fas fa-percentage mr-2"></i>
                                            {{ $aidPercentage }}%
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Summary Stats -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-4">
                    @php
                        $totalAidRecipients = \App\Models\PenerimaBantuan::distinct('user_id')->count();
                        $totalEstimatedKK = array_sum($dusunStats) / 4;
                        $overallAidPercentage = $totalWarga > 0 ? round(($totalAidRecipients / $totalWarga) * 100, 1) : 0;
                    @endphp
                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white text-center">
                        <div class="text-3xl font-bold mb-2">{{ array_sum($dusunStats) }}</div>
                        <div class="text-blue-100 text-sm">Total Populasi</div>
                    </div>
                    <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl p-6 text-white text-center">
                        <div class="text-3xl font-bold mb-2">{{ round($totalEstimatedKK) }}</div>
                        <div class="text-emerald-100 text-sm">Total KK</div>
                    </div>
                    <div class="bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl p-6 text-white text-center">
                        <div class="text-3xl font-bold mb-2">{{ $totalAidRecipients }}</div>
                        <div class="text-orange-100 text-sm">Penerima Bantuan</div>
                    </div>
                    <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white text-center">
                        <div class="text-3xl font-bold mb-2">{{ $overallAidPercentage }}%</div>
                        <div class="text-purple-100 text-sm">Cakupan Bantuan</div>
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
            <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Data tingkat pendidikan</span> dan jenis pekerjaan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-emerald-700">masyarakat {{ $villageName }}</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-slate-200 to-emerald-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
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
            <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Data status sosial ekonomi</span> dan agama
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-purple-700">masyarakat {{ $villageName }}</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-slate-200 to-purple-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
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

<!-- House Status Section -->
<section id="house" class="stat-target py-20 bg-gray-50">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-green-600 to-teal-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-green-600 to-teal-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-home mr-2"></i>
                    Status Rumah & Kelayakan
                </div>
            </div>

            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                <span class="bg-gradient-to-r from-green-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">
                    Kondisi Perumahan
                </span>
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-green-500 to-teal-500 rounded-full mx-auto mb-8"></div>
            <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Data status kepemilikan rumah</span> dan kelayakan huni
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-green-700">{{ $totalKK }} kepala keluarga {{ $villageName }}</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-slate-200 to-green-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <div class="responsive-grid">
            <!-- House Status -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-right" data-aos-duration="800" data-aos-delay="100">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Status Kepemilikan Rumah</h3>
                <div class="text-center mb-4">
                    <div class="inline-flex items-center bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold">
                        <i class="fas fa-home mr-2"></i>
                        Total {{ array_sum($houseStatusStats) }} KK
                    </div>
                </div>
                <div class="chart-container relative">
                    <div class="chart-loading" id="houseStatusChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <div class="h-80">
                        <canvas id="houseStatusChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- House Quality -->
            <div class="stat-card bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Kelayakan Huni</h3>
                <div class="text-center mb-4">
                    <div class="inline-flex items-center bg-teal-100 text-teal-800 px-4 py-2 rounded-full text-sm font-semibold">
                        <i class="fas fa-check-circle mr-2"></i>
                        Total {{ array_sum($houseQualityStats) }} KK
                    </div>
                </div>
                <div class="chart-container relative">
                    <div class="chart-loading" id="houseQualityChartLoading">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Memuat data...
                    </div>
                    <div class="h-80">
                        <canvas id="houseQualityChart"></canvas>
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
            <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Data penerima program bantuan</span> pemerintah
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-orange-700">{{ $villageName }}</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-slate-200 to-orange-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
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
            <div class="stat-card bg-gradient-to-br from-slate-50 via-gray-50 to-zinc-50 rounded-3xl p-6 shadow-2xl border border-gray-200" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl mb-3">
                        <i class="fas fa-hand-holding-heart text-white text-xl"></i>
                                </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Detail Program Bantuan</h3>
                    <p class="text-gray-600 text-sm">Data real-time dari database</p>
                    <div class="mt-2 inline-flex items-center px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                        <i class="fas fa-circle text-green-500 mr-2 text-xs"></i>
                        {{ count($programDetails) }} Program Aktif
                        </div>
                    </div>

                <div class="space-y-3">
                    @forelse($programDetails as $index => $program)
                    <div class="group relative bg-white rounded-lg p-3 shadow-sm border border-gray-100 hover:shadow-md hover:scale-[1.005] transition-all duration-300 overflow-hidden">
                        <!-- Background Pattern -->
                        <div class="absolute top-0 right-0 w-20 h-20 opacity-5">
                            <div class="w-full h-full bg-gradient-to-br {{ $program['colors']['gradient'] }} rounded-full blur-xl"></div>
            </div>

                        <!-- Header -->
                        <div class="relative flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <div class="relative">
                                    <div class="w-8 h-8 bg-gradient-to-br {{ $program['colors']['gradient'] }} rounded-md flex items-center justify-center shadow-sm">
                                        <i class="{{ $program['icon'] }} text-white text-xs"></i>
                    </div>
                                    <div class="absolute -top-1 -right-1 w-4 h-4 bg-white rounded-full flex items-center justify-center shadow-sm">
                                        <span class="text-xs font-bold {{ $program['colors']['amount'] }}">{{ $index + 1 }}</span>
                </div>
                        </div>
                        <div>
                                    <h4 class="text-sm font-bold {{ $program['colors']['text'] }}">{{ $program['program'] }}</h4>
                                    <p class="text-xs {{ $program['colors']['subtext'] }}">{{ $program['description'] }}</p>
                        </div>
                        </div>
                        <div class="text-right">
                                <div class="text-base font-black {{ $program['colors']['amount'] }}">{{ number_format($program['unique_recipients']) }}</div>
                                <div class="text-xs {{ $program['colors']['subamount'] }}">KK</div>
                        </div>
        </div>

                        <!-- Stats Row -->
                        <div class="grid grid-cols-3 gap-2 mb-2">
                            <div class="text-center">
                                <div class="text-xs font-bold {{ $program['colors']['amount'] }}">{{ $program['percentage'] }}%</div>
                                <div class="text-xs {{ $program['colors']['subtext'] }}">Cakupan</div>
                    </div>
                            <div class="text-center">
                                <div class="text-xs font-bold {{ $program['colors']['amount'] }}">{{ number_format($program['total_recipients']) }}</div>
                                <div class="text-xs {{ $program['colors']['subtext'] }}">Total</div>
                </div>
                            <div class="text-center">
                                <div class="text-xs font-bold {{ $program['colors']['amount'] }}">{{ $program['avg_recipients'] }}</div>
                                <div class="text-xs {{ $program['colors']['subtext'] }}">Rata-rata</div>
                </div>
            </div>

                        <!-- Progress Bar -->
                        <div class="space-y-1">
                                <div class="flex justify-between items-center">
                                <span class="text-xs font-medium {{ $program['colors']['subtext'] }}">Progress</span>
                                <span class="text-xs font-bold {{ $program['colors']['amount'] }}">{{ $program['percentage'] }}%</span>
                                        </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5 overflow-hidden">
                                <div class="h-full bg-gradient-to-r {{ $program['colors']['bar'] }} rounded-full transition-all duration-2000 ease-out"
                                     style="width: {{ $program['percentage'] }}%"></div>
                </div>
            </div>

                        <!-- Hover Effect -->
                        <div class="absolute inset-0 bg-gradient-to-r {{ $program['colors']['gradient'] }} opacity-0 group-hover:opacity-5 transition-opacity duration-300 rounded-lg"></div>
                    </div>
                    @empty
                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-exclamation-triangle text-gray-400 text-3xl"></i>
                </div>
                        <h4 class="text-lg font-semibold text-gray-600 mb-2">Belum Ada Data Program</h4>
                        <p class="text-gray-500 text-sm">Data program bantuan akan muncul di sini</p>
                    </div>
                    @endforelse
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
                        'Menengah Ke Atas' => 'Menengah Ke Atas',
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
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($aidStats)) !!},
                datasets: [{
                    label: 'Program Bantuan',
                    data: {!! json_encode(array_values($aidStats)) !!},
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(139, 92, 246, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(236, 72, 153, 0.8)',
                        'rgba(14, 165, 233, 0.8)',
                        'rgba(34, 197, 94, 0.8)'
                    ],
                    borderColor: [
                        'rgba(59, 130, 246, 1)',
                        'rgba(16, 185, 129, 1)',
                        'rgba(139, 92, 246, 1)',
                        'rgba(245, 158, 11, 1)',
                        'rgba(239, 68, 68, 1)',
                        'rgba(236, 72, 153, 1)',
                        'rgba(14, 165, 233, 1)',
                        'rgba(34, 197, 94, 1)'
                    ],
                    borderWidth: 3,
                    hoverOffset: 10
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
                                size: 12,
                                weight: 'bold'
                            },
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
                                const label = context.label || '';
                                const value = context.parsed;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${label}: ${value} penerima (${percentage}%)`;
                            }
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeOutQuart',
                    animateRotate: true,
                    animateScale: true
                }
            }
        },
        dusunPopulation: {
            type: 'bar',
            data: {
                labels: @php
                    $labels = [];
                    $values = [];
                    if (!empty($dusunStats) && is_array($dusunStats)) {
                        $labels = array_keys($dusunStats);
                        $values = array_values($dusunStats);
                    } else {
                        $labels = ['Belum Ada Data'];
                        $values = [1];
                    }
                    echo json_encode($labels);
                @endphp,
                datasets: [{
                    label: 'Populasi Per Dusun',
                    data: @php
                        echo json_encode($values);
                    @endphp,
                    backgroundColor: '#3B82F6',
                    borderColor: '#1E40AF',
                    borderWidth: 2,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        },
        dusunAidBreakdown: {
            type: 'bar',
            data: {
                labels: @php
                    $dusunNames = array_keys($dusunStats);
                    echo json_encode($dusunNames);
                @endphp,
                datasets: @php
                    // Get all unique programs
                    $allPrograms = \App\Models\PenerimaBantuan::select('program')
                        ->distinct()
                        ->orderBy('program')
                        ->pluck('program')
                        ->toArray();

                    // Get data for each program per dusun
                    $datasets = [];
                    $colors = [
                        'rgba(239, 68, 68, 0.8)',   // PKH - Red
                        'rgba(59, 130, 246, 0.8)',  // PBI/BPJS - Blue
                        'rgba(16, 185, 129, 0.8)',  // SEMBAKO - Green
                        'rgba(139, 92, 246, 0.8)',  // BPJS DAERAH - Purple
                        'rgba(245, 158, 11, 0.8)',  // BLTDD - Yellow
                        'rgba(236, 72, 153, 0.8)',  // BST - Pink
                        'rgba(6, 182, 212, 0.8)',   // BLT_COVID - Cyan
                        'rgba(34, 197, 94, 0.8)',   // BPNT - Emerald
                        'rgba(168, 85, 247, 0.8)',  // BLT - Violet
                        'rgba(14, 165, 233, 0.8)'   // BSU - Sky
                    ];

                    foreach($allPrograms as $index => $program) {
                        $data = [];
                        foreach($dusunNames as $dusun) {
                            $count = \App\Models\PenerimaBantuan::whereHas('user', function($query) use ($dusun) {
                                $query->where('dusun', $dusun);
                            })->where('program', $program)->distinct('user_id')->count();
                            $data[] = $count;
                        }

                        $datasets[] = [
                            'label' => $program,
                            'data' => $data,
                            'backgroundColor' => $colors[$index % count($colors)],
                            'borderColor' => str_replace('0.8', '1', $colors[$index % count($colors)]),
                            'borderWidth' => 2,
                            'borderRadius' => 4,
                            'hoverBackgroundColor' => str_replace('0.8', '0.9', $colors[$index % count($colors)])
                        ];
                    }

                    echo json_encode($datasets);
                @endphp
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Distribusi Program Bantuan Per Dusun',
                        font: {
                            size: 16,
                            weight: 'bold'
                        },
                        padding: 20
                    },
                    legend: {
                        position: 'top',
                        labels: {
                            padding: 20,
                            font: {
                                size: 12,
                                weight: 'bold'
                            },
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
                                const label = context.dataset.label || '';
                                const value = context.parsed.y;
                                return `${label}: ${value} KK`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Dusun',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        title: {
                            display: true,
                            text: 'Jumlah KK',
                            font: {
                                size: 14,
                                weight: 'bold'
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
        houseStatus: {
            type: 'pie',
            data: {
                labels: {!! json_encode(array_map(function($key) {
                    $labels = [
                        '' => 'Tidak Diketahui',
                        'MS' => 'Milik Sendiri',
                        'SW' => 'Sewa'
                    ];
                    return $labels[$key] ?? $key;
                }, array_keys($houseStatusStats))) !!},
                datasets: [{
                    data: {!! json_encode(array_values($houseStatusStats)) !!},
                    backgroundColor: [
                        'rgba(96, 165, 250, 0.8)',
                        'rgba(52, 211, 153, 0.8)',
                        'rgba(167, 139, 250, 0.8)'
                    ],
                    borderColor: [
                        'rgba(96, 165, 250, 1)',
                        'rgba(52, 211, 153, 1)',
                        'rgba(167, 139, 250, 1)'
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
        houseQuality: {
            type: 'pie',
            data: {
                labels: {!! json_encode(array_map(function($key) {
                    $labels = [
                        '' => 'Tidak Diketahui',
                        'LH' => 'Layak Huni',
                        'TLH' => 'Tidak Layak Huni'
                    ];
                    return $labels[$key] ?? $key;
                }, array_keys($houseQualityStats))) !!},
                datasets: [{
                    data: {!! json_encode(array_values($houseQualityStats)) !!},
                    backgroundColor: [
                        'rgba(96, 165, 250, 0.8)',
                        'rgba(52, 211, 153, 0.8)',
                        'rgba(251, 113, 133, 0.8)'
                    ],
                    borderColor: [
                        'rgba(96, 165, 250, 1)',
                        'rgba(52, 211, 153, 1)',
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
                try {
                    // Debug logging
                    console.log('Creating chart:', chartName);
                    console.log('Chart config:', chartConfigs[chartName]);

                    // Check if data exists and is valid
                    if (chartConfigs[chartName] && chartConfigs[chartName].data && chartConfigs[chartName].data.datasets) {
                        // Validate data arrays
                        const datasets = chartConfigs[chartName].data.datasets;
                        let isValid = true;

                        datasets.forEach((dataset, index) => {
                            console.log(`Dataset ${index}:`, dataset);
                            console.log(`Dataset ${index} data type:`, typeof dataset.data);
                            console.log(`Dataset ${index} data is array:`, Array.isArray(dataset.data));
                            console.log(`Dataset ${index} data value:`, dataset.data);

                            if (!Array.isArray(dataset.data)) {
                                console.error('Invalid data format for chart:', chartName, 'Dataset data is not an array:', dataset.data);
                                isValid = false;
                            } else if (dataset.data.length === 0) {
                                console.warn('Empty data array for chart:', chartName);
                                // Convert empty array to [0] to prevent chart errors
                                dataset.data = [0];
                            }
                        });

                        if (isValid) {
                new Chart(canvas, chartConfigs[chartName]);

                // Hide loading after chart is created
                setTimeout(() => {
                    if (loadingEl) loadingEl.style.display = 'none';
                }, 500);
                        } else {
                            console.error('Invalid chart data for:', chartName);
                            if (loadingEl) loadingEl.innerHTML = '<i class="fas fa-exclamation-triangle mr-2"></i>Format data tidak valid';
                        }
                    } else {
                        console.error('Chart data not found for:', chartName);
                        if (loadingEl) loadingEl.innerHTML = '<i class="fas fa-exclamation-triangle mr-2"></i>Data tidak tersedia';
                    }
                } catch (error) {
                    console.error('Error creating chart:', chartName, error);
                    if (loadingEl) loadingEl.innerHTML = '<i class="fas fa-exclamation-triangle mr-2"></i>Error: ' + error.message;
                }
            }, 300);
        }
    });


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

