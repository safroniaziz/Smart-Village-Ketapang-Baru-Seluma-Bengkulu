@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Potensi Wisata')
@section('page-header', 'Detail Potensi Wisata')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    <i class="fas fa-map-marked-alt text-primary me-2"></i>Detail Potensi Wisata
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.potensi-wisata.index') }}" class="text-muted text-hover-primary">Potensi Wisata</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">{{ $potensiWisata->nama }}</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('admin.potensi-wisata.index') }}" class="btn btn-sm btn-light">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
                <a href="{{ route('admin.potensi-wisata.edit', $potensiWisata) }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit me-2"></i>Edit
                </a>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-3">
                                <img src="{{ $potensiWisata->main_image }}" alt="{{ $potensiWisata->nama }}" class="w-100 h-100 object-fit-cover rounded" />
                            </div>
                            <div>
                                <h2 class="text-dark fw-bold fs-2 mb-1">{{ $potensiWisata->nama }}</h2>
                                <p class="text-muted fs-6 mb-0">{{ $potensiWisata->lokasi }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center">
                            <span class="badge badge-light-success fs-7 me-3">
                                <i class="fas fa-eye me-1"></i>{{ $potensiWisata->views }} views
                            </span>
                            <span class="badge badge-light-primary fs-7">
                                <i class="fas fa-check-circle me-1"></i>Aktif
                            </span>
                        </div>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="row g-6 g-xl-9">
                        <!--begin::Left Column-->
                        <div class="col-lg-8">
                            <!--begin::Description-->
                            <div class="mb-8">
                                <h3 class="text-dark fw-bold fs-4 mb-3">Deskripsi</h3>
                                <div class="text-gray-600 fs-6 lh-lg">
                                    {{ $potensiWisata->deskripsi }}
                                </div>
                            </div>
                            <!--end::Description-->

                            <!--begin::Aktivitas Wisata-->
                            @if($potensiWisata->aktivitas_wisata)
                            <div class="mb-8">
                                <h3 class="text-dark fw-bold fs-4 mb-3">Aktivitas Wisata</h3>
                                <div class="text-gray-600 fs-6 lh-lg">
                                    {{ $potensiWisata->aktivitas_wisata }}
                                </div>
                            </div>
                            @endif
                            <!--end::Aktivitas Wisata-->

                            <!--begin::Gallery-->
                            @if(count($potensiWisata->gambar) > 0)
                            <div class="mb-8">
                                <h3 class="text-dark fw-bold fs-4 mb-3">Gallery</h3>
                                <div class="row g-3">
                                    @foreach($potensiWisata->gambar as $index => $image)
                                    <div class="col-md-4">
                                        <div class="card card-flush h-100">
                                            <div class="card-body p-3">
                                                <div class="symbol symbol-100px symbol-circle mb-3">
                                                    <img src="{{ $image['url'] }}" alt="{{ $image['judul'] ?? 'Gambar' }}" class="w-100 h-100 object-fit-cover" />
                                                </div>
                                                <h4 class="text-dark fw-bold fs-6 mb-1">{{ $image['judul'] ?? 'Gambar ' . ($index + 1) }}</h4>
                                                @if($image['keterangan'])
                                                <p class="text-gray-600 fs-7 mb-0">{{ $image['keterangan'] }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <!--end::Gallery-->

                            <!--begin::Fitur Unggulan-->
                            @if(count($potensiWisata->fitur_unggulan) > 0)
                            <div class="mb-8">
                                <h3 class="text-dark fw-bold fs-4 mb-3">Fitur Unggulan</h3>
                                <div class="row g-3">
                                    @foreach($potensiWisata->fitur_unggulan as $fitur)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-start">
                                            <div class="symbol symbol-40px me-3">
                                                <div class="symbol-label bg-light-primary">
                                                    <i class="{{ $fitur['icon'] }} text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h4 class="text-dark fw-bold fs-6 mb-1">{{ $fitur['judul'] }}</h4>
                                                <p class="text-gray-600 fs-7 mb-0">{{ $fitur['deskripsi'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <!--end::Fitur Unggulan-->
                        </div>
                        <!--end::Left Column-->

                        <!--begin::Right Column-->
                        <div class="col-lg-4">
                            <!--begin::Info Card-->
                            <div class="card card-flush mb-6">
                                <div class="card-header">
                                    <h3 class="card-title text-dark fw-bold fs-4">Informasi Wisata</h3>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="d-flex flex-column gap-4">
                                        @if($potensiWisata->jam_buka)
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-clock text-primary me-3"></i>
                                            <div>
                                                <div class="text-dark fw-bold fs-7">Jam Buka</div>
                                                <div class="text-gray-600 fs-6">{{ $potensiWisata->jam_buka }}</div>
                                            </div>
                                        </div>
                                        @endif

                                        @if($potensiWisata->harga_tiket)
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-ticket-alt text-primary me-3"></i>
                                            <div>
                                                <div class="text-dark fw-bold fs-7">Harga Tiket</div>
                                                <div class="text-gray-600 fs-6">{{ $potensiWisata->harga_tiket }}</div>
                                            </div>
                                        </div>
                                        @endif

                                        @if($potensiWisata->nomor_telepon)
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-phone text-primary me-3"></i>
                                            <div>
                                                <div class="text-dark fw-bold fs-7">Telepon</div>
                                                <div class="text-gray-600 fs-6">{{ $potensiWisata->nomor_telepon }}</div>
                                            </div>
                                        </div>
                                        @endif

                                        @if($potensiWisata->whatsapp)
                                        <div class="d-flex align-items-center">
                                            <i class="fab fa-whatsapp text-success me-3"></i>
                                            <div>
                                                <div class="text-dark fw-bold fs-7">WhatsApp</div>
                                                <div class="text-gray-600 fs-6">{{ $potensiWisata->whatsapp }}</div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--end::Info Card-->

                            <!--begin::Fasilitas Card-->
                            @if($potensiWisata->fasilitas_parkir || $potensiWisata->warung_makan)
                            <div class="card card-flush mb-6">
                                <div class="card-header">
                                    <h3 class="card-title text-dark fw-bold fs-4">Fasilitas</h3>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="d-flex flex-column gap-3">
                                        @if($potensiWisata->fasilitas_parkir)
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-parking text-primary me-3"></i>
                                            <div class="text-gray-600 fs-6">{{ $potensiWisata->fasilitas_parkir }}</div>
                                        </div>
                                        @endif

                                        @if($potensiWisata->warung_makan)
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-utensils text-primary me-3"></i>
                                            <div class="text-gray-600 fs-6">{{ $potensiWisata->warung_makan }}</div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!--end::Fasilitas Card-->

                            <!--begin::Video Card-->
                            @if($potensiWisata->video_youtube)
                            <div class="card card-flush">
                                <div class="card-header">
                                    <h3 class="card-title text-dark fw-bold fs-4">Video</h3>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="ratio ratio-16x9">
                                        <iframe src="{{ $potensiWisata->youtube_embed_url }}" 
                                                title="Video {{ $potensiWisata->nama }}" 
                                                allowfullscreen></iframe>
                                    </div>
                                    @if($potensiWisata->sumber_video)
                                    <div class="text-muted fs-7 mt-2">
                                        Sumber: {{ $potensiWisata->sumber_video }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                            <!--end::Video Card-->
                        </div>
                        <!--end::Right Column-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

        </div>
    </div>
    <!--end::Content-->
</div>
@endsection
