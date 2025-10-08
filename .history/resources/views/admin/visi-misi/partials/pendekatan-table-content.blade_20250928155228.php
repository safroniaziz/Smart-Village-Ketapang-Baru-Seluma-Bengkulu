@php
    $pendekatan = \App\Models\PendekatanDesa::ordered()->get();
@endphp

@forelse($pendekatan as $index => $item)
<tr>
    <td>
        <div class="form-check form-check-sm form-check-custom form-check-solid widget-15-check">
            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" />
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
            <div class="symbol symbol-45px me-5">
                <div class="symbol-label" style="background: rgba(79, 172, 254, 0.1);">
                    <i class="ki-duotone ki-abstract-26 fs-2" style="color: #4facfe;">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="d-flex justify-content-start flex-column">
                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">{{ $item->nama_pendekatan }}</a>
                <span class="text-muted fw-semibold text-muted d-block fs-7">Pendekatan #{{ $index + 1 }}</span>
            </div>
        </div>
    </td>
    <td>
        <div class="text-muted fw-semibold" style="max-width: 200px; line-height: 1.4;">
            {{ Str::limit($item->deskripsi ?? '-', 80) }}
        </div>
    </td>
    <td>
        <div class="text-muted fw-semibold" style="max-width: 150px; line-height: 1.4;">
            {{ Str::limit($item->strategi ?? '-', 60) }}
        </div>
    </td>
    <td class="text-end">
        <div class="d-flex gap-2 justify-content-end">
            <button type="button" class="btn btn-light-primary btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#pendekatanModal"
                    onclick="editPendekatan({{ $item->id }})"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Edit Pendekatan">
                <i class="ki-duotone ki-pencil fs-6 me-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                Edit
            </button>
            <button type="button" class="btn btn-light-danger btn-sm"
                    onclick="deletePendekatan({{ $item->id }})"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Hapus Pendekatan">
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
    <td colspan="5" class="text-center py-10">
        <div class="d-flex flex-column align-items-center">
            <div class="symbol symbol-100px symbol-circle mb-7">
                <div class="symbol-label bg-light-success">
                    <i class="ki-duotone ki-abstract-26 fs-1 text-success">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="text-center">
                <h5 class="fw-bold text-dark mb-3">Belum Ada Data Pendekatan</h5>
                <div class="text-muted fw-semibold fs-6 mb-4">Mulai dengan menambahkan pendekatan partisipatif pertama Anda</div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pendekatanModal">
                    <i class="ki-duotone ki-plus fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Tambah Pendekatan Pertama
                </button>
            </div>
        </div>
    </td>
</tr>
@endforelse
