@php
    $visi = \App\Models\VisiDesa::ordered()->get();
@endphp

@forelse($visi as $index => $item)
<tr>
    <td class="text-center">{{ $index + 1 }}</td>
    <td>
        <div class="d-flex flex-column">
            <span class="fw-bold text-dark">{{ $item->visi }}</span>
            @if($item->deskripsi_section)
                <small class="text-muted">{{ $item->deskripsi_section }}</small>
            @endif
        </div>
    </td>
    <td>
        <div class="text-truncate-2" style="max-width: 200px;">
            {{ $item->deskripsi ?? '-' }}
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
                    data-bs-target="#visiModal"
                    onclick="editVisi({{ $item->id }})"
                    data-bs-toggle="tooltip" 
                    data-bs-placement="top" 
                    title="Edit Visi">
                <i class="ki-duotone ki-pencil fs-6">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <span>Edit</span>
            </button>
            <button type="button" class="btn btn-sm btn-light-danger" 
                    onclick="deleteVisi({{ $item->id }})"
                    data-bs-toggle="tooltip" 
                    data-bs-placement="top" 
                    title="Hapus Visi">
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
    <td colspan="5" class="text-center py-10">
        <div class="d-flex flex-column align-items-center">
            <i class="ki-duotone ki-information-5 fs-2x text-muted mb-3">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            <span class="text-muted">Belum ada data visi</span>
        </div>
    </td>
</tr>
@endforelse
