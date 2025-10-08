@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Detail Pengumuman')

@section('menu')
    Detail Pengumuman
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.pengumuman.index') }}" class="text-muted text-hover-primary">Manajemen Pengumuman</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Detail Pengumuman</li>
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
                                    <div class="symbol-label bg-light-primary">
                                        <i class="fas fa-bullhorn fs-2x text-primary-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Detail Pengumuman</h2>
                                    <p class="text-muted mb-0">{{ Str::limit($pengumuman->judul, 60) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('pengumuman.show', $pengumuman->slug) }}" target="_blank" class="btn btn-light-primary">
                                    <i class="fas fa-external-link-alt fs-5 me-2"></i>
                                    Lihat di Website
                                </a>
                                <a href="{{ route('admin.pengumuman.edit', $pengumuman->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit fs-5 me-2"></i>
                                    Edit
                                </a>
                                <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-light">
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
                            <h3 class="card-title fw-bold text-gray-900">{{ $pengumuman->judul }}</h3>
                        </div>
                        <div class="card-body">
                            <!-- Meta Information -->
                            <div class="d-flex flex-wrap align-items-center gap-4 mb-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user text-primary-600 me-2"></i>
                                    <span class="text-muted">Penulis:</span>
                                    <span class="fw-bold ms-1">{{ $pengumuman->penulis }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar text-primary-600 me-2"></i>
                                    <span class="text-muted">Dibuat:</span>
                                    <span class="fw-bold ms-1">{{ $pengumuman->created_at->format('d M Y H:i') }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-eye text-primary-600 me-2"></i>
                                    <span class="text-muted">Views:</span>
                                    <span class="fw-bold ms-1">{{ number_format($pengumuman->views) }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-clock text-primary-600 me-2"></i>
                                    <span class="text-muted">Berakhir:</span>
                                    <span class="fw-bold ms-1 {{ \Carbon\Carbon::parse($pengumuman->tanggal_berakhir)->isPast() ? 'text-danger' : '' }}">
                                        {{ \Carbon\Carbon::parse($pengumuman->tanggal_berakhir)->format('d M Y') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Status Badges -->
                            <div class="d-flex flex-wrap gap-2 mb-6">
                                @if($pengumuman->published)
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

                                @php
                                    $priorityClass = [
                                        'tinggi' => 'badge-light-danger',
                                        'sedang' => 'badge-light-warning',
                                        'rendah' => 'badge-light-success',
                                    ][$pengumuman->prioritas] ?? 'badge-light';
                                @endphp
                                <span class="badge {{ $priorityClass }} fs-7 fw-bold">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    Prioritas {{ ucfirst($pengumuman->prioritas) }}
                                </span>

                                @if(\Carbon\Carbon::parse($pengumuman->tanggal_berakhir)->isPast())
                                <span class="badge badge-light-danger fs-7 fw-bold">
                                    <i class="fas fa-times-circle me-1"></i>
                                    Berakhir
                                </span>
                                @endif
                            </div>

                            <!-- Excerpt -->
                            <div class="mb-6">
                                <h5 class="fw-bold text-gray-900 mb-3">Ringkasan</h5>
                                <div class="text-gray-700 fs-6 lh-lg bg-light-info p-4 rounded">
                                    {{ $pengumuman->excerpt }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="mb-6">
                                <h5 class="fw-bold text-gray-900 mb-3">Konten</h5>
                                <div class="text-gray-700 fs-6 lh-lg">
                                    {!! $pengumuman->konten !!}
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
                                <a href="{{ route('admin.pengumuman.edit', $pengumuman->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit fs-5 me-2"></i>
                                    Edit Pengumuman
                                </a>
                                <a href="{{ route('pengumuman.show', $pengumuman->slug) }}" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-external-link-alt fs-5 me-2"></i>
                                    Lihat di Website
                                </a>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $pengumuman->id }})">
                                    <i class="fas fa-trash fs-5 me-2"></i>
                                    Hapus Pengumuman
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
                                        <div class="fw-bold text-success fs-2x">{{ number_format($pengumuman->views) }}</div>
                                        <div class="text-muted fs-7">Total Views</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <div class="fw-bold text-info fs-2x">{{ ucfirst($pengumuman->prioritas) }}</div>
                                        <div class="text-muted fs-7">Prioritas</div>
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
                                <div class="fw-bold">{{ $pengumuman->created_at->format('d M Y H:i') }}</div>
                            </div>
                            @if($pengumuman->updated_at != $pengumuman->created_at)
                            <div class="mb-4">
                                <div class="text-muted fs-7 mb-1">Diperbarui</div>
                                <div class="fw-bold">{{ $pengumuman->updated_at->format('d M Y H:i') }}</div>
                            </div>
                            @endif
                            <div class="mb-4">
                                <div class="text-muted fs-7 mb-1">Penulis</div>
                                <div class="fw-bold">{{ $pengumuman->penulis }}</div>
                            </div>
                            <div class="mb-4">
                                <div class="text-muted fs-7 mb-1">Prioritas</div>
                                <div>
                                    @php
                                        $priorityClass = [
                                            'tinggi' => 'badge-light-danger',
                                            'sedang' => 'badge-light-warning',
                                            'rendah' => 'badge-light-success',
                                        ][$pengumuman->prioritas] ?? 'badge-light';
                                    @endphp
                                    <span class="badge {{ $priorityClass }}">{{ ucfirst($pengumuman->prioritas) }}</span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="text-muted fs-7 mb-1">Berakhir</div>
                                <div class="fw-bold {{ \Carbon\Carbon::parse($pengumuman->tanggal_berakhir)->isPast() ? 'text-danger' : '' }}">
                                    {{ \Carbon\Carbon::parse($pengumuman->tanggal_berakhir)->format('d M Y') }}
                                </div>
                                @if(\Carbon\Carbon::parse($pengumuman->tanggal_berakhir)->isPast())
                                <div class="text-danger fs-7">Pengumuman sudah berakhir</div>
                                @endif
                            </div>
                            <div>
                                <div class="text-muted fs-7 mb-1">Status</div>
                                <div>
                                    @if($pengumuman->published)
                                    <span class="badge badge-light-success">Dipublikasi</span>
                                    @else
                                    <span class="badge badge-light-warning">Draft</span>
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
        text: "Pengumuman akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('delete-form');
            form.action = '{{ route("admin.pengumuman.destroy", ":id") }}'.replace(':id', id);
            form.submit();
        }
    });
}
</script>
@endpush
