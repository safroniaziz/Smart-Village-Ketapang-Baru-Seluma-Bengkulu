@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Keluarga')

@section('menu')
    Detail Keluarga
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('data-warga.index') }}" class="text-muted text-hover-primary">Data Warga</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Detail Keluarga</li>
@endsection

@push('styles')
<style>
.family-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 1rem;
    color: white;
    padding: 2rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.family-header::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    transform: translate(25%, -25%);
}

.member-card {
    transition: all 0.3s ease;
    border: 1px solid #e1e5e9;
    border-radius: 1rem;
    overflow: hidden;
}

.member-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    border-color: #009ef7;
}

.member-photo {
    width: 80px;
    height: 100px;
    object-fit: cover;
    border-radius: 0.75rem;
    border: 3px solid #e1e5e9;
}

.kepala-keluarga {
    border-left: 5px solid #50cd89;
    background: linear-gradient(135deg, rgba(80, 205, 137, 0.05) 0%, rgba(80, 205, 137, 0.02) 100%);
}

.family-stats {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border-radius: 1rem;
    padding: 1.5rem;
    border: 1px solid #e1e5e9;
}

.stat-item {
    text-align: center;
    padding: 1rem;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #009ef7;
}

.stat-label {
    color: #7e8299;
    font-size: 0.875rem;
    font-weight: 500;
}
</style>
@endpush

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        
        <!-- Family Header -->
        <div class="family-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="fw-bold fs-2x mb-3">
                        <i class="ki-duotone ki-home-2 fs-1 me-3">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Keluarga {{ $kepalaKeluarga->nama_lengkap ?? 'Tidak Diketahui' }}
                    </h1>
                    <p class="fs-5 mb-4 opacity-75">No. Kartu Keluarga: <span class="fw-bold">{{ $noKK }}</span></p>
                    
                    <div class="d-flex flex-wrap gap-3">
                        <div class="bg-white bg-opacity-20 rounded-pill px-3 py-2">
                            <i class="ki-duotone ki-geolocation text-white fs-6 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <span class="fw-semibold">{{ $kepalaKeluarga->dusun ?? '-' }}</span>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-pill px-3 py-2">
                            <i class="ki-duotone ki-people text-white fs-6 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                            <span class="fw-semibold">{{ $familyMembers->count() }} Anggota</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    @if($kepalaKeluarga && $kepalaKeluarga->foto)
                        <img src="{{ asset('storage/' . $kepalaKeluarga->foto) }}" 
                             alt="Foto {{ $kepalaKeluarga->nama_lengkap }}" 
                             class="rounded-circle" 
                             style="width: 120px; height: 120px; object-fit: cover; border: 4px solid rgba(255,255,255,0.3);">
                    @else
                        <div class="symbol symbol-120px">
                            <div class="symbol-label bg-white bg-opacity-20">
                                <i class="ki-duotone ki-user fs-2x text-white">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row g-5">
            <!-- Family Statistics -->
            <div class="col-lg-4">
                <div class="family-stats">
                    <h5 class="fw-bold text-dark mb-4">
                        <i class="ki-duotone ki-chart-simple fs-2 text-primary me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                        Statistik Keluarga
                    </h5>
                    
                    <div class="row g-0">
                        <div class="col-6">
                            <div class="stat-item border-end">
                                <div class="stat-number">{{ $familyMembers->count() }}</div>
                                <div class="stat-label">Total Anggota</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-item">
                                <div class="stat-number text-success">{{ $familyMembers->whereIn('jenis_kelamin', ['Laki-laki', 'L'])->count() }}</div>
                                <div class="stat-label">Laki-laki</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-item border-end border-top pt-3">
                                <div class="stat-number text-danger">{{ $familyMembers->whereIn('jenis_kelamin', ['Perempuan', 'P'])->count() }}</div>
                                <div class="stat-label">Perempuan</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-item border-top pt-3">
                                <div class="stat-number text-warning">{{ $familyMembers->where('status_aktif', true)->count() }}</div>
                                <div class="stat-label">Aktif</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Family Address -->
                <div class="card mt-5">
                    <div class="card-header">
                        <h5 class="card-title fw-bold">
                            <i class="ki-duotone ki-map fs-2 text-primary me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            Alamat Keluarga
                        </h5>
                    </div>
                    <div class="card-body">
                        @if($kepalaKeluarga)
                            <p class="mb-2"><strong>{{ $kepalaKeluarga->alamat }}</strong></p>
                            <p class="text-muted mb-1">RT/RW: {{ $kepalaKeluarga->rt_rw ?: '-' }}</p>
                            <p class="text-muted mb-1">Dusun: {{ $kepalaKeluarga->dusun }}</p>
                            <p class="text-muted mb-1">Desa: {{ $kepalaKeluarga->desa }}</p>
                            <p class="text-muted mb-1">Kecamatan: {{ $kepalaKeluarga->kecamatan }}</p>
                            <p class="text-muted mb-0">{{ $kepalaKeluarga->kabupaten }}, {{ $kepalaKeluarga->provinsi }}</p>
                        @else
                            <p class="text-muted">Data alamat tidak tersedia</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Family Members -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h3 class="fw-bold text-dark">Anggota Keluarga</h3>
                    <a href="{{ route('data-warga.index') }}" class="btn btn-light-primary">
                        <i class="ki-duotone ki-arrow-left fs-5 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Kembali ke Daftar
                    </a>
                </div>

                <div class="row g-4">
                    @foreach($familyMembers as $member)
                        <div class="col-12">
                            <div class="member-card {{ $member->is_kepala_keluarga ? 'kepala-keluarga' : '' }}">
                                <div class="card-body p-4">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            @if($member->foto)
                                                <img src="{{ asset('storage/' . $member->foto) }}" 
                                                     alt="Foto {{ $member->nama_lengkap }}" 
                                                     class="member-photo">
                                            @else
                                                <div class="member-photo bg-light d-flex align-items-center justify-content-center">
                                                    <i class="ki-duotone ki-user fs-2 text-muted">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <div class="col-md-7">
                                            <div class="d-flex align-items-center mb-2">
                                                <h5 class="fw-bold text-dark mb-0 me-3">{{ $member->nama_lengkap }}</h5>
                                                @if($member->is_kepala_keluarga)
                                                    <span class="badge badge-success">Kepala Keluarga</span>
                                                @endif
                                            </div>
                                            
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <div class="text-muted small">NIK</div>
                                                    <div class="fw-semibold">{{ $member->nik }}</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-muted small">Jenis Kelamin</div>
                                                    <div class="fw-semibold">{{ $member->jenis_kelamin }}</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-muted small">Tempat, Tanggal Lahir</div>
                                                    <div class="fw-semibold">
                                                        {{ $member->tempat_lahir }}, 
                                                        {{ $member->tanggal_lahir ? \Carbon\Carbon::parse($member->tanggal_lahir)->format('d M Y') : '-' }}
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-muted small">Umur</div>
                                                    <div class="fw-semibold">
                                                        {{ $member->tanggal_lahir ? \Carbon\Carbon::parse($member->tanggal_lahir)->age . ' tahun' : '-' }}
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-muted small">Pekerjaan</div>
                                                    <div class="fw-semibold">{{ $member->mata_pencaharian }}</div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-muted small">Pendidikan</div>
                                                    <div class="fw-semibold">{{ $member->pendidikan }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3 text-end">
                                            <div class="d-flex flex-column gap-2">
                                                <a href="{{ route('data-warga.show', $member) }}" 
                                                   class="btn btn-sm btn-light-primary">
                                                    <i class="ki-duotone ki-eye fs-6 me-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                    Detail
                                                </a>
                                                <a href="{{ route('data-warga.edit', $member) }}" 
                                                   class="btn btn-sm btn-light-warning">
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
