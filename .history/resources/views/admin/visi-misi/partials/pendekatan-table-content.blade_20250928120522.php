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
                <div class="symbol-label bg-light-success">
                    <i class="ki-duotone ki-abstract-26 fs-2 text-success">
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
    <td class="text-center">
        @if($item->is_active)
            <span class="badge badge-light-success">Aktif</span>
        @else
            <span class="badge badge-light-danger">Tidak Aktif</span>
        @endif
    </td>
    <td class="text-end">
        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
            Aksi
            <i class="ki-duotone ki-down fs-5 m-0"></i>
        </a>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3" 
                   data-bs-toggle="modal"
                   data-bs-target="#pendekatanModal"
                   onclick="editPendekatan({{ $item->id }})">Edit</a>
            </div>
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3" onclick="deletePendekatan({{ $item->id }})">Hapus</a>
            </div>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center py-10">
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
