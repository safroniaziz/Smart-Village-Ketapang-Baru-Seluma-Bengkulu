<!--begin::Modal Add/Edit Potensi Desa-->
<div class="modal fade" id="potensiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 2rem; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.3); background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
            <!-- Enhanced Header with Floating Elements -->
            <div class="modal-header position-relative" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #a855f7 100%); border: none; padding: 3rem 2rem; min-height: 200px;">
                <!-- Floating Particles -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="20" cy="20" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

                <!-- Gradient Overlays -->
                <div class="position-absolute top-0 end-0" style="width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%); transform: translate(50%, -50%);"></div>
                <div class="position-absolute bottom-0 start-0" style="width: 150px; height: 150px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%); transform: translate(-50%, 50%);"></div>

                <!-- Top Accent Line -->
                <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #8b5cf6, #7c3aed, #a855f7, #c084fc);"></div>

                <div class="d-flex align-items-center position-relative" style="z-index: 10;">
                    <div class="symbol symbol-80px me-4">
                        <div class="symbol-label bg-white bg-opacity-25 backdrop-blur-sm" style="border-radius: 1.5rem; border: 2px solid rgba(255,255,255,0.3);">
                            <i class="ki-duotone ki-abstract-41 fs-1 text-white" style="filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div class="text-white">
                        <h1 class="fw-bolder fs-2x mb-2" id="potensiModalTitle" style="text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Tambah Potensi Desa</h1>
                        <p class="fs-5 mb-0" style="opacity: 0.9; text-shadow: 0 1px 2px rgba(0,0,0,0.2);">Kelola data potensi dan kekayaan desa</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 mt-4 me-4" data-bs-dismiss="modal" aria-label="Close" style="z-index: 20; width: 3rem; height: 3rem; background-size: 1.5rem;"></button>
            </div>

            <!-- Enhanced Body with Better Spacing -->
            <div class="modal-body" style="padding: 3rem 2rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                <form id="potensiForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="potensi_id" name="id">
                    <input type="hidden" name="_method" id="potensi_method" value="POST">

                    <!-- Card: Data Utama Potensi -->
                    <div class="card card-flush shadow-sm border-0 mb-6" style="border-radius: 1.5rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                        <div class="card-header bg-transparent border-0" style="padding: 1.5rem 2rem 0.5rem;">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-3">
                                    <div class="symbol-label bg-light-primary">
                                        <i class="ki-duotone ki-abstract-41 fs-2x text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="card-title text-gray-900 fw-bold mb-1">Data Utama Potensi</h4>
                                    <p class="text-muted fs-6 mb-0">Informasi dasar potensi desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-star fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Nama Potensi <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-sm" name="nama_potensi" id="potensi_nama_potensi" required style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-category fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Kategori <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select form-select-lg border-0 shadow-sm" name="kategori" id="potensi_kategori" required style="border-radius: 1rem; background: #ffffff;">
                                            <option value="">Pilih Kategori</option>
                                            <option value="pertanian">Pertanian</option>
                                            <option value="peternakan">Peternakan</option>
                                            <option value="kerajinan">Kerajinan</option>
                                            <option value="wisata">Wisata</option>
                                            <option value="perdagangan">Perdagangan</option>
                                            <option value="industri">Industri</option>
                                            <option value="jasa">Jasa</option>
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-geolocation fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Lokasi
                                        </label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-sm" name="lokasi" id="potensi_lokasi" style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-dollar fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Nilai Ekonomi (Rp)
                                        </label>
                                        <input type="number" class="form-control form-control-lg border-0 shadow-sm" name="nilai_ekonomi" id="potensi_nilai_ekonomi" step="1000" min="0" style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-abstract-35 fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Jumlah Unit
                                        </label>
                                        <input type="number" class="form-control form-control-lg border-0 shadow-sm" name="jumlah_unit" id="potensi_jumlah_unit" min="0" style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-abstract-27 fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Satuan
                                        </label>
                                        <input type="text" class="form-control form-control-lg border-0 shadow-sm" name="satuan" id="potensi_satuan" placeholder="Contoh: hektar, ekor, unit, dll" style="border-radius: 1rem; background: #ffffff;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-profile-user fs-5 text-primary me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Pengelola
                                        </label>
                                        <select class="form-select form-select-lg border-0 shadow-sm" name="pengelola" id="potensi_pengelola" style="border-radius: 1rem; background: #ffffff;">
                                            <option value="">Pilih Pengelola</option>
                                            <option value="individu">Individu</option>
                                            <option value="kelompok">Kelompok</option>
                                            <option value="koperasi">Koperasi</option>
                                            <option value="desa">Desa</option>
                                            <option value="swasta">Swasta</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Foto Potensi -->
                    <div class="card card-flush shadow-sm border-0 mb-6" style="border-radius: 1.5rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                        <div class="card-header bg-transparent border-0" style="padding: 1.5rem 2rem 0.5rem;">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-3">
                                    <div class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-camera fs-2x text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="card-title text-gray-900 fw-bold mb-1">Foto Potensi</h4>
                                    <p class="text-muted fs-6 mb-0">Upload foto untuk dokumentasi potensi desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-camera fs-5 text-warning me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Upload Foto
                                        </label>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <input type="file" class="form-control form-control-lg border-0 shadow-sm" name="foto" id="potensi_foto" accept="image/*" onchange="previewPotensiPhoto(this)" style="border-radius: 1rem; background: #ffffff;">
                                            </div>
                                            <div class="ms-4">
                                                <div id="potensi_photo_preview" class="symbol symbol-120px" style="display: none; border-radius: 1rem; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.15);">
                                                    <img id="potensi_preview_img" src="" alt="Preview" class="symbol-label" style="object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-text mt-2">
                                            <i class="ki-duotone ki-information-2 fs-6 text-muted me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Format: JPG, PNG, JPEG. Maksimal 2MB
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Status dan Informasi Tambahan -->
                    <div class="card card-flush shadow-sm border-0 mb-6" style="border-radius: 1.5rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                        <div class="card-header bg-transparent border-0" style="padding: 1.5rem 2rem 0.5rem;">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-3">
                                    <div class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-setting-2 fs-2x text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="card-title text-gray-900 fw-bold mb-1">Status dan Informasi Tambahan</h4>
                                    <p class="text-muted fs-6 mb-0">Status pengembangan dan deskripsi potensi</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-check-circle fs-5 text-success me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Status
                                        </label>
                                        <select class="form-select form-select-lg border-0 shadow-sm" name="status" id="potensi_status" style="border-radius: 1rem; background: #ffffff;">
                                            <option value="">Pilih Status</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="berkembang">Berkembang</option>
                                            <option value="menurun">Menurun</option>
                                            <option value="tidak_aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-crown fs-5 text-success me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Unggulan
                                        </label>
                                        <select class="form-select form-select-lg border-0 shadow-sm" name="is_unggulan" id="potensi_is_unggulan" style="border-radius: 1rem; background: #ffffff;">
                                            <option value="0" selected>Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-note fs-5 text-success me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Deskripsi
                                        </label>
                                        <textarea class="form-control form-control-lg border-0 shadow-sm" name="deskripsi" id="potensi_deskripsi" rows="4" placeholder="Masukkan deskripsi potensi desa..." style="border-radius: 1rem; background: #ffffff;"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-trending-up fs-5 text-success me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Peluang Pengembangan
                                        </label>
                                        <textarea class="form-control form-control-lg border-0 shadow-sm" name="peluang_pengembangan" id="potensi_peluang_pengembangan" rows="3" placeholder="Jelaskan peluang pengembangan potensi ini..." style="border-radius: 1rem; background: #ffffff;"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label fw-bold text-gray-900 mb-3">
                                            <i class="ki-duotone ki-warning fs-5 text-success me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            Kendala
                                        </label>
                                        <textarea class="form-control form-control-lg border-0 shadow-sm" name="kendala" id="potensi_kendala" rows="3" placeholder="Jelaskan kendala yang dihadapi..." style="border-radius: 1rem; background: #ffffff;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Enhanced Footer -->
            <div class="modal-footer position-relative" style="background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%); border: none; padding: 2.5rem; border-top: 1px solid rgba(0,0,0,0.05);">
                <div class="d-flex justify-content-end align-items-center w-100">
                    <button type="button" class="btn btn-light-dark btn-lg me-4" data-bs-dismiss="modal" style="border-radius: 1rem; padding: 1rem 2rem; font-weight: 600;">
                        <i class="ki-duotone ki-cross fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Batal
                    </button>
                    <button type="button" class="btn btn-primary btn-lg" onclick="savePotensi()" data-kt-indicator="off" style="border-radius: 1rem; padding: 1rem 2rem; font-weight: 600; background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); border: none; box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);">
                        <span class="indicator-label">
                            <i class="ki-duotone ki-check fs-2 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Simpan Data
                        </span>
                        <span class="indicator-progress">
                            <span class="spinner-border spinner-border-sm align-middle me-2"></span>
                            Menyimpan...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Add/Edit Potensi Desa-->
