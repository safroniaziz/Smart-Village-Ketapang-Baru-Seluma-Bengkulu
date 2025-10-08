@extends('layouts.admin')

@section('title', 'Gallery Foto - Admin Panel')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Gallery Foto</h1>
            <p class="text-muted">Kelola foto-foto gallery desa</p>
        </div>
        <a href="{{ route('admin.gallery-foto.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Foto
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Foto</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $galleries->total() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $galleries->where('status_aktif', true)->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Hero Photo</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $galleries->where('is_hero', true)->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter & Pencarian</h6>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.gallery-foto.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $key => $label)
                                <option value="{{ $key }}" {{ request('kategori') == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Pencarian</label>
                        <input type="text" name="search" class="form-control" placeholder="Cari judul atau deskripsi..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i> Cari
                            </button>
                            <a href="{{ route('admin.gallery-foto.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Reset
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
