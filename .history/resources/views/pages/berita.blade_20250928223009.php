@extends('layouts.app-public')

@section('title', 'Berita Desa - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-Ho3Q0RyY4wQtwj0Q1sS2mZ0b7N2b5VQQl9Z4b6VtqvH8lJ0m6EJ2lT2qYq8J2b6P9m1oX4m0m7W2YqFqSxq2aA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.aos-disabled [data-aos] { opacity: 1 !important; transform: none !important; }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)] flex items-center pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100"></div>

    <!-- Particle.js Container -->
    <div id="particles-berita" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20" data-aos="fade-up" data-aos-delay="300">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">INFORMASI TERKINI</h2>
                            <p class="text-sm text-blue-100">Berita & Kegiatan Desa</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Berita</span><br>
                        <span class="text-yellow-400 font-extrabold">Desa</span>
                    </h1>

                    <!-- Badge -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-rss mr-2 text-yellow-300 text-xs"></i>
                            Update Harian
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Informasi terbaru seputar kegiatan dan perkembangan Desa Ketapang Baru dengan
                        <span class="font-semibold text-yellow-300">liputan lengkap dan akurat</span>
                    </p>

                    <!-- Enhanced Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-6xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">156</div>
                                <i class="fas fa-newspaper text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Total Berita</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-chart-line text-green-300 mr-1"></i>
                                Artikel terpublikasi
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">25</div>
                                <i class="fas fa-calendar text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Bulan Ini</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-arrow-up text-green-300 mr-1"></i>
                                +15% dari bulan lalu
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">12</div>
                                <i class="fas fa-tags text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Kategori</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-layer-group text-blue-300 mr-1"></i>
                                Beragam topik
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">2.4K</div>
                                <i class="fas fa-eye text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Pembaca</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-users text-orange-300 mr-1"></i>
                                Per bulan aktif
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

<!-- News Content -->
<section class="py-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <!-- Floating Decoration -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-200/20 to-indigo-300/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-purple-200/20 to-pink-300/20 rounded-full blur-3xl"></div>

    <div class="relative container mx-auto px-4 py-12">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-newspaper mr-2"></i>
                    Berita Terkini Desa
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                <span class="bg-gradient-to-r from-gray-900 via-slate-800 to-blue-800 bg-clip-text text-transparent">
                    Informasi & Berita
                </span>
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto mb-4"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Dapatkan informasi terbaru seputar kegiatan dan perkembangan Desa Ketapang Baru
            </p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Featured News -->
                <article class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden mb-8 transform transition-all duration-300 hover:shadow-2xl" data-aos="fade-up">
                    <div class="relative">
                        <img src="https://via.placeholder.com/800x400/2c5530/ffffff?text=Berita+Utama"
                             class="w-full h-64 md:h-80 object-cover" alt="Berita Utama">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-4 mb-4">
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                                <i class="fas fa-star mr-1"></i>
                                Berita Utama
                            </span>
                            <span class="text-gray-500 text-sm flex items-center">
                                <i class="fas fa-clock mr-1"></i>
                                2 jam yang lalu
                            </span>
                        </div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-tight">
                            Pembangunan Jalan Desa Selesai
                        </h1>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Pembangunan jalan desa sepanjang 2 km telah selesai dan siap digunakan warga.
                            Jalan ini menghubungkan Dusun Ketapang dengan Dusun Baru dan akan
                            memudahkan akses transportasi warga.
                        </p>
                        <p class="text-gray-700 mb-6 leading-relaxed">
                            Pembangunan yang dimulai sejak 3 bulan lalu ini menggunakan dana desa
                            dan swadaya masyarakat. Total anggaran yang dikeluarkan mencapai
                            Rp 500 juta dengan kontribusi dari pemerintah desa sebesar 70% dan
                            swadaya masyarakat 30%.
                        </p>
                        <a href="#" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-book-open mr-2"></i>
                            Baca selengkapnya
                        </a>
                    </div>
                </article>

                <!-- News List -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <article class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative overflow-hidden">
                            <img src="https://via.placeholder.com/400x250/4a7c59/ffffff?text=Berita+1"
                                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300" alt="Berita">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                                    <i class="fas fa-calendar mr-1"></i>
                                    Kegiatan
                                </span>
                                <span class="text-gray-500 text-sm flex items-center">
                                    <i class="fas fa-clock mr-1"></i>
                                    1 hari yang lalu
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                                Pelatihan UMKM Desa
                            </h3>
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                Pelatihan UMKM untuk warga desa dalam rangka meningkatkan ekonomi.
                            </p>
                            <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200">
                                Baca selengkapnya
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                        </div>
                    </article>

                    <article class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative overflow-hidden">
                            <img src="https://via.placeholder.com/400x250/8fbc8f/ffffff?text=Berita+2"
                                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300" alt="Berita">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="inline-flex items-center px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">
                                    <i class="fas fa-bullhorn mr-1"></i>
                                    Pengumuman
                                </span>
                                <span class="text-gray-500 text-sm flex items-center">
                                    <i class="fas fa-clock mr-1"></i>
                                    2 hari yang lalu
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                                Jadwal Vaksinasi COVID-19
                            </h3>
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                Vaksinasi COVID-19 untuk warga desa akan dilaksanakan minggu depan.
                            </p>
                            <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200">
                                Baca selengkapnya
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                        </div>
                    </article>

                    <article class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl" data-aos="fade-up" data-aos-delay="300">
                        <div class="relative overflow-hidden">
                            <img src="https://via.placeholder.com/400x250/2c5530/ffffff?text=Berita+3"
                                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300" alt="Berita">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="inline-flex items-center px-2 py-1 bg-cyan-100 text-cyan-800 text-xs font-medium rounded-full">
                                    <i class="fas fa-cogs mr-1"></i>
                                    Infrastruktur
                                </span>
                                <span class="text-gray-500 text-sm flex items-center">
                                    <i class="fas fa-clock mr-1"></i>
                                    3 hari yang lalu
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                                Pembangunan Posyandu
                            </h3>
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                Pembangunan posyandu baru di Dusun Ketapang Baru telah dimulai.
                            </p>
                            <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200">
                                Baca selengkapnya
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                        </div>
                    </article>

                    <article class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl" data-aos="fade-up" data-aos-delay="400">
                        <div class="relative overflow-hidden">
                            <img src="https://via.placeholder.com/400x250/4a7c59/ffffff?text=Berita+4"
                                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300" alt="Berita">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                    <i class="fas fa-graduation-cap mr-1"></i>
                                    Pendidikan
                                </span>
                                <span class="text-gray-500 text-sm flex items-center">
                                    <i class="fas fa-clock mr-1"></i>
                                    4 hari yang lalu
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                                Beasiswa untuk Siswa Berprestasi
                            </h3>
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                Program beasiswa untuk siswa berprestasi dari keluarga kurang mampu.
                            </p>
                            <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200">
                                Baca selengkapnya
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="flex items-center justify-center space-x-2">
                        <button class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed" disabled>
                            <i class="fas fa-chevron-left mr-1"></i>
                            Previous
                        </button>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium shadow-lg">1</button>
                        <button class="px-4 py-2 text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">2</button>
                        <button class="px-4 py-2 text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">3</button>
                        <button class="px-4 py-2 text-blue-600 bg-white border border-gray-200 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                            Next
                            <i class="fas fa-chevron-right ml-1"></i>
                        </button>
                    </div>
                </nav>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Search -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6" data-aos="fade-left" data-aos-delay="100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-search text-blue-600 mr-2"></i>
                        Cari Berita
                    </h3>
                    <div class="relative">
                        <input type="text"
                               class="w-full pl-4 pr-12 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               placeholder="Masukkan kata kunci...">
                        <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-lg transition-colors duration-200">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6" data-aos="fade-left" data-aos-delay="200">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-folder text-blue-600 mr-2"></i>
                        Kategori Berita
                    </h3>
                    <div class="space-y-2">
                        <a href="#" class="group flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            <span class="text-gray-700 group-hover:text-blue-600 transition-colors duration-200 flex items-center">
                                <i class="fas fa-newspaper text-blue-500 mr-2"></i>
                                Berita Utama
                            </span>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">5</span>
                        </a>
                        <a href="#" class="group flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            <span class="text-gray-700 group-hover:text-blue-600 transition-colors duration-200 flex items-center">
                                <i class="fas fa-bullhorn text-yellow-500 mr-2"></i>
                                Pengumuman
                            </span>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded-full">8</span>
                        </a>
                        <a href="#" class="group flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            <span class="text-gray-700 group-hover:text-blue-600 transition-colors duration-200 flex items-center">
                                <i class="fas fa-calendar text-green-500 mr-2"></i>
                                Kegiatan
                            </span>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">12</span>
                        </a>
                        <a href="#" class="group flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            <span class="text-gray-700 group-hover:text-blue-600 transition-colors duration-200 flex items-center">
                                <i class="fas fa-cogs text-cyan-500 mr-2"></i>
                                Infrastruktur
                            </span>
                            <span class="bg-cyan-100 text-cyan-800 text-xs font-medium px-2 py-1 rounded-full">6</span>
                        </a>
                        <a href="#" class="group flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            <span class="text-gray-700 group-hover:text-blue-600 transition-colors duration-200 flex items-center">
                                <i class="fas fa-graduation-cap text-blue-500 mr-2"></i>
                                Pendidikan
                            </span>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">4</span>
                        </a>
                    </div>
                </div>

                <!-- Recent News -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6" data-aos="fade-left" data-aos-delay="300">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-clock text-blue-600 mr-2"></i>
                        Berita Terbaru
                    </h3>
                    <div class="space-y-4">
                        <div class="group border-b border-gray-100 pb-3 last:border-b-0 last:pb-0">
                            <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-200 mb-1">
                                <a href="#" class="text-decoration-none">Pelatihan UMKM Desa</a>
                            </h4>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-clock mr-1"></i>
                                1 hari yang lalu
                            </div>
                        </div>
                        <div class="group border-b border-gray-100 pb-3 last:border-b-0 last:pb-0">
                            <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-200 mb-1">
                                <a href="#" class="text-decoration-none">Jadwal Vaksinasi COVID-19</a>
                            </h4>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-clock mr-1"></i>
                                2 hari yang lalu
                            </div>
                        </div>
                        <div class="group border-b border-gray-100 pb-3 last:border-b-0 last:pb-0">
                            <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-200 mb-1">
                                <a href="#" class="text-decoration-none">Pembangunan Posyandu</a>
                            </h4>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-clock mr-1"></i>
                                3 hari yang lalu
                            </div>
                        </div>
                        <div class="group border-b border-gray-100 pb-3 last:border-b-0 last:pb-0">
                            <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-200 mb-1">
                                <a href="#" class="text-decoration-none">Beasiswa untuk Siswa Berprestasi</a>
                            </h4>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-clock mr-1"></i>
                                4 hari yang lalu
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6" data-aos="fade-left" data-aos-delay="400">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-tags text-blue-600 mr-2"></i>
                        Tag Populer
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full hover:bg-blue-200 transition-colors duration-200 cursor-pointer">
                            Pembangunan
                        </span>
                        <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full hover:bg-green-200 transition-colors duration-200 cursor-pointer">
                            UMKM
                        </span>
                        <span class="inline-flex items-center px-3 py-1 bg-red-100 text-red-800 text-sm font-medium rounded-full hover:bg-red-200 transition-colors duration-200 cursor-pointer">
                            Kesehatan
                        </span>
                        <span class="inline-flex items-center px-3 py-1 bg-purple-100 text-purple-800 text-sm font-medium rounded-full hover:bg-purple-200 transition-colors duration-200 cursor-pointer">
                            Pendidikan
                        </span>
                        <span class="inline-flex items-center px-3 py-1 bg-cyan-100 text-cyan-800 text-sm font-medium rounded-full hover:bg-cyan-200 transition-colors duration-200 cursor-pointer">
                            Infrastruktur
                        </span>
                        <span class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-medium rounded-full hover:bg-yellow-200 transition-colors duration-200 cursor-pointer">
                            Ekonomi
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-10 right-10 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 mb-8" data-aos="fade-up">
                <i class="fas fa-bell text-yellow-300 mr-3"></i>
                <span class="text-sm font-semibold">Tetap Terhubung</span>
            </div>

            <!-- Title -->
            <h2 class="text-4xl md:text-5xl font-black mb-6" data-aos="fade-up" data-aos-delay="100">
                Jangan Lewatkan <span class="text-yellow-300">Berita Terbaru</span>
            </h2>

            <!-- Description -->
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Dapatkan informasi terkini tentang kegiatan, program, dan perkembangan Desa Ketapang Baru langsung di inbox Anda
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8" data-aos="fade-up" data-aos-delay="300">
                <a href="#" class="bg-white text-blue-600 hover:bg-gray-100 font-semibold py-4 px-8 rounded-xl transition-all duration-300 inline-flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-envelope mr-3"></i>
                    Berlangganan Newsletter
                </a>
                <a href="#" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 font-semibold py-4 px-8 rounded-xl transition-all duration-300 inline-flex items-center justify-center">
                    <i class="fas fa-share-alt mr-3"></i>
                    Ikuti Media Sosial
                </a>
            </div>

            <!-- Social Media Icons -->
            <div class="flex justify-center space-x-6" data-aos="fade-up" data-aos-delay="400">
                <a href="#" class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-all duration-300 transform hover:scale-110">
                    <i class="fab fa-facebook-f text-white"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-all duration-300 transform hover:scale-110">
                    <i class="fab fa-instagram text-white"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-all duration-300 transform hover:scale-110">
                    <i class="fab fa-whatsapp text-white"></i>
                </a>
                <a href="#" class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-all duration-300 transform hover:scale-110">
                    <i class="fab fa-youtube text-white"></i>
                </a>
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
        particlesJS('particles-berita', {
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
