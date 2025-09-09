@extends('layouts.app')

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
</style>
.aos-disabled [data-aos] { opacity: 1 !important; transform: none !important; }
html { scroll-behavior: smooth; }
/* Sub Navigation Styling */
.stat-subnav { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(229, 231, 235, 0.5); box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); }
.subnav-surface { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); border-radius: 1rem; padding: 0.75rem; border: 1px solid rgba(229, 231, 235, 0.3); }
.stat-tab { display: flex; align-items: center; padding: 0.75rem 1.5rem; border-radius: 0.75rem; font-weight: 600; font-size: 0.875rem; color: #6b7280; text-decoration: none; transition: all 0.3s ease; background: transparent; border: 1px solid transparent; }
.stat-tab:hover { background: rgba(59, 130, 246, 0.1); color: #1d4ed8; border-color: rgba(59, 130, 246, 0.2); transform: translateY(-2px); }
.stat-tab[aria-current="true"] { background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border-color: #1d4ed8; box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3); }
.section-nav { scroll-margin-top: 100px; }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100"></div>

    <!-- Particle.js Container -->
    <div id="particles-surat" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20" data-aos="fade-up" data-aos-delay="300">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
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
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Ajukan surat secara online tanpa perlu antri. Sistem terintegrasi untuk pelayanan administrasi yang
                        <span class="font-semibold text-yellow-300">efisien dan transparan</span>
                    </p>

                    <!-- Enhanced Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-6xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">7</div>
                                <i class="fas fa-file-alt text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Jenis Surat</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-list text-blue-300 mr-1"></i>
                                Layanan tersedia
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">24/7</div>
                                <i class="fas fa-clock text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Layanan Online</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-wifi text-green-300 mr-1"></i>
                                Akses kapan saja
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">3</div>
                                <i class="fas fa-hourglass-half text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Hari Proses</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-lightning-bolt text-orange-300 mr-1"></i>
                                Maksimal waktu
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">100%</div>
                                <i class="fas fa-mobile-alt text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Digital</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-leaf text-green-300 mr-1"></i>
                                Paperless system
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Animated Wave -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-16">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="white"></path>
        </svg>
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
    <!-- Floating Decorations -->
    <div class="absolute top-16 right-10 w-32 h-32 bg-gradient-to-br from-blue-200 to-purple-200 rounded-full opacity-20 animate-pulse"></div>
    <div class="absolute bottom-16 left-10 w-24 h-24 bg-gradient-to-br from-green-200 to-yellow-200 rounded-full opacity-25 animate-bounce"></div>

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
    <!-- Floating Decorations -->
    <div class="absolute top-20 left-16 w-28 h-28 bg-gradient-to-br from-red-200 to-pink-200 rounded-full opacity-20 animate-pulse"></div>
    <div class="absolute bottom-20 right-16 w-20 h-20 bg-gradient-to-br from-yellow-200 to-orange-200 rounded-full opacity-25 animate-bounce"></div>
    <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-gradient-to-br from-indigo-200 to-blue-200 rounded-full opacity-20 animate-pulse"></div>

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
    <!-- Floating Decorations -->
    <div class="absolute top-10 left-10 w-20 h-20 bg-blue-200 rounded-full opacity-20 animate-pulse"></div>
    <div class="absolute top-32 right-20 w-16 h-16 bg-yellow-200 rounded-full opacity-30 animate-bounce"></div>
    <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-green-200 rounded-full opacity-25 animate-pulse"></div>
    <div class="absolute bottom-32 right-1/3 w-24 h-24 bg-purple-200 rounded-full opacity-20 animate-bounce"></div>

    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #3b82f6 2px, transparent 2px), radial-gradient(circle at 75% 75%, #10b981 2px, transparent 2px); background-size: 50px 50px;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12" data-aos="fade-up">
            <!-- Badge -->
            <div class="inline-flex items-center bg-gradient-to-r from-blue-100 to-purple-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-file-alt mr-2 text-blue-600"></i>
                Layanan Digital Terpadu
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Jenis Surat</span> yang Tersedia
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pilih jenis surat yang ingin Anda ajukan untuk melanjutkan pengajuan</p>
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
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Surat Khusus</span></li>
                    </ul>
                    <button onclick="openSuratModal()" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Pilih Jenis Lain</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Pengajuan Surat - Konsisten dengan Design Website -->
<div id="suratModal" class="fixed inset-0 z-50 hidden">
    <!-- Simple Backdrop -->
    <div class="absolute inset-0 bg-black/50 transition-all duration-300 opacity-0" id="modalBackdrop"></div>

    <div class="flex items-center justify-center min-h-screen p-4 relative z-10">
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
                        <input type="hidden" name="jenis_surat" id="modalHiddenJenisSurat">
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
    <!-- Floating Decorations -->
    <div class="absolute top-10 left-10 w-32 h-32 bg-white opacity-10 rounded-full animate-pulse"></div>
    <div class="absolute top-20 right-20 w-24 h-24 bg-yellow-300 opacity-20 rounded-full animate-bounce"></div>
    <div class="absolute bottom-10 left-1/4 w-20 h-20 bg-white opacity-15 rounded-full animate-pulse"></div>
    <div class="absolute bottom-20 right-1/3 w-28 h-28 bg-pink-300 opacity-20 rounded-full animate-bounce"></div>

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
    // Initialize Particles.js
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-surat', {
            particles: {
                number: { value: 60, density: { enable: true, value_area: 800 } },
                color: { value: '#ffffff' },
                shape: { type: 'circle' },
                opacity: { value: 0.1, random: false },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#ffffff', opacity: 0.1, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: false, straight: false, out_mode: 'out', bounce: false }
            },
            interactivity: { detect_on: 'canvas', events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true } },
            retina_detect: true
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
            { id: 'ket_penghasilan', name: 'Keterangan Penghasilan', desc: 'Bukti besaran penghasilan', icon: 'fas fa-money-bill', color: 'yellow' }
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
        ]
    };

    // Form templates untuk setiap jenis surat (hanya yang penting)
    const formTemplates = {
        'pengantar_ktp': {
            title: 'Surat Pengantar KTP',
            fields: [
                { name: 'nama', label: 'Nama Lengkap', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'nik', label: 'NIK', type: 'text', icon: 'fas fa-id-card', required: true },
                { name: 'tempat_lahir', label: 'Tempat Lahir', type: 'text', icon: 'fas fa-map-marker-alt', required: true },
                { name: 'tanggal_lahir', label: 'Tanggal Lahir', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'alamat', label: 'Alamat Lengkap', type: 'textarea', icon: 'fas fa-home', required: true },
                { name: 'keperluan', label: 'Keperluan', type: 'select', icon: 'fas fa-clipboard', required: true, options: ['KTP Baru', 'KTP Hilang', 'KTP Rusak', 'Perpanjangan KTP'] },
                { name: 'no_hp', label: 'Nomor HP', type: 'text', icon: 'fas fa-phone', required: true },
                { name: 'lampiran', label: 'Lampiran (KK, Foto)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'ket_domisili': {
            title: 'Surat Keterangan Domisili',
            fields: [
                { name: 'nama', label: 'Nama Lengkap', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'nik', label: 'NIK', type: 'text', icon: 'fas fa-id-card', required: true },
                { name: 'alamat_domisili', label: 'Alamat Domisili', type: 'textarea', icon: 'fas fa-home', required: true },
                { name: 'rt_rw', label: 'RT/RW', type: 'text', icon: 'fas fa-map-signs', required: true },
                { name: 'lama_tinggal', label: 'Lama Tinggal (tahun)', type: 'number', icon: 'fas fa-calendar', required: true },
                { name: 'status_tempat_tinggal', label: 'Status Tempat Tinggal', type: 'select', icon: 'fas fa-home', required: true, options: ['Milik Sendiri', 'Sewa', 'Kontrak', 'Menumpang', 'Warisan'] },
                { name: 'keperluan', label: 'Keperluan', type: 'textarea', icon: 'fas fa-clipboard', required: true },
                { name: 'no_hp', label: 'Nomor HP', type: 'text', icon: 'fas fa-phone', required: true },
                { name: 'lampiran', label: 'Lampiran (KTP, KK)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'izin_keramaian': {
            title: 'Surat Izin Keramaian',
            fields: [
                { name: 'nama_pemohon', label: 'Nama Pemohon', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'nik', label: 'NIK Pemohon', type: 'text', icon: 'fas fa-id-card', required: true },
                { name: 'nama_acara', label: 'Nama Acara', type: 'text', icon: 'fas fa-calendar-alt', required: true },
                { name: 'jenis_acara', label: 'Jenis Acara', type: 'select', icon: 'fas fa-list', required: true, options: ['Hajatan/Resepsi', 'Syukuran', 'Arisan', 'Rapat', 'Pelatihan', 'Lainnya'] },
                { name: 'tanggal_acara', label: 'Tanggal Acara', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'waktu_mulai', label: 'Waktu Mulai', type: 'time', icon: 'fas fa-clock', required: true },
                { name: 'waktu_selesai', label: 'Waktu Selesai', type: 'time', icon: 'fas fa-clock', required: true },
                { name: 'tempat_acara', label: 'Tempat/Alamat Acara', type: 'textarea', icon: 'fas fa-map-marker-alt', required: true },
                { name: 'jumlah_peserta', label: 'Perkiraan Jumlah Peserta', type: 'number', icon: 'fas fa-users', required: true },
                { name: 'no_hp', label: 'Nomor HP', type: 'text', icon: 'fas fa-phone', required: true },
                { name: 'lampiran', label: 'Lampiran (KTP, Proposal)', type: 'file', icon: 'fas fa-paperclip', required: false }
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

    // Modal functions - langsung ke step 2 (sub-jenis) karena kategori udah dipilih
    window.openSuratModal = function(jenisParam = null) {
        if (jenisParam) {
            selectedJenis = jenisParam;
            modalCategoryTitle.textContent = `Pilih Sub-Jenis ${jenisParam}`;
            showModalSubJenis(jenisParam);
        }

        modal.classList.remove('hidden');
        setTimeout(() => {
            modalBackdrop.classList.remove('opacity-0');
            modalContent.classList.remove('scale-90');
            modalContent.classList.add('scale-100');
        }, 10);
        document.body.style.overflow = 'hidden';
        showModalStep(1); // Step 1 di modal = pilih sub-jenis
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
                <div class="bg-white/60 backdrop-blur-sm rounded-lg p-3 border border-blue-200">
                    <p class="text-sm text-blue-800 flex items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        Lengkapi semua field yang bertanda <span class="text-red-500 font-semibold">*</span> (wajib diisi)
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
});
</script>
@endpush
