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
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Featured Announcement -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-warning text-dark">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <span class="fw-bold">PENGUMUMAN PENTING</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h3 class="card-title fw-bold">Jadwal Vaksinasi COVID-19</h3>
                        <p class="text-muted mb-3">
                            <i class="fas fa-calendar me-2"></i>15 Januari 2024
                            <i class="fas fa-clock ms-3 me-2"></i>08:00 - 16:00 WIB
                        </p>
                        <p class="card-text">
                            Diumumkan kepada seluruh warga Desa Ketapang Baru bahwa vaksinasi COVID-19
                            akan dilaksanakan pada hari Senin, 15 Januari 2024 di Balai Desa Ketapang Baru.
                            Vaksinasi ini diperuntukkan bagi warga yang belum mendapatkan vaksinasi
                            booster (dosis ketiga).
                        </p>
                        <h6 class="fw-bold">Persyaratan:</h6>
                        <ul>
                            <li>Membawa KTP dan KK</li>
                            <li>Membawa kartu vaksinasi sebelumnya</li>
                            <li>Dalam kondisi sehat</li>
                            <li>Datang sesuai jadwal yang ditentukan</li>
                        </ul>
                        <h6 class="fw-bold">Jadwal per RT:</h6>
                        <ul>
                            <li>RT 001-005: 08:00 - 10:00 WIB</li>
                            <li>RT 006-010: 10:00 - 12:00 WIB</li>
                            <li>RT 011-015: 13:00 - 15:00 WIB</li>
                            <li>RT 016-020: 15:00 - 16:00 WIB</li>
                        </ul>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Catatan:</strong> Vaksinasi ini gratis dan wajib diikuti oleh seluruh warga.
                        </div>
                    </div>
                </div>

                <!-- Announcements List -->
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-primary me-2">Umum</span>
                                    <small class="text-muted">1 hari yang lalu</small>
                                </div>
                                <h5 class="card-title fw-bold">Pendaftaran Beasiswa Desa</h5>
                                <p class="card-text text-muted">
                                    Pendaftaran beasiswa untuk siswa SMA/SMK yang berprestasi dari keluarga kurang mampu.
                                </p>
                                <p class="card-text">
                                    Program beasiswa ini diperuntukkan bagi siswa kelas X, XI, dan XII
                                    dengan persyaratan nilai rata-rata minimal 8.0 dan berasal dari
                                    keluarga dengan penghasilan di bawah UMR.
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-primary btn-sm">Selengkapnya</a>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Download Form</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-success me-2">Kegiatan</span>
                                    <small class="text-muted">2 hari yang lalu</small>
                                </div>
                                <h5 class="card-title fw-bold">Pelatihan UMKM Desa</h5>
                                <p class="card-text text-muted">
                                    Pelatihan pengembangan UMKM untuk warga desa dalam rangka meningkatkan ekonomi.
                                </p>
                                <p class="card-text">
                                    Pelatihan akan dilaksanakan selama 3 hari dengan materi meliputi
                                    manajemen usaha, pemasaran digital, dan pengembangan produk.
                                    Peserta akan mendapatkan sertifikat dan modal usaha.
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-success btn-sm">Daftar Sekarang</a>
                                    <a href="#" class="btn btn-outline-success btn-sm">Jadwal Lengkap</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-info me-2">Infrastruktur</span>
                                    <small class="text-muted">3 hari yang lalu</small>
                                </div>
                                <h5 class="card-title fw-bold">Pembangunan Jalan Desa</h5>
                                <p class="card-text text-muted">
                                    Pemberitahuan mengenai pembangunan jalan desa yang akan dimulai minggu depan.
                                </p>
                                <p class="card-text">
                                    Pembangunan jalan sepanjang 2 km akan dimulai pada tanggal 20 Januari 2024.
                                    Selama masa pembangunan, warga dimohon untuk menggunakan jalan alternatif
                                    dan berhati-hati saat melintas di area pembangunan.
                                </p>
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Perhatian:</strong> Jalan akan ditutup sementara selama masa pembangunan.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-warning me-2">Kesehatan</span>
                                    <small class="text-muted">4 hari yang lalu</small>
                                </div>
                                <h5 class="card-title fw-bold">Posyandu Lansia</h5>
                                <p class="card-text text-muted">
                                    Jadwal kegiatan Posyandu Lansia bulan Januari 2024.
                                </p>
                                <p class="card-text">
                                    Posyandu Lansia akan dilaksanakan setiap hari Sabtu minggu kedua
                    dan keempat di Balai Desa. Kegiatan meliputi pemeriksaan kesehatan,
                    penyuluhan gizi, dan senam lansia.
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-warning btn-sm">Jadwal Lengkap</a>
                                    <a href="#" class="btn btn-outline-warning btn-sm">Daftar Peserta</a>
                                </div>
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
                        <h5 class="fw-bold mb-3">Cari Pengumuman</h5>
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
                                    <i class="fas fa-exclamation-triangle me-2 text-warning"></i>Penting
                                    <span class="badge bg-warning float-end">3</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-bullhorn me-2 text-primary"></i>Umum
                                    <span class="badge bg-primary float-end">8</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-calendar me-2 text-success"></i>Kegiatan
                                    <span class="badge bg-success float-end">5</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-cogs me-2 text-info"></i>Infrastruktur
                                    <span class="badge bg-info float-end">4</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-heartbeat me-2 text-danger"></i>Kesehatan
                                    <span class="badge bg-danger float-end">6</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Recent Announcements -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Pengumuman Terbaru</h5>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Jadwal Vaksinasi COVID-19</a>
                            </h6>
                            <small class="text-muted">2 jam yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Pendaftaran Beasiswa Desa</a>
                            </h6>
                            <small class="text-muted">1 hari yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Pelatihan UMKM Desa</a>
                            </h6>
                            <small class="text-muted">2 hari yang lalu</small>
                        </div>
                        <div class="mb-3">
                            <h6 class="fw-bold">
                                <a href="#" class="text-decoration-none">Pembangunan Jalan Desa</a>
                            </h6>
                            <small class="text-muted">3 hari yang lalu</small>
                        </div>
                    </div>
                </div>

                <!-- Important Links -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Link Penting</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-file-pdf me-2 text-danger"></i>Peraturan Desa
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-calendar-alt me-2 text-primary"></i>Kalender Kegiatan
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-phone me-2 text-success"></i>Kontak Darurat
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-download me-2 text-info"></i>Formulir Online
                                </a>
                            </li>
                        </ul>
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
