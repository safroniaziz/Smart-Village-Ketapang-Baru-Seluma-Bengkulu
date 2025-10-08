@extends('layouts.app')

@section('title', 'Tentang Desa - Smart Village Ketapang Baru')

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

    /* Ocean Wave Animations - Enhanced to remove boundaries */
    @keyframes ocean-wave-1 {
        0% { transform: translateX(0) scaleY(1) skewX(0deg); }
        25% { transform: translateX(-150px) scaleY(1.2) skewX(-1deg); }
        50% { transform: translateX(-300px) scaleY(0.9) skewX(1deg); }
        75% { transform: translateX(-450px) scaleY(1.1) skewX(-0.5deg); }
        100% { transform: translateX(-600px) scaleY(1) skewX(0deg); }
    }

    @keyframes ocean-wave-2 {
        0% { transform: translateX(0) scaleY(1) skewX(0deg); }
        25% { transform: translateX(-120px) scaleY(1.3) skewX(1.5deg); }
        50% { transform: translateX(-240px) scaleY(0.8) skewX(-1deg); }
        75% { transform: translateX(-360px) scaleY(1.2) skewX(0.8deg); }
        100% { transform: translateX(-480px) scaleY(1) skewX(0deg); }
    }

    @keyframes ocean-wave-3 {
        0% { transform: translateX(0) scaleY(1) skewX(0deg); }
        25% { transform: translateX(-90px) scaleY(1.4) skewX(-2deg); }
        50% { transform: translateX(-180px) scaleY(0.7) skewX(1.5deg); }
        75% { transform: translateX(-270px) scaleY(1.3) skewX(-1deg); }
        100% { transform: translateX(-360px) scaleY(1) skewX(0deg); }
    }

    @keyframes ocean-wave-4 {
        0% { transform: translateX(0) scaleY(1) skewX(0deg); }
        25% { transform: translateX(-60px) scaleY(1.5) skewX(2deg); }
        50% { transform: translateX(-120px) scaleY(0.6) skewX(-1.5deg); }
        75% { transform: translateX(-180px) scaleY(1.4) skewX(1.2deg); }
        100% { transform: translateX(-240px) scaleY(1) skewX(0deg); }
    }

    /* Wave Animation Classes - Slower and smoother */
    .animate-ocean-wave-1 { animation: ocean-wave-1 12s ease-in-out infinite; }
    .animate-ocean-wave-2 { animation: ocean-wave-2 10s ease-in-out infinite 0.5s; }
    .animate-ocean-wave-3 { animation: ocean-wave-3 8s ease-in-out infinite 1s; }
    .animate-ocean-wave-4 { animation: ocean-wave-4 6s ease-in-out infinite 1.5s; }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-32 lg:pb-36" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100"></div>

    <!-- Particle.js Container for About -->
    <div id="particles-about" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content (Centered) -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-home text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">PROFIL DESA</h2>
                            <p class="text-sm text-blue-100">Kecamatan Semidang Alas Maras</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Desa</span><br>
                        <span class="text-yellow-400 font-extrabold">Ketapang Baru</span>
                    </h1>

                    <!-- Badge Desa Digital -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-star mr-2 text-yellow-300 text-xs"></i>
                            Desa Digital Terdepan
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Membangun desa yang maju, mandiri, dan sejahtera melalui pemanfaatan teknologi digital dan
                        <span class="font-semibold text-yellow-300">pengembangan potensi sumber daya lokal</span>
                    </p>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">1985</div>
                            <div class="text-sm text-blue-100">Tahun Berdiri</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">{{ number_format($totalWarga) }}</div>
                            <div class="text-sm text-blue-100">Jiwa Penduduk</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">{{ $totalDusun }}</div>
                            <div class="text-sm text-blue-100">Dusun</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">24,771</div>
                            <div class="text-sm text-blue-100">Hektar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

    <!-- Wave sebagai border bottom hero -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden">
        <svg class="relative w-full h-32" viewBox="0 0 1200 200" preserveAspectRatio="none">
            <!-- Wave Layer 1 - Back wave -->
            <path fill="#ffffff" fill-opacity="1" d="M-400,100 C-200,80 -100,120 100,100 C300,80 400,120 600,100 C800,80 900,120 1100,100 C1300,80 1400,120 1600,100 L1600,200 L-400,200 Z" class="animate-ocean-wave-1"></path>
            <!-- Wave Layer 2 - Middle wave -->
            <path fill="#f8f9fa" fill-opacity="1" d="M-350,115 C-150,95 -50,135 150,115 C350,95 450,135 650,115 C850,95 950,135 1150,115 C1350,95 1450,135 1650,115 L1650,200 L-350,200 Z" class="animate-ocean-wave-2"></path>
            <!-- Wave Layer 3 - Front wave -->
            <path fill="#ffffff" fill-opacity="1" d="M-300,130 C-100,110 0,150 200,130 C400,110 500,150 700,130 C900,110 1000,150 1200,130 C1400,110 1500,150 1700,130 L1700,200 L-300,200 Z" class="animate-ocean-wave-3"></path>
            <!-- Wave Layer 4 - Foam layer -->
            <path fill="#ffffff" fill-opacity="1" d="M-250,145 C-50,125 50,165 250,145 C450,125 550,165 750,145 C950,125 1050,165 1250,145 C1450,125 1550,165 1750,145 L1750,200 L-250,200 Z" class="animate-ocean-wave-4"></path>
            <!-- Solid base layer -->
            <rect x="-500" y="180" width="2400" height="40" fill="#ffffff"></rect>
        </svg>
    </div>
</section>

<!-- Sejarah Desa Section -->
<section class="py-20 mt-8 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <!-- Floating Decoration -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-200/20 to-indigo-300/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-purple-200/20 to-pink-300/20 rounded-full blur-3xl"></div>

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
                        Desa Ketapang Baru terletak di <strong>Kecamatan Semidang Alas Maras, Kabupaten Seluma, Provinsi Bengkulu</strong> dengan posisi geografis yang strategis. Dengan <strong>Kode Pos 38875</strong> dan <strong>Kode Area 170505</strong>, desa ini memiliki status sebagai <strong>Desa Berkembang</strong>.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Batas wilayah desa meliputi <strong>Muara Timput di Utara</strong>, <strong>Talang Beringin di Timur</strong>, <strong>Padang Bakung di Selatan</strong>, dan <strong>Laut di Barat</strong>. Posisi pesisir ini memberikan keunggulan dalam sektor perikanan dan pariwisata bahari.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Dengan luas wilayah mencapai <strong>24.771 hektar</strong>, jarak tempuh ke <strong>ibukota kecamatan sejauh 3 km (0,2 jam)</strong> dan ke <strong>ibukota kabupaten 55 km (1,5 jam)</strong> menjadikan desa ini mudah diakses untuk berbagai keperluan administrasi dan ekonomi.
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
                            <p class="text-gray-600 text-xs">Muara Timput</p>
                        </div>

                        <div class="text-center p-4 bg-white/80 rounded-2xl shadow-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-arrow-right text-white text-lg"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm">TIMUR</h4>
                            <p class="text-gray-600 text-xs">Talang Beringin</p>
                        </div>

                        <div class="text-center p-4 bg-white/80 rounded-2xl shadow-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-arrow-down text-white text-lg"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm">SELATAN</h4>
                            <p class="text-gray-600 text-xs">Padang Bakung</p>
                        </div>

                        <div class="text-center p-4 bg-white/80 rounded-2xl shadow-sm">
                            <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-waves text-white text-lg"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-sm">BARAT</h4>
                            <p class="text-gray-600 text-xs">Laut</p>
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
                                    <p class="text-gray-600 text-xs">3 km (0,2 jam)</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-city text-white text-xs"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">Ke Kabupaten</p>
                                    <p class="text-gray-600 text-xs">55 km (1,5 jam)</p>
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
                        Luas Wilayah
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up" data-aos-duration="600">
            <!-- Tanah Sawah -->
            <div class="group bg-gradient-to-br from-green-50 to-emerald-100 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-green-200 hover:border-green-300">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-seedling text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Tanah Sawah</h3>
                <div class="bg-green-100 rounded-lg p-3 mb-3">
                    <div class="text-center">
                        <div class="text-2xl font-black text-green-700">80</div>
                        <div class="text-sm text-green-600">Total Hektar</div>
                    </div>
                </div>
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex justify-between">
                        <span>• Tadah Hujan/Rendengan</span>
                        <span class="font-mono font-bold">75 Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Sawah Pasang Surut</span>
                        <span class="font-mono font-bold">5 Ha</span>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>• Irigasi Teknis</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>• Setengah Teknis</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                </div>
            </div>

            <!-- Tanah Kering -->
            <div class="group bg-gradient-to-br from-yellow-50 to-orange-100 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-yellow-200 hover:border-yellow-300">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-mountain text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Tanah Kering</h3>
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex justify-between">
                        <span>• Pekarangan</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Tegal/Kebun</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Ladang/Huma</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Tanah Kosong</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                </div>
            </div>

            <!-- Tanah Basah -->
            <div class="group bg-gradient-to-br from-cyan-50 to-blue-100 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-cyan-200 hover:border-cyan-300">
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-water text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Tanah Basah</h3>
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex justify-between">
                        <span>• Tambak</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Kolam/Empang</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Rawa</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Pasang Surut</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                </div>
            </div>

            <!-- Perkebunan -->
            <div class="group bg-gradient-to-br from-purple-50 to-indigo-100 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-purple-200 hover:border-purple-300">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-tree text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Perkebunan</h3>
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex justify-between">
                        <span>• Kelapa Sawit</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Kelapa</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Karet</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Lainnya</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                </div>
            </div>

            <!-- Hutan -->
            <div class="group bg-gradient-to-br from-emerald-50 to-green-100 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-emerald-200 hover:border-emerald-300">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-green-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-forest text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Kawasan Hutan</h3>
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex justify-between">
                        <span>• Hutan Lindung</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Hutan Produksi</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Hutan Rakyat</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between">
                        <span>• Semak Belukar</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                </div>
            </div>

            <!-- Fasilitas Umum -->
            <div class="group bg-gradient-to-br from-red-50 to-pink-100 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-red-200 hover:border-red-300">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-building text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Fasilitas Umum</h3>
                <div class="bg-red-100 rounded-lg p-3 mb-3">
                    <div class="text-center">
                        <div class="text-2xl font-black text-red-700">1</div>
                        <div class="text-sm text-red-600">Total Hektar</div>
                    </div>
                </div>
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex justify-between">
                        <span>• Tanah Kuburan</span>
                        <span class="font-mono font-bold">1 Ha</span>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>• Kantor Desa</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>• Sekolah</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500">
                        <span>• Masjid/Mushola</span>
                        <span class="font-mono">- Ha</span>
                    </div>
                </div>
            </div>
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
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-map-marked-alt mr-2"></i>
                    Letak Geografis Strategis
                </div>
            </div>

            <h2 class="text-5xl lg:text-6xl font-black mb-6">
                <span class="bg-gradient-to-r from-gray-900 via-blue-800 to-indigo-900 bg-clip-text text-transparent">
                    Posisi & Lokasi
                </span>
            </h2>
            <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full"></div>

            <p class="text-xl text-gray-600 mt-6 max-w-3xl mx-auto leading-relaxed">
                Desa Ketapang Baru terletak di posisi geografis strategis dengan akses pesisir yang menguntungkan
            </p>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 mb-16">
            <!-- Left Content - Boundaries & Details -->
            <div class="xl:col-span-8 space-y-8">
                <!-- Boundary Cards Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6" data-aos="fade-right" data-aos-duration="800">
                    <!-- Enhanced Boundary Card -->
                    <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl hover:scale-105 transition-all duration-500">
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
                                <span class="font-bold text-gray-900">Muara Timput</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-xl border border-yellow-100">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-arrow-right text-white text-sm"></i>
                                    </div>
                                    <span class="font-semibold text-gray-700">Timur</span>
                                </div>
                                <span class="font-bold text-gray-900">Talang Beringin</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl border border-green-100">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-arrow-down text-white text-sm"></i>
                                    </div>
                                    <span class="font-semibold text-gray-700">Selatan</span>
                                </div>
                                <span class="font-bold text-gray-900">Padang Bakung</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-cyan-50 rounded-xl border border-cyan-100">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-cyan-500 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-waves text-white text-sm"></i>
                                    </div>
                                    <span class="font-semibold text-gray-700">Barat</span>
                                </div>
                                <span class="font-bold text-cyan-700">Laut</span>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Detail Card -->
                    <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl hover:scale-105 transition-all duration-500">
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
                                <span class="font-bold text-purple-700 font-mono">24,771 Ha</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-indigo-50 rounded-xl border border-indigo-100">
                                <div class="flex items-center">
                                    <i class="fas fa-mountain text-indigo-500 mr-3"></i>
                                    <span class="font-semibold text-gray-700">Ketinggian</span>
                                </div>
                                <span class="font-bold text-indigo-700 font-mono">3 mdpl</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-emerald-50 rounded-xl border border-emerald-100">
                                <div class="flex items-center">
                                    <i class="fas fa-chart-area text-emerald-500 mr-3"></i>
                                    <span class="font-semibold text-gray-700">Topografi</span>
                                </div>
                                <span class="font-bold text-emerald-700">Datar-Berombak</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-xl border border-blue-100">
                                <div class="flex items-center">
                                    <i class="fas fa-award text-blue-500 mr-3"></i>
                                    <span class="font-semibold text-gray-700">Status</span>
                                </div>
                                <span class="font-bold text-blue-700">Desa Berkembang</span>
                            </div>
                        </div>

                        <!-- Enhanced Street View Link -->
                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <a href="https://www.google.com/maps/@-4.3221828,102.7635049,3a,75y,82.05h,79.18t/data=!3m7!1e1!3m5!1sPFCbe1x0vFzhf8kg4ySPRA!2e0"
                               target="_blank"
                               class="group inline-flex items-center w-full justify-center bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                                <i class="fas fa-street-view mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                                Virtual Tour 360°
                                <i class="fas fa-external-link-alt ml-2 text-sm opacity-80"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Premium Info Cards -->
            <div class="xl:col-span-4 space-y-6" data-aos="fade-left" data-aos-duration="800">
                <!-- Coordinates Card -->
                <div class="group bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 rounded-3xl p-8 text-white shadow-2xl hover:shadow-3xl transition-all duration-500 relative overflow-hidden">
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
                        <p class="text-blue-100 text-sm mb-6">Balai Desa Ketapang Baru</p>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                                <span class="text-blue-100">Latitude</span>
                                <span class="font-mono font-bold">-4.3221828°S</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                                <span class="text-blue-100">Longitude</span>
                                <span class="font-mono font-bold">102.7635049°E</span>
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

                <!-- Climate Card -->
                <div class="group bg-gradient-to-br from-emerald-500 via-green-600 to-teal-700 rounded-3xl p-8 text-white shadow-2xl hover:shadow-3xl transition-all duration-500 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 left-0 w-28 h-28 bg-white rounded-full -translate-y-14 -translate-x-14"></div>
                        <div class="absolute bottom-0 right-0 w-20 h-20 bg-white rounded-full translate-y-10 translate-x-10"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-thermometer-half text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Kondisi Iklim</h3>
                        <p class="text-green-100 text-sm mb-6">Tropis Pesisir</p>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                                <span class="text-green-100">Suhu</span>
                                <span class="font-mono font-bold">23-30°C</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                                <span class="text-green-100">Ketinggian</span>
                                <span class="font-mono font-bold">3m dpl</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Topography Card -->
                <div class="group bg-gradient-to-br from-purple-600 via-violet-700 to-purple-800 rounded-3xl p-8 text-white shadow-2xl hover:shadow-3xl transition-all duration-500 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-white rounded-full -translate-y-12 translate-x-12"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-white rounded-full translate-y-16 -translate-x-16"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-chart-area text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Topografi</h3>
                        <p class="text-purple-100 text-sm mb-6">Bentuk Wilayah</p>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                                <span class="text-purple-100">Datar-Berombak</span>
                                <span class="font-mono font-bold">100%</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-white/10 backdrop-blur-sm rounded-xl">
                                <span class="text-purple-100">Status</span>
                                <span class="font-bold">Desa Berkembang</span>
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
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Berbagai potensi unggulan</span> yang dapat dikembangkan untuk kemajuan dan kesejahteraan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-yellow-700">masyarakat Ketapang Baru</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-yellow-200 to-orange-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Pertanian -->
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

            <!-- Perikanan -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-fish text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Perikanan</h3>
                <p class="text-gray-600 text-center mb-4">
                    Perikanan berkembang dengan memanfaatkan <strong>sungai dan muara untuk ikan air tawar</strong>, serta <strong>pantai untuk ikan laut</strong>.
                </p>
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex items-center justify-center">
                        <i class="fas fa-river text-blue-500 mr-2"></i>
                        <span>Ikan Air Tawar (Sungai & Muara)</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <i class="fas fa-waves text-cyan-500 mr-2"></i>
                        <span>Ikan Laut (Pantai)</span>
                    </div>
                </div>
                <div class="mt-6 flex justify-center">
                    <div class="bg-blue-50 rounded-full px-4 py-2">
                        <span class="text-blue-700 font-semibold text-sm">Air Tawar & Laut</span>
                    </div>
                </div>
            </div>

            <!-- Pariwisata -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-umbrella-beach text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Wisata Alam</h3>
                <p class="text-gray-600 text-center mb-4">
                    <strong>Pantai Ancol Seluma</strong> menjadi destinasi wisata alam utama dengan keindahan pantai yang memukau.
                </p>
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex items-center justify-center">
                        <i class="fas fa-map-marker-alt text-cyan-500 mr-2"></i>
                        <span>Pantai Ancol Seluma</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <i class="fas fa-water text-blue-500 mr-2"></i>
                        <span>Wisata Pantai</span>
                    </div>
                </div>
                <div class="mt-6 flex justify-center">
                    <div class="bg-cyan-50 rounded-full px-4 py-2">
                        <span class="text-cyan-700 font-semibold text-sm">Wisata Pantai</span>
                    </div>
                </div>
            </div>

            <!-- SDM -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Sumber Daya Manusia</h3>
                <p class="text-gray-600 text-center">
                    Masyarakat yang memiliki semangat gotong royong tinggi dan komitmen
                    untuk terus belajar dan berkembang di era digital.
                </p>
                <div class="mt-6 flex justify-center">
                    <div class="bg-indigo-50 rounded-full px-4 py-2">
                        <span class="text-indigo-700 font-semibold text-sm">Gotong Royong</span>
                    </div>
                </div>
            </div>

            <!-- Teknologi -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="500">
                <div class="w-20 h-20 bg-gradient-to-br from-teal-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-laptop text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Smart Village</h3>
                <p class="text-gray-600 text-center">
                    Pemanfaatan teknologi digital untuk meningkatkan pelayanan publik
                    dan mempermudah akses informasi bagi masyarakat.
                </p>
                <div class="mt-6 flex justify-center">
                    <div class="bg-teal-50 rounded-full px-4 py-2">
                        <span class="text-teal-700 font-semibold text-sm">Digitalisasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 text-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-4xl lg:text-5xl font-black mb-8">Mari Bersama Membangun <span class="text-yellow-400">Desa</span></h2>
            <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                Bergabunglah dengan kami dalam mewujudkan Desa Ketapang Baru yang lebih maju, mandiri, dan sejahtera.
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

    // Initialize Particles.js for About page - ENHANCED VISIBILITY
    if (document.getElementById('particles-about')) {
        particlesJS('particles-about', {
            particles: {
                number: {
                    value: 50,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#ffffff'
                },
                shape: {
                    type: 'circle',
                    stroke: {
                        width: 0,
                        color: '#000000'
                    }
                },
                opacity: {
                    value: 0.2,
                    random: false,
                    anim: {
                        enable: false,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 3,
                    random: true,
                    anim: {
                        enable: false,
                        speed: 40,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.15,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'repulse'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 1
                        }
                    },
                    bubble: {
                        distance: 400,
                        size: 40,
                        duration: 2,
                        opacity: 8,
                        speed: 3
                    },
                    repulse: {
                        distance: 200,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 4
                    },
                    remove: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: true
        });
    }
});
</script>
@endpush
