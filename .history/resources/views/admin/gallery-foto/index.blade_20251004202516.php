@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Gallery Foto')

@section('menu')
    Manajemen Gallery Foto
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Gallery Foto</li>
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

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-cross-circle fs-2 text-danger me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Error</div>
                            <div>{{ session('error') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Header Card -->
            <div class="card shadow-sm mb-8">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="fas fa-images fs-2x text-primary-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Manajemen Gallery Foto</h2>
                                    <p class="text-muted mb-0">Kelola foto-foto gallery desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.gallery-foto.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus fs-5 me-2"></i>
                                Tambah Foto
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-5 g-xl-8 mb-8">
                <div class="col-xl-3">
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">Total</span>
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $galleries->total() }}</span>
                                </div>
                                <span class="text-gray-500 pt-1 fw-semibold fs-6">Foto Gallery</span>
                            </div>
                        </div>
                        <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                            <div class="d-flex flex-center me-5 pt-2">
                                <div id="kt_card_widget_17_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70">
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-images fs-2x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">Aktif</span>
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $galleries->where('status_aktif', true)->count() }}</span>
                                </div>
                                <span class="text-gray-500 pt-1 fw-semibold fs-6">Foto Aktif</span>
                            </div>
                        </div>
                        <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                            <div class="d-flex flex-center me-5 pt-2">
                                <div id="kt_card_widget_18_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70">
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-check-circle fs-2x text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">Hero</span>
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $galleries->where('is_hero', true)->count() }}</span>
                                </div>
                                <span class="text-gray-500 pt-1 fw-semibold fs-6">Hero Photo</span>
                            </div>
                        </div>
                        <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                            <div class="d-flex flex-center me-5 pt-2">
                                <div id="kt_card_widget_19_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70">
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-star fs-2x text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">Kategori</span>
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $categories->count() }}</span>
                                </div>
                                <span class="text-gray-500 pt-1 fw-semibold fs-6">Kategori Foto</span>
                            </div>
                        </div>
                        <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                            <div class="d-flex flex-center me-5 pt-2">
                                <div id="kt_card_widget_20_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70">
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-tags fs-2x text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="card shadow-sm mb-8">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Filter & Pencarian</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.gallery-foto.index') }}">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Kategori</label>
                                <select name="kategori" class="form-select form-select-solid">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $key => $label)
                                        <option value="{{ $key }}" {{ request('kategori') == $key ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Pencarian</label>
                                <input type="text" name="search" class="form-control form-control-solid" 
                                       placeholder="Cari judul atau deskripsi..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">&nbsp;</label>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ki-duotone ki-magnifier fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Cari
                                    </button>
                                    <a href="{{ route('admin.gallery-foto.index') }}" class="btn btn-light">
                                        <i class="ki-duotone ki-cross fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Reset
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    <!-- Gallery Grid -->
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Foto</h6>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-sm btn-outline-primary active" onclick="toggleView('grid')">
                    <i class="fas fa-th"></i> Grid
                </button>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="toggleView('list')">
                    <i class="fas fa-list"></i> List
                </button>
            </div>
        </div>
        <div class="card-body">
            @if($galleries->count() > 0)
                <div id="grid-view" class="row">
                    @foreach($galleries as $gallery)
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 gallery-card {{ $gallery->is_hero ? 'hero-card' : '' }}">
                                <div class="position-relative">
                                    <img src="{{ $gallery->url_foto }}" class="card-img-top" alt="{{ $gallery->judul }}" style="height: 200px; object-fit: cover;">
                                    
                                    <!-- Hero Badge -->
                                    @if($gallery->is_hero)
                                        <div class="position-absolute top-0 start-0 m-2">
                                            <span class="badge bg-warning">
                                                <i class="fas fa-star"></i> Hero
                                            </span>
                                        </div>
                                    @endif

                                    <!-- Status Badge -->
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge {{ $gallery->status_aktif ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $gallery->status_aktif ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </div>

                                    <!-- Action Overlay -->
                                    <div class="position-absolute top-50 start-50 translate-middle opacity-0 action-overlay">
                                        <div class="btn-group-vertical" role="group">
                                            <button type="button" class="btn btn-sm btn-primary" onclick="setAsHero({{ $gallery->id }})" {{ $gallery->is_hero ? 'disabled' : '' }}>
                                                <i class="fas fa-star"></i> Set Hero
                                            </button>
                                            <a href="{{ route('admin.gallery-foto.edit', $gallery) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" onclick="deletePhoto({{ $gallery->id }})">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h6 class="card-title">{{ Str::limit($gallery->judul, 30) }}</h6>
                                    <p class="card-text text-muted small">{{ Str::limit($gallery->deskripsi, 50) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">{{ $gallery->kategori_label }}</small>
                                        <small class="text-muted">{{ $gallery->views }} views</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $galleries->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-images fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada foto</h5>
                    <p class="text-muted">Mulai dengan menambahkan foto pertama</p>
                    <a href="{{ route('admin.gallery-foto.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Foto
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus foto ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.gallery-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.gallery-card:hover .action-overlay {
    opacity: 1 !important;
}

.hero-card {
    border: 2px solid #ffc107;
    box-shadow: 0 0 20px rgba(255, 193, 7, 0.3);
}

.action-overlay {
    background: rgba(0,0,0,0.8);
    border-radius: 8px;
    transition: opacity 0.3s ease;
}
</style>
@endpush

@push('scripts')
<script>
function setAsHero(id) {
    if (confirm('Set foto ini sebagai hero? Foto hero sebelumnya akan diubah.')) {
        fetch(`/admin/gallery-foto/${id}/set-hero`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Gagal mengatur hero photo');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan');
        });
    }
}

function deletePhoto(id) {
    document.getElementById('deleteForm').action = `/admin/gallery-foto/${id}`;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

function toggleView(view) {
    // Toggle view implementation
    const buttons = document.querySelectorAll('.btn-group button');
    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    // Add view toggle logic here
}
</script>
@endpush
