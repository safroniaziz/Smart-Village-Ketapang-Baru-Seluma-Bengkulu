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
                    @auth
                        <button onclick="openSuratModal()" class="group bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center justify-center">
                                <i class="fas fa-file-alt mr-2 text-base"></i>
                                <span class="text-base">Ajukan Surat</span>
                            </div>
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="group bg-gray-500/50 backdrop-blur-md border-2 border-gray-400/50 text-gray-200 font-semibold px-6 py-3 rounded-xl cursor-not-allowed">
                            <div class="flex items-center justify-center">
                                <i class="fas fa-lock mr-2 text-base"></i>
                                <span class="text-base">Login untuk Ajukan Surat</span>
                            </div>
                        </button>
                    @endauth
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
                    <a href="#ajukan-surat" class="stat-tab" aria-current="false">
                        <i class="fas fa-file-alt mr-2"></i>
                        <span>Ajukan Surat</span>
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

    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
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

    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
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

    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
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

        <!-- Grid Surat dengan Layout Baru -->
        <div id="suratGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-16">

            <!-- Card 1: Surat Kehilangan -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="0">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">✓ Ready</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-red-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-2xl text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Kehilangan</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan kehilangan dokumen/barang</p>
                    @auth
                        <button onclick="openSuratModal('surat_kehilangan', 'Surat Kehilangan')" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm">Login untuk Ajukan</button>
                    @endauth
                </div>
            </div>

            <!-- Card 2: Surat Bersih Diri -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">✓ Ready</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Keterangan Bersih Diri</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan kelakuan baik</p>
                    @auth
                        <button onclick="openSuratModal('surat_bersih_diri', 'Surat Keterangan Bersih Diri')" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm">Login untuk Ajukan</button>
                    @endauth
                </div>
            </div>

            <!-- Card 3: SPPD -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">✓ Ready</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-route text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">SPPD (Surat Perintah Perjalanan Dinas)</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Perintah perjalanan dinas</p>
                    @auth
                        <button onclick="openSuratModal('sppd', 'SPPD')" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300 mt-auto text-sm">
                            <i class="fas fa-edit mr-2"></i>Ajukan Sekarang
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm">Login untuk Ajukan</button>
                    @endauth
                </div>
            </div>

            <!-- Card 4: Surat Izin Keramaian -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Aktif</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-alt text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Izin Keramaian</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Izin untuk acara/keramaian</p>
                    @auth
                        <button onclick="openSuratModal('izin_keramaian', 'Surat Izin Keramaian')" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300 mt-auto text-sm">
                            <i class="fas fa-edit mr-2"></i>Ajukan Sekarang
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm">Login untuk Ajukan</button>
                    @endauth
                </div>
            </div>

            <!-- Card 5: Surat Keterangan Belum Menikah -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="0">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Aktif</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-red-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-heart text-2xl text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Keterangan Belum Menikah</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan status belum menikah</p>
                    @auth
                        <button onclick="openSuratModal('ket_belum_menikah', 'Surat Keterangan Belum Menikah')" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300 mt-auto text-sm">
                            <i class="fas fa-edit mr-2"></i>Ajukan Sekarang
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm">Login untuk Ajukan</button>
                    @endauth
                </div>
            </div>

            <!-- Card 6: Surat Keterangan Berkelakuan Baik -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Aktif</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-check text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Keterangan Berkelakuan Baik</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan kelakuan baik</p>
                    @auth
                        <button onclick="openSuratModal('surat_berkelakuan_baik', 'Surat Keterangan Berkelakuan Baik')" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300 mt-auto text-sm">
                            <i class="fas fa-edit mr-2"></i>Ajukan Sekarang
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm">Login untuk Ajukan</button>
                    @endauth
                </div>
            </div>

            <!-- Card 7: Surat Keterangan Domisili -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Aktif</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-home text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Keterangan Domisili</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan tempat tinggal</p>
                    @auth
                        <button onclick="openSuratModal('surat_domisili', 'Surat Keterangan Domisili')" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @endauth
                </div>
            </div>

            <!-- Card 8: Surat Keterangan Kematian -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Aktif</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-gray-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-cross text-2xl text-gray-700"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Keterangan Kematian</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan kematian penduduk</p>
                    @auth
                        <button onclick="openSuratModal('surat_kematian', 'Surat Keterangan Kematian')" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @endauth
                </div>
            </div>

        </div>

        <!-- Button Show All -->
        <div class="text-center" id="showMoreContainer">
            <button id="showMoreBtn" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold px-8 py-3 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                Lihat Semua Surat (10 lainnya)
            </button>
        </div>

        <!-- Hidden cards that will be shown when "Lihat Semua" is clicked -->
        <div id="moreCards" class="hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-16 mt-6">

            <!-- Card 9: Surat Keterangan Menikah -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="0">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Aktif</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Keterangan Menikah</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan status menikah</p>
                    @auth
                        <button onclick="openSuratModal('surat_menikah', 'Surat Keterangan Menikah')" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @endauth
                </div>
            </div>

            <!-- Card 10: Surat Keterangan Miskin DTKS -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Aktif</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-red-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hand-holding-heart text-2xl text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Keterangan Miskin DTKS</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan keluarga miskin DTKS</p>
                    @auth
                        <button onclick="openSuratModal('surat_miskin', 'Surat Keterangan Miskin DTKS')" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @endauth
                </div>
            </div>

            <!-- Card 11: Surat Keterangan Penduduk Desa -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute top-3 right-3 bg-orange-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Soon</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Keterangan Penduduk Desa</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan sebagai penduduk desa</p>
                    <button class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm opacity-75" disabled>
                        Segera Hadir
                    </button>
                </div>
            </div>

            <!-- Card 12: Surat Keterangan Penghasilan Orang Tua -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Aktif</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-money-bill text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Keterangan Penghasilan Orang Tua</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan penghasilan orang tua</p>
                    @auth
                        <button onclick="openSuratModal('surat_penghasilan_ortu', 'Surat Keterangan Penghasilan Orang Tua')" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @endauth
                </div>
            </div>

            <!-- Card 13: Surat Keterangan Usaha -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="0">
                <div class="absolute top-3 right-3 bg-orange-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Soon</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-store text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Keterangan Usaha</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan memiliki usaha</p>
                    <button class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm opacity-75" disabled>
                        Segera Hadir
                    </button>
                </div>
            </div>

            <!-- Card 14: Surat Pengantar Nikah -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute top-3 right-3 bg-orange-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Soon</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-rings-wedding text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Pengantar Nikah (N1-N4)</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Pengantar untuk pernikahan</p>
                    <button class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm opacity-75" disabled>
                        Segera Hadir
                    </button>
                </div>
            </div>

            <!-- Card 15: Surat Perjanjian Perdamaian -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute top-3 right-3 bg-orange-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Soon</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-red-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-2xl text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Perjanjian Perdamaian</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Perjanjian penyelesaian masalah</p>
                    <button class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm opacity-75" disabled>
                        Segera Hadir
                    </button>
                </div>
            </div>

            <!-- Card 16: Surat Pindah -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute top-3 right-3 bg-orange-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Soon</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck-moving text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Pindah</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Keterangan pindah domisili</p>
                    <button class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm opacity-75" disabled>
                        Segera Hadir
                    </button>
                </div>
            </div>

            <!-- Card 17: Surat Rekomendasi -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="0">
                <div class="absolute top-3 right-3 bg-orange-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Soon</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-thumbs-up text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Rekomendasi</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Rekomendasi untuk berbagai keperluan</p>
                    <button class="bg-gray-400 text-gray-200 font-semibold py-3 px-4 rounded-lg cursor-not-allowed mt-auto text-sm opacity-75" disabled>
                        Segera Hadir
                    </button>
                </div>
            </div>

            <!-- Card 18: Surat Undangan -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Aktif</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Undangan</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Undangan kegiatan desa</p>
                    @auth
                        <button onclick="openSuratModal('surat_undangan', 'Surat Undangan')" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @endauth
                </div>
            </div>

            <!-- Card 19: Surat Pengantar Kartu Keluarga -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Aktif</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Pengantar Kartu Keluarga</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Pengantar untuk pengurusan KK</p>
                    @auth
                        <button onclick="openSuratModal('pengantar_kk', 'Surat Pengantar Kartu Keluarga')" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @endauth
                </div>
            </div>

            <!-- Card 20: Surat Pengantar Akta Kelahiran -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute top-3 right-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-semibold">Aktif</div>
                <div class="p-6 text-center h-full flex flex-col">
                    <div class="bg-pink-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-baby text-2xl text-pink-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Pengantar Akta Kelahiran</h3>
                    <p class="text-gray-600 mb-4 flex-grow text-sm">Formulir pelaporan kelahiran</p>
                    @auth
                        <button onclick="openSuratModal('pengantar_akta_kelahiran', 'Surat Pengantar Akta Kelahiran')" class="bg-pink-600 hover:bg-pink-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @else
                        <button onclick="showLoginModal()" class="bg-pink-600 hover:bg-pink-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 mt-auto text-sm">
                            Ajukan Surat
                        </button>
                    @endauth
                </div>
            </div>

        </div>


    </div>
</section>

<!-- Modal Pengajuan Surat - Konsisten dengan Design Website -->
<div id="suratModal" class="fixed inset-0 z-50 hidden">
    <!-- Clean Professional Backdrop -->
    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm transition-all duration-300 opacity-0" id="modalBackdrop"></div>

    <div class="flex items-center justify-center min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)] p-4 relative z-10">
        <!-- Clean Professional Modal -->
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-4xl max-h-[90vh] overflow-hidden transform scale-90 transition-all duration-300 border border-gray-100 relative" id="modalContent">            <!-- Clean Professional Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6">

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="bg-white/20 rounded-xl p-3 mr-4">
                            <i class="fas fa-file-signature text-2xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">
                                Pengajuan Surat Online
                            </h3>
                            <p class="text-blue-100">Proses pengajuan surat yang mudah dan aman</p>
                        </div>
                    </div>
                    <button onclick="closeSuratModal()" class="text-white/80 hover:text-white text-xl transition-colors duration-200 hover:bg-white/10 rounded-full w-10 h-10 flex items-center justify-center">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Enhanced Progress Steps -->
                <div class="relative z-10 flex items-center mt-6 bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                    <div class="flex items-center text-sm flex-1">
                        <div class="w-10 h-10 rounded-full bg-white text-blue-600 font-bold flex items-center justify-center mr-3 shadow-lg" id="progressStep1">
                            <i class="fas fa-list"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-white" id="modalCategoryTitle">Pilih Kategori Surat</div>
                            <div class="text-blue-200 text-xs">Tentukan jenis surat yang dibutuhkan</div>
                        </div>
                    </div>

                    <div class="flex-1 mx-4">
                        <div class="h-2 bg-white/20 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full transition-all duration-700 shadow-lg" id="progressBar" style="width: 50%"></div>
                        </div>
                    </div>

                    <div class="flex items-center text-sm">
                        <div class="w-10 h-10 rounded-full bg-white/20 text-white font-bold flex items-center justify-center mr-3 transition-all duration-300" id="progressStep2">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-white/60">Lengkapi Data</div>
                            <div class="text-blue-200 text-xs">Isi informasi yang diperlukan</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clean Modal Body -->
            <div class="p-6 overflow-y-auto max-h-[calc(90vh-180px)] bg-gray-50">

                <div id="modalSuratMsg" class="hidden mb-6 rounded-2xl border p-4 text-sm backdrop-blur-sm shadow-lg"></div>

                <!-- Step 1: Clean Sub Jenis Selection -->
                <div id="modalStepSelectSubJenis">
                    <div class="mb-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Pilih Jenis Surat</h4>
                        <p class="text-gray-600">Pilih jenis surat yang sesuai dengan kebutuhan Anda</p>
                    </div>
                    <div id="modalSubJenisList" class="grid grid-cols-1 md:grid-cols-2 gap-4"></div>
                </div>

                <!-- Step 2: Clean Form -->
                <div id="modalStepFormKhusus" class="hidden">
                    <div class="mb-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-2" id="modalFormTitle">Lengkapi Data Pengajuan</h4>
                        <p class="text-gray-600">Pastikan semua data yang Anda masukkan sudah benar</p>

                    </div>

                    <form id="modalFormAjukanSurat" class="space-y-6" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="jenis_surat" id="modalHiddenJenisSurat" value="surat_kehilangan">
                        <input type="hidden" name="sub_jenis_surat" id="modalHiddenSubJenisSurat">

                        <div id="modalDynamicFormContainer"></div>

                        <!-- Clean Submit Section -->
                        <div class="bg-gray-50 rounded-xl p-6 mt-8">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-shield-alt text-blue-600 mr-2"></i>
                                    Data Anda aman dan terenkripsi
                                </div>
                                <div class="flex items-center space-x-3">
                                    <button type="button" onclick="closeSuratModal()" class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 hover:border-gray-400 font-semibold transition-all duration-200">
                                        <i class="fas fa-times mr-2"></i>
                                        Batal
                                    </button>
                                    <button type="submit" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition-all duration-200 shadow-lg hover:shadow-xl">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        Kirim Pengajuan
                                    </button>
                                </div>
                            </div>
                        </div>                            <div id="modalSuratSuccess" class="hidden mt-4 p-4 bg-green-50 border border-green-200 rounded-xl">
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

    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
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

<!-- Login Modal (untuk user yang belum login) -->
<div id="loginModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm transition-all duration-300 opacity-0" id="loginBackdrop"></div>
    <div class="flex items-center justify-center min-h-screen p-4 relative z-10">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md transform scale-90 transition-all duration-300 border border-gray-100" id="loginContent">
            <div class="p-6">
                <div class="text-center mb-6">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lock text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Login Diperlukan</h3>
                    <p class="text-gray-600">Untuk mengajukan surat, Anda perlu login terlebih dahulu</p>
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-blue-600 mr-3 mt-0.5"></i>
                        <div class="text-sm text-blue-800">
                            <p class="font-semibold mb-2">Mengapa harus login?</p>
                            <ul class="space-y-1">
                                <li>• Melacak status pengajuan surat</li>
                                <li>• Notifikasi WhatsApp (jika disetujui)</li>
                                <li>• Data tersimpan dengan aman</li>
                                <li>• Riwayat pengajuan tersedia</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-3">
                    <a href="{{ route('login') }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl transition-colors duration-200 text-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login Sekarang
                    </a>
                    <button onclick="closeLoginModal()" class="flex-1 border-2 border-gray-300 text-gray-700 font-semibold py-3 px-4 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                        Batal
                    </button>
                </div>

                <div class="text-center mt-4 text-sm text-gray-600">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-semibold">Daftar di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>
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
// User data from auth (will be auto-filled) - Global scope
const userData = {
    nama: '{{ Auth::user()->nama_lengkap ?? "Belum diisi" }}',
    nik: '{{ Auth::user()->nik ?? "Belum diisi" }}',
    tempat_lahir: '{{ Auth::user()->tempat_lahir ?? "Belum diisi" }}',
    tanggal_lahir: '{{ Auth::user()->tanggal_lahir ?? "Belum diisi" }}',
    alamat: '{{ Auth::user()->alamat ?? "Belum diisi" }}',
    rt_rw: '{{ Auth::user()->rt_rw ?? "Belum diisi" }}',
    dusun: '{{ Auth::user()->dusun ?? "Belum diisi" }}',
    no_hp: '{{ Auth::user()->no_hp ?? "Belum diisi" }}',
    pekerjaan: '{{ Auth::user()->pekerjaan ?? "Belum diisi" }}'
};

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

    // Data sub-jenis surat untuk setiap kategori
    const subJenisData = {
        'surat_kehilangan': [
            { id: 'surat_kehilangan', name: 'Surat Kehilangan', desc: 'Keterangan kehilangan dokumen/barang', icon: 'fas fa-search' }
        ],
        'surat_bersih_diri': [
            { id: 'surat_bersih_diri', name: 'Surat Keterangan Bersih Diri', desc: 'Keterangan kelakuan baik', icon: 'fas fa-shield-alt' }
        ],
        'sppd': [
            { id: 'sppd', name: 'SPPD', desc: 'Surat Perintah Perjalanan Dinas', icon: 'fas fa-route' }
        ],
        'izin_keramaian': [
            { id: 'izin_keramaian', name: 'Surat Izin Keramaian', desc: 'Izin untuk acara/keramaian', icon: 'fas fa-calendar-alt' }
        ],
        'ket_belum_menikah': [
            { id: 'ket_belum_menikah', name: 'Surat Keterangan Belum Menikah', desc: 'Keterangan status belum menikah', icon: 'fas fa-user' }
        ],
        'surat_berkelakuan_baik': [
            { id: 'surat_berkelakuan_baik', name: 'Surat Keterangan Berkelakuan Baik', desc: 'Keterangan kelakuan baik', icon: 'fas fa-user-check' }
        ],
        'surat_domisili': [
            { id: 'surat_domisili', name: 'Surat Keterangan Domisili', desc: 'Keterangan tempat tinggal', icon: 'fas fa-home' }
        ],
        'surat_kematian': [
            { id: 'surat_kematian', name: 'Surat Keterangan Kematian', desc: 'Keterangan kematian penduduk', icon: 'fas fa-cross' }
        ],
        'ket_menikah': [
            { id: 'ket_menikah', name: 'Surat Keterangan Menikah', desc: 'Keterangan status menikah', icon: 'fas fa-heart' }
        ],
        'ket_miskin_dtks': [
            { id: 'ket_miskin_dtks', name: 'Surat Keterangan Miskin DTKS', desc: 'Keterangan keluarga miskin DTKS', icon: 'fas fa-hand-holding-heart' }
        ],
        'ket_penduduk_desa': [
            { id: 'ket_penduduk_desa', name: 'Surat Keterangan Penduduk Desa', desc: 'Keterangan sebagai penduduk desa', icon: 'fas fa-users' }
        ],
        'ket_penghasilan_ortu': [
            { id: 'ket_penghasilan_ortu', name: 'Surat Keterangan Penghasilan Orang Tua', desc: 'Keterangan penghasilan orang tua', icon: 'fas fa-money-bill' }
        ],
        'ket_usaha': [
            { id: 'ket_usaha', name: 'Surat Keterangan Usaha', desc: 'Keterangan memiliki usaha', icon: 'fas fa-store' }
        ],
        'pengantar_nikah': [
            { id: 'pengantar_nikah', name: 'Surat Pengantar Nikah (N1-N4)', desc: 'Pengantar untuk pernikahan', icon: 'fas fa-rings-wedding' }
        ],
        'perjanjian_perdamaian': [
            { id: 'perjanjian_perdamaian', name: 'Surat Perjanjian Perdamaian', desc: 'Perjanjian penyelesaian masalah', icon: 'fas fa-handshake' }
        ],
        'surat_hibah': [
            { id: 'surat_hibah', name: 'Surat Keterangan Hibah', desc: 'Keterangan hibah tanah/properti', icon: 'fas fa-hand-holding-heart' }
        ],
        'surat_pindah': [
            { id: 'surat_pindah', name: 'Surat Pindah', desc: 'Keterangan pindah domisili', icon: 'fas fa-truck-moving' }
        ],
        'surat_rekomendasi': [
            { id: 'surat_rekomendasi', name: 'Surat Rekomendasi', desc: 'Rekomendasi untuk berbagai keperluan', icon: 'fas fa-thumbs-up' }
        ],
        'surat_undangan': [
            { id: 'surat_undangan', name: 'Surat Undangan', desc: 'Undangan kegiatan desa', icon: 'fas fa-envelope' }
        ],
        'pengantar_kk': [
            { id: 'pengantar_kk', name: 'Pengantar Kartu Keluarga', desc: 'Pengantar untuk pengurusan KK', icon: 'fas fa-users' }
        ],
        'pengantar_akta_kelahiran': [
            { id: 'pengantar_akta_kelahiran', name: 'Pengantar Akta Kelahiran', desc: 'Formulir pelaporan kelahiran', icon: 'fas fa-baby' }
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
            ],
            note: 'Data pemohon (nama, NIK, alamat, dll) akan otomatis diambil dari profil Anda. Periksa kembali data profil sebelum submit.'
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
                { name: 'jenis_dokumen', label: 'Jenis Dokumen/Barang yang Hilang', type: 'select', icon: 'fas fa-id-card', required: true, options: ['KTP', 'KK', 'SIM', 'BPJS', 'Akta Kelahiran', 'Ijazah', 'Sertifikat', 'Dompet', 'HP/Smartphone', 'Motor', 'Mobil', 'Lainnya'] },
                { name: 'nama_barang_lainnya', label: 'Nama Barang (jika pilih Lainnya)', type: 'text', icon: 'fas fa-tag', required: false, placeholder: 'Contoh: Jam tangan, Tas, Sepatu, dll' },
                { name: 'nomor_dokumen', label: 'Nomor Dokumen/Barang', type: 'text', icon: 'fas fa-hashtag', required: false, placeholder: 'Contoh: 1705052511190005 (untuk KK), 1234567890123456 (untuk KTP), atau kosongkan jika tidak ada nomor' },
                { name: 'tempat_kehilangan', label: 'Tempat Kehilangan', type: 'textarea', icon: 'fas fa-map-marker-alt', required: true, placeholder: 'Jelaskan detail lokasi kehilangan (contoh: Di pasar saat belanja, Di rumah kemungkinan terjatuh, Di jalan saat berjalan kaki, dll)' },
                { name: 'waktu_kehilangan', label: 'Perkiraan Waktu Kehilangan', type: 'select', icon: 'fas fa-calendar', required: true, options: ['1 Bulan yang lalu', '2 Bulan yang lalu', '3 Bulan yang lalu', '4 Bulan yang lalu', '5 Bulan yang lalu', '6 Bulan yang lalu', 'Lebih dari 6 Bulan', 'Lainnya'] },
                { name: 'keterangan_waktu', label: 'Keterangan Waktu (jika pilih Lainnya)', type: 'text', icon: 'fas fa-clock', required: false, placeholder: 'Contoh: 2 minggu yang lalu, 1 tahun yang lalu' },
                { name: 'keperluan', label: 'Keperluan Surat', type: 'textarea', icon: 'fas fa-clipboard', required: true, placeholder: 'Jelaskan untuk apa surat ini diperlukan (contoh: Untuk pengurusan KK baru, Untuk keperluan administrasi, Untuk klaim asuransi, dll)' },
                { name: 'lampiran', label: 'Lampiran (Foto Dokumen/Barang - Opsional)', type: 'file', icon: 'fas fa-paperclip', required: false }
            ]
        },
        'surat_bersih_diri': {
            title: 'Surat Keterangan Bersih Diri',
            fields: [
                { name: 'keperluan', label: 'Keperluan Surat', type: 'textarea', icon: 'fas fa-clipboard', required: true, placeholder: 'Jelaskan untuk apa surat ini diperlukan (contoh: Melamar pekerjaan, Pendaftaran sekolah, Persyaratan administrasi, dll)' },
                { name: 'keterangan_tambahan', label: 'Keterangan Tambahan', type: 'textarea', icon: 'fas fa-sticky-note', required: false, placeholder: 'Informasi tambahan yang perlu dicantumkan (opsional)' },
                { name: 'lampiran', label: 'Lampiran (KTP, KK)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'sppd': {
            title: 'Surat Perintah Perjalanan Dinas (SPPD)',
            fields: [
                { name: 'personel', label: 'Daftar Personel yang Ditugaskan', type: 'personel', icon: 'fas fa-users', required: true },
                { name: 'tujuan', label: 'Tujuan Perjalanan', type: 'text', icon: 'fas fa-map-marker-alt', required: true, placeholder: 'Contoh: Kantor Camat Semidang Alas Maras' },
                { name: 'keperluan', label: 'Keperluan/Maksud Perjalanan', type: 'textarea', icon: 'fas fa-clipboard', required: true, placeholder: 'Contoh: Sosialisasi Koperasi Desa Merah Putih' },
                { name: 'tanggal_berangkat', label: 'Tanggal Berangkat', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'tanggal_kembali', label: 'Tanggal Kembali', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'transportasi', label: 'Jenis Transportasi', type: 'select', icon: 'fas fa-car', required: true, options: ['Roda Dua/Motor', 'Mobil Dinas', 'Kendaraan Pribadi', 'Angkutan Umum', 'Lainnya'] },
                { name: 'keterangan_tambahan', label: 'Keterangan Tambahan', type: 'textarea', icon: 'fas fa-sticky-note', required: false, placeholder: 'Informasi tambahan (opsional)' }
            ]
        },
        'izin_keramaian': {
            title: 'Surat Izin Keramaian',
            preview: true,
            fields: [
                { name: 'keperluan_acara', label: 'Keperluan Acara', type: 'textarea', icon: 'fas fa-calendar-alt', required: true, placeholder: 'Contoh: Mengadakan Acara (Organ) Dari Hari Sabtu Tanggal 05-06 untuk Resepsi Pernikahan Anak Kandung di Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma.' },
                { name: 'lampiran', label: 'Lampiran (KTP, KK)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'ket_belum_menikah': {
            title: 'Surat Keterangan Belum Menikah',
            preview: true,
            fields: [
                { name: 'keperluan', label: 'Keperluan Untuk', type: 'textarea', icon: 'fas fa-clipboard-list', required: true, placeholder: 'Contoh: Persaratan Pekerjaan, Melanjutkan Pendidikan, Administrasi Bank, dll.' },
                { name: 'lampiran', label: 'Lampiran (KTP, KK)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'surat_berkelakuan_baik': {
            title: 'Surat Keterangan Berkelakuan Baik',
            preview: true,
            fields: [
                { name: 'keperluan', label: 'Keperluan Untuk', type: 'textarea', icon: 'fas fa-clipboard-list', required: true, placeholder: 'Contoh: Persaratan Pekerjaan, Melanjutkan Pendidikan, Kebutuhan Administrasi, dll.' },
                { name: 'lampiran', label: 'Lampiran (KTP, KK)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'surat_domisili': {
            title: 'Surat Keterangan Domisili',
            preview: true,
            fields: [
                { name: 'keperluan', label: 'Keperluan Untuk', type: 'textarea', icon: 'fas fa-clipboard-list', required: true, placeholder: 'Contoh: Persaratan Pekerjaan, Administrasi Bank, Keperluan Sekolah, dll.' },
                { name: 'lampiran', label: 'Lampiran (KTP, KK)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'surat_kematian': {
            title: 'Surat Keterangan Kematian',
            preview: true,
            fields: [
                { name: 'nama_almarhum', label: 'Nama Almarhum/Almarhumah', type: 'text', icon: 'fas fa-user', required: true, placeholder: 'Contoh: HARLENA' },
                { name: 'hari_kematian', label: 'Hari Kematian', type: 'select', icon: 'fas fa-calendar', required: true, options: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] },
                { name: 'tanggal_kematian', label: 'Tanggal Kematian', type: 'date', icon: 'fas fa-calendar-alt', required: true },
                { name: 'tempat_kematian', label: 'Tempat Kematian', type: 'text', icon: 'fas fa-map-marker-alt', required: true, placeholder: 'Contoh: Ketapang Baru' },
                { name: 'sebab_kematian', label: 'Sebab Kematian', type: 'text', icon: 'fas fa-stethoscope', required: true, placeholder: 'Contoh: Sakit' },
                { name: 'lampiran', label: 'Lampiran (KTP, KK, Surat Dokter)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'surat_menikah': {
            title: 'Surat Keterangan Menikah',
            preview: true,
            fields: [
                { name: 'tanggal_menikah', label: 'Tanggal Menikah', type: 'date', icon: 'fas fa-heart', required: true },
                { name: 'lampiran', label: 'Lampiran (KTP, KK, Buku Nikah)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'surat_miskin': {
            title: 'Surat Keterangan Miskin DTKS',
            preview: true,
            fields: [
                { name: 'keperluan', label: 'Keperluan Surat', type: 'text', icon: 'fas fa-clipboard-list', required: true, placeholder: 'Contoh: PIP, Bantuan Sosial, dll' },
                { name: 'lampiran', label: 'Lampiran (KTP, KK, KIS/BPJS)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'surat_penghasilan_ortu': {
            title: 'Surat Keterangan Penghasilan Orang Tua',
            preview: true,
            fields: [
                // Data Ayah
                { name: 'nama_ayah', label: 'Nama Ayah', type: 'text', icon: 'fas fa-male', required: true, placeholder: 'Contoh: ALIYANTO' },
                { name: 'tempat_lahir_ayah', label: 'Tempat Lahir Ayah', type: 'text', icon: 'fas fa-map-marker-alt', required: true, placeholder: 'Contoh: Ketapang Baru' },
                { name: 'tanggal_lahir_ayah', label: 'Tanggal Lahir Ayah', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'agama_ayah', label: 'Agama Ayah', type: 'select', icon: 'fas fa-pray', required: true, options: ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu'] },
                { name: 'pekerjaan_ayah', label: 'Pekerjaan Ayah', type: 'text', icon: 'fas fa-briefcase', required: true, placeholder: 'Contoh: Petani/Pekebun' },
                { name: 'penghasilan_ayah', label: 'Penghasilan Ayah (Rp)', type: 'number', icon: 'fas fa-money-bill', required: true, placeholder: 'Contoh: 1500000' },
                { name: 'alamat_ayah', label: 'Alamat Ayah', type: 'text', icon: 'fas fa-home', required: true, placeholder: 'Contoh: Desa Ketapang Baru' },
                // Data Ibu
                { name: 'nama_ibu', label: 'Nama Ibu', type: 'text', icon: 'fas fa-female', required: true, placeholder: 'Contoh: RESTMI' },
                { name: 'tempat_lahir_ibu', label: 'Tempat Lahir Ibu', type: 'text', icon: 'fas fa-map-marker-alt', required: true, placeholder: 'Contoh: Jambat Akar' },
                { name: 'tanggal_lahir_ibu', label: 'Tanggal Lahir Ibu', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'agama_ibu', label: 'Agama Ibu', type: 'select', icon: 'fas fa-pray', required: true, options: ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu'] },
                { name: 'pekerjaan_ibu', label: 'Pekerjaan Ibu', type: 'text', icon: 'fas fa-briefcase', required: true, placeholder: 'Contoh: Mengurus Rumah Tangga' },
                { name: 'penghasilan_ibu', label: 'Penghasilan Ibu (Rp)', type: 'number', icon: 'fas fa-money-bill', required: true, placeholder: 'Contoh: 500000' },
                { name: 'alamat_ibu', label: 'Alamat Ibu', type: 'text', icon: 'fas fa-home', required: true, placeholder: 'Contoh: Desa Ketapang Baru' },
                // Lampiran
                { name: 'lampiran', label: 'Lampiran (KTP, KK, Slip Gaji)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'pengantar_nikah': {
            title: 'Surat Pengantar Nikah (N1-N4)',
            fields: [
                // Data Calon Pengantin Pria
                { name: 'nama', label: 'Nama Lengkap Pria', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'nik', label: 'NIK Pria', type: 'text', icon: 'fas fa-id-card', required: true },
                { name: 'tempat_lahir', label: 'Tempat Lahir Pria', type: 'text', icon: 'fas fa-map-marker-alt', required: true },
                { name: 'tanggal_lahir', label: 'Tanggal Lahir Pria', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'warga_negara', label: 'Kewarganegaraan Pria', type: 'select', icon: 'fas fa-flag', required: true, options: ['Warga Negara Indonesia', 'Warga Negara Asing'] },
                { name: 'agama', label: 'Agama Pria', type: 'select', icon: 'fas fa-pray', required: true, options: ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu'] },
                { name: 'pekerjaan', label: 'Pekerjaan Pria', type: 'text', icon: 'fas fa-briefcase', required: true },
                { name: 'alamat', label: 'Alamat Pria', type: 'textarea', icon: 'fas fa-home', required: true },

                // Data Orang Tua Pria
                { name: 'ayah_nama', label: 'Nama Ayah Pria', type: 'text', icon: 'fas fa-male', required: true },
                { name: 'ibu_nama', label: 'Nama Ibu Pria', type: 'text', icon: 'fas fa-female', required: true },

                // Data Calon Pengantin Wanita
                { name: 'wanita_nama', label: 'Nama Lengkap Wanita', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'wanita_nik', label: 'NIK Wanita', type: 'text', icon: 'fas fa-id-card', required: true },
                { name: 'wanita_tempat_lahir', label: 'Tempat Lahir Wanita', type: 'text', icon: 'fas fa-map-marker-alt', required: true },
                { name: 'wanita_tanggal_lahir', label: 'Tanggal Lahir Wanita', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'wanita_warga_negara', label: 'Kewarganegaraan Wanita', type: 'select', icon: 'fas fa-flag', required: true, options: ['Warga Negara Indonesia', 'Warga Negara Asing'] },
                { name: 'wanita_agama', label: 'Agama Wanita', type: 'select', icon: 'fas fa-pray', required: true, options: ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu'] },
                { name: 'wanita_pekerjaan', label: 'Pekerjaan Wanita', type: 'text', icon: 'fas fa-briefcase', required: true },
                { name: 'wanita_alamat', label: 'Alamat Wanita', type: 'textarea', icon: 'fas fa-home', required: true },

                // Data Orang Tua Wanita
                { name: 'wanita_ayah_nama', label: 'Nama Ayah Wanita', type: 'text', icon: 'fas fa-male', required: true },
                { name: 'wanita_ibu_nama', label: 'Nama Ibu Wanita', type: 'text', icon: 'fas fa-female', required: true },

                // Keperluan dan Lampiran
                { name: 'keperluan', label: 'Keperluan', type: 'textarea', icon: 'fas fa-clipboard', required: true },
                { name: 'lampiran', label: 'Lampiran (KTP, KK, Foto)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ],
            note: 'Pastikan data kedua calon pengantin dan orang tua sudah benar sebelum submit. Hubungi admin jika ada kesalahan data.'
        },
        'surat_hibah': {
            title: 'Surat Keterangan Hibah',
            fields: [
                // Data Penghibah
                { name: 'nama_penghibah', label: 'Nama Penghibah', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'umur_penghibah', label: 'Umur Penghibah', type: 'number', icon: 'fas fa-calendar', required: true },
                { name: 'pekerjaan_penghibah', label: 'Pekerjaan Penghibah', type: 'text', icon: 'fas fa-briefcase', required: true },
                { name: 'agama_penghibah', label: 'Agama Penghibah', type: 'select', icon: 'fas fa-pray', required: true, options: ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu'] },
                { name: 'alamat_penghibah', label: 'Alamat Penghibah', type: 'textarea', icon: 'fas fa-home', required: true },

                // Detail Hibah
                { name: 'hari_tanggal', label: 'Hari/Tanggal Hibah', type: 'text', icon: 'fas fa-calendar-alt', required: true, placeholder: 'Contoh: Senin Tanggal Lima Bulan Mei' },
                { name: 'luas_tanah', label: 'Luas Tanah (M²)', type: 'number', icon: 'fas fa-expand', required: true },

                // Batas-batas Tanah
                { name: 'batas_utara', label: 'Batas Utara', type: 'text', icon: 'fas fa-compass', required: true },
                { name: 'pemilik_utara', label: 'Pemilik Tanah Utara', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'batas_barat', label: 'Batas Barat', type: 'text', icon: 'fas fa-compass', required: true },
                { name: 'pemilik_barat', label: 'Pemilik Tanah Barat', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'batas_selatan', label: 'Batas Selatan', type: 'text', icon: 'fas fa-compass', required: true },
                { name: 'pemilik_selatan', label: 'Pemilik Tanah Selatan', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'batas_timur', label: 'Batas Timur', type: 'text', icon: 'fas fa-compass', required: true },
                { name: 'pemilik_timur', label: 'Pemilik Tanah Timur', type: 'text', icon: 'fas fa-user', required: true },

                // Saksi
                { name: 'saksi_1', label: 'Nama Saksi 1', type: 'text', icon: 'fas fa-users', required: true },
                { name: 'saksi_2', label: 'Nama Saksi 2', type: 'text', icon: 'fas fa-users', required: true },
                { name: 'saksi_3', label: 'Nama Saksi 3', type: 'text', icon: 'fas fa-users', required: true },

                { name: 'lampiran', label: 'Lampiran (Sertifikat/Surat Tanah, KTP)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ],
            note: 'Pastikan semua data hibah dan batas-batas tanah sudah benar. Dokumen ini merupakan surat resmi hibah tanah.'
        },
        'perjanjian_perdamaian': {
            title: 'Surat Perjanjian Perdamaian',
            fields: [
                // Data Pihak 1
                { name: 'pihak1_nama', label: 'Nama Pihak 1', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'pihak1_umur', label: 'Umur Pihak 1', type: 'number', icon: 'fas fa-calendar', required: true },
                { name: 'pihak1_pekerjaan', label: 'Pekerjaan Pihak 1', type: 'text', icon: 'fas fa-briefcase', required: true },
                { name: 'pihak1_agama', label: 'Agama Pihak 1', type: 'select', icon: 'fas fa-pray', required: true, options: ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu'] },
                { name: 'pihak1_alamat', label: 'Alamat Pihak 1', type: 'textarea', icon: 'fas fa-home', required: true },

                // Data Pihak 2
                { name: 'pihak2_nama', label: 'Nama Pihak 2', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'pihak2_umur', label: 'Umur Pihak 2', type: 'number', icon: 'fas fa-calendar', required: true },
                { name: 'pihak2_pekerjaan', label: 'Pekerjaan Pihak 2', type: 'text', icon: 'fas fa-briefcase', required: true },
                { name: 'pihak2_agama', label: 'Agama Pihak 2', type: 'select', icon: 'fas fa-pray', required: true, options: ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu'] },
                { name: 'pihak2_alamat', label: 'Alamat Pihak 2', type: 'textarea', icon: 'fas fa-home', required: true },

                // Kronologi Kejadian
                { name: 'hari_tanggal_perjanjian', label: 'Hari/Tanggal Perjanjian', type: 'text', icon: 'fas fa-calendar-alt', required: true, placeholder: 'Contoh: Senin Tanggal Lima Bulan Mei' },
                { name: 'hari_tanggal_kejadian', label: 'Hari/Tanggal Kejadian', type: 'text', icon: 'fas fa-calendar-alt', required: true, placeholder: 'Contoh: Sabtu Malam Minggu Tanggal Dua Puluh Enam April' },
                { name: 'waktu_kejadian', label: 'Waktu Kejadian', type: 'time', icon: 'fas fa-clock', required: true },

                // Denda Adat
                { name: 'jenis_denda', label: 'Jenis Denda Adat', type: 'text', icon: 'fas fa-gift', required: true, placeholder: 'Contoh: satu buah jambar tutup ayam' },
                { name: 'nominal_denda', label: 'Nominal Denda (Rp)', type: 'number', icon: 'fas fa-money-bill', required: true },
                { name: 'terbilang_denda', label: 'Nominal Terbilang', type: 'text', icon: 'fas fa-spell-check', required: true, placeholder: 'Contoh: Dua Ratus Lima Puluh Ribu Rupiah' },

                // Saksi
                { name: 'saksi_1', label: 'Nama Saksi 1', type: 'text', icon: 'fas fa-users', required: true },
                { name: 'saksi_2', label: 'Nama Saksi 2', type: 'text', icon: 'fas fa-users', required: true },
                { name: 'saksi_3', label: 'Nama Saksi 3', type: 'text', icon: 'fas fa-users', required: true },
                { name: 'saksi_4', label: 'Nama Saksi 4', type: 'text', icon: 'fas fa-users', required: true },

                { name: 'lampiran', label: 'Lampiran (Foto Kejadian, Surat Keterangan)', type: 'file', icon: 'fas fa-paperclip', required: false }
            ],
            note: 'Pastikan semua data kedua pihak dan kronologi kejadian sudah benar. Perjanjian ini akan mengikat secara hukum.'
        },
        'surat_pindah': {
            title: 'Surat Keterangan Pindah Penduduk',
            fields: [
                // Data Pemohon (akan auto-fill dari profil user)
                { name: 'nama', label: 'Nama Lengkap', type: 'text', icon: 'fas fa-user', required: true, readonly: true },
                { name: 'tempat_lahir', label: 'Tempat Lahir', type: 'text', icon: 'fas fa-map-marker-alt', required: true },
                { name: 'tanggal_lahir', label: 'Tanggal Lahir', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'jenis_kelamin', label: 'Jenis Kelamin', type: 'select', icon: 'fas fa-venus-mars', required: true, options: ['Laki-laki', 'Perempuan'] },
                { name: 'agama', label: 'Agama', type: 'select', icon: 'fas fa-pray', required: true, options: ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu'] },
                { name: 'status_perkawinan', label: 'Status Perkawinan', type: 'select', icon: 'fas fa-ring', required: true, options: ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'] },
                { name: 'pekerjaan', label: 'Pekerjaan', type: 'text', icon: 'fas fa-briefcase', required: true },
                { name: 'pendidikan', label: 'Pendidikan Terakhir', type: 'select', icon: 'fas fa-graduation-cap', required: true, options: ['Tidak/Belum Sekolah', 'SD', 'SMP', 'SMA/SMK', 'Diploma', 'Sarjana', 'Magister', 'Doktor'] },
                { name: 'kewarganegaraan', label: 'Kewarganegaraan', type: 'select', icon: 'fas fa-flag', required: true, options: ['WNI', 'WNA'] },
                { name: 'alamat_asal', label: 'Alamat Asal', type: 'textarea', icon: 'fas fa-home', required: true, readonly: true },

                // Data Kepindahan
                { name: 'alamat_tujuan', label: 'Alamat Tujuan Pindah', type: 'textarea', icon: 'fas fa-map-marked-alt', required: true, placeholder: 'Contoh: Ds. Karang Anyar, Kecamatan Semidang Alas Maras, Kabupaten Seluma' },
                { name: 'tanggal_pindah', label: 'Tanggal Pindah', type: 'date', icon: 'fas fa-calendar-alt', required: true },
                { name: 'alasan_pindah', label: 'Alasan Pindah', type: 'select', icon: 'fas fa-question-circle', required: true, options: ['Ikut Suami/Istri', 'Pekerjaan', 'Pendidikan', 'Keamanan', 'Kesehatan', 'Perumahan', 'Keluarga', 'Lainnya'] },

                // Data Pengikut (Dinamis)
                { name: 'pengikut_count', label: 'Jumlah Pengikut', type: 'number', icon: 'fas fa-users', required: false, min: 0, max: 10, placeholder: '0 jika tidak ada pengikut' },

                // TTD
                { name: 'nama_camat', label: 'Nama Camat', type: 'text', icon: 'fas fa-user-tie', required: false, placeholder: 'Opsional - nama camat yang mengetahui' },
                { name: 'nip_camat', label: 'NIP Camat', type: 'text', icon: 'fas fa-id-badge', required: false, placeholder: 'Opsional - NIP camat' },

                { name: 'lampiran', label: 'Lampiran (KTP, KK, Surat Keterangan)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ],
            note: 'Data pemohon akan otomatis diambil dari profil Anda. Pastikan alamat tujuan dan data pengikut sudah benar.',
            hasCustomJS: true // Menandakan perlu JS khusus untuk pengikut dinamis
        },
        'surat_rekomendasi': {
            title: 'Surat Rekomendasi',
            fields: [
                // Data Pemohon (auto-fill)
                { name: 'nama', label: 'Nama Lengkap', type: 'text', icon: 'fas fa-user', required: true, readonly: true },
                { name: 'nik', label: 'NIK', type: 'text', icon: 'fas fa-id-card', required: true, readonly: true },
                { name: 'jenis_kelamin', label: 'Jenis Kelamin', type: 'select', icon: 'fas fa-venus-mars', required: true, options: ['Laki-laki', 'Perempuan'] },
                { name: 'agama', label: 'Agama', type: 'select', icon: 'fas fa-pray', required: true, options: ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu'] },
                { name: 'pekerjaan', label: 'Pekerjaan', type: 'text', icon: 'fas fa-briefcase', required: true },
                { name: 'alamat', label: 'Alamat', type: 'textarea', icon: 'fas fa-home', required: true, readonly: true },

                // Jenis Rekomendasi
                { name: 'jenis_rekomendasi', label: 'Jenis Rekomendasi', type: 'select', icon: 'fas fa-list', required: true, options: ['Rekomendasi Usaha', 'Rekomendasi Tempat Usaha', 'Rekomendasi Kegiatan', 'Rekomendasi Kerjasama', 'Rekomendasi Bantuan', 'Lainnya'] },
                { name: 'tujuan_rekomendasi', label: 'Tujuan Rekomendasi', type: 'text', icon: 'fas fa-bullseye', required: true, placeholder: 'Contoh: Bank, Instansi, dll' },
                { name: 'isi_rekomendasi', label: 'Isi Rekomendasi', type: 'textarea', icon: 'fas fa-file-alt', required: true, placeholder: 'Jelaskan detail rekomendasi yang dibutuhkan' },

                // Detail Usaha (opsional)
                { name: 'nama_usaha', label: 'Nama Usaha', type: 'text', icon: 'fas fa-store', required: false, placeholder: 'Opsional - jika rekomendasi tentang usaha' },
                { name: 'alamat_usaha', label: 'Alamat Usaha', type: 'text', icon: 'fas fa-map-marker-alt', required: false },
                { name: 'nomor_telepon', label: 'Nomor Telepon Usaha', type: 'text', icon: 'fas fa-phone', required: false },
                { name: 'luas_lahan', label: 'Luas Lahan (M²)', type: 'number', icon: 'fas fa-expand', required: false },
                { name: 'luas_bangunan', label: 'Luas Bangunan (M²)', type: 'number', icon: 'fas fa-building', required: false },
                { name: 'kapasitas', label: 'Kapasitas (Ton)', type: 'number', icon: 'fas fa-weight', required: false },
                { name: 'modal_usaha', label: 'Modal Usaha (Rp)', type: 'number', icon: 'fas fa-money-bill', required: false },
                { name: 'penghasilan_bulanan', label: 'Penghasilan per Bulan (Rp)', type: 'number', icon: 'fas fa-chart-line', required: false },

                // Penutup
                { name: 'penutup', label: 'Penutup Surat', type: 'textarea', icon: 'fas fa-quote-right', required: false, placeholder: 'Opsional - kalimat penutup khusus' },

                { name: 'lampiran', label: 'Lampiran (Foto Usaha, Dokumen Pendukung)', type: 'file', icon: 'fas fa-paperclip', required: false }
            ],
            note: 'Data pemohon akan otomatis diambil dari profil Anda. Detail usaha hanya perlu diisi jika rekomendasi terkait usaha.',
            hasConditionalFields: true // Menandakan ada field conditional
        },
        surat_undangan: {
            title: 'Surat Undangan',
            fields: [
                { name: 'lampiran', label: 'Lampiran', type: 'text', icon: 'fas fa-paperclip', required: false, placeholder: '1 (satu) Berkas' },
                { name: 'perihal', label: 'Perihal', type: 'text', icon: 'fas fa-heading', required: true, placeholder: 'Panggilan Penting' },
                { name: 'tanggal_surat', label: 'Tanggal Surat', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'kepada', label: 'Kepada (Yang Diundang)', type: 'text', icon: 'fas fa-user', required: true, placeholder: 'Bapak/Ibu .....................' },
                { name: 'pembukaan', label: 'Kalimat Pembukaan', type: 'textarea', icon: 'fas fa-quote-left', required: true,
                  placeholder: 'Sehubungan dengan telah disepakati pembentukan time pendataan smart village pada tanggal 4 Juni 2025, mengingat acara ini sangat penting maka kami mengundang bapak/ibu untuk hadir:' },

                // Detail Acara
                { name: 'hari_tanggal', label: 'Hari & Tanggal Acara', type: 'text', icon: 'fas fa-calendar-day', required: true, placeholder: "Jum'at, 13 Juni 2025" },
                { name: 'jam', label: 'Jam Acara', type: 'text', icon: 'fas fa-clock', required: true, placeholder: '09.30 WIB – selesai' },
                { name: 'acara', label: 'Nama Acara', type: 'text', icon: 'fas fa-calendar-check', required: true, placeholder: 'Penegasan Tanggung jawab kerja pendataan smart village' },
                { name: 'tempat', label: 'Tempat Acara', type: 'text', icon: 'fas fa-map-marker-alt', required: true, placeholder: 'Gedung Perpustakaan/Kantor Desa Ketapang Baru' },

                { name: 'penutup', label: 'Kalimat Penutup', type: 'textarea', icon: 'fas fa-quote-right', required: false,
                  placeholder: 'Demikian panggilan ini kami sampaikan dan semoga Bapak/Ibu dapat menghadiri dengan tepat waktu, atas perhatiannya Kami ucapkan terimakasih.' },
                { name: 'tanggal_ttd', label: 'Tanggal Tanda Tangan', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'kepala_desa', label: 'Nama Kepala Desa', type: 'text', icon: 'fas fa-user-tie', required: false, placeholder: 'ZULTAN ALHARA' }
            ],
            note: 'Surat undangan akan dibuat dengan kop surat resmi desa dan dapat digunakan untuk berbagai kegiatan desa.'
        },
        pengantar_kk: {
            title: 'Surat Pengantar Kartu Keluarga',
            fields: [
                // Data Kepala Keluarga
                { name: 'nomor_kk', label: 'Nomor Kartu Keluarga', type: 'text', icon: 'fas fa-id-card', required: true, placeholder: '1705052309190002' },
                { name: 'nama_kepala_keluarga', label: 'Nama Kepala Keluarga', type: 'text', icon: 'fas fa-user-tie', required: true, placeholder: 'ROZI PUTRA HANDI' },

                // Alamat Lengkap
                { name: 'alamat', label: 'Alamat', type: 'text', icon: 'fas fa-home', required: true, placeholder: 'DESA KETAPANG BARU' },
                { name: 'rt_rw', label: 'RT/RW', type: 'text', icon: 'fas fa-map-pin', required: true, placeholder: 'DUSUN 1' },
                { name: 'desa', label: 'Desa/Kelurahan', type: 'text', icon: 'fas fa-map-marker-alt', required: true, placeholder: 'KETAPANG BARU' },
                { name: 'kecamatan', label: 'Kecamatan', type: 'text', icon: 'fas fa-map', required: true, placeholder: 'TALO' },
                { name: 'kabupaten', label: 'Kabupaten/Kota', type: 'text', icon: 'fas fa-city', required: true, placeholder: 'SELUMA' },
                { name: 'kode_pos', label: 'Kode Pos', type: 'text', icon: 'fas fa-mail-bulk', required: true, placeholder: '38875' },
                { name: 'propinsi', label: 'Propinsi', type: 'text', icon: 'fas fa-globe', required: true, placeholder: 'BENGKULU' },

                // Anggota Keluarga - Dynamic Fields
                { name: 'anggota_keluarga', label: 'Data Anggota Keluarga', type: 'dynamic_family', icon: 'fas fa-users', required: true },

                { name: 'tanggal_ttd', label: 'Tanggal Tanda Tangan', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'kepala_desa', label: 'Nama Kepala Desa', type: 'text', icon: 'fas fa-user-tie', required: false, placeholder: 'ZULTAN ALHARA' }
            ],
            note: 'Data keluarga akan otomatis diambil dari database warga yang terdaftar dengan nomor KK yang dimasukkan. Jika ada kesalahan data, harap hubungi admin untuk diperbaiki.'
        },
        pengantar_akta_kelahiran: {
            title: 'Surat Pengantar Akta Kelahiran',
            fields: [
                // Data Wilayah
                { name: 'kabupaten', label: 'Kabupaten/Kota', type: 'text', icon: 'fas fa-city', required: true, placeholder: 'Seluma' },
                { name: 'kecamatan', label: 'Kecamatan', type: 'text', icon: 'fas fa-map', required: true, placeholder: 'Talo' },
                { name: 'desa', label: 'Desa', type: 'text', icon: 'fas fa-map-marker-alt', required: true, placeholder: 'Ketapang Baru' },
                
                // Data KK
                { name: 'nama_kepala_keluarga', label: 'Nama Kepala Keluarga', type: 'text', icon: 'fas fa-user-tie', required: true, placeholder: 'ROZI PUTRA HANDI' },
                { name: 'no_kk', label: 'Nomor Kartu Keluarga', type: 'text', icon: 'fas fa-id-card', required: true, placeholder: '1705052309190002' },
                { name: 'surat_ket_kelahiran', label: 'Surat Keterangan Kelahiran', type: 'text', icon: 'fas fa-file-medical', required: false, placeholder: 'Nomor/Keterangan jika ada' },
                
                // Data Bayi
                { name: 'nama_bayi', label: 'Nama Bayi/Anak', type: 'text', icon: 'fas fa-baby', required: true, placeholder: 'RAIQAL JUSTIN GILBERT' },
                { name: 'jenis_kelamin_bayi', label: 'Jenis Kelamin Bayi', type: 'select', icon: 'fas fa-venus-mars', required: true, options: ['Laki-Laki', 'Perempuan'] },
                { name: 'tempat_lahir_bayi', label: 'Tempat Kelahiran', type: 'text', icon: 'fas fa-map-pin', required: true, placeholder: 'Seluma' },
                { name: 'hari_tanggal_lahir', label: 'Hari dan Tanggal Lahir', type: 'text', icon: 'fas fa-calendar', required: true, placeholder: '12 Agustus 2024' },
                { name: 'pukul_lahir', label: 'Pukul Kelahiran', type: 'time', icon: 'fas fa-clock', required: false },
                { name: 'jenis_kelahiran', label: 'Jenis Kelahiran', type: 'select', icon: 'fas fa-baby-carriage', required: true, options: ['Tunggal', 'Kembar Dua', 'Kembar Tiga', 'Lainnya'] },
                { name: 'kelahiran_ke', label: 'Kelahiran Ke', type: 'text', icon: 'fas fa-sort-numeric-up', required: true, placeholder: '2 (Dua)' },
                { name: 'penolong_kelahiran', label: 'Penolong Kelahiran', type: 'select', icon: 'fas fa-user-md', required: true, options: ['Dokter', 'Bidan', 'Dukun Beranak', 'Lainnya'] },
                { name: 'berat_bayi', label: 'Berat Bayi (gram)', type: 'number', icon: 'fas fa-weight', required: false, placeholder: '3200' },
                { name: 'panjang_bayi', label: 'Panjang Bayi (cm)', type: 'number', icon: 'fas fa-ruler', required: false, placeholder: '48' },
                
                // Data Ibu
                { name: 'nik_ibu', label: 'NIK Ibu', type: 'text', icon: 'fas fa-id-card', required: true, placeholder: '1705054507980001' },
                { name: 'nama_ibu', label: 'Nama Lengkap Ibu', type: 'text', icon: 'fas fa-female', required: true, placeholder: 'HAVEZA DIANA' },
                { name: 'tanggal_lahir_ibu', label: 'Tanggal Kelahiran Ibu', type: 'text', icon: 'fas fa-calendar', required: true, placeholder: 'Ketapang Baru, 15 Juli 1998' },
                { name: 'pekerjaan_ibu', label: 'Pekerjaan Ibu', type: 'text', icon: 'fas fa-briefcase', required: true, placeholder: 'Mengurus Rumah Tangga' },
                { name: 'alamat_ibu', label: 'Alamat Ibu', type: 'textarea', icon: 'fas fa-home', required: true, placeholder: 'Ketapang Baru, Kec. Talo, Kab. Seluma' },
                { name: 'kewarganegaraan_ibu', label: 'Kewarganegaraan Ibu', type: 'select', icon: 'fas fa-flag', required: true, options: ['WNI', 'WNA'] },
                { name: 'kebangsaan_ibu', label: 'Kebangsaan Ibu', type: 'text', icon: 'fas fa-globe', required: true, placeholder: 'Indonesia' },
                { name: 'tanggal_perkawinan', label: 'Tanggal Perkawinan', type: 'text', icon: 'fas fa-ring', required: true, placeholder: '31 Agustus 2019' },
                
                // Data Ayah
                { name: 'nik_ayah', label: 'NIK Ayah', type: 'text', icon: 'fas fa-id-card', required: true, placeholder: '1705050208000002' },
                { name: 'nama_ayah', label: 'Nama Lengkap Ayah', type: 'text', icon: 'fas fa-male', required: true, placeholder: 'ROZI PUTRA HANDI' },
                { name: 'tanggal_lahir_ayah', label: 'Tanggal Kelahiran Ayah', type: 'text', icon: 'fas fa-calendar', required: true, placeholder: 'Ketapang Baru, 01 September 1997' },
                { name: 'pekerjaan_ayah', label: 'Pekerjaan Ayah', type: 'text', icon: 'fas fa-briefcase', required: true, placeholder: 'Wiraswasta' },
                { name: 'alamat_ayah', label: 'Alamat Ayah', type: 'textarea', icon: 'fas fa-home', required: true, placeholder: 'Ketapang Baru, Kec. Talo, Kab. Seluma' },
                { name: 'kewarganegaraan_ayah', label: 'Kewarganegaraan Ayah', type: 'select', icon: 'fas fa-flag', required: true, options: ['WNI', 'WNA'] },
                
                // Data Pelapor
                { name: 'nik_pelapor', label: 'NIK Pelapor', type: 'text', icon: 'fas fa-id-card', required: true, placeholder: '1705054507980001' },
                { name: 'nama_pelapor', label: 'Nama Lengkap Pelapor', type: 'text', icon: 'fas fa-user', required: true, placeholder: 'HAVEZA DIANA' },
                { name: 'umur_pelapor', label: 'Umur Pelapor', type: 'text', icon: 'fas fa-birthday-cake', required: true, placeholder: '28 Tahun' },
                { name: 'jenis_kelamin_pelapor', label: 'Jenis Kelamin Pelapor', type: 'select', icon: 'fas fa-venus-mars', required: true, options: ['Laki-Laki', 'Perempuan'] },
                
                // Data Saksi 1
                { name: 'nik_saksi1', label: 'NIK Saksi 1', type: 'text', icon: 'fas fa-id-card', required: true, placeholder: '1605214503890002' },
                { name: 'nama_saksi1', label: 'Nama Lengkap Saksi 1', type: 'text', icon: 'fas fa-user-friends', required: true, placeholder: 'UMIYATI' },
                { name: 'umur_saksi1', label: 'Umur Saksi 1', type: 'text', icon: 'fas fa-birthday-cake', required: true, placeholder: '35 Tahun' },
                { name: 'jenis_kelamin_saksi1', label: 'Jenis Kelamin Saksi 1', type: 'select', icon: 'fas fa-venus-mars', required: true, options: ['Laki-Laki', 'Perempuan'] },
                { name: 'pekerjaan_saksi1', label: 'Pekerjaan Saksi 1', type: 'text', icon: 'fas fa-briefcase', required: true, placeholder: 'Bidan' },
                { name: 'alamat_saksi1', label: 'Alamat Saksi 1', type: 'textarea', icon: 'fas fa-home', required: true, placeholder: 'Muara Timput, Kec. Talo, Kab. Seluma' },
                
                // Data Saksi 2
                { name: 'nik_saksi2', label: 'NIK Saksi 2', type: 'text', icon: 'fas fa-id-card', required: true, placeholder: '1705054107780042' },
                { name: 'nama_saksi2', label: 'Nama Lengkap Saksi 2', type: 'text', icon: 'fas fa-user-friends', required: true, placeholder: 'HERMAYATI' },
                { name: 'umur_saksi2', label: 'Umur Saksi 2', type: 'text', icon: 'fas fa-birthday-cake', required: true, placeholder: '47 Tahun' },
                { name: 'jenis_kelamin_saksi2', label: 'Jenis Kelamin Saksi 2', type: 'select', icon: 'fas fa-venus-mars', required: true, options: ['Laki-Laki', 'Perempuan'] },
                { name: 'pekerjaan_saksi2', label: 'Pekerjaan Saksi 2', type: 'text', icon: 'fas fa-briefcase', required: true, placeholder: 'Petani/Pekebun' },
                { name: 'alamat_saksi2', label: 'Alamat Saksi 2', type: 'textarea', icon: 'fas fa-home', required: true, placeholder: 'Muara Timput, Kec. Talo, Kab. Seluma' },
                
                { name: 'kepala_desa', label: 'Nama Kepala Desa', type: 'text', icon: 'fas fa-user-tie', required: false, placeholder: 'ZULTAN ALHARA' }
            ],
            note: 'Formulir pelaporan kelahiran harus diisi lengkap dan akurat. Data akan digunakan untuk pembuatan akta kelahiran resmi.'
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
    window.openSuratModal = function(jenisParam = null, namaParam = null) {
        // Check authentication first
        @guest
            showLoginModal();
            return;
        @endguest

        if (jenisParam) {
            // Langsung ke form untuk jenis surat yang dipilih
            selectedJenis = jenisParam;
            selectedSubJenis = jenisParam;

            // Langsung tampilkan form
            generateModalForm(jenisParam);
            showModalStep(2); // Langsung ke step form
        } else {
            // Jika tidak ada parameter, tampilkan semua kategori
            selectedJenis = '';
            modalCategoryTitle.textContent = 'Pilih Kategori Surat';
            showAllCategories();
            showModalStep(1);
        }

        modal.classList.remove('hidden');
        setTimeout(() => {
            modalBackdrop.classList.remove('opacity-0');
            modalContent.classList.remove('scale-90');
            modalContent.classList.add('scale-100');
        }, 10);
        document.body.style.overflow = 'hidden';
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
            step1.className = 'w-8 h-8 rounded-full bg-white text-blue-600 font-semibold flex items-center justify-center mr-3';
            step1.innerHTML = '1';
            step2.className = 'w-8 h-8 rounded-full bg-white/20 text-white font-semibold flex items-center justify-center mr-3';
            step2.innerHTML = '2';
            progressBar.style.width = '50%';
            progressBar.className = 'h-full bg-white rounded-full transition-all duration-300';
        } else if (step === 2) {
            step1.className = 'w-8 h-8 rounded-full bg-green-500 text-white font-semibold flex items-center justify-center mr-3';
            step1.innerHTML = '✓';
            step2.className = 'w-8 h-8 rounded-full bg-white text-blue-600 font-semibold flex items-center justify-center mr-3';
            step2.innerHTML = '2';
            progressBar.style.width = '100%';
            progressBar.className = 'h-full bg-white rounded-full transition-all duration-300';
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

        // Generate preview section for forms that need it
        let previewHtml = '';
        if (template.preview) {
            previewHtml = `
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-yellow-600 text-lg"></i>
                        </div>
                        <div class="ml-3 flex-1">
                            <h4 class="text-sm font-semibold text-yellow-800 mb-2">Data yang Akan Ditampilkan di Surat</h4>
                            <p class="text-xs text-yellow-700 mb-3">Pastikan data di bawah ini sudah benar. Jika ada kesalahan, hubungi admin untuk diperbaiki.</p>
                            <div class="bg-white rounded-lg p-3 border border-yellow-300">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-xs">
                                    <div><strong>Nama:</strong> <span class="text-gray-700">{{ auth()->check() && auth()->user() ? auth()->user()->name : 'N/A' }}</span></div>
                                    <div><strong>NIK:</strong> <span class="text-gray-700">{{ auth()->check() && auth()->user() ? (auth()->user()->nik ?? 'N/A') : 'N/A' }}</span></div>
                                    <div><strong>Umur:</strong> <span class="text-gray-700">{{ auth()->check() && auth()->user() && auth()->user()->tanggal_lahir ? \Carbon\Carbon::parse(auth()->user()->tanggal_lahir)->age . ' Tahun' : 'N/A' }}</span></div>
                                    <div><strong>Alamat:</strong> <span class="text-gray-700">{{ auth()->check() && auth()->user() ? (auth()->user()->alamat ?? auth()->user()->address ?? 'N/A') : 'N/A' }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

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
            } else if (field.type === 'personel') {
                inputHtml = `
                    <div class="space-y-4" id="personelContainer">
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-sm font-semibold text-blue-800 flex items-center">
                                    <i class="fas fa-users mr-2"></i>
                                    Daftar Personel yang Ditugaskan
                                </h4>
                                <button type="button" onclick="addPersonel()" class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-plus mr-1"></i> Tambah Personel
                                </button>
                            </div>
                            <div id="personelList" class="space-y-3">
                                <div class="personel-item bg-white border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="text-sm font-medium text-gray-700">Personel 1</span>
                                    </div>
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                        <div class="w-full">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                            <input type="text" name="personel[0][nama]" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="Masukkan nama lengkap personel">
                                        </div>
                                        <div class="w-full">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                                            <input type="text" name="personel[0][jabatan]" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="Masukkan jabatan personel">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                inputHtml = `
                    <div class="relative">
                        <input type="${field.type}" name="${field.name}" ${field.required ? 'required' : ''} class="w-full px-4 py-3 pl-10 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm hover:border-gray-300" placeholder="${field.placeholder || 'Masukkan ' + field.label.toLowerCase() + '...'}">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="${field.icon} text-gray-400"></i>
                        </div>
                    </div>
                `;
            }

            // Determine if field should span full width
            const isFullWidth = field.type === 'textarea' || field.type === 'file' || field.type === 'personel' || field.name === 'alamat' || field.name === 'tempat_acara';
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

                ${previewHtml}

                <!-- Simple User Info Display -->
                <div class="bg-blue-50 rounded-lg p-4 mb-4 border border-blue-200">
                    <div class="flex items-center justify-between mb-3">
                        <h6 class="text-sm font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-user text-blue-600 mr-2"></i>
                            Data Pemohon
                        </h6>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-semibold">Auto-Fill</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                        <div class="bg-white rounded-lg p-3 border border-blue-100">
                            <span class="text-gray-500 text-xs uppercase tracking-wide">Nama Lengkap</span>
                            <p class="font-semibold text-gray-900 mt-1">${userData.nama || 'Belum diisi'}</p>
                        </div>
                        <div class="bg-white rounded-lg p-3 border border-blue-100">
                            <span class="text-gray-500 text-xs uppercase tracking-wide">Nomor HP</span>
                            <p class="font-semibold text-gray-900 mt-1">${userData.no_hp || 'Belum diisi'}</p>
                        </div>
                    </div>
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
            ${template.note ? `
                <div class="bg-yellow-50 rounded-lg p-4 mt-4 border border-yellow-200">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-yellow-600 mr-3 mt-0.5"></i>
                        <div>
                            <h6 class="font-semibold text-yellow-800 mb-1">Penting!</h6>
                            <p class="text-sm text-yellow-700">${template.note}</p>
                        </div>
                    </div>
                </div>
            ` : ''}
        `;

        // Add file input change listeners for visual feedback
        addFileInputListeners();

        // Set default date for tanggal_menikah to today
        const tanggalMenikahInput = document.querySelector('input[name="tanggal_menikah"]');
        if (tanggalMenikahInput) {
            const today = new Date();
            const formattedDate = today.toISOString().split('T')[0]; // YYYY-MM-DD format
            tanggalMenikahInput.value = formattedDate;
        }
    }

    // Function to add file input change listeners
    function addFileInputListeners() {
        const fileInputs = document.querySelectorAll('input[type="file"]');
        console.log('Found file inputs:', fileInputs.length);

        fileInputs.forEach(input => {
            console.log('Adding listener to:', input.id);
            input.addEventListener('change', function(e) {
                console.log('File change detected for:', e.target.id);
                const file = e.target.files[0];
                const label = document.querySelector(`label[for="${e.target.id}"]`);

                console.log('File:', file);
                console.log('Label found:', label);

                if (file && label) {
                    // Update the label to show file selected
                    const uploadDiv = label.querySelector('.border-dashed');
                    const iconDiv = label.querySelector('.bg-gradient-to-br');
                    const spaceDiv = uploadDiv.querySelector('.space-y-2');
                    const buttonDiv = uploadDiv.querySelector('.mt-4');

                    console.log('Elements found:');
                    console.log('uploadDiv:', uploadDiv);
                    console.log('iconDiv:', iconDiv);
                    console.log('spaceDiv:', spaceDiv);
                    console.log('buttonDiv:', buttonDiv);

                    if (!uploadDiv || !iconDiv || !spaceDiv || !buttonDiv) {
                        console.error('Some elements not found! Trying alternative approach...');
                        // Alternative approach - create a simple feedback
                        const parentDiv = label.querySelector('div');
                        if (parentDiv) {
                            parentDiv.style.borderColor = '#10b981';
                            parentDiv.style.backgroundColor = '#f0fdf4';

                            // Add a simple file name display
                            let existingInfo = label.querySelector('.file-info');
                            if (existingInfo) {
                                existingInfo.remove();
                            }

                            const fileInfo = document.createElement('div');
                            fileInfo.className = 'file-info mt-2 text-center';
                            fileInfo.innerHTML = `
                                <p class="text-green-700 font-semibold text-sm">✅ ${file.name}</p>
                                <p class="text-green-600 text-xs">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                            `;
                            parentDiv.appendChild(fileInfo);
                        }
                        return;
                    }

                    // Change appearance to show file is selected
                    uploadDiv.classList.remove('border-gray-300', 'hover:border-blue-500', 'hover:bg-blue-50');
                    uploadDiv.classList.add('border-green-500', 'bg-green-50');

                    iconDiv.classList.remove('from-blue-500', 'to-blue-600');
                    iconDiv.classList.add('from-green-500', 'to-green-600');

                    // Update icon
                    const icon = iconDiv.querySelector('i');
                    if (icon) {
                        icon.classList.remove('fa-cloud-upload-alt');
                        icon.classList.add('fa-check-circle');
                    }

                    // Show file name and size in the space-y-2 div
                    const fileSize = (file.size / 1024 / 1024).toFixed(2);
                    spaceDiv.innerHTML = `
                        <p class="text-green-700 font-semibold">✅ File Berhasil Dipilih</p>
                        <p class="text-sm text-green-600 font-medium break-all">${file.name}</p>
                        <p class="text-xs text-green-500">${fileSize} MB • ${file.type || 'Unknown type'}</p>
                    `;

                    // Update button text
                    buttonDiv.innerHTML = `
                        <i class="fas fa-check-circle mr-2 text-green-600"></i>
                        <span class="text-green-600 font-semibold">File Terpilih</span>
                    `;
                    buttonDiv.classList.remove('bg-gray-100', 'text-gray-600');
                    buttonDiv.classList.add('bg-green-100', 'text-green-600');
                } else if (label) {
                    // Reset to default if no file selected
                    resetFileInputAppearance(label);
                }
            });
        });
    }

    // Function to reset file input appearance
    function resetFileInputAppearance(label) {
        const uploadDiv = label.querySelector('.border-dashed');
        const iconDiv = label.querySelector('.bg-gradient-to-br');
        const spaceDiv = uploadDiv.querySelector('.space-y-2');
        const buttonDiv = uploadDiv.querySelector('.mt-4');

        // Reset appearance
        uploadDiv.classList.remove('border-green-500', 'bg-green-50');
        uploadDiv.classList.add('border-gray-300', 'hover:border-blue-500', 'hover:bg-blue-50');

        iconDiv.classList.remove('from-green-500', 'to-green-600');
        iconDiv.classList.add('from-blue-500', 'to-blue-600');

        // Reset icon
        const icon = iconDiv.querySelector('i');
        icon.classList.remove('fa-check-circle');
        icon.classList.add('fa-cloud-upload-alt');

        // Reset text content
        spaceDiv.innerHTML = `
            <p class="text-gray-700 font-semibold">Drop file di sini atau klik untuk upload</p>
            <p class="text-sm text-gray-500">PDF, JPG, PNG • Maksimal 5MB</p>
        `;

        // Reset button
        buttonDiv.innerHTML = `
            <i class="fas fa-paperclip mr-2"></i>
            Pilih File
        `;
        buttonDiv.classList.remove('bg-green-100', 'text-green-600');
        buttonDiv.classList.add('bg-gray-100', 'text-gray-600');
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

            // Show confirmation dialog first
            showSubmitConfirmation(formData, e.target, submitBtn, originalText);
        }
    });
});

// Function to show submit confirmation
function showSubmitConfirmation(formData, form, submitBtn, originalText) {
    // Get form data for preview
    const jenisSurat = formData.get('jenis_surat');
    const keperluan = formData.get('keperluan');
    const lampiran = formData.get('lampiran');

    // Get readable name for jenis surat
    const suratNames = {
        'surat_kehilangan': 'Surat Kehilangan',
        'surat_bersih_diri': 'Surat Bersih Diri',
        'sppd': 'SPPD (Surat Perintah Perjalanan Dinas)',
        'izin_keramaian': 'Surat Izin Keramaian',
        'ket_belum_menikah': 'Surat Keterangan Belum Menikah',
        'surat_domisili': 'Surat Domisili',
        'surat_usaha': 'Surat Usaha',
        'surat_tidak_mampu': 'Surat Tidak Mampu',
        'pengantar_nikah': 'Surat Pengantar Nikah (N1-N4)',
        'ket_usaha': 'Surat Keterangan Usaha',
        'surat_hibah': 'Surat Keterangan Hibah',
        'perjanjian_perdamaian': 'Surat Perjanjian Perdamaian',
        'surat_pindah': 'Surat Keterangan Pindah Penduduk',
        'surat_rekomendasi': 'Surat Rekomendasi',
        'surat_undangan': 'Surat Undangan',
        'pengantar_kk': 'Surat Pengantar Kartu Keluarga',
        'pengantar_akta_kelahiran': 'Surat Pengantar Akta Kelahiran'
    };

    const suratName = suratNames[jenisSurat] || jenisSurat;

    // Create preview HTML
    const previewHTML = `
        <div class="text-left">
            <div class="bg-blue-50 rounded-lg p-4 mb-4">
                <h4 class="font-semibold text-blue-900 mb-3 flex items-center">
                    <i class="fas fa-file-alt mr-2"></i>Detail Pengajuan
                </h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-blue-700">Jenis Surat:</span>
                        <span class="font-semibold text-blue-900">${suratName}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-blue-700">Keperluan:</span>
                        <span class="font-semibold text-blue-900">${keperluan || 'Tidak disebutkan'}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-blue-700">Lampiran:</span>
                        <span class="font-semibold text-blue-900">${lampiran ? lampiran.name : 'Tidak ada'}</span>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 rounded-lg p-4 mb-4 border border-green-200">
                <h4 class="font-semibold text-green-900 mb-3 flex items-center">
                    <i class="fas fa-user mr-2"></i>Data Pemohon
                </h4>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div>
                        <span class="text-green-700">Nama:</span>
                        <p class="font-semibold text-green-900">${userData.nama}</p>
                    </div>
                    <div>
                        <span class="text-green-700">NIK:</span>
                        <p class="font-semibold text-green-900">${userData.nik}</p>
                    </div>
                    <div>
                        <span class="text-green-700">Alamat:</span>
                        <p class="font-semibold text-green-900">${userData.alamat}</p>
                    </div>
                    <div>
                        <span class="text-green-700">No. HP:</span>
                        <p class="font-semibold text-green-900">${userData.no_hp || 'Belum diisi'}</p>
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 rounded-lg p-3 border border-yellow-200">
                <p class="text-sm text-yellow-800 flex items-start">
                    <i class="fas fa-info-circle mr-2 mt-0.5 text-yellow-600"></i>
                    <span>
                        ${jenisSurat === 'ket_usaha' ?
                            'PERHATIAN: Data pada surat akan otomatis diambil dari profil Anda. Pastikan data profil sudah benar sebelum submit. Jika ada data yang salah, hubungi admin untuk perbaikan setelah surat diproses.'
                            : jenisSurat === 'pengantar_nikah' ?
                            'PERHATIAN: Pastikan data kedua calon pengantin dan orang tua sudah benar. Data yang salah dapat menghambat proses administrasi pernikahan. Hubungi admin jika perlu perbaikan data setelah surat diproses.'
                            : 'Pastikan semua data sudah benar. Setelah dikirim, pengajuan akan diproses oleh admin dan Anda akan menerima notifikasi melalui WhatsApp.'
                        }
                    </span>
                </p>
            </div>
        </div>
    `;

    Swal.fire({
        title: 'Konfirmasi Pengajuan Surat',
        html: previewHTML,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#059669',
        cancelButtonColor: '#6b7280',
        confirmButtonText: '<i class="fas fa-paper-plane mr-2"></i>Ya, Kirim Pengajuan',
        cancelButtonText: '<i class="fas fa-times mr-2"></i>Batal',
        reverseButtons: true,
        width: '600px',
        customClass: {
            container: 'confirmation-modal',
            popup: 'rounded-xl'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // User confirmed, proceed with submission
            proceedWithSubmission(formData, form, submitBtn, originalText);
        }
        // If cancelled, do nothing (form stays open)
    });
}

// Functions for SPPD Personel Management
let personelCounter = 1;

function addPersonel() {
    const personelList = document.getElementById('personelList');
    const newPersonelHtml = `
        <div class="personel-item bg-white border border-gray-200 rounded-lg p-4">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm font-medium text-gray-700">Personel ${personelCounter + 1}</span>
                <button type="button" onclick="removePersonel(this)" class="text-red-600 hover:text-red-800 transition-colors">
                    <i class="fas fa-trash text-sm"></i>
                </button>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="personel[${personelCounter}][nama]" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="Masukkan nama lengkap personel">
                </div>
                <div class="w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                    <input type="text" name="personel[${personelCounter}][jabatan]" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="Masukkan jabatan personel">
                </div>
            </div>
        </div>
    `;

    personelList.insertAdjacentHTML('beforeend', newPersonelHtml);
    personelCounter++;
}

function removePersonel(button) {
    const personelItem = button.closest('.personel-item');
    personelItem.remove();

    // Re-number the remaining personel
    const personelItems = document.querySelectorAll('.personel-item');
    personelItems.forEach((item, index) => {
        const label = item.querySelector('.text-gray-700');
        label.textContent = `Personel ${index + 1}`;

        // Update input names
        const nameInput = item.querySelector('input[name*="[nama]"]');
        const jabatanInput = item.querySelector('input[name*="[jabatan]"]');

        if (nameInput) nameInput.name = `personel[${index}][nama]`;
        if (jabatanInput) jabatanInput.name = `personel[${index}][jabatan]`;
    });
}

// Function to proceed with actual submission
function proceedWithSubmission(formData, form, submitBtn, originalText) {
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
            // Close modal
            closeSuratModal();

            // Reset form
            form.reset();

            // Debug log
            console.log('Success response:', data);

            // Show enhanced success notification with status info
            if (data.pengajuan_id) {
                console.log('Showing status notification for ID:', data.pengajuan_id);
                setTimeout(() => {
                    showStatusNotification(data.pengajuan_id, data.tracking_number, data.message, userData);
                }, 500);
            } else {
                console.log('No pengajuan_id, showing simple notification');
                // Fallback jika tidak ada pengajuan_id
                showNotification('success', data.message);
            }
        } else {
            showNotification('error', data.message || 'Terjadi kesalahan');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('error', 'Terjadi kesalahan sistem');
    })
    .finally(() => {
        // Reset button state
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
}

// Function to show status notification
function showStatusNotification(pengajuanId, trackingNumber = null, successMessage = null, userData = null) {
    console.log('showStatusNotification called:', {pengajuanId, trackingNumber, successMessage, userData});
    const notification = document.createElement('div');
    notification.className = 'fixed top-4 left-4 right-4 md:left-auto md:right-4 md:max-w-md bg-white border border-blue-200 rounded-xl shadow-xl p-4 md:p-6 z-50 animate-slide-in';
    notification.innerHTML = `
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center space-x-2 flex-1 pr-2">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check text-green-600"></i>
                </div>
                <h4 class="text-base md:text-lg font-semibold text-green-900 leading-tight">${successMessage || 'Pengajuan Berhasil Dikirim!'}</h4>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="text-gray-400 hover:text-gray-600 transition-colors flex-shrink-0 mt-1">
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        ${trackingNumber ? `
        <div class="bg-green-50 rounded-lg p-3 mb-4 border border-green-200">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div class="flex-1">
                    <p class="text-sm text-green-700 font-medium">📋 Nomor Tracking:</p>
                    <p class="font-mono font-bold text-green-800 text-base md:text-lg break-all">${trackingNumber}</p>
                </div>
                <button onclick="copyToClipboard('${trackingNumber}')" class="px-3 py-2 bg-green-100 hover:bg-green-200 text-green-700 text-xs rounded-lg transition-colors self-start sm:self-center">
                    <i class="fas fa-copy mr-1"></i><span class="hidden sm:inline">Salin</span><span class="sm:hidden">Copy</span>
                </button>
            </div>
        </div>
        ` : ''}
        <div class="bg-blue-50 rounded-lg p-4 mb-4">
            <div class="flex items-center mb-2">
                <i class="fas fa-clock text-blue-600 mr-2"></i>
                <span class="font-semibold text-blue-800">Status: Menunggu Validasi</span>
            </div>
            <p class="text-sm text-blue-700">Admin akan memeriksa pengajuan Anda dalam 1-2 hari kerja.</p>
        </div>
        <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-4 border border-green-200 shadow-sm">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-whatsapp text-green-600 text-sm"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 mb-3">
                        <h4 class="font-semibold text-gray-800 text-sm md:text-base">📱 Notifikasi WhatsApp</h4>
                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full font-medium self-start sm:self-center">AKTIF</span>
                    </div>

                    ${userData.no_hp && userData.no_hp !== 'Belum diisi' ? `
                    <div class="bg-white/70 backdrop-blur-sm rounded-lg p-3 mb-3 border border-green-100">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-phone text-green-600"></i>
                                <span class="text-xs sm:text-sm text-gray-600">Dikirim ke:</span>
                            </div>
                            <span class="font-semibold text-green-700 text-sm break-all">${userData.no_hp}</span>
                        </div>
                    </div>

                    <div class="space-y-2 text-sm">
                        <p class="text-gray-700 font-medium">🔔 Jika pengajuan disetujui, Anda akan menerima notifikasi WhatsApp:</p>
                        <div class="grid grid-cols-1 gap-2">
                            <div class="bg-white/50 rounded-lg p-2 border border-blue-100">
                                <div class="flex items-start space-x-2">
                                    <span class="text-blue-600 font-semibold text-xs">PDF</span>
                                    <span class="text-xs text-gray-600">File surat langsung dikirim (jika admin memilih)</span>
                                </div>
                            </div>
                            <div class="bg-white/50 rounded-lg p-2 border border-orange-100">
                                <div class="flex items-start space-x-2">
                                    <span class="text-orange-600 font-semibold text-xs">INFO</span>
                                    <span class="text-xs text-gray-600">Notifikasi untuk pengambilan di kantor desa</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-yellow-50 rounded-lg p-2 mt-3 border border-yellow-200">
                            <div class="flex items-start space-x-2">
                                <i class="fas fa-exclamation-triangle text-yellow-600 text-xs mt-0.5"></i>
                                <div class="text-xs text-yellow-800">
                                    <span class="font-medium">Harap cek WhatsApp Anda secara berkala!</span><br>
                                    Jika nomor salah atau tidak menerima notifikasi, segera hubungi admin desa untuk diperbaiki.
                                </div>
                            </div>
                        </div>
                    </div>
                    ` : `
                    <div class="bg-red-50 rounded-lg p-3 border border-red-200">
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                            <div class="text-sm">
                                <p class="font-semibold text-red-800 mb-1">⚠️ Nomor HP Belum Diisi!</p>
                                <p class="text-red-700 text-xs mb-2">Anda tidak akan menerima notifikasi WhatsApp untuk pengajuan ini.</p>
                                <div class="bg-white/70 rounded p-2">
                                    <p class="text-xs text-red-600 font-medium">💡 Solusi:</p>
                                    <p class="text-xs text-red-600">Hubungi admin desa untuk melengkapi nomor HP, atau cek status pengajuan di halaman ini secara berkala.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    `}
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
    notification.className = `fixed top-4 left-4 right-4 md:left-auto md:right-4 md:max-w-sm bg-white border rounded-xl shadow-xl p-3 md:p-4 z-50 ${
        type === 'success' ? 'border-green-200 text-green-800' :
        type === 'error' ? 'border-red-200 text-red-800' :
        'border-blue-200 text-blue-800'
    }`;
    notification.innerHTML = `
        <div class="flex items-center justify-between">
            <span class="text-sm md:text-base">${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-2 md:ml-4 text-gray-400 hover:text-gray-600 flex-shrink-0">
                <i class="fas fa-times text-sm"></i>
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

// Login Modal Functions
function showLoginModal() {
    const modal = document.getElementById('loginModal');
    const backdrop = document.getElementById('loginBackdrop');
    const content = document.getElementById('loginContent');

    modal.classList.remove('hidden');
    setTimeout(() => {
        backdrop.classList.remove('opacity-0');
        content.classList.remove('scale-90');
        content.classList.add('scale-100');
    }, 10);
    document.body.style.overflow = 'hidden';
}

function closeLoginModal() {
    const modal = document.getElementById('loginModal');
    const backdrop = document.getElementById('loginBackdrop');
    const content = document.getElementById('loginContent');

    backdrop.classList.add('opacity-0');
    content.classList.remove('scale-100');
    content.classList.add('scale-90');
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }, 300);
}

// Initialize page when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Handle "Lihat Semua" button
    const showMoreBtn = document.getElementById('showMoreBtn');
    const moreCards = document.getElementById('moreCards');
    const showMoreContainer = document.getElementById('showMoreContainer');

    if (showMoreBtn && moreCards) {
        showMoreBtn.addEventListener('click', function() {
            moreCards.classList.remove('hidden');
            showMoreContainer.style.display = 'none';

            // Re-initialize AOS for new cards
            if (typeof AOS !== 'undefined') {
                AOS.refresh();
            }
        });
    }

    // Close login modal on backdrop click
    const loginModal = document.getElementById('loginModal');
    if (loginModal) {
        loginModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeLoginModal();
            }
        });
    }
});

// Close login modal on escape key
document.addEventListener('keydown', function(e) {
    const loginModal = document.getElementById('loginModal');
    if (e.key === 'Escape' && loginModal && !loginModal.classList.contains('hidden')) {
        closeLoginModal();
    }
});

// Function to copy text to clipboard
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show temporary success feedback
        const event = new CustomEvent('show-toast', {
            detail: { message: 'Nomor tracking berhasil disalin!', type: 'success' }
        });
        window.dispatchEvent(event);
    }).catch(function(err) {
        console.error('Could not copy text: ', err);
    });
}

// Auto-complete untuk Orang Tua
function setupOrangTuaAutoComplete() {
    // Setup untuk nama ayah
    const namaAyahInput = document.querySelector('input[name="nama_ayah"]');
    if (namaAyahInput) {
        setupAutoComplete(namaAyahInput, 'ayah');
    }

    // Setup untuk nama ibu
    const namaIbuInput = document.querySelector('input[name="nama_ibu"]');
    if (namaIbuInput) {
        setupAutoComplete(namaIbuInput, 'ibu');
    }
}

function setupAutoComplete(inputElement, jenisOrtu) {
    let timeoutId;
    let dropdown;

    inputElement.addEventListener('input', function() {
        clearTimeout(timeoutId);
        const query = this.value.trim();

        if (query.length < 2) {
            removeDropdown();
            return;
        }

        timeoutId = setTimeout(() => {
            searchOrangTua(query, jenisOrtu, inputElement);
        }, 300);
    });

    inputElement.addEventListener('blur', function() {
        // Delay removal to allow click on dropdown items
        setTimeout(() => {
            removeDropdown();
        }, 200);
    });

    function removeDropdown() {
        if (dropdown) {
            dropdown.remove();
            dropdown = null;
        }
    }

    function searchOrangTua(query, jenis, inputEl) {
        fetch(`/api/search-orang-tua?nama=${encodeURIComponent(query)}&jenis=${jenis}`)
            .then(response => response.json())
            .then(data => {
                removeDropdown();

                if (data.success && data.suggestions.length > 0) {
                    createDropdown(data.suggestions, jenis, inputEl);
                }
            })
            .catch(error => {
                console.error('Error searching orang tua:', error);
            });
    }

    function createDropdown(suggestions, jenis, inputEl) {
        dropdown = document.createElement('div');
        dropdown.className = 'autocomplete-dropdown';
        dropdown.style.cssText = `
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #d1d5db;
            border-top: none;
            border-radius: 0 0 8px 8px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        `;

        suggestions.forEach(suggestion => {
            const item = document.createElement('div');
            item.className = 'autocomplete-item';
            item.style.cssText = `
                padding: 10px 12px;
                cursor: pointer;
                border-bottom: 1px solid #f3f4f6;
                transition: background-color 0.2s;
            `;

            item.innerHTML = `
                <div class="font-semibold text-gray-800">${suggestion.nama}</div>
                <div class="text-sm text-gray-500">
                    ${suggestion.pekerjaan || 'N/A'} • Rp ${parseInt(suggestion.penghasilan || 0).toLocaleString('id-ID')}
                </div>
            `;

            item.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#f3f4f6';
            });

            item.addEventListener('mouseleave', function() {
                this.style.backgroundColor = 'white';
            });

            item.addEventListener('click', function() {
                fillOrangTuaData(suggestion, jenis);
                removeDropdown();
            });

            dropdown.appendChild(item);
        });

        // Position dropdown relative to input
        const inputContainer = inputEl.closest('.form-input-wrapper') || inputEl.parentElement;
        inputContainer.style.position = 'relative';
        inputContainer.appendChild(dropdown);
    }

    function fillOrangTuaData(data, jenis) {
        const prefix = jenis === 'ayah' ? 'ayah' : 'ibu';

        // Fill form fields
        const fields = [
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            'pekerjaan',
            'penghasilan',
            'alamat'
        ];

        fields.forEach(field => {
            const fieldName = `${field}_${prefix}`;
            const input = document.querySelector(`input[name="${fieldName}"], select[name="${fieldName}"]`);

            if (input && data[field]) {
                input.value = data[field];

                // Trigger change event untuk validasi
                input.dispatchEvent(new Event('input', { bubbles: true }));
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }
        });

        // Show success message
        const successMsg = document.createElement('div');
        successMsg.className = 'alert alert-success';
        successMsg.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: #10b981;
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            z-index: 9999;
            animation: slideInRight 0.3s ease-out;
        `;
        successMsg.textContent = `Data ${jenis} berhasil diisi otomatis!`;

        document.body.appendChild(successMsg);

        setTimeout(() => {
            successMsg.remove();
        }, 3000);
    }
}

// Call setup function when form is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Setup saat halaman load
    setupOrangTuaAutoComplete();

    // Setup ulang saat form modal dibuka
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                setupOrangTuaAutoComplete();
            }
        });
    });

    const modalContainer = document.getElementById('modalDynamicFormContainer');
    if (modalContainer) {
        observer.observe(modalContainer, { childList: true, subtree: true });
    }
});

// Add CSS for animation
const style = document.createElement('style');
style.textContent = `
    @keyframes slide-in {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .animate-slide-in {
        animation: slide-in 0.5s ease-out;
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: .5;
        }
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .autocomplete-dropdown {
        animation: slideDown 0.2s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);
</script>
@endpush

@push('scripts')
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
