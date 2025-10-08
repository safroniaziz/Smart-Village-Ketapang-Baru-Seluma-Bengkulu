@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Pengumuman')

@section('menu')
    Manajemen Pengumuman
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Pengumuman</li>
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
                                    <div class="symbol-label bg-light-primary">
                                        <i class="fas fa-bullhorn fs-2x text-primary-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Manajemen Pengumuman</h2>
                                    <p class="text-muted mb-0">Kelola pengumuman dan informasi resmi desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('pengumuman') }}" target="_blank" class="btn btn-light-primary">
                                    <i class="fas fa-external-link-alt fs-5 me-2"></i>
                                    Lihat di Website
                                </a>
                                <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-primary">
                                    <i class="ki-duotone ki-plus fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                    Tambah Pengumuman
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-5 g-xl-8 mb-8">
                <div class="col-xl-3">
                    <div class="card bg-light-primary">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label bg-primary-500">
                                        <i class="fas fa-bullhorn text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-primary-600">{{ $pengumuman->total() }}</div>
                                    <div class="fs-7 text-muted">Total Pengumuman</div>
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
                                    <div class="fs-2 fw-bold text-success-600">{{ $pengumuman->where('published', true)->count() }}</div>
                                    <div class="fs-7 text-muted">Dipublikasi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card bg-light-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40px me-4">
                                    <div class="symbol-label bg-danger-500">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-danger-600">{{ $pengumuman->where('prioritas', 'tinggi')->count() }}</div>
                                    <div class="fs-7 text-muted">Prioritas Tinggi</div>
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
                                    <div class="fs-2 fw-bold text-info-600">{{ $pengumuman->where('published', false)->count() }}</div>
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
                        <h3 class="fw-bold m-0">Daftar Pengumuman</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center gap-2">
                            <form method="GET" action="{{ route('admin.pengumuman.index') }}" class="d-flex align-items-center gap-2">
                                <select name="status" class="form-select form-select-sm w-150px" onchange="this.form.submit()">
                                    <option value="">Semua Status</option>
                                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Dipublikasi</option>
                                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="tinggi" {{ request('status') == 'tinggi' ? 'selected' : '' }}>Prioritas Tinggi</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('admin.pengumuman.index') }}" class="mb-6">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-8">
                                <div class="position-relative">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4 top-50 translate-middle-y text-primary">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-solid ps-12" placeholder="Cari judul pengumuman atau penulis..." />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary flex-grow-1">
                                        <i class="ki-duotone ki-filter fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                        Filter
                                    </button>
                                    @if(request()->hasAny(['search','status']))
                                    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-light">Reset</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-row-dashed align-middle gy-4">
                            <thead class="bg-light-primary">
                                <tr class="fw-bold text-gray-800 fs-7 text-uppercase">
                                    <th class="min-w-300px">Judul Pengumuman</th>
                                    <th class="min-w-120px">Prioritas</th>
                                    <th class="min-w-120px">Penulis</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-120px">Berakhir</th>
                                    <th class="min-w-100px">Views</th>
                                    <th class="min-w-120px">Tanggal</th>
                                    <th class="w-150px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengumuman as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-primary">
                                                    <i class="fas fa-bullhorn text-primary-600"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="text-gray-900 fw-bold fs-6">{{ Str::limit($item->judul, 50) }}</div>
                                                <div class="text-muted fs-7">{{ Str::limit($item->excerpt, 60) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $priorityClass = [
                                                'tinggi' => 'badge-light-danger',
                                                'sedang' => 'badge-light-warning',
                                                'rendah' => 'badge-light-success',
                                            ][$item->prioritas] ?? 'badge-light';
                                        @endphp
                                        <span class="badge {{ $priorityClass }}">{{ ucfirst($item->prioritas) }}</span>
                                    </td>
                                    <td class="text-gray-700">{{ $item->penulis }}</td>
                                    <td>
                                        @if($item->published)
                                        <span class="badge badge-light-success">Dipublikasi</span>
                                        @else
                                        <span class="badge badge-light-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $isExpired = \Carbon\Carbon::parse($item->tanggal_berakhir)->isPast();
                                        @endphp
                                        <span class="text-gray-700 {{ $isExpired ? 'text-danger' : '' }}">
                                            {{ \Carbon\Carbon::parse($item->tanggal_berakhir)->format('d M Y') }}
                                        </span>
                                        @if($isExpired)
                                        <div class="text-danger fs-7">Berakhir</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="text-gray-700 fw-semibold">{{ number_format($item->views) }}</span>
                                    </td>
                                    <td class="text-muted">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('pengumuman.show', $item->slug) }}" target="_blank" class="btn btn-sm btn-light-primary" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.pengumuman.edit', $item->id) }}" class="btn btn-sm btn-light-warning" title="Edit">
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
                                    <td colspan="8" class="text-center py-10">
                                        <div class="text-muted">
                                            <i class="fas fa-bullhorn fs-3x mb-3"></i>
                                            <div class="fw-bold fs-5">Belum ada pengumuman</div>
                                            <div>Mulai dengan menambahkan pengumuman pertama</div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($pengumuman->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-6">
                        <div class="text-muted">
                            Menampilkan {{ $pengumuman->firstItem() }} sampai {{ $pengumuman->lastItem() }} dari {{ $pengumuman->total() }} data
                        </div>
                        <div>
                            {{ $pengumuman->links() }}
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

// Auto hide alerts
setTimeout(function() {
    $('.alert').fadeOut('slow');
}, 5000);
</script>
@endpush
