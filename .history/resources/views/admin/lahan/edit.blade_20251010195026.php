@extends('layouts.app-public')

@section('title','Edit Lahan')

@section('content')
<div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-xl font-bold text-gray-900">Edit Lahan</h2>
            <a href="{{ route('admin.lahan.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Kembali</a>
        </div>
        <form action="{{ route('admin.lahan.update', $point->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">NIK (opsional)</label>
                    <input type="text" name="nik" value="{{ old('nik', $point->nik) }}" class="w-full border-gray-200 rounded-lg focus:ring-blue-100 focus:border-blue-300" />
                    @error('nik')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap (opsional)</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $point->nama_lengkap) }}" class="w-full border-gray-200 rounded-lg focus:ring-blue-100 focus:border-blue-300" />
                    @error('nama_lengkap')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                    <input type="number" step="any" name="lat" value="{{ old('lat', $point->lat) }}" class="w-full border-gray-200 rounded-lg focus:ring-blue-100 focus:border-blue-300" required />
                    @error('lat')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                    <input type="number" step="any" name="long" value="{{ old('long', $point->long) }}" class="w-full border-gray-200 rounded-lg focus:ring-blue-100 focus:border-blue-300" required />
                    @error('long')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Saat Ini</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @forelse($point->photos as $ph)
                        <label class="block border rounded-lg overflow-hidden">
                            <img src="/{{ $ph->path }}" class="w-full h-32 object-cover" />
                            <div class="p-2 text-sm flex items-center gap-2">
                                <input type="checkbox" name="remove_photos[]" value="{{ $ph->id }}" class="rounded" />
                                <span>Hapus</span>
                            </div>
                        </label>
                    @empty
                        <div class="text-sm text-gray-500">Belum ada foto</div>
                    @endforelse
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tambah Foto Baru (opsional)</label>
                <input type="file" name="photos[]" multiple accept="image/*" class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @error('photos.*')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="pt-2">
                <button class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg shadow">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
    @if($errors->any())
        <div class="mt-4 bg-red-50 text-red-700 px-4 py-3 rounded-lg border border-red-200">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection


