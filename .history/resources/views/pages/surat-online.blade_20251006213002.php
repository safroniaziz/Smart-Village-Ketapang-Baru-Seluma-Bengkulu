@extends('layouts.app-public')

@section('title', 'Surat Online - Smart Village Ketapang Baru')

@push('styles')
<style>
/* Modern Form Styling */
.form-group {
    @apply mb-6;
}

.form-input-wrapper input:focus,
.form-input-wrapper select:focus,
.form-input-wrapper textarea:focus {
    @apply ring-2 ring-blue-500 ring-opacity-50 border-blue-500;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-input-wrapper input:hover,
.form-input-wrapper select:hover,
.form-input-wrapper textarea:hover {
    @apply border-gray-400;
}

/* File upload modern styling */
.form-input-wrapper [type="file"] + label:hover {
    transform: translateY(-2px);
}

/* Modern button effects */
button[type="submit"]:hover {
    @apply shadow-2xl;
    transform: translateY(-1px) scale(1.02);
}

/* Field validation styling */
.form-group.error input,
.form-group.error select,
.form-group.error textarea {
    @apply border-red-400 bg-red-50;
}

.form-group.success input,
.form-group.success select,
.form-group.success textarea {
    @apply border-green-400 bg-green-50;
}

/* Loading state for submit button */
.loading {
    @apply opacity-75 cursor-not-allowed;
}

.loading::after {
    content: '';
    display: inline-block;
    width: 16px;
    height: 16px;
    margin-left: 8px;
    border: 2px solid transparent;
    border-top: 2px solid currentColor;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Page Styling */
.aos-disabled [data-aos] {
    opacity: 1 !important;
    transform: none !important;
}

html {
    scroll-behavior: smooth;
}

/* Sub Navigation Styling */
.stat-subnav {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(229, 231, 235, 0.5);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.subnav-surface {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    padding: 0.75rem;
    border: 1px solid rgba(229, 231, 235, 0.3);
}

.stat-tab {
    display: flex;
    align-items: center;
    padding: 0.75rem 1.5rem;
    border-radius: 0.75rem;
    font-weight: 600;
    font-size: 0.875rem;
    color: #6b7280;
    text-decoration: none;
    transition: all 0.3s ease;
    background: transparent;
    border: 1px solid transparent;
}

.stat-tab:hover {
    background: rgba(59, 130, 246, 0.1);
    color: #1d4ed8;
    border-color: rgba(59, 130, 246, 0.2);
    transform: translateY(-2px);
}

.stat-tab[aria-current="true"] {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    border-color: #1d4ed8;
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
}

.section-nav {
    scroll-margin-top: 100px;
}
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)] flex items-center pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100"></div>

    <!-- Particle.js Container -->
    <div id="particles-surat" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0" data-aos="fade-up" data-aos-delay="300">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-envelope text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">LAYANAN DIGITAL</h2>
                            <p class="text-sm text-blue-100">Surat Online Desa</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Surat</span><br>
                        <span class="text-yellow-400 font-extrabold">Online</span>
                    </h1>

                    <!-- Badge -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-clock mr-2 text-yellow-300 text-xs"></i>
                            Proses Cepat & Transparan
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        Ajukan surat secara online tanpa perlu antri. Sistem terintegrasi untuk pelayanan administrasi yang
                        <span class="font-semibold text-yellow-300">efisien dan transparan</span>
                    </p>
                </div>

                <!-- Enhanced Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 text-center">
                        <div class="text-2xl font-black text-yellow-400 mb-1">7</div>
                        <div class="text-sm text-blue-100">Jenis Surat</div>
                        <div class="text-xs text-blue-200 mt-1">
                            <i class="fas fa-list text-blue-300 mr-1"></i>
                            Layanan tersedia
                        </div>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 text-center">
                        <div class="text-2xl font-black text-yellow-400 mb-1">24/7</div>
                        <div class="text-sm text-blue-100">Layanan Online</div>
                        <div class="text-xs text-blue-200 mt-1">
                            <i class="fas fa-wifi text-green-300 mr-1"></i>
                            Akses kapan saja
                        </div>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 text-center">
                        <div class="text-2xl font-black text-yellow-400 mb-1">3</div>
                        <div class="text-sm text-blue-100">Hari Proses</div>
                        <div class="text-xs text-blue-200 mt-1">
                            <i class="fas fa-lightning-bolt text-orange-300 mr-1"></i>
                            Maksimal waktu
                        </div>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 text-center">
                        <div class="text-2xl font-black text-yellow-400 mb-1">100%</div>
                        <div class="text-sm text-blue-100">Digital</div>
                        <div class="text-xs text-blue-200 mt-1">
                            <i class="fas fa-leaf text-green-300 mr-1"></i>
                            Paperless system
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 relative z-20" data-aos="fade-up" data-aos-delay="800">
                    <a href="#form-section" class="group bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-file-alt mr-2 text-base"></i>
                            <span class="text-base">Ajukan Surat</span>
                        </div>
                    </a>
                    <a href="{{ route('tentang') }}" class="group bg-gradient-to-r from-yellow-400/20 to-orange-500/20 hover:from-yellow-400/30 hover:to-orange-500/30 backdrop-blur-md border-2 border-yellow-400/30 hover:border-yellow-400/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-info-circle mr-2 text-base"></i>
                            <span class="text-base">Profil Desa</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Right Side - Info Card -->
            <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                <!-- Enhanced Info Summary Card -->
                <div class="info-card group relative bg-gradient-to-br from-white via-blue-50 to-indigo-100 backdrop-blur-sm border border-blue-200/50 rounded-3xl p-6 shadow-2xl overflow-hidden hover:shadow-3xl hover:scale-105 hover:border-blue-300/70 cursor-pointer" data-aos="fade-up" data-aos-delay="400">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full -translate-y-16 translate-x-16 group-hover:scale-110 transition-transform duration-700"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-cyan-400 to-blue-500 rounded-full translate-y-12 -translate-x-12 group-hover:scale-110 transition-transform duration-700"></div>
                    </div>

                    <!-- Header Section -->
                    <div class="relative z-10 text-center mb-4">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl mb-3 shadow-lg group-hover:scale-110 group-hover:shadow-blue-500/40 transition-all duration-300">
                            <i class="fas fa-envelope text-white text-xl group-hover:text-blue-100 transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-lg font-black text-gray-800 mb-1 bg-gradient-to-r from-blue-600 to-indigo-700 bg-clip-text text-transparent">Layanan Surat</h3>
                        <p class="text-xs text-gray-600 font-medium">Digital & Transparan</p>
                    </div>

                    <!-- Info Grid -->
                    <div class="relative z-10 grid grid-cols-3 gap-3 mb-4">
                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-center text-xs">
                                <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-emerald-500/30 transition-all duration-300">
                                    <i class="fas fa-file-alt text-white text-xs"></i>
                                </div>
                                <div class="text-center">
                                    <p class="font-bold text-gray-800">{{ count($jenisSuratTersedia) }} Jenis Surat</p>
                                    <p class="text-gray-600">Tersedia Online</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-center text-xs">
                                <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-purple-500/30 transition-all duration-300">
                                    <i class="fas fa-clock text-white text-xs"></i>
                                </div>
                                <div class="text-center">
                                    <p class="font-bold text-gray-800">3 Hari Proses</p>
                                    <p class="text-gray-600">Maksimal Waktu</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-center text-xs">
                                <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-orange-500/30 transition-all duration-300">
                                    <i class="fas fa-check-circle text-white text-xs"></i>
                                </div>
                                <div class="text-center">
                                    <p class="font-bold text-gray-800">Gratis</p>
                                    <p class="text-gray-600">Tanpa Biaya</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Preview Section -->
                    <div class="relative z-10 bg-gradient-to-br from-gray-900 via-blue-900 to-indigo-900 rounded-2xl p-4 shadow-xl group-hover:shadow-2xl group-hover:from-gray-800 group-hover:via-blue-800 group-hover:to-indigo-800 transition-all duration-500">
                        <div class="text-center mb-3">
                            <div class="inline-flex items-center justify-center space-x-2 text-white/90 text-xs font-semibold mb-2">
                                <i class="fas fa-envelope text-cyan-400"></i>
                                <span>Form Online</span>
                            </div>
                        </div>

                        <!-- Form Preview -->
                        <div class="flex flex-col items-center space-y-3">
                            <div class="relative group-hover:scale-110 transition-transform duration-500">
                                <!-- Form Glow Effect -->
                                <div class="absolute inset-0 bg-gradient-to-br from-cyan-400/30 to-blue-500/30 rounded-2xl blur-lg group-hover:from-cyan-400/50 group-hover:to-blue-500/50 transition-all duration-500"></div>
                                <div class="relative bg-white p-4 rounded-2xl shadow-2xl border-2 border-white/20 group-hover:shadow-3xl group-hover:border-white/40 transition-all duration-500">
                                    <div class="text-center">
                                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                                            <i class="fas fa-file-alt text-white text-xl"></i>
                                        </div>
                                        <h4 class="font-bold text-gray-800 text-sm mb-1">Form Digital</h4>
                                        <p class="text-xs text-gray-600">Easy & Fast</p>
                                    </div>
                                </div>
                                <!-- Corner Decorations -->
                                <div class="absolute -top-1 -left-1 w-4 h-4 border-l-2 border-t-2 border-cyan-400 rounded-tl-lg"></div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 border-r-2 border-t-2 border-cyan-400 rounded-tr-lg"></div>
                                <div class="absolute -bottom-1 -left-1 w-4 h-4 border-l-2 border-b-2 border-cyan-400 rounded-bl-lg"></div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 border-r-2 border-b-2 border-cyan-400 rounded-br-lg"></div>
                            </div>

                            <div class="text-center">
                                <div class="flex items-center justify-center space-x-2 mb-1">
                                    <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse group-hover:bg-cyan-300 transition-colors duration-300"></div>
                                    <p class="text-sm text-white font-bold group-hover:text-cyan-100 transition-colors duration-300">Scroll untuk Lihat</p>
                                    <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse group-hover:bg-cyan-300 transition-colors duration-300" style="animation-delay: 0.5s;"></div>
                                </div>
                                <p class="text-xs text-gray-300">Form Lengkap • Upload Dokumen</p>
                            </div>
                        </div>

                        <!-- Action Badge -->
                        <div class="flex justify-center mt-3">
                            <div class="inline-flex items-center bg-gradient-to-r from-cyan-500/20 to-blue-500/20 backdrop-blur-sm border border-cyan-400/30 rounded-full px-3 py-1 group-hover:from-cyan-500/30 group-hover:to-blue-500/30 group-hover:border-cyan-300/50 transition-all duration-300">
                                <i class="fas fa-arrow-down text-cyan-400 text-xs mr-2 group-hover:text-cyan-300 transition-colors duration-300"></i>
                                <span class="text-xs text-cyan-100 font-medium group-hover:text-white transition-colors duration-300">Scroll untuk Lihat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Sub Navigation -->
<nav class="stat-subnav sticky top-20 z-30" aria-label="Navigasi Surat Online">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="subnav-surface">
            <ul class="flex items-center gap-2 sm:gap-3 min-w-max" id="suratSubnav">
                <li>
                    <a href="#ajukan-surat" class="stat-tab" aria-current="false">
                        <i class="fas fa-list mr-2"></i>
                        <span>Jenis Surat</span>
                    </a>
                </li>
                <li>
                    <a href="#panduan" class="stat-tab" aria-current="false">
                        <i class="fas fa-route mr-2"></i>
                        <span>Panduan</span>
                    </a>
                </li>
                <li>
                    <a href="#persyaratan" class="stat-tab" aria-current="false">
                        <i class="fas fa-clipboard-check mr-2"></i>
                        <span>Persyaratan</span>
                    </a>
                </li>
                <li>
                    <a href="#cta" class="stat-tab" aria-current="false">
                        <i class="fas fa-rocket mr-2"></i>
                        <span>Mulai Ajukan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>



<!-- How to Apply -->
<section id="panduan" class="section-nav py-16 bg-white relative overflow-hidden">

    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: linear-gradient(45deg, #e5e7eb 25%, transparent 25%), linear-gradient(-45deg, #e5e7eb 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #e5e7eb 75%), linear-gradient(-45deg, transparent 75%, #e5e7eb 75%); background-size: 30px 30px; background-position: 0 0, 0 15px, 15px -15px, -15px 0px;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <!-- Badge -->
            <div class="inline-flex items-center bg-gradient-to-r from-green-100 to-blue-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-route mr-2 text-green-600"></i>
                Panduan Lengkap
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                <span class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Cara Mengajukan</span> Surat Online
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">Ikuti langkah-langkah sederhana berikut untuk mengajukan surat dengan mudah</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-blue-600">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Pilih & Ajukan</h3>
                <p class="text-gray-600">
                    Pilih jenis surat dari daftar yang tersedia, lalu klik "Ajukan Surat" untuk membuka form pengajuan.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-green-600">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Lengkapi Data</h3>
                <p class="text-gray-600">
                    Isi formulir dengan data yang lengkap dan benar, serta upload dokumen pendukung yang diperlukan.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-purple-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-purple-600">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Submit & Track</h3>
                <p class="text-gray-600">
                    Submit pengajuan dan dapatkan nomor tracking untuk memantau status surat Anda secara real-time.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Requirements -->
<section id="persyaratan" class="section-nav py-16 bg-gray-50 relative overflow-hidden">

    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, #d1d5db 10px, #d1d5db 20px);"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <!-- Badge -->
            <div class="inline-flex items-center bg-gradient-to-r from-red-100 to-orange-100 text-red-800 px-4 py-2 rounded-full text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-clipboard-check mr-2 text-red-600"></i>
                Dokumen Wajib
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                <span class="bg-gradient-to-r from-red-600 to-orange-600 bg-clip-text text-transparent">Persyaratan</span> Umum
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Pastikan Anda memenuhi persyaratan berikut sebelum mengajukan surat
            </p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                            <i class="fas fa-id-card text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Dokumen Wajib</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">KTP Asli (foto)</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Kartu Keluarga (foto)</span></li>

                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Dokumen pendukung lainnya</span></li>
                    </ul>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-100 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                            <i class="fas fa-file-alt text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Ketentuan</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Warga Desa Ketapang Baru</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Data yang diisi benar</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Dokumen lengkap</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Mengikuti prosedur</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 mt-8" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-start">
                <div class="bg-blue-100 rounded-full w-10 h-10 flex items-center justify-center mr-4 mt-1">
                    <i class="fas fa-lightbulb text-blue-600"></i>
                </div>
                <div>
                    <h4 class="font-bold text-blue-900 mb-2">Tips Penting</h4>
                    <p class="text-blue-800">Pastikan semua dokumen sudah dipersiapkan sebelum mengajukan surat online.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Types -->
<section id="ajukan-surat" class="section-nav py-16 bg-gray-50 relative overflow-hidden">

    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #3b82f6 2px, transparent 2px), radial-gradient(circle at 75% 75%, #10b981 2px, transparent 2px); background-size: 50px 50px;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <!-- Badge -->
            <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg mb-6">
                <i class="fas fa-file-alt mr-2 text-yellow-300"></i>
                Layanan Surat Online
            </div>

            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <span class="text-blue-600">Jenis Surat</span> yang Tersedia
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                <span class="font-semibold text-slate-700">Pilih jenis surat yang ingin Anda ajukan</span> <span class="font-semibold text-blue-600">untuk melanjutkan pengajuan</span>
                dengan <span class="font-semibold text-blue-700">layanan digital</span> yang mudah dan cepat
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-envelope text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Pengantar</h3>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Surat pengantar untuk pengurusan KTP, KK, dan dokumen lainnya.
                    </p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pengurusan KTP</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pengurusan KK</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pengurusan Akta</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pengurusan Izin</span></li>
                    </ul>
                    <button onclick="openSuratModal('Surat Pengantar')" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</button>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-file-alt text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Keterangan</h3>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Surat keterangan domisili, usaha, dan keterangan lainnya.
                    </p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Keterangan Domisili</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Keterangan Usaha</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Keterangan Miskin</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Keterangan Lainnya</span></li>
                    </ul>
                    <button onclick="openSuratModal('Surat Keterangan')" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</button>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-yellow-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-thumbs-up text-3xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Rekomendasi</h3>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Surat rekomendasi untuk beasiswa, pekerjaan, dan lainnya.
                    </p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Rekomendasi Beasiswa</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Rekomendasi Kerja</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Rekomendasi Usaha</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Rekomendasi Lainnya</span></li>
                    </ul>
                    <button onclick="openSuratModal('Surat Rekomendasi')" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="400">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-cyan-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-clipboard-check text-3xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Izin</h3>
                    <p class="text-gray-600 mb-6 flex-grow">Surat izin keramaian, mendirikan bangunan, dan izin lainnya.</p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Izin Keramaian</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Izin Mendirikan Bangunan</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Izin Usaha</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Izin Lainnya</span></li>
                    </ul>
                    <button onclick="openSuratModal('Surat Izin')" class="bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</button>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="500">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-red-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-handshake text-3xl text-red-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Pernyataan</h3>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Surat pernyataan untuk berbagai keperluan administrasi.
                    </p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pernyataan Ahli Waris</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pernyataan Belum Menikah</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pernyataan Miskin</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pernyataan Lainnya</span></li>
                    </ul>
                    <button onclick="openSuratModal('Surat Pernyataan')" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</button>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="600">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-gray-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-ellipsis-h text-3xl text-gray-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Lainnya</h3>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Surat-surat lainnya yang tidak termasuk dalam kategori di atas.
                    </p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Surat Kuasa</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Surat Keterangan Lainnya</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Surat Pengantar Lainnya</span></li>
                    </ul>
                    <button onclick="openSuratModal()" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Pengajuan Surat - Konsisten dengan Design Website -->
<div id="suratModal" class="fixed inset-0 z-50 hidden">
    <!-- Simple Backdrop -->
    <div class="absolute inset-0 bg-black/50 transition-all duration-300 opacity-0" id="modalBackdrop"></div>

    <div class="flex items-center justify-center min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)] p-4 relative z-10">
        <!-- Clean Modal - Sama seperti cards di website -->
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl max-h-[90vh] overflow-hidden transform scale-90 transition-all duration-300 border border-gray-100" id="modalContent">

            <!-- Simple Header - Konsisten dengan section headers website -->
            <div class="bg-white border-b border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-1">
                            <i class="fas fa-file-signature text-blue-600 mr-3"></i>
                            Pengajuan Surat Online
                        </h3>
                        <p class="text-gray-600">Lengkapi form pengajuan surat sesuai kebutuhan Anda</p>
                    </div>
                    <button onclick="closeSuratModal()" class="text-gray-400 hover:text-gray-600 text-xl transition-colors duration-200 hover:bg-gray-100 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Simple Progress Steps -->
                <div class="flex items-center mt-4 space-x-4">
                    <div class="flex items-center text-sm">
                        <div class="w-8 h-8 rounded-full bg-blue-600 text-white font-semibold flex items-center justify-center mr-2" id="progressStep1">1</div>
                        <span class="text-gray-700">Pilih Sub-Jenis</span>
                    </div>
                    <div class="flex-1 h-2 bg-gray-200 rounded-full">
                        <div class="h-full bg-blue-600 rounded-full transition-all duration-300" id="progressBar" style="width: 50%"></div>
                    </div>
                    <div class="flex items-center text-sm">
                        <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 font-semibold flex items-center justify-center mr-2" id="progressStep2">2</div>
                        <span class="text-gray-500">Lengkapi Form</span>
                    </div>
                </div>
            </div>

            <!-- Modal Body - Simple & Clean seperti content website -->
            <div class="p-6 overflow-y-auto max-h-[calc(90vh-160px)] bg-gray-50">
                <div id="modalSuratMsg" class="hidden mb-6 rounded-2xl border p-4 text-sm backdrop-blur-sm"></div>

                <!-- Step 1: Pilih Sub Jenis (Skip kategori karena udah dipilih) -->
                <div id="modalStepSelectSubJenis">
                    <div class="mb-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-2" id="modalCategoryTitle">Pilih Jenis Surat Spesifik</h4>
                        <p class="text-gray-600">Pilih jenis surat yang sesuai dengan kebutuhan Anda</p>
                    </div>
                    <div id="modalSubJenisList" class="grid grid-cols-1 md:grid-cols-2 gap-4"></div>
                </div>

                <!-- Step 2: Form Khusus -->
                <div id="modalStepFormKhusus" class="hidden">
                    <div class="mb-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-2" id="modalFormTitle">Lengkapi Data Pengajuan</h4>
                        <p class="text-gray-600">Isi semua data yang diperlukan dengan benar</p>
                        <button type="button" id="modalBackToSubJenis" class="inline-flex items-center text-blue-600 hover:text-blue-700 text-sm mt-3 font-medium transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali ke pilihan surat
                        </button>
                    </div>

                    <form id="modalFormAjukanSurat" class="space-y-6" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="jenis_surat" id="modalHiddenJenisSurat" value="surat_kehilangan">
                        <input type="hidden" name="sub_jenis_surat" id="modalHiddenSubJenisSurat">

                        <div id="modalDynamicFormContainer"></div>

                        <div class="bg-gray-50 rounded-xl p-6 mt-8">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-shield-alt text-green-600 mr-2"></i>
                                    Data Anda aman dan terenkripsi
                                </div>
                                <div class="flex items-center space-x-3">
                                    <button type="button" onclick="closeSuratModal()" class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 hover:border-gray-400 font-semibold transition-all duration-200 transform hover:scale-105">
                                        <i class="fas fa-times mr-2"></i>
                                        Batal
                                    </button>
                                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl hover:from-blue-700 hover:to-blue-800 font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        Kirim Pengajuan
                                    </button>
                                </div>
                            </div>
                        </div>

                            <div id="modalSuratSuccess" class="hidden mt-4 p-4 bg-green-50 border border-green-200 rounded-xl">
                                <div class="flex items-center">
                                    <div class="bg-green-100 rounded-full w-8 h-8 flex items-center justify-center mr-3">
                                        <i class="fas fa-check text-green-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-green-900">Pengajuan Berhasil Dikirim!</p>
                                        <p class="text-sm text-green-700">
                                            Nomor Tracking: <span id="modalSuratTrack" class="font-mono font-bold text-green-800"></span>
                                            <button id="modalCopySuratTrack" type="button" class="ml-2 text-green-600 underline hover:text-green-800 text-xs">Salin</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<section id="cta" class="section-nav py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white relative overflow-hidden">

    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 80%, white 2px, transparent 2px), radial-gradient(circle at 80% 20%, white 2px, transparent 2px), radial-gradient(circle at 40% 40%, white 2px, transparent 2px); background-size: 60px 60px;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center bg-white bg-opacity-20 text-white px-4 py-2 rounded-full text-sm font-semibold mb-6" data-aos="fade-up">
                <i class="fas fa-rocket mr-2"></i>
                Layanan Terdepan
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-6" data-aos="fade-up">
                <span class="bg-gradient-to-r from-yellow-300 to-pink-300 bg-clip-text text-transparent">Siap Mengajukan</span> Surat?
            </h2>
            <p class="text-xl mb-8 text-blue-100" data-aos="fade-up" data-aos-delay="100">
                Proses pengajuan surat online yang mudah, cepat, dan terpercaya.
                <br>Mulai ajukan surat Anda sekarang juga!
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
                <a href="#ajukan-surat" class="bg-white text-blue-600 hover:bg-gray-100 font-semibold py-4 px-8 rounded-lg transition-all duration-300 inline-flex items-center justify-center transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-file-plus mr-3"></i>Ajukan Surat Sekarang
                </a>
                <a href="#persyaratan" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 font-semibold py-4 px-8 rounded-lg transition-all duration-300 inline-flex items-center justify-center transform hover:scale-105">
                    <i class="fas fa-clipboard-check mr-3"></i>Lihat Persyaratan
                </a>
            </div>

            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12" data-aos="fade-up" data-aos-delay="300">
                <div class="text-center">
                    <div class="text-3xl font-bold text-yellow-300 mb-2">500+</div>
                    <div class="text-blue-100">Surat Diproses</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-yellow-300 mb-2">24 Jam</div>
                    <div class="text-blue-100">Waktu Proses</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-yellow-300 mb-2">100%</div>
                    <div class="text-blue-100">Digital</div>
                </div>
            </div>


        </div>
    </div>
</section>

<!-- Form Section - Yang Kurang! -->
<section id="form-section" class="py-20 bg-gradient-to-br from-blue-50 via-white to-green-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, #3b82f6 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <div class="inline-flex items-center bg-gradient-to-r from-blue-100 to-green-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-edit mr-2 text-blue-600"></i>
                Form Pengajuan
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                <span class="bg-gradient-to-r from-blue-600 to-green-600 bg-clip-text text-transparent">Ajukan Surat</span> Sekarang
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">Isi form di bawah ini untuk mengajukan surat yang Anda butuhkan</p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-gradient-to-r from-blue-600 to-green-600 px-8 py-6">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-file-alt mr-3"></i>
                        Form Pengajuan Surat Online
                    </h3>
                    <p class="text-blue-100 mt-2">Pastikan data yang Anda masukkan sudah benar</p>
                </div>

                <form id="suratForm" action="{{ route('surat.online.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    
                    <!-- Data Pemohon -->
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-user mr-2 text-blue-600"></i>
                            Data Pemohon
                        </h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                <div class="form-input-wrapper">
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" required
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                        placeholder="Masukkan nama lengkap">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">NIK</label>
                                <div class="form-input-wrapper">
                                    <input type="text" id="nik" name="nik" maxlength="16" pattern="[0-9]{16}"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                        placeholder="16 digit NIK">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-2">No. WhatsApp</label>
                                <div class="form-input-wrapper">
                                    <input type="tel" id="no_hp" name="no_hp" required
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                        placeholder="08xxxxxxxxxx">
                                </div>
                            </div>

                            <div class="form-group md:col-span-1">
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                                <div class="form-input-wrapper">
                                    <textarea id="alamat" name="alamat" rows="3" required
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                        placeholder="Alamat lengkap sesuai KTP"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jenis Surat -->
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-file-signature mr-2 text-green-600"></i>
                            Jenis Surat
                        </h4>
                        
                        <div class="form-group">
                            <label for="jenis_surat" class="block text-sm font-medium text-gray-700 mb-2">Pilih Jenis Surat</label>
                            <div class="form-input-wrapper">
                                <select id="jenis_surat" name="jenis_surat" required
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    <option value="">-- Pilih Jenis Surat --</option>
                                    @foreach($jenisSuratTersedia as $jenis)
                                        <option value="{{ $jenis }}">{{ $jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keperluan" class="block text-sm font-medium text-gray-700 mb-2">Keperluan</label>
                            <div class="form-input-wrapper">
                                <textarea id="keperluan" name="keperluan" rows="3" required
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Jelaskan untuk keperluan apa surat ini digunakan"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Lampiran -->
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-paperclip mr-2 text-purple-600"></i>
                            Lampiran (Opsional)
                        </h4>
                        
                        <div class="form-group">
                            <label for="lampiran" class="block text-sm font-medium text-gray-700 mb-2">Upload Dokumen Pendukung</label>
                            <div class="form-input-wrapper">
                                <input type="file" id="lampiran" name="lampiran" accept=".pdf,.jpg,.jpeg,.png"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, JPEG, PNG (Max: 2MB)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-center pt-6 border-t border-gray-200">
                        <button type="submit" id="submitBtn"
                            class="bg-gradient-to-r from-blue-600 to-green-600 hover:from-blue-700 hover:to-green-700 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center">
                            <i class="fas fa-paper-plane mr-2"></i>
                            <span>Ajukan Surat</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- AOS via CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- Particles.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }
    // Initialize Particles.js - SAME AS HOME
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-surat', {
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

<script>
// Sub Navigation Active State
document.addEventListener('DOMContentLoaded', function() {
    const subnavLinks = document.querySelectorAll('#suratSubnav .stat-tab');
    const sections = document.querySelectorAll('.section-nav');

    function updateActiveNav() {
        const scrollPos = window.scrollY + 120; // Adjust for sticky nav
        sections.forEach((section, index) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                subnavLinks.forEach(link => link.setAttribute('aria-current', 'false'));

                // Map sections to subnav links correctly
                const sectionId = section.id;
                const correspondingLink = document.querySelector(`#suratSubnav a[href="#${sectionId}"]`);
                if (correspondingLink) {
                    correspondingLink.setAttribute('aria-current', 'true');
                }
            }
        });
    }

    // Click also sets active immediately
    subnavLinks.forEach(link => {
        link.addEventListener('click', function() {
            subnavLinks.forEach(l => l.setAttribute('aria-current', 'false'));
            this.setAttribute('aria-current', 'true');
        });
    });

    window.addEventListener('scroll', updateActiveNav);
    updateActiveNav();
});
</script>

<script>
// Ajukan Surat AJAX
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formAjukanSurat');
    const msg = document.getElementById('suratMsg');
    const successBox = document.getElementById('suratSuccess');
    const trackSpan = document.getElementById('suratTrack');
    const copyBtn = document.getElementById('copySuratTrack');

    function showMsg(type, text) {
        if (!msg) return;
        const map = { success: 'border-green-200 bg-green-50 text-green-800', error: 'border-red-200 bg-red-50 text-red-800', info: 'border-blue-200 bg-blue-50 text-blue-800' };
        msg.className = 'mt-2 mb-4 rounded-xl border p-4 text-sm ' + (map[type] || map.info);
        msg.textContent = text;
        msg.classList.remove('hidden');
    }

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            showMsg('info', 'Mengirim pengajuan...');

            const fd = new FormData(form);
            fetch('{{ route('surat.online.store') }}', {
                method: 'POST',
                body: fd,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(async res => {
                const ct = res.headers.get('content-type') || '';
                const data = ct.includes('application/json') ? await res.json() : { success:false, message:'Respon tidak valid' };
                if (!res.ok || !data.success) {
                    throw new Error(data.message || 'Gagal mengirim pengajuan');
                }
                showMsg('success', data.message);
                if (successBox && trackSpan) {
                    trackSpan.textContent = data.tracking_number || '-';
                    successBox.classList.remove('hidden');
                }
                form.reset();
            })
            .catch(err => {
                showMsg('error', err.message || 'Gagal mengirim pengajuan');
            });
        });

        if (copyBtn && trackSpan) {
            copyBtn.addEventListener('click', function() {
                navigator.clipboard.writeText(trackSpan.textContent || '').then(() => {
                    showMsg('success', 'Nomor tracking disalin.');
                });
            });
        }
    }
});

// Modal Surat Logic
document.addEventListener('DOMContentLoaded', function() {
    let currentModalStep = 1;
    let selectedJenis = '';
    let selectedSubJenis = '';

    // User data from auth (will be auto-filled)
    const userData = {
        nama: '{{ Auth::user()->name ?? "" }}',
        nik: '{{ Auth::user()->nik ?? "" }}',
        tempat_lahir: '{{ Auth::user()->tempat_lahir ?? "" }}',
        tanggal_lahir: '{{ Auth::user()->tanggal_lahir ?? "" }}',
        alamat: '{{ Auth::user()->alamat ?? "" }}',
        rt_rw: '{{ Auth::user()->rt ?? "" }}/{{ Auth::user()->rw ?? "" }}',
        no_hp: '{{ Auth::user()->no_hp ?? "" }}',
        pekerjaan: '{{ Auth::user()->pekerjaan ?? "" }}'
    };

    // Data sub-jenis surat
    const subJenisData = {
        'Surat Pengantar': [
            { id: 'pengantar_ktp', name: 'Pengantar KTP', desc: 'Untuk pengurusan KTP baru/hilang', icon: 'fas fa-id-card', color: 'blue' },
            { id: 'pengantar_kk', name: 'Pengantar KK', desc: 'Untuk pengurusan Kartu Keluarga', icon: 'fas fa-users', color: 'blue' },
            { id: 'pengantar_nikah', name: 'Pengantar Nikah', desc: 'Untuk persiapan pernikahan', icon: 'fas fa-heart', color: 'pink' },
            { id: 'pengantar_akta', name: 'Pengantar Akta Kelahiran', desc: 'Untuk pengurusan akta kelahiran', icon: 'fas fa-baby', color: 'green' },
            { id: 'pengantar_sekolah', name: 'Pengantar Sekolah/Kuliah', desc: 'Untuk pendaftaran sekolah/kuliah', icon: 'fas fa-graduation-cap', color: 'purple' }
        ],
        'Surat Keterangan': [
            { id: 'ket_domisili', name: 'Keterangan Domisili', desc: 'Bukti tempat tinggal', icon: 'fas fa-home', color: 'green' },
            { id: 'ket_usaha', name: 'Keterangan Usaha', desc: 'Bukti memiliki usaha', icon: 'fas fa-store', color: 'orange' },
            { id: 'ket_tidak_mampu', name: 'Keterangan Tidak Mampu', desc: 'Bukti kondisi ekonomi', icon: 'fas fa-hand-holding-heart', color: 'red' },
            { id: 'ket_belum_menikah', name: 'Keterangan Belum Menikah', desc: 'Bukti status belum menikah', icon: 'fas fa-user', color: 'gray' },
            { id: 'ket_penghasilan', name: 'Keterangan Penghasilan', desc: 'Bukti besaran penghasilan', icon: 'fas fa-money-bill', color: 'yellow' },
            { id: 'surat_kehilangan', name: 'Keterangan Kehilangan', desc: 'Untuk keperluan kehilangan barang/dokumen', icon: 'fas fa-search', color: 'purple' }
        ],
        'Surat Izin': [
            { id: 'izin_keramaian', name: 'Izin Keramaian', desc: 'Untuk acara/event', icon: 'fas fa-calendar-alt', color: 'cyan' },
            { id: 'izin_bangunan', name: 'Izin Mendirikan Bangunan', desc: 'Untuk pembangunan', icon: 'fas fa-building', color: 'orange' },
            { id: 'izin_usaha', name: 'Izin Usaha Mikro', desc: 'Untuk usaha kecil', icon: 'fas fa-briefcase', color: 'blue' },
            { id: 'izin_kegiatan', name: 'Izin Kegiatan', desc: 'Untuk kegiatan masyarakat', icon: 'fas fa-clipboard-check', color: 'green' }
        ],
        'Surat Pernyataan': [
            { id: 'pernyataan_ahli_waris', name: 'Pernyataan Ahli Waris', desc: 'Bukti status ahli waris', icon: 'fas fa-users-cog', color: 'red' },
            { id: 'pernyataan_belum_menikah', name: 'Pernyataan Belum Menikah', desc: 'Pernyataan status belum menikah', icon: 'fas fa-user-times', color: 'gray' },
            { id: 'pernyataan_tanggung_jawab', name: 'Pernyataan Tanggung Jawab', desc: 'Untuk berbagai keperluan', icon: 'fas fa-handshake', color: 'blue' }
        ],
        'Surat Rekomendasi': [
            { id: 'rekomendasi_beasiswa', name: 'Rekomendasi Beasiswa', desc: 'Untuk pengajuan beasiswa', icon: 'fas fa-graduation-cap', color: 'yellow' },
            { id: 'rekomendasi_kerja', name: 'Rekomendasi Kerja', desc: 'Untuk melamar pekerjaan', icon: 'fas fa-briefcase', color: 'blue' },
            { id: 'rekomendasi_usaha', name: 'Rekomendasi Usaha', desc: 'Untuk pengembangan usaha', icon: 'fas fa-chart-line', color: 'green' }
        ],
        'Surat Lainnya': [
            { id: 'surat_kuasa', name: 'Surat Kuasa', desc: 'Untuk pemberian kuasa', icon: 'fas fa-handshake', color: 'gray' },
            { id: 'surat_keterangan_lainnya', name: 'Surat Keterangan Lainnya', desc: 'Untuk keperluan khusus', icon: 'fas fa-file-alt', color: 'gray' },
            { id: 'surat_pengantar_lainnya', name: 'Surat Pengantar Lainnya', desc: 'Untuk keperluan khusus', icon: 'fas fa-envelope', color: 'gray' }
        ]
    };

    // Form templates untuk setiap jenis surat (hanya yang penting)
    const formTemplates = {
        'pengantar_ktp': {
            title: 'Surat Pengantar KTP',
            fields: [
                { name: 'keperluan', label: 'Keperluan', type: 'select', icon: 'fas fa-clipboard', required: true, options: ['KTP Baru', 'KTP Hilang', 'KTP Rusak', 'Perpanjangan KTP'] },
                { name: 'keterangan_tambahan', label: 'Keterangan Tambahan', type: 'textarea', icon: 'fas fa-sticky-note', required: false },
                { name: 'lampiran', label: 'Lampiran (KK, Foto)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'ket_domisili': {
            title: 'Surat Keterangan Domisili',
            fields: [
                { name: 'lama_tinggal', label: 'Lama Tinggal (tahun)', type: 'number', icon: 'fas fa-calendar', required: true },
                { name: 'status_tempat_tinggal', label: 'Status Tempat Tinggal', type: 'select', icon: 'fas fa-home', required: true, options: ['Milik Sendiri', 'Sewa', 'Kontrak', 'Menumpang', 'Warisan'] },
                { name: 'keperluan', label: 'Keperluan', type: 'textarea', icon: 'fas fa-clipboard', required: true },
                { name: 'lampiran', label: 'Lampiran (KTP, KK)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'ket_usaha': {
            title: 'Surat Keterangan Usaha',
            fields: [
                { name: 'nama_usaha', label: 'Nama Usaha', type: 'text', icon: 'fas fa-store', required: true },
                { name: 'jenis_usaha', label: 'Jenis Usaha', type: 'select', icon: 'fas fa-briefcase', required: true, options: ['Dagang', 'Jasa', 'Industri', 'Pertanian', 'Perikanan', 'Lainnya'] },
                { name: 'alamat_usaha', label: 'Alamat Usaha', type: 'textarea', icon: 'fas fa-map-marker-alt', required: true },
                { name: 'modal_usaha', label: 'Modal Usaha (Rp)', type: 'number', icon: 'fas fa-money-bill', required: true },
                { name: 'mulai_usaha', label: 'Mulai Usaha', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'keperluan', label: 'Keperluan', type: 'textarea', icon: 'fas fa-clipboard', required: true },
                { name: 'lampiran', label: 'Lampiran (Foto Usaha, KTP)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'izin_keramaian': {
            title: 'Surat Izin Keramaian',
            fields: [
                { name: 'nama_acara', label: 'Nama Acara', type: 'text', icon: 'fas fa-calendar-alt', required: true },
                { name: 'jenis_acara', label: 'Jenis Acara', type: 'select', icon: 'fas fa-list', required: true, options: ['Hajatan/Resepsi', 'Syukuran', 'Arisan', 'Rapat', 'Pelatihan', 'Lainnya'] },
                { name: 'tanggal_acara', label: 'Tanggal Acara', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'waktu_mulai', label: 'Waktu Mulai', type: 'time', icon: 'fas fa-clock', required: true },
                { name: 'waktu_selesai', label: 'Waktu Selesai', type: 'time', icon: 'fas fa-clock', required: true },
                { name: 'tempat_acara', label: 'Tempat/Alamat Acara', type: 'textarea', icon: 'fas fa-map-marker-alt', required: true },
                { name: 'jumlah_peserta', label: 'Perkiraan Jumlah Peserta', type: 'number', icon: 'fas fa-users', required: true },
                { name: 'keterangan_acara', label: 'Keterangan Acara', type: 'textarea', icon: 'fas fa-info-circle', required: false },
                { name: 'lampiran', label: 'Lampiran (Proposal, dll)', type: 'file', icon: 'fas fa-paperclip', required: false }
            ]
        },
        'rekomendasi_beasiswa': {
            title: 'Surat Rekomendasi Beasiswa',
            fields: [
                { name: 'jenjang_pendidikan', label: 'Jenjang Pendidikan', type: 'select', icon: 'fas fa-graduation-cap', required: true, options: ['SMA/SMK', 'D3', 'S1', 'S2', 'S3'] },
                { name: 'nama_sekolah', label: 'Nama Sekolah/Universitas', type: 'text', icon: 'fas fa-university', required: true },
                { name: 'jurusan', label: 'Jurusan/Program Studi', type: 'text', icon: 'fas fa-book', required: true },
                { name: 'tahun_masuk', label: 'Tahun Masuk', type: 'number', icon: 'fas fa-calendar', required: true },
                { name: 'prestasi', label: 'Prestasi yang Pernah Diraih', type: 'textarea', icon: 'fas fa-trophy', required: false },
                { name: 'alasan_pengajuan', label: 'Alasan Pengajuan Beasiswa', type: 'textarea', icon: 'fas fa-heart', required: true },
                { name: 'lampiran', label: 'Lampiran (Transkrip, Sertifikat)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'surat_kehilangan': {
            title: 'Surat Keterangan Kehilangan',
            fields: [
                { name: 'nama', label: 'Nama Lengkap', type: 'text', icon: 'fas fa-user', required: true, placeholder: 'Masukkan nama lengkap sesuai KTP' },
                { name: 'nik', label: 'NIK', type: 'text', icon: 'fas fa-id-card', required: true, maxlength: 16, placeholder: 'Masukkan 16 digit NIK' },
                { name: 'no_hp', label: 'No. HP', type: 'text', icon: 'fas fa-phone', required: true, placeholder: 'Masukkan nomor HP yang aktif' },
                { name: 'alamat', label: 'Alamat', type: 'textarea', icon: 'fas fa-map-marker-alt', required: true, placeholder: 'Masukkan alamat lengkap' },
                { name: 'jenis_dokumen', label: 'Jenis Dokumen/Barang yang Hilang', type: 'select', icon: 'fas fa-id-card', required: true, options: ['KTP', 'KK', 'SIM', 'BPJS', 'Akta Kelahiran', 'Ijazah', 'Sertifikat', 'Dompet', 'HP/Smartphone', 'Motor', 'Mobil', 'Lainnya'] },
                { name: 'nama_barang_lainnya', label: 'Nama Barang (jika pilih Lainnya)', type: 'text', icon: 'fas fa-tag', required: false, placeholder: 'Contoh: Jam tangan, Tas, Sepatu, dll' },
                { name: 'nomor_dokumen', label: 'Nomor Dokumen/Barang', type: 'text', icon: 'fas fa-hashtag', required: false, placeholder: 'Contoh: 1705052511190005 (untuk KK), 1234567890123456 (untuk KTP), atau kosongkan jika tidak ada nomor' },
                { name: 'tempat_kehilangan', label: 'Tempat Kehilangan', type: 'textarea', icon: 'fas fa-map-marker-alt', required: true, placeholder: 'Jelaskan detail lokasi kehilangan (conoh: Di pasar saat belanja, Di rumah kemungkinan terjatuh, Di jalan saat berjalan kaki, dll)' },
                { name: 'waktu_kehilangan', label: 'Perkiraan Waktu Kehilangan', type: 'select', icon: 'fas fa-calendar', required: true, options: ['1 Bulan yang lalu', '2 Bulan yang lalu', '3 Bulan yang lalu', '4 Bulan yang lalu', '5 Bulan yang lalu', '6 Bulan yang lalu', 'Lebih dari 6 Bulan', 'Lainnya'] },
                { name: 'keterangan_waktu', label: 'Keterangan Waktu (jika pilih Lainnya)', type: 'text', icon: 'fas fa-clock', required: false, placeholder: 'Contoh: 2 minggu yang lalu, 1 tahun yang lalu' },
                { name: 'keperluan', label: 'Keperluan Surat', type: 'textarea', icon: 'fas fa-clipboard', required: true, placeholder: 'Jelaskan untuk apa surat ini diperlukan (contoh: Untuk pengurusan KK baru, Untuk keperluan administrasi, Untuk klaim asuransi, dll)' },
                { name: 'lampiran', label: 'Lampiran (Foto Dokumen/Barang - Opsional)', type: 'file', icon: 'fas fa-paperclip', required: false }
            ]
        }
    };

        // Modal elements
    const modal = document.getElementById('suratModal');
    const modalContent = document.getElementById('modalContent');
    const modalBackdrop = document.getElementById('modalBackdrop');
    const modalStepSelectSubJenis = document.getElementById('modalStepSelectSubJenis');
    const modalStepFormKhusus = document.getElementById('modalStepFormKhusus');
    const modalSubJenisList = document.getElementById('modalSubJenisList');
    const modalDynamicFormContainer = document.getElementById('modalDynamicFormContainer');
    const modalFormTitle = document.getElementById('modalFormTitle');
    const modalCategoryTitle = document.getElementById('modalCategoryTitle');

    // Modal functions
    window.openSuratModal = function(jenisParam = null) {
        if (jenisParam) {
            // Jika ada parameter, langsung ke sub-jenis
            selectedJenis = jenisParam;
            modalCategoryTitle.textContent = `Pilih Sub-Jenis ${jenisParam}`;
            showModalSubJenis(jenisParam);
        } else {
            // Jika tidak ada parameter, tampilkan semua kategori
            selectedJenis = '';
            modalCategoryTitle.textContent = 'Pilih Kategori Surat';
            showAllCategories();
        }

        modal.classList.remove('hidden');
        setTimeout(() => {
            modalBackdrop.classList.remove('opacity-0');
            modalContent.classList.remove('scale-90');
            modalContent.classList.add('scale-100');
        }, 10);
        document.body.style.overflow = 'hidden';
        showModalStep(1);
        updateProgressSteps(1);
    };

    window.closeSuratModal = function() {
        modalBackdrop.classList.add('opacity-0');
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-90');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
            resetModal();
        }, 300);
    };

    function resetModal() {
        selectedJenis = '';
        selectedSubJenis = '';
        currentModalStep = 1;
        showModalStep(1);
        updateProgressSteps(1);
    }

    // Modal navigation
    document.getElementById('modalBackToSubJenis')?.addEventListener('click', () => {
        showModalStep(1);
        updateProgressSteps(1);
    });

    function showModalStep(step) {
        modalStepSelectSubJenis.classList.add('hidden');
        modalStepFormKhusus.classList.add('hidden');

        if (step === 1) {
            modalStepSelectSubJenis.classList.remove('hidden');
            currentModalStep = 1;
        } else if (step === 2) {
            modalStepFormKhusus.classList.remove('hidden');
            currentModalStep = 2;

            // Add NIK validation when form is shown
            setTimeout(() => {
                addNIKValidation();
            }, 100);
        }
    }

        function updateProgressSteps(step) {
        const step1 = document.getElementById('progressStep1');
        const step2 = document.getElementById('progressStep2');
        const progressBar = document.getElementById('progressBar');

        if (step === 1) {
            step1.className = 'w-8 h-8 rounded-full bg-blue-600 text-white font-semibold flex items-center justify-center mr-2';
            step2.className = 'w-8 h-8 rounded-full bg-gray-200 text-gray-600 font-semibold flex items-center justify-center mr-2';
            progressBar.style.width = '50%';
        } else if (step === 2) {
            step1.className = 'w-8 h-8 rounded-full bg-green-600 text-white font-semibold flex items-center justify-center mr-2';
            step2.className = 'w-8 h-8 rounded-full bg-blue-600 text-white font-semibold flex items-center justify-center mr-2';
            progressBar.style.width = '100%';
        }
    }

    // Tampilkan semua kategori surat
    function showAllCategories() {
        const categories = [
            { name: 'Surat Pengantar', icon: 'fas fa-envelope', color: 'blue', desc: 'Surat pengantar untuk berbagai keperluan' },
            { name: 'Surat Keterangan', icon: 'fas fa-file-alt', color: 'green', desc: 'Surat keterangan resmi desa' },
            { name: 'Surat Izin', icon: 'fas fa-clipboard-check', color: 'cyan', desc: 'Surat izin untuk kegiatan/usaha' },
            { name: 'Surat Pernyataan', icon: 'fas fa-handshake', color: 'red', desc: 'Surat pernyataan resmi' },
            { name: 'Surat Rekomendasi', icon: 'fas fa-star', color: 'yellow', desc: 'Surat rekomendasi untuk berbagai keperluan' }
        ];

        modalSubJenisList.innerHTML = categories.map(cat => `
            <div class="bg-white p-4 border border-gray-200 rounded-xl hover:border-${cat.color}-500 hover:bg-${cat.color}-50 transition-all duration-200 cursor-pointer category-card" data-category="${cat.name}">
                <div class="flex items-center">
                    <div class="bg-${cat.color}-600 rounded-lg w-12 h-12 flex items-center justify-center mr-4 text-white">
                        <i class="${cat.icon}"></i>
                    </div>
                    <div>
                        <h6 class="font-semibold text-gray-900 mb-1">${cat.name}</h6>
                        <p class="text-sm text-gray-600">${cat.desc}</p>
                    </div>
                </div>
            </div>
        `).join('');

        // Add event listeners to category cards
        document.querySelectorAll('.category-card').forEach(card => {
            card.addEventListener('click', function() {
                const category = this.dataset.category;
                selectedJenis = category;
                modalCategoryTitle.textContent = `Pilih Sub-Jenis ${category}`;
                showModalSubJenis(category);
            });
        });
    }

    // NIK Validation and Auto-fill Functions
    function validateNIK(nik) {
        if (nik.length !== 16) {
            return { valid: false, message: 'NIK harus 16 digit' };
        }
        if (!/^\d+$/.test(nik)) {
            return { valid: false, message: 'NIK hanya boleh berisi angka' };
        }
        return { valid: true };
    }

    function checkNIKInDatabase(nik) {
        return fetch('/surat-kehilangan/validate-nik', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ nik: nik })
        })
        .then(response => response.json());
    }

    function autoFillWargaData(wargaData) {
        // Auto-fill form fields if they exist
        const namaField = document.querySelector('input[name="nama"]');
        const nikField = document.querySelector('input[name="nik"]');
        const noHpField = document.querySelector('input[name="no_hp"]');
        const alamatField = document.querySelector('input[name="alamat"]');

        if (namaField) namaField.value = wargaData.nama;
        if (nikField) nikField.value = wargaData.nik;
        if (noHpField) noHpField.value = wargaData.no_hp || '';
        if (alamatField) alamatField.value = `${wargaData.alamat}, RT ${wargaData.rt}/RW ${wargaData.rw}`;

        // Show success message
        showNotification('success', 'Data warga berhasil ditemukan dan diisi otomatis!');
    }

    // Add NIK validation to form fields
    function addNIKValidation() {
        const nikField = document.querySelector('input[name="nik"]');
        if (nikField) {
            nikField.addEventListener('blur', function() {
                const nik = this.value.trim();
                if (nik.length === 16) {
                    // Show loading state
                    this.classList.add('loading');

                    checkNIKInDatabase(nik)
                        .then(data => {
                            if (data.success) {
                                this.classList.remove('loading');
                                this.classList.add('success');
                                autoFillWargaData(data.data);
                            } else {
                                this.classList.remove('loading');
                                this.classList.add('error');
                                showNotification('error', data.message);
                            }
                        })
                        .catch(error => {
                            this.classList.remove('loading');
                            this.classList.add('error');
                            showNotification('error', 'Gagal memvalidasi NIK');
                        });
                }
            });
        }
    }

        function showModalSubJenis(jenis) {
        const subJenisItems = subJenisData[jenis] || [];
        modalSubJenisList.innerHTML = subJenisItems.map(item => `
            <div class="bg-white p-4 border border-gray-200 rounded-xl hover:border-blue-500 hover:bg-blue-50 transition-all duration-200 cursor-pointer modal-sub-jenis-btn" data-subjenis="${item.id}">
                <div class="flex items-center">
                    <div class="bg-blue-600 rounded-lg w-10 h-10 flex items-center justify-center mr-3 text-white">
                        <i class="${item.icon}"></i>
                    </div>
                    <div>
                        <h6 class="font-semibold text-gray-900 mb-1">${item.name}</h6>
                        <p class="text-sm text-gray-600">${item.desc}</p>
                    </div>
                </div>
            </div>
        `).join('');

        // Add event listeners to modal sub jenis buttons
        document.querySelectorAll('.modal-sub-jenis-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                selectedSubJenis = this.dataset.subjenis;
                generateModalForm(selectedSubJenis);
                showModalStep(2);
                updateProgressSteps(2);
            });
        });
    }

    function generateModalForm(subJenis) {
        const template = formTemplates[subJenis];
        if (!template) {
            modalDynamicFormContainer.innerHTML = '<p class="text-red-600 text-sm">Form template not found</p>';
            return;
        }

        modalFormTitle.textContent = `Lengkapi ${template.title}`;
        document.getElementById('modalHiddenJenisSurat').value = selectedJenis;
        document.getElementById('modalHiddenSubJenisSurat').value = selectedSubJenis;

        const fieldsHtml = template.fields.map(field => {
            let inputHtml = '';

            if (field.type === 'select') {
                const options = field.options.map(opt => `<option value="${opt}">${opt}</option>`).join('');
                inputHtml = `
                    <div class="relative">
                        <select name="${field.name}" ${field.required ? 'required' : ''} class="w-full px-4 py-3 pr-10 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 appearance-none bg-white shadow-sm hover:border-gray-300">
                            <option value="">Pilih ${field.label.toLowerCase()}</option>
                            ${options}
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                `;
            } else if (field.type === 'textarea') {
                inputHtml = `
                    <div class="relative">
                        <textarea name="${field.name}" ${field.required ? 'required' : ''} rows="4" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:border-gray-300 resize-none" placeholder="Masukkan ${field.label.toLowerCase()}..."></textarea>
                        <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                `;
            } else if (field.type === 'file') {
                inputHtml = `
                    <div class="relative group">
                        <input type="file" name="${field.name}" accept="application/pdf,image/*" class="hidden" id="modalFileInput${field.name}">
                        <label for="modalFileInput${field.name}" class="cursor-pointer block">
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 group-hover:shadow-md">
                                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl w-16 h-16 flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-cloud-upload-alt text-white text-xl"></i>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-gray-700 font-semibold">Drop file di sini atau klik untuk upload</p>
                                    <p class="text-sm text-gray-500">PDF, JPG, PNG • Maksimal 5MB</p>
                                </div>
                                <div class="mt-4 inline-flex items-center px-4 py-2 bg-gray-100 rounded-lg text-sm text-gray-600">
                                    <i class="fas fa-paperclip mr-2"></i>
                                    Pilih File
                                </div>
                            </div>
                        </label>
                    </div>
                `;
            } else {
                inputHtml = `
                    <div class="relative">
                        <input type="${field.type}" name="${field.name}" ${field.required ? 'required' : ''} class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:border-gray-300" placeholder="Masukkan ${field.label.toLowerCase()}...">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="${field.icon} text-gray-400"></i>
                        </div>
                    </div>
                `;
            }

            // Determine if field should span full width
            const isFullWidth = field.type === 'textarea' || field.type === 'file' || field.name === 'alamat' || field.name === 'tempat_acara';
            const colSpan = isFullWidth ? 'md:col-span-2' : '';

            return `
                <div class="form-group ${colSpan}">
                    <label class="block text-sm font-semibold mb-3 text-gray-800">
                        <span class="flex items-center">
                            <i class="${field.icon} mr-2 text-blue-600 w-4"></i>
                            ${field.label}
                            ${field.required ? '<span class="text-red-500 ml-1">*</span>' : ''}
                        </span>
                    </label>
                    <div class="form-input-wrapper">
                        ${inputHtml}
                    </div>
                </div>
            `;
        }).join('');

        modalDynamicFormContainer.innerHTML = `
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-500 rounded-r-xl p-6 mb-8 shadow-sm">
                <div class="flex items-center mb-3">
                    <div class="bg-blue-500 rounded-xl w-12 h-12 flex items-center justify-center mr-4 shadow-lg">
                        <i class="fas fa-file-signature text-white text-lg"></i>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold text-gray-900">${template.title}</h5>
                        <p class="text-sm text-gray-600">Form pengajuan resmi desa</p>
                    </div>
                </div>

                <!-- User Info Display -->
                <div class="bg-white rounded-lg p-4 mb-4 border border-gray-200">
                    <h6 class="text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-user text-blue-600 mr-2"></i>
                        Data Pemohon (dari akun Anda)
                    </h6>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                        <div><span class="text-gray-600">Nama:</span> <span class="font-medium">${userData.nama || 'Belum diisi'}</span></div>
                        <div><span class="text-gray-600">NIK:</span> <span class="font-medium">${userData.nik || 'Belum diisi'}</span></div>
                        <div><span class="text-gray-600">Alamat:</span> <span class="font-medium">${userData.alamat || 'Belum diisi'}</span></div>
                        <div><span class="text-gray-600">No. HP:</span> <span class="font-medium">${userData.no_hp || 'Belum diisi'}</span></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">
                        <i class="fas fa-info-circle mr-1"></i>
                        Data ini akan digunakan untuk surat. Jika ada yang salah, hubungi admin.
                    </p>
                </div>

                <div class="bg-white/60 backdrop-blur-sm rounded-lg p-3 border border-blue-200">
                    <p class="text-sm text-blue-800 flex items-center">
                        <i class="fas fa-edit mr-2"></i>
                        Lengkapi informasi spesifik berikut. Field bertanda <span class="text-red-500 font-semibold">*</span> wajib diisi.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                ${fieldsHtml}
            </div>
        `;
    }

    // Close modal on backdrop click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeSuratModal();
        }
    });

    // Close modal on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeSuratModal();
        }
    });

    // Handle modal form submission
    document.addEventListener('submit', function(e) {
        if (e.target.id === 'modalFormAjukanSurat') {
            e.preventDefault();

            const formData = new FormData(e.target);
            const submitBtn = e.target.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
            submitBtn.disabled = true;

            // Submit form via AJAX (public endpoint)
            fetch('/surat-online/public', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showNotification('success', data.message);

                    // Close modal
                    closeSuratModal();

                    // Reset form
                    e.target.reset();

                    // Show success notification with status info
                    if (data.pengajuan_id) {
                        setTimeout(() => {
                            showStatusNotification(data.pengajuan_id);
                        }, 1000);
                    }
                } else {
                    showNotification('error', data.message || 'Terjadi kesalahan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('error', 'Terjadi kesalahan saat mengirim pengajuan');
            })
            .finally(() => {
                // Reset button state
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        }
    });
});

// Function to show status notification
function showStatusNotification(pengajuanId) {
    const notification = document.createElement('div');
    notification.className = 'fixed top-4 right-4 bg-white border border-blue-200 rounded-xl shadow-xl p-6 z-50 max-w-sm';
    notification.innerHTML = `
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-lg font-semibold text-blue-900">Pengajuan Berhasil!</h4>
            <button onclick="this.parentElement.parentElement.remove()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="bg-blue-50 rounded-lg p-4 mb-4">
            <div class="flex items-center mb-2">
                <i class="fas fa-clock text-blue-600 mr-2"></i>
                <span class="font-semibold text-blue-800">Status: Menunggu Validasi</span>
            </div>
            <p class="text-sm text-blue-700">Admin akan memeriksa pengajuan Anda dalam 1-2 hari kerja.</p>
        </div>
        <div class="bg-yellow-50 rounded-lg p-3">
            <div class="flex items-start">
                <i class="fas fa-info-circle text-yellow-600 mr-2 mt-0.5"></i>
                <div class="text-sm text-yellow-800">
                    <p class="font-medium">Notifikasi akan dikirim otomatis ke WhatsApp Anda:</p>
                    <ul class="mt-1 space-y-1">
                        <li>• ✅ <strong>Disetujui:</strong> Surat langsung dikirim</li>
                        <li>• ❌ <strong>Ditolak:</strong> Alasan penolakan + saran</li>
                    </ul>
                </div>
            </div>
        </div>
    `;

    document.body.appendChild(notification);

    // Auto remove after 15 seconds
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 15000);
}

// Function to show notifications
function showNotification(type, message) {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 bg-white border rounded-xl shadow-xl p-4 z-50 max-w-sm ${
        type === 'success' ? 'border-green-200 text-green-800' :
        type === 'error' ? 'border-red-200 text-red-800' :
        'border-blue-200 text-blue-800'
    }`;
    notification.innerHTML = `
        <div class="flex items-center justify-between">
            <span>${message}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;

    document.body.appendChild(notification);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 5000);
}
</script>
@endpush
