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
/* Metronic Professional Design System */
.metronic-card {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 0 50px 0 rgba(82, 63, 105, 0.15);
    border: 1px solid #eff2f5;
    transition: all 0.3s ease;
    overflow: hidden;
}

.metronic-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 60px 0 rgba(82, 63, 105, 0.2);
}

/* Card styling sudah menggunakan Bootstrap default */

.card-header-metronic .btn-primary {
    background: #3699ff;
    border-color: #3699ff;
    color: #ffffff;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    transition: all 0.15s ease;
}

.card-header-metronic .btn-primary:hover {
    background: #187de4;
    border-color: #187de4;
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(54, 153, 255, 0.3);
}

/* Spectacular Data Cards */
.data-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 0 0 20px 20px;
    padding: 0;
    margin-bottom: 2rem;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.data-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
}

/* Modern Table Design */
.modern-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: transparent;
}

.modern-table thead th {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    color: #495057;
    font-weight: 700;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 1.5rem 1.25rem;
    border: none;
    position: relative;
}

.modern-table thead th:first-child {
    border-radius: 0;
}

.modern-table thead th:last-child {
    border-radius: 0;
}

.modern-table tbody tr {
    transition: all 0.3s ease;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.modern-table tbody tr:hover {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
    transform: scale(1.01);
}

.modern-table tbody td {
    padding: 1.25rem 1.25rem;
    border: none;
    vertical-align: middle;
    font-size: 0.95rem;
}

/* Spectacular Action Buttons */
.action-btn {
    padding: 0.5rem 1rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: none;
    position: relative;
    overflow: hidden;
}

.action-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s;
}

.action-btn:hover::before {
    left: 100%;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.btn-edit {
    background: linear-gradient(135deg, #ffc107 0%, #ff8f00 100%);
    color: white;
}

.btn-edit:hover {
    background: linear-gradient(135deg, #ff8f00 0%, #ff6f00 100%);
    color: white;
}

.btn-delete {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
}

.btn-delete:hover {
    background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
    color: white;
}

/* Spectacular Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
    border-radius: 20px;
    margin: 2rem 0;
}

.empty-state .icon {
    width: 120px;
    height: 120px;
    margin: 0 auto 2rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: float 3s ease-in-out infinite;
}

.empty-state .icon i {
    font-size: 3rem;
    color: white;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

/* Spectacular Badges */
.modern-badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
}

.badge-active {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
}

.badge-inactive {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .stat-card {
        padding: 1.5rem;
        margin-bottom: 1rem;
    }

    .section-header {
        padding: 1.5rem;
        text-align: center;
    }

    .section-header h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .modern-table {
        font-size: 0.85rem;
    }

    .modern-table tbody td {
        padding: 1rem 0.75rem;
    }

    .action-btn {
        padding: 0.4rem 0.8rem;
        font-size: 0.8rem;
    }
}

/* Spectacular Animations */
@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-up {
    animation: slideInUp 0.6s ease-out;
}

/* Gradient Text */
.gradient-text {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
}

/* Spectacular Loading States */
.loading-shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 1.5s infinite;
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

/* Advanced Features Styling */
.card-toolbar .btn {
    font-weight: 600;
    border-radius: 10px;
    padding: 0.75rem 1.25rem;
    transition: all 0.15s ease;
}

.card-toolbar .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Search Input Styling */
.form-control-solid {
    background-color: #f5f8fa;
    border: 1px solid #e1e5e9;
    color: #5e6278;
}

.form-control-solid:focus {
    background-color: #ffffff;
    border-color: #3699ff;
    box-shadow: 0 0 0 0.2rem rgba(54, 153, 255, 0.25);
}

/* Table Spacing Improvements */
.table td, .table th {
    padding: 1rem 1.25rem !important;
    vertical-align: middle;
}

.table thead th {
    padding: 1.25rem 1.25rem !important;
    font-weight: 600;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #5e6278;
    background-color: #f8f9fa;
    border-bottom: 2px solid #e9ecef;
}

.table tbody tr {
    border-bottom: 1px solid #f1f3f4;
    transition: all 0.2s ease;
}

.table tbody tr:hover {
    background-color: rgba(54, 153, 255, 0.05);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Symbol spacing in table */
.table .symbol {
    margin-right: 0.75rem !important;
}

.table .symbol.symbol-45px {
    width: 45px !important;
    height: 45px !important;
}

/* Action buttons spacing */
.table .btn {
    margin: 0 0.25rem;
    padding: 0.5rem 0.75rem;
    font-size: 0.8rem;
}

/* Responsive Enhancements */
@media (max-width: 992px) {
    .card-header-metronic {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .card-toolbar {
        width: 100%;
    }

    .card-toolbar .d-flex {
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .stats-widget {
        margin-bottom: 1rem;
    }
}

@media (max-width: 768px) {
    .card-header-metronic .card-title {
        font-size: 1.1rem;
    }

    .card-toolbar .btn {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }

    .w-250px {
        width: 100% !important;
    }

    .table-responsive {
        font-size: 0.875rem;
    }
}

@media (max-width: 576px) {
    .stats-widget {
        padding: 1.5rem;
    }

    .stats-widget .widget-number {
        font-size: 2rem;
    }

    .card-header-metronic {
        padding: 1.25rem;
    }
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

            <!-- Statistics Cards - Data Warga Style -->
            <div class="row g-5 g-xl-8 mb-8">
                <div class="col-xl-3">
                    <div class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label" style="background: rgba(102, 126, 234, 0.1);">
                                        <i class="ki-duotone ki-eye fs-2x" style="color: #667eea;">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Visi Desa</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\VisiDesa::count() }} data</div>
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
                                    <div class="symbol-label" style="background: rgba(240, 147, 251, 0.1);">
                                        <i class="ki-duotone ki-flag fs-2x" style="color: #f093fb;">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Misi Desa</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\MisiDesa::count() }} data</div>
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
                                    <div class="symbol-label" style="background: rgba(79, 172, 254, 0.1);">
                                        <i class="ki-duotone ki-abstract-26 fs-2x" style="color: #4facfe;">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Pendekatan</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\PendekatanDesa::count() }} data</div>
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
                                    <div class="symbol-label" style="background: rgba(67, 233, 123, 0.1);">
                                        <i class="ki-duotone ki-calendar fs-2x" style="color: #43e97b;">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Tahapan</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\TahapanDesa::count() }} data</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Professional Visi Section -->
            <div class="card shadow-sm mb-8">
                <div class="card-header">
                    <div class="card-title d-flex flex-column">
                        <h3 class="fw-bold m-0">
                            <i class="ki-duotone ki-eye me-3" style="color: #667eea;">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            Visi Desa
                        </h3>
                        <p class="text-muted mb-0">Kelola visi dan deskripsi pembangunan desa</p>
                    </div>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#visiModal" onclick="loadVisiForEdit()" title="Edit data visi desa">
                            <i class="ki-duotone ki-pencil fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Edit Visi
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <div class="mb-5">
                                    <label class="fw-bold fs-6 text-gray-800 mb-2">Visi:</label>
                                    <div class="p-4 bg-light-primary rounded-3">
                                        <p class="fs-5 text-gray-800 mb-0" id="visi-display">
                                            @if(\App\Models\VisiDesa::first())
                                                {{ \App\Models\VisiDesa::first()->visi }}
                                            @else
                                                <span class="text-muted">Belum ada visi yang ditetapkan</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <label class="fw-bold fs-6 text-gray-800 mb-2">Keterangan:</label>
                                    <div class="p-4 bg-light-info rounded-3">
                                        <p class="fs-6 text-gray-700 mb-0" id="deskripsi-display">
                                            @if(\App\Models\VisiDesa::first())
                                                {{ \App\Models\VisiDesa::first()->deskripsi ?: 'Tidak ada keterangan' }}
                                            @else
                                                <span class="text-muted">Belum ada keterangan visi</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                @if(\App\Models\VisiDesa::first() && \App\Models\VisiDesa::first()->deskripsi_section)
                                <div class="mb-5">
                                    <label class="fw-bold fs-6 text-gray-800 mb-2">Deskripsi Section:</label>
                                    <div class="p-4 bg-light-warning rounded-3">
                                        <p class="fs-6 text-gray-700 mb-0" id="deskripsi-section-display">
                                            {{ \App\Models\VisiDesa::first()->deskripsi_section }}
                                        </p>
                                    </div>
                                </div>
                                @endif
                                @if(\App\Models\VisiDesa::first() && \App\Models\VisiDesa::first()->pendekatan_deskripsi)
                                <div class="mb-5">
                                    <label class="fw-bold fs-6 text-gray-800 mb-2">Pendekatan Deskripsi:</label>
                                    <div class="p-4 bg-light-success rounded-3">
                                        <p class="fs-6 text-gray-700 mb-0" id="pendekatan-deskripsi-display">
                                            {{ \App\Models\VisiDesa::first()->pendekatan_deskripsi }}
                                        </p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Professional Misi Section -->
            <div class="card shadow-sm mb-8">
                <div class="card-header">
                    <div class="card-title d-flex flex-column">
                        <h3 class="fw-bold m-0">
                            <i class="ki-duotone ki-flag me-3" style="color: #f093fb;">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Misi Desa
                        </h3>
                        <p class="text-muted mb-0">Kelola misi dan indikator pencapaian desa</p>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="d-flex align-items-center position-relative me-3">
                                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-misi-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari misi..." />
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#misiModal" title="Tambah data misi baru">
                                <i class="ki-duotone ki-plus fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Tambah Misi
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="misi-table">
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="min-w-150px">Judul Misi</th>
                                    <th class="min-w-200px">Deskripsi</th>
                                    <th class="min-w-150px">Indikator</th>
                                    <th class="min-w-100px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="misi-content">
                                @include('admin.visi-misi.partials.misi-table-content')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Professional Pendekatan Section -->
            <div class="card shadow-sm mb-8">
                <div class="card-header">
                    <div class="card-title d-flex flex-column">
                        <h3 class="fw-bold m-0">
                            <i class="ki-duotone ki-abstract-26 me-3" style="color: #4facfe;">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Pendekatan Partisipatif
                        </h3>
                        <p class="text-muted mb-0">Kelola pendekatan dan strategi pembangunan</p>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="d-flex align-items-center position-relative me-3">
                                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-pendekatan-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari pendekatan..." />
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pendekatanModal" title="Tambah data pendekatan baru">
                                <i class="ki-duotone ki-plus fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Tambah Pendekatan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="pendekatan-table">
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="min-w-150px">Nama Pendekatan</th>
                                    <th class="min-w-200px">Deskripsi</th>
                                    <th class="min-w-150px">Strategi</th>
                                    <th class="min-w-100px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pendekatan-content">
                                @include('admin.visi-misi.partials.pendekatan-table-content')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Professional Tahapan Section -->
            <div class="card shadow-sm mb-8">
                <div class="card-header">
                    <div class="card-title d-flex flex-column">
                        <h3 class="fw-bold m-0">
                            <i class="ki-duotone ki-calendar me-3" style="color: #43e97b;">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Tahapan Implementasi
                        </h3>
                        <p class="text-muted mb-0">Kelola tahapan dan kegiatan pembangunan</p>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="d-flex align-items-center position-relative me-3">
                                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-tahapan-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari tahapan..." />
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tahapanModal" title="Tambah data tahapan baru">
                                <i class="ki-duotone ki-plus fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Tambah Tahapan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="tahapan-table">
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="min-w-150px">Nama Tahapan</th>
                                    <th class="min-w-200px">Deskripsi</th>
                                    <th class="min-w-150px">Kegiatan</th>
                                    <th class="min-w-100px">Waktu</th>
                                    <th class="min-w-100px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tahapan-content">
                                @include('admin.visi-misi.partials.tahapan-table-content')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Spectacular Modals -->
    @include('admin.visi-misi.partials.visi-modal')
    @include('admin.visi-misi.partials.misi-modal')
    @include('admin.visi-misi.partials.pendekatan-modal')
    @include('admin.visi-misi.partials.tahapan-modal')
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();

    // Initialize search functionality for all sections
    function initializeSearch(searchSelector, tableSelector) {
        const searchInput = document.querySelector(searchSelector);
        if (searchInput) {
            searchInput.addEventListener('keyup', function (e) {
                const searchTerm = e.target.value.toLowerCase();
                const tableRows = document.querySelectorAll(`${tableSelector} tbody tr`);

                tableRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    }

    // Initialize search for all sections
    initializeSearch('[data-kt-visi-table-filter="search"]', '#visi-table');
    initializeSearch('[data-kt-misi-table-filter="search"]', '#misi-table');
    initializeSearch('[data-kt-pendekatan-table-filter="search"]', '#pendekatan-table');
    initializeSearch('[data-kt-tahapan-table-filter="search"]', '#tahapan-table');



    // Spectacular delete functions
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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


    // Spectacular load data functions - moved to global scope
    window.loadVisiData = function() {
        $.get('/visi-misi/visi-data', function(response) {
            if (response && response.visi) {
                $('#visi-display').text(response.visi);
                $('#deskripsi-display').text(response.deskripsi || 'Belum ada keterangan visi');
            } else {
                $('#visi-display').text('Belum ada visi yang ditetapkan');
                $('#deskripsi-display').text('Belum ada keterangan visi');
            }
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    };

    window.loadMisiData = function() {
        $.get('/visi-misi/misi', function(response) {
            $('#misi-content').html(response);
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    };

    window.loadPendekatanData = function() {
        $.get('/visi-misi/pendekatan', function(response) {
            $('#pendekatan-content').html(response);
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    };

    window.loadTahapanData = function() {
        $.get('/visi-misi/tahapan', function(response) {
            $('#tahapan-content').html(response);
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    };

    // Load visi data for edit
    window.loadVisiForEdit = function() {
        console.log('loadVisiForEdit called');
        $.get('/visi-misi/visi-data', function(data) {
            console.log('Visi data received in loadVisiForEdit:', data);
            if (data && data.id) {
                console.log('Found visi data with ID:', data.id);
                // Call editVisi function with the data
                if (typeof window.editVisi === 'function') {
                    console.log('Calling editVisi with ID:', data.id);
                    window.editVisi(data.id);
                } else {
                    console.error('editVisi function not found');
                }
            } else {
                console.log('No visi data found, opening modal for add');
                // No visi data, open modal for add
                $('#visiModalTitle').text('Tambah Visi');
                $('#visiSubmitBtn .indicator-label').text('Simpan');
                $('#visi_method').val('POST');
            }
        }).fail(function(xhr, status, error) {
            console.error('Error loading visi data:', xhr.responseText);
            console.error('Status:', status);
            console.error('Error:', error);
            // Open modal for add if error
            $('#visiModalTitle').text('Tambah Visi');
            $('#visiSubmitBtn .indicator-label').text('Simpan');
            $('#visi_method').val('POST');
        });
    };
});
</script>
@endpush
