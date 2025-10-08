@extends('layouts.app-public')

@section('title', $wisata->nama . ' - Potensi Wisata Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
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
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
    }

    /* Gallery styles */
    .gallery-main {
        height: 400px;
        border-radius: 1.5rem;
        overflow: hidden;
        position: relative;
        cursor: pointer;
    }

    .gallery-thumbnail {
        height: 100px;
        border-radius: 0.75rem;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .gallery-thumbnail:hover,
    .gallery-thumbnail.active {
        border-color: #3b82f6;
        transform: scale(1.05);
    }

    .gallery-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.3s ease;
    }

    .gallery-thumbnail:hover img {
        transform: scale(1.1);
    }

    /* Modern badges */
    .feature-badge {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 1rem;
        font-size: 0.875rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }

    .category-badge {
        background: linear-gradient(135deg, #10b981, #34d399);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 1.5rem;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }

    /* Facility icons */
    .facility-item {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border: 1px solid #e2e8f0;
        border-radius: 0.75rem;
        padding: 1rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .facility-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border-color: #3b82f6;
    }

    /* Button styles */
    .btn-primary {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        padding: 1rem 2rem;
        border-radius: 1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
        border: none;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(59, 130, 246, 0.4);
        color: white;
        text-decoration: none;
    }

    .btn-outline {
        background: white;
        color: #374151;
        border: 2px solid #e5e7eb;
        padding: 1rem 2rem;
        border-radius: 1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-outline:hover {
        border-color: #3b82f6;
        background: #3b82f6;
        color: white;
        transform: translateY(-2px);
        text-decoration: none;
    }

    /* Stats styling */
    .stat-item {
        text-align: center;
        padding: 1.5rem;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: #3b82f6;
        margin-bottom: 0.5rem;
    }

    /* Related cards */
    .related-card {
        background: white;
        border-radius: 1rem;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
    }

    .related-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .related-card-image {
        height: 200px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    /* Video overlay */
    .video-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .video-overlay:hover {
        opacity: 1;
    }

    .video-play-button {
        width: 80px;
        height: 80px;
        background: rgba(239, 68, 68, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        transition: all 0.3s ease;
    }

    .video-play-button:hover {
        background: rgb(239, 68, 68);
        transform: scale(1.1);
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .hero-image {
            height: 50vh;
            min-height: 300px;
        }

        .gallery-main {
            height: 250px;
        }

        .gallery-thumbnail {
            height: 80px;
        }
    }
</style>
@endpush

<!-- Hero Section -->
<section class="hero-image" style="background-image: url('{{ $mainImage }}')">
    <div class="hero-overlay absolute inset-0 flex items-end">
        <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
            <div class="max-w-3xl" data-aos="fade-up">
                <!-- Category Badge -->
                <div class="mb-4">
                    <span class="category-badge">
                        <i class="fas fa-tag mr-2"></i>
                        {{ ucwords(str_replace('_', ' ', $wisata->kategori_wisata)) }}
                    </span>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    {{ $wisata->nama }}
                </h1>

                <!-- Location -->
                <div class="flex items-center gap-3 text-white mb-8 text-xl">
                    <i class="fas fa-map-marker-alt text-red-400"></i>
                    <span>{{ $wisata->lokasi }}</span>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @if($wisata->jam_operasional)
                    <div class="stat-item">
                        <i class="fas fa-clock text-blue-500 text-xl mb-2"></i>
                        <div class="text-sm text-gray-600">Jam Buka</div>
                        <div class="font-semibold text-gray-800">{{ $wisata->jam_operasional }}</div>
                    </div>
                    @endif

                    @if($wisata->tiket_masuk)
                    <div class="stat-item">
                        <i class="fas fa-ticket-alt text-green-500 text-xl mb-2"></i>
                        <div class="text-sm text-gray-600">Tiket</div>
                        <div class="font-semibold text-gray-800">{{ $wisata->tiket_masuk }}</div>
                    </div>
                    @endif

                    <div class="stat-item">
                        <i class="fas fa-eye text-purple-500 text-xl mb-2"></i>
                        <div class="text-sm text-gray-600">Views</div>
                        <div class="font-semibold text-gray-800">{{ number_format($wisata->jumlah_pengunjung ?? 0) }}</div>
                    </div>

                    <div class="stat-item">
                        <i class="fas fa-star text-yellow-500 text-xl mb-2"></i>
                        <div class="text-sm text-gray-600">Rating</div>
                        <div class="font-semibold text-gray-800">4.8/5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left Column - Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Gallery Section -->
                @if(is_array($wisata->gambar) && count($wisata->gambar) > 0)
                <div class="info-card p-8" data-aos="fade-up">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Galeri Foto</h2>

                    <!-- Main Gallery Image -->
                    <div class="gallery-main mb-4 relative">
                        <img id="main-gallery-image"
                             src="{{ $wisata->gambar[0] }}"
                             alt="{{ $wisata->nama }}"
                             class="w-full h-full object-cover">

                        @if($wisata->video_youtube)
                        <div class="video-overlay" onclick="openVideoModal()">
                            <div class="video-play-button">
                                <i class="fab fa-youtube"></i>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Thumbnail Gallery -->
                    <div class="grid grid-cols-4 md:grid-cols-6 gap-3">
                        @foreach($wisata->gambar as $index => $gambar)
                        <div class="gallery-thumbnail {{ $index === 0 ? 'active' : '' }}"
                             onclick="changeMainImage('{{ $gambar }}', this)">
                            <img src="{{ $gambar }}" alt="{{ $wisata->nama }} - {{ $index + 1 }}">
                        </div>
                        @endforeach

                        @if($wisata->video_youtube)
                        <div class="gallery-thumbnail relative" onclick="openVideoModal()">
                            <img src="{{ $wisata->gambar[0] ?? 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400' }}" alt="Video">
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                <i class="fab fa-youtube text-red-500 text-2xl"></i>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Description -->
                <div class="info-card p-8" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Deskripsi</h2>
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        {!! nl2br(e($wisata->deskripsi)) !!}
                    </div>
                </div>

                <!-- Facilities -->
                @if(is_array($wisata->fasilitas) && count($wisata->fasilitas) > 0)
                <div class="info-card p-8" data-aos="fade-up" data-aos-delay="400">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Fasilitas</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($wisata->fasilitas as $fasilitas)
                        <div class="facility-item">
                            @switch($fasilitas)
                                @case('toilet')
                                    <i class="fas fa-restroom text-blue-500 text-2xl mb-2"></i>
                                    @break
                                @case('parkir')
                                    <i class="fas fa-parking text-green-500 text-2xl mb-2"></i>
                                    @break
                                @case('warung')
                                    <i class="fas fa-utensils text-orange-500 text-2xl mb-2"></i>
                                    @break
                                @case('wifi')
                                    <i class="fas fa-wifi text-blue-500 text-2xl mb-2"></i>
                                    @break
                                @case('masjid')
                                    <i class="fas fa-mosque text-green-600 text-2xl mb-2"></i>
                                    @break
                                @default
                                    <i class="fas fa-check-circle text-gray-500 text-2xl mb-2"></i>
                            @endswitch
                            <div class="font-medium text-gray-700">{{ ucfirst($fasilitas) }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Video Section -->
                @if($wisata->video_youtube)
                <div class="info-card p-8" data-aos="fade-up" data-aos-delay="600">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Video Wisata</h2>
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
                @endif
            </div>

            <!-- Right Column - Sidebar -->
            <div class="space-y-8">
                <!-- Quick Info -->
                <div class="info-card p-6" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Informasi</h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-red-500 mt-1"></i>
                            <div>
                                <div class="font-semibold text-gray-700">Lokasi</div>
                                <div class="text-gray-600">{{ $wisata->lokasi }}</div>
                            </div>
                        </div>

                        @if($wisata->jam_operasional)
                        <div class="flex items-start gap-3">
                            <i class="fas fa-clock text-blue-500 mt-1"></i>
                            <div>
                                <div class="font-semibold text-gray-700">Jam Operasional</div>
                                <div class="text-gray-600">{{ $wisata->jam_operasional }}</div>
                            </div>
                        </div>
                        @endif

                        @if($wisata->tiket_masuk)
                        <div class="flex items-start gap-3">
                            <i class="fas fa-ticket-alt text-green-500 mt-1"></i>
                            <div>
                                <div class="font-semibold text-gray-700">Tiket Masuk</div>
                                <div class="text-gray-600">{{ $wisata->tiket_masuk }}</div>
                            </div>
                        </div>
                        @endif

                        @if($wisata->kontak_informasi)
                        <div class="flex items-start gap-3">
                            <i class="fas fa-phone text-purple-500 mt-1"></i>
                            <div>
                                <div class="font-semibold text-gray-700">Kontak</div>
                                <div class="text-gray-600">{{ $wisata->kontak_informasi }}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="info-card p-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="space-y-3">
                        <a href="{{ route('potensi-wisata.index') }}" class="btn-outline w-full justify-center">
                            <i class="fas fa-arrow-left"></i>
                            Kembali ke Daftar
                        </a>

                        @if($wisata->lokasi)
                        <a href="https://www.google.com/maps/search/{{ urlencode($wisata->lokasi) }}"
                           target="_blank"
                           class="btn-primary w-full justify-center">
                            <i class="fas fa-map-marker-alt"></i>
                            Lihat di Peta
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Share -->
                <div class="info-card p-6" data-aos="fade-up" data-aos-delay="500">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Bagikan</h3>
                    <div class="flex gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank"
                           class="flex-1 bg-blue-600 text-white p-3 rounded-lg text-center hover:bg-blue-700 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($wisata->nama) }}"
                           target="_blank"
                           class="flex-1 bg-sky-500 text-white p-3 rounded-lg text-center hover:bg-sky-600 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($wisata->nama . ' - ' . request()->url()) }}"
                           target="_blank"
                           class="flex-1 bg-green-500 text-white p-3 rounded-lg text-center hover:bg-green-600 transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Destinations -->
@if($relatedWisata->count() > 0)
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Destinasi Lainnya</h2>
            <p class="text-gray-600 text-lg">Jelajahi destinasi menarik lainnya di sekitar area ini</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="200">
            @foreach($relatedWisata as $related)
            <div class="related-card">
                @php
                    $relatedImage = is_array($related->gambar) && count($related->gambar) > 0
                                  ? $related->gambar[0]
                                  : ($related->thumbnail ?: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400');
                @endphp

                <div class="related-card-image" style="background-image: url('{{ $relatedImage }}')">
                    <div class="absolute top-4 left-4">
                        <span class="feature-badge">
                            {{ ucwords(str_replace('_', ' ', $related->kategori_wisata)) }}
                        </span>
                    </div>

                    @if($related->video_youtube)
                    <div class="absolute top-4 right-4 bg-red-600 text-white px-2 py-1 rounded-full text-xs font-semibold">
                        <i class="fab fa-youtube mr-1"></i>
                        Video
                    </div>
                    @endif
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $related->nama }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($related->deskripsi), 80) }}</p>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                            @endfor
                            <span class="text-gray-500 text-sm ml-2">4.8</span>
                        </div>
                        <a href="{{ route('potensi-wisata.show', $related->slug ?: $related->id) }}"
                           class="text-blue-600 font-semibold hover:text-blue-700 transition-colors text-sm">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Video Modal -->
@if($wisata->video_youtube)
<div id="video-modal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden items-center justify-center p-4" style="display: none;">
    <div class="bg-white rounded-2xl p-6 max-w-4xl w-full max-h-full overflow-auto">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-900">Video - {{ $wisata->nama }}</h3>
            <button onclick="closeVideoModal()" class="text-gray-500 hover:text-gray-700 text-2xl">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="aspect-video">
            @php
                $youtubeId = null;
                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $wisata->video_youtube, $matches)) {
                    $youtubeId = $matches[1];
                }
            @endphp
            @if($youtubeId)
            <iframe id="modal-video"
                    src="https://www.youtube.com/embed/{{ $youtubeId }}?autoplay=1"
                    class="w-full h-full rounded-lg"
                    frameborder="0"
                    allowfullscreen
                    title="{{ $wisata->nama }} - Video">
            </iframe>
            @endif
        </div>
    </div>
</div>
@endif

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({ duration: 800, once: true, offset: 100 });
    });

    // Gallery functions
    function changeMainImage(imageSrc, thumbnailElement) {
        document.getElementById('main-gallery-image').src = imageSrc;

        // Update active thumbnail
        document.querySelectorAll('.gallery-thumbnail').forEach(thumb => thumb.classList.remove('active'));
        thumbnailElement.classList.add('active');
    }

    // Video modal functions
    function openVideoModal() {
        const modal = document.getElementById('video-modal');
        modal.style.display = 'flex';
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeVideoModal() {
        const modal = document.getElementById('video-modal');
        modal.style.display = 'none';
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';

        // Stop video by reloading iframe
        const iframe = document.getElementById('modal-video');
        if (iframe) {
            const src = iframe.src;
            iframe.src = src.replace('?autoplay=1', '');
        }
    }

    // Close modal when clicking outside
    document.getElementById('video-modal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeVideoModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeVideoModal();
        }
    });
</script>
@endpush
