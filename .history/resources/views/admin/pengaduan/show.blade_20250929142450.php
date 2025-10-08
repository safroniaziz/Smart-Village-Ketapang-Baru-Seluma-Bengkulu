@extends('layouts.app-public')

@section('title', 'Detail Pengaduan - ' . $p->nomor_tracking)

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <a href="{{ route('admin.pengaduan.index') }}" class="text-blue-600 hover:underline">&larr; Kembali</a>

    <div class="mt-4 bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-sm text-gray-500">Nomor Tracking</div>
                <div class="font-mono text-lg font-bold">{{ $p->nomor_tracking }}</div>
            </div>
            <div>
                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $p->is_warga ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">{{ $p->asal_pelapor }}</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <div class="text-sm text-gray-500">Judul</div>
                <div class="text-gray-900 font-semibold">{{ $p->judul }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500">Prioritas</div>
                <div class="text-gray-900">{{ $p->prioritas }}</div>
            </div>
            <div class="md:col-span-2">
                <div class="text-sm text-gray-500">Deskripsi</div>
                <div class="text-gray-800">{{ $p->deskripsi }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500">Lokasi</div>
                <div class="text-gray-900">{{ $p->lokasi }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500">Tanggal Kejadian</div>
                <div class="text-gray-900">{{ optional($p->tanggal_kejadian)->format('d M Y') }}</div>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <div class="text-sm text-gray-500">Pelapor</div>
                <div class="text-gray-900">
                    @if($p->anonim)
                        <span class="italic text-gray-500">(Anonim)</span>
                    @else
                        {{ $p->nama_lengkap ?? '-' }}
                    @endif
                </div>
                <div class="text-sm text-gray-500">NIK</div>
                <div class="text-gray-900">{{ $p->nik ?? '-' }}</div>
            </div>
            <div>
                <div class="text-sm text-gray-500">Kontak</div>
                <div class="text-gray-900">Email: {{ $p->email }}</div>
                <div class="text-gray-900">Telepon: {{ $p->telepon ?? '-' }}</div>
            </div>
        </div>

        <div class="mt-6">
            <div class="text-sm text-gray-500">Status</div>
            <form method="post" action="{{ route('admin.pengaduan.update', $p->id) }}" class="mt-2 flex items-end gap-3">
                @csrf
                <div>
                    <select name="status" class="border rounded px-3 py-2">
                        @foreach(['Diterima','Dalam Proses','Selesai','Ditolak'] as $s)
                            <option value="{{ $s }}" @selected($p->status===$s)>{{ $s }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label class="text-sm text-gray-500">Catatan Petugas</label>
                    <textarea name="catatan_petugas" class="w-full border rounded px-3 py-2" rows="2">{{ $p->catatan_petugas }}</textarea>
                </div>
                <div>
                    <input name="petugas" value="{{ $p->petugas }}" placeholder="Nama Petugas" class="border rounded px-3 py-2" />
                </div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection


