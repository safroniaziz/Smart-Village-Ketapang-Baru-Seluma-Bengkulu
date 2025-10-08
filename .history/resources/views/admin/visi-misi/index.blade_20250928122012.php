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

/* Professional Statistics Cards */
.stats-widget {
    background: #ffffff;
    border-radius: 15px;
    padding: 2rem;
    border: 1px solid #eff2f5;
    box-shadow: 0 0 50px 0 rgba(82, 63, 105, 0.15);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stats-widget:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px 0 rgba(82, 63, 105, 0.25);
}

.stats-widget::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--widget-color, #3699ff);
    border-radius: 15px 15px 0 0;
}

.stats-widget .widget-icon {
    width: 70px;
    height: 70px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    background: var(--widget-bg, rgba(54, 153, 255, 0.1));
}

.stats-widget .widget-icon i {
    font-size: 2rem;
    color: var(--widget-color, #3699ff);
}

.stats-widget .widget-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #181c32;
    margin-bottom: 0.5rem;
}

.stats-widget .widget-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #181c32;
    margin-bottom: 0.25rem;
}

.stats-widget .widget-desc {
    font-size: 0.9rem;
    color: #7e8299;
    margin: 0;
}

/* Metronic Card Headers */
.card-header-metronic {
    background: #f9f9f9;
    border-bottom: 1px solid #eff2f5;
    padding: 1.75rem 2rem;
    border-radius: 15px 15px 0 0;
    min-height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.card-header-metronic .card-title {
    margin: 0;
    font-size: 1.35rem;
    font-weight: 600;
    color: #181c32;
    display: flex;
    align-items: center;
}

.card-header-metronic .card-title i {
    margin-right: 0.75rem;
    color: #3699ff;
    font-size: 1.5rem;
}

.card-header-metronic .card-subtitle {
    font-size: 0.9rem;
    color: #7e8299;
    margin: 0;
    margin-top: 0.25rem;
}

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

            <!-- Professional Statistics Widgets -->
            <div class="row g-5 g-xl-10 mb-10">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="stats-widget" style="--widget-color: #3699ff; --widget-bg: rgba(54, 153, 255, 0.1);">
                        <div class="widget-icon">
                            <i class="ki-duotone ki-eye">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </div>
                        <div class="widget-number">{{ \App\Models\VisiDesa::count() }}</div>
                        <div class="widget-title">Visi Desa</div>
                        <div class="widget-desc">Data visi tersimpan</div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="stats-widget" style="--widget-color: #f1416c; --widget-bg: rgba(241, 65, 108, 0.1);">
                        <div class="widget-icon">
                            <i class="ki-duotone ki-target">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <div class="widget-number">{{ \App\Models\MisiDesa::count() }}</div>
                        <div class="widget-title">Misi Desa</div>
                        <div class="widget-desc">Data misi tersimpan</div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="stats-widget" style="--widget-color: #50cd89; --widget-bg: rgba(80, 205, 137, 0.1);">
                        <div class="widget-icon">
                            <i class="ki-duotone ki-abstract-26">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <div class="widget-number">{{ \App\Models\PendekatanDesa::count() }}</div>
                        <div class="widget-title">Pendekatan</div>
                        <div class="widget-desc">Strategi partisipatif</div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="stats-widget" style="--widget-color: #ffc700; --widget-bg: rgba(255, 199, 0, 0.1);">
                        <div class="widget-icon">
                            <i class="ki-duotone ki-calendar">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <div class="widget-number">{{ \App\Models\TahapanDesa::count() }}</div>
                        <div class="widget-title">Tahapan</div>
                        <div class="widget-desc">Implementasi pembangunan</div>
                    </div>
                </div>
            </div>

            <!-- Professional Visi Section -->
            <div class="metronic-card mb-8">
                <div class="card-header-metronic">
                    <div>
                        <h3 class="card-title">
                            <i class="ki-duotone ki-eye">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            Visi Desa
                        </h3>
                        <p class="card-subtitle">Kelola visi dan deskripsi pembangunan desa</p>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-filter fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Filter
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <div class="separator border-gray-200"></div>
                                <div class="px-7 py-5" data-kt-user-table-filter="form">
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">Status:</label>
                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                            <option></option>
                                            <option value="active">Aktif</option>
                                            <option value="inactive">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="tooltip" title="Export data">
                                <i class="ki-duotone ki-exit-up fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Export
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#visiModal">
                                <i class="ki-duotone ki-plus fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Tambah Visi
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Search Toolbar -->
                <div class="card-header pt-5 border-0">
                    <div class="card-title d-flex flex-column">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-visi-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari visi..." />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-visi-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-visi-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger" data-kt-visi-table-select="delete_selected">Delete Selected</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="visi-table">
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check" />
                                        </div>
                                    </th>
                                    <th class="min-w-150px">Visi</th>
                                    <th class="min-w-200px">Deskripsi</th>
                                    <th class="min-w-100px text-center">Status</th>
                                    <th class="min-w-100px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="visi-content">
                                @include('admin.visi-misi.partials.visi-table-content')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Professional Misi Section -->
            <div class="metronic-card mb-8">
                <div class="card-header-metronic">
                    <div>
                        <h3 class="card-title">
                            <i class="ki-duotone ki-target">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Misi Desa
                        </h3>
                        <p class="card-subtitle">Kelola misi dan indikator pencapaian desa</p>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#misiModal">
                        <i class="ki-duotone ki-plus fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Tambah Misi
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="misi-table">
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-14-check" />
                                        </div>
                                    </th>
                                    <th class="min-w-150px">Judul Misi</th>
                                    <th class="min-w-200px">Deskripsi</th>
                                    <th class="min-w-150px">Indikator</th>
                                    <th class="min-w-100px text-center">Status</th>
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
            <div class="metronic-card mb-8">
                <div class="card-header-metronic">
                    <div>
                        <h3 class="card-title">
                            <i class="ki-duotone ki-abstract-26">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Pendekatan Partisipatif
                        </h3>
                        <p class="card-subtitle">Kelola pendekatan dan strategi pembangunan</p>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pendekatanModal">
                        <i class="ki-duotone ki-plus fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Tambah Pendekatan
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="pendekatan-table">
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-15-check" />
                                        </div>
                                    </th>
                                    <th class="min-w-150px">Nama Pendekatan</th>
                                    <th class="min-w-200px">Deskripsi</th>
                                    <th class="min-w-150px">Strategi</th>
                                    <th class="min-w-100px text-center">Status</th>
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
            <div class="metronic-card mb-8">
                <div class="card-header-metronic">
                    <div>
                        <h3 class="card-title">
                            <i class="ki-duotone ki-calendar">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Tahapan Implementasi
                        </h3>
                        <p class="card-subtitle">Kelola tahapan dan kegiatan pembangunan</p>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tahapanModal">
                        <i class="ki-duotone ki-plus fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Tambah Tahapan
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="tahapan-table">
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-16-check" />
                                        </div>
                                    </th>
                                    <th class="min-w-150px">Nama Tahapan</th>
                                    <th class="min-w-200px">Deskripsi</th>
                                    <th class="min-w-150px">Kegiatan</th>
                                    <th class="min-w-100px">Waktu</th>
                                    <th class="min-w-100px text-center">Status</th>
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
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    // Initialize tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();

    // Initialize search functionality
    const searchInput = document.querySelector('[data-kt-visi-table-filter="search"]');
    if (searchInput) {
        searchInput.addEventListener('keyup', function (e) {
            const searchTerm = e.target.value.toLowerCase();
            const tableRows = document.querySelectorAll('#visi-table tbody tr');
            
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

    // Initialize bulk selection
    const masterCheckbox = document.querySelector('#visi-table thead input[type="checkbox"]');
    const checkboxes = document.querySelectorAll('#visi-table tbody input[type="checkbox"]');
    const selectedToolbar = document.querySelector('[data-kt-visi-table-toolbar="selected"]');
    const selectedCount = document.querySelector('[data-kt-visi-table-select="selected_count"]');

    if (masterCheckbox) {
        masterCheckbox.addEventListener('change', function() {
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateSelectedToolbar();
        });
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedToolbar);
    });

    function updateSelectedToolbar() {
        const selectedCheckboxes = document.querySelectorAll('#visi-table tbody input[type="checkbox"]:checked');
        const count = selectedCheckboxes.length;
        
        if (count > 0) {
            selectedToolbar.classList.remove('d-none');
            selectedCount.textContent = count;
        } else {
            selectedToolbar.classList.add('d-none');
        }
    }

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

    // Spectacular load data functions
    function loadVisiData() {
        $.get('/visi-misi/visi', function(response) {
            $('#visi-content').html(response);
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    }

    function loadMisiData() {
        $.get('/visi-misi/misi', function(response) {
            $('#misi-content').html(response);
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    }

    function loadPendekatanData() {
        $.get('/visi-misi/pendekatan', function(response) {
            $('#pendekatan-content').html(response);
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    }

    function loadTahapanData() {
        $.get('/visi-misi/tahapan', function(response) {
            $('#tahapan-content').html(response);
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    }
});
</script>
@endpush
