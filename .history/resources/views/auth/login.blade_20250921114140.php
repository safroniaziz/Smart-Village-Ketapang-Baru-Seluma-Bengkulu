<x-guest-layout>
    <!-- Left Side - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 bg-gradient-to-br from-green-50 via-white to-emerald-50 relative">
        <div class="absolute inset-0 bg-gradient-to-br from-green-50/50 via-white to-emerald-50/30"></div>

        <div class="w-full max-w-md relative z-10 slide-in">
            <!-- Mobile Header -->
            <div class="lg:hidden text-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-r from-green-600 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4 logo-animation shadow-xl">
                    <i class="fas fa-leaf text-2xl text-white"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 mb-1">Smart Village</h1>
                <p class="text-gray-600 text-sm font-medium">Ketapang Baru</p>
            </div>

            <!-- Welcome Section -->
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent mb-3">Selamat Datang</h2>
                <p class="text-gray-600 leading-relaxed">Akses sistem pelayanan desa digital</p>
            </div>

            <!-- Login Form -->
            <div class="glass-effect rounded-2xl p-6 shadow-xl border border-white/20">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- NIK atau Email -->
                    <div class="space-y-1">
                        <label for="nik" class="block text-sm font-semibold text-gray-800">
                            <i class="fas fa-user mr-2 text-village-primary"></i>NIK atau Email
                        </label>
                        <input
                            id="nik"
                            name="nik"
                            type="text"
                            autocomplete="nik"
                            required
                            class="form-input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-800 font-medium"
                            placeholder="Masukkan NIK atau Email"
                            value="{{ old('nik') }}"
                        >
                        @error('nik')
                            <p class="text-sm text-red-600 mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-semibold text-gray-800">
                            <i class="fas fa-lock mr-2 text-village-primary"></i>Password
                        </label>
                        <div class="relative">
                            <input id="password"
                                   class="form-input-modern w-full px-4 py-3 rounded-xl focus:outline-none text-gray-800 font-medium pr-12"
                                   type="password"
                                   name="password"
                                   required autocomplete="current-password"
                                   placeholder="Masukkan password">
                            <button type="button"
                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-village-primary transition-colors"
                                    onclick="togglePassword('password', 'toggleIcon')">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-sm text-red-600 mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between pt-1">
                        <label for="remember_me" class="flex items-center space-x-2 cursor-pointer">
                            <input id="remember_me" type="checkbox"
                                   class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500 focus:ring-2 w-4 h-4 transition-all"
                                   name="remember">
                            <span class="text-sm font-medium text-gray-700">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-sm font-semibold text-village-primary hover:text-village-secondary transition-colors hover:underline">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                            class="btn-gradient w-full py-3 px-6 rounded-xl text-white font-bold focus:outline-none focus:ring-4 focus:ring-green-300 transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk Sekarang
                    </button>

                    <!-- Divider -->
                    <div class="relative my-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500 font-medium rounded-full border border-gray-200">Smart Village</span>
                        </div>
                    </div>

                    <!-- Info Text -->
                    <div class="text-center p-3 bg-village-light rounded-xl border border-village">
                        <div class="flex items-center justify-center mb-1">
                            <i class="fas fa-info-circle text-village-primary mr-2"></i>
                            <span class="text-village-secondary font-semibold text-sm">Informasi Akun</span>
                        </div>
                        <p class="text-village-secondary text-xs">
                            Untuk mendapatkan akun, hubungi admin desa
                        </p>
                    </div>

                    <!-- Back to Home Button -->
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <a href="{{ route('home') }}" class="w-full inline-flex items-center justify-center px-4 py-2.5 border-2 border-gray-200 rounded-xl text-gray-700 bg-white hover:bg-gray-50 hover:border-village hover:text-village-secondary transition-all duration-300 group font-medium shadow-sm hover:shadow-md">
                            <i class="fas fa-home mr-2 text-gray-500 group-hover:text-village-primary transition-colors duration-300"></i>
                            <span>Kembali ke Beranda</span>
                            <i class="fas fa-arrow-right ml-2 text-gray-400 group-hover:text-village-primary group-hover:translate-x-1 transition-all duration-300"></i>
                        </a>
                    </div>
                </form>
            </div>

            <!-- Security Badge -->
            <div class="text-center mt-4">
                <div class="inline-flex items-center space-x-2 text-gray-500 text-xs bg-white/50 px-3 py-1.5 rounded-full backdrop-blur-sm border border-white/20">
                    <i class="fas fa-shield-alt text-green-500"></i>
                    <span class="font-medium">Enkripsi SSL 256-bit</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Village Hero Section -->
    <div class="hidden lg:flex lg:w-1/2 auth-container relative items-center justify-center">
        <!-- Particles Background -->
        <div id="particles-js" class="absolute inset-0 z-0"></div>

        <!-- Floating Orbs -->
        <div class="floating-orb orb-1"></div>
        <div class="floating-orb orb-2"></div>
        <div class="floating-orb orb-3"></div>

        <div class="relative z-10 text-center text-white px-8 max-w-lg">
            <!-- Logo & Branding -->
            <div class="mb-6">
                <div class="mb-4 relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-white/10 rounded-full blur-3xl scale-150"></div>
                    <div class="w-24 h-24 mx-auto bg-white/10 rounded-full backdrop-blur-md border border-white/20 flex items-center justify-center relative z-10 shadow-2xl">
                        <i class="fas fa-seedling text-4xl text-white"></i>
                    </div>
                </div>
                <h1 class="text-4xl font-bold mb-2 text-white text-shadow">Desa Ketapang Baru</h1>
                <h2 class="text-lg font-medium mb-4 text-white/90">Kecamatan Seluma, Bengkulu</h2>
                <div class="text-sm text-white/80 mb-6">
                    <div class="flex items-center justify-center gap-2 bg-white/10 rounded-full px-4 py-2 backdrop-blur-md">
                        <i class="fas fa-user-tie text-white/70"></i>
                        <span class="font-medium">Kepala Desa: Zultan Alhara</span>
                    </div>
                </div>
                <p class="text-base text-white/90 max-w-sm mx-auto leading-relaxed font-medium">
                    Platform digital untuk pelayanan administrasi dan informasi desa yang mudah dan cepat
                </p>
            </div>

            <!-- Village Services -->
            <div class="grid grid-cols-3 gap-3 text-center mb-4">
                <div class="feature-card rounded-xl p-4">
                    <i class="fas fa-file-alt text-2xl mb-2 text-white"></i>
                    <div class="text-xs text-white/90 font-semibold">Surat Digital</div>
                </div>
                <div class="feature-card rounded-xl p-4">
                    <i class="fas fa-chart-line text-2xl mb-2 text-white"></i>
                    <div class="text-xs text-white/90 font-semibold">Data Statistik</div>
                </div>
                <div class="feature-card rounded-xl p-4">
                    <i class="fas fa-users text-2xl mb-2 text-white"></i>
                    <div class="text-xs text-white/90 font-semibold">Info Penduduk</div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="text-center">
                <div class="inline-flex items-center space-x-2 bg-white/10 rounded-full px-3 py-1.5 backdrop-blur-md border border-white/20">
                    <i class="fas fa-clock text-white/70"></i>
                    <span class="text-white/90 text-xs font-medium">Layanan 24/7</span>
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
                                "value": 60,
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
                                "value": 0.5,
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
                                "opacity": 0.3,
                                "width": 1
                            },
                            "move": {
                                "enable": true,
                                "speed": 1.5,
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
                                    "distance": 80,
                                    "duration": 0.4
                                },
                                "push": {
                                    "particles_nb": 3
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
