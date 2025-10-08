@extends('layouts.app-public')

@section('title', 'Berita Desa - Smart Village Ketapang Baru')

@push('styles')
<style>
    /* Design System Integration for Berita Page */
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

    /* News Card Styling */
    .news-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .news-card:hover {
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

    <!-- Particle.js Container for Berita -->
    <div id="particles-berita" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">PORTAL BERITA</h2>
                            <p class="text-sm text-blue-100">Informasi Terkini Desa</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Berita</span><br>
                        <span class="text-yellow-400 font-extrabold">Desa Ketapang Baru</span>
                    </h1>

                    <!-- Badge Desa Digital -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-star mr-2 text-yellow-300 text-xs"></i>
                            Portal Informasi Resmi
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        Dapatkan informasi terbaru tentang pembangunan, kegiatan, dan perkembangan terkini dari
                        <span class="font-semibold text-yellow-300">Desa Ketapang Baru</span>
                    </p>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ $beritas->total() }}</div>
                        <div class="text-sm text-blue-100">Total Berita</div>
                    </div>
                    @if($featuredBerita)
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ \App\Models\Berita::where('featured', true)->count() }}</div>
                        <div class="text-sm text-blue-100">Berita Utama</div>
                    </div>
                    @endif
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ date('Y') }}</div>
                        <div class="text-sm text-blue-100">Tahun Ini</div>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="relative z-20" data-aos="fade-up" data-aos-delay="800">
                    <form method="GET" action="{{ route('berita') }}" class="flex flex-col sm:flex-row gap-3">
                        <div class="flex-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl bg-white/90 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                   placeholder="Cari berita...">
                        </div>
                        <button type="submit" class="bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-search mr-2"></i>
                            Cari Berita
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Side - Featured News Preview -->
            @if($featuredBerita)
            <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                <div class="news-card group relative bg-gradient-to-br from-white via-blue-50 to-indigo-100 backdrop-blur-sm border border-blue-200/50 rounded-3xl p-6 shadow-2xl overflow-hidden hover:shadow-3xl hover:scale-105 hover:border-blue-300/70 cursor-pointer">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full -translate-y-16 translate-x-16 group-hover:scale-110 transition-transform duration-700"></div>
                    </div>

                    <!-- Header Section -->
                    <div class="relative z-10 text-center mb-4">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl mb-3 shadow-lg">
                            <i class="fas fa-star text-white text-xl"></i>
                        </div>
                        <h3 class="text-lg font-black text-gray-800 mb-1">Berita Utama</h3>
                        <p class="text-xs text-gray-600 font-medium">{{ $featuredBerita->formatted_date }}</p>
                    </div>

                    <!-- Featured News Content -->
                    <div class="relative z-10">
                        <h4 class="font-bold text-gray-800 mb-3 line-clamp-2">{{ $featuredBerita->judul }}</h4>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $featuredBerita->excerpt }}</p>
                        <a href="{{ route('berita.show', $featuredBerita->slug) }}" class="inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-700 transition-colors">
                            Baca Selengkapnya 
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Featured News Section -->
@if($featuredBerita)
<section class="featured-news-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center mb-5" data-aos="fade-up">
                    <div class="section-badge mb-3">
                        <span class="badge bg-primary bg-gradient px-3 py-2 rounded-pill">
                            <i class="fas fa-star me-2"></i>
                            Berita Utama
                        </span>
                    </div>
                    <h2 class="section-title h1 fw-bold text-dark mb-3">Sorotan Berita</h2>
                    <p class="section-subtitle text-muted">Berita terpenting yang perlu Anda ketahui</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="featured-news-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card border-0 shadow-lg overflow-hidden h-100">
                        <div class="row g-0 h-100">
                            <div class="col-md-6">
                                <div class="featured-image-wrapper position-relative h-100">
                                    @if($featuredBerita->gambar)
                                        <img src="{{ asset('storage/' . $featuredBerita->gambar) }}"
                                             class="featured-image"
                                             alt="{{ $featuredBerita->judul }}">
                                    @else
                                        <div class="featured-placeholder d-flex align-items-center justify-content-center h-100 bg-primary bg-gradient">
                                            <i class="fas fa-newspaper fa-4x text-white opacity-50"></i>
                                        </div>
                                    @endif
                                    <div class="featured-overlay"></div>
                                    <div class="featured-badge">
                                        <span class="badge bg-danger bg-gradient px-3 py-2 rounded-pill">
                                            <i class="fas fa-fire me-2"></i>
                                            Featured
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card-body d-flex flex-column p-4 p-lg-5">
                                    <div class="featured-meta mb-3">
                                        <div class="d-flex align-items-center text-muted small">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            <span>{{ $featuredBerita->formatted_date }}</span>
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-user me-2"></i>
                                            <span>{{ $featuredBerita->penulis }}</span>
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-eye me-2"></i>
                                            <span>{{ number_format($featuredBerita->views) }} views</span>
                                        </div>
                                    </div>

                                    <h3 class="featured-title h2 fw-bold text-dark mb-3 flex-grow-0">
                                        {{ $featuredBerita->judul }}
                                    </h3>

                                    <p class="featured-excerpt text-muted mb-4 flex-grow-1">
                                        {{ $featuredBerita->excerpt }}
                                    </p>

                                    <div class="featured-actions">
                                        <a href="{{ route('berita.show', $featuredBerita->slug) }}"
                                           class="btn btn-primary btn-lg px-4 py-3 rounded-pill">
                                            <i class="fas fa-arrow-right me-2"></i>
                                            Baca Selengkapnya
                                        </a>
                                    </div>
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

<!-- News Grid Section -->
<section class="news-grid-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <div data-aos="fade-right">
                        <h2 class="section-title h1 fw-bold text-dark mb-2">Semua Berita</h2>
                        <p class="section-subtitle text-muted mb-0">Informasi terbaru dari Desa Ketapang Baru</p>
                    </div>

                    <div class="filter-controls" data-aos="fade-left">
                        <form method="GET" action="{{ route('berita') }}" class="d-flex gap-3">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <select name="featured" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Berita</option>
                                <option value="1" {{ request('featured') == '1' ? 'selected' : '' }}>Berita Utama</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if($beritas->count() > 0)
            <div class="row g-4">
                @foreach($beritas as $index => $berita)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <article class="news-card h-100">
                            <div class="card border-0 shadow-sm h-100 news-card-hover">
                                <div class="news-image-wrapper position-relative overflow-hidden">
                                    @if($berita->gambar)
                                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                                             class="card-img-top news-image"
                                             alt="{{ $berita->judul }}">
                                    @else
                                        <div class="news-placeholder d-flex align-items-center justify-content-center bg-light">
                                            <i class="fas fa-newspaper fa-3x text-muted opacity-25"></i>
                                        </div>
                                    @endif

                                    @if($berita->featured)
                                        <div class="news-featured-badge">
                                            <span class="badge bg-danger bg-gradient">
                                                <i class="fas fa-star me-1"></i>
                                                Featured
                                            </span>
                                        </div>
                                    @endif

                                    <div class="news-overlay">
                                        <a href="{{ route('berita.show', $berita->slug) }}" class="news-link">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body d-flex flex-column p-4">
                                    <div class="news-meta mb-3">
                                        <div class="d-flex align-items-center text-muted small">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            <span>{{ $berita->formatted_date }}</span>
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-eye me-2"></i>
                                            <span>{{ number_format($berita->views) }}</span>
                                        </div>
                                    </div>

                                    <h3 class="news-title h5 fw-bold text-dark mb-3">
                                        <a href="{{ route('berita.show', $berita->slug) }}" class="text-decoration-none text-dark news-title-link">
                                            {{ $berita->judul }}
                                        </a>
                                    </h3>

                                    <p class="news-excerpt text-muted mb-4 flex-grow-1">
                                        {{ $berita->excerpt }}
                                    </p>

                                    <div class="news-footer d-flex justify-content-between align-items-center">
                                        <div class="news-author small text-muted">
                                            <i class="fas fa-user me-1"></i>
                                            {{ $berita->penulis }}
                                        </div>
                                        <a href="{{ route('berita.show', $berita->slug) }}"
                                           class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                            Baca
                                        </a>
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
                        {{ $beritas->links() }}
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
                        <h3 class="empty-title h4 fw-bold text-dark mb-3">Berita Tidak Ditemukan</h3>
                        <p class="empty-subtitle text-muted mb-4">
                            Maaf, tidak ada berita yang sesuai dengan pencarian Anda.
                        </p>
                        <a href="{{ route('berita') }}" class="btn btn-primary rounded-pill px-4">
                            <i class="fas fa-arrow-left me-2"></i>
                            Lihat Semua Berita
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
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

/* Featured News */
.featured-news-card .card {
    transition: all 0.3s ease;
}

.featured-news-card .card:hover {
    transform: translateY(-5px);
}

.featured-image-wrapper {
    min-height: 400px;
}

.featured-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.featured-news-card:hover .featured-image {
    transform: scale(1.05);
}

.featured-placeholder {
    min-height: 400px;
}

.featured-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0, 0, 0, 0.3), transparent);
}

.featured-badge {
    position: absolute;
    top: 1rem;
    left: 1rem;
    z-index: 2;
}

.featured-title {
    line-height: 1.3;
}

.featured-actions .btn {
    transition: all 0.3s ease;
}

.featured-actions .btn:hover {
    transform: translateX(5px);
}

/* News Cards */
.news-card-hover {
    transition: all 0.3s ease;
}

.news-card-hover:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
}

.news-image-wrapper {
    position: relative;
    height: 200px;
}

.news-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.news-card:hover .news-image {
    transform: scale(1.1);
}

.news-placeholder {
    height: 200px;
}

.news-featured-badge {
    position: absolute;
    top: 0.75rem;
    right: 0.75rem;
    z-index: 2;
}

.news-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.news-card:hover .news-overlay {
    opacity: 1;
}

.news-link {
    width: 50px;
    height: 50px;
    background: var(--bs-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    transform: scale(0.8);
}

.news-card:hover .news-link {
    transform: scale(1);
}

.news-title-link {
    transition: color 0.3s ease;
}

.news-title-link:hover {
    color: var(--bs-primary) !important;
}

.news-excerpt {
    font-size: 0.95rem;
    line-height: 1.6;
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
}

.filter-controls .form-select:focus {
    border-color: var(--bs-primary);
    box-shadow: 0 0 0 0.2rem rgba(var(--bs-primary-rgb), 0.25);
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

    .featured-image-wrapper {
        min-height: 250px;
    }

    .featured-placeholder {
        min-height: 250px;
    }

    .section-header {
        flex-direction: column;
        gap: 1rem;
    }

    .filter-controls {
        width: 100%;
    }
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize particles for berita page
    if (document.getElementById('particles-berita')) {
        particlesJS('particles-berita', {
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
