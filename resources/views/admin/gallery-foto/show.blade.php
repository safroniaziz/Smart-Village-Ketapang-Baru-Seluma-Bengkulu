@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Detail Foto Gallery')

@section('menu')
    Detail Foto Gallery
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.gallery-foto.index') }}" class="text-muted text-hover-primary">Manajemen Gallery Foto</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Detail Foto Gallery</li>
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
                                        <i class="ki-duotone ki-picture fs-2x text-primary-600">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="fw-bold text-gray-900 mb-1">Detail Foto Gallery</h2>
                                    <p class="text-muted mb-0">Informasi lengkap foto gallery</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.gallery-foto.edit', $galleryFoto) }}" class="btn btn-primary">
                                    <i class="ki-duotone ki-pencil fs-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Edit
                                </a>
                                <a href="{{ route('admin.gallery-foto.index') }}" class="btn btn-light">
                                    <i class="ki-duotone ki-arrow-left fs-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5 g-xl-8">
                <div class="col-xl-8">
                    <!-- Photo Details -->
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Informasi Foto</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-5">
                                <div class="col-md-6">
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Judul Foto</label>
                                        <div class="text-gray-900 fs-6">{{ $galleryFoto->judul }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Kategori</label>
                                        <div>
                                            <span class="badge badge-light-info fs-7">{{ $galleryFoto->kategori_label }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <div class="text-gray-900 fs-6">
                                    {{ $galleryFoto->deskripsi ?: 'Tidak ada deskripsi' }}
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="form-label fw-semibold">URL Foto</label>
                                <div class="text-gray-900 fs-6">
                                    <a href="{{ $galleryFoto->url_foto }}" target="_blank" class="text-primary">
                                        {{ $galleryFoto->url_foto }}
                                    </a>
                                </div>
                            </div>

                            <div class="row g-5">
                                <div class="col-md-6">
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Alt Text</label>
                                        <div class="text-gray-900 fs-6">
                                            {{ $galleryFoto->alt_text ?: 'Tidak ada alt text' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Photographer</label>
                                        <div class="text-gray-900 fs-6">
                                            {{ $galleryFoto->photographer ?: 'Tidak diketahui' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-5">
                                <div class="col-md-6">
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Urutan</label>
                                        <div class="text-gray-900 fs-6">{{ $galleryFoto->urutan }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Tanggal Foto</label>
                                        <div class="text-gray-900 fs-6">
                                            {{ $galleryFoto->tanggal_foto ? $galleryFoto->tanggal_foto->format('d M Y') : 'Tidak diketahui' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-5">
                                <div class="col-md-6">
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Status</label>
                                        <div>
                                            <span class="badge {{ $galleryFoto->status_aktif ? 'badge-success' : 'badge-secondary' }}">
                                                {{ $galleryFoto->status_aktif ? 'Aktif' : 'Nonaktif' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Hero Photo</label>
                                        <div>
                                            @if($galleryFoto->is_hero)
                                                <span class="badge badge-warning">
                                                    <i class="ki-duotone ki-star fs-7">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    Hero Photo
                                                </span>
                                            @else
                                                <span class="badge badge-light">Bukan Hero</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Photo Preview -->
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Preview Foto</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ $galleryFoto->url_foto }}"
                                     alt="{{ $galleryFoto->judul }}"
                                     class="img-fluid rounded"
                                     style="max-height: 500px;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <!-- Stats -->
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Statistik</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="border-end">
                                        <div class="h4 mb-0 text-primary">{{ $galleryFoto->views }}</div>
                                        <div class="text-muted fs-7">Views</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="h4 mb-0 text-success">{{ $galleryFoto->created_at->format('d M Y') }}</div>
                                    <div class="text-muted fs-7">Dibuat</div>
                                </div>
                            </div>
                            <div class="row text-center mt-5">
                                <div class="col-6">
                                    <div class="border-end">
                                        <div class="h4 mb-0 text-info">{{ $galleryFoto->updated_at->format('d M Y') }}</div>
                                        <div class="text-muted fs-7">Diupdate</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="h4 mb-0 text-warning">{{ $galleryFoto->id }}</div>
                                    <div class="text-muted fs-7">ID Foto</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card shadow-sm mb-8">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Aksi Cepat</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                @if(!$galleryFoto->is_hero)
                                    <button type="button" class="btn btn-warning" onclick="setAsHero({{ $galleryFoto->id }})">
                                        <i class="ki-duotone ki-star fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        Set sebagai Hero
                                    </button>
                                @endif

                                <a href="{{ route('admin.gallery-foto.edit', $galleryFoto) }}" class="btn btn-primary">
                                    <i class="ki-duotone ki-pencil fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Edit Foto
                                </a>

                                <button type="button" class="btn btn-danger" onclick="deletePhoto({{ $galleryFoto->id }})">
                                    <i class="ki-duotone ki-trash fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                    Hapus Foto
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Photo Info -->
                    @if($galleryFoto->is_hero)
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="text-warning">Hero Photo</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning">
                                <i class="ki-duotone ki-star fs-2 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <strong>Foto ini adalah Hero Photo</strong>
                                <div class="form-text mt-2">
                                    Foto ini ditampilkan sebagai gambar utama di halaman potensi wisata.
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
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
</script>
@endpush
