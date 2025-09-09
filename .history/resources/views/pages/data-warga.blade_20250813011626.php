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
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);">
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
                            <h2 class="text-lg font-semibold text-green-100">DATA WARGA</h2>
                            <p class="text-sm text-green-100">Kecamatan Semidang Alas Maras</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Data</span><br>
                        <span class="text-yellow-400 font-extrabold">Warga Desa</span>
                    </h1>

                    <!-- Badge Data Terkini -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-database mr-2 text-yellow-300 text-xs"></i>
                            Data Terkini & Terverifikasi
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-green-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Akses lengkap data penduduk desa dengan fitur pencarian canggih dan informasi detail untuk keperluan administrasi dan pelayanan publik
                    </p>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">{{ $totalWarga }}</div>
                            <div class="text-sm text-green-100">Total Penduduk</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">{{ $totalKK }}</div>
                            <div class="text-sm text-green-100">Kartu Keluarga</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">3</div>
                            <div class="text-sm text-green-100">Dusun</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">{{ $activeWarga }}</div>
                            <div class="text-sm text-green-100">Status Aktif</div>
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

        <!-- Search & Filters Section -->
        <section class="py-16 bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50">
            <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="800">
                    <h2 class="text-3xl lg:text-4xl font-black mb-4">
                        <span class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 bg-clip-text text-transparent">
                            Cari & Filter Data Warga
                        </span>
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto">
                        Temukan informasi warga dengan cepat menggunakan fitur pencarian dan filter yang canggih
                    </p>
                </div>

                <!-- Combined Search & Filter Card -->
                <div class="bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <!-- Main Search Bar -->
                    <div class="mb-8">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400 text-xl"></i>
                            </div>
                            <input type="text" id="searchInput"
                                   placeholder="Cari berdasarkan nama, NIK, pekerjaan, agama, status perkawinan..."
                                   class="w-full pl-12 pr-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent text-lg">
                        </div>
                    </div>

                    <!-- Filter Row -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <!-- Gender Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                            <select id="genderFilter" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Semua</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <!-- Dusun Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Dusun</label>
                            <select id="dusunFilter" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Semua Dusun</option>
                                <option value="Dusun 1">Dusun 1</option>
                                <option value="Dusun 2">Dusun 2</option>
                                <option value="Dusun 3">Dusun 3</option>
                            </select>
                        </div>

                        <!-- Religion Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Agama</label>
                            <select id="religionFilter" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
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
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select id="statusFilter" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Semua Status</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="flex justify-center">
                        <button type="button" id="exportData" class="px-8 py-4 bg-emerald-600 text-white font-semibold rounded-2xl hover:bg-emerald-700 transition-all duration-200 shadow-lg">
                            <i class="fas fa-download mr-2"></i>Export Data
                        </button>
                    </div>
                </div>
            </div>
        </section>

<!-- Data Table Section -->
<section class="py-16 bg-white">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-black mb-4">
                <span class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 bg-clip-text text-transparent">
                    Data Lengkap Penduduk
                </span>
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto">
                Tampilkan {{ $wargas->total() }} data warga dengan informasi lengkap dan terstruktur
            </p>
        </div>

        <!-- Results Summary -->
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-6 mb-8" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            <div class="flex flex-col sm:flex-row items-center justify-between">
                <div class="flex items-center gap-4 mb-4 sm:mb-0">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-chart-bar text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <div class="text-sm text-green-600 font-medium">Hasil Pencarian</div>
                        <div class="text-2xl font-bold text-green-900" id="totalResults">{{ $wargas->total() }} Warga</div>
                    </div>
                </div>
                <div class="flex items-center gap-2 text-sm text-green-700" id="filterStatus" style="display: none;">
                    <i class="fas fa-filter"></i>
                    <span>Filter aktif</span>
                </div>
            </div>
        </div>

        <!-- Data Table -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <!-- Loading State -->
            <div id="loadingState" class="hidden p-12 text-center">
                <div class="inline-flex items-center gap-3 text-green-600">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-green-600"></div>
                    <span class="text-lg font-medium">Memuat data...</span>
                </div>
            </div>

            <!-- Table Content -->
            <div id="tableContent">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-green-100 to-emerald-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">NIK</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Nama Lengkap</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Jenis Kelamin</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Umur</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Dusun</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Agama</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-green-900">Pekerjaan</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-green-100">
                            @include('partials.warga-table-rows', ['wargas' => $wargas])
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div id="paginationContainer" class="px-6 py-6 bg-green-50 border-t border-green-100">
                    @if($wargas->hasPages())
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="text-sm text-green-700">
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
</section>
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
