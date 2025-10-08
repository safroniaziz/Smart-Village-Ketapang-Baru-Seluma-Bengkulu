@extends('layouts.app-public')

@section('title', 'Visi & Misi - Smart Village Ketapang Baru')

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden min-h-screen flex items-center" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Particle.js Container for Visi Misi -->
    <div id="particles-visi" class="absolute inset-0"></div>

    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content (Centered) -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
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

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Visi &</span><br>
                        <span class="text-yellow-400 font-extrabold">Misi Desa</span>
                    </h1>

                    <!-- Badge Desa Digital -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-star mr-2 text-yellow-300 text-xs"></i>
                            Panduan Pembangunan
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Dengan pendekatan partisipatif melibatkan seluruh stakeholder desa, kami menetapkan visi dan misi yang menjadi
                        <span class="font-semibold text-yellow-300">panduan pembangunan berkelanjutan</span>
                    </p>

                    <!-- Key Points -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 max-w-4xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">{{ $visi ? '1' : '0' }}</div>
                            <div class="text-sm text-blue-100">Visi {{ $visi ? 'Bermartabat' : 'Belum Ada' }}</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">{{ $misi->count() }}</div>
                            <div class="text-sm text-blue-100">Misi Strategis</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <div class="text-2xl font-black text-yellow-400">{{ $pendekatan->count() + $tahapan->count() }}</div>
                            <div class="text-sm text-blue-100">Strategi Implementasi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    @if($visi)
                        <blockquote class="text-2xl lg:text-3xl font-bold leading-relaxed italic mb-12">
                            "{{ strtoupper($visi->visi) }}"
                        </blockquote>
                        @if($visi->deskripsi)
                            <div class="text-lg text-blue-100 leading-relaxed mb-8">
                                {{ $visi->deskripsi }}
                            </div>
                        @endif
                    @else
                        <blockquote class="text-2xl lg:text-3xl font-bold leading-relaxed italic mb-12">
                            "MENINGKATKAN KESEJAHTERAAN MASYARAKAT YANG BERMARTABAT DAN RELIGIUS DENGAN MENGEMBANGKAN POTENSI SUMBERDAYA"
                        </blockquote>
                    @endif

                    <!-- Visi Explanation -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @if($penjelasanVisi->count() > 0)
                            @foreach($penjelasanVisi as $item)
                                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                                    <div class="w-12 h-12 bg-{{ $item->warna }} rounded-xl flex items-center justify-center mx-auto mb-4">
                                        @if($item->icon)
                                            <i class="{{ $item->icon }} text-white"></i>
                                        @else
                                            <i class="fas fa-star text-white"></i>
                                        @endif
                                    </div>
                                    <h4 class="font-bold text-lg mb-2">{{ $item->judul }}</h4>
                                    <p class="text-blue-100 text-sm">{{ $item->deskripsi }}</p>
                                </div>
                            @endforeach
                        @else
                            <!-- Fallback jika tidak ada data -->
                            <div class="col-span-full text-center py-8">
                                <i class="fas fa-info-circle text-2xl text-blue-200 mb-2"></i>
                                <p class="text-blue-100 text-sm">Data penjelasan visi akan ditampilkan setelah ditambahkan oleh admin</p>
                            </div>
                        @endif
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
                        {{ $misi->count() }} Misi Desa
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-emerald-500 mx-auto rounded-full"></div>
            </div>

            <!-- Modern Description with Highlight -->
            <div class="max-w-4xl mx-auto">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">{{ $misi->count() }} misi strategis</span> yang akan dilaksanakan secara konsisten untuk mewujudkan
                    <span class="relative inline-block">
                        <span class="relative z-10 font-semibold text-green-700">visi Desa Ketapang Baru</span>
                        <span class="absolute bottom-0 left-0 w-full h-3 bg-gradient-to-r from-green-200 to-emerald-200 opacity-60 rounded"></span>
                    </span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if($misi->count() > 0)
                @foreach($misi as $index => $item)
                    <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-green-200" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-bullseye text-white text-xl"></i>
                        </div>
                        <div class="text-green-600 font-bold text-sm mb-2">MISI {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        <h4 class="font-bold text-gray-900 mb-3 leading-tight">{{ $item->judul }}</h4>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($item->deskripsi, 120) }}</p>
                        @if($item->indikator)
                            <div class="mt-3 pt-3 border-t border-gray-100">
                                <small class="text-green-600 font-semibold">Indikator:</small>
                                <small class="text-gray-500">{{ Str::limit($item->indikator, 80) }}</small>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <!-- Fallback jika tidak ada data -->
                <div class="col-span-full text-center py-12">
                    <i class="fas fa-info-circle text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum ada data misi</h3>
                    <p class="text-gray-500">Data misi akan ditampilkan setelah ditambahkan oleh admin</p>
                </div>
            @endif
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
                {{ $visi->deskripsi_section ?? 'Pendekatan partisipatif dalam mewujudkan visi dan misi desa dengan melibatkan seluruh komponen masyarakat' }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Strategy Content -->
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="800">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Pendekatan Partisipatif</h3>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        {{ $visi->pendekatan_deskripsi ?? 'Penyusunan Visi dan Misi Desa Ketapang Baru dilakukan dengan pendekatan partisipatif, melibatkan pihak-pihak yang berkepentingan di desa.' }}
                    </p>

                    <div class="space-y-4">
                        @if($pendekatan->count() > 0)
                            @foreach($pendekatan as $index => $item)
                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        @if($item->icon)
                                            <i class="{{ $item->icon }} text-white text-sm"></i>
                                        @else
                                            <i class="fas fa-check text-white text-sm"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-1">{{ $item->nama_pendekatan }}</h4>
                                        <p class="text-gray-600 text-sm">{{ Str::limit($item->deskripsi, 100) }}</p>
                                        @if($item->strategi)
                                            <p class="text-gray-500 text-xs mt-1">{{ Str::limit($item->strategi, 80) }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Fallback jika tidak ada data -->
                            <div class="text-center py-8">
                                <i class="fas fa-info-circle text-2xl text-gray-400 mb-2"></i>
                                <p class="text-gray-500 text-sm">Data pendekatan akan ditampilkan setelah ditambahkan oleh admin</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Timeline Illustration -->
            <div class="relative" data-aos="fade-left" data-aos-duration="800">
                <div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 rounded-3xl p-8 shadow-2xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Tahapan Implementasi</h3>

                    <div class="space-y-6">
                        @if($tahapan->count() > 0)
                            @foreach($tahapan as $index => $item)
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center shadow-lg">
                                        @if($item->icon)
                                            <i class="{{ $item->icon }} text-white text-sm"></i>
                                        @else
                                            <span class="text-white font-bold text-sm">{{ $index + 1 }}</span>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">{{ $item->nama_tahapan }}</h4>
                                        <p class="text-gray-600 text-sm">{{ Str::limit($item->deskripsi, 80) }}</p>
                                        @if($item->kegiatan)
                                            <p class="text-gray-500 text-xs mt-1">{{ Str::limit($item->kegiatan, 60) }}</p>
                                        @endif
                                        @if($item->waktu)
                                            <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full mt-1">{{ $item->waktu }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Fallback jika tidak ada data -->
                            <div class="text-center py-8">
                                <i class="fas fa-info-circle text-2xl text-gray-400 mb-2"></i>
                                <p class="text-gray-500 text-sm">Data tahapan akan ditampilkan setelah ditambahkan oleh admin</p>
                            </div>
                        @endif
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

    // Initialize Particles.js for Visi Misi page - ENHANCED VISIBILITY
    if (document.getElementById('particles-visi')) {
        particlesJS('particles-visi', {
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
