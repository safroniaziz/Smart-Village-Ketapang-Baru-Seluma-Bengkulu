<div class="table-responsive">
    <table class="table table-hover table-row-dashed align-middle gy-4">
        <thead>
            <tr class="fw-bold text-gray-800">
                <th class="min-w-180px">Nama Warga</th>
                <th class="min-w-140px">NIK</th>
                <th class="min-w-200px">Program Bantuan</th>
                <th class="min-w-100px">Tahun</th>
                <th class="min-w-140px">Nominal</th>
                <th class="min-w-120px">Status</th>
                <th class="min-w-200px">Keterangan</th>
                <th class="min-w-140px">Tanggal</th>
                <th class="w-150px text-end">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bantuans as $bantuan)
                <tr>
                    <td class="text-gray-900 fw-semibold">{{ $bantuan->user->nama_lengkap ?? '-' }}</td>
                    <td class="text-gray-700">{{ $bantuan->user->nik ?? '-' }}</td>
                    <td class="text-gray-900 fw-semibold">{{ $bantuan->program }}</td>
                    <td class="text-center">
                        <span class="badge badge-light-info">{{ $bantuan->tahun }}</span>
                    </td>
                    <td class="text-end">
                        @if($bantuan->nominal)
                            <span class="text-success fw-bold">Rp {{ number_format($bantuan->nominal, 0, ',', '.') }}</span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @php
                            $statusClass = [
                                'Aktif' => 'badge-light-success',
                                'Tidak Aktif' => 'badge-light-warning',
                                'Selesai' => 'badge-light-primary',
                            ][$bantuan->status] ?? 'badge-light';
                        @endphp
                        <span class="badge {{ $statusClass }}">{{ $bantuan->status }}</span>
                    </td>
                    <td class="text-gray-700">{{ $bantuan->keterangan ?? '-' }}</td>
                    <td class="text-muted">{{ $bantuan->created_at?->format('d M Y') }}</td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.bantuan.edit', $bantuan->id) }}" class="btn btn-sm btn-light-primary">
                                <i class="ki-duotone ki-pencil fs-5"><span class="path1"></span><span class="path2"></span></i>
                            </a>
                            <form method="POST" action="{{ route('admin.bantuan.destroy', $bantuan->id) }}" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data bantuan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light-danger">
                                    <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-10">
                        <div class="text-muted">Belum ada data bantuan</div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between gap-3 mt-6">
    <div class="text-muted small">
        Menampilkan {{ $bantuans->firstItem() ?? 0 }} - {{ $bantuans->lastItem() ?? 0 }} dari {{ $bantuans->total() }} data
    </div>
    <div class="ms-md-auto">
        {{ $bantuans->onEachSide(1)->links('pagination.custom') }}
    </div>
</div>
