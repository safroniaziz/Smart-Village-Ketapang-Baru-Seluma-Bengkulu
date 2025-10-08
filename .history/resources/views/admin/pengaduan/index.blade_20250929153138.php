@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Pengaduan')

@section('menu')
    Manajemen Pengaduan
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Pengaduan</li>
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
                                    <div class="fw-bold fs-6 text-gray-800">Total Pengaduan</div>
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
                                    <div class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-timer fs-2x text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold fs-6 text-gray-800">Dalam Proses</div>
                                    <div class="fw-bolder fs-3 text-warning">{{ $stats['dalam_proses'] }}</div>
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
                                    <div class="fw-bold fs-6 text-gray-800">Selesai</div>
                                    <div class="fw-bolder fs-3 text-success">{{ $stats['selesai'] }}</div>
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
                                    <div class="symbol-label bg-light-danger">
                                        <i class="ki-duotone ki-cross-circle fs-2x text-danger">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold fs-6 text-gray-800">Ditolak</div>
                                    <div class="fw-bolder fs-3 text-danger">{{ $stats['ditolak'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header border-0 py-6">
                    <div class="card-title">
                        <h3 class="fw-bold m-0">Daftar Pengaduan</h3>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <!-- Filters in 2x2 Grid -->
                    <form method="get" class="mb-6">
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <select name="status" class="form-select form-select-solid" data-control="select2" data-placeholder="Semua Status" data-hide-search="true">
                                    <option value="">Semua Status</option>
                                    @foreach(['Diterima','Dalam Proses','Selesai','Ditolak'] as $s)
                                        <option value="{{ $s }}" @selected(request('status')===$s)>{{ $s }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="asal" class="form-select form-select-solid" data-control="select2" data-placeholder="Semua Asal" data-hide-search="true">
                                    <option value="">Semua Asal</option>
                                    @foreach(['Warga Desa','Eksternal'] as $a)
                                        <option value="{{ $a }}" @selected(request('asal')===$a)>{{ $a }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="fu" class="form-select form-select-solid" data-control="select2" data-placeholder="Filter Followup" data-hide-search="true">
                                    <option value="">Semua Followup</option>
                                    <option value="has" @selected(request('fu')==='has')>Sudah di-followup</option>
                                    <option value="none" @selected(request('fu')==='none')>Tanpa followup</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="sort" class="form-select form-select-solid" data-control="select2" data-hide-search="true">
                                    <option value="latest" @selected(request('sort','latest')==='latest')>Terbaru</option>
                                    <option value="fu_desc" @selected(request('sort')==='fu_desc')>Followup terbanyak</option>
                                    <option value="fu_asc" @selected(request('sort')==='fu_asc')>Followup tersedikit</option>
                                </select>
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
                                    <input type="text" name="q" value="{{ request('q') }}" class="form-control form-control-solid ps-12" placeholder="Cari judul pengaduan atau nomor tracking..." />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary flex-grow-1">
                                        <i class="ki-duotone ki-filter fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                        Filter
                                    </button>
                                    @if(request()->hasAny(['q','status','asal','fu','sort']))
                                    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-light">Reset</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                <div class="card-body py-4" id="pengaduan-table-wrap">
                    @include('admin.pengaduan.partials.table', ['pengaduans' => $pengaduans])
                </div>
            </div>

        </div>
    </div>
@endsection


