@extends('layouts.app-public')

@section('title', 'Struktur Organisasi - Desa Ketapang Baru')

@push('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    .orgchart {
        background: transparent !important;
    }

    .node-photo {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
        border: 2px solid #e5e7eb;
        margin: 0 auto 12px;
        display: block;
    }

    .node-title {
        font-weight: bold;
        font-size: 14px;
        color: #1f2937;
        margin-bottom: 4px;
    }

    .node-name {
        font-size: 13px;
        color: #4b5563;
        margin-bottom: 4px;
    }

    .node-role {
        font-size: 11px;
        color: #6b7280;
        background: #f3f4f6;
        padding: 2px 8px;
        border-radius: 12px;
        display: inline-block;
    }

    .crown-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        width: 24px;
        height: 24px;
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)] flex items-center pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container for Struktur -->
    <div id="particles-struktur" class="absolute inset-0"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-0">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10 min-h-[80vh]">
            <!-- Hero Content (Left Side) -->
            <div class="flex-1 space-y-10 relative z-10">
                <div class="space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-sitemap text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">STRUKTUR ORGANISASI</h2>
                            <p class="text-sm text-blue-100">Kecamatan Semidang Alas Maras</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Struktur</span><br>
                        <span class="text-yellow-400 font-extrabold">Organisasi</span>
                    </h1>

                    <!-- Badge Desa Digital -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-users mr-2 text-yellow-300 text-xs"></i>
                            Pemerintahan & BPD
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl font-light" data-aos="fade-up" data-aos-delay="600">
                        Struktur organisasi pemerintahan Desa Ketapang Baru yang terdiri dari Pemerintah Desa dan
                        <span class="font-semibold text-yellow-300">Badan Permusyawaratan Desa (BPD)</span>
                    </p>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-8" data-aos="fade-up" data-aos-delay="700">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ $stats['totalKepala'] }}</div>
                        <div class="text-sm text-blue-100">Kepala Desa</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ $stats['totalAparatur'] }}</div>
                        <div class="text-sm text-blue-100">Aparatur Desa</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 text-center">
                        <div class="text-2xl font-black text-yellow-400">{{ $stats['totalBPD'] }}</div>
                        <div class="text-sm text-blue-100">Anggota BPD</div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 relative z-20" data-aos="fade-up" data-aos-delay="800">
                    <a href="#struktur-chart" class="group bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-sitemap mr-2 text-base"></i>
                            <span class="text-base">Lihat Struktur</span>
                        </div>
                    </a>
                    <a href="{{ route('tentang') }}" class="group bg-gradient-to-r from-yellow-400/20 to-orange-500/20 hover:from-yellow-400/30 hover:to-orange-500/30 backdrop-blur-md border-2 border-yellow-400/30 hover:border-yellow-400/50 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-info-circle mr-2 text-base"></i>
                            <span class="text-base">Profil Desa</span>
                        </div>
                    </a>
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
                            <i class="fas fa-users-cog text-white text-xl group-hover:text-blue-100 transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-lg font-black text-gray-800 mb-1 bg-gradient-to-r from-blue-600 to-indigo-700 bg-clip-text text-transparent">Tim Pemerintahan</h3>
                        <p class="text-xs text-gray-600 font-medium">Desa Ketapang Baru</p>
                    </div>

                    <!-- Info Grid -->
                    <div class="relative z-10 grid grid-cols-2 gap-3 mb-3">
                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-center text-xs">
                                <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-emerald-500/30 transition-all duration-300">
                                    <i class="fas fa-crown text-white text-xs"></i>
                                </div>
                                <div class="text-center">
                                    <p class="font-bold text-gray-800">{{ $stats['totalKepala'] }} Kepala Desa</p>
                                    <p class="text-gray-600">Pemimpin Pemerintahan</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-center text-xs">
                                <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-purple-500/30 transition-all duration-300">
                                    <i class="fas fa-balance-scale text-white text-xs"></i>
                                </div>
                                <div class="text-center">
                                    <p class="font-bold text-gray-800">{{ $stats['totalBPD'] }} Anggota BPD</p>
                                    <p class="text-gray-600">Badan Permusyawaratan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Row - Full Width -->
                    <div class="relative z-10 mb-4">
                        <div class="bg-white/70 backdrop-blur-sm rounded-xl p-3 shadow-sm border border-blue-100/50 group-hover:bg-white/90 group-hover:shadow-md transition-all duration-300">
                            <div class="flex items-center justify-center text-xs">
                                <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 group-hover:shadow-orange-500/30 transition-all duration-300">
                                    <i class="fas fa-users-cog text-white text-xs"></i>
                                </div>
                                <div class="text-center">
                                    <p class="font-bold text-gray-800">{{ $stats['totalAparatur'] }} Aparatur</p>
                                    <p class="text-gray-600">Sekretaris & Kasi/Kaur</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Preview Section -->
                    <div class="relative z-10 bg-gradient-to-br from-gray-900 via-blue-900 to-indigo-900 rounded-2xl p-4 shadow-xl group-hover:shadow-2xl group-hover:from-gray-800 group-hover:via-blue-800 group-hover:to-indigo-800 transition-all duration-500">
                        <div class="text-center mb-3">
                            <div class="inline-flex items-center justify-center space-x-2 text-white/90 text-xs font-semibold mb-2">
                                <i class="fas fa-sitemap text-cyan-400"></i>
                                <span>Struktur Organisasi</span>
                            </div>
                        </div>

                        <!-- Chart Preview -->
                        <div class="flex flex-col items-center space-y-3">
                            <div class="relative group-hover:scale-110 transition-transform duration-500">
                                <!-- Chart Glow Effect -->
                                <div class="absolute inset-0 bg-gradient-to-br from-cyan-400/30 to-blue-500/30 rounded-2xl blur-lg group-hover:from-cyan-400/50 group-hover:to-blue-500/50 transition-all duration-500"></div>
                                <div class="relative bg-white p-4 rounded-2xl shadow-2xl border-2 border-white/20 group-hover:shadow-3xl group-hover:border-white/40 transition-all duration-500">
                                    <div class="text-center">
                                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                                            <i class="fas fa-sitemap text-white text-xl"></i>
                                        </div>
                                        <h4 class="font-bold text-gray-800 text-sm mb-1">Organisasi Chart</h4>
                                        <p class="text-xs text-gray-600">Interactive Structure</p>
                                    </div>
                                </div>
                                <!-- Corner Decorations -->
                                <div class="absolute -top-1 -left-1 w-4 h-4 border-l-2 border-t-2 border-cyan-400 rounded-tl-lg"></div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 border-r-2 border-t-2 border-cyan-400 rounded-tr-lg"></div>
                                <div class="absolute -bottom-1 -left-1 w-4 h-4 border-l-2 border-b-2 border-cyan-400 rounded-bl-lg"></div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 border-r-2 border-b-2 border-cyan-400 rounded-br-lg"></div>
                            </div>

                            <div class="text-center">
                                <div class="flex items-center justify-center space-x-2 mb-1">
                                    <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse group-hover:bg-cyan-300 transition-colors duration-300"></div>
                                    <p class="text-sm text-white font-bold group-hover:text-cyan-100 transition-colors duration-300">Scroll untuk Lihat</p>
                                    <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse group-hover:bg-cyan-300 transition-colors duration-300" style="animation-delay: 0.5s;"></div>
                                </div>
                                <p class="text-xs text-gray-300">Interactive Chart • Full Structure</p>
                            </div>
                        </div>

                        <!-- Action Badge -->
                        <div class="flex justify-center mt-3">
                            <div class="inline-flex items-center bg-gradient-to-r from-cyan-500/20 to-blue-500/20 backdrop-blur-sm border border-cyan-400/30 rounded-full px-3 py-1 group-hover:from-cyan-500/30 group-hover:to-blue-500/30 group-hover:border-cyan-300/50 transition-all duration-300">
                                <i class="fas fa-arrow-down text-cyan-400 text-xs mr-2 group-hover:text-cyan-300 transition-colors duration-300"></i>
                                <span class="text-xs text-cyan-100 font-medium group-hover:text-white transition-colors duration-300">Scroll untuk Lihat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Organizational Chart Section -->
<section id="struktur-chart" class="py-24 bg-gradient-to-br from-gray-50 via-white to-blue-50" data-aos="fade-up" data-aos-duration="1000">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-sparkles mr-2"></i>
                    Bagan Organisasi Desa
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 bg-clip-text text-transparent">
                        Struktur Organisasi
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <!-- Description -->
            <div class="w-full mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-blue-700">Representasi hierarki dan koordinasi</span> antara Pemerintah Desa dan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-purple-700">Badan Permusyawaratan Desa (BPD)</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-blue-200 to-purple-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <div class="w-full" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <!-- Dynamic Chart from Database -->
            <div class="lg:grid lg:grid-cols-2 lg:gap-32 lg:items-start relative w-full mx-auto">
                <!-- Garis penghubung antara Kepala Desa dan Ketua BPD -->
                <div class="hidden lg:block absolute top-[140px] left-1/2 w-80 h-1 border-t-4 border-dashed border-purple-500 transform -translate-x-1/2 z-10 pointer-events-none shadow-lg" style="box-shadow: 0 0 8px rgba(139, 92, 246, 0.3);"></div>

                <!-- LEFT COLUMN: Pemerintahan Desa hierarchy -->
                <div class="flex flex-col items-center mb-8 lg:mb-0 relative z-10">
                    @if(isset($strukturPemerintahan['kepala']) && $strukturPemerintahan['kepala']->count() > 0)
                        @foreach($strukturPemerintahan['kepala'] as $kepala)
                            <!-- Kepala Desa - Top position -->
                            <div class="group bg-gradient-to-br from-blue-50 to-blue-100 border-4 border-blue-400 rounded-xl p-4 lg:p-6 text-center shadow-xl relative w-full lg:max-w-[220px] mx-auto min-h-[240px] lg:min-h-[280px] flex flex-col justify-center mb-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-blue-500">
                                <div class="absolute -top-3 -right-3 w-6 h-6 lg:w-8 lg:h-8 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center border-2 border-white shadow-lg">
                                    <i class="fas fa-crown text-white text-xs"></i>
                                </div>
                                <img src="{{ $kepala->foto_url }}" alt="{{ $kepala->nama }}" class="w-28 h-28 rounded-xl border-2 border-blue-300 mx-auto mb-3 object-cover transition-transform duration-300 group-hover:scale-105" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                <h4 class="font-bold text-gray-900 text-base lg:text-lg mb-1">👑 {{ $kepala->jabatan }}</h4>
                                <p class="text-blue-600 font-semibold mb-1 text-sm lg:text-base">{{ $kepala->nama }}</p>
                                @if(is_array($kepala->tugas) && count($kepala->tugas) > 0)
                                    <p class="text-xs text-gray-600">{{ implode(', ', array_slice($kepala->tugas, 0, 3)) }}@if(count($kepala->tugas) > 3)...@endif</p>
                                @else
                                    <p class="text-xs text-gray-600">Pemimpin Pemerintahan Desa</p>
                                @endif
                            </div>
                        @endforeach
                    @endif

                    @if(isset($strukturPemerintahan['sekretaris']) && $strukturPemerintahan['sekretaris']->count() > 0)
                        @foreach($strukturPemerintahan['sekretaris'] as $sekretaris)
                            <!-- Sekretaris -->
                            <div class="group bg-gradient-to-br from-green-50 to-green-100 border-2 border-green-300 rounded-xl p-2 lg:p-3 text-center shadow-lg w-full lg:max-w-[220px] mx-auto relative transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-green-400">
                                <!-- vertical from Kepala Desa to Sekretaris -->
                                <div class="absolute left-1/2 -top-6 -translate-x-1/2 w-px h-6 bg-blue-400"></div>
                                <img src="{{ $sekretaris->foto_url }}" alt="{{ $sekretaris->nama }}" class="w-28 h-28 rounded-xl border-2 border-green-300 mx-auto mb-3 object-cover transition-transform duration-300 group-hover:scale-105" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                <h5 class="font-bold text-gray-900 mb-1 text-sm lg:text-base">{{ $sekretaris->jabatan }}</h5>
                                <p class="text-green-600 font-semibold text-xs lg:text-sm mb-1">{{ $sekretaris->nama }}</p>
                                @if(is_array($sekretaris->tugas) && count($sekretaris->tugas) > 0)
                                    <p class="text-xs text-gray-600">{{ implode(', ', array_slice($sekretaris->tugas, 0, 3)) }}@if(count($sekretaris->tugas) > 3)...@endif</p>
                                @else
                                    <p class="text-xs text-gray-600">Administrasi & Koordinasi</p>
                                @endif
                            </div>
                        @endforeach
                    @endif

                    @if(isset($strukturPemerintahan['kasi_kaur']) && $strukturPemerintahan['kasi_kaur']->count() > 0)
                        <!-- Branch to Kasi/Kaur: vertical then horizontal with taps -->
                        <div class="relative w-full mt-2">
                            <!-- vertical from Sekdes to horizontal -->
                            <div class="absolute left-1/2 -top-4 -translate-x-1/2 w-px h-4 bg-green-400"></div>
                            <!-- horizontal split -->
                            <div class="hidden sm:block h-px bg-orange-300 sm:w-[464px] lg:w-[472px] mx-auto"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:gap-8 w-full pt-2">
                            @foreach($strukturPemerintahan['kasi_kaur'] as $kasi)
                                <div class="relative">
                                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-orange-300"></div>
                                    <div class="group bg-gradient-to-br from-orange-50 to-orange-100 border-2 border-orange-300 rounded-xl p-2 lg:p-3 text-center shadow-lg lg:max-w-[220px] mx-auto transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-orange-400">
                                        <img src="{{ $kasi->foto_url }}" alt="{{ $kasi->nama }}" class="w-28 h-28 rounded-xl border-2 border-orange-300 mx-auto mb-2 object-cover transition-transform duration-300 group-hover:scale-105" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                        <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">{{ $kasi->jabatan }}</h6>
                                        <p class="text-orange-600 font-semibold text-xs mb-1">{{ $kasi->nama }}</p>
                                        @if(is_array($kasi->tugas) && count($kasi->tugas) > 0)
                                            <p class="text-xs text-gray-600">{{ implode(', ', array_slice($kasi->tugas, 0, 2)) }}@if(count($kasi->tugas) > 2)...@endif</p>
                                        @else
                                            <p class="text-xs text-gray-600">Pelayanan Masyarakat</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if(isset($strukturPemerintahan['kadus']) && $strukturPemerintahan['kadus']->count() > 0)
                        <!-- Branch from Kasi/Kaur to Kepala Dusun -->
                        <div class="relative w-full mt-4">
                            <div class="absolute left-1/2 -top-4 -translate-x-1/2 w-px h-4 bg-orange-400"></div>
                            <div class="hidden sm:block h-px bg-red-300 sm:w-[464px] lg:w-[724px] mx-auto"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 w-full pt-2">
                            @foreach($strukturPemerintahan['kadus'] as $kadus)
                                <div class="relative">
                                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-red-300"></div>
                                    <div class="group bg-gradient-to-br from-red-50 to-red-100 border-2 border-red-300 rounded-xl p-2 lg:p-3 text-center shadow-lg lg:max-w-[220px] mx-auto transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-red-400">
                                        <img src="{{ $kadus->foto_url }}" alt="{{ $kadus->nama }}" class="w-28 h-28 rounded-xl border-2 border-red-300 mx-auto mb-2 object-cover transition-transform duration-300 group-hover:scale-105" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                        <h6 class="font-bold text-gray-900 mb-1 text-sm lg:text-base">{{ $kadus->jabatan }}</h6>
                                        <p class="text-red-600 font-semibold text-xs lg:text-sm mb-1">{{ $kadus->nama }}</p>
                                        @if(is_array($kadus->tugas) && count($kadus->tugas) > 0)
                                            <p class="text-xs text-gray-600">{{ implode(', ', array_slice($kadus->tugas, 0, 2)) }}@if(count($kadus->tugas) > 2)...@endif</p>
                                        @else
                                            <p class="text-xs text-gray-600">Pembinaan Masyarakat</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- RIGHT COLUMN: BPD hierarchy -->
                <div class="hidden lg:flex flex-col items-center relative z-10">
                    @if(isset($strukturBPD['kepala']) && $strukturBPD['kepala']->count() > 0)
                        @foreach($strukturBPD['kepala'] as $ketuaBPD)
                            <!-- Ketua BPD -->
                            <div class="group bg-gradient-to-br from-purple-50 to-purple-100 border-4 border-purple-400 rounded-xl p-4 lg:p-6 text-center shadow-xl relative w-full lg:max-w-[220px] mx-auto min-h-[240px] flex flex-col justify-center mb-2 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-purple-500">
                                <div class="absolute -top-3 -right-3 w-6 h-6 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center border-2 border-white shadow-lg">
                                    <i class="fas fa-balance-scale text-white text-xs"></i>
                                </div>
                                <img src="{{ $ketuaBPD->foto_url }}" alt="{{ $ketuaBPD->nama }}" class="w-28 h-28 rounded-xl border-2 border-purple-300 mx-auto mb-3 object-cover transition-transform duration-300 group-hover:scale-105" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                <h4 class="font-bold text-gray-900 text-base lg:text-lg mb-1">⚖️ {{ $ketuaBPD->jabatan }}</h4>
                                <p class="text-purple-600 font-semibold mb-1 text-sm lg:text-base">{{ $ketuaBPD->nama }}</p>
                                @if(is_array($ketuaBPD->tugas) && count($ketuaBPD->tugas) > 0)
                                    <p class="text-xs text-gray-600 bg-purple-50 rounded px-2 py-1">{{ implode(', ', array_slice($ketuaBPD->tugas, 0, 2)) }}@if(count($ketuaBPD->tugas) > 2)...@endif</p>
                                @else
                                    <p class="text-xs text-gray-600 bg-purple-50 rounded px-2 py-1">Pengawasan & Aspirasi Rakyat</p>
                                @endif
                            </div>
                        @endforeach
                    @endif

                    @if(isset($strukturBPD['wakil']) && $strukturBPD['wakil']->count() > 0 || isset($strukturBPD['sekretaris']) && $strukturBPD['sekretaris']->count() > 0)
                        <!-- Row 2 - Wakil Ketua BPD + Sekretaris BPD -->
                        <div class="relative w-full">
                            <!-- vertical from Ketua BPD to horizontal -->
                            <div class="absolute left-1/2 -top-4 -translate-x-1/2 w-px h-4 bg-purple-400"></div>
                            <!-- horizontal split -->
                            <div class="hidden sm:block h-px bg-purple-400 sm:w-[464px] lg:w-[472px] mx-auto"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:gap-8 w-full pt-2 mb-2">
                            @if(isset($strukturBPD['wakil']))
                                @foreach($strukturBPD['wakil'] as $wakil)
                                    <div class="relative">
                                        <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-purple-400"></div>
                                        <div class="group bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-300 rounded-xl p-2 lg:p-3 text-center shadow-lg lg:max-w-[220px] mx-auto transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-purple-400">
                                            <img src="{{ $wakil->foto_url }}" alt="{{ $wakil->nama }}" class="w-28 h-28 rounded-xl border-2 border-purple-300 mx-auto mb-2 object-cover transition-transform duration-300 group-hover:scale-105" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                            <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">{{ $wakil->jabatan }}</h6>
                                            <p class="text-purple-600 font-semibold text-xs mb-1">{{ $wakil->nama }}</p>
                                            @if(is_array($wakil->tugas) && count($wakil->tugas) > 0)
                                                <p class="text-xs text-gray-600">{{ implode(', ', array_slice($wakil->tugas, 0, 2)) }}@if(count($wakil->tugas) > 2)...@endif</p>
                                            @else
                                                <p class="text-xs text-gray-600">Wakil & Koordinasi</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if(isset($strukturBPD['sekretaris']))
                                @foreach($strukturBPD['sekretaris'] as $sekBPD)
                                    <div class="relative">
                                        <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-purple-400"></div>
                                        <div class="group bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-300 rounded-xl p-2 lg:p-3 text-center shadow-lg lg:max-w-[220px] mx-auto transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-purple-400">
                                            <img src="{{ $sekBPD->foto_url }}" alt="{{ $sekBPD->nama }}" class="w-28 h-28 rounded-xl border-2 border-purple-300 mx-auto mb-2 object-cover transition-transform duration-300 group-hover:scale-105" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                            <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">{{ $sekBPD->jabatan }}</h6>
                                            <p class="text-purple-600 font-semibold text-xs mb-1">{{ $sekBPD->nama }}</p>
                                            @if(is_array($sekBPD->tugas) && count($sekBPD->tugas) > 0)
                                                <p class="text-xs text-gray-600">{{ implode(', ', array_slice($sekBPD->tugas, 0, 2)) }}@if(count($sekBPD->tugas) > 2)...@endif</p>
                                            @else
                                                <p class="text-xs text-gray-600">Administrasi BPD</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endif

                    @if(isset($strukturBPD['anggota']) && $strukturBPD['anggota']->count() > 0)
                        <!-- Row 3 - Anggota BPD -->
                        <div class="relative w-full">
                            <div class="absolute left-1/2 -top-4 -translate-x-1/2 w-px h-4 bg-purple-400"></div>
                            <div class="hidden sm:block h-px bg-purple-400 sm:w-[464px] lg:w-[724px] mx-auto"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 w-full pt-2">
                            @foreach($strukturBPD['anggota'] as $anggota)
                                <div class="relative">
                                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-purple-400"></div>
                                    <div class="group bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-300 rounded-xl p-2 lg:p-3 text-center shadow-lg lg:max-w-[220px] mx-auto transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-purple-400">
                                        <img src="{{ $anggota->foto_url }}" alt="{{ $anggota->nama }}" class="w-28 h-28 rounded-xl border-2 border-purple-300 mx-auto mb-2 object-cover transition-transform duration-300 group-hover:scale-105" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                        <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">{{ $anggota->jabatan }}</h6>
                                        <p class="text-purple-600 font-semibold text-xs mb-1">{{ $anggota->nama }}</p>
                                        @if(is_array($anggota->tugas) && count($anggota->tugas) > 0)
                                            <p class="text-xs text-gray-600">{{ implode(', ', array_slice($anggota->tugas, 0, 2)) }}@if(count($anggota->tugas) > 2)...@endif</p>
                                        @else
                                            <p class="text-xs text-gray-600">Anggota BPD</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1000,
        easing: 'ease-out',
        once: true
    });

    // Initialize Particles.js for Struktur
    if (document.getElementById('particles-struktur')) {
        particlesJS('particles-struktur', {
            particles: {
                number: { value: 50, density: { enable: true, value_area: 800 } },
                color: { value: "#ffffff" },
                shape: { type: "circle" },
                opacity: { value: 0.3, random: true, anim: { enable: true, speed: 1, opacity_min: 0.1, sync: false } },
                size: { value: 3, random: true, anim: { enable: true, speed: 2, size_min: 0.1, sync: false } },
                line_linked: { enable: true, distance: 150, color: "#ffffff", opacity: 0.2, width: 1 },
                move: { enable: true, speed: 1, direction: "none", random: false, straight: false, out_mode: "out", bounce: false }
            },
            interactivity: {
                detect_on: "canvas",
                events: { onhover: { enable: true, mode: "repulse" }, onclick: { enable: true, mode: "push" }, resize: true },
                modes: { grab: { distance: 400, line_linked: { opacity: 1 } }, bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 }, repulse: { distance: 200, duration: 0.4 }, push: { particles_nb: 4 }, remove: { particles_nb: 2 } }
            },
            retina_detect: true
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>
@endpush