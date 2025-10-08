@php
    $visi = \App\Models\VisiDesa::ordered()->get();
@endphp

@forelse($visi as $index => $item)
<tr>
    <td>
        <div class="d-flex align-items-center">
            <div class="symbol symbol-45px me-5">
                <div class="symbol-label bg-light-primary">
                    <i class="ki-duotone ki-eye fs-2 text-primary">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </div>
            </div>
            <div class="d-flex justify-content-start flex-column">
                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">{{ $item->visi }}</a>
                @if($item->deskripsi_section)
                    <span class="text-muted fw-semibold text-muted d-block fs-7">{{ Str::limit($item->deskripsi_section, 50) }}</span>
                @endif
            </div>
        </div>
    </td>
    <td>
        <div class="text-muted fw-semibold" style="max-width: 200px; line-height: 1.4;">
            {{ Str::limit($item->deskripsi ?? '-', 80) }}
        </div>
    </td>
    <td class="text-end">
        <div class="d-flex gap-2 justify-content-end">
            <button type="button" class="btn btn-light-primary btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#visiModal"
                    onclick="editVisi({{ $item->id }})"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Edit Visi">
                <i class="ki-duotone ki-pencil fs-6 me-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                Edit
            </button>
            <button type="button" class="btn btn-light-danger btn-sm"
                    onclick="deleteVisi({{ $item->id }})"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Hapus Visi">
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
    <td colspan="4" class="text-center py-10">
        <div class="d-flex flex-column align-items-center">
            <div class="symbol symbol-100px symbol-circle mb-7">
                <div class="symbol-label bg-light-primary">
                    <i class="ki-duotone ki-eye fs-1 text-primary">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </div>
            </div>
            <div class="text-center">
                <h5 class="fw-bold text-dark mb-3">Belum Ada Data Visi</h5>
                <div class="text-muted fw-semibold fs-6 mb-4">Mulai dengan menambahkan visi desa pertama Anda</div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#visiModal">
                    <i class="ki-duotone ki-plus fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Tambah Visi Pertama
                </button>
            </div>
        </div>
    </td>
</tr>
@endforelse
