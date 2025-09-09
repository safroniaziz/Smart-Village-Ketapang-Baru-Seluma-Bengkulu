@extends('layouts.app')

@section('title', 'Beranda - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 text-white overflow-hidden min-h-screen flex items-center">
    <!-- Particle Background -->
    <div id="particles-js" class="absolute inset-0"></div>

    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Hero Content -->
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                <div class="space-y-4">
                    <h1 class="text-4xl lg:text-6xl font-bold leading-tight">
                        Selamat Datang di<br>
                        <span class="text-yellow-400 animate-pulse">Smart Village</span><br>
                        <span class="text-2xl lg:text-4xl font-medium text-blue-100">Ketapang Baru</span>
                    </h1>
                    <p class="text-xl text-blue-100 leading-relaxed">
                        MENINGKATKAN KESEJAHTERAAN MASYARAKAT YANG BERMARTABAT DAN RELIGIUS DENGAN MENGEMBANGKAN POTENSI SUMBERDAYA.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('surat.online') }}" class="btn-accent text-lg px-8 py-4 animate-hover-bounce">
                        <i class="fas fa-envelope mr-2"></i>Surat Online
                    </a>
                    <a href="{{ route('tentang') }}" class="btn-secondary text-lg px-8 py-4 animate-hover-bounce">
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
                <div class="relative z-10 animate-float">
                    <img src="https://images.pexels.com/photos/157866/pexels-photo-157866.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                         alt="Smart Village Ketapang Baru"
                         class="w-full h-96 lg:h-[500px] object-cover rounded-2xl shadow-2xl"
                         onerror="this.src='https://via.placeholder.com/600x400/1e40af/ffffff?text=Smart+Village+Ketapang+Baru'">
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

            <!-- Data Warga -->
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

            <!-- Peta Desa -->
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

            <!-- Pengaduan -->
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
                    <img src="https://images.pexels.com/photos/157866/pexels-photo-157866.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                         alt="Berita"
                         class="w-full h-48 object-cover rounded-t-xl"
                         onerror="this.src='https://via.placeholder.com/400x200/1e40af/ffffff?text=Berita+Desa'">
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
                    <img src="https://images.pexels.com/photos/157866/pexels-photo-157866.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                         alt="Berita"
                         class="w-full h-48 object-cover rounded-t-xl"
                         onerror="this.src='https://via.placeholder.com/400x200/10b981/ffffff?text=Kegiatan+Desa'">
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
                    <img src="https://images.pexels.com/photos/157866/pexels-photo-157866.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                         alt="Berita"
                         class="w-full h-48 object-cover rounded-t-xl"
                         onerror="this.src='https://via.placeholder.com/400x200/8b5cf6/ffffff?text=Pengumuman+Desa'">
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

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Initialize Particles.js with slower movement
    particlesJS('particles-js', {
        particles: {
            number: {
                value: 60,
                density: {
                    enable: true,
                    value_area: 800
                }
            },
            color: {
                value: '#ffffff'
            },
            shape: {
                type: 'circle',
                stroke: {
                    width: 0,
                    color: '#000000'
                }
            },
            opacity: {
                value: 0.3,
                random: false,
                anim: {
                    enable: false,
                    speed: 1,
                    opacity_min: 0.1,
                    sync: false
                }
            },
            size: {
                value: 2,
                random: true,
                anim: {
                    enable: false,
                    speed: 40,
                    size_min: 0.1,
                    sync: false
                }
            },
            line_linked: {
                enable: true,
                distance: 150,
                color: '#ffffff',
                opacity: 0.2,
                width: 1
            },
            move: {
                enable: true,
                speed: 2, // Much slower
                direction: 'none',
                random: false,
                straight: false,
                out_mode: 'out',
                bounce: false,
                attract: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 1200
                }
            }
        },
        interactivity: {
            detect_on: 'canvas',
            events: {
                onhover: {
                    enable: true,
                    mode: 'repulse'
                },
                onclick: {
                    enable: true,
                    mode: 'push'
                },
                resize: true
            },
            modes: {
                grab: {
                    distance: 400,
                    line_linked: {
                        opacity: 1
                    }
                },
                bubble: {
                    distance: 400,
                    size: 40,
                    duration: 2,
                    opacity: 8,
                    speed: 3
                },
                repulse: {
                    distance: 200,
                    duration: 0.4
                },
                push: {
                    particles_nb: 4
                },
                remove: {
                    particles_nb: 2
                }
            }
        },
        retina_detect: true
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
