@extends('layouts.app-public')

@section('title', $pengumuman->judul . ' - Pengumuman Desa Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="announcement-hero-section position-relative">
    <div class="hero-background">
        <div class="hero-gradient-overlay"></div>
        <div class="hero-pattern"></div>
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
                                <a href="{{ route('pengumuman') }}" class="text-white-75 text-decoration-none">Pengumuman</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                    
                    <!-- Priority Badge -->
                    <div class="priority-badge-hero mb-3">
                        <span class="badge {{ $pengumuman->priority_badge_class }} bg-gradient px-4 py-3 rounded-pill fs-5 fw-bold">
                            @if($pengumuman->prioritas == 'Tinggi')
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                PRIORITAS TINGGI
                            @elseif($pengumuman->prioritas == 'Sedang')
                                <i class="fas fa-info-circle me-2"></i>
                                PRIORITAS SEDANG
                            @else
                                <i class="fas fa-check-circle me-2"></i>
                                PRIORITAS RENDAH
                            @endif
                        </span>
                    </div>
                    
                    <h1 class="announcement-title display-4 fw-bold mb-4">{{ $pengumuman->judul }}</h1>
                    
                    <div class="announcement-meta d-flex flex-wrap justify-content-center align-items-center gap-4 text-white-75">
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt me-2"></i>
                            {{ $pengumuman->formatted_date }}
                        </div>
                        @if($pengumuman->tanggal_berakhir)
                            <div class="meta-item">
                                <i class="fas fa-hourglass-end me-2"></i>
                                Berakhir: {{ $pengumuman->formatted_end_date }}
                            </div>
                        @endif
                        <div class="meta-item">
                            <i class="fas fa-user me-2"></i>
                            {{ $pengumuman->penulis }}
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-eye me-2"></i>
                            {{ number_format($pengumuman->views) }} views
                        </div>
                    </div>
                    
                    <!-- Status Badge -->
                    <div class="status-badge-hero mt-4">
                        @if($pengumuman->is_expired)
                            <span class="badge bg-secondary bg-gradient px-4 py-2 rounded-pill fs-6">
                                <i class="fas fa-times-circle me-2"></i>
                                Pengumuman Sudah Berakhir
                            </span>
                        @elseif($pengumuman->tanggal_berakhir)
                            <span class="badge bg-success bg-gradient px-4 py-2 rounded-pill fs-6 pulsing-badge">
                                <i class="fas fa-check-circle me-2"></i>
                                Masih Berlaku
                            </span>
                        @else
                            <span class="badge bg-primary bg-gradient px-4 py-2 rounded-pill fs-6">
                                <i class="fas fa-infinity me-2"></i>
                                Berlaku Terus
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Alert Icons -->
    <div class="floating-alerts">
        <div class="floating-alert floating-1" data-aos="fade-up" data-aos-delay="400">
            <i class="fas fa-bell"></i>
        </div>
        <div class="floating-alert floating-2" data-aos="fade-up" data-aos-delay="600">
            <i class="fas fa-bullhorn"></i>
        </div>
        <div class="floating-alert floating-3" data-aos="fade-up" data-aos-delay="800">
            <i class="fas fa-exclamation"></i>
        </div>
    </div>
</section>

<!-- Announcement Content Section -->
<section class="announcement-content-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Important Notice Bar -->
                @if($pengumuman->prioritas == 'Tinggi' && !$pengumuman->is_expired)
                <div class="important-notice-bar mb-5" data-aos="fade-down">
                    <div class="alert alert-danger border-0 shadow-sm d-flex align-items-center p-4">
                        <div class="notice-icon me-3">
                            <i class="fas fa-exclamation-triangle fa-2x text-danger pulsing-icon"></i>
                        </div>
                        <div class="notice-content flex-grow-1">
                            <div class="notice-title fw-bold text-danger mb-1">PENGUMUMAN PENTING</div>
                            <div class="notice-text text-dark">
                                Mohon perhatian khusus untuk pengumuman ini. Pastikan Anda membaca dengan teliti.
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <article class="announcement-content" data-aos="fade-up">
                    <div class="content-wrapper bg-white shadow-sm rounded-4 p-4 p-lg-5">
                        <!-- Social Share -->
                        <div class="social-share-top mb-5">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                                <div class="share-text">
                                    <small class="text-muted fw-semibold">Bagikan pengumuman ini:</small>
                                </div>
                                <div class="share-buttons d-flex flex-wrap gap-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                                       target="_blank" 
                                       class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                        <i class="fab fa-facebook-f me-1"></i>
                                        Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($pengumuman->judul) }}" 
                                       target="_blank" 
                                       class="btn btn-outline-info btn-sm rounded-pill px-3">
                                        <i class="fab fa-twitter me-1"></i>
                                        Twitter
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($pengumuman->judul . ' - ' . request()->fullUrl()) }}" 
                                       target="_blank" 
                                       class="btn btn-outline-success btn-sm rounded-pill px-3">
                                        <i class="fab fa-whatsapp me-1"></i>
                                        WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Announcement Body -->
                        <div class="announcement-body">
                            {!! $pengumuman->konten !!}
                        </div>
                        
                        <!-- Announcement Footer -->
                        <div class="announcement-footer mt-5 pt-4 border-top">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-avatar me-3">
                                            <div class="avatar bg-warning bg-gradient rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        </div>
                                        <div class="author-details">
                                            <div class="author-name fw-bold text-dark">{{ $pengumuman->penulis }}</div>
                                            <div class="author-role small text-muted">Penerbit Pengumuman</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                    <div class="announcement-actions d-flex justify-content-md-end gap-2">
                                        <button class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="window.print()">
                                            <i class="fas fa-print me-1"></i>
                                            Print
                                        </button>
                                        <button class="btn btn-outline-warning btn-sm rounded-pill px-3" onclick="copyToClipboard()">
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
