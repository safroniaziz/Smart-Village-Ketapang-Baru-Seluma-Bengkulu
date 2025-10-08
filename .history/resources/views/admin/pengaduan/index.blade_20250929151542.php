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

            <div class="card shadow-sm">
                <div class="card-header border-0 py-6">
                    <div class="card-title w-100">
                        <form method="get" class="d-flex align-items-center gap-3 flex-wrap">
                            <div class="d-flex align-items-center position-relative">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4 z-index-2 text-primary">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" name="q" value="{{ request('q') }}" class="form-control form-control-lg form-control-solid ps-12" style="min-width:260px;" placeholder="Cari judul / tracking" />
                            </div>
                            <select name="status" class="form-select form-select-solid" style="min-width:180px;" data-control="select2" data-placeholder="Semua Status" data-hide-search="true">
                                <option value="">Semua Status</option>
                                @foreach(['Diterima','Dalam Proses','Selesai','Ditolak'] as $s)
                                    <option value="{{ $s }}" @selected(request('status')===$s)>{{ $s }}</option>
                                @endforeach
                            </select>
                            <select name="asal" class="form-select form-select-solid" style="min-width:180px;" data-control="select2" data-placeholder="Semua Asal" data-hide-search="true">
                                <option value="">Semua Asal</option>
                                @foreach(['Warga Desa','Eksternal'] as $a)
                                    <option value="{{ $a }}" @selected(request('asal')===$a)>{{ $a }}</option>
                                @endforeach
                            </select>
                            <select name="fu" class="form-select form-select-solid" style="min-width:180px;" data-control="select2" data-placeholder="Followup" data-hide-search="true">
                                <option value="">Semua Followup</option>
                                <option value="has" @selected(request('fu')==='has')>Sudah di-followup</option>
                                <option value="none" @selected(request('fu')==='none')>Tanpa followup</option>
                            </select>
                            <select name="sort" class="form-select form-select-solid" style="min-width:180px;" data-control="select2" data-hide-search="true">
                                <option value="latest" @selected(request('sort','latest')==='latest')>Terbaru</option>
                                <option value="fu_desc" @selected(request('sort')==='fu_desc')>Followup terbanyak</option>
                                <option value="fu_asc" @selected(request('sort')==='fu_asc')>Followup tersedikit</option>
                            </select>
                            <button class="btn btn-primary">
                                <i class="ki-duotone ki-filter fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                Terapkan
                            </button>
                            @if(request()->hasAny(['q','status','asal']))
                            <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-light">Reset</a>
                            @endif
                        </form>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge badge-light-primary">Total: {{ $pengaduans->total() }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body py-4" id="pengaduan-table-wrap">
                    @include('admin.pengaduan.partials.table', ['pengaduans' => $pengaduans])
                </div>
            </div>

        </div>
    </div>
@endsection


