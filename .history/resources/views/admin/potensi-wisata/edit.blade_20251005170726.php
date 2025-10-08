@extends('layouts.dashboard.app')

@section('title', 'Edit Potensi Wisata')

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
    .current-file {
        background: #f8f9fa;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #e4e6ef;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .current-file .file-info {
        display: flex;
        align-items: center;
    }
    .current-file .file-info i {
        color: #dc3545;
        margin-right: 8px;
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
                    <i class="fas fa-edit text-primary me-2"></i>Edit Potensi Wisata
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
                    <li class="breadcrumb-item text-muted">Edit</li>
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
            <form action="{{ route('admin.potensi-wisata.update', $potensiWisata) }}" method="POST" id="kt_form_wisata" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-7">
                    <div class="col-xl-8">
                        <!--begin::General Card-->
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Informasi Umum</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-7 fv-row">
                                    <label class="required form-label">Nama Wisata</label>
                                    <input type="text" name="nama" class="form-control mb-2" placeholder="Nama wisata..." value="{{ old('nama', $potensiWisata->nama) }}" required />
                                    @error('nama')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-7 fv-row">
                                    <label class="required form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control mb-2" rows="5" placeholder="Deskripsi wisata..." required>{{ old('deskripsi', $potensiWisata->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-7 fv-row">
                                    <label class="required form-label">Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control mb-2" placeholder="Lokasi wisata..." value="{{ old('lokasi', $potensiWisata->lokasi) }}" required />
                                    @error('lokasi')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row">
                                    <div class="col-md-6 mb-7 fv-row">
                                        <label class="required form-label">Kategori Wisata</label>
                                        <select name="kategori_wisata" class="form-select mb-2" required>
                                            <option value="">Pilih Kategori</option>
                                            <option value="pantai" {{ old('kategori_wisata', $potensiWisata->kategori_wisata) == 'pantai' ? 'selected' : '' }}>Pantai</option>
                                            <option value="gunung" {{ old('kategori_wisata', $potensiWisata->kategori_wisata) == 'gunung' ? 'selected' : '' }}>Gunung</option>
                                            <option value="air_terjun" {{ old('kategori_wisata', $potensiWisata->kategori_wisata) == 'air_terjun' ? 'selected' : '' }}>Air Terjun</option>
                                            <option value="sejarah" {{ old('kategori_wisata', $potensiWisata->kategori_wisata) == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
                                            <option value="budaya" {{ old('kategori_wisata', $potensiWisata->kategori_wisata) == 'budaya' ? 'selected' : '' }}>Budaya</option>
                                            <option value="kuliner" {{ old('kategori_wisata', $potensiWisata->kategori_wisata) == 'kuliner' ? 'selected' : '' }}>Kuliner</option>
                                            <option value="religi" {{ old('kategori_wisata', $potensiWisata->kategori_wisata) == 'religi' ? 'selected' : '' }}>Religi</option>
                                            <option value="alam" {{ old('kategori_wisata', $potensiWisata->kategori_wisata) == 'alam' ? 'selected' : '' }}>Alam</option>
                                            <option value="adventure" {{ old('kategori_wisata', $potensiWisata->kategori_wisata) == 'adventure' ? 'selected' : '' }}>Adventure</option>
                                        </select>
                                        @error('kategori_wisata')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-7 fv-row">
                                        <label class="form-label">Urutan Tampil</label>
                                        <input type="number" name="urutan" class="form-control mb-2" placeholder="1" value="{{ old('urutan', $potensiWisata->urutan) }}" min="1" />
                                        @error('urutan')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                        <div class="text-muted fs-7">Urutan tampil di halaman utama</div>
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row">
                                    <div class="col-md-6 mb-7 fv-row">
                                        <label class="required form-label">Jam Operasional</label>
                                        <input type="text" name="jam_operasional" class="form-control mb-2" placeholder="08:00 - 17:00" value="{{ old('jam_operasional', $potensiWisata->jam_operasional) }}" required />
                                        @error('jam_operasional')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-7 fv-row">
                                        <label class="required form-label">Harga Tiket Masuk</label>
                                        <input type="text" name="tiket_masuk" class="form-control mb-2" placeholder="Rp 10.000 / Gratis" value="{{ old('tiket_masuk', $potensiWisata->tiket_masuk) }}" required />
                                        @error('tiket_masuk')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row">
                                    <div class="col-md-4 mb-7 fv-row">
                                        <label class="form-label">Kontak</label>
                                        <input type="text" name="kontak" class="form-control mb-2" placeholder="+62 813-1234-5678" value="{{ old('kontak', $potensiWisata->kontak) }}" />
                                        @error('kontak')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-7 fv-row">
                                        <label class="form-label">Latitude</label>
                                        <input type="number" name="latitude" step="any" class="form-control mb-2" placeholder="-3.123456" value="{{ old('latitude', $potensiWisata->latitude) }}" />
                                        @error('latitude')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-7 fv-row">
                                        <label class="form-label">Longitude</label>
                                        <input type="number" name="longitude" step="any" class="form-control mb-2" placeholder="102.123456" value="{{ old('longitude', $potensiWisata->longitude) }}" />
                                        @error('longitude')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--end::General Card-->

                        <!--begin::Media Card-->
                        <div class="card card-flush py-4 mt-7">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Media & Konten</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-7 fv-row">
                                    <label class="form-label required">Galeri Gambar</label>
                                    <div class="mb-3">
                                        <button type="button" id="add_image" class="btn btn-sm btn-primary">
                                            <i class="fas fa-plus"></i> Tambah Gambar
                                        </button>
                                    </div>

                                    @php
                                        $currentImages = old('gambar', $potensiWisata->gambar ?? []);
                                    @endphp

                                    <div id="image_container">
                                        @foreach($currentImages as $index => $image)
                                            <div class="image-item mb-3">
                                                <input type="url" name="gambar[]" class="form-control mb-2" placeholder="https://images.unsplash.com/photo..." value="{{ is_array($image) ? $image['url'] : $image }}" required />
                                                <button type="button" class="btn btn-sm btn-danger remove-image">Hapus</button>
                                            </div>
                                        @endforeach

                                        @if(empty($currentImages))
                                            <div class="image-item mb-3">
                                                <input type="url" name="gambar[]" class="form-control mb-2" placeholder="https://images.unsplash.com/photo..." required />
                                                <button type="button" class="btn btn-sm btn-danger remove-image">Hapus</button>
                                            </div>
                                        @endif
                                    </div>

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
                                    <input type="url" name="video_youtube" id="youtube_url" class="form-control mb-2" placeholder="https://www.youtube.com/watch?v=..." value="{{ old('video_youtube', $potensiWisata->video_youtube) }}" />
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
                                    <input type="text" name="sumber_video" class="form-control" placeholder="Contoh: YT Aneka Hobi" value="{{ old('sumber_video', $potensiWisata->sumber_video) }}" />
                                    @error('sumber_video')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Nama channel atau sumber video YouTube</div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-7 fv-row">
                                    <label class="form-label">File Potensi Desa (Opsional)</label>

                                    @if($potensiWisata->file_potensi_desa)
                                        <div class="current-file">
                                            <div class="file-info">
                                                <i class="fas fa-file-pdf"></i>
                                                <span>{{ basename($potensiWisata->file_potensi_desa) }}</span>
                                            </div>
                                            <a href="{{ asset($potensiWisata->file_potensi_desa) }}" target="_blank" class="btn btn-sm btn-light">
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>
                                        </div>
                                        <div class="text-muted fs-7 mb-2">File saat ini. Upload file baru untuk mengganti.</div>
                                    @endif

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
                                    <input type="url" name="thumbnail" id="thumbnail_url" class="form-control mb-2" placeholder="https://images.unsplash.com/photo..." value="{{ old('thumbnail', $potensiWisata->thumbnail) }}" />
                                    @error('thumbnail')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Jika kosong, gambar pertama akan digunakan sebagai thumbnail</div>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <!--end::Media Card-->

                        <!--begin::Informasi Dinamis Card-->
                        <div class="card card-flush py-4 mt-7">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Informasi Dinamis</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <!--begin::Aktivitas Wisata-->
                                <div class="mb-7 fv-row">
                                    <label class="form-label">Aktivitas Wisata</label>
                                    <textarea name="aktivitas_wisata" class="form-control mb-2" rows="3" placeholder="Deskripsi aktivitas yang bisa dilakukan wisatawan...">{{ old('aktivitas_wisata', $potensiWisata->aktivitas_wisata) }}</textarea>
                                    @error('aktivitas_wisata')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Jelaskan aktivitas yang bisa dilakukan wisatawan di lokasi ini</div>
                                </div>
                                <!--end::Aktivitas Wisata-->

                                <!--begin::Kontak & Informasi-->
                                <div class="row">
                                    <div class="col-md-4 mb-7 fv-row">
                                        <label class="form-label">Nomor Telepon</label>
                                        <input type="text" name="nomor_telepon" class="form-control mb-2" placeholder="+62 812-3456-7890" value="{{ old('nomor_telepon', $potensiWisata->nomor_telepon) }}" />
                                        @error('nomor_telepon')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-7 fv-row">
                                        <label class="form-label">WhatsApp</label>
                                        <input type="text" name="whatsapp" class="form-control mb-2" placeholder="+62 812-3456-7890" value="{{ old('whatsapp', $potensiWisata->whatsapp) }}" />
                                        @error('whatsapp')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-7 fv-row">
                                        <label class="form-label">Info Guide Lokal</label>
                                        <input type="text" name="info_guide" class="form-control mb-2" placeholder="Tersedia guide berpengalaman..." value="{{ old('info_guide', $potensiWisata->info_guide) }}" />
                                        @error('info_guide')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Kontak & Informasi-->

                                <!--begin::Info Praktis-->
                                <div class="row">
                                    <div class="col-md-3 mb-7 fv-row">
                                        <label class="form-label">Jam Buka</label>
                                        <input type="text" name="jam_buka" class="form-control mb-2" placeholder="24 Jam" value="{{ old('jam_buka', $potensiWisata->jam_buka) }}" />
                                        @error('jam_buka')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-7 fv-row">
                                        <label class="form-label">Harga Tiket</label>
                                        <input type="text" name="harga_tiket" class="form-control mb-2" placeholder="Gratis" value="{{ old('harga_tiket', $potensiWisata->harga_tiket) }}" />
                                        @error('harga_tiket')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-7 fv-row">
                                        <label class="form-label">Fasilitas Parkir</label>
                                        <input type="text" name="fasilitas_parkir" class="form-control mb-2" placeholder="Tersedia" value="{{ old('fasilitas_parkir', $potensiWisata->fasilitas_parkir) }}" />
                                        @error('fasilitas_parkir')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-7 fv-row">
                                        <label class="form-label">Warung Makan</label>
                                        <input type="text" name="warung_makan" class="form-control mb-2" placeholder="Ada di sekitar pantai" value="{{ old('warung_makan', $potensiWisata->warung_makan) }}" />
                                        @error('warung_makan')
                                            <div class="text-danger fs-7">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Info Praktis-->

                                <!--begin::Fitur Unggulan-->
                                <div class="mb-7 fv-row">
                                    <label class="form-label">Fitur Unggulan</label>
                                    <div class="mb-3">
                                        <button type="button" id="add_fitur" class="btn btn-sm btn-primary">
                                            <i class="fas fa-plus"></i> Tambah Fitur
                                        </button>
                                    </div>

                                    @php
                                        $currentFitur = old('fitur_unggulan', $potensiWisata->fitur_unggulan ?? []);
                                    @endphp

                                    <div id="fitur_container">
                                        @foreach($currentFitur as $index => $fitur)
                                            <div class="fitur-item border rounded p-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-3 mb-3">
                                                        <label class="form-label">Ikon</label>
                                                        <select name="fitur_unggulan[{{ $index }}][icon]" class="form-select">
                                                            <option value="fas fa-leaf" {{ ($fitur['icon'] ?? '') == 'fas fa-leaf' ? 'selected' : '' }}>🌿 Alam</option>
                                                            <option value="fas fa-tools" {{ ($fitur['icon'] ?? '') == 'fas fa-tools' ? 'selected' : '' }}>🔧 Fasilitas</option>
                                                            <option value="fas fa-sun" {{ ($fitur['icon'] ?? '') == 'fas fa-sun' ? 'selected' : '' }}>☀️ Sunset</option>
                                                            <option value="fas fa-camera" {{ ($fitur['icon'] ?? '') == 'fas fa-camera' ? 'selected' : '' }}>📷 Foto</option>
                                                            <option value="fas fa-water" {{ ($fitur['icon'] ?? '') == 'fas fa-water' ? 'selected' : '' }}>🌊 Air</option>
                                                            <option value="fas fa-mountain" {{ ($fitur['icon'] ?? '') == 'fas fa-mountain' ? 'selected' : '' }}>⛰️ Gunung</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label class="form-label">Judul</label>
                                                        <input type="text" name="fitur_unggulan[{{ $index }}][judul]" class="form-control" placeholder="Alam Asri" value="{{ $fitur['judul'] ?? '' }}" />
                                                    </div>
                                                    <div class="col-md-5 mb-3">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" name="fitur_unggulan[{{ $index }}][deskripsi]" class="form-control" placeholder="Lingkungan alami yang terjaga..." value="{{ $fitur['deskripsi'] ?? '' }}" />
                                                    </div>
                                                    <div class="col-md-1 mb-3 d-flex align-items-end">
                                                        <button type="button" class="btn btn-sm btn-danger remove-fitur">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        @if(empty($currentFitur))
                                            <div class="fitur-item border rounded p-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-3 mb-3">
                                                        <label class="form-label">Ikon</label>
                                                        <select name="fitur_unggulan[0][icon]" class="form-select">
                                                            <option value="fas fa-leaf">🌿 Alam</option>
                                                            <option value="fas fa-tools">🔧 Fasilitas</option>
                                                            <option value="fas fa-sun">☀️ Sunset</option>
                                                            <option value="fas fa-camera">📷 Foto</option>
                                                            <option value="fas fa-water">🌊 Air</option>
                                                            <option value="fas fa-mountain">⛰️ Gunung</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label class="form-label">Judul</label>
                                                        <input type="text" name="fitur_unggulan[0][judul]" class="form-control" placeholder="Alam Asri" />
                                                    </div>
                                                    <div class="col-md-5 mb-3">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" name="fitur_unggulan[0][deskripsi]" class="form-control" placeholder="Lingkungan alami yang terjaga..." />
                                                    </div>
                                                    <div class="col-md-1 mb-3 d-flex align-items-end">
                                                        <button type="button" class="btn btn-sm btn-danger remove-fitur">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    @error('fitur_unggulan')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                    <div class="text-muted fs-7">Tambahkan fitur-fitur unggulan yang menjadi daya tarik wisata</div>
                                </div>
                                <!--end::Fitur Unggulan-->
                            </div>
                        </div>
                        <!--end::Informasi Dinamis Card-->
                    </div>

                    <div class="col-xl-4">
                        <!--begin::Facilities Card-->
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Fasilitas</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                @php
                                    $facilities = [
                                        'Area Parkir' => 'area_parkir',
                                        'Toilet/WC' => 'toilet',
                                        'Warung Makan' => 'warung_makan',
                                        'Gazebo' => 'gazebo',
                                        'Area Bermain Anak' => 'area_bermain',
                                        'Spot Foto' => 'spot_foto',
                                        'Area Camping' => 'area_camping',
                                        'Penyewaan Alat' => 'penyewaan_alat',
                                        'Musholla' => 'musholla',
                                        'WiFi Gratis' => 'wifi',
                                        'Panggung/Stage' => 'panggung',
                                        'Kolam Renang' => 'kolam_renang'
                                    ];
                                    $currentFacilities = old('fasilitas', $potensiWisata->fasilitas ?? []);
                                @endphp

                                <div class="facility-grid">
                                    @foreach($facilities as $label => $value)
                                        <label class="d-flex align-items-center mb-3">
                                            <input type="checkbox" name="fasilitas[]" value="{{ $value }}" class="form-check-input me-2"
                                                {{ in_array($value, $currentFacilities) ? 'checked' : '' }}>
                                            <span class="form-check-label">{{ $label }}</span>
                                        </label>
                                    @endforeach
                                </div>

                                @error('fasilitas')
                                    <div class="text-danger fs-7 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end::Facilities Card-->

                        <!--begin::Actions Card-->
                        <div class="card card-flush py-4 mt-7">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Actions</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.potensi-wisata.index') }}" class="btn btn-light me-3">Cancel</a>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Update Wisata</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--end::Actions Card-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add new image field
    document.getElementById('add_image').addEventListener('click', function() {
        const container = document.getElementById('image_container');
        const newItem = document.createElement('div');
        newItem.className = 'image-item mb-3';
        newItem.innerHTML = `
            <input type="url" name="gambar[]" class="form-control mb-2" placeholder="https://images.unsplash.com/photo..." required />
            <button type="button" class="btn btn-sm btn-danger remove-image">Hapus</button>
        `;
        container.appendChild(newItem);
    });

    // Remove image field
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-image')) {
            const container = document.getElementById('image_container');
            if (container.children.length > 1) {
                e.target.closest('.image-item').remove();
            } else {
                alert('Minimal satu gambar harus ada!');
            }
        }
    });

    // YouTube preview
    document.getElementById('youtube_url').addEventListener('blur', function() {
        const url = this.value;
        const preview = document.getElementById('youtube_preview');

        if (url) {
            const videoId = extractYouTubeID(url);
            if (videoId) {
                preview.innerHTML = `
                    <div class="youtube-preview">
                        <iframe src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>
                    </div>
                `;
            } else {
                preview.innerHTML = '<div class="alert alert-danger">URL YouTube tidak valid</div>';
            }
        } else {
            preview.innerHTML = '';
        }
    });

    // Extract YouTube video ID from URL
    function extractYouTubeID(url) {
        const regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        const match = url.match(regExp);
        return (match && match[7].length === 11) ? match[7] : false;
    }

    // Trigger YouTube preview on page load if value exists
    if (document.getElementById('youtube_url').value) {
        document.getElementById('youtube_url').dispatchEvent(new Event('blur'));
    }

    // Add new fitur unggulan field
    document.getElementById('add_fitur').addEventListener('click', function() {
        const container = document.getElementById('fitur_container');
        const index = container.children.length;
        const newItem = document.createElement('div');
        newItem.className = 'fitur-item border rounded p-3 mb-3';
        newItem.innerHTML = `
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Ikon</label>
                    <select name="fitur_unggulan[${index}][icon]" class="form-select">
                        <option value="fas fa-leaf">🌿 Alam</option>
                        <option value="fas fa-tools">🔧 Fasilitas</option>
                        <option value="fas fa-sun">☀️ Sunset</option>
                        <option value="fas fa-camera">📷 Foto</option>
                        <option value="fas fa-water">🌊 Air</option>
                        <option value="fas fa-mountain">⛰️ Gunung</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="fitur_unggulan[${index}][judul]" class="form-control" placeholder="Alam Asri" />
                </div>
                <div class="col-md-5 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" name="fitur_unggulan[${index}][deskripsi]" class="form-control" placeholder="Lingkungan alami yang terjaga..." />
                </div>
                <div class="col-md-1 mb-3 d-flex align-items-end">
                    <button type="button" class="btn btn-sm btn-danger remove-fitur">Hapus</button>
                </div>
            </div>
        `;
        container.appendChild(newItem);
    });

    // Remove fitur unggulan field
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-fitur')) {
            const container = document.getElementById('fitur_container');
            if (container.children.length > 0) {
                e.target.closest('.fitur-item').remove();
            }
        }
    });
});
</script>
@endpush
