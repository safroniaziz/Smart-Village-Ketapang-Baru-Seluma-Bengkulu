@extends('layouts.app')

@section('title', 'Tentang Desa - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 text-white overflow-hidden py-20 lg:py-32">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container for About -->
    <div id="particles-about" class="absolute inset-0"></div>

    <div class="relative w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <div class="text-center" data-aos="fade-up" data-aos-duration="800">
            <!-- Badge -->
            <div class="inline-flex items-center space-x-3 mb-8" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-home text-white text-2xl"></i>
                </div>
                <div class="text-left">
                    <h3 class="text-xl font-bold text-blue-100">PROFIL DESA</h3>
                    <p class="text-sm text-blue-200">Kecamatan Semidang Alas Maras</p>
                </div>
            </div>

            <h1 class="text-5xl lg:text-7xl font-black mb-8" data-aos="fade-up" data-aos-delay="400">
                <span class="text-white">Desa</span><br>
                <span class="text-yellow-400 font-extrabold">Ketapang Baru</span>
            </h1>

            <p class="text-xl lg:text-2xl text-blue-100 max-w-4xl mx-auto leading-relaxed mb-8" data-aos="fade-up" data-aos-delay="600">
                Membangun desa yang maju, mandiri, dan sejahtera melalui pemanfaatan teknologi digital dan pengembangan potensi sumber daya lokal
            </p>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="800">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                    <div class="text-2xl font-black text-yellow-400">1985</div>
                    <div class="text-sm text-blue-100">Tahun Berdiri</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                    <div class="text-2xl font-black text-yellow-400">2,847</div>
                    <div class="text-sm text-blue-100">Jiwa Penduduk</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                    <div class="text-2xl font-black text-yellow-400">8</div>
                    <div class="text-sm text-blue-100">Dusun</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                    <div class="text-2xl font-black text-yellow-400">450</div>
                    <div class="text-sm text-blue-100">Hektar</div>
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

<!-- Navigation Tabs -->
<section class="py-8 bg-white border-b border-gray-200 sticky top-16 z-30">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-2 lg:gap-4" id="tabNavigation">
            <button class="tab-btn active" data-tab="profil">
                <i class="fas fa-home mr-2"></i>Profil Desa
            </button>
            <button class="tab-btn" data-tab="visi-misi">
                <i class="fas fa-bullseye mr-2"></i>Visi & Misi
            </button>
            <button class="tab-btn" data-tab="struktur">
                <i class="fas fa-sitemap mr-2"></i>Struktur Organisasi
            </button>
            <button class="tab-btn" data-tab="monografi">
                <i class="fas fa-chart-bar mr-2"></i>Monografi
            </button>
            <button class="tab-btn" data-tab="peta">
                <i class="fas fa-map mr-2"></i>Peta Desa
            </button>
            <button class="tab-btn" data-tab="potensi">
                <i class="fas fa-star mr-2"></i>Potensi
            </button>
        </div>
    </div>
</section>

<!-- Tab Content Container -->
<div class="tab-content-container">

<!-- Profil Desa Tab -->
<section id="profil" class="tab-content active py-24 bg-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Sejarah Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-24">
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="800">
                <div>
                    <div class="inline-flex items-center bg-blue-50 rounded-full px-4 py-2 mb-6">
                        <i class="fas fa-history text-blue-600 mr-2"></i>
                        <span class="text-blue-800 font-semibold text-sm">Sejarah Desa</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-8">
                        Perjalanan <span class="text-blue-600">Ketapang Baru</span>
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Desa Ketapang Baru didirikan pada tahun <strong>1985</strong> dan telah mengalami perkembangan yang signifikan dalam berbagai aspek kehidupan masyarakat. Dari awalnya hanya beberapa keluarga yang tinggal di wilayah ini, kini telah berkembang menjadi desa yang maju dengan lebih dari <strong>2.847 jiwa penduduk</strong>.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Terletak di Kecamatan Semidang Alas Maras, Kabupaten Seluma, Provinsi Bengkulu, desa ini dikenal dengan hasil pertaniannya yang melimpah, terutama <strong>padi dan kelapa sawit</strong> yang menjadi komoditas utama. Masyarakat desa terkenal dengan semangat gotong royong yang tinggi dan komitmen untuk membangun desa yang lebih baik.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Pada era digital ini, Desa Ketapang Baru berkomitmen untuk menjadi <strong>Smart Village</strong> yang memanfaatkan teknologi untuk meningkatkan pelayanan publik dan kesejahteraan masyarakat.
                    </p>
                </div>
            </div>

            <!-- Timeline Visualization -->
            <div class="relative" data-aos="fade-left" data-aos-duration="800">
                <div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 rounded-3xl p-8 shadow-2xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Timeline Perkembangan</h3>

                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold">1985</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Pembentukan Desa</h4>
                                <p class="text-gray-600 text-sm">Desa Ketapang Baru resmi terbentuk</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold">2000</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Pembangunan Infrastruktur</h4>
                                <p class="text-gray-600 text-sm">Jalan, sekolah, dan fasilitas kesehatan</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold">2015</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Era Digital</h4>
                                <p class="text-gray-600 text-sm">Masuknya teknologi dan internet</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold">2024</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Smart Village</h4>
                                <p class="text-gray-600 text-sm">Transformasi digital menyeluruh</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Geografis Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-24">
            <div class="lg:col-span-2 space-y-8" data-aos="fade-right" data-aos-duration="800">
                <div>
                    <div class="inline-flex items-center bg-green-50 rounded-full px-4 py-2 mb-6">
                        <i class="fas fa-map-marker-alt text-green-600 mr-2"></i>
                        <span class="text-green-800 font-semibold text-sm">Kondisi Geografis</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-8">
                        Letak <span class="text-green-600">Geografis</span>
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 rounded-2xl p-6">
                            <h4 class="font-bold text-gray-900 mb-4">Batas Wilayah</h4>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Utara:</span>
                                    <span class="font-medium text-gray-900">Desa Lubuk Seberuk</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Selatan:</span>
                                    <span class="font-medium text-gray-900">Desa Pagar Agung</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Barat:</span>
                                    <span class="font-medium text-gray-900">Desa Semidang Lagan</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Timur:</span>
                                    <span class="font-medium text-gray-900">Desa Talang Empat</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-2xl p-6">
                            <h4 class="font-bold text-gray-900 mb-4">Detail Lokasi</h4>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Luas Wilayah:</span>
                                    <span class="font-medium text-gray-900">450 Ha</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Ketinggian:</span>
                                    <span class="font-medium text-gray-900">25-50 mdpl</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Topografi:</span>
                                    <span class="font-medium text-gray-900">Dataran Rendah</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Iklim:</span>
                                    <span class="font-medium text-gray-900">Tropis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Cards -->
            <div class="space-y-6" data-aos="fade-left" data-aos-duration="800">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-map text-white text-xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Koordinat</h4>
                    <p class="text-blue-100 text-sm mb-4">Titik Koordinat Desa</p>
                    <div class="space-y-2 text-sm">
                        <div>Latitude: <span class="font-mono">-4.3221828</span></div>
                        <div>Longitude: <span class="font-mono">102.7635049</span></div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-thermometer-half text-white text-xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Iklim</h4>
                    <p class="text-green-100 text-sm mb-4">Kondisi Cuaca</p>
                    <div class="space-y-2 text-sm">
                        <div>Suhu: <span class="font-mono">24-32°C</span></div>
                        <div>Curah Hujan: <span class="font-mono">2500mm/tahun</span></div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-route text-white text-xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Akses</h4>
                    <p class="text-purple-100 text-sm mb-4">Transportasi</p>
                    <div class="space-y-2 text-sm">
                        <div>Jarak ke Ibukota Kab: <span class="font-mono">45 km</span></div>
                        <div>Jarak ke Provinsi: <span class="font-mono">120 km</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi Tab -->
<section id="visi-misi" class="tab-content py-24 bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center bg-blue-50 rounded-full px-6 py-3 mb-6">
                <i class="fas fa-bullseye text-blue-600 mr-3"></i>
                <span class="text-blue-800 font-semibold">Visi & Misi Desa</span>
            </div>
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 mb-8">
                Arah <span class="text-blue-600">Pembangunan</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Dengan pendekatan partisipatif melibatkan seluruh stakeholder desa, kami menetapkan visi dan misi yang menjadi panduan pembangunan berkelanjutan
            </p>
        </div>

        <!-- Visi Section -->
        <div class="mb-20" data-aos="fade-up" data-aos-duration="800">
            <div class="bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 rounded-3xl p-12 lg:p-16 text-white relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full -translate-y-32 translate-x-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full translate-y-24 -translate-x-24"></div>
                </div>

                <div class="relative z-10 max-w-5xl mx-auto text-center">
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-8">
                        <i class="fas fa-eye text-white text-3xl"></i>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-black mb-8 text-yellow-400">VISI DESA KETAPANG BARU</h3>
                    <blockquote class="text-2xl lg:text-3xl font-bold leading-relaxed italic">
                        "MENINGKATKAN KESEJAHTERAAN MASYARAKAT YANG BERMARTABAT DAN RELIGIUS DENGAN MENGEMBANGKAN POTENSI SUMBERDAYA"
                    </blockquote>

                    <!-- Visi Explanation -->
                    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-heart text-white"></i>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Bermartabat</h4>
                            <p class="text-blue-100 text-sm">Menjunjung tinggi nilai-nilai kemanusiaan dan harga diri</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-mosque text-white"></i>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Religius</h4>
                            <p class="text-blue-100 text-sm">Berdasarkan nilai-nilai agama dan spiritual</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-seedling text-white"></i>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Potensi Sumberdaya</h4>
                            <p class="text-blue-100 text-sm">Mengoptimalkan sumber daya alam dan manusia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Misi Section -->
        <div data-aos="fade-up" data-aos-duration="800">
            <div class="text-center mb-12">
                <h3 class="text-3xl lg:text-4xl font-black text-gray-900 mb-4">
                    MISI <span class="text-green-600">DESA KETAPANG BARU</span>
                </h3>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Untuk mewujudkan visi tersebut, kami menetapkan 9 misi strategis yang akan dilaksanakan secara konsisten
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Misi 1 -->
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-green-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-seedling text-white text-xl"></i>
                    </div>
                    <div class="text-green-600 font-bold text-sm mb-2">MISI 01</div>
                    <h4 class="font-bold text-gray-900 mb-3 leading-tight">Mengembangkan dan meningkatkan hasil pertanian masyarakat</h4>
                    <p class="text-gray-600 text-sm">Modernisasi sektor pertanian untuk meningkatkan produktivitas dan kesejahteraan petani</p>
                </div>

                <!-- Misi 2 -->
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-blue-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-road text-white text-xl"></i>
                    </div>
                    <div class="text-blue-600 font-bold text-sm mb-2">MISI 02</div>
                    <h4 class="font-bold text-gray-900 mb-3 leading-tight">Pembuatan sarana jalan usaha tani dan peningkatan jalan lingkungan</h4>
                    <p class="text-gray-600 text-sm">Membangun infrastruktur jalan untuk mendukung aktivitas ekonomi masyarakat</p>
                </div>

                <!-- Misi 3 -->
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-cyan-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-tint text-white text-xl"></i>
                    </div>
                    <div class="text-cyan-600 font-bold text-sm mb-2">MISI 03</div>
                    <h4 class="font-bold text-gray-900 mb-3 leading-tight">Peningkatan sarana air bersih bagi masyarakat</h4>
                    <p class="text-gray-600 text-sm">Menyediakan akses air bersih dan sanitasi yang layak untuk seluruh warga</p>
                </div>

                <!-- Misi 4 -->
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-red-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-heartbeat text-white text-xl"></i>
                    </div>
                    <div class="text-red-600 font-bold text-sm mb-2">MISI 04</div>
                    <h4 class="font-bold text-gray-900 mb-3 leading-tight">Perbaikan dan peningkatan layanan sarana kesehatan dan umum</h4>
                    <p class="text-gray-600 text-sm">Meningkatkan kualitas pelayanan kesehatan dan fasilitas umum lainnya</p>
                </div>

                <!-- Misi 5 -->
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-purple-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <div class="text-purple-600 font-bold text-sm mb-2">MISI 05</div>
                    <h4 class="font-bold text-gray-900 mb-3 leading-tight">Peningkatan sarana dan prasarana pendidikan</h4>
                    <p class="text-gray-600 text-sm">Membangun dan meningkatkan fasilitas pendidikan untuk generasi masa depan</p>
                </div>

                <!-- Misi 6 -->
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-yellow-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <div class="text-yellow-600 font-bold text-sm mb-2">MISI 06</div>
                    <h4 class="font-bold text-gray-900 mb-3 leading-tight">Meningkatkan keterampilan dan kualitas SDM masyarakat</h4>
                    <p class="text-gray-600 text-sm">Pengembangan kapasitas dan kompetensi sumber daya manusia</p>
                </div>

                <!-- Misi 7 -->
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-indigo-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-store text-white text-xl"></i>
                    </div>
                    <div class="text-indigo-600 font-bold text-sm mb-2">MISI 07</div>
                    <h4 class="font-bold text-gray-900 mb-3 leading-tight">Pengadaan permodalan untuk usaha kecil dan memperluas lapangan kerja</h4>
                    <p class="text-gray-600 text-sm">Mendukung UMKM dan menciptakan peluang ekonomi baru bagi masyarakat</p>
                </div>

                <!-- Misi 8 -->
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-pink-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-user-tie text-white text-xl"></i>
                    </div>
                    <div class="text-pink-600 font-bold text-sm mb-2">MISI 08</div>
                    <h4 class="font-bold text-gray-900 mb-3 leading-tight">Peningkatan kapasitas Aparat desa dan BPD</h4>
                    <p class="text-gray-600 text-sm">Pengembangan kompetensi aparatur untuk pelayanan yang lebih baik</p>
                </div>

                <!-- Misi 9 -->
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-teal-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-building text-white text-xl"></i>
                    </div>
                    <div class="text-teal-600 font-bold text-sm mb-2">MISI 09</div>
                    <h4 class="font-bold text-gray-900 mb-3 leading-tight">Peningkatan Sarana dan Prasarana kerja aparat desa dan BPD</h4>
                    <p class="text-gray-600 text-sm">Menyediakan fasilitas kerja yang memadai untuk pelayanan optimal</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Struktur Organisasi Tab -->
<section id="struktur" class="tab-content py-24 bg-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center bg-indigo-50 rounded-full px-6 py-3 mb-6">
                <i class="fas fa-sitemap text-indigo-600 mr-3"></i>
                <span class="text-indigo-800 font-semibold">Struktur Organisasi</span>
            </div>
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 mb-8">
                Pemerintahan <span class="text-indigo-600">Desa</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Struktur organisasi pemerintahan Desa Ketapang Baru yang terdiri dari Pemerintah Desa dan Badan Permusyawaratan Desa (BPD)
            </p>
        </div>

        <!-- Organizational Chart -->
        <div class="mb-24" data-aos="fade-up" data-aos-duration="800">
            <div class="bg-gradient-to-br from-gray-50 via-white to-indigo-50 rounded-3xl p-8 lg:p-12 shadow-2xl">
                <!-- Level 1: Kepala Desa -->
                <div class="text-center mb-12">
                    <div class="inline-block bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl p-8 shadow-2xl">
                        <div class="w-20 h-20 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-crown text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Kepala Desa</h3>
                        <p class="text-blue-100 font-semibold">H. Ahmad Supriyadi, S.Pd</p>
                        <p class="text-blue-200 text-sm">Periode: 2021 - 2027</p>
                    </div>
                </div>

                <!-- Level 2: Sekretaris & BPD -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
                    <!-- Sekretaris Desa -->
                    <div class="text-center">
                        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                            <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-file-alt text-white text-xl"></i>
                            </div>
                            <h4 class="text-lg font-bold text-gray-900 mb-2">Sekretaris Desa</h4>
                            <p class="text-green-600 font-semibold">Drs. Bambang Sutrisno</p>
                            <p class="text-gray-600 text-sm">Koordinator Administrasi</p>
                        </div>
                    </div>

                    <!-- Ketua BPD -->
                    <div class="text-center">
                        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                            <div class="w-16 h-16 bg-purple-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-balance-scale text-white text-xl"></i>
                            </div>
                            <h4 class="text-lg font-bold text-gray-900 mb-2">Ketua BPD</h4>
                            <p class="text-purple-600 font-semibold">H. Suherman, S.H</p>
                            <p class="text-gray-600 text-sm">Badan Permusyawaratan Desa</p>
                        </div>
                    </div>
                </div>

                <!-- Level 3: Kepala Urusan -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Kaur Keuangan -->
                    <div class="text-center">
                        <div class="bg-white rounded-xl p-4 shadow-md border border-gray-100">
                            <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-money-bill text-white"></i>
                            </div>
                            <h5 class="font-bold text-gray-900 text-sm mb-1">Kaur Keuangan</h5>
                            <p class="text-yellow-600 font-medium text-sm">Siti Nurhaliza, S.E</p>
                        </div>
                    </div>

                    <!-- Kaur Pembangunan -->
                    <div class="text-center">
                        <div class="bg-white rounded-xl p-4 shadow-md border border-gray-100">
                            <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-hammer text-white"></i>
                            </div>
                            <h5 class="font-bold text-gray-900 text-sm mb-1">Kaur Pembangunan</h5>
                            <p class="text-orange-600 font-medium text-sm">Ahmad Fauzi, S.T</p>
                        </div>
                    </div>

                    <!-- Kaur Umum -->
                    <div class="text-center">
                        <div class="bg-white rounded-xl p-4 shadow-md border border-gray-100">
                            <div class="w-12 h-12 bg-teal-500 rounded-xl flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <h5 class="font-bold text-gray-900 text-sm mb-1">Kaur Umum</h5>
                            <p class="text-teal-600 font-medium text-sm">Rini Wulandari, S.Sos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BPD Section -->
        <div data-aos="fade-up" data-aos-duration="800">
            <div class="text-center mb-12">
                <h3 class="text-3xl lg:text-4xl font-black text-gray-900 mb-4">
                    Badan Permusyawaratan <span class="text-purple-600">Desa</span>
                </h3>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    BPD berperan sebagai mitra kerja pemerintah desa dalam menampung dan menyalurkan aspirasi masyarakat
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Ketua BPD -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-4">
                        <i class="fas fa-user-tie text-white text-xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Ketua BPD</h4>
                    <p class="text-purple-100 font-semibold mb-1">H. Suherman, S.H</p>
                    <p class="text-purple-200 text-sm">Periode: 2021 - 2027</p>
                </div>

                <!-- Wakil Ketua -->
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                    <div class="w-16 h-16 bg-indigo-500 rounded-2xl flex items-center justify-center mb-4">
                        <i class="fas fa-user-friends text-white text-xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Wakil Ketua</h4>
                    <p class="text-indigo-600 font-semibold mb-1">Dra. Mariana Sari</p>
                    <p class="text-gray-600 text-sm">Wakil & Koordinator</p>
                </div>

                <!-- Sekretaris BPD -->
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                    <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-4">
                        <i class="fas fa-edit text-white text-xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Sekretaris</h4>
                    <p class="text-green-600 font-semibold mb-1">Muhammad Rifki, S.Pd</p>
                    <p class="text-gray-600 text-sm">Administrasi BPD</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Other Tab Contents would continue here... -->
<section id="monografi" class="tab-content py-24 bg-gradient-to-br from-gray-50 via-white to-purple-50">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 mb-8">
                Monografi <span class="text-purple-600">Desa</span>
            </h2>
            <p class="text-xl text-gray-600">Data demografis dan karakteristik penduduk Desa Ketapang Baru</p>
        </div>
        <!-- Monografi content would go here -->
        <div class="text-center py-20">
            <div class="w-32 h-32 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-chart-bar text-purple-600 text-4xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Konten Monografi</h3>
            <p class="text-gray-600">Bagian ini akan berisi data demografis lengkap</p>
        </div>
    </div>
</section>

<section id="peta" class="tab-content py-24 bg-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 mb-8">
                Peta <span class="text-green-600">Desa</span>
            </h2>
            <p class="text-xl text-gray-600">Peta wilayah dan tata ruang Desa Ketapang Baru</p>
        </div>
        <!-- Peta content would go here -->
        <div class="text-center py-20">
            <div class="w-32 h-32 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-map text-green-600 text-4xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Peta Interaktif</h3>
            <p class="text-gray-600">Bagian ini akan berisi peta interaktif desa</p>
        </div>
    </div>
</section>

<section id="potensi" class="tab-content py-24 bg-gradient-to-br from-yellow-50 via-white to-orange-50">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 mb-8">
                Potensi <span class="text-orange-600">Desa</span>
            </h2>
            <p class="text-xl text-gray-600">Kekayaan dan potensi sumber daya Desa Ketapang Baru</p>
        </div>
        <!-- Potensi content would go here -->
        <div class="text-center py-20">
            <div class="w-32 h-32 bg-orange-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-star text-orange-600 text-4xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Potensi Unggulan</h3>
            <p class="text-gray-600">Bagian ini akan berisi detail potensi desa</p>
        </div>
    </div>
</section>

</div>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 text-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-4xl lg:text-5xl font-black mb-8">Mari Bergabung Membangun <span class="text-yellow-400">Desa</span></h2>
            <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                Bersama-sama kita wujudkan visi Desa Ketapang Baru yang bermartabat, religius, dan sejahtera.
                Setiap kontribusi Anda sangat berarti untuk kemajuan desa.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('kontak') }}" class="btn-accent text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fab fa-whatsapp mr-2"></i>Hubungi Pemerintah Desa
                </a>
                <a href="{{ route('surat.online') }}" class="btn-secondary text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-envelope mr-2"></i>Layanan Surat Online
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
/* Tab Styles */
.tab-btn {
    @apply px-4 py-2 lg:px-6 lg:py-3 rounded-xl font-semibold text-sm lg:text-base transition-all duration-300 border border-gray-200 bg-white text-gray-600 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200;
}

.tab-btn.active {
    @apply bg-blue-600 text-white border-blue-600 shadow-lg;
}

.tab-content {
    @apply hidden;
}

.tab-content.active {
    @apply block;
}

/* Card Hover Effects */
.card-hover {
    @apply bg-white rounded-2xl shadow-lg border border-gray-100 transition-all duration-300 hover:shadow-2xl hover:scale-105;
}

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

    // Tab Functionality
    $('.tab-btn').click(function() {
        const targetTab = $(this).data('tab');

        // Remove active class from all tabs and content
        $('.tab-btn').removeClass('active');
        $('.tab-content').removeClass('active');

        // Add active class to clicked tab and corresponding content
        $(this).addClass('active');
        $('#' + targetTab).addClass('active');

        // Smooth scroll to content
        $('html, body').animate({
            scrollTop: $('.tab-content-container').offset().top - 100
        }, 500);
    });

    // Initialize Particles.js for About page
    if (document.getElementById('particles-about')) {
        particlesJS('particles-about', {
            particles: {
                number: { value: 50, density: { enable: true, value_area: 800 } },
                color: { value: "#ffffff" },
                shape: { type: "circle" },
                opacity: { value: 0.1, random: false },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: "#ffffff", opacity: 0.1, width: 1 },
                move: { enable: true, speed: 2, direction: "none", random: false, straight: false, out_mode: "out", bounce: false }
            },
            interactivity: {
                detect_on: "canvas",
                events: { onhover: { enable: true, mode: "repulse" }, onclick: { enable: true, mode: "push" }, resize: true },
                modes: { grab: { distance: 140, line_linked: { opacity: 1 } }, bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 }, repulse: { distance: 200, duration: 0.4 }, push: { particles_nb: 4 }, remove: { particles_nb: 2 } }
            },
            retina_detect: true
        });
    }
});
</script>
@endpush
