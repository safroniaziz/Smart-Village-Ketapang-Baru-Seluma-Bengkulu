@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Kontak')

@section('menu')
    Manajemen Kontak
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Kontak</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            {{-- SweetAlert notifications will be handled in JavaScript --}}

            <!-- Header Card -->
            <div class="card shadow-sm mb-8">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="fas fa-address-book fs-2x text-primary"></i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Kontak Desa</h2>
                                    <p class="text-muted mb-0">Kelola informasi kontak dan jam operasional desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('kontak') }}" target="_blank" class="btn btn-light-primary">
                                <i class="fas fa-external-link-alt fs-5 me-2"></i>
                                Lihat di Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if($kontak->count() > 0)
                @php $kontakUtama = $kontak->where('aktif', true)->first() ?? $kontak->first(); @endphp

                <!-- Main Kontak Card -->
                <div class="row g-5 g-xl-8 mb-8">
                    <!-- Kontak Info Card -->
                    <div class="col-xl-8">
                        <div class="card shadow-sm h-100">
                            <div class="card-header border-0 pt-6">
                                <div class="card-title">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-60px me-4">
                                            <div class="symbol-label bg-light-primary">
                                                <i class="fas fa-building text-primary fs-2x"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="fw-bold text-gray-900 mb-1">{{ $kontakUtama->nama_desa }}</h3>
                                            <p class="text-muted mb-0">{{ $kontakUtama->kepala_desa ? 'Kepala Desa: ' . $kontakUtama->kepala_desa : 'Informasi kontak desa' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-toolbar">
                                    @if($kontakUtama->aktif)
                                        <span class="badge badge-light-success fs-7">Aktif</span>
                                    @else
                                        <span class="badge badge-light-warning fs-7">Tidak Aktif</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row g-4">
                                    <!-- Alamat -->
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-start">
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-info">
                                                    <i class="fas fa-map-marker-alt text-info"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="fw-bold text-gray-900 mb-1">Alamat</div>
                                                <div class="text-muted">{{ $kontakUtama->alamat_lengkap }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Telepon -->
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-start">
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-success">
                                                    <i class="fas fa-phone text-success"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="fw-bold text-gray-900 mb-1">Telepon</div>
                                                <div class="text-muted">
                                                    @if($kontakUtama->telepon)
                                                        <a href="tel:{{ $kontakUtama->telepon }}" class="text-success">{{ $kontakUtama->telepon }}</a>
                                                    @else
                                                        <span class="text-muted">Belum diatur</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-start">
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-warning">
                                                    <i class="fas fa-envelope text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="fw-bold text-gray-900 mb-1">Email</div>
                                                <div class="text-muted">
                                                    @if($kontakUtama->email)
                                                        <a href="mailto:{{ $kontakUtama->email }}" class="text-warning">{{ $kontakUtama->email }}</a>
                                                    @else
                                                        <span class="text-muted">Belum diatur</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Jam Operasional -->
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-start">
                                            <div class="symbol symbol-35px me-3">
                                                <div class="symbol-label bg-light-danger">
                                                    <i class="fas fa-clock text-danger"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="fw-bold text-gray-900 mb-1">Jam Operasional</div>
                                                <div class="text-muted">
                                                    @if($kontakUtama->jam_operasional_formatted && count($kontakUtama->jam_operasional_formatted) > 0)
                                                        <span class="badge badge-light-success">{{ count($kontakUtama->jam_operasional_formatted) }} hari diatur</span>
                                                    @else
                                                        <span class="text-muted">Belum diatur</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <div class="d-flex gap-3">
                                    <a href="{{ route('admin.kontak.edit', $kontakUtama->id) }}" class="btn btn-primary flex-grow-1">
                                        <i class="fas fa-edit me-2"></i>
                                        Edit Kontak Desa
                                    </a>
                                    <a href="{{ route('admin.kontak.show', $kontakUtama->id) }}" class="btn btn-light-primary">
                                        <i class="fas fa-eye me-2"></i>
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="col-xl-4">
                        <div class="row g-4">
                            <!-- Status Card -->
                            <div class="col-12">
                                <div class="card bg-light-primary h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="symbol symbol-50px me-4">
                                            <div class="symbol-label bg-primary">
                                                <i class="fas fa-{{ $kontakUtama->aktif ? 'check-circle' : 'times-circle' }} text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="fs-2 fw-bold text-primary">{{ $kontakUtama->aktif ? 'Aktif' : 'Non-Aktif' }}</div>
                                            <div class="fs-7 text-muted">Status Kontak</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Update Info -->
                            <div class="col-12">
                                <div class="card bg-light-info h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="symbol symbol-50px me-4">
                                            <div class="symbol-label bg-info">
                                                <i class="fas fa-calendar text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="fs-6 fw-bold text-info">{{ $kontakUtama->updated_at ? $kontakUtama->updated_at->diffForHumans() : 'Belum pernah' }}</div>
                                            <div class="fs-7 text-muted">Terakhir Diupdate</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Completeness Score -->
                            <div class="col-12">
                                @php
                                    $completeness = 0;
                                    if($kontakUtama->nama_desa) $completeness += 20;
                                    if($kontakUtama->alamat) $completeness += 20;
                                    if($kontakUtama->telepon) $completeness += 20;
                                    if($kontakUtama->email) $completeness += 20;
                                    if($kontakUtama->jam_operasional) $completeness += 20;
                                @endphp
                                <div class="card bg-light-success h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="symbol symbol-50px me-4">
                                            <div class="symbol-label bg-success">
                                                <i class="fas fa-chart-pie text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="fs-2 fw-bold text-success">{{ $completeness }}%</div>
                                            <div class="fs-7 text-muted">Kelengkapan Data</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <div class="mb-10">
                        <i class="fas fa-address-book fs-5x text-muted mb-5"></i>
                        <h3 class="text-gray-900 fw-bold mb-3">Belum Ada Kontak Desa</h3>
                        <p class="text-muted mb-5">Tambahkan informasi kontak desa untuk ditampilkan di website</p>
                        <a href="{{ route('admin.kontak.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>
                            Tambah Kontak Desa
                        </a>
                    </div>
                </div>
            @endif

            @if($kontak->count() > 1)
                <!-- Multiple Kontak Management -->
                <div class="card shadow-sm">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <h3 class="fw-bold text-gray-900">Kontak Lainnya</h3>
                            <p class="text-muted mb-0">Kelola kontak tambahan jika diperlukan</p>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ route('admin.kontak.create') }}" class="btn btn-light-primary">
                                <i class="fas fa-plus me-2"></i>
                                Tambah Kontak
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-4">
                            @foreach($kontak as $item)
                                @if($item->id !== $kontakUtama->id)
                                    <div class="col-md-6">
                                        <div class="card border border-gray-300">
                                            <div class="card-body">
                                                <div class="d-flex align-items-start justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-40px me-3">
                                                            <div class="symbol-label bg-light-secondary">
                                                                <i class="fas fa-building text-secondary"></i>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="fw-bold text-gray-900">{{ $item->nama_desa }}</div>
                                                            <div class="text-muted fs-7">{{ $item->kepala_desa ?: 'Belum ada kepala desa' }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-light btn-sm" data-bs-toggle="dropdown">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('admin.kontak.show', $item->id) }}" class="dropdown-item">
                                                                <i class="fas fa-eye me-2"></i>Lihat
                                                            </a>
                                                            <a href="{{ route('admin.kontak.edit', $item->id) }}" class="dropdown-item">
                                                                <i class="fas fa-edit me-2"></i>Edit
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="#" class="dropdown-item text-danger" onclick="deleteKontak({{ $item->id }})">
                                                                <i class="fas fa-trash me-2"></i>Hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="text-muted fs-8">{{ $item->created_at->format('d/m/Y') }}</div>
                                                        @if($item->aktif)
                                                            <span class="badge badge-light-success">Aktif</span>
                                                        @else
                                                            <span class="badge badge-light-secondary">Tidak Aktif</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check for success message
    @if(session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#10b981',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: true,
            allowOutsideClick: true
        });
    @endif

    // Check for error message
    @if(session('error'))
        Swal.fire({
            title: 'Oops!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK',
            confirmButtonColor: '#ef4444'
        });
    @endif

    // Check for validation errors
    @if($errors->any())
        let errorList = '';
        @foreach($errors->all() as $error)
            errorList += '• {{ $error }}\n';
        @endforeach

        Swal.fire({
            title: 'Terjadi Kesalahan!',
            text: errorList,
            icon: 'error',
            confirmButtonText: 'OK',
            confirmButtonColor: '#ef4444',
            customClass: {
                content: 'text-start'
            }
        });
    @endif
});

// Delete function for kontak cards
function deleteKontak(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Data kontak akan dihapus secara permanen!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: '<i class="fas fa-trash me-2"></i>Ya, hapus!',
        cancelButtonText: '<i class="fas fa-times me-2"></i>Batal',
        reverseButtons: true,
        focusCancel: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Menghapus...',
                text: 'Mohon tunggu sebentar',
                icon: 'info',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading()
                }
            });

            // Create form and submit
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/kontak/${id}`;

            // Add CSRF token
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            // Add method spoofing for DELETE
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);

            document.body.appendChild(form);
            form.submit();
        }
    });
}
</script>
@endpush
