@forelse($wargas as $warga)
    @php
        $umur = \Carbon\Carbon::parse($warga->tanggal_lahir)->age;
    @endphp
    <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200">
        <td class="px-6 py-4 text-sm text-gray-900 font-mono font-medium">{{ $warga->nik }}</td>
        <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $warga->nama_lengkap }}</td>
        <td class="px-6 py-4 text-sm">
            <span class="gender-badge {{ $warga->jenis_kelamin === 'L' ? 'gender-l' : 'gender-p' }}">
                {{ $warga->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
            </span>
        </td>
        <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $umur }} tahun</td>
        <td class="px-6 py-4 text-sm">
            @php
                $dusunColors = [
                    'Dusun 1' => ['bg' => 'from-blue-100 to-indigo-100', 'text' => 'text-blue-800', 'border' => 'border-blue-200', 'icon' => 'text-blue-600'],
                    'Dusun 2' => ['bg' => 'from-emerald-100 to-teal-100', 'text' => 'text-emerald-800', 'border' => 'border-emerald-200', 'icon' => 'text-emerald-600'],
                    'Dusun 3' => ['bg' => 'from-purple-100 to-pink-100', 'text' => 'text-purple-800', 'border' => 'border-purple-200', 'icon' => 'text-purple-600'],
                ];
                $dusunStyle = $dusunColors[$warga->dusun] ?? $dusunColors['Dusun 1'];
            @endphp
            <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r {{ $dusunStyle['bg'] }} {{ $dusunStyle['text'] }} border {{ $dusunStyle['border'] }}">
                <i class="fas fa-map-marker-alt mr-1.5 {{ $dusunStyle['icon'] }}"></i>
                {{ $warga->dusun }}
            </span>
        </td>
        <td class="px-6 py-4 text-sm">
            <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 border border-purple-200">
                <i class="fas fa-pray mr-1.5 text-purple-600"></i>
                {{ $warga->agama }}
            </span>
        </td>
        <td class="px-6 py-4 text-sm">
            <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-emerald-100 to-teal-100 text-emerald-800 border border-emerald-200">
                <i class="fas fa-heart mr-1.5 text-emerald-600"></i>
                {{ $warga->status_perkawinan }}
            </span>
        </td>
        <td class="px-6 py-4 text-sm">
            <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-amber-100 to-orange-100 text-amber-800 border border-amber-200">
                <i class="fas fa-briefcase mr-1.5 text-amber-600"></i>
                {{ $warga->pekerjaan }}
            </span>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="8" class="px-6 py-16 text-center text-gray-500">
            <div class="flex flex-col items-center space-y-6">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center border-4 border-blue-200">
                    <i class="fas fa-search text-3xl text-blue-600"></i>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Tidak ada data yang ditemukan</h3>
                    <p class="text-gray-600 leading-relaxed max-w-md">
                        Coba ubah filter atau kata kunci pencarian untuk menemukan data yang Anda cari
                    </p>
                </div>
                <div class="flex items-center gap-2 text-sm text-blue-600">
                    <i class="fas fa-lightbulb"></i>
                    <span>Tips: Gunakan kombinasi filter untuk hasil yang lebih akurat</span>
                </div>
            </div>
        </td>
    </tr>
@endforelse
