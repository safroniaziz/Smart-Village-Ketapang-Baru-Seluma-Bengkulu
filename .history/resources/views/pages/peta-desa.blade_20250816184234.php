@extends('layouts.app')

@section('title', 'Peta Desa - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-Ho3Q0RyY4wQtwj0Q1sS2mZ0b7N2b5VQQl9Z4b6VtqvH8lJ0m6EJ2lT2qYq8J2b6P9m1oX4m0m7W2YqFqSxq2aA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.aos-disabled [data-aos] { opacity: 1 !important; transform: none !important; }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container -->
    <div id="particles-peta" class="absolute inset-0"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
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
            <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium mb-4">
                <i class="fas fa-map-marked-alt mr-2"></i>
                Peta Interaktif
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Peta Desa Ketapang Baru</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Jelajahi wilayah desa dengan peta interaktif yang menampilkan informasi lengkap setiap dusun dan fasilitas umum</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4 flex justify-between items-center">
                        <h3 class="text-white font-semibold">Peta Desa Ketapang Baru</h3>
                        <div class="flex space-x-2">
                            <button class="p-2 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-colors duration-200" id="zoomIn">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button class="p-2 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-colors duration-200" id="zoomOut">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button class="p-2 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-colors duration-200" id="resetMap">
                                <i class="fas fa-home"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-0">
                        <div id="map" class="h-[500px] w-full">
                            <!-- Placeholder for map -->
                            <div class="flex items-center justify-center h-full bg-gradient-to-br from-gray-50 to-blue-50">
                                <div class="text-center p-8">
                                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-map text-3xl text-blue-600"></i>
                                    </div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Peta Desa Ketapang Baru</h3>
                                    <p class="text-gray-600 mb-6">Peta interaktif akan ditampilkan di sini</p>
                                    <button onclick="loadMap()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:scale-105 shadow-lg">
                                        <i class="fas fa-map-marked-alt mr-2"></i>Muat Peta
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <!-- Map Controls -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                        <h3 class="text-white font-semibold flex items-center">
                            <i class="fas fa-cogs mr-2"></i>
                            Kontrol Peta
                        </h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Layer Peta</label>
                            <div class="space-y-3">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" id="layerDusun" checked class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                                    <span class="ml-3 text-sm text-gray-700">Dusun</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" id="layerRT" checked class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                                    <span class="ml-3 text-sm text-gray-700">RT/RW</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" id="layerRumah" checked class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                                    <span class="ml-3 text-sm text-gray-700">Rumah</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" id="layerFasilitas" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                                    <span class="ml-3 text-sm text-gray-700">Fasilitas Umum</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Filter</label>
                            <select id="filterDusun" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                                <option value="">Semua Dusun</option>
                                <option value="ketapang">Dusun Ketapang</option>
                                <option value="baru">Dusun Baru</option>
                                <option value="mekar">Dusun Mekar</option>
                                <option value="maju">Dusun Maju</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Pencarian</label>
                            <div class="relative">
                                <input type="text" id="searchLocation" placeholder="Cari lokasi..." class="w-full pl-10 pr-12 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <button type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2 p-1 text-green-600 hover:text-green-700 transition-colors duration-200">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Info -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                        <h3 class="text-white font-semibold flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Informasi Lokasi
                        </h3>
                    </div>
                    <div class="p-6">
                        <div id="locationInfo">
                            <div class="text-center text-gray-500">
                                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-map-pin text-2xl text-purple-600"></i>
                                </div>
                                <p class="text-sm">Klik pada peta untuk melihat informasi lokasi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-600 to-orange-700 px-6 py-4">
                        <h3 class="text-white font-semibold flex items-center">
                            <i class="fas fa-chart-bar mr-2"></i>
                            Statistik Wilayah
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600">Total Dusun:</span>
                            <span class="font-bold text-orange-600">8</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600">Total RT/RW:</span>
                            <span class="font-bold text-orange-600">25 RT / 8 RW</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600">Total Rumah:</span>
                            <span class="font-bold text-orange-600">512</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600">Fasilitas Umum:</span>
                            <span class="font-bold text-orange-600">15</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dusun Information -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Informasi Dusun</h2>
                    <p class="lead text-muted">Data detail setiap dusun di Desa Ketapang Baru</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Dusun Ketapang</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Statistik:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-users me-2"></i>456 Warga</li>
                                    <li><i class="fas fa-home me-2"></i>95 KK</li>
                                    <li><i class="fas fa-map me-2"></i>2 RT/RW</li>
                                    <li><i class="fas fa-road me-2"></i>5 Gang</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Fasilitas:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-mosque me-2"></i>Masjid</li>
                                    <li><i class="fas fa-store me-2"></i>Warung</li>
                                    <li><i class="fas fa-parking me-2"></i>Parkir</li>
                                    <li><i class="fas fa-tree me-2"></i>Taman</li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                            <a href="#" class="btn btn-outline-primary btn-sm">Lihat di Peta</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Dusun Baru</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-success">Statistik:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-users me-2"></i>398 Warga</li>
                                    <li><i class="fas fa-home me-2"></i>83 KK</li>
                                    <li><i class="fas fa-map me-2"></i>2 RT/RW</li>
                                    <li><i class="fas fa-road me-2"></i>4 Gang</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-success">Fasilitas:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-church me-2"></i>Gereja</li>
                                    <li><i class="fas fa-store me-2"></i>Warung</li>
                                    <li><i class="fas fa-parking me-2"></i>Parkir</li>
                                    <li><i class="fas fa-tree me-2"></i>Taman</li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="#" class="btn btn-success btn-sm">Lihat Detail</a>
                            <a href="#" class="btn btn-outline-success btn-sm">Lihat di Peta</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Dusun Mekar</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-warning">Statistik:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-users me-2"></i>345 Warga</li>
                                    <li><i class="fas fa-home me-2"></i>72 KK</li>
                                    <li><i class="fas fa-map me-2"></i>2 RT/RW</li>
                                    <li><i class="fas fa-road me-2"></i>3 Gang</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-warning">Fasilitas:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-mosque me-2"></i>Masjid</li>
                                    <li><i class="fas fa-store me-2"></i>Warung</li>
                                    <li><i class="fas fa-parking me-2"></i>Parkir</li>
                                    <li><i class="fas fa-tree me-2"></i>Taman</li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="#" class="btn btn-warning btn-sm">Lihat Detail</a>
                            <a href="#" class="btn btn-outline-warning btn-sm">Lihat di Peta</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Dusun Maju</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-info">Statistik:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-users me-2"></i>312 Warga</li>
                                    <li><i class="fas fa-home me-2"></i>65 KK</li>
                                    <li><i class="fas fa-map me-2"></i>2 RT/RW</li>
                                    <li><i class="fas fa-road me-2"></i>3 Gang</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-info">Fasilitas:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-mosque me-2"></i>Masjid</li>
                                    <li><i class="fas fa-store me-2"></i>Warung</li>
                                    <li><i class="fas fa-parking me-2"></i>Parkir</li>
                                    <li><i class="fas fa-tree me-2"></i>Taman</li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="#" class="btn btn-info btn-sm">Lihat Detail</a>
                            <a href="#" class="btn btn-outline-info btn-sm">Lihat di Peta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facilities -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Fasilitas Umum</h2>
                    <p class="lead text-muted">Fasilitas-fasilitas yang tersedia di Desa Ketapang Baru</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-mosque fa-2x text-primary"></i>
                        </div>
                        <h6 class="fw-bold">Tempat Ibadah</h6>
                        <p class="text-muted mb-2">Masjid, Gereja, Vihara</p>
                        <span class="badge bg-primary">5 Lokasi</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-graduation-cap fa-2x text-success"></i>
                        </div>
                        <h6 class="fw-bold">Pendidikan</h6>
                        <p class="text-muted mb-2">SD, SMP, SMA</p>
                        <span class="badge bg-success">3 Sekolah</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-heartbeat fa-2x text-warning"></i>
                        </div>
                        <h6 class="fw-bold">Kesehatan</h6>
                        <p class="text-muted mb-2">Posyandu, Klinik</p>
                        <span class="badge bg-warning">4 Lokasi</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-store fa-2x text-info"></i>
                        </div>
                        <h6 class="fw-bold">Perdagangan</h6>
                        <p class="text-muted mb-2">Warung, Toko</p>
                        <span class="badge bg-info">15 Lokasi</span>
                    </div>
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
function loadMap() {
    // Simulate loading map
    const mapContainer = document.getElementById('map');
    mapContainer.innerHTML = `
        <div class="d-flex align-items-center justify-content-center h-100 bg-light">
            <div class="text-center">
                <i class="fas fa-map-marked-alt fa-4x text-primary mb-3"></i>
                                        <h5 class="text-primary">Peta Desa Ketapang Baru</h5>
                <p class="text-muted">Peta interaktif sedang dimuat...</p>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    `;

    // Simulate map loading delay
    setTimeout(() => {
        mapContainer.innerHTML = `
            <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                <div class="text-center">
                    <i class="fas fa-map-marked-alt fa-4x text-success mb-3"></i>
                    <h5 class="text-success">Peta Berhasil Dimuat!</h5>
                    <p class="text-muted">Peta interaktif siap digunakan</p>
                    <button class="btn btn-success" onclick="showMapFeatures()">
                        <i class="fas fa-eye me-2"></i>Tampilkan Fitur
                    </button>
                </div>
            </div>
        `;
    }, 2000);
}

function showMapFeatures() {
    // Show map features
    alert('Fitur peta interaktif akan ditampilkan di sini dengan integrasi Leaflet.js atau Google Maps API');
}

$(document).ready(function() {
    // Map controls
    $('#zoomIn').click(function() {
        console.log('Zoom in clicked');
    });

    $('#zoomOut').click(function() {
        console.log('Zoom out clicked');
    });

    $('#resetMap').click(function() {
        console.log('Reset map clicked');
    });

    // Layer controls
    $('input[type="checkbox"]').change(function() {
        console.log('Layer changed:', $(this).attr('id'), $(this).is(':checked'));
    });

    // Search functionality
    $('#searchLocation').on('keyup', function() {
        const searchTerm = $(this).val();
        if (searchTerm.length > 2) {
            console.log('Searching for:', searchTerm);
        }
    });
});
</script>
@endpush
