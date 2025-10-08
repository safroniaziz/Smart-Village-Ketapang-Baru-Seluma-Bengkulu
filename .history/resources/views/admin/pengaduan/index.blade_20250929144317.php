@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Pengaduan')

@section('menu')
    Manajemen Pengaduan
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Pengaduan</li>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Manajemen Pengaduan</h1>
        <form method="get" class="flex items-center gap-2">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul / tracking" class="border rounded px-3 py-2">
            <select name="status" class="border rounded px-3 py-2">
                <option value="">Semua Status</option>
                @foreach(['Diterima','Dalam Proses','Selesai','Ditolak'] as $s)
                    <option value="{{ $s }}" @selected(request('status')===$s)>{{ $s }}</option>
                @endforeach
            </select>
            <select name="asal" class="border rounded px-3 py-2">
                <option value="">Semua Asal</option>
                @foreach(['Warga Desa','Eksternal'] as $a)
                    <option value="{{ $a }}" @selected(request('asal')===$a)>{{ $a }}</option>
                @endforeach
            </select>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Tracking</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Judul</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Asal</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Prioritas</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Status</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($pengaduans as $p)
                <tr>
                    <td class="px-4 py-3 font-mono text-sm text-gray-800">{{ $p->nomor_tracking }}</td>
                    <td class="px-4 py-3 text-sm text-gray-800">{{ $p->judul }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $p->is_warga ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">{{ $p->asal_pelapor }}</span>
                    </td>
                    <td class="px-4 py-3 text-sm">{{ $p->prioritas }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold
                        @class([
                            'bg-blue-100 text-blue-700' => $p->status==='Diterima',
                            'bg-yellow-100 text-yellow-700' => $p->status==='Dalam Proses',
                            'bg-green-100 text-green-700' => $p->status==='Selesai',
                            'bg-red-100 text-red-700' => $p->status==='Ditolak',
                        ])">{{ $p->status }}</span>
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-600">{{ $p->created_at?->format('d M Y') }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.pengaduan.show', $p->id) }}" class="text-blue-600 hover:underline">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-10 text-center text-gray-500">Belum ada pengaduan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $pengaduans->links() }}</div>
</div>
@endsection


