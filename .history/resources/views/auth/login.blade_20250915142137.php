<x-guest-layout>
    <!-- Left Side - Branding -->
    <div class="hidden lg:flex lg:w-1/2 auth-gradient auth-pattern relative items-center justify-center">
        <div class="floating-elements"></div>
        <div class="relative z-10 text-center text-white px-12">
            <div class="mb-8">
                <div class="w-24 h-24 bg-white/20 rounded-3xl flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                    <i class="fas fa-home text-4xl text-white"></i>
                </div>
                <h1 class="text-4xl font-black mb-4">Smart Village</h1>
                <h2 class="text-2xl font-bold mb-6">Ketapang Baru</h2>
            </div>
            
            <div class="max-w-md mx-auto">
                <p class="text-lg opacity-90 leading-relaxed mb-8">
                    Sistem Informasi Desa Digital untuk pelayanan administrasi yang lebih baik dan transparan
                </p>
                
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div class="bg-white/10 rounded-2xl p-4 backdrop-blur-sm">
                        <i class="fas fa-users text-2xl mb-2"></i>
                        <div class="text-sm opacity-90">Warga</div>
                    </div>
                    <div class="bg-white/10 rounded-2xl p-4 backdrop-blur-sm">
                        <i class="fas fa-file-alt text-2xl mb-2"></i>
                        <div class="text-sm opacity-90">Layanan</div>
                    </div>
                    <div class="bg-white/10 rounded-2xl p-4 backdrop-blur-sm">
                        <i class="fas fa-chart-line text-2xl mb-2"></i>
                        <div class="text-sm opacity-90">Transparansi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Login Form -->
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
                <h2 class="text-3xl font-black text-gray-900 mb-2">Selamat Datang!</h2>
                <p class="text-gray-600">Silakan masuk ke akun Anda untuk melanjutkan</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-6" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-gray-400"></i>Email Address
                    </label>
                    <input id="email" 
                           class="form-input w-full px-4 py-3 rounded-xl bg-gray-50 border-2 border-gray-200 focus:bg-white focus:outline-none" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required autofocus autocomplete="username"
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
                               class="form-input w-full px-4 py-3 rounded-xl bg-gray-50 border-2 border-gray-200 focus:bg-white focus:outline-none pr-12" 
                               type="password" 
                               name="password" 
                               required autocomplete="current-password"
                               placeholder="Masukkan password Anda">
                        <button type="button" 
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                                onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" 
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-2">
                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-800 font-medium hover:underline" 
                           href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" 
                        class="auth-button w-full py-3 px-4 rounded-xl text-white font-semibold text-lg focus:outline-none focus:ring-4 focus:ring-blue-300">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </button>

                <!-- Register Link -->
                <div class="text-center pt-4">
                    <p class="text-gray-600">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold hover:underline">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
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
