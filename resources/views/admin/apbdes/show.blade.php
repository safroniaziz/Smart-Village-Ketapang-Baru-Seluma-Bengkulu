@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Data APBDes')

@section('menu')
    Detail Data APBDes
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.apbdes.index') }}" class="text-muted text-hover-primary">APBDes</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Detail</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Detail Data APBDes</h3>
                    <div class="card-toolbar">
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.apbdes.edit', $apbdes) }}" class="btn btn-sm btn-warning">
                                <i class="ki-duotone ki-pencil fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                Edit
                            </a>
                            <a href="{{ route('admin.apbdes.index') }}" class="btn btn-sm btn-light-primary">
                                <i class="ki-duotone ki-arrow-left fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-6">
                                <label class="fw-bold fs-6 mb-2">Tahun Anggaran:</label>
                                <span class="badge badge-light-primary fs-6 px-3 py-2">{{ $apbdes->tahun_anggaran }}</span>
                            </div>

                            <div class="mb-6">
                                <label class="fw-bold fs-6 mb-2">Jenis Anggaran:</label>
                                @if($apbdes->jenis_anggaran === 'pendapatan')
                                    <span class="badge badge-light-success fs-6 px-3 py-2">
                                        <i class="fas fa-arrow-up me-1"></i>Pendapatan
                                    </span>
                                @else
                                    <span class="badge badge-light-danger fs-6 px-3 py-2">
                                        <i class="fas fa-arrow-down me-1"></i>Belanja
                                    </span>
                                @endif
                            </div>

                            <div class="mb-6">
                                <label class="fw-bold fs-6 mb-2">Jumlah Anggaran:</label>
                                <div class="fs-2 fw-bold text-success">{{ $apbdes->formatted_anggaran }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-6">
                                <label class="fw-bold fs-6 mb-2">Keterangan:</label>
                                <div class="fs-6">{{ $apbdes->keterangan }}</div>
                            </div>

                            @if($apbdes->keterangan_detail)
                                <div class="mb-6">
                                    <label class="fw-bold fs-6 mb-2">Keterangan Detail:</label>
                                    <div class="fs-6 text-muted">{{ $apbdes->keterangan_detail }}</div>
                                </div>
                            @endif

                            <div class="mb-6">
                                <label class="fw-bold fs-6 mb-2">Tanggal Dibuat:</label>
                                <div class="fs-6 text-muted">{{ $apbdes->created_at->format('d/m/Y H:i') }}</div>
                            </div>

                            @if($apbdes->updated_at != $apbdes->created_at)
                                <div class="mb-6">
                                    <label class="fw-bold fs-6 mb-2">Terakhir Diupdate:</label>
                                    <div class="fs-6 text-muted">{{ $apbdes->updated_at->format('d/m/Y H:i') }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
