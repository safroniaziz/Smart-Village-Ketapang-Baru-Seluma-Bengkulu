@extends('layouts.app-public')

@section('title', $berita->judul . ' - Berita Desa Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="article-hero-section position-relative">
    <div class="hero-background">
        @if($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" class="hero-image" alt="{{ $berita->judul }}">
        @else
            <div class="hero-placeholder bg-primary bg-gradient"></div>
        @endif
        <div class="hero-overlay"></div>
    </div>

    <div class="container position-relative z-3">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="hero-content text-center text-white" data-aos="fade-up">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}" class="text-white-75 text-decoration-none">
                                    <i class="fas fa-home me-1"></i>
                                    Beranda
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('berita') }}" class="text-white-75 text-decoration-none">Berita</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Detail</li>
                        </ol>
                    </nav>

                    @if($berita->featured)
                        <div class="featured-badge mb-3">
                            <span class="badge bg-danger bg-gradient px-3 py-2 rounded-pill">
                                <i class="fas fa-star me-2"></i>
                                Berita Utama
                            </span>
                        </div>
                    @endif

                    <h1 class="article-title display-4 fw-bold mb-4">{{ $berita->judul }}</h1>

                    <div class="article-meta d-flex flex-wrap justify-content-center align-items-center gap-4 text-white-75">
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt me-2"></i>
                            {{ $berita->formatted_date }}
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-user me-2"></i>
                            {{ $berita->penulis }}
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-eye me-2"></i>
                            {{ number_format($berita->views) }} views
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock me-2"></i>
                            {{ $berita->read_time }} menit baca
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Content Section -->
<section class="article-content-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <article class="article-content" data-aos="fade-up">
                    <div class="content-wrapper bg-white shadow-sm rounded-4 p-4 p-lg-5">
                        <!-- Social Share -->
                        <div class="social-share-top mb-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="share-text">
                                    <small class="text-muted fw-semibold">Bagikan artikel ini:</small>
                                </div>
                                <div class="share-buttons d-flex gap-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                       target="_blank"
                                       class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                        <i class="fab fa-facebook-f me-1"></i>
                                        Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->judul) }}"
                                       target="_blank"
                                       class="btn btn-outline-info btn-sm rounded-pill px-3">
                                        <i class="fab fa-twitter me-1"></i>
                                        Twitter
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . request()->fullUrl()) }}"
                                       target="_blank"
                                       class="btn btn-outline-success btn-sm rounded-pill px-3">
                                        <i class="fab fa-whatsapp me-1"></i>
                                        WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Article Body -->
                        <div class="article-body">
                            {!! $berita->konten !!}
                        </div>

                        <!-- Article Footer -->
                        <div class="article-footer mt-5 pt-4 border-top">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-avatar me-3">
                                            <div class="avatar bg-primary bg-gradient rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        </div>
                                        <div class="author-details">
                                            <div class="author-name fw-bold text-dark">{{ $berita->penulis }}</div>
                                            <div class="author-role small text-muted">Penulis</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                    <div class="article-actions d-flex justify-content-md-end gap-2">
                                        <button class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="window.print()">
                                            <i class="fas fa-print me-1"></i>
                                            Print
                                        </button>
                                        <button class="btn btn-outline-primary btn-sm rounded-pill px-3" onclick="copyToClipboard()">
                                            <i class="fas fa-link me-1"></i>
                                            Copy Link
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Related News Section -->
@if($relatedBerita->count() > 0)
<section class="related-news-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title h1 fw-bold text-dark mb-3">Berita Terkait</h2>
                    <p class="section-subtitle text-muted">Artikel lain yang mungkin menarik untuk Anda</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @foreach($relatedBerita as $index => $related)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <article class="related-card h-100">
                        <div class="card border-0 shadow-sm h-100 related-card-hover">
                            <div class="related-image-wrapper position-relative overflow-hidden">
                                @if($related->gambar)
                                    <img src="{{ asset('storage/' . $related->gambar) }}"
                                         class="card-img-top related-image"
                                         alt="{{ $related->judul }}">
                                @else
                                    <div class="related-placeholder d-flex align-items-center justify-content-center bg-light">
                                        <i class="fas fa-newspaper fa-3x text-muted opacity-25"></i>
                                    </div>
                                @endif

                                <div class="related-overlay">
                                    <a href="{{ route('berita.show', $related->slug) }}" class="related-link">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body p-4">
                                <div class="related-meta mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ $related->formatted_date }}
                                    </small>
                                </div>

                                <h3 class="related-title h6 fw-bold text-dark mb-3">
                                    <a href="{{ route('berita.show', $related->slug) }}"
                                       class="text-decoration-none text-dark related-title-link">
                                        {{ $related->judul }}
                                    </a>
                                </h3>

                                <p class="related-excerpt text-muted small mb-3">
                                    {{ Str::limit($related->excerpt, 100) }}
                                </p>

                                <div class="related-footer">
                                    <a href="{{ route('berita.show', $related->slug) }}"
                                       class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Back to Top -->
<div class="back-to-news-section py-4 bg-primary bg-gradient">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('berita') }}" class="btn btn-light btn-lg rounded-pill px-5 py-3">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali ke Semua Berita
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Article Hero */
.article-hero-section {
    min-height: 60vh;
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
    z-index: 1;
}

.hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-placeholder {
    width: 100%;
    height: 100%;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4));
    z-index: 2;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: rgba(255, 255, 255, 0.5);
}

.article-title {
    font-size: 3rem;
    line-height: 1.2;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.article-meta {
    font-size: 1rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

.meta-item {
    white-space: nowrap;
}

/* Content Section */
.content-wrapper {
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.social-share-top {
    border-bottom: 1px solid #e9ecef;
}

.share-buttons .btn {
    transition: all 0.3s ease;
}

.share-buttons .btn:hover {
    transform: translateY(-2px);
}

/* Article Body Styling */
.article-body {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.article-body h1,
.article-body h2,
.article-body h3,
.article-body h4,
.article-body h5,
.article-body h6 {
    color: #2c3e50;
    font-weight: 700;
    margin: 2rem 0 1rem 0;
}

.article-body p {
    margin-bottom: 1.5rem;
    text-align: justify;
}

.article-body img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 2rem 0;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.article-body blockquote {
    border-left: 4px solid var(--bs-primary);
    background: #f8f9fa;
    padding: 1.5rem;
    margin: 2rem 0;
    border-radius: 0 8px 8px 0;
    font-style: italic;
}

.article-body ul,
.article-body ol {
    padding-left: 2rem;
    margin-bottom: 1.5rem;
}

.article-body li {
    margin-bottom: 0.5rem;
}

/* Author Info */
.author-info {
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 12px;
}

.avatar {
    font-size: 1.2rem;
}

/* Related News */
.related-card-hover {
    transition: all 0.3s ease;
}

.related-card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
}

.related-image-wrapper {
    position: relative;
    height: 200px;
}

.related-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.related-card:hover .related-image {
    transform: scale(1.05);
}

.related-placeholder {
    height: 200px;
}

.related-overlay {
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

.related-card:hover .related-overlay {
    opacity: 1;
}

.related-link {
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

.related-card:hover .related-link {
    transform: scale(1);
}

.related-title-link {
    transition: color 0.3s ease;
}

.related-title-link:hover {
    color: var(--bs-primary) !important;
}

/* Back to News */
.back-to-news-section .btn {
    transition: all 0.3s ease;
}

.back-to-news-section .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

/* Print Styles */
@media print {
    .article-hero-section,
    .related-news-section,
    .back-to-news-section,
    .social-share-top,
    .article-actions {
        display: none !important;
    }

    .article-content-section {
        padding: 0 !important;
    }

    .content-wrapper {
        box-shadow: none !important;
        border: none !important;
    }
}

/* Responsive */
@media (max-width: 768px) {
    .article-title {
        font-size: 2rem;
    }

    .article-meta {
        flex-direction: column;
        gap: 0.5rem !important;
    }

    .meta-item {
        font-size: 0.9rem;
    }

    .social-share-top {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }

    .share-buttons {
        justify-content: center;
    }

    .article-body {
        font-size: 1rem;
    }

    .author-info {
        text-align: center;
        flex-direction: column;
    }

    .article-actions {
        justify-content: center !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
function copyToClipboard() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        // Create toast notification
        const toast = document.createElement('div');
        toast.className = 'toast-notification';
        toast.innerHTML = '<i class="fas fa-check me-2"></i>Link berhasil disalin!';
        toast.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            z-index: 9999;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            animation: slideIn 0.3s ease;
        `;

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    });
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);
</script>
@endpush
