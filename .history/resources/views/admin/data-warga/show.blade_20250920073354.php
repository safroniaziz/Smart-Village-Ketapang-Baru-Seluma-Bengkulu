@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Data Warga')

@push('styles')
<style>
/* Modern Profile View Styling */
.profile-container {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 1.5rem;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    position: relative;
    overflow: hidden;
}

.profile-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.profile-avatar {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    border: 6px solid rgba(255,255,255,0.3);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    object-fit: cover;
    transition: all 0.3s ease;
}

.profile-avatar:hover {
    transform: scale(1.05);
    border-color: rgba(255,255,255,0.6);
}

.info-card {
    background: white;
    border-radius: 1.5rem;
    padding: 2rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.info-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    transition: width 0.3s ease;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}

.info-card:hover::before {
    width: 8px;
}

.info-card .card-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 1rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 1rem;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.timeline-item {
    position: relative;
    padding-left: 3rem;
    padding-bottom: 2rem;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: 1rem;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.timeline-item::after {
    content: '';
    position: absolute;
    left: 0.5rem;
    top: 0.5rem;
    width: 1rem;
    height: 1rem;
    border-radius: 50%;
    background: #667eea;
    box-shadow: 0 0 0 4px white, 0 0 0 6px #667eea;
}

.timeline-item:last-child::before {
    display: none;
}

.action-buttons {
    position: sticky;
    bottom: 2rem;
    z-index: 100;
    text-align: center;
}

.btn-enhanced {
    padding: 1rem 2rem;
    border-radius: 1rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.btn-enhanced:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Badge Enhancements */
.badge-enhanced {
    padding: 0.5rem 1rem;
    border-radius: 1rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* Responsive */
@media (max-width: 768px) {
    .profile-container {
        padding: 1rem;
    }
    
    .profile-avatar {
        width: 150px;
        height: 150px;
    }
    
    .info-card {
        padding: 1.5rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
}

/* Animation keyframes */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-in {
    animation: fadeInUp 0.6s ease forwards;
}

.animate-delay-1 { animation-delay: 0.1s; }
.animate-delay-2 { animation-delay: 0.2s; }
.animate-delay-3 { animation-delay: 0.3s; }
.animate-delay-4 { animation-delay: 0.4s; }
</style>
@endpush

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Detail Data Warga
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('data-warga.index') }}" class="text-muted text-hover-primary">Data Warga</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">{{ $dataWarga->nama_lengkap }}</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('data-warga.edit', $dataWarga) }}" class="btn btn-primary">
                    <i class="ki-duotone ki-pencil fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Edit Data
                </a>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column py-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    @if($dataWarga->foto)
                                        <img src="{{ asset('storage/' . $dataWarga->foto) }}" alt="{{ $dataWarga->nama_lengkap }}" />
                                    @else
                                        <div class="symbol-label fs-3 {{ $dataWarga->jenis_kelamin == 'Laki-laki' ? 'bg-light-primary text-primary' : 'bg-light-danger text-danger' }}">
                                            {{ substr($dataWarga->nama_lengkap, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <!--end::Avatar-->

                                <!--begin::Name-->
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
                                    {{ $dataWarga->nama_lengkap }}
                                </a>
                                <!--end::Name-->

                                <!--begin::Position-->
                                <div class="mb-9">
                                    <div class="badge badge-lg {{ $dataWarga->jenis_kelamin == 'Laki-laki' ? 'badge-light-primary' : 'badge-light-danger' }} d-inline">
                                        {{ $dataWarga->jenis_kelamin }}
                                    </div>
                                </div>
                                <!--end::Position-->
                            </div>
                            <!--end::Summary-->

                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">
                                    Detail Informasi
                                    <span class="ms-2 rotate-180">
                                        <i class="ki-duotone ki-down fs-3"></i>
                                    </span>
                                </div>
                            </div>
                            <!--end::Details toggle-->

                            <div class="separator"></div>

                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">NIK</div>
                                    <div class="text-gray-600">{{ $dataWarga->nik }}</div>
                                    <!--end::Details item-->

                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Tempat, Tanggal Lahir</div>
                                    <div class="text-gray-600">
                                        {{ $dataWarga->tempat_lahir }}
                                        @if($dataWarga->tanggal_lahir)
                                            , {{ $dataWarga->tanggal_lahir->format('d F Y') }}
                                        @endif
                                    </div>
                                    <!--end::Details item-->

                                    <!--begin::Details item-->
                                    @if($dataWarga->tanggal_lahir)
                                    <div class="fw-bold mt-5">Umur</div>
                                    <div class="text-gray-600">{{ $dataWarga->tanggal_lahir->age }} tahun</div>
                                    @endif
                                    <!--end::Details item-->

                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Agama</div>
                                    <div class="text-gray-600">{{ $dataWarga->agama }}</div>
                                    <!--end::Details item-->

                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Status Perkawinan</div>
                                    <div class="text-gray-600">{{ $dataWarga->status_perkawinan }}</div>
                                    <!--end::Details item-->

                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Pekerjaan</div>
                                    <div class="text-gray-600">{{ $dataWarga->pekerjaan }}</div>
                                    <!--end::Details item-->

                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Pendidikan</div>
                                    <div class="text-gray-600">{{ $dataWarga->pendidikan }}</div>
                                    <!--end::Details item-->

                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Status Aktif</div>
                                    <div class="text-gray-600">
                                        @if($dataWarga->status_aktif)
                                            <span class="badge badge-light-success">Aktif</span>
                                        @else
                                            <span class="badge badge-light-danger">Tidak Aktif</span>
                                        @endif
                                    </div>
                                    <!--end::Details item-->

                                    @if($dataWarga->is_kepala_keluarga)
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Status Keluarga</div>
                                    <div class="text-gray-600">
                                        <span class="badge badge-light-warning">Kepala Keluarga</span>
                                    </div>
                                    <!--end::Details item-->
                                    @endif
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-8">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Informasi Lengkap</h3>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-muted min-w-125px w-125px">NIK</td>
                                        <td class="text-gray-800 fw-bold">{{ $dataWarga->nik }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Nama Lengkap</td>
                                        <td class="text-gray-800 fw-bold">{{ $dataWarga->nama_lengkap }}</td>
                                    </tr>
                                    @if($dataWarga->no_kk)
                                    <tr>
                                        <td class="text-muted">No. KK</td>
                                        <td class="text-gray-800">{{ $dataWarga->no_kk }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="text-muted">Tempat Lahir</td>
                                        <td class="text-gray-800">{{ $dataWarga->tempat_lahir }}</td>
                                    </tr>
                                    @if($dataWarga->tanggal_lahir)
                                    <tr>
                                        <td class="text-muted">Tanggal Lahir</td>
                                        <td class="text-gray-800">{{ $dataWarga->tanggal_lahir->format('d F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Umur</td>
                                        <td class="text-gray-800">{{ $dataWarga->tanggal_lahir->age }} tahun</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="text-muted">Jenis Kelamin</td>
                                        <td>
                                            <span class="badge {{ $dataWarga->jenis_kelamin == 'Laki-laki' ? 'badge-light-primary' : 'badge-light-danger' }}">
                                                {{ $dataWarga->jenis_kelamin }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Alamat</td>
                                        <td class="text-gray-800">{{ $dataWarga->alamat }}</td>
                                    </tr>
                                    @if($dataWarga->rt_rw)
                                    <tr>
                                        <td class="text-muted">RT/RW</td>
                                        <td class="text-gray-800">{{ $dataWarga->rt_rw }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="text-muted">Dusun</td>
                                        <td class="text-gray-800">{{ $dataWarga->dusun }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Desa</td>
                                        <td class="text-gray-800">{{ $dataWarga->desa }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Kecamatan</td>
                                        <td class="text-gray-800">{{ $dataWarga->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Kabupaten</td>
                                        <td class="text-gray-800">{{ $dataWarga->kabupaten }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Provinsi</td>
                                        <td class="text-gray-800">{{ $dataWarga->provinsi }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Agama</td>
                                        <td class="text-gray-800">{{ $dataWarga->agama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Status Perkawinan</td>
                                        <td class="text-gray-800">{{ $dataWarga->status_perkawinan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Pekerjaan</td>
                                        <td class="text-gray-800">{{ $dataWarga->pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Pendidikan</td>
                                        <td class="text-gray-800">{{ $dataWarga->pendidikan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Kewarganegaraan</td>
                                        <td class="text-gray-800">{{ $dataWarga->kewarganegaraan }}</td>
                                    </tr>
                                    @if($dataWarga->email)
                                    <tr>
                                        <td class="text-muted">Email</td>
                                        <td class="text-gray-800">{{ $dataWarga->email }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="text-muted">Status Aktif</td>
                                        <td>
                                            @if($dataWarga->status_aktif)
                                                <span class="badge badge-light-success">Aktif</span>
                                            @else
                                                <span class="badge badge-light-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Kepala Keluarga</td>
                                        <td>
                                            @if($dataWarga->is_kepala_keluarga)
                                                <span class="badge badge-light-warning">Ya</span>
                                            @else
                                                <span class="badge badge-light-secondary">Tidak</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @if($dataWarga->status_rumah)
                                    <tr>
                                        <td class="text-muted">Status Rumah</td>
                                        <td class="text-gray-800">{{ $dataWarga->status_rumah }}</td>
                                    </tr>
                                    @endif
                                    @if($dataWarga->status_sosial)
                                    <tr>
                                        <td class="text-muted">Status Sosial</td>
                                        <td class="text-gray-800">{{ $dataWarga->status_sosial }}</td>
                                    </tr>
                                    @endif
                                    @if($dataWarga->kelayakan_rumah)
                                    <tr>
                                        <td class="text-muted">Kelayakan Rumah</td>
                                        <td class="text-gray-800">{{ $dataWarga->kelayakan_rumah }}</td>
                                    </tr>
                                    @endif
                                    @if($dataWarga->mata_pencaharian)
                                    <tr>
                                        <td class="text-muted">Mata Pencaharian</td>
                                        <td class="text-gray-800">{{ $dataWarga->mata_pencaharian }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="text-muted">Dibuat</td>
                                        <td class="text-gray-800">{{ $dataWarga->created_at->format('d F Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Diperbarui</td>
                                        <td class="text-gray-800">{{ $dataWarga->updated_at->format('d F Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
            </div>
        </div>
    </div>
    <!--end::Content-->
</div>
@endsection