@forelse($wargas as $index => $warga)
    @php
        $umur = \Carbon\Carbon::parse($warga->tanggal_lahir)->age;
        $nomorUrut = ($wargas->currentPage() - 1) * $wargas->perPage() + $index + 1;
    @endphp
    <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200">
        <td class="px-6 py-4 text-sm text-gray-900 font-medium text-center">{{ $nomorUrut }}</td>
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
            @php
                $agamaColors = [
                    'Islam' => ['bg' => 'from-green-100 to-emerald-100', 'text' => 'text-green-800', 'border' => 'border-green-200', 'icon' => 'text-green-600'],
                    'Kristen' => ['bg' => 'from-blue-100 to-indigo-100', 'text' => 'text-blue-800', 'border' => 'border-blue-200', 'icon' => 'text-blue-600'],
                    'Katolik' => ['bg' => 'from-purple-100 to-violet-100', 'text' => 'text-purple-800', 'border' => 'border-purple-200', 'icon' => 'text-purple-600'],
                    'Hindu' => ['bg' => 'from-orange-100 to-amber-100', 'text' => 'text-orange-800', 'border' => 'border-orange-200', 'icon' => 'text-orange-600'],
                    'Buddha' => ['bg' => 'from-yellow-100 to-amber-100', 'text' => 'text-yellow-800', 'border' => 'border-yellow-200', 'icon' => 'text-yellow-600'],
                    'Konghucu' => ['bg' => 'from-red-100 to-rose-100', 'text' => 'text-red-800', 'border' => 'border-red-200', 'icon' => 'text-red-600'],
                ];
                $agamaStyle = $agamaColors[$warga->agama] ?? $agamaColors['Islam'];
            @endphp
            <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r {{ $agamaStyle['bg'] }} {{ $agamaStyle['text'] }} border {{ $agamaStyle['border'] }}">
                <i class="fas fa-pray mr-1.5 {{ $agamaStyle['icon'] }}"></i>
                {{ $warga->agama }}
            </span>
        </td>
        <td class="px-6 py-4 text-sm">
            <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-amber-100 to-orange-100 text-amber-800 border border-amber-200">
                <i class="fas fa-briefcase mr-1.5 text-amber-600"></i>
                {{ $warga->mata_pencaharian }}
            </span>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="9" class="px-6 py-16 text-center text-gray-500">
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
