@extends('layouts.app-public')

@section('title', $wisata->nama . ' - Potensi Wisata Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="stylesheet" href="https://unpkg.com/swi                @if($wisata->video_youtube)
                <div class="info-card p-8" data-aos="fade-up" data-aos-delay="600">
                                        <a href="{{ route('potensi-wisata.show', $related->slug ?: $related->id) }}"
                                   class="text-blue-600 font-semibold hover:text-blue-700 transition-colors text-sm">          <h2 class="text-2xl font-bold text-gray-900 mb-6">Video Wisata</h2>
                    <div class="aspect-video rounded-lg overflow-hidden">
                        @php
                            $youtubeId = null;
                            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $wisata->video_youtube, $matches)) {
                                $youtubeId = $matches[1];
                            }
                        @endphp
                        @if($youtubeId)
                        <iframe
                            src="https://www.youtube.com/embed/{{ $youtubeId }}"
                            class="w-full h-full"
                            frameborder="0"
                            allowfullscreen
                            title="{{ $wisata->nama }} - Video">
                        </iframe>
                        @endif
                    </div>
                </div>
                @endifbundle.min.css" />
<style>
    /* Professional CSS for Wisata Detail Page */

    .hero-image {
        height: 70vh;
        min-height: 500px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
    }

    .hero-overlay {
        background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
    }

    .info-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(255, 255, 255, 0.9));
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: 1.25rem;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
    }

    /* Enhanced Gallery Styles */
    .gallery-swiper {
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .gallery-swiper .swiper-slide img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        cursor: zoom-in;
        transition: transform 0.3s ease;
    }

    .gallery-swiper .swiper-slide img:hover {
        transform: scale(1.05);
    }

    .gallery-main {
        height: 500px;
        border-radius: 1.5rem;
        overflow: hidden;
        position: relative;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .gallery-thumbnails {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
        gap: 0.75rem;
        margin-top: 1rem;
    }

    .gallery-thumb {
        height: 80px;
        border-radius: 0.75rem;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 3px solid transparent;
    }

    .gallery-thumb:hover,
    .gallery-thumb.active {
        border-color: #3b82f6;
        transform: scale(1.05);
    }

    .gallery-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .video-container {
        position: relative;
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        background: #000;
    }

    .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(59, 130, 246, 0.8), rgba(139, 92, 246, 0.8));
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .video-overlay:hover {
        background: linear-gradient(45deg, rgba(59, 130, 246, 0.9), rgba(139, 92, 246, 0.9));
    }

    .play-button {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #3b82f6;
        transition: all 0.3s ease;
    }

    .play-button:hover {
        transform: scale(1.1);
        background: white;
    }

    .floating-decoration {
        position: absolute;
        border-radius: 50%;
        filter: blur(60px);
        opacity: 0.3;
        pointer-events: none;
        z-index: -1;
    }

    .section-spacing {
        padding: 5rem 0;
    }

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

    .breadcrumb {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 1rem;
        padding: 1rem 1.5rem;
        backdrop-filter: blur(10px);
    }

    .breadcrumb a {
        color: #3b82f6;
        text-decoration: none;
        font-weight: 500;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .category-badge {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 1rem;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .facility-item {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
        transition: all 0.3s ease;
    }

    .facility-item:hover {
        background: #f3f4f6;
        border-color: #d1d5db;
    }

    .related-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .related-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    .related-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
</style>
@endpush

@section('content')
<!-- Hero Section with Image -->
<section class="hero-image" style="background-image: url('{{ $mainImage }}');">
    <div class="hero-overlay absolute inset-0 flex items-end">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
            <!-- Breadcrumb -->
            <div class="breadcrumb mb-8" data-aos="fade-up">
                <nav class="text-sm">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span class="mx-2 text-gray-400">/</span>
                    <a href="{{ route('potensi-wisata.index') }}">Potensi Wisata</a>
                    <span class="mx-2 text-gray-400">/</span>
                    <span class="text-gray-600">{{ $wisata->nama }}</span>
                </nav>
            </div>

            <!-- Hero Content -->
            <div class="text-white" data-aos="fade-up" data-aos-delay="200">
                <div class="mb-4">
                    <span class="category-badge">
                        {{ ucwords(str_replace('_', ' ', $wisata->kategori_wisata)) }}
                    </span>
                </div>
                <h1 class="text-4xl lg:text-6xl font-black mb-4">{{ $wisata->nama }}</h1>
                <div class="flex items-center gap-4 text-lg">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-red-400"></i>
                        <span>{{ $wisata->lokasi }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-eye text-blue-400"></i>
                        <span>{{ number_format($wisata->jumlah_pengunjung ?? 0) }} views</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="section-spacing bg-white">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Gallery Section - Full Width -->
        @if(is_array($wisata->gambar) && count($wisata->gambar) > 0)
        <div class="mb-16" data-aos="fade-up">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-gray-900 mb-4">📸 Galeri Foto</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Jelajahi keindahan {{ $wisata->nama }} melalui koleksi foto-foto menakjubkan</p>
            </div>
            
            <!-- Main Gallery Image -->
            <div class="gallery-main mb-6" id="mainGallery">
                <img src="{{ $wisata->gambar[0] }}" alt="{{ $wisata->nama }}" class="w-full h-full object-cover" id="mainImage">
                <div class="absolute top-4 right-4 bg-black/70 text-white px-3 py-1 rounded-full text-sm backdrop-blur-sm">
                    <span id="imageCounter">1</span> / {{ count($wisata->gambar) }}
                </div>
            </div>
            
            <!-- Thumbnail Gallery -->
            <div class="gallery-thumbnails">
                @foreach($wisata->gambar as $index => $image)
                <div class="gallery-thumb {{ $index == 0 ? 'active' : '' }}" onclick="changeImage('{{ $image }}', {{ $index + 1 }})">
                    <img src="{{ $image }}" alt="{{ $wisata->nama }} - {{ $index + 1 }}">
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- YouTube Video Section - Full Width -->
        @if($wisata->video_youtube)
        <div class="mb-16" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-gray-900 mb-4">🎬 Video Wisata</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Saksikan pengalaman virtual di {{ $wisata->nama }}</p>
            </div>
            
            <div class="max-w-5xl mx-auto">
                <div class="video-container aspect-video" id="videoContainer">
                    @php
                        $youtubeId = null;
                        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $wisata->video_youtube, $matches)) {
                            $youtubeId = $matches[1];
                        }
                    @endphp
                    @if($youtubeId)
                    <div class="video-overlay" id="videoOverlay" onclick="playVideo()">
                        <div class="play-button">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <iframe 
                        id="youtubeVideo"
                        src="https://www.youtube.com/embed/{{ $youtubeId }}?enablejsapi=1&rel=0&showinfo=0&modestbranding=1" 
                        class="w-full h-full" 
                        frameborder="0" 
                        allowfullscreen
                        allow="autoplay"
                        title="{{ $wisata->nama }} - Video"
                        style="display: none;">
                    </iframe>
                    @endif
                </div>
            </div>
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Description -->
                <div class="info-card p-8" data-aos="fade-up">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Tentang {{ $wisata->nama }}</h2>
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        {!! $wisata->deskripsi !!}
                    </div>
                </div>

                <!-- Facilities -->
                @if(is_array($wisata->fasilitas) && count($wisata->fasilitas) > 0)
                <div class="info-card p-8" data-aos="fade-up" data-aos-delay="400">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Fasilitas Tersedia</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                        @foreach($wisata->fasilitas as $fasilitas)
                        <div class="facility-item text-center">
                            @switch($fasilitas)
                                @case('toilet')
                                    <i class="fas fa-restroom text-blue-500 mb-2 text-xl"></i>
                                    @break
                                @case('parkir')
                                    <i class="fas fa-parking text-green-500 mb-2 text-xl"></i>
                                    @break
                                @case('warung')
                                    <i class="fas fa-utensils text-orange-500 mb-2 text-xl"></i>
                                    @break
                                @case('gazebo')
                                    <i class="fas fa-umbrella text-purple-500 mb-2 text-xl"></i>
                                    @break
                                @case('wifi')
                                    <i class="fas fa-wifi text-blue-500 mb-2 text-xl"></i>
                                    @break
                                @case('musholla')
                                    <i class="fas fa-mosque text-green-600 mb-2 text-xl"></i>
                                    @break
                                @case('guide')
                                    <i class="fas fa-user-tie text-indigo-500 mb-2 text-xl"></i>
                                    @break
                                @default
                                    <i class="fas fa-check-circle text-gray-500 mb-2 text-xl"></i>
                            @endswitch
                            <div class="block">{{ ucfirst($fasilitas) }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- YouTube Video -->
                @if($wisata->video_youtube)
                <div class="info-card p-8" data-aos="fade-up" data-aos-delay="600">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Video Wisata</h2>
                    <div class="aspect-video rounded-lg overflow-hidden">
                        <iframe
                            src="https://www.youtube.com/embed/{{ $wisata->youtube_id }}"
                            class="w-full h-full"
                            frameborder="0"
                            allowfullscreen
                            title="{{ $wisata->nama }} - Video">
                        </iframe>
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Quick Info -->
                <div class="info-card p-6" data-aos="fade-left">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Informasi Wisata</h3>
                    <div class="space-y-4">
                        @if($wisata->jam_operasional)
                        <div class="flex items-start gap-3">
                            <i class="fas fa-clock text-blue-500 mt-1"></i>
                            <div>
                                <div class="font-semibold text-gray-900">Jam Operasional</div>
                                <div class="text-gray-600">{{ $wisata->jam_operasional }}</div>
                            </div>
                        </div>
                        @endif

                        @if($wisata->tiket_masuk)
                        <div class="flex items-start gap-3">
                            <i class="fas fa-ticket-alt text-green-500 mt-1"></i>
                            <div>
                                <div class="font-semibold text-gray-900">Tiket Masuk</div>
                                <div class="text-gray-600">{{ $wisata->tiket_masuk }}</div>
                            </div>
                        </div>
                        @endif

                        @if($wisata->kontak)
                        <div class="flex items-start gap-3">
                            <i class="fas fa-phone text-purple-500 mt-1"></i>
                            <div>
                                <div class="font-semibold text-gray-900">Kontak</div>
                                <div class="text-gray-600">{{ $wisata->kontak }}</div>
                            </div>
                        </div>
                        @endif

                        @if($wisata->latitude && $wisata->longitude)
                        <div class="flex items-start gap-3">
                            <i class="fas fa-map-marked-alt text-red-500 mt-1"></i>
                            <div>
                                <div class="font-semibold text-gray-900">Koordinat</div>
                                <div class="text-gray-600 text-sm">{{ $wisata->latitude }}, {{ $wisata->longitude }}</div>
                            </div>
                        </div>
                        @endif

                        <div class="flex items-start gap-3">
                            <i class="fas fa-calendar text-indigo-500 mt-1"></i>
                            <div>
                                <div class="font-semibold text-gray-900">Terakhir Update</div>
                                <div class="text-gray-600 text-sm">{{ $wisata->updated_at->format('d M Y') }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 space-y-3">
                        @if($wisata->latitude && $wisata->longitude)
                        <a href="https://www.google.com/maps?q={{ $wisata->latitude }},{{ $wisata->longitude }}"
                           target="_blank"
                           class="btn-modern w-full justify-center"
                           rel="noopener">
                            <i class="fas fa-map-marked-alt"></i>
                            Buka di Maps
                        </a>
                        @endif

                        @if($wisata->kontak)
                        <a href="tel:{{ $wisata->kontak }}"
                           class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors w-full flex items-center justify-center gap-2">
                            <i class="fas fa-phone"></i>
                            Hubungi
                        </a>
                        @endif

                        <button onclick="shareWisata()"
                                class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors w-full flex items-center justify-center gap-2">
                            <i class="fas fa-share-alt"></i>
                            Bagikan
                        </button>
                    </div>
                </div>

                <!-- Related Wisata -->
                @if($relatedWisata->count() > 0)
                <div class="info-card p-6" data-aos="fade-left" data-aos-delay="200">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Wisata Lainnya</h3>
                    <div class="space-y-4">
                        @foreach($relatedWisata as $related)
                        @php
                            $relatedImage = is_array($related->gambar) && count($related->gambar) > 0
                                          ? $related->gambar[0]
                                          : ($related->thumbnail ?: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400');
                        @endphp
                        <div class="related-card">
                            <img src="{{ $relatedImage }}" alt="{{ $related->nama }}">
                            <div class="p-4">
                                <h4 class="font-bold text-gray-900 mb-2">{{ $related->nama }}</h4>
                                <p class="text-gray-600 text-sm mb-3">{{ Str::limit(strip_tags($related->deskripsi), 80) }}</p>
                                <a href="{{ route('potensi-wisata.show', $related->slug) }}"
                                   class="text-blue-600 font-semibold hover:text-blue-700 transition-colors text-sm">
                                    Lihat Detail →
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://unpkg.com/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({ duration: 900, once: true, offset: 100 });

    // Initialize Swiper for gallery
    @if(is_array($wisata->gambar) && count($wisata->gambar) > 1)
    const swiper = new Swiper('.gallery-swiper', {
        loop: true,
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    @endif
});

// Share functionality
function shareWisata() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $wisata->nama }} - Potensi Wisata Ketapang Baru',
            text: '{{ Str::limit(strip_tags($wisata->deskripsi), 100) }}',
            url: window.location.href
        });
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('Link berhasil disalin ke clipboard!');
        });
    }
}
</script>
@endpush
