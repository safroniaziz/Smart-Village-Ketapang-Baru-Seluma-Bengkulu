@extends('layouts.app-public')

@section('title', 'Pengaduan - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
/* Custom CSS untuk Pengaduan Page */

/* Smooth gradient animation */
.hero-gradient {
    background: linear-gradient(135deg, #0086c9 0%, #0074b3 25%, #006ba3 50%, #005b93 75%, #004d83 100%);
    background-size: 200% 200%;
    animation: gradientShift 8s ease infinite;
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Form validation styles */
.is-invalid {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
}

.is-invalid:focus {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
}

/* Enhanced form styling */
.form-group {
    position: relative;
}

.form-group .error-message {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    display: none;
}

.form-group.is-invalid .error-message {
    display: block;
}

/* Smooth scroll behavior */
html {
    scroll-behavior: smooth;
}

/* Section navigation styling */
.section-nav {
    scroll-margin-top: 100px;
}

/* Sub Navigation Styling */
.stat-subnav {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(229, 231, 235, 0.5);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.subnav-surface {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    padding: 0.75rem;
    border: 1px solid rgba(229, 231, 235, 0.3);
}

.stat-tab {
    display: flex;
    align-items: center;
    padding: 0.75rem 1.5rem;
    border-radius: 0.75rem;
    font-weight: 600;
    font-size: 0.875rem;
    color: #6b7280;
    text-decoration: none;
    transition: all 0.3s ease;
    background: transparent;
    border: 1px solid transparent;
}

.stat-tab:hover {
    background: rgba(59, 130, 246, 0.1);
    color: #1d4ed8;
    border-color: rgba(59, 130, 246, 0.2);
    transform: translateY(-2px);
}

.stat-tab[aria-current="true"] {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    border-color: #1d4ed8;
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
}

.stat-tab span {
    white-space: nowrap;
}
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden min-h-[calc(100vh-8rem)] md:min-h-[calc(100vh-10rem)] flex items-center hero-gradient pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container -->
    <div id="particles-pengaduan" class="absolute inset-0"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-comment text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">ASPIRASI WARGA</h2>
                            <p class="text-sm text-blue-100">Pengaduan & Saran Masyarakat</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Pengaduan</span><br>
                        <span class="text-yellow-400 font-extrabold">Masyarakat</span>
                    </h1>

                    <!-- Badge Data Terkini -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-shield-check mr-2 text-yellow-300 text-xs"></i>
                            Transparan & Responsif
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        Sampaikan pengaduan, saran, dan kritik untuk kemajuan Desa Ketapang Baru. Setiap aspirasi akan
                        <span class="font-semibold text-yellow-300">ditindaklanjuti dengan responsif</span>
                        dan transparan
                    </p>
                </div>

                <!-- Enhanced Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ number_format($totalPengaduan) }}</div>
                        <div class="text-sm text-blue-100 font-medium">Total Pengaduan</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-chart-line text-green-300 mr-1"></i>
                            <span>Akumulasi terkini</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ number_format($pengaduanSelesai) }}</div>
                        <div class="text-sm text-blue-100 font-medium">Selesai</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-percent text-green-300 mr-1"></i>
                            <span>{{ $persentaseSelesai }}% dari total</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ $avgResponseTime }} hari</div>
                        <div class="text-sm text-blue-100 font-medium">Rata Waktu Respon</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-bolt text-orange-300 mr-1"></i>
                            <span>Lebih cepat lebih baik</span>
                        </div>
                    </div>

                    <div class="stat-card bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:bg-white/15 transition-all duration-300 data-point text-center">
                        <div class="text-2xl font-black text-yellow-400 animate-pulse mb-1">{{ $satisfactionRate }}%</div>
                        <div class="text-sm text-blue-100 font-medium">Tingkat Kepuasan</div>
                        <div class="text-xs text-blue-200 mt-1 flex items-center justify-center">
                            <i class="fas fa-star text-orange-300 mr-1"></i>
                            <span>Estimasi berdasarkan progres</span>
                        </div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 relative z-10" data-aos="fade-up" data-aos-delay="800">
                    <a href="#form-pengaduan" class="group bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-edit mr-2 text-base"></i>
                            <span class="text-base">Buat Pengaduan</span>
                        </div>
                    </a>
                    <a href="#cek-status" class="group bg-gradient-to-r from-yellow-400/20 to-orange-500/20 hover:from-yellow-400/30 hover:to-orange-500/30 backdrop-blur-md border-2 border-yellow-400/30 hover:border-yellow-400/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-search mr-2 text-base"></i>
                            <span class="text-base">Cek Status</span>
                        </div>
                    </a>
                </div>

                <!-- Data Freshness Indicator -->
                <div class="flex items-center gap-2 text-sm text-blue-200" data-aos="fade-up" data-aos-delay="900">
                    <i class="fas fa-sync-alt text-green-300"></i>
                    <span>Data terakhir diperbarui: {{ now()->format('d M Y, H:i') }}</span>
                </div>
            </div>

            <!-- Right Side - Info Card -->
            <div class="lg:w-[480px] flex-shrink-0 relative z-10" data-aos="fade-left" data-aos-delay="300">
                <!-- Enhanced Info Summary Card -->
                <div class="info-card group relative bg-gradient-to-br from-white via-blue-50 to-indigo-100 backdrop-blur-sm border border-blue-200/50 rounded-3xl p-6 shadow-2xl overflow-hidden hover:shadow-3xl hover:scale-105 hover:border-blue-300/70 cursor-pointer" data-aos="fade-up" data-aos-delay="400">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full -translate-y-16 translate-x-16 group-hover:scale-110 transition-transform duration-700"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-cyan-400 to-blue-500 rounded-full translate-y-12 -translate-x-12 group-hover:scale-110 transition-transform duration-700"></div>
                    </div>

                    <!-- Header Section -->
                    <div class="relative z-10 text-center mb-4">
                        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl mb-3 shadow-lg group-hover:scale-110 group-hover:shadow-blue-500/40 transition-all duration-300">
                            <i class="fas fa-comment text-white text-xl group-hover:text-blue-100 transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-lg font-black text-gray-800 mb-1 bg-gradient-to-r from-blue-600 to-indigo-700 bg-clip-text text-transparent">Pengaduan Masyarakat</h3>
                        <p class="text-xs text-gray-600 font-medium">Transparan & Responsif</p>
                    </div>

                    <!-- Info Grid - 2 Rows Layout -->
                    <div class="relative z-10 space-y-3 mb-4">
                        <!-- Row 1: 2 columns -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-center text-sm">
                                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-emerald-500/30 transition-all duration-300">
                                        <i class="fas fa-inbox text-white text-sm"></i>
                                    </div>
                                    <div class="text-center">
                                        <p class="font-bold text-gray-800 text-lg">{{ number_format($totalPengaduan) }}</p>
                                        <p class="text-gray-600 text-sm">Total Pengaduan</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-center text-sm">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-blue-500/30 transition-all duration-300">
                                        <i class="fas fa-check-circle text-white text-sm"></i>
                                    </div>
                                    <div class="text-center">
                                        <p class="font-bold text-gray-800 text-lg">{{ number_format($pengaduanSelesai) }}</p>
                                        <p class="text-gray-600 text-sm">Selesai</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Row 2: 1 column full width - Status Distribution -->
                        <div class="grid grid-cols-1 gap-3">
                            <div class="bg-white/70 backdrop-blur-sm rounded-xl p-4 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-yellow-500/30 transition-all duration-300">
                                            <i class="fas fa-clock text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800 text-lg">{{ number_format($pengaduanDalamProses) }} Dalam Proses</p>
                                            <p class="text-gray-600 text-sm">{{ $persentaseDalamProses }}% dari Total</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-purple-500/30 transition-all duration-300">
                                            <i class="fas fa-hourglass-start text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800 text-lg">{{ number_format($pengaduanMenunggu) }} Menunggu</p>
                                            <p class="text-gray-600 text-sm">{{ $persentaseMenunggu }}% dari Total</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Preview Section -->
                    <div class="relative z-10 bg-gradient-to-br from-gray-900 via-blue-900 to-indigo-900 rounded-2xl p-4 shadow-xl group-hover:shadow-2xl group-hover:from-gray-800 group-hover:via-blue-800 group-hover:to-indigo-800 transition-all duration-500">
                        <div class="text-center mb-3">
                            <div class="inline-flex items-center justify-center space-x-2 text-white/90 text-xs font-semibold mb-2">
                                <i class="fas fa-chart-pie text-cyan-400"></i>
                                <span>Status Pengaduan</span>
                            </div>
                            <div class="text-white text-sm font-bold">Real-time Monitoring</div>
                        </div>

                        <!-- Mini Progress Bars -->
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-xs text-white/80">
                                <span>Selesai</span>
                                <span>{{ $persentaseSelesai }}%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-1.5 overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-emerald-400 to-emerald-500 rounded-full transition-all duration-1000 ease-out" style="width: {{ $persentaseSelesai }}%"></div>
                            </div>

                            <div class="flex items-center justify-between text-xs text-white/80">
                                <span>Dalam Proses</span>
                                <span>{{ $persentaseDalamProses }}%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-1.5 overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full transition-all duration-1000 ease-out" style="width: {{ $persentaseDalamProses }}%"></div>
                            </div>

                            <div class="flex items-center justify-between text-xs text-white/80">
                                <span>Menunggu</span>
                                <span>{{ $persentaseMenunggu }}%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-1.5 overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-purple-400 to-pink-500 rounded-full transition-all duration-1000 ease-out" style="width: {{ $persentaseMenunggu }}%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Info -->
                    <div class="relative z-10 text-center">
                        <div class="flex items-center justify-center gap-2 text-xs text-gray-600 mb-2">
                            <i class="fas fa-shield-check text-green-500"></i>
                            <span>Semua pengaduan dilindungi kerahasiaan</span>
                        </div>
                        <div class="text-xs text-gray-500">
                            Rata-rata waktu respon: <span class="font-semibold text-blue-600">{{ $avgResponseTime }} hari</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<!-- Sub Navigation -->
<nav class="stat-subnav sticky top-20 z-30" aria-label="Navigasi Pengaduan">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="subnav-surface">
            <ul class="flex items-center gap-2 sm:gap-3 min-w-max" id="pengaduanSubnav">
                <li>
                    <a href="#form-pengaduan" class="stat-tab" aria-current="false">
                        <i class="fas fa-edit mr-2"></i>
                        <span>Form Pengaduan</span>
                    </a>
                </li>
                <li>
                    <a href="#cek-status" class="stat-tab" aria-current="false">
                        <i class="fas fa-search mr-2"></i>
                        <span>Cek Status</span>
                    </a>
                </li>

                <li>
                    <a href="#statistik" class="stat-tab" aria-current="false">
                        <i class="fas fa-chart-bar mr-2"></i>
                        <span>Statistik</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Complaint Form -->
<section class="py-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden" data-aos="fade-up">
    <!-- Background Decorations -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-200/20 to-indigo-300/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-purple-200/20 to-pink-300/20 rounded-full blur-3xl"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Enhanced Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-delay="100">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-comment mr-2"></i>
                    Form Pengaduan Masyarakat
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-blue-800 to-indigo-900 bg-clip-text text-transparent">
                        Sampaikan Aspirasi
                    </span>
                </h2>
                <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Kirim pengaduan, saran, dan kritik</span> untuk kemajuan Desa Ketapang Baru. Setiap aspirasi akan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-blue-700">ditindaklanjuti dengan responsif</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-blue-200 to-indigo-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

                <div id="form-pengaduan" class="section-nav bg-gradient-to-br from-white via-blue-50/30 to-purple-50/30 rounded-3xl shadow-2xl border border-white/50 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="p-8 lg:p-12" data-aos="fade-up" data-aos-delay="300">
                <!-- Enhanced Form Header -->
                <div class="text-center mb-12">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-edit text-white text-3xl"></i>
                    </div>
                    <h2 class="text-4xl font-black text-gray-900 mb-4">
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Form Pengaduan</span>
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Sampaikan pengaduan Anda dengan detail dan jelas. Data akan kami jaga kerahasiaannya.
                    </p>
                </div>

                <form id="complaintForm" class="space-y-8" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Personal Information -->
                    <div class="space-y-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            Informasi Pribadi
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nama" class="block text-sm font-semibold text-gray-700">Nama Lengkap *</label>
                                <input type="text"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="nama"
                                       name="nama"
                                       required>
                            </div>
                            <div class="space-y-2">
                                <label for="nik" class="block text-sm font-semibold text-gray-700">NIK</label>
                                <input type="text"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="nik"
                                       name="nik"
                                       placeholder="Opsional">
                            </div>
                </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-semibold text-gray-700">Email *</label>
                                <input type="email"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="email"
                                       name="email"
                                       required>
                            </div>
                            <div class="space-y-2">
                                <label for="telepon" class="block text-sm font-semibold text-gray-700">Telepon</label>
                                <input type="tel"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="telepon"
                                       name="telepon"
                                       placeholder="Opsional">
                            </div>
                        </div>

                        <div>
                            <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat</label>
                            <input type="text"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white"
                                   id="alamat"
                                   name="alamat"
                                   placeholder="Opsional">
                        </div>
                    </div>

                    <!-- Complaint Details -->
                    <div class="space-y-6 pt-6 border-t border-gray-200">
                        <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                            </div>
                            Detail Pengaduan
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="jenis_pengaduan" class="block text-sm font-semibold text-gray-700">Jenis Pengaduan *</label>
                                <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white"
                                        id="jenis_pengaduan"
                                        name="jenis_pengaduan"
                                        required>
                                    <option value="">Pilih jenis pengaduan</option>
                                    <option value="Infrastruktur">Infrastruktur</option>
                                    <option value="Pelayanan Publik">Pelayanan Publik</option>
                                    <option value="Keamanan & Ketertiban">Keamanan & Ketertiban</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Ekonomi & UMKM">Ekonomi & UMKM</option>
                                    <option value="Lingkungan">Lingkungan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label for="prioritas" class="block text-sm font-semibold text-gray-700">Tingkat Prioritas</label>
                                <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white"
                                        id="prioritas"
                                        name="prioritas"
                                        required>
                                    <option value="">Pilih prioritas</option>
                                    <option value="Rendah">Rendah</option>
                                    <option value="Sedang" selected>Sedang</option>
                                    <option value="Tinggi">Tinggi</option>
                                    <option value="Sangat Tinggi">Sangat Tinggi</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="judul" class="block text-sm font-semibold text-gray-700">Judul Pengaduan *</label>
                            <input type="text"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white"
                                   id="judul"
                                   name="judul"
                                   required
                                   placeholder="Masukkan judul pengaduan yang singkat dan jelas">
                </div>

                        <div class="space-y-2">
                            <label for="deskripsi" class="block text-sm font-semibold text-gray-700">Deskripsi Pengaduan *</label>
                            <textarea class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none bg-white"
                                      id="deskripsi"
                                      name="deskripsi"
                                      rows="5"
                                      required
                                      placeholder="Jelaskan detail pengaduan Anda dengan lengkap..."></textarea>
                        </div>
                    </div>

                    <!-- Location & Evidence -->
                    <div class="space-y-6 pt-6 border-t border-gray-200">
                        <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-map-marker-alt text-white text-sm"></i>
                                </div>
                            Lokasi & Bukti
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="lokasi" class="block text-sm font-semibold text-gray-700">Lokasi Kejadian</label>
                                <input type="text"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="lokasi"
                                       name="lokasi"
                                       placeholder="Contoh: Gang Melati No. 15, Dusun Ketapang">
                                </div>
                            <div class="space-y-2">
                                <label for="tanggal_kejadian" class="block text-sm font-semibold text-gray-700">Tanggal Kejadian</label>
                                <input type="date"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="tanggal_kejadian"
                                       name="tanggal_kejadian">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="bukti" class="block text-sm font-semibold text-gray-700">Upload Bukti (Opsional)</label>
                            <input type="file"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 bg-white"
                                   id="bukti"
                                   name="bukti"
                                   accept="image/*,.pdf,.doc,.docx">
                            <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, PDF, DOC. Maksimal 5MB</p>
                        </div>
                                        </div>

                    <!-- Privacy Options -->
                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex items-center">
                            <input type="hidden" name="anonim" value="0">
                            <input class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                   type="checkbox"
                                   id="anonim"
                                   name="anonim"
                                   value="1">
                            <label class="ml-3 text-sm font-medium text-gray-700" for="anonim">
                                Kirim sebagai anonim (nama tidak akan ditampilkan)
                            </label>
                                        </div>
                                    </div>

                    <div class="text-center pt-8" data-aos="fade-up" data-aos-delay="500">
                        <button type="submit"
                                class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 hover:from-blue-700 hover:via-indigo-700 hover:to-purple-700 text-white font-bold py-4 px-12 rounded-xl transform transition-all duration-300 hover:scale-105 hover:shadow-2xl shadow-lg">
                            <i class="fas fa-paper-plane mr-3"></i>Kirim Pengaduan
                        </button>
                    </div>

                    <!-- Submit Success Panel -->
                    <div id="submitSuccess" class="hidden mt-8">
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl p-6 shadow-xl">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-xl font-bold mb-2">Pengaduan berhasil dikirim</h4>
                                    <p class="text-blue-100 mb-4">Simpan nomor tracking berikut untuk memantau status pengaduan Anda. Nomor ini diperlukan saat melakukan pengecekan status, mohon dicatat dan jangan sampai hilang.</p>
                                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                        <div class="bg-white text-gray-900 rounded-xl px-4 py-3 font-mono font-bold tracking-wide">
                                            <span id="submittedTracking">-</span>
                                        </div>
                                        <div class="flex gap-3">
                                            <button type="button" id="copyTrackingBtn" class="bg-white/10 hover:bg-white/20 text-white font-semibold px-4 py-3 rounded-xl">
                                                <i class="fas fa-copy mr-2"></i>Salin Nomor
                                            </button>
                                            <button type="button" id="goStatusBtn" class="bg-white text-blue-700 hover:text-blue-800 font-bold px-4 py-3 rounded-xl">
                                                <i class="fas fa-search mr-2"></i>Pantau Status
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Complaint Status -->
<section id="cek-status" class="section-nav py-20 bg-gradient-to-br from-slate-50 via-gray-50 to-slate-100 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-20 right-10 w-64 h-64 bg-gradient-to-br from-green-200/30 to-emerald-300/30 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-10 w-96 h-96 bg-gradient-to-br from-blue-200/30 to-indigo-300/30 rounded-full blur-3xl"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Enhanced Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-green-600 to-emerald-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-4 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-search mr-2"></i>
                    Cek Status Pengaduan
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-green-800 to-emerald-900 bg-clip-text text-transparent">
                        Pantau Status Pengaduan
                    </span>
                </h2>
                <div class="w-32 h-1 bg-gradient-to-r from-green-500 to-emerald-500 mx-auto rounded-full"></div>
        </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Pantau status pengaduan</span> yang telah Anda kirim dengan mudah dan real-time. Setiap update akan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-green-700">diberitahukan secara transparan</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-green-200 to-emerald-200 opacity-60 rounded"></span>
                    </span>
                </p>
                        </div>
                    </div>

        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/50 p-8" data-aos="fade-up" data-aos-delay="200">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text"
                               class="w-full pl-12 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white text-lg"
                               id="trackingNumber"
                               placeholder="Masukkan nomor tracking pengaduan">
                    </div>
                </div>
                <div class="md:w-auto">
                    <button class="w-full md:w-auto bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold py-4 px-8 rounded-xl transform transition-all duration-300 hover:scale-105 shadow-lg"
                            onclick="checkStatus()">
                        <i class="fas fa-search mr-3"></i>Cek Status
                    </button>
                </div>
            </div>

            <!-- Inline status message -->
            <div id="statusMessage" class="hidden mt-6 rounded-xl border p-4"></div>
        </div>

        <!-- Status Result -->
        <div id="statusResult" class="mt-8" style="display: none;">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/50 overflow-hidden" data-aos="fade-up">
                <div class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 text-white p-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-check-circle text-white text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">Status Pengaduan</h3>
                            <p class="text-green-100 text-lg">Informasi lengkap pengaduan Anda</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                                <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-info-circle text-white text-sm"></i>
                                    </div>
                                    Informasi Dasar
                                </h4>
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Nomor Tracking:</span>
                                        <span class="font-mono font-bold text-gray-900" id="trackingNo">COMP-2024-001</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Judul:</span>
                                        <span class="font-medium text-gray-900" id="complaintTitle">Jalan Berlubang di Gang Melati</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Tanggal Kirim:</span>
                                        <span class="text-gray-900" id="submitDate">15 Januari 2024</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Status:</span>
                                        <span class="inline-block bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold" id="statusBadge">Dalam Proses</span>
                    </div>
                </div>
            </div>
                        </div>
                        <div class="space-y-6">
                            <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl p-6 border border-purple-100">
                                <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-clock text-white text-sm"></i>
                                    </div>
                                    Timeline & Progress
                                </h4>
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Estimasi Selesai:</span>
                                        <span class="font-bold text-gray-900" id="estimatedDate">20 Januari 2024</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Petugas:</span>
                                        <span class="font-bold text-gray-900" id="officer">Ahmad Supriadi</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Prioritas:</span>
                                        <span class="font-bold text-gray-900" id="priority">Sedang</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Update Terakhir:</span>
                                        <span class="font-bold text-gray-900" id="lastUpdate">16 Januari 2024</span>
                                    </div>
                        </div>
                    </div>
                        </div>
                    </div>

                    <!-- Enhanced Status Timeline (dynamic) -->
                    <div class="mt-8 bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-6 border border-gray-100">
                        <h4 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-history text-white text-sm"></i>
                            </div>
                            Riwayat Status
                        </h4>
                        <div id="statusTimeline" class="space-y-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<!-- AOS via CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- Particles.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100,
            delay: 0
        });
    }

    // Initialize Particles.js
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-pengaduan', {
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

<script>
// Initialize form handlers when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const complaintForm = document.getElementById('complaintForm');

    if (complaintForm) {
    // Form submission
        complaintForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Show loading
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
            submitBtn.disabled = true;

            // Create FormData for file upload
            const formData = new FormData(this);

            // Send AJAX request
            fetch('{{ route("pengaduan.store") }}', {
                method: 'POST',
                body: formData,
                credentials: 'same-origin',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(async (response) => {
                const contentType = response.headers.get('content-type') || '';
                if (!contentType.includes('application/json')) {
                    const text = await response.text();
                    throw new Error('Non-JSON response: ' + text.substring(0, 200));
                }
                const data = await response.json();

                if (!response.ok) {
                    // Handle validation errors (422)
                    if (response.status === 422 && data.errors) {
                        const firstField = Object.keys(data.errors)[0];
                        const firstMessage = data.errors[firstField][0];
                        showAlert(firstMessage, 'error');
                        const fieldEl = complaintForm.querySelector(`[name="${firstField}"]`);
                        if (fieldEl) {
                            fieldEl.classList.add('is-invalid');
                            fieldEl.focus();
                        }
                        return;
                    }
                    throw new Error(data.message || 'Terjadi kesalahan pada server.');
                }

                // Success
                if (data.success) {
                    // Toast sukses
                    showAlert(data.message || 'Pengaduan berhasil dikirim!', 'success');

                    // Tampilkan panel sukses + nomor tracking di halaman
                    complaintForm.reset();
                    const successPanel = document.getElementById('submitSuccess');
                    const trackingSpan = document.getElementById('submittedTracking');
                    if (successPanel && trackingSpan && data.tracking_number) {
                        trackingSpan.textContent = data.tracking_number;
                        successPanel.classList.remove('hidden');
                        const copyBtn = document.getElementById('copyTrackingBtn');
                        if (copyBtn) {
                            copyBtn.onclick = function () {
                                navigator.clipboard.writeText(data.tracking_number).then(() => {
                                    showAlert('Nomor tracking disalin', 'success');
                                });
                            };
                        }
                        const goBtn = document.getElementById('goStatusBtn');
                        if (goBtn) {
                            goBtn.onclick = function () {
                                const input = document.getElementById('trackingNumber');
                                if (input) input.value = data.tracking_number;
                                window.location.hash = 'cek-status';
                                // Tidak otomatis mencari, user menekan tombol cek status
                            };
                        }
                    }
                } else {
                    showAlert(data.message || 'Terjadi kesalahan yang tidak diketahui.', 'error');
                }
            })
            .catch(error => {
                console.error('Submit error:', error);
                showAlert('Terjadi kesalahan saat mengirim pengaduan. Silakan coba lagi.', 'error');
            })
            .finally(() => {
            // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
    });

    // Form validation
        const formElements = complaintForm.querySelectorAll('input, select, textarea');
        formElements.forEach(function(element) {
            element.addEventListener('blur', function() {
                if (this.hasAttribute('required') && !this.value) {
                    this.classList.add('is-invalid');
        } else {
                    this.classList.remove('is-invalid');
        }
            });
    });

    // Email validation
        const emailInput = complaintForm.querySelector('#email');
        if (emailInput) {
            emailInput.addEventListener('blur', function() {
                const email = this.value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email && !emailRegex.test(email)) {
                    this.classList.add('is-invalid');
        } else {
                    this.classList.remove('is-invalid');
                }
            });
        }
    }

    // Sub Navigation Active State
    const subnavLinks = document.querySelectorAll('#pengaduanSubnav .stat-tab');
    const sections = document.querySelectorAll('.section-nav');

    function updateActiveNav() {
        const scrollPos = window.scrollY + 100;

        sections.forEach((section, index) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;

            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                // Remove active from all links
                subnavLinks.forEach(link => {
                    link.setAttribute('aria-current', 'false');
                });
                // Set active on current link
                subnavLinks[index].setAttribute('aria-current', 'true');
            }
        });
    }

    // Update active nav on scroll
    window.addEventListener('scroll', updateActiveNav);

    // Update active nav on page load
    updateActiveNav();

    // Auto fill tracking from URL (?no=...) without auto-search
    try {
        const url = new URL(window.location.href);
        const no = url.searchParams.get('no');
        if (no) {
            const input = document.getElementById('trackingNumber');
            if (input) {
                input.value = no;
                // Do not auto-search; user triggers manually
            }
        }
    } catch (e) {}
});

function checkStatus() {
    const trackingNumber = document.getElementById('trackingNumber').value;

    if (!trackingNumber) {
        // Clear panel and message when input kosong
        const statusEl = document.getElementById('statusResult');
        if (statusEl) statusEl.style.display = 'none';
        const msg = document.getElementById('statusMessage');
        if (msg) msg.classList.add('hidden');
        showInlineMessage('warning', 'Masukkan nomor tracking pengaduan!');
        return;
    }

    // Show loading
    document.getElementById('statusResult').style.display = 'none';
    showInlineMessage('info', 'Mencari status pengaduan...');

    fetch(`/pengaduan/status/${encodeURIComponent(trackingNumber)}`, {
        headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
    })
        .then(res => res.json())
        .then(json => {
            if (!json.success) {
                showInlineMessage('error', json.message || 'Pengaduan tidak ditemukan');
                return;
            }
            const data = json.data;
            document.getElementById('trackingNo').textContent = data.nomor_tracking;
            document.getElementById('complaintTitle').textContent = data.judul || '-';
            document.getElementById('submitDate').textContent = data.created_at || '-';
            document.getElementById('statusBadge').textContent = data.status || '-';
            document.getElementById('priority').textContent = data.prioritas || '-';
            document.getElementById('officer').textContent = data.petugas || '-';
            // Estimated/Last update placeholders
            const estEl = document.getElementById('estimatedDate');
            if (estEl) estEl.textContent = (data.tanggal_selesai || '-')
            const lastUpdEl = document.getElementById('lastUpdate');
            if (lastUpdEl) lastUpdEl.textContent = (data.created_at || '-')
            document.getElementById('statusResult').style.display = 'block';
            showInlineMessage('success', 'Status pengaduan ditemukan!');

            // Build dynamic timeline
            const timeline = document.getElementById('statusTimeline');
            if (timeline) {
                timeline.innerHTML = '';
                // Always show Diterima at created_at
                timeline.appendChild(buildTimelineItem('Diterima', data.created_at, 'Pengaduan telah diterima dan sedang diverifikasi', 'green'));

                // Optional stages based on current status
                if (data.status === 'Dalam Proses' || data.status === 'Selesai' || data.status === 'Ditolak') {
                    timeline.appendChild(buildTimelineItem('Dalam Proses', data.created_at, 'Pengaduan sedang ditangani oleh petugas', 'yellow'));
                }
                if (data.status === 'Selesai') {
                    timeline.appendChild(buildTimelineItem('Selesai', data.tanggal_selesai || data.created_at, 'Pengaduan telah diselesaikan', 'blue'));
                }
                if (data.status === 'Ditolak') {
                    timeline.appendChild(buildTimelineItem('Ditolak', data.created_at, 'Pengaduan ditolak', 'red'));
                }
            }
        })
        .catch(err => {
            console.error(err);
            showInlineMessage('error', 'Gagal mengambil status pengaduan');
        });
}

// Alert function
function showAlert(message, type = 'info') {
    // Create alert element
    const alertDiv = document.createElement('div');
    alertDiv.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full`;

    // Set colors based on type
    switch(type) {
        case 'success':
            alertDiv.className += ' bg-green-500 text-white';
            break;
        case 'warning':
            alertDiv.className += ' bg-yellow-500 text-white';
            break;
        case 'error':
            alertDiv.className += ' bg-red-500 text-white';
            break;
        default:
            alertDiv.className += ' bg-blue-500 text-white';
    }

    alertDiv.innerHTML = `
        <div class="flex items-center">
            <span class="mr-2">${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;

    // Add to page
    document.body.appendChild(alertDiv);

    // Animate in
    setTimeout(() => {
        alertDiv.classList.remove('translate-x-full');
    }, 100);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (alertDiv.parentElement) {
            alertDiv.classList.add('translate-x-full');
            setTimeout(() => {
                if (alertDiv.parentElement) {
                    alertDiv.remove();
                }
            }, 300);
        }
    }, 5000);
}

// Inline message box in Cek Status section
function showInlineMessage(type, message) {
    const el = document.getElementById('statusMessage');
    if (!el) return;
    const base = 'mt-6 rounded-xl border p-4';
    const map = {
        success: 'border-green-200 bg-green-50 text-green-800',
        error: 'border-red-200 bg-red-50 text-red-800',
        info: 'border-blue-200 bg-blue-50 text-blue-800',
        warning: 'border-yellow-200 bg-yellow-50 text-yellow-800'
    };
    el.className = base + ' ' + (map[type] || map.info);
    const icon = type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-times-circle' : type === 'warning' ? 'fa-exclamation-circle' : 'fa-info-circle';
    el.innerHTML = `<div class="flex items-center gap-3"><i class="fas ${icon}"></i><span>${message}</span></div>`;
    el.classList.remove('hidden');
}

function buildTimelineItem(title, dateText, desc, color) {
    const wrap = document.createElement('div');
    wrap.className = 'flex items-start';

    const colorMap = {
        green: { bg: 'bg-green-500', border: 'border-green-100' },
        yellow: { bg: 'bg-yellow-500', border: 'border-yellow-100' },
        blue: { bg: 'bg-blue-500', border: 'border-blue-100' },
        red: { bg: 'bg-red-500', border: 'border-red-100' }
    };
    const c = colorMap[color] || colorMap.green;

    wrap.innerHTML = `
        <div class="flex-shrink-0 w-6 h-6 ${c.bg} rounded-full mt-1 mr-6 flex items-center justify-center">
            <i class="fas fa-check text-white text-xs"></i>
        </div>
        <div class="flex-1 bg-white rounded-2xl p-4 border ${c.border}">
            <h5 class="font-bold text-gray-900 mb-2">${title}</h5>
            <p class="text-gray-600 mb-2">${(dateText || '-') } - ${desc}</p>
        </div>
    `;
    return wrap;
}
</script>
@endpush

