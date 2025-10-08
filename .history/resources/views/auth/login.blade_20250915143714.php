<x-guest-layout>
    <!-- Left Side - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gray-50 relative">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-50 via-white to-blue-50"></div>
        
        <div class="w-full max-w-md relative z-10 slide-in">
            <!-- Mobile Header -->
            <div class="lg:hidden text-center mb-10">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-6 logo-animation">
                    <i class="fas fa-mountain-city text-3xl text-white"></i>
                </div>
                <h1 class="text-3xl font-black text-gray-900 mb-2 text-display">Smart Village</h1>
                <p class="text-gray-600 font-medium text-body-premium">Ketapang Baru</p>
            </div>

            <!-- Welcome Section -->
            <div class="text-center mb-10">
                <h2 class="text-5xl font-black text-gray-900 mb-4 text-display text-shadow-lg">Selamat Datang</h2>
                <p class="text-gray-600 text-lg font-medium text-body-premium">Masuk ke akun Anda untuk mengakses layanan desa digital</p>
            </div>

            <!-- Login Form -->
            <div class="glass-effect rounded-3xl p-8 shadow-2xl">
                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-label-premium text-gray-800 tracking-wide">
                            <i class="fas fa-envelope mr-2 text-blue-600"></i>Email Address
                        </label>
                        <div class="relative">
                            <input id="email" 
                                   class="form-input-modern w-full px-5 py-4 rounded-2xl focus:outline-none text-gray-800 font-medium" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required autofocus autocomplete="username"
                                   placeholder="nama@email.com">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-5">
                                <i class="fas fa-user-circle text-gray-400 text-xl"></i>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="block text-label-premium text-gray-800 tracking-wide">
                            <i class="fas fa-lock mr-2 text-blue-600"></i>Password
                        </label>
                        <div class="relative">
                            <input id="password" 
                                   class="form-input-modern w-full px-5 py-4 rounded-2xl focus:outline-none text-gray-800 font-medium pr-14" 
                                   type="password" 
                                   name="password" 
                                   required autocomplete="current-password"
                                   placeholder="Masukkan password Anda">
                            <button type="button" 
                                    class="absolute inset-y-0 right-0 flex items-center pr-5 text-gray-400 hover:text-gray-600 transition-colors"
                                    onclick="togglePassword('password', 'toggleIcon')">
                                <i class="fas fa-eye text-xl" id="toggleIcon"></i>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between pt-2">
                        <label for="remember_me" class="flex items-center space-x-3">
                            <input id="remember_me" type="checkbox" 
                                   class="rounded-lg border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-2 w-5 h-5" 
                                   name="remember">
                            <span class="text-sm font-medium text-gray-700">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                               class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors hover:underline">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <button type="submit" 
                            class="btn-gradient w-full py-4 px-6 rounded-2xl text-white font-bold text-lg focus:outline-none focus:ring-4 focus:ring-blue-300 transform transition-all duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk Sekarang
                    </button>

                    <!-- Divider -->
                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500 font-medium">atau</span>
                        </div>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center">
                        <p class="text-gray-600 font-medium">
                            Belum punya akun? 
                            <a href="{{ route('register') }}" 
                               class="text-blue-600 hover:text-blue-800 font-bold hover:underline transition-colors">
                                Daftar di sini
                            </a>
                        </p>
                    </div>
                </form>
            </div>

            <!-- Security Badge -->
            <div class="text-center mt-8">
                <div class="inline-flex items-center space-x-2 text-gray-500 text-sm">
                    <i class="fas fa-shield-alt text-green-500"></i>
                    <span class="font-medium">Dilindungi dengan enkripsi SSL</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Hero Section -->
    <div class="hidden lg:flex lg:w-1/2 auth-container relative items-center justify-center">
        <!-- Floating Orbs -->
        <div class="floating-orb orb-1"></div>
        <div class="floating-orb orb-2"></div>
        <div class="floating-orb orb-3"></div>
        
        <div class="relative z-10 text-center text-white px-12 max-w-2xl">
            <!-- Logo & Branding -->
            <div class="mb-12">
                <div class="w-32 h-32 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-8 backdrop-blur-sm border border-white/30 logo-animation">
                    <i class="fas fa-mountain-city text-6xl text-white"></i>
                </div>
                <h1 class="text-5xl font-black mb-4 text-white font-['Playfair_Display'] text-shadow">Smart Village</h1>
                <h2 class="text-2xl font-semibold mb-4 text-white/90 font-['Playfair_Display']">Ketapang Baru</h2>
                <p class="text-xl text-white/80 font-medium max-w-lg mx-auto leading-relaxed">
                    Platform digital yang menghubungkan warga dengan layanan pemerintahan desa modern
                </p>
            </div>
            
            <!-- Features Grid -->
            <div class="grid gap-6 max-w-lg mx-auto">
                <div class="feature-card rounded-3xl p-6 text-left">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mr-5 backdrop-blur-sm">
                            <i class="fas fa-file-contract text-2xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">Surat Digital</h3>
                            <p class="text-sm text-white/80">Proses cepat & mudah</p>
                        </div>
                    </div>
                    <p class="text-sm text-white/90 leading-relaxed">
                        Ajukan berbagai surat keterangan secara online dengan proses yang transparan dan efisien
                    </p>
                </div>
                
                <div class="feature-card rounded-3xl p-6 text-left">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mr-5 backdrop-blur-sm">
                            <i class="fas fa-chart-line text-2xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">Data Transparan</h3>
                            <p class="text-sm text-white/80">Akses informasi real-time</p>
                        </div>
                    </div>
                    <p class="text-sm text-white/90 leading-relaxed">
                        Monitor perkembangan desa, anggaran, dan program pembangunan secara transparan
                    </p>
                </div>
                
                <div class="feature-card rounded-3xl p-6 text-left">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mr-5 backdrop-blur-sm">
                            <i class="fas fa-users text-2xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">Komunitas Digital</h3>
                            <p class="text-sm text-white/80">Terhubung dengan warga</p>
                        </div>
                    </div>
                    <p class="text-sm text-white/90 leading-relaxed">
                        Berpartisipasi dalam kegiatan desa dan dapatkan update terbaru dari pemerintah desa
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const password = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (password.type === 'password') {
                password.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</x-guest-layout>
