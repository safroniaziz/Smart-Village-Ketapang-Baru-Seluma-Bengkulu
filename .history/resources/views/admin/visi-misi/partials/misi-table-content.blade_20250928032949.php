@php
    $misi = \App\Models\MisiDesa::ordered()->get();
@endphp

@forelse($misi as $index => $item)
<tr>
    <td class="text-center">{{ $index + 1 }}</td>
    <td>
        <div class="d-flex flex-column">
            <span class="fw-bold text-dark">{{ $item->judul }}</span>
        </div>
    </td>
    <td>
        <div class="text-truncate-2" style="max-width: 300px;">
            {{ $item->deskripsi ?? '-' }}
        </div>
    </td>
    <td>
        <div class="text-truncate-2" style="max-width: 200px;">
            {{ $item->indikator ?? '-' }}
        </div>
    </td>
    <td class="text-center">
        @if($item->is_active)
            <span class="badge badge-light-success">Aktif</span>
        @else
            <span class="badge badge-light-danger">Tidak Aktif</span>
        @endif
    </td>
    <td class="text-end">
        <div class="d-flex gap-1 justify-content-end">
            <button type="button" class="btn btn-sm btn-light-warning" 
                    data-bs-toggle="modal" 
                    data-bs-target="#misiModal"
                    onclick="editMisi({{ $item->id }})"
                    data-bs-toggle="tooltip" 
                    data-bs-placement="top" 
                    title="Edit Misi">
                <i class="ki-duotone ki-pencil fs-6">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <span>Edit</span>
            </button>
            <button type="button" class="btn btn-sm btn-light-danger" 
                    onclick="deleteMisi({{ $item->id }})"
                    data-bs-toggle="tooltip" 
                    data-bs-placement="top" 
                    title="Hapus Misi">
                <i class="ki-duotone ki-trash fs-6">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                </i>
                <span>Hapus</span>
            </button>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center py-10">
        <div class="d-flex flex-column align-items-center">
            <i class="ki-duotone ki-information-5 fs-2x text-muted mb-3">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            <span class="text-muted">Belum ada data misi</span>
        </div>
    </td>
</tr>
@endforelse
