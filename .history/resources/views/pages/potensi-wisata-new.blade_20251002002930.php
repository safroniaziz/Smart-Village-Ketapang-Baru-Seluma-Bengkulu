@extends('layouts.app-public')

@section('title', 'Pantai Ancol Seluma - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* Modern Gallery-Focused Design */
    
    .hero-section {
        background: linear-gradient(135deg, #0f4c75 0%, #3282b8 100%);
        min-height: 70vh;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="rgba(255,255,255,0.1)"/><stop offset="100%" stop-color="rgba(255,255,255,0)"/></radialGradient></defs><rect width="100" height="20" fill="url(%23a)"/></svg>') repeat;
        opacity: 0.1;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .photo-card {
        background: white;
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }

    .photo-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .photo-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .photo-card:hover .photo-image {
        transform: scale(1.05);
    }

    .photo-info {
        padding: 1.5rem;
    }

    .photo-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .photo-description {
        color: #6b7280;
        line-height: 1.6;
        font-size: 0.95rem;
    }

    /* Photo Modal */
    .modal {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 1000;
        background: rgba(0, 0, 0, 0.9);
        backdrop-filter: blur(10px);
        opacity: 0;
        transition: all 0.3s ease;
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
        border-radius: 1rem;
        overflow: hidden;
        transform: scale(0.8);
        transition: transform 0.3s ease;
    }

    .modal.show .modal-content {
        transform: scale(1);
    }

    .modal-image {
        width: 100%;
        max-height: 70vh;
        object-fit: cover;
        display: block;
    }

    .modal-info {
        padding: 2rem;
        background: white;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 1rem;
    }

    .modal-description {
        color: #6b7280;
        line-height: 1.7;
        font-size: 1rem;
    }

    .modal-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 1001;
        transition: all 0.3s ease;
    }

    .modal-close:hover {
        background: white;
        transform: scale(1.1);
    }

    .modal-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 1001;
    }

    .modal-nav:hover {
        background: white;
        transform: translateY(-50%) scale(1.1);
    }

    .modal-prev {
        left: 1rem;
    }

    .modal-next {
        right: 1rem;
    }

    /* Video Section */
    .video-section {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: 2rem;
        padding: 3rem;
        margin: 3rem 0;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .video-container {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 */
        height: 0;
        overflow: hidden;
        border-radius: 1rem;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Info Cards */
    .info-card {
        background: white;
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    .info-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .hero-section {
            min-height: 60vh;
            padding: 2rem 0;
        }
        
        .modal-content {
            max-width: 95vw;
        }
        
        .modal-info {
            padding: 1.5rem;
        }
        
        .video-section {
            padding: 2rem;
        }
    }

    /* Loading Animation */
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

    /* Statistics Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
    }

    .stat-card {
        text-align: center;
        background: white;
        padding: 2rem 1rem;
        border-radius: 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        display: block;
    }

    .stat-label {
        color: #6b7280;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.05em;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="relative z-10 w-full">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div data-aos="fade-up">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md text-white px-6 py-3 rounded-full mb-8 border border-white/30">
                    <i class="fas fa-map-marked-alt text-lg"></i>
                    <span class="font-semibold">Destinasi Unggulan</span>
                </div>

                @if($wisata)
                <!-- Main Title -->
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    {{ $wisata->nama }}
                </h1>

                <!-- Location -->
                <div class="flex items-center justify-center gap-2 text-xl text-blue-100 mb-8">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $wisata->lokasi }}</span>
                </div>

                <!-- Description -->
                <p class="text-xl md:text-2xl text-blue-100 mb-12 max-w-3xl mx-auto leading-relaxed">
                    {{ Str::limit(strip_tags($wisata->deskripsi), 200) }}
                </p>

                <!-- Stats -->
                <div class="stats-grid max-w-4xl mx-auto">
                    @if($galleryCount > 0)
                    <div class="stat-card">
                        <span class="stat-number">{{ $galleryCount }}</span>
                        <div class="stat-label">Foto Gallery</div>
                    </div>
                    @endif
                    
                    @if($wisata->video_youtube)
                    <div class="stat-card">
                        <span class="stat-number">1</span>
                        <div class="stat-label">Video Tour</div>
                    </div>
                    @endif
                    
                    <div class="stat-card">
                        <span class="stat-number">{{ number_format($wisata->views ?? 0) }}</span>
                        <div class="stat-label">Total Views</div>
                    </div>
                    
                    <div class="stat-card">
                        <span class="stat-number">4.9</span>
                        <div class="stat-label">Rating</div>
                    </div>
                </div>
                @else
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Potensi Wisata
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Destinasi wisata akan segera hadir
                </p>
                @endif
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <i class="fas fa-chevron-down text-2xl"></i>
    </div>
</section>

@if($wisata)
<!-- Gallery Section -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Galeri Foto
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Jelajahi keindahan {{ $wisata->nama }} melalui koleksi foto-foto menakjubkan
            </p>
        </div>

        @if($galleryPhotos && count($galleryPhotos) > 0)
        <div class="gallery-grid" data-aos="fade-up" data-aos-delay="200">
            @foreach($galleryPhotos as $index => $photo)
            <div class="photo-card" data-aos="zoom-in" data-aos-delay="{{ 100 * ($index % 6) }}" onclick="openModal({{ $index }})">
                <img src="{{ $photo['url'] }}" alt="{{ $photo['judul'] ?? 'Foto ' . ($index + 1) }}" class="photo-image" loading="lazy">
                <div class="photo-info">
                    <h3 class="photo-title">{{ $photo['judul'] ?? 'Foto ' . ($index + 1) }}</h3>
                    @if($photo['keterangan'])
                    <p class="photo-description">{{ $photo['keterangan'] }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16" data-aos="fade-up">
            <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-2xl font-semibold text-gray-600 mb-2">Belum ada foto</h3>
            <p class="text-gray-500">Galeri foto akan segera ditambahkan</p>
        </div>
        @endif
    </div>
</section>

<!-- Video Section -->
@if($wisata->video_youtube)
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="video-section" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Video Tour
            </h2>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                Saksikan keindahan {{ $wisata->nama }} dalam video tour yang menakjubkan
            </p>
            
            <div class="video-container">
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

<!-- Description Section -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-indigo-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Tentang {{ $wisata->nama }}
                </h2>
                <div class="prose prose-lg text-gray-600 leading-relaxed">
                    {!! $wisata->deskripsi !!}
                </div>
            </div>
            
            <div class="grid gap-6" data-aos="fade-left">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Lokasi</h3>
                    <p class="text-gray-600">{{ $wisata->lokasi }}</p>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Rating</h3>
                    <div class="flex items-center gap-2">
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <span class="text-gray-600">(4.9 dari 5)</span>
                    </div>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Total Views</h3>
                    <p class="text-gray-600">{{ number_format($wisata->views ?? 0) }} kali dilihat</p>
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
        easing: 'ease-in-out',
        once: true,
        mirror: false
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
        }, 300);
    }

    // Previous photo
    function prevPhoto() {
        if (!galleryData || galleryData.length <= 1) return;
        
        currentPhotoIndex = (currentPhotoIndex - 1 + galleryData.length) % galleryData.length;
        const photo = galleryData[currentPhotoIndex];
        
        document.getElementById('modalImage').src = photo.url;
        document.getElementById('modalImage').alt = photo.judul || 'Foto ' + (currentPhotoIndex + 1);
        document.getElementById('modalTitle').textContent = photo.judul || 'Foto ' + (currentPhotoIndex + 1);
        document.getElementById('modalDescription').textContent = photo.keterangan || '';
    }

    // Next photo
    function nextPhoto() {
        if (!galleryData || galleryData.length <= 1) return;
        
        currentPhotoIndex = (currentPhotoIndex + 1) % galleryData.length;
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

    // Update views counter (optional)
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