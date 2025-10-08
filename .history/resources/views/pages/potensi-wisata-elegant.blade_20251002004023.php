@extends('layouts.app-public')

@section('title', 'Pantai Ancol Seluma - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* Clean & Professional Modern Design */
    
    .hero-section {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #06b6d4 100%);
        min-height: 80vh;
        position: relative;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 30% 20%, rgba(255,255,255,0.1) 0%, transparent 50%),
                    radial-gradient(circle at 70% 80%, rgba(255,255,255,0.05) 0%, transparent 50%);
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
        display: inline-block;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        padding: 0.75rem 1.5rem;
        color: white;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }

    .hero-badge:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }

    .hero-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        color: white;
        margin-bottom: 1.5rem;
        line-height: 1.1;
        letter-spacing: -0.02em;
    }

    .hero-subtitle {
        font-size: clamp(1.1rem, 2vw, 1.4rem);
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 3rem;
        font-weight: 400;
        line-height: 1.6;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .stat-item {
        text-align: center;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 16px;
        padding: 1.5rem 1rem;
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-4px);
    }

    .stat-number {
        display: block;
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
    }

    /* Gallery Section */
    .gallery-section {
        padding: 6rem 0;
        background: linear-gradient(to bottom, #f8fafc, #e2e8f0);
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-title {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
        letter-spacing: -0.02em;
    }

    .section-subtitle {
        font-size: 1.2rem;
        color: #64748b;
        max-width: 500px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .photo-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        cursor: pointer;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .photo-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .photo-image {
        width: 100%;
        height: 280px;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .photo-card:hover .photo-image {
        transform: scale(1.08);
    }

    .photo-info {
        padding: 2rem;
    }

    .photo-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }

    .photo-description {
        color: #64748b;
        line-height: 1.6;
        font-size: 1rem;
    }

    /* Video Section */
    .video-section {
        padding: 6rem 0;
        background: white;
    }

    .video-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .video-wrapper {
        position: relative;
        background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
        border-radius: 24px;
        padding: 3rem;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .video-frame {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        border-radius: 16px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        margin-top: 2rem;
    }

    .video-frame iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Description Section */
    .description-section {
        padding: 6rem 0;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }

    .description-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .description-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    .description-content h2 {
        font-size: clamp(2rem, 3vw, 2.5rem);
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2rem;
        letter-spacing: -0.02em;
    }

    .description-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #475569;
    }

    .info-cards {
        display: grid;
        gap: 1.5rem;
    }

    .info-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .info-icon {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .info-card h3 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }

    .info-card p {
        color: #64748b;
        line-height: 1.6;
    }

    /* Photo Modal */
    .modal {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 1000;
        background: rgba(0, 0, 0, 0.9);
        backdrop-filter: blur(8px);
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
        border-radius: 20px;
        overflow: hidden;
        transform: scale(0.9);
        transition: transform 0.3s ease;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
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
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 1rem;
    }

    .modal-description {
        color: #64748b;
        line-height: 1.7;
        font-size: 1rem;
    }

    .modal-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: rgba(255, 255, 255, 0.95);
        border: none;
        border-radius: 50%;
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 1001;
        transition: all 0.2s ease;
        font-size: 1.2rem;
        color: #374151;
    }

    .modal-close:hover {
        background: white;
        transform: scale(1.1);
    }

    .modal-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.95);
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        z-index: 1001;
        font-size: 1.2rem;
        color: #374151;
    }

    .modal-nav:hover {
        background: white;
        transform: translateY(-50%) scale(1.1);
    }

    .modal-prev { left: 1rem; }
    .modal-next { right: 1rem; }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-section {
            min-height: 70vh;
        }
        
        .stats-container {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        
        .gallery-grid {
            grid-template-columns: 1fr;
            padding: 0 1rem;
        }
        
        .description-grid {
            grid-template-columns: 1fr;
            gap: 3rem;
        }
        
        .video-wrapper {
            padding: 2rem;
        }
        
        .modal-content {
            max-width: 95vw;
        }
        
        .modal-info {
            padding: 1.5rem;
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
        <div data-aos="fade-up">
            <!-- Badge -->
            <span class="hero-badge">
                <i class="fas fa-map-marker-alt mr-2"></i>
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
                    {{ Str::limit(strip_tags($wisata->deskripsi), 150) }}
                </p>

                <!-- Stats -->
                <div class="stats-container">
                    @if($galleryCount > 0)
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                        <span class="stat-number">{{ $galleryCount }}</span>
                        <span class="stat-label">Foto Gallery</span>
                    </div>
                    @endif
                    
                    @if($wisata->video_youtube)
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                        <span class="stat-number">1</span>
                        <span class="stat-label">Video Tour</span>
                    </div>
                    @endif
                    
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                        <span class="stat-number">{{ number_format($wisata->views ?? 0) }}</span>
                        <span class="stat-label">Total Views</span>
                    </div>
                    
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
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
<!-- Gallery Section -->
<section class="gallery-section">
    <div class="section-header" data-aos="fade-up">
        <h2 class="section-title">Galeri Foto</h2>
        <p class="section-subtitle">
            Jelajahi keindahan {{ $wisata->nama }} melalui koleksi foto-foto menakjubkan
        </p>
    </div>

    @if($galleryPhotos && count($galleryPhotos) > 0)
    <div class="gallery-grid">
        @foreach($galleryPhotos as $index => $photo)
        <div class="photo-card" 
             data-aos="fade-up" 
             data-aos-delay="{{ 100 + ($index * 100) }}" 
             onclick="openModal({{ $index }})">
            <img src="{{ $photo['url'] }}" 
                 alt="{{ $photo['judul'] ?? 'Foto ' . ($index + 1) }}" 
                 class="photo-image" 
                 loading="lazy">
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
</section>

<!-- Video Section -->
@if($wisata->video_youtube)
<section class="video-section">
    <div class="video-container">
        <div class="video-wrapper" data-aos="fade-up">
            <h2 class="section-title">Video Tour</h2>
            <p class="section-subtitle">
                Saksikan keindahan {{ $wisata->nama }} dalam video tour yang menakjubkan
            </p>
            
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
                    <h3>Rating</h3>
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
        duration: 600,
        easing: 'ease-out',
        once: true,
        offset: 50
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