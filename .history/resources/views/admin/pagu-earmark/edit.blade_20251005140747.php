@extends('layouts.admin')

@section('title', 'Edit Pagu Earmark')
@section('page-header', 'Edit Pagu Earmark')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Data Pagu Earmark</h1>
        <a href="{{ route('admin.pagu-earmark.index') }}" 
           class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <form action="{{ route('admin.pagu-earmark.update', $paguEarmark->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="tahun" class="block text-sm font-medium text-gray-700 mb-2">
                    Tahun <span class="text-red-500">*</span>
                </label>
                <select name="tahun" id="tahun" 
                        class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tahun') border-red-500 @else border-gray-300 @enderror"
                        required>
                    <option value="">Pilih Tahun</option>
                    @for($year = date('Y'); $year >= 2020; $year--)
                        <option value="{{ $year }}" {{ old('tahun', $paguEarmark->tahun) == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>
                @error('tahun')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kode_rekening" class="block text-sm font-medium text-gray-700 mb-2">
                    Kode Rekening <span class="text-red-500">*</span>
                </label>
                <input type="text" name="kode_rekening" id="kode_rekening" 
                       value="{{ old('kode_rekening', $paguEarmark->kode_rekening) }}"
                       placeholder="Contoh: 1.1.1.01.01"
                       class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('kode_rekening') border-red-500 @else border-gray-300 @enderror"
                       required>
                @error('kode_rekening')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="nama_kegiatan" class="block text-sm font-medium text-gray-700 mb-2">
                Nama Kegiatan <span class="text-red-500">*</span>
            </label>
            <textarea name="nama_kegiatan" id="nama_kegiatan" rows="3"
                      placeholder="Masukkan nama kegiatan..."
                      class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama_kegiatan') border-red-500 @else border-gray-300 @enderror"
                      required>{{ old('nama_kegiatan', $paguEarmark->nama_kegiatan) }}</textarea>
            @error('nama_kegiatan')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="jumlah_pagu" class="block text-sm font-medium text-gray-700 mb-2">
                Jumlah Pagu (Rp) <span class="text-red-500">*</span>
            </label>
            <input type="number" name="jumlah_pagu" id="jumlah_pagu" 
                   value="{{ old('jumlah_pagu', $paguEarmark->jumlah_pagu) }}"
                   placeholder="Masukkan jumlah pagu..."
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('jumlah_pagu') border-red-500 @else border-gray-300 @enderror"
                   required>
            @error('jumlah_pagu')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="target_output" class="block text-sm font-medium text-gray-700 mb-2">
                Target Output <span class="text-red-500">*</span>
            </label>
            <textarea name="target_output" id="target_output" rows="4"
                      placeholder="Masukkan target output yang ingin dicapai..."
                      class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('target_output') border-red-500 @else border-gray-300 @enderror"
                      required>{{ old('target_output', $paguEarmark->target_output) }}</textarea>
            @error('target_output')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                Keterangan
            </label>
            <textarea name="keterangan" id="keterangan" rows="3"
                      placeholder="Keterangan tambahan (opsional)..."
                      class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('keterangan') border-red-500 @else border-gray-300 @enderror">{{ old('keterangan', $paguEarmark->keterangan) }}</textarea>
            @error('keterangan')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.pagu-earmark.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                Batal
            </a>
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                Update Data
            </button>
        </div>
    </form>
</div>
@endsection