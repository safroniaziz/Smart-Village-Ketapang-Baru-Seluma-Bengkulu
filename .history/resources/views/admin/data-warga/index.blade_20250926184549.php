@extends('layouts.dashboard.dashboard')

@section('title', 'Data Warga')

@section('menu')
    Data Warga
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Data Warga</li>
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

/* Prevent text overflow in table cells */
.table td, .table th {
    vertical-align: middle;
    padding: 1rem 0.75rem;
}

/* Make profile photos 3x4 aspect ratio (portrait) */
.table .symbol.foto-3x4 {
    width: 30px !important;
    height: 40px !important;
    border-radius: 4px !important;
}

.table .symbol.foto-3x4 .symbol-label {
    width: 30px !important;
    height: 40px !important;
    border-radius: 4px !important;
    -webkit-border-radius: 4px !important;
    -moz-border-radius: 4px !important;
}

.table .symbol.foto-3x4 .symbol-label img {
    width: 30px !important;
    height: 40px !important;
    border-radius: 4px !important;
    -webkit-border-radius: 4px !important;
    -moz-border-radius: 4px !important;
    object-fit: cover !important;
}

/* Override any circular or square styling */
.table .symbol.foto-3x4,
.table .symbol.foto-3x4 *,
tbody .symbol.foto-3x4,
td .symbol.foto-3x4 {
    border-radius: 4px !important;
}

/* Specific styling for foto 3x4 */
.foto-3x4 {
    width: 30px !important;
    height: 40px !important;
    border-radius: 4px !important;
}

.foto-3x4 .symbol-label {
    width: 30px !important;
    height: 40px !important;
    border-radius: 4px !important;
}

.foto-3x4 img {
    width: 30px !important;
    height: 40px !important;
    object-fit: cover !important;
    border-radius: 4px !important;
}

/* Table row visibility */
.table tbody tr.d-none {
    display: none !important;
}

.table tbody tr:not(.d-none) {
    display: table-row !important;
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
    white-space: nowrap; /* Prevent text wrapping in headers */
    min-width: fit-content;
}

/* Responsive column widths */
.table th:nth-child(1) { width: 40px; } /* Checkbox */
.table th:nth-child(2) { min-width: 200px; } /* Nama + NIK */
.table th:nth-child(3) { min-width: 120px; text-align: center; } /* Gender */
.table th:nth-child(4) { min-width: 80px; text-align: center; } /* Umur */
.table th:nth-child(5) { min-width: 100px; text-align: center; } /* Dusun */
.table th:nth-child(6) { min-width: 140px; } /* Mata Pencaharian */
.table th:nth-child(7) { min-width: 100px; text-align: center; } /* Status */
.table th:nth-child(8) { min-width: 140px; width: 140px; } /* Aksi */

/* Mobile responsive adjustments */
@media (max-width: 768px) {
    .table-responsive {
        margin: 0 -1rem; /* Full width on mobile */
        border-radius: 0;
    }

    .table {
        min-width: 600px; /* Reduced minimum width for mobile */
        font-size: 0.85rem;
    }

    .table th,
    .table td {
        padding: 0.5rem 0.25rem;
    }

    .table th:nth-child(2) { min-width: 120px; }
    .table th:nth-child(3) { min-width: 100px; }
    .table th:nth-child(9) { min-width: 120px; }
}

.table tbody tr {
    transition: all 0.3s ease;
    cursor: pointer;
}

.table tbody tr:hover {
    background: linear-gradient(135deg, rgba(33, 150, 243, 0.04) 0%, rgba(33, 150, 243, 0.08) 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
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

.card.hoverable .symbol-label {
    position: relative;
    overflow: hidden;
}

.card.hoverable .symbol-label::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.card.hoverable:hover .symbol-label::before {
    left: 100%;
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

/* Menu improvements */
.menu {
    border-radius: 0.75rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    border: 1px solid rgba(0,0,0,0.08);
}

.menu-link {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
    margin: 0.25rem;
    transition: all 0.2s ease;
}

.menu-link:hover {
    background: var(--kt-primary-light);
    color: var(--kt-primary);
    transform: translateX(4px);
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

/* Loading button styles */
.btn-loading {
    position: relative;
    pointer-events: none;
    opacity: 0.8;
    transform: none !important;
}

.btn-loading .spinner-border-sm {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Export button enhancements */
.export-btn {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.export-btn:hover {
    transform: translateX(4px);
    background: var(--kt-primary-light) !important;
    color: var(--kt-primary) !important;
}

.export-btn.btn-loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    animation: shimmer 1.5s infinite;
}

@keyframes shimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}


/* Family Header Click Effect */
.family-header {
    cursor: pointer !important;
    transition: all 0.3s ease;
}

.family-header:hover {
    background-color: rgba(54, 153, 255, 0.1) !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.family-header:active {
    transform: translateY(0);
}

/* Member Detail Cards */
.member-detail-card {
    transition: all 0.3s ease;
    border-radius: 1rem;
}

.member-detail-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

.member-detail-card .symbol {
    border-radius: 1rem;
}

.member-detail-card .symbol img {
    border-radius: 1rem;
}

/* Family Stats Badges */
.badge {
    font-size: 0.75rem;
    padding: 0.5rem 0.75rem;
    border-radius: 0.5rem;
}


/* Loading Animation */
.spinner-border {
    animation: spinner-border 0.75s linear infinite;
}





/* Table body enhancements */
.table tbody tr {
    border-bottom: 1px solid #f1f3f6;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.table tbody tr:hover {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
    transform: translateY(-1px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    border-left: 4px solid var(--kt-primary);
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
        display: none; /* Hide text on mobile, show only icons */
    }

    .d-flex.gap-1 .btn i {
        margin-right: 0;
    }
}

@media (max-width: 576px) {
    .d-flex.gap-1 .btn {
        min-width: 28px;
        padding: 0.2rem 0.3rem;
    }
}

/* Sort icons styling for dark header */
.table thead th .sort-icon {
    color: rgba(255, 255, 255, 0.7);
    transition: all 0.3s ease;
}

.table thead th:hover .sort-icon {
    color: white;
    transform: scale(1.1);
}

/* Table container styling */
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid rgba(0,0,0,0.05);
}

/* Enhanced badge styling */
.badge {
    border-radius: 0.5rem;
    padding: 0.5rem 0.75rem;
    font-weight: 600;
    font-size: 0.75rem;
    transition: all 0.3s ease;
}

.badge:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

/* Sort icons */
.sort-icon {
    opacity: 0.5;
    transition: all 0.2s ease;
}

th.cursor-pointer:hover .sort-icon {
    opacity: 1;
    color: var(--kt-primary);
}

/* Mobile responsive table styles */
@media (max-width: 768px) {
    /* Hide less important columns on mobile */
    .table th:nth-child(5), /* Dusun */
    .table td:nth-child(5),
    .table th:nth-child(6), /* Mata Pencaharian */
    .table td:nth-child(6) {
        display: none;
    }

    .table-responsive {
        font-size: 0.85rem;
    }

    .table th,
    .table td {
        padding: 0.5rem 0.25rem;
    }
}

@media (max-width: 576px) {
    /* Show only essential columns on very small screens */
    .table th:nth-child(4), /* Umur */
    .table td:nth-child(4),
    .table th:nth-child(7), /* Status */
    .table td:nth-child(7) {
        display: none;
    }

    .table-responsive {
        font-size: 0.8rem;
    }

    .table th,
    .table td {
        padding: 0.4rem 0.2rem;
    }
}/* Modern Button Styling */
.btn-group .btn {
    transition: all 0.3s ease;
    border: none;
    font-weight: 600;
    letter-spacing: 0.025em;
}

.btn-group .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

.btn-light-success:hover {
    background-color: #1bc5bd !important;
    color: white !important;
}

.btn-light-primary:hover {
    background-color: #3699ff !important;
    color: white !important;
}

.btn-light-danger:hover {
    background-color: #f64e60 !important;
    color: white !important;
}

.family-toggle {
    transition: all 0.3s ease;
}

.family-toggle:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(54, 153, 255, 0.3);
}

.badge {
    transition: all 0.3s ease;
}

.badge:hover {
    transform: scale(1.05);
}

/* Enhanced Search Input */
#kt_table_search {
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

#kt_table_search:focus {
    border-color: #3699ff;
    box-shadow: 0 0 0 0.2rem rgba(54, 153, 255, 0.25);
    transform: scale(1.02);
}

/* Modern Card Header */
.card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border-bottom: 3px solid #e4e6ea;
}

/* Custom Pagination Styling */
.pagination-wrapper .btn {
    border: 1px solid var(--kt-gray-300);
    margin: 0 2px;
    min-width: 40px;
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    border-radius: 0.5rem;
    font-weight: 600;
}

/* Family Grouping Styles */
.family-header {
    background: linear-gradient(135deg, rgba(54, 153, 255, 0.08) 0%, rgba(6, 101, 208, 0.08) 100%);
    border-left: 4px solid var(--kt-primary);
}

.family-header:hover {
    background: linear-gradient(135deg, rgba(54, 153, 255, 0.12) 0%, rgba(6, 101, 208, 0.12) 100%);
}

.family-member {
    position: relative;
    border-left: 2px solid rgba(54, 153, 255, 0.1);
}

.family-member:hover {
    border-left-color: var(--kt-primary);
}

.family-member.collapsed {
    display: none;
}

.family-toggle {
    transition: all 0.3s ease;
}

.family-toggle.collapsed i {
    transform: rotate(180deg);
}

/* Action buttons styling */
.btn-icon {
    width: 35px;
    height: 35px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-icon i {
    margin: 0 !important;
}

/* Badge improvements */
.badge {
    font-weight: 600;
    padding: 0.5rem 0.75rem;
}

.pagination-wrapper .btn:hover:not(.disabled) {
    background: linear-gradient(135deg, var(--kt-primary-light) 0%, var(--kt-primary) 100%);
    border-color: var(--kt-primary);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(33, 150, 243, 0.3);
}

.pagination-wrapper .btn.btn-primary {
    background: linear-gradient(135deg, var(--kt-primary) 0%, #1976d2 100%);
    border-color: var(--kt-primary);
    color: white;
    font-weight: 700;
    box-shadow: 0 4px 12px rgba(33, 150, 243, 0.4);
}

.pagination-wrapper .btn.disabled {
    opacity: 0.4;
    cursor: not-allowed;
    pointer-events: none;
}

/* Advanced Filters */
.form-select, .form-control {
    border-radius: 0.5rem;
    border: 1px solid var(--kt-gray-300);
    transition: all 0.2s ease;
}

.form-select:focus, .form-control:focus {
    border-color: var(--kt-primary);
    box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
    transform: translateY(-1px);
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

/* Responsive improvements */
@media (max-width: 768px) {
    .table td, .table th {
        padding: 0.75rem 0.5rem;
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

    .card.hoverable:hover {
        transform: none;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .table tbody tr:hover {
        background: linear-gradient(135deg, rgba(33, 150, 243, 0.08) 0%, rgba(33, 150, 243, 0.12) 100%);
    }
}

/* Skeleton Loading Styles */
.skeleton {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
    border-radius: 4px;
}

@keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

.skeleton-checkbox {
    width: 16px;
    height: 16px;
    border-radius: 3px;
}

.skeleton-photo {
    width: 30px;
    height: 40px;
    border-radius: 4px;
}

.skeleton-text {
    height: 14px;
    border-radius: 4px;
}

.skeleton-text-sm {
    width: 80px;
    height: 12px;
}

.skeleton-text-md {
    width: 120px;
    height: 14px;
}

.skeleton-text-lg {
    width: 140px;
    height: 16px;
}

.skeleton-badge {
    width: 60px;
    height: 20px;
    border-radius: 10px;
}

.skeleton-button {
    width: 32px;
    height: 32px;
    border-radius: 6px;
}

/* Loading state improvements */
#table-loading tr {
    animation: fadeInUp 0.3s ease-out forwards;
}

#table-loading tr:nth-child(1) { animation-delay: 0.1s; }
#table-loading tr:nth-child(2) { animation-delay: 0.2s; }
#table-loading tr:nth-child(3) { animation-delay: 0.3s; }
#table-loading tr:nth-child(4) { animation-delay: 0.4s; }
#table-loading tr:nth-child(5) { animation-delay: 0.5s; }
#table-loading tr:nth-child(6) { animation-delay: 0.6s; }
#table-loading tr:nth-child(7) { animation-delay: 0.7s; }
#table-loading tr:nth-child(8) { animation-delay: 0.8s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
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

            <!--begin::Statistics Cards-->
            <div class="row g-5 g-xl-8 mb-8">
                <div class="col-xl-3">
                    <div class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="ki-duotone ki-people fs-2x text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Total Warga</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\User::whereNotNull('nik')->where('nik', 'not like', 'AUTO_%')->whereNotIn('nama_lengkap', ['Test User', 'Administrator Sistem', 'Admin'])->count() }} orang</div>
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
                                        <i class="ki-duotone ki-check-circle fs-2x text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Warga Aktif</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\User::whereNotNull('nik')->where('nik', 'not like', 'AUTO_%')->whereNotIn('nama_lengkap', ['Test User', 'Administrator Sistem', 'Admin'])->where('status_aktif', true)->count() }} orang</div>
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
                                        <i class="ki-duotone ki-profile-user fs-2x text-info">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Laki-laki</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\User::whereNotNull('nik')->where('nik', 'not like', 'AUTO_%')->whereNotIn('nama_lengkap', ['Test User', 'Administrator Sistem', 'Admin'])->whereIn('jenis_kelamin', ['Laki-laki', 'L'])->count() }} orang</div>
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
                                        <i class="ki-duotone ki-profile-user fs-2x text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="text-dark fw-bold fs-6 mb-2">Perempuan</div>
                                    <div class="fw-semibold text-muted fs-7">{{ \App\Models\User::whereNotNull('nik')->where('nik', 'not like', 'AUTO_%')->whereNotIn('nama_lengkap', ['Test User', 'Administrator Sistem', 'Admin'])->whereIn('jenis_kelamin', ['Perempuan', 'P'])->count() }} orang</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Statistics Cards-->



            <!--begin::Card-->
                        <!--begin::Card-->
            <div class="card shadow-sm">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <div class="position-relative d-flex align-items-center">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4 z-index-2 text-primary">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" id="kt_table_search"
                                       class="form-control form-control-lg form-control-solid w-350px ps-13 pe-5 shadow-sm"
                                       placeholder="Cari nama, NIK, pekerjaan, agama, atau dusun..."
                                       autocomplete="off"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="bottom"
                                       title="Ketik minimal 3 karakter untuk pencarian otomatis" />
                                <button type="button"
                                        id="clear-search-btn"
                                        class="btn btn-sm btn-icon btn-light-danger position-absolute end-0 me-2 d-none shadow-sm"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Bersihkan pencarian">
                                    <i class="ki-duotone ki-cross fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!--end::Search-->
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center flex-wrap" data-kt-user-table-toolbar="base">
                            <!--begin::Quick Filter-->
                            <div class="me-4">
                                <select class="form-select form-select-solid form-select-sm w-150px" data-control="select2" data-placeholder="Status" data-hide-search="true" id="status_filter">
                                    <option value="">Semua Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <!--end::Quick Filter-->

                            <!--begin::Advanced Filter-->
                            <button type="button" class="btn btn-primary me-3 btn-sm d-flex align-items-center px-4 py-2 fw-bold shadow-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_filter"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Gunakan filter lanjutan untuk pencarian spesifik">
                                <i class="ki-duotone ki-filter fs-5 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span>Filter Lanjutan</span>
                            </button>
                            <!--end::Advanced Filter-->

                            <!--begin::Export-->
                            <div class="dropdown me-3">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle d-flex align-items-center px-4 py-2 fw-bold shadow-sm" data-bs-toggle="dropdown">
                                    <i class="ki-duotone ki-exit-up fs-5 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <span>Export Data</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item export-btn" href="{{ route('data-warga.export.excel') }}" data-type="excel">
                                        <i class="ki-duotone ki-file-down fs-5 me-2 text-success"></i>
                                        Export Excel
                                    </a>
                                    <a class="dropdown-item export-btn" href="{{ route('data-warga.export.pdf') }}" data-type="pdf">
                                        <i class="ki-duotone ki-file-down fs-5 me-2 text-danger"></i>
                                        Export PDF
                                    </a>
                                    <a class="dropdown-item export-btn" href="{{ route('data-warga.export.csv') }}" data-type="csv">
                                        <i class="ki-duotone ki-file-down fs-5 me-2 text-primary"></i>
                                        Export CSV
                                    </a>
                                </div>
                            </div>
                            <!--end::Export-->



                            <!--begin::Add user-->
                            <a href="{{ route('data-warga.create') }}"
                               class="btn btn-primary btn-sm d-flex align-items-center px-4 py-2 fw-bold shadow-sm"
                               data-bs-toggle="tooltip"
                               data-bs-placement="top"
                               title="Tambah data warga baru ke sistem">
                                <i class="ki-duotone ki-plus-circle fs-4 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <span>Tambah Warga Baru</span>
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
                        <table class="table table-hover table-rounded table-striped border gy-7 gs-7" id="kt_table_warga">
                            <thead>
                                <tr class="fw-bold fs-6 text-white border-bottom-3 border-primary">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_warga .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-125px cursor-pointer" data-column="nama">
                                        <div class="d-flex align-items-center">
                                            Warga
                                            <i class="ki-duotone ki-up-down fs-5 ms-1 sort-icon">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                    </th>
                                    <th class="min-w-100px text-center">Jenis Kelamin</th>
                                    <th class="min-w-80px cursor-pointer text-center" data-column="umur">
                                        <div class="d-flex align-items-center justify-content-center">
                                            Umur
                                            <i class="ki-duotone ki-up-down fs-5 ms-1 sort-icon">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                    </th>
                                    <th class="min-w-100px d-none d-lg-table-cell text-center">Dusun</th>
                                    <th class="min-w-100px d-none d-xl-table-cell">Mata Pencaharian</th>
                                    <th class="min-w-100px text-center">Status</th>
                                    <th class="text-end min-w-100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold" id="table-content">
                                <!-- Loading Skeleton -->
                                <div id="table-loading" class="d-none">
                                    @for($i = 1; $i <= 8; $i++)
                                    <tr class="border-bottom border-gray-300">
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <div class="skeleton skeleton-checkbox"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="skeleton skeleton-photo me-3"></div>
                                                <div class="d-flex flex-column">
                                                    <div class="skeleton skeleton-text skeleton-text-lg mb-2"></div>
                                                    <div class="skeleton skeleton-text skeleton-text-sm"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="skeleton skeleton-badge mx-auto"></div>
                                        </td>
                                        <td class="text-center">
                                            <div class="skeleton skeleton-text skeleton-text-sm mx-auto"></div>
                                        </td>
                                        <td class="d-none d-lg-table-cell text-center">
                                            <div class="skeleton skeleton-badge mx-auto"></div>
                                        </td>
                                        <td class="d-none d-xl-table-cell">
                                            <div class="skeleton skeleton-text skeleton-text-md"></div>
                                        </td>
                                        <td class="text-center">
                                            <div class="skeleton skeleton-badge mx-auto"></div>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end gap-2">
                                                <div class="skeleton skeleton-button"></div>
                                                <div class="skeleton skeleton-button"></div>
                                                <div class="skeleton skeleton-button"></div>
                                                <div class="skeleton skeleton-button"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endfor
                                </div>

                                <!-- Actual Content -->
                                <div id="table-actual-content">
                                    @include('admin.data-warga.partials.table-content', ['familyGroups' => $familyGroups ?? collect(), 'wargas' => $wargas ?? null])
                                </div>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->

                    <!--begin::Pagination-->
                    @if($wargas->hasPages())
                    <div class="d-flex flex-stack flex-wrap pt-10 pagination-wrapper">
                        <div class="fs-6 fw-semibold text-gray-700">
                            <div class="d-flex align-items-center">
                                <span class="me-3">
                                    Menampilkan {{ $wargas->firstItem() }} sampai {{ $wargas->lastItem() }} dari {{ $wargas->total() }} data
                                    @if(request('q'))
                                        <span class="text-info">(hasil pencarian)</span>
                                    @endif
                                </span>
                                <div class="d-flex align-items-center">
                                    <span class="me-2 fs-7 text-muted">Per halaman:</span>
                                    <select class="form-select form-select-sm w-70px" id="per-page-selector">
                                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ request('per_page', 50) == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </div>
                            </div>
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
// Loading functions
function showTableLoading() {
                            </div>
                        </div>
                    </div>

                    {{-- Family Members Grid --}}
                    <div class="px-5 pb-5">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="fw-bold text-gray-800 mb-0">Anggota Keluarga</h4>
                            <div class="d-flex align-items-center gap-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="showInactiveMembers">
                                    <label class="form-check-label" for="showInactiveMembers">
                                        Tampilkan yang tidak aktif
                                    </label>
                                </div>
                                <select class="form-select form-select-sm w-auto" id="sortMembers">
                                    <option value="name">Urutkan: Nama</option>
                                    <option value="age">Urutkan: Umur</option>
                                    <option value="status">Urutkan: Status dalam Keluarga</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-4" id="familyMembersGrid">
                            <!-- Family members will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-5 me-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Tutup
                </button>
                <button type="button" class="btn btn-primary" onclick="addFamilyMember()">
                    <i class="ki-duotone ki-plus fs-5 me-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Tambah Anggota Keluarga
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Loading functions
function showTableLoading() {
    $('#table-loading').removeClass('d-none');
    $('#table-actual-content').addClass('d-none');
}

function hideTableLoading() {
    $('#table-loading').addClass('d-none');
    $('#table-actual-content').removeClass('d-none').hide().fadeIn(600);
}

$(document).ready(function() {
    // Show loading initially
    showTableLoading();

    // Hide loading after brief delay
    setTimeout(function() {
        hideTableLoading();
    }, 1200);

    // AJAX search functionality
    let searchTimeout;
    let currentSearchTerm = '';

    function performSearch(searchTerm) {
        // Show loading state
        showTableLoading();

        // Update clear button visibility
        if (searchTerm.length > 0) {
            $('#clear-search-btn').removeClass('d-none');
        } else {
            $('#clear-search-btn').addClass('d-none');
        }

        // Perform AJAX request
        $.ajax({
            url: '{{ route("data-warga.search") }}',
            method: 'POST',
            data: {
                search: searchTerm,
                per_page: {{ request('per_page', 50) }},
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Hide loading and show results
                $('#table-actual-content').html(response.html);
                hideTableLoading();
                updatePagination(response.pagination);

                // Re-initialize family toggle functionality and tooltips
                initializeFamilyToggle();
                initializeTooltips();
            },
            error: function() {
                $('#table-actual-content').html(`
                    <tr>
                        <td colspan="8" class="text-center py-10">
                            <div class="d-flex flex-column align-items-center">
                                <i class="ki-duotone ki-cross-circle fs-2x text-danger mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span class="text-muted">Terjadi kesalahan saat mencari data</span>
                            </div>
                        </td>
                    </tr>
                `);
                hideTableLoading();
            }
        });
    }

    // Search on typing (debounced)
    $('#kt_table_search').on('input', function() {
        clearTimeout(searchTimeout);
        const searchTerm = $(this).val();
        currentSearchTerm = searchTerm;

        searchTimeout = setTimeout(function() {
            performSearch(searchTerm);
        }, 500); // Wait 500ms after user stops typing
    });

    // Clear search functionality
    $('#clear-search-btn').on('click', function() {
        $('#kt_table_search').val('');
        currentSearchTerm = '';
        $(this).addClass('d-none');
        performSearch(''); // Reload all data
    });

    function updatePagination(pagination) {
        // Update pagination info text
        $('.fs-6.fw-semibold.text-gray-700 span').first().text(
            `Menampilkan ${pagination.from || 0} sampai ${pagination.to || 0} dari ${pagination.total} data`
        );

        // Hide/show pagination wrapper based on whether there are multiple pages
        if (pagination.last_page <= 1) {
            $('.pagination-wrapper').hide();
        } else {
            $('.pagination-wrapper').show();
        }
    }

    function initializeFamilyToggle() {
        // Family toggle functionality with modern button updates
        $('.family-toggle').off('click').on('click', function() {
            const $button = $(this);
            const familyId = $button.data('family');
            const $familyMembers = $(`.family-member[data-family="${familyId}"]`);
            const isVisible = $familyMembers.is(':visible');

            if (isVisible) {
                $familyMembers.slideUp(300);
                updateToggleButton($button, false);
            } else {
                $familyMembers.slideDown(300);
                updateToggleButton($button, true);
            }

            // Re-initialize tooltips after dynamic content update
            setTimeout(initializeTooltips, 350);
        });
    }

    // Initialize family toggle on page load
    initializeFamilyToggle();

    // Initialize tooltips for modern buttons
    function initializeTooltips() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    // Initialize tooltips on page load
    initializeTooltips();

    // Update toggle button text and icon
    function updateToggleButton(button, isExpanded) {
        const icon = button.find('i');
        const text = button.find('.toggle-text');

        if (isExpanded) {
            icon.removeClass('ki-down').addClass('ki-up');
            text.text('Tutup');
        } else {
            icon.removeClass('ki-up').addClass('ki-down');
            text.text('Buka');
        }
    }    // Per page selector functionality
    $('#per-page-selector').on('change', function() {
        const perPage = $(this).val();
        const url = new URL(window.location);
        url.searchParams.set('per_page', perPage);
        url.searchParams.delete('page'); // Reset to page 1 when changing per_page
        window.location.href = url.toString();
    });

    // Status filter functionality
    $('#status_filter').on('change', function() {
        const statusValue = $(this).val();

        $('#kt_table_warga tbody tr').each(function() {
            // Skip family header rows from filtering
            if ($(this).hasClass('family-header')) {
                return;
            }

            if (statusValue === '') {
                $(this).removeClass('d-none').css('display', '');
            } else {
                const statusBadge = $(this).find('td:nth-last-child(2) .badge');
                const isActive = statusBadge.hasClass('badge-light-success');

                if ((statusValue === '1' && isActive) || (statusValue === '0' && !isActive)) {
                    $(this).removeClass('d-none').css('display', '');
                    // If this is a family member, also show the family header
                    if ($(this).hasClass('family-member')) {
                        const familyId = $(this).data('family');
                        $(`.family-header[data-family="${familyId}"]`).removeClass('d-none').css('display', '');
                    }
                } else {
                    $(this).addClass('d-none');
                }
            }
        });

        // Hide family headers if no members are visible
        $('.family-header').each(function() {
            const familyId = $(this).find('.family-toggle').data('family');
            const visibleMembers = $(`.family-member[data-family="${familyId}"]:not(.d-none)`);
            if (visibleMembers.length === 0 && statusValue !== '') {
                $(this).addClass('d-none');
            } else if (statusValue === '') {
                $(this).removeClass('d-none').css('display', '');
            }
        });

        updateTableStats();
    });

    // Table sorting functionality
    $('th[data-column]').on('click', function() {
        const column = $(this).data('column');
        const $table = $('#kt_table_warga');
        const $tbody = $table.find('tbody');
        const $rows = $tbody.find('tr:not(.d-none)').get();

        // Toggle sort direction
        const currentSort = $(this).data('sort') || 'asc';
        const newSort = currentSort === 'asc' ? 'desc' : 'asc';
        $(this).data('sort', newSort);

        // Update sort icon
        $('th .sort-icon').removeClass('text-primary');
        $(this).find('.sort-icon').addClass('text-primary');

        // Sort rows
        $rows.sort(function(a, b) {
            let aValue, bValue;

            switch(column) {
                case 'nama':
                    aValue = $(a).find('td:nth-child(2) a').text();
                    bValue = $(b).find('td:nth-child(2) a').text();
                    break;
                case 'nik':
                    aValue = $(a).find('td:nth-child(3)').text();
                    bValue = $(b).find('td:nth-child(3)').text();
                    break;
                case 'umur':
                    aValue = parseInt($(a).find('td:nth-child(5)').text()) || 0;
                    bValue = parseInt($(b).find('td:nth-child(5)').text()) || 0;
                    break;
            }

            if (newSort === 'asc') {
                return aValue > bValue ? 1 : -1;
            } else {
                return aValue < bValue ? 1 : -1;
            }
        });

        // Reorder table
        $.each($rows, function(index, row) {
            $tbody.append(row);
        });

        // Add animation
        $tbody.find('tr').hide().fadeIn(300);
    });

    // Row click to view details
    $('#kt_table_warga tbody').on('click', 'tr', function(e) {
        if ($(e.target).closest('a, button, .form-check').length === 0) {
            const wargaId = $(this).data('warga-id');
            if (wargaId) {
                window.location.href = `{{ url('data-warga') }}/${wargaId}`;
            }
        }
    });

    function updateTableStats() {
        const visibleRows = $('#kt_table_warga tbody tr:not(.d-none)').length;
        const totalRows = $('#kt_table_warga tbody tr').length;
        console.log(`Showing ${visibleRows} of ${totalRows} entries`);
    }

    // Initialize tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();

    // Initialize Select2
    $('[data-control="select2"]').select2({
        minimumResultsForSearch: Infinity
    });
});

// Enhanced delete function
function deleteWarga(id) {
    Swal.fire({
        title: 'Hapus Data Warga?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
        customClass: {
            confirmButton: "btn btn-danger fw-bold",
            cancelButton: "btn btn-active-light-primary fw-bold"
        },
        showLoaderOnConfirm: true,
        preConfirm: () => {
            return new Promise((resolve) => {
                setTimeout(() => {
                    resolve();
                }, 1000);
            });
        }
    }).then(function(result) {
        if (result.value) {
            // Add loading state to row
            $(`tr[data-warga-id="${id}"]`).addClass('loading');

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

// Reset filter function
function resetFilter() {
    document.getElementById('filterForm').reset();
    window.location.href = `{{ route('data-warga.index') }}`;
}

// Toggle family members visibility
$(document).on('click', '.family-toggle', function() {
    const familyId = $(this).data('family');
    const familyMembers = $(`.family-member[data-family="${familyId}"]`);
    const icon = $(this).find('i');

    if ($(this).hasClass('collapsed')) {
        // Show family members
        familyMembers.removeClass('collapsed').fadeIn(300);
        $(this).removeClass('collapsed');
        icon.removeClass('ki-down').addClass('ki-up');
    } else {
        // Hide family members
        familyMembers.addClass('collapsed').fadeOut(300);
        $(this).addClass('collapsed');
        icon.removeClass('ki-up').addClass('ki-down');
    }
});

// Initialize family toggles
$(document).ready(function() {
    // Add family toggle event handlers
    $('.family-toggle').each(function() {
        $(this).on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
        });
    });

    // Handle export buttons with SweetAlert loading
    $('.export-btn').on('click', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        const type = $(this).data('type');

        // Get current filter parameters
        const form = document.getElementById('filterForm');
        const formData = new FormData(form);
        const params = new URLSearchParams(formData);

        // Add current search parameters to export URL
        const exportUrl = url + '?' + params.toString();

        // Show SweetAlert loading with blocking UI
        Swal.fire({
            title: 'Memproses Export',
            html: `
                <div class="text-center">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mb-2 fw-bold">Sedang menyiapkan file ${type.toUpperCase()}...</p>
                    <p class="text-muted small">Mohon tunggu, jangan tutup halaman ini</p>
                </div>
            `,
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Create temporary link for download
        const tempLink = document.createElement('a');
        tempLink.href = exportUrl;
        tempLink.style.display = 'none';
        document.body.appendChild(tempLink);
        tempLink.click();
        document.body.removeChild(tempLink);

        // Different timeout for different file types
        const timeout = type === 'pdf' ? 4000 : 2000; // PDF needs more time

        // Hide loading after delay and show success
        setTimeout(() => {
            Swal.fire({
                title: 'Download Berhasil!',
                text: `File ${type.toUpperCase()} telah diunduh ke perangkat Anda.`,
                icon: 'success',
                timer: 3000,
                showConfirmButton: false
            });
        }, timeout);
    });

    // Force 3x4 photos after page load
    function makePhotos3x4() {
        // Force all symbol elements to be 3x4 portrait
        $('.symbol.foto-3x4').each(function() {
            $(this).css({
                'width': '30px',
                'height': '40px',
                'border-radius': '4px'
            });
        });

        $('.symbol.foto-3x4 .symbol-label, .symbol.foto-3x4 img').each(function() {
            $(this).css({
                'width': '30px',
                'height': '40px',
                'border-radius': '4px',
                'object-fit': 'cover'
            });
        });

        // Add specific class styling for 3x4 photos
        $('<style>')
            .prop('type', 'text/css')
            .html(`
                .foto-3x4, .foto-3x4 *, .foto-3x4 .symbol-label, .foto-3x4 img {
                    width: 30px !important;
                    height: 40px !important;
                    border-radius: 4px !important;
                    object-fit: cover !important;
                }
            `)
            .appendTo('head');
    }

    // Apply on page load
    $(document).ready(function() {
        makePhotos3x4();

        // Re-apply when table content changes
        setTimeout(makePhotos3x4, 1000);

        // Family row click handler
        $(document).on('click', '.family-header', function(e) {
            // Don't trigger if clicking on toggle button
            if ($(e.target).closest('.family-toggle, .btn').length > 0) {
                return;
            }

            const familyId = $(this).data('family');
            showFamilyDetail(familyId);
        });

        // Add cursor pointer to family headers
        $('.family-header').css('cursor', 'pointer');

        // Add click effect
        $(document).on('mouseenter', '.family-header', function() {
            if (!$(this).hasClass('family-toggle-clicked')) {
                $(this).addClass('shadow-sm').css('transform', 'scale(1.01)');
            }
        }).on('mouseleave', '.family-header', function() {
            $(this).removeClass('shadow-sm').css('transform', 'scale(1)');
        });
    });
});

// Family Detail Functions
function showFamilyDetail(noKK) {
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('familyDetailModal'));
    modal.show();

    // Reset modal content
    $('#familyModalContent').addClass('d-none');
    $('#familyModalLoading').removeClass('d-none');

    // Fetch family data
    fetchFamilyDetail(noKK);
}

function fetchFamilyDetail(noKK) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.get(`/manajemen-data-warga/keluarga/${noKK}/detail`)
        .done(function(response) {
            populateFamilyModal(response);
        })
        .fail(function() {
            $('#familyModalLoading').html(`
                <div class="text-center">
                    <i class="ki-duotone ki-cross-circle fs-3x text-danger mb-3">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <p class="text-danger">Gagal memuat data keluarga</p>
                    <button class="btn btn-sm btn-light-primary" onclick="fetchFamilyDetail('${noKK}')">
                        <i class="ki-duotone ki-arrow-clockwise fs-5 me-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Coba Lagi
                    </button>
                </div>
            `);
        });
}

function populateFamilyModal(data) {
    const family = data.family;
    const members = data.members;

    // Update modal title and family info
    $('#familyDetailModalLabel').text(`Detail Keluarga ${family.kepala_keluarga || 'Tidak Diketahui'}`);
    $('#familySubtitle').text(`${members.length} anggota keluarga • ${family.alamat || 'Alamat tidak diketahui'}`);

    // Update family info card
    $('#familyName').text(`Keluarga ${family.kepala_keluarga || 'Tidak Diketahui'}`);
    $('#familyKK').text(family.no_kk || '-');
    $('#familyAddress').text(`${family.alamat || ''} ${family.dusun ? ', Dusun ' + family.dusun : ''}`);

    // Generate family statistics
    const stats = generateFamilyStats(members);
    $('#familyStats').html(stats);

    // Populate family members
    populateFamilyMembers(members);

    // Show content, hide loading
    $('#familyModalLoading').addClass('d-none');
    $('#familyModalContent').removeClass('d-none');
}

function generateFamilyStats(members) {
    const totalMembers = members.length;
    const maleCount = members.filter(m => ['Laki-laki', 'L'].includes(m.jenis_kelamin)).length;
    const femaleCount = members.filter(m => ['Perempuan', 'P'].includes(m.jenis_kelamin)).length;
    const activeCount = members.filter(m => m.status_aktif).length;
    const averageAge = members.reduce((sum, m) => sum + (m.calculated_age || 0), 0) / totalMembers;

    return `
        <div class="badge badge-light-primary fw-bold px-3 py-2 me-2 mb-2">
            <i class="ki-duotone ki-profile-circle fs-6 me-1">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            ${totalMembers} Total
        </div>
        <div class="badge badge-light-info fw-bold px-3 py-2 me-2 mb-2">
            <i class="ki-duotone ki-profile-user fs-6 me-1">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            ${maleCount} Laki-laki
        </div>
        <div class="badge badge-light-danger fw-bold px-3 py-2 me-2 mb-2">
            <i class="ki-duotone ki-profile-user fs-6 me-1">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            ${femaleCount} Perempuan
        </div>
        <div class="badge badge-light-success fw-bold px-3 py-2 me-2 mb-2">
            <i class="ki-duotone ki-check-circle fs-6 me-1">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            ${activeCount} Aktif
        </div>
        <div class="badge badge-light-warning fw-bold px-3 py-2 me-2 mb-2">
            <i class="ki-duotone ki-time fs-6 me-1">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            Rata-rata ${Math.round(averageAge)} Tahun
        </div>
    `;
}

function populateFamilyMembers(members) {
    let membersHtml = '';

    members.forEach(member => {
        const photoUrl = member.foto ? `/storage/${member.foto}` : null;
        const genderClass = ['Laki-laki', 'L'].includes(member.jenis_kelamin) ? 'primary' : 'danger';
        const genderIcon = ['Laki-laki', 'L'].includes(member.jenis_kelamin) ? '♂' : '♀';
        const statusBadge = member.is_kepala_keluarga ?
            '<span class="badge badge-light-success mb-2"><i class="ki-duotone ki-crown fs-6 me-1"></i>Kepala Keluarga</span>' :
            '<span class="badge badge-light-secondary mb-2">Anggota Keluarga</span>';

        membersHtml += `
            <div class="col-lg-4 col-md-6 member-card" data-active="${member.status_aktif}" data-name="${member.nama_lengkap}" data-age="${member.calculated_age || 0}">
                <div class="card border-0 shadow-sm h-100 member-detail-card">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="symbol symbol-60px me-3">
                                ${photoUrl ?
                                    `<img src="${photoUrl}" alt="${member.nama_lengkap}" class="symbol-label" style="object-fit: cover;">` :
                                    `<div class="symbol-label bg-light-${genderClass} text-${genderClass} fs-2 fw-bold">${member.nama_lengkap.charAt(0)}</div>`
                                }
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="fw-bold text-gray-800 mb-0">${member.nama_lengkap}</h5>
                                    <span class="badge badge-light-${genderClass} fs-7">${genderIcon}</span>
                                </div>
                                ${statusBadge}
                            </div>
                        </div>

                        <div class="separator separator-dashed mb-3"></div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <span class="text-muted fs-7">NIK</span>
                                    <span class="fw-semibold fs-6">${member.nik || '-'}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <span class="text-muted fs-7">Umur</span>
                                    <span class="fw-semibold fs-6">${member.calculated_age || 0} tahun</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <span class="text-muted fs-7">Tempat Lahir</span>
                                    <span class="fw-semibold fs-6">${member.tempat_lahir || '-'}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <span class="text-muted fs-7">Status</span>
                                    ${member.status_aktif ?
                                        '<span class="badge badge-light-success">Aktif</span>' :
                                        '<span class="badge badge-light-danger">Tidak Aktif</span>'
                                    }
                                </div>
                            </div>
                        </div>

                        ${member.mata_pencaharian ? `
                            <div class="d-flex align-items-center mb-2">
                                <i class="ki-duotone ki-suitcase fs-6 text-primary me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span class="text-muted fs-7 me-1">Pekerjaan:</span>
                                <span class="fw-semibold fs-7">${member.mata_pencaharian == 'DLL' ? 'Lain-Lain' : member.mata_pencaharian}</span>
                            </div>
                        ` : ''}

                        ${member.pendidikan ? `
                            <div class="d-flex align-items-center mb-3">
                                <i class="ki-duotone ki-book fs-6 text-primary me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span class="text-muted fs-7 me-1">Pendidikan:</span>
                                <span class="fw-semibold fs-7">${member.pendidikan}</span>
                            </div>
                        ` : ''}

                        <div class="d-flex gap-2">
                            <a href="/manajemen-data-warga/${member.id}"
                               class="btn btn-sm btn-light-primary flex-fill">
                                <i class="ki-duotone ki-eye fs-6 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                Detail
                            </a>
                            <a href="/manajemen-data-warga/${member.id}/edit"
                               class="btn btn-sm btn-light-success flex-fill">
                                <i class="ki-duotone ki-pencil fs-6 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    $('#familyMembersGrid').html(membersHtml);

    // Setup member filtering and sorting
    setupMemberFiltering();
}

function setupMemberFiltering() {
    // Show/hide inactive members
    $('#showInactiveMembers').on('change', function() {
        const showInactive = $(this).is(':checked');
        $('.member-card').each(function() {
            const isActive = $(this).data('active');
            if (!showInactive && !isActive) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });

    // Sort members
    $('#sortMembers').on('change', function() {
        const sortBy = $(this).val();
        const container = $('#familyMembersGrid');
        const cards = container.children('.member-card').get();

        cards.sort(function(a, b) {
            switch(sortBy) {
                case 'name':
                    return $(a).data('name').localeCompare($(b).data('name'));
                case 'age':
                    return $(b).data('age') - $(a).data('age'); // Descending age
                case 'status':
                    // Kepala keluarga first
                    const aIsHead = $(a).find('.badge-light-success').length > 0;
                    const bIsHead = $(b).find('.badge-light-success').length > 0;
                    if (aIsHead && !bIsHead) return -1;
                    if (!aIsHead && bIsHead) return 1;
                    return 0;
                default:
                    return 0;
            }
        });

        $.each(cards, function(index, card) {
            container.append(card);
        });
    });

    // Initially hide inactive members
    $('#showInactiveMembers').trigger('change');
}

// Additional functions for modal actions
function exportFamilyData() {
    // TODO: Implement export functionality
    Swal.fire({
        icon: 'info',
        title: 'Export Data Keluarga',
        text: 'Fitur export sedang dalam pengembangan',
        confirmButtonText: 'OK'
    });
}

function printFamilyCard() {
    // TODO: Implement print functionality
    Swal.fire({
        icon: 'info',
        title: 'Print Kartu Keluarga',
        text: 'Fitur print kartu keluarga sedang dalam pengembangan',
        confirmButtonText: 'OK'
    });
}

function addFamilyMember() {
    // Redirect to add new member with family context
    window.location.href = '/manajemen-data-warga/create';
}

// Reset password function
function resetPassword(wargaId, nik, nama) {
    Swal.fire({
        title: 'Reset Password?',
        html: `
            <div class="text-center">
                <i class="ki-duotone ki-key fs-3x text-warning mb-3">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <p class="mb-3">Akan mereset password untuk:</p>
                <div class="alert alert-light-info">
                    <strong>${nama}</strong><br>
                    NIK: ${nik}
                </div>
                <p class="text-muted">Password akan direset kembali ke <strong>NIK warga</strong></p>
            </div>
        `,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#f1c40f',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Reset Password',
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: 'btn btn-warning',
            cancelButton: 'btn btn-secondary'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to reset password
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post(`/manajemen-data-warga/${wargaId}/reset-password`, {
                _method: 'PATCH'
            }).done(function(response) {
                Swal.fire({
                    title: 'Berhasil!',
                    html: `
                        <div class="text-center">
                            <i class="ki-duotone ki-check-circle fs-3x text-success mb-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <p>Password untuk <strong>${nama}</strong> telah direset.</p>
                            <div class="alert alert-success">
                                <strong>Password baru:</strong> ${nik}
                            </div>
                        </div>
                    `,
                    icon: 'success',
                    timer: 4000,
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
            }).fail(function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Gagal mereset password. Silakan coba lagi.',
                    icon: 'error'
                });
            });
        }
    });
}
</script>
@endpush
