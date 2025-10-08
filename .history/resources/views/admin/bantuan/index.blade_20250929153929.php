@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Bantuan Warga')

@section('menu')
    Manajemen Bantuan Warga
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Bantuan Warga</li>
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

            <!-- Statistics Cards -->
            <div class="row g-5 g-xl-8 mb-5">
                <div class="col-xl-3">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="ki-duotone ki-abstract-26 fs-2x text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold fs-6 text-gray-800">Total Penerima</div>
                                    <div class="fw-bolder fs-3 text-primary">{{ $stats['total'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card card-xl-stretch mb-xl-8">
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
                                <div class="d-flex flex-column">
                                    <div class="fw-bold fs-6 text-gray-800">Bantuan Aktif</div>
                                    <div class="fw-bolder fs-3 text-success">{{ $stats['aktif'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-info">
                                        <i class="ki-duotone ki-information fs-2x text-info">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold fs-6 text-gray-800">Selesai</div>
                                    <div class="fw-bolder fs-3 text-info">{{ $stats['selesai'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-dollar fs-2x text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold fs-6 text-gray-800">Total Nominal Aktif</div>
                                    <div class="fw-bolder fs-3 text-warning">Rp {{ number_format($stats['total_nominal'], 0, ',', '.') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header border-0 py-6">
                    <div class="card-title">
                        <h3 class="fw-bold m-0">Daftar Bantuan Warga</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('admin.bantuan.create') }}" class="btn btn-sm btn-primary">
                                <i class="ki-duotone ki-plus fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                Tambah Individual
                            </a>
                            <a href="{{ route('admin.bantuan.bulk-create') }}" class="btn btn-sm btn-success">
                                <i class="ki-duotone ki-add-files fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                Tambah Massal
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <!-- Filters in 2x2 Grid -->
                    <form method="get" class="mb-6">
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <select name="program" class="form-select form-select-solid" data-control="select2" data-placeholder="Semua Program" data-hide-search="true">
                                    <option value="">Semua Program</option>
                                    @foreach($programs as $program)
                                        <option value="{{ $program }}" @selected(request('program')===$program)>{{ $program }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="tahun" class="form-select form-select-solid" data-control="select2" data-placeholder="Semua Tahun" data-hide-search="true">
                                    <option value="">Semua Tahun</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}" @selected(request('tahun')==$year)>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="status" class="form-select form-select-solid" data-control="select2" data-placeholder="Semua Status" data-hide-search="true">
                                    <option value="">Semua Status</option>
                                    @foreach(['Aktif','Tidak Aktif','Selesai'] as $s)
                                        <option value="{{ $s }}" @selected(request('status')===$s)>{{ $s }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <!-- Empty for symmetry, or add sorting later -->
                            </div>
                        </div>
                        <!-- Search moved below -->
                        <div class="row g-3 align-items-end">
                            <div class="col-md-8">
                                <div class="position-relative">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4 top-50 translate-middle-y text-primary">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" name="q" value="{{ request('q') }}" class="form-control form-control-solid ps-12" placeholder="Cari nama warga, NIK, atau program bantuan..." />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary flex-grow-1">
                                        <i class="ki-duotone ki-filter fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                        Filter
                                    </button>
                                    @if(request()->hasAny(['q','program','tahun','status']))
                                    <a href="{{ route('admin.bantuan.index') }}" class="btn btn-light">Reset</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="bantuan-table-wrap">
                        @include('admin.bantuan.partials.table', ['bantuans' => $bantuans])
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const wrap = document.getElementById('bantuan-table-wrap');
    const form = document.querySelector('form[method="get"]');

    function ajaxLoad(url) {
        if (!url) return;
        const params = new URL(url, window.location.origin);
        // keep clean URL without page param shown
        const cleaned = new URL(window.location.href);
        cleaned.search = params.search;
        cleaned.searchParams.delete('page');
        history.replaceState({}, '', cleaned.toString());

        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' } })
            .then(r => r.json())
            .then(j => {
                wrap.innerHTML = j.html;
                bindLinks();
            });
    }

    function buildUrlFromForm() {
        const url = new URL(window.location.href);
        url.search = new URLSearchParams(new FormData(form)).toString();
        return url.toString();
    }

    function bindLinks() {
        wrap.querySelectorAll('a.pagination, .pagination a, nav a').forEach(a => {
            a.addEventListener('click', function(e) {
                // intercept only internal pagination links
                if (this.href && this.href.includes('bantuan')) {
                    e.preventDefault();
                    ajaxLoad(this.href);
                }
            });
        });
    }

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            ajaxLoad(buildUrlFromForm());
        });
        // change selects triggers submit
        form.querySelectorAll('select').forEach(sel => sel.addEventListener('change', () => form.dispatchEvent(new Event('submit'))));
    }

    bindLinks();
});
</script>
@endpush
