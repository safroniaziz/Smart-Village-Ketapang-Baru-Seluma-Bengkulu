@extends('layouts.app-public')

@section('title', 'Potensi Wisata - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* Professional CSS for Potensi Wisata Page */

    /* Smooth gradient animation */
    .hero-gradient {
        background: linear-gradient(135deg, #0086c9 0%, #0074b3 25%, #006ba3 50%, #005b93 75%, #004d83 100%);
        background-size: 200% 200%;
        animation: gradientShift 8s ease infinite;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Enhanced card hover effects */
    .wisata-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform-origin: center;
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.06);
        position: relative;
        overflow: hidden;
    }

    .wisata-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .wisata-card .card-image {
        height: 280px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 1.5rem 1.5rem 0 0;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .wisata-card .card-image::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.4));
        z-index: 1;
        transition: all 0.3s ease;
    }

    .wisata-card:hover .card-image::before {
        background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.6));
    }

    .wisata-card .card-image::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, transparent 0%, rgba(59, 130, 246, 0.1) 50%, transparent 100%);
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 2;
    }

    .wisata-card:hover .card-image::after {
        opacity: 1;
    }

    /* Gallery Preview on Hover */
    .gallery-preview {
        position: absolute;
        bottom: 1rem;
        left: 1rem;
        right: 1rem;
        display: flex;
        gap: 0.5rem;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
        z-index: 3;
    }

    .wisata-card:hover .gallery-preview {
        opacity: 1;
        transform: translateY(0);
    }

    .gallery-preview-thumb {
        width: 40px;
        height: 40px;
        border-radius: 0.5rem;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, 0.8);
        transition: all 0.3s ease;
    }

    .gallery-preview-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gallery-preview-thumb:hover {
        transform: scale(1.1);
        border-color: white;
    }

    .gallery-count {
        position: absolute;
        bottom: 1rem;
        right: 1rem;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 0.5rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.75rem;
        font-weight: 600;
        backdrop-filter: blur(10px);
        z-index: 3;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }

    .wisata-card:hover .gallery-count {
        opacity: 1;
        transform: translateY(0);
    }

    .category-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 1rem;
        font-size: 0.75rem;
        font-weight: 600;
        z-index: 2;
    }

    .filter-btn {
        background: white;
        border: 2px solid #e5e7eb;
        color: #374151;
        padding: 0.75rem 1.5rem;
        border-radius: 1rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .filter-btn:hover, .filter-btn.active {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
    }

    /* Floating decorations */
    .floating-decoration {
        position: absolute;
        border-radius: 50%;
        filter: blur(60px);
        opacity: 0.3;
        pointer-events: none;
        z-index: -1;
    }

    /* Modern section spacing */
    .section-spacing {
        padding: 5rem 0;
    }

    /* Enhanced button styles */
    .btn-modern {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        padding: 0.875rem 2rem;
        border-radius: 0.875rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
        border: none;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(59, 130, 246, 0.4);
        color: white;
        text-decoration: none;
    }

    /* Modern gradient text */
    .gradient-text {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Enhanced visual hierarchy */
    .section-badge {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 2rem;
        font-weight: 600;
        font-size: 0.875rem;
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
        position: relative;
        overflow: hidden;
    }

    .section-badge::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-radius: 2rem;
        filter: blur(20px);
        opacity: 0.2;
        z-index: -1;
    }

    /* Professional card grid */
    .card-grid {
        display: grid;
        gap: 2rem;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    }

    @media (min-width: 1024px) {
        .card-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Modern search and filter */
    .search-filter-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 2rem;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Professional spacing and typography */
    .hero-content {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
        padding: 0 1rem;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #1f2937, #374151);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-subtitle {
        font-size: 1.25rem;
        color: #6b7280;
        font-weight: 500;
        line-height: 1.6;
    }

    /* Stats enhancement */
    .stats-card {
        background: white;
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
    }

    /* Loading state */
    .loading-placeholder {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* Responsive enhancements */
    @media (max-width: 768px) {
        .section-spacing { padding: 3rem 0; }
        .section-title { font-size: 2rem; }
        .card-grid { grid-template-columns: 1fr; gap: 1.5rem; }
        .wisata-card .card-image { height: 240px; }
        .search-filter-container { padding: 1.5rem; border-radius: 1.5rem; }
    }
</style>
@endpush

<!-- Hero Section with Advanced Design -->
<section class="hero-gradient relative overflow-hidden min-h-[80vh] flex items-center">
    <!-- Animated Background Elements -->
    <div id="particles-wisata" class="absolute inset-0 z-0"></div>

    <!-- Floating Decorative Elements -->
    <div class="floating-decoration absolute top-20 left-10 w-20 h-20 bg-blue-400" style="animation: float 6s ease-in-out infinite;"></div>
    <div class="floating-decoration absolute bottom-20 right-10 w-16 h-16 bg-purple-400" style="animation: float 8s ease-in-out infinite reverse;"></div>
    <div class="floating-decoration absolute top-1/2 left-1/4 w-12 h-12 bg-indigo-400" style="animation: float 10s ease-in-out infinite;"></div>

    <div class="relative z-10 w-full">
        <div class="hero-content" data-aos="fade-up">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md text-white px-6 py-3 rounded-full mb-8 border border-white/30">
                <i class="fas fa-map-marked-alt text-lg"></i>
                <span class="font-semibold">Destinasi Unggulan</span>
            </div>

            <!-- Main Title -->
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Jelajahi <span class="text-yellow-300">Potensi Wisata</span><br>
                <span class="text-3xl md:text-5xl text-blue-200">Ketapang Baru</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl text-blue-100 mb-12 max-w-2xl mx-auto leading-relaxed">
                Temukan keindahan alam, budaya, dan destinasi menakjubkan yang tersembunyi di desa kami
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#destinasi" class="btn-modern text-lg px-8 py-4">
                    <i class="fas fa-compass mr-2"></i>
                    Mulai Jelajahi
                </a>
                <a href="#statistik" class="bg-white/20 backdrop-blur-md text-white border-2 border-white/30 px-8 py-4 rounded-xl font-semibold hover:bg-white/30 transition-all duration-300">
                    <i class="fas fa-chart-line mr-2"></i>
                    Lihat Statistik
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <i class="fas fa-chevron-down text-2xl"></i>
    </div>
</section>

<!-- Stats Section -->
<section id="statistik" class="py-16 bg-gradient-to-br from-gray-50 to-blue-50 relative">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="section-badge">Statistik Wisata</span>
            <h2 class="section-title mt-6">Dalam Angka</h2>
            <p class="section-subtitle">Data terkini tentang potensi wisata di Ketapang Baru</p>
        </div>

        @if($wisata->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8" data-aos="fade-up" data-aos-delay="200">
            <div class="stats-card text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2">{{ $wisata->count() }}</div>
                <div class="text-gray-600 font-semibold">Total Destinasi</div>
            </div>
            <div class="stats-card text-center">
                <div class="text-4xl font-bold text-green-600 mb-2">{{ $wisata->where('kategori_wisata', 'alam')->count() }}</div>
                <div class="text-gray-600 font-semibold">Wisata Alam</div>
            </div>
            <div class="stats-card text-center">
                <div class="text-4xl font-bold text-purple-600 mb-2">{{ $wisata->where('kategori_wisata', 'budaya')->count() }}</div>
                <div class="text-gray-600 font-semibold">Wisata Budaya</div>
            </div>
            <div class="stats-card text-center">
                <div class="text-4xl font-bold text-orange-600 mb-2">{{ number_format($wisata->sum('jumlah_pengunjung') ?? 0) }}</div>
                <div class="text-gray-600 font-semibold">Total Views</div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Search & Filter Section -->
<section class="py-8 bg-white relative">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="search-filter-container" data-aos="fade-up">
            <form method="GET" class="space-y-6">
                <!-- Search Bar -->
                <div class="relative">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari destinasi wisata..."
                           class="w-full px-6 py-4 pl-14 rounded-2xl border-2 border-gray-200 focus:border-blue-500 focus:outline-none text-lg transition-all duration-300">
                    <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg"></i>
                </div>

                <!-- Category Filter -->
                <div class="flex flex-wrap gap-3 justify-center">
                    <button type="submit" name="kategori" value="" class="filter-btn {{ !request('kategori') ? 'active' : '' }}">
                        <i class="fas fa-th-large mr-2"></i>
                        Semua
                    </button>
                    <button type="submit" name="kategori" value="alam" class="filter-btn {{ request('kategori') == 'alam' ? 'active' : '' }}">
                        <i class="fas fa-mountain mr-2"></i>
                        Wisata Alam
                    </button>
                    <button type="submit" name="kategori" value="budaya" class="filter-btn {{ request('kategori') == 'budaya' ? 'active' : '' }}">
                        <i class="fas fa-landmark mr-2"></i>
                        Wisata Budaya
                    </button>
                    <button type="submit" name="kategori" value="kuliner" class="filter-btn {{ request('kategori') == 'kuliner' ? 'active' : '' }}">
                        <i class="fas fa-utensils mr-2"></i>
                        Wisata Kuliner
                    </button>
                    <button type="submit" name="kategori" value="edukasi" class="filter-btn {{ request('kategori') == 'edukasi' ? 'active' : '' }}">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        Wisata Edukasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Featured Destination -->
@if($wisata->count() > 0)
<section class="py-16 bg-gradient-to-br from-blue-50 to-indigo-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="section-badge">Destinasi Pilihan</span>
            <h2 class="section-title mt-6">Yang Paling Banyak Dikunjungi</h2>
        </div>

        @php $featured = $wisata->sortByDesc('jumlah_pengunjung')->first(); @endphp
        @if($featured)
            <div class="bg-white rounded-3xl overflow-hidden shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                <div class="grid lg:grid-cols-2 gap-0">
                    @php
                        $featuredImage = is_array($featured->gambar) && count($featured->gambar) > 0
                                       ? $featured->gambar[0]
                                       : ($featured->thumbnail ?: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800');
                    @endphp

                    <div class="wisata-card group">
                        <div class="card-image" style="background-image: url('{{ $featuredImage }}');">
                            <div class="category-badge">
                                {{ ucwords(str_replace('_', ' ', $featured->kategori_wisata)) }}
                            </div>

                            @if($featured->video_youtube)
                            <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-2 rounded-full text-sm font-semibold z-10 flex items-center gap-2">
                                <i class="fab fa-youtube"></i>
                                Video Tour
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <h3 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">{{ $featured->nama }}</h3>
                        <p class="text-gray-600 mb-6 text-lg leading-relaxed">{{ Str::limit(strip_tags($featured->deskripsi), 200) }}</p>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-3 text-gray-600">
                                <i class="fas fa-map-marker-alt text-red-500"></i>
                                <span>{{ $featured->lokasi }}</span>
                            </div>
                            @if($featured->jam_operasional)
                            <div class="flex items-center gap-3 text-gray-600">
                                <i class="fas fa-clock text-blue-500"></i>
                                <span>{{ $featured->jam_operasional }}</span>
                            </div>
                            @endif
                            @if($featured->tiket_masuk)
                            <div class="flex items-center gap-3 text-gray-600">
                                <i class="fas fa-ticket-alt text-green-500"></i>
                                <span>{{ $featured->tiket_masuk }}</span>
                            </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-1">
                                    @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star text-yellow-400"></i>
                                    @endfor
                                    <span class="text-gray-600 ml-2">4.8</span>
                                </div>
                                <span class="text-gray-400">•</span>
                                <span class="text-gray-600">{{ number_format($featured->jumlah_pengunjung ?? 0) }} views</span>
                            </div>
                            <a href="{{ route('potensi-wisata.show', $featured->slug ?: $featured->id) }}" class="btn-modern">
                                <i class="fas fa-arrow-right mr-2"></i>
                                Jelajahi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Main Destinations Grid -->
<section id="destinasi" class="section-spacing bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="section-badge">Semua Destinasi</span>
            <h2 class="section-title mt-6">
                @if(request('search'))
                    Hasil Pencarian "{{ request('search') }}"
                @elseif(request('kategori'))
                    {{ ucwords(str_replace('_', ' ', request('kategori'))) }}
                @else
                    Jelajahi Semua Destinasi
                @endif
            </h2>
            <p class="section-subtitle">
                @if(request('search') || request('kategori'))
                    Ditemukan {{ $wisata->count() }} destinasi yang sesuai
                @else
                    Pilih destinasi favoritmu dan mulai petualangan seru
                @endif
            </p>
        </div>

        <div class="card-grid" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            @foreach($wisata as $item)
            <div class="wisata-card group">
                @php
                    $mainImage = is_array($item->gambar) && count($item->gambar) > 0
                               ? $item->gambar[0]
                               : ($item->thumbnail ?: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800');
                    $galleryImages = is_array($item->gambar) ? $item->gambar : [];
                    $totalImages = count($galleryImages);
                @endphp
                <div class="card-image" style="background-image: url('{{ $mainImage }}');" onclick="window.location='{{ route('potensi-wisata.show', $item->slug ?: $item->id) }}'">
                    <!-- Category Badge -->
                    <div class="category-badge">
                        {{ ucwords(str_replace('_', ' ', $item->kategori_wisata)) }}
                    </div>

                    <!-- Video Indicator -->
                    @if($item->video_youtube)
                    <div class="absolute top-4 right-4 bg-red-600 text-white px-2 py-1 rounded-full text-xs font-semibold z-10 flex items-center gap-1">
                        <i class="fab fa-youtube"></i>
                        Video
                    </div>
                    @endif

                    <!-- Gallery Preview (show on hover) -->
                    @if($totalImages > 1)
                    <div class="gallery-preview">
                        @foreach(array_slice($galleryImages, 1, 3) as $thumbnail)
                        <div class="gallery-preview-thumb">
                            <img src="{{ $thumbnail }}" alt="{{ $item->nama }}">
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- Gallery Count -->
                    @if($totalImages > 0)
                    <div class="gallery-count">
                        <i class="fas fa-images mr-1"></i>
                        {{ $totalImages }} foto{{ $item->video_youtube ? ' + video' : '' }}
                    </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                        {{ $item->nama }}
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        {{ Str::limit(strip_tags($item->deskripsi), 100) }}
                    </p>

                    <!-- Info -->
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center gap-2 text-gray-500">
                            <i class="fas fa-map-marker-alt text-sm text-red-500"></i>
                            <span class="text-sm">{{ $item->lokasi }}</span>
                        </div>
                        @if($item->jam_operasional)
                        <div class="flex items-center gap-2 text-gray-500">
                            <i class="fas fa-clock text-sm text-blue-500"></i>
                            <span class="text-sm">{{ $item->jam_operasional }}</span>
                        </div>
                        @endif
                        @if($item->tiket_masuk)
                        <div class="flex items-center gap-2 text-gray-500">
                            <i class="fas fa-ticket-alt text-sm text-green-500"></i>
                            <span class="text-sm">{{ $item->tiket_masuk }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Facilities Preview -->
                    @if(is_array($item->fasilitas) && count($item->fasilitas) > 0)
                    <div class="flex items-center gap-2 mb-4 flex-wrap">
                        @foreach(array_slice($item->fasilitas, 0, 4) as $fasilitas)
                        <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-700 px-2 py-1 rounded-lg text-xs font-medium">
                            @switch($fasilitas)
                                @case('toilet')
                                    <i class="fas fa-restroom text-blue-500"></i>
                                    @break
                                @case('parkir')
                                    <i class="fas fa-parking text-green-500"></i>
                                    @break
                                @case('warung')
                                    <i class="fas fa-utensils text-orange-500"></i>
                                    @break
                                @case('wifi')
                                    <i class="fas fa-wifi text-blue-500"></i>
                                    @break
                                @default
                                    <i class="fas fa-check-circle text-gray-500"></i>
                            @endswitch
                            {{ ucfirst($fasilitas) }}
                        </span>
                        @endforeach
                        @if(count($item->fasilitas) > 4)
                        <span class="text-xs text-gray-500">+{{ count($item->fasilitas) - 4 }} lainnya</span>
                        @endif
                    </div>
                    @endif

                    <!-- Action -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-1">
                                @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                @endfor
                                <span class="text-sm text-gray-500 ml-1">4.8</span>
                            </div>
                            <span class="text-xs text-gray-400">•</span>
                            <span class="text-xs text-gray-500">{{ number_format($item->jumlah_pengunjung ?? 0) }} views</span>
                        </div>
                        <a href="{{ route('potensi-wisata.show', $item->slug ?: $item->id) }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                            Jelajahi
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($wisata->hasPages())
        <div class="mt-12 flex justify-center" data-aos="fade-up" data-aos-delay="400">
            {{ $wisata->links() }}
        </div>
        @endif
    </div>
</section>
@else
    <!-- Empty State -->
    <section class="section-spacing bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 relative overflow-hidden">
        <div class="relative w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Icon -->
            <div class="mb-8" data-aos="fade-up">
                <div class="w-24 h-24 mx-auto bg-gradient-to-r from-gray-400 to-gray-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-map-marked-alt text-3xl text-white"></i>
                </div>
            </div>

            <!-- Content -->
            <div class="space-y-6" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800">
                    @if(request('search'))
                        Tidak Ditemukan Hasil
                    @elseif(request('kategori'))
                        Belum Ada Wisata {{ ucwords(str_replace('_', ' ', request('kategori'))) }}
                    @else
                        Belum Ada Destinasi Wisata
                    @endif
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg leading-relaxed">
                    @if(request('search'))
                        Maaf, pencarian "{{ request('search') }}" tidak ditemukan. Coba kata kunci lain atau jelajahi semua destinasi.
                    @elseif(request('kategori'))
                        Kategori ini belum memiliki destinasi. Silakan pilih kategori lain atau lihat semua destinasi.
                    @else
                        Saat ini belum ada destinasi wisata yang terdaftar. Silakan hubungi admin untuk informasi lebih lanjut.
                    @endif
                </p>

                @if(request('search') || request('kategori'))
                <a href="{{ route('potensi-wisata.index') }}" class="btn-modern inline-flex">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Lihat Semua Destinasi
                </a>
                @endif
            </div>

            <!-- Decorative elements -->
            <div class="absolute -top-20 -left-20 w-40 h-40 bg-blue-200 rounded-full opacity-20 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-40 h-40 bg-purple-200 rounded-full opacity-20 blur-3xl"></div>
        </div>
    </section>
@endif

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({ duration: 900, once: true, offset: 100 });

        // Particles background
        if (document.getElementById('particles-wisata')) {
            particlesJS('particles-wisata', {
                particles: {
                    number:{ value:60, density:{ enable:true, value_area:800 } },
                    color:{ value:'#ffffff' },
                    shape:{ type:'circle' },
                    opacity:{ value:.4 },
                    size:{ value:3, random:true },
                    line_linked:{ enable:true, distance:150, color:'#ffffff', opacity:.3, width:1 },
                    move:{ enable:true, speed:1.6 }
                },
                interactivity:{ events:{ onhover:{ enable:true, mode:'repulse' } } },
                retina_detect:true
            });
        }

        // Enhanced card interactions
        const cards = document.querySelectorAll('.wisata-card');
        cards.forEach((card) => {
            const cardImage = card.querySelector('.card-image');

            // Add smooth hover effects
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-8px) scale(1.02)';

                // Add subtle zoom to background image
                if (cardImage) {
                    cardImage.style.transform = 'scale(1.05)';
                }
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';

                if (cardImage) {
                    cardImage.style.transform = 'scale(1)';
                }
            });

            // Add click ripple effect
            card.addEventListener('click', function(e) {
                if (e.target.tagName !== 'A' && e.target.tagName !== 'BUTTON') {
                    // Create ripple element
                    const ripple = document.createElement('div');
                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(59, 130, 246, 0.3);
                        width: 20px;
                        height: 20px;
                        animation: ripple 0.6s ease-out;
                        z-index: 999;
                        pointer-events: none;
                    `;

                    const rect = card.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                    ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';

                    card.style.position = 'relative';
                    card.appendChild(ripple);

                    setTimeout(() => ripple.remove(), 600);
                }
            });
        });

        // Lazy loading for gallery preview images
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        imageObserver.unobserve(img);
                    }
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });

        // Add CSS for ripple animation
        if (!document.getElementById('ripple-styles')) {
            const style = document.createElement('style');
            style.id = 'ripple-styles';
            style.textContent = `
                @keyframes ripple {
                    0% { transform: scale(0); opacity: 0.5; }
                    100% { transform: scale(1); opacity: 0; }
                }
                @keyframes float {
                    0%, 100% { transform: translateY(0px); }
                    50% { transform: translateY(-20px); }
                }
            `;
            document.head.appendChild(style);
        }
    });
</script>
@endpush
