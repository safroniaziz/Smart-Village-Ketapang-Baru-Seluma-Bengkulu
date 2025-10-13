@extends('layouts.app-public')

@section('title', 'Peta Desa - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-Ho3Q0RyY4wQtwj0Q1sS2mZ0b7N2b5VQQl9Z4b6VtqvH8lJ0m6EJ2lT2qYq8J2b6P9m1oX4m0m7W2YqFqSxq2aA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.aos-disabled [data-aos] { opacity: 1 !important; transform: none !important; }
#map {
    height: 700px;
    border-radius: 20px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}
.mapboxgl-popup-content {
    border-radius: 16px;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    padding: 20px;
    font-family: 'Inter', sans-serif;
    max-width: 320px;
}
.mapboxgl-popup-tip {
    display: none;
}
.mapboxgl-popup-close-button {
    font-size: 24px;
    padding: 8px;
    color: #6b7280;
}
.mapboxgl-popup-close-button:hover {
    background: #f3f4f6;
    color: #1f2937;
}
.popup-content img {
    max-width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 12px;
    display: block;
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
.marker {
    background-size: cover;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    border: 3px solid white;
    box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
}
.marker:hover {
    transform: scale(1.2);
    box-shadow: 0 8px 12px rgba(0,0,0,0.3);
    z-index: 10;
}
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)] flex items-center pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100"></div>

    <!-- Particle.js Container -->
    <div id="particles-peta" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20" data-aos="fade-up" data-aos-delay="300">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">GEOGRAFIS DESA</h2>
                            <p class="text-sm text-blue-100">Peta Interaktif Digital</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Peta</span><br>
                        <span class="text-yellow-400 font-extrabold">Desa</span>
                    </h1>

                    <!-- Badge -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-map-marked-alt mr-2 text-yellow-300 text-xs"></i>
                            Peta Interaktif & Detail
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Eksplorasi peta desa interaktif dengan informasi detail setiap wilayah, batas dusun, dan
                        <span class="font-semibold text-yellow-300">fasilitas umum terkini</span>
                    </p>

                    <!-- Enhanced Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-6xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">24.771</div>
                                <i class="fas fa-globe text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Hektar Luas</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-expand-arrows-alt text-green-300 mr-1"></i>
                                Total area desa
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">3</div>
                                <i class="fas fa-map-marker-alt text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Dusun</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-layer-group text-blue-300 mr-1"></i>
                                Wilayah administratif
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">12</div>
                                <i class="fas fa-home text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">RT/RW</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-users text-orange-300 mr-1"></i>
                                Unit terkecil
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">100%</div>
                                <i class="fas fa-check-circle text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Terpetakan</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-satellite text-green-300 mr-1"></i>
                                Digital mapping
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Animated Wave -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-16">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="white"></path>
        </svg>
    </div>
</section>

<!-- Map Section -->
<section class="py-16 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                Jelajahi <span class="font-bold text-blue-600">{{ count($realData ?? []) }} titik lahan</span> dengan peta interaktif yang menampilkan detail setiap lokasi
            </p>

            <!-- Map Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white rounded-xl p-4 shadow-md border-2 border-blue-100">
                    <div class="text-3xl font-bold text-blue-600 mb-1">{{ count($realData ?? []) }}</div>
                    <div class="text-sm text-gray-600 font-medium">Total Lahan</div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-md border-2 border-green-100">
                    <div class="text-3xl font-bold text-green-600 mb-1">100%</div>
                    <div class="text-sm text-gray-600 font-medium">Terpetakan</div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-md border-2 border-purple-100">
                    <div class="text-3xl font-bold text-purple-600 mb-1">GPS</div>
                    <div class="text-sm text-gray-600 font-medium">Akurat</div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-md border-2 border-orange-100">
                    <div class="text-3xl font-bold text-orange-600 mb-1">Live</div>
                    <div class="text-sm text-gray-600 font-medium">Real-time</div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden" data-aos="fade-right">
                    <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 px-6 py-5 flex justify-between items-center">
                        <div>
                            <h3 class="text-white font-bold text-lg">Peta Interaktif</h3>
                            <p class="text-blue-100 text-sm">Klik marker untuk detail</p>
                        </div>
                        <div class="flex space-x-2">
                            <button onclick="map.zoomIn()" class="p-3 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-200 hover:scale-110" title="Zoom In">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button onclick="map.zoomOut()" class="p-3 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-200 hover:scale-110" title="Zoom Out">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button onclick="resetMapView()" class="p-3 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-200 hover:scale-110" title="Reset">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                        <div class="relative">
                            <input
                                type="text"
                                id="searchLocation"
                                placeholder="🔍 Cari nama pemilik lahan..."
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

            <div class="lg:col-span-1 space-y-6">
                <!-- Legend -->
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden" data-aos="fade-left">
                    <div class="bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 px-6 py-5">
                        <h3 class="text-white font-bold text-lg flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Legenda Peta
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-3 p-3 bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full border-4 border-white shadow-lg flex-shrink-0"></div>
                            <div>
                                <div class="font-semibold text-gray-900">Marker Lahan</div>
                                <div class="text-xs text-gray-600">Pin lokasi lahan</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gradient-to-r from-red-50 to-orange-50 rounded-xl">
                            <div class="w-10 h-10 rounded-full border-4 border-red-500 bg-red-500/30 shadow-lg flex-shrink-0"></div>
                            <div>
                                <div class="font-semibold text-gray-900">Area Lahan</div>
                                <div class="text-xs text-gray-600">Visualisasi area ~50m</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white text-sm font-bold shadow-lg flex-shrink-0">
                                <i class="fas fa-image"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Foto Lahan</div>
                                <div class="text-xs text-gray-600">Klik marker untuk lihat</div>
                            </div>
                        </div>
                        <div class="mt-4 p-3 bg-gradient-to-r from-yellow-50 to-amber-50 rounded-xl border-2 border-yellow-200">
                            <div class="flex items-center gap-2 text-yellow-800 mb-2">
                                <i class="fas fa-palette text-lg"></i>
                                <span class="text-xs font-bold">WARNA RANDOM</span>
                            </div>
                            <p class="text-xs text-yellow-700">Setiap lahan memiliki warna unik untuk membedakan area</p>
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden" data-aos="fade-left" data-aos-delay="100">
                    <div class="bg-gradient-to-r from-orange-600 via-red-600 to-pink-600 px-6 py-5">
                        <h3 class="text-white font-bold text-lg flex items-center">
                            <i class="fas fa-chart-bar mr-2"></i>
                            Statistik Lahan
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center py-3 border-b-2 border-gray-100">
                            <span class="text-gray-700 font-medium">Total Lahan:</span>
                            <span class="font-bold text-2xl text-orange-600">{{ count($realData ?? []) }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b-2 border-gray-100">
                            <span class="text-gray-700 font-medium">Dengan Foto:</span>
                            <span class="font-bold text-2xl text-green-600">{{ count(array_filter($realData ?? [], fn($item) => !empty($item['nik']) && $item['nik'] !== '-')) }}</span>
                        </div>
                        <div class="flex justify-between items-center py-3">
                            <span class="text-gray-700 font-medium">Akurasi:</span>
                            <span class="font-bold text-2xl text-purple-600">100%</span>
                        </div>
                        <div class="mt-6 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl">
                            <div class="flex items-center gap-2 text-blue-700">
                                <i class="fas fa-satellite text-xl"></i>
                                <span class="text-sm font-semibold">GPS Precision Mapping</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dusun Information -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-4 py-2 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium mb-4">
                <i class="fas fa-map-marker-alt mr-2"></i>
                Informasi Dusun
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Informasi Dusun</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Data detail setiap dusun di Desa Ketapang Baru dengan statistik lengkap dan fasilitas yang tersedia</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="group" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden h-full transform transition-all duration-300 hover:scale-105">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                        <h3 class="text-white font-semibold flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Dusun Ketapang
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-semibold text-blue-600 mb-4 flex items-center">
                                    <i class="fas fa-chart-pie mr-2"></i>
                                    Statistik:
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-users w-5 text-blue-500 mr-3"></i>
                                        <span>456 Warga</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-home w-5 text-blue-500 mr-3"></i>
                                        <span>95 KK</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-map w-5 text-blue-500 mr-3"></i>
                                        <span>2 RT/RW</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-road w-5 text-blue-500 mr-3"></i>
                                        <span>5 Gang</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-blue-600 mb-4 flex items-center">
                                    <i class="fas fa-building mr-2"></i>
                                    Fasilitas:
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-mosque w-5 text-blue-500 mr-3"></i>
                                        <span>Masjid</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-store w-5 text-blue-500 mr-3"></i>
                                        <span>Warung</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-parking w-5 text-blue-500 mr-3"></i>
                                        <span>Parkir</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-tree w-5 text-blue-500 mr-3"></i>
                                        <span>Taman</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat Detail
                            </a>
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-blue-600 text-blue-600 hover:bg-blue-50 font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-map-marked-alt mr-2"></i>
                                Lihat di Peta
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden h-full transform transition-all duration-300 hover:scale-105">
                    <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                        <h3 class="text-white font-semibold flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Dusun Baru
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-semibold text-green-600 mb-4 flex items-center">
                                    <i class="fas fa-chart-pie mr-2"></i>
                                    Statistik:
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-users w-5 text-green-500 mr-3"></i>
                                        <span>398 Warga</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-home w-5 text-green-500 mr-3"></i>
                                        <span>83 KK</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-map w-5 text-green-500 mr-3"></i>
                                        <span>2 RT/RW</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-road w-5 text-green-500 mr-3"></i>
                                        <span>4 Gang</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-green-600 mb-4 flex items-center">
                                    <i class="fas fa-building mr-2"></i>
                                    Fasilitas:
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-church w-5 text-green-500 mr-3"></i>
                                        <span>Gereja</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-store w-5 text-green-500 mr-3"></i>
                                        <span>Warung</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-parking w-5 text-green-500 mr-3"></i>
                                        <span>Parkir</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-tree w-5 text-green-500 mr-3"></i>
                                        <span>Taman</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat Detail
                            </a>
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-green-600 text-green-600 hover:bg-green-50 font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-map-marked-alt mr-2"></i>
                                Lihat di Peta
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden h-full transform transition-all duration-300 hover:scale-105">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                        <h3 class="text-white font-semibold flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Dusun Mekar
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-semibold text-purple-600 mb-4 flex items-center">
                                    <i class="fas fa-chart-pie mr-2"></i>
                                    Statistik:
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-users w-5 text-purple-500 mr-3"></i>
                                        <span>345 Warga</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-home w-5 text-purple-500 mr-3"></i>
                                        <span>72 KK</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-map w-5 text-purple-500 mr-3"></i>
                                        <span>2 RT/RW</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-road w-5 text-purple-500 mr-3"></i>
                                        <span>3 Gang</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-purple-600 mb-4 flex items-center">
                                    <i class="fas fa-building mr-2"></i>
                                    Fasilitas:
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-mosque w-5 text-purple-500 mr-3"></i>
                                        <span>Masjid</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-store w-5 text-purple-500 mr-3"></i>
                                        <span>Warung</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-parking w-5 text-purple-500 mr-3"></i>
                                        <span>Parkir</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-tree w-5 text-purple-500 mr-3"></i>
                                        <span>Taman</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat Detail
                            </a>
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-purple-600 text-purple-600 hover:bg-purple-50 font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-map-marked-alt mr-2"></i>
                                Lihat di Peta
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden h-full transform transition-all duration-300 hover:scale-105">
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-4">
                        <h3 class="text-white font-semibold flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Dusun Maju
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-semibold text-indigo-600 mb-4 flex items-center">
                                    <i class="fas fa-chart-pie mr-2"></i>
                                    Statistik:
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-users w-5 text-indigo-500 mr-3"></i>
                                        <span>312 Warga</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-home w-5 text-indigo-500 mr-3"></i>
                                        <span>65 KK</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-map w-5 text-indigo-500 mr-3"></i>
                                        <span>2 RT/RW</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-road w-5 text-indigo-500 mr-3"></i>
                                        <span>3 Gang</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-indigo-600 mb-4 flex items-center">
                                    <i class="fas fa-building mr-2"></i>
                                    Fasilitas:
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-mosque w-5 text-indigo-500 mr-3"></i>
                                        <span>Masjid</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-store w-5 text-indigo-500 mr-3"></i>
                                        <span>Warung</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-parking w-5 text-indigo-500 mr-3"></i>
                                        <span>Parkir</span>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-tree w-5 text-indigo-500 mr-3"></i>
                                        <span>Taman</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat Detail
                            </a>
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-indigo-600 text-indigo-600 hover:bg-indigo-50 font-medium rounded-lg transition-colors duration-200">
                                <i class="fas fa-map-marked-alt mr-2"></i>
                                Lihat di Peta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facilities -->
<section class="py-16 bg-gradient-to-br from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium mb-4">
                <i class="fas fa-building mr-2"></i>
                Fasilitas Umum
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Fasilitas Umum</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Fasilitas-fasilitas yang tersedia di Desa Ketapang Baru untuk mendukung kehidupan masyarakat</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="group" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center h-full transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-mosque text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Tempat Ibadah</h3>
                    <p class="text-gray-600 mb-4">Masjid, Gereja, Vihara</p>
                    <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                        5 Lokasi
                    </span>
                </div>
            </div>

            <div class="group" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center h-full transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-graduation-cap text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Pendidikan</h3>
                    <p class="text-gray-600 mb-4">SD, SMP, SMA</p>
                    <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">
                        3 Sekolah
                    </span>
                </div>
            </div>

            <div class="group" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center h-full transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heartbeat text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Kesehatan</h3>
                    <p class="text-gray-600 mb-4">Posyandu, Klinik</p>
                    <span class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-medium rounded-full">
                        4 Lokasi
                    </span>
                </div>
            </div>

            <div class="group" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center h-full transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="w-16 h-16 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-store text-2xl text-white"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Perdagangan</h3>
                    <p class="text-gray-600 mb-4">Warung, Toko</p>
                    <span class="inline-flex items-center px-3 py-1 bg-cyan-100 text-cyan-800 text-sm font-medium rounded-full">
                        15 Lokasi
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-cyan-600 via-blue-600 to-indigo-600 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-10 right-10 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 mb-8" data-aos="fade-up">
                <i class="fas fa-map-marked-alt text-yellow-300 mr-3"></i>
                <span class="text-sm font-semibold">Eksplorasi Desa</span>
            </div>

            <!-- Title -->
            <h2 class="text-4xl md:text-5xl font-black mb-6" data-aos="fade-up" data-aos-delay="100">
                Jelajahi <span class="text-yellow-300">Desa Kami</span>
            </h2>

            <!-- Description -->
            <p class="text-xl text-cyan-100 mb-8 max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Temukan keindahan dan potensi Desa Ketapang Baru melalui peta interaktif. Kunjungi langsung atau rencanakan perjalanan Anda
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8" data-aos="fade-up" data-aos-delay="300">
                <a href="#" class="bg-white text-cyan-600 hover:bg-gray-100 font-semibold py-4 px-8 rounded-xl transition-all duration-300 inline-flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-route mr-3"></i>
                    Rencanakan Kunjungan
                </a>
                <a href="#" class="border-2 border-white text-white hover:bg-white hover:text-cyan-600 font-semibold py-4 px-8 rounded-xl transition-all duration-300 inline-flex items-center justify-center">
                    <i class="fas fa-download mr-3"></i>
                    Download Peta PDF
                </a>
            </div>

            <!-- Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-compass text-white text-xl"></i>
                    </div>
                    <h3 class="font-semibold mb-2">Navigasi Mudah</h3>
                    <p class="text-cyan-100 text-sm">Temukan lokasi dengan mudah menggunakan peta interaktif</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-camera text-white text-xl"></i>
                    </div>
                    <h3 class="font-semibold mb-2">Spot Foto Menarik</h3>
                    <p class="text-cyan-100 text-sm">Temukan lokasi terbaik untuk berfoto di desa kami</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-heart text-white text-xl"></i>
                    </div>
                    <h3 class="font-semibold mb-2">Wisata Lokal</h3>
                    <p class="text-cyan-100 text-sm">Kunjungi destinasi wisata lokal yang menawan</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- AOS via CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.js" integrity="sha512-0Z3nG7OLh3s1y0mEwQb0mE+0a0ySxg3T2h7s6y4fJmNfWJcQnJ8uQm8O8wI2yLxQyQdJm5O3qVv5QkP3Yb0wAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Particles.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
<!-- Mapbox GL JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js'></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    setTimeout(() => {
        if (typeof AOS !== 'undefined') {
            document.documentElement.classList.remove('aos-disabled');
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100,
                delay: 0
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
                opacity: { value: 0.1, random: false },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#ffffff', opacity: 0.1, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: false, straight: false, out_mode: 'out', bounce: false }
            },
            interactivity: { detect_on: 'canvas', events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true } },
            retina_detect: true
        });
    }
});
</script>

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'; // Public token

let map, markers = [], allData = [];

// Color palette untuk lahan
const colors = [
    '#FF6B6B', '#4ECDC4', '#45B7D1', '#FFA07A', '#98D8C8',
    '#F7DC6F', '#BB8FCE', '#85C1E2', '#F8B739', '#52B788',
    '#E63946', '#F77F00', '#06FFA5', '#118AB2', '#073B4C'
];

function initMap() {
    // Initialize Mapbox GL map
    map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/light-v11', // Clean light style
        center: [102.763257, -4.314632],
        zoom: 12,
        pitch: 45, // 3D tilt
        bearing: 0,
        antialias: true
    });

    // Add navigation controls
    map.addControl(new mapboxgl.NavigationControl(), 'top-right');
    map.addControl(new mapboxgl.ScaleControl(), 'bottom-right');

    // Data from backend
    allData = @json($realData ?? []);
    const imgBase = '{{ asset('assets/images/gambar_lahan') }}';

    map.on('load', function() {
        // Add 3D buildings
        map.addLayer({
            'id': '3d-buildings',
            'source': 'composite',
            'source-layer': 'building',
            'filter': ['==', 'extrude', 'true'],
            'type': 'fill-extrusion',
            'minzoom': 15,
            'paint': {
                'fill-extrusion-color': '#aaa',
                'fill-extrusion-height': ['get', 'height'],
                'fill-extrusion-base': ['get', 'min_height'],
                'fill-extrusion-opacity': 0.6
            }
        });

        const bounds = new mapboxgl.LngLatBounds();

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

            // Create marker element
            const el = document.createElement('div');
            el.className = 'marker';
            el.style.backgroundColor = color;
            el.style.width = '40px';
            el.style.height = '40px';
            el.innerHTML = `<div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:white;font-weight:bold;font-size:18px;">📍</div>`;

            // Create popup HTML
            const popupHtml = `
                <div class="popup-content">
                    <div class="popup-name">${name}</div>
                    ${nik && nik !== '-' ? `<div class="popup-nik"><i class="fas fa-id-card mr-1"></i>${nik}</div>` : ''}
                    ${imgUrl ? `<img src="${imgUrl}" alt="${name}" onerror="this.style.display='none'" loading="lazy"/>` : ''}
                    <div class="popup-coords">
                        <i class="fas fa-map-pin mr-1"></i>
                        ${lat.toFixed(6)}, ${lng.toFixed(6)}
                    </div>
                </div>
            `;

            // Create popup
            const popup = new mapboxgl.Popup({
                offset: 25,
                closeButton: true,
                closeOnClick: false,
                maxWidth: '320px'
            }).setHTML(popupHtml);

            // Create marker
            const marker = new mapboxgl.Marker(el)
                .setLngLat([lng, lat])
                .setPopup(popup)
                .addTo(map);

            marker.itemData = item;
            markers.push(marker);
            bounds.extend([lng, lat]);

            // Add circle for area visualization
            map.addSource(`circle-${index}`, {
                'type': 'geojson',
                'data': {
                    'type': 'Feature',
                    'geometry': {
                        'type': 'Point',
                        'coordinates': [lng, lat]
                    }
                }
            });

            map.addLayer({
                'id': `circle-${index}`,
                'type': 'circle',
                'source': `circle-${index}`,
                'paint': {
                    'circle-radius': {
                        'base': 1.75,
                        'stops': [[12, 15], [22, 180]]
                    },
                    'circle-color': color,
                    'circle-opacity': 0.3,
                    'circle-stroke-width': 2,
                    'circle-stroke-color': color
                }
            });

            // Click on circle to show popup
            map.on('click', `circle-${index}`, () => {
                marker.togglePopup();
            });

            // Change cursor on hover
            map.on('mouseenter', `circle-${index}`, () => {
                map.getCanvas().style.cursor = 'pointer';
            });

            map.on('mouseleave', `circle-${index}`, () => {
                map.getCanvas().style.cursor = '';
            });
        });

        if (!bounds.isEmpty()) {
            map.fitBounds(bounds, { padding: 80, maxZoom: 15, duration: 2000 });
        }

        setupSearch();
    });
}

// Auto-load map when page loads
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(initMap, 500);
});

function setupSearch() {
    const searchInput = document.getElementById('searchLocation');
    if (!searchInput) return;

    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase().trim();

        if (query.length < 2) {
            // Reset all markers
            markers.forEach((m, idx) => {
                m.getElement().style.opacity = '1';
                const layerId = `circle-${idx}`;
                if (map.getLayer(layerId)) {
                    map.setPaintProperty(layerId, 'circle-opacity', 0.3);
                }
            });
            return;
        }

        let found = false;
        markers.forEach((m, idx) => {
            const name = (m.itemData.nama_lengkap || '').toLowerCase();
            const nik = (m.itemData.nik || '').toLowerCase();

            if (name.includes(query) || nik.includes(query)) {
                m.getElement().style.opacity = '1';
                const layerId = `circle-${idx}`;
                if (map.getLayer(layerId)) {
                    map.setPaintProperty(layerId, 'circle-opacity', 0.5);
                }

                if (!found) {
                    // Fly to first match with smooth animation
                    map.flyTo({
                        center: m.getLngLat(),
                        zoom: 16,
                        duration: 2000,
                        essential: true
                    });
                    m.togglePopup();
                    found = true;
                }
            } else {
                m.getElement().style.opacity = '0.2';
                const layerId = `circle-${idx}`;
                if (map.getLayer(layerId)) {
                    map.setPaintProperty(layerId, 'circle-opacity', 0.1);
                }
            }
        });
    });
}

function resetMapView() {
    if (!map || markers.length === 0) return;

    const bounds = new mapboxgl.LngLatBounds();
    markers.forEach(m => bounds.extend(m.getLngLat()));

    map.fitBounds(bounds, {
        padding: 80,
        maxZoom: 15,
        duration: 2000
    });

    // Reset search
    const searchInput = document.getElementById('searchLocation');
    if (searchInput) searchInput.value = '';

    // Reset marker and circle opacity
    markers.forEach((m, idx) => {
        m.getElement().style.opacity = '1';
        const layerId = `circle-${idx}`;
        if (map.getLayer(layerId)) {
            map.setPaintProperty(layerId, 'circle-opacity', 0.3);
        }
    });
}

</script>
@endpush


