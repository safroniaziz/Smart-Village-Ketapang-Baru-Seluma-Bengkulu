@if(isset($familyGroups) && $familyGroups->count() > 0)
    @foreach($familyGroups as $noKK => $familyMembers)
        @php
            $kepalaKeluarga = $familyMembers->where('is_kepala_keluarga', true)->first();
            $namaKepala = $kepalaKeluarga ? $kepalaKeluarga->nama_lengkap : 'Kepala Keluarga Tidak Diketahui';
            $dusunKeluarga = $kepalaKeluarga ? $kepalaKeluarga->dusun : 'Dusun Tidak Diketahui';
        @endphp
        {{-- Family Header Row --}}
        <tr class="bg-blue-50 border-l-4 border-blue-500 family-header" data-family="{{ $noKK }}" style="cursor: pointer;" title="Klik untuk melihat detail keluarga">
            <td colspan="7" class="py-4">
                <div class="flex items-center">
                    <i class="fas fa-home text-blue-600 mr-3 text-xl"></i>
                    <div>
                        <div class="font-bold text-lg text-blue-800 flex items-center">
                            Keluarga {{ $namaKepala }}
                            @if($noKK && $noKK !== '-')
                                <span class="text-gray-500 text-sm ml-2">({{ $noKK }})</span>
                            @endif
                        </div>
                        <div class="text-gray-600 text-sm">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            {{ $dusunKeluarga }} • {{ $familyMembers->count() }} anggota keluarga
                        </div>
                    </div>
                    <div class="ml-auto flex items-center">
                        {{-- Family Statistics --}}
                        <div class="flex items-center mr-3">
                            <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium mr-2">
                                <i class="fas fa-users mr-1"></i>
                                {{ $familyMembers->count() }} Anggota
                            </div>
                        </div>

                        {{-- Toggle Button --}}
                        <button class="bg-blue-100 text-blue-800 hover:bg-blue-200 family-toggle flex items-center px-3 py-2 font-medium rounded-lg transition-colors text-sm"
                                data-family="{{ $noKK }}"
                                title="Tampilkan/Sembunyikan anggota keluarga">
                            <i class="fas fa-chevron-up mr-1"></i>
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
                <span class="gender-badge {{ $warga->jenis_kelamin === 'L' ? 'gender-l' : 'gender-p' }}">
                    {{ $warga->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                </span>
            </td>
            <td class="px-6 py-4 text-sm text-gray-700 font-medium">
                @if($warga->tanggal_lahir)
                    {{ \Carbon\Carbon::parse($warga->tanggal_lahir)->age }} tahun
                @else
                    <span class="text-gray-400 italic">-</span>
                @endif
            </td>
            <td class="px-6 py-4 text-sm">
                <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r {{ $agamaStyle['bg'] ?? 'from-gray-100 to-gray-200' }} {{ $agamaStyle['text'] ?? 'text-gray-800' }} border {{ $agamaStyle['border'] ?? 'border-gray-200' }}">
                    <i class="fas fa-pray mr-1.5 {{ $agamaStyle['icon'] ?? 'text-gray-600' }}"></i>
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
