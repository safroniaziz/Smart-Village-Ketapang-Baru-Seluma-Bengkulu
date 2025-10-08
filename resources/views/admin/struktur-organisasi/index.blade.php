@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Struktur Organisasi')

@section('menu')
    Manajemen Struktur Organisasi
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Struktur Organisasi</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!-- Success Alert -->
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

            <!-- Error Alert -->
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

            <!-- Validation Errors -->
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
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="fas fa-sitemap fs-2x text-primary"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Manajemen Struktur Organisasi</h2>
                                    <p class="text-muted mb-0">Kelola struktur pemerintahan desa dan BPD</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('struktur') }}" target="_blank" class="btn btn-light-primary">
                                    <i class="fas fa-external-link-alt fs-5 me-2"></i>
                                    Lihat di Website
                                </a>
                                <a href="{{ route('admin.struktur-organisasi.create') }}" class="btn btn-primary">
                                    <i class="ki-duotone ki-plus fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                    Tambah Struktur
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-5 g-xl-8 mb-8">
                <!-- Total Struktur -->
                <div class="col-xl-3">
                    <div class="card card-flush h-xl-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="fas fa-users text-primary fs-6"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Total Struktur</a>
                                    <div class="text-gray-500 fw-semibold fs-7">Semua jabatan</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <div class="fs-2x fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ $totalStruktur }}</div>
                                <div class="text-primary fs-base fw-bold">orang</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pemerintahan Desa -->
                <div class="col-xl-3">
                    <div class="card card-flush h-xl-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-light-success">
                                        <i class="fas fa-building text-success fs-6"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Pemerintahan</a>
                                    <div class="text-gray-500 fw-semibold fs-7">Aparatur desa</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <div class="fs-2x fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ $totalPemerintahan }}</div>
                                <div class="text-success fs-base fw-bold">orang</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BPD -->
                <div class="col-xl-3">
                    <div class="card card-flush h-xl-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-light-warning">
                                        <i class="fas fa-balance-scale text-warning fs-6"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">BPD</a>
                                    <div class="text-gray-500 fw-semibold fs-7">Badan Permusyawaratan</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <div class="fs-2x fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ $totalBpd }}</div>
                                <div class="text-warning fs-base fw-bold">orang</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Aktif -->
                <div class="col-xl-3">
                    <div class="card card-flush h-xl-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-light-info">
                                        <i class="fas fa-check-circle text-info fs-6"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Aktif</a>
                                    <div class="text-gray-500 fw-semibold fs-7">Status aktif</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <div class="fs-2x fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ $totalAktif }}</div>
                                <div class="text-info fs-base fw-bold">orang</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter and Search -->
            <div class="card mb-5">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-struktur-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Cari struktur organisasi..." />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end gap-2" data-kt-struktur-table-toolbar="base">
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-filter fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Filter
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                </div>
                                <div class="separator border-gray-200"></div>
                                <div class="px-7 py-5" data-kt-struktur-table-filter="form">
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">Kategori:</label>
                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Pilih kategori" data-allow-clear="true" data-kt-struktur-table-filter="kategori">
                                            <option></option>
                                            <option value="pemerintahan">Pemerintahan</option>
                                            <option value="bpd">BPD</option>
                                        </select>
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">Status:</label>
                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Pilih status" data-allow-clear="true" data-kt-struktur-table-filter="status">
                                            <option></option>
                                            <option value="active">Aktif</option>
                                            <option value="inactive">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-struktur-table-filter="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-struktur-table-filter="filter">Apply</button>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('admin.struktur-organisasi.create') }}" class="btn btn-primary">
                                <i class="ki-duotone ki-plus fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Tambah Struktur
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Table -->
            <div class="card">
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_struktur_table">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_struktur_table .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-200px">Nama & Jabatan</th>
                                <th class="min-w-125px">Kategori</th>
                                <th class="min-w-100px">Level</th>
                                <th class="min-w-100px">Atasan</th>
                                <th class="min-w-100px">Status</th>
                                <th class="min-w-70px">Urutan</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @forelse($strukturOrganisasi as $struktur)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="{{ $struktur->id }}" />
                                        </div>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="{{ route('admin.struktur-organisasi.show', $struktur) }}">
                                                <div class="symbol-label">
                                                    <img src="{{ $struktur->foto_url }}" alt="{{ $struktur->nama }}" class="w-100">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('admin.struktur-organisasi.show', $struktur) }}" class="text-gray-800 text-hover-primary mb-1 fs-6 fw-bold">
                                                {{ $struktur->nama }}
                                            </a>
                                            <span class="text-muted fw-semibold d-block fs-7">
                                                {{ $struktur->level_badge }} {{ $struktur->jabatan }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge badge-light-{{ $struktur->kategori === 'pemerintahan' ? 'success' : 'warning' }} fw-bold">
                                            {{ $struktur->category_badge }} {{ ucfirst($struktur->kategori) }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-info fw-bold">{{ ucfirst(str_replace('_', ' ', $struktur->level)) }}</span>
                                    </td>
                                    <td>
                                        @if($struktur->parent)
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-25px symbol-circle me-2">
                                                    <img src="{{ $struktur->parent->foto_url }}" alt="{{ $struktur->parent->nama }}">
                                                </div>
                                                <span class="text-gray-600 fw-bold fs-7">{{ $struktur->parent->nama }}</span>
                                            </div>
                                        @else
                                            <span class="text-muted fw-bold fs-7">Root</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                            <input class="form-check-input toggle-status" type="checkbox"
                                                   data-id="{{ $struktur->id }}"
                                                   {{ $struktur->aktif ? 'checked' : '' }} />
                                            <label class="form-check-label fw-semibold text-gray-400 ms-3">
                                                {{ $struktur->aktif ? 'Aktif' : 'Tidak Aktif' }}
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light fw-bold fs-8">{{ $struktur->urutan }}</span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.struktur-organisasi.show', $struktur) }}" class="menu-link px-3">
                                                    <i class="fas fa-eye me-2"></i>View
                                                </a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.struktur-organisasi.edit', $struktur) }}" class="menu-link px-3">
                                                    <i class="fas fa-edit me-2"></i>Edit
                                                </a>
                                            </div>
                                            @if($struktur->trashed())
                                                <div class="menu-item px-3">
                                                    <form action="{{ route('admin.struktur-organisasi.restore', $struktur->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="menu-link px-3 btn btn-link p-0 text-start w-100" onclick="return confirm('Restore data ini?')">
                                                            <i class="fas fa-undo me-2"></i>Restore
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <form action="{{ route('admin.struktur-organisasi.force-destroy', $struktur->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="menu-link px-3 btn btn-link p-0 text-start w-100 text-danger" onclick="return confirm('Hapus permanen? Data tidak dapat dikembalikan!')">
                                                            <i class="fas fa-trash-alt me-2"></i>Delete Forever
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="menu-item px-3">
                                                    <form action="{{ route('admin.struktur-organisasi.destroy', $struktur) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="menu-link px-3 btn btn-link p-0 text-start w-100 text-danger" onclick="return confirm('Yakin hapus data ini?')">
                                                            <i class="fas fa-trash me-2"></i>Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-10">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fas fa-sitemap fs-3x text-gray-400 mb-3"></i>
                                            <h3 class="text-gray-600 fw-bold mb-2">Belum Ada Data Struktur Organisasi</h3>
                                            <p class="text-gray-400 mb-4">Tambahkan struktur organisasi pertama Anda</p>
                                            <a href="{{ route('admin.struktur-organisasi.create') }}" class="btn btn-primary">
                                                <i class="ki-duotone ki-plus fs-2"><span class="path1"></span><span class="path2"></span></i>
                                                Tambah Struktur
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($strukturOrganisasi->hasPages())
                    <div class="card-footer d-flex justify-content-between align-items-center py-3">
                        <div class="d-flex align-items-center">
                            <span class="text-gray-700">
                                Showing {{ $strukturOrganisasi->firstItem() }} to {{ $strukturOrganisasi->lastItem() }} of {{ $strukturOrganisasi->total() }} results
                            </span>
                        </div>
                        <div class="d-flex align-items-center">
                            {{ $strukturOrganisasi->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle status functionality
    document.querySelectorAll('.toggle-status').forEach(function(toggle) {
        toggle.addEventListener('change', function() {
            const id = this.dataset.id;
            const isActive = this.checked;

            fetch(`/admin/struktur-organisasi/${id}/toggle-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ aktif: isActive })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const label = this.nextElementSibling;
                    label.textContent = data.aktif ? 'Aktif' : 'Tidak Aktif';

                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                this.checked = !isActive; // Revert toggle

                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Terjadi kesalahan saat mengubah status.'
                });
            });
        });
    });

    // Search functionality
    const searchInput = document.querySelector('[data-kt-struktur-table-filter="search"]');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#kt_struktur_table tbody tr');

            tableRows.forEach(function(row) {
                if (row.querySelector('td[colspan]')) return; // Skip empty state row

                const nameCell = row.querySelector('td:nth-child(2)');
                if (nameCell) {
                    const text = nameCell.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                }
            });
        });
    }

    // Filter functionality
    const filterForm = document.querySelector('[data-kt-struktur-table-filter="form"]');
    if (filterForm) {
        const applyFilter = function() {
            const kategoriFilter = document.querySelector('[data-kt-struktur-table-filter="kategori"]').value;
            const statusFilter = document.querySelector('[data-kt-struktur-table-filter="status"]').value;
            const tableRows = document.querySelectorAll('#kt_struktur_table tbody tr');

            tableRows.forEach(function(row) {
                if (row.querySelector('td[colspan]')) return; // Skip empty state row

                let showRow = true;

                // Category filter
                if (kategoriFilter) {
                    const categoryCell = row.querySelector('td:nth-child(3)');
                    if (categoryCell) {
                        const categoryText = categoryCell.textContent.toLowerCase();
                        showRow = showRow && categoryText.includes(kategoriFilter);
                    }
                }

                // Status filter
                if (statusFilter) {
                    const statusCell = row.querySelector('td:nth-child(6)');
                    if (statusCell) {
                        const isActive = statusCell.querySelector('.form-check-input').checked;
                        const expectedActive = statusFilter === 'active';
                        showRow = showRow && (isActive === expectedActive);
                    }
                }

                row.style.display = showRow ? '' : 'none';
            });
        };

        document.querySelector('[data-kt-struktur-table-filter="filter"]').addEventListener('click', applyFilter);
        document.querySelector('[data-kt-struktur-table-filter="reset"]').addEventListener('click', function() {
            document.querySelector('[data-kt-struktur-table-filter="kategori"]').value = '';
            document.querySelector('[data-kt-struktur-table-filter="status"]').value = '';

            const tableRows = document.querySelectorAll('#kt_struktur_table tbody tr');
            tableRows.forEach(function(row) {
                row.style.display = '';
            });
        });
    }
});
</script>
@endpush
