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
    border-radius: 20px !important;
    box-shadow: 0 25px 50px rgba(0,0,0,0.2) !important;
    border: none !important;
    max-width: 400px !important;
}

/* Ensure popup stays within viewport */
.mapboxgl-popup {
    max-height: calc(100vh - 100px) !important;
}

.modern-popup .mapboxgl-popup-content {
    max-height: calc(100vh - 120px) !important;
    overflow-y: auto !important;
}

.mapboxgl-popup-close-button {
    font-size: 18px !important;
    padding: 12px !important;
    right: 8px !important;
    top: 8px !important;
    color: #6b7280 !important;
    background: rgba(255,255,255,0.9) !important;
    border-radius: 50% !important;
    width: 40px !important;
    height: 40px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    transition: all 0.2s ease !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
    border: 2px solid #e5e7eb !important;
}

.mapboxgl-popup-close-button:hover {
    background: #f3f4f6 !important;
    color: #374151 !important;
    border-color: #d1d5db !important;
    transform: scale(1.05) !important;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
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

/* Enhanced Animations */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

@keyframes glow {
    0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
    50% { box-shadow: 0 0 30px rgba(59, 130, 246, 0.6); }
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

@keyframes bounce-subtle {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

/* Modern Card Hover Effects */
.modern-card {
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.modern-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
}

/* Gradient Text Animation */
.gradient-text {
    background: linear-gradient(45deg, #3B82F6, #8B5CF6, #EC4899, #F59E0B);
    background-size: 300% 300%;
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: gradientShift 3s ease infinite;
}

/* Button Hover Effects */
.btn-modern {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.btn-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-modern:hover::before {
    left: 100%;
}

/* Floating Elements */
.floating {
    animation: float 6s ease-in-out infinite;
}

.floating:nth-child(2) {
    animation-delay: -2s;
}

.floating:nth-child(3) {
    animation-delay: -4s;
}
</style>
@endpush

@section('content')
<!-- Modern Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 min-h-screen flex items-center">
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-purple-600/20"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>
    <div id="particles-peta" class="absolute inset-0"></div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-blue-500/20 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-32 right-16 w-32 h-32 bg-purple-500/20 rounded-full blur-2xl animate-pulse delay-1000"></div>
    <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-yellow-500/20 rounded-full blur-lg animate-pulse delay-500"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center min-h-[80vh]">
            <!-- Hero Content -->
            <div class="space-y-8 text-center lg:text-left">
                <!-- Badge -->
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-6 py-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-map-marked-alt text-white text-sm"></i>
                    </div>
                    <div class="text-left">
                        <div class="text-white font-semibold text-sm">Sistem Informasi Geografis</div>
                        <div class="text-blue-200 text-xs">Desa Ketapang Baru</div>
                    </div>
                </div>

                <!-- Main Title -->
                <div class="space-y-4" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-black leading-tight">
                        <span class="bg-gradient-to-r from-white via-blue-100 to-white bg-clip-text text-transparent">
                            Peta Digital
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-yellow-400 via-orange-400 to-yellow-500 bg-clip-text text-transparent">
                            Lahan Desa
                        </span>
                    </h1>
                    <p class="text-lg lg:text-xl text-blue-100/90 max-w-2xl leading-relaxed">
                        Eksplorasi interaktif <span class="font-semibold text-yellow-300">{{ count($realData ?? []) }} titik lahan</span> dengan teknologi pemetaan satelit terdepan untuk visualisasi geografis yang akurat dan real-time
                    </p>
                </div>

                <!-- Modern Stats Grid -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8" data-aos="fade-up" data-aos-delay="600">
                    <div class="group bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-500 hover:scale-105">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-map-pin text-white text-lg"></i>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-black text-white mb-1">{{ count($realData ?? []) }}</div>
                                <div class="text-xs text-blue-200 font-medium">Total Lokasi</div>
                            </div>
                        </div>
                        <div class="text-sm text-blue-100/80">Titik lahan tersebar</div>
                    </div>

                    <div class="group bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-500 hover:scale-105">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-camera text-white text-lg"></i>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-black text-white mb-1">{{ count(array_filter($realData ?? [], fn($item) => !empty($item['nik']) && $item['nik'] !== '-')) }}</div>
                                <div class="text-xs text-blue-200 font-medium">Foto Tersedia</div>
                            </div>
                        </div>
                        <div class="text-sm text-blue-100/80">Dokumentasi visual</div>
                    </div>

                    <div class="group bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-500 hover:scale-105">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-crosshairs text-white text-lg"></i>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-black text-white mb-1">100%</div>
                                <div class="text-xs text-blue-200 font-medium">Akurasi GPS</div>
                            </div>
                        </div>
                        <div class="text-sm text-blue-100/80">Presisi tinggi</div>
                    </div>

                    <div class="group bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-500 hover:scale-105">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-satellite text-white text-lg"></i>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-black text-white mb-1">3D</div>
                                <div class="text-xs text-blue-200 font-medium">View Mode</div>
                            </div>
                        </div>
                        <div class="text-sm text-blue-100/80">Mapbox GL JS</div>
                    </div>
                </div>

                <!-- Modern CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 relative z-10" data-aos="fade-up" data-aos-delay="800">
                    <a href="#map-section" class="group relative overflow-hidden bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold px-8 py-4 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-1 shadow-lg hover:shadow-2xl">
                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative flex items-center justify-center">
                            <i class="fas fa-rocket mr-3 text-lg"></i>
                            <span class="text-lg">Mulai Eksplorasi</span>
                        </div>
                    </a>
                    <a href="{{ route('tentang') }}" class="group bg-white/10 hover:bg-white/20 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-8 py-4 rounded-2xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-info-circle mr-3 text-lg"></i>
                            <span class="text-lg">Tentang Desa</span>
                        </div>
                    </a>
                </div>

                <!-- Feature Tags -->
                <div class="flex flex-wrap gap-3 text-sm" data-aos="fade-up" data-aos-delay="900">
                    <div class="flex items-center gap-2 bg-white/5 backdrop-blur-sm px-4 py-2 rounded-full border border-white/10">
                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-blue-100 font-medium">Real-time Data</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/5 backdrop-blur-sm px-4 py-2 rounded-full border border-white/10">
                        <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                        <span class="text-blue-100 font-medium">Satellite View</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/5 backdrop-blur-sm px-4 py-2 rounded-full border border-white/10">
                        <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                        <span class="text-blue-100 font-medium">Interactive</span>
                    </div>
                </div>
            </div>

            <!-- Right Side - Modern Dashboard Preview -->
            <div class="relative" data-aos="fade-left" data-aos-delay="300">
                <div class="relative bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-white/20 shadow-2xl hover:shadow-3xl transition-all duration-500 overflow-hidden">
                    <!-- Animated Background -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-purple-500/10 to-pink-500/10"></div>
                    <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-yellow-400/20 to-orange-500/20 rounded-full -translate-y-20 translate-x-20 animate-pulse"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-blue-400/20 to-purple-500/20 rounded-full translate-y-16 -translate-x-16 animate-pulse delay-1000"></div>

                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Header -->
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center gap-4">
                                <div class="p-4 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl shadow-lg">
                                    <i class="fas fa-globe-asia text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white">Dashboard</h3>
                                    <p class="text-blue-200">Sistem Pemetaan</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse shadow-lg shadow-green-400/50"></div>
                                <span class="text-green-300 text-sm font-medium">Live</span>
                            </div>
                        </div>

                        <!-- Modern Stats -->
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-map-pin text-white"></i>
                                    </div>
                                </div>
                                <div class="text-3xl font-black text-white mb-1">{{ count($realData ?? []) }}</div>
                                <div class="text-sm text-blue-200">Total Lokasi</div>
                            </div>
                            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-camera text-white"></i>
                                    </div>
                                </div>
                                <div class="text-3xl font-black text-white mb-1">{{ count(array_filter($realData ?? [], fn($item) => !empty($item['nik']) && $item['nik'] !== '-')) }}</div>
                                <div class="text-sm text-blue-200">Foto Tersedia</div>
                            </div>
                        </div>

                        <!-- Feature Highlights -->
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/10">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-satellite text-white"></i>
                                </div>
                                <div>
                                    <div class="text-white font-semibold">Satellite Imagery</div>
                                    <div class="text-blue-200 text-sm">High-resolution mapping</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/10">
                                <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-search-location text-white"></i>
                                </div>
                                <div>
                                    <div class="text-white font-semibold">Smart Search</div>
                                    <div class="text-blue-200 text-sm">Instant location finder</div>
                                </div>
                            </div>
                        </div>

                        <!-- Tech Stack -->
                        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
                            <div class="text-white font-bold mb-4 flex items-center gap-2">
                                <i class="fas fa-code text-blue-400"></i>
                                Powered By
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-xs font-bold rounded-full">Mapbox GL JS</span>
                                <span class="px-3 py-1.5 bg-gradient-to-r from-purple-500 to-purple-600 text-white text-xs font-bold rounded-full">3D Terrain</span>
                                <span class="px-3 py-1.5 bg-gradient-to-r from-green-500 to-green-600 text-white text-xs font-bold rounded-full">Real-time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Wave Transition -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-20">
            <defs>
                <linearGradient id="waveGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#f8fafc;stop-opacity:1" />
                    <stop offset="50%" style="stop-color:#ffffff;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#f1f5f9;stop-opacity:1" />
                </linearGradient>
            </defs>
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="url(#waveGradient)"></path>
        </svg>
    </div>
</section>

<!-- Modern Map Section -->
<section id="map-section" class="py-20 bg-gradient-to-br from-slate-50 via-white to-blue-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23e2e8f0" fill-opacity="0.3"%3E%3Ccircle cx="20" cy="20" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Modern Section Header -->
        <div class="relative text-center mb-16" data-aos="fade-up">
            <!-- Badge -->
            <div class="inline-flex items-center bg-gradient-to-r from-blue-500 via-purple-500 to-indigo-500 text-white px-8 py-4 rounded-2xl text-sm font-bold shadow-xl mb-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-50"></div>
                <i class="fas fa-globe-americas mr-3 text-yellow-300 text-lg relative z-10"></i>
                <span class="relative z-10">Sistem Pemetaan Digital Terdepan</span>
            </div>

            <!-- Main Title -->
            <h2 class="text-5xl lg:text-6xl font-black mb-6 leading-tight">
                <span class="bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 bg-clip-text text-transparent">
                    Eksplorasi Peta
                </span>
                <br>
                <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">
                    Lahan Digital
                </span>
            </h2>

            <!-- Subtitle -->
            <div class="max-w-4xl mx-auto mb-8">
                <p class="text-xl lg:text-2xl text-gray-600 leading-relaxed mb-4">
                    Teknologi pemetaan satelit canggih untuk visualisasi 
                    <span class="font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">{{ count($realData ?? []) }} titik lahan</span> 
                    dengan presisi tinggi
                </p>
                <p class="text-lg text-gray-500">
                    Powered by Mapbox GL JS • Real-time Data • Interactive 3D View
                </p>
            </div>

            <!-- Decorative Elements -->
            <div class="flex justify-center items-center gap-4 mb-8">
                <div class="w-16 h-1 bg-gradient-to-r from-transparent via-blue-500 to-transparent rounded-full"></div>
                <div class="w-3 h-3 bg-blue-500 rounded-full animate-pulse"></div>
                <div class="w-16 h-1 bg-gradient-to-r from-transparent via-purple-500 to-transparent rounded-full"></div>
            </div>
        </div>

        <!-- Modern Legend & Statistics -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12" data-aos="fade-up" data-aos-delay="200">
            <!-- Enhanced Legend Card -->
            <div class="group relative bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500">
                <!-- Gradient Header -->
                <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-600 p-6 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent"></div>
                    <div class="relative flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                                <i class="fas fa-map-signs text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-bold text-xl">Legenda Peta</h3>
                                <p class="text-indigo-100 text-sm">Panduan marker & simbol</p>
                            </div>
                        </div>
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-eye text-white text-sm"></i>
                        </div>
                    </div>
                </div>

                <!-- Legend Content -->
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex items-center gap-4 p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-lg">
                                <i class="fas fa-camera text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">Lahan Pribadi</div>
                                <div class="text-sm text-gray-600">Dengan dokumentasi foto</div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-3 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl border border-purple-100">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center shadow-lg">
                                <i class="fas fa-map-marker-alt text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">Lokasi Umum</div>
                                <div class="text-sm text-gray-600">Jalan, sawah, perbatasan</div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-100">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-lg">
                                <i class="fas fa-seedling text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">Tanpa Foto</div>
                                <div class="text-sm text-gray-600">Belum ada dokumentasi</div>
                            </div>
                        </div>
                    </div>

                    <!-- Color Info -->
                    <div class="mt-6 p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl border border-yellow-200">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-palette text-2xl text-orange-500"></i>
                            <div>
                                <div class="font-semibold text-gray-800">Warna Unik</div>
                                <div class="text-sm text-gray-600">Setiap marker memiliki warna berbeda untuk identifikasi mudah</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Statistics Card -->
            <div class="group relative bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500">
                <!-- Gradient Header -->
                <div class="bg-gradient-to-r from-orange-600 via-red-600 to-pink-600 p-6 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent"></div>
                    <div class="relative flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                                <i class="fas fa-chart-line text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-bold text-xl">Statistik Data</h3>
                                <p class="text-orange-100 text-sm">Ringkasan informasi lahan</p>
                            </div>
                        </div>
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-analytics text-white text-sm"></i>
                        </div>
                    </div>
                </div>

                <!-- Statistics Content -->
                <div class="p-6">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Total Locations -->
                        <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border border-blue-100">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <i class="fas fa-map-pin text-white text-2xl"></i>
                            </div>
                            <div class="text-4xl font-black text-blue-600 mb-2">{{ count($realData ?? []) }}</div>
                            <div class="text-lg font-semibold text-gray-700 mb-1">Total Lokasi</div>
                            <div class="text-sm text-gray-500">Titik lahan terdaftar</div>
                        </div>

                        <!-- Stats Grid -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border border-green-100">
                                <div class="text-2xl font-black text-green-600 mb-1">{{ count(array_filter($realData ?? [], fn($item) => !empty($item['nik']) && $item['nik'] !== '-')) }}</div>
                                <div class="text-sm font-medium text-gray-700">Foto Tersedia</div>
                            </div>
                            <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl border border-purple-100">
                                <div class="text-2xl font-black text-purple-600 mb-1">100%</div>
                                <div class="text-sm font-medium text-gray-700">Akurasi GPS</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Map Container -->
        <div class="relative bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="400">
            <!-- Modern Header -->
            <div class="bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-white/5 to-transparent"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400/20 to-purple-500/20 rounded-full -translate-y-16 translate-x-16"></div>
                
                <div class="relative flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                    <!-- Title Section -->
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-globe-americas text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-2xl mb-1">Peta Interaktif</h3>
                            <p class="text-blue-200 text-sm flex items-center gap-2">
                                <i class="fas fa-mouse-pointer text-xs"></i>
                                Klik marker untuk detail • Drag untuk navigasi • Scroll untuk zoom
                            </p>
                        </div>
                    </div>

                    <!-- Control Buttons -->
                    <div class="flex items-center gap-2">
                        <div class="flex bg-white/10 backdrop-blur-sm rounded-2xl p-1 border border-white/20">
                            <button onclick="if(typeof map !== 'undefined') map.zoomIn()" class="group p-3 hover:bg-white/20 text-white rounded-xl transition-all duration-200 hover:scale-110" title="Zoom In">
                                <i class="fas fa-plus group-hover:scale-110 transition-transform"></i>
                            </button>
                            <button onclick="if(typeof map !== 'undefined') map.zoomOut()" class="group p-3 hover:bg-white/20 text-white rounded-xl transition-all duration-200 hover:scale-110" title="Zoom Out">
                                <i class="fas fa-minus group-hover:scale-110 transition-transform"></i>
                            </button>
                            <button onclick="if(typeof map !== 'undefined') map.setPitch(map.getPitch() === 0 ? 45 : 0)" class="group p-3 hover:bg-white/20 text-white rounded-xl transition-all duration-200 hover:scale-110" title="Toggle 3D">
                                <i class="fas fa-cube group-hover:scale-110 transition-transform"></i>
                            </button>
                        </div>
                        
                        <div class="flex bg-white/10 backdrop-blur-sm rounded-2xl p-1 border border-white/20">
                            <button onclick="resetMapView()" class="group p-3 hover:bg-white/20 text-white rounded-xl transition-all duration-200 hover:scale-110" title="Reset View">
                                <i class="fas fa-home group-hover:scale-110 transition-transform"></i>
                            </button>
                            <button onclick="toggleMapStyle()" class="group p-3 hover:bg-white/20 text-white rounded-xl transition-all duration-200 hover:scale-110" title="Change Style">
                                <i class="fas fa-layer-group group-hover:scale-110 transition-transform"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modern Search & Controls -->
            <div class="p-6 bg-gradient-to-r from-slate-50 via-white to-blue-50 border-b border-gray-100">
                <div class="flex flex-col lg:flex-row gap-6 items-start lg:items-center justify-between">
                    <!-- Enhanced Search Bar -->
                    <div class="relative flex-1 max-w-2xl">
                        <div class="relative group">
                            <input
                                type="text"
                                id="searchLocation"
                                placeholder="Cari nama pemilik, NIK, atau lokasi lahan..."
                                class="w-full px-6 py-4 pl-14 pr-14 border-2 border-gray-200 rounded-2xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 bg-white shadow-lg hover:shadow-xl text-gray-700 placeholder-gray-400 group-hover:border-gray-300"
                            />
                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2 w-6 h-6 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-search text-white text-xs"></i>
                            </div>
                            <button
                                onclick="clearSearch()"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-gray-100 hover:bg-red-100 text-gray-400 hover:text-red-500 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110"
                                title="Clear search"
                            >
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-3">
                        <button
                            onclick="resetMapView()"
                            class="group bg-white hover:bg-blue-50 border-2 border-gray-200 hover:border-blue-300 text-gray-600 hover:text-blue-600 px-6 py-3 rounded-2xl transition-all duration-300 font-semibold text-sm flex items-center gap-3 shadow-lg hover:shadow-xl hover:scale-105"
                            title="Reset view (R)"
                        >
                            <i class="fas fa-home group-hover:scale-110 transition-transform"></i>
                            <span class="hidden sm:inline">Reset View</span>
                        </button>

                        <button
                            onclick="toggleKeyboardHelp()"
                            class="group bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white px-6 py-3 rounded-2xl transition-all duration-300 font-semibold text-sm flex items-center gap-3 shadow-lg hover:shadow-xl hover:scale-105"
                            title="Keyboard shortcuts"
                        >
                            <i class="fas fa-keyboard group-hover:scale-110 transition-transform"></i>
                            <span class="hidden sm:inline">Shortcuts</span>
                        </button>
                    </div>
                </div>

                <!-- Enhanced Status Indicators -->
                <div class="flex flex-wrap gap-4 mt-6">
                    <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-2xl border border-gray-200 shadow-sm">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-white text-xs"></i>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-700"><span id="markerCount">{{ count($realData ?? []) }}</span> Lokasi</div>
                            <div class="text-xs text-gray-500">Titik lahan terdaftar</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-2xl border border-gray-200 shadow-sm">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-satellite text-white text-xs"></i>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-700">Satellite</div>
                            <div class="text-xs text-gray-500">High resolution</div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-2xl border border-gray-200 shadow-sm">
                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                            <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-700">Live Data</div>
                            <div class="text-xs text-gray-500">Real-time updates</div>
                        </div>
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
let currentPopup = null; // Track current open popup

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


function loadMultipleImages(index, imageUrls) {
    const thumbnailContainer = document.getElementById(`thumbnails-${index}`);
    const mainImg = document.getElementById(`main-img-${index}`);

    if (!thumbnailContainer || !mainImg || imageUrls.length <= 1) return;

    let validImages = [];
    let loadedCount = 0;

    // Test each image URL
    imageUrls.forEach((url, imgIndex) => {
        const testImg = new Image();
        testImg.onload = function() {
            validImages.push({url, index: imgIndex});
            loadedCount++;

            if (loadedCount === imageUrls.length) {
                // All images tested, create thumbnails for valid ones
                if (validImages.length > 1) {
                    createThumbnails(thumbnailContainer, mainImg, validImages, index);
                }
            }
        };
        testImg.onerror = function() {
            loadedCount++;
            if (loadedCount === imageUrls.length && validImages.length > 1) {
                createThumbnails(thumbnailContainer, mainImg, validImages, index);
            }
        };
        testImg.src = url;
    });
}

function createThumbnails(container, mainImg, validImages, markerIndex) {
    container.innerHTML = '';

    validImages.forEach((imgData, thumbIndex) => {
        const thumb = document.createElement('img');
        thumb.src = imgData.url;
        thumb.style.cssText = `
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 6px;
            cursor: pointer;
            border: 2px solid ${thumbIndex === 0 ? '#3B82F6' : 'transparent'};
            transition: all 0.2s ease;
        `;

        thumb.onclick = () => {
            mainImg.src = imgData.url;
            // Update border for active thumbnail
            container.querySelectorAll('img').forEach(t => t.style.border = '2px solid transparent');
            thumb.style.border = '2px solid #3B82F6';
        };

        thumb.onmouseover = () => {
            if (thumb.style.border === '2px solid transparent') {
                thumb.style.border = '2px solid #94A3B8';
            }
        };

        thumb.onmouseout = () => {
            if (thumb.style.border === '2px solid rgb(148, 163, 184)') {
                thumb.style.border = '2px solid transparent';
            }
        };

        container.appendChild(thumb);
    });

    // Add counter badge if more than 1 image
    if (validImages.length > 1) {
        const badge = document.createElement('div');
        badge.style.cssText = `
            position: absolute;
            top: 8px;
            right: 8px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 10px;
            font-weight: bold;
        `;
        badge.textContent = `${validImages.length} foto`;
        mainImg.parentElement.style.position = 'relative';
        mainImg.parentElement.appendChild(badge);
    }
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
    console.log('📊 TOTAL TITIK LAHAN:', allData.length, 'records');
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

        let imageCount = 0;
        let noImageCount = 0;

        validData.forEach((item, index) => {
            const lat = parseFloat(item.lat);
            const lng = parseFloat(item.long);

            const nik = (item.nik || '').trim();
            const name = item.nama_lengkap || 'Tidak diketahui';
            const assetBase = '{{ asset('') }}';

            // Check for image availability (including multiple images)
            let imgUrl = null;
            let hasImage = false;
            let imageUrls = []; // Array to store multiple images

            if (item.foto_path && item.foto_path.trim() !== '') {
                // Use foto_path if available
                imgUrl = assetBase + item.foto_path.replace(/^\//, '');
                imageUrls.push(imgUrl);
                hasImage = true;
            } else if (nik && nik !== '-' && nik !== '') {
                // Try NIK-based image (check for multiple)
                imgUrl = `${imgBase}/${nik}.jpg`;
                imageUrls.push(imgUrl);

                // Check for additional images (-2, -3, etc.)
                for (let i = 2; i <= 5; i++) {
                    imageUrls.push(`${imgBase}/${nik}-${i}.jpg`);
                }
                hasImage = true;
            } else if (name && name !== 'Tidak diketahui') {
                // Try name-based image for data with NIK "-"
                const cleanName = name.trim().toUpperCase();
                imgUrl = `${imgBase}/${cleanName}.jpg`;
                imageUrls.push(imgUrl);

                // Check for additional images (-2, -3, etc.)
                for (let i = 2; i <= 5; i++) {
                    imageUrls.push(`${imgBase}/${cleanName}-${i}.jpg`);
                }
                hasImage = true;
                console.log(`Name-based image for "${name}": ${cleanName}.jpg (+ variants)`);
            }

            // Count images
            if (hasImage) {
                imageCount++;
            } else {
                noImageCount++;
            }

            const color = colors[index % colors.length];

            // Create marker exactly like potensi-wisata (minimal inline styles)
            const el = document.createElement('div');
            el.className = 'marker';
            el.style.width = '30px';
            el.style.height = '30px';
            el.style.backgroundSize = '100%';
            el.style.cursor = 'pointer';
            el.style.background = `linear-gradient(135deg, ${color} 0%, ${adjustBrightness(color, -20)} 100%)`;

            // Add icon based on image availability and location type
            const isLocationName = name.includes('JALAN') || name.includes('SAWAH') || name.includes('PERBATASAN') ||
                                 name.includes('GG ') || name.includes('GENTING') || name.includes('TANPA NAMA');

            if (hasImage) {
                if (isLocationName) {
                    el.innerHTML = `<i class="fas fa-map-marker-alt" style="color: white; font-size: 12px;"></i>`;
                    el.title = `${name} - Lokasi/Tempat (Ada foto)`;
                } else {
                    el.innerHTML = `<i class="fas fa-camera" style="color: white; font-size: 12px;"></i>`;
                    el.title = `${name} - Lahan Pribadi (Ada foto)`;
                }
            } else {
                el.innerHTML = `<i class="fas fa-seedling" style="color: white; font-size: 12px;"></i>`;
                el.title = `${name} - Tidak ada foto`;
            }

            const popupContent = `
                <div class="modern-popup-content" style="
                    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
                    max-width: 340px;
                    padding: 0;
                    border-radius: 16px;
                    overflow: hidden;
                    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
                    background: white;
                ">
                    <!-- Enhanced Header with better design -->
                    <div style="
                        background: linear-gradient(135deg, ${color}15, ${color}25);
                        border-bottom: 3px solid ${color};
                        padding: 16px;
                        position: relative;
                        overflow: hidden;
                    ">
                        <!-- Background pattern -->
                        <div style="
                            position: absolute;
                            top: -20px;
                            right: -20px;
                            width: 80px;
                            height: 80px;
                            background: ${color}20;
                            border-radius: 50%;
                        "></div>
                        <div style="
                            position: absolute;
                            bottom: -10px;
                            left: -10px;
                            width: 40px;
                            height: 40px;
                            background: ${color}15;
                            border-radius: 50%;
                        "></div>

                        <div style="position: relative; z-index: 2;">
                            <!-- Location type badge -->
                            <div style="
                                display: inline-flex;
                                align-items: center;
                                background: ${color};
                                color: white;
                                padding: 4px 12px;
                                border-radius: 20px;
                                font-size: 11px;
                                font-weight: 600;
                                text-transform: uppercase;
                                letter-spacing: 0.5px;
                                margin-bottom: 12px;
                            ">
                                ${isLocationName ? `
                                    <i class="fas fa-map-marker-alt" style="margin-right: 6px; font-size: 10px;"></i>
                                    Lokasi Umum
                                ` : `
                                    <i class="fas fa-seedling" style="margin-right: 6px; font-size: 10px;"></i>
                                    Lahan Pribadi
                                `}
                            </div>

                            <!-- Main title -->
                            <h3 style="
                                margin: 0;
                                font-size: 20px;
                                font-weight: 800;
                                line-height: 1.2;
                                color: #1f2937;
                                text-shadow: 0 1px 2px rgba(0,0,0,0.1);
                            ">${name}</h3>

                            <!-- Subtitle with location info -->
                            <p style="
                                margin: 8px 0 0 0;
                                font-size: 13px;
                                color: #6b7280;
                                font-weight: 500;
                                display: flex;
                                align-items: center;
                            ">
                                <i class="fas fa-map-pin" style="margin-right: 6px; color: ${color};"></i>
                                Desa Ketapang Baru, Kec. Semidang Alas Maras
                            </p>
                        </div>
                    </div>

                    <!-- Enhanced Content body -->
                    <div style="padding: 16px;">
                        ${hasImage && imageUrls.length > 0 ? `
                            <!-- Photo Gallery Section -->
                            <div style="
                                background: #f8fafc;
                                border-radius: 16px;
                                padding: 16px;
                                margin-bottom: 20px;
                                border: 1px solid #e2e8f0;
                            ">
                                <div style="
                                    display: flex;
                                    align-items: center;
                                    margin-bottom: 12px;
                                ">
                                    <i class="fas fa-camera" style="
                                        color: ${color};
                                        margin-right: 8px;
                                        font-size: 16px;
                                    "></i>
                                    <h4 style="
                                        margin: 0;
                                        font-size: 14px;
                                        font-weight: 700;
                                        color: #374151;
                                        text-transform: uppercase;
                                        letter-spacing: 0.5px;
                                    ">Dokumentasi Lahan</h4>
                                </div>

                                <div id="gallery-${index}">
                                    <!-- Main image display -->
                                    <div style="
                                        border-radius: 12px;
                                        overflow: hidden;
                                        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
                                        margin-bottom: 12px;
                                        position: relative;
                                    ">
                                        <img id="main-img-${index}"
                                             src="${imgUrl}"
                                             alt="${name}"
                                             style="
                                                 width: 100%;
                                                 height: 160px;
                                                 object-fit: cover;
                                                 display: block;
                                             "
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'"
                                             loading="lazy"/>
                                        <div style="
                                            height: 160px;
                                            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
                                            display: none;
                                            align-items: center;
                                            justify-content: center;
                                            color: #6b7280;
                                            font-size: 14px;
                                        ">
                                            <div style="text-align: center;">
                                                <i class="fas fa-image" style="font-size: 32px; margin-bottom: 8px; opacity: 0.5;"></i><br>
                                                <span style="font-weight: 600;">Foto tidak tersedia</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Thumbnail gallery for multiple images -->
                                    <div id="thumbnails-${index}" style="
                                        display: flex;
                                        gap: 6px;
                                        overflow-x: auto;
                                        padding: 4px 0;
                                    "></div>
                                </div>
                            </div>
                        ` : `
                            <!-- No Photo State -->
                            <div style="
                                margin-bottom: 20px;
                                height: 140px;
                                background: linear-gradient(135deg, #f8fafc, #f1f5f9);
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color: #6b7280;
                                font-size: 14px;
                                border-radius: 16px;
                                border: 2px dashed #cbd5e1;
                                position: relative;
                                overflow: hidden;
                            ">
                                <div style="
                                    position: absolute;
                                    top: -20px;
                                    right: -20px;
                                    width: 60px;
                                    height: 60px;
                                    background: ${color}10;
                                    border-radius: 50%;
                                "></div>
                                <div style="text-align: center; position: relative; z-index: 2;">
                                    <i class="fas fa-camera-retro" style="
                                        font-size: 36px;
                                        margin-bottom: 12px;
                                        opacity: 0.4;
                                        color: ${color};
                                    "></i><br>
                                    <span style="font-weight: 600; color: #374151;">Dokumentasi Belum Tersedia</span><br>
                                    <span style="font-size: 12px; opacity: 0.7;">Foto lahan akan segera ditambahkan</span>
                                </div>
                            </div>
                        `}

                        <!-- Information Cards Grid -->
                        <div style="
                            display: grid;
                            grid-template-columns: 1fr 1fr;
                            gap: 12px;
                            margin-bottom: 16px;
                        ">
                            <!-- Coordinates Card -->
                            <div style="
                                background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
                                border: 1px solid #0ea5e9;
                                border-radius: 12px;
                                padding: 12px;
                                position: relative;
                                overflow: hidden;
                            ">
                                <div style="
                                    position: absolute;
                                    top: -10px;
                                    right: -10px;
                                    width: 30px;
                                    height: 30px;
                                    background: #0ea5e920;
                                    border-radius: 50%;
                                "></div>
                                <div style="position: relative; z-index: 2;">
                                    <div style="
                                        display: flex;
                                        align-items: center;
                                        margin-bottom: 6px;
                                    ">
                                        <i class="fas fa-crosshairs" style="
                                            color: #0ea5e9;
                                            margin-right: 6px;
                                            font-size: 12px;
                                        "></i>
                                        <span style="
                                            font-size: 10px;
                                            color: #0369a1;
                                            font-weight: 700;
                                            text-transform: uppercase;
                                            letter-spacing: 0.5px;
                                        ">Koordinat GPS</span>
                                    </div>
                                    <div style="
                                        font-family: 'Courier New', monospace;
                                        font-size: 11px;
                                        color: #0c4a6e;
                                        font-weight: 600;
                                        line-height: 1.2;
                                    ">
                                        ${lat.toFixed(4)}°<br>
                                        ${lng.toFixed(4)}°
                                    </div>
                                </div>
                            </div>

                            <!-- Land Type Card -->
                            <div style="
                                background: linear-gradient(135deg, #f0fdf4, #dcfce7);
                                border: 1px solid #22c55e;
                                border-radius: 12px;
                                padding: 12px;
                                position: relative;
                                overflow: hidden;
                            ">
                                <div style="
                                    position: absolute;
                                    top: -10px;
                                    right: -10px;
                                    width: 30px;
                                    height: 30px;
                                    background: #22c55e20;
                                    border-radius: 50%;
                                "></div>
                                <div style="position: relative; z-index: 2;">
                                    <div style="
                                        display: flex;
                                        align-items: center;
                                        margin-bottom: 6px;
                                    ">
                                        <i class="fas fa-seedling" style="
                                            color: #22c55e;
                                            margin-right: 6px;
                                            font-size: 12px;
                                        "></i>
                                        <span style="
                                            font-size: 10px;
                                            color: #15803d;
                                            font-weight: 700;
                                            text-transform: uppercase;
                                            letter-spacing: 0.5px;
                                        ">Jenis Lahan</span>
                                    </div>
                                    <div style="
                                        font-size: 11px;
                                        color: #14532d;
                                        font-weight: 600;
                                        line-height: 1.2;
                                    ">
                                        ${item.jenis_lahan || 'Lahan Pertanian'}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div style="
                            display: flex;
                            gap: 8px;
                            margin-top: 16px;
                        ">
                            <button onclick="copyCoordinates(&quot;${lat.toFixed(6)}, ${lng.toFixed(6)}&quot;)" style="
                                flex: 1;
                                background: linear-gradient(135deg, ${color}, ${adjustBrightness(color, -10)});
                                color: white;
                                border: none;
                                border-radius: 10px;
                                padding: 10px 16px;
                                font-size: 12px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                gap: 6px;
                                box-shadow: 0 4px 12px ${color}30;
                            "
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px ${color}40'"
                            onmouseout="this.style.transform='translateY(0px)'; this.style.boxShadow='0 4px 12px ${color}30'"
                            title="Salin koordinat GPS">
                                <i class="fas fa-copy"></i>
                                <span>Salin Koordinat</span>
                            </button>

                            <button onclick="window.open(&quot;https://www.google.com/maps?q=${lat},${lng}&quot;, &quot;_blank&quot;)" style="
                                background: #f8fafc;
                                color: #374151;
                                border: 2px solid #e5e7eb;
                                border-radius: 10px;
                                padding: 10px 12px;
                                font-size: 12px;
                                cursor: pointer;
                                transition: all 0.3s ease;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            "
                            onmouseover="this.style.background='#f1f5f9'; this.style.borderColor='#d1d5db'"
                            onmouseout="this.style.background='#f8fafc'; this.style.borderColor='#e5e7eb'"
                            title="Buka di Google Maps">
                                <i class="fas fa-external-link-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;

            const popup = new mapboxgl.Popup({
                offset: 25, // Kembali ke offset normal
                maxWidth: '350px', // Kurangi lebar popup
                className: 'modern-popup',
                closeButton: true,
                closeOnClick: true // Auto close saat klik area lain
            }).setHTML(popupContent);

            // Create marker exactly like potensi-wisata (simple, no anchor/offset issues)
            const marker = new mapboxgl.Marker(el)
                .setLngLat([lng, lat])
                .setPopup(popup)
                .addTo(map);

            marker.itemData = item;
            marker.imageUrls = imageUrls; // Store image URLs for gallery

            // Add event listener for popup open to load multiple images
            popup.on('open', () => {
                // Close previous popup if exists
                if (currentPopup && currentPopup !== popup) {
                    currentPopup.remove();
                }
                currentPopup = popup;
                loadMultipleImages(index, imageUrls);
            });

            popup.on('close', () => {
                if (currentPopup === popup) {
                    currentPopup = null;
                }
            });
            markers.push(marker);
            bounds.extend([lng, lat]);
        });

        // Log image statistics
        console.log(`📊 Image Statistics:`);
        console.log(`✅ Expected to have images: ${imageCount}`);
        console.log(`❌ No image expected: ${noImageCount}`);
        console.log(`📈 Coverage: ${((imageCount / validData.length) * 100).toFixed(1)}%`);

        // Test actual image availability
        let actualImageCount = 0;
        let testedCount = 0;

        markers.forEach(marker => {
            const item = marker.itemData;
            const nik = (item.nik || '').trim();
            const name = item.nama_lengkap || '';

            let testUrl = null;
            if (item.foto_path && item.foto_path.trim() !== '') {
                testUrl = '{{ asset('') }}' + item.foto_path.replace(/^\//, '');
            } else if (nik && nik !== '-' && nik !== '') {
                testUrl = `${imgBase}/${nik}.jpg`;
            } else if (name && name !== 'Tidak diketahui') {
                testUrl = `${imgBase}/${name.trim().toUpperCase()}.jpg`;
            }

            if (testUrl) {
                const img = new Image();
                img.onload = function() {
                    actualImageCount++;
                    testedCount++;
                    if (testedCount === imageCount) {
                        console.log(`🎯 Actual Images Found: ${actualImageCount}/${imageCount} (${((actualImageCount/imageCount)*100).toFixed(1)}%)`);
                    }
                };
                img.onerror = function() {
                    testedCount++;
                    console.log(`❌ Image not found: ${testUrl}`);
                    if (testedCount === imageCount) {
                        console.log(`🎯 Actual Images Found: ${actualImageCount}/${imageCount} (${((actualImageCount/imageCount)*100).toFixed(1)}%)`);
                    }
                };
                img.src = testUrl;
            }
        });
    });

    // Auto-fit to show all markers on initial load
    if (!bounds.isEmpty()) {
        // Calculate appropriate padding and zoom based on number of markers (closer zoom)
        let padding = 40;
        let maxZoom = 16;

        if (validData.length <= 5) {
            padding = 60;
            maxZoom = 17;
        } else if (validData.length <= 15) {
            padding = 50;
            maxZoom = 16;
        } else if (validData.length <= 30) {
            padding = 40;
            maxZoom = 15;
        } else {
            padding = 30;
            maxZoom = 14;
        }

        // Fit bounds to show all markers with appropriate zoom
        console.log(`Auto-fitting map to ${validData.length} markers with padding: ${padding}, maxZoom: ${maxZoom}`);

        setTimeout(() => {
            map.fitBounds(bounds, {
                padding: padding,
                duration: 1500, // Faster animation
                maxZoom: maxZoom,
                linear: false // Smooth easing
            });
            console.log('Map auto-fitted to show all markers');
        }, 500); // Faster response

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

