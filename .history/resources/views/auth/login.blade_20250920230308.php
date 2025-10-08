<x-guest-layout>
    <!-- Left Side - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 via-white to-purple-50/30"></div>

        <div class="w-full max-w-md relative z-10 slide-in">
            <!-- Mobile Header -->
            <div class="lg:hidden text-center mb-10">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-6 logo-animation shadow-2xl">
                    <i class="fas fa-building text-3xl text-white"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Smart Village</h1>
                <p class="text-gray-600 font-medium">Ketapang Baru</p>
            </div>

            <!-- Welcome Section -->
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-4">Selamat Datang</h2>
                <p class="text-gray-600 text-lg leading-relaxed">Silakan masukkan kredensial Anda untuk mengakses sistem pelayanan desa digital</p>
            </div>

            <!-- Login Form -->
            <div class="glass-effect rounded-3xl p-8 shadow-2xl border border-white/20">
                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- NIK atau Email -->
                    <div class="space-y-2">
                        <label for="nik" class="block text-sm font-semibold text-gray-800">
                            <i class="fas fa-user mr-2 text-blue-600"></i>NIK atau Email
                        </label>
                        <input
                            id="nik"
                            name="nik"
                            type="text"
                            autocomplete="nik"
                            required
                            class="form-input-modern w-full px-5 py-4 rounded-2xl focus:outline-none text-gray-800 font-medium"
                            placeholder="Masukkan NIK atau Email Anda"
                            value="{{ old('nik') }}"
                        >
                        @error('nik')
                            <p class="text-sm text-red-600 mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-gray-800">
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
                                    class="absolute inset-y-0 right-0 flex items-center pr-5 text-gray-400 hover:text-blue-600 transition-colors"
                                    onclick="togglePassword('password', 'toggleIcon')">
                                <i class="fas fa-eye text-xl" id="toggleIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-sm text-red-600 mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between pt-2">
                        <label for="remember_me" class="flex items-center space-x-3 cursor-pointer">
                            <input id="remember_me" type="checkbox"
                                   class="rounded-lg border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-2 w-5 h-5 transition-all"
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
                            class="btn-gradient w-full py-4 px-6 rounded-2xl text-white font-bold text-lg focus:outline-none focus:ring-4 focus:ring-blue-300 transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
                        <i class="fas fa-sign-in-alt mr-3"></i>Masuk Sekarang
                    </button>

                    <!-- Divider -->
                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-6 bg-white text-gray-500 font-medium rounded-full border border-gray-200">Smart Village Ketapang Baru</span>
                        </div>
                    </div>

                    <!-- Info Text -->
                    <div class="text-center p-4 bg-blue-50 rounded-2xl border border-blue-100">
                        <div class="flex items-center justify-center mb-2">
                            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                            <span class="text-blue-800 font-semibold text-sm">Informasi Akun</span>
                        </div>
                        <p class="text-blue-700 text-sm">
                            Untuk mendapatkan akun, silakan hubungi admin desa atau kantor desa setempat
                        </p>
                    </div>

                    <!-- Back to Home Button -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <a href="{{ route('home') }}" class="w-full inline-flex items-center justify-center px-6 py-3 border-2 border-gray-200 rounded-2xl text-gray-700 bg-white hover:bg-gray-50 hover:border-blue-300 hover:text-blue-700 transition-all duration-300 group font-medium shadow-sm hover:shadow-md">
                            <i class="fas fa-home mr-3 text-gray-500 group-hover:text-blue-600 transition-colors duration-300"></i>
                            <span>Kembali ke Beranda</span>
                            <i class="fas fa-arrow-right ml-3 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all duration-300"></i>
                        </a>
                    </div>
                </form>
            </div>

            <!-- Security Badge -->
            <div class="text-center mt-8">
                <div class="inline-flex items-center space-x-3 text-gray-500 text-sm bg-white/50 px-4 py-2 rounded-full backdrop-blur-sm border border-white/20">
                    <i class="fas fa-shield-alt text-green-500 text-lg"></i>
                    <span class="font-medium">Dilindungi dengan enkripsi SSL 256-bit</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Hero Section -->
    <div class="hidden lg:flex lg:w-1/2 auth-container relative items-center justify-center">
        <!-- Particles Background -->
        <div id="particles-js" class="absolute inset-0 z-0"></div>

        <!-- Floating Orbs -->
        <div class="floating-orb orb-1"></div>
        <div class="floating-orb orb-2"></div>
        <div class="floating-orb orb-3"></div>

        <div class="relative z-10 text-center text-white px-12 max-w-lg">
            <!-- Logo & Branding -->
            <div class="mb-8">
                <div class="mb-6 relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-white/10 rounded-full blur-3xl scale-150"></div>
                    <div class="w-32 h-32 mx-auto bg-white/10 rounded-full backdrop-blur-md border border-white/20 flex items-center justify-center relative z-10 shadow-2xl">
                        <i class="fas fa-building text-5xl text-white"></i>
                    </div>
                </div>
                <h1 class="text-5xl font-bold mb-3 text-white text-shadow">Desa Ketapang Baru</h1>
                <h2 class="text-xl font-medium mb-6 text-white/90">Kecamatan Seluma, Bengkulu</h2>
                <div class="text-sm text-white/80 mb-8 space-y-3">
                    <div class="flex items-center justify-center gap-3 bg-white/10 rounded-full px-6 py-3 backdrop-blur-md">
                        <i class="fas fa-user-tie text-white/70"></i>
                        <span class="font-medium">Kepala Desa: Zultan Alhara</span>
                    </div>
                </div>
                <p class="text-lg text-white/90 max-w-md mx-auto leading-relaxed font-medium">
                    Platform digital terpadu untuk kemudahan pelayanan administrasi dan informasi desa
                </p>
            </div>

            <!-- Village Services -->
            <div class="grid grid-cols-3 gap-4 text-center">
                <div class="feature-card rounded-2xl p-6">
                    <i class="fas fa-file-alt text-3xl mb-3 text-white"></i>
                    <div class="text-sm text-white/90 font-semibold">Surat Digital</div>
                </div>
                <div class="feature-card rounded-2xl p-6">
                    <i class="fas fa-chart-line text-3xl mb-3 text-white"></i>
                    <div class="text-sm text-white/90 font-semibold">Data Statistik</div>
                </div>
                <div class="feature-card rounded-2xl p-6">
                    <i class="fas fa-users text-3xl mb-3 text-white"></i>
                    <div class="text-sm text-white/90 font-semibold">Info Penduduk</div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 text-center">
                <div class="inline-flex items-center space-x-2 bg-white/10 rounded-full px-4 py-2 backdrop-blur-md border border-white/20">
                    <i class="fas fa-clock text-white/70"></i>
                    <span class="text-white/90 text-sm font-medium">Layanan 24/7</span>
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

        // Initialize Particles.js
        document.addEventListener('DOMContentLoaded', function() {
            function initParticles() {
                if (typeof particlesJS !== 'undefined' && document.getElementById('particles-js')) {
                    particlesJS("particles-js", {
                        "particles": {
                            "number": {
                                "value": 80,
                                "density": {
                                    "enable": true,
                                    "value_area": 800
                                }
                            },
                            "color": {
                                "value": "#ffffff"
                            },
                            "shape": {
                                "type": "circle"
                            },
                            "opacity": {
                                "value": 0.6,
                                "random": true
                            },
                            "size": {
                                "value": 3,
                                "random": true
                            },
                            "line_linked": {
                                "enable": true,
                                "distance": 150,
                                "color": "#ffffff",
                                "opacity": 0.4,
                                "width": 1
                            },
                            "move": {
                                "enable": true,
                                "speed": 2,
                                "direction": "none",
                                "random": false,
                                "straight": false,
                                "out_mode": "out",
                                "bounce": false
                            }
                        },
                        "interactivity": {
                            "detect_on": "canvas",
                            "events": {
                                "onhover": {
                                    "enable": true,
                                    "mode": "repulse"
                                },
                                "onclick": {
                                    "enable": true,
                                    "mode": "push"
                                },
                                "resize": true
                            },
                            "modes": {
                                "repulse": {
                                    "distance": 100,
                                    "duration": 0.4
                                },
                                "push": {
                                    "particles_nb": 4
                                }
                            }
                        },
                        "retina_detect": true
                    });
                } else {
                    setTimeout(initParticles, 500);
                }
            }

            initParticles();
        });
    </script>
</x-guest-layout>
