@extends('layouts.app')

@section('title', 'Surat Online - Smart Village Ketapang Baru')

@push('styles')
<style>
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
                    <a href="#jenis-surat" class="stat-tab" aria-current="false">
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
                        <i class="fas fa-file-signature mr-2"></i>
                        <span>Ajukan Surat</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

<!-- Service Types -->
<section id="jenis-surat" class="section-nav py-16 bg-gray-50 relative overflow-hidden">
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
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pilih jenis surat yang ingin Anda ajukan dengan mudah dan cepat</p>
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
                    <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
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
                    <a href="#" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
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
                    <a href="#" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
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
                    <a href="#" class="bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
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
                    <a href="#" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
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
                    <a href="#" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
                </div>
            </div>
        </div>
    </div>
</section>

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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-blue-600">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Pilih Jenis Surat</h3>
                <p class="text-gray-600">
                    Pilih jenis surat yang ingin Anda ajukan dari daftar yang tersedia.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-green-600">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Isi Formulir</h3>
                <p class="text-gray-600">
                    Isi formulir dengan data yang lengkap dan benar sesuai persyaratan.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-yellow-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-yellow-600">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Upload Dokumen</h3>
                <p class="text-gray-600">
                    Upload dokumen pendukung yang diperlukan dalam format PDF atau JPG.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-purple-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-purple-600">4</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Submit & Track</h3>
                <p class="text-gray-600">
                    Submit pengajuan dan pantau status surat Anda melalui sistem tracking.
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
                <a href="#" class="bg-white text-blue-600 hover:bg-gray-100 font-semibold py-4 px-8 rounded-lg transition-all duration-300 inline-flex items-center justify-center transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-file-plus mr-3"></i>Ajukan Surat Sekarang
                </a>
                <a href="#" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 font-semibold py-4 px-8 rounded-lg transition-all duration-300 inline-flex items-center justify-center transform hover:scale-105">
                    <i class="fas fa-question-circle mr-3"></i>Bantuan
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
        const scrollPos = window.scrollY + 100;
        sections.forEach((section, index) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                subnavLinks.forEach(link => link.setAttribute('aria-current', 'false'));
                if (subnavLinks[index]) subnavLinks[index].setAttribute('aria-current', 'true');
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
@endpush
