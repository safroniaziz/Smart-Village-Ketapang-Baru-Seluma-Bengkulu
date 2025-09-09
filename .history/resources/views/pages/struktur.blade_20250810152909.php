@extends('layouts.app')

@section('title', 'Struktur Organisasi - Desa Ketapang Baru')

@push('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orgchart@4.0.1/dist/css/jquery.orgchart.min.css">
<style>
    .orgchart {
        background: transparent !important;
    }

    .orgchart .node {
        border-radius: 12px !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
        border: 2px solid #e5e7eb !important;
        background: white !important;
        min-width: 200px !important;
        padding: 16px !important;
    }

    .orgchart .node.kepala-desa {
        border: 3px solid #3b82f6 !important;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%) !important;
    }

    .orgchart .node.ketua-bpd {
        border: 3px solid #8b5cf6 !important;
        background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%) !important;
    }

    .orgchart .node.sekretaris {
        border: 2px solid #10b981 !important;
        background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%) !important;
    }

    .orgchart .node.kasi-kaur {
        border: 2px solid #f59e0b !important;
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%) !important;
    }

    .orgchart .node.kepala-dusun {
        border: 2px solid #ef4444 !important;
        background: linear-gradient(135deg, #fef2f2 0%, #fecaca 100%) !important;
    }

    .orgchart .node.bpd-member {
        border: 2px solid #6b7280 !important;
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%) !important;
    }

    .orgchart .lines .topLine {
        border-top: 2px solid #6b7280 !important;
    }

    .orgchart .lines .rightLine, .orgchart .lines .leftLine {
        border-right: 2px solid #6b7280 !important;
        border-left: 2px solid #6b7280 !important;
    }

    .orgchart .lines .downLine {
        border-left: 2px solid #6b7280 !important;
    }

    /* Special dotted line for BPD connection */
    .bpd-connection {
        border-left: 3px dashed #8b5cf6 !important;
        border-top: 3px dashed #8b5cf6 !important;
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
<!-- Content -->

<!-- Hero Section - Consistent with other pages -->
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container for Struktur -->
    <div id="particles-struktur" class="absolute inset-0"></div>

    <div class="relative w-full w-[85%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content (Centered) -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-sitemap text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">STRUKTUR ORGANISASI</h2>
                            <p class="text-sm text-blue-100">Kecamatan Semidang Alas Maras</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6">
                        <span class="text-white">Struktur</span><br>
                        <span class="text-yellow-400 font-extrabold">Organisasi</span>
                    </h1>

                    <!-- Badge Desa Digital -->
                    <div class="mb-6">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-users mr-2 text-yellow-300 text-xs"></i>
                            Pemerintahan & BPD
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12">
                        Struktur organisasi pemerintahan Desa Ketapang Baru yang terdiri dari Pemerintah Desa dan
                        <span class="font-semibold text-yellow-300">Badan Permusyawaratan Desa (BPD)</span>
                    </p>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 max-w-4xl mx-auto mb-8">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">1</div>
                            <div class="text-sm text-blue-100">Kepala Desa</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">6</div>
                            <div class="text-sm text-blue-100">Aparatur Desa</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">5</div>
                            <div class="text-sm text-blue-100">Anggota BPD</div>
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

<!-- Main Organizational Chart Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <div class="w-full w-[85%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header - match Home Services style -->
        <div class="text-center mb-16">
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
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-blue-700">Representasi hierarki dan koordinasi</span> antara Pemerintah Desa dan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-purple-700">Badan Permusyawaratan Desa (BPD)</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-blue-200 to-purple-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <div id="organization-chart" class="min-h-[600px]"></div>

            <!-- Fallback Simple Chart (CSS-based) - Mobile Responsive -->
            <div id="fallback-chart" style="display: block;">
                <!-- Mobile: Vertical hierarchy, Desktop: Side by side -->
                <div class="lg:grid lg:grid-cols-2 lg:gap-12 lg:items-start relative">
                    <!-- Dotted line connecting Kades and Ketua BPD (hidden on mobile, visible on desktop) -->
                    <div class="hidden lg:block pointer-events-none absolute left-1/2 top-1/2 -translate-y-1/2 w-96 border-t-4 border-dashed border-purple-500 -translate-x-1/2" style="top: 120px;"></div>

                    <!-- LEFT COLUMN: Pemerintahan Desa hierarchy only -->
                    <div class="flex flex-col items-center mb-8 lg:mb-0 relative z-10">
                        <!-- Kepala Desa - Top position -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-4 border-blue-400 rounded-xl p-4 lg:p-6 text-center shadow-xl relative w-full max-w-xs min-h-[240px] lg:min-h-[280px] flex flex-col justify-center mb-6">
                            <div class="absolute -top-3 -right-3 w-6 h-6 lg:w-8 lg:h-8 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center border-2 border-white shadow-lg">
                                <i class="fas fa-crown text-white text-xs"></i>
                            </div>
                            <img src="{{ asset('images/struktur/zultan.jpg') }}" alt="Kepala Desa" class="w-20 h-20 lg:w-28 lg:h-28 rounded-xl border-2 border-blue-300 mx-auto mb-3 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                            <h4 class="font-bold text-gray-900 text-base lg:text-lg mb-1">👑 Kepala Desa</h4>
                            <p class="text-blue-600 font-semibold mb-1 text-sm lg:text-base">Zultan Alhara</p>
                            <p class="text-xs text-gray-600 bg-blue-50 rounded px-2 py-1 lg:px-3">Pemimpin Desa, Pengambil Keputusan Tertinggi, Penanggung Jawab Pembangunan</p>
                        </div>

                        <!-- Sekretaris -->
                        <div class="bg-gradient-to-br from-green-50 to-green-100 border-2 border-green-300 rounded-xl p-3 lg:p-4 text-center shadow-lg w-full max-w-xs relative">
                            <!-- vertical from Kepala Desa to Sekretaris -->
                            <div class="absolute left-1/2 -top-6 -translate-x-1/2 w-px h-6 bg-blue-400"></div>
                            <img src="{{ asset('images/struktur/merianto.jpg') }}" alt="Sekretaris" class="w-20 h-20 lg:w-28 lg:h-28 rounded-xl border-2 border-green-300 mx-auto mb-3 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                            <h5 class="font-bold text-gray-900 mb-1 text-sm lg:text-base">Sekretaris Desa</h5>
                            <p class="text-green-600 font-semibold text-xs lg:text-sm mb-1">Merianto</p>
                            <p class="text-xs text-gray-600">Administrasi Desa, Koordinasi Program, Dokumentasi Kegiatan</p>
                        </div>

                        <!-- Branch to Kasi/Kaur: vertical then horizontal with taps -->
                        <div class="relative w-full max-w-xl mt-4">
                            <!-- vertical from Sekdes to horizontal -->
                            <div class="absolute left-1/2 -top-6 -translate-x-1/2 w-px h-6 bg-green-400"></div>
                            <!-- horizontal split -->
                            <div class="h-px bg-orange-300"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 lg:gap-4 max-w-xl w-full pt-4">
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-orange-300"></div>
                                <div class="bg-gradient-to-br from-orange-50 to-orange-100 border-2 border-orange-300 rounded-xl p-2 lg:p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/sapta.jpg') }}" alt="Kaur Keuangan" class="w-16 h-16 lg:w-28 lg:h-28 rounded-xl border-2 border-orange-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">Kaur Keuangan</h6>
                                    <p class="text-orange-600 font-semibold text-xs mb-1">Sapta Adi</p>
                                    <p class="text-xs text-gray-600">Pengelolaan APBDes, Pencatatan Keuangan, Laporan Keuangan</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-orange-300"></div>
                                <div class="bg-gradient-to-br from-orange-50 to-orange-100 border-2 border-orange-300 rounded-xl p-2 lg:p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/marlan.jpg') }}" alt="Kaur Perencanaan" class="w-16 h-16 lg:w-28 lg:h-28 rounded-xl border-2 border-orange-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">Kaur Perencanaan</h6>
                                    <p class="text-orange-600 font-semibold text-xs mb-1">Marlan</p>
                                    <p class="text-xs text-gray-600">Perencanaan Pembangunan, Monitoring Proyek, Evaluasi Program</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-orange-300"></div>
                                <div class="bg-gradient-to-br from-orange-50 to-orange-100 border-2 border-orange-300 rounded-xl p-2 lg:p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/desmerti.jpg') }}" alt="Kasi Pemerintahan" class="w-16 h-16 lg:w-28 lg:h-28 rounded-xl border-2 border-orange-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">Kasi Pemerintahan</h6>
                                    <p class="text-orange-600 font-semibold text-xs mb-1">Desmerti</p>
                                    <p class="text-xs text-gray-600">Urusan Pemerintahan, Kependudukan, Ketentraman & Ketertiban</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-orange-300"></div>
                                <div class="bg-gradient-to-br from-orange-50 to-orange-100 border-2 border-orange-300 rounded-xl p-2 lg:p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/rozi.jpg') }}" alt="Kasi Kesejahteraan" class="w-16 h-16 lg:w-28 lg:h-28 rounded-xl border-2 border-orange-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">Kasi Kesejahteraan</h6>
                                    <p class="text-orange-600 font-semibold text-xs mb-1">Rozi</p>
                                    <p class="text-xs text-gray-600">Urusan Kesejahteraan, Sosial Budaya, Ekonomi & Lingkungan</p>
                                </div>
                            </div>
                        </div>

                        <!-- Branch from Kasi/Kaur to Kepala Dusun -->
                        <div class="relative w-full max-w-4xl mt-6">
                            <div class="absolute left-1/2 -top-6 -translate-x-1/2 w-px h-6 bg-orange-400"></div>
                            <div class="h-px bg-red-300"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 max-w-4xl w-full pt-4">
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-red-300"></div>
                                <div class="bg-gradient-to-br from-red-50 to-red-100 border-2 border-red-300 rounded-xl p-3 lg:p-4 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/ajasseriani.jpg') }}" alt="Kepala Dusun 1" class="w-20 h-20 lg:w-28 lg:h-28 rounded-xl border-2 border-red-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 mb-1 text-sm lg:text-base">Kepala Dusun 1</h6>
                                    <p class="text-red-600 font-semibold text-xs lg:text-sm mb-1">Ajasseriani</p>
                                    <p class="text-xs text-gray-600">Pembinaan Masyarakat, Monitoring Wilayah, Koordinasi Program</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-red-300"></div>
                                <div class="bg-gradient-to-br from-red-50 to-red-100 border-2 border-red-300 rounded-xl p-3 lg:p-4 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/meri.jpg') }}" alt="Kepala Dusun 2" class="w-20 h-20 lg:w-28 lg:h-28 rounded-xl border-2 border-red-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 mb-1 text-sm lg:text-base">Kepala Dusun 2</h6>
                                    <p class="text-red-600 font-semibold text-xs lg:text-sm mb-1">Meri</p>
                                    <p class="text-xs text-gray-600">Pembinaan Masyarakat, Monitoring Wilayah, Koordinasi Program</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-red-300"></div>
                                <div class="bg-gradient-to-br from-red-50 to-red-100 border-2 border-red-300 rounded-xl p-3 lg:p-4 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/basri.jpg') }}" alt="Kepala Dusun 3" class="w-16 h-16 lg:w-28 lg:h-28 rounded-xl border-2 border-red-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 mb-1 text-sm lg:text-base">Kepala Dusun 3</h6>
                                    <p class="text-red-600 font-semibold text-xs lg:text-sm mb-1">Basri</p>
                                    <p class="text-xs text-gray-600">Pembinaan Masyarakat, Monitoring Wilayah, Koordinasi Program</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN: BPD hierarchy -->
                    <div class="flex flex-col items-center relative z-10">
                        <!-- Desktop: Row 1 - Ketua BPD (sendiri) -->
                        <div class="hidden lg:block bg-gradient-to-br from-purple-50 to-purple-100 border-4 border-purple-400 rounded-xl p-4 lg:p-6 text-center shadow-xl relative w-full max-w-sm min-h-[280px] flex flex-col justify-center mb-6">
                            <div class="absolute -top-3 -right-3 w-6 h-6 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center border-2 border-white shadow-lg">
                                <i class="fas fa-balance-scale text-white text-xs"></i>
                            </div>
                            <img src="{{ asset('images/struktur/bahirman.jpg') }}" alt="Ketua BPD" class="w-16 h-16 lg:w-28 lg:h-28 rounded-xl border-2 border-purple-300 mx-auto mb-3 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                            <h4 class="font-bold text-gray-900 text-base lg:text-lg mb-1">⚖️ Ketua BPD</h4>
                            <p class="text-purple-600 font-semibold mb-1 text-sm lg:text-base">Bahirman</p>
                            <p class="text-xs text-gray-600 bg-purple-50 rounded px-2 py-1">Pengawasan Pemerintahan, Penampung Aspirasi Rakyat</p>
                        </div>

                        <!-- Desktop: Row 2 - Wakil Ketua BPD + Sekretaris BPD (sejajar) -->
                        <div class="relative w-full max-w-xl">
                            <!-- vertical from Ketua BPD to horizontal -->
                            <div class="absolute left-1/2 -top-6 -translate-x-1/2 w-px h-6 bg-purple-400"></div>
                            <!-- horizontal split -->
                            <div class="h-px bg-purple-400"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 lg:gap-4 max-w-xl w-full pt-4 mb-6">
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-purple-400"></div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-300 rounded-xl p-2 lg:p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/halintarman.jpg') }}" alt="Wakil Ketua BPD" class="w-16 h-16 lg:w-28 lg:h-28 rounded-xl border-2 border-purple-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">Wakil Ketua BPD</h6>
                                    <p class="text-purple-600 font-semibold text-xs mb-1">Halintarman</p>
                                    <p class="text-xs text-gray-600">Wakil Ketua BPD, Koordinasi Anggota, Pengawasan Program</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-purple-400"></div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-300 rounded-xl p-2 lg:p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/kebat.jpg') }}" alt="Sekretaris BPD" class="w-16 h-16 lg:w-28 lg:h-28 rounded-xl border-2 border-purple-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">Sekretaris BPD</h6>
                                    <p class="text-purple-600 font-semibold text-xs mb-1">Kebat S</p>
                                    <p class="text-xs text-gray-600">Sekretaris BPD, Dokumentasi Rapat, Administrasi BPD</p>
                                </div>
                            </div>
                        </div>

                        <!-- Desktop: Row 3 - Anggota BPD 1 + Anggota BPD 2 (sejajar) -->
                        <div class="relative w-full max-w-xl mt-6">
                            <!-- vertical from Row 2 to horizontal -->
                            <div class="absolute left-1/2 -top-6 -translate-x-1/2 w-px h-6 bg-purple-400"></div>
                            <!-- horizontal split -->
                            <div class="h-px bg-purple-400"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 lg:gap-4 max-w-xl w-full pt-4">
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-purple-400"></div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-300 rounded-xl p-2 lg:p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/susti.jpg') }}" alt="Anggota BPD" class="w-16 h-16 lg:w-28 lg:h-28 rounded-xl border-2 border-purple-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">Anggota BPD</h6>
                                    <p class="text-purple-600 font-semibold text-xs mb-1">Susti</p>
                                    <p class="text-xs text-gray-600">Anggota BPD, Penampung Aspirasi, Pengawasan Pemerintahan</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-purple-400"></div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-300 rounded-xl p-2 lg:p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/dhesty.jpg') }}" alt="Anggota BPD" class="w-16 h-16 lg:w-28 lg:h-28 rounded-xl border-2 border-purple-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-xs lg:text-sm mb-1">Anggota BPD</h6>
                                    <p class="text-purple-600 font-semibold text-xs mb-1">Dhesty C</p>
                                    <p class="text-xs text-gray-600">Anggota BPD, Penampung Aspirasi, Pengawasan Pemerintahan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile: BPD Structure (separate section below Pemerintahan Desa) -->
                <div class="lg:hidden mt-12">
                    <!-- Separator -->
                    <div class="w-full h-px bg-gradient-to-r from-transparent via-purple-400 to-transparent mb-8"></div>

                    <!-- BPD Section Title -->
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-purple-800 mb-2">⚖️ Badan Permusyawaratan Desa (BPD)</h3>
                        <p class="text-purple-600 text-sm">Lembaga Pengawas dan Penampung Aspirasi Rakyat</p>
                    </div>

                    <!-- BPD Structure -->
                    <div class="flex flex-col items-center">
                        <!-- Ketua BPD -->
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-4 border-purple-400 rounded-xl p-4 text-center shadow-xl relative w-full max-w-xs min-h-[200px] flex flex-col justify-center mb-6">
                            <div class="absolute -top-3 -right-3 w-6 h-6 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center border-2 border-white shadow-lg">
                                <i class="fas fa-balance-scale text-white text-xs"></i>
                            </div>
                            <img src="{{ asset('images/struktur/bahirman.jpg') }}" alt="Ketua BPD" class="w-16 h-16 rounded-xl border-2 border-purple-300 mx-auto mb-3 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                            <h4 class="font-bold text-gray-900 text-sm mb-1">⚖️ Ketua BPD</h4>
                            <p class="text-purple-600 font-semibold text-xs mb-1">Bahirman</p>
                            <p class="text-xs text-gray-600 bg-purple-50 rounded px-2 py-1">Pengawasan Pemerintahan, Penampung Aspirasi Rakyat</p>
                        </div>

                        <!-- Connection line down from Ketua BPD -->
                        <div class="w-px h-6 bg-purple-400 mb-4"></div>

                        <!-- Level 1: Wakil & Sekretaris -->
                        <div class="relative w-full max-w-xl">
                            <div class="absolute left-1/2 -top-6 -translate-x-1/2 w-px h-6 bg-purple-400"></div>
                            <div class="h-px bg-purple-300"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-w-xl w-full pt-4">
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-purple-300"></div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-300 rounded-xl p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/halintarman.jpg') }}" alt="Wakil Ketua BPD" class="w-16 h-16 rounded-xl border-2 border-purple-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-xs mb-1">Wakil Ketua BPD</h6>
                                    <p class="text-purple-600 font-semibold text-xs mb-1">Halintarman</p>
                                    <p class="text-xs text-gray-600">Wakil Ketua BPD, Koordinasi Anggota, Pengawasan Program</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-purple-300"></div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-300 rounded-xl p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/kebat.jpg') }}" alt="Sekretaris BPD" class="w-16 h-16 rounded-xl border-2 border-purple-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-xs mb-1">Sekretaris BPD</h6>
                                    <p class="text-purple-600 font-semibold text-xs mb-1">Kebat S</p>
                                    <p class="text-xs text-gray-600">Sekretaris BPD, Dokumentasi Rapat, Administrasi BPD</p>
                                </div>
                            </div>
                        </div>

                        <!-- Level 2: Anggota -->
                        <div class="relative w-full max-w-xl mt-6">
                            <div class="absolute left-1/2 -top-6 -translate-x-1/2 w-px h-6 bg-purple-400"></div>
                            <div class="h-px bg-purple-300"></div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-w-xl w-full pt-4">
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-purple-300"></div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-300 rounded-xl p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/susti.jpg') }}" alt="Anggota BPD" class="w-16 h-16 rounded-xl border-2 border-purple-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-xs mb-1">Anggota BPD</h6>
                                    <p class="text-purple-600 font-semibold text-xs mb-1">Susti</p>
                                    <p class="text-xs text-gray-600">Anggota BPD, Penampung Aspirasi, Pengawasan Pemerintahan</p>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-px h-4 bg-purple-300"></div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-2 border-purple-300 rounded-xl p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/dhesty.jpg') }}" alt="Anggota BPD" class="w-16 h-16 rounded-xl border-2 border-purple-300 mx-auto mb-2 object-cover" onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-xs mb-1">Anggota BPD</h6>
                                    <p class="text-purple-600 font-semibold text-xs mb-1">Dhesty C</p>
                                    <p class="text-xs text-gray-600">Anggota BPD, Penampung Aspirasi, Pengawasan Pemerintahan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add bottom margin for Struktur Organisasi section -->
        <div class="mb-20"></div>

        <!-- Tugas & Wewenang Section (full-width background breakout) -->
        <div class="relative left-1/2 right-1/2 -mx-[50vw] w-screen">
            <section class="py-16 bg-gradient-to-br from-purple-50 via-white to-indigo-50" data-aos="fade-up" data-aos-duration="200" data-aos-offset="20">
                <div class="w-full w-[85%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header - match Home Services style -->
                <div class="text-center mb-12">
                    <!-- Modern Badge with Gradient -->
                    <div class="inline-flex items-center relative mb-6">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full blur-lg opacity-20"></div>
                        <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-briefcase mr-2"></i>
                            Peran & Tanggung Jawab
                        </div>
                    </div>

                    <!-- Enhanced Title with Gradient Text -->
                    <div class="mb-8">
                        <h2 class="text-5xl lg:text-6xl font-black mb-4">
                            <span class="bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 bg-clip-text text-transparent">
                                Tugas & Wewenang
                            </span>
                        </h2>
                        <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
                    </div>

                    <!-- Description -->
                    <div class="max-w-4xl mx-auto">
                        <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                            <span class="font-semibold text-blue-700">Pemisahan jelas</span> antara
                            <span class="relative inline-block">
                                <span class="relative z-10 font-semibold text-blue-700">TUGAS</span>
                                <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-blue-200 to-blue-300 opacity-60 rounded"></span>
                            </span>
                            (yang harus dilakukan) dan
                            <span class="relative inline-block">
                                <span class="relative z-10 font-semibold text-purple-700">WEWENANG</span>
                                <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-purple-200 to-purple-300 opacity-60 rounded"></span>
                            </span>
                            (hak untuk mengambil keputusan).
                        </p>
                    </div>
                </div>

                                <!-- Professional Cards with Tugas & Wewenang in One Card -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
                    <!-- Card: Kepala Desa -->
                    <div class="group bg-gradient-to-br from-blue-50 via-blue-100 to-blue-200 rounded-3xl border-2 border-blue-300 hover:border-blue-500 transition-all duration-500 shadow-xl hover:shadow-2xl p-4 lg:p-8 transform hover:-translate-y-2" data-aos="fade-up" data-aos-duration="150" data-aos-delay="50">
                        <!-- Header -->
                        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-3 lg:gap-4 mb-6 lg:mb-8">
                            <div class="w-16 h-16 lg:w-20 lg:h-20 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-700 flex items-center justify-center text-white shadow-2xl group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-crown text-2xl lg:text-3xl"></i>
                            </div>
                            <div class="text-center sm:text-left">
                                <h4 class="font-bold text-xl lg:text-3xl text-gray-900 mb-2">👑 Kepala Desa</h4>
                                <p class="text-blue-800 font-semibold text-base lg:text-lg">Pemimpin Pemerintahan Desa</p>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="w-full h-px bg-gradient-to-r from-transparent via-blue-400 to-transparent mb-6 lg:mb-8"></div>

                        <!-- TUGAS Section -->
                        <div class="mb-6 lg:mb-8">
                            <div class="flex items-center gap-3 mb-4 lg:mb-6">
                                <div class="w-8 h-8 lg:w-10 lg:h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white shadow-lg">
                                    <span class="font-bold text-sm lg:text-lg">A</span>
                                </div>
                                <h5 class="text-xl lg:text-2xl font-bold text-blue-800">TUGAS</h5>
                            </div>
                            <div class="space-y-3 lg:space-y-4">
                                <div class="flex items-start gap-3 lg:gap-4 p-3 lg:p-4 bg-white/70 rounded-xl border border-blue-200 hover:bg-white/90 transition-colors">
                                    <div class="w-6 h-6 lg:w-8 lg:h-8 rounded-full bg-blue-500 text-white flex items-center justify-center text-xs lg:text-sm font-bold mt-1 flex-shrink-0">1</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1 text-sm lg:text-base">Penyelenggaraan Pemerintahan</h6>
                                        <p class="text-gray-700 text-xs lg:text-sm leading-relaxed">Memimpin dan mengkoordinasikan seluruh kegiatan pemerintahan desa secara efektif dan efisien</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 lg:gap-4 p-3 lg:p-4 bg-white/70 rounded-xl border border-blue-200 hover:bg-white/90 transition-colors">
                                    <div class="w-6 h-6 lg:w-8 lg:h-8 rounded-full bg-blue-500 text-white flex items-center justify-center text-xs lg:text-sm font-bold mt-1 flex-shrink-0">2</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1 text-sm lg:text-base">Pembangunan Desa</h6>
                                        <p class="text-gray-700 text-xs lg:text-sm leading-relaxed">Menyusun, melaksanakan, dan mengawasi program pembangunan sesuai RPJMDes dan RKPDes</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 lg:gap-4 p-3 lg:p-4 bg-white/70 rounded-xl border border-blue-200 hover:bg-white/90 transition-colors">
                                    <div class="w-6 h-6 lg:w-8 lg:h-8 rounded-full bg-blue-500 text-white flex items-center justify-center text-xs lg:text-sm font-bold mt-1 flex-shrink-0">3</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1 text-sm lg:text-base">Pelayanan Publik</h6>
                                        <p class="text-gray-700 text-xs lg:text-sm leading-relaxed">Memastikan pelayanan administrasi, kependudukan, dan kemasyarakatan berjalan optimal</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- WEWENANG Section -->
                        <div>
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 flex items-center justify-center text-white shadow-lg">
                                    <span class="font-bold text-lg">B</span>
                                </div>
                                <h5 class="text-2xl font-bold text-blue-800">WEWENANG</h5>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-start gap-4 p-4 bg-white/70 rounded-xl border border-blue-200 hover:bg-white/90 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-sm font-bold mt-1 flex-shrink-0">1</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1">Penetapan Kebijakan</h6>
                                        <p class="text-gray-700 text-sm leading-relaxed">Berhak menetapkan kebijakan pemerintahan, pembangunan, dan kemasyarakatan desa</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 bg-white/70 rounded-xl border border-blue-200 hover:bg-white/90 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-sm font-bold mt-1 flex-shrink-0">2</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1">Penandatanganan Dokumen</h6>
                                        <p class="text-gray-700 text-sm leading-relaxed">Berhak menandatangani Perdes, Keputusan, dan dokumen resmi desa</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 bg-white/70 rounded-xl border border-blue-200 hover:bg-white/90 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-sm font-bold mt-1 flex-shrink-0">3</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1">Pengangkatan Perangkat</h6>
                                        <p class="text-gray-700 text-sm leading-relaxed">Berhak mengangkat dan memberhentikan perangkat desa sesuai ketentuan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card: BPD -->
                    <div class="group bg-gradient-to-br from-purple-50 via-purple-100 to-purple-200 rounded-3xl border-2 border-purple-300 hover:border-purple-500 transition-all duration-500 shadow-xl hover:shadow-2xl p-8 transform hover:-translate-y-2" data-aos="fade-up" data-aos-duration="150" data-aos-delay="100">
                        <!-- Header -->
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-purple-600 to-purple-700 flex items-center justify-center text-white shadow-2xl group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-balance-scale text-3xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-3xl text-gray-900 mb-2">⚖️ Badan Permusyawaratan Desa</h4>
                                <p class="text-purple-800 font-semibold text-lg">Lembaga Perwakilan Desa</p>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="w-full h-px bg-gradient-to-r from-transparent via-purple-400 to-transparent mb-8"></div>

                        <!-- TUGAS Section -->
                        <div class="mb-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center text-white shadow-lg">
                                    <span class="font-bold text-lg">A</span>
                                </div>
                                <h5 class="text-2xl font-bold text-purple-800">TUGAS</h5>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-start gap-4 p-4 bg-white/70 rounded-xl border border-purple-200 hover:bg-white/90 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-purple-500 text-white flex items-center justify-center text-sm font-bold mt-1 flex-shrink-0">1</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1">Penampung Aspirasi</h6>
                                        <p class="text-gray-700 text-sm leading-relaxed">Menjaring, menampung, dan menyalurkan aspirasi masyarakat desa secara sistematis</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 bg-white/70 rounded-xl border border-purple-200 hover:bg-white/90 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-purple-500 text-white flex items-center justify-center text-sm font-bold mt-1 flex-shrink-0">2</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1">Pengawasan</h6>
                                        <p class="text-gray-700 text-sm leading-relaxed">Mengawasi pelaksanaan Perdes, APBDes, dan kinerja perangkat desa</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 bg-white/70 rounded-xl border border-purple-200 hover:bg-white/90 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-purple-500 text-white flex items-center justify-center text-sm font-bold mt-1 flex-shrink-0">3</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1">Musyawarah</h6>
                                        <p class="text-gray-700 text-sm leading-relaxed">Memfasilitasi musyawarah desa untuk keputusan strategis dan evaluasi pembangunan</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- WEWENANG Section -->
                        <div>
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-600 to-purple-700 flex items-center justify-center text-white shadow-lg">
                                    <span class="font-bold text-lg">B</span>
                                </div>
                                <h5 class="text-2xl font-bold text-purple-800">WEWENANG</h5>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-start gap-4 p-4 bg-white/70 rounded-xl border border-purple-200 hover:bg-white/90 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-purple-600 text-white flex items-center justify-center text-sm font-bold mt-1 flex-shrink-0">1</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1">Pembahasan Perdes</h6>
                                        <p class="text-gray-700 text-sm leading-relaxed">Berhak membahas dan menyepakati Rancangan Peraturan Desa bersama pemerintah desa</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 bg-white/70 rounded-xl border border-purple-200 hover:bg-white/90 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-purple-600 text-white flex items-center justify-center text-sm font-bold mt-1 flex-shrink-0">2</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1">Pengawasan Kinerja</h6>
                                        <p class="text-gray-700 text-sm leading-relaxed">Berhak mengawasi dan mengevaluasi kinerja pemerintah desa secara independen</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 bg-white/70 rounded-xl border border-purple-200 hover:bg-white/90 transition-colors">
                                    <div class="w-8 h-8 rounded-full bg-purple-600 text-white flex items-center justify-center text-sm font-bold mt-1 flex-shrink-0">3</div>
                                    <div>
                                        <h6 class="font-semibold text-gray-900 mb-1">Musyawarah Desa</h6>
                                        <p class="text-gray-700 text-sm leading-relaxed">Berhak memfasilitasi dan memimpin musyawarah desa untuk keputusan strategis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        </div>

    </div>
</section>

<!-- Add bottom margin for better spacing -->
<div class="mb-16"></div>

<!-- CTA Section - Simplified and More Responsive -->
<section class="cta-section py-24 bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Content Container -->
    <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl lg:text-5xl font-black mb-8">Kenali Lebih Dekat <span class="text-yellow-400">Tim Kami</span></h2>
            <p class="text-xl text-blue-100 mb-8 leading-relaxed max-w-4xl mx-auto">
                Setiap anggota tim memiliki peran penting dalam membangun Desa Ketapang Baru yang lebih maju dan sejahtera.
                Mari kenali lebih dekat struktur organisasi dan visi kami.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('tentang') }}" class="inline-flex items-center bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 hover:from-yellow-500 hover:via-orange-600 hover:to-red-600 text-white font-semibold rounded-xl px-8 py-4 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-yellow-500/25">
                    <i class="fas fa-home mr-2"></i>Profil Desa
                </a>
                <a href="{{ route('visi.misi') }}" class="inline-flex items-center bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold rounded-xl px-8 py-4 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-bullseye mr-2"></i>Visi & Misi
                </a>
                <a href="{{ route('kontak') }}" class="inline-flex items-center bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold rounded-xl px-8 py-4 transition-all duration-300 transform hover:scale-105">
                    <i class="fab fa-whatsapp mr-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* CTA specific styles */
.cta-section {
    position: relative;
    z-index: 100;
}

/* Mobile Responsive Organizational Chart */
@media (max-width: 768px) {
    #fallback-chart {
        overflow-x: visible !important;
        min-width: auto !important;
    }

    #fallback-chart .grid {
        gap: 1rem !important;
    }

    #fallback-chart .max-w-xs {
        max-width: 100% !important;
        width: 100% !important;
    }

    /* Ensure proper spacing on mobile */
    #fallback-chart .gap-8 {
        gap: 1.5rem !important;
    }

    #fallback-chart .gap-12 {
        gap: 2rem !important;
    }

    /* Make images smaller on mobile for better fit */
    #fallback-chart img {
        max-width: 100% !important;
        height: auto !important;
    }

    /* Improve text readability on mobile */
    #fallback-chart h4, #fallback-chart h5, #fallback-chart h6 {
        font-size: 0.875rem !important;
        line-height: 1.25rem !important;
    }

    #fallback-chart p {
        font-size: 0.75rem !important;
        line-height: 1.125rem !important;
    }
}

/* Tablet adjustments */
@media (min-width: 769px) and (max-width: 1024px) {
    #fallback-chart .grid {
        gap: 1.5rem !important;
    }

    #fallback-chart .gap-12 {
        gap: 2.5rem !important;
    }
}
</style>
@endpush



@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/orgchart@4.0.1/dist/js/jquery.orgchart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
$(document).ready(function() {
    console.log('Document ready');
    console.log('jQuery loaded:', typeof $ !== 'undefined');
    console.log('OrgChart loaded:', typeof $.fn.orgchart !== 'undefined');

    // Force use fallback chart for now (more reliable)
    console.log('Using CSS-based organizational chart for better compatibility');
    $('#fallback-chart').show();
    $('#organization-chart').hide();

    // Initialize Particles.js for Struktur hero (match visibility with Tentang)
    if (typeof particlesJS !== 'undefined' && document.getElementById('particles-struktur')) {
        particlesJS('particles-struktur', {
            particles: {
                number: { value: 50, density: { enable: true, value_area: 800 } },
                color: { value: '#ffffff' },
                shape: { type: 'circle', stroke: { width: 0, color: '#000000' } },
                opacity: { value: 0.2, random: false, anim: { enable: false, speed: 1, opacity_min: 0.1, sync: false } },
                size: { value: 3, random: true, anim: { enable: false, speed: 40, size_min: 0.1, sync: false } },
                line_linked: { enable: true, distance: 150, color: '#ffffff', opacity: 0.15, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: false, straight: false, out_mode: 'out', bounce: false, attract: { enable: false, rotateX: 600, rotateY: 1200 } }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true },
                modes: { grab: { distance: 140, line_linked: { opacity: 1 } }, bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 }, repulse: { distance: 200, duration: 0.4 }, push: { particles_nb: 4 }, remove: { particles_nb: 2 } }
            },
            retina_detect: true
        });
    }

    // Force CTA section to be visible and animated
    setTimeout(function() {
        const ctaSection = document.querySelector('section[data-aos="fade-up"]:last-of-type');
        if (ctaSection) {
            ctaSection.style.opacity = '1';
            ctaSection.style.transform = 'translateY(0)';
            ctaSection.classList.add('aos-animate');
        }
    }, 100);
});
</script>
@endpush

