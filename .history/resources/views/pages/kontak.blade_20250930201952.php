@extends('layouts.app-public')

@section('title', 'Kontak - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<style>
    :root { --primary-blue-start:#0086c9; --primary-blue-mid:#0074b3; --primary-blue-end:#006ba3; }
    .hero-section { background: linear-gradient(135deg, var(--primary-blue-start), var(--primary-blue-mid), var(--primary-blue-end)); background-size: 200% 200%; animation: heroShift 8s ease infinite; position: relative; overflow: hidden; min-height: 64vh; }
    .hero-section::before { content:''; position:absolute; inset:0; background: radial-gradient(ellipse at top left, rgba(255,255,255,.08), transparent 60%), radial-gradient(ellipse at bottom right, rgba(255,255,255,.06), transparent 60%); }
    @keyframes heroShift { 0%,100%{background-position:0% 50%} 50%{background-position:100% 50%} }
    .contact-card { background:#fff; border:1px solid rgba(0,0,0,.06); border-radius:1.25rem; box-shadow:0 10px 30px rgba(0,0,0,.06); transition:transform .25s ease, box-shadow .25s ease; }
    .contact-card:hover { transform: translateY(-4px); box-shadow:0 16px 40px rgba(0,0,0,.08); }
    .info-card { background:linear-gradient(135deg, rgba(255,255,255,.98), rgba(255,255,255,.9)); border:1px solid rgba(0,0,0,.06); border-radius:1rem; }
    .icon-container { width:3rem; height:3rem; border-radius:.75rem; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#0086c9,#0074b3); color:#fff; }
</style>
@endpush

@section('content')
<!-- Hero (two-sided) -->
<section class="hero-section text-white py-20 relative" data-aos="fade-in">
    <div class="absolute inset-0 opacity-10" id="particles-kontak"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <!-- Left: text -->
            <div data-aos="fade-right" data-aos-delay="100">
                <div class="inline-flex items-center gap-3 mb-5">
                    <div class="icon-container"><i class="fas fa-phone"></i></div>
                    <div>
                        <p class="text-blue-100 text-sm">Layanan Informasi</p>
                        <h2 class="text-lg font-semibold text-blue-100">Kontak Resmi Desa</h2>
                    </div>
                </div>
                <h1 class="text-4xl lg:text-5xl font-black leading-tight mb-4">Hubungi Pemerintah Desa</h1>
                <p class="text-blue-100 text-lg mb-8">Alamat, telepon, email, dan jam operasional kantor desa.</p>
                <div class="flex flex-wrap gap-3">
                    @if($kontak->telepon)
                    <a href="tel:{{ $kontak->telepon }}" class="bg-white/10 hover:bg-white/20 text-white px-5 py-3 rounded-xl font-semibold transition"><i class="fas fa-phone mr-2"></i>Telepon</a>
                    @endif
                    @if($kontak->email)
                    <a href="mailto:{{ $kontak->email }}" class="bg-white/10 hover:bg-white/20 text-white px-5 py-3 rounded-xl font-semibold transition"><i class="fas fa-envelope mr-2"></i>Email</a>
                    @endif
                    @if(isset($monografi) && $monografi && $monografi->google_street_view_url)
                    <a href="{{ $monografi->google_street_view_url }}" target="_blank" class="bg-white text-blue-700 hover:bg-blue-50 px-5 py-3 rounded-xl font-semibold transition" rel="noopener"><i class="fas fa-street-view mr-2"></i>Lihat Street View</a>
                    @endif
                </div>
            </div>
            <!-- Right: visual card -->
            <div data-aos="fade-left" data-aos-delay="150">
                <div class="bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl p-4 lg:p-5 shadow-xl">
                    <div class="bg-white/10 rounded-xl p-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/20 rounded-lg p-4">
                                <div class="text-blue-100 text-sm">Alamat</div>
                                <div class="font-bold text-white mt-1 line-clamp-3">{{ $kontak->alamat_lengkap }}</div>
                            </div>
                            <div class="bg-white/20 rounded-lg p-4">
                                <div class="text-blue-100 text-sm">Telepon</div>
                                <div class="font-bold text-white mt-1">{{ $kontak->telepon ?: '-' }}</div>
                            </div>
                            <div class="bg-white/20 rounded-lg p-4">
                                <div class="text-blue-100 text-sm">Email</div>
                                <div class="font-bold text-white mt-1">{{ $kontak->email ?: '-' }}</div>
                            </div>
                            <div class="bg-white/20 rounded-lg p-4">
                                <div class="text-blue-100 text-sm">Jam Layanan</div>
                                <div class="font-bold text-white mt-1">Senin–Jumat</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Header (Info) -->
<section class="pt-6 pb-4 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center" data-aos="fade-up">
            <div class="inline-flex items-center relative mb-6">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                    <i class="fas fa-address-card mr-2"></i>
                    Informasi Kontak
                </div>
            </div>
            <div class="mb-8">
                <h2 class="text-4xl lg:text-5xl font-black mb-4">
                    <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent">
                        Detail Kontak Desa
                    </span>
                </h2>
                <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto"></div>
            </div>
            <div class="max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed">
                    <span class="font-semibold text-slate-700">Data kontak resmi</span> yang dapat dihubungi pada jam kerja kantor desa.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Info Section -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Left: quick info cards -->
            <div class="space-y-5" data-aos="fade-right" data-aos-delay="100">
                <div class="info-card p-6">
                    <div class="flex items-start gap-4">
                        <div class="icon-container"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Alamat Kantor</h3>
                            <p class="text-gray-700">{{ $kontak->alamat_lengkap }}</p>
                        </div>
                    </div>
                </div>
                <div class="info-card p-6">
                    <div class="flex items-start gap-4">
                        <div class="icon-container"><i class="fas fa-phone"></i></div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Telepon</h3>
                            <p class="text-gray-700">{{ $kontak->telepon ?: 'Belum tersedia' }}</p>
                        </div>
                    </div>
                </div>
                <div class="info-card p-6">
                    <div class="flex items-start gap-4">
                        <div class="icon-container"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                            <p class="text-gray-700">{{ $kontak->email ?: 'Belum tersedia' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: details -->
            <div class="contact-card p-8" data-aos="fade-left" data-aos-delay="150">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-building text-white"></i>
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-black mb-3">
                        <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-violet-600 bg-clip-text text-transparent">
                            {{ $kontak->nama_desa }}
                        </span>
                    </h3>
                    <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto mb-3"></div>
                    <p class="text-gray-600 text-base lg:text-lg">{{ $kontak->deskripsi ?: 'Desa yang maju dan sejahtera' }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                    @if($kontak->kepala_desa)
                    <div class="p-4 bg-blue-50 rounded-lg text-center">
                        <i class="fas fa-user-tie text-blue-600 mb-2"></i>
                        <div class="font-semibold">Kepala Desa</div>
                        <div class="text-sm text-gray-700">{{ $kontak->kepala_desa }}</div>
                    </div>
                    @endif
                    @if($kontak->sekretaris_desa)
                    <div class="p-4 bg-green-50 rounded-lg text-center">
                        <i class="fas fa-user text-green-600 mb-2"></i>
                        <div class="font-semibold">Sekretaris Desa</div>
                        <div class="text-sm text-gray-700">{{ $kontak->sekretaris_desa }}</div>
                    </div>
                    @endif
                </div>

                @if($kontak->jam_operasional_formatted && count($kontak->jam_operasional_formatted))
                <div class="bg-gray-50 rounded-xl p-6">
                    <h4 class="font-semibold text-gray-900 mb-3 flex items-center"><i class="fas fa-clock text-blue-600 mr-2"></i>Jam Operasional</h4>
                    <div class="space-y-2">
                        @foreach($kontak->jam_operasional_formatted as $hari)
                        <div class="flex justify_between items-center py-1.5 border-b border-gray-200 last:border-b-0">
                            <span class="text-gray-700">{{ $hari }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="mt-6 flex flex-col sm:flex-row gap-4">
                    @if($kontak->telepon)
                    <a href="tel:{{ $kontak->telepon }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-semibold text-center transition"><i class="fas fa-phone mr-2"></i>Telepon</a>
                    @endif
                    @if($kontak->email)
                    <a href="mailto:{{ $kontak->email }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold text-center transition"><i class="fas fa-envelope mr-2"></i>Email</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Header (Map) -->
@if((isset($monografi) && $monografi) || $mapUrl || $kontak->koordinat)
<section class="pt-6 pb-4 bg-gray-50">
    <div class="max-w-7xl mx_auto px-4 sm:px-6 lg:px-8">
        <div class="text-center" data-aos="fade-up">
            <div class="inline-flex items-center relative mb-4">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur-lg opacity-20"></div>
                <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2 rounded-full text-sm font-semibold">Lokasi Kantor</div>
            </div>
            <h2 class="text-3xl lg:text-4xl font-black mb-3">Peta & Street View</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Lihat lokasi kantor desa pada peta dan jelajahi area sekitar melalui Google Street View.</p>
        </div>
    </div>
</section>
@endif

<!-- Map Section -->
@if((isset($monografi) && $monografi) || $mapUrl || $kontak->koordinat)
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden" data-aos="fade-up" data-aos-delay="150">
            @if(isset($embedStreetViewMapUrl) && $embedStreetViewMapUrl)
                <iframe
                    src="{{ $embedStreetViewMapUrl }}"
                    class="w-full h-[600px] rounded-b-2xl border-0"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allow="accelerometer; gyroscope; payment; geolocation"
                    sandbox="allow-scripts allow-same-origin allow-popups allow-forms allow-presentation"
                    title="Google Street View Balai Desa Ketapang Baru"
                    style="border: none;"></iframe>
            @elseif($mapUrl)
                <iframe
                    src="{{ $mapUrl }}"
                    class="w-full h-[450px] rounded-b-2xl border-0"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allow="accelerometer; gyroscope; payment; geolocation"
                    sandbox="allow-scripts allow-same-origin allow-popups allow-forms allow-presentation"
                    title="Peta Lokasi Kantor Desa"
                    style="border: none;"></iframe>
            @else
                <div class="h-96 bg-gray-200 flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-map-marked-alt text-4xl text-gray-400 mb-4"></i>
                        <p class="text-gray-600">Koordinat: {{ $kontak->koordinat }}</p>
                    </div>
                </div>
            @endif
        </div>
        @if(isset($monografi) && $monografi && $monografi->google_street_view_url)
        <div class="text-center mt-6" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ $monografi->google_street_view_url }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition" rel="noopener">
                <i class="fas fa-street-view"></i>
                Buka Street View di Tab Baru
            </a>
        </div>
        @endif
    </div>
</section>
@endif
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  AOS.init({ duration: 900, once: true, offset: 100 });
  if (document.getElementById('particles-kontak')) {
    particlesJS('particles-kontak', { particles: { number:{ value:60, density:{ enable:true, value_area:800 } }, color:{ value:'#ffffff' }, shape:{ type:'circle' }, opacity:{ value:.4 }, size:{ value:3, random:true }, line_linked:{ enable:true, distance:150, color:'#ffffff', opacity:.3, width:1 }, move:{ enable:true, speed:1.6 } }, interactivity:{ events:{ onhover:{ enable:true, mode:'repulse' } } }, retina_detect:true });
  }
});
</script>
@endpush
