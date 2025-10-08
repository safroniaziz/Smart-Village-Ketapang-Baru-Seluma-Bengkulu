@extends('layouts.dashboard.app')

@section('title', 'Kelola Potensi Wisata')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    <i class="fas fa-map-marked-alt text-primary me-2"></i>Kelola Potensi Wisata
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Potensi Wisata</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <div class="badge badge-light-info fs-7">
                    <i class="fas fa-info-circle me-1"></i>
                    Kelola Pantai Ancol Seluma
                </div>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            @if(session('success'))
            <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <div class="d-flex flex-column">
                    <h4 class="mb-1 text-success">Berhasil!</h4>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                <i class="ki-duotone ki-shield-cross fs-2hx text-danger me-4">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <div class="d-flex flex-column">
                    <h4 class="mb-1 text-danger">Error!</h4>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
            @endif

            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" id="kt_filter_search" class="form-control form-control-solid w-250px ps-13" placeholder="Cari wisata..." value="{{ request('search') }}" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <div class="me-3">
                                <select class="form-select form-select-solid" id="kt_filter_category" data-control="select2" data-placeholder="Pilih Kategori" data-allow-clear="true">
                                    <option></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>
                                            {{ ucwords(str_replace('_', ' ', $category)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="btn btn-light-primary me-3" id="kt_filter_apply">
                                <i class="ki-duotone ki-filter fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Filter
                            </button>
                            <button type="button" class="btn btn-light-danger" id="kt_filter_reset">
                                <i class="ki-duotone ki-cross fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Reset
                            </button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-customer-table-select="selected_count"></span>Terpilih
                            </div>
                            <button type="button" class="btn btn-danger" id="kt_bulk_delete">Hapus Terpilih</button>
                        </div>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    @if($wisata->count() > 0)
                    <form id="bulk-action-form" method="POST" action="{{ route('admin.potensi-wisata.bulk-action') }}">
                        @csrf
                        <div class="row g-6 g-xl-9">
                            @foreach($wisata as $item)
                            <div class="col-md-6 col-xl-4">
                                <!--begin::Card-->
                                <div class="card h-100">
                                    <!--begin::Card header-->
                                    <div class="card-header flex-nowrap border-0 pt-9">
                                        <div class="card-title m-0">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="selected_items[]" />
                                            </div>
                                            <div class="symbol symbol-50px w-50px bg-light">
                                                <img src="{{ $item->thumbnail }}" alt="{{ $item->nama }}" class="w-100 h-100 object-fit-cover rounded" />
                                            </div>
                                        </div>
                                        <div class="card-toolbar">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-bs-toggle="dropdown">
                                                    <i class="ki-duotone ki-dots-horizontal fs-5">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{ route('admin.potensi-wisata.show', $item->id) }}" class="dropdown-item">
                                                        <i class="ki-duotone ki-eye fs-6 me-2"></i>Lihat Detail
                                                    </a>
                                                    <a href="{{ route('admin.potensi-wisata.edit', $item->id) }}" class="dropdown-item">
                                                        <i class="ki-duotone ki-pencil fs-6 me-2"></i>Edit
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item text-danger" onclick="confirmDelete('{{ $item->id }}', '{{ $item->nama }}')">
                                                        <i class="ki-duotone ki-trash fs-6 me-2"></i>Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body p-9 pt-4">
                                        <!--begin::Name-->
                                        <div class="fs-3 fw-bold text-dark">{{ $item->nama }}</div>
                                        <!--end::Name-->

                                        <!--begin::Description-->
                                        <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">
                                            {{ Str::limit($item->deskripsi, 100) }}
                                        </p>
                                        <!--end::Description-->

                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap mb-5">
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                                <div class="fs-6 text-gray-800 fw-bold">
                                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>{{ $item->lokasi }}
                                                </div>
                                                <div class="fw-semibold text-gray-400 fs-7">Lokasi</div>
                                            </div>
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                                <div class="fs-6 text-gray-800 fw-bold">
                                                    <span class="badge badge-light-{{ $item->getCategoryColor() }}">
                                                        {{ $item->getCategoryLabel() }}
                                                    </span>
                                                </div>
                                                <div class="fw-semibold text-gray-400 fs-7">Kategori</div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-wrap mb-5">
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                                <div class="fs-6 text-gray-800 fw-bold">{{ $item->tiket_masuk }}</div>
                                                <div class="fw-semibold text-gray-400 fs-7">Tiket Masuk</div>
                                            </div>
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                                <div class="fs-6 text-gray-800 fw-bold">
                                                    @if($item->status_aktif)
                                                        <span class="badge badge-light-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-light-danger">Nonaktif</span>
                                                    @endif
                                                </div>
                                                <div class="fw-semibold text-gray-400 fs-7">Status</div>
                                            </div>
                                        </div>
                                        <!--end::Info-->

                                        <!--begin::Progress-->
                                        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="Popularitas berdasarkan kunjungan">
                                            <div class="bg-primary rounded h-4px" role="progressbar" style="width: {{ min(($item->jumlah_pengunjung / 100) * 100, 100) }}%" aria-valuenow="{{ $item->jumlah_pengunjung }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <!--end::Progress-->

                                        <!--begin::Users group-->
                                        <div class="d-flex align-items-center mb-7">
                                            <div class="symbol-group symbol-hover flex-nowrap">
                                                @foreach($item->gambar as $index => $image)
                                                    @if($index < 3)
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Gambar {{ $index + 1 }}">
                                                        <img alt="Pic" src="{{ $image }}" />
                                                    </div>
                                                    @endif
                                                @endforeach
                                                @if(count($item->gambar) > 3)
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Dan {{ count($item->gambar) - 3 }} gambar lainnya">
                                                    <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">+{{ count($item->gambar) - 3 }}</span>
                                                </div>
                                                @endif
                                            </div>
                                            @if($item->video_youtube)
                                            <div class="ms-auto">
                                                <span class="badge badge-light-primary">
                                                    <i class="fab fa-youtube me-1"></i>Video
                                                </span>
                                            </div>
                                            @endif
                                        </div>
                                        <!--end::Users group-->

                                        <!--begin::Actions-->
                                        <div class="d-flex">
                                            <a href="{{ route('admin.potensi-wisata.show', $item->id) }}" class="btn btn-sm btn-light btn-active-primary me-2">Lihat</a>
                                            <a href="{{ route('admin.potensi-wisata.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <button type="button" class="btn btn-sm btn-icon btn-light-{{ $item->status_aktif ? 'danger' : 'success' }} ms-auto"
                                                    onclick="toggleStatus('{{ $item->id }}', {{ $item->status_aktif ? 'false' : 'true' }})"
                                                    data-bs-toggle="tooltip"
                                                    title="{{ $item->status_aktif ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                <i class="ki-duotone ki-{{ $item->status_aktif ? 'cross' : 'check' }} fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            @endforeach
                        </div>
                    </form>

                    <!--begin::Pagination-->
                    <div class="d-flex flex-stack flex-wrap pt-10">
                        <div class="fs-6 fw-semibold text-gray-700">
                            Menampilkan {{ $wisata->firstItem() }} sampai {{ $wisata->lastItem() }} dari {{ $wisata->total() }} wisata
                        </div>
                        <ul class="pagination">
                            {{ $wisata->withQueryString()->links() }}
                        </ul>
                    </div>
                    <!--end::Pagination-->
                    @else
                    <!--begin::Empty state-->
                    <div class="text-center py-20">
                        <img src="{{ asset('assets/media/illustrations/sketchy-1/5.png') }}" alt="" class="mw-400px">
                        <div class="fs-1 fw-bolder text-dark mb-4">Belum ada data wisata!</div>
                        <div class="fs-6">Mulai tambahkan potensi wisata pertama Anda</div>
                        <div class="py-10">
                            <a href="{{ route('admin.potensi-wisata.create') }}" class="btn btn-primary">
                                <i class="ki-duotone ki-plus fs-2"></i>Tambah Wisata Pertama
                            </a>
                        </div>
                    </div>
                    <!--end::Empty state-->
                    @endif
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Content-->
</div>

<!-- Delete Form -->
<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Filter functionality
    $('#kt_filter_apply').click(function() {
        const search = $('#kt_filter_search').val();
        const category = $('#kt_filter_category').val();

        const params = new URLSearchParams();
        if (search) params.append('search', search);
        if (category) params.append('kategori', category);

        window.location.href = '{{ route("admin.potensi-wisata.index") }}?' + params.toString();
    });

    $('#kt_filter_reset').click(function() {
        window.location.href = '{{ route("admin.potensi-wisata.index") }}';
    });

    // Search on enter
    $('#kt_filter_search').keypress(function(e) {
        if (e.which == 13) {
            $('#kt_filter_apply').click();
        }
    });

    // Bulk selection
    const checkboxes = $('input[name="selected_items[]"]');
    const selectAllCheckbox = $('#select-all');
    const bulkToolbar = $('[data-kt-customer-table-toolbar="selected"]');
    const baseToolbar = $('[data-kt-customer-table-toolbar="base"]');

    function updateBulkToolbar() {
        const selected = $('input[name="selected_items[]"]:checked').length;
        $('[data-kt-customer-table-select="selected_count"]').text(selected);

        if (selected > 0) {
            baseToolbar.addClass('d-none');
            bulkToolbar.removeClass('d-none');
        } else {
            baseToolbar.removeClass('d-none');
            bulkToolbar.addClass('d-none');
        }
    }

    checkboxes.change(updateBulkToolbar);

    // Bulk delete
    $('#kt_bulk_delete').click(function() {
        const selected = $('input[name="selected_items[]"]:checked').length;
        if (selected === 0) return;

        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: `Anda yakin ingin menghapus ${selected} item terpilih?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#bulk-action-form').append('<input type="hidden" name="bulk_action" value="delete">');
                $('#bulk-action-form').submit();
            }
        });
    });
});

function confirmDelete(id, nama) {
    Swal.fire({
        title: 'Konfirmasi Hapus',
        text: `Anda yakin ingin menghapus "${nama}"?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = $('#delete-form');
            form.attr('action', `/admin/potensi-wisata/${id}`);
            form.submit();
        }
    });
}

function toggleStatus(id, status) {
    $.ajax({
        url: `/admin/potensi-wisata/${id}/toggle-status`,
        method: 'PATCH',
        data: {
            _token: '{{ csrf_token() }}',
            status: status
        },
        success: function(response) {
            if (response.success) {
                toastr.success(response.message);
                setTimeout(() => window.location.reload(), 1000);
            }
        },
        error: function() {
            toastr.error('Terjadi kesalahan saat mengubah status');
        }
    });
}
</script>
@endpush
