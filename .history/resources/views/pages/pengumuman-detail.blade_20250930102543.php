@extends('layouts.app-public')

@section('title', $pengumuman->judul . ' - Pengumuman Desa Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* 🚀 ADVANCED DETAIL PAGE STYLES 🚀 */
    .hero-section {
        background: linear-gradient(135deg, #0086c9 0%, #0074b3 25%, #006ba3 50%, #005b93 75%, #004d83 100%);
        background-size: 200% 200%;
        animation: heroGradientShift 8s ease infinite;
        position: relative;
        overflow: hidden;
        min-height: 60vh;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 50%, rgba(255, 193, 7, 0.15) 0%, transparent 60%),
            radial-gradient(circle at 80% 20%, rgba(220, 53, 69, 0.15) 0%, transparent 60%),
            radial-gradient(circle at 40% 80%, rgba(40, 167, 69, 0.15) 0%, transparent 60%);
        animation: colorShift 12s ease infinite;
    }

    @keyframes heroGradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes colorShift {
        0%, 100% { opacity: 1; }
        33% { opacity: 0.7; }
        66% { opacity: 0.9; }
    }

    .priority-badge {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .content-card {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .content-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .meta-item {
        background: rgba(59, 130, 246, 0.1);
        border: 1px solid rgba(59, 130, 246, 0.2);
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .meta-item:hover {
        background: rgba(59, 130, 246, 0.15);
        transform: translateY(-2px);
    }

    /* Enhanced Content Styling */
    .content-body {
        line-height: 1.8;
    }

    .content-body h1, .content-body h2, .content-body h3, .content-body h4, .content-body h5, .content-body h6 {
        color: #1f2937;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .content-body h1 {
        font-size: 2rem;
        border-bottom: 3px solid #3b82f6;
        padding-bottom: 0.5rem;
    }

    .content-body h2 {
        font-size: 1.75rem;
        border-bottom: 2px solid #e5e7eb;
        padding-bottom: 0.25rem;
    }

    .content-body h3 {
        font-size: 1.5rem;
    }

    .content-body p {
        color: #374151;
        margin-bottom: 1.5rem;
        line-height: 1.8;
    }

    .content-body ul, .content-body ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .content-body li {
        margin-bottom: 0.5rem;
        color: #374151;
    }

    .content-body blockquote {
        border-left: 4px solid #3b82f6;
        background: #f8fafc;
        padding: 1.5rem;
        margin: 2rem 0;
        border-radius: 0 0.5rem 0.5rem 0;
        font-style: italic;
        color: #475569;
    }

    .content-body a {
        color: #2563eb;
        text-decoration: none;
        font-weight: 500;
    }

    .content-body a:hover {
        text-decoration: underline;
        color: #1d4ed8;
    }

    .content-body strong {
        color: #1f2937;
        font-weight: 700;
    }

    .content-body img {
        max-width: 100%;
        height: auto;
        border-radius: 0.75rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin: 1.5rem 0;
    }

    .content-body table {
        width: 100%;
        border-collapse: collapse;
        margin: 1.5rem 0;
        background: white;
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }

    .content-body th, .content-body td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    .content-body th {
        background: #f8fafc;
        font-weight: 600;
        color: #374151;
    }

    .content-body tr:hover {
        background: #f9fafb;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section relative text-white overflow-hidden flex items-center">
    <div class="relative w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <div class="text-center">
            <!-- Breadcrumb -->
            <nav class="mb-8" data-aos="fade-up" data-aos-delay="200">
                <ol class="flex justify-center items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-white/80 hover:text-white transition-colors">
                            <i class="fas fa-home mr-1"></i>
                            Beranda
                        </a>
                    </li>
                    <li class="text-white/60">/</li>
                    <li>
                        <a href="{{ route('pengumuman') }}" class="text-white/80 hover:text-white transition-colors">Pengumuman</a>
                    </li>
                    <li class="text-white/60">/</li>
                    <li class="text-white font-medium">Detail</li>
                </ol>
            </nav>

            <!-- Priority Badge -->
            <div class="mb-6" data-aos="fade-up" data-aos-delay="300">
                <span class="priority-badge inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold">
                    @if($pengumuman->prioritas == 'Tinggi')
                        <i class="fas fa-exclamation-triangle mr-2 text-red-300"></i>
                        PRIORITAS TINGGI
                    @elseif($pengumuman->prioritas == 'Sedang')
                        <i class="fas fa-info-circle mr-2 text-yellow-300"></i>
                        PRIORITAS SEDANG
                    @else
                        <i class="fas fa-check-circle mr-2 text-green-300"></i>
                        PRIORITAS RENDAH
                    @endif
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-8" data-aos="fade-up" data-aos-delay="400">
                {{ $pengumuman->judul }}
            </h1>

            <!-- Meta Info -->
            <div class="flex flex-wrap justify-center items-center gap-4 text-white/80" data-aos="fade-up" data-aos-delay="500">
                <div class="meta-item">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    {{ $pengumuman->formatted_date }}
                </div>
                @if($pengumuman->tanggal_berakhir)
                    <div class="meta-item">
                        <i class="fas fa-hourglass-end mr-2"></i>
                        Berakhir: {{ $pengumuman->formatted_end_date }}
                    </div>
                @endif
                <div class="meta-item">
                    <i class="fas fa-user mr-2"></i>
                    {{ $pengumuman->penulis ?: 'Admin Desa' }}
                </div>
                <div class="meta-item">
                    <i class="fas fa-eye mr-2"></i>
                    {{ number_format($pengumuman->views) }} views
                </div>
            </div>

            <!-- Status Badge -->
            <div class="mt-6" data-aos="fade-up" data-aos-delay="600">
                @if($pengumuman->is_expired)
                    <span class="priority-badge inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-red-500/20 text-red-200">
                        <i class="fas fa-times-circle mr-2"></i>
                        Pengumuman Sudah Berakhir
                    </span>
                @elseif($pengumuman->tanggal_berakhir)
                    <span class="priority-badge inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-green-500/20 text-green-200">
                        <i class="fas fa-check-circle mr-2"></i>
                        Masih Berlaku
                    </span>
                @else
                    <span class="priority-badge inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-blue-500/20 text-blue-200">
                        <i class="fas fa-infinity mr-2"></i>
                        Berlaku Terus
                    </span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Important Notice Bar -->
        @if($pengumuman->prioritas == 'Tinggi' && !$pengumuman->is_expired)
        <div class="mb-8" data-aos="fade-down">
            <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-r-xl shadow-lg">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-3xl text-red-500 animate-pulse"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-red-800 mb-2">PENGUMUMAN PENTING</h3>
                        <p class="text-red-700">
                            Mohon perhatian khusus untuk pengumuman ini. Pastikan Anda membaca dengan teliti.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Main Content Card -->
        <article class="content-card" data-aos="fade-up">
            <div class="p-8 lg:p-12">

                <!-- Content Body -->
                <div class="content-body mb-8">
                    <!-- Announcement Header Info -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 mb-8 border-l-4 border-blue-500">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-bullhorn text-white text-xl"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Informasi Pengumuman</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-calendar-alt text-blue-500"></i>
                                        <span class="text-gray-600">Tanggal Terbit:</span>
                                        <span class="font-semibold text-gray-900">{{ $pengumuman->formatted_date }}</span>
                                    </div>
                                    @if($pengumuman->tanggal_berakhir)
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-hourglass-end text-orange-500"></i>
                                        <span class="text-gray-600">Berlaku Sampai:</span>
                                        <span class="font-semibold text-gray-900">{{ $pengumuman->formatted_end_date }}</span>
                                    </div>
                                    @endif
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-flag text-purple-500"></i>
                                        <span class="text-gray-600">Prioritas:</span>
                                        <span class="font-semibold text-gray-900">{{ $pengumuman->prioritas }}</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-user text-green-500"></i>
                                        <span class="text-gray-600">Penerbit:</span>
                                        <span class="font-semibold text-gray-900">{{ $pengumuman->penulis ?: 'Admin Desa' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content with Enhanced Styling -->
                    <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-headings:font-bold prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-ul:text-gray-700 prose-ol:text-gray-700 prose-li:text-gray-700 prose-blockquote:border-l-blue-500 prose-blockquote:bg-blue-50 prose-blockquote:px-6 prose-blockquote:py-4 prose-blockquote:rounded-r-lg prose-blockquote:text-gray-800">
                        {!! $pengumuman->konten !!}
                    </div>

                    <!-- Important Notice Box -->
                    @if($pengumuman->prioritas == 'Tinggi')
                    <div class="bg-gradient-to-r from-red-50 to-orange-50 border border-red-200 rounded-2xl p-6 mt-8">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-red-800 mb-2">Perhatian Penting!</h4>
                                <p class="text-red-700 text-sm leading-relaxed">
                                    Pengumuman ini memiliki prioritas tinggi. Mohon perhatikan dengan seksama dan segera lakukan tindakan yang diperlukan sesuai dengan informasi yang disampaikan.
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 mt-8 pt-6 border-t border-gray-200">
                        <button onclick="copyToClipboard()" class="inline-flex items-center px-6 py-3 bg-blue-100 text-blue-700 rounded-xl font-semibold hover:bg-blue-200 transition-colors">
                            <i class="fas fa-copy mr-2"></i>
                            Salin Link
                        </button>
                        <a href="{{ route('pengumuman') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all">
                            <i class="fas fa-list mr-2"></i>
                            Lihat Semua Pengumuman
                        </a>
                    </div>
                </div>

            </div>
        </article>
    </div>
</section>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 100
    });

    // Copy to clipboard function
    window.copyToClipboard = function() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(function() {
            // Show success message
            const button = event.target.closest('button');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
            button.classList.remove('bg-yellow-100', 'text-yellow-700', 'hover:bg-yellow-200');
            button.classList.add('bg-green-100', 'text-green-700', 'hover:bg-green-200');

            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-100', 'text-green-700', 'hover:bg-green-200');
                button.classList.add('bg-yellow-100', 'text-yellow-700', 'hover:bg-yellow-200');
            }, 2000);
        }).catch(function(err) {
            console.error('Could not copy text: ', err);
            alert('Gagal menyalin link');
        });
    };

    console.log('🚀 ADVANCED PENGUMUMAN DETAIL PAGE LOADED! 🚀');
});
</script>
@endpush
        </div>
    </div>
</section>

<!-- Related Announcements Section -->
@if($relatedPengumuman->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl lg:text-4xl font-black text-gray-900 mb-4">Pengumuman Terkait</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Pengumuman lain yang mungkin penting untuk Anda
            </p>
        </div>

        <!-- Related Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedPengumuman as $index => $related)
            <article class="news-card group bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2"
                     data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="relative overflow-hidden">
                    <!-- Pengumuman always uses gradient background since no image field in database -->
                    <div class="w-full h-64 bg-gradient-to-br from-blue-500 to-indigo-600 relative">
                        <!-- Decorative pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute top-4 left-4 w-8 h-8 border-2 border-white rounded-full"></div>
                            <div class="absolute top-8 right-8 w-4 h-4 bg-white rounded-full"></div>
                            <div class="absolute bottom-8 left-8 w-6 h-6 border border-white rotate-45"></div>
                            <div class="absolute bottom-4 right-4 w-10 h-10 border-2 border-white rounded-lg rotate-12"></div>
                        </div>

                        <!-- Priority color overlay -->
                        @if($related->prioritas === 'Tinggi')
                            <div class="absolute inset-0 bg-red-500/20"></div>
                        @elseif($related->prioritas === 'Sedang')
                            <div class="absolute inset-0 bg-yellow-500/20"></div>
                        @endif
                    </div>

                    <!-- Enhanced Title Overlay with Professional Info -->
                    <div class="absolute inset-0 z-10">
                        <!-- Top Info Bar -->
                        <div class="absolute top-0 left-0 right-0 p-4">
                            <div class="flex justify-between items-start">
                                <!-- Category & Status -->
                                <div class="flex flex-col gap-2">
                                    <div class="flex items-center gap-2">
                                        <!-- Priority Badge -->
                                        @if($related->prioritas)
                                        <span class="bg-white/20 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full border border-white/30">
                                            <i class="fas fa-flag mr-1"></i>
                                            {{ $related->prioritas }}
                                        </span>
                                        @endif

                                        <!-- Status Badge -->
                                        @if($related->tanggal_berakhir && $related->tanggal_berakhir < now())
                                            <span class="bg-red-500/80 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">
                                                <i class="fas fa-clock mr-1"></i>
                                                Berakhir
                                            </span>
                                        @else
                                            <span class="bg-green-500/80 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                Aktif
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Publication Date -->
                                    <span class="text-white/80 text-xs backdrop-blur-sm bg-black/20 px-2 py-1 rounded-full w-fit">
                                        <i class="fas fa-calendar mr-1"></i>
                                        {{ $related->formatted_date }}
                                    </span>
                                </div>

                                <!-- Priority Indicator -->
                                @if($related->prioritas)
                                    <div class="text-right">
                                        @if($related->prioritas === 'Tinggi')
                                            <div class="bg-red-500/80 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">
                                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                                Penting
                                            </div>
                                        @elseif($related->prioritas === 'Sedang')
                                            <div class="bg-yellow-500/80 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">
                                                <i class="fas fa-info-circle mr-1"></i>
                                                Sedang
                                            </div>
                                        @else
                                            <div class="bg-blue-500/80 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-full">
                                                <i class="fas fa-info mr-1"></i>
                                                Normal
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Bottom Title Area -->
                        <div class="absolute inset-x-0 bottom-0">
                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>
                            <div class="relative px-5 py-4">
                                <!-- Author Info -->
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-6 h-6 bg-white/20 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white text-xs"></i>
                                    </div>
                                    <span class="text-white/90 text-xs">{{ $related->penulis ?: 'Admin Desa' }}</span>
                                </div>

                                <!-- Title -->
                                <h3 class="text-white text-lg lg:text-xl font-bold leading-snug line-clamp-2 drop-shadow-sm">
                                    {{ $related->judul }}
                                </h3>

                                <!-- Quick Stats -->
                                <div class="flex items-center gap-4 mt-3">
                                    <div class="flex items-center gap-1 text-white/80 text-xs">
                                        <i class="fas fa-eye"></i>
                                        <span>{{ number_format($related->views) }}</span>
                                    </div>
                                    @if($related->tanggal_berakhir)
                                    <div class="flex items-center gap-1 text-white/80 text-xs">
                                        <i class="fas fa-hourglass-half"></i>
                                        <span>{{ \Carbon\Carbon::parse($related->tanggal_berakhir)->format('d/m/Y') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Clean Content Area -->
                <div class="p-6">
                    <!-- Excerpt -->
                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4">
                        {{ Str::limit($related->excerpt, 150) }}
                    </p>

                    <!-- Clean Footer -->
                    <div class="pt-4 border-t border-gray-100">
                        <div class="flex items-center justify-between">
                            <div class="text-xs text-gray-500">
                                <i class="fas fa-eye mr-1"></i>
                                {{ number_format($related->views) }} views
                            </div>
                            <a href="{{ route('pengumuman.show', $related->slug) }}" class="spectacular-btn text-white px-5 py-2 rounded-lg text-sm font-semibold hover:scale-105 transition-transform">
                                Baca <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Back to Announcements -->
<section class="py-20 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-20 h-20 border-2 border-white rounded-full"></div>
        <div class="absolute top-32 right-20 w-16 h-16 bg-white rounded-lg rotate-45"></div>
        <div class="absolute bottom-20 left-1/4 w-12 h-12 border border-white rounded-full"></div>
        <div class="absolute bottom-32 right-1/3 w-8 h-8 bg-white rounded-lg"></div>
    </div>

    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-1 h-1 bg-indigo-400 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-1/3 left-1/3 w-1.5 h-1.5 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Main CTA -->
            <div class="mb-8" data-aos="fade-up">
                <a href="{{ route('pengumuman') }}"
                   class="group inline-flex items-center px-12 py-6 bg-white text-gray-900 text-xl font-bold rounded-3xl hover:bg-gray-50 transition-all duration-500 hover:scale-110 shadow-2xl hover:shadow-3xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-arrow-left text-white text-lg"></i>
                        </div>
                        <div class="text-left">
                            <div class="text-sm text-gray-600 font-medium">Kembali ke</div>
                            <div class="text-xl font-black">Semua Pengumuman</div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Additional Info -->
            <div class="text-center text-white/80" data-aos="fade-up" data-aos-delay="200">
                <p class="text-lg mb-4">Temukan pengumuman penting lainnya</p>
                <div class="flex justify-center items-center space-x-8 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-bullhorn mr-2 text-blue-300"></i>
                        <span>Informasi Resmi</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-calendar mr-2 text-indigo-300"></i>
                        <span>Update Terkini</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-shield-alt mr-2 text-purple-300"></i>
                        <span>Terpercaya</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Announcement Hero */
.announcement-hero-section {
    min-height: 60vh;
    display: flex;
    align-items: center;
    position: relative;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}

.hero-gradient-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    z-index: 2;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image:
        radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 2px, transparent 2px),
        radial-gradient(circle at 80% 50%, rgba(255, 255, 255, 0.1) 2px, transparent 2px);
    background-size: 100px 100px;
    z-index: 3;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: rgba(255, 255, 255, 0.5);
}

.priority-badge-hero .badge {
    font-size: 1rem;
    letter-spacing: 1px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

.announcement-title {
    font-size: 3rem;
    line-height: 1.2;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.announcement-meta {
    font-size: 1rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

.meta-item {
    white-space: nowrap;
}

.pulsing-badge {
    animation: badgePulse 2s infinite;
}

@keyframes badgePulse {
    0% { box-shadow: 0 0 0 0 rgba(25, 135, 84, 0.7); }
    70% { box-shadow: 0 0 0 10px rgba(25, 135, 84, 0); }
    100% { box-shadow: 0 0 0 0 rgba(25, 135, 84, 0); }
}

/* Floating Alerts */
.floating-alerts {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
    z-index: 4;
}

.floating-alert {
    position: absolute;
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, 0.3);
    font-size: 1.2rem;
    animation: floatAlert 8s ease-in-out infinite;
}

.floating-1 {
    top: 15%;
    left: 15%;
    animation-delay: 0s;
}

.floating-2 {
    top: 70%;
    right: 20%;
    animation-delay: 3s;
}

.floating-3 {
    bottom: 25%;
    left: 25%;
    animation-delay: 6s;
}

@keyframes floatAlert {
    0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.3; }
    50% { transform: translateY(-25px) rotate(180deg); opacity: 0.6; }
}

/* Important Notice */
.important-notice-bar {
    animation: slideDown 0.5s ease-out;
}

@keyframes slideDown {
    from { transform: translateY(-20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.pulsing-icon {
    animation: iconPulse 1.5s ease-in-out infinite;
}

@keyframes iconPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

/* Content Section */
.content-wrapper {
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.social-share-top {
    border-bottom: 1px solid #e9ecef;
}

.share-buttons .btn {
    transition: all 0.3s ease;
}

.share-buttons .btn:hover {
    transform: translateY(-2px);
}

/* Announcement Body Styling */
.announcement-body {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.announcement-body h1,
.announcement-body h2,
.announcement-body h3,
.announcement-body h4,
.announcement-body h5,
.announcement-body h6 {
    color: #2c3e50;
    font-weight: 700;
    margin: 2rem 0 1rem 0;
}

.announcement-body p {
    margin-bottom: 1.5rem;
    text-align: justify;
}

.announcement-body strong {
    color: #e74c3c;
    font-weight: 700;
}

.announcement-body ul,
.announcement-body ol {
    padding-left: 2rem;
    margin-bottom: 1.5rem;
}

.announcement-body li {
    margin-bottom: 0.5rem;
    line-height: 1.6;
}

.announcement-body blockquote {
    border-left: 4px solid var(--bs-warning);
    background: #fff3cd;
    padding: 1.5rem;
    margin: 2rem 0;
    border-radius: 0 8px 8px 0;
    font-style: italic;
}

/* Author Info */
.author-info {
    padding: 1rem;
    background: #fff8e1;
    border-radius: 12px;
}

.avatar {
    font-size: 1.2rem;
}

/* Related Announcements */
.related-card-hover {
    transition: all 0.3s ease;
}

.related-card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
}

.related-title-link {
    transition: color 0.3s ease;
}

.related-title-link:hover {
    color: var(--bs-warning) !important;
}

/* Back to Announcements */
.back-to-announcements-section .btn {
    transition: all 0.3s ease;
}

.back-to-announcements-section .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

/* Priority Badge Colors */
.badge-danger {
    background-color: #dc3545 !important;
}

.badge-warning {
    background-color: #ffc107 !important;
    color: #212529 !important;
}

.badge-success {
    background-color: #198754 !important;
}

/* Print Styles */
@media print {
    .announcement-hero-section,
    .related-announcements-section,
    .back-to-announcements-section,
    .social-share-top,
    .announcement-actions,
    .important-notice-bar {
        display: none !important;
    }

    .announcement-content-section {
        padding: 0 !important;
    }

    .content-wrapper {
        box-shadow: none !important;
        border: none !important;
    }
}

/* Responsive */
@media (max-width: 768px) {
    .announcement-title {
        font-size: 2rem;
    }

    .announcement-meta {
        flex-direction: column;
        gap: 0.5rem !important;
    }

    .meta-item {
        font-size: 0.9rem;
    }

    .priority-badge-hero .badge {
        font-size: 0.9rem;
    }

    .social-share-top {
        text-align: center;
    }

    .share-buttons {
        justify-content: center;
    }

    .announcement-body {
        font-size: 1rem;
    }

    .author-info {
        text-align: center;
        flex-direction: column;
    }

    .announcement-actions {
        justify-content: center !important;
    }

    .important-notice-bar .alert {
        text-align: center;
        flex-direction: column;
    }

    .notice-icon {
        margin-bottom: 1rem;
        margin-right: 0 !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
function copyToClipboard() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        // Create toast notification
        const toast = document.createElement('div');
        toast.className = 'toast-notification';
        toast.innerHTML = '<i class="fas fa-check me-2"></i>Link berhasil disalin!';
        toast.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: #ffc107;
            color: #212529;
            padding: 12px 20px;
            border-radius: 8px;
            z-index: 9999;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            animation: slideIn 0.3s ease;
        `;

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    });
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);
</script>
@endpush
