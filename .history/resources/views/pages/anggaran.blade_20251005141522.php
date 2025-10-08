@extends('layouts.app-public')

@section('title', 'Anggaran Desa - Smart Village ' . ($villageName ?? 'Ketapang Baru'))

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    /* Custom CSS untuk Anggaran Page */

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

    /* Loading skeleton */
    .skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* Card hover effects */
    .stat-card {
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 134, 201, 0.15);
        background: rgba(255, 255, 255, 1);
    }

    /* Chart containers */
    .chart-container {
        position: relative;
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .chart-container canvas {
        border-radius: 12px;
    }

    /* Table styling */
    .data-table {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .data-table thead {
        background: linear-gradient(135deg, #0086c9, #004d83);
        color: white;
    }

    .data-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(0, 134, 201, 0.1);
    }

    .data-table tbody tr:hover {
        background-color: rgba(0, 134, 201, 0.05);
        transform: scale(1.01);
    }

    /* Year selector */
    .year-selector {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50px;
        padding: 12px 24px;
        transition: all 0.3s ease;
    }

    .year-selector:focus {
        border-color: #0086c9;
        box-shadow: 0 0 20px rgba(0, 134, 201, 0.3);
    }

    /* Floating elements */
    .floating-element {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    /* Progress bars */
    .progress {
        height: 12px;
        border-radius: 10px;
        background-color: rgba(0, 134, 201, 0.1);
        overflow: hidden;
    }

    .progress-bar {
        border-radius: 10px;
        background: linear-gradient(90deg, #0086c9, #00a8e6);
        transition: width 2s ease-in-out;
    }

    /* Icon styling */
    .stat-icon {
        width: 64px;
        height: 64px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: white;
        background: linear-gradient(135deg, #0086c9, #004d83);
        margin-bottom: 16px;
    }

    /* Filter buttons */
    .filter-btn {
        background: rgba(255, 255, 255, 0.9);
        border: 2px solid transparent;
        color: #0086c9;
        border-radius: 50px;
        padding: 12px 24px;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .filter-btn.active,
    .filter-btn:hover {
        background: #0086c9;
        color: white;
        border-color: #0086c9;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 134, 201, 0.3);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .stat-card {
            margin-bottom: 16px;
        }

        .chart-container {
            padding: 16px;
            margin-bottom: 24px;
        }

        .data-table {
            font-size: 14px;
        }
    }

    /* Background decorative elements */
    .bg-decoration {
        position: absolute;
        opacity: 0.1;
        pointer-events: none;
    }

    .bg-decoration-1 {
        top: 10%;
        right: 10%;
        font-size: 120px;
        color: #0086c9;
    }

    .bg-decoration-2 {
        bottom: 15%;
        left: 5%;
        font-size: 80px;
        color: #004d83;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<div class="relative min-h-screen hero-gradient flex items-center overflow-hidden">
    <!-- Background Decorations -->
    <div class="bg-decoration bg-decoration-1 floating-element">
        <i class="fas fa-chart-line"></i>
    </div>
    <div class="bg-decoration bg-decoration-2 floating-element" style="animation-delay: -3s;">
        <i class="fas fa-coins"></i>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center text-white" data-aos="fade-up">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Anggaran Desa
                <span class="block text-2xl md:text-3xl font-normal mt-2 text-blue-200">Ketapang Baru</span>
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto leading-relaxed">
                Transparansi Anggaran Pendapatan dan Belanja Desa (APBDes),
                Pagu Earmark, dan Program Bantuan Langsung Tunai Desa
            </p>

            <!-- Year Selector -->
            <div class="mb-8" data-aos="fade-up" data-aos-delay="200">
                <label class="block text-lg font-semibold mb-4">Pilih Tahun Anggaran</label>
                <select id="yearSelector" class="year-selector mx-auto text-center text-lg font-semibold text-gray-700">
                    @foreach($availableYears as $year)
                        <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>
                            Tahun {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Scroll Indicator -->
            <div class="animate-bounce mt-16" data-aos="fade-up" data-aos-delay="400">
                <a href="#stats" class="inline-block p-3 rounded-full bg-white bg-opacity-20 hover:bg-opacity-30 transition-all duration-300">
                    <i class="fas fa-chevron-down text-2xl"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<section id="stats" class="py-20 relative">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Ringkasan Anggaran Tahun {{ $tahun }}
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Overview lengkap keuangan desa meliputi pendapatan, belanja, dan program bantuan sosial
            </p>
        </div>

        <!-- Main Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            <!-- Total Pendapatan -->
            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #10b981, #065f46);">
                    <i class="fas fa-arrow-trend-up"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Total Pendapatan</h3>
                <p class="text-3xl font-bold text-green-600 mb-2" id="totalPendapatan">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </p>
                <p class="text-sm text-gray-500">{{ $pendapatan->count() }} item anggaran</p>
            </div>

            <!-- Total Belanja -->
            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #ef4444, #991b1b);">
                    <i class="fas fa-arrow-trend-down"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Total Belanja</h3>
                <p class="text-3xl font-bold text-red-600 mb-2" id="totalBelanja">
                    Rp {{ number_format($totalBelanja, 0, ',', '.') }}
                </p>
                <p class="text-sm text-gray-500">{{ $belanja->count() }} item anggaran</p>
            </div>

            <!-- Surplus/Defisit -->
            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, {{ $surplus >= 0 ? '#3b82f6, #1e40af' : '#f59e0b, #d97706' }});">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">
                    {{ $surplus >= 0 ? 'Surplus' : 'Defisit' }}
                </h3>
                <p class="text-3xl font-bold {{ $surplus >= 0 ? 'text-blue-600' : 'text-orange-600' }} mb-2" id="surplusDefisit">
                    Rp {{ number_format(abs($surplus), 0, ',', '.') }}
                </p>
                <p class="text-sm text-gray-500">Selisih Pendapatan - Belanja</p>
            </div>

            <!-- Total Penerima BLT-DD -->
            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #8b5cf6, #5b21b6);">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Penerima BLT-DD</h3>
                <p class="text-3xl font-bold text-purple-600 mb-2" id="totalPenerima">
                    {{ number_format($totalPenerimaBlt, 0, ',', '.') }}
                </p>
                <p class="text-sm text-gray-500">
                    Total bantuan: Rp {{ number_format($totalBantuanBlt, 0, ',', '.') }}
                </p>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <!-- APBDes Chart -->
            <div class="chart-container" data-aos="fade-right">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                    <i class="fas fa-chart-pie mr-3 text-blue-600"></i>
                    Komposisi APBDes
                </h3>
                <div style="position: relative; height: 300px;">
                    <canvas id="apbdesChart"></canvas>
                </div>
            </div>

            <!-- Pagu Earmark Chart -->
            <div class="chart-container" data-aos="fade-left">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                    <i class="fas fa-chart-bar mr-3 text-green-600"></i>
                    Top 10 Pagu Earmark
                </h3>
                <div style="position: relative; height: 300px;">
                    <canvas id="paguChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- APBDes Detail Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Detail APBDes {{ $tahun }}
            </h2>
            <p class="text-lg text-gray-600">
                Rincian lengkap Anggaran Pendapatan dan Belanja Desa
            </p>
        </div>

        <!-- Filter Buttons -->
        <div class="text-center mb-12" data-aos="fade-up" data-aos-delay="100">
            <div class="inline-flex gap-4 p-2 bg-white rounded-full shadow-lg">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="pendapatan">Pendapatan</button>
                <button class="filter-btn" data-filter="belanja">Belanja</button>
            </div>
        </div>

        <!-- APBDes Tables -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Pendapatan Table -->
            <div class="data-table" data-aos="fade-right" data-category="pendapatan">
                <div class="bg-gradient-to-r from-green-600 to-green-700 p-6">
                    <h3 class="text-2xl font-bold text-white flex items-center">
                        <i class="fas fa-arrow-up mr-3"></i>
                        Pendapatan Desa
                    </h3>
                    <p class="text-green-100 mt-2">Total: Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left">No</th>
                                <th class="px-6 py-4 text-left">Keterangan</th>
                                <th class="px-6 py-4 text-right">Anggaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendapatan as $index => $item)
                                <tr>
                                    <td class="px-6 py-4 font-semibold text-gray-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800">{{ $item->keterangan }}</div>
                                        @if($item->keterangan_detail)
                                            <div class="text-sm text-gray-500 mt-1">{{ Str::limit($item->keterangan_detail, 50) }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right font-bold text-green-600">
                                        {{ $item->formatted_anggaran }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                                        Belum ada data pendapatan untuk tahun {{ $tahun }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Belanja Table -->
            <div class="data-table" data-aos="fade-left" data-category="belanja">
                <div class="bg-gradient-to-r from-red-600 to-red-700 p-6">
                    <h3 class="text-2xl font-bold text-white flex items-center">
                        <i class="fas fa-arrow-down mr-3"></i>
                        Belanja Desa
                    </h3>
                    <p class="text-red-100 mt-2">Total: Rp {{ number_format($totalBelanja, 0, ',', '.') }}</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-red-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left">No</th>
                                <th class="px-6 py-4 text-left">Keterangan</th>
                                <th class="px-6 py-4 text-right">Anggaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($belanja as $index => $item)
                                <tr>
                                    <td class="px-6 py-4 font-semibold text-gray-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800">{{ $item->keterangan }}</div>
                                        @if($item->keterangan_detail)
                                            <div class="text-sm text-gray-500 mt-1">{{ Str::limit($item->keterangan_detail, 50) }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right font-bold text-red-600">
                                        {{ $item->formatted_anggaran }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                                        Belum ada data belanja untuk tahun {{ $tahun }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pagu Earmark Section -->
@if($paguEarmarks->isNotEmpty())
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Pagu Earmark {{ $tahun }}
            </h2>
            <p class="text-lg text-gray-600">
                Anggaran yang ditentukan penggunaannya untuk kegiatan spesifik
            </p>
        </div>

        <div class="data-table max-w-6xl mx-auto" data-aos="fade-up">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6">
                <h3 class="text-2xl font-bold text-white flex items-center">
                    <i class="fas fa-tasks mr-3"></i>
                    Daftar Kegiatan Pagu Earmark
                </h3>
                <p class="text-blue-100 mt-2">Total Pagu: Rp {{ number_format($paguEarmarks->sum('jumlah_pagu'), 0, ',', '.') }}</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-center">No</th>
                            <th class="px-6 py-4 text-left">Kegiatan</th>
                            <th class="px-6 py-4 text-center">Satuan</th>
                            <th class="px-6 py-4 text-right">Jumlah Pagu</th>
                            <th class="px-6 py-4 text-left">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paguEarmarks as $index => $pagu)
                            <tr>
                                <td class="px-6 py-4 text-center font-semibold text-gray-600">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-800">{{ $pagu->kegiatan }}</td>
                                <td class="px-6 py-4 text-center text-gray-600">{{ $pagu->satuan }}</td>
                                <td class="px-6 py-4 text-right font-bold text-blue-600">
                                    {{ $pagu->formatted_jumlah_pagu }}
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    {{ $pagu->keterangan ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endif

<!-- BLT-DD Section -->
@if($bltDds->isNotEmpty())
<section class="py-20 bg-gradient-to-br from-purple-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Bantuan Langsung Tunai Desa {{ $tahun }}
            </h2>
            <p class="text-lg text-gray-600">
                Daftar penerima BLT-DD dan informasi demografinya
            </p>
        </div>

        <!-- BLT Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #8b5cf6, #5b21b6);">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Total Penerima</h3>
                <p class="text-2xl font-bold text-purple-600">{{ $totalPenerimaBlt }}</p>
            </div>

            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #ec4899, #be185d);">
                    <i class="fas fa-venus"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Perempuan</h3>
                <p class="text-2xl font-bold text-pink-600">{{ $bltDds->where('jenis_kelamin', 'P')->count() }}</p>
            </div>

            <div class="stat-card rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon mx-auto" style="background: linear-gradient(135deg, #06b6d4, #0891b2);">
                    <i class="fas fa-mars"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Laki-laki</h3>
                <p class="text-2xl font-bold text-cyan-600">{{ $bltDds->where('jenis_kelamin', 'L')->count() }}</p>
            </div>
        </div>

        <div class="data-table" data-aos="fade-up">
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 p-6">
                <h3 class="text-2xl font-bold text-white flex items-center">
                    <i class="fas fa-hand-holding-usd mr-3"></i>
                    Daftar Penerima BLT-DD
                </h3>
                <p class="text-purple-100 mt-2">Total Bantuan: Rp {{ number_format($totalBantuanBlt, 0, ',', '.') }}</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-center">No</th>
                            <th class="px-6 py-4 text-left">Nama</th>
                            <th class="px-6 py-4 text-center">L/P</th>
                            <th class="px-6 py-4 text-left">NIK</th>
                            <th class="px-6 py-4 text-left">Alamat</th>
                            <th class="px-6 py-4 text-left">No. Rekening</th>
                            <th class="px-6 py-4 text-right">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bltDds->take(50) as $index => $blt)
                            <tr>
                                <td class="px-6 py-4 text-center font-semibold text-gray-600">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-800">{{ $blt->nama }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                        {{ $blt->jenis_kelamin === 'P' ? 'bg-pink-100 text-pink-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ $blt->jenis_kelamin }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600 font-mono">{{ $blt->nik }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ Str::limit($blt->alamat, 30) }}</td>
                                <td class="px-6 py-4 text-gray-600 font-mono">{{ $blt->no_rekening ?? '-' }}</td>
                                <td class="px-6 py-4 text-right font-bold text-purple-600">
                                    {{ $blt->formatted_nominal_bantuan }}
                                </td>
                            </tr>
                        @endforeach

                        @if($bltDds->count() > 50)
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500 font-semibold">
                                    ... dan {{ $bltDds->count() - 50 }} penerima lainnya
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Call to Action Section -->
<section class="py-20 bg-gradient-to-br from-blue-600 to-blue-800 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center text-white" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Transparansi dan Akuntabilitas
            </h2>
            <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto">
                Kami berkomitmen untuk menjaga transparansi dalam pengelolaan keuangan desa.
                Semua data anggaran dapat diakses publik sebagai bentuk akuntabilitas kepada masyarakat.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('kontak') }}" class="inline-flex items-center justify-center px-8 py-3 bg-white text-blue-600 font-semibold rounded-full hover:bg-gray-100 transition-all duration-300">
                    <i class="fas fa-phone mr-2"></i>
                    Hubungi Kami
                </a>
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-8 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-blue-600 transition-all duration-300">
                    <i class="fas fa-home mr-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        mirror: false
    });

    // Check if Chart.js is loaded
    if (typeof Chart === 'undefined') {
        console.error('Chart.js is not loaded. Please check your internet connection.');
        // Show fallback message to user
        const charts = document.querySelectorAll('.chart-container');
        charts.forEach(container => {
            container.innerHTML = '<div class="text-center p-8"><p class="text-gray-500">Grafik tidak dapat dimuat. Silakan refresh halaman.</p></div>';
        });
        return;
    }

    try {
        // Chart data from backend
        const chartData = @json($chartData);

        // APBDes Pie Chart
        const apbdesCtx = document.getElementById('apbdesChart').getContext('2d');
        new Chart(apbdesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Pendapatan', 'Belanja'],
            datasets: [{
                data: [
                    chartData.apbdes.pendapatan || 0,
                    chartData.apbdes.belanja || 0
                ],
                backgroundColor: [
                    '#10b981',
                    '#ef4444'
                ],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        font: {
                            size: 14,
                            weight: 'bold'
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const value = context.parsed;
                            const formatted = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }).format(value);
                            return context.label + ': ' + formatted;
                        }
                    }
                }
            }
        }
    });

    // Pagu Earmark Bar Chart
    const paguCtx = document.getElementById('paguChart').getContext('2d');
    new Chart(paguCtx, {
        type: 'bar',
        data: {
            labels: chartData.pagu.map(item => item.kegiatan.substring(0, 20) + (item.kegiatan.length > 20 ? '...' : '')),
            datasets: [{
                label: 'Pagu (Rp)',
                data: chartData.pagu.map(item => item.pagu),
                backgroundColor: 'rgba(34, 197, 94, 0.8)',
                borderColor: 'rgba(34, 197, 94, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }).format(value);
                        }
                    }
                },
                x: {
                    ticks: {
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const value = context.parsed.y;
                            const formatted = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }).format(value);
                            return 'Pagu: ' + formatted;
                        }
                    }
                }
            }
        }
    });

    // Year selector change handler
    document.getElementById('yearSelector').addEventListener('change', function() {
        const selectedYear = this.value;
        window.location.href = `{{ route('anggaran') }}?tahun=${selectedYear}`;
    });

    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const tables = document.querySelectorAll('[data-category]');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;

            // Update active button
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            // Show/hide tables
            tables.forEach(table => {
                if (filter === 'all') {
                    table.style.display = 'block';
                } else {
                    table.style.display = table.dataset.category === filter ? 'block' : 'none';
                }
            });
        });
    });

    // Animate numbers on scroll
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                if (target.id === 'totalPendapatan' || target.id === 'totalBelanja' || target.id === 'surplusDefisit' || target.id === 'totalPenerima') {
                    animateNumber(target);
                }
            }
        });
    }, observerOptions);

    ['totalPendapatan', 'totalBelanja', 'surplusDefisit', 'totalPenerima'].forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            observer.observe(element);
        }
    });

    function animateNumber(element) {
        const text = element.textContent.replace(/[^\d]/g, '');
        const target = parseInt(text);
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }

            const formatted = new Intl.NumberFormat('id-ID').format(Math.floor(current));
            if (element.id === 'totalPenerima') {
                element.textContent = formatted;
            } else {
                element.textContent = 'Rp ' + formatted;
            }
        }, 16);
    }
});
</script>
@endpush
