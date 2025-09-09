@extends('layouts.app')

@section('title', 'Struktur Organisasi - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container for Struktur -->
    <div id="particles-struktur" class="absolute inset-0"></div>

    <div class="relative w-full w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content (Centered) -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-sitemap text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">PEMERINTAHAN DESA</h2>
                            <p class="text-sm text-blue-100">Struktur Organisasi</p>
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
                            <i class="fas fa-star mr-2 text-yellow-300 text-xs"></i>
                            Organisasi Profesional
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Struktur organisasi pemerintahan Desa Ketapang Baru yang terdiri dari
                        <span class="font-semibold text-yellow-300">Pemerintah Desa dan Badan Permusyawaratan Desa (BPD)</span>
                    </p>

                    <!-- Key Numbers -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 max-w-4xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">1</div>
                            <div class="text-sm text-blue-100">Kepala Desa</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">6</div>
                            <div class="text-blue-100">Aparatur Desa</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">3</div>
                            <div class="text-sm text-blue-100">Anggota BPD</div>
                        </div>
                    </div>
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

<!-- Organizational Chart Section -->
<section class="py-24 bg-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-org-chart mr-2"></i>
                    Bagan Organisasi Desa
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-slate-800 to-indigo-800 bg-clip-text text-transparent">
                        Pemerintahan Desa
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Struktur organisasi pemerintahan desa</span> yang menjalankan tugas dan fungsi pelayanan kepada
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-indigo-700">masyarakat Ketapang Baru</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-indigo-200 to-purple-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <!-- Organizational Chart -->
        <div class="mb-24" data-aos="fade-up" data-aos-duration="800">
            <div class="bg-gradient-to-br from-gray-50 via-white to-indigo-50 rounded-3xl p-8 lg:p-12 shadow-2xl">
                <!-- Level 1: Kepala Desa -->
                <div class="text-center mb-16">
                    <div class="inline-block bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl p-8 shadow-2xl relative">
                        <!-- Crown decoration -->
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                            <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
                                <i class="fas fa-crown text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="w-24 h-24 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-user-tie text-blue-600 text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3">Kepala Desa</h3>
                        <p class="text-blue-100 font-semibold text-lg mb-1">Zultan Alhara</p>
                        <p class="text-blue-200 text-sm">Periode: 2021 - 2027</p>
                        <div class="mt-4 bg-white/20 rounded-lg px-4 py-2">
                            <p class="text-blue-100 text-sm">Pemimpin tertinggi pemerintahan desa</p>
                        </div>
                    </div>
                </div>

                <!-- Connector Line -->
                <div class="flex justify-center mb-8">
                    <div class="w-px h-12 bg-indigo-300"></div>
                </div>

                <!-- Level 2: Sekretaris Desa -->
                <div class="text-center mb-16">
                    <div class="inline-block bg-white rounded-2xl p-6 shadow-lg border-2 border-green-200 relative">
                        <div class="w-20 h-20 bg-green-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-file-alt text-white text-2xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Sekretaris Desa</h4>
                        <p class="text-green-600 font-semibold text-lg mb-1">Merianto</p>
                        <p class="text-gray-600 text-sm">Koordinator Administrasi & Pemerintahan</p>
                        <div class="mt-3 bg-green-50 rounded-lg px-3 py-2">
                            <p class="text-green-700 text-xs">Pelaksana teknis kebijakan dan administrasi</p>
                        </div>
                    </div>
                </div>

                <!-- Connector Lines to Kaur -->
                <div class="flex justify-center mb-8">
                    <div class="flex flex-col items-center">
                        <div class="w-px h-8 bg-indigo-300"></div>
                        <div class="w-64 h-px bg-indigo-300"></div>
                        <div class="flex justify-between w-64">
                            <div class="w-px h-8 bg-indigo-300"></div>
                            <div class="w-px h-8 bg-indigo-300"></div>
                            <div class="w-px h-8 bg-indigo-300"></div>
                        </div>
                    </div>
                </div>

                <!-- Level 3: Kepala Urusan -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Kaur Keuangan -->
                    <div class="text-center">
                        <div class="bg-white rounded-xl p-6 shadow-md border border-yellow-200 hover:shadow-lg transition-shadow duration-300">
                            <div class="w-16 h-16 bg-yellow-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-md">
                                <i class="fas fa-money-bill text-white text-xl"></i>
                            </div>
                            <h5 class="font-bold text-gray-900 text-lg mb-2">Kaur Keuangan</h5>
                            <p class="text-yellow-600 font-semibold mb-1">Sapta Anike Putri, S.Kep</p>
                            <p class="text-gray-600 text-sm mb-3">Pengelolaan Keuangan Desa</p>
                            <div class="bg-yellow-50 rounded-lg px-3 py-2">
                                <p class="text-yellow-700 text-xs">APBDesa, Pelaporan, Transparansi</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kaur Pembangunan -->
                    <div class="text-center">
                        <div class="bg-white rounded-xl p-6 shadow-md border border-orange-200 hover:shadow-lg transition-shadow duration-300">
                            <div class="w-16 h-16 bg-orange-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-md">
                                <i class="fas fa-hammer text-white text-xl"></i>
                            </div>
                            <h5 class="font-bold text-gray-900 text-lg mb-2">Kaur Umum & Perencanaan</h5>
                            <p class="text-orange-600 font-semibold mb-1">Marlan H</p>
                            <p class="text-gray-600 text-sm mb-3">Umum & Perencanaan Pembangunan</p>
                            <div class="bg-orange-50 rounded-lg px-3 py-2">
                                <p class="text-orange-700 text-xs">Jalan, Gedung, Fasilitas Umum</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kaur Umum -->
                    <div class="text-center">
                        <div class="bg-white rounded-xl p-6 shadow-md border border-teal-200 hover:shadow-lg transition-shadow duration-300">
                            <div class="w-16 h-16 bg-teal-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-md">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                            <h5 class="font-bold text-gray-900 text-lg mb-2">Kasi Pemerintahan</h5>
                            <p class="text-teal-600 font-semibold mb-1">Desmerti MS</p>
                            <p class="text-gray-600 text-sm mb-3">Kepala Seksi Pemerintahan</p>
                            <div class="bg-teal-50 rounded-lg px-3 py-2">
                                <p class="text-teal-700 text-xs">Surat-menyurat, Data Warga</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kasi Kesejahteraan -->
                    <div class="text-center">
                        <div class="bg-white rounded-xl p-6 shadow-md border border-purple-200 hover:shadow-lg transition-shadow duration-300">
                            <div class="w-16 h-16 bg-purple-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-md">
                                <i class="fas fa-heart text-white text-xl"></i>
                            </div>
                            <h5 class="font-bold text-gray-900 text-lg mb-2">Kasi Kesejahteraan</h5>
                            <p class="text-purple-600 font-semibold mb-1">Rozi Nopriadi</p>
                            <p class="text-gray-600 text-sm mb-3">Kepala Seksi Kesejahteraan</p>
                            <div class="bg-purple-50 rounded-lg px-3 py-2">
                                <p class="text-purple-700 text-xs">Sosial, Kesehatan, Pendidikan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Connector Lines from Kepala Desa to Kepala Dusun -->
                <div class="flex justify-center mt-16 mb-8">
                    <div class="flex flex-col items-center">
                        <div class="w-px h-16 bg-blue-300"></div>
                        <div class="w-80 h-px bg-blue-300"></div>
                        <div class="flex justify-between w-80">
                            <div class="w-px h-12 bg-blue-300"></div>
                            <div class="w-px h-12 bg-blue-300"></div>
                            <div class="w-px h-12 bg-blue-300"></div>
                        </div>
                    </div>
                </div>

                <!-- Level 4: Kepala Dusun -->
                <div class="mt-0">
                    <h3 class="text-2xl font-bold text-gray-900 text-center mb-8">Kepala Dusun</h3>
                    <p class="text-center text-gray-600 mb-8 text-sm italic">Langsung dibawah Kepala Desa</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Kadun 1 -->
                        <div class="text-center">
                            <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl p-6 text-white shadow-md hover:shadow-lg transition-shadow duration-300">
                                <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-map-marker-alt text-white text-lg"></i>
                                </div>
                                <h5 class="font-bold text-lg mb-2">Kadun 1</h5>
                                <p class="text-emerald-100 font-semibold mb-1">Ajasseriani</p>
                                <p class="text-emerald-200 text-sm">Kepala Dusun 1</p>
                            </div>
                        </div>

                        <!-- Kadun 2 -->
                        <div class="text-center">
                            <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl p-6 text-white shadow-md hover:shadow-lg transition-shadow duration-300">
                                <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-map-marker-alt text-white text-lg"></i>
                                </div>
                                <h5 class="font-bold text-lg mb-2">Kadun 2</h5>
                                <p class="text-cyan-100 font-semibold mb-1">Meri Kusnidi</p>
                                <p class="text-cyan-200 text-sm">Kepala Dusun 2</p>
                            </div>
                        </div>

                        <!-- Kadun 3 -->
                        <div class="text-center">
                            <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl p-6 text-white shadow-md hover:shadow-lg transition-shadow duration-300">
                                <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-map-marker-alt text-white text-lg"></i>
                                </div>
                                <h5 class="font-bold text-lg mb-2">Kadun 3</h5>
                                <p class="text-indigo-100 font-semibold mb-1">Basri</p>
                                <p class="text-indigo-200 text-sm">Kepala Dusun 3</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BPD Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-white to-purple-50">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center bg-purple-50 rounded-full px-6 py-3 mb-6">
                <i class="fas fa-balance-scale text-purple-600 mr-3"></i>
                <span class="text-purple-800 font-semibold">Badan Permusyawaratan Desa</span>
            </div>
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 mb-8">
                Badan <span class="text-purple-600">Permusyawaratan</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                BPD berperan sebagai mitra kerja pemerintah desa dalam menampung dan menyalurkan aspirasi masyarakat serta mengawasan kinerja kepala desa
            </p>
        </div>

        <!-- BPD Members -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Ketua BPD -->
            <div class="group bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-8 text-white shadow-2xl hover:shadow-3xl hover:scale-105 transition-all duration-300 relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-white rounded-full -translate-y-12 translate-x-12"></div>
                </div>

                <div class="relative z-10">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-user-tie text-white text-2xl"></i>
                    </div>
                    <div class="mb-4">
                        <div class="text-purple-200 font-bold text-sm mb-1">KETUA BPD</div>
                        <h4 class="text-2xl font-bold mb-2">Bahirman</h4>
                        <p class="text-purple-100 text-sm mb-3">Periode: 2021 - 2027</p>
                    </div>
                    <div class="space-y-2 text-sm">
                        <div class="flex items-center">
                            <i class="fas fa-gavel text-purple-200 mr-2"></i>
                            <span class="text-purple-100">Memimpin rapat BPD</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-eye text-purple-200 mr-2"></i>
                            <span class="text-purple-100">Pengawasan kinerja</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-handshake text-purple-200 mr-2"></i>
                            <span class="text-purple-100">Mitra pemerintah desa</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wakil Ketua -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg border border-indigo-200 hover:shadow-2xl hover:scale-105 transition-all duration-300">
                <div class="w-20 h-20 bg-indigo-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <i class="fas fa-user-friends text-white text-2xl"></i>
                </div>
                <div class="mb-4">
                    <div class="text-indigo-600 font-bold text-sm mb-1">WAKIL KETUA</div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-2">Halintarman</h4>
                    <p class="text-gray-600 text-sm mb-3">Wakil & Koordinator</p>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-users text-indigo-500 mr-2"></i>
                        <span class="text-gray-600">Koordinasi anggota</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-microphone text-indigo-500 mr-2"></i>
                        <span class="text-gray-600">Penyalur aspirasi</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-clipboard-list text-indigo-500 mr-2"></i>
                        <span class="text-gray-600">Evaluasi program</span>
                    </div>
                </div>
            </div>

            <!-- Sekretaris BPD -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg border border-green-200 hover:shadow-2xl hover:scale-105 transition-all duration-300">
                <div class="w-20 h-20 bg-green-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <i class="fas fa-edit text-white text-2xl"></i>
                </div>
                <div class="mb-4">
                    <div class="text-green-600 font-bold text-sm mb-1">SEKRETARIS</div>
                    <h4 class="text-2xl font-bold text-gray-900 mb-2">Kebat S</h4>
                    <p class="text-gray-600 text-sm mb-3">Administrasi BPD</p>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex items-center">
                        <i class="fas fa-file-alt text-green-500 mr-2"></i>
                        <span class="text-gray-600">Dokumentasi rapat</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-archive text-green-500 mr-2"></i>
                        <span class="text-gray-600">Arsip dan surat</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-chart-bar text-green-500 mr-2"></i>
                        <span class="text-gray-600">Laporan kegiatan</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional BPD Members -->
        <div class="mb-16" data-aos="fade-up" data-aos-duration="800">
            <h3 class="text-2xl font-bold text-gray-900 text-center mb-8">Anggota BPD</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Anggota 1 -->
                <div class="bg-gradient-to-br from-slate-500 to-slate-600 rounded-xl p-6 text-white text-center shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user text-white text-lg"></i>
                    </div>
                    <h5 class="font-bold text-lg mb-2">Anggota</h5>
                    <p class="text-slate-100 font-semibold mb-1">Susti</p>
                    <p class="text-slate-200 text-sm">Anggota BPD</p>
                </div>

                <!-- Anggota 2 -->
                <div class="bg-gradient-to-br from-slate-500 to-slate-600 rounded-xl p-6 text-white text-center shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user text-white text-lg"></i>
                    </div>
                    <h5 class="font-bold text-lg mb-2">Anggota</h5>
                    <p class="text-slate-100 font-semibold mb-1">Dhesty C</p>
                    <p class="text-slate-200 text-sm">Anggota BPD</p>
                </div>

                <!-- Anggota 3 -->
                <div class="bg-gradient-to-br from-slate-500 to-slate-600 rounded-xl p-6 text-white text-center shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user text-white text-lg"></i>
                    </div>
                    <h5 class="font-bold text-lg mb-2">Anggota</h5>
                    <p class="text-slate-100 font-semibold mb-1">Anggota</p>
                    <p class="text-slate-200 text-sm">Anggota BPD</p>
                </div>

                <!-- Anggota 4 -->
                <div class="bg-gradient-to-br from-slate-500 to-slate-600 rounded-xl p-6 text-white text-center shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user text-white text-lg"></i>
                    </div>
                    <h5 class="font-bold text-lg mb-2">Anggota</h5>
                    <p class="text-slate-100 font-semibold mb-1">Anggota</p>
                    <p class="text-slate-200 text-sm">Anggota BPD</p>
                </div>
            </div>
        </div>

        <!-- BPD Functions -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center" data-aos="fade-up" data-aos-duration="800">
            <!-- Functions Content -->
            <div class="space-y-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Fungsi & Tugas BPD</h3>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Badan Permusyawaratan Desa memiliki peran strategis dalam penyelenggaraan pemerintahan desa yang demokratis dan partisipatif.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Fungsi Legislasi</h4>
                                <p class="text-gray-600 text-sm">Membahas dan menyepakati rancangan peraturan desa bersama kepala desa</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Fungsi Pengawasan</h4>
                                <p class="text-gray-600 text-sm">Melakukan pengawasan terhadap pelaksanaan peraturan desa dan APBDesa</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Fungsi Penyaluran Aspirasi</h4>
                                <p class="text-gray-600 text-sm">Menampung dan menyalurkan aspirasi masyarakat kepada pemerintah desa</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Fungsi Pemberdayaan</h4>
                                <p class="text-gray-600 text-sm">Memberdayakan masyarakat untuk berpartisipasi dalam pembangunan desa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Illustration -->
            <div class="relative">
                <div class="bg-gradient-to-br from-purple-50 via-indigo-50 to-blue-50 rounded-3xl p-8 shadow-2xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Alur Kerja BPD</h3>

                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-sm">1</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Penjaringan Aspirasi</h4>
                                <p class="text-gray-600 text-sm">Menampung aspirasi dari masyarakat desa</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-sm">2</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Pembahasan Internal</h4>
                                <p class="text-gray-600 text-sm">Diskusi dan evaluasi dalam rapat BPD</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-sm">3</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Koordinasi dengan Pemdes</h4>
                                <p class="text-gray-600 text-sm">Koordinasi dengan pemerintah desa</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-sm">4</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Pengawasan & Evaluasi</h4>
                                <p class="text-gray-600 text-sm">Monitoring pelaksanaan program</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- CTA Section -->
<section class="py-24 bg-gradient-to-br from-indigo-600 via-purple-700 to-blue-800 text-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-4xl lg:text-5xl font-black mb-8">Bersama Membangun <span class="text-yellow-400">Pemerintahan</span> Amanah</h2>
            <p class="text-xl text-indigo-100 mb-8 leading-relaxed">
                Struktur organisasi yang solid dan transparan adalah kunci pelayanan yang berkualitas.
                Mari berpartisipasi dalam pengawasan dan dukungan terhadap pemerintahan desa.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('tentang') }}" class="btn-accent text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-home mr-2"></i>Profil Desa
                </a>
                <a href="{{ route('visi.misi') }}" class="btn-secondary text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-bullseye mr-2"></i>Visi & Misi
                </a>
                <a href="{{ route('kontak') }}" class="btn-secondary text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fab fa-whatsapp mr-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
/* Button Styles */
.btn-accent {
    @apply bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 hover:from-yellow-500 hover:via-orange-600 hover:to-red-600 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-yellow-500/25;
}

.btn-secondary {
    @apply bg-white/15 hover:bg-white/25 backdrop-blur-md border-2 border-white/30 hover:border-white/50 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105;
}

/* Animation */
.animate-hover-bounce {
    @apply hover:animate-pulse;
}
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Initialize Particles.js for Struktur page - ENHANCED VISIBILITY
    if (document.getElementById('particles-struktur')) {
        particlesJS('particles-struktur', {
            particles: {
                number: {
                    value: 50,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#ffffff'
                },
                shape: {
                    type: 'circle',
                    stroke: {
                        width: 0,
                        color: '#000000'
                    }
                },
                opacity: {
                    value: 0.2,
                    random: false,
                    anim: {
                        enable: false,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 3,
                    random: true,
                    anim: {
                        enable: false,
                        speed: 40,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.15,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'repulse'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 1
                        }
                    },
                    bubble: {
                        distance: 400,
                        size: 40,
                        duration: 2,
                        opacity: 8,
                        speed: 3
                    },
                    repulse: {
                        distance: 200,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 4
                    },
                    remove: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: true
        });
    }
});
</script>
@endpush
