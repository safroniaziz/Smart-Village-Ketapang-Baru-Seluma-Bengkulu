@extends('layouts.app-public')

@section('title', 'Peta Lahan - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link href="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css" rel="stylesheet" />
<style>
/* Hero gradient animation */
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

/* Card hover effects */
.stat-card {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.stat-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

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

/* Mapbox GL Map styling */
#map {
    height: 700px;
    border-radius: 20px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    z-index: 1;
}

/* Mapbox Popup styling */
.mapboxgl-popup-content {
    border-radius: 16px !important;
    padding: 20px !important;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2) !important;
    max-width: 320px !important;
}

.mapboxgl-popup-close-button {
    font-size: 24px !important;
    padding: 8px 12px !important;
    color: #6b7280 !important;
}

.mapboxgl-popup-close-button:hover {
    background: #f3f4f6 !important;
    color: #1f2937 !important;
}

.popup-content img {
    max-width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 12px;
    margin-top: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.popup-name {
    font-size: 18px;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 8px;
}

.popup-nik {
    font-size: 13px;
    color: #6b7280;
    background: #f3f4f6;
    padding: 4px 12px;
    border-radius: 6px;
    display: inline-block;
    margin-bottom: 8px;
}

.popup-coords {
    font-size: 11px;
    color: #9ca3af;
    margin-top: 8px;
}

/* Custom marker styles - exactly like potensi-wisata */
.marker {
    border: 3px solid white;
    border-radius: 50% 50% 50% 0;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    width: 30px;
    height: 30px;
    cursor: pointer;
}

/* Toast Notifications */
@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOutRight {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

/* Enhanced Popup Styles */
.mapboxgl-popup-content {
    padding: 0 !important;
    border-radius: 16px !important;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
    border: none !important;
    max-width: 340px !important;
}

.mapboxgl-popup-close-button {
    font-size: 20px !important;
    padding: 8px !important;
    right: 12px !important;
    top: 12px !important;
    color: rgba(255,255,255,0.8) !important;
    background: rgba(0,0,0,0.2) !important;
    border-radius: 50% !important;
    width: 32px !important;
    height: 32px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

.mapboxgl-popup-close-button:hover {
    background: rgba(0,0,0,0.4) !important;
    color: white !important;
}

/* Loading Animation */
.map-loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(255,255,255,0.9);
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    z-index: 1000;
}

.loading-spinner {
    width: 40px;
    height: 40px;
    border: 3px solid #f3f4f6;
    border-top: 3px solid #3b82f6;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 10px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden min-h-[calc(100vh-8rem)] md:min-h-[calc(100vh-10rem)] flex items-center hero-gradient pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6">
    <div class="absolute inset-0 bg-white/5"></div>
    <div id="particles-peta" class="absolute inset-0"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map-marked-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">PETA GEOGRAFIS</h2>
                            <p class="text-sm text-blue-100">Kecamatan Semidang Alas Maras</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Peta Lahan</span><br>
                        <span class="text-yellow-400 font-extrabold">Ketapang Baru</span>
                    </h1>

                    <!-- Badge Data Terkini -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-satellite mr-2 text-yellow-300 text-xs"></i>
                            Mapbox GL 3D View
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        Jelajahi <span class="font-semibold text-yellow-300">{{ count($realData ?? []) }} titik lokasi lahan</span> dengan peta interaktif berbasis satelit untuk visualisasi geografis yang akurat
                    </p>
                </div>

                <!-- Enhanced Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ count($realData ?? []) }}</div>
                        <div class="text-sm text-blue-100 font-medium">Total Lahan</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-map-pin text-green-300 mr-1"></i>
                            <span>Tersebar di desa</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ count(array_filter($realData ?? [], fn($item) => !empty($item['nik']) && $item['nik'] !== '-')) }}</div>
                        <div class="text-sm text-blue-100 font-medium">Dengan Foto</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-camera text-blue-300 mr-1"></i>
                            <span>Dokumentasi</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">100%</div>
                        <div class="text-sm text-blue-100 font-medium">Akurasi GPS</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-crosshairs text-orange-300 mr-1"></i>
                            <span>Presisi</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">~50m</div>
                        <div class="text-sm text-blue-100 font-medium">Radius Area</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-circle text-purple-300 mr-1"></i>
                            <span>Visualisasi</span>
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 relative z-10" data-aos="fade-up" data-aos-delay="800">
                    <a href="#map-section" class="group bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-map-marked-alt mr-2 text-base"></i>
                            <span class="text-base">Jelajahi Peta</span>
                        </div>
                    </a>
                    <a href="{{ route('tentang') }}" class="group bg-gradient-to-r from-yellow-400/20 to-orange-500/20 hover:from-yellow-400/30 hover:to-orange-500/30 backdrop-blur-md border-2 border-yellow-400/30 hover:border-yellow-400/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-info-circle mr-2 text-base"></i>
                            <span class="text-base">Profil Desa</span>
                        </div>
                    </a>
                </div>

                <!-- Map Features -->
                <div class="flex flex-wrap gap-2 text-sm" data-aos="fade-up" data-aos-delay="900">
                    <div class="flex items-center gap-1 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full border border-white/20">
                        <i class="fas fa-satellite text-green-300 text-xs"></i>
                        <span class="text-blue-100">Satellite</span>
                    </div>
                    <div class="flex items-center gap-1 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full border border-white/20">
                        <i class="fas fa-street-view text-yellow-300 text-xs"></i>
                        <span class="text-blue-100">Street View</span>
                    </div>
                    <div class="flex items-center gap-1 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full border border-white/20">
                        <i class="fas fa-search-location text-blue-300 text-xs"></i>
                        <span class="text-blue-100">Search</span>
                    </div>
                </div>
            </div>

            <!-- Right Side - Info Card -->
            <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                <div class="relative bg-gradient-to-br from-white via-blue-50 to-indigo-100 rounded-3xl p-6 shadow-2xl border border-blue-200/50 hover:shadow-3xl hover:scale-105 transition-all duration-500 overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-5">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full -translate-y-16 translate-x-16"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-cyan-400 to-blue-500 rounded-full translate-y-12 -translate-x-12"></div>
                    </div>

                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Header -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl shadow-lg">
                                    <i class="fas fa-map-marked text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">Peta Lahan</h3>
                                    <p class="text-sm text-gray-600">Desa Ketapang Baru</p>
                                </div>
                            </div>
                            <div class="animate-pulse">
                                <div class="w-3 h-3 bg-green-500 rounded-full shadow-lg shadow-green-500/50"></div>
                            </div>
                        </div>

                        <!-- Stats Grid -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-100">
                                <div class="text-3xl font-black text-blue-600 mb-1">{{ count($realData ?? []) }}</div>
                                <div class="text-sm text-gray-700 font-medium">Total Lokasi</div>
                            </div>
                            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-4 border border-green-100">
                                <div class="text-3xl font-black text-green-600 mb-1">{{ count(array_filter($realData ?? [], fn($item) => !empty($item['nik']) && $item['nik'] !== '-')) }}</div>
                                <div class="text-sm text-gray-700 font-medium">Foto Tersedia</div>
                            </div>
                        </div>

                        <!-- Features List -->
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-3 text-gray-700">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-pin text-blue-600 text-sm"></i>
                                </div>
                                <span class="text-sm font-medium">Marker interaktif dengan info detail</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-700">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-circle text-purple-600 text-sm"></i>
                                </div>
                                <span class="text-sm font-medium">Visualisasi area radius ~50m</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-700">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-search text-green-600 text-sm"></i>
                                </div>
                                <span class="text-sm font-medium">Pencarian cepat by nama/NIK</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-700">
                                <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-palette text-orange-600 text-sm"></i>
                                </div>
                                <span class="text-sm font-medium">Warna unik setiap lokasi</span>
                            </div>
                        </div>

                        <!-- Map Info -->
                        <div class="bg-gradient-to-r from-slate-50 to-gray-50 rounded-xl p-4 border border-gray-200">
                            <div class="text-xs font-bold text-gray-600 mb-2 uppercase tracking-wider">Technology:</div>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-blue-600 text-white text-xs font-medium rounded-full shadow-sm">Mapbox GL JS ⭐</span>
                                <span class="px-3 py-1 bg-purple-600 text-white text-xs font-medium rounded-full shadow-sm">3D Terrain</span>
                                <span class="px-3 py-1 bg-green-600 text-white text-xs font-medium rounded-full shadow-sm">Vector Tiles</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wave -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-16">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="white"></path>
        </svg>
    </div>
</section>

<!-- Map Section -->
<section id="map-section" class="py-16 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg mb-6">
                <i class="fas fa-map-marked-alt mr-2 text-yellow-300"></i>
                Peta Interaktif Digital
            </div>

            <h2 class="text-4xl font-bold mb-4" data-aos="fade-up">
                <span class="text-blue-600">Peta Lahan</span> Desa Ketapang Baru
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto mb-6"></div>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
                Jelajahi <span class="font-bold text-blue-600">{{ count($realData ?? []) }} titik lahan</span> dengan peta interaktif berbasis Google Maps
            </p>
        </div>

        <!-- Legenda & Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8" data-aos="fade-up">
            <!-- Legend -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 px-5 py-4">
                    <h3 class="text-white font-bold text-lg flex items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        Legenda Peta
                    </h3>
                </div>
                <div class="p-5 flex flex-wrap gap-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full border-3 border-white shadow-lg"></div>
                        <span class="text-sm font-medium text-gray-700">Marker Lahan</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full border-3 border-red-500 bg-red-500/30 shadow-lg"></div>
                        <span class="text-sm font-medium text-gray-700">Area ~50m</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-xs shadow-lg">
                            <i class="fas fa-image"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Dengan Foto</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-palette text-2xl text-yellow-600"></i>
                        <span class="text-sm font-medium text-gray-700">Warna Random</span>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-orange-600 via-red-600 to-pink-600 px-5 py-4">
                    <h3 class="text-white font-bold text-lg flex items-center">
                        <i class="fas fa-chart-bar mr-2"></i>
                        Statistik Lahan
                    </h3>
                </div>
                <div class="p-5 flex items-center justify-around">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-600 mb-1">{{ count($realData ?? []) }}</div>
                        <div class="text-sm text-gray-600">Total Lahan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600 mb-1">{{ count(array_filter($realData ?? [], fn($item) => !empty($item['nik']) && $item['nik'] !== '-')) }}</div>
                        <div class="text-sm text-gray-600">Dengan Foto</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-purple-600 mb-1">100%</div>
                        <div class="text-sm text-gray-600">Akurasi GPS</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Container -->
        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 px-6 py-5 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h3 class="text-white font-bold text-xl">Peta Interaktif Lahan Desa</h3>
                    <p class="text-blue-100 text-sm">Klik marker atau area untuk detail lahan</p>
                </div>
                <div class="flex space-x-2">
                    <button onclick="if(typeof map !== 'undefined') map.zoomIn()" class="p-3 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-200 hover:scale-110" title="Zoom In">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button onclick="if(typeof map !== 'undefined') map.zoomOut()" class="p-3 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-200 hover:scale-110" title="Zoom Out">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button onclick="if(typeof map !== 'undefined') map.setPitch(map.getPitch() === 0 ? 45 : 0)" class="p-3 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-200 hover:scale-110" title="Toggle 3D">
                        <i class="fas fa-cube"></i>
                    </button>
                    <button onclick="resetMapView()" class="p-3 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-200 hover:scale-110" title="Reset">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                    <button onclick="toggleMapStyle()" class="p-3 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-200 hover:scale-110" title="Toggle Map Style">
                        <i class="fas fa-layer-group"></i>
                    </button>
                </div>
            </div>

            <!-- Enhanced Search & Controls -->
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                <div class="flex flex-col lg:flex-row gap-4 items-start lg:items-center justify-between">
                    <!-- Search Bar -->
                    <div class="relative flex-1 max-w-2xl">
                        <input
                            type="text"
                            id="searchLocation"
                            placeholder="🔍 Cari nama pemilik lahan, NIK, atau jenis lahan..."
                            class="w-full px-5 py-3 pl-12 pr-12 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 bg-white shadow-sm"
                        />
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <button
                            onclick="clearSearch()"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-red-500 transition-colors p-1 rounded"
                            title="Clear search"
                        >
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- Map Controls -->
                    <div class="flex items-center gap-2">
                        <button
                            onclick="resetMapView()"
                            class="bg-white hover:bg-gray-50 border-2 border-gray-200 hover:border-blue-300 text-gray-600 hover:text-blue-600 px-4 py-2 rounded-lg transition-all duration-300 font-medium text-sm flex items-center gap-2"
                            title="Reset view (R)"
                        >
                            <i class="fas fa-home"></i>
                            <span class="hidden sm:inline">Reset</span>
                        </button>

                        <button
                            onclick="toggleKeyboardHelp()"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-all duration-300 font-medium text-sm flex items-center gap-2"
                            title="Keyboard shortcuts"
                        >
                            <i class="fas fa-keyboard"></i>
                            <span class="hidden sm:inline">Shortcuts</span>
                        </button>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="flex flex-wrap gap-3 mt-3 text-xs">
                    <div class="bg-white/80 px-3 py-1 rounded-full border border-gray-200 flex items-center gap-1">
                        <i class="fas fa-map-marker-alt text-blue-500"></i>
                        <span class="font-medium text-gray-600"><span id="markerCount">{{ count($realData ?? []) }}</span> Lokasi</span>
                    </div>
                    <div class="bg-white/80 px-3 py-1 rounded-full border border-gray-200 flex items-center gap-1">
                        <i class="fas fa-layer-group text-green-500"></i>
                        <span class="font-medium text-gray-600">Satellite View</span>
                    </div>
                    <div class="bg-white/80 px-3 py-1 rounded-full border border-gray-200 flex items-center gap-1">
                        <i class="fas fa-mouse-pointer text-purple-500"></i>
                        <span class="font-medium text-gray-600">Interactive</span>
                    </div>
                </div>
            </div>

            <div class="p-0">
                <div id="map" class="h-[700px] w-full"></div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    setTimeout(() => {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100
            });
        }
    }, 100);

    // Initialize Particles.js
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-peta', {
            particles: {
                number: { value: 60, density: { enable: true, value_area: 800 } },
                color: { value: '#ffffff' },
                shape: { type: 'circle' },
                opacity: { value: 0.1 },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#ffffff', opacity: 0.1, width: 1 },
                move: { enable: true, speed: 2 }
            }
        });
    }
});
</script>

<script>
// Set Mapbox access token
mapboxgl.accessToken = 'pk.eyJ1IjoianVydXNhbmtvZGluZyIsImEiOiJjbWNxcGYzM28wbGxtMm1vcjg1N3ptdDlmIn0.9oLmVq3VtghRi3MlaWFRyA';

// Check if Mapbox GL is available
if (typeof mapboxgl === 'undefined') {
    console.error('Mapbox GL JS is not loaded. Please check your internet connection.');
}

let map, markers = [], allData = [];

// Map styles untuk toggle
const mapStyles = [
    {
        name: 'Satellite + Roads',
        style: 'mapbox://styles/mapbox/satellite-streets-v12',
        icon: 'fas fa-satellite'
    },
    {
        name: 'Satellite Only',
        style: 'mapbox://styles/mapbox/satellite-v9',
        icon: 'fas fa-globe'
    },
    {
        name: 'Outdoors',
        style: 'mapbox://styles/mapbox/outdoors-v12',
        icon: 'fas fa-mountain'
    },
    {
        name: 'Streets',
        style: 'mapbox://styles/mapbox/streets-v12',
        icon: 'fas fa-road'
    }
];

let currentStyleIndex = 0;

// Updated modern color palette
const colors = [
    '#3B82F6', '#EF4444', '#10B981', '#F59E0B', '#8B5CF6',
    '#06B6D4', '#F97316', '#84CC16', '#EC4899', '#6366F1'
];

// Accurate coordinates for Ketapang Baru, Talo, Seluma, Bengkulu
// Updated based on actual geographic location
const KETAPANG_BARU_CENTER = [102.7528, -4.3089]; // More precise coordinates for Ketapang Baru village

// Helper functions
function adjustBrightness(hexColor, percent) {
    const hex = hexColor.replace('#', '');
    const num = parseInt(hex, 16);
    const amt = Math.round(2.55 * percent);
    const R = (num >> 16) + amt;
    const G = (num >> 8 & 0x00FF) + amt;
    const B = (num & 0x0000FF) + amt;
    return "#" + (0x1000000 + (R < 255 ? R < 1 ? 0 : R : 255) * 0x10000 +
        (G < 255 ? G < 1 ? 0 : G : 255) * 0x100 +
        (B < 255 ? B < 1 ? 0 : B : 255)).toString(16).slice(1);
}


function copyCoordinates(coords) {
    navigator.clipboard.writeText(coords).then(() => {
        // Show toast notification
        const toast = document.createElement('div');
        toast.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: #10B981;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            z-index: 10000;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            animation: slideInRight 0.3s ease;
        `;
        toast.innerHTML = '<i class="fas fa-check mr-2"></i>Koordinat tersalin!';
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = 'slideOutRight 0.3s ease forwards';
            setTimeout(() => toast.remove(), 300);
        }, 2000);
    });
}

function initMap() {
    console.log('Initializing map...');
    allData = @json($realData ?? []);
    console.log('Data loaded:', allData.length, 'records');
    const imgBase = '{{ asset('assets/images/gambar_lahan') }}';

    map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/satellite-streets-v12', // Satellite with roads, labels, and terrain
        center: KETAPANG_BARU_CENTER,
        zoom: 10, // Start with wider view, will auto-fit to markers
        pitch: 0,
        bearing: 0,
        antialias: true
    });

    // Enhanced controls
    map.addControl(new mapboxgl.NavigationControl({
        showCompass: true,
        showZoom: true,
        visualizePitch: true
    }), 'top-right');
    map.addControl(new mapboxgl.FullscreenControl(), 'top-right');

    // Add loading indicator
    const loadingDiv = document.createElement('div');
    loadingDiv.className = 'map-loading';
    loadingDiv.innerHTML = `
        <div class="loading-spinner"></div>
        <div style="text-align: center; font-weight: 600; color: #374151;">
            Memuat Peta Lahan...
        </div>
    `;
    map.getContainer().appendChild(loadingDiv);

    const bounds = new mapboxgl.LngLatBounds();

    // Wait for map to load before adding markers
    map.on('load', () => {

        // Remove loading indicator
        setTimeout(() => {
            const loading = map.getContainer().querySelector('.map-loading');
            if (loading) {
                loading.style.opacity = '0';
                setTimeout(() => loading.remove(), 300);
            }
        }, 1500);

        // Process and validate coordinate data
        const validData = allData.filter(item => {
            const lat = parseFloat(item.lat);
            const lng = parseFloat(item.long);
            // Better validation for Bengkulu region coordinates
            return !isNaN(lat) && !isNaN(lng) &&
                   lat >= -5.5 && lat <= -3.0 &&  // Bengkulu latitude range
                   lng >= 101.0 && lng <= 104.0;   // Bengkulu longitude range
        });

        console.log(`Loaded ${validData.length} valid coordinates out of ${allData.length} total records`);

        validData.forEach((item, index) => {
            const lat = parseFloat(item.lat);
            const lng = parseFloat(item.long);

            const nik = (item.nik || '').trim();
            const name = item.nama_lengkap || 'Tidak diketahui';
            const assetBase = '{{ asset('') }}';
            const imgUrl = (item.foto_path && item.foto_path.trim() !== '')
                ? assetBase + item.foto_path.replace(/^\//, '')
                : (nik && nik !== '-' ? `${imgBase}/${nik}.jpg` : null);

            const color = colors[index % colors.length];

            // Create marker exactly like potensi-wisata (minimal inline styles)
            const el = document.createElement('div');
            el.className = 'marker';
            el.style.width = '30px';
            el.style.height = '30px';
            el.style.backgroundSize = '100%';
            el.style.cursor = 'pointer';
            el.style.background = `linear-gradient(135deg, ${color} 0%, ${adjustBrightness(color, -20)} 100%)`;

            const popupContent = `
                <div class="modern-popup-content" style="
                    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
                    max-width: 320px;
                    padding: 0;
                    border-radius: 16px;
                    overflow: hidden;
                    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
                ">
                    <!-- Header with gradient -->
                    <div style="
                        background: linear-gradient(135deg, ${color}, ${adjustBrightness(color, -20)});
                        padding: 16px;
                        color: white;
                        position: relative;
                    ">
                        <div style="
                            position: absolute;
                            top: 0;
                            right: 0;
                            width: 60px;
                            height: 60px;
                            background: rgba(255,255,255,0.1);
                            border-radius: 0 0 0 60px;
                        "></div>

                        <div style="position: relative; z-index: 2;">
                            <div style="
                                display: flex;
                                align-items: center;
                                margin-bottom: 8px;
                            ">
                                <i class="fas fa-seedling" style="
                                    font-size: 18px;
                                    margin-right: 8px;
                                    color: rgba(255,255,255,0.9);
                                "></i>
                                <h3 style="
                                    margin: 0;
                                    font-size: 16px;
                                    font-weight: 700;
                                    line-height: 1.2;
                                ">${name}</h3>
                            </div>

                            ${nik && nik !== '-' ? `
                                <div style="
                                    display: flex;
                                    align-items: center;
                                    font-size: 12px;
                                    opacity: 0.9;
                                ">
                                    <i class="fas fa-id-card" style="margin-right: 6px; width: 12px;"></i>
                                    <span>${nik}</span>
                                </div>
                            ` : ''}
                        </div>
                    </div>

                    <!-- Content body -->
                    <div style="padding: 16px;">
                        ${imgUrl ? `
                            <div style="
                                margin-bottom: 12px;
                                border-radius: 12px;
                                overflow: hidden;
                                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                            ">
                                <img src="${imgUrl}"
                                     alt="${name}"
                                     style="
                                         width: 100%;
                                         height: 160px;
                                         object-fit: cover;
                                         display: block;
                                     "
                                     onerror="this.parentElement.style.display=&quot;none&quot;"
                                     loading="lazy"/>
                            </div>
                        ` : ''}

                        <!-- Coordinates with better styling -->
                        <div style="
                            background: #F8FAFC;
                            border: 1px solid #E2E8F0;
                            border-radius: 8px;
                            padding: 12px;
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                        ">
                            <div>
                                <div style="
                                    font-size: 11px;
                                    color: #64748B;
                                    font-weight: 500;
                                    text-transform: uppercase;
                                    letter-spacing: 0.5px;
                                    margin-bottom: 2px;
                                ">Koordinat</div>
                                <div style="
                                    font-family: Monaco, Courier New, monospace;
                                    font-size: 13px;
                                    color: #1E293B;
                                    font-weight: 600;
                                ">${lat.toFixed(6)}, ${lng.toFixed(6)}</div>
                            </div>
                            <button onclick="copyCoordinates(&quot;${lat.toFixed(6)}, ${lng.toFixed(6)}&quot;)" style="
                                background: ${color};
                                color: white;
                                border: none;
                                border-radius: 6px;
                                padding: 6px 8px;
                                font-size: 12px;
                                cursor: pointer;
                                transition: all 0.2s;
                            " title="Copy coordinates">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>

                        <!-- Additional info if available -->
                        ${item.jenis_lahan ? `
                            <div style="
                                margin-top: 12px;
                                display: flex;
                                align-items: center;
                                font-size: 13px;
                                color: #4B5563;
                            ">
                                <i class="fas fa-tag" style="margin-right: 8px; color: ${color};"></i>
                                <span style="font-weight: 500;">${item.jenis_lahan}</span>
                            </div>
                        ` : ''}
                    </div>
                </div>
            `;

            const popup = new mapboxgl.Popup({ offset: 25, maxWidth: '320px' })
                .setHTML(popupContent);

                // Create marker exactly like potensi-wisata (simple, no anchor/offset issues)
            const marker = new mapboxgl.Marker(el)
                .setLngLat([lng, lat])
                .setPopup(popup)
                .addTo(map);

            marker.itemData = item;
            markers.push(marker);
            bounds.extend([lng, lat]);
        });
    });

    // Auto-fit to show all markers on initial load
    if (!bounds.isEmpty()) {
        // Calculate appropriate padding and zoom based on number of markers
        let padding = 60;
        let maxZoom = 15;

        if (validData.length <= 5) {
            padding = 100;
            maxZoom = 16;
        } else if (validData.length <= 15) {
            padding = 80;
            maxZoom = 15;
        } else if (validData.length <= 30) {
            padding = 60;
            maxZoom = 14;
        } else {
            padding = 40;
            maxZoom = 13;
        }

        // Fit bounds to show all markers with appropriate zoom
        console.log(`Auto-fitting map to ${validData.length} markers with padding: ${padding}, maxZoom: ${maxZoom}`);

        setTimeout(() => {
            map.fitBounds(bounds, {
                padding: padding,
                duration: 2500,
                maxZoom: maxZoom,
                linear: false // Smooth easing
            });
            console.log('Map auto-fitted to show all markers');
        }, 1000); // Wait for map to fully load

    } else {
        // Fallback to Ketapang Baru center if no valid coordinates
        map.flyTo({
            center: KETAPANG_BARU_CENTER,
            zoom: 13,
            duration: 2000
        });
    }

    // Add map interaction enhancements
    enhanceMapInteractions();

    setupSearch();
}

function enhanceMapInteractions() {
    // Add keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.target.tagName === 'INPUT') return;

        switch(e.code) {
            case 'Equal':
            case 'NumpadAdd':
                e.preventDefault();
                map.zoomIn();
                break;
            case 'Minus':
            case 'NumpadSubtract':
                e.preventDefault();
                map.zoomOut();
                break;
            case 'KeyR':
                e.preventDefault();
                resetMapView();
                break;
        }
    });
}

function resetMapView() {
    if (markers.length > 0) {
        const bounds = new mapboxgl.LngLatBounds();
        markers.forEach(marker => bounds.extend(marker.getLngLat()));

        map.fitBounds(bounds, {
            padding: 80,
            duration: 1500
        });
    } else {
        map.flyTo({
            center: KETAPANG_BARU_CENTER,
            zoom: 15,
            duration: 1500
        });
    }
}

function setupSearch() {
    const searchInput = document.getElementById('searchLocation');
    if (!searchInput) return;

    let searchTimeout;

    // Add search enhancements
    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase().trim();

        // Clear previous timeout
        clearTimeout(searchTimeout);

        // Debounce search for better performance
        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 300);
    });

    // Add Enter key support
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const query = e.target.value.toLowerCase().trim();
            performSearch(query, true); // Force search even if less than 2 chars
        }
    });
}

function performSearch(query, force = false) {
    if (!force && query.length < 2) {
        // Reset all markers to visible
        markers.forEach(m => {
            const el = m.getElement();
            el.style.opacity = '1';
            el.style.transform = el.style.transform.replace(/scale\([^)]*\)/, 'scale(1)');
            el.style.filter = 'none';
        });
        return;
    }

    let foundMarkers = [];
    let exactMatch = null;

    markers.forEach((m) => {
        const name = (m.itemData.nama_lengkap || '').toLowerCase();
        const nik = (m.itemData.nik || '').toLowerCase();
        const jenis = (m.itemData.jenis_lahan || '').toLowerCase();

        const nameMatch = name.includes(query);
        const nikMatch = nik.includes(query);
        const jenisMatch = jenis.includes(query);

        if (nameMatch || nikMatch || jenisMatch) {
            const el = m.getElement();
            el.style.opacity = '1';
            el.style.transform = 'scale(1.2)';
            el.style.filter = 'drop-shadow(0 0 10px rgba(59, 130, 246, 0.8))';

            foundMarkers.push(m);

            // Check for exact match
            if (name === query || nik === query) {
                exactMatch = m;
            }
        } else {
            const el = m.getElement();
            el.style.opacity = '0.3';
            el.style.transform = 'scale(0.8)';
            el.style.filter = 'grayscale(100%)';
        }
    });

    // Handle search results
    if (foundMarkers.length > 0) {
        // Focus on exact match or first result
        const targetMarker = exactMatch || foundMarkers[0];

        if (foundMarkers.length === 1) {
            // Single result - zoom to marker
            map.flyTo({
                center: targetMarker.getLngLat(),
                zoom: Math.max(map.getZoom(), 17),
                duration: 1500,
                curve: 1.2
            });

            // Open popup after animation
            setTimeout(() => {
                targetMarker.togglePopup();
            }, 800);

        } else if (foundMarkers.length <= 10) {
            // Multiple results but manageable - fit bounds to show all
            const bounds = new mapboxgl.LngLatBounds();
            foundMarkers.forEach(marker => bounds.extend(marker.getLngLat()));

            map.fitBounds(bounds, {
                padding: 100,
                duration: 1500,
                maxZoom: 16
            });
        } else {
            // Too many results - just highlight them without changing view
            showSearchResultsNotification(foundMarkers.length);
        }

    } else {
        // No results found
        showNoResultsNotification(query);
    }
}

function showSearchResultsNotification(count) {
    const notification = createNotification(
        `<i class="fas fa-search mr-2"></i>Ditemukan ${count} hasil pencarian`,
        'info'
    );
}

function showNoResultsNotification(query) {
    const notification = createNotification(
        `<i class="fas fa-exclamation-circle mr-2"></i>Tidak ada hasil untuk "${query}"`,
        'warning'
    );
}

function createNotification(message, type = 'info') {
    const colors = {
        'info': '#3B82F6',
        'warning': '#F59E0B',
        'success': '#10B981',
        'error': '#EF4444'
    };

    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 80px;
        right: 20px;
        background: ${colors[type]};
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        z-index: 10000;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        animation: slideInRight 0.4s ease;
        max-width: 300px;
    `;
    notification.innerHTML = message;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.4s ease forwards';
        setTimeout(() => notification.remove(), 400);
    }, 3000);

    return notification;
}

// Additional helper functions
function clearSearch() {
    const searchInput = document.getElementById('searchLocation');
    if (searchInput) {
        searchInput.value = '';
        performSearch('', true); // Reset all markers
        searchInput.focus();
    }
}

function toggleKeyboardHelp() {
    const existingModal = document.getElementById('keyboardHelpModal');
    if (existingModal) {
        existingModal.remove();
        return;
    }

    const modal = document.createElement('div');
    modal.id = 'keyboardHelpModal';
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,0.7);
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.3s ease;
    `;

    modal.innerHTML = `
        <div style="
            background: white;
            border-radius: 16px;
            padding: 24px;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            animation: scaleIn 0.3s ease;
        ">
            <div style="
                display: flex;
                justify-content: between;
                align-items: center;
                margin-bottom: 20px;
                border-bottom: 2px solid #f1f5f9;
                padding-bottom: 12px;
            ">
                <h3 style="
                    margin: 0;
                    color: #1e293b;
                    font-size: 20px;
                    font-weight: 700;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                ">
                    <i class="fas fa-keyboard text-blue-500"></i>
                    Keyboard Shortcuts
                </h3>
                <button onclick="toggleKeyboardHelp()" style="
                    background: none;
                    border: none;
                    font-size: 20px;
                    color: #64748b;
                    cursor: pointer;
                    padding: 4px;
                    border-radius: 4px;
                    transition: all 0.2s;
                " onmouseover="this.style.background=&quot;#f1f5f9&quot;" onmouseout="this.style.background=&quot;none&quot;">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div style="space-y: 12px;">
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #f1f5f9;">
                    <span style="color: #475569; font-weight: 500;">Zoom In</span>
                    <kbd style="background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-family: monospace; font-size: 12px;">+ / Scroll Up</kbd>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #f1f5f9;">
                    <span style="color: #475569; font-weight: 500;">Zoom Out</span>
                    <kbd style="background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-family: monospace; font-size: 12px;">- / Scroll Down</kbd>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #f1f5f9;">
                    <span style="color: #475569; font-weight: 500;">Reset View</span>
                    <kbd style="background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-family: monospace; font-size: 12px;">R</kbd>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #f1f5f9;">
                    <span style="color: #475569; font-weight: 500;">Search</span>
                    <kbd style="background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-family: monospace; font-size: 12px;">Enter</kbd>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0;">
                    <span style="color: #475569; font-weight: 500;">Pan Map</span>
                    <kbd style="background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-family: monospace; font-size: 12px;">Drag / Arrow Keys</kbd>
                </div>
            </div>

            <div style="
                margin-top: 20px;
                padding-top: 16px;
                border-top: 1px solid #f1f5f9;
                text-align: center;
            ">
                <p style="
                    margin: 0;
                    color: #64748b;
                    font-size: 14px;
                    font-style: italic;
                ">
                    💡 Hover markers for details, click for more info
                </p>
            </div>
        </div>
    `;

    // Close on backdrop click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            toggleKeyboardHelp();
        }
    });

    document.body.appendChild(modal);
}

// Add CSS animations for modal
const modalStyles = document.createElement('style');
modalStyles.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.9) translateY(-20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
`;
document.head.appendChild(modalStyles);

function toggleMapStyle() {
    if (!map) return;

    // Cycle through map styles
    currentStyleIndex = (currentStyleIndex + 1) % mapStyles.length;
    const newStyle = mapStyles[currentStyleIndex];

    // Change map style
    map.setStyle(newStyle.style);

    // Show notification
    const notification = createNotification(
        `<i class="${newStyle.icon} mr-2"></i>Switched to ${newStyle.name}`,
        'info'
    );

    // Re-add markers after style loads
    map.once('styledata', () => {
        // Markers are automatically preserved in Mapbox GL JS v2+
        console.log(`Map style changed to: ${newStyle.name}`);
    });
}

function resetMapView() {
    if (!map || markers.length === 0) return;

    const bounds = new mapboxgl.LngLatBounds();
    markers.forEach(m => bounds.extend(m.getLngLat()));

    map.fitBounds(bounds, { padding: 50, duration: 1500 });

    const searchInput = document.getElementById('searchLocation');
    if (searchInput) searchInput.value = '';

    markers.forEach(m => m.getElement().style.opacity = '1');
}

// Initialize everything when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Check if required libraries are loaded
    if (typeof mapboxgl === 'undefined') {
        console.error('Mapbox GL JS not loaded');
        return;
    }

    // Check if map container exists
    const mapContainer = document.getElementById('map');
    if (!mapContainer) {
        console.error('Map container not found');
        return;
    }

    // Initialize Map after all functions are defined
    try {
        initMap();
        console.log('Map initialized successfully');
    } catch (error) {
        console.error('Error initializing map:', error);
    }
});
</script>
@endpush

