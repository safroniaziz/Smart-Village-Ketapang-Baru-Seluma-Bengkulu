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

/* Custom marker - Pin style */
.custom-marker {
    width: 32px;
    height: 45px;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.custom-marker::before {
    content: '';
    position: absolute;
    width: 32px;
    height: 32px;
    border-radius: 50% 50% 50% 0;
    transform: rotate(-45deg);
    border: 3px solid white;
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
    left: 0;
    top: 0;
}

.custom-marker::after {
    content: '';
    position: absolute;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: white;
    left: 50%;
    top: 8px;
    transform: translateX(-50%);
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.custom-marker:hover {
    transform: translateY(-5px) scale(1.15);
    z-index: 1000 !important;
}

.custom-marker:hover::before {
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
}

/* Circle area for land */
.land-circle {
    fill-opacity: 0.2;
    stroke-width: 2;
    stroke-opacity: 0.6;
    transition: all 0.3s ease;
}

.land-circle:hover {
    fill-opacity: 0.35;
    stroke-opacity: 1;
}

/* Mapbox Controls */
.mapboxgl-ctrl-group {
    border-radius: 8px !important;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
}

.mapboxgl-ctrl-group button {
    width: 36px !important;
    height: 36px !important;
}

.mapboxgl-ctrl-group button + button {
    border-top: 1px solid #e5e7eb !important;
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
                </div>
            </div>

            <!-- Search Bar -->
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                <div class="relative max-w-2xl">
                    <input
                        type="text"
                        id="searchLocation"
                        placeholder="🔍 Cari nama pemilik lahan atau NIK..."
                        class="w-full px-5 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300"
                    />
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
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

    // Initialize Map
    initMap();
});
</script>

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoianVydXNhbmtvZGluZyIsImEiOiJjbWNxcGYzM28wbGxtMm1vcjg1N3ptdDlmIn0.9oLmVq3VtghRi3MlaWFRyA';

let map, markers = [], allData = [];

const colors = [
    '#FF6B6B', '#4ECDC4', '#45B7D1', '#FFA07A', '#98D8C8',
    '#F7DC6F', '#BB8FCE', '#85C1E2', '#F8B739', '#52B788'
];

function initMap() {
    allData = @json($realData ?? []);
    const imgBase = '{{ asset('assets/images/gambar_lahan') }}';

    map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/satellite-streets-v12',
        center: [102.763257, -4.314632],
        zoom: 14,
        pitch: 45,
        bearing: 0
    });

    map.addControl(new mapboxgl.NavigationControl(), 'top-right');
    map.addControl(new mapboxgl.FullscreenControl(), 'top-right');

    const bounds = new mapboxgl.LngLatBounds();

    // Wait for map to load before adding sources
    map.on('load', () => {
        // Add circle source and layer
        map.addSource('land-circles', {
            type: 'geojson',
            data: {
                type: 'FeatureCollection',
                features: []
            }
        });

        map.addLayer({
            id: 'land-circles-layer',
            type: 'circle',
            source: 'land-circles',
            paint: {
                'circle-radius': [
                    'interpolate',
                    ['exponential', 2],
                    ['zoom'],
                    10, 2,
                    15, 10,
                    20, 100
                ],
                'circle-color': ['get', 'color'],
                'circle-opacity': 0.2,
                'circle-stroke-width': 2,
                'circle-stroke-color': ['get', 'color'],
                'circle-stroke-opacity': 0.6
            }
        });

        const features = [];

        allData.forEach((item, index) => {
            const lat = parseFloat(item.lat);
            const lng = parseFloat(item.long);
            if (isNaN(lat) || isNaN(lng)) return;

            const nik = (item.nik || '').trim();
            const name = item.nama_lengkap || 'Tidak diketahui';
            const imgUrl = (item.foto_path && item.foto_path.trim() !== '')
                ? `{{ asset('') }}${item.foto_path.replace(/^\//, '')}`
                : (nik && nik !== '-' ? `${imgBase}/${nik}.jpg` : null);

            const color = colors[index % colors.length];

            // Add circle feature
            features.push({
                type: 'Feature',
                geometry: {
                    type: 'Point',
                    coordinates: [lng, lat]
                },
                properties: {
                    color: color
                }
            });

            // Create custom pin marker
            const el = document.createElement('div');
            el.className = 'custom-marker';
            el.style.width = '32px';
            el.style.height = '45px';
            el.innerHTML = `<div style="position: relative; width: 100%; height: 100%;">
                <div style="position: absolute; left: 0; top: 0; width: 32px; height: 32px; background: ${color}; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); border: 3px solid white; box-shadow: 0 6px 20px rgba(0,0,0,0.3);"></div>
                <div style="position: absolute; width: 10px; height: 10px; background: white; border-radius: 50%; left: 50%; top: 8px; transform: translateX(-50%); box-shadow: 0 2px 4px rgba(0,0,0,0.2);"></div>
            </div>`;

            const popupContent = `
                <div class="popup-content">
                    <div class="popup-name"><i class="fas fa-map-marker-alt mr-2" style="color: ${color}"></i>${name}</div>
                    ${nik && nik !== '-' ? `<div class="popup-nik"><i class="fas fa-id-card mr-1"></i>${nik}</div>` : ''}
                    ${imgUrl ? `<img src="${imgUrl}" alt="${name}" onerror="this.style.display='none'" loading="lazy"/>` : ''}
                    <div class="popup-coords">
                        <i class="fas fa-crosshairs mr-1"></i>
                        ${lat.toFixed(6)}, ${lng.toFixed(6)}
                    </div>
                </div>
            `;

            const popup = new mapboxgl.Popup({ offset: 35, maxWidth: '320px' })
                .setHTML(popupContent);

            const marker = new mapboxgl.Marker({
                element: el,
                anchor: 'bottom'
            })
                .setLngLat([lng, lat])
                .setPopup(popup)
                .addTo(map);

            marker.itemData = item;
            markers.push(marker);
            bounds.extend([lng, lat]);
        });

        // Update circle source
        map.getSource('land-circles').setData({
            type: 'FeatureCollection',
            features: features
        });
    });

    if (!bounds.isEmpty()) {
        map.fitBounds(bounds, { padding: 50 });
    }

    setupSearch();
}

function setupSearch() {
    const searchInput = document.getElementById('searchLocation');
    if (!searchInput) return;

    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase().trim();

        if (query.length < 2) {
            markers.forEach(m => m.getElement().style.opacity = '1');
            return;
        }

        let found = false;
        markers.forEach((m) => {
            const name = (m.itemData.nama_lengkap || '').toLowerCase();
            const nik = (m.itemData.nik || '').toLowerCase();

            if (name.includes(query) || nik.includes(query)) {
                m.getElement().style.opacity = '1';

                if (!found) {
                    map.flyTo({
                        center: m.getLngLat(),
                        zoom: 17,
                        pitch: 60,
                        duration: 2000
                    });

                    setTimeout(() => m.togglePopup(), 500);
                    found = true;
                }
            } else {
                m.getElement().style.opacity = '0.3';
            }
        });
    });
}

function resetMapView() {
    if (!map || markers.length === 0) return;

    const bounds = new mapboxgl.LngLatBounds();
    markers.forEach(m => bounds.extend(m.getLngLat()));

    map.fitBounds(bounds, { padding: 50, pitch: 45, duration: 1500 });

    const searchInput = document.getElementById('searchLocation');
    if (searchInput) searchInput.value = '';

    markers.forEach(m => m.getElement().style.opacity = '1');
}
</script>
@endpush

