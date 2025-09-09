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

        <!-- Government Organizational Chart -->
        <div class="bg-white rounded-3xl p-8 shadow-2xl border border-gray-100 mb-24" data-aos="fade-up" data-aos-duration="800">
            <div class="relative overflow-x-auto">
                <!-- Organizational Chart Container -->
                <div class="min-w-[900px] relative">
                <!-- Level 1: Kepala Desa -->
                <div class="text-center mb-16">
                                        <div class="inline-block bg-white rounded-xl p-6 shadow-lg border-2 border-blue-300 hover:shadow-2xl hover:border-blue-400 transition-all duration-300 relative">
                        <!-- Crown badge untuk menunjukkan special -->
                        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                            <div class="w-8 h-8 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center shadow-lg border-2 border-white">
                                <i class="fas fa-crown text-white text-xs"></i>
                            </div>
                        </div>

                        <!-- Foto sama seperti yang lain tapi dengan border lebih tebal -->
                        <div class="w-20 h-20 bg-blue-500 rounded-xl border-4 border-blue-400 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                            <img src="{{ asset('images/struktur/zultan.jpg') }}"
                                 alt="Zultan Alhara"
                                 class="w-full h-full object-cover"
                                 onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                            <i class="fas fa-user-tie text-white text-xl hidden"></i>
                        </div>

                        <!-- Title dengan sedikit highlight -->
                        <h4 class="font-bold text-gray-900 text-lg mb-2">👑 Kepala Desa</h4>
                        <p class="text-blue-600 font-bold mb-1">Zultan Alhara</p>
                        <p class="text-gray-600 text-sm mb-3">Pemimpin Pemerintahan Desa</p>

                        <!-- Info box dengan warna khusus -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg px-3 py-2 border border-blue-200">
                            <p class="text-blue-700 text-xs font-semibold">Periode: 2021-2027 • Desa Mandiri</p>
                        </div>
                    </div>
                </div>

                <!-- Connector Line -->
                <div class="flex justify-center mb-8">
                    <div class="w-1 h-12 bg-gray-600"></div>
                </div>

                <!-- Level 2: Sekretaris Desa -->
                <div class="text-center mb-16">
                    <div class="inline-block bg-white rounded-xl p-6 shadow-md border border-green-200 hover:shadow-lg transition-shadow duration-300">
                        <div class="w-20 h-20 bg-green-500 rounded-xl border-2 border-green-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                            <img src="{{ asset('images/struktur/merianto.jpg') }}"
                                 alt="Merianto"
                                 class="w-full h-full object-cover"
                                 onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                            <i class="fas fa-file-alt text-white text-xl hidden"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 text-lg mb-2">Sekretaris Desa</h4>
                        <p class="text-green-600 font-semibold mb-1">Merianto</p>
                        <p class="text-gray-600 text-sm mb-3">Koordinator Administrasi</p>
                        <div class="bg-green-50 rounded-lg px-3 py-2">
                            <p class="text-green-700 text-xs">Administrasi, Dokumentasi, Arsip</p>
                        </div>
                    </div>
                </div>

                <!-- Connector Lines to Kaur -->
                <div class="flex justify-center mb-8">
                    <div class="flex flex-col items-center">
                        <div class="w-1 h-8 bg-gray-600"></div>
                        <div class="w-96 h-1 bg-gray-600"></div>
                        <div class="flex justify-between w-96">
                            <div class="w-1 h-8 bg-gray-600"></div>
                            <div class="w-1 h-8 bg-gray-600"></div>
                            <div class="w-1 h-8 bg-gray-600"></div>
                            <div class="w-1 h-8 bg-gray-600"></div>
                        </div>
                    </div>
                </div>

                <!-- Level 3: Kepala Urusan -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Kaur Keuangan -->
                    <div class="text-center">
                        <div class="bg-white rounded-xl p-6 shadow-md border border-yellow-200 hover:shadow-lg transition-shadow duration-300">
                            <div class="w-20 h-20 bg-yellow-500 rounded-xl border-2 border-yellow-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                <img src="{{ asset('images/struktur/sapta.jpg') }}"
                                     alt="Sapta Anike Putri"
                                     class="w-full h-full object-cover"
                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                <i class="fas fa-money-bill text-white text-xl hidden"></i>
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
                            <div class="w-20 h-20 bg-orange-500 rounded-xl border-2 border-orange-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                <img src="{{ asset('images/struktur/marlan.jpg') }}"
                                     alt="Marlan H"
                                     class="w-full h-full object-cover"
                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                <i class="fas fa-hammer text-white text-xl hidden"></i>
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
                            <div class="w-20 h-20 bg-teal-500 rounded-xl border-2 border-teal-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                <img src="{{ asset('images/struktur/desmerti.jpg') }}"
                                     alt="Desmerti MS"
                                     class="w-full h-full object-cover"
                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                <i class="fas fa-users text-white text-xl hidden"></i>
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
                            <div class="w-20 h-20 bg-purple-500 rounded-xl border-2 border-purple-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                <img src="{{ asset('images/struktur/rozi.jpg') }}"
                                     alt="Rozi Nopriadi"
                                     class="w-full h-full object-cover"
                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                <i class="fas fa-heart text-white text-xl hidden"></i>
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
                        <div class="w-1 h-16 bg-blue-500"></div>
                        <div class="w-80 h-1 bg-blue-500"></div>
                        <div class="flex justify-between w-80">
                            <div class="w-1 h-12 bg-blue-500"></div>
                            <div class="w-1 h-12 bg-blue-500"></div>
                            <div class="w-1 h-12 bg-blue-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Level 4: Kepala Dusun -->
                <div class="mt-0">
                    <h3 class="text-2xl font-bold text-gray-900 text-center mb-8">Kepala Dusun</h3>
                    <p class="text-center text-gray-600 mb-8 text-sm italic">Langsung dibawah Kepala Desa</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                                <!-- Kadun 1 -->
                        <div class="text-center">
                            <div class="bg-white rounded-xl p-6 shadow-md border border-emerald-200 hover:shadow-lg transition-shadow duration-300">
                                <div class="w-20 h-20 bg-emerald-500 rounded-xl border-2 border-emerald-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                    <img src="{{ asset('images/struktur/ajasseriani.jpg') }}"
                                         alt="Ajasseriani"
                                         class="w-full h-full object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                    <i class="fas fa-map-marker-alt text-white text-xl hidden"></i>
                                </div>
                                <h5 class="font-bold text-gray-900 text-lg mb-2">Kepala Dusun 1</h5>
                                <p class="text-emerald-600 font-semibold mb-1">Ajasseriani</p>
                                <p class="text-gray-600 text-sm mb-3">Kepala Dusun 1</p>
                                <div class="bg-emerald-50 rounded-lg px-3 py-2">
                                    <p class="text-emerald-700 text-xs">Koordinasi, Pembinaan Wilayah</p>
                                </div>
                            </div>
                        </div>

                                                                        <!-- Kadun 2 -->
                        <div class="text-center">
                            <div class="bg-white rounded-xl p-6 shadow-md border border-cyan-200 hover:shadow-lg transition-shadow duration-300">
                                <div class="w-20 h-20 bg-cyan-500 rounded-xl border-2 border-cyan-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                    <img src="{{ asset('images/struktur/meri.jpg') }}"
                                         alt="Meri Kusnidi"
                                         class="w-full h-full object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                    <i class="fas fa-map-marker-alt text-white text-xl hidden"></i>
                                </div>
                                <h5 class="font-bold text-gray-900 text-lg mb-2">Kepala Dusun 2</h5>
                                <p class="text-cyan-600 font-semibold mb-1">Meri Kusnidi</p>
                                <p class="text-gray-600 text-sm mb-3">Kepala Dusun 2</p>
                                <div class="bg-cyan-50 rounded-lg px-3 py-2">
                                    <p class="text-cyan-700 text-xs">Koordinasi, Pembinaan Wilayah</p>
                                </div>
                            </div>
                        </div>

                                                                        <!-- Kadun 3 -->
                        <div class="text-center">
                            <div class="bg-white rounded-xl p-6 shadow-md border border-indigo-200 hover:shadow-lg transition-shadow duration-300">
                                <div class="w-20 h-20 bg-indigo-500 rounded-xl border-2 border-indigo-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                    <img src="{{ asset('images/struktur/basri.jpg') }}"
                                         alt="Basri"
                                         class="w-full h-full object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                    <i class="fas fa-map-marker-alt text-white text-xl hidden"></i>
                                </div>
                                <h5 class="font-bold text-gray-900 text-lg mb-2">Kepala Dusun 3</h5>
                                <p class="text-indigo-600 font-semibold mb-1">Basri</p>
                                <p class="text-gray-600 text-sm mb-3">Kepala Dusun 3</p>
                                <div class="bg-indigo-50 rounded-lg px-3 py-2">
                                    <p class="text-indigo-700 text-xs">Koordinasi, Pembinaan Wilayah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Connector Lines from Kepala Desa to BPD -->
                <div class="flex justify-center mt-16 mb-8">
                    <div class="flex flex-col items-center">
                        <div class="w-1 h-16 bg-purple-500"></div>
                        <div class="bg-purple-100 rounded-full px-4 py-2 mb-4">
                            <span class="text-purple-700 text-sm font-semibold">Mitra Kerja & Pengawasan</span>
                        </div>
                        <div class="w-1 h-8 bg-purple-500"></div>
                    </div>
                </div>

                <!-- Level 5: BPD (Badan Permusyawaratan Desa) -->
                <div class="mt-0">
                    <h3 class="text-2xl font-bold text-gray-900 text-center mb-8">Badan Permusyawaratan Desa (BPD)</h3>
                    <p class="text-center text-gray-600 mb-8 text-sm italic">Mitra Kerja Kepala Desa dalam Pengawasan dan Legislasi</p>

                    <!-- BPD Organizational Chart -->
                    <div class="bg-white rounded-3xl p-8 shadow-2xl border border-gray-100 mb-16" data-aos="fade-up" data-aos-duration="800">
                        <div class="relative overflow-x-auto">
                            <!-- Organizational Chart Container -->
                            <div class="min-w-[600px] relative">

                                <!-- Level 1: Ketua BPD -->
                                <div class="flex justify-center mb-8">
                                    <div class="relative">
                                        <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-purple-300 hover:shadow-2xl hover:border-purple-400 transition-all duration-300 relative">
                                            <!-- Crown badge untuk menunjukkan special -->
                                            <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                                                <div class="w-8 h-8 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center shadow-lg border-2 border-white">
                                                    <i class="fas fa-crown text-white text-xs"></i>
                                                </div>
                                            </div>

                                            <!-- Foto sama seperti yang lain tapi dengan border lebih tebal -->
                                            <div class="w-20 h-20 bg-purple-500 rounded-xl border-4 border-purple-400 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                                <img src="{{ asset('images/struktur/bahirman.jpg') }}"
                                                     alt="Bahirman"
                                                     class="w-full h-full object-cover"
                                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                                <i class="fas fa-crown text-white text-xl hidden"></i>
                                            </div>

                                            <!-- Title dengan sedikit highlight -->
                                            <h5 class="font-bold text-gray-900 text-lg mb-2">👑 Ketua BPD</h5>
                                            <p class="text-purple-600 font-bold mb-1">Bahirman</p>
                                            <p class="text-gray-600 text-sm mb-3">Ketua BPD</p>

                                            <!-- Info box dengan warna khusus -->
                                            <div class="bg-gradient-to-r from-purple-50 to-indigo-50 rounded-lg px-3 py-2 border border-purple-200">
                                                <p class="text-purple-700 text-xs font-semibold">Periode: 2021-2027 • Pengawasan</p>
                                            </div>
                                        </div>
                                        <!-- Vertical line down from Ketua -->
                                        <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-8 bg-gray-600"></div>
                                    </div>
                                </div>

                                <!-- Horizontal line connecting to Wakil and Sekretaris -->
                                <div class="flex justify-center mb-8">
                                    <div class="w-96 h-1 bg-gray-600 relative">
                                        <!-- Vertical lines to Wakil and Sekretaris -->
                                        <div class="absolute left-1/4 top-0 w-1 h-8 bg-gray-600 transform -translate-x-1/2"></div>
                                        <div class="absolute right-1/4 top-0 w-1 h-8 bg-gray-600 transform translate-x-1/2"></div>
                                    </div>
                                </div>

                                <!-- Level 2: Wakil Ketua & Sekretaris -->
                                <div class="flex justify-center gap-32 mb-12">
                                    <!-- Wakil Ketua -->
                                    <div class="relative">
                                        <div class="bg-white rounded-xl p-6 shadow-md border border-indigo-200 hover:shadow-lg transition-shadow duration-300">
                                            <div class="w-20 h-20 bg-indigo-500 rounded-xl border-2 border-indigo-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                                <img src="{{ asset('images/struktur/halintarman.jpg') }}"
                                                     alt="Halintarman"
                                                     class="w-full h-full object-cover"
                                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                                <i class="fas fa-user-friends text-white text-xl hidden"></i>
                                            </div>
                                            <h5 class="font-bold text-gray-900 text-lg mb-2">Wakil Ketua BPD</h5>
                                            <p class="text-indigo-600 font-semibold mb-1">Halintarman</p>
                                            <p class="text-gray-600 text-sm mb-3">Wakil Ketua BPD</p>
                                            <div class="bg-indigo-50 rounded-lg px-3 py-2">
                                                <p class="text-indigo-700 text-xs">Koordinasi, Pengawasan</p>
                                            </div>
                                        </div>
                                        <!-- Vertical line down from Wakil -->
                                        <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-8 bg-gray-600"></div>
                                    </div>

                                    <!-- Sekretaris -->
                                    <div class="relative">
                                        <div class="bg-white rounded-xl p-6 shadow-md border border-emerald-200 hover:shadow-lg transition-shadow duration-300">
                                            <div class="w-20 h-20 bg-emerald-500 rounded-xl border-2 border-emerald-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                                <img src="{{ asset('images/struktur/kebat.jpg') }}"
                                                     alt="Kebat S"
                                                     class="w-full h-full object-cover"
                                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                                <i class="fas fa-edit text-white text-xl hidden"></i>
                                            </div>
                                            <h5 class="font-bold text-gray-900 text-lg mb-2">Sekretaris BPD</h5>
                                            <p class="text-emerald-600 font-semibold mb-1">Kebat S</p>
                                            <p class="text-gray-600 text-sm mb-3">Sekretaris BPD</p>
                                            <div class="bg-emerald-50 rounded-lg px-3 py-2">
                                                <p class="text-emerald-700 text-xs">Dokumentasi, Notulensi</p>
                                            </div>
                                        </div>
                                        <!-- Vertical line down from Sekretaris -->
                                        <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-8 bg-gray-600"></div>
                                    </div>
                                </div>

                                <!-- Horizontal line connecting to Anggota -->
                                <div class="flex justify-center mb-8">
                                    <div class="w-[400px] h-1 bg-gray-600 relative">
                                        <!-- Vertical lines to each Anggota -->
                                        <div class="absolute left-[25%] top-0 w-1 h-8 bg-gray-600 transform -translate-x-1/2"></div>
                                        <div class="absolute left-[75%] top-0 w-1 h-8 bg-gray-600 transform -translate-x-1/2"></div>
                                    </div>
                                </div>

                                <!-- Level 3: Anggota BPD -->
                                <div class="flex justify-center gap-12">
                                    <!-- Anggota 1 -->
                                    <div class="bg-white rounded-xl p-4 text-center shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 min-w-[160px] h-[280px] relative overflow-hidden">
                                        <!-- Background decoration -->
                                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-slate-400 to-slate-500"></div>
                                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-slate-100 rounded-full opacity-30"></div>

                                        <div class="w-20 h-20 bg-gradient-to-br from-slate-100 to-slate-200 rounded-xl flex items-center justify-center mx-auto mb-3 overflow-hidden border-2 border-slate-200 shadow">
                                            <img src="{{ asset('images/struktur/susti.jpg') }}"
                                                 alt="Susti"
                                                 class="w-full h-full object-cover"
                                                 onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                            <i class="fas fa-user text-slate-600 text-sm hidden"></i>
                                        </div>

                                        <div class="mb-2">
                                            <div class="inline-flex items-center justify-center bg-slate-100 rounded-full px-2 py-1 mb-2">
                                                <span class="text-slate-700 text-xs font-bold">ANGGOTA</span>
                                            </div>
                                            <h5 class="text-sm font-bold text-gray-900 mb-1">Susti</h5>
                                            <p class="text-gray-600 text-xs">Anggota BPD</p>
                                        </div>
                                    </div>

                                    <!-- Anggota 2 -->
                                    <div class="bg-white rounded-xl p-4 text-center shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 min-w-[160px] h-[280px] relative overflow-hidden">
                                        <!-- Background decoration -->
                                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-slate-400 to-slate-500"></div>
                                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-slate-100 rounded-full opacity-30"></div>

                                        <div class="w-20 h-20 bg-gradient-to-br from-slate-100 to-slate-200 rounded-xl flex items-center justify-center mx-auto mb-3 overflow-hidden border-2 border-slate-200 shadow">
                                            <img src="{{ asset('images/struktur/dhesty.jpg') }}"
                                                 alt="Dhesty C"
                                                 class="w-full h-full object-cover"
                                                 onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                            <i class="fas fa-user text-slate-600 text-sm hidden"></i>
                                        </div>

                                        <div class="mb-2">
                                            <div class="inline-flex items-center justify-center bg-slate-100 rounded-full px-2 py-1 mb-2">
                                                <span class="text-slate-700 text-xs font-bold">ANGGOTA</span>
                                            </div>
                                            <h5 class="text-sm font-bold text-gray-900 mb-1">Dhesty C</h5>
                                            <p class="text-gray-600 text-xs">Anggota BPD</p>
                                        </div>
                                    </div>
                                </div>
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

        <!-- Connector from Kepala Desa to BPD -->
        <div class="flex justify-center mb-12" data-aos="fade-up" data-aos-duration="600">
            <div class="flex flex-col items-center">
                <div class="bg-blue-100 rounded-full px-4 py-2 mb-4">
                    <span class="text-blue-700 text-sm font-semibold">Hubungan Koordinatif</span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-500 text-white px-3 py-1 rounded-lg text-xs font-medium">
                        Kepala Desa
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-px bg-purple-400"></div>
                        <i class="fas fa-exchange-alt text-purple-500 mx-2"></i>
                        <div class="w-8 h-px bg-purple-400"></div>
                    </div>
                    <div class="bg-purple-500 text-white px-3 py-1 rounded-lg text-xs font-medium">
                        BPD
                    </div>
                </div>
                <div class="mt-2 text-center">
                    <p class="text-xs text-gray-600">Mitra Kerja & Pengawasan</p>
                </div>
            </div>
        </div>

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

        <!-- BPD Organizational Chart -->
        <div class="bg-white rounded-3xl p-8 shadow-2xl border border-gray-100 mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="relative overflow-x-auto">
                <!-- Organizational Chart Container -->
                <div class="min-w-[800px] relative">

                    <!-- Level 1: Ketua BPD -->
                    <div class="flex justify-center mb-12">
                        <div class="relative">
                                                        <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-purple-300 hover:shadow-2xl hover:border-purple-400 transition-all duration-300 relative">
                                <!-- Crown badge untuk menunjukkan special -->
                                <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center shadow-lg border-2 border-white">
                                        <i class="fas fa-crown text-white text-xs"></i>
                                    </div>
                                </div>

                                <!-- Foto sama seperti yang lain tapi dengan border lebih tebal -->
                                <div class="w-20 h-20 bg-purple-500 rounded-xl border-4 border-purple-400 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                    <img src="{{ asset('images/struktur/bahirman.jpg') }}"
                                         alt="Bahirman"
                                         class="w-full h-full object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'; this.onerror=null;">
                                    <i class="fas fa-crown text-white text-xl hidden"></i>
                                </div>

                                <!-- Title dengan sedikit highlight -->
                                <h5 class="font-bold text-gray-900 text-lg mb-2">👑 Ketua BPD</h5>
                                <p class="text-purple-600 font-bold mb-1">Bahirman</p>
                                <p class="text-gray-600 text-sm mb-3">Ketua BPD</p>

                                <!-- Info box dengan warna khusus -->
                                <div class="bg-gradient-to-r from-purple-50 to-indigo-50 rounded-lg px-3 py-2 border border-purple-200">
                                    <p class="text-purple-700 text-xs font-semibold">Periode: 2021-2027 • Pengawasan</p>
                                </div>
                            </div>
                            <!-- Vertical line down from Ketua -->
                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-8 bg-gray-600"></div>
                        </div>
                    </div>

                    <!-- Horizontal line connecting to Wakil and Sekretaris -->
                    <div class="flex justify-center mb-8">
                        <div class="w-96 h-1 bg-gray-600 relative">
                            <!-- Vertical lines to Wakil and Sekretaris -->
                            <div class="absolute left-1/4 top-0 w-1 h-8 bg-gray-600 transform -translate-x-1/2"></div>
                            <div class="absolute right-1/4 top-0 w-1 h-8 bg-gray-600 transform translate-x-1/2"></div>
                        </div>
                    </div>

                    <!-- Level 2: Wakil Ketua & Sekretaris -->
                    <div class="flex justify-center gap-32 mb-12">
                        <!-- Wakil Ketua -->
                        <div class="relative">
                                                        <div class="bg-white rounded-xl p-6 shadow-md border border-indigo-200 hover:shadow-lg transition-shadow duration-300">
                                <div class="w-20 h-20 bg-indigo-500 rounded-xl border-2 border-indigo-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                    <img src="{{ asset('images/struktur/halintarman.jpg') }}"
                                         alt="Halintarman"
                                         class="w-full h-full object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                    <i class="fas fa-user-friends text-white text-xl hidden"></i>
                                </div>
                                <h5 class="font-bold text-gray-900 text-lg mb-2">Wakil Ketua BPD</h5>
                                <p class="text-indigo-600 font-semibold mb-1">Halintarman</p>
                                <p class="text-gray-600 text-sm mb-3">Wakil Ketua BPD</p>
                                <div class="bg-indigo-50 rounded-lg px-3 py-2">
                                    <p class="text-indigo-700 text-xs">Koordinasi, Pengawasan</p>
                                </div>
                            </div>
                            <!-- Vertical line down from Wakil -->
                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-8 bg-gray-600"></div>
                        </div>

                        <!-- Sekretaris -->
                        <div class="relative">
                                                                                    <div class="bg-white rounded-xl p-6 shadow-md border border-emerald-200 hover:shadow-lg transition-shadow duration-300">
                                <div class="w-20 h-20 bg-emerald-500 rounded-xl border-2 border-emerald-300 flex items-center justify-center mx-auto mb-4 shadow-md overflow-hidden">
                                    <img src="{{ asset('images/struktur/kebat.jpg') }}"
                                         alt="Kebat S"
                                         class="w-full h-full object-cover"
                                         onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                    <i class="fas fa-edit text-white text-xl hidden"></i>
                                </div>
                                <h5 class="font-bold text-gray-900 text-lg mb-2">Sekretaris BPD</h5>
                                <p class="text-emerald-600 font-semibold mb-1">Kebat S</p>
                                <p class="text-gray-600 text-sm mb-3">Sekretaris BPD</p>
                                <div class="bg-emerald-50 rounded-lg px-3 py-2">
                                    <p class="text-emerald-700 text-xs">Dokumentasi, Notulensi</p>
                                </div>
                            </div>
                            <!-- Vertical line down from Sekretaris -->
                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-1 h-8 bg-gray-600"></div>
                        </div>
                    </div>

                    <!-- Horizontal line connecting to Anggota -->
                    <div class="flex justify-center mb-8">
                        <div class="w-[400px] h-1 bg-gray-600 relative">
                            <!-- Vertical lines to each Anggota -->
                            <div class="absolute left-[25%] top-0 w-1 h-8 bg-gray-600 transform -translate-x-1/2"></div>
                            <div class="absolute left-[75%] top-0 w-1 h-8 bg-gray-600 transform -translate-x-1/2"></div>
                        </div>
                    </div>

                    <!-- Level 3: Anggota BPD -->
                    <div class="flex justify-center gap-12">
                                                <!-- Anggota 1 -->
                        <div class="bg-white rounded-xl p-4 text-center shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 min-w-[160px] h-[280px] relative overflow-hidden">
                            <!-- Background decoration -->
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-slate-400 to-slate-500"></div>
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-slate-100 rounded-full opacity-30"></div>

                            <div class="w-20 h-20 bg-gradient-to-br from-slate-100 to-slate-200 rounded-xl flex items-center justify-center mx-auto mb-3 overflow-hidden border-2 border-slate-200 shadow">
                                <img src="{{ asset('images/struktur/susti.jpg') }}"
                                     alt="Susti"
                                     class="w-full h-full object-cover"
                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                <i class="fas fa-user text-slate-600 text-sm hidden"></i>
                            </div>

                            <div class="mb-2">
                                <div class="inline-flex items-center justify-center bg-slate-100 rounded-full px-2 py-1 mb-2">
                                    <span class="text-slate-700 text-xs font-bold">ANGGOTA</span>
                                </div>
                                <h5 class="text-sm font-bold text-gray-900 mb-1">Susti</h5>
                                <p class="text-gray-600 text-xs">Anggota BPD</p>
                            </div>
                        </div>

                                                <!-- Anggota 2 -->
                        <div class="bg-white rounded-xl p-4 text-center shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 min-w-[160px] h-[280px] relative overflow-hidden">
                            <!-- Background decoration -->
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-slate-400 to-slate-500"></div>
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-slate-100 rounded-full opacity-30"></div>

                            <div class="w-20 h-20 bg-gradient-to-br from-slate-100 to-slate-200 rounded-xl flex items-center justify-center mx-auto mb-3 overflow-hidden border-2 border-slate-200 shadow">
                                <img src="{{ asset('images/struktur/dhesty.jpg') }}"
                                     alt="Dhesty C"
                                     class="w-full h-full object-cover"
                                     onerror="this.src='{{ asset('images/struktur/default-person.png') }}'  this.onerror=null;">
                                <i class="fas fa-user text-slate-600 text-sm hidden"></i>
                            </div>

                            <div class="mb-2">
                                <div class="inline-flex items-center justify-center bg-slate-100 rounded-full px-2 py-1 mb-2">
                                    <span class="text-slate-700 text-xs font-bold">ANGGOTA</span>
                                </div>
                                <h5 class="text-sm font-bold text-gray-900 mb-1">Dhesty C</h5>
                                <p class="text-gray-600 text-xs">Anggota BPD</p>
                            </div>
                        </div>
                    </div>

                    <!-- Legend -->
                    <div class="mt-8 flex justify-center">
                        <div class="bg-gray-50 rounded-lg p-4 text-center">
                            <h6 class="text-sm font-bold text-gray-800 mb-2">Keterangan:</h6>
                            <div class="flex items-center justify-center space-x-4 text-xs text-gray-600">
                                <div class="flex items-center">
                                    <div class="w-4 h-0.5 bg-gray-400 mr-2"></div>
                                    <span>Garis Komando</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-purple-500 rounded mr-2"></div>
                                    <span>Pimpinan</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-slate-500 rounded mr-2"></div>
                                    <span>Anggota</span>
                                </div>
                            </div>
                        </div>
                    </div>
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

