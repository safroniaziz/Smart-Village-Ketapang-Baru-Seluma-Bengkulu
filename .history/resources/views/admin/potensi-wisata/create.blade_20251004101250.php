@extends('layouts.dashboard.app')

@section('title', 'Tambah Potensi Wisata')

@push('styles')
<style>
    .image-preview {
        position: relative;
        display: inline-block;
        margin: 5px;
    }
    .image-preview img {
        width: 100px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #e4e6ef;
    }
    .image-preview .remove-image {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 20px;
        height: 20px;
        background: #f1416c;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .youtube-preview {
        position: relative;
        width: 100%;
        height: 200px;
        background: #f5f8fa;
        border: 2px dashed #e4e6ef;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin-top: 10px;
    }
    .youtube-preview iframe {
        width: 100%;
        height: 100%;
        border-radius: 8px;
    }
    .facility-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 10px;
    }
</style>
@endpush

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    <i class="fas fa-plus-circle text-primary me-2"></i>Tambah Potensi Wisata
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.potensi-wisata.index') }}" class="text-muted text-hover-primary">Potensi Wisata</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Tambah Baru</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('admin.potensi-wisata.index') }}" class="btn btn-sm fw-bold btn-secondary">
                    <i class="ki-duotone ki-arrow-left fs-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form action="{{ route('admin.potensi-wisata.store') }}" method="POST" id="kt_form_wisata">
                @csrf
                <div class="row g-7">
                    <div class="col-xl-8">
                        <!--begin::Card-->
                        <div class="card card-flush h-md-100">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Informasi Dasar</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Nama Wisata</label>
                                    <input type="text" name="nama" class="form-control mb-2" placeholder="Masukkan nama destinasi wisata" value="{{ old('nama') }}" required />
                                    @error('nama')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Nama destinasi wisata yang menarik dan mudah diingat</div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control mb-2" rows="6" placeholder="Ceritakan tentang keindahan dan keunikan destinasi wisata ini..." required>{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Deskripsi yang menarik akan meningkatkan minat wisatawan</div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row g-9 mb-7">
                                    <div class="col-md-6 fv-row">
                                        <label class="required form-label">Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control mb-2" placeholder="Kota, Provinsi" value="{{ old('lokasi') }}" required />
                                        @error('lokasi')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="required form-label">Kategori Wisata</label>
                                        <select name="kategori_wisata" class="form-select mb-2" data-control="select2" data-placeholder="Pilih kategori" required>
                                            <option></option>
                                            @foreach(App\Models\PotensiWisata::getKategoriOptions() as $key => $value)
                                                <option value="{{ $key }}" {{ old('kategori_wisata') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_wisata')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row g-9 mb-7">
                                    <div class="col-md-6 fv-row">
                                        <label class="required form-label">Jam Operasional</label>
                                        <input type="text" name="jam_operasional" class="form-control mb-2" placeholder="08:00 - 17:00" value="{{ old('jam_operasional') }}" required />
                                        @error('jam_operasional')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="required form-label">Tiket Masuk</label>
                                        <input type="text" name="tiket_masuk" class="form-control mb-2" placeholder="Rp 10.000 / Gratis" value="{{ old('tiket_masuk') }}" required />
                                        @error('tiket_masuk')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row g-9 mb-7">
                                    <div class="col-md-6 fv-row">
                                        <label class="form-label">Kontak</label>
                                        <input type="text" name="kontak" class="form-control mb-2" placeholder="+62 812-3456-7890" value="{{ old('kontak') }}" />
                                        @error('kontak')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="form-label">Urutan Tampil</label>
                                        <input type="number" name="urutan" class="form-control mb-2" min="1" placeholder="1" value="{{ old('urutan') }}" />
                                        @error('urutan')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                        <div class="text-muted fs-7">Semakin kecil angka, semakin atas urutannya</div>
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-7">
                                    <label class="form-label">Koordinat GPS</label>
                                    <div class="row g-9">
                                        <div class="col-md-6 fv-row">
                                            <input type="number" step="any" name="latitude" class="form-control" placeholder="Latitude (misal: -3.8076)" value="{{ old('latitude') }}" />
                                            @error('latitude')
                                                <div class="text-danger fs-7">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <input type="number" step="any" name="longitude" class="form-control" placeholder="Longitude (misal: 102.2501)" value="{{ old('longitude') }}" />
                                            @error('longitude')
                                                <div class="text-danger fs-7">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-muted fs-7 mt-1">Koordinat GPS untuk integrasi dengan Google Maps</div>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--end::Card-->

                        <!--begin::Media Card-->
                        <div class="card card-flush mt-7">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Media & Gambar</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <label class="required form-label">URL Gambar Wisata</label>
                                    <div id="gambar_container">
                                        <div class="input-group mb-3">
                                            <input type="url" name="gambar[]" class="form-control" placeholder="https://images.unsplash.com/photo..." required />
                                            <button class="btn btn-outline-primary" type="button" onclick="previewImage(this)">Preview</button>
                                            <button class="btn btn-outline-danger d-none" type="button" onclick="removeImageInput(this)">Hapus</button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-light-primary btn-sm" onclick="addImageInput()">
                                        <i class="ki-duotone ki-plus fs-3"></i>Tambah Gambar
                                    </button>
                                    @error('gambar')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    @error('gambar.*')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Tambahkan minimal 1 gambar. Gunakan URL dari Google Images atau Unsplash</div>

                                    <div id="image_previews" class="mt-5"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-7 fv-row">
                                    <label class="form-label">Video YouTube (Opsional)</label>
                                    <input type="url" name="video_youtube" id="youtube_url" class="form-control mb-2" placeholder="https://www.youtube.com/watch?v=..." value="{{ old('video_youtube') }}" />
                                    @error('video_youtube')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">URL video YouTube untuk menampilkan video wisata</div>

                                    <div id="youtube_preview"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-7 fv-row">
                                    <label class="form-label">Sumber Video (Opsional)</label>
                                    <input type="text" name="sumber_video" class="form-control" placeholder="Contoh: YT Aneka Hobi" value="{{ old('sumber_video') }}" />
                                    @error('sumber_video')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Nama channel atau sumber video YouTube</div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-7 fv-row">
                                    <label class="form-label">File Potensi Desa (Opsional)</label>
                                    <input type="file" name="file_potensi_desa" class="form-control" accept=".pdf,.doc,.docx" />
                                    @error('file_potensi_desa')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Upload file PDF atau DOC berisi informasi potensi desa (Max: 10MB)</div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row">
                                    <label class="form-label">Thumbnail (Opsional)</label>
                                    <input type="url" name="thumbnail" id="thumbnail_url" class="form-control mb-2" placeholder="https://images.unsplash.com/photo..." value="{{ old('thumbnail') }}" />
                                    @error('thumbnail')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Jika kosong, gambar pertama akan digunakan sebagai thumbnail</div>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--end::Media Card-->
                    </div>

                    <div class="col-xl-4">
                        <!--begin::Fasilitas Card-->
                        <div class="card card-flush h-md-100">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Fasilitas</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="mb-0">
                                    <label class="required form-label mb-5">Pilih Fasilitas yang Tersedia</label>
                                    <div class="facility-grid">
                                        @foreach(App\Models\PotensiWisata::getFasilitasOptions() as $key => $value)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="fasilitas[]" value="{{ $key }}" id="fasilitas_{{ $key }}"
                                                       {{ in_array($key, old('fasilitas', [])) ? 'checked' : '' }} />
                                                <label class="form-check-label" for="fasilitas_{{ $key }}">
                                                    {{ $value }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('fasilitas')
                                        <div class="text-danger fs-7 mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7 mt-2">Pilih minimal satu fasilitas yang tersedia di lokasi wisata</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Fasilitas Card-->

                        <!--begin::Action Card-->
                        <div class="card card-flush mt-7">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Aksi</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="mb-7">
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="status_aktif" value="1" id="status_aktif" checked />
                                        <label class="form-check-label fw-semibold text-gray-400 ms-3" for="status_aktif">
                                            Status Aktif
                                        </label>
                                    </div>
                                    <div class="text-muted fs-7">Wisata yang aktif akan tampil di halaman publik</div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.potensi-wisata.index') }}" class="btn btn-light me-5">Batal</a>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Simpan Wisata</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--end::Action Card-->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end::Content-->
</div>
@endsection

@push('scripts')
<script>
let imageCount = 1;

function addImageInput() {
    imageCount++;
    const container = document.getElementById('gambar_container');
    const div = document.createElement('div');
    div.className = 'input-group mb-3';
    div.innerHTML = `
        <input type="url" name="gambar[]" class="form-control" placeholder="https://images.unsplash.com/photo..." />
        <button class="btn btn-outline-primary" type="button" onclick="previewImage(this)">Preview</button>
        <button class="btn btn-outline-danger" type="button" onclick="removeImageInput(this)">Hapus</button>
    `;
    container.appendChild(div);
}

function removeImageInput(button) {
    const container = button.closest('.input-group');
    const input = container.querySelector('input');
    const url = input.value;

    // Remove preview if exists
    const preview = document.querySelector(`[data-url="${url}"]`);
    if (preview) {
        preview.remove();
    }

    container.remove();
    updateRemoveButtons();
}

function updateRemoveButtons() {
    const buttons = document.querySelectorAll('#gambar_container .btn-outline-danger');
    buttons.forEach((btn, index) => {
        if (index === 0 && buttons.length === 1) {
            btn.classList.add('d-none');
        } else {
            btn.classList.remove('d-none');
        }
    });
}

function previewImage(button) {
    const input = button.parentElement.querySelector('input');
    const url = input.value;

    if (!url) return;

    // Remove existing preview for this URL
    const existingPreview = document.querySelector(`[data-url="${url}"]`);
    if (existingPreview) {
        existingPreview.remove();
    }

    const previewContainer = document.getElementById('image_previews');
    const preview = document.createElement('div');
    preview.className = 'image-preview';
    preview.setAttribute('data-url', url);
    preview.innerHTML = `
        <img src="${url}" alt="Preview" onerror="this.parentElement.innerHTML='<div class=\\'text-danger\\'>Gambar tidak dapat dimuat</div>'">
        <button type="button" class="remove-image" onclick="removePreview(this, '${url}')">&times;</button>
    `;

    previewContainer.appendChild(preview);
}

function removePreview(button, url) {
    // Remove preview
    button.closest('.image-preview').remove();

    // Clear input with matching URL
    const inputs = document.querySelectorAll('#gambar_container input[type="url"]');
    inputs.forEach(input => {
        if (input.value === url) {
            input.value = '';
        }
    });
}

// YouTube preview
document.getElementById('youtube_url').addEventListener('blur', function() {
    const url = this.value;
    const previewContainer = document.getElementById('youtube_preview');

    if (!url) {
        previewContainer.innerHTML = '';
        return;
    }

    // Extract YouTube video ID
    let videoId = null;
    const youtubeRegex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
    const match = url.match(youtubeRegex);

    if (match && match[1]) {
        videoId = match[1];
        previewContainer.innerHTML = `
            <div class="youtube-preview">
                <iframe src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>
            </div>
        `;
    } else {
        previewContainer.innerHTML = `
            <div class="youtube-preview">
                <i class="fab fa-youtube fs-2x text-danger mb-3"></i>
                <p class="text-muted">URL YouTube tidak valid</p>
            </div>
        `;
    }
});

// Form validation
document.getElementById('kt_form_wisata').addEventListener('submit', function(e) {
    const images = document.querySelectorAll('input[name="gambar[]"]');
    let hasValidImage = false;

    images.forEach(input => {
        if (input.value.trim()) {
            hasValidImage = true;
        }
    });

    if (!hasValidImage) {
        e.preventDefault();
        toastr.error('Minimal satu gambar harus diisi');
        return false;
    }

    const facilities = document.querySelectorAll('input[name="fasilitas[]"]:checked');
    if (facilities.length === 0) {
        e.preventDefault();
        toastr.error('Pilih minimal satu fasilitas');
        return false;
    }
});

// Load old values for images if any
@if(old('gambar'))
const oldImages = @json(old('gambar'));
oldImages.forEach((url, index) => {
    if (index > 0) {
        addImageInput();
    }
    const inputs = document.querySelectorAll('input[name="gambar[]"]');
    if (inputs[index]) {
        inputs[index].value = url;
        previewImage(inputs[index].nextElementSibling);
    }
});
@endif

// Initial update of remove buttons
updateRemoveButtons();
</script>
@endpush
