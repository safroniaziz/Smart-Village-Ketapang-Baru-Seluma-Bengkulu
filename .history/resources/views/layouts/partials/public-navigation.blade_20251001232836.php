<!-- Simple Public Navigation -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-sm">
    <div class="w-full lg:w-[80%] max-w-none mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-lg flex items-center justify-center">
                        <i class="fas fa-building text-white text-lg"></i>
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-lg font-bold text-gray-900">Smart Village</h1>
                        <p class="text-xs text-gray-600">Ketapang Baru</p>
                    </div>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('home') ? 'text-blue-600 font-semibold' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('tentang') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('tentang') ? 'text-blue-600 font-semibold' : '' }}">
                    Tentang
                </a>
                <a href="{{ route('struktur') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('struktur') ? 'text-blue-600 font-semibold' : '' }}">
                    Struktur
                </a>
                <a href="{{ route('data.warga') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('data.warga') ? 'text-blue-600 font-semibold' : '' }}">
                    Data Warga
                </a>
                <a href="{{ route('berita') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('berita') ? 'text-blue-600 font-semibold' : '' }}">
                    Berita
                </a>
                <a href="{{ route('pengumuman') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('pengumuman') ? 'text-blue-600 font-semibold' : '' }}">
                    Pengumuman
                </a>
                <a href="{{ route('potensi-wisata.index') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('potensi-wisata.*') ? 'text-blue-600 font-semibold' : '' }}">
                    Potensi Wisata
                </a>
                <a href="{{ route('surat.online') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    Surat Online
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('tentang') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('tentang') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Tentang
                </a>
                <a href="{{ route('struktur') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('struktur') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Struktur
                </a>
                <a href="{{ route('data.warga') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('data.warga') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Data Warga
                </a>
                <a href="{{ route('berita') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('berita') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Berita
                </a>
                <a href="{{ route('pengumuman') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors {{ request()->routeIs('pengumuman') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Pengumuman
                </a>
                <a href="{{ route('surat.online') }}" class="block mx-3 my-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium text-center">
                    Surat Online
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
});
</script>