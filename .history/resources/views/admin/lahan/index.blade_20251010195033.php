@extends('layouts.app-public')

@section('title','Manajemen Lahan')

@section('content')
<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Manajemen Lahan</h1>
            <p class="text-gray-500">Kelola titik lahan dan foto dokumentasi</p>
        </div>
        <a href="{{ route('admin.lahan.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
            <i class="fas fa-plus"></i> Tambah Lahan
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-50 text-green-700 px-4 py-3 rounded-lg border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($items as $item)
            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition">
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <div class="text-sm text-gray-500">{{ $item->nik ?? '—' }}</div>
                        <div class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">{{ $item->photos_count }} foto</div>
                    </div>
                    <div class="font-semibold text-gray-900 mb-3">{{ $item->nama_lengkap ?? 'Tanpa Nama' }}</div>
                    <div class="text-sm text-gray-600 mb-4">
                        LAT: {{ number_format($item->lat, 6) }} • LNG: {{ number_format($item->long, 6) }}
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.lahan.edit', $item->id) }}" class="px-3 py-2 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.lahan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus lahan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-2 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 text-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500">Belum ada data lahan</div>
        @endforelse
    </div>

    <div class="mt-6">{{ $items->links() }}</div>
</div>
@endsection


