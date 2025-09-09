@extends('layouts.app')

@section('title', 'Beranda - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.03"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-yellow-400/20 rounded-full animate-bounce"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-white/10 rounded-full animate-pulse"></div>
    <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-yellow-400/30 rounded-full animate-ping"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Hero Content -->
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="1000">
                <div class="space-y-4">
                    <h1 class="text-4xl lg:text-6xl font-bold leading-tight animate-fade-in-up">
                        Selamat Datang di<br>
                        <span class="text-yellow-400 animate-pulse">Smart Village</span><br>
                        <span class="text-2xl lg:text-4xl font-medium text-blue-100">Ketapang Baru</span>
                    </h1>
                    <p class="text-xl text-blue-100 leading-relaxed animate-fade-in-up-delay">
                        MENINGKATKAN KESEJAHTERAAN MASYARAKAT YANG BERMARTABAT DAN RELIGIUS DENGAN MENGEMBANGKAN POTENSI SUMBERDAYA.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 animate-fade-in-up-delay-2">
                    <a href="{{ route('surat.online') }}" class="btn-accent text-lg px-8 py-4 animate-hover-bounce">
                        <i class="fas fa-envelope mr-2"></i>Surat Online
                    </a>
                    <a href="{{ route('tentang') }}" class="btn-secondary text-lg px-8 py-4 animate-hover-bounce">
                        <i class="fas fa-info-circle mr-2"></i>Pelajari Lebih Lanjut
                    </a>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-3 gap-6 pt-8 animate-fade-in-up-delay-3">
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
            <div class="relative" data-aos="fade-left" data-aos-duration="1000">
                <div class="relative z-10 animate-float">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                         alt="Smart Village Ketapang Baru"
                         class="w-full h-96 lg:h-[500px] object-cover rounded-2xl shadow-2xl">
                </div>
                <div class="absolute -bottom-6 -right-6 w-full h-full bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl -z-10 animate-float-delay"></div>
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
            <!-- Surat Online -->
            <div class="card-hover p-6 text-center group" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 animate-bounce-slow">
                    <i class="fas fa-envelope text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Surat Online</h3>
                <p class="text-gray-600 mb-4">Ajukan surat secara online tanpa perlu antri. Proses cepat dan transparan.</p>
                <a href="{{ route('surat.online') }}" class="text-blue-600 hover:text-blue-700 font-medium inline-flex items-center group-hover:translate-x-2 transition-transform duration-300">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Data Warga -->
            <div class="card-hover p-6 text-center group" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 animate-bounce-slow-delay">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Data Warga</h3>
                <p class="text-gray-600 mb-4">Informasi data warga yang terintegrasi dan terupdate secara real-time.</p>
                <a href="{{ route('data.warga') }}" class="text-green-600 hover:text-green-700 font-medium inline-flex items-center group-hover:translate-x-2 transition-transform duration-300">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Peta Desa -->
            <div class="card-hover p-6 text-center group" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 animate-bounce-slow-delay-2">
                    <i class="fas fa-map text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Peta Desa</h3>
                <p class="text-gray-600 mb-4">Eksplorasi peta desa interaktif dengan informasi detail setiap wilayah.</p>
                <a href="{{ route('peta.desa') }}" class="text-purple-600 hover:text-purple-700 font-medium inline-flex items-center group-hover:translate-x-2 transition-transform duration-300">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Pengaduan -->
            <div class="card-hover p-6 text-center group" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 animate-bounce-slow-delay-3">
                    <i class="fas fa-comment text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Pengaduan</h3>
                <p class="text-gray-600 mb-4">Sampaikan pengaduan, saran, dan kritik untuk kemajuan desa.</p>
                <a href="{{ route('pengaduan') }}" class="text-red-600 hover:text-red-700 font-medium inline-flex items-center group-hover:translate-x-2 transition-transform duration-300">
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

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center transform hover:scale-110 transition-transform duration-300" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="text-4xl lg:text-5xl font-bold text-blue-600 counter" data-count="2500">0</div>
                <div class="text-gray-600 mt-2">Total Warga</div>
            </div>
            <div class="text-center transform hover:scale-110 transition-transform duration-300" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="text-4xl lg:text-5xl font-bold text-green-600 counter" data-count="8">0</div>
                <div class="text-gray-600 mt-2">Dusun</div>
            </div>
            <div class="text-center transform hover:scale-110 transition-transform duration-300" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="text-4xl lg:text-5xl font-bold text-purple-600 counter" data-count="250">0</div>
                <div class="text-gray-600 mt-2">Hektar Luas</div>
            </div>
            <div class="text-center transform hover:scale-110 transition-transform duration-300" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                <div class="text-4xl lg:text-5xl font-bold text-red-600 counter" data-count="95">0</div>
                <div class="text-gray-600 mt-2">% Literasi</div>
            </div>
        </div>
    </div>
</section>

<!-- News & Announcements Section -->
<section class="py-24 bg-white">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Latest News -->
            <div data-aos="fade-right" data-aos-duration="800">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Berita Terbaru</h2>
                    <a href="{{ route('berita') }}" class="text-blue-600 hover:text-blue-700 font-medium">Lihat Semua</a>
                </div>

                <div class="space-y-6">
                    <div class="card p-6 transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-start space-x-4">
                            <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                 alt="Berita" class="w-20 h-20 object-cover rounded-lg">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 mb-2">Pembangunan Jalan Desa Selesai</h3>
                                <p class="text-gray-600 text-sm mb-2">Pembangunan jalan desa sepanjang 2 km telah selesai dan siap digunakan warga.</p>
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="fas fa-calendar mr-1"></i>
                                    <span>2 hari yang lalu</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card p-6 transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-start space-x-4">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                 alt="Berita" class="w-20 h-20 object-cover rounded-lg">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 mb-2">Pelatihan Pertanian Modern</h3>
                                <p class="text-gray-600 text-sm mb-2">Program pelatihan pertanian modern untuk meningkatkan produktivitas petani.</p>
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="fas fa-calendar mr-1"></i>
                                    <span>1 minggu yang lalu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Latest Announcements -->
            <div data-aos="fade-left" data-aos-duration="800">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Pengumuman</h2>
                    <a href="{{ route('pengumuman') }}" class="text-blue-600 hover:text-blue-700 font-medium">Lihat Semua</a>
                </div>

                <div class="space-y-6">
                    <div class="card p-6 border-l-4 border-yellow-500 transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0 animate-pulse">
                                <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 mb-2">Jadwal Vaksinasi COVID-19</h3>
                                <p class="text-gray-600 text-sm mb-2">Vaksinasi COVID-19 akan dilaksanakan pada hari Senin, 15 Januari 2024.</p>
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="fas fa-calendar mr-1"></i>
                                    <span>Hari ini</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card p-6 border-l-4 border-blue-500 transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 animate-pulse">
                                <i class="fas fa-info-circle text-blue-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 mb-2">Pendaftaran Kartu Keluarga</h3>
                                <p class="text-gray-600 text-sm mb-2">Pendaftaran kartu keluarga baru akan dibuka mulai minggu depan.</p>
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="fas fa-calendar mr-1"></i>
                                    <span>3 hari yang lalu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 text-white">
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

@push('scripts')
<script>
$(document).ready(function() {
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

    // Hide loading screen
    setTimeout(function() {
        $('.loading-screen').fadeOut(500);
    }, 1000);
});
</script>
@endpush
