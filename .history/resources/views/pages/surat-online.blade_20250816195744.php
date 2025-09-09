@extends('layouts.app')

@section('title', 'Surat Online - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-Ho3Q0RyY4wQtwj0Q1sS2mZ0b7N2b5VQQl9Z4b6VtqvH8lJ0m6EJ2lT2qYq8J2b6P9m1oX4m0m7W2YqFqSxq2aA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.aos-disabled [data-aos] { opacity: 1 !important; transform: none !important; }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden pt-8 py-8 lg:py-12 pb-24 lg:pb-20" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100"></div>

    <!-- Particle.js Container -->
    <div id="particles-surat" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20" data-aos="fade-up" data-aos-delay="300">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-envelope text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">LAYANAN DIGITAL</h2>
                            <p class="text-sm text-blue-100">Surat Online Desa</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Surat</span><br>
                        <span class="text-yellow-400 font-extrabold">Online</span>
                    </h1>

                    <!-- Badge -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-clock mr-2 text-yellow-300 text-xs"></i>
                            Proses Cepat & Transparan
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Ajukan surat secara online tanpa perlu antri. Sistem terintegrasi untuk pelayanan administrasi yang
                        <span class="font-semibold text-yellow-300">efisien dan transparan</span>
                    </p>

                    <!-- Enhanced Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-6xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">7</div>
                                <i class="fas fa-file-alt text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Jenis Surat</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-list text-blue-300 mr-1"></i>
                                Layanan tersedia
                            </div>
                        </div>

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
                                <div class="text-2xl font-black text-yellow-400">3</div>
                                <i class="fas fa-hourglass-half text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Hari Proses</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-lightning-bolt text-orange-300 mr-1"></i>
                                Maksimal waktu
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">100%</div>
                                <i class="fas fa-mobile-alt text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Digital</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-leaf text-green-300 mr-1"></i>
                                Paperless system
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

<!-- Service Types -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Jenis Surat yang Tersedia</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pilih jenis surat yang ingin Anda ajukan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-envelope text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Pengantar</h3>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Surat pengantar untuk pengurusan KTP, KK, dan dokumen lainnya.
                    </p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pengurusan KTP</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pengurusan KK</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pengurusan Akta</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pengurusan Izin</span></li>
                    </ul>
                    <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-file-alt text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Keterangan</h3>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Surat keterangan domisili, usaha, dan keterangan lainnya.
                    </p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Keterangan Domisili</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Keterangan Usaha</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Keterangan Miskin</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Keterangan Lainnya</span></li>
                    </ul>
                    <a href="#" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-yellow-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-thumbs-up text-3xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Rekomendasi</h3>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Surat rekomendasi untuk beasiswa, pekerjaan, dan lainnya.
                    </p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Rekomendasi Beasiswa</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Rekomendasi Kerja</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Rekomendasi Usaha</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Rekomendasi Lainnya</span></li>
                    </ul>
                    <a href="#" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="400">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-cyan-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-clipboard-check text-3xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Izin</h3>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Surat izin keramaian, mendirikan bangunan, dan izin lainnya.
                    </p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Izin Keramaian</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Izin Mendirikan Bangunan</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Izin Usaha</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Izin Lainnya</span></li>
                    </ul>
                    <a href="#" class="bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="500">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-red-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-handshake text-3xl text-red-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Pernyataan</h3>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Surat pernyataan untuk berbagai keperluan administrasi.
                    </p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pernyataan Ahli Waris</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pernyataan Belum Menikah</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pernyataan Miskin</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Pernyataan Lainnya</span></li>
                    </ul>
                    <a href="#" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="600">
                <div class="p-8 text-center h-full flex flex-col">
                    <div class="bg-gray-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-ellipsis-h text-3xl text-gray-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Surat Lainnya</h3>
                    <p class="text-gray-600 mb-6 flex-grow">
                        Surat-surat lainnya yang tidak termasuk dalam kategori di atas.
                    </p>
                    <ul class="text-left space-y-2 mb-6">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Surat Kuasa</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Surat Keterangan Lainnya</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Surat Pengantar Lainnya</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Surat Khusus</span></li>
                    </ul>
                    <a href="#" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 mt-auto">Ajukan Surat</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How to Apply -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4" data-aos="fade-up">Cara Mengajukan Surat Online</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">Ikuti langkah-langkah berikut untuk mengajukan surat</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-blue-600">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Pilih Jenis Surat</h3>
                <p class="text-gray-600">
                    Pilih jenis surat yang ingin Anda ajukan dari daftar yang tersedia.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-green-600">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Isi Formulir</h3>
                <p class="text-gray-600">
                    Isi formulir dengan data yang lengkap dan benar sesuai persyaratan.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-yellow-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-yellow-600">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Upload Dokumen</h3>
                <p class="text-gray-600">
                    Upload dokumen pendukung yang diperlukan dalam format PDF atau JPG.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 text-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-purple-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-purple-600">4</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Submit & Track</h3>
                <p class="text-gray-600">
                    Submit pengajuan dan pantau status surat Anda melalui sistem tracking.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Requirements -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4" data-aos="fade-up">Persyaratan Umum</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Pastikan Anda memenuhi persyaratan berikut sebelum mengajukan surat
            </p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-100 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                            <i class="fas fa-id-card text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Dokumen Wajib</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">KTP Asli (foto)</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Kartu Keluarga (foto)</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Surat Pengantar RT/RW</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Dokumen pendukung lainnya</span></li>
                    </ul>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-100 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                            <i class="fas fa-file-alt text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Ketentuan</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Warga Desa Ketapang Baru</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Data yang diisi benar</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Dokumen lengkap</span></li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i><span class="text-gray-700">Mengikuti prosedur</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 mt-8" data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-start">
                <div class="bg-blue-100 rounded-full w-10 h-10 flex items-center justify-center mr-4 mt-1">
                    <i class="fas fa-lightbulb text-blue-600"></i>
                </div>
                <div>
                    <h4 class="font-bold text-blue-900 mb-2">Tips Penting</h4>
                    <p class="text-blue-800">Pastikan semua dokumen sudah dipersiapkan sebelum mengajukan surat online.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6" data-aos="fade-up">Siap Mengajukan Surat?</h2>
            <p class="text-xl mb-8 text-blue-100" data-aos="fade-up" data-aos-delay="100">
                Proses pengajuan surat online yang mudah, cepat, dan terpercaya.
                Mulai ajukan surat Anda sekarang juga!
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
                <a href="#" class="bg-white text-blue-600 hover:bg-gray-100 font-semibold py-4 px-8 rounded-lg transition-colors duration-300 inline-flex items-center justify-center">
                    <i class="fas fa-file-plus mr-3"></i>Ajukan Surat Sekarang
                </a>
                <a href="#" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 font-semibold py-4 px-8 rounded-lg transition-colors duration-300 inline-flex items-center justify-center">
                    <i class="fas fa-question-circle mr-3"></i>Bantuan
                </a>
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
    // Initialize AOS
    setTimeout(() => {
        if (typeof AOS !== 'undefined') {
            document.documentElement.classList.remove('aos-disabled');
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100,
                delay: 0
            });
        }
    }, 100);

    // Initialize Particles.js
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-surat', {
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
@endpush
