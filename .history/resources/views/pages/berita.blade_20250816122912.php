@extends('layouts.app')

@section('title', 'Berita Desa - Smart Village Ketapang Baru')

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
    <div id="particles-berita" class="absolute inset-0"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
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
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Featured News -->
                <div class="card border-0 shadow-sm mb-4">
                    <img src="https://via.placeholder.com/800x400/2c5530/ffffff?text=Berita+Utama"
                         class="card-img-top" alt="Berita Utama">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-primary me-2">Berita Utama</span>
                            <small class="text-muted">2 jam yang lalu</small>
                        </div>
                        <h3 class="card-title fw-bold">Pembangunan Jalan Desa Selesai</h3>
                        <p class="card-text text-muted">
                            Pembangunan jalan desa sepanjang 2 km telah selesai dan siap digunakan warga.
                            Jalan ini menghubungkan Dusun Ketapang dengan Dusun Baru dan akan
                            memudahkan akses transportasi warga.
                        </p>
                        <p class="card-text">
                            Pembangunan yang dimulai sejak 3 bulan lalu ini menggunakan dana desa
                            dan swadaya masyarakat. Total anggaran yang dikeluarkan mencapai
                            Rp 500 juta dengan kontribusi dari pemerintah desa sebesar 70% dan
                            swadaya masyarakat 30%.
                        </p>
                        <a href="#" class="btn btn-primary">Baca selengkapnya</a>
                    </div>
                </div>

                <!-- News List -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="https://via.placeholder.com/400x250/4a7c59/ffffff?text=Berita+1"
                                 class="card-img-top" alt="Berita">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-success me-2">Kegiatan</span>
                                    <small class="text-muted">1 hari yang lalu</small>
                                </div>
                                <h6 class="card-title fw-bold">Pelatihan UMKM Desa</h6>
                                <p class="card-text text-muted">
                                    Pelatihan UMKM untuk warga desa dalam rangka meningkatkan ekonomi.
                                </p>
                                <a href="#" class="btn btn-link p-0">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="https://via.placeholder.com/400x250/8fbc8f/ffffff?text=Berita+2"
                                 class="card-img-top" alt="Berita">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-warning me-2">Pengumuman</span>
                                    <small class="text-muted">2 hari yang lalu</small>
                                </div>
                                <h6 class="card-title fw-bold">Jadwal Vaksinasi COVID-19</h6>
                                <p class="card-text text-muted">
                                    Vaksinasi COVID-19 untuk warga desa akan dilaksanakan minggu depan.
                                </p>
                                <a href="#" class="btn btn-link p-0">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="https://via.placeholder.com/400x250/2c5530/ffffff?text=Berita+3"
                                 class="card-img-top" alt="Berita">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-info me-2">Infrastruktur</span>
                                    <small class="text-muted">3 hari yang lalu</small>
                                </div>
                                <h6 class="card-title fw-bold">Pembangunan Posyandu</h6>
                                <p class="card-text text-muted">
                                    Pembangunan posyandu baru di Dusun Ketapang Baru telah dimulai.
                                </p>
                                <a href="#" class="btn btn-link p-0">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="https://via.placeholder.com/400x250/4a7c59/ffffff?text=Berita+4"
                                 class="card-img-top" alt="Berita">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-primary me-2">Pendidikan</span>
                                    <small class="text-muted">4 hari yang lalu</small>
                                </div>
                                <h6 class="card-title fw-bold">Beasiswa untuk Siswa Berprestasi</h6>
                                <p class="card-text text-muted">
                                    Program beasiswa untuk siswa berprestasi dari keluarga kurang mampu.
                                </p>
                                <a href="#" class="btn btn-link p-0">Baca selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Search -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Cari Berita</h5>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Kata kunci...">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Kategori</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-newspaper me-2 text-primary"></i>Berita Utama
                                    <span class="badge bg-primary float-end">5</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-bullhorn me-2 text-warning"></i>Pengumuman
                                    <span class="badge bg-warning float-end">8</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-calendar me-2 text-success"></i>Kegiatan
                                    <span class="badge bg-success float-end">12</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-cogs me-2 text-info"></i>Infrastruktur
                                    <span class="badge bg-info float-end">6</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-graduation-cap me-2 text-primary"></i>Pendidikan
                                    <span class="badge bg-primary float-end">4</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Recent News -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Berita Terbaru</h5>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Pelatihan UMKM Desa</a>
                            </h6>
                            <small class="text-muted">1 hari yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Jadwal Vaksinasi COVID-19</a>
                            </h6>
                            <small class="text-muted">2 hari yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Pembangunan Posyandu</a>
                            </h6>
                            <small class="text-muted">3 hari yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Beasiswa untuk Siswa Berprestasi</a>
                            </h6>
                            <small class="text-muted">4 hari yang lalu</small>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Tag Populer</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-dark">Pembangunan</span>
                            <span class="badge bg-light text-dark">UMKM</span>
                            <span class="badge bg-light text-dark">Kesehatan</span>
                            <span class="badge bg-light text-dark">Pendidikan</span>
                            <span class="badge bg-light text-dark">Infrastruktur</span>
                            <span class="badge bg-light text-dark">Ekonomi</span>
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
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
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
