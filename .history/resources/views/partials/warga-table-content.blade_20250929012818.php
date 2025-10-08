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
            <td class="px-6 py-3 text-center">
                <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 text-xs font-medium">
                    {{ $loop->parent->index * 15 + $loop->iteration }}
                </div>
            </td>
            <td class="px-6 py-3">
                <div class="flex items-center">
                    <!-- Avatar -->
                    <div class="w-8 h-8 {{ $warga->jenis_kelamin === 'L' ? 'bg-blue-100 text-blue-600' : 'bg-pink-100 text-pink-600' }} rounded-full flex items-center justify-center text-xs font-medium mr-3">
                        {{ substr($warga->nama_lengkap, 0, 1) }}
                    </div>

                    <div>
                        <div class="font-medium text-gray-800 flex items-center">
                            {{ $warga->nama_lengkap }}
                            @if($warga->is_kepala_keluarga)
                                <span class="ml-2 inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-crown mr-1 text-xs"></i>
                                    KK
                                </span>
                            @endif
                        </div>
                        <div class="text-xs text-gray-500">
                            @if($warga->tanggal_lahir)
                                {{ \Carbon\Carbon::parse($warga->tanggal_lahir)->age }} tahun
                            @else
                                <span class="text-gray-400 italic">-</span>
                            @endif
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-3">
                @if($warga->jenis_kelamin === 'L')
                    <span class="text-xs text-blue-600 font-medium">Laki-laki</span>
                @else
                    <span class="text-xs text-pink-600 font-medium">Perempuan</span>
                @endif
            </td>
            <td class="px-6 py-3 text-center">
                @if($warga->tanggal_lahir)
                    <span class="text-sm font-medium text-gray-800">{{ \Carbon\Carbon::parse($warga->tanggal_lahir)->age }}</span>
                @else
                    <span class="text-gray-400 text-xs">-</span>
                @endif
            </td>
            <td class="px-6 py-3">
                <span class="text-xs text-gray-600">
                    {{ $warga->agama ?? 'Tidak Diketahui' }}
                </span>
            </td>
            <td class="px-6 py-3">
                @if(empty($warga->mata_pencaharian) || $warga->mata_pencaharian === null)
                    <span class="text-xs text-red-500 italic">Belum diinput admin</span>
                @else
                    @php
                        $pekerjaan = $warga->mata_pencaharian;
                        // Replace DLL with Lain-lain
                        if($pekerjaan === 'DLL') {
                            $pekerjaan = 'Lain-lain';
                        }
                    @endphp
                    <span class="text-xs text-gray-600">{{ $pekerjaan }}</span>
                @endif
            </td>
            <td class="px-6 py-3">
                <span class="text-xs text-gray-600">
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
