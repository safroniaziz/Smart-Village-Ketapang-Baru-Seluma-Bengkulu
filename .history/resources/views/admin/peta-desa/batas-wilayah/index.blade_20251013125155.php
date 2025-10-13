@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Batas Wilayah')

@section('menu')
    Batas Wilayah
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
    <li class="breadcrumb-item text-muted">Batas Wilayah</li>
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
                            <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Cari batas wilayah..." />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_batas">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Tambah Batas Wilayah
                            </button>
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
                                    <th class="min-w-150px">Arah</th>
                                    <th class="min-w-250px">Berbatasan Dengan</th>
                                    <th class="min-w-150px">Jenis Wilayah</th>
                                    <th class="min-w-100px">Jarak (km)</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-120px">Tanggal</th>
                                    <th class="w-150px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($batasWilayah as $index => $item)
                                <tr>
                                    <td class="text-gray-700 fw-semibold">{{ $batasWilayah->firstItem() + $index }}</td>
                                    <td>
                                        <span class="badge badge-light-info fs-7 fw-semibold text-capitalize">
                                            {{ $item->arah }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-success">
                                                    <i class="fas fa-map-marked-alt text-success"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="text-gray-900 fw-bold fs-6">{{ $item->berbatasan_dengan }}</div>
                                                @if($item->landmark)
                                                <div class="text-muted fs-7">{{ $item->landmark }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-gray-700">{{ $item->jenis_wilayah }}</td>
                                    <td class="text-center">
                                        <span class="text-gray-700 fw-semibold">{{ $item->jarak_km }}</span>
                                    </td>
                                    <td>
                                        @if($item->is_active)
                                            <span class="badge badge-light-success">Aktif</span>
                                        @else
                                            <span class="badge badge-light-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-muted">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-sm btn-light-info" onclick="showBatasWilayah({{ $item->id }})" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light-warning" onclick="editBatasWilayah({{ $item->id }})" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light-danger" onclick="deleteBatasWilayah({{ $item->id }})" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-10">
                                        <div class="text-muted">
                                            <i class="fas fa-map-marked-alt fs-3x mb-3"></i>
                                            <div class="fw-bold fs-5">Belum ada batas wilayah</div>
                                            <div>Mulai dengan menambahkan batas wilayah pertama</div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($batasWilayah->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-6">
                        <div class="text-muted">
                            Menampilkan {{ $batasWilayah->firstItem() ?? 0 }} - {{ $batasWilayah->lastItem() ?? 0 }} dari {{ $batasWilayah->total() }} batas wilayah
                        </div>
                        <div class="d-flex align-items-center">
                            <nav aria-label="Batas Wilayah pagination">
                                <ul class="pagination pagination-sm mb-0">
                                    {{-- Previous Page Link --}}
                                    @if ($batasWilayah->onFirstPage())
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
                                            <a class="page-link" href="{{ $batasWilayah->previousPageUrl() }}" rel="prev">
                                                <i class="ki-duotone ki-left fs-5">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($batasWilayah->getUrlRange(1, $batasWilayah->lastPage()) as $page => $url)
                                        @if ($page == $batasWilayah->currentPage())
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
                                    @if ($batasWilayah->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $batasWilayah->nextPageUrl() }}" rel="next">
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
@endsection

<!-- Modal Add/Edit Batas Wilayah -->
<div class="modal fade" id="kt_modal_add_batas" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold" id="modal_title_batas">Tambah Batas Wilayah</h2>
                <div id="kt_modal_add_batas_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <form id="kt_modal_add_batas_form" class="form" action="{{ route('admin.peta-desa.batas.store') }}" method="POST">
                @csrf
                <div class="modal-body py-10 px-lg-17">
                    <div class="row g-9 mb-8">
                        <div class="col-md-6">
                            <label class="required fw-semibold fs-6 mb-2">Arah</label>
                            <select name="arah" class="form-select form-select-solid" required>
                                <option value="">Pilih Arah</option>
                                <option value="utara">Utara</option>
                                <option value="selatan">Selatan</option>
                                <option value="barat">Barat</option>
                                <option value="timur">Timur</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="required fw-semibold fs-6 mb-2">Jenis Wilayah</label>
                            <input type="text" name="jenis_wilayah" class="form-control form-control-solid" placeholder="Contoh: Desa, Kecamatan, Sungai" required />
                        </div>
                        <div class="col-md-12">
                            <label class="required fw-semibold fs-6 mb-2">Berbatasan Dengan</label>
                            <input type="text" name="berbatasan_dengan" class="form-control form-control-solid" placeholder="Nama wilayah yang berbatasan" required />
                        </div>
                        <div class="col-md-6">
                            <label class="required fw-semibold fs-6 mb-2">Jarak (km)</label>
                            <input type="number" name="jarak_km" class="form-control form-control-solid" step="0.01" min="0" placeholder="0.00" required />
                        </div>
                        <div class="col-md-6">
                            <label class="fw-semibold fs-6 mb-2">Landmark</label>
                            <input type="text" name="landmark" class="form-control form-control-solid" placeholder="Titik acuan (opsional)" />
                        </div>
                        <div class="col-md-12">
                            <label class="fw-semibold fs-6 mb-2">Koordinat GPS</label>
                            <input type="text" name="koordinat" class="form-control form-control-solid" placeholder="Contoh: -4.321303, 102.765089" />
                        </div>
                        <div class="col-md-12">
                            <label class="fw-semibold fs-6 mb-2">Keterangan</label>
                            <textarea name="keterangan" class="form-control form-control-solid" rows="3" placeholder="Keterangan tambahan (opsional)"></textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                                <label class="form-check-label fw-semibold fs-6" for="is_active">
                                    Status Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Setup CSRF token for AJAX requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function showBatasWilayah(id) {
    // Get batas wilayah data via AJAX
    $.get(`{{ url('admin/peta-desa/batas-wilayah') }}/${id}`, function(response) {
        if (response.success) {
            const batas = response.data;
            Swal.fire({
                title: 'Detail Batas Wilayah',
                html: `
                    <div class="text-start">
                        <p><strong>Arah:</strong> ${batas.arah}</p>
                        <p><strong>Berbatasan Dengan:</strong> ${batas.berbatasan_dengan}</p>
                        <p><strong>Jenis Wilayah:</strong> ${batas.jenis_wilayah}</p>
                        <p><strong>Jarak:</strong> ${batas.jarak_km} km</p>
                        ${batas.landmark ? `<p><strong>Landmark:</strong> ${batas.landmark}</p>` : ''}
                        ${batas.koordinat ? `<p><strong>Koordinat:</strong> ${batas.koordinat}</p>` : ''}
                        <p><strong>Status:</strong> ${batas.is_active ? 'Aktif' : 'Tidak Aktif'}</p>
                        <p><strong>Tanggal Dibuat:</strong> ${new Date(batas.created_at).toLocaleDateString('id-ID')}</p>
                    </div>
                `,
                icon: 'info',
                confirmButtonText: 'Tutup'
            });
        }
    }).fail(function() {
        Swal.fire('Error', 'Gagal mengambil data batas wilayah', 'error');
    });
}

function editBatasWilayah(id) {
    // Get batas wilayah data and populate form
    $.get(`{{ url('admin/peta-desa/batas-wilayah') }}/${id}`, function(response) {
        if (response.success) {
            const batas = response.data;
            $('#modal_title_batas').text('Edit Batas Wilayah');
            $('#kt_modal_add_batas_form').attr('action', `{{ url('admin/peta-desa/batas-wilayah') }}/${id}`);
            $('#kt_modal_add_batas_form').append('<input type="hidden" name="_method" value="PUT">');
            $('select[name="arah"]').val(batas.arah);
            $('input[name="jenis_wilayah"]').val(batas.jenis_wilayah);
            $('input[name="berbatasan_dengan"]').val(batas.berbatasan_dengan);
            $('input[name="jarak_km"]').val(batas.jarak_km);
            $('input[name="landmark"]').val(batas.landmark);
            $('input[name="koordinat"]').val(batas.koordinat);
            $('textarea[name="keterangan"]').val(batas.keterangan);
            $('input[name="is_active"]').prop('checked', batas.is_active);
            $('#kt_modal_add_batas').modal('show');
        }
    }).fail(function() {
        Swal.fire('Error', 'Gagal mengambil data batas wilayah', 'error');
    });
}

function deleteBatasWilayah(id) {
    Swal.fire({
        title: 'Hapus Batas Wilayah?',
        text: 'Data yang dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `{{ route('admin.peta-desa.batas.destroy', '') }}/${id}`,
                type: 'DELETE',
                success: function(response) {
                    Swal.fire('Berhasil!', 'Batas wilayah berhasil dihapus', 'success').then(() => {
                        location.reload();
                    });
                },
                error: function() {
                    Swal.fire('Error', 'Gagal menghapus batas wilayah', 'error');
                }
            });
        }
    });
}

// Reset form when modal is closed
$('#kt_modal_add_batas').on('hidden.bs.modal', function() {
    $('#modal_title_batas').text('Tambah Batas Wilayah');
    $('#kt_modal_add_batas_form')[0].reset();
    $('#kt_modal_add_batas_form').attr('action', '{{ route('admin.peta-desa.batas.store') }}');
    $('input[name="_method"]').remove();
    $('input[name="is_active"]').prop('checked', true);
});
</script>
@endpush
