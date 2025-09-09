@extends('layouts.app')

@section('title', 'Statistik Desa - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-Ho3Q0RyY4wQtwj0Q1sS2mZ0b7N2b5VQQl9Z4b6VtqvH8lJ0m6EJ2lT2qYq8J2b6P9m1oX4m0m7W2YqFqSxq2aA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
/* Fallback: bila AOS gagal dimuat, paksa tampil */
.aos-disabled [data-aos] { opacity: 1 !important; transform: none !important; }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container for Statistics -->
    <div id="particles-statistik" class="absolute inset-0"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content (Centered) -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-chart-bar text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">DATA STATISTIK</h2>
                            <p class="text-sm text-blue-100">Kecamatan Semidang Alas Maras</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Statistik</span><br>
                        <span class="text-yellow-400 font-extrabold">Desa Ketapang Baru</span>
                    </h1>

                    <!-- Badge Data Terkini -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
            <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-database mr-2 text-yellow-300 text-xs"></i>
                            Data Terkini & Akurat
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Analisis mendalam tentang <span class="font-semibold text-yellow-300">demografi, sosial, dan ekonomi</span>
                        masyarakat desa untuk perencanaan pembangunan yang tepat sasaran
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
                            <div class="text-2xl font-black text-yellow-400">{{ $totalSurat }}</div>
                            <div class="text-sm text-blue-100">Surat Diproses</div>
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

<!-- Sub Navigation -->
<nav class="stat-subnav sticky top-20 z-30" aria-label="Navigasi Statistik">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="subnav-surface">
            <ul class="flex items-center gap-2 sm:gap-3 min-w-max" id="statSubnav">
                <li>
                    <a href="#overview" class="stat-tab" aria-current="false">
                        <i class="fas fa-chart-pie mr-2"></i>
                        <span>Ikhtisar</span>
                    </a>
                </li>
                <li>
                    <a href="#education" class="stat-tab" aria-current="false">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        <span>Pendidikan & Pekerjaan</span>
                    </a>
                </li>
                <li>
                    <a href="#social" class="stat-tab" aria-current="false">
                        <i class="fas fa-heart mr-2"></i>
                        <span>Sosial & Agama</span>
                    </a>
                </li>
                <li>
                    <a href="#aid" class="stat-tab" aria-current="false">
                        <i class="fas fa-hands-helping mr-2"></i>
                        <span>Bantuan</span>
                    </a>
                </li>
                <li>
                    <a href="#data" class="stat-tab" aria-current="false">
                        <i class="fas fa-list mr-2"></i>
                        <span>Data</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>

<!-- Statistics Overview Section -->
<section id="overview" class="stat-target py-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <!-- Floating Decoration -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-200/20 to-indigo-300/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-purple-200/20 to-pink-300/20 rounded-full blur-3xl"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-chart-pie mr-2"></i>
                    Overview Statistik
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-4xl lg:text-5xl font-black mb-4">
                    <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent">
                        Gambaran Umum Demografi
                    </span>
                </h2>
                <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto"></div>
            </div>
            <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
                Analisis komprehensif tentang struktur penduduk, distribusi usia, pendidikan, dan kondisi sosial ekonomi masyarakat Desa Ketapang Baru
            </p>
        </div>

        <!-- Statistics Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mb-24">
            <!-- Gender Distribution -->
            <div class="bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-right" data-aos-duration="800">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-venus-mars text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">Distribusi Gender</h3>
                            <p class="text-slate-600">Perbandingan Laki-laki & Perempuan</p>
                        </div>
                    </div>
                </div>

                @php
                    $male = $genderStats['L'] ?? 0;
                    $female = $genderStats['P'] ?? 0;
                    $totalGender = $male + $female;
                    $malePct = $totalGender > 0 ? round(($male / $totalGender) * 100) : 0;
                    $femalePct = $totalGender > 0 ? round(($female / $totalGender) * 100) : 0;
                @endphp

                <!-- Compact stacked bar 100% -->
                <div class="mb-6">
                    <div class="w-full h-3 rounded-full overflow-hidden bg-slate-100 flex">
                        <span class="h-full bg-blue-500" style="width: {{ $malePct }}%"></span>
                        <span class="h-full bg-fuchsia-500" style="width: {{ $femalePct }}%"></span>
                    </div>
                    <div class="flex justify-between mt-2 text-sm">
                        <div class="flex items-center gap-2 text-blue-700"><span class="inline-block w-2.5 h-2.5 rounded-sm bg-blue-500"></span>Laki-laki {{ $malePct }}%</div>
                        <div class="flex items-center gap-2 text-fuchsia-700"><span class="inline-block w-2.5 h-2.5 rounded-sm bg-fuchsia-500"></span>Perempuan {{ $femalePct }}%</div>
                    </div>
                </div>

                <!-- Stats + Chart -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="rounded-2xl border border-slate-200 p-4">
                            <div class="text-xs uppercase tracking-wide text-slate-500 mb-1">Laki-laki</div>
                            <div class="text-2xl font-bold text-slate-900">{{ $male }}</div>
                            <div class="text-sm text-blue-600">{{ $malePct }}%</div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 p-4">
                            <div class="text-xs uppercase tracking-wide text-slate-500 mb-1">Perempuan</div>
                            <div class="text-2xl font-bold text-slate-900">{{ $female }}</div>
                            <div class="text-sm text-fuchsia-600">{{ $femalePct }}%</div>
                        </div>
                    </div>
                    <div class="relative h-56">
                        <canvas id="genderChart"></canvas>
                        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                            <span class="text-xs text-slate-500">Total</span>
                            <span class="text-2xl font-extrabold text-slate-900">{{ $totalGender }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Age Distribution -->
            <div class="bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-left" data-aos-duration="800">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Kelompok Umur</h3>
                        <p class="text-gray-600">Distribusi berdasarkan usia</p>
                    </div>
                </div>

                <div class="space-y-4 mb-6">
                    @foreach(['Balita', 'Anak', 'Remaja', 'Dewasa', 'Lansia'] as $ageGroup)
                        @php
                            $count = $ageStats[$ageGroup] ?? 0;
                            $percentage = $totalWarga > 0 ? ($count / $totalWarga) * 100 : 0;
                        @endphp
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700 font-medium">{{ $ageGroup }}</span>
                            <span class="text-lg font-bold text-green-600">{{ $count }}</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                        </div>
                    @endforeach
                </div>

                <!-- Chart Container -->
                <div class="h-48">
                    <canvas id="ageChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education & Employment Section -->
<section id="education" class="stat-target py-20 bg-white">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-graduation-cap mr-2"></i>
                    Pendidikan & Pekerjaan
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-4xl lg:text-5xl font-black mb-4">
                    <span class="bg-gradient-to-r from-sky-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent">
                        Profil Pendidikan & Mata Pencaharian
                    </span>
                </h2>
                <div class="w-16 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full mx-auto"></div>
            </div>
            <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
                Analisis tingkat pendidikan dan jenis pekerjaan masyarakat untuk memahami potensi dan kebutuhan pengembangan SDM
            </p>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mb-24">
            <!-- Education Level -->
            <div class="bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 rounded-3xl p-8 shadow-2xl" data-aos="fade-right" data-aos-duration="800">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Tingkat Pendidikan</h3>
                <div class="h-64">
                    <canvas id="educationChart"></canvas>
                </div>
            </div>

            <!-- Profession -->
            <div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 rounded-3xl p-8 shadow-2xl" data-aos="fade-left" data-aos-duration="800">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Jenis Pekerjaan</h3>
                <div class="h-64">
                    <canvas id="professionChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social & Religion Section -->
<section id="social" class="stat-target py-20 bg-gradient-to-br from-purple-50 via-pink-50 to-rose-50 relative overflow-hidden">
    <!-- Floating Decoration -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-purple-200/20 to-pink-300/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-rose-200/20 to-orange-300/20 rounded-full blur-3xl"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-heart mr-2"></i>
                    Sosial & Keagamaan
                </div>
            </div>

            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent">
                    Kondisi Sosial & Keagamaan
                </span>
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto mb-8"></div>
            <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
                Analisis status perkawinan dan agama masyarakat untuk memahami struktur sosial dan nilai-nilai yang dianut
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Marital Status -->
            <div class="bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-right" data-aos-duration="800">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Status Perkawinan</h3>
                <div class="h-64">
                    <canvas id="maritalChart"></canvas>
                </div>
            </div>

            <!-- Religion -->
            <div class="bg-white rounded-3xl p-8 shadow-2xl" data-aos="fade-left" data-aos-duration="800">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Agama</h3>
                <div class="h-64">
                    <canvas id="religionChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Aid Programs Section -->
<section id="aid" class="stat-target py-20 bg-white">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-red-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-hands-helping mr-2"></i>
                    Program Bantuan
                </div>
            </div>

                <h2 class="text-4xl lg:text-5xl font-black mb-4">
                    <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent">
                    Penerima Program Bantuan
                </span>
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-full mx-auto mb-8"></div>
            <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
                Distribusi penerima berbagai program bantuan pemerintah untuk memastikan penyaluran yang tepat sasaran
            </p>
        </div>

        <div class="bg-gradient-to-br from-orange-50 via-red-50 to-pink-50 rounded-3xl p-8 shadow-2xl" data-aos="fade-up" data-aos-duration="800">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Program Bantuan Sosial</h3>
            <div class="h-64">
                <canvas id="aidChart"></canvas>
            </div>
        </div>
    </div>
</section>

<!-- Population List Section -->
<section id="data" class="stat-target py-20 bg-gradient-to-br from-gray-50 via-slate-50 to-zinc-50">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-600 to-slate-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-gray-600 to-slate-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-list mr-2"></i>
                    Data Penduduk
                </div>
            </div>

            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent">
                    Daftar Penduduk Desa
                </span>
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-gray-500 to-slate-500 rounded-full mx-auto mb-8"></div>
            <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
                Data lengkap penduduk dengan fitur pencarian dan pagination untuk kemudahan akses informasi
            </p>
        </div>

        <!-- Search & Tools Bar -->
        <div class="bg-white rounded-2xl p-6 shadow-xl mb-8" data-aos="fade-up" data-aos-duration="800">
            <form method="GET" action="{{ route('statistik') }}" class="flex flex-col gap-4">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <label for="search-q" class="sr-only">Pencarian</label>
                        <input id="search-q" type="text" name="q" value="{{ request('q') }}"
                               placeholder="Cari berdasarkan nama, NIK, pekerjaan, agama, status..."
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                    <div class="flex items-stretch gap-3">
                        <button type="submit" class="px-5 py-3 bg-slate-900 text-white font-semibold rounded-xl hover:bg-slate-800 transition-all duration-200">
                            <i class="fas fa-search mr-2"></i>Cari
                        </button>
                        <a href="{{ route('statistik') }}" class="px-5 py-3 bg-white border border-gray-300 text-slate-700 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200">
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Data Table -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden" data-aos="fade-up" data-aos-duration="800">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-gray-100 to-slate-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">NIK</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Nama Lengkap</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Jenis Kelamin</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Umur</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Agama</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($wargas as $warga)
                            @php
                                $umur = \Carbon\Carbon::parse($warga->tanggal_lahir)->age;
                            @endphp
                            <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100 transition-colors duration-150">
                                <td class="px-6 py-4 text-sm text-gray-900 font-mono">{{ $warga->nik }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $warga->nama_lengkap }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $warga->jenis_kelamin === 'L' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                        {{ $warga->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $umur }} tahun</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $warga->agama }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $warga->status_perkawinan }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $warga->pekerjaan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center space-y-2">
                                        <i class="fas fa-search text-4xl text-gray-300"></i>
                                        <p>Tidak ada data yang ditemukan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($wargas->hasPages())
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Menampilkan {{ $wargas->firstItem() ?? 0 }} - {{ $wargas->lastItem() ?? 0 }} dari {{ $wargas->total() }} data
                        </div>
                        <div class="flex space-x-2">
                            {{ $wargas->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- AOS via CDN (fallback saat Vite bermasalah) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.js" integrity="sha512-0Z3nG7OLh3s1y0mEwQb0mE+0a0ySxg3T2h7s6y4fJmNfWJcQnJ8uQm8O8wI2yLxQyQdJm5O3qVv5QkP3Yb0wAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Particles.js (tetap via CDN) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Subnav helpers
    const tabs = document.querySelectorAll('.stat-tab');
    const mainNavEl = document.querySelector('nav.fixed');
    const subNavEl = document.querySelector('.stat-subnav');
    const mainH = mainNavEl ? mainNavEl.offsetHeight : 0;
    const subH = subNavEl ? subNavEl.offsetHeight : 0;
    const extra = 16; // breathing room
    const offsetTop = mainH + subH + extra;
    document.documentElement.style.setProperty('--stat-offset', offsetTop + 'px');
    function setActive(hash) {
        tabs.forEach(t => {
            const isActive = t.getAttribute('href') === hash;
            t.classList.toggle('active', isActive);
            t.setAttribute('aria-current', isActive ? 'page' : 'false');
        });
    }
    // Scrollspy
    const sections = ['#overview','#education','#social','#aid','#data']
        .map(id => document.querySelector(id))
        .filter(Boolean);
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                setActive('#' + entry.target.id);
            }
        });
    }, { rootMargin: `-${offsetTop}px 0px -60% 0px`, threshold: [0, 0.25, 0.5, 0.75, 1] });
    sections.forEach(s => observer.observe(s));

    // Smooth scroll
    tabs.forEach(t => {
        t.addEventListener('click', (e) => {
            const target = document.querySelector(t.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Download table as CSV
    // CSV download moved to admin-only area

    // Initialize AOS (enable animations by removing fallback class)
    if (typeof AOS !== 'undefined') {
        document.documentElement.classList.remove('aos-disabled');
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        // Ensure recalculation after dynamic content/Charts
        setTimeout(() => AOS.refreshHard(), 300);
    }

    // Initialize Particles.js
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-statistik', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
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

    // Chart.js global defaults for cleaner look
    if (window.Chart) {
        Chart.defaults.font.family = 'Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell, Noto Sans, Helvetica Neue, Arial, "Apple Color Emoji", "Segoe UI Emoji"';
        Chart.defaults.color = '#0f172a';
        Chart.defaults.plugins.legend.labels.boxWidth = 12;
        Chart.defaults.plugins.legend.labels.boxHeight = 12;
        Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(15,23,42,0.9)';
        Chart.defaults.plugins.tooltip.titleColor = '#fff';
        Chart.defaults.plugins.tooltip.bodyColor = '#e5e7eb';
        Chart.defaults.responsive = true;
    }

    // Chart configurations
    const chartConfigs = {
        gender: {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [{{ $genderStats['L'] ?? 0 }}, {{ $genderStats['P'] ?? 0 }}],
                    backgroundColor: ['#2563EB', '#8B5CF6'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '68%',
                plugins: { legend: { position: 'bottom' } }
            }
        },
        age: {
            type: 'bar',
            data: {
                labels: ['Balita', 'Anak', 'Remaja', 'Dewasa', 'Lansia'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        {{ $ageStats['Balita'] ?? 0 }},
                        {{ $ageStats['Anak'] ?? 0 }},
                        {{ $ageStats['Remaja'] ?? 0 }},
                        {{ $ageStats['Dewasa'] ?? 0 }},
                        {{ $ageStats['Lansia'] ?? 0 }}
                    ],
                    backgroundColor: ['#38BDF8', '#60A5FA', '#818CF8', '#A78BFA', '#C084FC'],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        },
        education: {
            type: 'bar',
            data: {
                labels: ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $educationStats['Tidak Sekolah'] ?? 0 }}, {{ $educationStats['SD'] ?? 0 }}, {{ $educationStats['SMP'] ?? 0 }}, {{ $educationStats['SMA'] ?? 0 }}, {{ $educationStats['D3'] ?? 0 }}, {{ $educationStats['S1'] ?? 0 }}, {{ $educationStats['S2'] ?? 0 }}, {{ $educationStats['S3'] ?? 0 }}],
                    backgroundColor: ['#BFDBFE', '#93C5FD', '#A5B4FC', '#C4B5FD', '#DDD6FE', '#E9D5FF', '#F5D0FE', '#FAE8FF'],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        },
        profession: {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($professionStats)) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode(array_values($professionStats)) !!},
                    backgroundColor: ['#38BDF8', '#60A5FA', '#818CF8', '#A78BFA', '#C084FC', '#22D3EE', '#93C5FD', '#A5B4FC', '#C4B5FD', '#DDD6FE'],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        },
        marital: {
            type: 'pie',
            data: {
                labels: {!! json_encode(array_keys($maritalStats)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($maritalStats)) !!},
                    backgroundColor: ['#60A5FA', '#34D399', '#FBBF24', '#FB7185'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        },
        religion: {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($religionStats)) !!},
                datasets: [{
                    data: {!! json_encode(array_values($religionStats)) !!},
                    backgroundColor: ['#60A5FA', '#34D399', '#A78BFA', '#FBBF24', '#FB7185', '#F472B6'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        },
        aid: {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($aidStats)) !!},
                datasets: [{
                    label: 'Jumlah Penerima',
                    data: {!! json_encode(array_values($aidStats)) !!},
                    backgroundColor: ['#38BDF8', '#60A5FA', '#818CF8', '#A78BFA', '#C084FC'],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        }
    };

    // Create charts
    Object.keys(chartConfigs).forEach(chartName => {
        const canvas = document.getElementById(chartName + 'Chart');
        if (canvas) {
            new Chart(canvas, chartConfigs[chartName]);
        }
    });
});
</script>
@endpush
