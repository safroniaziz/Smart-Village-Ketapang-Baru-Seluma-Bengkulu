@php
    $tahapan = \App\Models\TahapanDesa::ordered()->get();
@endphp

@forelse($tahapan as $index => $item)
<tr>
    <td class="text-center fw-bold text-muted">{{ $index + 1 }}</td>
    <td>
        <div class="d-flex flex-column">
            <span class="fw-bold text-dark mb-1">{{ $item->nama_tahapan }}</span>
        </div>
    </td>
    <td>
        <div class="text-muted" style="max-width: 300px; line-height: 1.4;">
            {{ Str::limit($item->deskripsi ?? '-', 80) }}
        </div>
    </td>
    <td>
        <div class="text-muted" style="max-width: 200px; line-height: 1.4;">
            {{ Str::limit($item->kegiatan ?? '-', 60) }}
        </div>
    </td>
    <td>
        <span class="fw-semibold text-muted">{{ $item->waktu ?? '-' }}</span>
    </td>
    <td class="text-center">
        @if($item->is_active)
            <span class="modern-badge badge-active">Aktif</span>
        @else
            <span class="modern-badge badge-inactive">Tidak Aktif</span>
        @endif
    </td>
    <td class="text-center">
        <div class="d-flex gap-2 justify-content-center">
            <button type="button" class="action-btn btn-edit"
                    data-bs-toggle="modal"
                    data-bs-target="#tahapanModal"
                    onclick="editTahapan({{ $item->id }})"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Edit Tahapan">
                <i class="ki-duotone ki-pencil fs-6 me-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                Edit
            </button>
            <button type="button" class="action-btn btn-delete"
                    onclick="deleteTahapan({{ $item->id }})"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Hapus Tahapan">
                <i class="ki-duotone ki-trash fs-6 me-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                </i>
                Hapus
            </button>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="7" class="text-center">
        <div class="empty-state">
            <div class="icon">
                <i class="ki-duotone ki-information-5">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
            </div>
            <h4 class="fw-bold text-dark mb-2">Belum Ada Data Tahapan</h4>
            <p class="text-muted mb-4">Mulai dengan menambahkan tahapan implementasi pertama Anda</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tahapanModal">
                <i class="ki-duotone ki-plus me-2"><span class="path1"></span><span class="path2"></span></i>
                Tambah Tahapan Pertama
            </button>
        </div>
    </td>
</tr>
@endforelse
