@if(isset($familyGroups) && $familyGroups->count() > 0)
    @foreach($familyGroups as $noKK => $familyMembers)
        @php
            $kepalaKeluarga = $familyMembers->where('is_kepala_keluarga', true)->first();
            $namaKepala = $kepalaKeluarga ? $kepalaKeluarga->nama_lengkap : 'Kepala Keluarga Tidak Diketahui';
            $dusunKeluarga = $kepalaKeluarga ? $kepalaKeluarga->dusun : 'Dusun Tidak Diketahui';
        @endphp
        {{-- Family Header Row --}}
        <tr class="family-header" data-family="{{ $noKK }}" style="cursor: pointer;" title="Klik untuk melihat detail keluarga">
            <td colspan="7" class="py-6 relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-5">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full transform translate-x-16 -translate-y-16"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-indigo-400 to-pink-500 rounded-full transform -translate-x-12 translate-y-12"></div>
                </div>
                
                <div class="relative z-10 flex items-center">
                    <!-- Icon with Glow Effect -->
                    <div class="relative mr-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-2xl">
                            <i class="fas fa-home text-white text-2xl"></i>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl blur-lg opacity-30"></div>
                    </div>
                    
                    <div class="flex-1">
                        <div class="font-bold text-2xl text-gray-800 flex items-center mb-2">
                            <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                Keluarga {{ $namaKepala }}
                            </span>
                            @if($noKK && $noKK !== '-')
                                <span class="ml-3 px-3 py-1 bg-gradient-to-r from-gray-100 to-gray-200 text-gray-600 text-sm font-medium rounded-full">
                                    {{ $noKK }}
                                </span>
                            @endif
                        </div>
                        <div class="flex items-center text-gray-600">
                            <div class="flex items-center mr-4">
                                <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>
                                <span class="font-medium">{{ $dusunKeluarga }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-users mr-2 text-purple-500"></i>
                                <span class="font-medium">{{ $familyMembers->count() }} anggota keluarga</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Family Statistics Cards -->
                        <div class="flex space-x-3">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-xl shadow-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-2"></i>
                                    <span class="font-bold">{{ $familyMembers->count() }}</span>
                                </div>
                                <div class="text-xs opacity-90">Anggota</div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-4 py-2 rounded-xl shadow-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-male mr-2"></i>
                                    <span class="font-bold">{{ $familyMembers->where('jenis_kelamin', 'L')->count() }}</span>
                                </div>
                                <div class="text-xs opacity-90">Laki-laki</div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-pink-500 to-pink-600 text-white px-4 py-2 rounded-xl shadow-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-female mr-2"></i>
                                    <span class="font-bold">{{ $familyMembers->where('jenis_kelamin', 'P')->count() }}</span>
                                </div>
                                <div class="text-xs opacity-90">Perempuan</div>
                            </div>
                        </div>

                        <!-- Toggle Button -->
                        <button class="family-toggle bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white flex items-center px-6 py-3 font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                                data-family="{{ $noKK }}"
                                title="Tampilkan/Sembunyikan anggota keluarga">
                            <i class="fas fa-chevron-up mr-2"></i>
                            <span class="toggle-text">Tutup</span>
                        </button>
                    </div>
                </div>
            </td>
        </tr>

        {{-- Family Members --}}
        @foreach($familyMembers as $warga)
        <tr class="border-b border-gray-200 family-member hover:bg-gray-50" data-family="{{ $noKK }}" data-warga-id="{{ $warga->id }}">
            <td class="px-6 py-4 text-sm text-gray-900 font-medium text-center">{{ $loop->parent->index * 15 + $loop->iteration }}</td>
            <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                {{ $warga->nama_lengkap }}
                @if($warga->is_kepala_keluarga)
                    <span class="ml-2 inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        <i class="fas fa-crown mr-1"></i>
                        KK
                    </span>
                @endif
            </td>
            <td class="px-6 py-4 text-sm">
                @if($warga->jenis_kelamin === 'L')
                    <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 border border-blue-200">
                        <i class="fas fa-male mr-1.5 text-blue-600"></i>
                        Laki-laki
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-pink-100 to-rose-100 text-pink-800 border border-pink-200">
                        <i class="fas fa-female mr-1.5 text-pink-600"></i>
                        Perempuan
                    </span>
                @endif
            </td>
            <td class="px-6 py-4 text-sm text-gray-700 font-medium">
                @if($warga->tanggal_lahir)
                    {{ \Carbon\Carbon::parse($warga->tanggal_lahir)->age }} tahun
                @else
                    <span class="text-gray-400 italic">-</span>
                @endif
            </td>
            <td class="px-6 py-4 text-sm">
                <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-purple-100 to-violet-100 text-purple-800 border border-purple-200">
                    <i class="fas fa-pray mr-1.5 text-purple-600"></i>
                    {{ $warga->agama ?? 'Tidak Diketahui' }}
                </span>
            </td>
            <td class="px-6 py-4 text-sm">
                @if(empty($warga->mata_pencaharian) || $warga->mata_pencaharian === null)
                    <span class="text-red-500 text-xs italic">Belum diinput admin</span>
                @else
                    @php
                        $pekerjaan = $warga->mata_pencaharian;
                        // Replace DLL with Lain-lain
                        if($pekerjaan === 'DLL') {
                            $pekerjaan = 'Lain-lain';
                        }
                    @endphp
                    <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-amber-100 to-orange-100 text-amber-800 border border-amber-200">
                        <i class="fas fa-briefcase mr-1.5 text-amber-600"></i>
                        {{ $pekerjaan }}
                    </span>
                @endif
            </td>
            <td class="px-6 py-4 text-sm">
                <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-emerald-100 to-green-100 text-emerald-800 border border-emerald-200">
                    <i class="fas fa-graduation-cap mr-1.5 text-emerald-600"></i>
                    {{ $warga->pendidikan ?? 'Tidak Diketahui' }}
                </span>
            </td>
        </tr>
        @endforeach
    @endforeach
@else
    <tr>
        <td colspan="7" class="px-6 py-16 text-center text-gray-500">
            <div class="flex flex-col items-center space-y-6">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-2xl text-gray-400"></i>
                </div>
                <div class="text-center">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada data warga</h3>
                    <p class="text-gray-500">Data warga belum tersedia atau sedang dalam proses pengisian.</p>
                </div>
            </div>
        </td>
    </tr>
@endif
