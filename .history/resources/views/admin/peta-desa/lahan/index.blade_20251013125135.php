@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Data Lahan')

@section('menu')
    Data Lahan
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
    <li class="breadcrumb-item text-muted">Data Lahan</li>
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
                            <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Cari data lahan..." />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_lahan">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Tambah Data Lahan
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
                                    <th class="min-w-200px">NIK</th>
                                    <th class="min-w-250px">Nama Lengkap</th>
                                    <th class="min-w-200px">Koordinat</th>
                                    <th class="min-w-100px">Foto</th>
                                    <th class="min-w-120px">Tanggal</th>
                                    <th class="w-150px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lahan as $index => $item)
                                <tr>
                                    <td class="text-gray-700 fw-semibold">{{ $lahan->firstItem() + $index }}</td>
                                    <td class="text-gray-700">{{ $item->nik }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-success">
                                                    <i class="fas fa-map-marker-alt text-success"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="text-gray-900 fw-bold fs-6">{{ $item->nama_lengkap }}</div>
                                                <div class="text-muted fs-7">Data Lahan Warga</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-info fs-7 fw-semibold">
                                            {{ $item->lat }}, {{ $item->long }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($item->foto_path)
                                            <img src="{{ asset($item->foto_path) }}" alt="Foto Lahan" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted fs-7">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td class="text-muted">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-sm btn-light-info" onclick="showLahan({{ $item->id }})" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light-warning" onclick="editLahan({{ $item->id }})" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light-danger" onclick="deleteLahan({{ $item->id }})" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-10">
                                        <div class="text-muted">
                                            <i class="fas fa-map-marker-alt fs-3x mb-3"></i>
                                            <div class="fw-bold fs-5">Belum ada data lahan</div>
                                            <div>Mulai dengan menambahkan data lahan pertama</div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($lahan->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-6">
                        <div class="text-muted">
                            Menampilkan {{ $lahan->firstItem() ?? 0 }} - {{ $lahan->lastItem() ?? 0 }} dari {{ $lahan->total() }} data lahan
                        </div>
                        <div class="d-flex align-items-center">
                            <nav aria-label="Lahan pagination">
                                <ul class="pagination pagination-sm mb-0">
                                    {{-- Previous Page Link --}}
                                    @if ($lahan->onFirstPage())
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
                                            <a class="page-link" href="{{ $lahan->previousPageUrl() }}" rel="prev">
                                                <i class="ki-duotone ki-left fs-5">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($lahan->getUrlRange(1, $lahan->lastPage()) as $page => $url)
                                        @if ($page == $lahan->currentPage())
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
                                    @if ($lahan->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $lahan->nextPageUrl() }}" rel="next">
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

<!-- Modal Add/Edit Lahan -->
<div class="modal fade" id="kt_modal_add_lahan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold" id="modal_title">Tambah Data Lahan</h2>
                <div id="kt_modal_add_lahan_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <form id="kt_modal_add_lahan_form" class="form" action="{{ route('admin.peta-desa.lahan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body py-10 px-lg-17">
                    <div class="row g-9 mb-8">
                        <div class="col-md-6">
                            <label class="required fw-semibold fs-6 mb-2">NIK</label>
                            <input type="text" name="nik" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Masukkan NIK" required />
                        </div>
                        <div class="col-md-6">
                            <label class="required fw-semibold fs-6 mb-2">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Masukkan nama lengkap" required />
                        </div>
                        <div class="col-md-6">
                            <label class="required fw-semibold fs-6 mb-2">Latitude</label>
                            <input type="number" name="lat" class="form-control form-control-solid mb-3 mb-lg-0" step="0.0000001" min="-90" max="90" placeholder="Contoh: -4.321303" required />
                        </div>
                        <div class="col-md-6">
                            <label class="required fw-semibold fs-6 mb-2">Longitude</label>
                            <input type="number" name="long" class="form-control form-control-solid mb-3 mb-lg-0" step="0.0000001" min="-180" max="180" placeholder="Contoh: 102.765089" required />
                        </div>
                        <div class="col-md-12">
                            <label class="fw-semibold fs-6 mb-2">Foto Lahan</label>
                            <input type="file" name="foto" class="form-control form-control-solid" accept="image/*" />
                            <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB</div>
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

function showLahan(id) {
    // Get lahan data via AJAX
    $.get(`{{ url('admin/peta-desa/lahan') }}/${id}`, function(response) {
        if (response.success) {
            const lahan = response.data;
            Swal.fire({
                title: 'Detail Data Lahan',
                html: `
                    <div class="text-start">
                        <p><strong>NIK:</strong> ${lahan.nik}</p>
                        <p><strong>Nama:</strong> ${lahan.nama_lengkap}</p>
                        <p><strong>Koordinat:</strong> ${lahan.lat}, ${lahan.long}</p>
                        <p><strong>Tanggal Dibuat:</strong> ${new Date(lahan.created_at).toLocaleDateString('id-ID')}</p>
                        ${lahan.foto_path ? `<p><strong>Foto:</strong> <a href="${lahan.foto_path}" target="_blank">Lihat Foto</a></p>` : ''}
                    </div>
                `,
                icon: 'info',
                confirmButtonText: 'Tutup'
            });
        }
    }).fail(function() {
        Swal.fire('Error', 'Gagal mengambil data lahan', 'error');
    });
}

function editLahan(id) {
    // Get lahan data and populate form
    $.get(`{{ url('admin/peta-desa/lahan') }}/${id}`, function(response) {
        if (response.success) {
            const lahan = response.data;
            $('#modal_title').text('Edit Data Lahan');
            $('#kt_modal_add_lahan_form').attr('action', `{{ url('admin/peta-desa/lahan') }}/${id}`);
            $('#kt_modal_add_lahan_form').append('<input type="hidden" name="_method" value="PUT">');
            $('input[name="nik"]').val(lahan.nik);
            $('input[name="nama_lengkap"]').val(lahan.nama_lengkap);
            $('input[name="lat"]').val(lahan.lat);
            $('input[name="long"]').val(lahan.long);
            $('#kt_modal_add_lahan').modal('show');
        }
    }).fail(function() {
        Swal.fire('Error', 'Gagal mengambil data lahan', 'error');
    });
}

function deleteLahan(id) {
    Swal.fire({
        title: 'Hapus Data Lahan?',
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
                url: `{{ route('admin.peta-desa.lahan.destroy', '') }}/${id}`,
                type: 'DELETE',
                success: function(response) {
                    Swal.fire('Berhasil!', 'Data lahan berhasil dihapus', 'success').then(() => {
                        location.reload();
                    });
                },
                error: function() {
                    Swal.fire('Error', 'Gagal menghapus data lahan', 'error');
                }
            });
        }
    });
}

// Reset form when modal is closed
$('#kt_modal_add_lahan').on('hidden.bs.modal', function() {
    $('#modal_title').text('Tambah Data Lahan');
    $('#kt_modal_add_lahan_form')[0].reset();
    $('#kt_modal_add_lahan_form').attr('action', '{{ route('admin.peta-desa.lahan.store') }}');
    $('input[name="_method"]').remove();
});
</script>
@endpush
