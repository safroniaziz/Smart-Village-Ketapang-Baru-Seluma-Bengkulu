@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Struktur Organisasi')

@section('menu')
    Detail Struktur Organisasi
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.struktur-organisasi.index') }}" class="text-muted text-hover-primary">Manajemen Struktur Organisasi</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">{{ $strukturOrganisasi->nama }}</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            
            <!-- Profile Header Card -->
            <div class="card shadow-sm mb-8">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-80px me-6">
                                    <img src="{{ $strukturOrganisasi->foto_url }}" alt="{{ $strukturOrganisasi->nama }}" class="w-100 rounded">
                                </div>
                                <div>
                                    <h1 class="fw-bold text-gray-900 mb-2">{{ $strukturOrganisasi->nama }}</h1>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="badge badge-lg {{ $strukturOrganisasi->level == 'kepala' ? 'badge-primary' : 'badge-info' }} me-3">
                                            {{ $strukturOrganisasi->level_badge }}
                                        </span>
                                        <h3 class="fw-semibold text-gray-700 mb-0">{{ $strukturOrganisasi->jabatan }}</h3>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-light-{{ $strukturOrganisasi->kategori == 'pemerintahan' ? 'primary' : 'success' }} me-3">
                                            {{ $strukturOrganisasi->kategori == 'pemerintahan' ? '🏛️ Pemerintahan Desa' : '⚖️ BPD' }}
                                        </span>
                                        <span class="badge badge-light-{{ $strukturOrganisasi->aktif ? 'success' : 'danger' }}">
                                            {{ $strukturOrganisasi->aktif ? '✓ Aktif' : '✗ Tidak Aktif' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.struktur-organisasi.edit', $strukturOrganisasi) }}" class="btn btn-warning">
                                    <i class="fas fa-edit fs-5 me-2"></i>
                                    Edit
                                </a>
                                <a href="{{ route('admin.struktur-organisasi.index') }}" class="btn btn-light-primary">
                                    <i class="fas fa-arrow-left fs-5 me-2"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-8">
                <!-- Left Column: Main Information -->
                <div class="col-xl-8">
                    
                    <!-- Tugas & Wewenang -->
                    @if((is_array($strukturOrganisasi->tugas) && count($strukturOrganisasi->tugas) > 0) || 
                        (is_array($strukturOrganisasi->wewenang) && count($strukturOrganisasi->wewenang) > 0))
                        <div class="card shadow-sm mb-8">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="fw-bold text-gray-900">Tugas & Wewenang</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row g-8">
                                    <!-- Tugas -->
                                    @if(is_array($strukturOrganisasi->tugas) && count($strukturOrganisasi->tugas) > 0)
                                        <div class="col-md-6">
                                            <h4 class="fw-bold text-primary mb-4">
                                                <i class="fas fa-tasks me-2"></i>
                                                Tugas Pokok
                                            </h4>
                                            <div class="timeline-wrapper">
                                                @foreach($strukturOrganisasi->tugas as $index => $tugas)
                                                    <div class="d-flex align-items-start mb-4">
                                                        <div class="symbol symbol-30px symbol-circle me-4 bg-light-primary">
                                                            <span class="symbol-label text-primary fw-bold">{{ $index + 1 }}</span>
                                                        </div>
                                                        <div class="flex-1">
                                                            <p class="text-gray-800 mb-0">{{ $tugas }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Wewenang -->
                                    @if(is_array($strukturOrganisasi->wewenang) && count($strukturOrganisasi->wewenang) > 0)
                                        <div class="col-md-6">
                                            <h4 class="fw-bold text-success mb-4">
                                                <i class="fas fa-shield-alt me-2"></i>
                                                Wewenang
                                            </h4>
                                            <div class="timeline-wrapper">
                                                @foreach($strukturOrganisasi->wewenang as $index => $wewenang)
                                                    <div class="d-flex align-items-start mb-4">
                                                        <div class="symbol symbol-30px symbol-circle me-4 bg-light-success">
                                                            <span class="symbol-label text-success fw-bold">{{ $index + 1 }}</span>
                                                        </div>
                                                        <div class="flex-1">
                                                            <p class="text-gray-800 mb-0">{{ $wewenang }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Struktur Hierarki -->
                    @if($strukturOrganisasi->parent || $strukturOrganisasi->children->count() > 0)
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="fw-bold text-gray-900">Struktur Hierarki</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                
                                <!-- Atasan -->
                                @if($strukturOrganisasi->parent)
                                    <div class="mb-8">
                                        <h5 class="fw-bold text-info mb-4">
                                            <i class="fas fa-arrow-up me-2"></i>
                                            Atasan Langsung
                                        </h5>
                                        <div class="card bg-light-info border-info">
                                            <div class="card-body p-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-4">
                                                        <img src="{{ $strukturOrganisasi->parent->foto_url }}" alt="{{ $strukturOrganisasi->parent->nama }}" class="w-100 rounded">
                                                    </div>
                                                    <div class="flex-1">
                                                        <h5 class="fw-bold text-gray-900 mb-1">{{ $strukturOrganisasi->parent->nama }}</h5>
                                                        <p class="text-gray-700 mb-1">{{ $strukturOrganisasi->parent->jabatan }}</p>
                                                        <span class="badge badge-info">{{ $strukturOrganisasi->parent->level_badge }}</span>
                                                    </div>
                                                    <a href="{{ route('admin.struktur-organisasi.show', $strukturOrganisasi->parent) }}" class="btn btn-sm btn-light-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Bawahan -->
                                @if($strukturOrganisasi->children->count() > 0)
                                    <div>
                                        <h5 class="fw-bold text-success mb-4">
                                            <i class="fas fa-arrow-down me-2"></i>
                                            Bawahan ({{ $strukturOrganisasi->children->count() }} orang)
                                        </h5>
                                        <div class="row g-4">
                                            @foreach($strukturOrganisasi->children as $child)
                                                <div class="col-md-6">
                                                    <div class="card bg-light-success border-success">
                                                        <div class="card-body p-4">
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-40px me-3">
                                                                    <img src="{{ $child->foto_url }}" alt="{{ $child->nama }}" class="w-100 rounded">
                                                                </div>
                                                                <div class="flex-1">
                                                                    <h6 class="fw-bold text-gray-900 mb-1">{{ $child->nama }}</h6>
                                                                    <p class="text-gray-700 mb-1 fs-7">{{ $child->jabatan }}</p>
                                                                    <span class="badge badge-success badge-sm">{{ $child->level_badge }}</span>
                                                                </div>
                                                                <a href="{{ route('admin.struktur-organisasi.show', $child) }}" class="btn btn-sm btn-light-success">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endif

                </div>

                <!-- Right Column: Info & Actions -->
                <div class="col-xl-4">
                    
                    <!-- Quick Info -->
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="fw-bold text-gray-900">Informasi Cepat</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center p-3 bg-light-primary rounded">
                                            <i class="fas fa-users text-primary fs-2x mb-2"></i>
                                            <h4 class="fw-bold text-primary mb-1">{{ $strukturOrganisasi->children->count() }}</h4>
                                            <p class="text-muted mb-0 fs-7">Bawahan</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center p-3 bg-light-success rounded">
                                            <i class="fas fa-layer-group text-success fs-2x mb-2"></i>
                                            <h4 class="fw-bold text-success mb-1">{{ $strukturOrganisasi->urutan ?: 'Auto' }}</h4>
                                            <p class="text-muted mb-0 fs-7">Urutan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="separator separator-dashed my-6"></div>

                            <!-- Detail Info -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-calendar-plus text-primary me-3 fs-5"></i>
                                    <div>
                                        <span class="text-muted fs-7">Dibuat</span>
                                        <p class="fw-semibold text-gray-800 mb-0">{{ $strukturOrganisasi->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-calendar-edit text-info me-3 fs-5"></i>
                                    <div>
                                        <span class="text-muted fs-7">Diperbarui</span>
                                        <p class="fw-semibold text-gray-800 mb-0">{{ $strukturOrganisasi->updated_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-toggle-{{ $strukturOrganisasi->aktif ? 'on text-success' : 'off text-danger' }} me-3 fs-5"></i>
                                    <div>
                                        <span class="text-muted fs-7">Status</span>
                                        <p class="fw-semibold text-gray-800 mb-0">{{ $strukturOrganisasi->aktif ? 'Aktif' : 'Tidak Aktif' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="fw-bold text-gray-900">Aksi</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column gap-3">
                                <a href="{{ route('admin.struktur-organisasi.edit', $strukturOrganisasi) }}" class="btn btn-warning">
                                    <i class="fas fa-edit me-2"></i>
                                    Edit Data
                                </a>
                                
                                @if($strukturOrganisasi->aktif)
                                    <button type="button" class="btn btn-light-warning" onclick="toggleStatus({{ $strukturOrganisasi->id }}, false)">
                                        <i class="fas fa-pause me-2"></i>
                                        Nonaktifkan
                                    </button>
                                @else
                                    <button type="button" class="btn btn-light-success" onclick="toggleStatus({{ $strukturOrganisasi->id }}, true)">
                                        <i class="fas fa-play me-2"></i>
                                        Aktifkan
                                    </button>
                                @endif

                                <div class="separator separator-dashed my-2"></div>

                                @if($strukturOrganisasi->trashed())
                                    <button type="button" class="btn btn-light-success" onclick="restoreItem({{ $strukturOrganisasi->id }})">
                                        <i class="fas fa-undo me-2"></i>
                                        Pulihkan
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="forceDeleteItem({{ $strukturOrganisasi->id }})">
                                        <i class="fas fa-trash-alt me-2"></i>
                                        Hapus Permanen
                                    </button>
                                @else
                                    <button type="button" class="btn btn-light-danger" onclick="deleteItem({{ $strukturOrganisasi->id }})">
                                        <i class="fas fa-trash me-2"></i>
                                        Hapus Sementara
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="card shadow-sm bg-light-info">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-compass text-info fs-2x me-4 mt-1"></i>
                                <div>
                                    <h4 class="fw-bold text-info mb-3">Navigasi Cepat</h4>
                                    <div class="d-flex flex-column gap-2">
                                        <a href="{{ route('admin.struktur-organisasi.index') }}" class="btn btn-sm btn-light-info">
                                            <i class="fas fa-list me-2"></i>
                                            Daftar Semua
                                        </a>
                                        <a href="{{ route('admin.struktur-organisasi.create') }}" class="btn btn-sm btn-light-success">
                                            <i class="fas fa-plus me-2"></i>
                                            Tambah Baru
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
// Toggle status function
function toggleStatus(id, status) {
    const statusText = status ? 'aktifkan' : 'nonaktifkan';
    
    Swal.fire({
        title: 'Konfirmasi',
        text: `Yakin ingin ${statusText} struktur organisasi ini?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: status ? '#28a745' : '#ffc107',
        cancelButtonColor: '#6c757d',
        confirmButtonText: `Ya, ${statusText}!`,
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/admin/struktur-organisasi/${id}/toggle-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ aktif: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: data.message || 'Terjadi kesalahan'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Terjadi kesalahan sistem'
                });
            });
        }
    });
}

// Delete function
function deleteItem(id) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data akan dihapus sementara dan masih bisa dipulihkan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/struktur-organisasi/${id}`;
            form.innerHTML = `
                <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                <input type="hidden" name="_method" value="DELETE">
            `;
            document.body.appendChild(form);
            form.submit();
        }
    });
}

// Restore function
function restoreItem(id) {
    Swal.fire({
        title: 'Pulihkan data?',
        text: "Data akan dikembalikan ke kondisi aktif",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, pulihkan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/admin/struktur-organisasi/${id}/restore`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Dipulihkan!',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                }
            });
        }
    });
}

// Force delete function
function forceDeleteItem(id) {
    Swal.fire({
        title: 'HAPUS PERMANEN?',
        text: "Data akan dihapus permanen dan TIDAK BISA dipulihkan!",
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus permanen!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/admin/struktur-organisasi/${id}/force-delete`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Dihapus Permanen!',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = '/admin/struktur-organisasi';
                    });
                }
            });
        }
    });
}
</script>
@endpush