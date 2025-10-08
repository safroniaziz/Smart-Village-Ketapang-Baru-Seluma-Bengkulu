@extends('layouts.app-public')

@section('title', $pengumuman->judul . ' - Pengumuman Desa Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* 🚀 ADVANCED DETAIL PAGE STYLES 🚀 */
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

    .priority-badge {
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
                        <a href="{{ route('pengumuman') }}" class="text-white/80 hover:text-white transition-colors">Pengumuman</a>
                    </li>
                    <li class="text-white/60">/</li>
                    <li class="text-white font-medium">Detail</li>
                </ol>
            </nav>

            <!-- Priority Badge -->
            <div class="mb-6" data-aos="fade-up" data-aos-delay="300">
                <span class="priority-badge inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold">
                    @if($pengumuman->prioritas == 'Tinggi')
                        <i class="fas fa-exclamation-triangle mr-2 text-red-300"></i>
                        PRIORITAS TINGGI
                    @elseif($pengumuman->prioritas == 'Sedang')
                        <i class="fas fa-info-circle mr-2 text-yellow-300"></i>
                        PRIORITAS SEDANG
                    @else
                        <i class="fas fa-check-circle mr-2 text-green-300"></i>
                        PRIORITAS RENDAH
                    @endif
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-8" data-aos="fade-up" data-aos-delay="400">
                {{ $pengumuman->judul }}
            </h1>

            <!-- Meta Info -->
            <div class="flex flex-wrap justify-center items-center gap-4 text-white/80" data-aos="fade-up" data-aos-delay="500">
                <div class="meta-item">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    {{ $pengumuman->formatted_date }}
                </div>
                @if($pengumuman->tanggal_berakhir)
                    <div class="meta-item">
                        <i class="fas fa-hourglass-end mr-2"></i>
                        Berakhir: {{ $pengumuman->formatted_end_date }}
                    </div>
                @endif
                <div class="meta-item">
                    <i class="fas fa-user mr-2"></i>
                    {{ $pengumuman->penulis ?: 'Admin Desa' }}
                </div>
                <div class="meta-item">
                    <i class="fas fa-eye mr-2"></i>
                    {{ number_format($pengumuman->views) }} views
                </div>
            </div>

            <!-- Status Badge -->
            <div class="mt-6" data-aos="fade-up" data-aos-delay="600">
                @if($pengumuman->is_expired)
                    <span class="priority-badge inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-red-500/20 text-red-200">
                        <i class="fas fa-times-circle mr-2"></i>
                        Pengumuman Sudah Berakhir
                    </span>
                @elseif($pengumuman->tanggal_berakhir)
                    <span class="priority-badge inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-green-500/20 text-green-200">
                        <i class="fas fa-check-circle mr-2"></i>
                        Masih Berlaku
                    </span>
                @else
                    <span class="priority-badge inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-blue-500/20 text-blue-200">
                        <i class="fas fa-infinity mr-2"></i>
                        Berlaku Terus
                    </span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Important Notice Bar -->
        @if($pengumuman->prioritas == 'Tinggi' && !$pengumuman->is_expired)
        <div class="mb-8" data-aos="fade-down">
            <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-r-xl shadow-lg">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-3xl text-red-500 animate-pulse"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-red-800 mb-2">PENGUMUMAN PENTING</h3>
                        <p class="text-red-700">
                            Mohon perhatian khusus untuk pengumuman ini. Pastikan Anda membaca dengan teliti.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Main Content Card -->
        <article class="content-card" data-aos="fade-up">
            <div class="p-8 lg:p-12">
                <!-- Social Share -->
                <div class="mb-8">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                        <div class="text-gray-600 font-semibold">
                            Bagikan pengumuman ini:
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                               target="_blank"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-full text-sm font-medium hover:bg-blue-700 transition-colors">
                                <i class="fab fa-facebook-f mr-2"></i>
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($pengumuman->judul) }}"
                               target="_blank"
                               class="inline-flex items-center px-4 py-2 bg-sky-500 text-white rounded-full text-sm font-medium hover:bg-sky-600 transition-colors">
                                <i class="fab fa-twitter mr-2"></i>
                                Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($pengumuman->judul . ' - ' . request()->fullUrl()) }}"
                               target="_blank"
                               class="inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-full text-sm font-medium hover:bg-green-600 transition-colors">
                                <i class="fab fa-whatsapp mr-2"></i>
                                WhatsApp
                            </a>
                            <button onclick="copyToClipboard()" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-full text-sm font-medium hover:bg-gray-700 transition-colors">
                                <i class="fas fa-copy mr-2"></i>
                                Copy Link
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Content Body -->
                <div class="prose prose-lg max-w-none mb-8">
                    {!! $pengumuman->konten !!}
                </div>

                <!-- Content Footer -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                        <!-- Author Info -->
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-user text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">{{ $pengumuman->penulis ?: 'Admin Desa' }}</div>
                                <div class="text-sm text-gray-600">Penerbit Pengumuman</div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-3">
                            <button onclick="window.print()" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors">
                                <i class="fas fa-print mr-2"></i>
                                Print
                            </button>
                            <button onclick="copyToClipboard()" class="inline-flex items-center px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-medium hover:bg-yellow-200 transition-colors">
                                <i class="fas fa-link mr-2"></i>
                                Copy Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Related Announcements Section -->
@if($relatedPengumuman->count() > 0)
<section class="related-announcements-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title h1 fw-bold text-dark mb-3">Pengumuman Terkait</h2>
                    <p class="section-subtitle text-muted">Pengumuman lain yang mungkin penting untuk Anda</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @foreach($relatedPengumuman as $index => $related)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <article class="related-announcement-card h-100">
                        <div class="card border-0 shadow-sm h-100 related-card-hover">
                            <div class="card-header bg-white border-0 pb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge {{ $related->priority_badge_class }} fs-7 px-2 py-1">
                                        {{ $related->prioritas }}
                                    </span>
                                    @if($related->is_expired)
                                        <span class="badge bg-secondary fs-7 px-2 py-1">Berakhir</span>
                                    @endif
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column p-4 pt-2">
                                <div class="related-meta mb-2">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ $related->formatted_date }}
                                    </small>
                                </div>

                                <h3 class="related-title h6 fw-bold text-dark mb-3">
                                    <a href="{{ route('pengumuman.show', $related->slug) }}"
                                       class="text-decoration-none text-dark related-title-link">
                                        {{ $related->judul }}
                                    </a>
                                </h3>

                                <p class="related-excerpt text-muted small mb-3 flex-grow-1">
                                    {{ Str::limit($related->excerpt, 100) }}
                                </p>

                                <div class="related-footer">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="fas fa-eye me-1"></i>
                                            {{ number_format($related->views) }}
                                        </small>
                                        <a href="{{ route('pengumuman.show', $related->slug) }}"
                                           class="btn btn-outline-warning btn-sm rounded-pill px-3">
                                            Lihat
                                        </a>
                                    </div>
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

<!-- Back to Announcements -->
<div class="back-to-announcements-section py-4 bg-warning bg-gradient">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('pengumuman') }}" class="btn btn-dark btn-lg rounded-pill px-5 py-3">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali ke Semua Pengumuman
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Announcement Hero */
.announcement-hero-section {
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

.hero-gradient-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    z-index: 2;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image:
        radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 2px, transparent 2px),
        radial-gradient(circle at 80% 50%, rgba(255, 255, 255, 0.1) 2px, transparent 2px);
    background-size: 100px 100px;
    z-index: 3;
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

.priority-badge-hero .badge {
    font-size: 1rem;
    letter-spacing: 1px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

.announcement-title {
    font-size: 3rem;
    line-height: 1.2;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.announcement-meta {
    font-size: 1rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

.meta-item {
    white-space: nowrap;
}

.pulsing-badge {
    animation: badgePulse 2s infinite;
}

@keyframes badgePulse {
    0% { box-shadow: 0 0 0 0 rgba(25, 135, 84, 0.7); }
    70% { box-shadow: 0 0 0 10px rgba(25, 135, 84, 0); }
    100% { box-shadow: 0 0 0 0 rgba(25, 135, 84, 0); }
}

/* Floating Alerts */
.floating-alerts {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
    z-index: 4;
}

.floating-alert {
    position: absolute;
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, 0.3);
    font-size: 1.2rem;
    animation: floatAlert 8s ease-in-out infinite;
}

.floating-1 {
    top: 15%;
    left: 15%;
    animation-delay: 0s;
}

.floating-2 {
    top: 70%;
    right: 20%;
    animation-delay: 3s;
}

.floating-3 {
    bottom: 25%;
    left: 25%;
    animation-delay: 6s;
}

@keyframes floatAlert {
    0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.3; }
    50% { transform: translateY(-25px) rotate(180deg); opacity: 0.6; }
}

/* Important Notice */
.important-notice-bar {
    animation: slideDown 0.5s ease-out;
}

@keyframes slideDown {
    from { transform: translateY(-20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.pulsing-icon {
    animation: iconPulse 1.5s ease-in-out infinite;
}

@keyframes iconPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
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

/* Announcement Body Styling */
.announcement-body {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.announcement-body h1,
.announcement-body h2,
.announcement-body h3,
.announcement-body h4,
.announcement-body h5,
.announcement-body h6 {
    color: #2c3e50;
    font-weight: 700;
    margin: 2rem 0 1rem 0;
}

.announcement-body p {
    margin-bottom: 1.5rem;
    text-align: justify;
}

.announcement-body strong {
    color: #e74c3c;
    font-weight: 700;
}

.announcement-body ul,
.announcement-body ol {
    padding-left: 2rem;
    margin-bottom: 1.5rem;
}

.announcement-body li {
    margin-bottom: 0.5rem;
    line-height: 1.6;
}

.announcement-body blockquote {
    border-left: 4px solid var(--bs-warning);
    background: #fff3cd;
    padding: 1.5rem;
    margin: 2rem 0;
    border-radius: 0 8px 8px 0;
    font-style: italic;
}

/* Author Info */
.author-info {
    padding: 1rem;
    background: #fff8e1;
    border-radius: 12px;
}

.avatar {
    font-size: 1.2rem;
}

/* Related Announcements */
.related-card-hover {
    transition: all 0.3s ease;
}

.related-card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
}

.related-title-link {
    transition: color 0.3s ease;
}

.related-title-link:hover {
    color: var(--bs-warning) !important;
}

/* Back to Announcements */
.back-to-announcements-section .btn {
    transition: all 0.3s ease;
}

.back-to-announcements-section .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
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

/* Print Styles */
@media print {
    .announcement-hero-section,
    .related-announcements-section,
    .back-to-announcements-section,
    .social-share-top,
    .announcement-actions,
    .important-notice-bar {
        display: none !important;
    }

    .announcement-content-section {
        padding: 0 !important;
    }

    .content-wrapper {
        box-shadow: none !important;
        border: none !important;
    }
}

/* Responsive */
@media (max-width: 768px) {
    .announcement-title {
        font-size: 2rem;
    }

    .announcement-meta {
        flex-direction: column;
        gap: 0.5rem !important;
    }

    .meta-item {
        font-size: 0.9rem;
    }

    .priority-badge-hero .badge {
        font-size: 0.9rem;
    }

    .social-share-top {
        text-align: center;
    }

    .share-buttons {
        justify-content: center;
    }

    .announcement-body {
        font-size: 1rem;
    }

    .author-info {
        text-align: center;
        flex-direction: column;
    }

    .announcement-actions {
        justify-content: center !important;
    }

    .important-notice-bar .alert {
        text-align: center;
        flex-direction: column;
    }

    .notice-icon {
        margin-bottom: 1rem;
        margin-right: 0 !important;
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
            background: #ffc107;
            color: #212529;
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
