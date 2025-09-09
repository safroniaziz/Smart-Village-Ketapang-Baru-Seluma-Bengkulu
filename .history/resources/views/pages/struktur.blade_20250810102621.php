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
<!-- Particles Background -->
<div id="particles-struktur" class="fixed inset-0 z-0"></div>

<!-- Hero Section - Consistent with other pages -->
<section class="relative pt-24 pb-32 bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="relative z-10 w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Breadcrumb style header -->
            <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
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

            <!-- Badge -->
            <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-users mr-2 text-yellow-300 text-xs"></i>
                    Pemerintahan & BPD
                </div>
            </div>

            <!-- Description -->
            <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                Struktur organisasi pemerintahan Desa Ketapang Baru yang terdiri dari Pemerintah Desa dan
                <span class="font-semibold text-yellow-300">Badan Permusyawaratan Desa (BPD)</span>
            </p>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 max-w-4xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
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
</section>

<!-- Main Organizational Chart Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center justify-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-full px-6 py-3 mb-6 shadow-lg">
                <i class="fas fa-sitemap text-white mr-3"></i>
                <span class="font-bold text-lg">Struktur Organisasi</span>
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Bagan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Organisasi</span>
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-blue-500 mx-auto rounded-full"></div>
            <p class="text-lg text-gray-600 mt-6 max-w-3xl mx-auto leading-relaxed">
                Struktur organisasi lengkap dengan hubungan koordinatif antara Pemerintah Desa dan BPD
            </p>
        </div>

        <!-- Organizational Chart Container -->
        <div class="bg-white rounded-3xl p-8 shadow-2xl border border-gray-100" data-aos="fade-up" data-aos-duration="800">
            <div id="organization-chart" class="min-h-[600px]"></div>

            <!-- Fallback Simple Chart (CSS-based) -->
            <div id="fallback-chart" style="display: none;">
                <!-- Clean Two-Column Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                    <!-- LEFT COLUMN: PEMERINTAHAN DESA -->
                    <div class="space-y-8">
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-blue-800 mb-6">PEMERINTAHAN DESA</h3>

                            <!-- Kepala Desa -->
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-4 border-blue-400 rounded-xl p-6 text-center shadow-xl relative max-w-sm mx-auto mb-8">
                                <div class="absolute -top-3 -right-3 w-8 h-8 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center border-2 border-white shadow-lg">
                                    <i class="fas fa-crown text-white text-xs"></i>
                                </div>
                                <img src="{{ asset('images/struktur/zultan.jpg') }}" alt="Kepala Desa" class="w-20 h-20 rounded-xl border-2 border-blue-300 mx-auto mb-3 object-cover"
                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                <h4 class="font-bold text-gray-900 text-lg mb-1">👑 Kepala Desa</h4>
                                <p class="text-blue-600 font-semibold mb-1">H. Ahmad Supriyadi, S.Pd</p>
                                <p class="text-xs text-gray-600 bg-blue-50 rounded px-3 py-1">Periode: 2021-2027</p>
                            </div>

                            <!-- Line -->
                            <div class="flex justify-center mb-6">
                                <div class="w-px h-8 bg-blue-400"></div>
                            </div>

                            <!-- Sekretaris Desa -->
                            <div class="bg-gradient-to-br from-green-50 to-green-100 border-2 border-green-300 rounded-xl p-4 text-center shadow-lg max-w-sm mx-auto mb-6">
                                <img src="{{ asset('images/struktur/merianto.jpg') }}" alt="Sekretaris" class="w-16 h-16 rounded-xl border-2 border-green-300 mx-auto mb-3 object-cover"
                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                <h5 class="font-bold text-gray-900 mb-1">Sekretaris Desa</h5>
                                <p class="text-green-600 font-semibold text-sm mb-1">Merianto</p>
                                <p class="text-xs text-gray-600">Administrasi & Koordinasi</p>
                            </div>

                            <!-- Kasi/Kaur Grid -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="bg-gradient-to-br from-orange-50 to-orange-100 border-2 border-orange-300 rounded-xl p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/sapta.jpg') }}" alt="Kaur Keuangan" class="w-12 h-12 rounded-xl border-2 border-orange-300 mx-auto mb-2 object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-sm mb-1">Kaur Keuangan</h6>
                                    <p class="text-orange-600 font-semibold text-xs mb-1">Sapta Adi</p>
                                    <p class="text-xs text-gray-600">Keuangan</p>
                                </div>
                                <div class="bg-gradient-to-br from-orange-50 to-orange-100 border-2 border-orange-300 rounded-xl p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/marlan.jpg') }}" alt="Kaur Perencanaan" class="w-12 h-12 rounded-xl border-2 border-orange-300 mx-auto mb-2 object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-sm mb-1">Kaur Perencanaan</h6>
                                    <p class="text-orange-600 font-semibold text-xs mb-1">Marlan</p>
                                    <p class="text-xs text-gray-600">Perencanaan</p>
                                </div>
                                <div class="bg-gradient-to-br from-orange-50 to-orange-100 border-2 border-orange-300 rounded-xl p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/desmerti.jpg') }}" alt="Kasi Pemerintahan" class="w-12 h-12 rounded-xl border-2 border-orange-300 mx-auto mb-2 object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-sm mb-1">Kasi Pemerintahan</h6>
                                    <p class="text-orange-600 font-semibold text-xs mb-1">Desmerti</p>
                                    <p class="text-xs text-gray-600">Pemerintahan</p>
                                </div>
                                <div class="bg-gradient-to-br from-orange-50 to-orange-100 border-2 border-orange-300 rounded-xl p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/rozi.jpg') }}" alt="Kasi Kesejahteraan" class="w-12 h-12 rounded-xl border-2 border-orange-300 mx-auto mb-2 object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-sm mb-1">Kasi Kesejahteraan</h6>
                                    <p class="text-orange-600 font-semibold text-xs mb-1">Rozi</p>
                                    <p class="text-xs text-gray-600">Kesejahteraan</p>
                                </div>
                            </div>

                            <!-- Kepala Dusun -->
                            <div class="space-y-3">
                                <div class="bg-gradient-to-br from-red-50 to-red-100 border-2 border-red-300 rounded-xl p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/ajasseriani.jpg') }}" alt="Kepala Dusun 1" class="w-12 h-12 rounded-xl border-2 border-red-300 mx-auto mb-2 object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-sm mb-1">Kepala Dusun 1</h6>
                                    <p class="text-red-600 font-semibold text-xs mb-1">Ajasseriani</p>
                                    <p class="text-xs text-gray-600">Koordinasi Wilayah</p>
                                </div>
                                <div class="bg-gradient-to-br from-red-50 to-red-100 border-2 border-red-300 rounded-xl p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/meri.jpg') }}" alt="Kepala Dusun 2" class="w-12 h-12 rounded-xl border-2 border-red-300 mx-auto mb-2 object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-sm mb-1">Kepala Dusun 2</h6>
                                    <p class="text-red-600 font-semibold text-xs mb-1">Meri</p>
                                    <p class="text-xs text-gray-600">Koordinasi Wilayah</p>
                                </div>
                                <div class="bg-gradient-to-br from-red-50 to-red-100 border-2 border-red-300 rounded-xl p-3 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/basri.jpg') }}" alt="Kepala Dusun 3" class="w-12 h-12 rounded-xl border-2 border-red-300 mx-auto mb-2 object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-sm mb-1">Kepala Dusun 3</h6>
                                    <p class="text-red-600 font-semibold text-xs mb-1">Basri</p>
                                    <p class="text-xs text-gray-600">Koordinasi Wilayah</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN: BPD -->
                    <div class="space-y-8">
                        <!-- Connection Indicator -->
                        <div class="flex items-center justify-center">
                            <div class="flex items-center space-x-4">
                                <div class="w-8 h-0 border-t-4 border-dashed border-purple-500 hidden lg:block"></div>
                                <div class="bg-purple-100 border-2 border-dashed border-purple-500 rounded-full px-4 py-2">
                                    <span class="text-purple-700 text-sm font-bold">MITRA KERJA</span>
                                </div>
                                <div class="w-8 h-0 border-t-4 border-dashed border-purple-500 hidden lg:block"></div>
                            </div>
                        </div>

                        <div class="text-center">
                            <h3 class="text-xl font-bold text-purple-800 mb-6">BADAN PERMUSYAWARATAN DESA</h3>

                            <!-- Ketua BPD -->
                            <div class="bg-gradient-to-br from-purple-50 to-purple-100 border-4 border-purple-400 rounded-xl p-6 text-center shadow-xl relative max-w-sm mx-auto mb-8">
                                <div class="absolute -top-3 -right-3 w-8 h-8 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center border-2 border-white shadow-lg">
                                    <i class="fas fa-crown text-white text-xs"></i>
                                </div>
                                <img src="{{ asset('images/struktur/bahirman.jpg') }}" alt="Ketua BPD" class="w-20 h-20 rounded-xl border-2 border-purple-300 mx-auto mb-3 object-cover"
                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                <h4 class="font-bold text-gray-900 text-lg mb-1">👑 Ketua BPD</h4>
                                <p class="text-purple-600 font-semibold mb-1">Bahirman</p>
                                <p class="text-xs text-gray-600 bg-purple-50 rounded px-3 py-1">Periode: 2021-2027</p>
                            </div>

                            <!-- Line -->
                            <div class="flex justify-center mb-6">
                                <div class="w-px h-8 bg-purple-400"></div>
                            </div>

                            <!-- BPD Members -->
                            <div class="space-y-4">
                                <div class="bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-gray-300 rounded-xl p-4 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/halintarman.jpg') }}" alt="Wakil Ketua BPD" class="w-12 h-12 rounded-xl border-2 border-gray-300 mx-auto mb-2 object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-sm mb-1">Wakil Ketua BPD</h6>
                                    <p class="text-gray-600 font-semibold text-xs mb-1">Halintarman</p>
                                    <p class="text-xs text-gray-600">Koordinasi</p>
                                </div>

                                <div class="bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-gray-300 rounded-xl p-4 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/kebat.jpg') }}" alt="Sekretaris BPD" class="w-12 h-12 rounded-xl border-2 border-gray-300 mx-auto mb-2 object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-sm mb-1">Sekretaris BPD</h6>
                                    <p class="text-gray-600 font-semibold text-xs mb-1">Kebat S</p>
                                    <p class="text-xs text-gray-600">Dokumentasi</p>
                                </div>

                                <div class="bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-gray-300 rounded-xl p-4 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/susti.jpg') }}" alt="Anggota BPD" class="w-12 h-12 rounded-xl border-2 border-gray-300 mx-auto mb-2 object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-sm mb-1">Anggota BPD</h6>
                                    <p class="text-gray-600 font-semibold text-xs mb-1">Susti</p>
                                    <p class="text-xs text-gray-600">Aspirasi</p>
                                </div>

                                <div class="bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-gray-300 rounded-xl p-4 text-center shadow-lg">
                                    <img src="{{ asset('images/struktur/dhesty.jpg') }}" alt="Anggota BPD" class="w-12 h-12 rounded-xl border-2 border-gray-300 mx-auto mb-2 object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <h6 class="font-bold text-gray-900 text-sm mb-1">Anggota BPD</h6>
                                    <p class="text-gray-600 font-semibold text-xs mb-1">Dhesty C</p>
                                    <p class="text-xs text-gray-600">Aspirasi</p>
                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/orgchart@4.0.1/dist/js/jquery.orgchart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
$(document).ready(function() {
    console.log('Document ready');
    console.log('jQuery loaded:', typeof $ !== 'undefined');
    console.log('AOS loaded:', typeof AOS !== 'undefined');
    console.log('OrgChart loaded:', typeof $.fn.orgchart !== 'undefined');

    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }

    // Force use fallback chart for now (more reliable)
    console.log('Using CSS-based organizational chart for better compatibility');
    $('#fallback-chart').show();
    $('#organization-chart').hide();
    return;

    // Organization Data Structure
    const orgData = {
        'name': 'H. Ahmad Supriyadi, S.Pd',
        'title': '👑 Kepala Desa',
        'role': 'Periode: 2021-2027',
        'photo': '{{ asset("images/struktur/zultan.jpg") }}',
        'className': 'kepala-desa',
        'children': [
            {
                'name': 'Merianto',
                'title': 'Sekretaris Desa',
                'role': 'Administrasi & Koordinasi',
                'photo': '{{ asset("images/struktur/merianto.jpg") }}',
                'className': 'sekretaris',
                'children': [
                    {
                        'name': 'Sapta Adi',
                        'title': 'Kaur Keuangan',
                        'role': 'Pengelolaan Keuangan',
                        'photo': '{{ asset("images/struktur/sapta.jpg") }}',
                        'className': 'kasi-kaur'
                    },
                    {
                        'name': 'Marlan',
                        'title': 'Kaur Perencanaan',
                        'role': 'Perencanaan Pembangunan',
                        'photo': '{{ asset("images/struktur/marlan.jpg") }}',
                        'className': 'kasi-kaur'
                    },
                    {
                        'name': 'Desmerti',
                        'title': 'Kasi Pemerintahan',
                        'role': 'Administrasi Pemerintahan',
                        'photo': '{{ asset("images/struktur/desmerti.jpg") }}',
                        'className': 'kasi-kaur'
                    },
                    {
                        'name': 'Rozi',
                        'title': 'Kasi Kesejahteraan',
                        'role': 'Kesejahteraan Masyarakat',
                        'photo': '{{ asset("images/struktur/rozi.jpg") }}',
                        'className': 'kasi-kaur'
                    }
                ]
            },
            {
                'name': 'Ajasseriani',
                'title': 'Kepala Dusun 1',
                'role': 'Koordinasi Wilayah',
                'photo': '{{ asset("images/struktur/ajasseriani.jpg") }}',
                'className': 'kepala-dusun'
            },
            {
                'name': 'Meri',
                'title': 'Kepala Dusun 2',
                'role': 'Koordinasi Wilayah',
                'photo': '{{ asset("images/struktur/meri.jpg") }}',
                'className': 'kepala-dusun'
            },
            {
                'name': 'Basri',
                'title': 'Kepala Dusun 3',
                'role': 'Koordinasi Wilayah',
                'photo': '{{ asset("images/struktur/basri.jpg") }}',
                'className': 'kepala-dusun'
            }
        ]
    };

    // BPD Data Structure (Separate)
    const bpdData = {
        'name': 'Bahirman',
        'title': '👑 Ketua BPD',
        'role': 'Periode: 2021-2027',
        'photo': '{{ asset("images/struktur/bahirman.jpg") }}',
        'className': 'ketua-bpd',
        'children': [
            {
                'name': 'Halintarman',
                'title': 'Wakil Ketua BPD',
                'role': 'Koordinasi & Pengawasan',
                'photo': '{{ asset("images/struktur/halintarman.jpg") }}',
                'className': 'bpd-member'
            },
            {
                'name': 'Kebat S',
                'title': 'Sekretaris BPD',
                'role': 'Dokumentasi & Notulensi',
                'photo': '{{ asset("images/struktur/kebat.jpg") }}',
                'className': 'bpd-member'
            },
            {
                'name': 'Susti',
                'title': 'Anggota BPD',
                'role': 'Aspirasi Masyarakat',
                'photo': '{{ asset("images/struktur/susti.jpg") }}',
                'className': 'bpd-member'
            },
            {
                'name': 'Dhesty C',
                'title': 'Anggota BPD',
                'role': 'Aspirasi Masyarakat',
                'photo': '{{ asset("images/struktur/dhesty.jpg") }}',
                'className': 'bpd-member'
            }
        ]
    };

    // Initialize Government Structure Chart
    const govChart = $('#organization-chart').orgchart({
        'data': orgData,
        'nodeContent': 'title',
        'createNode': function($node, data) {
            const photoUrl = data.photo || '{{ asset("images/struktur/default-person.png") }}';
            const crownHtml = data.className === 'kepala-desa' || data.className === 'ketua-bpd' ?
                '<div class="crown-badge"><i class="fas fa-crown text-white text-xs"></i></div>' : '';

            $node.html(`
                <div class="relative">
                    ${crownHtml}
                    <img src="${photoUrl}" alt="${data.name}" class="node-photo"
                         onerror="this.src='{{ asset("images/struktur/default-person.png") }}'; this.onerror=null;">
                    <div class="node-title">${data.title}</div>
                    <div class="node-name">${data.name}</div>
                    <div class="node-role">${data.role}</div>
                </div>
            `);
        },
        'exportButton': false,
        'pan': true,
        'zoom': true,
        'direction': 't2b',
        'verticalLevel': 1,
        'visibleLevel': 4
    });

    // Add BPD Chart as separate parallel structure
    setTimeout(() => {
        // Create BPD container
        const $bpdContainer = $('<div id="bpd-chart" style="margin-top: 40px; border-top: 3px dashed #8b5cf6; padding-top: 20px;"></div>');
        $('#organization-chart').append($bpdContainer);

        // Add coordination label
        const $coordinationLabel = $(`
            <div style="text-align: center; margin-bottom: 20px;">
                <div style="display: inline-flex; align-items: center; background: linear-gradient(135deg, #f3e8ff, #e9d5ff);
                            border: 2px dashed #8b5cf6; border-radius: 20px; padding: 8px 16px;">
                    <i class="fas fa-handshake" style="color: #8b5cf6; margin-right: 8px;"></i>
                    <span style="color: #7c3aed; font-weight: bold; font-size: 14px;">MITRA KERJA & PENGAWASAN</span>
                </div>
            </div>
        `);
        $bpdContainer.append($coordinationLabel);

        // Initialize BPD Chart
        const $bpdChartContainer = $('<div id="bpd-org-chart"></div>');
        $bpdContainer.append($bpdChartContainer);

        $bpdChartContainer.orgchart({
            'data': bpdData,
            'nodeContent': 'title',
            'createNode': function($node, data) {
                const photoUrl = data.photo || '{{ asset("images/struktur/default-person.png") }}';
                const crownHtml = data.className === 'ketua-bpd' ?
                    '<div class="crown-badge"><i class="fas fa-crown text-white text-xs"></i></div>' : '';

                $node.html(`
                    <div class="relative">
                        ${crownHtml}
                        <img src="${photoUrl}" alt="${data.name}" class="node-photo"
                             onerror="this.src='{{ asset("images/struktur/default-person.png") }}'; this.onerror=null;">
                        <div class="node-title">${data.title}</div>
                        <div class="node-name">${data.name}</div>
                        <div class="node-role">${data.role}</div>
                    </div>
                `);
            },
            'exportButton': false,
            'pan': true,
            'zoom': true,
            'direction': 't2b',
            'verticalLevel': 1,
            'visibleLevel': 3
        });
    }, 1000);

    // Initialize Particles.js for Struktur page - SUBTLE
    if (document.getElementById('particles-struktur')) {
        particlesJS('particles-struktur', {
            particles: {
                number: {
                    value: 30,
                    density: {
                        enable: true,
                        value_area: 1000
                    }
                },
                color: {
                    value: '#3b82f6'
                },
                shape: {
                    type: 'circle'
                },
                opacity: {
                    value: 0.3,
                    random: true
                },
                size: {
                    value: 4,
                    random: true
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#3b82f6',
                    opacity: 0.2,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 1,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: false
                    },
                    onclick: {
                        enable: false
                    },
                    resize: true
                }
            },
            retina_detect: true
        });
    }
});
</script>
@endpush

