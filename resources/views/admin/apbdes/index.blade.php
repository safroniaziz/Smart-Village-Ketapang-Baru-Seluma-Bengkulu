@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen APBDes')

@section('menu')
    Manajemen APBDes
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen APBDes</li>
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
                                        <i class="fas fa-file-invoice-dollar fs-2x text-primary-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Manajemen APBDes</h2>
                                    <p class="text-muted mb-0">Kelola Anggaran Pendapatan dan Belanja Desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('anggaran') }}" target="_blank" class="btn btn-light-primary">
                                    <i class="fas fa-external-link-alt fs-5 me-2"></i>
                                    Lihat di Website
                                </a>
                                <button type="button" class="btn btn-light-info me-2" data-bs-toggle="modal" data-bs-target="#bulkImportModal">
                                    <i class="fas fa-upload fs-5 me-2"></i>
                                    Import Data
                                </button>
                                <a href="{{ route('admin.apbdes.create') }}" class="btn btn-primary">
                                    <i class="ki-duotone ki-plus fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                    Tambah Data
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
                                        <i class="fas fa-file-invoice-dollar text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-primary-600">{{ $stats['total'] }}</div>
                                    <div class="fs-7 text-muted">Total Item</div>
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
                                        <i class="fas fa-arrow-up text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-success-600">{{ number_format($stats['total_pendapatan'], 0, ',', '.') }}</div>
                                    <div class="fs-7 text-muted">Total Pendapatan</div>
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
                                        <i class="fas fa-arrow-down text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-danger-600">{{ number_format($stats['total_belanja'], 0, ',', '.') }}</div>
                                    <div class="fs-7 text-muted">Total Belanja</div>
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
                                        <i class="fas fa-balance-scale text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-2 fw-bold text-info-600">{{ number_format($stats['total_pendapatan'] - $stats['total_belanja'], 0, ',', '.') }}</div>
                                    <div class="fs-7 text-muted">Surplus/Defisit</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Card -->
            <div class="card shadow-sm mb-5">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.apbdes.index') }}">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <label class="form-label">Tahun Anggaran</label>
                                <select name="tahun" class="form-select">
                                    <option value="">Semua Tahun</option>
                                    @for($year = 2020; $year <= 2030; $year++)
                                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Jenis Anggaran</label>
                                <select name="jenis" class="form-select">
                                    <option value="">Semua Jenis</option>
                                    <option value="pendapatan" {{ request('jenis') == 'pendapatan' ? 'selected' : '' }}>Pendapatan</option>
                                    <option value="belanja" {{ request('jenis') == 'belanja' ? 'selected' : '' }}>Belanja</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Pencarian</label>
                                <input type="text" name="search" class="form-control" placeholder="Cari keterangan..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">&nbsp;</label>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary flex-fill">Filter</button>
                                    <a href="{{ route('admin.apbdes.index') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table Card -->
            <div class="card shadow-sm">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    @if($apbdes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                    <tr class="fw-bold text-muted">
                                        <th class="min-w-50px">No</th>
                                        <th class="min-w-100px">Tahun</th>
                                        <th class="min-w-120px">Jenis</th>
                                        <th class="min-w-200px">Keterangan</th>
                                        <th class="min-w-150px text-end">Anggaran</th>
                                        <th class="min-w-100px text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($apbdes as $index => $item)
                                        <tr>
                                            <td class="text-muted fw-semibold">{{ $apbdes->firstItem() + $index }}</td>
                                            <td>
                                                <span class="badge badge-light-primary px-3 py-2">{{ $item->tahun_anggaran }}</span>
                                            </td>
                                            <td>
                                                @if($item->jenis_anggaran === 'pendapatan')
                                                    <span class="badge badge-light-success px-3 py-2">
                                                        <i class="fas fa-arrow-up me-1"></i>Pendapatan
                                                    </span>
                                                @else
                                                    <span class="badge badge-light-danger px-3 py-2">
                                                        <i class="fas fa-arrow-down me-1"></i>Belanja
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="text-dark fw-bold text-hover-primary fs-6">{{ $item->keterangan }}</span>
                                                    @if($item->keterangan_detail)
                                                        <span class="text-muted fs-7">{{ Str::limit($item->keterangan_detail, 50) }}</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <span class="text-dark fw-bold d-block fs-6">{{ $item->formatted_anggaran }}</span>
                                            </td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end flex-shrink-0">
                                                    <a href="{{ route('admin.apbdes.show', $item) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="Detail">
                                                        <i class="ki-duotone ki-eye fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                    </a>
                                                    <a href="{{ route('admin.apbdes.edit', $item) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="Edit">
                                                        <i class="ki-duotone ki-pencil fs-3"><span class="path1"></span><span class="path2"></span></i>
                                                    </a>
                                                    <form action="{{ route('admin.apbdes.destroy', $item) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" title="Hapus"
                                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                            <i class="ki-duotone ki-trash fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $apbdes->appends(request()->query())->links() }}
                        </div>
                    @else
                        <div class="text-center py-10">
                            <div class="symbol symbol-100px symbol-circle mx-auto mb-7">
                                <div class="symbol-label bg-light-primary">
                                    <i class="fas fa-file-invoice-dollar fs-2x text-primary"></i>
                                </div>
                            </div>
                            <h3 class="text-gray-900 fw-bold mb-3">Belum ada data APBDes</h3>
                            <p class="text-muted mb-5">Tambahkan data APBDes untuk mulai mengelola anggaran desa</p>
                            <a href="{{ route('admin.apbdes.create') }}" class="btn btn-primary">
                                <i class="ki-duotone ki-plus fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                Tambah Data APBDes
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Import Modal -->
    <div class="modal fade" id="bulkImportModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Import Data APBDes</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-5">
                        <p class="text-muted">Anda dapat mengimpor multiple data APBDes sekaligus. Isi form di bawah ini untuk setiap item yang ingin ditambahkan.</p>
                    </div>

                    <form id="bulkImportForm">
                        @csrf
                        <div id="importItems">
                            <!-- Items will be added here by JavaScript -->
                        </div>

                        <div class="d-flex gap-2 mt-5">
                            <button type="button" class="btn btn-light-primary" onclick="addImportItem()">
                                <i class="fas fa-plus me-2"></i>Tambah Item
                            </button>
                            <button type="button" class="btn btn-light-danger" onclick="removeLastItem()" id="removeBtn" style="display: none;">
                                <i class="fas fa-minus me-2"></i>Hapus Item Terakhir
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="submitBulkImport()">
                        <i class="fas fa-upload me-2"></i>Import Data
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
let itemCount = 0;

function addImportItem() {
    itemCount++;
    const itemHtml = `
        <div class="card border mb-4" id="item-${itemCount}">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Item ${itemCount}</h5>
                    <button type="button" class="btn btn-sm btn-light-danger" onclick="removeItem(${itemCount})">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="form-label required">Tahun</label>
                        <select name="items[${itemCount-1}][tahun_anggaran]" class="form-select" required>
                            <option value="">Pilih Tahun</option>
                            @for($year = 2020; $year <= 2030; $year++)
                                <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label required">Jenis</label>
                        <select name="items[${itemCount-1}][jenis_anggaran]" class="form-select" required>
                            <option value="">Pilih Jenis</option>
                            <option value="pendapatan">Pendapatan</option>
                            <option value="belanja">Belanja</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label required">Keterangan</label>
                        <input type="text" name="items[${itemCount-1}][keterangan]" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label required">Anggaran</label>
                        <input type="number" name="items[${itemCount-1}][anggaran]" class="form-control" min="0" step="0.01" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Detail</label>
                        <textarea name="items[${itemCount-1}][keterangan_detail]" class="form-control" rows="1"></textarea>
                    </div>
                </div>
            </div>
        </div>
    `;

    document.getElementById('importItems').insertAdjacentHTML('beforeend', itemHtml);
    document.getElementById('removeBtn').style.display = itemCount > 0 ? 'inline-block' : 'none';
}

function removeItem(id) {
    document.getElementById(`item-${id}`).remove();
    itemCount--;
    document.getElementById('removeBtn').style.display = itemCount > 0 ? 'inline-block' : 'none';
}

function removeLastItem() {
    if (itemCount > 0) {
        const lastItem = document.querySelector('#importItems .card:last-child');
        if (lastItem) {
            lastItem.remove();
            itemCount--;
        }
    }
    document.getElementById('removeBtn').style.display = itemCount > 0 ? 'inline-block' : 'none';
}

function submitBulkImport() {
    const form = document.getElementById('bulkImportForm');
    const formData = new FormData(form);

    // Convert to regular object for JSON
    const items = [];
    const formObject = {};
    for (let [key, value] of formData.entries()) {
        formObject[key] = value;
    }

    // Group by item index
    for (let i = 0; i < itemCount; i++) {
        const item = {};
        for (let key in formObject) {
            if (key.startsWith(`items[${i}]`)) {
                const field = key.match(/\[([^\]]+)\]$/)[1];
                item[field] = formObject[key];
            }
        }
        if (Object.keys(item).length > 0) {
            items.push(item);
        }
    }

    if (items.length === 0) {
        alert('Harap tambahkan minimal 1 item');
        return;
    }

    // Submit via AJAX
    fetch('{{ route("admin.apbdes.bulk-store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ items: items })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengimpor data');
    });
}

// Add first item when modal opens
document.getElementById('bulkImportModal').addEventListener('shown.bs.modal', function() {
    if (itemCount === 0) {
        addImportItem();
    }
});

// Reset when modal closes
document.getElementById('bulkImportModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('importItems').innerHTML = '';
    itemCount = 0;
    document.getElementById('removeBtn').style.display = 'none';
});
</script>
@endpush
