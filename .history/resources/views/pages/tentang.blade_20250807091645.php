@extends('layouts.app')

@section('title', 'Tentang Kami - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 text-white overflow-hidden py-20 lg:py-32">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center" data-aos="fade-up" data-aos-duration="800">
            <h1 class="text-4xl lg:text-6xl font-bold mb-6">
                Tentang <span class="text-yellow-400">Desa Ketapang Baru</span>
            </h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
                Desa yang maju, mandiri, dan sejahtera melalui pemanfaatan teknologi digital untuk kemajuan masyarakat.
            </p>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="py-24 bg-white">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Content -->
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="800">
                <div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">Sejarah Desa</h2>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Desa Ketapang Baru didirikan pada tahun 1985 dan telah mengalami perkembangan yang signifikan dalam berbagai aspek kehidupan masyarakat.
                        Dari awalnya hanya beberapa keluarga, kini telah berkembang menjadi desa yang maju dengan lebih dari 2.500 warga.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Desa ini dikenal dengan hasil pertaniannya yang melimpah, terutama padi yang menjadi komoditas utama.
                        Masyarakat desa terkenal dengan semangat gotong royong yang tinggi dan komitmen untuk membangun desa yang lebih baik.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center p-6 bg-blue-50 rounded-2xl">
                        <div class="text-3xl font-bold text-blue-600 mb-2">1985</div>
                        <div class="text-gray-600">Tahun Berdiri</div>
                    </div>
                    <div class="text-center p-6 bg-green-50 rounded-2xl">
                        <div class="text-3xl font-bold text-green-600 mb-2">2500+</div>
                        <div class="text-gray-600">Total Warga</div>
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div class="relative" data-aos="fade-left" data-aos-duration="800">
                <div class="w-full h-96 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl shadow-2xl flex items-center justify-center">
                    <div class="text-center text-white">
                        <svg class="w-32 h-32 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <h3 class="text-2xl font-bold mb-2">Desa Ketapang Baru</h3>
                        <p class="text-blue-100">Maju, Mandiri, Sejahtera</p>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 w-full h-full bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl -z-10"></div>
            </div>
        </div>
    </div>
</section>

<!-- Potentials Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">Potensi Desa</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Desa Ketapang Baru memiliki berbagai potensi yang dapat dikembangkan untuk kemajuan masyarakat.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="card-hover p-8 text-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="w-20 h-20 bg-green-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-seedling text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Pertanian</h3>
                <p class="text-gray-600">
                    Lahan pertanian yang subur dengan hasil padi yang melimpah.
                    Potensi pengembangan pertanian modern dan organik.
                </p>
            </div>

            <div class="card-hover p-8 text-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="w-20 h-20 bg-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-fish text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Perikanan</h3>
                <p class="text-gray-600">
                    Potensi budidaya ikan air tawar dan pengembangan kolam ikan
                    untuk meningkatkan ekonomi warga.
                </p>
            </div>

            <div class="card-hover p-8 text-center" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                <div class="w-20 h-20 bg-yellow-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-store text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">UMKM</h3>
                <p class="text-gray-600">
                    Pengembangan usaha mikro, kecil, dan menengah
                    untuk meningkatkan kesejahteraan masyarakat.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission Section -->
<section class="py-24 bg-white">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Vision -->
            <div class="card-hover p-8" data-aos="fade-right" data-aos-duration="800">
                <div class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi</h3>
                <p class="text-lg text-gray-600 leading-relaxed">
                    "Terwujudnya Desa Ketapang Baru yang maju, mandiri, dan sejahtera
                    melalui pemanfaatan teknologi digital dan pengembangan potensi lokal
                    untuk kemajuan masyarakat yang berkelanjutan."
                </p>
            </div>

            <!-- Mission -->
            <div class="card-hover p-8" data-aos="fade-left" data-aos-duration="800">
                <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-bullseye text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi</h3>
                <ul class="text-lg text-gray-600 leading-relaxed space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        Meningkatkan kualitas pendidikan dan kesehatan masyarakat
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        Mengembangkan ekonomi kerakyatan berbasis potensi lokal
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        Membangun infrastruktur desa yang modern dan berkelanjutan
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        Meningkatkan pelayanan publik melalui teknologi digital
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 text-white">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">Mari Bergabung Bersama Kami</h2>
            <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                Bersama-sama kita bangun Desa Ketapang Baru yang lebih maju dan sejahtera.
                Setiap kontribusi Anda sangat berarti untuk kemajuan desa.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('kontak') }}" class="btn-accent text-lg px-8 py-4">
                    <i class="fas fa-phone mr-2"></i>Hubungi Kami
                </a>
                <a href="{{ route('visi.misi') }}" class="btn-secondary text-lg px-8 py-4">
                    <i class="fas fa-info-circle mr-2"></i>Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
$(document).ready(function() {
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });
});
</script>
@endpush
