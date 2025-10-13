@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Kategori Wisata')
@section('page-header', 'Detail Kategori Wisata')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="mb-6">
        <a href="{{ route('admin.kategori-wisata.index') }}"
           class="text-blue-600 hover:text-blue-800 font-medium">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Kategori
        </a>
    </div>

    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">{{ $kategoriWisata->nama }}</h1>
            <p class="text-gray-600 mt-1">Detail kategori wisata</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.kategori-wisata.edit', $kategoriWisata) }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
        </div>
    </div>

    <!-- Status Badge -->
    <div class="mb-6">
        @if($kategoriWisata->aktif)
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                <i class="fas fa-check-circle mr-2"></i>
                Aktif
            </span>
        @else
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                <i class="fas fa-times-circle mr-2"></i>
                Tidak Aktif
            </span>
        @endif
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Informasi Kategori -->
        <div class="lg:col-span-2">
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Kategori</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nama Kategori</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $kategoriWisata->nama }}</p>
                    </div>

                    @if($kategoriWisata->deskripsi)
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $kategoriWisata->deskripsi }}</p>
                    </div>
                    @endif

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Icon</label>
                            <div class="mt-1 flex items-center">
                                <i class="{{ $kategoriWisata->icon }} text-2xl text-{{ $kategoriWisata->warna }}-600 mr-2"></i>
                                <code class="text-sm text-gray-600">{{ $kategoriWisata->icon }}</code>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600">Warna</label>
                            <div class="mt-1 flex items-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $kategoriWisata->warna }}-100 text-{{ $kategoriWisata->warna }}-800 mr-2">
                                    {{ ucfirst($kategoriWisata->warna) }}
                                </span>
                                <code class="text-sm text-gray-600">{{ $kategoriWisata->warna }}</code>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Urutan Tampil</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $kategoriWisata->urutan }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600">Slug</label>
                            <code class="text-sm text-gray-600">{{ $kategoriWisata->slug }}</code>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Dibuat</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $kategoriWisata->created_at->format('d F Y H:i') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600">Diperbarui</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $kategoriWisata->updated_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik -->
        <div>
            <div class="bg-blue-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik</h3>

                <div class="space-y-4">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600">{{ $kategoriWisata->jumlah_gallery }}</div>
                        <div class="text-sm text-gray-600">Total Galeri</div>
                    </div>

                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-600">{{ $kategoriWisata->galleryFoto->where('status_aktif', true)->count() }}</div>
                        <div class="text-sm text-gray-600">Galeri Aktif</div>
                    </div>

                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-600">{{ $kategoriWisata->galleryFoto->where('status_aktif', false)->count() }}</div>
                        <div class="text-sm text-gray-600">Galeri Tidak Aktif</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Galeri Foto dalam Kategori -->
    @if($kategoriWisata->galleryFoto->count() > 0)
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Daftar Galeri Foto dalam Kategori Ini</h3>
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Foto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photographer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Views</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($kategoriWisata->galleryFoto as $index => $foto)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $foto->judul }}</div>
                            @if($foto->deskripsi)
                            <div class="text-sm text-gray-500">{{ Str::limit($foto->deskripsi, 50) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $foto->photographer ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($foto->status_aktif)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $foto->views }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.gallery-foto.show', $foto) }}" 
                               class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="mt-8 text-center py-8">
        <i class="fas fa-images text-4xl text-gray-300 mb-4"></i>
        <h3 class="text-lg font-medium text-gray-600 mb-2">Belum Ada Galeri Foto</h3>
        <p class="text-gray-500">Kategori ini belum memiliki galeri foto yang terkait.</p>
    </div>
    @endif
</div>
@endsection
