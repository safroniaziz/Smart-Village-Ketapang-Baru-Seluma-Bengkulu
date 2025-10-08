@extends('layouts.dashboard.dashboard')

@section('title', 'Data Warga')

@push('styles')
<style>
/* Custom table responsive improvements */
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

/* Improve table cell spacing */
.table td {
    vertical-align: middle;
    padding: 0.75rem 0.5rem;
}

/* Better symbol sizing */
.symbol-40px {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
}

/* Compact button styling */
.btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
}

/* Menu improvements */
.menu-link {
    display: flex;
    align-items: center;
    padding: 0.5rem 0.75rem;
}

/* Custom Pagination Styling */
.pagination-wrapper .btn {
    border: 1px solid var(--kt-gray-300);
    margin: 0 1px;
    min-width: 38px;
    height: 38px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.15s ease;
}

.pagination-wrapper .btn:hover:not(.disabled) {
    background-color: var(--kt-primary-light);
    border-color: var(--kt-primary);
    color: var(--kt-primary);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.pagination-wrapper .btn.btn-primary {
    background-color: var(--kt-primary);
    border-color: var(--kt-primary);
    color: white;
    font-weight: 600;
}

.pagination-wrapper .btn.disabled {
    opacity: 0.5;
    cursor: not-allowed;
    pointer-events: none;
}

.pagination-wrapper .btn i {
    font-size: 14px;
}

/* Responsive table improvements */
@media (max-width: 768px) {
    .table td, .table th {
        padding: 0.5rem 0.25rem;
        font-size: 0.875rem;
    }
    
    .symbol-40px {
        width: 35px;
        height: 35px;
    }
    
    .pagination-wrapper {
        flex-direction: column;
        gap: 1rem;
    }
    
    .pagination-wrapper .btn {
        min-width: 35px;
        height: 35px;
        font-size: 0.8rem;
    }
}
</style>
@endpush

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Data Warga
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Data Warga</li>
                </ul>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
                            <input type="text" id="kt_table_search" 
                                   class="form-control form-control-solid w-250px ps-13" 
                                   placeholder="Cari warga..." 
                                   value="{{ request('q') }}" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center" data-kt-user-table-toolbar="base">
                            <!--begin::Filter-->
                            <button type="button" class="btn btn-light-primary me-3 btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_filter">
                                <i class="ki-duotone ki-filter fs-5 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Filter
                            </button>
                            <!--end::Filter-->
                            
                            <!--begin::Export-->
                            <button type="button" class="btn btn-light-primary me-3 btn-sm" data-bs-toggle="tooltip" title="Export data">
                                <i class="ki-duotone ki-exit-up fs-5 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Export
                            </button>
                            <!--end::Export-->
                            
                            <!--begin::Add user-->
                            <a href="{{ route('data-warga.create') }}" class="btn btn-primary btn-sm">
                                <i class="ki-duotone ki-plus fs-5 me-1"></i>
                                Tambah Warga
                            </a>
                            <!--end::Add user-->
                        </div>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_warga">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_warga .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-125px">Warga</th>
                                    <th class="min-w-100px d-none d-md-table-cell">NIK</th>
                                    <th class="min-w-100px d-none d-lg-table-cell">Jenis Kelamin</th>
                                    <th class="min-w-80px d-none d-md-table-cell">Umur</th>
                                    <th class="min-w-100px d-none d-lg-table-cell">Dusun</th>
                                    <th class="min-w-100px d-none d-xl-table-cell">Pekerjaan</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="text-end min-w-100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @forelse($wargas as $warga)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="{{ $warga->id }}" />
                                        </div>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-40px overflow-hidden me-3">
                                            <a href="{{ route('data-warga.show', $warga) }}">
                                                @if($warga->foto)
                                                    <div class="symbol-label">
                                                        <img src="{{ asset('storage/' . $warga->foto) }}" alt="{{ $warga->nama_lengkap }}" class="w-100" />
                                                    </div>
                                                @else
                                                    <div class="symbol-label fs-6 {{ $warga->jenis_kelamin == 'Laki-laki' ? 'bg-light-primary text-primary' : 'bg-light-danger text-danger' }}">
                                                        {{ substr($warga->nama_lengkap, 0, 1) }}
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('data-warga.show', $warga) }}" class="text-gray-800 text-hover-primary mb-1 fw-bold">
                                                {{ Str::limit($warga->nama_lengkap, 20) }}
                                            </a>
                                            <span class="text-muted fs-7">{{ Str::limit($warga->tempat_lahir ?? '-', 15) }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-gray-600 fw-semibold">{{ $warga->nik ?? '-' }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-{{ $warga->jenis_kelamin == 'Laki-laki' ? 'primary' : 'danger' }} fs-7">
                                            {{ $warga->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($warga->tanggal_lahir)
                                            {{ \Carbon\Carbon::parse($warga->tanggal_lahir)->age }} tahun
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $warga->dusun ?? '-' }}</td>
                                    <td><span class="text-gray-600">{{ Str::limit($warga->pekerjaan ?? '-', 15) }}</span></td>
                                    <td>
                                        @if($warga->status_aktif)
                                            <div class="badge badge-light-success">Aktif</div>
                                        @else
                                            <div class="badge badge-light-danger">Tidak Aktif</div>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Aksi
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route('data-warga.show', $warga) }}" class="menu-link px-3">
                                                    <i class="ki-duotone ki-eye fs-5 me-2"></i>
                                                    Lihat
                                                </a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('data-warga.edit', $warga) }}" class="menu-link px-3">
                                                    <i class="ki-duotone ki-pencil fs-5 me-2"></i>
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 text-danger" onclick="deleteWarga({{ $warga->id }})">
                                                    <i class="ki-duotone ki-trash fs-5 me-2"></i>
                                                    Hapus
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center py-10">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="ki-duotone ki-file-down fs-2x text-muted mb-4">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <span class="text-muted">Tidak ada data warga</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->

                    <!--begin::Pagination-->
                    @if($wargas->hasPages())
                    <div class="d-flex flex-stack flex-wrap pt-10 pagination-wrapper">
                        <div class="fs-6 fw-semibold text-gray-700">
                            Menampilkan {{ $wargas->firstItem() }} sampai {{ $wargas->lastItem() }} dari {{ $wargas->total() }} data
                        </div>
                        <div class="d-flex align-items-center">
                            <!--begin::Previous-->
                            @if ($wargas->onFirstPage())
                                <span class="btn btn-sm btn-light disabled me-2">
                                    <i class="ki-duotone ki-left fs-5 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Previous
                                </span>
                            @else
                                <a href="{{ $wargas->previousPageUrl() }}" class="btn btn-sm btn-light me-2">
                                    <i class="ki-duotone ki-left fs-5 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Previous
                                </a>
                            @endif
                            <!--end::Previous-->

                            <!--begin::Pages-->
                            <div class="d-flex align-items-center me-2">
                                @if($wargas->lastPage() > 1)
                                    @php
                                        $start = max(1, $wargas->currentPage() - 2);
                                        $end = min($wargas->lastPage(), $wargas->currentPage() + 2);
                                    @endphp
                                    
                                    @if($start > 1)
                                        <a href="{{ $wargas->url(1) }}" class="btn btn-sm btn-light me-1">1</a>
                                        @if($start > 2)
                                            <span class="btn btn-sm btn-light disabled me-1">...</span>
                                        @endif
                                    @endif
                                    
                                    @for($page = $start; $page <= $end; $page++)
                                        @if($page == $wargas->currentPage())
                                            <span class="btn btn-sm btn-primary me-1">{{ $page }}</span>
                                        @else
                                            <a href="{{ $wargas->url($page) }}" class="btn btn-sm btn-light me-1">{{ $page }}</a>
                                        @endif
                                    @endfor
                                    
                                    @if($end < $wargas->lastPage())
                                        @if($end < $wargas->lastPage() - 1)
                                            <span class="btn btn-sm btn-light disabled me-1">...</span>
                                        @endif
                                        <a href="{{ $wargas->url($wargas->lastPage()) }}" class="btn btn-sm btn-light me-1">{{ $wargas->lastPage() }}</a>
                                    @endif
                                @endif
                            </div>
                            <!--end::Pages-->

                            <!--begin::Next-->
                            @if ($wargas->hasMorePages())
                                <a href="{{ $wargas->nextPageUrl() }}" class="btn btn-sm btn-light">
                                    Next
                                    <i class="ki-duotone ki-right fs-5 ms-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                            @else
                                <span class="btn btn-sm btn-light disabled">
                                    Next
                                    <i class="ki-duotone ki-right fs-5 ms-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                            @endif
                            <!--end::Next-->
                        </div>
                    </div>
                    @endif
                    <!--end::Pagination-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Content-->
</div>

<!--begin::Modal - Filter-->
<div class="modal fade" id="kt_modal_filter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form action="{{ route('data-warga.index') }}" method="GET" id="filterForm">
                <div class="modal-header">
                    <h2 class="fw-bold">Filter Data Warga</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <div class="row g-9 mb-8">
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Jenis Kelamin</label>
                            <select class="form-select" name="gender">
                                <option value="">Semua</option>
                                <option value="Laki-laki" {{ request('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ request('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Dusun</label>
                            <select class="form-select" name="dusun">
                                <option value="">Semua Dusun</option>
                                @foreach($dusunOptions as $dusun)
                                    <option value="{{ $dusun }}" {{ request('dusun') == $dusun ? 'selected' : '' }}>
                                        {{ $dusun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Agama</label>
                            <select class="form-select" name="religion">
                                <option value="">Semua Agama</option>
                                @foreach($agamaOptions as $agama)
                                    <option value="{{ $agama }}" {{ request('religion') == $agama ? 'selected' : '' }}>
                                        {{ $agama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Status Perkawinan</label>
                            <select class="form-select" name="status">
                                <option value="">Semua Status</option>
                                @foreach($statusOptions as $status)
                                    <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Pendidikan</label>
                            <select class="form-select" name="education">
                                <option value="">Semua Pendidikan</option>
                                @foreach($educationOptions as $education)
                                    <option value="{{ $education }}" {{ request('education') == $education ? 'selected' : '' }}>
                                        {{ $education }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="fs-6 fw-semibold mb-2">Rentang Umur</label>
                            <select class="form-select" name="age_range">
                                <option value="">Semua Umur</option>
                                <option value="0-17" {{ request('age_range') == '0-17' ? 'selected' : '' }}>0-17 tahun</option>
                                <option value="18-30" {{ request('age_range') == '18-30' ? 'selected' : '' }}>18-30 tahun</option>
                                <option value="31-50" {{ request('age_range') == '31-50' ? 'selected' : '' }}>31-50 tahun</option>
                                <option value="51+" {{ request('age_range') == '51+' ? 'selected' : '' }}>51+ tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-9">
                        <div class="col-md-12">
                            <label class="fs-6 fw-semibold mb-2">Pekerjaan</label>
                            <select class="form-select" name="profession">
                                <option value="">Semua Pekerjaan</option>
                                @foreach($professionOptions as $profession)
                                    <option value="{{ $profession }}" {{ request('profession') == $profession ? 'selected' : '' }}>
                                        {{ $profession }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-light-primary" onclick="resetFilter()">Reset</button>
                    <button type="submit" class="btn btn-primary">Terapkan Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal - Filter-->

@endsection

@push('scripts')
<script>
// Search functionality
document.getElementById('kt_table_search').addEventListener('input', function(e) {
    const searchTerm = e.target.value;
    if (searchTerm.length > 2 || searchTerm.length === 0) {
        window.location.href = `{{ route('data-warga.index') }}?q=${encodeURIComponent(searchTerm)}`;
    }
});

// Reset filter function
function resetFilter() {
    document.getElementById('filterForm').reset();
    window.location.href = `{{ route('data-warga.index') }}`;
}

// Delete warga function
function deleteWarga(id) {
    Swal.fire({
        text: "Apakah Anda yakin akan menghapus data warga ini?",
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        customClass: {
            confirmButton: "btn fw-bold btn-danger",
            cancelButton: "btn fw-bold btn-active-light-primary"
        }
    }).then(function(result) {
        if (result.value) {
            // Create and submit delete form
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `{{ url('data-warga') }}/${id}`;
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            
            const tokenField = document.createElement('input');
            tokenField.type = 'hidden';
            tokenField.name = '_token';
            tokenField.value = '{{ csrf_token() }}';
            
            form.appendChild(methodField);
            form.appendChild(tokenField);
            document.body.appendChild(form);
            form.submit();
        }
    });
}
</script>
@endpush