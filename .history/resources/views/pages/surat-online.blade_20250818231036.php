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
                    <a href="#ajukan-surat" class="stat-tab" aria-current="false">
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
                    <button onclick="selectJenisSurat('Surat Pengantar')" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</button>
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
                    <button onclick="selectJenisSurat('Surat Keterangan')" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</button>
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
                    <a href="#ajukan-surat" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
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
                    <a href="#ajukan-surat" class="bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
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
                    <a href="#ajukan-surat" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
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
                    <a href="#ajukan-surat" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
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

<!-- Ajukan Surat Section -->
<section id="ajukan-surat" class="section-nav py-16 bg-white relative overflow-hidden">
    <!-- Floating Decorations -->
    <div class="absolute top-10 right-10 w-24 h-24 bg-gradient-to-br from-blue-200 to-indigo-200 rounded-full opacity-20 animate-pulse"></div>
    <div class="absolute bottom-10 left-10 w-32 h-32 bg-gradient-to-br from-green-200 to-blue-200 rounded-full opacity-15 animate-bounce"></div>
    <div class="absolute top-1/2 right-1/4 w-16 h-16 bg-gradient-to-br from-purple-200 to-pink-200 rounded-full opacity-25 animate-pulse"></div>

    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 30% 70%, #3b82f6 2px, transparent 2px), radial-gradient(circle at 70% 30%, #10b981 2px, transparent 2px); background-size: 40px 40px;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <!-- Badge -->
            <div class="inline-flex items-center bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold mb-4" data-aos="fade-up">
                <i class="fas fa-file-signature mr-2 text-blue-600"></i>
                Form Pengajuan
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Ajukan Surat</span> Online
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Isi formulir di bawah ini untuk mengajukan surat. Pastikan data yang dimasukkan sudah benar dan lengkap.
            </p>
        </div>

        <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl shadow-xl border border-blue-100 p-6 md:p-8">
                <div class="bg-white rounded-2xl p-6 md:p-8 shadow-lg">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                            <i class="fas fa-edit text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Form Pengajuan Surat</h3>
                            <p class="text-gray-600">Lengkapi semua data yang diperlukan</p>
                        </div>
                    </div>

                    <div id="suratMsg" class="hidden mt-2 mb-4 rounded-xl border p-4 text-sm"></div>

                    <!-- Step 1: Pilih Jenis Surat -->
                    <div id="stepSelectJenis">
                        <div class="text-center mb-8">
                            <h4 class="text-xl font-bold text-gray-900 mb-2">Langkah 1: Pilih Jenis Surat</h4>
                            <p class="text-gray-600">Pilih kategori surat yang ingin Anda ajukan</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <button type="button" class="jenis-surat-btn p-6 border-2 border-gray-200 rounded-xl hover:border-blue-500 hover:bg-blue-50 transition-all duration-200 text-left" data-jenis="Surat Pengantar">
                                <div class="flex items-center mb-3">
                                    <div class="bg-blue-100 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-envelope text-blue-600 text-xl"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900">Surat Pengantar</h5>
                                </div>
                                <p class="text-sm text-gray-600">Untuk pengurusan KTP, KK, Nikah, dll</p>
                            </button>

                            <button type="button" class="jenis-surat-btn p-6 border-2 border-gray-200 rounded-xl hover:border-green-500 hover:bg-green-50 transition-all duration-200 text-left" data-jenis="Surat Keterangan">
                                <div class="flex items-center mb-3">
                                    <div class="bg-green-100 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-file-alt text-green-600 text-xl"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900">Surat Keterangan</h5>
                                </div>
                                <p class="text-sm text-gray-600">Domisili, Usaha, Tidak Mampu, dll</p>
                            </button>

                            <button type="button" class="jenis-surat-btn p-6 border-2 border-gray-200 rounded-xl hover:border-cyan-500 hover:bg-cyan-50 transition-all duration-200 text-left" data-jenis="Surat Izin">
                                <div class="flex items-center mb-3">
                                    <div class="bg-cyan-100 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-clipboard-check text-cyan-600 text-xl"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900">Surat Izin</h5>
                                </div>
                                <p class="text-sm text-gray-600">Keramaian, Usaha, Bangunan, dll</p>
                            </button>

                            <button type="button" class="jenis-surat-btn p-6 border-2 border-gray-200 rounded-xl hover:border-red-500 hover:bg-red-50 transition-all duration-200 text-left" data-jenis="Surat Pernyataan">
                                <div class="flex items-center mb-3">
                                    <div class="bg-red-100 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-handshake text-red-600 text-xl"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900">Surat Pernyataan</h5>
                                </div>
                                <p class="text-sm text-gray-600">Ahli Waris, Belum Menikah, dll</p>
                            </button>

                            <button type="button" class="jenis-surat-btn p-6 border-2 border-gray-200 rounded-xl hover:border-yellow-500 hover:bg-yellow-50 transition-all duration-200 text-left" data-jenis="Surat Rekomendasi">
                                <div class="flex items-center mb-3">
                                    <div class="bg-yellow-100 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-thumbs-up text-yellow-600 text-xl"></i>
                                    </div>
                                    <h5 class="font-semibold text-gray-900">Surat Rekomendasi</h5>
                                </div>
                                <p class="text-sm text-gray-600">Beasiswa, Kerja, Usaha, dll</p>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Pilih Sub Jenis -->
                    <div id="stepSelectSubJenis" class="hidden">
                        <div class="text-center mb-8">
                            <h4 class="text-xl font-bold text-gray-900 mb-2">Langkah 2: Pilih Jenis Surat Spesifik</h4>
                            <p class="text-gray-600">Pilih jenis surat yang spesifik sesuai kebutuhan Anda</p>
                            <button type="button" id="backToJenis" class="mt-2 text-blue-600 hover:text-blue-800 underline">
                                <i class="fas fa-arrow-left mr-1"></i>Kembali ke pilihan jenis
                            </button>
                        </div>
                        <div id="subJenisList" class="grid grid-cols-1 md:grid-cols-2 gap-4"></div>
                    </div>

                    <!-- Step 3: Form Khusus -->
                    <div id="stepFormKhusus" class="hidden">
                        <div class="text-center mb-8">
                            <h4 class="text-xl font-bold text-gray-900 mb-2">Langkah 3: Isi Data Pengajuan</h4>
                            <p class="text-gray-600" id="formTitle">Lengkapi form sesuai jenis surat yang dipilih</p>
                            <button type="button" id="backToSubJenis" class="mt-2 text-blue-600 hover:text-blue-800 underline">
                                <i class="fas fa-arrow-left mr-1"></i>Kembali ke pilihan surat
                            </button>
                        </div>

                        <form id="formAjukanSurat" class="space-y-6" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="jenis_surat" id="hiddenJenisSurat">
                            <input type="hidden" name="sub_jenis_surat" id="hiddenSubJenisSurat">

                            <div id="dynamicFormContainer"></div>

                            <div class="flex items-center justify-between gap-4">
                                <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    <i class="fas fa-paper-plane mr-3"></i>Kirim Pengajuan
                                </button>
                                <div id="suratSuccess" class="hidden text-sm text-green-800 bg-green-50 border border-green-200 rounded-lg px-4 py-3">
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle mr-2"></i>
                                        <div>
                                            <span class="font-semibold">Pengajuan berhasil!</span><br>
                                            <span>Nomor Tracking: </span>
                                            <span id="suratTrack" class="font-mono font-bold text-blue-600"></span>
                                            <button id="copySuratTrack" type="button" class="ml-2 text-blue-600 underline hover:text-blue-800">Salin</button>
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

// Step-by-step Form Logic
document.addEventListener('DOMContentLoaded', function() {
    let currentStep = 1;
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

    // Form templates untuk setiap jenis surat
    const formTemplates = {
        'pengantar_ktp': {
            title: 'Form Surat Pengantar KTP',
            fields: [
                { name: 'nama', label: 'Nama Lengkap', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'nik', label: 'NIK', type: 'text', icon: 'fas fa-id-card', required: true },
                { name: 'tempat_lahir', label: 'Tempat Lahir', type: 'text', icon: 'fas fa-map-marker-alt', required: true },
                { name: 'tanggal_lahir', label: 'Tanggal Lahir', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'alamat', label: 'Alamat Lengkap', type: 'textarea', icon: 'fas fa-home', required: true },
                { name: 'keperluan', label: 'Keperluan', type: 'select', icon: 'fas fa-clipboard', required: true, options: ['KTP Baru', 'KTP Hilang', 'KTP Rusak', 'Perpanjangan KTP'] },
                { name: 'no_hp', label: 'Nomor HP', type: 'text', icon: 'fas fa-phone', required: true },
                { name: 'lampiran', label: 'Lampiran (KK, Foto, dll)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'ket_domisili': {
            title: 'Form Surat Keterangan Domisili',
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
        'ket_usaha': {
            title: 'Form Surat Keterangan Usaha',
            fields: [
                { name: 'nama', label: 'Nama Lengkap', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'nik', label: 'NIK', type: 'text', icon: 'fas fa-id-card', required: true },
                { name: 'nama_usaha', label: 'Nama Usaha', type: 'text', icon: 'fas fa-store', required: true },
                { name: 'jenis_usaha', label: 'Jenis Usaha', type: 'text', icon: 'fas fa-briefcase', required: true },
                { name: 'alamat_usaha', label: 'Alamat Usaha', type: 'textarea', icon: 'fas fa-map-marker-alt', required: true },
                { name: 'modal_usaha', label: 'Modal Usaha (Rp)', type: 'number', icon: 'fas fa-money-bill', required: true },
                { name: 'omzet_bulanan', label: 'Omzet Bulanan (Rp)', type: 'number', icon: 'fas fa-chart-line', required: true },
                { name: 'jumlah_karyawan', label: 'Jumlah Karyawan', type: 'number', icon: 'fas fa-users', required: true },
                { name: 'mulai_usaha', label: 'Mulai Usaha', type: 'date', icon: 'fas fa-calendar-alt', required: true },
                { name: 'no_hp', label: 'Nomor HP', type: 'text', icon: 'fas fa-phone', required: true },
                { name: 'lampiran', label: 'Lampiran (KTP, Foto Usaha)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        },
        'izin_keramaian': {
            title: 'Form Surat Izin Keramaian',
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
                { name: 'penanggung_jawab', label: 'Penanggung Jawab', type: 'text', icon: 'fas fa-user-tie', required: true },
                { name: 'no_hp', label: 'Nomor HP', type: 'text', icon: 'fas fa-phone', required: true },
                { name: 'lampiran', label: 'Lampiran (KTP, Proposal)', type: 'file', icon: 'fas fa-paperclip', required: false }
            ]
        },
        'rekomendasi_beasiswa': {
            title: 'Form Surat Rekomendasi Beasiswa',
            fields: [
                { name: 'nama', label: 'Nama Lengkap', type: 'text', icon: 'fas fa-user', required: true },
                { name: 'nik', label: 'NIK', type: 'text', icon: 'fas fa-id-card', required: true },
                { name: 'tempat_lahir', label: 'Tempat Lahir', type: 'text', icon: 'fas fa-map-marker-alt', required: true },
                { name: 'tanggal_lahir', label: 'Tanggal Lahir', type: 'date', icon: 'fas fa-calendar', required: true },
                { name: 'alamat', label: 'Alamat Lengkap', type: 'textarea', icon: 'fas fa-home', required: true },
                { name: 'nama_sekolah', label: 'Nama Sekolah/Universitas', type: 'text', icon: 'fas fa-graduation-cap', required: true },
                { name: 'jurusan', label: 'Jurusan/Program Studi', type: 'text', icon: 'fas fa-book', required: true },
                { name: 'semester_kelas', label: 'Semester/Kelas', type: 'text', icon: 'fas fa-layer-group', required: true },
                { name: 'jenis_beasiswa', label: 'Jenis Beasiswa', type: 'text', icon: 'fas fa-award', required: true },
                { name: 'alasan_pengajuan', label: 'Alasan Pengajuan', type: 'textarea', icon: 'fas fa-comment-alt', required: true },
                { name: 'prestasi', label: 'Prestasi yang Dimiliki', type: 'textarea', icon: 'fas fa-trophy', required: false },
                { name: 'no_hp', label: 'Nomor HP', type: 'text', icon: 'fas fa-phone', required: true },
                { name: 'lampiran', label: 'Lampiran (KTP, Transkrip, Sertifikat)', type: 'file', icon: 'fas fa-paperclip', required: true }
            ]
        }
    };

    // Step navigation
    const stepSelectJenis = document.getElementById('stepSelectJenis');
    const stepSelectSubJenis = document.getElementById('stepSelectSubJenis');
    const stepFormKhusus = document.getElementById('stepFormKhusus');
    const subJenisList = document.getElementById('subJenisList');
    const dynamicFormContainer = document.getElementById('dynamicFormContainer');
    const formTitle = document.getElementById('formTitle');

    // Navigation buttons
    document.getElementById('backToJenis')?.addEventListener('click', () => showStep(1));
    document.getElementById('backToSubJenis')?.addEventListener('click', () => showStep(2));

    function showStep(step) {
        stepSelectJenis.classList.add('hidden');
        stepSelectSubJenis.classList.add('hidden');
        stepFormKhusus.classList.add('hidden');

        if (step === 1) {
            stepSelectJenis.classList.remove('hidden');
            currentStep = 1;
        } else if (step === 2) {
            stepSelectSubJenis.classList.remove('hidden');
            currentStep = 2;
        } else if (step === 3) {
            stepFormKhusus.classList.remove('hidden');
            currentStep = 3;
        }
    }

    // Step 1: Jenis Surat selection
    document.querySelectorAll('.jenis-surat-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            selectedJenis = this.dataset.jenis;
            showSubJenis(selectedJenis);
            showStep(2);
        });
    });

    function showSubJenis(jenis) {
        const subJenisItems = subJenisData[jenis] || [];
        subJenisList.innerHTML = subJenisItems.map(item => `
            <button type="button" class="sub-jenis-btn p-6 border-2 border-gray-200 rounded-xl hover:border-${item.color}-500 hover:bg-${item.color}-50 transition-all duration-200 text-left" data-subjenis="${item.id}">
                <div class="flex items-center mb-3">
                    <div class="bg-${item.color}-100 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                        <i class="${item.icon} text-${item.color}-600 text-xl"></i>
                    </div>
                    <h5 class="font-semibold text-gray-900">${item.name}</h5>
                </div>
                <p class="text-sm text-gray-600">${item.desc}</p>
            </button>
        `).join('');

        // Add event listeners to sub jenis buttons
        document.querySelectorAll('.sub-jenis-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                selectedSubJenis = this.dataset.subjenis;
                generateForm(selectedSubJenis);
                showStep(3);
            });
        });
    }

    function generateForm(subJenis) {
        const template = formTemplates[subJenis];
        if (!template) {
            dynamicFormContainer.innerHTML = '<p class="text-red-600">Form template not found</p>';
            return;
        }

        formTitle.textContent = `Lengkapi ${template.title}`;
        document.getElementById('hiddenJenisSurat').value = selectedJenis;
        document.getElementById('hiddenSubJenisSurat').value = selectedSubJenis;

        const fieldsHtml = template.fields.map(field => {
            let inputHtml = '';

            if (field.type === 'select') {
                const options = field.options.map(opt => `<option value="${opt}">${opt}</option>`).join('');
                inputHtml = `<select name="${field.name}" ${field.required ? 'required' : ''} class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                    <option value="">Pilih ${field.label.toLowerCase()}</option>
                    ${options}
                </select>`;
            } else if (field.type === 'textarea') {
                inputHtml = `<textarea name="${field.name}" ${field.required ? 'required' : ''} rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Masukkan ${field.label.toLowerCase()}..."></textarea>`;
            } else if (field.type === 'file') {
                inputHtml = `
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-400 transition-colors duration-200">
                        <input type="file" name="${field.name}" accept="application/pdf,image/*" class="hidden" id="fileInput${field.name}">
                        <label for="fileInput${field.name}" class="cursor-pointer">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                            <p class="text-gray-600 mb-2">Klik untuk upload atau drag & drop</p>
                            <p class="text-sm text-gray-500">PDF, JPG, PNG (maks 5MB)</p>
                        </label>
                    </div>
                `;
            } else {
                inputHtml = `<input type="${field.type}" name="${field.name}" ${field.required ? 'required' : ''} class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Masukkan ${field.label.toLowerCase()}...">`;
            }

            return `
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-2 text-gray-700">
                        <i class="${field.icon} mr-2 text-blue-500"></i>${field.label} ${field.required ? '*' : ''}
                    </label>
                    ${inputHtml}
                </div>
            `;
        }).join('');

        dynamicFormContainer.innerHTML = `
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-6 mb-6">
                <h4 class="font-semibold text-blue-900 mb-2 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>${template.title}
                </h4>
                <p class="text-sm text-blue-800">Lengkapi semua data yang diperlukan untuk ${template.title.toLowerCase()}. Field dengan tanda (*) wajib diisi.</p>
            </div>
            ${fieldsHtml}
            <div class="bg-green-50 border border-green-200 rounded-xl p-4">
                <div class="flex items-start">
                    <i class="fas fa-shield-alt text-green-500 mt-1 mr-3"></i>
                    <div class="text-sm text-green-800">
                        <p class="font-semibold mb-1">Informasi Penting:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Pastikan semua data yang diisi sudah benar dan sesuai dokumen</li>
                            <li>Surat akan diproses maksimal 3 hari kerja</li>
                            <li>Anda akan mendapat notifikasi via WhatsApp</li>
                            <li>Simpan nomor tracking untuk mengecek status pengajuan</li>
                        </ul>
                    </div>
                </div>
            </div>
        `;
    }

    // Initialize first step
    showStep(1);
});
</script>
@endpush
