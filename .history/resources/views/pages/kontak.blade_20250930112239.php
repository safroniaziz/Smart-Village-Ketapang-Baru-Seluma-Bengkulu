@extends('layouts.app-public')

@section('title', 'Kontak - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* 🚀 ADVANCED KONTAK PAGE STYLES 🚀 */
    :root {
        --primary-blue-start: #0086c9;
        --primary-blue-mid: #0074b3;
        --primary-blue-end: #006ba3;
        --glow-primary: rgba(0, 134, 201, 0.4);
        --glow-secondary: rgba(255, 215, 0, 0.6);
    }

    /* ✨ ADVANCED HERO BACKGROUND WITH SMOOTH ANIMATIONS ✨ */
    .hero-section {
        background: linear-gradient(135deg, var(--primary-blue-start) 0%, var(--primary-blue-mid) 25%, var(--primary-blue-end) 50%, #005b93 75%, #004d83 100%);
        background-size: 200% 200%;
        animation: heroGradientShift 8s ease infinite;
        position: relative;
        overflow: hidden;
        min-height: 100vh;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
        opacity: 0.3;
        animation: grainMove 20s linear infinite;
    }

    @keyframes heroGradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    @keyframes grainMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(-100px, -100px); }
    }

    /* 🎨 CONTACT CARDS STYLES 🎨 */
    .contact-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 2rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .contact-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #0086c9, #0074b3, #006ba3);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .contact-card:hover::before {
        opacity: 1;
    }

    .contact-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
    }

    /* 🌟 INFO CARD STYLES 🌟 */
    .info-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 1.5rem;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    /* 🎯 ICON CONTAINER STYLES 🎯 */
    .icon-container {
        width: 4rem;
        height: 4rem;
        background: linear-gradient(135deg, #0086c9, #0074b3);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 25px rgba(0, 134, 201, 0.3);
        transition: all 0.3s ease;
    }

    .icon-container:hover {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 15px 35px rgba(0, 134, 201, 0.4);
    }

    /* 📱 RESPONSIVE IMPROVEMENTS 📱 */
    @media (max-width: 768px) {
        .hero-section {
            min-height: 80vh;
        }
        
        .contact-card {
            margin-bottom: 1.5rem;
        }
    }

    /* 🎨 CUSTOM SCROLLBAR 🎨 */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #0086c9, #0074b3);
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #0074b3, #006ba3);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section relative text-white overflow-hidden flex items-center">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container -->
    <div id="particles-kontak" class="absolute inset-0"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Side - Contact Information -->
            <div class="space-y-8" data-aos="fade-right" data-aos-delay="200">
                <!-- Header -->
                <div class="space-y-4">
                    <div class="inline-flex items-center space-x-3 mb-6">
                        <div class="icon-container">
                            <i class="fas fa-phone text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">INFORMASI KONTAK</h2>
                            <p class="text-sm text-blue-200">Desa Ketapang Baru</p>
                        </div>
                    </div>

                    <h1 class="text-4xl lg:text-6xl font-black leading-tight">
                        <span class="text-white">Hubungi</span><br>
                        <span class="text-yellow-400 font-extrabold">Kami</span>
                    </h1>

                    <p class="text-lg text-blue-100 leading-relaxed max-w-md">
                        Dapatkan informasi terbaru dan layanan terbaik dari Pemerintah Desa Ketapang Baru
                    </p>
                </div>

                <!-- Contact Info Cards -->
                <div class="space-y-4">
                    <!-- Alamat -->
                    <div class="info-card p-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="flex items-start space-x-4">
                            <div class="icon-container w-12 h-12">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 mb-2">Alamat Kantor</h3>
                                <p class="text-gray-700 leading-relaxed">{{ $kontak->alamat_lengkap }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="info-card p-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="flex items-start space-x-4">
                            <div class="icon-container w-12 h-12">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 mb-2">Telepon</h3>
                                <p class="text-gray-700">{{ $kontak->telepon ?: 'Belum tersedia' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="info-card p-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="flex items-start space-x-4">
                            <div class="icon-container w-12 h-12">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 mb-2">Email</h3>
                                <p class="text-gray-700">{{ $kontak->email ?: 'Belum tersedia' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Detailed Information -->
            <div class="space-y-8" data-aos="fade-left" data-aos-delay="300">
                <!-- Main Contact Card -->
                <div class="contact-card p-8">
                    <div class="text-center mb-8">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-building text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $kontak->nama_desa }}</h3>
                        <p class="text-gray-600">{{ $kontak->deskripsi ?: 'Desa yang maju dan sejahtera' }}</p>
                    </div>

                    <!-- Contact Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Kepala Desa -->
                        @if($kontak->kepala_desa)
                        <div class="text-center p-4 bg-blue-50 rounded-xl">
                            <i class="fas fa-user-tie text-blue-600 text-2xl mb-2"></i>
                            <h4 class="font-semibold text-gray-900">Kepala Desa</h4>
                            <p class="text-sm text-gray-600">{{ $kontak->kepala_desa }}</p>
                        </div>
                        @endif

                        <!-- Sekretaris Desa -->
                        @if($kontak->sekretaris_desa)
                        <div class="text-center p-4 bg-green-50 rounded-xl">
                            <i class="fas fa-user text-green-600 text-2xl mb-2"></i>
                            <h4 class="font-semibold text-gray-900">Sekretaris Desa</h4>
                            <p class="text-sm text-gray-600">{{ $kontak->sekretaris_desa }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Jam Operasional -->
                    @if($kontak->jam_operasional_formatted)
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h4 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-clock text-blue-600 mr-2"></i>
                            Jam Operasional
                        </h4>
                        <div class="space-y-2">
                            @foreach($kontak->jam_operasional_formatted as $hari)
                            <div class="flex justify-between items-center py-2 border-b border-gray-200 last:border-b-0">
                                <span class="text-gray-700">{{ $hari }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    @if($kontak->telepon)
                    <a href="tel:{{ $kontak->telepon }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-semibold text-center transition-all duration-300 hover:scale-105">
                        <i class="fas fa-phone mr-2"></i>
                        Telepon Sekarang
                    </a>
                    @endif
                    
                    @if($kontak->email)
                    <a href="mailto:{{ $kontak->email }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold text-center transition-all duration-300 hover:scale-105">
                        <i class="fas fa-envelope mr-2"></i>
                        Kirim Email
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
@if($kontak->koordinat)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Lokasi Kantor Desa</h2>
            <p class="text-lg text-gray-600">Temukan lokasi kantor desa di peta</p>
        </div>
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="h-96 bg-gray-200 flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-map-marked-alt text-4xl text-gray-400 mb-4"></i>
                    <p class="text-gray-600">Peta akan ditampilkan di sini</p>
                    <p class="text-sm text-gray-500">Koordinat: {{ $kontak->koordinat }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Initialize Particles.js
    if (document.getElementById('particles-kontak')) {
        particlesJS('particles-kontak', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: '#ffffff' },
                shape: { type: 'circle' },
                opacity: { value: 0.5, random: false },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#ffffff', opacity: 0.4, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: false, straight: false, out_mode: 'out', bounce: false }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true },
                modes: { grab: { distance: 400, line_linked: { opacity: 1 } }, bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 }, repulse: { distance: 200, duration: 0.4 }, push: { particles_nb: 4 }, remove: { particles_nb: 2 } }
            },
            retina_detect: true
        });
    }
});
</script>
@endpush