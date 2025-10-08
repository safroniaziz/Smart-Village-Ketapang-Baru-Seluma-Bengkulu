<div class="table-responsive">
    <table class="table table-hover table-row-dashed align-middle gy-4">
        <thead class="bg-light-primary">
            <tr class="fw-bold text-gray-800 fs-7 text-uppercase">
                <th class="min-w-140px">Tracking</th>
                <th class="min-w-280px">Judul</th>
                <th class="min-w-180px">Pelapor</th>
                <th class="min-w-140px">Asal</th>
                <th class="min-w-120px">Prioritas</th>
                <th class="min-w-140px">Status</th>
                <th class="min-w-160px">Petugas Terakhir</th>
                <th class="min-w-120px">Followup</th>
                <th class="min-w-140px">Tanggal</th>
                <th class="w-100px text-end">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengaduans as $p)
                <tr>
                    <td>
                        <span class="badge badge-light-dark fw-bold">{{ $p->nomor_tracking }}</span>
                    </td>
                    <td class="text-gray-900 fw-semibold">{{ $p->judul }}</td>
                    <td class="text-gray-700">{{ $p->anonim ? 'Anonim' : ($p->nama_lengkap ?? '-') }}</td>
                    <td>
                        <span class="badge {{ $p->is_warga ? 'badge-light-success' : 'badge-light-secondary' }}">{{ $p->asal_pelapor }}</span>
                    </td>
                    <td>
                        <span class="badge badge-light-info">{{ $p->prioritas }}</span>
                    </td>
                    <td>
                        @php
                            $statusClass = [
                                'Diterima' => 'badge-light-primary',
                                'Dalam Proses' => 'badge-light-warning',
                                'Selesai' => 'badge-light-success',
                                'Ditolak' => 'badge-light-danger',
                            ][$p->status] ?? 'badge-light';
                        @endphp
                        <span class="badge {{ $statusClass }}">{{ $p->status }}</span>
                    </td>
                    <td class="text-gray-700">{{ $p->petugas ?? '-' }}</td>
                    <td>
                        <span class="badge badge-light-primary">{{ $p->followups_count ?? 0 }}</span>
                    </td>
                    <td class="text-muted">{{ $p->created_at?->format('d M Y') }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.pengaduan.show', $p->id) }}" class="btn btn-sm btn-light-primary">
                            <i class="ki-duotone ki-eye fs-5 me-1"><span class="path1"></span><span class="path2"></span></i> Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center py-10">
                        <div class="text-muted">Belum ada pengaduan</div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between gap-3 mt-6">
    <div class="text-muted small">
        Menampilkan {{ $pengaduans->firstItem() ?? 0 }} - {{ $pengaduans->lastItem() ?? 0 }} dari {{ $pengaduans->total() }} data
    </div>
    <div class="ms-md-auto">
        {{ $pengaduans->onEachSide(1)->links('pagination.custom') }}
    </div>
</div>
