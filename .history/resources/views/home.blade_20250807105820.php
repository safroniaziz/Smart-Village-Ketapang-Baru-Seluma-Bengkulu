@extends('layouts.app')

@section('title', 'Beranda - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden py-12 lg:py-16" style="background-color: #0086c9;">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-start justify-between gap-12">
            <!-- Hero Content -->
            <div class="flex-1 space-y-8">
                <div class="space-y-6">
                    <div class="flex items-center space-x-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-building text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">PEMERINTAHAN DESA</h2>
                            <p class="text-sm text-blue-100">Kecamatan Semidang Alas Maras</p>
                        </div>
                    </div>

                    <h1 class="text-4xl lg:text-6xl font-bold leading-tight" data-aos="fade-up" data-aos-delay="400">
                        Smart Village<br>
                        <span class="text-yellow-400">Ketapang Baru</span>
                    </h1>

                    <p class="text-xl text-blue-100 leading-relaxed max-w-2xl" data-aos="fade-up" data-aos-delay="600">
                        Sistem Informasi Pemerintahan Desa yang modern dan terintegrasi untuk memberikan pelayanan terbaik kepada masyarakat.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="800">
                    <a href="{{ route('surat.online') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 flex items-center justify-center text-lg hover:scale-105 transform">
                        <i class="fas fa-envelope mr-2"></i>Layanan Surat Online
                    </a>
                    <a href="{{ route('tentang') }}" class="bg-white/20 hover:bg-white/30 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 flex items-center justify-center backdrop-blur-sm text-lg hover:scale-105 transform">
                        <i class="fas fa-info-circle mr-2"></i>Profil Desa
                    </a>
                </div>

                <!-- Quick Stats -->
                <div class="flex flex-wrap gap-3 pt-6 max-w-3xl" data-aos="fade-up" data-aos-delay="1000">
                    <div class="text-center p-3 bg-white/10 backdrop-blur-sm rounded-lg border border-white/20 min-w-[140px] hover:scale-105 transition-transform duration-300">
                        <div class="text-xl font-bold text-white mb-1 counter" data-count="2847">0</div>
                        <div class="text-xs text-blue-100 font-medium">Total Warga</div>
                        <div class="text-xs text-blue-200 mt-1">1,432 L + 1,415 P</div>
                    </div>
                    <div class="text-center p-3 bg-white/10 backdrop-blur-sm rounded-lg border border-white/20 min-w-[140px] hover:scale-105 transition-transform duration-300">
                        <div class="text-xl font-bold text-white mb-1 counter" data-count="8">0</div>
                        <div class="text-xs text-blue-100 font-medium">Dusun</div>
                        <div class="text-xs text-blue-200 mt-1">24 RT/RW</div>
                    </div>
                    <div class="text-center p-3 bg-white/10 backdrop-blur-sm rounded-lg border border-white/20 min-w-[140px] hover:scale-105 transition-transform duration-300">
                        <div class="text-xl font-bold text-white mb-1 counter" data-count="1250">0</div>
                        <div class="text-xs text-blue-100 font-medium">Keluarga</div>
                        <div class="text-xs text-blue-200 mt-1">KK Aktif</div>
                    </div>
                    <div class="text-center p-3 bg-white/10 backdrop-blur-sm rounded-lg border border-white/20 min-w-[140px] hover:scale-105 transition-transform duration-300">
                        <div class="text-xl font-bold text-white mb-1 counter" data-count="450">0</div>
                        <div class="text-xs text-blue-100 font-medium">Hektar</div>
                        <div class="text-xs text-blue-200 mt-1">Sawah & Ladang</div>
                    </div>
                </div>
            </div>

                        <!-- Professional Info Card -->
            <div class="lg:w-80 flex-shrink-0">
                <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-2xl p-4 text-gray-900 sticky top-8 border border-gray-100">
                    <div class="text-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Desa Ketapang Baru</h3>
                        <p class="text-sm text-gray-600 font-medium">Kabupaten Seluma, Provinsi Bengkulu</p>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center space-x-3 p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-100">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-tie text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Kepala Desa</div>
                                <div class="text-xs text-gray-600">H. Ahmad Supriyadi, S.Pd</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3 p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-100">
                            <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-calendar text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Periode</div>
                                <div class="text-xs text-gray-600">2021 - 2027</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3 p-3 bg-gradient-to-r from-purple-50 to-violet-50 rounded-lg border border-purple-100">
                            <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-phone text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Kontak</div>
                                <div class="text-xs text-gray-600">(0736) 123456</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3 p-3 bg-gradient-to-r from-orange-50 to-amber-50 rounded-lg border border-orange-100">
                            <div class="w-8 h-8 bg-orange-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-envelope text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-sm">Email</div>
                                <div class="text-xs text-gray-600">ketapangbaru@gmail.com</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-t border-gray-200">
                        <div class="text-center">
                            <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg">
                                <i class="fas fa-star mr-1 text-yellow-300"></i>
                                Desa Digital Terdepan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-24 bg-white">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Layanan Unggulan</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kami menyediakan berbagai layanan digital untuk memudahkan warga dalam mengakses informasi dan layanan desa.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="service-card group" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="service-icon bg-gradient-to-br from-blue-500 to-blue-600">
                    <i class="fas fa-envelope text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Surat Online</h3>
                <p class="text-gray-600 mb-4">Ajukan surat secara online tanpa perlu antri. Proses cepat dan transparan.</p>
                <a href="{{ route('surat.online') }}" class="service-link">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="service-card group" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="service-icon bg-gradient-to-br from-green-500 to-green-600">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Data Warga</h3>
                <p class="text-gray-600 mb-4">Informasi data warga yang terintegrasi dan terupdate secara real-time.</p>
                <a href="{{ route('data.warga') }}" class="service-link">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="service-card group" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="service-icon bg-gradient-to-br from-purple-500 to-purple-600">
                    <i class="fas fa-map text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Peta Desa</h3>
                <p class="text-gray-600 mb-4">Eksplorasi peta desa interaktif dengan informasi detail setiap wilayah.</p>
                <a href="{{ route('peta.desa') }}" class="service-link">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="service-card group" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                <div class="service-icon bg-gradient-to-br from-red-500 to-red-600">
                    <i class="fas fa-comment text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Pengaduan</h3>
                <p class="text-gray-600 mb-4">Sampaikan pengaduan, saran, dan kritik untuk kemajuan desa.</p>
                <a href="{{ route('pengaduan') }}" class="service-link">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Statistik Desa</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Data statistik terkini tentang perkembangan dan kondisi Desa Ketapang Baru.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="stat-icon bg-blue-500">
                    <i class="fas fa-users text-white text-3xl"></i>
                </div>
                <div class="stat-content">
                    <div class="text-4xl lg:text-5xl font-bold text-blue-600 counter" data-count="2500">0</div>
                    <div class="text-gray-600 font-medium">Total Warga</div>
                </div>
            </div>

            <div class="stat-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="stat-icon bg-green-500">
                    <i class="fas fa-home text-white text-3xl"></i>
                </div>
                <div class="stat-content">
                    <div class="text-4xl lg:text-5xl font-bold text-green-600 counter" data-count="8">0</div>
                    <div class="text-gray-600 font-medium">Dusun</div>
                </div>
            </div>

            <div class="stat-card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="stat-icon bg-purple-500">
                    <i class="fas fa-map-marked-alt text-white text-3xl"></i>
                </div>
                <div class="stat-content">
                    <div class="text-4xl lg:text-5xl font-bold text-purple-600 counter" data-count="250">0</div>
                    <div class="text-gray-600 font-medium">Hektar Luas</div>
                </div>
            </div>

            <div class="stat-card" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                <div class="stat-icon bg-red-500">
                    <i class="fas fa-graduation-cap text-white text-3xl"></i>
                </div>
                <div class="stat-content">
                    <div class="text-4xl lg:text-5xl font-bold text-red-600 counter" data-count="95">0</div>
                    <div class="text-gray-600 font-medium">% Literasi</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="py-24 bg-white">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Berita Terbaru</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Dapatkan informasi terbaru seputar kegiatan dan perkembangan Desa Ketapang Baru.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="news-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="news-image">
                    <div class="w-full h-48 bg-gradient-to-br from-blue-500 to-blue-600 rounded-t-xl flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm font-medium">Berita Desa</p>
                        </div>
                    </div>
                    <div class="news-badge">Berita</div>
                </div>
                <div class="news-content">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Pembangunan Jalan Desa Selesai</h3>
                    <p class="text-gray-600 mb-4">Pembangunan jalan desa sepanjang 2 km telah selesai dan siap digunakan warga untuk akses transportasi yang lebih lancar.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>2 hari yang lalu</span>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <div class="news-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="news-image">
                    <div class="w-full h-48 bg-gradient-to-br from-green-500 to-green-600 rounded-t-xl flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                            </svg>
                            <p class="text-sm font-medium">Kegiatan Desa</p>
                        </div>
                    </div>
                    <div class="news-badge">Kegiatan</div>
                </div>
                <div class="news-content">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Pelatihan Pertanian Modern</h3>
                    <p class="text-gray-600 mb-4">Program pelatihan pertanian modern untuk meningkatkan produktivitas petani dan kesejahteraan warga desa.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>1 minggu yang lalu</span>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <div class="news-card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="news-image">
                    <div class="w-full h-48 bg-gradient-to-br from-purple-500 to-purple-600 rounded-t-xl flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm font-medium">Pengumuman</p>
                        </div>
                    </div>
                    <div class="news-badge">Pengumuman</div>
                </div>
                <div class="news-content">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Pelatihan UMKM Desa</h3>
                    <p class="text-gray-600 mb-4">Pelatihan UMKM untuk warga desa dalam rangka meningkatkan ekonomi dan kesejahteraan masyarakat.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>3 hari yang lalu</span>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
            <a href="{{ route('berita') }}" class="btn-primary text-lg px-8 py-4">
                <i class="fas fa-newspaper mr-2"></i>Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- Announcements Section -->
<section class="py-24 bg-gray-50">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Pengumuman Penting</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Informasi penting dan pengumuman resmi dari pemerintah desa untuk warga.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="announcement-card" data-aos="fade-right" data-aos-duration="800">
                <div class="announcement-icon bg-yellow-500">
                    <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                </div>
                <div class="announcement-content">
                    <div class="announcement-badge">Penting</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Jadwal Vaksinasi COVID-19</h3>
                    <p class="text-gray-600 mb-4">Vaksinasi COVID-19 akan dilaksanakan pada hari Senin, 15 Januari 2024. Semua warga diharapkan hadir sesuai jadwal yang telah ditentukan.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>Hari ini</span>
                        </div>
                        <a href="#" class="text-yellow-600 hover:text-yellow-700 font-medium">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <div class="announcement-card" data-aos="fade-left" data-aos-duration="800">
                <div class="announcement-icon bg-blue-500">
                    <i class="fas fa-info-circle text-white text-2xl"></i>
                </div>
                <div class="announcement-content">
                    <div class="announcement-badge">Informasi</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Pendaftaran Kartu Keluarga</h3>
                    <p class="text-gray-600 mb-4">Pendaftaran kartu keluarga baru akan dibuka mulai minggu depan. Persiapkan dokumen yang diperlukan untuk pendaftaran.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>3 hari yang lalu</span>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
            <a href="{{ route('pengumuman') }}" class="btn-secondary text-lg px-8 py-4">
                <i class="fas fa-bullhorn mr-2"></i>Lihat Semua Pengumuman
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 text-white" style="background-color: #0086c9;">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">Siap Bergabung dengan Smart Village?</h2>
            <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                Mari bersama-sama membangun desa yang lebih maju dan sejahtera melalui teknologi digital.
                Daftar sekarang dan nikmati berbagai layanan digital yang memudahkan.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="btn-accent text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                </a>
                <a href="{{ route('kontak') }}" class="btn-secondary text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-phone mr-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
$(document).ready(function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-out',
        once: true,
        offset: 100
    });

    // Counter animation
    $('.counter').each(function() {
        const $this = $(this);
        const countTo = $this.attr('data-count');

        $({ countNum: 0 }).animate({
            countNum: countTo
        }, {
            duration: 2000,
            easing: 'swing',
            step: function() {
                $this.text(Math.floor(this.countNum).toLocaleString());
            },
            complete: function() {
                $this.text(this.countNum.toLocaleString());
            }
        });
    });
});
</script>
@endpush


