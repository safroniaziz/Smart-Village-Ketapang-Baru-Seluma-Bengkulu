@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Batas Wilayah')

@section('menu')
    Batas Wilayah
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.peta-desa.index') }}" class="text-muted text-hover-primary">Peta Desa</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Batas Wilayah</li>
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

            <!-- Card -->
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Cari batas wilayah..." />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_batas">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Tambah Batas Wilayah
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-row-dashed align-middle gy-4">
                            <thead class="bg-light-primary">
                                <tr class="fw-bold text-gray-800 fs-7 text-uppercase">
                                    <th class="min-w-100px">No</th>
                                    <th class="min-w-150px">Arah</th>
                                    <th class="min-w-250px">Berbatasan Dengan</th>
                                    <th class="min-w-150px">Jenis Wilayah</th>
                                    <th class="min-w-100px">Jarak (km)</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-120px">Tanggal</th>
                                    <th class="w-150px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($batasWilayah as $index => $item)
                                <tr>
                                    <td class="text-gray-700 fw-semibold">{{ $batasWilayah->firstItem() + $index }}</td>
                                    <td>
                                        <span class="badge badge-light-info fs-7 fw-semibold text-capitalize">
                                            {{ $item->arah }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                <div class="symbol-label bg-light-success">
                                                    <i class="fas fa-map-marked-alt text-success"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="text-gray-900 fw-bold fs-6">{{ $item->berbatasan_dengan }}</div>
                                                @if($item->landmark)
                                                <div class="text-muted fs-7">{{ $item->landmark }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-gray-700">{{ $item->jenis_wilayah }}</td>
                                    <td class="text-center">
                                        <span class="text-gray-700 fw-semibold">{{ $item->jarak_km }}</span>
                                    </td>
                                    <td>
                                        @if($item->is_active)
                                            <span class="badge badge-light-success">Aktif</span>
                                        @else
                                            <span class="badge badge-light-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-muted">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-sm btn-light-info" onclick="showBatasWilayah({{ $item->id }})" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light-warning" onclick="editBatasWilayah({{ $item->id }})" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light-danger" onclick="deleteBatasWilayah({{ $item->id }})" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-10">
                                        <div class="text-muted">
                                            <i class="fas fa-map-marked-alt fs-3x mb-3"></i>
                                            <div class="fw-bold fs-5">Belum ada batas wilayah</div>
                                            <div>Mulai dengan menambahkan batas wilayah pertama</div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($batasWilayah->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-6">
                        <div class="text-muted">
                            Menampilkan {{ $batasWilayah->firstItem() ?? 0 }} - {{ $batasWilayah->lastItem() ?? 0 }} dari {{ $batasWilayah->total() }} batas wilayah
                        </div>
                        <div class="d-flex align-items-center">
                            <nav aria-label="Batas Wilayah pagination">
                                <ul class="pagination pagination-sm mb-0">
                                    {{-- Previous Page Link --}}
                                    @if ($batasWilayah->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">
                                                <i class="ki-duotone ki-left fs-5">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $batasWilayah->previousPageUrl() }}" rel="prev">
                                                <i class="ki-duotone ki-left fs-5">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($batasWilayah->getUrlRange(1, $batasWilayah->lastPage()) as $page => $url)
                                        @if ($page == $batasWilayah->currentPage())
                                            <li class="page-item active">
                                                <span class="page-link">{{ $page }}</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($batasWilayah->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $batasWilayah->nextPageUrl() }}" rel="next">
                                                <i class="ki-duotone ki-right fs-5">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link">
                                                <i class="ki-duotone ki-right fs-5">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
// Placeholder functions for future implementation
function showBatasWilayah(id) {
    console.log('Show batas wilayah:', id);
    // TODO: Implement show modal
}

function editBatasWilayah(id) {
    console.log('Edit batas wilayah:', id);
    // TODO: Implement edit modal
}

function deleteBatasWilayah(id) {
    if (confirm('Apakah Anda yakin ingin menghapus batas wilayah ini?')) {
        console.log('Delete batas wilayah:', id);
        // TODO: Implement delete
    }
}
</script>
@endpush