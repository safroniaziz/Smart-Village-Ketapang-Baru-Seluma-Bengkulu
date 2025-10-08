@extends('layouts.app-public')

@section('title', 'Berita Desa - Smart Village Ketapang Baru')

@push('styles')
<style>
    /* 🚀 SPEKTAKULER BERITA PAGE STYLES 🚀 */
    :root {
        --primary-blue-start: #0086c9;
        --primary-blue-mid: #0074b3;
        --primary-blue-end: #006ba3;
        --glow-primary: rgba(0, 134, 201, 0.4);
        --glow-secondary: rgba(255, 215, 0, 0.6);
    }

    /* ✨ SPECTACULAR HERO BACKGROUND ✨ */
    .hero-section {
        background: linear-gradient(135deg, var(--primary-blue-start) 0%, var(--primary-blue-mid) 50%, var(--primary-blue-end) 100%);
        background-size: 400% 400%;
        animation: heroGradientShift 12s ease infinite;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(255, 215, 0, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(0, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 40% 80%, rgba(255, 105, 180, 0.1) 0%, transparent 50%);
        animation: colorShift 15s ease infinite;
    }

    @keyframes heroGradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    @keyframes colorShift {
        0%, 100% { opacity: 1; }
        33% { opacity: 0.8; }
        66% { opacity: 0.9; }
    }

    /* 🌟 SPECTACULAR NEWS CARDS 🌟 */
    .news-card {
        position: relative;
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: linear-gradient(145deg, #ffffff, #f8fafc);
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        overflow: hidden;
    }

    .news-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.6s ease;
        z-index: 1;
    }

    .news-card:hover::before {
        left: 100%;
    }

    .news-card:hover {
        transform: translateY(-15px) scale(1.03) rotateX(5deg);
        box-shadow: 
            0 30px 60px rgba(0, 0, 0, 0.15),
            0 0 0 1px rgba(255, 255, 255, 0.1),
            0 0 50px var(--glow-primary);
        border-color: rgba(0, 134, 201, 0.3);
    }

    .news-card .relative {
        position: relative;
        z-index: 2;
    }

    /* 🎭 SPECTACULAR IMAGE EFFECTS 🎭 */
    .news-card img {
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        filter: brightness(1) contrast(1) saturate(1);
    }

    .news-card:hover img {
        transform: scale(1.15) rotate(2deg);
        filter: brightness(1.1) contrast(1.1) saturate(1.2);
    }

    /* 🌈 SPECTACULAR GRADIENT BACKGROUNDS 🌈 */
    .news-card .bg-gradient-to-br {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        background-size: 300% 300%;
        animation: gradientFlow 8s ease infinite;
    }

    @keyframes gradientFlow {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    /* ⭐ SPECTACULAR FEATURED BADGE ⭐ */
    .featured-badge {
        background: linear-gradient(45deg, #ff6b6b, #feca57, #48dbfb, #ff9ff3);
        background-size: 300% 300%;
        animation: rainbowShift 3s ease infinite;
        box-shadow: 0 0 20px rgba(255, 107, 107, 0.5);
        position: relative;
        overflow: hidden;
    }

    .featured-badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
        animation: shimmer 2s infinite;
    }

    @keyframes rainbowShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    @keyframes shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    /* 🎨 SPECTACULAR SECTION HEADERS 🎨 */
    .section-badge {
        position: relative;
        overflow: hidden;
    }

    .section-badge::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        animation: badgeShine 3s infinite;
    }

    @keyframes badgeShine {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    /* 🔥 SPECTACULAR BUTTONS 🔥 */
    .spectacular-btn {
        position: relative;
        overflow: hidden;
        background: linear-gradient(45deg, #667eea, #764ba2);
        background-size: 200% 200%;
        animation: buttonGradient 4s ease infinite;
        box-shadow: 0 8px 32px rgba(102, 126, 234, 0.4);
        border: none;
        transition: all 0.4s ease;
    }

    .spectacular-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s ease;
    }

    .spectacular-btn:hover::before {
        left: 100%;
    }

    .spectacular-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 45px rgba(102, 126, 234, 0.6);
    }

    @keyframes buttonGradient {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    /* 💫 SPECTACULAR LOADING ANIMATION 💫 */
    .loading-shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmerLoad 1.5s infinite;
    }

    @keyframes shimmerLoad {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* 🌟 SPECTACULAR HOVER GLOW EFFECTS 🌟 */
    .glow-on-hover {
        transition: all 0.3s ease;
    }

    .glow-on-hover:hover {
        box-shadow: 
            0 0 20px var(--glow-primary),
            0 0 40px var(--glow-primary),
            0 0 60px var(--glow-primary);
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }

    /* 🎪 SPECTACULAR FLOATING ANIMATIONS 🎪 */
    .floating-element {
        animation: spectacularFloat 6s ease-in-out infinite;
    }

    .floating-element:nth-child(1) { animation-delay: 0s; }
    .floating-element:nth-child(2) { animation-delay: 2s; }
    .floating-element:nth-child(3) { animation-delay: 4s; }

    @keyframes spectacularFloat {
        0%, 100% { 
            transform: translateY(0px) rotate(0deg) scale(1);
            opacity: 0.6;
        }
        25% { 
            transform: translateY(-20px) rotate(90deg) scale(1.1);
            opacity: 0.8;
        }
        50% { 
            transform: translateY(-40px) rotate(180deg) scale(1.2);
            opacity: 1;
        }
        75% { 
            transform: translateY(-20px) rotate(270deg) scale(1.1);
            opacity: 0.8;
        }
    }

    /* 🌈 SPECTACULAR GRADIENT TEXT 🌈 */
    .gradient-text {
        background: linear-gradient(45deg, #667eea, #764ba2, #f093fb, #f5576c);
        background-size: 300% 300%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: textGradientShift 5s ease infinite;
    }

    @keyframes textGradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    /* 🎯 SPECTACULAR FOCUS EFFECTS 🎯 */
    .spectacular-focus:focus {
        outline: none;
        box-shadow: 
            0 0 0 3px rgba(102, 126, 234, 0.3),
            0 0 20px rgba(102, 126, 234, 0.5);
        transform: scale(1.02);
    }

    /* 💎 SPECTACULAR GLASS MORPHISM 💎 */
    .glass-morphism {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    /* 🌊 SPECTACULAR WAVE ANIMATION 🌊 */
    .wave-animation {
        position: relative;
        overflow: hidden;
    }

    .wave-animation::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: wave 3s infinite;
    }

    @keyframes wave {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    /* 🚀 RESPONSIVE SPECTACULAR EFFECTS 🚀 */
    @media (max-width: 768px) {
        .news-card:hover {
            transform: translateY(-10px) scale(1.02);
        }
        
        .spectacular-btn:hover {
            transform: translateY(-2px) scale(1.03);
        }
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

    /* 🎭 SPECTACULAR ENTRANCE ANIMATIONS 🎭 */
    .spectacular-entrance {
        animation: spectacularEntrance 1s ease-out forwards;
        opacity: 0;
        transform: translateY(50px) scale(0.9);
    }

    @keyframes spectacularEntrance {
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* 🌟 SPECTACULAR PULSE EFFECT 🌟 */
    .spectacular-pulse {
        animation: spectacularPulse 2s infinite;
    }

    @keyframes spectacularPulse {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
        }
        70% {
            box-shadow: 0 0 0 20px rgba(102, 126, 234, 0);
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
<section class="py-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <div class="relative w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Featured News Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-24">
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="800">
                <div>
                    <!-- Modern Badge with Gradient -->
                    <div class="inline-flex items-center relative mb-6">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                        <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-star mr-2"></i>
                            Berita Utama
                        </div>
                    </div>

                    <!-- Enhanced Title with Gradient Text -->
                    <div class="mb-8">
                        <h2 class="text-4xl lg:text-5xl font-black mb-4">
                            <span class="bg-gradient-to-r from-gray-900 via-slate-800 to-blue-800 bg-clip-text text-transparent">
                                Sorotan Berita
                            </span>
                        </h2>
                        <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full"></div>
                    </div>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        <strong>{{ $featuredBerita->judul }}</strong> - {{ $featuredBerita->excerpt }}
                    </p>
                    <div class="flex items-center space-x-6 text-sm text-gray-500 mb-6">
                        <div class="flex items-center">
                            <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                            <span>{{ $featuredBerita->formatted_date }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-user mr-2 text-blue-500"></i>
                            <span>{{ $featuredBerita->penulis }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-eye mr-2 text-blue-500"></i>
                            <span>{{ number_format($featuredBerita->views) }} views</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('berita.show', $featuredBerita->slug) }}" class="group bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <div class="flex items-center justify-center">
                                <i class="fas fa-arrow-right mr-2 text-base group-hover:translate-x-1 transition-transform duration-300"></i>
                                <span class="text-base">Baca Selengkapnya</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Featured News Preview -->
            <div class="relative" data-aos="fade-left" data-aos-duration="800">
                <div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 rounded-3xl p-8 shadow-2xl">
                    @if($featuredBerita->gambar)
                        <div class="relative mb-6 rounded-2xl overflow-hidden shadow-lg">
                            <img src="{{ asset('storage/' . $featuredBerita->gambar) }}" alt="{{ $featuredBerita->judul }}" class="w-full h-64 object-cover">
                            <div class="absolute top-4 left-4">
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    <i class="fas fa-fire mr-1"></i>
                                    Featured
                                </span>
                            </div>
                        </div>
                    @else
                        <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl h-64 flex items-center justify-center mb-6 shadow-lg">
                            <i class="fas fa-newspaper text-6xl text-white opacity-50"></i>
                        </div>
                    @endif

                    <div class="text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $featuredBerita->judul }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($featuredBerita->excerpt, 120) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- News Grid Section -->
<section class="py-20 bg-white relative overflow-hidden">
    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- 🌟 SPECTACULAR SECTION HEADER 🌟 -->
        <div class="text-center mb-16 spectacular-entrance" data-aos="fade-up">
            <div class="inline-flex items-center relative mb-6 section-badge spectacular-pulse">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg glow-on-hover">
                    <i class="fas fa-newspaper mr-2"></i>
                    Semua Berita
                </div>
            </div>
            <h2 class="text-4xl lg:text-5xl font-black mb-6">
                <span class="gradient-text">
                    Berita Spektakuler
                </span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed mb-8 wave-animation">
                Ikuti perkembangan terbaru dan informasi penting dari Desa Ketapang Baru
            </p>
            
            <!-- 🎯 SPECTACULAR FILTER CONTROLS 🎯 -->
            <div class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <form method="GET" action="{{ route('berita') }}" class="flex gap-3">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="featured" class="px-4 py-2 border border-gray-300 rounded-lg bg-white spectacular-focus glass-morphism" onchange="this.form.submit()">
                        <option value="">Semua Berita</option>
                        <option value="1" {{ request('featured') == '1' ? 'selected' : '' }}>Berita Utama</option>
                    </select>
                </form>
            </div>
        </div>

        @if($beritas->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($beritas as $index => $berita)
                    <article class="news-card group bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="relative overflow-hidden">
                            @if($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-64 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                                    <i class="fas fa-newspaper text-6xl text-white opacity-50"></i>
                                </div>
                            @endif

                            @if($berita->featured)
                                <div class="absolute top-4 left-4 z-10">
                                    <span class="featured-badge text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        <i class="fas fa-star mr-1"></i>
                                        Featured
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt mr-1 text-blue-500"></i>
                                    <span>{{ $berita->formatted_date }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-1 text-blue-500"></i>
                                    <span>{{ $berita->penulis }}</span>
                                </div>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-300">
                                <a href="{{ route('berita.show', $berita->slug) }}" class="hover:text-blue-600">
                                    {{ $berita->judul }}
                                </a>
                            </h3>

                            <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                {{ Str::limit($berita->excerpt, 120) }}
                            </p>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-eye mr-1"></i>
                                    <span>{{ number_format($berita->views) }} views</span>
                                </div>
                                <a href="{{ route('berita.show', $berita->slug) }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300 hover:scale-105">
                                    <i class="fas fa-arrow-right mr-1"></i>
                                    Baca
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="text-center py-20" data-aos="fade-up">
                <div class="mb-8">
                    <i class="fas fa-newspaper text-8xl text-gray-300"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-4">Belum Ada Berita</h3>
                <p class="text-gray-500 mb-8">Berita akan segera hadir. Silakan kembali lagi nanti.</p>
                <a href="{{ route('home') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-home mr-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        @endif

        @if($beritas->hasPages())
            <div class="flex justify-center mt-16" data-aos="fade-up">
                <div class="bg-white rounded-2xl shadow-lg p-4">
                    {{ $beritas->onEachSide(2)->links() }}
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

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
