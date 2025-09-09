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

                    <!-- Enhanced Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-6xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">24/7</div>
                                <i class="fas fa-clock text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Jam Layanan</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-wifi text-green-300 mr-1"></i>
                                Selalu tersedia
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">5</div>
                                <i class="fas fa-phone text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Saluran Kontak</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-layer-group text-blue-300 mr-1"></i>
                                Multi channel
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">< 2h</div>
                                <i class="fas fa-hourglass-half text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Waktu Respon</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-lightning-bolt text-orange-300 mr-1"></i>
                                Respon cepat
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">98%</div>
                                <i class="fas fa-smile text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Kepuasan</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-star text-orange-300 mr-1"></i>
                                Rating pengguna
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

<!-- Contact Information -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 text-center h-full transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-6 group-hover:bg-blue-200 transition-colors duration-300">
                        <i class="fas fa-map-marker-alt text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Alamat Kantor</h3>
                    <div class="text-gray-600 leading-relaxed">
                        <p class="mb-1">Jl. Desa Ketapang Baru No. 123</p>
                        <p class="mb-1">Kecamatan Semidang Alas Maras</p>
                        <p class="mb-1">Kabupaten Seluma</p>
                        <p>Provinsi Bengkulu 38873</p>
                    </div>
                </div>
            </div>

            <div class="group" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 text-center h-full transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-6 group-hover:bg-green-200 transition-colors duration-300">
                        <i class="fas fa-phone text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Telepon</h3>
                    <div class="text-gray-600 leading-relaxed">
                        <div class="mb-4">
                            <p class="font-semibold text-gray-800 mb-1">Kantor Desa:</p>
                            <p>(022) 1234567</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 mb-1">WhatsApp:</p>
                            <p>+62 812-3456-7890</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 text-center h-full transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-yellow-100 rounded-full mb-6 group-hover:bg-yellow-200 transition-colors duration-300">
                        <i class="fas fa-clock text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Jam Operasional</h3>
                    <div class="text-gray-600 leading-relaxed space-y-3">
                        <div>
                            <p class="font-semibold text-gray-800">Senin - Jumat:</p>
                            <p>08:00 - 16:00 WIB</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Sabtu:</p>
                            <p>08:00 - 12:00 WIB</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Minggu:</p>
                            <p class="text-red-500 font-medium">Tutup</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6 text-center">
                <h2 class="text-2xl font-bold text-white mb-2 flex items-center justify-center">
                    <i class="fas fa-envelope mr-3"></i>
                    Kirim Pesan
                </h2>
                <p class="text-blue-100">Sampaikan pertanyaan atau saran Anda kepada kami</p>
            </div>
            <div class="p-8">
                <form id="contactForm" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Lengkap *
                            </label>
                            <input type="text" 
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                   id="nama" name="nama" required 
                                   placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email *
                            </label>
                            <input type="email" 
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                   id="email" name="email" required 
                                   placeholder="contoh@email.com">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="telepon" class="block text-sm font-semibold text-gray-700 mb-2">
                                Telepon
                            </label>
                            <input type="tel" 
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                   id="telepon" name="telepon" 
                                   placeholder="08xx-xxxx-xxxx">
                        </div>
                        <div>
                            <label for="subjek" class="block text-sm font-semibold text-gray-700 mb-2">
                                Subjek *
                            </label>
                            <select class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                    id="subjek" name="subjek" required>
                                <option value="">Pilih subjek</option>
                                <option value="surat">Pengurusan Surat</option>
                                <option value="data">Data Warga</option>
                                <option value="pengaduan">Pengaduan</option>
                                <option value="saran">Saran & Kritik</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="pesan" class="block text-sm font-semibold text-gray-700 mb-2">
                            Pesan *
                        </label>
                        <textarea class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none" 
                                  id="pesan" name="pesan" rows="5" required
                                  placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>

                    <div class="text-center pt-4">
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl shadow-lg hover:from-blue-700 hover:to-indigo-700 transform hover:scale-105 transition-all duration-200">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Lokasi Kami</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Kunjungi kantor desa kami untuk layanan langsung dan konsultasi.
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="aspect-w-16 aspect-h-9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9!2d107.5!3d-6.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTQnMDAuMCJTIDEwN8KwMzAnMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890"
                        class="w-full h-96 lg:h-[500px]" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Contact -->
<section class="py-16 bg-gradient-to-br from-red-50 to-orange-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center justify-center">
                <i class="fas fa-exclamation-triangle text-red-500 mr-3"></i>
                Kontak Darurat
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Untuk keadaan darurat, silakan hubungi nomor-nomor berikut:
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="group" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4 group-hover:bg-red-200 transition-colors duration-300">
                        <i class="fas fa-ambulance text-2xl text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Ambulans</h3>
                    <p class="text-2xl font-bold text-red-600">119</p>
                </div>
            </div>
            
            <div class="group" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4 group-hover:bg-blue-200 transition-colors duration-300">
                        <i class="fas fa-shield-alt text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Polisi</h3>
                    <p class="text-2xl font-bold text-blue-600">110</p>
                </div>
            </div>
            
            <div class="group" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-100 rounded-full mb-4 group-hover:bg-orange-200 transition-colors duration-300">
                        <i class="fas fa-fire-extinguisher text-2xl text-orange-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Pemadam Kebakaran</h3>
                    <p class="text-2xl font-bold text-orange-600">113</p>
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
