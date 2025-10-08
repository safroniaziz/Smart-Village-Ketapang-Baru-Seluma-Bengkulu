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
        height: 250px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 1.5rem 1.5rem 0 0;
        position: relative;
        overflow: hidden;
    }

    .wisata-card .card-image::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.3));
        z-index: 1;
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
                            <a href="{{ route('potensi-wisata.show', $firstFeatured->slug) }}" class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">
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
                    $image = is_array($item->gambar) && count($item->gambar) > 0
                            ? $item->gambar[0]
                            : ($item->thumbnail ?: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800');
                @endphp
                <div class="card-image" style="background-image: url('{{ $image }}');">
                    <div class="category-badge">
                        {{ ucwords(str_replace('_', ' ', $item->kategori_wisata)) }}
                    </div>
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

                    <!-- Action -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                            @endfor
                            <span class="text-sm text-gray-500 ml-2">4.8</span>
                        </div>
                        <a href="{{ route('potensi-wisata.show', $item->slug) }}" class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                            Lihat Detail →
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
    });
    </script>
@endpush
