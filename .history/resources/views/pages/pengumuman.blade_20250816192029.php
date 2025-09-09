@extends('layouts.app')

@section('title', 'Pengumuman - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-Ho3Q0RyY4wQtwj0Q1sS2mZ0b7N2b5VQQl9Z4b6VtqvH8lJ0m6EJ2lT2qYq8J2b6P9m1oX4m0m7W2YqFqSxq2aA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.aos-disabled [data-aos] { opacity: 1 !important; transform: none !important; }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container -->
    <div id="particles-pengumuman" class="absolute inset-0"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-bullhorn text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">INFORMASI RESMI</h2>
                            <p class="text-sm text-blue-100">Pengumuman Pemerintah Desa</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Pengumuman</span><br>
                        <span class="text-yellow-400 font-extrabold">Resmi</span>
                    </h1>

                    <!-- Badge -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-certificate mr-2 text-yellow-300 text-xs"></i>
                            Resmi & Terpercaya
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Informasi penting dan pengumuman resmi dari pemerintah desa untuk
                        <span class="font-semibold text-yellow-300">seluruh warga Ketapang Baru</span>
                    </p>

                    <!-- Enhanced Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-6xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">78</div>
                                <i class="fas fa-bullhorn text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Total Pengumuman</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-chart-line text-green-300 mr-1"></i>
                                Sejak tahun 2024
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">12</div>
                                <i class="fas fa-calendar text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Bulan Ini</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-arrow-up text-green-300 mr-1"></i>
                                Update terbaru
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">5</div>
                                <i class="fas fa-exclamation-triangle text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Prioritas Tinggi</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-fire text-orange-300 mr-1"></i>
                                Perlu perhatian
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">100%</div>
                                <i class="fas fa-shield-check text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Terverifikasi</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-certificate text-green-300 mr-1"></i>
                                Resmi & valid
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

<!-- Announcements Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Featured Announcement -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden mb-8" data-aos="fade-up">
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white p-6">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle text-2xl mr-3"></i>
                            <span class="text-xl font-bold">PENGUMUMAN PENTING</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Jadwal Vaksinasi COVID-19</h2>
                        <div class="flex flex-wrap gap-4 text-gray-600 mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-calendar mr-2 text-blue-600"></i>
                                <span>15 Januari 2024</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-2 text-blue-600"></i>
                                <span>08:00 - 16:00 WIB</span>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            Diumumkan kepada seluruh warga Desa Ketapang Baru bahwa vaksinasi COVID-19
                            akan dilaksanakan pada hari Senin, 15 Januari 2024 di Balai Desa Ketapang Baru.
                            Vaksinasi ini diperuntukkan bagi warga yang belum mendapatkan vaksinasi
                            booster (dosis ketiga).
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-3">Persyaratan:</h3>
                                <ul class="space-y-2 text-gray-700">
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                        <span>Membawa KTP dan KK</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                        <span>Membawa kartu vaksinasi sebelumnya</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                        <span>Dalam kondisi sehat</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                        <span>Datang sesuai jadwal yang ditentukan</span>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-3">Jadwal per RT:</h3>
                                <ul class="space-y-2 text-gray-700">
                                    <li class="flex items-center">
                                        <i class="fas fa-clock text-blue-600 mr-2"></i>
                                        <span>RT 001-005: 08:00 - 10:00 WIB</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-clock text-blue-600 mr-2"></i>
                                        <span>RT 006-010: 10:00 - 12:00 WIB</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-clock text-blue-600 mr-2"></i>
                                        <span>RT 011-015: 13:00 - 15:00 WIB</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-clock text-blue-600 mr-2"></i>
                                        <span>RT 016-020: 15:00 - 16:00 WIB</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                            <div class="flex items-start">
                                <i class="fas fa-info-circle text-blue-600 mr-3 mt-1"></i>
                                <div>
                                    <span class="font-bold text-blue-900">Catatan:</span>
                                    <span class="text-blue-800"> Vaksinasi ini gratis dan wajib diikuti oleh seluruh warga.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Announcements List -->
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">Umum</span>
                                <span class="text-sm text-gray-500">1 hari yang lalu</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Pendaftaran Beasiswa Desa</h3>
                            <p class="text-gray-600 mb-3">
                                Pendaftaran beasiswa untuk siswa SMA/SMK yang berprestasi dari keluarga kurang mampu.
                            </p>
                            <p class="text-gray-700 mb-4">
                                Program beasiswa ini diperuntukkan bagi siswa kelas X, XI, dan XII
                                dengan persyaratan nilai rata-rata minimal 8.0 dan berasal dari
                                keluarga dengan penghasilan di bawah UMR.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300">Selengkapnya</a>
                                <a href="#" class="border border-blue-600 text-blue-600 hover:bg-blue-50 font-semibold py-2 px-4 rounded-lg transition-colors duration-300">Download Form</a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">Kegiatan</span>
                                <span class="text-sm text-gray-500">2 hari yang lalu</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Pelatihan UMKM Desa</h3>
                            <p class="text-gray-600 mb-3">
                                Pelatihan pengembangan UMKM untuk warga desa dalam rangka meningkatkan ekonomi.
                            </p>
                            <p class="text-gray-700 mb-4">
                                Pelatihan akan dilaksanakan selama 3 hari dengan materi meliputi
                                manajemen usaha, pemasaran digital, dan pengembangan produk.
                                Peserta akan mendapatkan sertifikat dan modal usaha.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <a href="#" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300">Daftar Sekarang</a>
                                <a href="#" class="border border-green-600 text-green-600 hover:bg-green-50 font-semibold py-2 px-4 rounded-lg transition-colors duration-300">Jadwal Lengkap</a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <span class="inline-block bg-cyan-100 text-cyan-800 px-3 py-1 rounded-full text-sm font-semibold">Infrastruktur</span>
                                <span class="text-sm text-gray-500">3 hari yang lalu</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Pembangunan Jalan Desa</h3>
                            <p class="text-gray-600 mb-3">
                                Pemberitahuan mengenai pembangunan jalan desa yang akan dimulai minggu depan.
                            </p>
                            <p class="text-gray-700 mb-4">
                                Pembangunan jalan sepanjang 2 km akan dimulai pada tanggal 20 Januari 2024.
                                Selama masa pembangunan, warga dimohon untuk menggunakan jalan alternatif
                                dan berhati-hati saat melintas di area pembangunan.
                            </p>
                            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-4">
                                <div class="flex items-start">
                                    <i class="fas fa-exclamation-triangle text-yellow-600 mr-3 mt-1"></i>
                                    <div>
                                        <span class="font-bold text-yellow-900">Perhatian:</span>
                                        <span class="text-yellow-800"> Jalan akan ditutup sementara selama masa pembangunan.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <span class="inline-block bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-semibold">Kesehatan</span>
                                <span class="text-sm text-gray-500">4 hari yang lalu</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Posyandu Lansia</h3>
                            <p class="text-gray-600 mb-3">
                                Jadwal kegiatan Posyandu Lansia bulan Januari 2024.
                            </p>
                            <p class="text-gray-700 mb-4">
                                Posyandu Lansia akan dilaksanakan setiap hari Sabtu minggu kedua
                                dan keempat di Balai Desa. Kegiatan meliputi pemeriksaan kesehatan,
                                penyuluhan gizi, dan senam lansia.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <a href="#" class="bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300">Jadwal Lengkap</a>
                                <a href="#" class="border border-orange-600 text-orange-600 hover:bg-orange-50 font-semibold py-2 px-4 rounded-lg transition-colors duration-300">Daftar Peserta</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-8" data-aos="fade-up" data-aos-delay="500">
                    <div class="flex justify-center">
                        <div class="flex items-center space-x-2">
                            <button class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed" disabled>
                                <i class="fas fa-chevron-left mr-2"></i>Previous
                            </button>
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold">1</button>
                            <button class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">2</button>
                            <button class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300">3</button>
                            <button class="px-4 py-2 text-blue-600 bg-white border border-blue-300 rounded-lg hover:bg-blue-50 transition-colors duration-300">
                                Next<i class="fas fa-chevron-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Search -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-left">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-700 text-white p-4">
                        <h3 class="text-lg font-bold flex items-center">
                            <i class="fas fa-search mr-3"></i>Cari Pengumuman
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="relative">
                            <input type="text" class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Kata kunci...">
                            <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-purple-600 hover:bg-purple-700 text-white p-2 rounded-lg transition-colors duration-300">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-left" data-aos-delay="100">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-4">
                        <h3 class="text-lg font-bold flex items-center">
                            <i class="fas fa-tags mr-3"></i>Kategori
                        </h3>
                    </div>
                    <div class="p-0">
                        <div class="divide-y divide-gray-100">
                            <a href="#" class="flex justify-between items-center p-4 hover:bg-gray-50 transition-colors duration-300">
                                <div class="flex items-center">
                                    <i class="fas fa-exclamation-triangle text-yellow-500 mr-3"></i>
                                    <span class="text-gray-700 font-medium">Penting</span>
                                </div>
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-semibold">3</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-4 hover:bg-gray-50 transition-colors duration-300">
                                <div class="flex items-center">
                                    <i class="fas fa-bullhorn text-blue-500 mr-3"></i>
                                    <span class="text-gray-700 font-medium">Umum</span>
                                </div>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">8</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-4 hover:bg-gray-50 transition-colors duration-300">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar text-green-500 mr-3"></i>
                                    <span class="text-gray-700 font-medium">Kegiatan</span>
                                </div>
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">5</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-4 hover:bg-gray-50 transition-colors duration-300">
                                <div class="flex items-center">
                                    <i class="fas fa-cogs text-cyan-500 mr-3"></i>
                                    <span class="text-gray-700 font-medium">Infrastruktur</span>
                                </div>
                                <span class="bg-cyan-100 text-cyan-800 px-3 py-1 rounded-full text-sm font-semibold">4</span>
                            </a>
                            <a href="#" class="flex justify-between items-center p-4 hover:bg-gray-50 transition-colors duration-300">
                                <div class="flex items-center">
                                    <i class="fas fa-heartbeat text-red-500 mr-3"></i>
                                    <span class="text-gray-700 font-medium">Kesehatan</span>
                                </div>
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-semibold">6</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Announcements -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-left" data-aos-delay="200">
                    <div class="bg-gradient-to-r from-green-600 to-green-700 text-white p-4">
                        <h3 class="text-lg font-bold flex items-center">
                            <i class="fas fa-clock mr-3"></i>Pengumuman Terbaru
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="border-b border-gray-100 pb-3">
                            <h4 class="font-semibold text-gray-900 mb-1 hover:text-blue-600 transition-colors duration-300">
                                <a href="#" class="text-decoration-none">Jadwal Vaksinasi COVID-19</a>
                            </h4>
                            <p class="text-sm text-gray-500">2 jam yang lalu</p>
                        </div>
                        <div class="border-b border-gray-100 pb-3">
                            <h4 class="font-semibold text-gray-900 mb-1 hover:text-blue-600 transition-colors duration-300">
                                <a href="#" class="text-decoration-none">Pendaftaran Beasiswa Desa</a>
                            </h4>
                            <p class="text-sm text-gray-500">1 hari yang lalu</p>
                        </div>
                        <div class="border-b border-gray-100 pb-3">
                            <h4 class="font-semibold text-gray-900 mb-1 hover:text-blue-600 transition-colors duration-300">
                                <a href="#" class="text-decoration-none">Pelatihan UMKM Desa</a>
                            </h4>
                            <p class="text-sm text-gray-500">2 hari yang lalu</p>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-1 hover:text-blue-600 transition-colors duration-300">
                                <a href="#" class="text-decoration-none">Pembangunan Jalan Desa</a>
                            </h4>
                            <p class="text-sm text-gray-500">3 hari yang lalu</p>
                        </div>
                    </div>
                </div>

                <!-- Important Links -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-left" data-aos-delay="300">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-4">
                        <h3 class="text-lg font-bold flex items-center">
                            <i class="fas fa-link mr-3"></i>Link Penting
                        </h3>
                    </div>
                    <div class="p-0">
                        <div class="divide-y divide-gray-100">
                            <a href="#" class="flex items-center p-4 hover:bg-gray-50 transition-colors duration-300">
                                <i class="fas fa-file-pdf text-red-500 mr-3"></i>
                                <span class="text-gray-700 font-medium">Peraturan Desa</span>
                            </a>
                            <a href="#" class="flex items-center p-4 hover:bg-gray-50 transition-colors duration-300">
                                <i class="fas fa-calendar-alt text-blue-500 mr-3"></i>
                                <span class="text-gray-700 font-medium">Kalender Kegiatan</span>
                            </a>
                            <a href="#" class="flex items-center p-4 hover:bg-gray-50 transition-colors duration-300">
                                <i class="fas fa-phone text-green-500 mr-3"></i>
                                <span class="text-gray-700 font-medium">Kontak Darurat</span>
                            </a>
                            <a href="#" class="flex items-center p-4 hover:bg-gray-50 transition-colors duration-300">
                                <i class="fas fa-download text-cyan-500 mr-3"></i>
                                <span class="text-gray-700 font-medium">Formulir Online</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- AOS via CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.js" integrity="sha512-0Z3nG7OLh3s1y0mEwQb0mE+0a0ySxg3T2h7s6y4fJmNfWJcQnJ8uQm8O8wI2yLxQyQdJm5O3qVv5QkP3Yb0wAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Particles.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    setTimeout(() => {
        if (typeof AOS !== 'undefined') {
            document.documentElement.classList.remove('aos-disabled');
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100,
                delay: 0
            });
        }
    }, 100);

    // Initialize Particles.js
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-pengumuman', {
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
@endpush
