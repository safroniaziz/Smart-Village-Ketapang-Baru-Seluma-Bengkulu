@extends('layouts.dashboard.dashboard')

@section('title', 'Tambah Penerima BLT DD')
@section('page-header', 'Tambah Penerima BLT DD')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Penerima BLT Dana Desa</h1>
        <a href="{{ route('admin.blt-dd.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <form action="{{ route('admin.blt-dd.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">
                    NIK <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nik" id="nik"
                       value="{{ old('nik') }}"
                       placeholder="Masukkan NIK (16 digit)"
                       maxlength="16"
                       class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nik') border-red-500 @else border-gray-300 @enderror"
                       required>
                @error('nik')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nama_lengkap" id="nama_lengkap"
                       value="{{ old('nama_lengkap') }}"
                       placeholder="Masukkan nama lengkap"
                       class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama_lengkap') border-red-500 @else border-gray-300 @enderror"
                       required>
                @error('nama_lengkap')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">
                    Jenis Kelamin <span class="text-red-500">*</span>
                </label>
                <select name="jenis_kelamin" id="jenis_kelamin"
                        class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('jenis_kelamin') border-red-500 @else border-gray-300 @enderror"
                        required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="umur" class="block text-sm font-medium text-gray-700 mb-2">
                    Umur <span class="text-red-500">*</span>
                </label>
                <input type="number" name="umur" id="umur"
                       value="{{ old('umur') }}"
                       placeholder="Masukkan umur"
                       min="1" max="120"
                       class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('umur') border-red-500 @else border-gray-300 @enderror"
                       required>
                @error('umur')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tahun" class="block text-sm font-medium text-gray-700 mb-2">
                    Tahun <span class="text-red-500">*</span>
                </label>
                <select name="tahun" id="tahun"
                        class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tahun') border-red-500 @else border-gray-300 @enderror"
                        required>
                    <option value="">Pilih Tahun</option>
                    @for($year = date('Y'); $year >= 2020; $year--)
                        <option value="{{ $year }}" {{ old('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>
                @error('tahun')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                Alamat <span class="text-red-500">*</span>
            </label>
            <textarea name="alamat" id="alamat" rows="3"
                      placeholder="Masukkan alamat lengkap"
                      class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('alamat') border-red-500 @else border-gray-300 @enderror"
                      required>{{ old('alamat') }}</textarea>
            @error('alamat')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="jumlah_bantuan" class="block text-sm font-medium text-gray-700 mb-2">
                Jumlah Bantuan (Rp) <span class="text-red-500">*</span>
            </label>
            <input type="number" name="jumlah_bantuan" id="jumlah_bantuan"
                   value="{{ old('jumlah_bantuan') }}"
                   placeholder="Masukkan jumlah bantuan"
                   min="1"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('jumlah_bantuan') border-red-500 @else border-gray-300 @enderror"
                   required>
            @error('jumlah_bantuan')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                Keterangan
            </label>
            <textarea name="keterangan" id="keterangan" rows="3"
                      placeholder="Keterangan tambahan (opsional)..."
                      class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('keterangan') border-red-500 @else border-gray-300 @enderror">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.blt-dd.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                Batal
            </a>
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                Simpan Data
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('nik').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 16) {
        value = value.substring(0, 16);
    }
    e.target.value = value;
});
</script>
@endsection
