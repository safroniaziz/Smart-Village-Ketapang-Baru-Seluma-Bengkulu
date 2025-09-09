@extends('layouts.app')

@section('title', 'Kontak - Smart Village Ketapang Baru')

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
    <div id="particles-kontak" class="absolute inset-0"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-phone text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">LAYANAN KOMUNIKASI</h2>
                            <p class="text-sm text-blue-100">Hubungi Kami</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Hubungi</span><br>
                        <span class="text-yellow-400 font-extrabold">Kami</span>
                    </h1>

                    <!-- Badge -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-headset mr-2 text-yellow-300 text-xs"></i>
                            Siap Melayani 24/7
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Tim kami siap membantu Anda melalui berbagai saluran komunikasi yang tersedia untuk 
                        <span class="font-semibold text-yellow-300">pelayanan terbaik</span>
                    </p>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all duration-300">
                            <div class="text-2xl font-black text-yellow-400">24/7</div>
                            <div class="text-sm text-blue-100">Jam Layanan</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all duration-300">
                            <div class="text-2xl font-black text-yellow-400">5</div>
                            <div class="text-sm text-blue-100">Saluran Kontak</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all duration-300">
                            <div class="text-2xl font-black text-yellow-400">< 2h</div>
                            <div class="text-sm text-blue-100">Waktu Respon</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all duration-300">
                            <div class="text-2xl font-black text-yellow-400">98%</div>
                            <div class="text-sm text-blue-100">Kepuasan</div>
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

<!-- Contact Information -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <h5 class="card-title fw-bold">Alamat Kantor</h5>
                        <p class="card-text text-muted">
                            Jl. Desa Ketapang Baru No. 123<br>
                            Kecamatan Semidang Alas Maras<br>
                            Kabupaten Seluma<br>
                            Provinsi Bengkulu 38873
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-phone fa-2x text-success"></i>
                        </div>
                        <h5 class="card-title fw-bold">Telepon</h5>
                        <p class="card-text text-muted">
                            <strong>Kantor Desa:</strong><br>
                            (022) 1234567<br><br>
                            <strong>WhatsApp:</strong><br>
                            +62 812-3456-7890
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                            <i class="fas fa-clock fa-2x text-warning"></i>
                        </div>
                        <h5 class="card-title fw-bold">Jam Operasional</h5>
                        <p class="card-text text-muted">
                            <strong>Senin - Jumat:</strong><br>
                            08:00 - 16:00 WIB<br><br>
                            <strong>Sabtu:</strong><br>
                            08:00 - 12:00 WIB<br><br>
                            <strong>Minggu:</strong><br>
                            Tutup
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0"><i class="fas fa-envelope me-2"></i>Kirim Pesan</h4>
                    </div>
                    <div class="card-body p-4">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap *</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="tel" class="form-control" id="telepon" name="telepon">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subjek" class="form-label">Subjek *</label>
                                    <select class="form-select" id="subjek" name="subjek" required>
                                        <option value="">Pilih subjek</option>
                                        <option value="surat">Pengurusan Surat</option>
                                        <option value="data">Data Warga</option>
                                        <option value="pengaduan">Pengaduan</option>
                                        <option value="saran">Saran & Kritik</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="pesan" class="form-label">Pesan *</label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="5" required
                                          placeholder="Tulis pesan Anda di sini..."></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-4">
                <h2 class="display-5 fw-bold mb-3">Lokasi Kami</h2>
                <p class="lead text-muted">
                    Kunjungi kantor desa kami untuk layanan langsung.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-body p-0">
                        <div class="ratio ratio-21x9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9!2d107.5!3d-6.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTQnMDAuMCJTIDEwN8KwMzAnMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Contact -->
<section class="py-5 bg-warning bg-opacity-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="fw-bold mb-3">Kontak Darurat</h3>
                <p class="lead mb-4">
                    Untuk keadaan darurat, silakan hubungi nomor-nomor berikut:
                </p>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 bg-white shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-ambulance fa-2x text-danger mb-2"></i>
                                <h6 class="fw-bold">Ambulans</h6>
                                <p class="mb-0">119</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 bg-white shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-shield-alt fa-2x text-primary mb-2"></i>
                                <h6 class="fw-bold">Polisi</h6>
                                <p class="mb-0">110</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 bg-white shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-fire-extinguisher fa-2x text-warning mb-2"></i>
                                <h6 class="fw-bold">Pemadam Kebakaran</h6>
                                <p class="mb-0">113</p>
                            </div>
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
        particlesJS('particles-kontak', {
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

@push('scripts')
<script>
$(document).ready(function() {
    // Contact form submission
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        // Show loading
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...');
        submitBtn.prop('disabled', true);

        // Simulate form submission (replace with actual AJAX)
        setTimeout(function() {
            showAlert('Pesan berhasil dikirim! Kami akan segera menghubungi Anda.', 'success');
            $('#contactForm')[0].reset();

            // Reset button
            submitBtn.html(originalText);
            submitBtn.prop('disabled', false);
        }, 2000);
    });

    // Form validation
    $('#contactForm input, #contactForm select, #contactForm textarea').on('blur', function() {
        if ($(this).prop('required') && !$(this).val()) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    // Email validation
    $('#email').on('blur', function() {
        const email = $(this).val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email && !emailRegex.test(email)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });
});
</script>
@endpush
