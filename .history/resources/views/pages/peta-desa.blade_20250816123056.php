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
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Peta Desa Ketapang Baru</h5>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary" id="zoomIn">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button class="btn btn-outline-primary" id="zoomOut">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button class="btn btn-outline-primary" id="resetMap">
                                <i class="fas fa-home"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div id="map" style="height: 500px; width: 100%;">
                            <!-- Placeholder for map -->
                            <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                                <div class="text-center">
                                    <i class="fas fa-map fa-4x text-muted mb-3"></i>
                                    <h5 class="text-muted">Peta Desa Ketapang Baru</h5>
                                    <p class="text-muted">Peta interaktif akan ditampilkan di sini</p>
                                    <button class="btn btn-primary" onclick="loadMap()">
                                        <i class="fas fa-map-marked-alt me-2"></i>Muat Peta
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Map Controls -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h6 class="fw-bold mb-0">Kontrol Peta</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Layer Peta</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="layerDusun" checked>
                                <label class="form-check-label" for="layerDusun">
                                    Dusun
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="layerRT" checked>
                                <label class="form-check-label" for="layerRT">
                                    RT/RW
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="layerRumah" checked>
                                <label class="form-check-label" for="layerRumah">
                                    Rumah
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="layerFasilitas">
                                <label class="form-check-label" for="layerFasilitas">
                                    Fasilitas Umum
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Filter</label>
                            <select class="form-select" id="filterDusun">
                                <option value="">Semua Dusun</option>
                                                            <option value="ketapang">Dusun Ketapang</option>
                            <option value="baru">Dusun Baru</option>
                            <option value="mekar">Dusun Mekar</option>
                            <option value="maju">Dusun Maju</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pencarian</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchLocation" placeholder="Cari lokasi...">
                                <button class="btn btn-outline-primary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Info -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h6 class="fw-bold mb-0">Informasi Lokasi</h6>
                    </div>
                    <div class="card-body">
                        <div id="locationInfo">
                            <p class="text-muted text-center">
                                Klik pada peta untuk melihat informasi lokasi
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h6 class="fw-bold mb-0">Statistik Wilayah</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Total Dusun:</span>
                                <span class="fw-bold">8</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Total RT/RW:</span>
                                <span class="fw-bold">25 RT / 8 RW</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Total Rumah:</span>
                                <span class="fw-bold">512</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Fasilitas Umum:</span>
                                <span class="fw-bold">15</span>
                            </div>
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
