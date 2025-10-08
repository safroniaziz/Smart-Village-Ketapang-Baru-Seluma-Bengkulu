<x-guest-layout>
    <!-- Left Side - Registration Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gray-50 relative">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-50 via-white to-purple-50"></div>
        
        <div class="w-full max-w-md relative z-10 slide-in">
            <!-- Mobile Header -->
            <div class="lg:hidden text-center mb-10">
                <div class="w-20 h-20 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl flex items-center justify-center mx-auto mb-6 logo-animation">
                    <i class="fas fa-user-plus text-3xl text-white"></i>
                </div>
                <h1 class="text-3xl font-black text-gray-900 mb-2 font-['Playfair_Display']">Smart Village</h1>
                <p class="text-gray-600 font-medium">Ketapang Baru</p>
            </div>

            <!-- Welcome Section -->
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold text-gray-900 mb-4 text-shadow">Bergabung Bersama Kami</h2>
                <p class="text-gray-600 text-lg">Daftarkan diri Anda untuk mengakses semua layanan desa digital</p>
            </div>

            <!-- Registration Form -->
            <div class="glass-effect rounded-3xl p-8 shadow-2xl">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Full Name -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-semibold text-gray-800">
                            <i class="fas fa-user mr-2 text-purple-600"></i>Nama Lengkap
                        </label>
                        <div class="relative">
                            <input id="name" 
                                   class="form-input-modern w-full px-5 py-4 rounded-2xl focus:outline-none text-gray-800 font-medium" 
                                   type="text" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required autofocus autocomplete="name"
                                   placeholder="Masukkan nama lengkap Anda">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-5">
                                <i class="fas fa-id-card text-gray-400 text-xl"></i>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-bold text-gray-800 tracking-wide">
                            <i class="fas fa-envelope mr-2 text-purple-600"></i>Email Address
                        </label>
                        <div class="relative">
                            <input id="email" 
                                   class="form-input-modern w-full px-5 py-4 rounded-2xl focus:outline-none text-gray-800 font-medium" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required autocomplete="username"
                                   placeholder="nama@email.com">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-5">
                                <i class="fas fa-at text-gray-400 text-xl"></i>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-bold text-gray-800 tracking-wide">
                            <i class="fas fa-lock mr-2 text-purple-600"></i>Password
                        </label>
                        <div class="relative">
                            <input id="password" 
                                   class="form-input-modern w-full px-5 py-4 rounded-2xl focus:outline-none text-gray-800 font-medium pr-14" 
                                   type="password" 
                                   name="password" 
                                   required autocomplete="new-password"
                                   placeholder="Minimal 8 karakter">
                            <button type="button" 
                                    class="absolute inset-y-0 right-0 flex items-center pr-5 text-gray-400 hover:text-gray-600 transition-colors"
                                    onclick="togglePassword('password', 'toggleIcon1')">
                                <i class="fas fa-eye text-xl" id="toggleIcon1"></i>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-sm font-bold text-gray-800 tracking-wide">
                            <i class="fas fa-shield-alt mr-2 text-purple-600"></i>Konfirmasi Password
                        </label>
                        <div class="relative">
                            <input id="password_confirmation" 
                                   class="form-input-modern w-full px-5 py-4 rounded-2xl focus:outline-none text-gray-800 font-medium pr-14" 
                                   type="password" 
                                   name="password_confirmation" 
                                   required autocomplete="new-password"
                                   placeholder="Ulangi password Anda">
                            <button type="button" 
                                    class="absolute inset-y-0 right-0 flex items-center pr-5 text-gray-400 hover:text-gray-600 transition-colors"
                                    onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                                <i class="fas fa-eye text-xl" id="toggleIcon2"></i>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start pt-2">
                        <input id="terms" type="checkbox" required
                               class="mt-1.5 rounded-lg border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500 focus:ring-2 w-5 h-5">
                        <label for="terms" class="ml-3 text-sm text-gray-600 leading-relaxed font-medium">
                            Saya setuju dengan 
                            <a href="#" class="text-purple-600 hover:text-purple-800 font-bold hover:underline transition-colors">Syarat & Ketentuan</a> 
                            dan 
                            <a href="#" class="text-purple-600 hover:text-purple-800 font-bold hover:underline transition-colors">Kebijakan Privasi</a>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" 
                            class="w-full py-4 px-6 rounded-2xl text-white font-bold text-lg focus:outline-none focus:ring-4 focus:ring-purple-300 transform transition-all duration-300 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 hover:-translate-y-1 shadow-lg hover:shadow-xl">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
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

                    <!-- Login Link -->
                    <div class="text-center">
                        <p class="text-gray-600 font-medium">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" 
                               class="text-purple-600 hover:text-purple-800 font-bold hover:underline transition-colors">
                                Masuk di sini
                            </a>
                        </p>
                    </div>
                </form>
            </div>

            <!-- Security Badge -->
            <div class="text-center mt-8">
                <div class="inline-flex items-center space-x-2 text-gray-500 text-sm">
                    <i class="fas fa-shield-alt text-green-500"></i>
                    <span class="font-medium">Data Anda dilindungi dengan enkripsi SSL</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Benefits Section -->
    <div class="hidden lg:flex lg:w-1/2 relative items-center justify-center" style="background: linear-gradient(135deg, #7C3AED 0%, #EC4899 50%, #F59E0B 100%);">
        <!-- Floating Orbs -->
        <div class="floating-orb orb-1"></div>
        <div class="floating-orb orb-2"></div>
        <div class="floating-orb orb-3"></div>
        
        <!-- Aurora Effect -->
        <div class="absolute inset-0 opacity-30" style="background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.2) 0%, transparent 50%), radial-gradient(circle at 70% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);"></div>
        
        <div class="relative z-10 text-center text-white px-12 max-w-2xl">
            <!-- Logo & Branding -->
            <div class="mb-12">
                <div class="w-32 h-32 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-8 backdrop-blur-sm border border-white/30 logo-animation">
                    <i class="fas fa-star text-6xl text-white"></i>
                </div>
                <h1 class="text-5xl font-bold mb-4 text-white text-shadow">Keuntungan Bergabung</h1>
                <h2 class="text-2xl font-medium mb-4 text-white/90">Smart Village Ketapang Baru</h2>
                <p class="text-xl text-white/80 max-w-lg mx-auto leading-relaxed">
                    Dapatkan akses penuh ke layanan digital dan berpartisipasi dalam pembangunan desa
                </p>
            </div>
            
            <!-- Benefits Grid -->
            <div class="grid gap-6 max-w-lg mx-auto">
                <div class="feature-card rounded-3xl p-6 text-left">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mr-5 backdrop-blur-sm">
                            <i class="fas fa-file-signature text-2xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">Surat Online 24/7</h3>
                            <p class="text-sm text-white/80">Tanpa antri & lebih cepat</p>
                        </div>
                    </div>
                    <p class="text-sm text-white/90 leading-relaxed">
                        Ajukan berbagai surat keterangan kapan saja, di mana saja tanpa perlu datang ke kantor desa
                    </p>
                </div>
                
                <div class="feature-card rounded-3xl p-6 text-left">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mr-5 backdrop-blur-sm">
                            <i class="fas fa-bell text-2xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">Notifikasi Real-time</h3>
                            <p class="text-sm text-white/80">Update langsung ke ponsel</p>
                        </div>
                    </div>
                    <p class="text-sm text-white/90 leading-relaxed">
                        Dapatkan pemberitahuan instant untuk pengumuman penting dan update status pengajuan
                    </p>
                </div>
                
                <div class="feature-card rounded-3xl p-6 text-left">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mr-5 backdrop-blur-sm">
                            <i class="fas fa-vote-yea text-2xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">Partisipasi Aktif</h3>
                            <p class="text-sm text-white/80">Suara Anda berpengaruh</p>
                        </div>
                    </div>
                    <p class="text-sm text-white/90 leading-relaxed">
                        Berpartisipasi dalam pengambilan keputusan dan program pembangunan desa secara digital
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
