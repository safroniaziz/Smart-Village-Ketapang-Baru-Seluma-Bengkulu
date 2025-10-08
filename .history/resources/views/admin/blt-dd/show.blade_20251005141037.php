@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Penerima BLT DD')
@section('page-header', 'Detail Penerima BLT DD')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Detail Penerima BLT Dana Desa</h1>
        <div class="space-x-2">
            <a href="{{ route('admin.blt-dd.edit', $bltDd->id) }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('admin.blt-dd.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="space-y-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Data Pribadi</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">NIK:</span>
                        <span class="font-medium">{{ $bltDd->nik }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Nama Lengkap:</span>
                        <span class="font-medium">{{ $bltDd->nama_lengkap }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Jenis Kelamin:</span>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $bltDd->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                            {{ $bltDd->jenis_kelamin_lengkap }}
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Umur:</span>
                        <span class="font-medium">{{ $bltDd->umur }} tahun</span>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Bantuan</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tahun:</span>
                        <span class="font-medium">{{ $bltDd->tahun }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Jumlah Bantuan:</span>
                        <span class="font-medium text-green-600">Rp {{ number_format($bltDd->jumlah_bantuan, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Waktu</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Dibuat:</span>
                        <span class="font-medium">{{ $bltDd->created_at->format('d M Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Diperbarui:</span>
                        <span class="font-medium">{{ $bltDd->updated_at->format('d M Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Alamat</h3>
                <p class="text-gray-700 leading-relaxed">{{ $bltDd->alamat }}</p>
            </div>

            @if($bltDd->keterangan)
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Keterangan</h3>
                <p class="text-gray-700 leading-relaxed">{{ $bltDd->keterangan }}</p>
            </div>
            @endif

            <!-- Card Visual Bantuan -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 p-6 rounded-lg">
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-green-500 rounded-full mb-4">
                        <i class="fas fa-money-bill-wave text-white text-2xl"></i>
                    </div>
                    <h4 class="text-lg font-semibold text-green-800 mb-2">Bantuan Langsung Tunai</h4>
                    <p class="text-3xl font-bold text-green-600">Rp {{ number_format($bltDd->jumlah_bantuan, 0, ',', '.') }}</p>
                    <p class="text-sm text-green-600 mt-2">Dana Desa Tahun {{ $bltDd->tahun }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-200">
        <div class="flex justify-between items-center">
            <div class="text-sm text-gray-500">
                ID: {{ $bltDd->id }}
            </div>
            <div class="space-x-2">
                <form action="{{ route('admin.blt-dd.destroy', $bltDd->id) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Yakin ingin menghapus data penerima {{ $bltDd->nama_lengkap }}? Data yang dihapus tidak dapat dikembalikan.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                        <i class="fas fa-trash mr-2"></i>Hapus Data
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection