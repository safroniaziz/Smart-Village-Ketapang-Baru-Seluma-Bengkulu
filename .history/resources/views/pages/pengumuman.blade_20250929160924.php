@extends('layouts.app-public')

@section('title', 'Pengumuman Desa - Smart Village Ketapang Baru')

@push('styles')
<style>
    /* Design System Integration for Pengumuman Page */
    :root {
        --primary-blue-start: #0086c9;
        --primary-blue-mid: #0074b3;
        --primary-blue-end: #006ba3;
    }

    /* Konsisten Hero Background dengan halaman lain */
    .hero-section {
        background: linear-gradient(135deg, var(--primary-blue-start) 0%, var(--primary-blue-mid) 50%, var(--primary-blue-end) 100%);
        background-size: 200% 200%;
        animation: heroGradientShift 8s ease infinite;
    }

    @keyframes heroGradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Announcement Card Styling */
    .announcement-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .announcement-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    /* Enhanced hero spacing */
    .hero-section {
        padding: 4rem 0 0 0;
    }

    @media (min-width: 1024px) {
        .hero-section {
            padding: 6rem 0 0 0;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section relative text-white overflow-hidden min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)] flex items-center pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100"></div>

    <!-- Particle.js Container for Pengumuman -->
    <div id="particles-pengumuman" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-bullhorn text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">PENGUMUMAN RESMI</h2>
                            <p class="text-sm text-blue-100">Informasi Penting Desa</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Pengumuman</span><br>
                        <span class="text-yellow-400 font-extrabold">Desa Ketapang Baru</span>
                    </h1>

                    <!-- Badge Desa Digital -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-star mr-2 text-yellow-300 text-xs"></i>
                            Pusat Informasi Resmi
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        Dapatkan informasi penting dan pengumuman resmi dari pemerintah
                        <span class="font-semibold text-yellow-300">Desa Ketapang Baru</span>
                    </p>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ $pengumumans->total() }}</div>
                        <div class="text-sm text-blue-100">Total Pengumuman</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ \App\Models\Pengumuman::where('prioritas', 'Tinggi')->count() }}</div>
                        <div class="text-sm text-blue-100">Prioritas Tinggi</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ \App\Models\Pengumuman::active()->count() }}</div>
                        <div class="text-sm text-blue-100">Masih Berlaku</div>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="relative z-20" data-aos="fade-up" data-aos-delay="800">
                    <form method="GET" action="{{ route('pengumuman') }}" class="flex flex-col sm:flex-row gap-3">
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                   placeholder="Cari pengumuman...">
                        </div>
                        <button type="submit" class="bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-search mr-2"></i>
                            Cari Pengumuman
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Side - Urgent Announcement Preview -->
            @if($urgentPengumuman)
            <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                <div class="announcement-card group relative bg-gradient-to-br from-white via-red-50 to-orange-100 backdrop-blur-sm border border-red-200/50 rounded-3xl p-6 shadow-2xl overflow-hidden hover:shadow-3xl hover:scale-105 hover:border-red-300/70 cursor-pointer">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-red-400 to-orange-600 rounded-full -translate-y-16 translate-x-16 group-hover:scale-110 transition-transform duration-700"></div>
                    </div>

                    <!-- Header Section -->
                    <div class="relative z-10 text-center mb-4">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-red-500 to-orange-600 rounded-2xl mb-3 shadow-lg">
                            <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                        </div>
                        <h3 class="text-lg font-black text-gray-800 mb-1">Pengumuman Penting</h3>
                        <p class="text-xs text-gray-600 font-medium">{{ $urgentPengumuman->formatted_date }}</p>
                    </div>

                    <!-- Urgent Announcement Content -->
                    <div class="relative z-10">
                        <h4 class="font-bold text-gray-800 mb-3 line-clamp-2">{{ $urgentPengumuman->judul }}</h4>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $urgentPengumuman->excerpt }}</p>
                        <a href="{{ route('pengumuman.show', $urgentPengumuman->slug) }}" class="inline-flex items-center text-red-600 font-semibold text-sm hover:text-red-700 transition-colors">
                            Lihat Pengumuman 
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Urgent Announcement Section -->
@if($urgentPengumuman)
<section class="urgent-announcement-section py-5 bg-danger bg-gradient">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="urgent-announcement-card" data-aos="pulse" data-aos-duration="1000">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-4 p-lg-5">
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center mb-3 mb-md-0">
                                    <div class="urgent-icon">
                                        <i class="fas fa-exclamation-triangle fa-3x text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="urgent-content">
                                        <div class="urgent-badge mb-2">
                                            <span class="badge bg-danger fs-6 px-3 py-2">
                                                <i class="fas fa-fire me-2"></i>
                                                PENGUMUMAN PENTING
                                            </span>
                                        </div>
                                        <h3 class="urgent-title h4 fw-bold text-dark mb-2">
                                            {{ $urgentPengumuman->judul }}
                                        </h3>
                                        <p class="urgent-excerpt text-muted mb-0">
                                            {{ $urgentPengumuman->excerpt }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <a href="{{ route('pengumuman.show', $urgentPengumuman->slug) }}"
                                       class="btn btn-danger btn-lg rounded-pill px-4 py-3 pulsing-btn">
                                        <i class="fas fa-arrow-right me-2"></i>
                                        Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Announcements Grid Section -->
<section class="announcements-grid-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center mb-5">
                    <div data-aos="fade-right">
                        <h2 class="section-title h1 fw-bold text-dark mb-2">Semua Pengumuman</h2>
                        <p class="section-subtitle text-muted mb-0">Informasi resmi dari Pemerintah Desa Ketapang Baru</p>
                    </div>

                    <div class="filter-controls mt-3 mt-lg-0" data-aos="fade-left">
                        <form method="GET" action="{{ route('pengumuman') }}" class="d-flex flex-column flex-sm-row gap-3">
                            <input type="hidden" name="search" value="{{ request('search') }}">

                            <select name="prioritas" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Prioritas</option>
                                <option value="Tinggi" {{ request('prioritas') == 'Tinggi' ? 'selected' : '' }}>Prioritas Tinggi</option>
                                <option value="Sedang" {{ request('prioritas') == 'Sedang' ? 'selected' : '' }}>Prioritas Sedang</option>
                                <option value="Rendah" {{ request('prioritas') == 'Rendah' ? 'selected' : '' }}>Prioritas Rendah</option>
                            </select>

                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Status</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Masih Berlaku</option>
                                <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Sudah Berakhir</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if($pengumumans->count() > 0)
            <div class="row g-4">
                @foreach($pengumumans as $index => $pengumuman)
                    <div class="col-lg-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <article class="announcement-card h-100">
                            <div class="card border-0 shadow-sm h-100 announcement-card-hover">
                                <div class="card-header bg-white border-0 pb-0">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="priority-badge">
                                            <span class="badge {{ $pengumuman->priority_badge_class }} fs-6 px-3 py-2">
                                                @if($pengumuman->prioritas == 'Tinggi')
                                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                                @elseif($pengumuman->prioritas == 'Sedang')
                                                    <i class="fas fa-info-circle me-2"></i>
                                                @else
                                                    <i class="fas fa-check-circle me-2"></i>
                                                @endif
                                                {{ $pengumuman->prioritas }}
                                            </span>
                                        </div>

                                        @if($pengumuman->is_expired)
                                            <div class="expired-badge">
                                                <span class="badge bg-secondary">
                                                    <i class="fas fa-clock me-1"></i>
                                                    Berakhir
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-body d-flex flex-column p-4 pt-2">
                                    <div class="announcement-meta mb-3">
                                        <div class="d-flex align-items-center text-muted small">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            <span>{{ $pengumuman->formatted_date }}</span>
                                            @if($pengumuman->tanggal_berakhir)
                                                <span class="mx-2">•</span>
                                                <i class="fas fa-hourglass-end me-2"></i>
                                                <span>{{ $pengumuman->formatted_end_date }}</span>
                                            @endif
                                        </div>
                                        <div class="d-flex align-items-center text-muted small mt-1">
                                            <i class="fas fa-eye me-2"></i>
                                            <span>{{ number_format($pengumuman->views) }} views</span>
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-user me-2"></i>
                                            <span>{{ $pengumuman->penulis }}</span>
                                        </div>
                                    </div>

                                    <h3 class="announcement-title h5 fw-bold text-dark mb-3">
                                        <a href="{{ route('pengumuman.show', $pengumuman->slug) }}"
                                           class="text-decoration-none text-dark announcement-title-link">
                                            {{ $pengumuman->judul }}
                                        </a>
                                    </h3>

                                    <p class="announcement-excerpt text-muted mb-4 flex-grow-1">
                                        {{ $pengumuman->excerpt }}
                                    </p>

                                    <div class="announcement-footer">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="announcement-status">
                                                @if($pengumuman->is_expired)
                                                    <small class="text-muted">
                                                        <i class="fas fa-times-circle me-1"></i>
                                                        Sudah berakhir
                                                    </small>
                                                @elseif($pengumuman->tanggal_berakhir)
                                                    <small class="text-success">
                                                        <i class="fas fa-check-circle me-1"></i>
                                                        Masih berlaku
                                                    </small>
                                                @else
                                                    <small class="text-primary">
                                                        <i class="fas fa-infinity me-1"></i>
                                                        Berlaku terus
                                                    </small>
                                                @endif
                                            </div>
                                            <a href="{{ route('pengumuman.show', $pengumuman->slug) }}"
                                               class="btn btn-outline-warning btn-sm rounded-pill px-3 announcement-btn">
                                                <i class="fas fa-arrow-right me-1"></i>
                                                Baca
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="pagination-wrapper d-flex justify-content-center" data-aos="fade-up">
                        {{ $pengumumans->links() }}
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="empty-state text-center py-5" data-aos="fade-up">
                        <div class="empty-icon mb-4">
                            <i class="fas fa-search fa-4x text-muted opacity-25"></i>
                        </div>
                        <h3 class="empty-title h4 fw-bold text-dark mb-3">Pengumuman Tidak Ditemukan</h3>
                        <p class="empty-subtitle text-muted mb-4">
                            Maaf, tidak ada pengumuman yang sesuai dengan pencarian Anda.
                        </p>
                        <a href="{{ route('pengumuman') }}" class="btn btn-warning rounded-pill px-4">
                            <i class="fas fa-arrow-left me-2"></i>
                            Lihat Semua Pengumuman
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
/* Hero Section */
.hero-section {
    min-height: 70vh;
    display: flex;
    align-items: center;
    position: relative;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
}

.hero-particles {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0.1;
}

.hero-badge .badge {
    font-size: 0.9rem;
    letter-spacing: 0.5px;
}

.hero-title {
    font-size: 3.5rem;
    line-height: 1.2;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.hero-subtitle {
    font-size: 1.25rem;
    line-height: 1.6;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

.hero-search-form .input-group {
    max-width: 600px;
    margin: 0 auto;
    border-radius: 50px;
    overflow: hidden;
}

.hero-search-form .form-control {
    font-size: 1.1rem;
    padding: 1rem 1.5rem;
}

.hero-search-form .btn {
    padding: 1rem 2rem;
    font-weight: 600;
}

/* Floating Elements */
.hero-floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
}

.floating-element {
    position: absolute;
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, 0.3);
    font-size: 1.5rem;
    animation: float 6s ease-in-out infinite;
}

.floating-1 {
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.floating-2 {
    top: 60%;
    right: 15%;
    animation-delay: 2s;
}

.floating-3 {
    bottom: 30%;
    left: 20%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

/* Urgent Announcement */
.urgent-announcement-card .card {
    transition: all 0.3s ease;
    border-left: 5px solid #dc3545;
}

.urgent-announcement-card .card:hover {
    transform: translateY(-3px);
}

.urgent-icon {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.pulsing-btn {
    animation: buttonPulse 2s infinite;
}

@keyframes buttonPulse {
    0% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7); }
    70% { box-shadow: 0 0 0 10px rgba(220, 53, 69, 0); }
    100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
}

/* Announcement Cards */
.announcement-card-hover {
    transition: all 0.3s ease;
}

.announcement-card-hover:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
}

.priority-badge .badge {
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.announcement-title-link {
    transition: color 0.3s ease;
}

.announcement-title-link:hover {
    color: var(--bs-warning) !important;
}

.announcement-excerpt {
    font-size: 0.95rem;
    line-height: 1.6;
}

.announcement-btn {
    transition: all 0.3s ease;
}

.announcement-btn:hover {
    transform: translateX(3px);
}

/* Priority Badge Colors */
.badge-danger {
    background-color: #dc3545 !important;
}

.badge-warning {
    background-color: #ffc107 !important;
    color: #212529 !important;
}

.badge-success {
    background-color: #198754 !important;
}

/* Section Headers */
.section-badge .badge {
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    line-height: 1.2;
}

.section-subtitle {
    font-size: 1.1rem;
    line-height: 1.6;
}

/* Filter Controls */
.filter-controls .form-select {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 0.75rem 1rem;
    font-weight: 500;
    transition: all 0.3s ease;
    min-width: 180px;
}

.filter-controls .form-select:focus {
    border-color: var(--bs-warning);
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
}

/* Empty State */
.empty-state {
    padding: 4rem 2rem;
}

.empty-icon {
    margin-bottom: 2rem;
}

/* Responsive */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }

    .hero-subtitle {
        font-size: 1.1rem;
    }

    .section-title {
        font-size: 2rem;
    }

    .section-header {
        gap: 1rem;
    }

    .filter-controls {
        width: 100%;
    }

    .filter-controls .form-select {
        min-width: auto;
    }

    .urgent-announcement-card .row {
        text-align: center;
    }

    .urgent-announcement-card .col-md-2,
    .urgent-announcement-card .col-md-8,
    .urgent-announcement-card .col-md-2 {
        margin-bottom: 1rem;
    }
}

@media (max-width: 576px) {
    .filter-controls form {
        flex-direction: column;
    }
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize particles for pengumuman page
    if (document.getElementById('particles-pengumuman')) {
        particlesJS('particles-pengumuman', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: "#ffffff" },
                shape: { type: "circle", stroke: { width: 0, color: "#000000" }, polygon: { nb_sides: 5 } },
                opacity: { value: 0.1, random: false, anim: { enable: false, speed: 1, opacity_min: 0.1, sync: false } },
                size: { value: 3, random: true, anim: { enable: false, speed: 40, size_min: 0.1, sync: false } },
                line_linked: { enable: true, distance: 150, color: "#ffffff", opacity: 0.1, width: 1 },
                move: { enable: true, speed: 6, direction: "none", random: false, straight: false, out_mode: "out", bounce: false, attract: { enable: false, rotateX: 600, rotateY: 1200 } }
            },
            interactivity: {
                detect_on: "canvas",
                events: { onhover: { enable: true, mode: "repulse" }, onclick: { enable: true, mode: "push" }, resize: true },
                modes: { grab: { distance: 400, line_linked: { opacity: 1 } }, bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 }, repulse: { distance: 200, duration: 0.4 }, push: { particles_nb: 4 }, remove: { particles_nb: 2 } }
            },
            retina_detect: true
        });
    }
});
</script>
@endpush
