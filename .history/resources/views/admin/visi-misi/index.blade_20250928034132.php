@extends('layouts.dashboard.dashboard')

@section('title', 'Manajemen Visi Misi')

@section('menu')
    Visi Misi
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Visi Misi</li>
@endsection

@push('styles')
<style>
/* Advanced Table Styling */
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid rgba(0,0,0,0.05);
}

.table {
    margin-bottom: 0;
    min-width: 900px;
    table-layout: auto;
}

.table tbody tr {
    transition: all 0.2s ease;
}

.table tbody tr:hover {
    background-color: rgba(54, 153, 255, 0.05);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.table td, .table th {
    vertical-align: middle;
    padding: 1rem 0.75rem;
}

.table thead th {
    border-bottom: 2px solid var(--kt-primary);
    background: linear-gradient(135deg, #3699ff 0%, #0665d0 100%);
    color: white !important;
    font-weight: 600;
    padding: 1rem 0.75rem;
    font-size: 0.875rem;
    position: relative;
    z-index: 10;
    white-space: nowrap;
    min-width: fit-content;
}

/* Statistics Cards Animation */
.card.hoverable {
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.08);
}

.card.hoverable:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    border-color: var(--kt-primary);
}

/* Enhanced Symbols */
.symbol-40px {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.symbol-40px:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
}

/* Compact button styling */
.btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    border-radius: 0.5rem;
    transition: all 0.2s ease;
}

.btn-sm:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

/* Action buttons styling */
.btn-success {
    background: linear-gradient(135deg, #00D4AA 0%, #00A389 100%);
    border: none;
    box-shadow: 0 3px 10px rgba(0, 212, 170, 0.3);
    transition: all 0.3s ease;
}

.btn-success:hover {
    background: linear-gradient(135deg, #00A389 0%, #008A74 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 212, 170, 0.4);
}

.btn-warning {
    background: linear-gradient(135deg, #FFC700 0%, #FF9500 100%);
    border: none;
    color: white;
    box-shadow: 0 3px 10px rgba(255, 199, 0, 0.3);
    transition: all 0.3s ease;
}

.btn-warning:hover {
    background: linear-gradient(135deg, #FF9500 0%, #FF7A00 100%);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 199, 0, 0.4);
}

.btn-danger {
    background: linear-gradient(135deg, #F1416C 0%, #E1306C 100%);
    border: none;
    box-shadow: 0 3px 10px rgba(241, 65, 108, 0.3);
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background: linear-gradient(135deg, #E1306C 0%, #C62368 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(241, 65, 108, 0.4);
}

/* Action buttons container */
.d-flex.gap-1 {
    gap: 0.5rem !important;
    flex-wrap: nowrap;
}

.d-flex.gap-1 .btn {
    border-radius: 6px;
    min-width: auto;
    height: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.375rem 0.75rem;
    font-size: 0.8rem;
    white-space: nowrap;
}

.d-flex.gap-1 .btn i {
    margin-right: 0.25rem;
    flex-shrink: 0;
}

@media (max-width: 768px) {
    .d-flex.gap-1 {
        gap: 0.25rem !important;
    }

    .d-flex.gap-1 .btn {
        min-width: 32px;
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }

    .d-flex.gap-1 .btn span {
        display: none;
    }

    .d-flex.gap-1 .btn i {
        margin-right: 0;
    }
}

/* Badge enhancements */
.badge {
    border-radius: 0.5rem;
    padding: 0.5rem 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Tab styling */
.nav-tabs .nav-link {
    border-radius: 0.5rem 0.5rem 0 0;
    border: none;
    color: #6c757d;
    font-weight: 600;
    transition: all 0.3s ease;
}

.nav-tabs .nav-link.active {
    background: linear-gradient(135deg, #3699ff 0%, #0665d0 100%);
    color: white;
    border: none;
}

.nav-tabs .nav-link:hover:not(.active) {
    background-color: rgba(54, 153, 255, 0.1);
    color: #3699ff;
}

/* Content area styling */
.tab-content {
    background: white;
    border-radius: 0 1rem 1rem 1rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid rgba(0,0,0,0.05);
}

/* Loading animation */
@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}

.loading {
    animation: pulse 1.5s infinite;
}

/* Text truncation */
.text-truncate-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.text-truncate-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-check-circle fs-2 text-success me-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Berhasil!</h5>
                            <div>{{ session('success') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!--begin::Statistics Cards-->
            <div class="row g-5 g-xl-8 mb-8">
                <div class="col-xl-3">
                    <div class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="ki-duotone ki-eye fs-2x text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Total Visi</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\VisiDesa::count() }} visi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-target fs-2x text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Total Misi</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\MisiDesa::count() }} misi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-info">
                                        <i class="ki-duotone ki-abstract-26 fs-2x text-info">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Pendekatan</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\PendekatanDesa::count() }} pendekatan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-calendar fs-2x text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Tahapan</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\TahapanDesa::count() }} tahapan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Statistics Cards-->

            <!--begin::Card-->
            <div class="card shadow-sm">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <h3 class="fw-bold text-dark">Manajemen Visi Misi Desa</h3>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Tabs-->
                    <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-bold mb-15" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#visi-tab" role="tab" aria-selected="true">
                                <i class="ki-duotone ki-eye fs-2 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                Visi Desa
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#misi-tab" role="tab" aria-selected="false">
                                <i class="ki-duotone ki-target fs-2 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Misi Desa
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#pendekatan-tab" role="tab" aria-selected="false">
                                <i class="ki-duotone ki-abstract-26 fs-2 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Pendekatan
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tahapan-tab" role="tab" aria-selected="false">
                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Tahapan
                            </a>
                        </li>
                    </ul>
                    <!--end::Tabs-->

                    <!--begin::Tab Content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin::Visi Tab-->
                        <div class="tab-pane fade show active" id="visi-tab" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <h4 class="fw-bold text-dark">Visi Desa</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#visiModal">
                                    <i class="ki-duotone ki-plus fs-2"></i>
                                    Tambah Visi
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="visi-table">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-white border-bottom-3 border-primary">
                                            <th class="min-w-50px">No</th>
                                            <th class="min-w-300px">Visi</th>
                                            <th class="min-w-200px">Deskripsi</th>
                                            <th class="min-w-100px text-center">Status</th>
                                            <th class="text-end min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold" id="visi-content">
                                        @include('admin.visi-misi.partials.visi-table-content')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Visi Tab-->

                        <!--begin::Misi Tab-->
                        <div class="tab-pane fade" id="misi-tab" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <h4 class="fw-bold text-dark">Misi Desa</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#misiModal">
                                    <i class="ki-duotone ki-plus fs-2"></i>
                                    Tambah Misi
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="misi-table">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-white border-bottom-3 border-primary">
                                            <th class="min-w-50px">No</th>
                                            <th class="min-w-200px">Judul</th>
                                            <th class="min-w-300px">Deskripsi</th>
                                            <th class="min-w-200px">Indikator</th>
                                            <th class="min-w-100px text-center">Status</th>
                                            <th class="text-end min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold" id="misi-content">
                                        @include('admin.visi-misi.partials.misi-table-content')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Misi Tab-->

                        <!--begin::Pendekatan Tab-->
                        <div class="tab-pane fade" id="pendekatan-tab" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <h4 class="fw-bold text-dark">Pendekatan Partisipatif</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pendekatanModal">
                                    <i class="ki-duotone ki-plus fs-2"></i>
                                    Tambah Pendekatan
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="pendekatan-table">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-white border-bottom-3 border-primary">
                                            <th class="min-w-50px">No</th>
                                            <th class="min-w-200px">Nama Pendekatan</th>
                                            <th class="min-w-300px">Deskripsi</th>
                                            <th class="min-w-200px">Strategi</th>
                                            <th class="min-w-100px text-center">Status</th>
                                            <th class="text-end min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold" id="pendekatan-content">
                                        @include('admin.visi-misi.partials.pendekatan-table-content')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Pendekatan Tab-->

                        <!--begin::Tahapan Tab-->
                        <div class="tab-pane fade" id="tahapan-tab" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <h4 class="fw-bold text-dark">Tahapan Implementasi</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tahapanModal">
                                    <i class="ki-duotone ki-plus fs-2"></i>
                                    Tambah Tahapan
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="tahapan-table">
                                    <thead>
                                        <tr class="fw-bold fs-6 text-white border-bottom-3 border-primary">
                                            <th class="min-w-50px">No</th>
                                            <th class="min-w-200px">Nama Tahapan</th>
                                            <th class="min-w-300px">Deskripsi</th>
                                            <th class="min-w-200px">Kegiatan</th>
                                            <th class="min-w-150px">Waktu</th>
                                            <th class="min-w-100px text-center">Status</th>
                                            <th class="text-end min-w-100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold" id="tahapan-content">
                                        @include('admin.visi-misi.partials.tahapan-table-content')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Tahapan Tab-->
                    </div>
                    <!--end::Tab Content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Content-->

    <!--begin::Modals-->
    @include('admin.visi-misi.partials.visi-modal')
    @include('admin.visi-misi.partials.misi-modal')
    @include('admin.visi-misi.partials.pendekatan-modal')
    @include('admin.visi-misi.partials.tahapan-modal')
    <!--end::Modals-->
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();

    // Tab switching
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        // Re-initialize tooltips after tab switch
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    // Delete functions
    window.deleteVisi = function(id) {
        Swal.fire({
            title: 'Hapus Visi?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            customClass: {
                confirmButton: "btn btn-danger fw-bold",
                cancelButton: "btn btn-active-light-primary fw-bold"
            }
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `/visi-misi/visi/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                timer: 2000
                            });
                            loadVisiData();
                        }
                    }
                });
            }
        });
    };

    window.deleteMisi = function(id) {
        Swal.fire({
            title: 'Hapus Misi?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            customClass: {
                confirmButton: "btn btn-danger fw-bold",
                cancelButton: "btn btn-active-light-primary fw-bold"
            }
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `/visi-misi/misi/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                timer: 2000
                            });
                            loadMisiData();
                        }
                    }
                });
            }
        });
    };

    window.deletePendekatan = function(id) {
        Swal.fire({
            title: 'Hapus Pendekatan?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            customClass: {
                confirmButton: "btn btn-danger fw-bold",
                cancelButton: "btn btn-active-light-primary fw-bold"
            }
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `/visi-misi/pendekatan/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                timer: 2000
                            });
                            loadPendekatanData();
                        }
                    }
                });
            }
        });
    };

    window.deleteTahapan = function(id) {
        Swal.fire({
            title: 'Hapus Tahapan?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            customClass: {
                confirmButton: "btn btn-danger fw-bold",
                cancelButton: "btn btn-active-light-primary fw-bold"
            }
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: `/visi-misi/tahapan/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                timer: 2000
                            });
                            loadTahapanData();
                        }
                    }
                });
            }
        });
    };

    // Load data functions
    function loadVisiData() {
        $.get('/visi-misi/visi', function(response) {
            $('#visi-content').html(response);
        });
    }

    function loadMisiData() {
        $.get('/visi-misi/misi', function(response) {
            $('#misi-content').html(response);
        });
    }

    function loadPendekatanData() {
        $.get('/visi-misi/pendekatan', function(response) {
            $('#pendekatan-content').html(response);
        });
    }

    function loadTahapanData() {
        $.get('/visi-misi/tahapan', function(response) {
            $('#tahapan-content').html(response);
        });
    }
});
</script>
@endpush
