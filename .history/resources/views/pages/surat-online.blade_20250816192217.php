@extends('layouts.app')

@section('title', 'Surat Online - Smart Village Ketapang Baru')

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
    <div id="particles-surat" class="absolute inset-0"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
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

<!-- Service Types -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Jenis Surat yang Tersedia</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pilih jenis surat yang ingin Anda ajukan</p>
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
                    <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
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
                    <a href="#" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
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
                    <a href="#" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 shadow-sm h-100 service-card">
                    <div class="card-body text-center p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-clipboard-check fa-2x text-info"></i>
                        </div>
                        <h5 class="card-title fw-bold">Surat Izin</h5>
                        <p class="card-text text-muted">
                            Surat izin keramaian, mendirikan bangunan, dan izin lainnya.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>Izin Keramaian</li>
                            <li><i class="fas fa-check text-success me-2"></i>Izin Mendirikan Bangunan</li>
                            <li><i class="fas fa-check text-success me-2"></i>Izin Usaha</li>
                            <li><i class="fas fa-check text-success me-2"></i>Izin Lainnya</li>
                        </ul>
                        <a href="#" class="btn btn-info mt-3">Ajukan Surat</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="500">
                <div class="card border-0 shadow-sm h-100 service-card">
                    <div class="card-body text-center p-4">
                        <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-handshake fa-2x text-danger"></i>
                        </div>
                        <h5 class="card-title fw-bold">Surat Pernyataan</h5>
                        <p class="card-text text-muted">
                            Surat pernyataan untuk berbagai keperluan administrasi.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>Pernyataan Ahli Waris</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pernyataan Belum Menikah</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pernyataan Miskin</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pernyataan Lainnya</li>
                        </ul>
                        <a href="#" class="btn btn-danger mt-3">Ajukan Surat</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="600">
                <div class="card border-0 shadow-sm h-100 service-card">
                    <div class="card-body text-center p-4">
                        <div class="bg-secondary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-ellipsis-h fa-2x text-secondary"></i>
                        </div>
                        <h5 class="card-title fw-bold">Surat Lainnya</h5>
                        <p class="card-text text-muted">
                            Surat-surat lainnya yang tidak termasuk dalam kategori di atas.
                        </p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>Surat Kuasa</li>
                            <li><i class="fas fa-check text-success me-2"></i>Surat Keterangan Lainnya</li>
                            <li><i class="fas fa-check text-success me-2"></i>Surat Pengantar Lainnya</li>
                            <li><i class="fas fa-check text-success me-2"></i>Surat Khusus</li>
                        </ul>
                        <a href="#" class="btn btn-secondary mt-3">Ajukan Surat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How to Apply -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Cara Mengajukan Surat Online</h2>
                    <p class="lead text-muted">Ikuti langkah-langkah berikut untuk mengajukan surat</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <span class="fw-bold text-primary" style="font-size: 2rem;">1</span>
                        </div>
                        <h5 class="fw-bold">Pilih Jenis Surat</h5>
                        <p class="text-muted">
                            Pilih jenis surat yang ingin Anda ajukan dari daftar yang tersedia.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <span class="fw-bold text-success" style="font-size: 2rem;">2</span>
                        </div>
                        <h5 class="fw-bold">Isi Formulir</h5>
                        <p class="text-muted">
                            Isi formulir dengan data yang lengkap dan benar sesuai persyaratan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <span class="fw-bold text-warning" style="font-size: 2rem;">3</span>
                        </div>
                        <h5 class="fw-bold">Upload Dokumen</h5>
                        <p class="text-muted">
                            Upload dokumen pendukung yang diperlukan dalam format PDF atau JPG.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 shadow-sm text-center h-100">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <span class="fw-bold text-info" style="font-size: 2rem;">4</span>
                        </div>
                        <h5 class="fw-bold">Submit & Track</h5>
                        <p class="text-muted">
                            Submit pengajuan dan pantau status surat Anda melalui sistem tracking.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Requirements -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0"><i class="fas fa-info-circle me-2"></i>Persyaratan Umum</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Dokumen Wajib:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>KTP Asli (foto)</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Kartu Keluarga (foto)</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Surat Pengantar RT/RW</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Dokumen pendukung lainnya</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary">Ketentuan:</h6>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Warga Desa Ketapang Baru</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Data yang diisi benar</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Dokumen lengkap</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Mengikuti prosedur</li>
                                </ul>
                            </div>
                        </div>
                        <div class="alert alert-info mt-3">
                            <i class="fas fa-lightbulb me-2"></i>
                            <strong>Tips:</strong> Pastikan semua dokumen sudah dipersiapkan sebelum mengajukan surat online.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold mb-3">Siap Mengajukan Surat?</h2>
                <p class="lead mb-4">
                    Mulai ajukan surat Anda sekarang dan nikmati kemudahan layanan administrasi desa.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="#" class="btn btn-primary btn-lg">
                        <i class="fas fa-envelope me-2"></i>Ajukan Surat Sekarang
                    </a>
                    <a href="#" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-question-circle me-2"></i>Bantuan
                    </a>
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
@endpush
