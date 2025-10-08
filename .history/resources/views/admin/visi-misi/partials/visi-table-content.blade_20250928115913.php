@php
    $visi = \App\Models\VisiDesa::ordered()->get();
@endphp

@forelse($visi as $index => $item)
<tr>
    <td>
        <div class="form-check form-check-sm form-check-custom form-check-solid widget-13-check">
            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" />
        </div>
    </td>
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
                   data-bs-target="#visiModal"
                   onclick="editVisi({{ $item->id }})">Edit</a>
            </div>
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3" onclick="deleteVisi({{ $item->id }})">Hapus</a>
            </div>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center py-10">
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
