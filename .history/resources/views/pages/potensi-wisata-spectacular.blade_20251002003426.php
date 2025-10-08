@extends('layouts.app-public')

@section('title', 'Pantai Ancol Seluma - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
    /* SPECTACULAR UI/UX DESIGN */
    * {
        font-family: 'Inter', sans-serif;
    }

    /* Animated gradient background */
    .hero-spectacular {
        background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c, #4facfe, #00f2fe);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
        min-height: 100vh;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Floating particles animation */
    .particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }

    .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        pointer-events: none;
        animation: float 8s infinite ease-in-out;
    }

    .particle:nth-child(1) { width: 10px; height: 10px; left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { width: 15px; height: 15px; left: 20%; animation-delay: 2s; }
    .particle:nth-child(3) { width: 8px; height: 8px; left: 30%; animation-delay: 4s; }
    .particle:nth-child(4) { width: 12px; height: 12px; left: 40%; animation-delay: 6s; }
    .particle:nth-child(5) { width: 6px; height: 6px; left: 50%; animation-delay: 1s; }
    .particle:nth-child(6) { width: 14px; height: 14px; left: 60%; animation-delay: 3s; }
    .particle:nth-child(7) { width: 9px; height: 9px; left: 70%; animation-delay: 5s; }
    .particle:nth-child(8) { width: 11px; height: 11px; left: 80%; animation-delay: 7s; }
    .particle:nth-child(9) { width: 7px; height: 7px; left: 90%; animation-delay: 2s; }

    @keyframes float {
        0%, 100% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
        10%, 90% { opacity: 1; }
        50% { transform: translateY(-10vh) rotate(180deg); }
    }

    /* Glassmorphism hero content */
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border-radius: 30px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 3rem;
        position: relative;
        z-index: 10;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
        transform: translateY(20px);
        opacity: 0;
        animation: slideInUp 1s ease-out forwards;
    }

    @keyframes slideInUp {
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* 3D Photo Cards */
    .gallery-spectacular {
        perspective: 1000px;
        padding: 100px 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
    }

    .gallery-spectacular::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to bottom, rgba(255,255,255,0.1), transparent);
    }

    .gallery-grid-3d {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 3rem;
        margin-top: 4rem;
        padding: 0 2rem;
    }

    .photo-card-3d {
        position: relative;
        transform-style: preserve-3d;
        transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        height: 350px;
    }

    .photo-card-3d:hover {
        transform: rotateY(15deg) rotateX(10deg) translateZ(50px);
    }

    .card-front, .card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    .card-front {
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .card-back {
        background: linear-gradient(145deg, #667eea, #764ba2);
        transform: rotateY(180deg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        padding: 2rem;
    }

    .photo-card-3d:hover .card-front {
        transform: rotateY(-180deg);
    }

    .photo-card-3d:hover .card-back {
        transform: rotateY(0deg);
    }

    .photo-spectacular {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .photo-card-3d:hover .photo-spectacular {
        transform: scale(1.1);
    }

    .photo-info-3d {
        padding: 1.5rem;
        background: linear-gradient(145deg, rgba(255,255,255,0.95), rgba(255,255,255,0.8));
        backdrop-filter: blur(10px);
        border-radius: 0 0 25px 25px;
        margin-top: -5px;
        position: relative;
        z-index: 2;
    }

    .photo-title-3d {
        font-size: 1.4rem;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
    }

    .photo-desc-3d {
        color: #666;
        line-height: 1.6;
        font-weight: 400;
    }

    /* Spectacular Modal */
    .modal-spectacular {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(0, 0, 0, 0.95);
        backdrop-filter: blur(20px);
        opacity: 0;
        transition: all 0.5s ease;
    }

    .modal-spectacular.show {
        display: flex;
        opacity: 1;
        align-items: center;
        justify-content: center;
    }

    .modal-content-spectacular {
        position: relative;
        max-width: 90vw;
        max-height: 90vh;
        background: linear-gradient(145deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
        backdrop-filter: blur(25px);
        border-radius: 30px;
        border: 1px solid rgba(255,255,255,0.2);
        overflow: hidden;
        transform: scale(0.7) rotateX(45deg);
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 50px 100px rgba(0, 0, 0, 0.3);
    }

    .modal-spectacular.show .modal-content-spectacular {
        transform: scale(1) rotateX(0deg);
    }

    .modal-image-spectacular {
        width: 100%;
        max-height: 70vh;
        object-fit: cover;
        display: block;
    }

    .modal-info-spectacular {
        padding: 2.5rem;
        background: linear-gradient(145deg, rgba(255,255,255,0.95), rgba(255,255,255,0.8));
        backdrop-filter: blur(15px);
    }

    .modal-title-spectacular {
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }

    .modal-desc-spectacular {
        color: #555;
        line-height: 1.8;
        font-size: 1.1rem;
        font-weight: 400;
    }

    /* Floating action buttons */
    .modal-btn {
        position: absolute;
        background: linear-gradient(135deg, rgba(255,255,255,0.2), rgba(255,255,255,0.1));
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255,255,255,0.3);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        color: white;
        font-size: 1.2rem;
        z-index: 10001;
    }

    .modal-btn:hover {
        transform: scale(1.2) rotate(10deg);
        background: linear-gradient(135deg, rgba(255,255,255,0.3), rgba(255,255,255,0.2));
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .modal-close-spectacular {
        top: 2rem;
        right: 2rem;
    }

    .modal-prev-spectacular {
        left: 2rem;
        top: 50%;
        transform: translateY(-50%);
    }

    .modal-next-spectacular {
        right: 2rem;
        top: 50%;
        transform: translateY(-50%);
    }

    /* Video section with glassmorphism */
    .video-spectacular {
        padding: 100px 0;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        position: relative;
        overflow: hidden;
    }

    .video-spectacular::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="2"/></svg>') repeat;
        animation: rotate 30s linear infinite;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .video-container-spectacular {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        border-radius: 30px;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.2);
        background: linear-gradient(145deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.2);
        transform: translateY(20px);
        opacity: 0;
        animation: slideInUp 1s ease-out 0.5s forwards;
    }

    .video-container-spectacular iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 30px;
    }

    /* Stats with morphism */
    .stats-spectacular {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .stat-morphism {
        background: linear-gradient(145deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
        backdrop-filter: blur(20px);
        border-radius: 25px;
        border: 1px solid rgba(255,255,255,0.2);
        padding: 2.5rem 1.5rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform: translateY(20px);
        opacity: 0;
        animation: slideInUp 0.8s ease-out forwards;
    }

    .stat-morphism:nth-child(1) { animation-delay: 0.1s; }
    .stat-morphism:nth-child(2) { animation-delay: 0.2s; }
    .stat-morphism:nth-child(3) { animation-delay: 0.3s; }
    .stat-morphism:nth-child(4) { animation-delay: 0.4s; }

    .stat-morphism::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
        transform: translateX(-100%);
        transition: transform 0.8s ease;
    }

    .stat-morphism:hover::before {
        transform: translateX(100%);
    }

    .stat-morphism:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    .stat-number-spectacular {
        font-size: 3rem;
        font-weight: 900;
        background: linear-gradient(135deg, #ffffff, #f0f0f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
        display: block;
        position: relative;
        z-index: 2;
    }

    .stat-label-spectacular {
        color: rgba(255,255,255,0.9);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 0.1em;
        position: relative;
        z-index: 2;
    }

    /* Info cards with advanced effects */
    .info-spectacular {
        padding: 100px 0;
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        position: relative;
    }

    .info-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2.5rem;
        margin-top: 4rem;
    }

    .info-card-spectacular {
        background: linear-gradient(145deg, rgba(255,255,255,0.15), rgba(255,255,255,0.05));
        backdrop-filter: blur(25px);
        border-radius: 30px;
        border: 1px solid rgba(255,255,255,0.2);
        padding: 3rem 2rem;
        position: relative;
        overflow: hidden;
        transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
    }

    .info-card-spectacular::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.8s ease;
    }

    .info-card-spectacular:hover::before {
        left: 100%;
    }

    .info-card-spectacular:hover {
        transform: translateY(-20px) rotateX(10deg);
        box-shadow: 0 40px 80px rgba(0, 0, 0, 0.2);
    }

    .info-icon-spectacular {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, rgba(255,255,255,0.3), rgba(255,255,255,0.1));
        backdrop-filter: blur(15px);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(255,255,255,0.3);
        transition: all 0.6s ease;
        position: relative;
        z-index: 2;
    }

    .info-card-spectacular:hover .info-icon-spectacular {
        transform: scale(1.2) rotate(10deg);
    }

    .info-title-spectacular {
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .info-desc-spectacular {
        color: rgba(255,255,255,0.9);
        line-height: 1.7;
        font-weight: 400;
        position: relative;
        z-index: 2;
    }

    /* Parallax scroll effects */
    .parallax-element {
        transition: transform 0.1s ease-out;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .gallery-grid-3d {
            grid-template-columns: 1fr;
            gap: 2rem;
            padding: 0 1rem;
        }
        
        .glass-card {
            padding: 2rem;
            margin: 0 1rem;
        }
        
        .modal-content-spectacular {
            max-width: 95vw;
        }
        
        .info-cards-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .stats-spectacular {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .stat-number-spectacular {
            font-size: 2rem;
        }
    }

    /* Loading animations */
    .fade-in-up {
        transform: translateY(30px);
        opacity: 0;
        animation: fadeInUp 0.8s ease-out forwards;
    }

    @keyframes fadeInUp {
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Text effects */
    .text-glow {
        text-shadow: 0 0 20px rgba(255,255,255,0.5);
    }

    .text-gradient {
        background: linear-gradient(135deg, #ffffff, #f0f0f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Pulse animation for CTA */
    .pulse-btn {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7); }
        70% { box-shadow: 0 0 0 20px rgba(255, 255, 255, 0); }
        100% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); }
    }
</style>
@endpush

@section('content')
<!-- Spectacular Hero Section -->
<section class="hero-spectacular">
    <!-- Animated particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="relative z-20 w-full">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            @if($wisata)
            <div class="glass-card max-w-4xl mx-auto">
                <!-- Badge with glow effect -->
                <div class="inline-flex items-center gap-3 bg-gradient-to-r from-white/30 to-white/10 backdrop-blur-md text-white px-8 py-4 rounded-full mb-8 border border-white/30 pulse-btn">
                    <i class="fas fa-map-marked-alt text-xl"></i>
                    <span class="font-semibold text-lg">Destinasi Spektakuler</span>
                </div>

                <!-- Main Title with gradient -->
                <h1 class="text-5xl md:text-7xl font-black text-white mb-8 leading-tight text-glow">
                    {{ $wisata->nama }}
                </h1>

                <!-- Location with icon -->
                <div class="flex items-center justify-center gap-3 text-2xl text-white/90 mb-10">
                    <i class="fas fa-map-marker-alt text-pink-300"></i>
                    <span class="font-medium">{{ $wisata->lokasi }}</span>
                </div>

                <!-- Description -->
                <p class="text-xl md:text-2xl text-white/90 mb-12 max-w-3xl mx-auto leading-relaxed font-light">
                    {{ Str::limit(strip_tags($wisata->deskripsi), 150) }}
                </p>

                <!-- Spectacular Stats -->
                <div class="stats-spectacular max-w-5xl mx-auto">
                    @if($galleryCount > 0)
                    <div class="stat-morphism">
                        <span class="stat-number-spectacular">{{ $galleryCount }}</span>
                        <div class="stat-label-spectacular">Foto Gallery</div>
                    </div>
                    @endif
                    
                    @if($wisata->video_youtube)
                    <div class="stat-morphism">
                        <span class="stat-number-spectacular">1</span>
                        <div class="stat-label-spectacular">Video Tour</div>
                    </div>
                    @endif
                    
                    <div class="stat-morphism">
                        <span class="stat-number-spectacular">{{ number_format($wisata->views ?? 0) }}</span>
                        <div class="stat-label-spectacular">Total Views</div>
                    </div>
                    
                    <div class="stat-morphism">
                        <span class="stat-number-spectacular">5.0</span>
                        <div class="stat-label-spectacular">Rating</div>
                    </div>
                </div>
            </div>
            @else
            <div class="glass-card max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-black text-white mb-8 leading-tight text-glow">
                    Potensi Wisata
                </h1>
                <p class="text-xl md:text-2xl text-white/90 mb-12 max-w-3xl mx-auto leading-relaxed font-light">
                    Destinasi wisata spektakuler akan segera hadir
                </p>
            </div>
            @endif
        </div>
    </div>

    <!-- Scroll indicator with animation -->
    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <div class="flex flex-col items-center gap-2">
            <span class="text-sm font-medium">Scroll untuk menjelajahi</span>
            <i class="fas fa-chevron-down text-2xl"></i>
        </div>
    </div>
</section>

@if($wisata)
<!-- Spectacular Gallery Section -->
<section class="gallery-spectacular">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-5xl font-black text-white mb-6 text-glow">
                Galeri Spektakuler
            </h2>
            <p class="text-2xl text-white/90 max-w-3xl mx-auto font-light">
                Jelajahi keindahan {{ $wisata->nama }} melalui pengalaman visual yang menakjubkan
            </p>
        </div>

        @if($galleryPhotos && count($galleryPhotos) > 0)
        <div class="gallery-grid-3d">
            @foreach($galleryPhotos as $index => $photo)
            <div class="photo-card-3d fade-in-up" style="animation-delay: {{ $index * 0.2 }}s" onclick="openSpectacularModal({{ $index }})">
                <div class="card-front">
                    <img src="{{ $photo['url'] }}" alt="{{ $photo['judul'] ?? 'Foto ' . ($index + 1) }}" class="photo-spectacular" loading="lazy">
                    <div class="photo-info-3d">
                        <h3 class="photo-title-3d">{{ $photo['judul'] ?? 'Foto ' . ($index + 1) }}</h3>
                        @if($photo['keterangan'])
                        <p class="photo-desc-3d">{{ Str::limit($photo['keterangan'], 100) }}</p>
                        @endif
                    </div>
                </div>
                <div class="card-back">
                    <div>
                        <i class="fas fa-search-plus text-4xl mb-4"></i>
                        <h3 class="text-2xl font-bold mb-2">{{ $photo['judul'] ?? 'Foto ' . ($index + 1) }}</h3>
                        <p class="text-lg">Klik untuk melihat detail</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-20" data-aos="fade-up">
            <div class="glass-card max-w-md mx-auto">
                <i class="fas fa-images text-6xl text-white/70 mb-6"></i>
                <h3 class="text-3xl font-bold text-white mb-4">Belum ada foto</h3>
                <p class="text-white/80 text-lg">Galeri foto spektakuler akan segera ditambahkan</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Spectacular Video Section -->
@if($wisata->video_youtube)
<section class="video-spectacular">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-5xl font-black text-white mb-6 text-glow">
            Video Tour Spektakuler
        </h2>
        <p class="text-2xl text-white/90 mb-12 max-w-3xl mx-auto font-light">
            Saksikan keajaiban {{ $wisata->nama }} dalam pengalaman sinematik yang memukau
        </p>
        
        <div class="video-container-spectacular">
            <iframe 
                src="https://www.youtube.com/embed/{{ $youtubeId }}?autoplay=1&mute=1&rel=0&showinfo=0&controls=1&modestbranding=1" 
                title="{{ $wisata->nama }} - Video Tour Spektakuler"
                frameborder="0" 
                allowfullscreen
                allow="autoplay; encrypted-media"
                loading="lazy">
            </iframe>
        </div>
    </div>
</section>
@endif

<!-- Spectacular Info Section -->
<section class="info-spectacular">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-5xl font-black text-white mb-6 text-glow">
                Informasi Lengkap
            </h2>
            <p class="text-2xl text-white/90 max-w-3xl mx-auto font-light">
                Segala yang perlu Anda ketahui tentang {{ $wisata->nama }}
            </p>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-16 items-center mb-16">
            <div data-aos="fade-right">
                <div class="glass-card">
                    <h3 class="text-4xl font-bold text-white mb-6">
                        Tentang {{ $wisata->nama }}
                    </h3>
                    <div class="prose prose-lg text-white/90 leading-relaxed">
                        {!! $wisata->deskripsi !!}
                    </div>
                </div>
            </div>
            
            <div class="info-cards-grid" data-aos="fade-left">
                <div class="info-card-spectacular">
                    <div class="info-icon-spectacular">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="info-title-spectacular">Lokasi</h3>
                    <p class="info-desc-spectacular">{{ $wisata->lokasi }}</p>
                </div>
                
                <div class="info-card-spectacular">
                    <div class="info-icon-spectacular">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="info-title-spectacular">Rating</h3>
                    <div class="flex items-center gap-2">
                        <div class="flex text-yellow-300">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <span class="text-white/90 text-lg">(5.0 dari 5)</span>
                    </div>
                </div>
                
                <div class="info-card-spectacular">
                    <div class="info-icon-spectacular">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="info-title-spectacular">Total Views</h3>
                    <p class="info-desc-spectacular">{{ number_format($wisata->views ?? 0) }} kali dilihat</p>
                </div>

                <div class="info-card-spectacular">
                    <div class="info-icon-spectacular">
                        <i class="fas fa-images"></i>
                    </div>
                    <h3 class="info-title-spectacular">Gallery</h3>
                    <p class="info-desc-spectacular">{{ $galleryCount }} foto menakjubkan</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Spectacular Photo Modal -->
<div id="photoModalSpectacular" class="modal-spectacular">
    <div class="modal-btn modal-close-spectacular" onclick="closeSpectacularModal()">
        <i class="fas fa-times"></i>
    </div>
    
    @if($galleryPhotos && count($galleryPhotos) > 1)
    <div class="modal-btn modal-prev-spectacular" onclick="prevSpectacularPhoto()">
        <i class="fas fa-chevron-left"></i>
    </div>
    <div class="modal-btn modal-next-spectacular" onclick="nextSpectacularPhoto()">
        <i class="fas fa-chevron-right"></i>
    </div>
    @endif
    
    <div class="modal-content-spectacular">
        <img id="modalImageSpectacular" src="" alt="" class="modal-image-spectacular">
        <div class="modal-info-spectacular">
            <h3 id="modalTitleSpectacular" class="modal-title-spectacular"></h3>
            <p id="modalDescSpectacular" class="modal-desc-spectacular"></p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    // Initialize AOS with spectacular settings
    AOS.init({
        duration: 1200,
        easing: 'cubic-bezier(0.175, 0.885, 0.32, 1.275)',
        once: true,
        mirror: false,
        offset: 100
    });

    // Gallery data
    const gallerySpectacular = @json($galleryPhotos ?? []);
    let currentPhotoIndex = 0;

    // Parallax effects
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.parallax-element');
        
        parallaxElements.forEach(element => {
            const speed = element.dataset.speed || 0.5;
            const yPos = -(scrolled * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });
    });

    // Open spectacular modal
    function openSpectacularModal(index) {
        if (!gallerySpectacular || gallerySpectacular.length === 0) return;
        
        currentPhotoIndex = index;
        const photo = gallerySpectacular[index];
        
        document.getElementById('modalImageSpectacular').src = photo.url;
        document.getElementById('modalImageSpectacular').alt = photo.judul || 'Foto ' + (index + 1);
        document.getElementById('modalTitleSpectacular').textContent = photo.judul || 'Foto ' + (index + 1);
        document.getElementById('modalDescSpectacular').textContent = photo.keterangan || '';
        
        const modal = document.getElementById('photoModalSpectacular');
        modal.style.display = 'flex';
        setTimeout(() => {
            modal.classList.add('show');
        }, 10);
        
        document.body.style.overflow = 'hidden';
    }

    // Close spectacular modal
    function closeSpectacularModal() {
        const modal = document.getElementById('photoModalSpectacular');
        modal.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }, 500);
    }

    // Previous photo
    function prevSpectacularPhoto() {
        if (!gallerySpectacular || gallerySpectacular.length <= 1) return;
        
        currentPhotoIndex = (currentPhotoIndex - 1 + gallerySpectacular.length) % gallerySpectacular.length;
        const photo = gallerySpectacular[currentPhotoIndex];
        
        // Add transition effect
        const img = document.getElementById('modalImageSpectacular');
        img.style.transform = 'scale(0.8) rotateY(90deg)';
        img.style.opacity = '0';
        
        setTimeout(() => {
            img.src = photo.url;
            img.alt = photo.judul || 'Foto ' + (currentPhotoIndex + 1);
            document.getElementById('modalTitleSpectacular').textContent = photo.judul || 'Foto ' + (currentPhotoIndex + 1);
            document.getElementById('modalDescSpectacular').textContent = photo.keterangan || '';
            
            img.style.transform = 'scale(1) rotateY(0deg)';
            img.style.opacity = '1';
        }, 200);
    }

    // Next photo
    function nextSpectacularPhoto() {
        if (!gallerySpectacular || gallerySpectacular.length <= 1) return;
        
        currentPhotoIndex = (currentPhotoIndex + 1) % gallerySpectacular.length;
        const photo = gallerySpectacular[currentPhotoIndex];
        
        // Add transition effect
        const img = document.getElementById('modalImageSpectacular');
        img.style.transform = 'scale(0.8) rotateY(-90deg)';
        img.style.opacity = '0';
        
        setTimeout(() => {
            img.src = photo.url;
            img.alt = photo.judul || 'Foto ' + (currentPhotoIndex + 1);
            document.getElementById('modalTitleSpectacular').textContent = photo.judul || 'Foto ' + (currentPhotoIndex + 1);
            document.getElementById('modalDescSpectacular').textContent = photo.keterangan || '';
            
            img.style.transform = 'scale(1) rotateY(0deg)';
            img.style.opacity = '1';
        }, 200);
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('photoModalSpectacular');
        if (modal.classList.contains('show')) {
            if (e.key === 'Escape') {
                closeSpectacularModal();
            } else if (e.key === 'ArrowLeft') {
                prevSpectacularPhoto();
            } else if (e.key === 'ArrowRight') {
                nextSpectacularPhoto();
            }
        }
    });

    // Click outside modal to close
    document.getElementById('photoModalSpectacular').addEventListener('click', function(e) {
        if (e.target === this) {
            closeSpectacularModal();
        }
    });

    // Update views counter
    @if($wisata)
    fetch('/potensi-wisata/{{ $wisata->id }}/increment-views', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    }).catch(console.error);
    @endif

    // Add smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, observerOptions);

    // Observe all animated elements
    document.querySelectorAll('.fade-in-up').forEach(el => {
        observer.observe(el);
    });
</script>
@endpush