@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Detail Berita')

@section('menu')
    Detail Berita
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.berita.index') }}" class="text-muted text-hover-primary">Manajemen Berita</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Detail Berita</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            
            <!-- Header Card -->
            <div class="card shadow-sm mb-8">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-emerald">
                                        <i class="fas fa-newspaper fs-2x text-emerald-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Detail Berita</h2>
                                    <p class="text-muted mb-0">{{ Str::limit($berita->judul, 60) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('berita.show', $berita->slug) }}" target="_blank" class="btn btn-light-primary">
                                    <i class="fas fa-external-link-alt fs-5 me-2"></i>
                                    Lihat di Website
                                </a>
                                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit fs-5 me-2"></i>
                                    Edit
                                </a>
                                <a href="{{ route('admin.berita.index') }}" class="btn btn-light">
                                    <i class="fas fa-arrow-left fs-5 me-2"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Article Card -->
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <h3 class="card-title fw-bold text-gray-900">{{ $berita->judul }}</h3>
                        </div>
                        <div class="card-body">
                            <!-- Meta Information -->
                            <div class="d-flex flex-wrap align-items-center gap-4 mb-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user text-emerald-600 me-2"></i>
                                    <span class="text-muted">Penulis:</span>
                                    <span class="fw-bold ms-1">{{ $berita->penulis }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar text-emerald-600 me-2"></i>
                                    <span class="text-muted">Dibuat:</span>
                                    <span class="fw-bold ms-1">{{ $berita->created_at->format('d M Y H:i') }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-eye text-emerald-600 me-2"></i>
                                    <span class="text-muted">Views:</span>
                                    <span class="fw-bold ms-1">{{ number_format($berita->views) }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-clock text-emerald-600 me-2"></i>
                                    <span class="text-muted">Baca:</span>
                                    <span class="fw-bold ms-1">{{ $berita->read_time ?? '5' }} menit</span>
                                </div>
                            </div>

                            <!-- Status Badges -->
                            <div class="d-flex flex-wrap gap-2 mb-6">
                                @if($berita->published)
                                <span class="badge badge-light-success fs-7 fw-bold">
                                    <i class="fas fa-check-circle me-1"></i>
                                    Dipublikasi
                                </span>
                                @else
                                <span class="badge badge-light-warning fs-7 fw-bold">
                                    <i class="fas fa-edit me-1"></i>
                                    Draft
                                </span>
                                @endif

                                @if($berita->featured)
                                <span class="badge badge-light-warning fs-7 fw-bold">
                                    <i class="fas fa-star me-1"></i>
                                    Berita Utama
                                </span>
                                @endif

                                @if($berita->kategori)
                                <span class="badge badge-light-info fs-7 fw-bold">
                                    <i class="fas fa-tag me-1"></i>
                                    {{ $berita->kategori }}
                                </span>
                                @endif
                            </div>

                            <!-- Excerpt -->
                            <div class="mb-6">
                                <h5 class="fw-bold text-gray-900 mb-3">Ringkasan</h5>
                                <div class="text-gray-700 fs-6 lh-lg bg-light-info p-4 rounded">
                                    {{ $berita->excerpt }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="mb-6">
                                <h5 class="fw-bold text-gray-900 mb-3">Konten</h5>
                                <div class="text-gray-700 fs-6 lh-lg">
                                    {!! $berita->konten !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Quick Actions -->
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <h3 class="card-title fw-bold text-primary">Aksi Cepat</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-3">
                                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit fs-5 me-2"></i>
                                    Edit Berita
                                </a>
                                <a href="{{ route('berita.show', $berita->slug) }}" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-external-link-alt fs-5 me-2"></i>
                                    Lihat di Website
                                </a>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $berita->id }})">
                                    <i class="fas fa-trash fs-5 me-2"></i>
                                    Hapus Berita
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics -->
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <h3 class="card-title fw-bold text-success">Statistik</h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-6">
                                    <div class="text-center">
                                        <div class="fw-bold text-success fs-2x">{{ number_format($berita->views) }}</div>
                                        <div class="text-muted fs-7">Total Views</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <div class="fw-bold text-info fs-2x">{{ $berita->read_time ?? '5' }}</div>
                                        <div class="text-muted fs-7">Menit Baca</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Information -->
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title fw-bold text-info">Informasi</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="text-muted fs-7 mb-1">Dibuat</div>
                                <div class="fw-bold">{{ $berita->created_at->format('d M Y H:i') }}</div>
                            </div>
                            @if($berita->updated_at != $berita->created_at)
                            <div class="mb-4">
                                <div class="text-muted fs-7 mb-1">Diperbarui</div>
                                <div class="fw-bold">{{ $berita->updated_at->format('d M Y H:i') }}</div>
                            </div>
                            @endif
                            <div class="mb-4">
                                <div class="text-muted fs-7 mb-1">Penulis</div>
                                <div class="fw-bold">{{ $berita->penulis }}</div>
                            </div>
                            @if($berita->kategori)
                            <div class="mb-4">
                                <div class="text-muted fs-7 mb-1">Kategori</div>
                                <div class="fw-bold">{{ $berita->kategori }}</div>
                            </div>
                            @endif
                            <div>
                                <div class="text-muted fs-7 mb-1">Status</div>
                                <div>
                                    @if($berita->published)
                                    <span class="badge badge-light-success">Dipublikasi</span>
                                    @else
                                    <span class="badge badge-light-warning">Draft</span>
                                    @endif
                                    @if($berita->featured)
                                    <span class="badge badge-light-warning ms-1">Berita Utama</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Delete Form -->
    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Berita akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('delete-form');
            form.action = '{{ route("admin.berita.destroy", ":id") }}'.replace(':id', id);
            form.submit();
        }
    });
}
</script>
@endpush
