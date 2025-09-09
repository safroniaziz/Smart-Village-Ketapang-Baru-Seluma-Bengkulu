@extends('layouts.app')

@section('title', 'Beranda - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="bg-blue-600 text-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-2xl font-bold mb-1">Smart Village</h1>
            <p class="text-sm text-blue-100">Sistem Informasi Pemerintahan Desa Ketapang Baru</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-blue-600 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <!-- Village Profile Card -->
            <div class="bg-white rounded-xl shadow-md p-4">
                <div class="flex items-start space-x-3">
                    <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-map-marker-alt text-white text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Ketapang Baru</h3>
                        <p class="text-gray-600 text-xs mb-1">Jl. Raya Ketapang No. 15, RT/RW 001/001</p>
                        <p class="text-gray-600 text-xs mb-1">Desa Ketapang Baru, Kec. Semidang Alas Maras</p>
                        <p class="text-gray-600 text-xs mb-2">Kab. Seluma, Prov. Bengkulu</p>
                        <div class="space-y-1">
                            <p class="text-gray-600 text-xs">
                                <i class="fas fa-phone mr-1"></i>Telp: (0736) 123456
                            </p>
                            <p class="text-gray-600 text-xs">
                                <i class="fas fa-envelope mr-1"></i>Email: ketapangbaru@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prayer Times Card -->
            <div class="bg-white rounded-xl shadow-md p-4">
                <h3 class="text-sm font-bold text-gray-900 mb-3 flex items-center">
                    <i class="fas fa-mosque mr-2 text-blue-600"></i>
                    Jadwal Sholat
                </h3>
                <div class="space-y-1">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-xs">Imsak</span>
                        <span class="font-semibold text-xs">04:36</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-xs">Shubuh</span>
                        <span class="font-semibold text-xs">04:46</span>
                    </div>
                    <div class="flex justify-between items-center bg-blue-50 rounded px-2 py-1 border border-blue-200">
                        <span class="text-blue-700 font-medium text-xs">Terbit</span>
                        <span class="font-bold text-blue-700 text-xs">06:06</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-xs">Dzuhur</span>
                        <span class="font-semibold text-xs">12:04</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-xs">Ashr</span>
                        <span class="font-semibold text-xs">15:25</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-xs">Maghrib</span>
                        <span class="font-semibold text-xs">18:01</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-xs">Isya</span>
                        <span class="font-semibold text-xs">19:13</span>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-t border-gray-200">
                    <p class="text-xs text-gray-500">07 Aug 2025 • Lokasi: Desa Ketapang Baru</p>
                </div>
            </div>

            <!-- News Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                         alt="Berita Desa"
                         class="w-full h-32 object-cover"
                         onerror="this.src='https://ui-avatars.com/api/?name=Berita+Desa&background=1e40af&color=ffffff&size=400x150&bold=true'">
                    <div class="absolute top-2 right-2 bg-white/90 backdrop-blur-sm rounded px-2 py-1">
                        <span class="text-xs font-medium text-gray-700">8 Juli 2024</span>
                    </div>
                </div>
                <div class="p-4">
                    <h4 class="text-sm font-bold text-gray-900 mb-2">Kegiatan Sosialisasi Smart Village</h4>
                    <p class="text-gray-600 text-xs leading-relaxed">
                        Kegiatan sosialisasi dan penerapan teknologi digital kepada warga Desa Ketapang Baru dalam rangka mewujudkan Smart Village yang modern dan terintegrasi.
                    </p>
                    <div class="mt-3 flex justify-center">
                        <div class="flex space-x-1">
                            <div class="w-1.5 h-1.5 bg-blue-600 rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-blue-600 rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-blue-600 rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-gray-300 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-1">Layanan Unggulan</h2>
            <p class="text-gray-600 text-sm">Akses layanan desa dengan mudah dan cepat</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow p-3 text-center border border-gray-100">
                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-envelope text-white text-sm"></i>
                </div>
                <h3 class="font-semibold text-gray-900 text-sm mb-1">Surat Online</h3>
                <p class="text-gray-600 text-xs mb-2">Ajukan surat secara online</p>
                <a href="{{ route('surat.online') }}" class="text-blue-600 text-xs font-medium">Pelajari →</a>
            </div>

            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow p-3 text-center border border-gray-100">
                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-users text-white text-sm"></i>
                </div>
                <h3 class="font-semibold text-gray-900 text-sm mb-1">Data Warga</h3>
                <p class="text-gray-600 text-xs mb-2">Informasi data warga</p>
                <a href="{{ route('data.warga') }}" class="text-green-600 text-xs font-medium">Pelajari →</a>
            </div>

            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow p-3 text-center border border-gray-100">
                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-map text-white text-sm"></i>
                </div>
                <h3 class="font-semibold text-gray-900 text-sm mb-1">Peta Desa</h3>
                <p class="text-gray-600 text-xs mb-2">Peta interaktif desa</p>
                <a href="{{ route('peta.desa') }}" class="text-purple-600 text-xs font-medium">Pelajari →</a>
            </div>

            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow p-3 text-center border border-gray-100">
                <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                    <i class="fas fa-comment text-white text-sm"></i>
                </div>
                <h3 class="font-semibold text-gray-900 text-sm mb-1">Pengaduan</h3>
                <p class="text-gray-600 text-xs mb-2">Sampaikan pengaduan</p>
                <a href="{{ route('pengaduan') }}" class="text-red-600 text-xs font-medium">Pelajari →</a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-1">Statistik Desa</h2>
            <p class="text-gray-600 text-sm">Data terkini perkembangan desa</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
            <div class="bg-white rounded-lg shadow-sm p-4 text-center border border-gray-100">
                <div class="text-2xl font-bold text-blue-600 mb-1">2,500</div>
                <div class="text-gray-600 text-sm">Total Warga</div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 text-center border border-gray-100">
                <div class="text-2xl font-bold text-green-600 mb-1">8</div>
                <div class="text-gray-600 text-sm">Dusun</div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 text-center border border-gray-100">
                <div class="text-2xl font-bold text-purple-600 mb-1">250</div>
                <div class="text-gray-600 text-sm">Hektar</div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-4 text-center border border-gray-100">
                <div class="text-2xl font-bold text-red-600 mb-1">95%</div>
                <div class="text-gray-600 text-sm">Literasi</div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Hide loading screen quickly
    setTimeout(function() {
        $('.loading-screen').fadeOut(300);
    }, 300);
});
</script>
@endpush
