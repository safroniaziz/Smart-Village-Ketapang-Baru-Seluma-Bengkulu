@forelse($wargas as $warga)
    @php
        $umur = \Carbon\Carbon::parse($warga->tanggal_lahir)->age;
    @endphp
    <tr class="odd:bg-white even:bg-green-50/30 hover:bg-green-100/50 transition-colors duration-150">
        <td class="px-6 py-4 text-sm text-gray-900 font-mono">{{ $warga->nik }}</td>
        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $warga->nama_lengkap }}</td>
        <td class="px-6 py-4 text-sm text-gray-600">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $warga->jenis_kelamin === 'L' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                {{ $warga->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
            </span>
        </td>
        <td class="px-6 py-4 text-sm text-gray-600">{{ $umur }} tahun</td>
        <td class="px-6 py-4 text-sm text-gray-600">
            <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-green-100 text-green-800">
                {{ $warga->dusun }}
            </span>
        </td>
        <td class="px-6 py-4 text-sm text-gray-600">{{ $warga->agama }}</td>
        <td class="px-6 py-4 text-sm text-gray-600">{{ $warga->status_perkawinan }}</td>
        <td class="px-6 py-4 text-sm text-gray-600">{{ $warga->pekerjaan }}</td>
    </tr>
@empty
    <tr>
        <td colspan="8" class="px-6 py-12 text-center text-gray-500">
            <div class="flex flex-col items-center space-y-4">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-search text-2xl text-green-400"></i>
                </div>
                <div>
                    <p class="text-lg font-medium text-gray-900 mb-2">Tidak ada data yang ditemukan</p>
                    <p class="text-sm text-gray-500">Coba ubah filter atau kata kunci pencarian</p>
                </div>
            </div>
        </td>
    </tr>
@endforelse
