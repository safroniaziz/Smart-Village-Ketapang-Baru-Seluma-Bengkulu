@extends('layouts.app')

@section('title', 'Visi & Misi - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background-color: #0086c9;">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container for Visi Misi -->
    <div id="particles-visi" class="absolute inset-0"></div>

    <div class="relative w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
        <div class="text-center" data-aos="fade-up" data-aos-duration="800">
            <!-- Badge -->
            <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-bullseye text-white text-xl"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-blue-100">ARAH PEMBANGUNAN</h2>
                    <p class="text-sm text-blue-100">Visi & Misi Desa</p>
                </div>
            </div>

            <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                <span class="text-white">Visi &</span><br>
                <span class="text-yellow-400 font-extrabold">Misi Desa</span>
            </h1>

            <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light" data-aos="fade-up" data-aos-delay="600">
                Dengan pendekatan partisipatif melibatkan seluruh stakeholder desa, kami menetapkan visi dan misi yang menjadi panduan pembangunan berkelanjutan
            </p>

            <!-- Key Points -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="800">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                    <div class="text-2xl font-black text-yellow-400">1</div>
                    <div class="text-sm text-green-100">Visi Bermartabat</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                    <div class="text-2xl font-black text-yellow-400">9</div>
                    <div class="text-sm text-green-100">Misi Strategis</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                    <div class="text-2xl font-black text-yellow-400">2024</div>
                    <div class="text-sm text-green-100">Tahun Implementasi</div>
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

<!-- Visi Section -->
<section class="py-24 bg-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
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
                    <blockquote class="text-2xl lg:text-3xl font-bold leading-relaxed italic mb-12">
                        "MENINGKATKAN KESEJAHTERAAN MASYARAKAT YANG BERMARTABAT DAN RELIGIUS DENGAN MENGEMBANGKAN POTENSI SUMBERDAYA"
                    </blockquote>

                    <!-- Visi Explanation -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-heart text-white"></i>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Bermartabat</h4>
                            <p class="text-blue-100 text-sm">Menjunjung tinggi nilai-nilai kemanusiaan dan harga diri dalam setiap aspek kehidupan bermasyarakat</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-mosque text-white"></i>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Religius</h4>
                            <p class="text-blue-100 text-sm">Berdasarkan nilai-nilai agama dan spiritual yang menjadi landasan moral dalam pembangunan</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-seedling text-white"></i>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Potensi Sumberdaya</h4>
                            <p class="text-blue-100 text-sm">Mengoptimalkan sumber daya alam dan manusia untuk kesejahteraan bersama</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Misi Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-white to-green-50">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-green-600 to-emerald-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-green-600 to-emerald-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-list-ul mr-2"></i>
                    Misi Strategis Desa
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-slate-800 to-green-800 bg-clip-text text-transparent">
                        9 Misi Desa
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-emerald-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">9 misi strategis</span> yang akan dilaksanakan secara konsisten untuk mewujudkan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-green-700">visi Desa Ketapang Baru</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-green-200 to-emerald-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Misi 1 -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-green-200" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-seedling text-white text-xl"></i>
                </div>
                <div class="text-green-600 font-bold text-sm mb-2">MISI 01</div>
                <h4 class="font-bold text-gray-900 mb-3 leading-tight">Mengembangkan dan meningkatkan hasil pertanian masyarakat</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Modernisasi sektor pertanian untuk meningkatkan produktivitas dan kesejahteraan petani melalui teknologi dan metode pertanian terpadu</p>
            </div>

            <!-- Misi 2 -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-blue-200" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-road text-white text-xl"></i>
                </div>
                <div class="text-blue-600 font-bold text-sm mb-2">MISI 02</div>
                <h4 class="font-bold text-gray-900 mb-3 leading-tight">Pembuatan sarana jalan usaha tani dan peningkatan jalan lingkungan</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Membangun infrastruktur jalan untuk mendukung aktivitas ekonomi masyarakat dan memperlancar akses distribusi hasil pertanian</p>
            </div>

            <!-- Misi 3 -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-cyan-200" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-tint text-white text-xl"></i>
                </div>
                <div class="text-cyan-600 font-bold text-sm mb-2">MISI 03</div>
                <h4 class="font-bold text-gray-900 mb-3 leading-tight">Peningkatan sarana air bersih bagi masyarakat</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Menyediakan akses air bersih dan sanitasi yang layak untuk seluruh warga desa sebagai kebutuhan dasar yang fundamental</p>
            </div>

            <!-- Misi 4 -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-red-200" data-aos="fade-up" data-aos-delay="400">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-heartbeat text-white text-xl"></i>
                </div>
                <div class="text-red-600 font-bold text-sm mb-2">MISI 04</div>
                <h4 class="font-bold text-gray-900 mb-3 leading-tight">Perbaikan dan peningkatan layanan sarana kesehatan dan umum</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Meningkatkan kualitas pelayanan kesehatan dan fasilitas umum lainnya untuk menjamin kesehatan dan kesejahteraan masyarakat</p>
            </div>

            <!-- Misi 5 -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-purple-200" data-aos="fade-up" data-aos-delay="500">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <div class="text-purple-600 font-bold text-sm mb-2">MISI 05</div>
                <h4 class="font-bold text-gray-900 mb-3 leading-tight">Peningkatan sarana dan prasarana pendidikan</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Membangun dan meningkatkan fasilitas pendidikan untuk mencerdaskan generasi masa depan dan meningkatkan kualitas SDM</p>
            </div>

            <!-- Misi 6 -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-yellow-200" data-aos="fade-up" data-aos-delay="600">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-users text-white text-xl"></i>
                </div>
                <div class="text-yellow-600 font-bold text-sm mb-2">MISI 06</div>
                <h4 class="font-bold text-gray-900 mb-3 leading-tight">Meningkatkan keterampilan dan kualitas SDM masyarakat</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Pengembangan kapasitas dan kompetensi sumber daya manusia melalui pelatihan dan pendidikan berkelanjutan</p>
            </div>

            <!-- Misi 7 -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-indigo-200" data-aos="fade-up" data-aos-delay="700">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-store text-white text-xl"></i>
                </div>
                <div class="text-indigo-600 font-bold text-sm mb-2">MISI 07</div>
                <h4 class="font-bold text-gray-900 mb-3 leading-tight">Pengadaan permodalan untuk usaha kecil, memperluas lapangan kerja dan manajemen usaha masyarakat</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Mendukung UMKM dan menciptakan peluang ekonomi baru bagi masyarakat dengan penyediaan akses permodalan dan manajemen usaha</p>
            </div>

            <!-- Misi 8 -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-pink-200" data-aos="fade-up" data-aos-delay="800">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-user-tie text-white text-xl"></i>
                </div>
                <div class="text-pink-600 font-bold text-sm mb-2">MISI 08</div>
                <h4 class="font-bold text-gray-900 mb-3 leading-tight">Peningkatan kapasitas Aparat desa dan BPD</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Pengembangan kompetensi aparatur pemerintah desa dan anggota BPD untuk pelayanan yang lebih baik kepada masyarakat</p>
            </div>

            <!-- Misi 9 -->
            <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-teal-200" data-aos="fade-up" data-aos-delay="900">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-building text-white text-xl"></i>
                </div>
                <div class="text-teal-600 font-bold text-sm mb-2">MISI 09</div>
                <h4 class="font-bold text-gray-900 mb-3 leading-tight">Peningkatan Sarana dan Prasarana kerja aparat desa dan BPD</h4>
                <p class="text-gray-600 text-sm leading-relaxed">Menyediakan fasilitas kerja yang memadai untuk mendukung pelayanan optimal kepada masyarakat</p>
            </div>
        </div>
    </div>
</section>

<!-- Implementation Strategy Section -->
<section class="py-24 bg-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center bg-blue-50 rounded-full px-6 py-3 mb-6">
                <i class="fas fa-cogs text-blue-600 mr-3"></i>
                <span class="text-blue-800 font-semibold">Strategi Implementasi</span>
            </div>
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 mb-8">
                Rencana <span class="text-blue-600">Aksi</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Pendekatan partisipatif dalam mewujudkan visi dan misi desa dengan melibatkan seluruh komponen masyarakat
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Strategy Content -->
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="800">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Pendekatan Partisipatif</h3>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Penyusunan Visi dan Misi Desa Ketapang Baru dilakukan dengan pendekatan partisipatif, melibatkan pihak-pihak yang berkepentingan di desa.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Pemerintah Desa</h4>
                                <p class="text-gray-600 text-sm">Kepala Desa dan seluruh aparatur desa sebagai pelaksana utama</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Badan Permusyawaratan Desa (BPD)</h4>
                                <p class="text-gray-600 text-sm">Sebagai mitra dalam pengawasan dan aspirasi masyarakat</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Tokoh Masyarakat & Agama</h4>
                                <p class="text-gray-600 text-sm">Sebagai pemimpin informal yang mempengaruhi masyarakat</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Lembaga Masyarakat Desa</h4>
                                <p class="text-gray-600 text-sm">Organisasi dan kelompok masyarakat di tingkat desa</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Masyarakat Desa</h4>
                                <p class="text-gray-600 text-sm">Seluruh warga desa sebagai subjek dan objek pembangunan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Timeline Illustration -->
            <div class="relative" data-aos="fade-left" data-aos-duration="800">
                <div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 rounded-3xl p-8 shadow-2xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Tahapan Implementasi</h3>

                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-sm">1</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Perencanaan Partisipatif</h4>
                                <p class="text-gray-600 text-sm">Musyawarah desa dan penggalian aspirasi</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-sm">2</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Penyusunan Program</h4>
                                <p class="text-gray-600 text-sm">Rencana kerja berdasarkan misi desa</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-sm">3</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Implementasi Bertahap</h4>
                                <p class="text-gray-600 text-sm">Pelaksanaan sesuai prioritas dan kemampuan</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-sm">4</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Monitoring & Evaluasi</h4>
                                <p class="text-gray-600 text-sm">Pengawasan dan perbaikan berkelanjutan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-br from-green-600 via-emerald-700 to-teal-800 text-white">
    <div class="w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-4xl lg:text-5xl font-black mb-8">Mari Wujudkan <span class="text-yellow-400">Visi Bersama</span></h2>
            <p class="text-xl text-green-100 mb-8 leading-relaxed">
                Bergabunglah dalam mewujudkan Desa Ketapang Baru yang bermartabat dan religius.
                Setiap partisipasi Anda sangat berarti untuk kemajuan desa.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('tentang') }}" class="btn-accent text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-home mr-2"></i>Profil Desa
                </a>
                <a href="{{ route('struktur') }}" class="btn-secondary text-lg px-8 py-4 animate-hover-bounce">
                    <i class="fas fa-sitemap mr-2"></i>Struktur Organisasi
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

    // Initialize Particles.js for Visi Misi page
    if (document.getElementById('particles-visi')) {
        particlesJS('particles-visi', {
            particles: {
                number: { value: 40, density: { enable: true, value_area: 800 } },
                color: { value: "#ffffff" },
                shape: { type: "circle" },
                opacity: { value: 0.1, random: false },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: "#ffffff", opacity: 0.1, width: 1 },
                move: { enable: true, speed: 1.5, direction: "none", random: false, straight: false, out_mode: "out", bounce: false }
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
