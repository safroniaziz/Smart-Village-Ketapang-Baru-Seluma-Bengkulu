<x-guest-layout>
    <!-- Left Side - Registration Form -->
    <div class="w-full lg:w-1/2 bg-white flex items-center justify-center p-8">
        <div class="w-full max-w-md">
            <!-- Mobile Logo -->
            <div class="lg:hidden text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-home text-2xl text-white"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Smart Village</h1>
                <p class="text-gray-600">Ketapang Baru</p>
            </div>

            <!-- Welcome Text -->
            <div class="mb-8">
                <h2 class="text-3xl font-black text-gray-900 mb-2">Bergabung dengan Kami!</h2>
                <p class="text-gray-600">Daftarkan diri Anda untuk mengakses layanan desa digital</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-gray-400"></i>Nama Lengkap
                    </label>
                    <input id="name" 
                           class="w-full px-4 py-3 rounded-xl bg-gray-50 border-2 border-gray-200 focus:bg-white focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all duration-300" 
                           type="text" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required autofocus autocomplete="name"
                           placeholder="Masukkan nama lengkap Anda">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-gray-400"></i>Email Address
                    </label>
                    <input id="email" 
                           class="w-full px-4 py-3 rounded-xl bg-gray-50 border-2 border-gray-200 focus:bg-white focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all duration-300" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required autocomplete="username"
                           placeholder="nama@email.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-gray-400"></i>Password
                    </label>
                    <div class="relative">
                        <input id="password" 
                               class="w-full px-4 py-3 rounded-xl bg-gray-50 border-2 border-gray-200 focus:bg-white focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all duration-300 pr-12" 
                               type="password" 
                               name="password" 
                               required autocomplete="new-password"
                               placeholder="Minimal 8 karakter">
                        <button type="button" 
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                                onclick="togglePassword('password', 'toggleIcon1')">
                            <i class="fas fa-eye" id="toggleIcon1"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-gray-400"></i>Konfirmasi Password
                    </label>
                    <div class="relative">
                        <input id="password_confirmation" 
                               class="w-full px-4 py-3 rounded-xl bg-gray-50 border-2 border-gray-200 focus:bg-white focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100 transition-all duration-300 pr-12" 
                               type="password" 
                               name="password_confirmation" 
                               required autocomplete="new-password"
                               placeholder="Ulangi password Anda">
                        <button type="button" 
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                                onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                            <i class="fas fa-eye" id="toggleIcon2"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start">
                    <input id="terms" type="checkbox" required
                           class="mt-1 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-2">
                    <label for="terms" class="ml-3 text-sm text-gray-600 leading-relaxed">
                        Saya setuju dengan 
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Syarat & Ketentuan</a> 
                        dan 
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Kebijakan Privasi</a>
                    </label>
                </div>

                <!-- Register Button -->
                <button type="submit" 
                        class="w-full py-3 px-4 rounded-xl text-white font-semibold text-lg bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transform hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                </button>

                <!-- Login Link -->
                <div class="text-center pt-4">
                    <p class="text-gray-600">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold hover:underline transition-colors">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Right Side - Benefits -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 relative items-center justify-center overflow-hidden">
        <!-- Floating Elements -->
        <div class="absolute top-20 right-10 w-48 h-48 bg-white/10 rounded-full floating-animation"></div>
        <div class="absolute bottom-20 left-10 w-32 h-32 bg-white/5 rounded-full floating-animation-reverse"></div>
        
        <!-- Pattern Overlay -->
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 2px, transparent 2px), radial-gradient(circle at 75% 75%, rgba(255,255,255,0.1) 2px, transparent 2px); background-size: 60px 60px;"></div>
        
        <div class="relative z-10 text-center text-white px-12 max-w-lg">
            <div class="mb-8">
                <div class="w-24 h-24 bg-white/20 rounded-3xl flex items-center justify-center mx-auto mb-6 backdrop-blur-sm border border-white/30">
                    <i class="fas fa-star text-4xl text-white"></i>
                </div>
                <h1 class="text-4xl font-black mb-4 text-white">Keuntungan Bergabung</h1>
                <h2 class="text-xl font-medium mb-8 text-white/90">Dapatkan akses penuh ke layanan digital desa</h2>
            </div>
            
            <div class="max-w-md mx-auto space-y-6">
                <div class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm text-left border border-white/20">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-file-alt text-xl text-white"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white">Layanan Surat Online</h3>
                    </div>
                    <p class="text-sm text-white/90">Ajukan berbagai surat keterangan secara online tanpa perlu datang ke kantor desa</p>
                </div>
                
                <div class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm text-left border border-white/20">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-bell text-xl text-white"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white">Notifikasi Real-time</h3>
                    </div>
                    <p class="text-sm text-white/90">Dapatkan notifikasi langsung untuk pengumuman dan update dari desa</p>
                </div>
                
                <div class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm text-left border border-white/20">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-chart-line text-xl text-white"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white">Transparansi Data</h3>
                    </div>
                    <p class="text-sm text-white/90">Akses informasi transparansi keuangan dan program pembangunan desa</p>
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
