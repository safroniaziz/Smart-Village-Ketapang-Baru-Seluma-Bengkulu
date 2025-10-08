@extends('layouts.app-public')

@section('title', 'Tentang Desa - Smart Village ' . ($monografi->nama_desa ?? 'Ketapang Baru'))

@push('styles')
<style>
    /* Design System Integration for About Page */
    :root {
        --primary-blue-start: #0086c9;
        --primary-blue-mid: #0074b3;
        --primary-blue-end: #006ba3;
    }

    /* Konsisten Hero Background dengan halaman lain */
    .hero-section {
        background: linear-gradient(135deg, var(--primary-blue-start) 0%, var(--primary-blue-mid) 50%, var(--primary-blue-end) 100%);
        background-size: 200% 200%;
        animation: heroGradientShift 8s ease infinite;
    }

    @keyframes heroGradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Info Card Styling */
    .info-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .info-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
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
<section class="hero-section relative text-white overflow-hidden min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)] flex items-center pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100"></div>

    <!-- Particle.js Container for About -->
    <div id="particles-about" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-home text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">PROFIL DESA</h2>
                            <p class="text-sm text-blue-100">{{ $monografi->kecamatan ?? 'Kecamatan Semidang Alas Maras' }}</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Desa</span><br>
                        <span class="text-yellow-400 font-extrabold">{{ $monografi->nama_desa ?? 'Ketapang Baru' }}</span>
                    </h1>

                    <!-- Badge Desa Digital -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-star mr-2 text-yellow-300 text-xs"></i>
                            Desa Digital Terdepan
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        @if($monografi && $monografi->deskripsi)
                            {{ $monografi->deskripsi }}
                        @else
                            Membangun desa yang maju, mandiri, dan sejahtera melalui pemanfaatan teknologi digital dan
                            <span class="font-semibold text-yellow-300">pengembangan potensi sumber daya lokal</span>
                        @endif
                    </p>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ $monografi->tahun_berdiri ?? 1985 }}</div>
                        <div class="text-sm text-blue-100">Tahun Berdiri</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ number_format($totalWarga) }}</div>
                        <div class="text-sm text-blue-100">Jiwa Penduduk</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ $totalDusun }}</div>
                        <div class="text-sm text-blue-100">Dusun</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ number_format($monografi->luas_wilayah ?? 24771) }}</div>
                        <div class="text-sm text-blue-100">Hektar</div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 relative z-20" data-aos="fade-up" data-aos-delay="800">
                    <a href="{{ route('visi.misi') }}" class="group bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-bullseye mr-2 text-base"></i>
                            <span class="text-base">Visi & Misi</span>
                        </div>
                    </a>
                    <a href="{{ route('statistik') }}" class="group bg-gradient-to-r from-yellow-400/20 to-orange-500/20 hover:from-yellow-400/30 hover:to-orange-500/30 backdrop-blur-md border-2 border-yellow-400/30 hover:border-yellow-400/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-chart-bar mr-2 text-base"></i>
                            <span class="text-base">Statistik Desa</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Right Side - Potensi Desa Preview -->
            <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                <!-- Potensi Desa Showcase -->
                <div class="info-card group relative bg-gradient-to-br from-white via-green-50 to-emerald-100 backdrop-blur-sm border border-green-200/50 rounded-3xl p-6 shadow-2xl overflow-hidden hover:shadow-3xl hover:scale-105 hover:border-green-300/70 cursor-pointer" data-aos="fade-up" data-aos-delay="400">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-400 to-emerald-600 rounded-full -translate-y-16 translate-x-16 group-hover:scale-110 transition-transform duration-700"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-yellow-400 to-green-500 rounded-full translate-y-12 -translate-x-12 group-hover:scale-110 transition-transform duration-700"></div>
                    </div>

                    <!-- Header Section -->
                    <div class="relative z-10 text-center mb-4">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl mb-3 shadow-lg group-hover:scale-110 group-hover:shadow-green-500/40 transition-all duration-300">
                            <i class="fas fa-seedling text-white text-xl group-hover:text-green-100 transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-lg font-black text-gray-800 mb-1 bg-gradient-to-r from-green-600 to-emerald-700 bg-clip-text text-transparent">Potensi Desa</h3>
                        <p class="text-xs text-gray-600 font-medium">Sumber Daya & Keunggulan Lokal</p>
                    </div>

                    <!-- Potensi Stats -->
                    <div class="relative z-10 grid grid-cols-2 gap-3 mb-3">
                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-sm border border-green-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                            <div class="text-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mx-auto mb-2 shadow-sm group-hover:scale-110 group-hover:shadow-yellow-500/30 transition-all duration-300">
                                    <i class="fas fa-star text-white text-xs"></i>
                                </div>
                                <p class="font-bold text-gray-800 text-lg">{{ $potensiDesa->where('is_unggulan', true)->count() }}</p>
                                <p class="text-xs text-gray-600">Potensi Unggulan</p>
                            </div>
                        </div>

                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-sm border border-green-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                            <div class="text-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center mx-auto mb-2 shadow-sm group-hover:scale-110 group-hover:shadow-blue-500/30 transition-all duration-300">
                                    <i class="fas fa-layer-group text-white text-xs"></i>
                                </div>
                                <p class="font-bold text-gray-800 text-lg">{{ $potensiDesa->groupBy('kategori')->count() }}</p>
                                <p class="text-xs text-gray-600">Kategori Potensi</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Row - Full Width -->
                    <div class="relative z-10 mb-4">
                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-sm border border-green-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                            <div class="text-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-green-600 rounded-lg flex items-center justify-center mx-auto mb-2 shadow-sm group-hover:scale-110 group-hover:shadow-emerald-500/30 transition-all duration-300">
                                    <i class="fas fa-home text-white text-xs"></i>
                                </div>
                                <p class="font-bold text-gray-800 text-lg">{{ $totalDusun }}</p>
                                <p class="text-xs text-gray-600">Dusun</p>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Potensi -->
                    <div class="relative z-10 bg-gradient-to-br from-gray-900 via-green-900 to-emerald-900 rounded-2xl p-4 shadow-xl group-hover:shadow-2xl group-hover:from-gray-800 group-hover:via-green-800 group-hover:to-emerald-800 transition-all duration-500">
                        <div class="text-center mb-3">
                            <div class="inline-flex items-center justify-center space-x-2 text-white/90 text-xs font-semibold mb-2">
                                <i class="fas fa-gem text-yellow-400"></i>
                                <span>Potensi Terpilih</span>
                            </div>
                        </div>

                        <!-- Potensi Item -->
                        <div class="flex flex-col items-center space-y-3">
                            @if($potensiDesa->where('is_unggulan', true)->first())
                                @php $featuredPotensi = $potensiDesa->where('is_unggulan', true)->first(); @endphp
                                <div class="relative group-hover:scale-110 transition-transform duration-500">
                                    <!-- Potensi Glow Effect -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/30 to-green-500/30 rounded-2xl blur-lg group-hover:from-yellow-400/50 group-hover:to-green-500/50 transition-all duration-500"></div>
                                    <div class="relative bg-white p-4 rounded-2xl shadow-2xl border-2 border-white/20 group-hover:shadow-3xl group-hover:border-white/40 transition-all duration-500">
                                        <div class="text-center">
                                            @if($featuredPotensi->foto)
                                                <img src="{{ Storage::url($featuredPotensi->foto) }}" alt="{{ $featuredPotensi->nama_potensi }}" class="w-16 h-16 object-cover rounded-lg mx-auto mb-2">
                                            @else
                                                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                                                    <i class="fas fa-seedling text-white text-xl"></i>
                                                </div>
                                            @endif
                                            <h4 class="font-bold text-gray-800 text-sm mb-1">{{ $featuredPotensi->nama_potensi }}</h4>
                                            <p class="text-xs text-gray-600">{{ ucfirst(str_replace('_', ' ', $featuredPotensi->kategori)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="relative group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/30 to-green-500/30 rounded-2xl blur-lg group-hover:from-yellow-400/50 group-hover:to-green-500/50 transition-all duration-500"></div>
                                    <div class="relative bg-white p-4 rounded-2xl shadow-2xl border-2 border-white/20 group-hover:shadow-3xl group-hover:border-white/40 transition-all duration-500">
                                        <div class="text-center">
                                            <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                                                <i class="fas fa-seedling text-white text-xl"></i>
                                            </div>
                                            <h4 class="font-bold text-gray-800 text-sm mb-1">Potensi Desa</h4>
                                            <p class="text-xs text-gray-600">Sumber Daya Lokal</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="text-center">
                                <div class="flex items-center justify-center space-x-2 mb-1">
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse group-hover:bg-yellow-300 transition-colors duration-300"></div>
                                    <p class="text-sm text-white font-bold group-hover:text-yellow-100 transition-colors duration-300">Lihat Semua Potensi</p>
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse group-hover:bg-yellow-300 transition-colors duration-300" style="animation-delay: 0.5s;"></div>
                                </div>
                                <p class="text-xs text-gray-300">Keunggulan & Sumber Daya</p>
                            </div>
                        </div>

                        <!-- Action Badge -->
                        <div class="flex justify-center mt-3">
                            <div class="inline-flex items-center bg-gradient-to-r from-yellow-500/20 to-green-500/20 backdrop-blur-sm border border-yellow-400/30 rounded-full px-3 py-1 group-hover:from-yellow-500/30 group-hover:to-green-500/30 group-hover:border-yellow-300/50 transition-all duration-300">
                                <i class="fas fa-arrow-down text-yellow-400 text-xs mr-2 group-hover:text-yellow-300 transition-colors duration-300"></i>
                                <span class="text-xs text-yellow-100 font-medium group-hover:text-white transition-colors duration-300">Scroll untuk Lihat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

</section>

<!-- Sejarah Desa Section -->
<section class="py-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <div class="relative w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Monografi Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-24">
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="800">
                <div>
                    <!-- Modern Badge with Gradient -->
                    <div class="inline-flex items-center relative mb-6">
                        <div class="absolute inset-0 bg-gradient-to-r from-green-600 to-emerald-600 rounded-full blur-lg opacity-20"></div>
                        <div class="relative bg-gradient-to-r from-green-600 to-emerald-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-map-marked-alt mr-2"></i>
                            Data Monografi Desa
                        </div>
                    </div>

                    <!-- Enhanced Title with Gradient Text -->
                    <div class="mb-8">
                        <h2 class="text-4xl lg:text-5xl font-black mb-4">
                            <span class="bg-gradient-to-r from-gray-900 via-slate-800 to-green-800 bg-clip-text text-transparent">
                                Wilayah & Geografis
                            </span>
                        </h2>
                        <div class="w-16 h-1 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full"></div>
                    </div>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Desa {{ $monografi->nama_desa ?? 'Ketapang Baru' }} terletak di <strong>Kecamatan {{ $monografi->kecamatan ?? 'Semidang Alas Maras' }}, Kabupaten {{ $monografi->kabupaten ?? 'Seluma' }}, Provinsi {{ $monografi->provinsi ?? 'Bengkulu' }}</strong> dengan posisi geografis yang strategis. Dengan <strong>Kode Pos {{ $monografi->kode_pos ?? '38875' }}</strong> dan <strong>Kode Area {{ $monografi->kode_area ?? '170505' }}</strong>, desa ini memiliki status sebagai <strong>{{ $monografi->status_desa ?? 'Desa Berkembang' }}</strong>.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Batas wilayah desa meliputi <strong>{{ $batasWilayah['utara']->nama_wilayah ?? 'Muara Timput' }} di Utara</strong>, <strong>{{ $batasWilayah['timur']->nama_wilayah ?? 'Talang Beringin' }} di Timur</strong>, <strong>{{ $batasWilayah['selatan']->nama_wilayah ?? 'Padang Bakung' }} di Selatan</strong>, dan <strong>{{ $batasWilayah['barat']->nama_wilayah ?? 'Laut' }} di Barat</strong>. Posisi pesisir ini memberikan keunggulan dalam sektor perikanan dan pariwisata bahari.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Dengan luas wilayah mencapai <strong>{{ number_format($monografi->luas_wilayah ?? 24771) }} hektar</strong>, jarak tempuh ke <strong>ibukota kecamatan sejauh {{ $monografi->jarak_ke_kecamatan ?? 3 }} km ({{ $monografi->waktu_ke_kecamatan ?? 0.2 }} jam)</strong> dan ke <strong>ibukota kabupaten {{ $monografi->jarak_ke_kabupaten ?? 55 }} km ({{ $monografi->waktu_ke_kabupaten ?? 1.5 }} jam)</strong> menjadikan desa ini mudah diakses untuk berbagai keperluan administrasi dan ekonomi.
                    </p>
                </div>
            </div>

            <!-- Batas Wilayah & Akses -->
            <div class="relative" data-aos="fade-left" data-aos-duration="800">
                <div class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 rounded-3xl p-8 shadow-2xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Batas Wilayah</h3>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                                                <div class="text-center p-4 bg-white/80 rounded-2xl shadow-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-arrow-up text-white text-lg"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm">UTARA</h4>
                            <p class="text-gray-600 text-xs">{{ $batasWilayah['utara']->nama_wilayah ?? 'Muara Timput' }}</p>
                        </div>

                        <div class="text-center p-4 bg-white/80 rounded-2xl shadow-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-arrow-right text-white text-lg"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm">TIMUR</h4>
                            <p class="text-gray-600 text-xs">{{ $batasWilayah['timur']->nama_wilayah ?? 'Talang Beringin' }}</p>
                        </div>

                        <div class="text-center p-4 bg-white/80 rounded-2xl shadow-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-arrow-down text-white text-lg"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm">SELATAN</h4>
                            <p class="text-gray-600 text-xs">{{ $batasWilayah['selatan']->nama_wilayah ?? 'Padang Bakung' }}</p>
                        </div>

                        <div class="text-center p-4 bg-white/80 rounded-2xl shadow-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-waves text-white text-lg"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm">BARAT</h4>
                            <p class="text-gray-600 text-xs">{{ $batasWilayah['barat']->nama_wilayah ?? 'Laut' }}</p>
                        </div>
                    </div>

                    <!-- Akses -->
                    <div class="bg-white/60 rounded-2xl p-6">
                        <h4 class="font-bold text-gray-900 mb-4 text-center">Aksesibilitas</h4>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-building text-white text-xs"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">Ke Kecamatan</p>
                                    <p class="text-gray-600 text-xs">{{ $monografi->jarak_ke_kecamatan ?? 3 }} km ({{ $monografi->waktu_ke_kecamatan ?? 0.2 }} jam)</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-city text-white text-xs"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">Ke Kabupaten</p>
                                    <p class="text-gray-600 text-xs">{{ $monografi->jarak_ke_kabupaten ?? 55 }} km ({{ $monografi->waktu_ke_kabupaten ?? 1.5 }} jam)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Peruntukan Lahan Section -->
<section class="py-20 bg-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-layer-group mr-2"></i>
                    Peruntukan Lahan Desa
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-slate-800 to-emerald-800 bg-clip-text text-transparent">
                        Peruntukan Lahan
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Pembagian lahan desa</span> berdasarkan peruntukan dan penggunaan optimal untuk
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-emerald-700">kesejahteraan masyarakat</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-emerald-200 to-teal-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <!-- Peruntukan Lahan Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-aos="fade-up" data-aos-duration="600">
            @php
                $colors = [
                    'emerald' => ['from-emerald-500', 'to-green-600', 'bg-emerald-50', 'text-emerald-700', 'border-emerald-200'],
                    'blue' => ['from-blue-500', 'to-cyan-600', 'bg-blue-50', 'text-blue-700', 'border-blue-200'],
                    'amber' => ['from-amber-500', 'to-orange-600', 'bg-amber-50', 'text-amber-700', 'border-amber-200'],
                    'purple' => ['from-purple-500', 'to-indigo-600', 'bg-purple-50', 'text-purple-700', 'border-purple-200'],
                    'rose' => ['from-rose-500', 'to-pink-600', 'bg-rose-50', 'text-rose-700', 'border-rose-200'],
                    'teal' => ['from-teal-500', 'to-cyan-600', 'bg-teal-50', 'text-teal-700', 'border-teal-200'],
                ];
                $colorKeys = array_keys($colors);

                // Group by kategori to avoid duplicates
                $groupedLahan = $peruntukanLahan->groupBy('kategori');

                // Function to format database names to user-friendly
                function formatNama($nama) {
                    $replacements = [
                        'tanah_kosong' => 'Tanah Kosong',
                        'lahan_kosong' => 'Lahan Kosong',
                        'lahan_basah' => 'Lahan Basah',
                        'lahan_kering' => 'Lahan Kering',
                        'sawah_irigasi' => 'Sawah Irigasi',
                        'sawah_tadah_hujan' => 'Sawah Tadah Hujan',
                        'tegalan' => 'Tegalan',
                        'kebun_campuran' => 'Kebun Campuran',
                        'perkebunan_kelapa' => 'Perkebunan Kelapa',
                        'perkebunan_karet' => 'Perkebunan Karet',
                        'hutan_rakyat' => 'Hutan Rakyat',
                        'pemukiman' => 'Pemukiman',
                        'fasilitas_umum' => 'Fasilitas Umum',
                        'jalan_desa' => 'Jalan Desa',
                        'sungai' => 'Sungai',
                        'rawa' => 'Rawa',
                    ];

                    // Check if exact match exists
                    if (isset($replacements[strtolower($nama)])) {
                        return $replacements[strtolower($nama)];
                    }

                    // If not, do general formatting
                    return ucwords(str_replace(['_', '-'], ' ', $nama));
                }
            @endphp

            @foreach($groupedLahan as $kategori => $lahans)
                @php
                    $index = $loop->index;
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $color = $colors[$colorKey];
                    $totalLuas = $lahans->sum('luas_hektar');
                    $firstLahan = $lahans->first();
                @endphp

                <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border {{ $color[4] }} overflow-hidden transform hover:-translate-y-2">
                    <!-- Header dengan Gradient -->
                    <div class="bg-gradient-to-r {{ $color[0] }} {{ $color[1] }} p-6 text-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16"></div>
                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="{{ $firstLahan->icon ?? 'fas fa-layer-group' }} text-white text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-2">{{ formatNama($kategori) }}</h3>

                            @if($firstLahan->deskripsi)
                                <p class="text-sm opacity-90 mb-3 leading-relaxed">{{ $firstLahan->deskripsi }}</p>
                            @endif

                            @if($totalLuas > 0)
                                <div class="text-3xl font-black">{{ number_format($totalLuas, 0) }}</div>
                                <div class="text-sm opacity-90">Total Hektar</div>
                            @endif
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        @if($lahans->count() > 0)
                            <div class="space-y-3">
                                @foreach($lahans as $subLahan)
                                    @if($subLahan->sub_kategori && !str_contains(strtolower($subLahan->sub_kategori), 'untuk') && !str_contains(strtolower($subLahan->sub_kategori), 'yang'))
                                        <div class="flex items-center justify-between p-3 {{ $color[2] }} rounded-xl border {{ $color[4] }}">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-gradient-to-r {{ $color[0] }} {{ $color[1] }} rounded-full mr-3"></div>
                                                <span class="font-medium text-gray-700">{{ formatNama($subLahan->sub_kategori) }}</span>
                                            </div>
                                            <span class="font-bold {{ $color[3] }} font-mono">
                                                {{ $subLahan->luas_hektar > 0 ? number_format($subLahan->luas_hektar, 0) . ' Ha' : '0 Ha' }}
                                            </span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Geografis Section - Redesigned Modern Layout -->
<section class="py-24 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-blue-200/20 to-indigo-300/20 rounded-full blur-3xl -translate-x-48 -translate-y-48"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-gradient-to-br from-emerald-200/20 to-teal-300/20 rounded-full blur-3xl translate-x-40 translate-y-40"></div>

    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Enhanced Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="600">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-map-marked-alt mr-2"></i>
                    Letak Geografis Strategis
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-blue-800 to-indigo-900 bg-clip-text text-transparent">
                        Posisi & Lokasi
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Desa {{ $monografi->nama_desa ?? 'Ketapang Baru' }}</span> terletak di posisi geografis strategis dengan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-blue-700">akses pesisir yang menguntungkan</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-blue-200 to-indigo-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <!-- Main Content Grid - Reorganized -->
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 mb-16">
            <!-- Boundary Card -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl hover:scale-105 transition-all duration-500" data-aos="fade-up" data-aos-delay="300">
                        <div class="flex items-center mb-6">
                            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-compass text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">Batas Wilayah</h3>
                                <p class="text-gray-600 text-sm">Territorial Boundaries</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-xl border border-blue-100">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-arrow-up text-white text-sm"></i>
                                    </div>
                                    <span class="font-semibold text-gray-700">Utara</span>
                                </div>
                                <span class="font-bold text-gray-900">{{ $batasWilayah['utara']->nama_wilayah ?? 'Muara Timput' }}</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-xl border border-yellow-100">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-arrow-right text-white text-sm"></i>
                                    </div>
                                    <span class="font-semibold text-gray-700">Timur</span>
                                </div>
                                <span class="font-bold text-gray-900">{{ $batasWilayah['timur']->nama_wilayah ?? 'Talang Beringin' }}</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl border border-green-100">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-arrow-down text-white text-sm"></i>
                                    </div>
                                    <span class="font-semibold text-gray-700">Selatan</span>
                                </div>
                                <span class="font-bold text-gray-900">{{ $batasWilayah['selatan']->nama_wilayah ?? 'Padang Bakung' }}</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-cyan-50 rounded-xl border border-cyan-100">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-cyan-500 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-waves text-white text-sm"></i>
                                    </div>
                                    <span class="font-semibold text-gray-700">Barat</span>
                                </div>
                                <span class="font-bold text-cyan-700">{{ $batasWilayah['barat']->nama_wilayah ?? 'Laut' }}</span>
                            </div>
                        </div>
                    </div>

            <!-- Detail Lokasi Card -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl hover:scale-105 transition-all duration-500" data-aos="fade-up" data-aos-delay="400">
                        <div class="flex items-center mb-6">
                            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-map-marker-alt text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">Detail Lokasi</h3>
                                <p class="text-gray-600 text-sm">Administrative Data</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-purple-50 rounded-xl border border-purple-100">
                                <div class="flex items-center">
                                    <i class="fas fa-expand-arrows-alt text-purple-500 mr-3"></i>
                                    <span class="font-semibold text-gray-700">Luas Wilayah</span>
                                </div>
                                <span class="font-bold text-purple-700 font-mono">{{ number_format($monografi->luas_wilayah ?? 24771, 0) }} Ha</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-indigo-50 rounded-xl border border-indigo-100">
                                <div class="flex items-center">
                                    <i class="fas fa-mountain text-indigo-500 mr-3"></i>
                                    <span class="font-semibold text-gray-700">Ketinggian</span>
                                </div>
                                <span class="font-bold text-indigo-700 font-mono">{{ $monografi->ketinggian_mdpl ?? 3 }} mdpl</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-emerald-50 rounded-xl border border-emerald-100">
                                <div class="flex items-center">
                                    <i class="fas fa-chart-area text-emerald-500 mr-3"></i>
                                    <span class="font-semibold text-gray-700">Topografi</span>
                                </div>
                                <span class="font-bold text-emerald-700">{{ $monografi->topografi ?? 'Datar-Berombak' }}</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-xl border border-blue-100">
                                <div class="flex items-center">
                                    <i class="fas fa-award text-blue-500 mr-3"></i>
                                    <span class="font-semibold text-gray-700">Status</span>
                                </div>
                                <span class="font-bold text-blue-700">{{ $monografi->status_desa ?? 'Desa Berkembang' }}</span>
                            </div>
                        </div>

                        <!-- Enhanced Street View Link -->
                        <div class="mt-6 pt-6 border-t border-gray-100">
                            @if($monografi->google_street_view_url)
                                <a href="{{ $monografi->google_street_view_url }}"
                                   target="_blank"
                                   class="group inline-flex items-center w-full justify-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                                    <i class="fas fa-street-view mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                                    Virtual Tour 360°
                                    <i class="fas fa-external-link-alt ml-2 text-sm opacity-80"></i>
                                </a>
                            @else
                                <a href="https://www.google.com/maps/@{{ $monografi->latitude ?? -4.3221828 }},{{ $monografi->longitude ?? 102.7635049 }},17z"
                                   target="_blank"
                                   class="group inline-flex items-center w-full justify-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                                    <i class="fas fa-map-marker-alt mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                                    Lihat di Google Maps
                                    <i class="fas fa-external-link-alt ml-2 text-sm opacity-80"></i>
                                </a>
                            @endif
                        </div>
                    </div>

            <!-- Coordinates Card -->
            <div class="group bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 rounded-3xl p-8 text-white shadow-2xl hover:shadow-3xl transition-all duration-500 relative overflow-hidden" data-aos="fade-up" data-aos-delay="500">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full -translate-y-16 translate-x-16"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white rounded-full translate-y-12 -translate-x-12"></div>
                </div>

                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-crosshairs text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">Koordinat GPS</h3>
                    <p class="text-blue-100 text-sm mb-6">Balai Desa {{ $monografi->nama_desa ?? 'Ketapang Baru' }}</p>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                            <span class="text-blue-100">Latitude</span>
                            <span class="font-mono font-bold">{{ $monografi->latitude ?? -4.3221828 }}°S</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                            <span class="text-blue-100">Longitude</span>
                            <span class="font-mono font-bold">{{ $monografi->longitude ?? 102.7635049 }}°E</span>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-white/20">
                        <div class="flex items-center text-blue-200 text-sm">
                            <i class="fas fa-check-circle mr-2 text-green-300"></i>
                            Terverifikasi Google Street View
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Climate & Topography Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Climate Card -->
            <div class="group bg-gradient-to-br from-emerald-500 via-green-600 to-teal-700 rounded-3xl p-8 text-white shadow-2xl hover:shadow-3xl transition-all duration-500 relative overflow-hidden" data-aos="fade-up" data-aos-delay="600">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 left-0 w-28 h-28 bg-white rounded-full -translate-y-14 -translate-x-14"></div>
                        <div class="absolute bottom-0 right-0 w-20 h-20 bg-white rounded-full translate-y-10 translate-x-10"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-thermometer-half text-white text-2xl"></i>
                        </div>
                    <h3 class="text-2xl font-bold mb-2">Kondisi Iklim</h3>
                    <p class="text-green-100 text-sm mb-6">{{ $iklim->jenis_iklim ?? 'Tropis Pesisir' }}</p>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                            <span class="text-green-100">Suhu</span>
                            <span class="font-mono font-bold">{{ $iklim->suhu_rata_rata ?? '23-30' }}°C</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                            <span class="text-green-100">Ketinggian</span>
                            <span class="font-mono font-bold">{{ $monografi->ketinggian_mdpl ?? 3 }}m dpl</span>
                        </div>
                        @if($iklim && $iklim->curah_hujan)
                            <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                                <span class="text-green-100">Curah Hujan</span>
                                <span class="font-mono font-bold">{{ $iklim->curah_hujan }}mm/tahun</span>
                            </div>
                        @endif
                    </div>
                    </div>
                </div>

            <!-- Topography Card -->
            <div class="group bg-gradient-to-br from-purple-600 via-violet-700 to-purple-800 rounded-3xl p-8 text-white shadow-2xl hover:shadow-3xl transition-all duration-500 relative overflow-hidden" data-aos="fade-up" data-aos-delay="700">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-white rounded-full -translate-y-12 translate-x-12"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-white rounded-full translate-y-16 -translate-x-16"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-chart-area text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Topografi</h3>
                        <p class="text-purple-100 text-sm mb-6">{{ $monografi->topografi ?? 'Bentuk Wilayah' }}</p>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                                <span class="text-purple-100">Ketinggian</span>
                                <span class="font-mono font-bold">{{ $monografi->ketinggian ?? '10' }}m dpl</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                                <span class="text-purple-100">Status</span>
                                <span class="font-bold">{{ $monografi->status_desa ?? 'Desa Berkembang' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Potensi Desa Section -->
<section class="py-20 bg-gradient-to-br from-yellow-50 via-orange-50 to-red-50">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-yellow-600 to-orange-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-yellow-600 to-orange-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-star mr-2"></i>
                    Potensi Unggulan Desa
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-slate-800 to-yellow-800 bg-clip-text text-transparent">
                        Kekayaan Desa
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-yellow-500 to-orange-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto mb-8">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Berbagai potensi unggulan</span> yang dapat dikembangkan untuk kemajuan dan kesejahteraan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-yellow-700">masyarakat {{ $monografi->nama_desa ?? 'Ketapang Baru' }}</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-yellow-200 to-orange-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>

            <!-- Potensi Statistics -->
            <div class="max-w-4xl mx-auto mb-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 text-center shadow-lg border border-white/50">
                        <div class="text-3xl font-black text-yellow-600 mb-2">{{ $potensiDesa->count() }}</div>
                        <div class="text-sm text-gray-600">Total Potensi</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 text-center shadow-lg border border-white/50">
                        <div class="text-3xl font-black text-green-600 mb-2">{{ $potensiDesa->where('is_unggulan', true)->count() }}</div>
                        <div class="text-sm text-gray-600">Potensi Unggulan</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 text-center shadow-lg border border-white/50">
                        <div class="text-3xl font-black text-blue-600 mb-2">{{ $potensiDesa->groupBy('status')->count() }}</div>
                        <div class="text-sm text-gray-600">Jenis Status</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($potensiDesa as $index => $potensi)
                @php
                    $colors = [
                        'green' => ['from-green-500', 'to-emerald-600', 'bg-green-50'],
                        'blue' => ['from-blue-500', 'to-cyan-600', 'bg-blue-50'],
                        'cyan' => ['from-cyan-500', 'to-blue-600', 'bg-cyan-50'],
                        'indigo' => ['from-indigo-500', 'to-blue-600', 'bg-indigo-50'],
                        'teal' => ['from-teal-500', 'to-green-600', 'bg-teal-50'],
                        'purple' => ['from-purple-500', 'to-indigo-600', 'bg-purple-50'],
                    ];
                    $colorKeys = array_keys($colors);
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $color = $colors[$colorKey];
                @endphp

                <div class="group bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:scale-105 transition-all duration-300 relative" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
                    <!-- Unggulan Badge -->
                    @if($potensi->is_unggulan)
                        <div class="absolute -top-2 -right-2 z-10">
                            <div class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg flex items-center">
                                <i class="fas fa-crown mr-1"></i>
                                UNGGULAN
                            </div>
                        </div>
                    @endif

                    <div class="w-20 h-20 bg-gradient-to-br {{ $color[0] }} {{ $color[1] }} rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="{{ $potensi->icon ?? 'fas fa-star' }} text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">{{ $potensi->nama_potensi }}</h3>
                    <p class="text-gray-600 text-center mb-4">
                        {{ $potensi->deskripsi }}
                    </p>

                    @if($potensi->kategori === 'Pertanian' && isset($potensi->detail))
                        <div class="space-y-2 text-sm text-gray-600">
                            @foreach(explode(',', $potensi->detail) as $item)
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-leaf text-green-500 mr-2"></i>
                                    <span>{{ trim($item) }}</span>
                                </div>
                            @endforeach
                        </div>
                    @elseif($potensi->kategori === 'Perikanan')
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center justify-center">
                                <i class="fas fa-river text-blue-500 mr-2"></i>
                                <span>{{ $potensi->lokasi ?? 'Sungai & Muara' }}</span>
                            </div>
                            @if($potensi->pengelola)
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-users text-cyan-500 mr-2"></i>
                                    <span>{{ $potensi->pengelola }}</span>
                                </div>
                            @endif
                        </div>
                    @endif

                    @if($potensi->nilai_ekonomi && $potensi->nilai_ekonomi > 0)
                        <div class="mt-4 text-center">
                            <div class="text-sm text-gray-500">Nilai Ekonomi</div>
                            <div class="text-lg font-bold text-gray-900">Rp {{ number_format($potensi->nilai_ekonomi, 0, ',', '.') }}</div>
                        </div>
                    @endif

                    <div class="mt-6 space-y-3">
                        <!-- Kategori -->
                        <div class="flex justify-center">
                            <div class="{{ $color[2] }} rounded-full px-4 py-2">
                                <span class="text-{{ $colorKey }}-700 font-semibold text-sm">{{ $potensi->kategori }}</span>
                            </div>
                        </div>

                        <!-- Status & Info -->
                        <div class="flex justify-center items-center space-x-2 text-xs text-gray-500">
                            <div class="flex items-center">
                                @php
                                    $statusColors = [
                                        'aktif' => 'bg-green-500',
                                        'berkembang' => 'bg-blue-500',
                                        'menurun' => 'bg-yellow-500',
                                        'tidak_aktif' => 'bg-red-500'
                                    ];
                                    $statusColor = $statusColors[$potensi->status] ?? 'bg-gray-400';
                                @endphp
                                <div class="w-2 h-2 rounded-full {{ $statusColor }} mr-1"></div>
                                <span class="capitalize">{{ str_replace('_', ' ', $potensi->status) }}</span>
                            </div>
                            @if($potensi->is_unggulan)
                                <span class="text-yellow-600">•</span>
                                <div class="flex items-center text-yellow-600">
                                    <i class="fas fa-star text-xs mr-1"></i>
                                    <span>Unggulan</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            @if($potensiDesa->count() === 0)
                <!-- Default cards jika tidak ada data -->
                <div class="group bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-seedling text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Sektor Pertanian</h3>
                    <p class="text-gray-600 text-center mb-4">
                        Sektor pertanian didominasi oleh <strong>padi, kelapa, dan kelapa sawit</strong> yang menjadi tulang punggung ekonomi desa.
                    </p>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-wheat-awn text-yellow-500 mr-2"></i>
                            <span>Padi (Komoditas Utama)</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <i class="fas fa-tree text-green-500 mr-2"></i>
                            <span>Kelapa</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <i class="fas fa-leaf text-emerald-500 mr-2"></i>
                            <span>Kelapa Sawit</span>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-center">
                        <div class="bg-green-50 rounded-full px-4 py-2">
                            <span class="text-green-700 font-semibold text-sm">3 Komoditas Utama</span>
                        </div>
                    </div>
                </div>

                <div class="group bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-fish text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Perikanan</h3>
                    <p class="text-gray-600 text-center mb-4">
                        Potensi perikanan yang berkembang dengan memanfaatkan sumber daya air yang tersedia di {{ $monografi->nama_desa ?? 'desa' }}.
                    </p>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-river text-blue-500 mr-2"></i>
                            <span>Ikan Air Tawar</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <i class="fas fa-waves text-cyan-500 mr-2"></i>
                            <span>Ikan Laut</span>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-center">
                        <div class="bg-blue-50 rounded-full px-4 py-2">
                            <span class="text-blue-700 font-semibold text-sm">Air Tawar & Laut</span>
                        </div>
                    </div>
                </div>

                <div class="group bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-umbrella-beach text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Wisata Alam</h3>
                    <p class="text-gray-600 text-center mb-4">
                        Potensi wisata alam pantai dengan keindahan pesisir yang menjadi daya tarik utama desa.
                    </p>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-cyan-500 mr-2"></i>
                            <span>Wisata Pantai</span>
                        </div>
                        <div class="flex items-center justify-center">
                            <i class="fas fa-water text-blue-500 mr-2"></i>
                            <span>Pesisir {{ $monografi->nama_desa ?? 'Ketapang Baru' }}</span>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-center">
                        <div class="bg-cyan-50 rounded-full px-4 py-2">
                            <span class="text-cyan-700 font-semibold text-sm">Wisata Pantai</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 pb-32 bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 text-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-4xl lg:text-5xl font-black mb-8">Mari Bersama Membangun <span class="text-yellow-400">Desa</span></h2>
            <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                Bergabunglah dengan kami dalam mewujudkan Desa {{ $monografi->nama_desa ?? 'Ketapang Baru' }} yang lebih maju, mandiri, dan sejahtera.
                Setiap kontribusi Anda sangat berarti untuk kemajuan desa.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('visi.misi') }}" class="btn-accent text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-bullseye mr-2"></i>Lihat Visi & Misi
                </a>
                <a href="{{ route('struktur') }}" class="btn-secondary text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-sitemap mr-2"></i>Struktur Organisasi
                </a>
                <a href="{{ route('kontak') }}" class="btn-secondary text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fab fa-whatsapp mr-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
/* Button Styles */
.btn-accent {
    @apply bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 hover:from-yellow-500 hover:via-orange-600 hover:to-red-600 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-yellow-500/25;
}

.btn-secondary {
    @apply bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105;
}

/* Animation */
.animate-hover-bounce {
    @apply hover:animate-pulse;
}
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Initialize Particles.js for About page - SAME AS HOME
    if (document.getElementById('particles-about')) {
        particlesJS('particles-about', {
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
});
</script>
@endpush
