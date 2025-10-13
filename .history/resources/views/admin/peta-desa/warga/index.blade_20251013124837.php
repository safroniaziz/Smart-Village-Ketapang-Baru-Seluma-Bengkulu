@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Koordinat Warga')

@section('menu')
    Koordinat Warga
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
    <li class="breadcrumb-item text-muted">Koordinat Warga</li>
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
                            <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Cari koordinat warga..." />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{ route('data-warga.index') }}" class="btn btn-primary">
                                <i class="ki-duotone ki-people fs-2"></i>
                                Kelola Data Warga
                            </a>
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
                                    <th class="min-w-200px">NIK</th>
                                    <th class="min-w-250px">Nama Lengkap</th>
                                    <th class="min-w-200px">Koordinat</th>
                                    <th class="min-w-100px">Foto</th>
                                    <th class="min-w-150px">Dusun</th>
                                    <th class="min-w-120px">Tanggal</th>
                                    <th class="w-150px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($warga as $index => $item)
                                <tr>
                                    <td class="text-gray-700 fw-semibold">{{ $warga->firstItem() + $index }}</td>
                                    <td class="text-gray-700">{{ $item->nik }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-40px me-4">
                                                @if($item->foto)
                                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Warga" class="w-100 h-100 object-fit-cover rounded">
                                                @else
                                                    <div class="symbol-label bg-light-info">
                                                        <i class="fas fa-user text-info"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="text-gray-900 fw-bold fs-6">{{ $item->nama_lengkap }}</div>
                                                <div class="text-muted fs-7">Kepala Keluarga</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-success fs-7 fw-semibold">
                                            {{ $item->lat }}, {{ $item->long }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Warga" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted fs-7">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->dusun)
                                            <span class="badge badge-light-primary">{{ $item->dusun }}</span>
                                        @else
                                            <span class="text-muted fs-7">-</span>
                                        @endif
                                    </td>
                                    <td class="text-muted">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-sm btn-light-info" onclick="showWarga({{ $item->id }})" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light-warning" onclick="editWarga({{ $item->id }})" title="Edit Koordinat">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-10">
                                        <div class="text-muted">
                                            <i class="fas fa-user fs-3x mb-3"></i>
                                            <div class="fw-bold fs-5">Belum ada koordinat warga</div>
                                            <div>Warga belum memiliki koordinat GPS</div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($warga->hasPages())
                    <div class="d-flex justify-content-between align-items-center mt-6">
                        <div class="text-muted">
                            Menampilkan {{ $warga->firstItem() ?? 0 }} - {{ $warga->lastItem() ?? 0 }} dari {{ $warga->total() }} koordinat warga
                        </div>
                        <div class="d-flex align-items-center">
                            <nav aria-label="Warga pagination">
                                <ul class="pagination pagination-sm mb-0">
                                    {{-- Previous Page Link --}}
                                    @if ($warga->onFirstPage())
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
                                            <a class="page-link" href="{{ $warga->previousPageUrl() }}" rel="prev">
                                                <i class="ki-duotone ki-left fs-5">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($warga->getUrlRange(1, $warga->lastPage()) as $page => $url)
                                        @if ($page == $warga->currentPage())
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
                                    @if ($warga->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $warga->nextPageUrl() }}" rel="next">
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
function showWarga(id) {
    console.log('Show warga:', id);
    // TODO: Implement show modal
}

function editWarga(id) {
    console.log('Edit warga:', id);
    // TODO: Implement edit modal
}
</script>
@endpush
