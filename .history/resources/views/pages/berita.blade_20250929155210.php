@extends('layouts.app-public')

@section('title', 'Berita Desa Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <div class="hero-particles" id="hero-particles"></div>
    </div>
    
    <div class="container position-relative z-3">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-8 mx-auto text-center">
                <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
                    <div class="hero-badge mb-4">
                        <span class="badge bg-primary bg-gradient px-4 py-2 rounded-pill fs-6 fw-semibold">
                            <i class="fas fa-newspaper me-2"></i>
                            Portal Berita Desa
                        </span>
                    </div>
                    
                    <h1 class="hero-title display-3 fw-bold text-white mb-4">
                        Berita Terkini
                        <span class="text-primary">Desa Ketapang Baru</span>
                    </h1>
                    
                    <p class="hero-subtitle lead text-white-75 mb-5 px-lg-5">
                        Tetap terhubung dengan perkembangan terbaru dari desa kita. 
                        Dapatkan informasi akurat dan terpercaya langsung dari sumbernya.
                    </p>

                    <!-- Search Bar -->
                    <div class="hero-search-wrapper" data-aos="fade-up" data-aos-delay="200">
                        <form method="GET" action="{{ route('berita') }}" class="hero-search-form">
                            <div class="input-group input-group-lg shadow-lg">
                                <span class="input-group-text bg-white border-0">
                                    <i class="fas fa-search text-primary"></i>
                                </span>
                                <input 
                                    type="text" 
                                    name="search" 
                                    class="form-control border-0 ps-0" 
                                    placeholder="Cari berita yang Anda inginkan..."
                                    value="{{ request('search') }}"
                                >
                                <button class="btn btn-primary px-4" type="submit">
                                    <i class="fas fa-search me-2"></i>
                                    Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="hero-floating-elements">
        <div class="floating-element floating-1" data-aos="fade-up" data-aos-delay="400">
            <i class="fas fa-newspaper"></i>
        </div>
        <div class="floating-element floating-2" data-aos="fade-up" data-aos-delay="600">
            <i class="fas fa-bullhorn"></i>
        </div>
        <div class="floating-element floating-3" data-aos="fade-up" data-aos-delay="800">
            <i class="fas fa-rss"></i>
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
    // Initialize particles
    if (document.getElementById('hero-particles')) {
        particlesJS('hero-particles', {
            particles: {
                number: { value: 50, density: { enable: true, value_area: 800 } },
                color: { value: "#ffffff" },
                shape: { type: "circle" },
                opacity: { value: 0.1, random: false },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: "#ffffff", opacity: 0.1, width: 1 },
                move: { enable: true, speed: 2, direction: "none", random: false, straight: false, out_mode: "out" }
            },
            interactivity: {
                detect_on: "canvas",
                events: { onhover: { enable: true, mode: "repulse" }, onclick: { enable: true, mode: "push" } },
                modes: { repulse: { distance: 100, duration: 0.4 }, push: { particles_nb: 4 } }
            },
            retina_detect: true
        });
    }
});
</script>
@endpush