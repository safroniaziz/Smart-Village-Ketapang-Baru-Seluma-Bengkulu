@extends('layouts.app')

@section('title', 'Data Warga - Smart Village Ketapang Baru')

@php
// Add aos-disabled class to HTML tag for fallback
if (!isset($aosDisabled)) {
    $aosDisabled = true;
}
@endphp

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
/* Fallback: bila AOS gagal dimuat, paksa tampil */
.aos-disabled [data-aos] { opacity: 1 !important; transform: none !important; }

/* Custom scrollbar for table */
.custom-scrollbar::-webkit-scrollbar {
    height: 8px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 4px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);
    border-radius: 4px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #0074b3 0%, #006ba3 50%, #005a8f 100%);
}

/* Enhanced table styling */
.enhanced-table th {
    background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.75rem;
}

.enhanced-table tbody tr {
    transition: all 0.2s ease;
}

.enhanced-table tbody tr:hover {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 134, 201, 0.1);
}

/* Filter chip styling */
.filter-chip {
    background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.875rem;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin: 0.25rem;
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Enhanced search input */
.enhanced-search {
    background: white;
    border: 2px solid #e2e8f0;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.enhanced-search:focus {
    border-color: #0086c9;
    box-shadow: 0 0 0 3px rgba(0, 134, 201, 0.1), 0 4px 16px rgba(0, 134, 201, 0.15);
    transform: translateY(-1px);
}

/* Enhanced filter selects */
.enhanced-filter {
    background: white;
    border: 2px solid #e2e8f0;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.enhanced-filter:focus {
    border-color: #0086c9;
    box-shadow: 0 0 0 3px rgba(0, 134, 201, 0.1), 0 4px 16px rgba(0, 134, 201, 0.15);
}

/* Force pagination layout to be left-right, never center */
#paginationContainer .flex {
    justify-content: space-between !important;
    width: 100% !important;
}

#paginationContainer .flex > * {
    flex-shrink: 0 !important;
}

/* Ensure pagination info is left and buttons are right */
#paginationContainer nav {
    width: 100% !important;
}

#paginationContainer nav > div:last-child {
    display: flex !important;
    justify-content: space-between !important;
    width: 100% !important;
}
    transform: translateY(-1px);
}

/* Status badges */
.status-badge {
    padding: 0.375rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-aktif { background: #dcfce7; color: #166534; }
.status-nonaktif { background: #fee2e2; color: #991b1b; }

/* Gender badges */
.gender-badge {
    padding: 0.375rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.gender-l { background: #dbeafe; color: #1e40af; }
.gender-p { background: #fce7f3; color: #be185d; }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<div class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100" data-aos-duration="1000"></div>

    <!-- Particle.js Container -->
    <div id="particles-data-warga" class="absolute inset-0" data-aos="fade-in" data-aos-delay="300" data-aos-duration="1500"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
            <!-- Hero Content -->
            <div class="flex-1 max-w-4xl relative z-10" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">DATA WARGA</h2>
                            <p class="text-sm text-blue-100">Kecamatan Semidang Alas Maras</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Data</span><br>
                        <span class="text-yellow-400 font-extrabold">Warga Desa</span>
                    </h1>

                    <!-- Badge Data Terkini -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-shield-check mr-2 text-yellow-300 text-xs"></i>
                            Data Terkini & Terverifikasi
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Akses lengkap data penduduk desa dengan fitur pencarian canggih dan informasi detail untuk keperluan administrasi dan pelayanan publik
                    </p>

                    <!-- Enhanced Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-6xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300" data-aos="zoom-in" data-aos-delay="900" data-aos-duration="600">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">{{ number_format($totalWarga) }}</div>
                                <i class="fas fa-users text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Total Penduduk</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-chart-line text-green-300 mr-1"></i>
                                Seluruh warga desa
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300" data-aos="zoom-in" data-aos-delay="1000" data-aos-duration="600">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">{{ number_format($totalKK) }}</div>
                                <i class="fas fa-home text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Kartu Keluarga</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-calculator text-blue-300 mr-1"></i>
                                {{ round($totalWarga / ($totalKK ?: 1), 1) }} orang/KK
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300" data-aos="zoom-in" data-aos-delay="1100" data-aos-duration="600">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">3</div>
                                <i class="fas fa-map-marker-alt text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Dusun</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-layer-group text-orange-300 mr-1"></i>
                                Wilayah administrasi
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300" data-aos="zoom-in" data-aos-delay="1200" data-aos-duration="600">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">{{ number_format($activeWarga) }}</div>
                                <i class="fas fa-check-circle text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Status Aktif</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-user-check text-green-300 mr-1"></i>
                                {{ round(($activeWarga / $totalWarga) * 100, 1) }}% aktif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Animated Wave -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1200">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-16">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="white"></path>
        </svg>
    </div>
</div>

<!-- Main Content Section -->
<div class="py-16 bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Enhanced Header -->
        <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-black mb-4">
                <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                    Data Lengkap Penduduk
                </span>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto mb-8">
                Eksplorasi data penduduk dengan filter interaktif real-time dan pencarian canggih
            </p>
        </div>



        <!-- Professional Data Management Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
                <div class="flex flex-col sm:flex-row items-center justify-between">
                    <div class="flex items-center gap-4 mb-4 sm:mb-0">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <i class="fas fa-database text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Data Warga Desa</h3>
                            <p class="text-blue-100 text-sm">Kelola dan cari data penduduk dengan mudah</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="text-right text-white">
                            <div class="text-2xl font-black">{{ $wargas->total() }}</div>
                            <div class="text-sm text-blue-100">Total Warga</div>
                        </div>
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search & Filter Section -->
            <div class="px-8 py-8 bg-gradient-to-br from-gray-50 to-slate-50 border-b border-gray-100">
                <!-- Main Search Bar -->
                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-search mr-2 text-blue-500"></i>
                        Pencarian Cepat
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400 text-lg"></i>
                        </div>
                        <input type="text" id="searchInput"
                               placeholder="Cari berdasarkan nama, NIK, pekerjaan, agama, status perkawinan..."
                               class="w-full pl-12 pr-4 py-4 enhanced-search rounded-2xl text-lg">
                    </div>
                </div>

                <!-- Advanced Filters -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Gender Filter -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-venus-mars mr-2 text-blue-500"></i>
                            Jenis Kelamin
                        </label>
                        <select id="genderFilter" class="w-full px-4 py-3 enhanced-filter rounded-xl">
                            <option value="">Semua</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <!-- Dusun Filter -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>
                            Dusun
                        </label>
                        <select id="dusunFilter" class="w-full px-4 py-3 enhanced-filter rounded-xl">
                            <option value="">Semua Dusun</option>
                            <option value="Dusun 1">Dusun 1</option>
                            <option value="Dusun 2">Dusun 2</option>
                            <option value="Dusun 3">Dusun 3</option>
                        </select>
                    </div>

                    <!-- Age Range Filter -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-birthday-cake mr-2 text-blue-500"></i>
                            Kelompok Usia
                        </label>
                        <select id="ageRangeFilter" class="w-full px-4 py-3 enhanced-filter rounded-xl">
                            <option value="">Semua Usia</option>
                            <option value="child">Anak (< 17 tahun)</option>
                            <option value="adult">Dewasa (17-60 tahun)</option>
                            <option value="senior">Lansia (> 60 tahun)</option>
                        </select>
                    </div>

                    <!-- Education Filter -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-graduation-cap mr-2 text-blue-500"></i>
                            Pendidikan
                        </label>
                        <select id="educationFilter" class="w-full px-4 py-3 enhanced-filter rounded-xl">
                            <option value="">Semua Pendidikan</option>
                            @foreach($educationOptions ?? [] as $education)
                                <option value="{{ $education }}">{{ $education }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Secondary Filters Row -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Profession Filter -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-briefcase mr-2 text-blue-500"></i>
                            Pekerjaan
                        </label>
                        <select id="professionFilter" class="w-full px-4 py-3 enhanced-filter rounded-xl">
                            <option value="">Semua Pekerjaan</option>
                            @foreach($professionOptions ?? [] as $profession)
                                <option value="{{ $profession }}">{{ $profession }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Religion Filter -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-pray mr-2 text-blue-500"></i>
                            Agama
                        </label>
                        <select id="religionFilter" class="w-full px-4 py-3 enhanced-filter rounded-xl">
                            <option value="">Semua Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-heart mr-2 text-blue-500"></i>
                            Status Perkawinan
                        </label>
                        <select id="statusFilter" class="w-full px-4 py-3 enhanced-filter rounded-xl">
                            <option value="">Semua Status</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>

                    <!-- Status Aktif Filter -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-user-check mr-2 text-blue-500"></i>
                            Status Kependudukan
                        </label>
                        <select id="statusAktifFilter" class="w-full px-4 py-3 enhanced-filter rounded-xl">
                            <option value="">Semua Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Non Aktif</option>
                            <option value="meninggal">Meninggal</option>
                            <option value="pindah">Pindah</option>
                        </select>
                    </div>
                </div>

                <!-- Active Filters Display -->
                <div class="mb-6" id="activeFiltersContainer" style="display: none;">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-filter mr-2 text-blue-500"></i>
                        Filter Aktif
                    </label>
                    <div id="activeFilters" class="flex flex-wrap gap-2">
                        <!-- Active filters will be displayed here -->
                    </div>
                </div>

                <!-- Results Summary -->
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-info-circle text-blue-500"></i>
                        <span>Gunakan kombinasi filter untuk hasil yang lebih akurat</span>
                    </div>
                    <div id="resultsCount" class="font-semibold text-blue-600">
                        {{ $wargas->total() }} data ditemukan
                    </div>
                </div>
            </div>

            <!-- Data Table Section -->
            <div class="relative">
                <!-- Loading State -->
                <div id="loadingState" class="hidden absolute inset-0 bg-white/80 backdrop-blur-sm z-10 flex items-center justify-center">
                    <div class="inline-flex items-center gap-3 text-blue-600 bg-white rounded-2xl px-6 py-4 shadow-lg">
                        <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-blue-600"></div>
                        <span class="font-medium">Memuat data...</span>
                    </div>
                </div>

                <!-- Table Content -->
                <div id="tableContent">
                    <div class="overflow-x-auto custom-scrollbar">
                        <table class="w-full enhanced-table">
                            <thead>
                                <tr>
                                    <th class="px-6 py-4 text-center w-16">No.</th>
                                    <th class="px-6 py-4 text-left">NIK</th>
                                    <th class="px-6 py-4 text-left">Nama Lengkap</th>
                                    <th class="px-6 py-4 text-left">Jenis Kelamin</th>
                                    <th class="px-6 py-4 text-left">Umur</th>
                                    <th class="px-6 py-4 text-left">Dusun</th>
                                    <th class="px-6 py-4 text-left">Agama</th>
                                    <th class="px-6 py-4 text-left">Status</th>
                                    <th class="px-6 py-4 text-left">Pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody" class="divide-y divide-gray-100">
                                @include('partials.warga-table-rows', ['wargas' => $wargas])
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div id="paginationContainer" class="px-6 py-6 bg-gradient-to-r from-blue-50 to-indigo-50 border-t border-blue-100">
                        @if($wargas->hasPages())
                            <div class="flex items-center justify-between w-full">
                                {{ $wargas->links('pagination.custom') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- AOS via CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- Particles.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, setting up Data Warga page...');

    // Initialize AOS immediately like in tentang.blade.php
    if (typeof AOS !== 'undefined') {
        console.log('AOS found, initializing...');
        document.documentElement.classList.remove('aos-disabled');

        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        console.log('AOS initialized');
    } else {
        console.warn('AOS not found, adding fallback class');
        document.documentElement.classList.add('aos-disabled');
    }

    // Debug pagination setup
    console.log('Setting up pagination event handlers...');

    // Debug: Check if all required elements exist
    console.log('Checking required elements...');
    const requiredElements = {
        searchInput: document.getElementById('searchInput'),
        genderFilter: document.getElementById('genderFilter'),
        ageRangeFilter: document.getElementById('ageRangeFilter'),
        educationFilter: document.getElementById('educationFilter'),
        professionFilter: document.getElementById('professionFilter'),
        dusunFilter: document.getElementById('dusunFilter'),
        religionFilter: document.getElementById('religionFilter'),
        statusFilter: document.getElementById('statusFilter'),
        statusAktifFilter: document.getElementById('statusAktifFilter'),
        tableBody: document.getElementById('tableBody'),
        paginationContainer: document.getElementById('paginationContainer'),
        activeFiltersContainer: document.getElementById('activeFiltersContainer'),
        activeFilters: document.getElementById('activeFilters'),
        resultsCount: document.getElementById('resultsCount'),
        loadingState: document.getElementById('loadingState'),
        tableContent: document.getElementById('tableContent')
    };

    console.log('Required elements status:', requiredElements);

    // Initialize Particles.js
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-data-warga', {
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

    // Fallback: Ensure loading state is not stuck
    setTimeout(() => {
        if (loadingState && !loadingState.classList.contains('hidden')) {
            console.warn('Loading state stuck, forcing hide...');
            loadingState.classList.add('hidden');
            if (tableContent) {
                tableContent.classList.remove('hidden');
            }
        }
    }, 10000); // 10 second timeout

    // Charts removed as per requirement - no longer needed
    function updateCharts(data) {
        // Charts functionality disabled
        console.log('Chart update skipped - charts removed from this page');
    }

    // Real-time search and filter functionality
    let searchTimeout;

    // Get all required elements with null checks
    const searchInput = document.getElementById('searchInput');
    const genderFilter = document.getElementById('genderFilter');
    const ageRangeFilter = document.getElementById('ageRangeFilter');
    const educationFilter = document.getElementById('educationFilter');
    const professionFilter = document.getElementById('professionFilter');
    const dusunFilter = document.getElementById('dusunFilter');
    const religionFilter = document.getElementById('religionFilter');
    const statusFilter = document.getElementById('statusFilter');
    const statusAktifFilter = document.getElementById('statusAktifFilter');
    const tableBody = document.getElementById('tableBody');
    const paginationContainer = document.getElementById('paginationContainer');
    const activeFiltersContainer = document.getElementById('activeFiltersContainer');
    const activeFilters = document.getElementById('activeFilters');
    const resultsCount = document.getElementById('resultsCount');
    const loadingState = document.getElementById('loadingState');
    const tableContent = document.getElementById('tableContent');

    // Log element status for debugging
    console.log('Element status after DOM load:', {
        searchInput: !!searchInput,
        genderFilter: !!genderFilter,
        ageRangeFilter: !!ageRangeFilter,
        educationFilter: !!educationFilter,
        professionFilter: !!professionFilter,
        dusunFilter: !!dusunFilter,
        religionFilter: !!religionFilter,
        statusFilter: !!statusFilter,
        statusAktifFilter: !!statusAktifFilter,
        tableBody: !!tableBody,
        paginationContainer: !!paginationContainer,
        activeFiltersContainer: !!activeFiltersContainer,
        activeFilters: !!activeFilters,
        resultsCount: !!resultsCount,
        loadingState: !!loadingState,
        tableContent: !!tableContent
    });

    // Function to update active filters display
    function updateActiveFilters() {
        const filters = [];
        const searchTerm = searchInput.value.trim();
        const gender = genderFilter.value;
        const ageRange = ageRangeFilter.value;
        const education = educationFilter.value;
        const profession = professionFilter.value;
        const dusun = dusunFilter.value;
        const religion = religionFilter.value;
        const status = statusFilter.value;
        const statusAktif = statusAktifFilter.value;

        if (searchTerm) filters.push({ type: 'search', value: searchTerm, label: `"${searchTerm}"` });
        if (gender) filters.push({ type: 'gender', value: gender, label: gender === 'L' ? 'Laki-laki' : 'Perempuan' });
        if (ageRange) filters.push({ type: 'age_range', value: ageRange, label: getAgeRangeLabel(ageRange) });
        if (education) filters.push({ type: 'education', value: education, label: education });
        if (profession) filters.push({ type: 'profession', value: profession, label: profession });
        if (dusun) filters.push({ type: 'dusun', value: dusun, label: dusun });
        if (religion) filters.push({ type: 'religion', value: religion, label: religion });
        if (status) filters.push({ type: 'status', value: status, label: status });
        if (statusAktif) filters.push({ type: 'status_aktif', value: statusAktif, label: statusAktif });

        if (filters.length > 0) {
            activeFiltersContainer.style.display = 'block';
            activeFilters.innerHTML = filters.map(filter => `
                <div class="filter-chip" data-type="${filter.type}" data-value="${filter.value}">
                    <i class="fas fa-${getFilterIcon(filter.type)}"></i>
                    ${filter.label}
                    <button onclick="removeFilter('${filter.type}')" class="ml-2 hover:bg-white/20 rounded-full w-5 h-5 flex items-center justify-center">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>
            `).join('');
        } else {
            activeFiltersContainer.style.display = 'none';
        }
    }

    // Function to get filter icon
    function getFilterIcon(type) {
        const icons = {
            search: 'search',
            gender: 'venus-mars',
            age_range: 'birthday-cake',
            education: 'graduation-cap',
            profession: 'briefcase',
            dusun: 'map-marker-alt',
            religion: 'pray',
            status: 'heart',
            status_aktif: 'user-check'
        };
        return icons[type] || 'filter';
    }

    // Function to get age range label
    function getAgeRangeLabel(value) {
        const labels = {
            child: 'Anak (< 17 tahun)',
            adult: 'Dewasa (17-60 tahun)',
            senior: 'Lansia (> 60 tahun)'
        };
        return labels[value] || value;
    }

    // Function to remove filter
    window.removeFilter = function(type) {
        switch(type) {
            case 'search':
                searchInput.value = '';
                break;
            case 'gender':
                genderFilter.value = '';
                break;
            case 'age_range':
                ageRangeFilter.value = '';
                break;
            case 'education':
                educationFilter.value = '';
                break;
            case 'profession':
                professionFilter.value = '';
                break;
            case 'dusun':
                dusunFilter.value = '';
                break;
            case 'religion':
                religionFilter.value = '';
                break;
            case 'status':
                statusFilter.value = '';
                break;
            case 'status_aktif':
                statusAktifFilter.value = '';
                break;
        }
        performSearch();
    };

    // Debounced search function
    function performSearch(page = 1) {
        console.log('performSearch called with page:', page);

        // Check if required elements exist
        if (!tableBody || !paginationContainer || !loadingState || !tableContent) {
            console.error('Required elements not found:', {
                tableBody: !!tableBody,
                paginationContainer: !!paginationContainer,
                loadingState: !!loadingState,
                tableContent: !!tableContent
            });
            return;
        }

        const searchTerm = searchInput ? searchInput.value.trim() : '';
        const gender = genderFilter ? genderFilter.value : '';
        const ageRange = ageRangeFilter ? ageRangeFilter.value : '';
        const education = educationFilter ? educationFilter.value : '';
        const profession = professionFilter ? professionFilter.value : '';
        const dusun = dusunFilter ? dusunFilter.value : '';
        const religion = religionFilter ? religionFilter.value : '';
        const status = statusFilter ? statusFilter.value : '';
        const statusAktif = statusAktifFilter ? statusAktifFilter.value : '';

        // Show loading state
        loadingState.classList.remove('hidden');
        tableContent.classList.add('hidden');

        // Update active filters display
        updateActiveFilters();

        // Prepare query parameters
        const params = new URLSearchParams();
        if (searchTerm) params.append('q', searchTerm);
        if (gender) params.append('gender', gender);
        if (ageRange) params.append('age_range', ageRange);
        if (education) params.append('education', education);
        if (profession) params.append('profession', profession);
        if (dusun) params.append('dusun', dusun);
        if (religion) params.append('religion', religion);
        if (status) params.append('status', status);
        if (statusAktif) params.append('status_aktif', statusAktif);
        if (page > 1) params.append('page', page);

        // Make AJAX request
        console.log('Making AJAX request with params:', params.toString());

        fetch(`{{ route('data.warga') }}?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('AJAX Response received:', data);

            // Update table content
            if (data.html) {
                tableBody.innerHTML = data.html;
                console.log('Table updated successfully');
            }

            // Update pagination
            if (data.pagination) {
                // Wrap pagination HTML with the same layout structure
                paginationContainer.innerHTML = `
                    <div class="flex items-center justify-between w-full">
                        ${data.pagination}
                    </div>
                `;
                console.log('Pagination updated successfully with consistent layout');
            }

            // Update statistics in header cards
            if (data.stats) {
                const displayElement = document.getElementById('displayFilteredTotal');
                if (displayElement) {
                    displayElement.textContent = data.stats.total.toLocaleString();
                }

                const labelElement = document.getElementById('filteredLabel');
                if (labelElement) {
                    labelElement.textContent = data.stats.total === {{ $totalWarga }} ? 'Menampilkan semua' :
                        `${data.stats.total.toLocaleString()} hasil filter`;
                }

                if (resultsCount) {
                    resultsCount.textContent = `${data.stats.total} data ditemukan`;
                }
            }

            // Update charts with filtered data
            if (data.charts) {
                updateCharts(data.charts);
            }

            // Hide loading state
            loadingState.classList.add('hidden');
            tableContent.classList.remove('hidden');

            // Refresh AOS after content update
            if (typeof AOS !== 'undefined' && AOS.refresh) {
                setTimeout(() => {
                    AOS.refresh();
                    console.log('AOS refreshed after AJAX update');
                }, 100);
            }

            console.log('Search completed successfully');
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            console.error('Error details:', {
                message: error.message,
                stack: error.stack
            });

            // Show user-friendly error message
            if (tableBody) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="9" class="px-6 py-16 text-center text-red-500">
                            <div class="flex flex-col items-center space-y-4">
                                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-2xl text-red-600"></i>
                                </div>
                                <div class="text-center">
                                    <h3 class="text-lg font-bold text-red-900 mb-2">Error Memuat Data</h3>
                                    <p class="text-red-700">Terjadi kesalahan saat memuat data. Silakan refresh halaman.</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
            }

            // Hide loading state and show table
            if (loadingState) loadingState.classList.add('hidden');
            if (tableContent) tableContent.classList.remove('hidden');

            // Refresh AOS after error recovery
            if (typeof AOS !== 'undefined' && AOS.refresh) {
                setTimeout(() => {
                    AOS.refresh();
                    console.log('AOS refreshed after error recovery');
                }, 100);
            }
        });
    }

    // Search input with debouncing
    if (searchInput) {
        searchInput.addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(performSearch, 500); // 500ms delay
        });
        console.log('Search input event listener added');
    } else {
        console.warn('Search input not found');
    }

    // Filter changes (immediate)
    const filters = [genderFilter, ageRangeFilter, educationFilter, professionFilter, dusunFilter, religionFilter, statusFilter, statusAktifFilter];
    filters.forEach((filter, index) => {
        if (filter) {
            filter.addEventListener('change', performSearch);
            console.log(`Filter ${index} event listener added`);
        } else {
            console.warn(`Filter ${index} not found`);
        }
    });

    // Handle pagination clicks with multiple fallback strategies
    document.addEventListener('click', (e) => {
        // Strategy 1: Check for pagination class
        const paginationLink = e.target.closest('a.pagination');
        if (paginationLink) {
            e.preventDefault();
            e.stopPropagation();

            console.log('Pagination Strategy 1 - clicked:', paginationLink.href);

            const url = new URL(paginationLink.href);
            const page = url.searchParams.get('page') || 1;

            performSearch(page);
            return false;
        }

        // Strategy 2: Check for any link inside pagination container
        if (e.target.closest('#paginationContainer')) {
            const link = e.target.closest('a');
            if (link && link.href) {
                e.preventDefault();
                e.stopPropagation();

                console.log('Pagination Strategy 2 - clicked:', link.href);

                const url = new URL(link.href);
                const page = url.searchParams.get('page') || 1;

                performSearch(page);
                return false;
            }
        }

        // Strategy 3: Check for any link with pagination in href
        const anyLink = e.target.closest('a');
        if (anyLink && anyLink.href && anyLink.href.includes('page=')) {
            // Only apply if it's within the table section
            if (e.target.closest('.enhanced-table') || e.target.closest('#paginationContainer')) {
                e.preventDefault();
                e.stopPropagation();

                console.log('Pagination Strategy 3 - clicked:', anyLink.href);

                const url = new URL(anyLink.href);
                const page = url.searchParams.get('page') || 1;

                performSearch(page);
                return false;
            }
        }
    }, true); // Use capture phase to ensure it runs first

    // Final AOS refresh
    setTimeout(() => {
        if (typeof AOS !== 'undefined' && AOS.refresh) {
            AOS.refresh();
            console.log('Final AOS refresh completed');
        }
    }, 1000);

    // Final check: Ensure page is not stuck in loading
    setTimeout(() => {
        console.log('Final check: Ensuring page is not stuck in loading...');
        if (loadingState && !loadingState.classList.contains('hidden')) {
            console.warn('Loading state still active, forcing hide...');
            loadingState.classList.add('hidden');
        }
        if (tableContent && tableContent.classList.contains('hidden')) {
            console.warn('Table content still hidden, forcing show...');
            tableContent.classList.remove('hidden');
        }
        console.log('Final check completed');
    }, 2000);

    // Final AOS refresh to ensure all animations work
    setTimeout(() => {
        if (typeof AOS !== 'undefined' && AOS.refresh) {
            AOS.refresh();
            console.log('Final AOS refresh completed');
        }
    }, 2500);
});
</script>
@endpush

