@extends('layouts.app')

@section('title', 'Peta Desa - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-3">Peta Desa</h1>
                <p class="lead">
                    Eksplorasi peta desa interaktif dengan informasi detail setiap wilayah.
                </p>
            </div>
        </div>
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
                                <option value="Ketapang">Dusun Ketapang</option>
                                <option value="Ketapang Baru">Dusun Ketapang Baru</option>
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
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Dusun Ketapang Baru</h5>
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
