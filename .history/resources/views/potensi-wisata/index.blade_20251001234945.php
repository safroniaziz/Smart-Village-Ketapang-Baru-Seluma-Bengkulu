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

    /* Enhanced responsive design */
    .search-box {
        background: white;
        border: 2px solid #e5e7eb;
        border-radius: 1rem;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        width: 100%;
    }

    .search-box:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }
</style>
@endpush

@section('content')
<!-- Enhanced Hero Section -->
<section class="relative text-white overflow-hidden min-h-[calc(100vh-8rem)] md:min-h-[calc(100vh-10rem)] flex items-center hero-gradient pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Floating Decorations -->
    <div class="floating-decoration absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-200/20 to-indigo-300/20" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400"></div>
    <div class="floating-decoration absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-purple-200/20 to-pink-300/20" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="600"></div>

    <!-- Particle.js Container -->
    <div id="particles-wisata" class="absolute inset-0"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8" data-aos="fade-right" data-aos-delay="100">
                    <!-- Professional Badge -->
                    <div class="inline-flex items-center gap-3 mb-5">
                        <div class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center">
                            <i class="fas fa-map-marked-alt text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-blue-100 text-sm font-medium">Destinasi Wisata</p>
                            <h2 class="text-lg font-semibold text-blue-100">Desa Ketapang Baru</h2>
                        </div>
                    </div>

                    <!-- Enhanced Title -->
                    <div class="space-y-4">
                        <h1 class="text-4xl lg:text-6xl font-black leading-tight">
                            <span class="block">Jelajahi</span>
                            <span class="block bg-gradient-to-r from-blue-200 via-white to-blue-100 bg-clip-text text-transparent">
                                Potensi Wisata
                            </span>
                        </h1>
                        <div class="w-20 h-1 bg-gradient-to-r from-white to-blue-200 rounded-full"></div>
                    </div>

                    <!-- Enhanced Description -->
                    <p class="text-blue-100 text-xl lg:text-2xl leading-relaxed max-w-2xl">
                        <span class="font-semibold text-white">Temukan keindahan wisata</span> desa dengan berbagai destinasi menarik yang menunggu untuk dijelajahi.
                    </p>
                </div>

                <!-- Enhanced Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center">
                        <div class="text-2xl font-black text-white mb-1">{{ $wisata->total() ?? 0 }}</div>
                        <div class="text-blue-100 text-sm">Total Wisata</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center">
                        <div class="text-2xl font-black text-white mb-1">{{ $categories->count() ?? 0 }}</div>
                        <div class="text-blue-100 text-sm">Kategori</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center">
                        <div class="text-2xl font-black text-white mb-1">{{ $featured->count() ?? 0 }}</div>
                        <div class="text-blue-100 text-sm">Rekomendasi</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4 text-center">
                        <div class="text-2xl font-black text-white mb-1">4.8</div>
                        <div class="text-blue-100 text-sm">Rating</div>
                    </div>
                </div>

                <!-- Enhanced Search Box -->
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="800">
                    <form method="GET" action="{{ route('potensi-wisata.index') }}" class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Cari destinasi wisata..."
                                   class="search-box">
                        </div>
                        <div class="flex-shrink-0">
                            <select name="kategori" class="search-box">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>
                                    {{ ucwords(str_replace('_', ' ', $category)) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn-modern">
                            <i class="fas fa-search"></i>
                            Cari
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Side - Featured Card -->
            @if($featured->count() > 0)
            <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                <div class="wisata-card group">
                    @php
                        $firstFeatured = $featured->first();
                        $featuredImage = is_array($firstFeatured->gambar) && count($firstFeatured->gambar) > 0
                                        ? $firstFeatured->gambar[0]
                                        : ($firstFeatured->thumbnail ?: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800');
                    @endphp
                    <div class="card-image" style="background-image: url('{{ $featuredImage }}');">
                        <div class="category-badge">
                            {{ ucwords(str_replace('_', ' ', $firstFeatured->kategori_wisata)) }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $firstFeatured->nama }}</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            {{ Str::limit(strip_tags($firstFeatured->deskripsi), 120) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 text-gray-500">
                                <i class="fas fa-map-marker-alt text-sm"></i>
                                <span class="text-sm">{{ Str::limit($firstFeatured->lokasi, 30) }}</span>
                            </div>
                            <a href="{{ route('potensi-wisata.show', $firstFeatured->slug ?: $firstFeatured->id) }}" class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

@if($wisata->count() > 0)
<!-- Filter Section -->
<section class="section-spacing bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="section-badge">
                    <i class="fas fa-filter mr-2"></i>
                    Kategori Wisata
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('potensi-wisata.index') }}"
                   class="filter-btn {{ !request('kategori') ? 'active' : '' }}">
                    Semua Wisata
                </a>
                @foreach($categories as $category)
                <a href="{{ route('potensi-wisata.index', ['kategori' => $category]) }}"
                   class="filter-btn {{ request('kategori') == $category ? 'active' : '' }}">
                    {{ ucwords(str_replace('_', ' ', $category)) }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Wisata Grid Section -->
<section class="section-spacing bg-white">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-full blur-lg opacity-20"></div>
                <div class="section-badge" style="background: linear-gradient(135deg, #10b981, #059669);">
                    <i class="fas fa-map-marked-alt mr-2"></i>
                    Destinasi Wisata
                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-4xl lg:text-5xl font-black mb-4">
                    <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">
                        @if(request('kategori'))
                            Wisata {{ ucwords(str_replace('_', ' ', request('kategori'))) }}
                        @elseif(request('search'))
                            Hasil Pencarian "{{ request('search') }}"
                        @else
                            Semua Destinasi
                        @endif
                    </span>
                </h2>
                <div class="w-16 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full mx-auto"></div>
            </div>

            <div class="max-w-3xl mx-auto">
                <p class="text-xl text-gray-700 leading-relaxed">
                    Temukan {{ $wisata->total() }} destinasi wisata menarik yang siap memukau Anda dengan keindahan alam dan budaya lokal.
                </p>
            </div>
        </div>

        <!-- Wisata Grid -->
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
                <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    @if(request('search'))
                        Pencarian "{{ request('search') }}" tidak menemukan hasil. Coba dengan kata kunci yang berbeda.
                    @elseif(request('kategori'))
                        Destinasi wisata kategori {{ request('kategori') }} belum tersedia. Coba kategori lain atau kembali nanti.
                    @else
                        Destinasi wisata desa sedang dalam tahap pengembangan. Silakan kembali lagi nanti.
                    @endif
                </p>

                <!-- Back Button -->
                <div class="pt-6">
                    @if(request('search') || request('kategori'))
                    <a href="{{ route('potensi-wisata.index') }}" class="btn-modern">
                        <i class="fas fa-arrow-left"></i>
                        Lihat Semua Wisata
                    </a>
                    @else
                    <a href="{{ route('home') }}" class="btn-modern">
                        <i class="fas fa-home"></i>
                        Kembali ke Beranda
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.js"></script>
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
            `;
            document.head.appendChild(style);
        }
    });
    </script>
@endpush
