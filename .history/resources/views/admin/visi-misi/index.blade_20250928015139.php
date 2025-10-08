@extends('admin.layouts.app')

@section('title', 'Visi & Misi Desa')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Visi & Misi Desa</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Visi & Misi Desa</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="row g-5 g-xl-10">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-5 mb-xl-10">
                    <div class="card card-flush h-md-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Visi & Misi Desa</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Kelola visi, misi, pendekatan, dan tahapan pembangunan desa</span>
                            </h3>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#visiModal">
                                    <i class="ki-duotone ki-plus fs-2"></i>
                                    Tambah Visi
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-bordered">
                                        <div class="card-header">
                                            <h3 class="card-title">Visi Desa</h3>
                                            <div class="card-toolbar">
                                                <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#visiModal">
                                                    <i class="ki-duotone ki-plus fs-5"></i>
                                                    Tambah
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="visi-list">
                                                <!-- Visi list will be loaded here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-bordered">
                                        <div class="card-header">
                                            <h3 class="card-title">Misi Desa</h3>
                                            <div class="card-toolbar">
                                                <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#misiModal">
                                                    <i class="ki-duotone ki-plus fs-5"></i>
                                                    Tambah
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="misi-list">
                                                <!-- Misi list will be loaded here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <div class="card card-bordered">
                                        <div class="card-header">
                                            <h3 class="card-title">Pendekatan Partisipatif</h3>
                                            <div class="card-toolbar">
                                                <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#pendekatanModal">
                                                    <i class="ki-duotone ki-plus fs-5"></i>
                                                    Tambah
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="pendekatan-list">
                                                <!-- Pendekatan list will be loaded here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-bordered">
                                        <div class="card-header">
                                            <h3 class="card-title">Tahapan Implementasi</h3>
                                            <div class="card-toolbar">
                                                <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#tahapanModal">
                                                    <i class="ki-duotone ki-plus fs-5"></i>
                                                    Tambah
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="tahapan-list">
                                                <!-- Tahapan list will be loaded here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Modals -->
@include('admin.visi-misi.partials.visi-modal')
@include('admin.visi-misi.partials.misi-modal')
@include('admin.visi-misi.partials.pendekatan-modal')
@include('admin.visi-misi.partials.tahapan-modal')

<!-- Include Scripts -->
@include('admin.visi-misi.partials.scripts')
@endsection
