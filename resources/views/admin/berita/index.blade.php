@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Berita')

@section('menu')
    Manajemen Berita
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Berita</li>
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

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-cross-circle fs-2 text-danger me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Terjadi Kesalahan</div>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
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
                                    <div class="symbol-label bg-light-emerald">
                                        <i class="fas fa-newspaper fs-2x text-emerald-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Manajemen Berita</h2>
                                    <p class="text-muted mb-0">Kelola berita dan artikel desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('berita') }}" target="_blank" class="btn btn-light-primary">
                                    <i class="fas fa-external-link-alt fs-5 me-2"></i>
                                    Lihat di Website
                                </a>
                                <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
                                    <i class="ki-duotone ki-plus fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                    Tambah Berita
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-5 g-xl-8 mb-8">
                <div class="col-xl-3">
                    <div class="card bg-light-emerald">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label bg-emerald-500">
                                        <i class="fas fa-newspaper text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-emerald-600">{{ $berita->total() }}</div>
                                    <div class="fs-7 text-muted">Total Berita</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-light-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label bg-success-500">
                                        <i class="fas fa-eye text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-success-600">{{ $berita->where('published', true)->count() }}</div>
                                    <div class="fs-7 text-muted">Dipublikasi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-light-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label bg-warning-500">
                                        <i class="fas fa-star text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-warning-600">{{ $berita->where('featured', true)->count() }}</div>
                                    <div class="fs-7 text-muted">Berita Utama</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-light-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label bg-info-500">
                                        <i class="fas fa-eye-slash text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-info-600">{{ $berita->where('published', false)->count() }}</div>
                                    <div class="fs-7 text-muted">Draft</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Table Card -->
            <div class="card shadow-sm">
                <div class="card-header border-0 py-6">
                    <div class="card-title">
                        <h3 class="fw-bold m-0">Daftar Berita</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center gap-2">
                            <form method="GET" action="{{ route('admin.berita.index') }}" class="d-flex align-items-center gap-2">
                                <select name="status" class="form-select form-select-sm w-150px" onchange="this.form.submit()">
                                    <option value="">Semua Status</option>
                                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Dipublikasi</option>
                                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="featured" {{ request('status') == 'featured' ? 'selected' : '' }}>Berita Utama</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('admin.berita.index') }}" class="mb-6">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-8">
                                <div class="position-relative">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4 top-50 translate-middle-y text-primary">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-solid ps-12" placeholder="Cari judul berita, kategori, atau penulis..." />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary flex-grow-1">
                                        <i class="ki-duotone ki-filter fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                        Filter
                                    </button>
                                    @if(request()->hasAny(['search','status']))
                                    <a href="{{ route('admin.berita.index') }}" class="btn btn-light">Reset</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-row-dashed align-middle gy-4">
                            <thead class="bg-light-emerald">
                                <tr class="fw-bold text-gray-800 fs-7 text-uppercase">
                                    <th class="min-w-300px">Judul Berita</th>
                                    <th class="min-w-120px">Kategori</th>
                                    <th class="min-w-120px">Penulis</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-100px">Views</th>
                                    <th class="min-w-120px">Tanggal</th>
                                    <th class="w-150px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($berita as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-emerald">
                                                    <i class="fas fa-newspaper text-emerald-600"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="text-gray-900 fw-bold fs-6">{{ Str::limit($item->judul, 50) }}</div>
                                                <div class="text-muted fs-7">{{ Str::limit($item->excerpt, 60) }}</div>
                                                @if($item->featured)
                                                <span class="badge badge-warning mt-1">Berita Utama</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($item->kategori)
                                        <span class="badge badge-light-info">{{ $item->kategori }}</span>
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-gray-700">{{ $item->penulis }}</td>
                                    <td>
                                        @if($item->published)
                                        <span class="badge badge-light-success">Dipublikasi</span>
                                        @else
                                        <span class="badge badge-light-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="text-gray-700 fw-semibold">{{ number_format($item->views) }}</span>
                                    </td>
                                    <td class="text-muted">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('berita.show', $item->slug) }}" target="_blank" class="btn btn-sm btn-light-primary" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-light-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-light-danger" onclick="confirmDelete({{ $item->id }})" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-10">
                                        <div class="text-muted">
                                            <i class="fas fa-newspaper fs-3x mb-3"></i>
                                            <div class="fw-bold fs-5">Belum ada berita</div>
                                            <div>Mulai dengan menambahkan berita pertama</div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($berita->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-6">
                        <div class="text-muted">
                            Menampilkan {{ $berita->firstItem() }} sampai {{ $berita->lastItem() }} dari {{ $berita->total() }} data
                        </div>
                        <div>
                            {{ $berita->links() }}
                        </div>
                    </div>
                    @endif
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

// Auto hide alerts
setTimeout(function() {
    $('.alert').fadeOut('slow');
}, 5000);
</script>
@endpush
