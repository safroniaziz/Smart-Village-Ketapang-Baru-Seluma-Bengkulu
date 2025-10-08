@extends('layouts.app-public')

@section('title', 'Pantai Ancol Seluma - Smart Village Ketapang Baru')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* Modern Tourism Page Design System */

    /* Smooth gradient animation like statistik page */
    .hero-gradient {
        background: linear-gradient(135deg, #0f766e 0%, #0891b2 25%, #0284c7 50%, #2563eb 75%, #4f46e5 100%);
        background-size: 200% 200%;
        animation: gradientShift 8s ease infinite;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Enhanced card hover effects */
    .stat-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform-origin: center;
    }

    .stat-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    /* Consistent section spacing */
    .section-spacing {
        padding: 6rem 0;
    }

    .section-spacing-lg {
        padding: 8rem 0;
    }

    /* Enhanced info cards */
    .info-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.04);
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .info-card-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .info-card h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 1rem;
    }

    .info-card p {
        color: #64748b;
        line-height: 1.7;
        font-size: 1rem;
    }

    /* Quick stats in hero */
    .hero-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-top: 3rem;
    }

    @media (min-width: 768px) {
        .hero-stats {
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }
    }

    .hero-stat-item {
        background: rgba(255, 255, 255, 0.1);
        backdrop-blur: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        padding: 1.5rem 1rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .hero-stat-item:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-3px);
    }

    .hero-stat-number {
        font-size: 1.75rem;
        font-weight: 800;
        color: #fbbf24;
        display: block;
        margin-bottom: 0.5rem;
    }

    .hero-stat-label {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* Video Section */
    .video-section {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        position: relative;
        overflow: hidden;
    }

    .video-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, #0f766e, #0891b2, #0284c7, #2563eb);
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-badge {
        display: inline-block;
        background: linear-gradient(135deg, #0f766e, #0891b2);
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.875rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px rgba(15, 118, 110, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .section-title {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 1rem;
        letter-spacing: -0.025em;
    }

    .section-subtitle {
        font-size: 1.125rem;
        background: linear-gradient(135deg, #64748b 0%, #475569 30%, #334155 70%, #1e293b 100%);
        background-size: 200% 200%;
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 500;
        animation: subtitleGradient 4s ease-in-out infinite alternate;
        /* Fallback untuk browser yang tidak support background-clip */
        -webkit-text-fill-color: transparent;
    }

    /* Fallback untuk browser lama */
    @supports not (background-clip: text) {
        .section-subtitle {
            color: #64748b;
            background: none;
        }
    }

    @keyframes subtitleGradient {
        0% {
            background-position: 0% 50%;
        }
        100% {
            background-position: 100% 50%;
        }
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

        /* Gallery Section */
    .gallery-section {
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
        background: linear-gradient(135deg, #6b7280 0%, #4b5563 30%, #374151 70%, #1f2937 100%);
        background-size: 200% 200%;
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        -webkit-text-fill-color: transparent;
        font-weight: 500;
        animation: subtitleGradient 4s ease-in-out infinite alternate;
    }

    /* Fallback untuk gallery subtitle */
    @supports not (background-clip: text) {
        .gallery-header .section-subtitle {
            color: #6b7280;
            background: none;
        }
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

    /* Enhanced Description Section Styles */
    .animation-delay-1000 {
        animation-delay: 1s;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    /* Pulse animation for decorative elements */
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            opacity: 0.3;
        }
        50% {
            transform: scale(1.05);
            opacity: 0.5;
        }
    }

    /* Hover effects for feature cards */
    .bg-white\/80:hover {
        background-color: rgba(255, 255, 255, 0.95);
        transform: translateY(-4px);
    }

    /* Backdrop blur support */
    .backdrop-blur-sm {
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
    }

    /* Glass morphism effect */
    .glass-effect {
        background: rgba(255, 255, 255, 0.25);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    /* Gradient text animation */
    .gradient-text-animate {
        background: linear-gradient(-45deg, #14b8a6, #06b6d4, #3b82f6, #14b8a6);
        background-size: 400% 400%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: gradientShift 3s ease infinite;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Smooth hover transitions */
    .smooth-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .smooth-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    /* Progress bar animation */
    .progress-bar {
        animation: progressAnimation 2s ease-in-out forwards;
    }

    @keyframes progressAnimation {
        from { width: 0%; }
        to { width: 85%; }
    }

    /* Video fallback styles */
    .video-fallback {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    /* Aspect ratio fix for video container */
    .aspect-w-16 {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        background: #000;
    }

    .aspect-w-16 > * {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    /* Video iframe specific styles */
    .video-iframe {
        border: none;
        outline: none;
    }

    /* Ensure video fallback is hidden by default */
    .video-fallback {
        display: none;
    }

    /* Modal Styles */
    .modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }

    .modal-container {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        width: 90%;
        max-width: 1200px;
        height: 95vh;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        animation: modalSlideIn 0.3s ease-out;
    }

    /* PDF Modal specific styling */
    #pdfModal .modal-container {
        width: 85%;
        max-width: 1000px;
        height: 90vh;
        min-height: 600px;
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: scale(0.95) translateY(-20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
        background: #f9fafb;
    }

    .modal-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #111827;
        display: flex;
        align-items: center;
    }

    .modal-close {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        background: #ef4444;
        color: white;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .modal-close:hover {
        background: #dc2626;
        transform: scale(1.05);
    }

    .modal-body {
        flex: 1;
        overflow: hidden;
    }

    .modal-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 0.75rem;
        padding: 1.5rem;
        border-top: 1px solid #e5e7eb;
        background: #f9fafb;
    }

    .pdf-viewer-container {
        height: 70vh;
        min-height: 500px;
    }

    .video-modal-container {
        height: 70vh;
        min-height: 500px;
        position: relative;
        background: #000;
    }

    .video-modal-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Enhanced PDF Viewer Styles */
    .pdf-simple-viewer {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        border-radius: 0 0 0.75rem 0.75rem;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border: 1px solid #e2e8f0;
    }

    .pdf-direct-frame {
        border: none !important;
        outline: none;
        width: 100%;
        height: 100%;
        display: block;
        background: #fff;
        opacity: 0;
        transition: all 0.4s ease;
        border-radius: 0 0 0.75rem 0.75rem;
    }

    .pdf-direct-frame:loaded,
    .pdf-direct-frame[src] {
        opacity: 1;
    }

    .pdf-fallback {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        border-radius: 0 0 0.75rem 0.75rem;
    }

    /* PDF Toolbar Styles */
    .pdf-toolbar {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .pdf-action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        color: #64748b;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .pdf-action-btn:hover {
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
        transform: translateY(-1px);
    }

    .pdf-action-btn:active {
        transform: translateY(0);
    }

    /* PDF Close Button in Toolbar */
    .pdf-close-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 32px;
        border-radius: 8px;
        color: #dc2626;
        background: rgba(220, 38, 38, 0.1);
        border: 1px solid rgba(220, 38, 38, 0.2);
        transition: all 0.2s ease;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
    }

    .pdf-close-btn:hover {
        background: #dc2626;
        color: white;
        transform: translateY(-1px) scale(1.05);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }

    .pdf-close-btn:active {
        transform: translateY(0) scale(0.95);
    }

    /* Video Modal Styles */
    .video-viewer-container {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
    }

    .video-toolbar {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .video-action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        color: #64748b;
        transition: all 0.2s ease;
        text-decoration: none;
        background: transparent;
        border: none;
        cursor: pointer;
    }

    .video-action-btn:hover {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        transform: translateY(-1px);
    }

    .video-action-btn:active {
        transform: translateY(0);
    }

    /* Video Close Button in Toolbar */
    .video-close-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 32px;
        border-radius: 8px;
        color: #dc2626;
        background: rgba(220, 38, 38, 0.1);
        border: 1px solid rgba(220, 38, 38, 0.2);
        transition: all 0.2s ease;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
    }

    .video-close-btn:hover {
        background: #dc2626;
        color: white;
        transform: translateY(-1px) scale(1.05);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }

    .video-close-btn:active {
        transform: translateY(0) scale(0.95);
    }

    /* Video Player Wrapper */
    .video-player-wrapper {
        border-radius: 0 0 0.75rem 0.75rem;
        overflow: hidden;
        position: relative;
    }

    .video-frame {
        border: none !important;
        outline: none;
        background: #000;
    }

    .video-loading {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
    }

    /* Video Modal specific sizing */
    #videoModal .modal-container {
        width: 90%;
        max-width: 1200px;
        height: 85vh;
        min-height: 600px;
    }

    /* Fullscreen Video Mode */
    .modal-container.fullscreen-video {
        width: 98vw !important;
        height: 98vh !important;
        max-width: none !important;
        max-height: none !important;
        margin: 1vh 1vw !important;
        animation: fullscreenExpand 0.3s ease-out !important;
    }

    /* Enhanced Modal Close Button */
    .modal-close-enhanced {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        color: #ffffff;
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        font-size: 18px;
        font-weight: 700;
        box-shadow:
            0 4px 12px rgba(239, 68, 68, 0.25),
            0 2px 4px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .modal-close-enhanced::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, transparent 50%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .modal-close-enhanced:hover {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        transform: rotate(90deg) scale(1.15);
        box-shadow:
            0 8px 25px rgba(239, 68, 68, 0.35),
            0 4px 12px rgba(0, 0, 0, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        border-color: rgba(255, 255, 255, 0.5);
    }

    .modal-close-enhanced:hover::before {
        opacity: 1;
    }

    .modal-close-enhanced:active {
        transform: rotate(90deg) scale(0.95);
        box-shadow:
            0 2px 8px rgba(239, 68, 68, 0.3),
            inset 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* Responsive video modal */
    @media (max-width: 768px) {
        #videoModal .modal-container {
            width: 95vw;
            max-width: 95vw;
            height: 80vh;
        }

        .video-toolbar {
            padding: 0.75rem 1rem;
        }

        .video-action-btn,
        .video-close-btn {
            width: 28px;
            height: 28px;
        }

        .modal-close-enhanced {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }
    }    /* PDF Close Button in Toolbar */
    .pdf-close-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        color: #dc2626;
        background: rgba(220, 38, 38, 0.1);
        border: 1px solid rgba(220, 38, 38, 0.2);
        transition: all 0.2s ease;
        cursor: pointer;
        font-weight: bold;
    }

    .pdf-close-btn:hover {
        background: #dc2626;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }

    .pdf-close-btn:active {
        transform: translateY(0);
    }

    /* Enhanced modal header */
    .modal-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 1px solid #e2e8f0;
        padding: 1.25rem 1.5rem;
    }

    .modal-title {
        font-weight: 600;
        font-size: 1.125rem;
        color: #1f2937;
        display: flex;
        align-items: center;
    }

    .modal-close {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        color: #6b7280;
        transition: all 0.2s ease;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(229, 231, 235, 0.3);
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
    }

    .modal-close:hover {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        transform: rotate(90deg) scale(1.1);
        border-color: #ef4444;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
    }

    .modal-close:active {
        transform: rotate(90deg) scale(0.95);
    }

    /* Fullscreen PDF Mode */
    .modal-container.fullscreen-pdf {
        width: 98vw !important;
        height: 98vh !important;
        max-width: none !important;
        max-height: none !important;
        margin: 1vh 1vw !important;
        animation: fullscreenExpand 0.3s ease-out !important;
    }

    @keyframes fullscreenExpand {
        from {
            width: 85%;
            height: 90vh;
        }
        to {
            width: 98vw;
            height: 98vh;
        }
    }

    /* Loading states */
    .pdf-simple-viewer.loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        border: 3px solid #e2e8f0;
        border-top: 3px solid #3b82f6;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        z-index: 10;
    }

    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }

    /* Responsive modal */
    @media (max-width: 768px) {
        .modal-container {
            width: 95vw;
            max-width: 95vw;
            height: 85vh;
            margin: 0.5rem;
        }

        #pdfModal .modal-container {
            width: 95vw;
            max-width: 95vw;
            height: 85vh;
        }

        .pdf-toolbar {
            padding: 0.75rem 1rem;
        }

        .pdf-toolbar .flex:first-child .space-x-3 {
            gap: 0.5rem;
        }

        .pdf-action-btn {
            width: 28px;
            height: 28px;
        }

        .pdf-viewer-container,
        .video-modal-container {
            height: 60vh;
            min-height: 400px;
        }

        .modal-footer {
            flex-direction: column;
            gap: 0.5rem;
        }

        .modal-footer > * {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section - Consistent with Design System -->
<section class="relative text-white overflow-hidden min-h-[calc(100vh-8rem)] md:min-h-[calc(100vh-10rem)] flex items-center hero-gradient pt-8 py-8 lg:py-12 pb-16 lg:pb-20">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container -->
    <div id="particles-tourism" class="absolute inset-0"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-teal-100">DESTINASI WISATA</h2>
                            <p class="text-sm text-teal-100">Ketapang Baru, Seluma</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        @if($wisata)
                        <span class="text-white">{{ explode(' ', $wisata->nama)[0] ?? 'Pantai' }}</span><br>
                        <span class="text-yellow-400 font-extrabold">{{ implode(' ', array_slice(explode(' ', $wisata->nama), 1)) ?: 'Ancol Seluma' }}</span>
                        @else
                        <span class="text-white">Pantai</span><br>
                        <span class="text-yellow-400 font-extrabold">Ancol Seluma</span>
                        @endif
                    </h1>

                    <!-- Badge Status -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-teal-600 to-cyan-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-star mr-2 text-yellow-300 text-xs"></i>
                            Destinasi Unggulan Bengkulu
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-teal-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        @if($wisata)
                        {{ Str::limit(strip_tags($wisata->deskripsi), 120) }}
                        @else
                        Nikmati keindahan pantai eksotis dengan pasir putih dan air laut jernih.
                        @endif
                        Destinasi perfect untuk <span class="font-semibold text-yellow-300">liburan keluarga</span> yang tak terlupakan.
                    </p>
                </div>

                <!-- Enhanced Quick Stats -->
                @if($wisata)
                <div class="hero-stats" data-aos="fade-up" data-aos-delay="700">
                    <div class="hero-stat-item stat-card">
                        <div class="hero-stat-number animate-pulse">{{ $galleryCount }}</div>
                        <div class="hero-stat-label">Foto Gallery</div>
                    </div>

                    <div class="hero-stat-item stat-card">
                        <div class="hero-stat-number animate-pulse">{{ number_format($wisata->views ?? 0) }}</div>
                        <div class="hero-stat-label">Pengunjung</div>
                    </div>

                    <div class="hero-stat-item stat-card">
                        <div class="hero-stat-number animate-pulse">4.8⭐</div>
                        <div class="hero-stat-label">Rating</div>
                    </div>

                    <div class="hero-stat-item stat-card">
                        <div class="hero-stat-number animate-pulse">24/7</div>
                        <div class="hero-stat-label">Akses</div>
                    </div>
                </div>
                @endif

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 mt-8" data-aos="fade-up" data-aos-delay="800">
                    @if($wisata->file_potensi_desa)
                    <button onclick="openPdfModal()" class="inline-flex items-center justify-center px-8 py-3 bg-white text-teal-600 font-semibold rounded-full hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                        <i class="fas fa-file-pdf mr-2"></i>
                        File Potensi Wisata
                    </button>
                    @endif
                    @if($youtubeId)
                    <button onclick="openVideoModal()" class="inline-flex items-center justify-center px-8 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-teal-600 transition-all duration-300">
                        <i class="fas fa-play mr-2"></i>
                        Tonton Video
                    </button>
                    @endif
                </div>
            </div>

            <!-- Hero Visual (Right Side) -->
            <div class="flex-1 relative" data-aos="fade-left" data-aos-delay="900">
                @if($galleryPhotos && count($galleryPhotos) > 0)
                <div class="relative max-w-lg mx-auto">
                    <!-- Main Image -->
                    <div class="relative">
                        <img src="{{ $galleryPhotos[0]['url'] }}"
                             alt="{{ $galleryPhotos[0]['judul'] ?? 'Pantai Ancol Seluma' }}"
                             class="w-full rounded-3xl shadow-2xl transform hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent rounded-3xl"></div>
                    </div>

                    <!-- Floating Cards -->
                    @if(count($galleryPhotos) > 1)
                    <div class="absolute -bottom-4 -left-4 w-24 h-24 rounded-2xl overflow-hidden shadow-lg border-4 border-white transform rotate-12 hover:rotate-0 transition-transform duration-300">
                        <img src="{{ $galleryPhotos[1]['url'] }}" alt="Preview" class="w-full h-full object-cover">
                    </div>
                    @endif

                    @if(count($galleryPhotos) > 2)
                    <div class="absolute -top-4 -right-4 w-24 h-24 rounded-2xl overflow-hidden shadow-lg border-4 border-white transform -rotate-12 hover:rotate-0 transition-transform duration-300">
                        <img src="{{ $galleryPhotos[2]['url'] }}" alt="Preview" class="w-full h-full object-cover">
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@if($wisata)
<!-- Video Section -->
@if($youtubeId)
<section id="video" class="video-section section-spacing">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-play mr-2"></i>
                Video Tour
            </div>
            <h2 class="section-title">
                Jelajahi Keindahan
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">
                    {{ $wisata->nama }}
                </span>
            </h2>
            <p class="section-subtitle">
                Saksikan pesona {{ $wisata->nama }} melalui video tour eksklusif yang menampilkan
                keindahan alam dan berbagai aktivitas menarik.
            </p>
        </div>

        <!-- Video Player -->
        <div class="relative max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden shadow-2xl bg-gray-900 relative">
                <iframe class="w-full h-full video-iframe"
                        src="https://www.youtube.com/embed/{{ $youtubeId }}?enablejsapi=1&autoplay=1&mute=0&rel=0&modestbranding=1&controls=1&showinfo=1&loop=0"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                        loading="eager">
                </iframe>

                <!-- Fallback when iframe fails -->
                <div class="video-fallback absolute inset-0 bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center text-white" style="display: none;">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fab fa-youtube text-3xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Video Tidak Tersedia</h3>
                        <p class="text-gray-300 mb-4">Video mungkin private atau telah dihapus</p>
                        <a href="{{ $wisata->video_youtube }}"
                           target="_blank"
                           class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-full transition-all duration-300">
                            <i class="fab fa-youtube mr-2"></i>
                            Tonton di YouTube
                        </a>
                    </div>
                </div>
            </div>

            <!-- Alternative: Direct YouTube Link -->
            <div class="mt-4 text-center">
                <a href="{{ $wisata->video_youtube }}"
                   target="_blank"
                   class="inline-flex items-center text-gray-600 hover:text-red-600 transition-colors">
                    <i class="fab fa-youtube mr-2"></i>
                    Atau tonton langsung di YouTube
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Gallery Section -->
<section id="gallery" class="gallery-section section-spacing">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header" data-aos="fade-up">
            <div class="section-badge">
                <i class="fas fa-images mr-2"></i>
                Gallery Foto
            </div>
            <h2 class="section-title">
                Galeri Foto {{ $wisata->nama }}
            </h2>
            <p class="section-subtitle">
                Koleksi foto-foto menawan yang memperlihatkan keindahan dan pesona {{ $wisata->nama }}
            </p>
        </div>

        @if($galleryCategories && $galleryCategories->count() > 0)
        <!-- Gallery Category Tabs -->
        <div class="gallery-tabs-container" data-aos="fade-up" data-aos-delay="100">
            <div class="gallery-tabs">
                @php
                    $tabIndex = 0;
                    $categoryLabels = App\Models\GalleryFoto::getKategoriList();
                @endphp
                @foreach($galleryCategories as $kategori => $photos)
                <button class="gallery-tab {{ $tabIndex === 0 ? 'active' : '' }}" 
                        onclick="switchGalleryTab('{{ $kategori }}', this)"
                        data-category="{{ $kategori }}">
                    <div class="tab-icon">
                        @switch($kategori)
                            @case('pantai')
                                <i class="fas fa-umbrella-beach"></i>
                                @break
                            @case('makanan_khas')
                                <i class="fas fa-utensils"></i>
                                @break
                            @case('seni_budaya')
                                <i class="fas fa-masks-theater"></i>
                                @break
                            @case('kerajinan')
                                <i class="fas fa-palette"></i>
                                @break
                            @case('aktivitas')
                                <i class="fas fa-running"></i>
                                @break
                            @case('pemandangan')
                                <i class="fas fa-mountain"></i>
                                @break
                            @case('festival')
                                <i class="fas fa-calendar-star"></i>
                                @break
                            @default
                                <i class="fas fa-images"></i>
                        @endswitch
                    </div>
                    <div class="tab-content">
                        <div class="tab-title">{{ $categoryLabels[$kategori] ?? ucwords(str_replace('_', ' ', $kategori)) }}</div>
                        <div class="tab-count">{{ $photos->count() }} foto</div>
                    </div>
                </button>
                @php $tabIndex++; @endphp
                @endforeach
            </div>
        </div>

        <!-- Gallery Content per Category -->
        @php $categoryIndex = 0; @endphp
        @foreach($galleryCategories as $kategori => $photos)
        <div class="gallery-category-content {{ $categoryIndex === 0 ? 'active' : '' }}" 
             id="gallery-{{ $kategori }}" 
             data-aos="fade-up" 
             data-aos-delay="200">
            
            <div class="category-header">
                <h3 class="category-title">{{ $categoryLabels[$kategori] ?? ucwords(str_replace('_', ' ', $kategori)) }}</h3>
                <div class="category-stats">
                    <span class="stats-item">
                        <i class="fas fa-images"></i> {{ $photos->count() }} Foto
                    </span>
                </div>
            </div>

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
            <i class="fas fa-images text-6xl text-gray-400 mb-4"></i>
            <h3 class="text-2xl font-semibold text-gray-600 mb-2">Belum ada foto</h3>
            <p class="text-gray-500">Galeri foto akan segera ditambahkan</p>
        </div>
        @endif
    </div>
</section>

<!-- Enhanced Description Section -->
<section class="section-spacing relative overflow-hidden">
    <!-- Background with gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-teal-50 via-cyan-50 to-blue-50"></div>

    <!-- Decorative elements -->
    <div class="absolute top-0 left-0 w-32 h-32 bg-teal-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-40 h-40 bg-cyan-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse animation-delay-1000"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center bg-gradient-to-r from-teal-600 to-cyan-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg mb-6">
                <i class="fas fa-info-circle mr-2"></i>
                Tentang Destinasi
            </div>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Pesona <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">{{ $wisata->nama }}</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Jelajahi keindahan alam yang memukau dan nikmati pengalaman wisata yang tak terlupakan
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            <!-- Content Area -->
            <div class="lg:col-span-7 space-y-8" data-aos="fade-right">
                <!-- Main Description -->
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/20">
                    <div class="prose prose-lg text-gray-700 leading-relaxed max-w-none">
                        {!! $wisata->deskripsi !!}
                    </div>
                </div>

                <!-- Key Features -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-emerald-500 rounded-xl flex items-center justify-center">
                                <i class="fas fa-leaf text-white text-xl"></i>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-gray-900">Alam Asri</h3>
                        </div>
                        <p class="text-gray-600">Lingkungan alami yang terjaga dengan keindahan pantai yang memukau dan udara segar.</p>
                    </div>

                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-xl flex items-center justify-center">
                                <i class="fas fa-tools text-white text-xl"></i>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-gray-900">Fasilitas Lengkap</h3>
                        </div>
                        <p class="text-gray-600">Dilengkapi fasilitas pendukung seperti area parkir, warung makan, dan toilet yang bersih.</p>
                    </div>

                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-orange-400 to-red-500 rounded-xl flex items-center justify-center">
                                <i class="fas fa-sun text-white text-xl"></i>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-gray-900">Sunset Indah</h3>
                        </div>
                        <p class="text-gray-600">Nikmati momen sunset yang spektakuler dengan panorama langit yang menawan.</p>
                    </div>

                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-400 to-pink-500 rounded-xl flex items-center justify-center">
                                <i class="fas fa-camera text-white text-xl"></i>
                            </div>
                            <h3 class="ml-4 text-xl font-bold text-gray-900">Instagramable</h3>
                        </div>
                        <p class="text-gray-600">Spot foto yang menawan untuk mengabadikan momen indah liburan Anda.</p>
                    </div>
                </div>
            </div>

            <!-- Info Cards -->
            <div class="lg:col-span-5 space-y-6" data-aos="fade-left" data-aos-delay="200">
                <!-- Location Card -->
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/20">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-cyan-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Lokasi</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $wisata->lokasi }}</p>
                            <a href="#" class="inline-flex items-center mt-3 text-teal-600 hover:text-teal-700 font-semibold">
                                <i class="fas fa-external-link-alt mr-2"></i>
                                Lihat di Maps
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Activity Card -->
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/20">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-compass text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Aktivitas Wisata</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Memancing tradisional, bermain dan rekreasi keluarga, jalan santai menikmati pemandangan pantai, piknik bersama keluarga, berenang di air yang jernih, dan berbagai aktivitas menarik lainnya yang cocok untuk semua usia.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Contact Card -->
                <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/20">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-rose-400 to-pink-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Kontak & Informasi</h3>
                            <div class="space-y-3">
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-phone mr-3 text-green-500"></i>
                                    <span>+62 812-3456-7890</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fab fa-whatsapp mr-3 text-green-500"></i>
                                    <span>Hubungi via WhatsApp</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-info-circle mr-3 text-blue-500"></i>
                                    <span>Info Guide Lokal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Info -->
                <div class="bg-gradient-to-r from-teal-500 to-cyan-500 rounded-3xl p-8 shadow-xl text-white">
                    <h3 class="text-xl font-bold mb-6 flex items-center">
                        <i class="fas fa-info-circle mr-3"></i>
                        Info Praktis
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-3 text-yellow-300"></i>
                            <span><strong>Jam Buka:</strong> 24 Jam</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-ticket-alt mr-3 text-yellow-300"></i>
                            <span><strong>Tiket Masuk:</strong> Gratis</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-car mr-3 text-yellow-300"></i>
                            <span><strong>Parkir:</strong> Tersedia</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-utensils mr-3 text-yellow-300"></i>
                            <span><strong>Warung:</strong> Ada di sekitar pantai</span>
                        </div>
                    </div>
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

<!-- PDF Modal -->
<div id="pdfModal" class="modal-backdrop" style="display: none;">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title">
                <i class="fas fa-file-pdf text-red-600 mr-2"></i>
                Berkas Potensi Desa Wisata
            </h3>
            <button type="button" class="modal-close" onclick="closePdfModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body p-0 flex-1 flex flex-col">
            @if($wisata->file_potensi_desa)
            <!-- PDF Viewer Container -->
            <div class="pdf-viewer-container flex-1 flex flex-col">
                <!-- PDF Toolbar -->
                <div class="pdf-toolbar bg-gradient-to-r from-slate-50 to-gray-50 px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-pdf text-white text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800 text-sm">Berkas Lomba Desa Wisata</h4>
                            <p class="text-xs text-gray-500">{{ $wisata->nama }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-1">
                        <a href="{{ asset($wisata->file_potensi_desa) }}"
                           download
                           class="pdf-action-btn"
                           title="Unduh PDF">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="{{ asset($wisata->file_potensi_desa) }}"
                           target="_blank"
                           class="pdf-action-btn"
                           title="Buka di Tab Baru">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        <button onclick="toggleFullscreenPdf()"
                                class="pdf-action-btn"
                                title="Fullscreen">
                            <i class="fas fa-expand"></i>
                        </button>
                        <div class="w-px h-6 bg-gray-300 mx-2"></div>
                        <button onclick="closePdfModal()"
                                class="pdf-close-btn"
                                title="Tutup Modal">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- PDF Viewer -->
                <div class="pdf-simple-viewer flex-1">
                        <!-- Direct PDF Embed with Google Docs Viewer as backup -->
                        <iframe
                            src="{{ asset($wisata->file_potensi_desa) }}"
                            width="100%"
                            height="100%"
                            class="pdf-direct-frame border-0"
                            title="PDF Viewer - {{ $wisata->nama }}"
                            style="border: none;"
                            onload="this.style.opacity='1'"
                            onerror="this.src='https://docs.google.com/gview?url={{ urlencode(asset($wisata->file_potensi_desa)) }}&embedded=true'">
                        </iframe>

                        <!-- Fallback content shown if iframe fails -->
                        <div class="pdf-fallback flex items-center justify-center h-full bg-gray-50" style="display: none;">
                            <div class="text-center p-8 max-w-lg">
                                <div class="w-20 h-20 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-file-pdf text-3xl text-red-600"></i>
                                </div>

                                <h5 class="text-xl font-bold text-gray-800 mb-3">Berkas Lomba Desa Wisata</h5>
                                <p class="text-gray-600 mb-8 leading-relaxed">
                                    Dokumen resmi berkas lomba desa wisata Pantai Ancol Seluma.
                                    Silakan pilih salah satu opsi untuk melihat dokumen:
                                </p>

                                <div class="space-y-4">
                                    <a href="{{ asset($wisata->file_potensi_desa) }}"
                                       target="_blank"
                                       class="inline-flex items-center w-full justify-center px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl font-medium">
                                        <i class="fas fa-external-link-alt mr-3"></i>
                                        Buka PDF di Tab Baru
                                    </a>

                                    <a href="{{ asset($wisata->file_potensi_desa) }}"
                                       download
                                       class="inline-flex items-center w-full justify-center px-6 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all duration-200 shadow-lg hover:shadow-xl font-medium">
                                        <i class="fas fa-download mr-3"></i>
                                        Download PDF
                                        @if(file_exists(public_path($wisata->file_potensi_desa)))
                                        <span class="ml-2 text-sm opacity-80">
                                            ({{ number_format(filesize(public_path($wisata->file_potensi_desa)) / 1024, 0) }} KB)
                                        </span>
                                        @endif
                                    </a>

                                    <a href="https://docs.google.com/gview?url={{ urlencode(asset($wisata->file_potensi_desa)) }}"
                                       target="_blank"
                                       class="inline-flex items-center w-full justify-center px-6 py-3 bg-orange-600 text-white rounded-xl hover:bg-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl font-medium">
                                        <i class="fab fa-google mr-3"></i>
                                        Lihat via Google Docs
                                    </a>
                                </div>

                                <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-xl">
                                    <div class="flex items-start text-sm text-blue-800">
                                        <i class="fas fa-lightbulb mt-0.5 mr-3 text-blue-600"></i>
                                        <div class="text-left">
                                            <p class="font-medium mb-1">Tips Viewing PDF:</p>
                                            <ul class="text-xs space-y-1 opacity-90">
                                                <li>• Tab baru memberikan kontrol penuh atas dokumen</li>
                                                <li>• Google Docs viewer cocok untuk preview cepat</li>
                                                <li>• Download untuk akses offline</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="flex items-center justify-center h-full bg-gray-50">
                <div class="text-center p-8">
                    <i class="fas fa-file-pdf text-6xl text-gray-400 mb-4"></i>
                    <p class="text-gray-600">File PDF tidak tersedia</p>
                    <p class="text-sm text-gray-500 mt-2">Silakan hubungi administrator untuk informasi lebih lanjut</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Video Modal -->
<div id="videoModal" class="modal-backdrop" style="display: none;">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title">
                <i class="fas fa-play text-red-600 mr-2"></i>
                Video Tour {{ $wisata->nama }}
                @if($wisata->sumber_video)
                <span class="text-sm text-gray-500 ml-2">- {{ $wisata->sumber_video }}</span>
                @endif
            </h3>
            <button type="button" class="modal-close-enhanced" onclick="closeVideoModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body p-0 flex-1 flex flex-col">
            @if($youtubeId)
            <!-- Video Viewer Container -->
            <div class="video-viewer-container flex-1 flex flex-col">
                <!-- Video Toolbar -->
                <div class="video-toolbar bg-gradient-to-r from-slate-50 to-gray-50 px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-play text-white text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800 text-sm">Video Tour Pantai</h4>
                            <p class="text-xs text-gray-500">{{ $wisata->nama }}@if($wisata->sumber_video) - {{ $wisata->sumber_video }}@endif</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-1">
                        <a href="https://www.youtube.com/watch?v={{ $youtubeId }}"
                           target="_blank"
                           class="video-action-btn"
                           title="Buka di YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <button onclick="toggleVideoQuality()"
                                class="video-action-btn"
                                title="Kualitas Video">
                            <i class="fas fa-cog"></i>
                        </button>
                        <button onclick="toggleVideoFullscreen()"
                                class="video-action-btn"
                                title="Fullscreen">
                            <i class="fas fa-expand"></i>
                        </button>
                        <div class="w-px h-6 bg-gray-300 mx-2"></div>
                        <button onclick="closeVideoModal()"
                                class="video-close-btn"
                                title="Tutup Modal">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Enhanced Video Player -->
                <div class="video-player-wrapper flex-1 bg-black relative">
                    <iframe id="videoModalPlayer"
                            src="https://www.youtube.com/embed/{{ $youtubeId }}?enablejsapi=1&rel=0&modestbranding=1&controls=1&iv_load_policy=3&cc_load_policy=0&playsinline=1"
                            class="video-frame w-full h-full"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                    </iframe>

                    <!-- Loading overlay -->
                    <div class="video-loading absolute inset-0 bg-black flex items-center justify-center" style="display: none;">
                        <div class="text-center text-white">
                            <div class="w-12 h-12 border-3 border-white border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
                            <p class="text-lg font-medium">Loading Video...</p>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="flex items-center justify-center h-full bg-gradient-to-br from-gray-900 to-black">
                <div class="text-center text-white p-8">
                    <div class="w-20 h-20 bg-red-100 bg-opacity-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-video text-3xl text-red-400"></i>
                    </div>
                    <h5 class="text-xl font-bold text-white mb-3">Video Tidak Tersedia</h5>
                    <p class="text-gray-300 mb-6">Maaf, video tour untuk destinasi ini belum tersedia.</p>
                    <button onclick="closeVideoModal()" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-outline" onclick="closeVideoModal()">
                <i class="fas fa-times mr-2"></i>
                Tutup
            </button>
            @if($wisata->video_youtube)
            <a href="{{ $wisata->video_youtube }}"
               target="_blank"
               class="btn-primary bg-red-600 hover:bg-red-700">
                <i class="fab fa-youtube mr-2"></i>
                Buka di YouTube
            </a>
            @endif
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

    // Video loading handler
    document.addEventListener('DOMContentLoaded', function() {
        const videoIframe = document.querySelector('.video-iframe');
        const videoFallback = document.querySelector('.video-fallback');

        if (videoIframe) {
            let loadTimeout;

            // Set a timeout to check if video loads
            loadTimeout = setTimeout(function() {
                console.log('Video loading timeout - showing fallback');
                if (videoFallback) {
                    videoIframe.style.display = 'none';
                    videoFallback.style.display = 'flex';
                }
            }, 5000); // 5 second timeout

            // If iframe loads successfully, clear timeout
            videoIframe.addEventListener('load', function() {
                console.log('Video loaded successfully');
                clearTimeout(loadTimeout);
                if (videoFallback) {
                    videoFallback.style.display = 'none';
                }
            });

            // If iframe fails to load
            videoIframe.addEventListener('error', function() {
                console.log('Video failed to load - showing fallback');
                clearTimeout(loadTimeout);
                if (videoFallback) {
                    videoIframe.style.display = 'none';
                    videoFallback.style.display = 'flex';
                }
            });
        }

        // Force autoplay after user interaction
        let videoAutoplayTriggered = false;

        function triggerVideoAutoplay() {
            if (!videoAutoplayTriggered) {
                const iframe = document.querySelector('.video-iframe');
                if (iframe) {
                    // Get current src and add autoplay parameter if not already there
                    let currentSrc = iframe.src;
                    if (currentSrc.indexOf('autoplay=1') === -1) {
                        // Add autoplay parameter
                        const separator = currentSrc.indexOf('?') !== -1 ? '&' : '?';
                        iframe.src = currentSrc + separator + 'autoplay=1&mute=0';
                    }

                    // Try to play the video using postMessage API
                    try {
                        iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
                    } catch (e) {
                        console.log('Could not trigger autoplay via postMessage');
                    }

                    videoAutoplayTriggered = true;
                    console.log('Video autoplay triggered after user interaction');
                }
            }
        }

        // Trigger autoplay on first scroll
        let scrollTriggered = false;
        window.addEventListener('scroll', function() {
            if (!scrollTriggered) {
                scrollTriggered = true;
                setTimeout(triggerVideoAutoplay, 1000);
            }
        });

        // Trigger autoplay on first click anywhere
        let clickTriggered = false;
        document.addEventListener('click', function() {
            if (!clickTriggered) {
                clickTriggered = true;
                setTimeout(triggerVideoAutoplay, 500);
            }
        });

        // Also try to trigger when video section becomes visible
        if ('IntersectionObserver' in window) {
            const videoSection = document.getElementById('video');
            if (videoSection) {
                const observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting && !videoAutoplayTriggered) {
                            setTimeout(triggerVideoAutoplay, 1000);
                            observer.disconnect();
                        }
                    });
                }, {
                    threshold: 0.5
                });

                observer.observe(videoSection);
            }
        }

        // Modal Functions
        window.openPdfModal = function() {
            const modal = document.getElementById('pdfModal');
            if (modal) {
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                console.log('PDF modal opened');
            }
        };

        window.closePdfModal = function() {
            const modal = document.getElementById('pdfModal');
            if (modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        };

        window.toggleFullscreenPdf = function() {
            const modal = document.getElementById('pdfModal');
            const container = modal?.querySelector('.modal-container');

            if (container) {
                if (container.classList.contains('fullscreen-pdf')) {
                    // Exit fullscreen
                    container.classList.remove('fullscreen-pdf');
                } else {
                    // Enter fullscreen
                    container.classList.add('fullscreen-pdf');
                }
            }
        };

        window.toggleVideoFullscreen = function() {
            const modal = document.getElementById('videoModal');
            const container = modal?.querySelector('.modal-container');

            if (container) {
                if (container.classList.contains('fullscreen-video')) {
                    // Exit fullscreen
                    container.classList.remove('fullscreen-video');
                } else {
                    // Enter fullscreen
                    container.classList.add('fullscreen-video');
                }
            }
        };

        window.toggleVideoQuality = function() {
            // This would normally open quality selector
            // For now, we'll just open in YouTube
            const iframe = document.getElementById('videoModalPlayer');
            if (iframe) {
                const src = iframe.src;
                const videoId = src.match(/embed\/([^?]+)/)?.[1];
                if (videoId) {
                    window.open(`https://www.youtube.com/watch?v=${videoId}`, '_blank');
                }
            }
        };        window.openVideoModal = function() {
            const modal = document.getElementById('videoModal');
            const iframe = document.getElementById('videoModalPlayer');
            const loading = modal?.querySelector('.video-loading');

            if (modal) {
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';

                // Show loading state
                if (loading) {
                    loading.style.display = 'flex';
                }

                // Add autoplay parameter when opening modal
                if (iframe && iframe.src.indexOf('autoplay=1') === -1) {
                    const separator = iframe.src.indexOf('?') !== -1 ? '&' : '?';
                    iframe.src = iframe.src + separator + 'autoplay=1&mute=0';
                }

                // Hide loading after iframe loads
                if (iframe) {
                    iframe.onload = function() {
                        setTimeout(() => {
                            if (loading) loading.style.display = 'none';
                        }, 1000);
                    };
                }

                console.log('Enhanced video modal opened');
            }
        };

        window.closeVideoModal = function() {
            const modal = document.getElementById('videoModal');
            const iframe = document.getElementById('videoModalPlayer');

            if (modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';

                // Stop video by removing and re-adding iframe
                if (iframe) {
                    const src = iframe.src.replace(/[?&]autoplay=1/, '');
                    iframe.src = src;
                }
            }
        };

        // Simple PDF Modal
        window.openPdfModal = function() {
            const modal = document.getElementById('pdfModal');
            if (modal) {
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                console.log('PDF modal opened');
            }
        };

        // Close modal when clicking backdrop
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal-backdrop')) {
                closePdfModal();
                closeVideoModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePdfModal();
                closeVideoModal();
            }
        });
    });
</script>
@endpush
