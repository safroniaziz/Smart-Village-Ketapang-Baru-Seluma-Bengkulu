@extends('layouts.app-public')

@section('title', 'Peta Desa - Smart Village Ketapang Baru')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-Ho3Q0RyY4wQtwj0Q1sS2mZ0b7N2b5VQQl9Z4b6VtqvH8lJ0m6EJ2lT2qYq8J2b6P9m1oX4m0m7W2YqFqSxq2aA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.aos-disabled [data-aos] { opacity: 1 !important; transform: none !important; }
#map {
    height: 700px;
    border-radius: 20px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}
.gm-style .gm-style-iw-c {
    border-radius: 16px !important;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
    padding: 20px !important;
    max-width: 320px !important;
}
.gm-style .gm-style-iw-t::after {
    display: none !important;
}
.gm-ui-hover-effect {
    top: 8px !important;
    right: 8px !important;
}
.popup-content img {
    max-width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 12px;
    display: block;
    margin-top: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}
.popup-name {
    font-size: 18px;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 8px;
}
.popup-nik {
    font-size: 13px;
    color: #6b7280;
    background: #f3f4f6;
    padding: 4px 12px;
    border-radius: 6px;
    display: inline-block;
    margin-bottom: 8px;
}
.popup-coords {
    font-size: 11px;
    color: #9ca3af;
    margin-top: 8px;
}
.marker {
    background-size: cover;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    border: 3px solid white;
    box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
}
.marker:hover {
    transform: scale(1.2);
    box-shadow: 0 8px 12px rgba(0,0,0,0.3);
    z-index: 10;
}
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="relative text-white overflow-hidden min-h-[calc(100vh-4rem)] md:min-h-[calc(100vh-5rem)] flex items-center pt-8 py-8 lg:py-12 pb-16 lg:pb-20 mb-4 md:mb-6" style="background: linear-gradient(135deg, #0086c9 0%, #0074b3 50%, #006ba3 100%);" data-aos="fade-in">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/5" data-aos="fade-in" data-aos-delay="100"></div>

    <!-- Particle.js Container -->
    <div id="particles-peta" class="absolute inset-0" data-aos="fade-in" data-aos-delay="200"></div>

    <div class="relative w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20" data-aos="fade-up" data-aos-delay="300">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8">
            <!-- Hero Content -->
            <div class="flex-1 max-w-4xl relative z-10">
                <div class="text-center space-y-8">
                    <!-- Badge -->
                    <div class="flex items-center justify-center space-x-3 mb-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-blue-100">GEOGRAFIS DESA</h2>
                            <p class="text-sm text-blue-100">Peta Interaktif Digital</p>
                        </div>
                    </div>

                    <!-- Main Title -->
                    <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6" data-aos="fade-up" data-aos-delay="400">
                        <span class="text-white">Peta</span><br>
                        <span class="text-yellow-400 font-extrabold">Desa</span>
                    </h1>

                    <!-- Badge -->
                    <div class="mb-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg">
                            <i class="fas fa-map-marked-alt mr-2 text-yellow-300 text-xs"></i>
                            Peta Interaktif & Detail
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto font-light mb-12" data-aos="fade-up" data-aos-delay="600">
                        Eksplorasi peta desa interaktif dengan informasi detail setiap wilayah, batas dusun, dan
                        <span class="font-semibold text-yellow-300">fasilitas umum terkini</span>
                    </p>

                    <!-- Enhanced Quick Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-6xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">24.771</div>
                                <i class="fas fa-globe text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Hektar Luas</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-expand-arrows-alt text-green-300 mr-1"></i>
                                Total area desa
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">3</div>
                                <i class="fas fa-map-marker-alt text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Dusun</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-layer-group text-blue-300 mr-1"></i>
                                Wilayah administratif
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">12</div>
                                <i class="fas fa-home text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">RT/RW</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-users text-orange-300 mr-1"></i>
                                Unit terkecil
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-2xl font-black text-yellow-400">100%</div>
                                <i class="fas fa-check-circle text-white/60 text-lg"></i>
                            </div>
                            <div class="text-sm text-blue-100">Terpetakan</div>
                            <div class="text-xs text-blue-200 mt-1">
                                <i class="fas fa-satellite text-green-300 mr-1"></i>
                                Digital mapping
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

<!-- Map Section -->
<section class="py-16 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-full text-sm font-semibold shadow-lg mb-6">
                <i class="fas fa-map-marked-alt mr-2 text-yellow-300"></i>
                Peta Interaktif Digital
            </div>

            <h2 class="text-4xl font-bold mb-4" data-aos="fade-up">
                <span class="text-blue-600">Peta Lahan</span> Desa Ketapang Baru
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full mx-auto mb-6"></div>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
                Jelajahi <span class="font-bold text-blue-600">{{ count($realData ?? []) }} titik lahan</span> dengan peta interaktif yang menampilkan detail setiap lokasi
            </p>

            <!-- Map Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white rounded-xl p-4 shadow-md border-2 border-blue-100">
                    <div class="text-3xl font-bold text-blue-600 mb-1">{{ count($realData ?? []) }}</div>
                    <div class="text-sm text-gray-600 font-medium">Total Lahan</div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-md border-2 border-green-100">
                    <div class="text-3xl font-bold text-green-600 mb-1">100%</div>
                    <div class="text-sm text-gray-600 font-medium">Terpetakan</div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-md border-2 border-purple-100">
                    <div class="text-3xl font-bold text-purple-600 mb-1">GPS</div>
                    <div class="text-sm text-gray-600 font-medium">Akurat</div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-md border-2 border-orange-100">
                    <div class="text-3xl font-bold text-orange-600 mb-1">Live</div>
                    <div class="text-sm text-gray-600 font-medium">Real-time</div>
                </div>
            </div>
        </div>

        <!-- Legenda & Statistik (di atas map) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8" data-aos="fade-up">
            <!-- Legend -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 px-5 py-4">
                    <h3 class="text-white font-bold text-lg flex items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        Legenda Peta
                    </h3>
                </div>
                <div class="p-5 flex flex-wrap gap-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full border-3 border-white shadow-lg flex-shrink-0"></div>
                        <span class="text-sm font-medium text-gray-700">Marker Lahan</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full border-3 border-red-500 bg-red-500/30 shadow-lg flex-shrink-0"></div>
                        <span class="text-sm font-medium text-gray-700">Area ~50m</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-xs shadow-lg flex-shrink-0">
                            <i class="fas fa-image"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Dengan Foto</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-palette text-2xl text-yellow-600"></i>
                        <span class="text-sm font-medium text-gray-700">Warna Random</span>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-orange-600 via-red-600 to-pink-600 px-5 py-4">
                    <h3 class="text-white font-bold text-lg flex items-center">
                        <i class="fas fa-chart-bar mr-2"></i>
                        Statistik Lahan
                    </h3>
                </div>
                <div class="p-5 flex items-center justify-around">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-600 mb-1">{{ count($realData ?? []) }}</div>
                        <div class="text-sm text-gray-600">Total Lahan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600 mb-1">{{ count(array_filter($realData ?? [], fn($item) => !empty($item['nik']) && $item['nik'] !== '-')) }}</div>
                        <div class="text-sm text-gray-600">Dengan Foto</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-purple-600 mb-1">100%</div>
                        <div class="text-sm text-gray-600">Akurasi GPS</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Full Width -->
        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 px-6 py-5 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h3 class="text-white font-bold text-xl">Peta Interaktif Lahan Desa</h3>
                    <p class="text-blue-100 text-sm">Klik marker atau area untuk melihat detail lahan</p>
                </div>
                <div class="flex space-x-2">
                    <button onclick="if(typeof map !== 'undefined' && map.setZoom) map.setZoom(map.getZoom() + 1)" class="p-3 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-200 hover:scale-110" title="Zoom In">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button onclick="if(typeof map !== 'undefined' && map.setZoom) map.setZoom(map.getZoom() - 1)" class="p-3 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-200 hover:scale-110" title="Zoom Out">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button onclick="resetMapView()" class="p-3 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-200 hover:scale-110" title="Reset">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                <div class="relative max-w-2xl">
                    <input
                        type="text"
                        id="searchLocation"
                        placeholder="🔍 Cari nama pemilik lahan atau NIK..."
                        class="w-full px-5 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300"
                    />
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>

            <div class="p-0">
                <div id="map" class="h-[700px] w-full"></div>
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
<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&callback=initMap&libraries=visualization" async defer></script>

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
        particlesJS('particles-peta', {
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
let map, markers = [], allData = [], circles = [];

// Color palette untuk lahan
const colors = [
    '#FF6B6B', '#4ECDC4', '#45B7D1', '#FFA07A', '#98D8C8',
    '#F7DC6F', '#BB8FCE', '#85C1E2', '#F8B739', '#52B788',
    '#E63946', '#F77F00', '#06FFA5', '#118AB2', '#073B4C'
];

function initMap() {
    // Data from backend
    allData = @json($realData ?? []);
    const imgBase = '{{ asset('assets/images/gambar_lahan') }}';

    // Initialize Google Map with Hybrid view (satellite + labels)
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -4.314632, lng: 102.763257 },
        zoom: 14,
        mapTypeId: 'hybrid', // Satellite view with labels
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.TOP_RIGHT,
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain']
        },
        streetViewControl: true,
        fullscreenControl: true,
        zoomControl: true,
        styles: [] // No custom styling needed
    });

    const bounds = new google.maps.LatLngBounds();

    allData.forEach((item, index) => {
        const lat = parseFloat(item.lat);
        const lng = parseFloat(item.long);
        if (isNaN(lat) || isNaN(lng)) return;

        const nik = (item.nik || '').trim();
        const name = item.nama_lengkap || 'Tidak diketahui';
        const imgUrl = (item.foto_path && item.foto_path.trim() !== '')
            ? `{{ asset('') }}${item.foto_path.replace(/^\//, '')}`
            : (nik && nik !== '-' ? `${imgBase}/${nik}.jpg` : null);

        const color = colors[index % colors.length];
        const position = { lat, lng };

        // Create custom marker icon (colored pin)
        const markerIcon = {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: color,
            fillOpacity: 1,
            strokeColor: '#ffffff',
            strokeWeight: 3,
            scale: 12
        };

        // Create marker
        const marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: markerIcon,
            title: name,
            animation: google.maps.Animation.DROP
        });

        // Create circle for area visualization
        const circle = new google.maps.Circle({
            strokeColor: color,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: color,
            fillOpacity: 0.25,
            map: map,
            center: position,
            radius: 50 // 50 meters
        });

        // Create info window HTML
        const infoContent = `
            <div class="popup-content" style="font-family: Inter, sans-serif;">
                <div class="popup-name">${name}</div>
                ${nik && nik !== '-' ? `<div class="popup-nik"><i class="fas fa-id-card mr-1"></i>${nik}</div>` : ''}
                ${imgUrl ? `<img src="${imgUrl}" alt="${name}" onerror="this.style.display='none'" loading="lazy"/>` : ''}
                <div class="popup-coords">
                    <i class="fas fa-map-pin mr-1"></i>
                    ${lat.toFixed(6)}, ${lng.toFixed(6)}
                </div>
            </div>
        `;

        const infoWindow = new google.maps.InfoWindow({
            content: infoContent,
            maxWidth: 320
        });

        // Click marker to show info
        marker.addListener('click', () => {
            // Close all other info windows
            markers.forEach(m => {
                if (m.infoWindow) m.infoWindow.close();
            });
            infoWindow.open(map, marker);
        });

        // Click circle to show info
        circle.addListener('click', () => {
            markers.forEach(m => {
                if (m.infoWindow) m.infoWindow.close();
            });
            infoWindow.open(map, marker);
        });

        // Store references
        marker.itemData = item;
        marker.circle = circle;
        marker.infoWindow = infoWindow;
        markers.push(marker);
        circles.push(circle);
        bounds.extend(position);
    });

    if (!bounds.isEmpty()) {
        map.fitBounds(bounds);
        // Set max zoom after fitBounds
        google.maps.event.addListenerOnce(map, 'bounds_changed', () => {
            if (map.getZoom() > 16) map.setZoom(16);
        });
    }

    setupSearch();
}

// Note: initMap akan dipanggil otomatis oleh Google Maps API callback

function setupSearch() {
    const searchInput = document.getElementById('searchLocation');
    if (!searchInput) return;

    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase().trim();

        if (query.length < 2) {
            // Reset all markers and circles
            markers.forEach((m) => {
                m.setOpacity(1);
                if (m.circle) m.circle.setOptions({ fillOpacity: 0.25, strokeOpacity: 0.8 });
            });
            return;
        }

        let found = false;
        markers.forEach((m) => {
            const name = (m.itemData.nama_lengkap || '').toLowerCase();
            const nik = (m.itemData.nik || '').toLowerCase();

            if (name.includes(query) || nik.includes(query)) {
                m.setOpacity(1);
                if (m.circle) m.circle.setOptions({ fillOpacity: 0.4, strokeOpacity: 1 });

                if (!found) {
                    // Smooth pan and zoom to marker
                    map.panTo(m.getPosition());
                    map.setZoom(17);

                    // Close all info windows
                    markers.forEach(marker => {
                        if (marker.infoWindow) marker.infoWindow.close();
                    });

                    // Open this marker's info window
                    if (m.infoWindow) {
                        m.infoWindow.open(map, m);
                    }

                    // Bounce animation
                    m.setAnimation(google.maps.Animation.BOUNCE);
                    setTimeout(() => m.setAnimation(null), 2000);

                    found = true;
                }
            } else {
                m.setOpacity(0.3);
                if (m.circle) m.circle.setOptions({ fillOpacity: 0.1, strokeOpacity: 0.3 });
            }
        });
    });
}

function resetMapView() {
    if (!map || markers.length === 0) return;

    const bounds = new google.maps.LatLngBounds();
    markers.forEach(m => bounds.extend(m.getPosition()));

    map.fitBounds(bounds);

    // Set max zoom
    google.maps.event.addListenerOnce(map, 'bounds_changed', () => {
        if (map.getZoom() > 16) map.setZoom(16);
    });

    // Reset search
    const searchInput = document.getElementById('searchLocation');
    if (searchInput) searchInput.value = '';

    // Reset marker and circle opacity
    markers.forEach((m) => {
        m.setOpacity(1);
        if (m.circle) m.circle.setOptions({ fillOpacity: 0.25, strokeOpacity: 0.8 });
        if (m.infoWindow) m.infoWindow.close();
    });
}
</script>
@endpush
