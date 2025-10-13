@extends('layouts.dashboard.dashboard')

@section('title', 'Tambah Kategori Wisata')
@section('page-header', 'Tambah Kategori Wisata')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="mb-6">
        <a href="{{ route('admin.kategori-wisata.index') }}"
           class="text-blue-600 hover:text-blue-800 font-medium">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Kategori
        </a>
    </div>

    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Kategori Wisata Baru</h1>

    <form action="{{ route('admin.kategori-wisata.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Kategori -->
            <div class="md:col-span-2">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Kategori <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="nama"
                       name="nama"
                       value="{{ old('nama') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nama') border-red-500 @enderror"
                       placeholder="Contoh: Pantai, Gunung, Air Terjun"
                       required>
                @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="md:col-span-2">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi
                </label>
                <textarea id="deskripsi"
                          name="deskripsi"
                          rows="3"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('deskripsi') border-red-500 @enderror"
                          placeholder="Deskripsi singkat tentang kategori wisata">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Icon -->
            <div>
                <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">
                    Icon <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="text"
                           id="icon"
                           name="icon"
                           value="{{ old('icon', 'fas fa-map-marker-alt') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('icon') border-red-500 @enderror"
                           placeholder="fas fa-map-marker-alt"
                           required>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <i id="icon-preview" class="{{ old('icon', 'fas fa-map-marker-alt') }} text-gray-400"></i>
                    </div>
                </div>
                @error('icon')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Gunakan class Font Awesome (contoh: fas fa-mountain, fas fa-water)</p>
            </div>

            <!-- Warna -->
            <div>
                <label for="warna" class="block text-sm font-medium text-gray-700 mb-2">
                    Warna <span class="text-red-500">*</span>
                </label>
                <select id="warna"
                        name="warna"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('warna') border-red-500 @enderror"
                        required>
                    <option value="">Pilih Warna</option>
                    <option value="blue" {{ old('warna') == 'blue' ? 'selected' : '' }}>Biru</option>
                    <option value="green" {{ old('warna') == 'green' ? 'selected' : '' }}>Hijau</option>
                    <option value="red" {{ old('warna') == 'red' ? 'selected' : '' }}>Merah</option>
                    <option value="yellow" {{ old('warna') == 'yellow' ? 'selected' : '' }}>Kuning</option>
                    <option value="purple" {{ old('warna') == 'purple' ? 'selected' : '' }}>Ungu</option>
                    <option value="pink" {{ old('warna') == 'pink' ? 'selected' : '' }}>Pink</option>
                    <option value="indigo" {{ old('warna') == 'indigo' ? 'selected' : '' }}>Indigo</option>
                    <option value="gray" {{ old('warna') == 'gray' ? 'selected' : '' }}>Abu-abu</option>
                </select>
                @error('warna')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Urutan -->
            <div>
                <label for="urutan" class="block text-sm font-medium text-gray-700 mb-2">
                    Urutan Tampil
                </label>
                <input type="number"
                       id="urutan"
                       name="urutan"
                       value="{{ old('urutan', 0) }}"
                       min="0"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('urutan') border-red-500 @enderror">
                @error('urutan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500">Angka lebih kecil akan ditampilkan lebih dulu</p>
            </div>

            <!-- Status Aktif -->
            <div>
                <label class="flex items-center">
                    <input type="checkbox"
                           name="aktif"
                           value="1"
                           {{ old('aktif', true) ? 'checked' : '' }}
                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700">Kategori Aktif</span>
                </label>
                <p class="mt-1 text-sm text-gray-500">Kategori aktif akan ditampilkan di halaman publik</p>
            </div>
        </div>

        <!-- Preview -->
        <div class="bg-gray-50 p-4 rounded-lg">
            <h3 class="text-sm font-medium text-gray-700 mb-2">Preview Kategori:</h3>
            <div class="flex items-center space-x-3">
                <i id="preview-icon" class="{{ old('icon', 'fas fa-map-marker-alt') }} text-lg text-gray-600"></i>
                <span id="preview-nama" class="text-lg font-medium text-gray-900">{{ old('nama', 'Nama Kategori') }}</span>
                <span id="preview-badge" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                    {{ ucfirst(old('warna', 'gray')) }}
                </span>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.kategori-wisata.index') }}"
               class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Batal
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i class="fas fa-save mr-2"></i>Simpan Kategori
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const iconInput = document.getElementById('icon');
    const iconPreview = document.getElementById('icon-preview');
    const namaInput = document.getElementById('nama');
    const previewNama = document.getElementById('preview-nama');
    const warnaSelect = document.getElementById('warna');
    const previewBadge = document.getElementById('preview-badge');

    // Update icon preview
    iconInput.addEventListener('input', function() {
        iconPreview.className = this.value + ' text-gray-400';
    });

    // Update nama preview
    namaInput.addEventListener('input', function() {
        previewNama.textContent = this.value || 'Nama Kategori';
    });

    // Update warna preview
    warnaSelect.addEventListener('change', function() {
        const warna = this.value || 'gray';
        previewBadge.className = `inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-${warna}-100 text-${warna}-800`;
        previewBadge.textContent = warna.charAt(0).toUpperCase() + warna.slice(1);
    });
});
</script>
@endsection
