@extends('layouts.app')

@section('title', 'Beranda - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="bg-blue-600 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl lg:text-4xl font-bold mb-2">Smart Village</h1>
            <p class="text-lg text-blue-100">Sistem Informasi Pemerintahan Desa Ketapang Baru</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="bg-blue-600 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Village Profile Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-start space-x-4">
                    <div class="w-16 h-16 bg-green-500 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Ketapang Baru</h3>
                        <p class="text-gray-600 text-sm mb-2">Jl. Raya Ketapang No. 15, RT/RW 001/001</p>
                        <p class="text-gray-600 text-sm">Desa Ketapang Baru, Kec. Semidang Alas Maras</p>
                        <p class="text-gray-600 text-sm">Kab. Seluma, Prov. Bengkulu</p>
                        <div class="mt-3">
                            <p class="text-gray-600 text-sm">
                                <i class="fas fa-phone mr-2"></i>Telp: (0736) 123456
                            </p>
                            <p class="text-gray-600 text-sm">
                                <i class="fas fa-envelope mr-2"></i>Email: ketapangbaru@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prayer Times Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-mosque mr-2 text-blue-600"></i>
                    Jadwal Sholat
                </h3>
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Imsak</span>
                        <span class="font-semibold">04:36</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Shubuh</span>
                        <span class="font-semibold">04:46</span>
                    </div>
                    <div class="flex justify-between items-center bg-blue-50 rounded-lg px-3 py-2 border border-blue-200">
                        <span class="text-blue-700 font-medium">Terbit</span>
                        <span class="font-bold text-blue-700">06:06</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Dzuhur</span>
                        <span class="font-semibold">12:04</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Ashr</span>
                        <span class="font-semibold">15:25</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Maghrib</span>
                        <span class="font-semibold">18:01</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Isya</span>
                        <span class="font-semibold">19:13</span>
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-200">
                    <p class="text-xs text-gray-500">07 Aug 2025 • Lokasi: Desa Ketapang Baru</p>
                </div>
            </div>

            <!-- News Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
                         alt="Berita Desa"
                         class="w-full h-48 object-cover"
                         onerror="this.src='https://ui-avatars.com/api/?name=Berita+Desa&background=1e40af&color=ffffff&size=400x200&bold=true'">
                    <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm rounded-lg px-2 py-1">
                        <span class="text-xs font-medium text-gray-700">8 Juli 2024</span>
                    </div>
                </div>
                <div class="p-6">
                    <h4 class="text-lg font-bold text-gray-900 mb-3">Kegiatan Sosialisasi Smart Village</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Kegiatan sosialisasi dan penerapan teknologi digital kepada warga Desa Ketapang Baru dalam rangka mewujudkan Smart Village yang modern dan terintegrasi.
                    </p>
                    <div class="mt-4 flex justify-center">
                        <div class="flex space-x-1">
                            <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                            <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                            <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                            <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Layanan Unggulan</h2>
            <p class="text-gray-600">Akses layanan desa dengan mudah dan cepat</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow p-4 text-center border border-gray-100">
                <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-envelope text-white"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Surat Online</h3>
                <p class="text-gray-600 text-sm mb-3">Ajukan surat secara online</p>
                <a href="{{ route('surat.online') }}" class="text-blue-600 text-sm font-medium">Pelajari →</a>
            </div>

            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow p-4 text-center border border-gray-100">
                <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-users text-white"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Data Warga</h3>
                <p class="text-gray-600 text-sm mb-3">Informasi data warga</p>
                <a href="{{ route('data.warga') }}" class="text-green-600 text-sm font-medium">Pelajari →</a>
            </div>

            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow p-4 text-center border border-gray-100">
                <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-map text-white"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Peta Desa</h3>
                <p class="text-gray-600 text-sm mb-3">Peta interaktif desa</p>
                <a href="{{ route('peta.desa') }}" class="text-purple-600 text-sm font-medium">Pelajari →</a>
            </div>

            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow p-4 text-center border border-gray-100">
                <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-comment text-white"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Pengaduan</h3>
                <p class="text-gray-600 text-sm mb-3">Sampaikan pengaduan</p>
                <a href="{{ route('pengaduan') }}" class="text-red-600 text-sm font-medium">Pelajari →</a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Statistik Desa</h2>
            <p class="text-gray-600">Data terkini perkembangan desa</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl shadow-md p-6 text-center border border-gray-100">
                <div class="text-3xl font-bold text-blue-600 mb-2">2,500</div>
                <div class="text-gray-600">Total Warga</div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 text-center border border-gray-100">
                <div class="text-3xl font-bold text-green-600 mb-2">8</div>
                <div class="text-gray-600">Dusun</div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 text-center border border-gray-100">
                <div class="text-3xl font-bold text-purple-600 mb-2">250</div>
                <div class="text-gray-600">Hektar</div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 text-center border border-gray-100">
                <div class="text-3xl font-bold text-red-600 mb-2">95%</div>
                <div class="text-gray-600">Literasi</div>
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
