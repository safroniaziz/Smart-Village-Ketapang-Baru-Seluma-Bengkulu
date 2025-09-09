@extends('layouts.app')

@section('title', 'Pengaduan - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
/* Form validation styles */
.is-invalid {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
}

.is-invalid:focus {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
}

/* Enhanced form styling */
.form-group {
    position: relative;
}

.form-group .error-message {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    display: none;
}

.form-group.is-invalid .error-message {
    display: block;
}
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100"></div>

    <!-- Particle.js Container -->
    <div id="particles-pengaduan" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20" data-aos="fade-up" data-aos-delay="300">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">

            <!-- Hero Content -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-comment text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">ASPIRASI WARGA</h2>
                            <p class="text-sm text-blue-100">Pengaduan & Saran</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Pengaduan</span><br>
                        <span class="text-yellow-400 font-extrabold">Masyarakat</span>
                    </h1>

                    <!-- Badge -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-shield-check mr-2 text-yellow-300 text-xs"></i>
                            Transparan & Responsif
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Sampaikan pengaduan, saran, dan kritik untuk kemajuan Desa Ketapang Baru. Setiap aspirasi akan
                        <span class="font-semibold text-yellow-300">ditindaklanjuti dengan responsif</span>
                    </p>

                    <!-- Enhanced Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-6xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">24/7</div>
                                <i class="fas fa-clock text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Layanan Online</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-wifi text-green-300 mr-1"></i>
                                Akses kapan saja
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">100%</div>
                                <i class="fas fa-check-circle text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Ditindaklanjuti</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-tasks text-green-300 mr-1"></i>
                                Semua laporan
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">3</div>
                                <i class="fas fa-hourglass-half text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Hari Respon</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-lightning-bolt text-orange-300 mr-1"></i>
                                Maksimal waktu
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">95%</div>
                                <i class="fas fa-smile text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Tingkat Kepuasan</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-star text-orange-300 mr-1"></i>
                                Rating warga
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

<!-- Complaint Form -->
<section class="py-20 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden" data-aos="fade-up">
    <!-- Background Decorations -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-200/20 to-indigo-300/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-purple-200/20 to-pink-300/20 rounded-full blur-3xl"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Enhanced Header -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-delay="100">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-comment mr-2"></i>
                    Form Pengaduan Masyarakat
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-blue-800 to-indigo-900 bg-clip-text text-transparent">
                        Sampaikan Aspirasi
                    </span>
                </h2>
                <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Kirim pengaduan, saran, dan kritik</span> untuk kemajuan Desa Ketapang Baru. Setiap aspirasi akan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-blue-700">ditindaklanjuti dengan responsif</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-blue-200 to-indigo-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="p-8 lg:p-12" data-aos="fade-up" data-aos-delay="300">
                <form id="complaintForm" class="space-y-6">
                    <!-- Personal Information -->
                    <div class="space-y-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            Informasi Pribadi
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nama" class="block text-sm font-semibold text-gray-700">Nama Lengkap *</label>
                                <input type="text"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="nama"
                                       name="nama"
                                       required>
                            </div>
                            <div class="space-y-2">
                                <label for="nik" class="block text-sm font-semibold text-gray-700">NIK</label>
                                <input type="text"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="nik"
                                       name="nik"
                                       placeholder="Opsional">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-semibold text-gray-700">Email *</label>
                                <input type="email"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="email"
                                       name="email"
                                       required>
                            </div>
                            <div class="space-y-2">
                                <label for="telepon" class="block text-sm font-semibold text-gray-700">Telepon</label>
                                <input type="tel"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="telepon"
                                       name="telepon"
                                       placeholder="Opsional">
                            </div>
                        </div>

                        <div>
                            <label for="alamat" class="block text-sm font-semibold text-gray-700">Alamat</label>
                            <input type="text"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white"
                                   id="alamat"
                                   name="alamat"
                                   placeholder="Opsional">
                        </div>
                    </div>

                    <!-- Complaint Details -->
                    <div class="space-y-6 pt-6 border-t border-gray-200">
                        <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                            </div>
                            Detail Pengaduan
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="jenis_pengaduan" class="block text-sm font-semibold text-gray-700">Jenis Pengaduan *</label>
                                <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white"
                                        id="jenis_pengaduan"
                                        name="jenis_pengaduan"
                                        required>
                                    <option value="">Pilih jenis pengaduan</option>
                                    <option value="infrastruktur">Infrastruktur</option>
                                    <option value="pelayanan">Pelayanan Publik</option>
                                    <option value="keamanan">Keamanan & Ketertiban</option>
                                    <option value="kesehatan">Kesehatan</option>
                                    <option value="pendidikan">Pendidikan</option>
                                    <option value="ekonomi">Ekonomi & UMKM</option>
                                    <option value="lingkungan">Lingkungan</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label for="prioritas" class="block text-sm font-semibold text-gray-700">Tingkat Prioritas</label>
                                <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white"
                                        id="prioritas"
                                        name="prioritas">
                                    <option value="rendah">Rendah</option>
                                    <option value="sedang" selected>Sedang</option>
                                    <option value="tinggi">Tinggi</option>
                                    <option value="sangat_tinggi">Sangat Tinggi</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="judul" class="block text-sm font-semibold text-gray-700">Judul Pengaduan *</label>
                            <input type="text"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white"
                                   id="judul"
                                   name="judul"
                                   required
                                   placeholder="Masukkan judul pengaduan yang singkat dan jelas">
                        </div>

                        <div class="space-y-2">
                            <label for="deskripsi" class="block text-sm font-semibold text-gray-700">Deskripsi Pengaduan *</label>
                            <textarea class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 resize-none bg-white"
                                      id="deskripsi"
                                      name="deskripsi"
                                      rows="5"
                                      required
                                      placeholder="Jelaskan detail pengaduan Anda dengan lengkap..."></textarea>
                        </div>
                    </div>

                    <!-- Location & Evidence -->
                    <div class="space-y-6 pt-6 border-t border-gray-200">
                        <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-map-marker-alt text-white text-sm"></i>
                            </div>
                            Lokasi & Bukti
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="lokasi" class="block text-sm font-semibold text-gray-700">Lokasi Kejadian</label>
                                <input type="text"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="lokasi"
                                       name="lokasi"
                                       placeholder="Contoh: Gang Melati No. 15, Dusun Ketapang">
                            </div>
                            <div class="space-y-2">
                                <label for="tanggal_kejadian" class="block text-sm font-semibold text-gray-700">Tanggal Kejadian</label>
                                <input type="date"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 bg-white"
                                       id="tanggal_kejadian"
                                       name="tanggal_kejadian">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="bukti" class="block text-sm font-semibold text-gray-700">Upload Bukti (Opsional)</label>
                            <input type="file"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 bg-white"
                                   id="bukti"
                                   name="bukti"
                                   accept="image/*,.pdf,.doc,.docx">
                            <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, PDF, DOC. Maksimal 5MB</p>
                        </div>
                    </div>

                    <!-- Privacy Options -->
                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex items-center">
                            <input class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                   type="checkbox"
                                   id="anonim"
                                   name="anonim">
                            <label class="ml-3 text-sm font-medium text-gray-700" for="anonim">
                                Kirim sebagai anonim (nama tidak akan ditampilkan)
                            </label>
                        </div>
                    </div>

                    <div class="text-center pt-8" data-aos="fade-up" data-aos-delay="500">
                        <button type="submit"
                                class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 hover:from-blue-700 hover:via-indigo-700 hover:to-purple-700 text-white font-bold py-4 px-12 rounded-xl transform transition-all duration-300 hover:scale-105 hover:shadow-2xl shadow-lg">
                            <i class="fas fa-paper-plane mr-3"></i>Kirim Pengaduan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Complaint Status -->
<section class="py-20 bg-white relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-20 right-10 w-64 h-64 bg-gradient-to-br from-green-200/20 to-emerald-300/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-10 w-96 h-96 bg-gradient-to-br from-blue-200/20 to-indigo-300/20 rounded-full blur-3xl"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Enhanced Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-green-600 to-emerald-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-4 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-search mr-2"></i>
                    Cek Status Pengaduan
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-green-800 to-emerald-900 bg-clip-text text-transparent">
                        Pantau Progress
                    </span>
                </h2>
                <div class="w-32 h-1 bg-gradient-to-r from-green-500 to-emerald-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Pantau status pengaduan</span> yang telah Anda kirim dengan mudah dan real-time. Setiap update akan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-green-700">diberitahukan secara transparan</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-green-200 to-emerald-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/50 p-8" data-aos="fade-up" data-aos-delay="200">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text"
                               class="w-full pl-12 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white text-lg"
                               id="trackingNumber"
                               placeholder="Masukkan nomor tracking pengaduan">
                    </div>
                </div>
                <div class="md:w-auto">
                    <button class="w-full md:w-auto bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold py-4 px-8 rounded-xl transform transition-all duration-300 hover:scale-105 shadow-lg"
                            onclick="checkStatus()">
                        <i class="fas fa-search mr-3"></i>Cek Status
                    </button>
                </div>
            </div>
        </div>

        <!-- Status Result -->
        <div id="statusResult" class="mt-8" style="display: none;">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/50 overflow-hidden" data-aos="fade-up">
                <div class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 text-white p-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-check-circle text-white text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">Status Pengaduan</h3>
                            <p class="text-green-100 text-lg">Informasi lengkap pengaduan Anda</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                                <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-info-circle text-white text-sm"></i>
                                    </div>
                                    Informasi Dasar
                                </h4>
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Nomor Tracking:</span>
                                        <span class="font-mono font-bold text-gray-900" id="trackingNo">COMP-2024-001</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Judul:</span>
                                        <span class="font-medium text-gray-900" id="complaintTitle">Jalan Berlubang di Gang Melati</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Tanggal Kirim:</span>
                                        <span class="text-gray-900" id="submitDate">15 Januari 2024</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Status:</span>
                                        <span class="inline-block bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold" id="statusBadge">Dalam Proses</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl p-6 border border-purple-100">
                                <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-clock text-white text-sm"></i>
                                    </div>
                                    Timeline & Progress
                                </h4>
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Estimasi Selesai:</span>
                                        <span class="font-bold text-gray-900" id="estimatedDate">20 Januari 2024</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Petugas:</span>
                                        <span class="font-bold text-gray-900" id="officer">Ahmad Supriadi</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Prioritas:</span>
                                        <span class="font-bold text-gray-900" id="priority">Sedang</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-white/60 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-600">Update Terakhir:</span>
                                        <span class="font-bold text-gray-900" id="lastUpdate">16 Januari 2024</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Status Timeline -->
                    <div class="mt-8 bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-6 border border-gray-100">
                        <h4 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-history text-white text-sm"></i>
                            </div>
                            Riwayat Status
                        </h4>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-500 rounded-full mt-1 mr-6 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <div class="flex-1 bg-white rounded-2xl p-4 border border-green-100">
                                    <h5 class="font-bold text-gray-900 mb-2">Diterima</h5>
                                    <p class="text-gray-600 mb-2">15 Januari 2024 - Pengaduan telah diterima dan sedang diverifikasi</p>
                                    <span class="text-xs text-green-600 font-semibold">✓ Selesai</span>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-yellow-500 rounded-full mt-1 mr-6 flex items-center justify-center">
                                    <i class="fas fa-clock text-white text-xs"></i>
                                </div>
                                <div class="flex-1 bg-white rounded-2xl p-4 border border-yellow-100">
                                    <h5 class="font-bold text-gray-900 mb-2">Dalam Proses</h5>
                                    <p class="text-gray-600 mb-2">16 Januari 2024 - Tim sedang menangani pengaduan</p>
                                    <span class="text-xs text-yellow-600 font-semibold">🔄 Sedang Berlangsung</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Complaints -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-gradient-to-br from-blue-200/20 to-indigo-300/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-purple-200/20 to-pink-300/20 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Enhanced Header with Sub Navigation -->
        <div class="text-center mb-16" data-aos="fade-up">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-list-alt mr-2"></i>
                    Pengaduan Terbaru
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-blue-800 to-indigo-900 bg-clip-text text-transparent">
                        Update Terkini
                    </span>
                </h2>
                <div class="w-32 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto mb-8">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Pantau pengaduan</span> yang telah ditangani dan sedang dalam proses untuk transparansi
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-blue-700">pelayanan publik</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-blue-200 to-indigo-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>

            <!-- Sub Navigation Tabs -->
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <button class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105 active">
                    <i class="fas fa-clock mr-2"></i>Semua Status
                </button>
                <button class="px-6 py-3 bg-white/80 backdrop-blur-sm text-gray-700 font-semibold rounded-xl border border-gray-200 shadow-lg transform transition-all duration-300 hover:scale-105 hover:bg-white hover:shadow-xl">
                    <i class="fas fa-check-circle mr-2"></i>Selesai
                </button>
                <button class="px-6 py-3 bg-white/80 backdrop-blur-sm text-gray-700 font-semibold rounded-xl border border-gray-200 shadow-lg transform transition-all duration-300 hover:scale-105 hover:bg-white hover:shadow-xl">
                    <i class="fas fa-clock mr-2"></i>Dalam Proses
                </button>
                <button class="px-6 py-3 bg-white/80 backdrop-blur-sm text-gray-700 font-semibold rounded-xl border border-gray-200 shadow-lg transform transition-all duration-300 hover:scale-105 hover:bg-white hover:shadow-xl">
                    <i class="fas fa-inbox mr-2"></i>Diterima
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Completed Complaint -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/50 overflow-hidden transform transition-all duration-500 hover:scale-105 hover:shadow-3xl" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500 text-white p-6">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mr-3">
                                <i class="fas fa-check-circle text-white text-xl"></i>
                            </div>
                            <div>
                                <span class="font-bold text-lg">Selesai</span>
                                <p class="text-green-100 text-sm">2 hari lalu</p>
                            </div>
                        </div>
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <i class="fas fa-lightbulb text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Lampu Jalan Mati</h3>
                    <p class="text-gray-600 mb-4">Lampu jalan di Gang Anggrek sudah mati selama 3 hari dan telah diperbaiki</p>
                    <div class="flex justify-between items-center">
                        <span class="inline-block bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold">✓ Selesai</span>
                        <span class="text-sm text-gray-500 font-mono">COMP-2024-001</span>
                    </div>
                </div>
            </div>

            <!-- In Progress Complaint -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/50 overflow-hidden transform transition-all duration-500 hover:scale-105 hover:shadow-3xl" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500 text-white p-6">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mr-3">
                                <i class="fas fa-clock text-white text-xl"></i>
                            </div>
                            <div>
                                <span class="font-bold text-lg">Dalam Proses</span>
                                <p class="text-yellow-100 text-sm">1 hari lalu</p>
                            </div>
                        </div>
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <i class="fas fa-road text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Jalan Berlubang</h3>
                    <p class="text-gray-600 mb-4">Jalan di Gang Melati terdapat lubang yang membahayakan, sedang dalam perbaikan</p>
                    <div class="flex justify-between items-center">
                        <span class="inline-block bg-yellow-100 text-yellow-800 px-4 py-2 rounded-full text-sm font-semibold">🔄 Dalam Proses</span>
                        <span class="text-sm text-gray-500 font-mono">COMP-2024-002</span>
                    </div>
                </div>
            </div>

            <!-- New Complaint -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/50 overflow-hidden transform transition-all duration-500 hover:scale-105 hover:shadow-3xl" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-white p-6">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mr-3">
                                <i class="fas fa-inbox text-white text-xl"></i>
                            </div>
                            <div>
                                <span class="font-bold text-lg">Diterima</span>
                                <p class="text-blue-100 text-sm">Hari ini</p>
                            </div>
                        </div>
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <i class="fas fa-trash text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Sampah Menumpuk</h3>
                    <p class="text-gray-600 mb-4">Sampah menumpuk di TPS Dusun Ketapang, sedang diverifikasi</p>
                    <div class="flex justify-between items-center">
                        <span class="inline-block bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold">📥 Diterima</span>
                        <span class="text-sm text-gray-500 font-mono">COMP-2024-003</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="400">
            <a href="#" class="inline-flex items-center bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 hover:from-blue-700 hover:via-indigo-700 hover:to-purple-700 text-white font-semibold py-4 px-8 rounded-xl transform transition-all duration-300 hover:scale-105 shadow-lg">
                <i class="fas fa-eye mr-3"></i>Lihat Semua Pengaduan
            </a>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="py-20 bg-white relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-20 right-10 w-64 h-64 bg-gradient-to-br from-purple-200/20 to-pink-300/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-10 w-96 h-96 bg-gradient-to-br from-indigo-200/20 to-blue-300/20 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Enhanced Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <!-- Modern Badge with Gradient -->
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-chart-bar mr-2"></i>
                    Statistik Pengaduan
                </div>
            </div>

            <!-- Enhanced Title with Gradient Text -->
            <div class="mb-8">
                <h2 class="text-5xl lg:text-6xl font-black mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-purple-800 to-pink-900 bg-clip-text text-transparent">
                        Data dalam Angka
                    </span>
                </h2>
                <div class="w-32 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Statistik lengkap pengaduan</span> masyarakat yang menunjukkan transparansi dan kinerja
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-purple-700">pelayanan publik</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-purple-200 to-pink-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Total Complaints -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/50 p-8 text-center transform transition-all duration-500 hover:scale-105 hover:shadow-3xl" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-inbox text-white text-3xl"></i>
                </div>
                <h3 class="text-4xl font-black text-blue-600 mb-3">156</h3>
                <p class="text-gray-700 font-bold text-lg mb-3">Total Pengaduan</p>
                <div class="bg-blue-50 rounded-2xl p-3 mb-4">
                    <small class="text-green-600 font-bold text-sm">
                        <i class="fas fa-arrow-up mr-1"></i>+12% dari bulan lalu
                    </small>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-500 h-2 rounded-full" style="width: 100%"></div>
                </div>
            </div>

            <!-- Completed -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/50 p-8 text-center transform transition-all duration-500 hover:scale-105 hover:shadow-3xl" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-check-circle text-white text-3xl"></i>
                </div>
                <h3 class="text-4xl font-black text-green-600 mb-3">89</h3>
                <p class="text-gray-700 font-bold text-lg mb-3">Selesai</p>
                <div class="bg-green-50 rounded-2xl p-3 mb-4">
                    <small class="text-green-600 font-bold text-sm">
                        <i class="fas fa-arrow-up mr-1"></i>57% dari total
                    </small>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: 57%"></div>
                </div>
            </div>

            <!-- In Progress -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/50 p-8 text-center transform transition-all duration-500 hover:scale-105 hover:shadow-3xl" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-clock text-white text-3xl"></i>
                </div>
                <h3 class="text-4xl font-black text-yellow-600 mb-3">45</h3>
                <p class="text-gray-700 font-bold text-lg mb-3">Dalam Proses</p>
                <div class="bg-yellow-50 rounded-2xl p-3 mb-4">
                    <small class="text-yellow-600 font-bold text-sm">
                        <i class="fas fa-minus mr-1"></i>29% dari total
                    </small>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-yellow-500 h-2 rounded-full" style="width: 29%"></div>
                </div>
            </div>

            <!-- Waiting -->
            <div class="group bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/50 p-8 text-center transform transition-all duration-500 hover:scale-105 hover:shadow-3xl" data-aos="fade-up" data-aos-delay="400">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-hourglass-start text-white text-3xl"></i>
                </div>
                <h3 class="text-4xl font-black text-purple-600 mb-3">22</h3>
                <p class="text-gray-700 font-bold text-lg mb-3">Menunggu</p>
                <div class="bg-purple-50 rounded-2xl p-3 mb-4">
                    <small class="text-purple-600 font-bold text-sm">
                        <i class="fas fa-minus mr-1"></i>14% dari total
                    </small>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-purple-500 h-2 rounded-full" style="width: 14%"></div>
                </div>
            </div>
        </div>

        <!-- Additional Stats Row -->
        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-3xl p-8 text-white text-center transform transition-all duration-500 hover:scale-105" data-aos="fade-up" data-aos-delay="500">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-stopwatch text-white text-2xl"></i>
                </div>
                <h4 class="text-2xl font-bold mb-2">Rata-rata Waktu</h4>
                <p class="text-3xl font-black text-yellow-300">3.2 Hari</p>
                <p class="text-blue-100 text-sm">Penanganan Pengaduan</p>
            </div>

            <div class="bg-gradient-to-br from-green-600 to-emerald-600 rounded-3xl p-8 text-white text-center transform transition-all duration-500 hover:scale-105" data-aos="fade-up" data-aos-delay="600">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-smile text-white text-2xl"></i>
                </div>
                <h4 class="text-2xl font-bold mb-2">Tingkat Kepuasan</h4>
                <p class="text-3xl font-black text-yellow-300">95%</p>
                <p class="text-green-100 text-sm">Warga Puas</p>
            </div>

            <div class="bg-gradient-to-br from-purple-600 to-pink-600 rounded-3xl p-8 text-white text-center transform transition-all duration-500 hover:scale-105" data-aos="fade-up" data-aos-delay="700">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h4 class="text-2xl font-bold mb-2">Partisipasi</h4>
                <p class="text-3xl font-black text-yellow-300">78%</p>
                <p class="text-purple-100 text-sm">Warga Aktif</p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- AOS via CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- Particles.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100,
            delay: 0
        });
    }

    // Initialize Particles.js
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-pengaduan', {
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
});
</script>

<script>
// Initialize form handlers when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const complaintForm = document.getElementById('complaintForm');

    if (complaintForm) {
        // Form submission
        complaintForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Show loading
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
            submitBtn.disabled = true;

            // Simulate form submission
            setTimeout(function() {
                showAlert('Pengaduan berhasil dikirim! Kami akan segera menindaklanjuti.', 'success');
                complaintForm.reset();

                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });

        // Form validation
        const formElements = complaintForm.querySelectorAll('input, select, textarea');
        formElements.forEach(function(element) {
            element.addEventListener('blur', function() {
                if (this.hasAttribute('required') && !this.value) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        });

        // Email validation
        const emailInput = complaintForm.querySelector('#email');
        if (emailInput) {
            emailInput.addEventListener('blur', function() {
                const email = this.value;
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (email && !emailRegex.test(email)) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        }
    }
});

function checkStatus() {
    const trackingNumber = document.getElementById('trackingNumber').value;

    if (!trackingNumber) {
        showAlert('Masukkan nomor tracking pengaduan!', 'warning');
        return;
    }

    // Show loading
    document.getElementById('statusResult').style.display = 'none';
    showAlert('Mencari status pengaduan...', 'info');

    // Simulate API call
    setTimeout(function() {
        document.getElementById('statusResult').style.display = 'block';
        showAlert('Status pengaduan ditemukan!', 'success');
    }, 1500);
}

// Alert function
function showAlert(message, type = 'info') {
    // Create alert element
    const alertDiv = document.createElement('div');
    alertDiv.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full`;

    // Set colors based on type
    switch(type) {
        case 'success':
            alertDiv.className += ' bg-green-500 text-white';
            break;
        case 'warning':
            alertDiv.className += ' bg-yellow-500 text-white';
            break;
        case 'error':
            alertDiv.className += ' bg-red-500 text-white';
            break;
        default:
            alertDiv.className += ' bg-blue-500 text-white';
    }

    alertDiv.innerHTML = `
        <div class="flex items-center">
            <span class="mr-2">${message}</span>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;

    // Add to page
    document.body.appendChild(alertDiv);

    // Animate in
    setTimeout(() => {
        alertDiv.classList.remove('translate-x-full');
    }, 100);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (alertDiv.parentElement) {
            alertDiv.classList.add('translate-x-full');
            setTimeout(() => {
                if (alertDiv.parentElement) {
                    alertDiv.remove();
                }
            }, 300);
        }
    }, 5000);
}
</script>
@endpush
