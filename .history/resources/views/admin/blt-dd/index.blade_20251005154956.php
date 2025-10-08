@extends('layouts.dashboard.dashboard')

@section('title', 'Bantuan Langsung Tunai Dana Desa')
@section('page-header'                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">
                            Rp {{ number_format($blt->nominal_bantuan, 0, ',', '.') }}
                        </td>Bantuan Langsung Tunai Dana Desa')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Data Penerima BLT Dana Desa</h1>
        <a href="{{ route('admin.blt-dd.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
            <i class="fas fa-plus mr-2"></i>Tambah Penerima
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex items-center">
                <div class="p-2 bg-blue-500 rounded-lg">
                    <i class="fas fa-users text-white"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-blue-600">Total Penerima</p>
                    <p class="text-lg font-bold text-blue-900">{{ $totalPenerima }}</p>
                </div>
            </div>
        </div>
        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
            <div class="flex items-center">
                <div class="p-2 bg-green-500 rounded-lg">
                    <i class="fas fa-mars text-white"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-green-600">Laki-laki</p>
                    <p class="text-lg font-bold text-green-900">{{ $lakiLaki }}</p>
                </div>
            </div>
        </div>
        <div class="bg-pink-50 border border-pink-200 rounded-lg p-4">
            <div class="flex items-center">
                <div class="p-2 bg-pink-500 rounded-lg">
                    <i class="fas fa-venus text-white"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-pink-600">Perempuan</p>
                    <p class="text-lg font-bold text-pink-900">{{ $perempuan }}</p>
                </div>
            </div>
        </div>
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <div class="flex items-center">
                <div class="p-2 bg-yellow-500 rounded-lg">
                    <i class="fas fa-money-bill-wave text-white"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-yellow-600">Total Bantuan</p>
                    <p class="text-lg font-bold text-yellow-900">{{ number_format($totalBantuan) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <form method="GET" class="flex gap-4">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari nama atau NIK..."
                   class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <select name="tahun" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Semua Tahun</option>
                @for($year = date('Y'); $year >= 2020; $year--)
                    <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
            </select>
            <select name="jenis_kelamin" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Semua Gender</option>
                <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">JK</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Umur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Bantuan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($bltDds as $blt)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $blt->nik }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $blt->nama_lengkap }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $blt->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                {{ $blt->jenis_kelamin_lengkap }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $blt->umur }} th</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $blt->alamat }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium text-green-600">
                            Rp {{ number_format($blt->jumlah_bantuan, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $blt->tahun }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.blt-dd.show', $blt->id) }}"
                                   class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.blt-dd.edit', $blt->id) }}"
                                   class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.blt-dd.destroy', $blt->id) }}"
                                      method="POST" class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada data penerima BLT Dana Desa
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $bltDds->links() }}
    </div>
</div>
@endsection
