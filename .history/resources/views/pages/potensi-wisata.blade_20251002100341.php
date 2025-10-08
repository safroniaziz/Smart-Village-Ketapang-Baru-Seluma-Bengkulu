@extends('layouts.app-public')

@section('title', 'Pantai Ancol Seluma - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* Balanced Modern Design - Refined but Engaging */

    .hero-section {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #06b6d4 100%);
        min-height: 85vh;
        position: relative;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 20% 30%, rgba(255,255,255,0.15) 0%, transparent 45%),
            radial-gradient(circle at 80% 70%, rgba(255,255,255,0.1) 0%, transparent 45%),
            radial-gradient(circle at 50% 10%, rgba(59,130,246,0.3) 0%, transparent 30%);
    }

    .hero-section::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to top, rgba(255,255,255,0.1) 0%, transparent 100%);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        text-align: center;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-radius: 50px;
        padding: 0.875rem 1.75rem;
        color: white;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 2rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .hero-badge:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }

    .hero-title {
        font-size: clamp(2.75rem, 5.5vw, 4.5rem);
        font-weight: 800;
        color: white;
        margin-bottom: 1.5rem;
        line-height: 1.1;
        letter-spacing: -0.025em;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .hero-subtitle {
        font-size: clamp(1.15rem, 2.2vw, 1.5rem);
        color: rgba(255, 255, 255, 0.92);
        margin-bottom: 3.5rem;
        font-weight: 400;
        line-height: 1.7;
        max-width: 650px;
        margin-left: auto;
        margin-right: auto;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
        gap: 1.5rem;
        margin-top: 4rem;
        max-width: 650px;
        margin-left: auto;
        margin-right: auto;
    }

    .stat-item {
        text-align: center;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 2rem 1rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #60a5fa, #34d399, #fbbf24, #f87171);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .stat-item:hover::before {
        transform: translateX(0);
    }

    .stat-item:hover {
        background: rgba(255, 255, 255, 0.18);
        transform: translateY(-6px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .stat-number {
        display: block;
        font-size: 2.25rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.85);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* Video Section - Enhanced */
    .video-section {
        padding: 8rem 0;
        background:
            linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%),
            radial-gradient(circle at 30% 20%, rgba(59, 130, 246, 0.05) 0%, transparent 50%);
        position: relative;
        overflow: hidden;
    }

    .video-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #3b82f6, #06b6d4, #10b981, #f59e0b);
    }

    .section-header {
        text-align: center;
        margin-bottom: 5rem;
        position: relative;
    }

    .section-badge {
        display: inline-block;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.875rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .section-title {
        font-size: clamp(2.5rem, 4.5vw, 3.5rem);
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 1.5rem;
        letter-spacing: -0.025em;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #06b6d4);
        border-radius: 2px;
    }

    .section-subtitle {
        font-size: 1.25rem;
        color: #64748b;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.7;
        font-weight: 400;
    }

    .video-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .video-wrapper {
        position: relative;
        background: white;
        border-radius: 28px;
        padding: 3rem;
        box-shadow:
            0 20px 40px rgba(0, 0, 0, 0.1),
            0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .video-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 80%, rgba(59, 130, 246, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(6, 182, 212, 0.05) 0%, transparent 50%);
        pointer-events: none;
    }

    .video-frame {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        margin-top: 2rem;
        z-index: 2;
    }

    .video-frame iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 20px;
    }

    /* Gallery Section - Instagram Style */
    .gallery-section {
        padding: 8rem 0;
        background: #ffffff;
        position: relative;
    }

    .gallery-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, #e5e7eb, transparent);
    }

    .gallery-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
    }

    .gallery-header {
        text-align: center;
        margin-bottom: 4rem;
        position: relative;
    }

    .gallery-header .section-badge {
        background: #f3f4f6;
        color: #374151;
        border: 1px solid #e5e7eb;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        font-weight: 500;
    }

    .gallery-header .section-title {
        color: #111827;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .gallery-header .section-subtitle {
        color: #6b7280;
        font-weight: 400;
    }

    /* Instagram-Style Grid */
    .gallery-instagram {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 4px;
        margin-top: 3rem;
    }

    @media (max-width: 768px) {
        .gallery-instagram {
            grid-template-columns: repeat(2, 1fr);
            gap: 2px;
        }
    }

    @media (max-width: 480px) {
        .gallery-instagram {
            grid-template-columns: 1fr;
            gap: 4px;
        }
    }

    .photo-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        cursor: pointer;
        position: relative;
        aspect-ratio: 1;
    }

    .photo-card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    .photo-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
    }

    .photo-card:hover .photo-image {
        transform: scale(1.05);
    }

    .photo-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        opacity: 0;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2;
    }

    .photo-card:hover .photo-overlay {
        opacity: 1;
    }

    .overlay-content {
        text-align: center;
        color: white;
        padding: 1rem;
        transform: translateY(10px);
        transition: transform 0.3s ease;
    }

    .photo-card:hover .overlay-content {
        transform: translateY(0);
    }

    .overlay-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: white;
    }

    .overlay-description {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.4;
    }

    .photo-likes {
        position: absolute;
        top: 0.75rem;
        right: 0.75rem;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.3s ease;
        z-index: 3;
    }

    .photo-card:hover .photo-likes {
        opacity: 1;
        transform: scale(1);
    }

    /* Photo Stats */
    .photo-stats {
        position: absolute;
        bottom: 0.75rem;
        left: 0.75rem;
        display: flex;
        gap: 1rem;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
        z-index: 3;
    }

    .photo-card:hover .photo-stats {
        opacity: 1;
        transform: translateY(0);
    }

    .stat-item-mini {
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    /* Description Section - Enhanced */
    .description-section {
        padding: 8rem 0;
        background:
            linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%),
            radial-gradient(circle at 70% 30%, rgba(59, 130, 246, 0.05) 0%, transparent 50%);
        position: relative;
        overflow: hidden;
    }

    .description-section::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #10b981, #3b82f6, #8b5cf6, #ec4899);
    }

    .description-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .description-grid {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 5rem;
        align-items: start;
    }

    .description-content h2 {
        font-size: clamp(2.25rem, 3.5vw, 3rem);
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 2.5rem;
        letter-spacing: -0.025em;
        position: relative;
    }

    .description-content h2::before {
        content: '';
        position: absolute;
        left: -2rem;
        top: 0;
        bottom: 0;
        width: 5px;
        background: linear-gradient(to bottom, #3b82f6, #06b6d4);
        border-radius: 3px;
    }

    .description-text {
        font-size: 1.125rem;
        line-height: 1.8;
        color: #475569;
        font-weight: 400;
    }

    .info-cards {
        display: grid;
        gap: 2rem;
    }

    .info-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.1),
            0 4px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #06b6d4, #10b981);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }

    .info-card:hover::before {
        transform: scaleX(1);
    }

    .info-card:hover {
        transform: translateY(-8px);
        box-shadow:
            0 20px 40px rgba(0, 0, 0, 0.15),
            0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .info-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
        position: relative;
    }

    .info-icon::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, transparent 50%);
        border-radius: 16px;
    }

    .info-card h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0.75rem;
    }

    .info-card p {
        color: #64748b;
        line-height: 1.7;
        font-size: 1rem;
    }

    /* Instagram-Style Modal */
    .modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.85);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .modal.show {
        opacity: 1;
    }

    .modal-content {
        position: relative;
        max-width: 80vw;
        max-height: 85vh;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        transform: scale(0.95);
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .modal.show .modal-content {
        transform: scale(1);
    }

    .modal-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 32px;
        height: 32px;
        background: rgba(0, 0, 0, 0.6);
        border: none;
        border-radius: 50%;
        color: white;
        font-size: 0.9rem;
        cursor: pointer;
        z-index: 10;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-close:hover {
        background: rgba(0, 0, 0, 0.8);
        transform: scale(1.1);
    }

    .modal-image-container {
        flex: 1;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #000;
        min-height: 400px;
    }

    .modal-image {
        max-width: 100%;
        max-height: 70vh;
        object-fit: contain;
        display: block;
    }

    .modal-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: rgba(0, 0, 0, 0.6);
        border: none;
        border-radius: 50%;
        color: white;
        font-size: 1rem;
        cursor: pointer;
        z-index: 10;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-prev {
        left: 1rem;
    }

    .modal-next {
        right: 1rem;
    }

    .modal-nav:hover {
        background: rgba(0, 0, 0, 0.8);
        transform: translateY(-50%) scale(1.1);
    }

    .modal-info {
        padding: 1.5rem;
        background: white;
        border-top: 1px solid #f3f4f6;
    }

    .modal-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #111827;
        line-height: 1.4;
    }

    .modal-description {
        color: #6b7280;
        line-height: 1.5;
        font-size: 0.95rem;
        margin-bottom: 1rem;
    }

    .modal-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid #f3f4f6;
    }

    .modal-stats {
        display: flex;
        gap: 1.5rem;
    }

    .modal-stat {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #6b7280;
        font-size: 0.9rem;
    }

    .modal-actions {
        display: flex;
        gap: 0.5rem;
    }

    .modal-action-btn {
        width: 32px;
        height: 32px;
        border: 1px solid #e5e7eb;
        background: white;
        border-radius: 6px;
        color: #6b7280;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-action-btn:hover {
        background: #f9fafb;
        color: #374151;
    }

    .modal-action-btn.liked {
        color: #ef4444;
        background: #fef2f2;
        border-color: #fecaca;
    }

    .modal-placeholder {
        color: #9ca3af;
        font-style: italic;
        text-align: center;
        padding: 1rem 0;
    }

    /* Modal Responsive */
    @media (max-width: 768px) {
        .modal {
            padding: 0.5rem;
        }

        .modal-content {
            max-width: 100vw;
            max-height: 95vh;
        }

        .modal-image {
            max-height: 60vh;
        }

        .modal-info {
            padding: 1rem;
        }

        .modal-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .modal-stats {
            width: 100%;
        }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }

        .description-grid {
            grid-template-columns: 1fr;
            gap: 4rem;
        }

        .description-content h2::before {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            min-height: 75vh;
        }

        .stats-container {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
        }

        .gallery-container {
            padding: 0 1rem;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .video-wrapper {
            padding: 2rem;
        }

        .modal-content {
            max-width: 95vw;
        }

        .photo-card:hover {
            transform: translateY(-10px);
        }
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Loading animation */
    .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <div data-aos="fade-up" data-aos-duration="800">
            <!-- Badge -->
            <span class="hero-badge">
                <i class="fas fa-map-marker-alt"></i>
                Destinasi Unggulan
            </span>

            @if($wisata)
                <!-- Title -->
                <h1 class="hero-title">{{ $wisata->nama }}</h1>

                <!-- Location -->
                <div class="hero-subtitle">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    {{ $wisata->lokasi }}
                </div>

                <!-- Description -->
                <p class="hero-subtitle">
                    {{ Str::limit(strip_tags($wisata->deskripsi), 180) }}
                </p>

                <!-- Stats -->
                <div class="stats-container">
                    @if($galleryCount > 0)
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                        <span class="stat-number">{{ $galleryCount }}</span>
                        <span class="stat-label">Foto Gallery</span>
                    </div>
                    @endif

                    @if($wisata->video_youtube)
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                        <span class="stat-number">1</span>
                        <span class="stat-label">Video Tour</span>
                    </div>
                    @endif

                    <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                        <span class="stat-number">{{ number_format($wisata->views ?? 0) }}</span>
                        <span class="stat-label">Total Views</span>
                    </div>

                    <div class="stat-item" data-aos="fade-up" data-aos-delay="500">
                        <span class="stat-number">4.9</span>
                        <span class="stat-label">Rating</span>
                    </div>
                </div>
            @else
                <h1 class="hero-title">Potensi Wisata</h1>
                <p class="hero-subtitle">Destinasi wisata akan segera hadir</p>
            @endif
        </div>
    </div>
</section>

@if($wisata)
<!-- Video Section -->
@if($wisata->video_youtube)
<section class="video-section">
    <div class="section-header" data-aos="fade-up">
        <span class="section-badge">Video Tour</span>
        <h2 class="section-title">Jelajahi Keindahan</h2>
        <p class="section-subtitle">
            Saksikan keindahan {{ $wisata->nama }} dalam video tour yang menakjubkan dan rasakan pengalaman visual yang memukau
        </p>
    </div>

    <div class="video-container">
        <div class="video-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="video-frame">
                <iframe
                    src="https://www.youtube.com/embed/{{ $youtubeId }}"
                    title="{{ $wisata->nama }} - Video Tour"
                    frameborder="0"
                    allowfullscreen
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Gallery Section -->
<section class="gallery-section">
    <div class="gallery-container">
        <div class="gallery-header" data-aos="fade-up">
            <span class="section-badge">Galeri Foto</span>
            <h2 class="section-title">Momen Terindah</h2>
            <p class="section-subtitle">
                Jelajahi keindahan {{ $wisata->nama }} melalui koleksi foto-foto menakjubkan yang menampilkan pesona alam yang memukau
            </p>
        </div>

        @if($galleryPhotos && count($galleryPhotos) > 0)
        <div class="gallery-instagram">
            @foreach($galleryPhotos as $index => $photo)
            <div class="photo-card"
                 data-aos="fade-in"
                 data-aos-delay="{{ 50 + ($index * 30) }}"
                 onclick="openModal({{ $index }})">

                <img src="{{ $photo['url'] }}"
                     alt="{{ $photo['judul'] ?? 'Foto ' . ($index + 1) }}"
                     class="photo-image"
                     loading="lazy">

                <div class="photo-overlay">
                    <div class="overlay-content">
                        <div class="overlay-title">{{ $photo['judul'] ?? 'Foto ' . ($index + 1) }}</div>
                        @if($photo['keterangan'])
                        <div class="overlay-description">{{ Str::limit($photo['keterangan'], 80) }}</div>
                        @endif
                    </div>
                </div>

                <div class="photo-likes">
                    <i class="fas fa-heart"></i> {{ rand(10, 99) }}
                </div>

                <div class="photo-stats">
                    <div class="stat-item-mini">
                        <i class="fas fa-eye"></i> {{ rand(100, 999) }}
                    </div>
                    <div class="stat-item-mini">
                        <i class="fas fa-share"></i> {{ rand(5, 50) }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16" data-aos="fade-up">
            <i class="fas fa-images text-6xl text-white opacity-50 mb-4"></i>
            <h3 class="text-2xl font-semibold text-white mb-2">Belum ada foto</h3>
            <p class="text-white opacity-75">Galeri foto akan segera ditambahkan</p>
        </div>
        @endif
    </div>
</section>

<!-- Description Section -->
<section class="description-section">
    <div class="description-container">
        <div class="description-grid">
            <div class="description-content" data-aos="fade-right">
                <h2>Tentang {{ $wisata->nama }}</h2>
                <div class="description-text">
                    {!! $wisata->deskripsi !!}
                </div>
            </div>

            <div class="info-cards" data-aos="fade-left">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Lokasi</h3>
                    <p>{{ $wisata->lokasi }}</p>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Rating Pengunjung</h3>
                    <div class="flex items-center gap-2">
                        <div class="flex text-yellow-400 text-sm">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <span class="text-gray-600 ml-2">(4.9 dari 5)</span>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Total Views</h3>
                    <p>{{ number_format($wisata->views ?? 0) }} kali dilihat</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Instagram-Style Photo Modal -->
<div id="photoModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal()">
            <i class="fas fa-times"></i>
        </button>

        <div class="modal-image-container">
            <img id="modalImage" src="" alt="" class="modal-image">

            @if($galleryPhotos && count($galleryPhotos) > 1)
            <button class="modal-nav modal-prev" onclick="prevPhoto()">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="modal-nav modal-next" onclick="nextPhoto()">
                <i class="fas fa-chevron-right"></i>
            </button>
            @endif
        </div>

        <div class="modal-info">
            <h3 id="modalTitle" class="modal-title"></h3>
            <p id="modalDescription" class="modal-description"></p>

            <div class="modal-meta">
                <div class="modal-stats">
                    <div class="modal-stat">
                        <i class="fas fa-eye"></i>
                        <span id="modalViews">0</span>
                    </div>
                    <div class="modal-stat">
                        <i class="fas fa-calendar"></i>
                        <span>Pantai Ancol Seluma</span>
                    </div>
                </div>

                <div class="modal-actions">
                    <button class="modal-action-btn" id="likeBtn" onclick="toggleLike()">
                        <i class="fas fa-heart"></i>
                    </button>
                    <button class="modal-action-btn" onclick="sharePhoto()">
                        <i class="fas fa-share"></i>
                    </button>
                    <button class="modal-action-btn" onclick="downloadPhoto()">
                        <i class="fas fa-download"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 100
    });

    // Gallery data
    const galleryData = @json($galleryPhotos ?? []);
    let currentPhotoIndex = 0;

    // Open modal
    function openModal(index) {
        if (!galleryData || galleryData.length === 0) return;

        currentPhotoIndex = index;
        updateModalContent();

        const modal = document.getElementById('photoModal');
        modal.style.display = 'flex';
        setTimeout(() => {
            modal.classList.add('show');
        }, 10);

        document.body.style.overflow = 'hidden';
    }

    // Close modal
    function closeModal() {
        const modal = document.getElementById('photoModal');
        modal.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }, 400);
    }

    // Previous photo
    function prevPhoto() {
        if (!galleryData || galleryData.length <= 1) return;

        currentPhotoIndex = (currentPhotoIndex - 1 + galleryData.length) % galleryData.length;
        updateModalContent();
    }

    // Next photo
    function nextPhoto() {
        if (!galleryData || galleryData.length <= 1) return;

        currentPhotoIndex = (currentPhotoIndex + 1) % galleryData.length;
        updateModalContent();
    }

    // Update modal content
    function updateModalContent() {
        const photo = galleryData[currentPhotoIndex];
        const photoNumber = currentPhotoIndex + 1;

        // Update image
        document.getElementById('modalImage').src = photo.url;
        document.getElementById('modalImage').alt = photo.judul || `Foto ${photoNumber}`;

        // Update title dengan fallback yang elegant
        const titleElement = document.getElementById('modalTitle');
        if (photo.judul && photo.judul.trim() !== '') {
            titleElement.textContent = photo.judul;
            titleElement.classList.remove('modal-placeholder');
        } else {
            titleElement.textContent = `Foto ${photoNumber} - Pantai Ancol Seluma`;
            titleElement.classList.add('modal-placeholder');
        }

        // Update description dengan fallback yang elegant
        const descElement = document.getElementById('modalDescription');
        if (photo.keterangan && photo.keterangan.trim() !== '') {
            descElement.textContent = photo.keterangan;
            descElement.classList.remove('modal-placeholder');
            descElement.style.display = 'block';
        } else {
            descElement.textContent = 'Nikmati keindahan Pantai Ancol Seluma yang memukau dengan pemandangan yang spektakuler.';
            descElement.classList.add('modal-placeholder');
            descElement.style.display = 'block';
        }

        // Update views (random untuk demo)
        document.getElementById('modalViews').textContent = Math.floor(Math.random() * 900) + 100;
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('photoModal');
        if (modal.classList.contains('show')) {
            if (e.key === 'Escape') {
                closeModal();
            } else if (e.key === 'ArrowLeft') {
                prevPhoto();
            } else if (e.key === 'ArrowRight') {
                nextPhoto();
            }
        }
    });

    // Instagram-like interactions
    let isLiked = false;

    function toggleLike() {
        const likeBtn = document.getElementById('likeBtn');
        isLiked = !isLiked;

        if (isLiked) {
            likeBtn.classList.add('liked');
            // Add heart animation
            likeBtn.style.transform = 'scale(1.2)';
            setTimeout(() => {
                likeBtn.style.transform = 'scale(1)';
            }, 200);
        } else {
            likeBtn.classList.remove('liked');
        }
    }

    function sharePhoto() {
        const photo = galleryData[currentPhotoIndex];
        const shareText = `Lihat foto indah dari Pantai Ancol Seluma: ${photo.judul || 'Pantai Ancol Seluma'}`;

        if (navigator.share) {
            navigator.share({
                title: photo.judul || 'Pantai Ancol Seluma',
                text: shareText,
                url: window.location.href
            });
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(window.location.href + '#photo-' + (currentPhotoIndex + 1));
            alert('Link telah disalin ke clipboard!');
        }
    }

    function downloadPhoto() {
        const photo = galleryData[currentPhotoIndex];
        const link = document.createElement('a');
        link.href = photo.url;
        link.download = `pantai-ancol-seluma-${currentPhotoIndex + 1}.jpg`;
        link.target = '_blank';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // Click outside modal to close
    document.getElementById('photoModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Update views counter
    @if($wisata)
    fetch('{{ route("potensi-wisata.increment-views", $wisata->id) }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    }).catch(console.error);
    @endif
</script>
@endpush
