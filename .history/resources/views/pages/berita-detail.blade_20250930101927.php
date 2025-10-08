@extends('layouts.app-public')

@section('title', $berita->judul . ' - Berita Desa Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* 🚀 ADVANCED BERITA DETAIL STYLES 🚀 */
    .hero-section {
        background: linear-gradient(135deg, #0086c9 0%, #0074b3 25%, #006ba3 50%, #005b93 75%, #004d83 100%);
        background-size: 200% 200%;
        animation: heroGradientShift 8s ease infinite;
        position: relative;
        overflow: hidden;
        min-height: 60vh;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 50%, rgba(255, 193, 7, 0.15) 0%, transparent 60%),
            radial-gradient(circle at 80% 20%, rgba(220, 53, 69, 0.15) 0%, transparent 60%),
            radial-gradient(circle at 40% 80%, rgba(40, 167, 69, 0.15) 0%, transparent 60%);
        animation: colorShift 12s ease infinite;
    }

    @keyframes heroGradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes colorShift {
        0%, 100% { opacity: 1; }
        33% { opacity: 0.7; }
        66% { opacity: 0.9; }
    }

    .featured-badge {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .content-card {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .content-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .meta-item {
        background: rgba(59, 130, 246, 0.1);
        border: 1px solid rgba(59, 130, 246, 0.2);
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .meta-item:hover {
        background: rgba(59, 130, 246, 0.15);
        transform: translateY(-2px);
    }

    /* Enhanced Content Styling */
    .content-body {
        line-height: 1.8;
    }

    .content-body h1, .content-body h2, .content-body h3, .content-body h4, .content-body h5, .content-body h6 {
        color: #1f2937;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .content-body h1 {
        font-size: 2rem;
        border-bottom: 3px solid #3b82f6;
        padding-bottom: 0.5rem;
    }

    .content-body h2 {
        font-size: 1.75rem;
        border-bottom: 2px solid #e5e7eb;
        padding-bottom: 0.25rem;
    }

    .content-body h3 {
        font-size: 1.5rem;
    }

    .content-body p {
        color: #374151;
        margin-bottom: 1.5rem;
        line-height: 1.8;
    }

    .content-body ul, .content-body ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .content-body li {
        margin-bottom: 0.5rem;
        color: #374151;
    }

    .content-body blockquote {
        border-left: 4px solid #3b82f6;
        background: #f8fafc;
        padding: 1.5rem;
        margin: 2rem 0;
        border-radius: 0 0.5rem 0.5rem 0;
        font-style: italic;
        color: #475569;
    }

    .content-body a {
        color: #2563eb;
        text-decoration: none;
        font-weight: 500;
    }

    .content-body a:hover {
        text-decoration: underline;
        color: #1d4ed8;
    }

    .content-body strong {
        color: #1f2937;
        font-weight: 700;
    }

    .content-body img {
        max-width: 100%;
        height: auto;
        border-radius: 0.75rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin: 1.5rem 0;
    }

    .content-body table {
        width: 100%;
        border-collapse: collapse;
        margin: 1.5rem 0;
        background: white;
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }

    .content-body th, .content-body td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    .content-body th {
        background: #f8fafc;
        font-weight: 600;
        color: #374151;
    }

    .content-body tr:hover {
        background: #f9fafb;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section relative text-white overflow-hidden flex items-center">
    <div class="relative w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <div class="text-center">
            <!-- Breadcrumb -->
            <nav class="mb-8" data-aos="fade-up" data-aos-delay="200">
                <ol class="flex justify-center items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-white/80 hover:text-white transition-colors">
                            <i class="fas fa-home mr-1"></i>
                            Beranda
                        </a>
                    </li>
                    <li class="text-white/60">/</li>
                    <li>
                        <a href="{{ route('berita') }}" class="text-white/80 hover:text-white transition-colors">Berita</a>
                    </li>
                    <li class="text-white/60">/</li>
                    <li class="text-white font-medium">Detail</li>
                </ol>
            </nav>

            <!-- Featured Badge -->
            @if($berita->featured)
            <div class="mb-6" data-aos="fade-up" data-aos-delay="300">
                <span class="featured-badge inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold">
                    <i class="fas fa-star mr-2 text-yellow-300"></i>
                    BERITA UTAMA
                </span>
            </div>
            @endif

            <!-- Title -->
            <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-8" data-aos="fade-up" data-aos-delay="400">
                {{ $berita->judul }}
            </h1>

            <!-- Meta Info -->
            <div class="flex flex-wrap justify-center items-center gap-4 text-white/80" data-aos="fade-up" data-aos-delay="500">
                <div class="meta-item">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    {{ $berita->formatted_date }}
                </div>
                <div class="meta-item">
                    <i class="fas fa-user mr-2"></i>
                    {{ $berita->penulis ?: 'Admin Desa' }}
                </div>
                <div class="meta-item">
                    <i class="fas fa-eye mr-2"></i>
                    {{ number_format($berita->views) }} views
                </div>
                <div class="meta-item">
                    <i class="fas fa-clock mr-2"></i>
                    {{ $berita->read_time ?? '5' }} menit baca
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Content Card -->
        <article class="content-card" data-aos="fade-up">
            <div class="p-8 lg:p-12">
                <!-- Content Body -->
                <div class="content-body mb-8">
                    <!-- Article Header Info -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 mb-8 border-l-4 border-blue-500">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-newspaper text-white text-xl"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Informasi Artikel</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-calendar-alt text-blue-500"></i>
                                        <span class="text-gray-600">Tanggal Terbit:</span>
                                        <span class="font-semibold text-gray-900">{{ $berita->formatted_date }}</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-clock text-orange-500"></i>
                                        <span class="text-gray-600">Waktu Baca:</span>
                                        <span class="font-semibold text-gray-900">{{ $berita->read_time ?? '5' }} menit</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-star text-yellow-500"></i>
                                        <span class="text-gray-600">Kategori:</span>
                                        <span class="font-semibold text-gray-900">{{ $berita->kategori ?? 'Berita Desa' }}</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-user text-green-500"></i>
                                        <span class="text-gray-600">Penulis:</span>
                                        <span class="font-semibold text-gray-900">{{ $berita->penulis ?: 'Admin Desa' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content with Enhanced Styling -->
                    <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-headings:font-bold prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-ul:text-gray-700 prose-ol:text-gray-700 prose-li:text-gray-700 prose-blockquote:border-l-blue-500 prose-blockquote:bg-blue-50 prose-blockquote:px-6 prose-blockquote:py-4 prose-blockquote:rounded-r-lg prose-blockquote:text-gray-800">
                        {!! $berita->konten !!}
                    </div>

                    <!-- Featured Notice Box -->
                    @if($berita->featured)
                    <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-2xl p-6 mt-8">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-star text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-yellow-800 mb-2">Berita Utama!</h4>
                                <p class="text-yellow-700 text-sm leading-relaxed">
                                    Artikel ini merupakan berita utama yang dipilih oleh redaksi. Berisi informasi penting dan terkini yang perlu diketahui oleh masyarakat.
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 mt-8 pt-6 border-t border-gray-200">
                        <button onclick="copyToClipboard()" class="inline-flex items-center px-6 py-3 bg-blue-100 text-blue-700 rounded-xl font-semibold hover:bg-blue-200 transition-colors">
                            <i class="fas fa-copy mr-2"></i>
                            Salin Link
                        </button>
                        <a href="{{ route('berita') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all">
                            <i class="fas fa-list mr-2"></i>
                            Lihat Semua Berita
                        </a>
                    </div>
                </div>

            </div>
        </article>
    </div>
</section>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 100
    });

    console.log('🚀 ADVANCED BERITA DETAIL PAGE LOADED! 🚀');
});

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
