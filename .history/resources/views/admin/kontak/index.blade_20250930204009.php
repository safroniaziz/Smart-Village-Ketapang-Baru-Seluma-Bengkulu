@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Kontak')

@section('menu')
    Manajemen Kontak
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Kontak</li>
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

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-cross-circle fs-2 text-danger me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Terjadi Kesalahan</div>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Header Card -->
            <div class="card shadow-sm mb-8">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="fas fa-address-book fs-2x text-primary"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Kontak Desa</h2>
                                    <p class="text-muted mb-0">Kelola informasi kontak dan jam operasional desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('kontak') }}" target="_blank" class="btn btn-light-primary">
                                <i class="fas fa-external-link-alt fs-5 me-2"></i>
                                Lihat di Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-5 g-xl-8 mb-8">
                <div class="col-xl-3">
                    <div class="card bg-light-primary">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label bg-primary-500">
                                        <i class="fas fa-address-book text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-primary-600">{{ $kontak->count() }}</div>
                                    <div class="fs-7 text-muted">Total Kontak</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-light-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label bg-success-500">
                                        <i class="fas fa-check-circle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-success-600">{{ $kontak->where('aktif', true)->count() }}</div>
                                    <div class="fs-7 text-muted">Aktif</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-light-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label bg-warning-500">
                                        <i class="fas fa-phone text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-warning-600">{{ $kontak->whereNotNull('telepon')->count() }}</div>
                                    <div class="fs-7 text-muted">Ada Telepon</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-light-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label bg-info-500">
                                        <i class="fas fa-envelope text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-info-600">{{ $kontak->whereNotNull('email')->count() }}</div>
                                    <div class="fs-7 text-muted">Ada Email</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Table Card -->
            <div class="card shadow-sm">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-kontak-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Cari kontak..." />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-kontak-table-toolbar="base">
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-filter fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Filter
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                <div class="px-7 py-5">
                                    <div class="fs-5 fw-bold text-gray-900 mb-5">Filter Options</div>
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">Status:</label>
                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-kontak-table-filter="status">
                                            <option></option>
                                            <option value="aktif">Aktif</option>
                                            <option value="tidak_aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-kontak-table-filter="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-kontak-table-filter="filter">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_kontak_table">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Nama Desa</th>
                                <th class="min-w-125px">Alamat</th>
                                <th class="min-w-125px">Kontak</th>
                                <th class="min-w-100px">Status</th>
                                <th class="min-w-100px">Dibuat</th>
                                <th class="text-end min-w-100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @forelse($kontak as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <div class="symbol-label bg-light-primary">
                                                <i class="fas fa-building text-primary fs-2x"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="{{ route('admin.kontak.show', $item->id) }}" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6">{{ $item->nama_desa }}</a>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">{{ $item->kepala_desa ?: 'Belum ada' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-gray-900 fw-bold">{{ Str::limit($item->alamat, 50) }}</div>
                                    <div class="text-muted fw-semibold">{{ $item->kode_pos ?: 'Tidak ada' }}</div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        @if($item->telepon)
                                            <a href="tel:{{ $item->telepon }}" class="text-primary fw-bold mb-1">
                                                <i class="fas fa-phone fs-7 me-1"></i>{{ $item->telepon }}
                                            </a>
                                        @endif
                                        @if($item->email)
                                            <a href="mailto:{{ $item->email }}" class="text-primary fw-bold">
                                                <i class="fas fa-envelope fs-7 me-1"></i>{{ $item->email }}
                                            </a>
                                        @endif
                                        @if(!$item->telepon && !$item->email)
                                            <span class="text-muted">Belum ada</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if($item->aktif)
                                        <span class="badge badge-light-success">Aktif</span>
                                    @else
                                        <span class="badge badge-light-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        Aksi
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.kontak.show', $item->id) }}" class="menu-link px-3">
                                                <i class="ki-duotone ki-eye fs-6 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                                Lihat
                                            </a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.kontak.edit', $item->id) }}" class="menu-link px-3">
                                                <i class="ki-duotone ki-pencil fs-6 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                Edit
                                            </a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3 text-danger" data-kt-kontak-table-filter="delete_row" data-id="{{ $item->id }}">
                                                <i class="ki-duotone ki-trash fs-6 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                                Hapus
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-10">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="ki-duotone ki-address-book fs-3x text-muted mb-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <div class="text-muted fs-6">Belum ada data kontak</div>
                                        <a href="{{ route('admin.kontak.create') }}" class="btn btn-primary mt-5">
                                            <i class="ki-duotone ki-plus fs-5 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Tambah Kontak Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.querySelector('[data-kt-kontak-table-filter="search"]');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const value = this.value.toLowerCase();
            const table = document.getElementById('kt_kontak_table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const text = row.textContent.toLowerCase();
                if (text.includes(value)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    }

    // Filter functionality
    const filterButton = document.querySelector('[data-kt-kontak-table-filter="filter"]');
    if (filterButton) {
        filterButton.addEventListener('click', function() {
            const statusFilter = document.querySelector('[data-kt-kontak-table-filter="status"]').value;
            const table = document.getElementById('kt_kontak_table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const statusBadge = row.querySelector('.badge');

                if (statusFilter === '') {
                    row.style.display = '';
                } else if (statusFilter === 'aktif' && statusBadge && statusBadge.textContent.includes('Aktif')) {
                    row.style.display = '';
                } else if (statusFilter === 'tidak_aktif' && statusBadge && statusBadge.textContent.includes('Tidak Aktif')) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    }

    // Reset filter
    const resetButton = document.querySelector('[data-kt-kontak-table-filter="reset"]');
    if (resetButton) {
        resetButton.addEventListener('click', function() {
            document.querySelector('[data-kt-kontak-table-filter="status"]').value = '';
            const table = document.getElementById('kt_kontak_table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                rows[i].style.display = '';
            }
        });
    }

    // Delete functionality
    const deleteButtons = document.querySelectorAll('[data-kt-kontak-table-filter="delete_row"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data kontak akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create form and submit
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/admin/kontak/${id}`;

                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';

                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';

                    form.appendChild(csrfToken);
                    form.appendChild(methodField);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
});
</script>
@endpush
