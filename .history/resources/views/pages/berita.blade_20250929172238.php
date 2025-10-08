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

    /* News Cards - Simple like statistik */
    .news-card {
        transition: all 0.3s ease;
        background: white;
        overflow: hidden;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .news-card .relative {
        position: relative;
        z-index: 2;
    }

    /* Simple image effects */
    .news-card img {
        transition: transform 0.3s ease;
    }

    .news-card:hover img {
        transform: scale(1.05);
    }

    /* Simple buttons */
    .spectacular-btn {
        background: linear-gradient(45deg, #667eea, #764ba2);
        border: none;
        transition: all 0.3s ease;
    }

    .spectacular-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
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
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section relative text-white overflow-hidden min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)] flex items-center pt-8 py-8 lg:py-12 pb-0" data-aos="fade-in">
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

                    <!-- Right Side - News Statistics Dashboard -->
                    <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                        <div class="group bg-white/10 backdrop-blur-sm rounded-3xl p-6 shadow-xl border border-white/20 hover:bg-white/20 hover:shadow-2xl transition-all duration-500">
                            <!-- Header -->
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-12 h-12 bg-white/20 rounded-2xl mb-3">
                                    <i class="fas fa-newspaper text-white text-xl"></i>
                                </div>
                                <h3 class="text-lg font-bold text-white mb-1">Portal Berita</h3>
                                <p class="text-sm text-blue-100">Statistik Terkini</p>
                            </div>

                            <!-- Statistics Grid -->
                            <div class="space-y-3 mb-6">
                                <!-- Row 1: 2 columns -->
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                        <div class="flex items-center justify-center text-sm">
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-blue-500/30 transition-all duration-300">
                                                <i class="fas fa-newspaper text-white text-sm"></i>
                                            </div>
                                            <div class="text-center">
                                                <p class="font-bold text-gray-800 text-lg">{{ $beritas->total() }}</p>
                                                <p class="text-gray-600 text-sm">Total Berita</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                        <div class="flex items-center justify-center text-sm">
                                            <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-orange-500/30 transition-all duration-300">
                                                <i class="fas fa-star text-white text-sm"></i>
                                            </div>
                                            <div class="text-center">
                                                <p class="font-bold text-gray-800 text-lg">{{ \App\Models\Berita::where('featured', true)->count() }}</p>
                                                <p class="text-gray-600 text-sm">Berita Utama</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Row 2: 1 column full width -->
                                <div class="grid grid-cols-1 gap-3">
                                    <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-green-500/30 transition-all duration-300">
                                                    <i class="fas fa-calendar text-white text-sm"></i>
                                                </div>
                                                <div>
                                                    <p class="font-bold text-gray-800 text-lg">{{ date('Y') }}</p>
                                                    <p class="text-gray-600 text-sm">Tahun Aktif</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-purple-500/30 transition-all duration-300">
                                                    <i class="fas fa-eye text-white text-sm"></i>
                                                </div>
                                                <div>
                                                    <p class="font-bold text-gray-800 text-lg">{{ number_format(\App\Models\Berita::sum('views')) }}</p>
                                                    <p class="text-gray-600 text-sm">Total Views</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Featured News Preview -->
                            @if($featuredBerita)
                            <div class="relative z-10 bg-gradient-to-br from-gray-900 via-blue-900 to-indigo-900 rounded-2xl p-4 shadow-xl group-hover:shadow-2xl group-hover:from-gray-800 group-hover:via-blue-800 group-hover:to-indigo-800 transition-all duration-500">
                                <div class="text-center mb-3">
                                    <div class="inline-flex items-center justify-center space-x-2 text-white/90 text-xs font-semibold mb-2">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span>Berita Utama</span>
                                    </div>
                                </div>

                                <div class="flex flex-col items-center space-y-3">
                                    <div class="relative group-hover:scale-105 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/30 to-orange-500/30 rounded-2xl blur-lg group-hover:from-yellow-400/50 group-hover:to-orange-500/50 transition-all duration-500"></div>
                                        <div class="relative bg-white p-4 rounded-2xl shadow-2xl border-2 border-white/20 group-hover:shadow-3xl group-hover:border-white/40 transition-all duration-500">
                                            <div class="text-center">
                                                <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                                                    <i class="fas fa-newspaper text-white text-lg"></i>
                                                </div>
                                                <h4 class="font-bold text-gray-800 text-sm mb-1 line-clamp-2">{{ Str::limit($featuredBerita->judul, 40) }}</h4>
                                                <p class="text-xs text-gray-600">{{ $featuredBerita->formatted_date }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <div class="flex items-center justify-center space-x-2 mb-1">
                                            <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse group-hover:bg-yellow-300 transition-colors duration-300"></div>
                                            <p class="text-sm text-white font-bold group-hover:text-yellow-100 transition-colors duration-300">Klik untuk Baca</p>
                                            <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse group-hover:bg-yellow-300 transition-colors duration-300" style="animation-delay: 0.5s;"></div>
                                        </div>
                                        <p class="text-xs text-gray-300">{{ $featuredBerita->views }} views</p>
                                    </div>
                                </div>

                                <div class="flex justify-center mt-3">
                                    <a href="{{ route('berita.show', $featuredBerita->slug) }}" class="inline-flex items-center bg-gradient-to-r from-yellow-500/20 to-orange-500/20 backdrop-blur-sm border border-yellow-400/30 rounded-full px-3 py-1 group-hover:from-yellow-500/30 group-hover:to-orange-500/30 group-hover:border-yellow-300/50 transition-all duration-300">
                                        <i class="fas fa-arrow-right text-yellow-400 text-xs mr-2 group-hover:text-yellow-300 transition-colors duration-300"></i>
                                        <span class="text-xs text-yellow-100 font-medium group-hover:text-white transition-colors duration-300">Baca Berita</span>
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
        </div>
    </div>
</section>

<!-- Featured News Section -->
@if($featuredBerita)
<section class="pt-0 pb-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
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
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-newspaper mr-2"></i>
                    Semua Berita
                </div>
            </div>
            <h2 class="text-4xl lg:text-5xl font-black mb-6">
                <span class="bg-gradient-to-r from-gray-900 via-slate-800 to-blue-800 bg-clip-text text-transparent">
                    Berita Terkini
                </span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed mb-8">
                Ikuti perkembangan terbaru dan informasi penting dari Desa Ketapang Baru
            </p>

            <!-- Filter Controls -->
            <div class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                <form method="GET" action="{{ route('berita') }}" class="flex gap-3">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="featured" class="px-4 py-2 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" onchange="this.form.submit()">
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
                                <a href="{{ route('berita.show', $berita->slug) }}" class="spectacular-btn text-white px-4 py-2 rounded-lg text-sm font-semibold">
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
                <a href="{{ route('home') }}" class="spectacular-btn text-white font-semibold px-8 py-4 rounded-xl">
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
    // Initialize particles for berita page (sama dengan statistik)
    if (document.getElementById('particles-berita')) {
        particlesJS('particles-berita', {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    }
                },
                "opacity": {
                    "value": 0.3,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.2,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 3,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    }

    // Simple effects only - no cursor, no floating cards, no ripples

    console.log('🚀 SPECTACULAR BERITA PAGE LOADED! 🚀');
});
</script>
@endpush
