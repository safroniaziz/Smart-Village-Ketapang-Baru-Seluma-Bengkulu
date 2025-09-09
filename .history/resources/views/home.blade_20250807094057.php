@extends('layouts.app')

@section('title', 'Beranda - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative bg-blue-600 text-white overflow-hidden py-16 lg:py-24">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Hero Content -->
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                <div class="space-y-4">
                    <h1 class="text-4xl lg:text-6xl font-bold leading-tight">
                        Selamat Datang di<br>
                        <span class="text-yellow-400">Smart Village</span><br>
                        <span class="text-2xl lg:text-4xl font-medium text-blue-100">Ketapang Baru</span>
                    </h1>
                    <p class="text-xl text-blue-100 leading-relaxed">
                        Sistem Informasi Pemerintahan Desa yang modern, transparan, dan terintegrasi untuk kemajuan masyarakat.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('surat.online') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <i class="fas fa-envelope mr-2"></i>Surat Online
                    </a>
                    <a href="{{ route('tentang') }}" class="bg-white/20 hover:bg-white/30 text-white font-medium px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg backdrop-blur-sm">
                        <i class="fas fa-info-circle mr-2"></i>Pelajari Lebih Lanjut
                    </a>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-3 gap-6 pt-8">
                    <div class="text-center transform hover:scale-110 transition-transform duration-300">
                        <div class="text-3xl font-bold text-yellow-400 counter" data-count="2500">0</div>
                        <div class="text-blue-100 text-sm">Total Warga</div>
                    </div>
                    <div class="text-center transform hover:scale-110 transition-transform duration-300">
                        <div class="text-3xl font-bold text-yellow-400 counter" data-count="8">0</div>
                        <div class="text-blue-100 text-sm">Dusun</div>
                    </div>
                    <div class="text-center transform hover:scale-110 transition-transform duration-300">
                        <div class="text-3xl font-bold text-yellow-400 counter" data-count="250">0</div>
                        <div class="text-blue-100 text-sm">Hektar</div>
                    </div>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="relative" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                <div class="relative z-10">
                    <div class="w-full h-96 lg:h-[500px] rounded-2xl shadow-2xl overflow-hidden relative">
                        <!-- Full Background Image - Portrait -->
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&h=600&q=80"
                             alt="Kepala Desa Ketapang Baru"
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name=Kepala+Desa&background=1e40af&color=ffffff&size=400x600&bold=true'">

                        <!-- Overlay for better text readability -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                        <!-- Content overlay -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <h3 class="text-2xl lg:text-3xl font-bold mb-2">Kepala Desa</h3>
                            <p class="text-lg text-blue-100 mb-3">Ketapang Baru</p>

                            <div class="bg-white/20 backdrop-blur-sm rounded-xl px-4 py-2 inline-block">
                                <p class="font-bold text-lg">H. Ahmad Supriyadi, S.Pd</p>
                                <p class="text-sm text-blue-100">Periode 2021-2027</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content Cards -->
<section class="py-16 bg-gray-50">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Village Profile Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6" data-aos="fade-up" data-aos-duration="800">
                <div class="flex items-start space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Ketapang Baru</h3>
                        <p class="text-gray-600 text-sm mb-2">Jl. Raya Ketapang No. 15, RT/RW 001/001</p>
                        <p class="text-gray-600 text-sm">Desa Ketapang Baru, Kec. Semidang Alas Maras</p>
                        <p class="text-gray-600 text-sm">Kab. Seluma, Prov. Bengkulu</p>
                        <div class="mt-3">
                            <p class="text-gray-600 text-sm">
                                <i class="fas fa-phone mr-2"></i>Telp: (0736) 123456
                            </p>
                            <p class="text-gray-600 text-sm">
                                <i class="fas fa-envelope mr-2"></i>Email: ketapangbaru@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prayer Times Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-mosque mr-2 text-blue-600"></i>
                    Jadwal Sholat
                </h3>
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Imsak</span>
                        <span class="font-semibold">04:36</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Shubuh</span>
                        <span class="font-semibold">04:46</span>
                    </div>
                    <div class="flex justify-between items-center bg-blue-50 rounded-lg px-3 py-2 border border-blue-200">
                        <span class="text-blue-700 font-medium">Terbit</span>
                        <span class="font-bold text-blue-700">06:06</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Dzuhur</span>
                        <span class="font-semibold">12:04</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Ashr</span>
                        <span class="font-semibold">15:25</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Maghrib</span>
                        <span class="font-semibold">18:01</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Isya</span>
                        <span class="font-semibold">19:13</span>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-200">
                    <p class="text-xs text-gray-500">07 Aug 2025 • Lokasi: Desa Ketapang Baru</p>
                </div>
            </div>

            <!-- News Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                         alt="Berita Desa"
                         class="w-full h-48 object-cover"
                         onerror="this.src='https://ui-avatars.com/api/?name=Berita+Desa&background=1e40af&color=ffffff&size=400x200&bold=true'">
                    <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm rounded-lg px-2 py-1">
                        <span class="text-xs font-medium text-gray-700">8 Juli 2024</span>
                    </div>
                </div>
                <div class="p-6">
                    <h4 class="text-lg font-bold text-gray-900 mb-3">Kegiatan Sosialisasi Smart Village</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Kegiatan sosialisasi dan penerapan teknologi digital kepada warga Desa Ketapang Baru dalam rangka mewujudkan Smart Village yang modern dan terintegrasi.
                    </p>
                    <div class="mt-4 flex justify-center">
                        <div class="flex space-x-1">
                            <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                            <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                            <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                            <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-16 bg-white">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Layanan Unggulan</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kami menyediakan berbagai layanan digital untuk memudahkan warga dalam mengakses informasi dan layanan desa.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 p-6 text-center border border-gray-100" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-envelope text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Surat Online</h3>
                <p class="text-gray-600 text-sm mb-4">Ajukan surat secara online tanpa perlu antri. Proses cepat dan transparan.</p>
                <a href="{{ route('surat.online') }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm inline-flex items-center">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 p-6 text-center border border-gray-100" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Data Warga</h3>
                <p class="text-gray-600 text-sm mb-4">Informasi data warga yang terintegrasi dan terupdate secara real-time.</p>
                <a href="{{ route('data.warga') }}" class="text-green-600 hover:text-green-700 font-medium text-sm inline-flex items-center">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 p-6 text-center border border-gray-100" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Peta Desa</h3>
                <p class="text-gray-600 text-sm mb-4">Eksplorasi peta desa interaktif dengan informasi detail setiap wilayah.</p>
                <a href="{{ route('peta.desa') }}" class="text-purple-600 hover:text-purple-700 font-medium text-sm inline-flex items-center">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 p-6 text-center border border-gray-100" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-comment text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Pengaduan</h3>
                <p class="text-gray-600 text-sm mb-4">Sampaikan pengaduan, saran, dan kritik untuk kemajuan desa.</p>
                <a href="{{ route('pengaduan') }}" class="text-red-600 hover:text-red-700 font-medium text-sm inline-flex items-center">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-16 bg-gray-50">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Statistik Desa</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Data statistik terkini tentang perkembangan dan kondisi Desa Ketapang Baru.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 p-6 text-center border border-gray-100" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-blue-600 counter" data-count="2500">0</div>
                <div class="text-gray-600 font-medium">Total Warga</div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 p-6 text-center border border-gray-100" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-home text-white text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-green-600 counter" data-count="8">0</div>
                <div class="text-gray-600 font-medium">Dusun</div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 p-6 text-center border border-gray-100" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-purple-600 counter" data-count="250">0</div>
                <div class="text-gray-600 font-medium">Hektar Luas</div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 p-6 text-center border border-gray-100" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-red-600 counter" data-count="95">0</div>
                <div class="text-gray-600 font-medium">% Literasi</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 text-white">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">Siap Bergabung dengan Smart Village?</h2>
            <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                Mari bersama-sama membangun desa yang lebih maju dan sejahtera melalui teknologi digital.
                Daftar sekarang dan nikmati berbagai layanan digital yang memudahkan.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                </a>
                <a href="{{ route('kontak') }}" class="bg-white/20 hover:bg-white/30 text-white font-medium px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg backdrop-blur-sm">
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
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Counter animation
    $('.counter').each(function() {
        const $this = $(this);
        const countTo = $this.attr('data-count');

        $({ countNum: $this.text() }).animate({
            countNum: countTo
        }, {
            duration: 2000,
            easing: 'swing',
            step: function() {
                $this.text(Math.floor(this.countNum));
            },
            complete: function() {
                $this.text(this.countNum);
            }
        });
    });

    // Hide loading screen quickly
    setTimeout(function() {
        $('.loading-screen').fadeOut(300);
    }, 300);
});
</script>
@endpush
