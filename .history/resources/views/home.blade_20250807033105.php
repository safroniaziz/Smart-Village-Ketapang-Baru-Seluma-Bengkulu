@extends('layouts.app')

@section('title', 'Beranda - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-50 via-white to-blue-50">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>

    <div class="relative container-custom py-20">
        <div class="max-w-4xl mx-auto text-center">
            <div class="mb-8" data-aos="fade-up">
                <h1 class="text-5xl lg:text-7xl font-light text-slate-900 mb-6 leading-tight">
                    Smart Village
                    <span class="block text-3xl lg:text-4xl font-normal text-slate-600 mt-2">Ketapang Baru</span>
                </h1>
                <p class="text-xl lg:text-2xl text-slate-600 max-w-2xl mx-auto leading-relaxed font-light">
                    Membangun desa yang maju dan sejahtera melalui teknologi digital
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('surat.online') }}" class="inline-flex items-center justify-center px-8 py-4 bg-slate-900 text-white rounded-lg hover:bg-slate-800 transition-colors duration-300 font-medium">
                    <i class="fas fa-envelope mr-3"></i>
                    Surat Online
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center justify-center px-8 py-4 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors duration-300 font-medium">
                    <i class="fas fa-info-circle mr-3"></i>
                    Pelajari Lebih Lanjut
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="400">
                <div class="text-center">
                    <div class="text-3xl font-light text-slate-900 counter" data-count="2500">0</div>
                    <div class="text-slate-500 text-sm mt-1">Total Warga</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-light text-slate-900 counter" data-count="8">0</div>
                    <div class="text-slate-500 text-sm mt-1">Dusun</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-light text-slate-900 counter" data-count="250">0</div>
                    <div class="text-slate-500 text-sm mt-1">Hektar</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-24 bg-white">
    <div class="container-custom">
        <div class="text-center mb-20" data-aos="fade-up">
            <h2 class="text-4xl font-light text-slate-900 mb-6">Layanan Digital</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Akses layanan desa dengan mudah melalui platform digital yang terintegrasi
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Surat Online -->
            <div class="group" data-aos="fade-up" data-aos-delay="100">
                <div class="p-8 border border-slate-200 rounded-xl hover:border-slate-300 transition-colors duration-300">
                    <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-slate-200 transition-colors duration-300">
                        <i class="fas fa-envelope text-slate-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-medium text-slate-900 mb-3">Surat Online</h3>
                    <p class="text-slate-600 mb-4 leading-relaxed">Ajukan surat secara online tanpa perlu antri. Proses cepat dan transparan.</p>
                    <a href="{{ route('surat.online') }}" class="text-slate-900 hover:text-slate-700 font-medium inline-flex items-center group/link">
                        Pelajari Lebih Lanjut
                        <i class="fas fa-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>

            <!-- Data Warga -->
            <div class="group" data-aos="fade-up" data-aos-delay="200">
                <div class="p-8 border border-slate-200 rounded-xl hover:border-slate-300 transition-colors duration-300">
                    <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-slate-200 transition-colors duration-300">
                        <i class="fas fa-users text-slate-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-medium text-slate-900 mb-3">Data Warga</h3>
                    <p class="text-slate-600 mb-4 leading-relaxed">Informasi data warga yang terintegrasi dan terupdate secara real-time.</p>
                    <a href="{{ route('data.warga') }}" class="text-slate-900 hover:text-slate-700 font-medium inline-flex items-center group/link">
                        Pelajari Lebih Lanjut
                        <i class="fas fa-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>

            <!-- Peta Desa -->
            <div class="group" data-aos="fade-up" data-aos-delay="300">
                <div class="p-8 border border-slate-200 rounded-xl hover:border-slate-300 transition-colors duration-300">
                    <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-slate-200 transition-colors duration-300">
                        <i class="fas fa-map text-slate-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-medium text-slate-900 mb-3">Peta Desa</h3>
                    <p class="text-slate-600 mb-4 leading-relaxed">Eksplorasi peta desa interaktif dengan informasi detail setiap wilayah.</p>
                    <a href="{{ route('peta.desa') }}" class="text-slate-900 hover:text-slate-700 font-medium inline-flex items-center group/link">
                        Pelajari Lebih Lanjut
                        <i class="fas fa-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>

            <!-- Pengaduan -->
            <div class="group" data-aos="fade-up" data-aos-delay="400">
                <div class="p-8 border border-slate-200 rounded-xl hover:border-slate-300 transition-colors duration-300">
                    <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-slate-200 transition-colors duration-300">
                        <i class="fas fa-comment text-slate-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-medium text-slate-900 mb-3">Pengaduan</h3>
                    <p class="text-slate-600 mb-4 leading-relaxed">Sampaikan pengaduan, saran, dan kritik untuk kemajuan desa.</p>
                    <a href="{{ route('pengaduan') }}" class="text-slate-900 hover:text-slate-700 font-medium inline-flex items-center group/link">
                        Pelajari Lebih Lanjut
                        <i class="fas fa-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-24 bg-slate-50">
    <div class="container-custom">
        <div class="text-center mb-20" data-aos="fade-up">
            <h2 class="text-4xl font-light text-slate-900 mb-6">Statistik Desa</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Data statistik terkini tentang perkembangan dan kondisi Desa Ketapang Baru
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-12">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="text-5xl font-light text-slate-900 counter mb-2" data-count="2500">0</div>
                <div class="text-slate-600">Total Warga</div>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="text-5xl font-light text-slate-900 counter mb-2" data-count="8">0</div>
                <div class="text-slate-600">Dusun</div>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="text-5xl font-light text-slate-900 counter mb-2" data-count="250">0</div>
                <div class="text-slate-600">Hektar Luas</div>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="text-5xl font-light text-slate-900 counter mb-2" data-count="95">0</div>
                <div class="text-slate-600">% Literasi</div>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="py-24 bg-white">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Latest News -->
            <div data-aos="fade-right">
                <div class="flex items-center justify-between mb-12">
                    <h2 class="text-3xl font-light text-slate-900">Berita Terbaru</h2>
                    <a href="{{ route('berita') }}" class="text-slate-600 hover:text-slate-900 font-medium">Lihat Semua</a>
                </div>

                <div class="space-y-8">
                    <article class="group">
                        <div class="flex items-start space-x-6">
                            <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                 alt="Berita" class="w-24 h-24 object-cover rounded-lg">
                            <div class="flex-1">
                                <h3 class="font-medium text-slate-900 mb-2 group-hover:text-slate-700 transition-colors">Pembangunan Jalan Desa Selesai</h3>
                                <p class="text-slate-600 text-sm mb-3 leading-relaxed">Pembangunan jalan desa sepanjang 2 km telah selesai dan siap digunakan warga.</p>
                                <div class="flex items-center text-xs text-slate-500">
                                    <i class="fas fa-calendar mr-2"></i>
                                    <span>2 hari yang lalu</span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="group">
                        <div class="flex items-start space-x-6">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                                 alt="Berita" class="w-24 h-24 object-cover rounded-lg">
                            <div class="flex-1">
                                <h3 class="font-medium text-slate-900 mb-2 group-hover:text-slate-700 transition-colors">Pelatihan Pertanian Modern</h3>
                                <p class="text-slate-600 text-sm mb-3 leading-relaxed">Program pelatihan pertanian modern untuk meningkatkan produktivitas petani.</p>
                                <div class="flex items-center text-xs text-slate-500">
                                    <i class="fas fa-calendar mr-2"></i>
                                    <span>1 minggu yang lalu</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Latest Announcements -->
            <div data-aos="fade-left">
                <div class="flex items-center justify-between mb-12">
                    <h2 class="text-3xl font-light text-slate-900">Pengumuman</h2>
                    <a href="{{ route('pengumuman') }}" class="text-slate-600 hover:text-slate-900 font-medium">Lihat Semua</a>
                </div>

                <div class="space-y-6">
                    <div class="p-6 border border-slate-200 rounded-xl">
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-amber-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-medium text-slate-900 mb-2">Jadwal Vaksinasi COVID-19</h3>
                                <p class="text-slate-600 text-sm mb-3 leading-relaxed">Vaksinasi COVID-19 akan dilaksanakan pada hari Senin, 15 Januari 2024.</p>
                                <div class="flex items-center text-xs text-slate-500">
                                    <i class="fas fa-calendar mr-2"></i>
                                    <span>Hari ini</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border border-slate-200 rounded-xl">
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-info-circle text-blue-600"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-medium text-slate-900 mb-2">Pendaftaran Kartu Keluarga</h3>
                                <p class="text-slate-600 text-sm mb-3 leading-relaxed">Pendaftaran kartu keluarga baru akan dibuka mulai minggu depan.</p>
                                <div class="flex items-center text-xs text-slate-500">
                                    <i class="fas fa-calendar mr-2"></i>
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
<section class="py-24 bg-slate-900">
    <div class="container-custom text-center">
        <div class="max-w-3xl mx-auto" data-aos="fade-up">
            <h2 class="text-4xl font-light text-white mb-6">Siap Bergabung dengan Smart Village?</h2>
            <p class="text-xl text-slate-300 mb-12 leading-relaxed">
                Mari bersama-sama membangun desa yang lebih maju dan sejahtera melalui teknologi digital.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-slate-900 rounded-lg hover:bg-slate-100 transition-colors duration-300 font-medium">
                    <i class="fas fa-user-plus mr-3"></i>
                    Daftar Sekarang
                </a>
                <a href="{{ route('kontak') }}" class="inline-flex items-center justify-center px-8 py-4 border border-slate-600 text-white rounded-lg hover:bg-slate-800 transition-colors duration-300 font-medium">
                    <i class="fas fa-phone mr-3"></i>
                    Hubungi Kami
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

<style>
.bg-grid-pattern {
    background-image:
        linear-gradient(rgba(0,0,0,0.1) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0,0,0,0.1) 1px, transparent 1px);
    background-size: 20px 20px;
}
</style>
