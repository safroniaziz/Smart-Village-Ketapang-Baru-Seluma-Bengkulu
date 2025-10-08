@extends('layouts.admin')

@section('title', 'Detail Pagu Earmark')
@section('page-header', 'Detail Pagu Earmark')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Detail Data Pagu Earmark</h1>
        <div class="space-x-2">
            <a href="{{ route('admin.pagu-earmark.edit', $paguEarmark->id) }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('admin.pagu-earmark.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="space-y-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Umum</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tahun:</span>
                        <span class="font-medium">{{ $paguEarmark->tahun }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Kode Rekening:</span>
                        <span class="font-medium">{{ $paguEarmark->kode_rekening }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Jumlah Pagu:</span>
                        <span class="font-medium text-green-600">{{ $paguEarmark->formatted_jumlah_pagu }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Waktu</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Dibuat:</span>
                        <span class="font-medium">{{ $paguEarmark->created_at->format('d M Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Diperbarui:</span>
                        <span class="font-medium">{{ $paguEarmark->updated_at->format('d M Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Nama Kegiatan</h3>
                <p class="text-gray-700 leading-relaxed">{{ $paguEarmark->nama_kegiatan }}</p>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Target Output</h3>
                <p class="text-gray-700 leading-relaxed">{{ $paguEarmark->target_output }}</p>
            </div>

            @if($paguEarmark->keterangan)
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Keterangan</h3>
                <p class="text-gray-700 leading-relaxed">{{ $paguEarmark->keterangan }}</p>
            </div>
            @endif
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-200">
        <div class="flex justify-between items-center">
            <div class="text-sm text-gray-500">
                ID: {{ $paguEarmark->id }}
            </div>
            <div class="space-x-2">
                <form action="{{ route('admin.pagu-earmark.destroy', $paguEarmark->id) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.')">
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