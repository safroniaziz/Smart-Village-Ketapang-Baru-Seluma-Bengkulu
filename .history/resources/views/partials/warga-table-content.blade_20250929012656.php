@if(isset($familyGroups) && $familyGroups->count() > 0)
    @foreach($familyGroups as $noKK => $familyMembers)
        @php
            $kepalaKeluarga = $familyMembers->where('is_kepala_keluarga', true)->first();
            $namaKepala = $kepalaKeluarga ? $kepalaKeluarga->nama_lengkap : 'Kepala Keluarga Tidak Diketahui';
            $dusunKeluarga = $kepalaKeluarga ? $kepalaKeluarga->dusun : 'Dusun Tidak Diketahui';
        @endphp
        {{-- Family Header Row --}}
        <tr class="family-header" data-family="{{ $noKK }}" style="cursor: pointer;" title="Klik untuk melihat detail keluarga">
            <td colspan="7" class="py-3">
                <div class="flex items-center justify-between">
                    <!-- Left Section -->
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white text-sm">
                            <i class="fas fa-home"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-lg text-gray-800 flex items-center">
                                Keluarga {{ $namaKepala }}
                                @if($noKK && $noKK !== '-')
                                    <span class="ml-2 px-2 py-0.5 bg-gray-100 text-gray-600 text-xs rounded">
                                        {{ $noKK }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex items-center text-gray-500 text-sm space-x-3">
                                <span class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1 text-xs"></i>
                                    {{ $dusunKeluarga }}
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-users mr-1 text-xs"></i>
                                    {{ $familyMembers->count() }} anggota
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Section -->
                    <div class="flex items-center space-x-2">
                        <!-- Quick Stats -->
                        <div class="flex space-x-1">
                            <span class="text-xs text-gray-500">
                                L: {{ $familyMembers->where('jenis_kelamin', 'L')->count() }}
                            </span>
                            <span class="text-xs text-gray-500">|</span>
                            <span class="text-xs text-gray-500">
                                P: {{ $familyMembers->where('jenis_kelamin', 'P')->count() }}
                            </span>
                        </div>

                        <!-- Toggle Button -->
                        <button class="family-toggle bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center px-3 py-1.5 text-sm rounded-md transition-colors duration-200"
                                data-family="{{ $noKK }}"
                                title="Tampilkan/Sembunyikan anggota keluarga">
                            <i class="fas fa-chevron-up mr-1 text-xs"></i>
                            <span class="toggle-text">Tutup</span>
                        </button>
                    </div>
                </div>
            </td>
        </tr>

        {{-- Family Members --}}
        @foreach($familyMembers as $warga)
        <tr class="family-member group" data-family="{{ $noKK }}" data-warga-id="{{ $warga->id }}">
            <td class="px-6 py-4 text-center">
                <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                    {{ $loop->parent->index * 15 + $loop->iteration }}
                </div>
            </td>
            <td class="px-6 py-4">
                <div class="flex items-center">
                    <!-- Avatar -->
                    <div class="w-10 h-10 bg-gradient-to-br {{ $warga->jenis_kelamin === 'L' ? 'from-blue-500 to-indigo-600' : 'from-pink-500 to-rose-600' }} rounded-full flex items-center justify-center text-white font-bold mr-3">
                        {{ substr($warga->nama_lengkap, 0, 1) }}
                    </div>

                    <div>
                        <div class="font-bold text-gray-800 flex items-center">
                            {{ $warga->nama_lengkap }}
                            @if($warga->is_kepala_keluarga)
                                <span class="ml-2 inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-yellow-400 to-orange-500 text-white">
                                    <i class="fas fa-crown mr-1"></i>
                                    KK
                                </span>
                            @endif
                        </div>
                        <div class="text-sm text-gray-500">
                            @if($warga->tanggal_lahir)
                                {{ \Carbon\Carbon::parse($warga->tanggal_lahir)->age }} tahun
                            @else
                                <span class="text-gray-400 italic">Umur tidak diketahui</span>
                            @endif
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4">
                @if($warga->jenis_kelamin === 'L')
                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-blue-100 text-blue-800">
                        <i class="fas fa-male mr-1"></i>
                        Laki-laki
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-pink-100 text-pink-800">
                        <i class="fas fa-female mr-1"></i>
                        Perempuan
                    </span>
                @endif
            </td>
            <td class="px-6 py-4 text-center">
                @if($warga->tanggal_lahir)
                    <div class="text-lg font-bold text-gray-800">{{ \Carbon\Carbon::parse($warga->tanggal_lahir)->age }}</div>
                    <div class="text-xs text-gray-500">tahun</div>
                @else
                    <div class="text-gray-400 italic text-sm">-</div>
                @endif
            </td>
            <td class="px-6 py-4">
                <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-purple-100 text-purple-800">
                    <i class="fas fa-pray mr-1"></i>
                    {{ $warga->agama ?? 'Tidak Diketahui' }}
                </span>
            </td>
            <td class="px-6 py-4">
                @if(empty($warga->mata_pencaharian) || $warga->mata_pencaharian === null)
                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-red-100 text-red-800">
                        <i class="fas fa-exclamation-triangle mr-1"></i>
                        Belum diinput admin
                    </span>
                @else
                    @php
                        $pekerjaan = $warga->mata_pencaharian;
                        // Replace DLL with Lain-lain
                        if($pekerjaan === 'DLL') {
                            $pekerjaan = 'Lain-lain';
                        }
                    @endphp
                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-amber-100 text-amber-800">
                        <i class="fas fa-briefcase mr-1"></i>
                        {{ $pekerjaan }}
                    </span>
                @endif
            </td>
            <td class="px-6 py-4">
                <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-emerald-100 text-emerald-800">
                    <i class="fas fa-graduation-cap mr-1"></i>
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
