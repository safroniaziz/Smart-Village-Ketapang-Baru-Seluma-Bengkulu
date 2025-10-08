@php
    $tahapan = \App\Models\TahapanDesa::ordered()->get();
@endphp

@forelse($tahapan as $index => $item)
<tr>
    <td>
        <div class="form-check form-check-sm form-check-custom form-check-solid widget-16-check">
            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" />
        </div>
    </td>
    <td>
        <div class="d-flex align-items-center">
            <div class="symbol symbol-45px me-5">
                <div class="symbol-label" style="background: rgba(67, 233, 123, 0.1);">
                    <i class="ki-duotone ki-calendar fs-2" style="color: #43e97b;">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="d-flex justify-content-start flex-column">
                <a href="#" class="text-dark fw-bold text-hover-primary fs-6">{{ $item->nama_tahapan }}</a>
                <span class="text-muted fw-semibold text-muted d-block fs-7">Tahapan #{{ $index + 1 }}</span>
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
            {{ Str::limit($item->kegiatan ?? '-', 60) }}
        </div>
    </td>
    <td>
        <div class="text-muted fw-semibold">
            {{ $item->waktu ?? '-' }}
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
        <div class="d-flex gap-2 justify-content-end">
            <button type="button" class="btn btn-light-primary btn-sm"
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
            <button type="button" class="btn btn-light-danger btn-sm"
                    onclick="deleteTahapan({{ $item->id }})"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Hapus Tahapan">
                <i class="ki-duotone ki-trash fs-6">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                </i>
            </button>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="7" class="text-center py-10">
        <div class="d-flex flex-column align-items-center">
            <div class="symbol symbol-100px symbol-circle mb-7">
                <div class="symbol-label bg-light-warning">
                    <i class="ki-duotone ki-calendar fs-1 text-warning">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="text-center">
                <h5 class="fw-bold text-dark mb-3">Belum Ada Data Tahapan</h5>
                <div class="text-muted fw-semibold fs-6 mb-4">Mulai dengan menambahkan tahapan implementasi pertama Anda</div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tahapanModal">
                    <i class="ki-duotone ki-plus fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Tambah Tahapan Pertama
                </button>
            </div>
        </div>
    </td>
</tr>
@endforelse
