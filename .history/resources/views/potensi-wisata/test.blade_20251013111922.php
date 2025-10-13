@extends('layouts.app-public')

@section('title', 'Test Potensi Wisata')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Test Potensi Wisata</h1>
    
    @if($wisata)
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-semibold mb-2">{{ $wisata->nama }}</h2>
            <p class="text-gray-600 mb-4">{{ $wisata->lokasi }}</p>
            <p class="text-gray-700">{{ Str::limit($wisata->deskripsi, 200) }}</p>
            
            @if(is_array($wisata->gambar) && count($wisata->gambar) > 0)
                <div class="mt-4">
                    <h3 class="text-lg font-semibold mb-2">Gambar:</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($wisata->gambar as $image)
                            <img src="{{ is_array($image) ? $image['url'] : $image }}" 
                                 alt="{{ is_array($image) ? $image['judul'] : 'Gambar' }}" 
                                 class="w-full h-32 object-cover rounded">
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @else
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            Tidak ada data wisata ditemukan.
        </div>
    @endif
</div>
@endsection
