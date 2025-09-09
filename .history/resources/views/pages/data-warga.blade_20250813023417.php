@extends('layouts.app')

@section('title', 'Data Warga - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-Ho3Q0RyY4wQtwj0Q1sS2mZ0b7N2b5VQQl9Z4b6VtqvH8lJ0m6EJ2lT2qYq8J2b6P9m1oX4m0m7W2YqFqSxq2aA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
/* Fallback: bila AOS gagal dimuat, paksa tampil */
.aos-disabled [data-aos] { opacity: 1 !important; transform: none !important; }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<div class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container -->
    <div id="particles-data-warga" class="absolute inset-0"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content -->
            <div class="flex-1 max-w-4xl relative z-10">
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
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-database mr-2 text-yellow-300 text-xs"></i>
                            Data Terkini & Terverifikasi
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Akses lengkap data penduduk desa dengan fitur pencarian canggih dan informasi detail untuk keperluan administrasi dan pelayanan publik
                    </p>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">{{ $totalWarga }}</div>
                            <div class="text-sm text-blue-100">Total Penduduk</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">{{ $totalKK }}</div>
                            <div class="text-sm text-blue-100">Kartu Keluarga</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">3</div>
                            <div class="text-sm text-blue-100">Dusun</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">{{ $activeWarga }}</div>
                            <div class="text-sm text-blue-100">Status Aktif</div>
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
</div>

<!-- Main Content Section -->
<div class="py-16 bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Search & Filter Header -->
        <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-black mb-4">
                <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                    Cari & Filter Data Warga
                </span>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto">
                Temukan informasi warga dengan cepat menggunakan fitur pencarian dan filter yang canggih
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
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Pencarian Cepat</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400 text-lg"></i>
                        </div>
                        <input type="text" id="searchInput"
                               placeholder="Cari berdasarkan nama, NIK, pekerjaan, agama, status perkawinan..."
                               class="w-full pl-12 pr-4 py-4 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg bg-white shadow-sm">
                    </div>
                </div>

                <!-- Advanced Filters -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <!-- Gender Filter -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
                        <select id="genderFilter" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white shadow-sm">
                            <option value="">Semua</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <!-- Dusun Filter -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Dusun</label>
                        <select id="dusunFilter" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white shadow-sm">
                            <option value="">Semua Dusun</option>
                            <option value="Dusun 1">Dusun 1</option>
                            <option value="Dusun 2">Dusun 2</option>
                            <option value="Dusun 3">Dusun 3</option>
                        </select>
                    </div>

                    <!-- Religion Filter -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Agama</label>
                        <select id="religionFilter" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white shadow-sm">
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
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <select id="statusFilter" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white shadow-sm">
                            <option value="">Semua Status</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>
                </div>

                <!-- Action Bar -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-2 text-sm text-gray-600" id="filterStatus" style="display: none;">
                        <i class="fas fa-filter text-blue-500"></i>
                        <span>Filter aktif diterapkan</span>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" id="exportData" class="px-6 py-3 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg flex items-center gap-2" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
                            <i class="fas fa-download"></i>
                            Export Data
                        </button>
                    </div>
                </div>
            </div>

            <!-- Data Table Section -->
            <div class="relative">
                <!-- Loading State -->
                <div id="loadingState" class="hidden absolute inset-0 bg-white/80 backdrop-blur-sm z-10 flex items-center justify-center">
                    <div class="inline-flex items-center gap-3 text-emerald-600 bg-white rounded-2xl px-6 py-4 shadow-lg">
                        <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-emerald-600"></div>
                        <span class="font-medium">Memuat data...</span>
                    </div>
                </div>

                <!-- Table Content -->
                <div id="tableContent">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-emerald-50 to-teal-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">NIK</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Nama Lengkap</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Jenis Kelamin</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Umur</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Dusun</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Agama</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Status</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-900">Pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody" class="divide-y divide-gray-100">
                                @include('partials.warga-table-rows', ['wargas' => $wargas])
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div id="paginationContainer" class="px-6 py-6 bg-gradient-to-r from-emerald-50 to-teal-50 border-t border-emerald-100">
                        @if($wargas->hasPages())
                            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                                <div class="text-sm text-emerald-700">
                                    Menampilkan {{ $wargas->firstItem() ?? 0 }} - {{ $wargas->lastItem() ?? 0 }} dari {{ $wargas->total() }} data
                                </div>
                                <div class="flex items-center gap-2">
                                    {{ $wargas->links() }}
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.js" integrity="sha512-0Z3nG7OLh3s1y0mEwQb0mE+0a0ySxg3T2h7s6y4fJmNfWJcQnJ8uQm8O8wI2yLxQyQdJm5O3qVv5QkP3Yb0wAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Particles.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, checking AOS...');

    // Initialize AOS
    setTimeout(() => {
        if (typeof AOS !== 'undefined') {
            console.log('AOS found, initializing...');
            document.documentElement.classList.remove('aos-disabled');

            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100,
                delay: 0
            });

            console.log('AOS initialized');
        } else {
            console.warn('AOS not found');
        }
    }, 100);

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

    // Export functionality
    const exportBtn = document.getElementById('exportData');
    if (exportBtn) {
        exportBtn.addEventListener('click', () => {
            // Simple CSV export
            const table = document.querySelector('table');
            if (!table) return;

            const rows = Array.from(table.querySelectorAll('tr')).map(row =>
                Array.from(row.querySelectorAll('th,td')).map(cell => {
                    const text = cell.innerText.replace(/\n/g, ' ').trim();
                    return `"${text.replace(/"/g, '""')}"`;
                }).join(',')
            ).join('\n');

            const blob = new Blob([rows], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'data-warga.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });
    }

    // Real-time search and filter functionality
    let searchTimeout;
    const searchInput = document.getElementById('searchInput');
    const genderFilter = document.getElementById('genderFilter');
    const dusunFilter = document.getElementById('dusunFilter');
    const religionFilter = document.getElementById('religionFilter');
    const statusFilter = document.getElementById('statusFilter');
    const tableBody = document.getElementById('tableBody');
    const paginationContainer = document.getElementById('paginationContainer');
    const totalResults = document.getElementById('totalResults');
    const filterStatus = document.getElementById('filterStatus');
    const loadingState = document.getElementById('loadingState');
    const tableContent = document.getElementById('tableContent');

    // Debounced search function
    function performSearch() {
        const searchTerm = searchInput.value.trim();
        const gender = genderFilter.value;
        const dusun = dusunFilter.value;
        const religion = religionFilter.value;
        const status = statusFilter.value;

        // Show loading state
        loadingState.classList.remove('hidden');
        tableContent.classList.add('hidden');

        // Check if any filter is active
        const hasActiveFilters = searchTerm || gender || dusun || religion || status;
        filterStatus.style.display = hasActiveFilters ? 'flex' : 'none';

        // Prepare query parameters
        const params = new URLSearchParams();
        if (searchTerm) params.append('q', searchTerm);
        if (gender) params.append('gender', gender);
        if (dusun) params.append('dusun', dusun);
        if (religion) params.append('religion', religion);
        if (status) params.append('status', status);

        // Make AJAX request
        fetch(`{{ route('data.warga') }}?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html, application/xhtml+xml'
            }
        })
        .then(response => response.text())
        .then(html => {
            // Create temporary div to parse HTML
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = html;

            // Extract table rows
            const newRows = tempDiv.querySelector('#tableBody');
            if (newRows) {
                tableBody.innerHTML = newRows.innerHTML;
            }

            // Extract pagination
            const newPagination = tempDiv.querySelector('#paginationContainer');
            if (newPagination) {
                paginationContainer.innerHTML = newPagination.innerHTML;
            }

            // Update total results
            const newTotal = tempDiv.querySelector('#totalResults');
            if (newTotal) {
                totalResults.textContent = newTotal.textContent;
            }

            // Hide loading state
            loadingState.classList.add('hidden');
            tableContent.classList.remove('hidden');

            // Update URL without page refresh
            const newUrl = `${window.location.pathname}?${params.toString()}`;
            window.history.pushState({}, '', newUrl);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            loadingState.classList.add('hidden');
            tableContent.classList.remove('hidden');
        });
    }

    // Search input with debouncing
    if (searchInput) {
        searchInput.addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(performSearch, 500); // 500ms delay
        });
    }

    // Filter changes (immediate)
    [genderFilter, dusunFilter, religionFilter, statusFilter].forEach(filter => {
        if (filter) {
            filter.addEventListener('change', performSearch);
        }
    });

    // Handle pagination clicks
    document.addEventListener('click', (e) => {
        if (e.target.matches('.pagination a')) {
            e.preventDefault();
            const url = e.target.href;

            // Show loading state
            loadingState.classList.remove('hidden');
            tableContent.classList.add('hidden');

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html, application/xhtml+xml'
                }
            })
            .then(response => response.text())
            .then(html => {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;

                const newRows = tempDiv.querySelector('#tableBody');
                if (newRows) {
                    tableBody.innerHTML = newRows.innerHTML;
                }

                const newPagination = tempDiv.querySelector('#paginationContainer');
                if (newPagination) {
                    paginationContainer.innerHTML = newPagination.innerHTML;
                }

                const newTotal = tempDiv.querySelector('#totalResults');
                if (newTotal) {
                    totalResults.textContent = newTotal.textContent;
                }

                loadingState.classList.add('hidden');
                tableContent.classList.remove('hidden');

                // Update URL
                window.history.pushState({}, '', url);
            })
            .catch(error => {
                console.error('Error fetching pagination:', error);
                loadingState.classList.add('hidden');
                tableContent.classList.remove('hidden');
            });
        }
    });

    // Final AOS refresh
    setTimeout(() => {
        if (typeof AOS !== 'undefined' && AOS.refresh) {
            AOS.refresh();
            console.log('Final AOS refresh completed');
        }
    }, 1000);
});
</script>
@endpush
