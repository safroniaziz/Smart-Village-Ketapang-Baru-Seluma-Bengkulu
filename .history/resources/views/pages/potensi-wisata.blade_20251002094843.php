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

    /* Gallery Section - Creative & Stunning */
    .gallery-section {
        padding: 10rem 0;
        background: 
            linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%),
            radial-gradient(circle at 20% 30%, rgba(255,255,255,0.15) 0%, transparent 40%),
            radial-gradient(circle at 80% 70%, rgba(255,255,255,0.1) 0%, transparent 40%);
        position: relative;
        overflow: hidden;
    }

    .gallery-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: 
            url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23ffffff' stroke-width='1' stroke-opacity='0.05'%3E%3Cpath d='m0 0 60 60M60 0 0 60'/%3E%3C/g%3E%3C/svg%3E");
    }

    .gallery-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #feca57);
        background-size: 400% 400%;
        animation: gradientMove 8s ease infinite;
    }

    @keyframes gradientMove {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .gallery-container {
        max-width: 1600px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 2;
    }

    .gallery-header {
        text-align: center;
        margin-bottom: 6rem;
        position: relative;
    }

    .gallery-header::after {
        content: '';
        position: absolute;
        bottom: -3rem;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, rgba(255,255,255,0.3), rgba(255,255,255,0.8), rgba(255,255,255,0.3));
        border-radius: 2px;
    }

    .gallery-header .section-badge {
        background: rgba(255, 255, 255, 0.25);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(20px);
    }

    .gallery-header .section-title {
        color: white;
        text-shadow: 0 6px 30px rgba(0, 0, 0, 0.4);
        background: linear-gradient(135deg, #ffffff, #f0f9ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .gallery-header .section-subtitle {
        color: rgba(255, 255, 255, 0.95);
        text-shadow: 0 3px 15px rgba(0, 0, 0, 0.3);
    }

    /* Creative Masonry Grid */
    .gallery-masonry {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-auto-rows: 20px;
        gap: 20px;
        margin-top: 4rem;
    }

    @media (min-width: 768px) {
        .gallery-masonry {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (min-width: 1200px) {
        .gallery-masonry {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    /* Dynamic Card Sizes */
    .photo-card:nth-child(1) { grid-row-end: span 25; }
    .photo-card:nth-child(2) { grid-row-end: span 20; }
    .photo-card:nth-child(3) { grid-row-end: span 30; }
    .photo-card:nth-child(4) { grid-row-end: span 22; }
    .photo-card:nth-child(5) { grid-row-end: span 28; }
    .photo-card:nth-child(6) { grid-row-end: span 24; }
    .photo-card:nth-child(7) { grid-row-end: span 26; }
    .photo-card:nth-child(8) { grid-row-end: span 21; }
    .photo-card:nth-child(9) { grid-row-end: span 29; }
    .photo-card:nth-child(10) { grid-row-end: span 23; }

    .photo-card {
        background: white;
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 
            0 25px 50px rgba(0, 0, 0, 0.3),
            0 10px 25px rgba(0, 0, 0, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        cursor: pointer;
        border: 2px solid rgba(255, 255, 255, 0.3);
        position: relative;
        transform-style: preserve-3d;
        perspective: 1000px;
    }

    .photo-card::before {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(135deg, 
            rgba(255,107,107,0.3) 0%, 
            rgba(78,205,196,0.3) 25%, 
            rgba(69,183,209,0.3) 50%, 
            rgba(150,206,180,0.3) 75%, 
            rgba(254,202,87,0.3) 100%);
        border-radius: 30px;
        opacity: 0;
        transition: all 0.5s ease;
        z-index: -1;
        filter: blur(10px);
    }

    .photo-card:hover::before {
        opacity: 1;
        filter: blur(15px);
    }

    .photo-card::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: conic-gradient(from 0deg, transparent, rgba(255,255,255,0.1), transparent);
        opacity: 0;
        transition: all 0.6s ease;
        animation: rotate 4s linear infinite;
        z-index: 1;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .photo-card:hover::after {
        opacity: 1;
    }

    .photo-card:hover {
        transform: translateY(-20px) scale(1.03) rotateX(5deg) rotateY(5deg);
        box-shadow: 
            0 40px 80px rgba(0, 0, 0, 0.4),
            0 20px 40px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.4);
    }

    /* Dynamic hover based on position */
    .photo-card:nth-child(odd):hover {
        transform: translateY(-20px) scale(1.03) rotateX(5deg) rotateY(-3deg);
    }

    .photo-card:nth-child(even):hover {
        transform: translateY(-20px) scale(1.03) rotateX(-3deg) rotateY(5deg);
    }

    .photo-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        z-index: 2;
    }

    .photo-card:hover .photo-image {
        transform: scale(1.15) rotate(2deg);
        filter: saturate(1.2) contrast(1.1);
    }

    .photo-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0.7), transparent);
        padding: 2rem;
        color: white;
        transform: translateY(100%);
        transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        z-index: 3;
    }

    .photo-card:hover .photo-info {
        transform: translateY(0);
    }

    .photo-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
        line-height: 1.4;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.4s ease 0.1s;
    }

    .photo-card:hover .photo-title {
        opacity: 1;
        transform: translateY(0);
    }

    .photo-description {
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
        font-size: 0.95rem;
        text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.4s ease 0.2s;
    }

    .photo-card:hover .photo-description {
        opacity: 1;
        transform: translateY(0);
    }

    /* Floating Action Button */
    .photo-expand {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        opacity: 0;
        transform: scale(0.8) rotate(-90deg);
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        z-index: 4;
        cursor: pointer;
    }

    .photo-card:hover .photo-expand {
        opacity: 1;
        transform: scale(1) rotate(0deg);
    }

    .photo-expand:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.1) rotate(360deg);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    /* Overlay Effects */
    .photo-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 30% 30%, rgba(255,107,107,0.2) 0%, transparent 50%),
            radial-gradient(circle at 70% 70%, rgba(78,205,196,0.2) 0%, transparent 50%),
            linear-gradient(135deg, rgba(69,183,209,0.1) 0%, rgba(150,206,180,0.1) 100%);
        opacity: 0;
        transition: all 0.5s ease;
        z-index: 2;
        mix-blend-mode: overlay;
    }

    .photo-card:hover .photo-overlay {
        opacity: 1;
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

    /* Modal Enhancements */
    .modal {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 1000;
        background: rgba(0, 0, 0, 0.92);
        backdrop-filter: blur(12px);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .modal.show {
        display: flex;
        opacity: 1;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        position: relative;
        max-width: 90vw;
        max-height: 90vh;
        background: white;
        border-radius: 24px;
        overflow: hidden;
        transform: scale(0.9) rotateX(10deg);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 40px 80px rgba(0, 0, 0, 0.4);
    }

    .modal.show .modal-content {
        transform: scale(1) rotateX(0deg);
    }

    .modal-close {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: none;
        border-radius: 50%;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 1001;
        transition: all 0.3s ease;
        font-size: 1.25rem;
        color: #374151;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .modal-close:hover {
        background: white;
        transform: scale(1.1);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
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
        <div class="gallery-masonry">
            @foreach($galleryPhotos as $index => $photo)
            <div class="photo-card" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ 100 + ($index * 50) }}"
                 onclick="openModal({{ $index }})">
                
                <img src="{{ $photo['url'] }}" 
                     alt="{{ $photo['judul'] ?? 'Foto ' . ($index + 1) }}" 
                     class="photo-image" 
                     loading="lazy">
                
                <div class="photo-overlay"></div>
                
                <div class="photo-expand">
                    <i class="fas fa-expand-alt"></i>
                </div>
                
                <div class="photo-info">
                    <h3 class="photo-title">{{ $photo['judul'] ?? 'Foto ' . ($index + 1) }}</h3>
                    @if($photo['keterangan'])
                    <p class="photo-description">{{ Str::limit($photo['keterangan'], 100) }}</p>
                    @endif
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

<!-- Photo Modal -->
<div id="photoModal" class="modal">
    <button class="modal-close" onclick="closeModal()">
        <i class="fas fa-times"></i>
    </button>
    
    @if($galleryPhotos && count($galleryPhotos) > 1)
    <button class="modal-nav modal-prev" onclick="prevPhoto()">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="modal-nav modal-next" onclick="nextPhoto()">
        <i class="fas fa-chevron-right"></i>
    </button>
    @endif
    
    <div class="modal-content">
        <img id="modalImage" src="" alt="" class="modal-image">
        <div class="modal-info">
            <h3 id="modalTitle" class="modal-title"></h3>
            <p id="modalDescription" class="modal-description"></p>
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
        const photo = galleryData[index];
        
        document.getElementById('modalImage').src = photo.url;
        document.getElementById('modalImage').alt = photo.judul || 'Foto ' + (index + 1);
        document.getElementById('modalTitle').textContent = photo.judul || 'Foto ' + (index + 1);
        document.getElementById('modalDescription').textContent = photo.keterangan || '';
        
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
        document.getElementById('modalImage').src = photo.url;
        document.getElementById('modalImage').alt = photo.judul || 'Foto ' + (currentPhotoIndex + 1);
        document.getElementById('modalTitle').textContent = photo.judul || 'Foto ' + (currentPhotoIndex + 1);
        document.getElementById('modalDescription').textContent = photo.keterangan || '';
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