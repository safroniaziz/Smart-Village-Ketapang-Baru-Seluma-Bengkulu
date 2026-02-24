@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Koordinat Warga')

@section('menu')
    Koordinat Warga
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.peta-desa.index') }}" class="text-muted text-hover-primary">Peta Desa</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Koordinat Warga</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-check-circle fs-2 text-success me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Berhasil</div>
                            <div>{{ session('success') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-cross-circle fs-2 text-danger me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Error</div>
                            <div>{{ session('error') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Card -->
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input
                                type="text"
                                id="wargaSearchInput"
                                data-kt-customer-table-filter="search"
                                class="form-control form-control-solid w-250px ps-13"
                                placeholder="Cari NIK, nama, dusun, no. KK..."
                                value="{{ request('q') }}"
                            />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{ route('data-warga.index') }}" class="btn btn-primary">
                                <i class="ki-duotone ki-people fs-2"></i>
                                Kelola Data Warga
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-row-dashed align-middle gy-4">
                            <thead class="bg-light-primary">
                                <tr class="fw-bold text-gray-800 fs-7 text-uppercase">
                                    <th class="min-w-100px">No</th>
                                    <th class="min-w-200px">NIK</th>
                                    <th class="min-w-250px">Nama Lengkap</th>
                                    <th class="min-w-200px">Koordinat</th>
                                    <th class="min-w-100px">Foto</th>
                                    <th class="min-w-150px">Dusun</th>
                                    <th class="min-w-120px">Tanggal</th>
                                    <th class="w-150px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($warga as $index => $item)
                                <tr id="warga-row-{{ $item->id }}" data-warga-id="{{ $item->id }}">
                                    <td class="text-gray-700 fw-semibold">{{ $warga->firstItem() + $index }}</td>
                                    <td class="text-gray-700">{{ $item->nik }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-4 warga-avatar-wrapper">
                                                @if($item->foto)
                                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Warga" class="warga-avatar">
                                                @else
                                                    <div class="warga-avatar-placeholder">
                                                        <i class="fas fa-user text-info"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="text-gray-900 fw-bold fs-6">{{ $item->nama_lengkap }}</div>
                                                <div class="text-muted fs-7">Kepala Keluarga</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td id="warga-koordinat-{{ $item->id }}">
                                        @if(filled($item->lat) && filled($item->long))
                                            <span class="badge badge-light-success fs-7 fw-semibold">
                                                {{ $item->lat }}, {{ $item->long }}
                                            </span>
                                        @else
                                            <span class="badge badge-light-warning fs-7 fw-semibold">
                                                Belum diisi
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Warga" class="img-thumbnail warga-foto-table" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted fs-7">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->dusun)
                                            <span class="badge badge-light-primary">{{ $item->dusun }}</span>
                                        @else
                                            <span class="text-muted fs-7">-</span>
                                        @endif
                                    </td>
                                    <td class="text-muted">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-sm btn-light-info" onclick="showWarga({{ $item->id }})" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button id="warga-edit-btn-{{ $item->id }}" type="button" class="btn btn-sm {{ filled($item->lat) && filled($item->long) ? 'btn-light-warning' : 'btn-light-primary' }}" onclick="editWarga({{ $item->id }})" title="{{ filled($item->lat) && filled($item->long) ? 'Edit Koordinat' : 'Tambah Koordinat' }}">
                                                <i class="fas {{ filled($item->lat) && filled($item->long) ? 'fa-edit' : 'fa-plus' }}"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-10">
                                        <div class="text-muted">
                                            <i class="fas fa-user fs-3x mb-3"></i>
                                            <div class="fw-bold fs-5">Belum ada data kepala keluarga</div>
                                            <div>Silakan tambah data warga terlebih dahulu</div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($warga->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-6">
                        <div class="text-muted">
                            Menampilkan {{ $warga->firstItem() ?? 0 }} - {{ $warga->lastItem() ?? 0 }} dari {{ $warga->total() }} kepala keluarga
                        </div>
                        <div class="d-flex align-items-center">
                            <nav aria-label="Warga pagination">
                                <ul class="pagination pagination-sm mb-0">
                                    {{-- Previous Page Link --}}
                                    @if ($warga->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">
                                                <i class="ki-duotone ki-left fs-5">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $warga->previousPageUrl() }}" rel="prev">
                                                <i class="ki-duotone ki-left fs-5">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($warga->getUrlRange(1, $warga->lastPage()) as $page => $url)
                                        @if ($page == $warga->currentPage())
                                            <li class="page-item active">
                                                <span class="page-link">{{ $page }}</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($warga->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $warga->nextPageUrl() }}" rel="next">
                                                <i class="ki-duotone ki-right fs-5">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link">
                                                <i class="ki-duotone ki-right fs-5">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Warga Modal -->
    <div class="modal fade" id="detailWargaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Warga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-muted">NIK</label>
                        <div class="fw-semibold" id="detail_nik">-</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted">Nama Lengkap</label>
                        <div class="fw-semibold" id="detail_nama">-</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted">Dusun</label>
                        <div class="fw-semibold" id="detail_dusun">-</div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label text-muted">Koordinat</label>
                        <div class="fw-semibold" id="detail_koordinat">Belum diisi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Koordinat Modal -->
    <div class="modal fade" id="editKoordinatModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah/Edit Koordinat Warga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editKoordinatForm">
                    <div class="modal-body">
                        <input type="hidden" id="edit_warga_id" value="">

                        <div class="mb-3">
                            <label class="form-label">Nama Warga</label>
                            <input type="text" id="edit_nama_warga" class="form-control form-control-solid" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="edit_lat" class="form-label required">Latitude</label>
                            <input type="number" step="any" id="edit_lat" class="form-control" placeholder="-6.123456" required>
                            <div class="form-text">Rentang: -90 sampai 90</div>
                        </div>

                        <div class="mb-0">
                            <label for="edit_long" class="form-label required">Longitude</label>
                            <input type="number" step="any" id="edit_long" class="form-control" placeholder="106.123456" required>
                            <div class="form-text">Rentang: -180 sampai 180</div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="btn_simpan_koordinat">
                            Simpan Koordinat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
.warga-avatar-wrapper {
    width: 40px;
    height: 40px;
    min-width: 40px;
    border-radius: 0.475rem;
    overflow: hidden;
}

.warga-avatar {
    width: 40px !important;
    height: 40px !important;
    object-fit: cover;
    display: block;
}

.warga-avatar-placeholder {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 0.475rem;
    background: #eef6ff;
}

.warga-foto-table {
    width: 50px !important;
    height: 50px !important;
    object-fit: cover;
}
</style>
@endpush

@push('scripts')
<script>
const detailWargaModal = new bootstrap.Modal(document.getElementById('detailWargaModal'));
const editKoordinatModal = new bootstrap.Modal(document.getElementById('editKoordinatModal'));
const showWargaUrlTemplate = @json(route('admin.peta-desa.warga.show', ['id' => '__ID__']));
const updateWargaUrlTemplate = @json(route('admin.peta-desa.warga.update', ['id' => '__ID__']));
const wargaIndexUrl = @json(route('admin.peta-desa.warga.index'));

function buildWargaUrl(urlTemplate, id) {
    return urlTemplate.replace('__ID__', id);
}

function hasCoordinate(value) {
    return value !== null && value !== undefined && value !== '';
}

function showSwal(icon, title, text = '') {
    return Swal.fire({
        icon: icon,
        title: title,
        text: text,
        confirmButtonText: 'OK'
    });
}

function showSwalHtml(icon, title, html = '') {
    return Swal.fire({
        icon: icon,
        title: title,
        html: html,
        confirmButtonText: 'OK'
    });
}

function renderCoordinateBadge(lat, long) {
    if (hasCoordinate(lat) && hasCoordinate(long)) {
        return `<span class="badge badge-light-success fs-7 fw-semibold">${lat}, ${long}</span>`;
    }

    return '<span class="badge badge-light-warning fs-7 fw-semibold">Belum diisi</span>';
}

function updateKoordinatRow(warga) {
    const koordinatCell = document.getElementById(`warga-koordinat-${warga.id}`);
    if (koordinatCell) {
        koordinatCell.innerHTML = renderCoordinateBadge(warga.lat, warga.long);
    }

    const editButton = document.getElementById(`warga-edit-btn-${warga.id}`);
    if (editButton) {
        const filled = hasCoordinate(warga.lat) && hasCoordinate(warga.long);
        editButton.classList.remove('btn-light-warning', 'btn-light-primary');
        editButton.classList.add(filled ? 'btn-light-warning' : 'btn-light-primary');
        editButton.title = filled ? 'Edit Koordinat' : 'Tambah Koordinat';
        editButton.innerHTML = `<i class="fas ${filled ? 'fa-edit' : 'fa-plus'}"></i>`;
    }
}

function applySearch(keyword) {
    const url = new URL(wargaIndexUrl, window.location.origin);
    const trimmed = keyword.trim();

    if (trimmed !== '') {
        url.searchParams.set('q', trimmed);
    }

    window.location.href = url.toString();
}

function initSearch() {
    const searchInput = document.getElementById('wargaSearchInput');
    if (!searchInput) {
        return;
    }

    let debounceTimer;

    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(function() {
            applySearch(searchInput.value);
        }, 500);
    });

    searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            clearTimeout(debounceTimer);
            applySearch(searchInput.value);
        }
    });
}

function showWarga(id) {
    $.get(buildWargaUrl(showWargaUrlTemplate, id))
        .done(function(response) {
            const warga = response.data;
            document.getElementById('detail_nik').textContent = warga.nik || '-';
            document.getElementById('detail_nama').textContent = warga.nama_lengkap || '-';
            document.getElementById('detail_dusun').textContent = warga.dusun || '-';
            document.getElementById('detail_koordinat').textContent =
                (hasCoordinate(warga.lat) && hasCoordinate(warga.long)) ? `${warga.lat}, ${warga.long}` : 'Belum diisi';
            detailWargaModal.show();
        })
        .fail(function() {
            showSwal('error', 'Error', 'Gagal memuat detail warga.');
        });
}

function editWarga(id) {
    $.get(buildWargaUrl(showWargaUrlTemplate, id))
        .done(function(response) {
            const warga = response.data;
            document.getElementById('edit_warga_id').value = warga.id;
            document.getElementById('edit_nama_warga').value = warga.nama_lengkap || '';
            document.getElementById('edit_lat').value = hasCoordinate(warga.lat) ? warga.lat : '';
            document.getElementById('edit_long').value = hasCoordinate(warga.long) ? warga.long : '';
            editKoordinatModal.show();
        })
        .fail(function() {
            showSwal('error', 'Error', 'Gagal memuat data warga.');
        });
}

document.getElementById('editKoordinatForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const wargaId = document.getElementById('edit_warga_id').value;
    const lat = document.getElementById('edit_lat').value;
    const long = document.getElementById('edit_long').value;
    const submitButton = document.getElementById('btn_simpan_koordinat');
    const originalText = submitButton.innerHTML;

    submitButton.disabled = true;
    submitButton.innerHTML = 'Menyimpan...';

    $.ajax({
        url: buildWargaUrl(updateWargaUrlTemplate, wargaId),
        method: 'PUT',
        data: {
            _token: @json(csrf_token()),
            lat: lat,
            long: long
        }
    }).done(function(response) {
        updateKoordinatRow(response.data || { id: wargaId, lat: lat, long: long });
        editKoordinatModal.hide();
        showSwal('success', 'Berhasil', response.message || 'Koordinat berhasil disimpan.');
    }).fail(function(xhr) {
        if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
            const errors = [];
            Object.values(xhr.responseJSON.errors).forEach(function(messages) {
                messages.forEach(function(message) {
                    errors.push(message);
                });
            });
            showSwalHtml('warning', 'Validasi gagal', errors.join('<br>'));
        } else {
            showSwal('error', 'Error', 'Terjadi kesalahan saat menyimpan koordinat.');
        }
    }).always(function() {
        submitButton.disabled = false;
        submitButton.innerHTML = originalText;
    });
});

initSearch();
</script>
@endpush
