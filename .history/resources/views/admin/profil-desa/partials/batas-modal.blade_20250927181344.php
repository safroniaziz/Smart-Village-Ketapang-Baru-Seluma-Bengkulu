<!--begin::Modal Edit Batas Wilayah-->
<div class="modal fade" id="batasModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.2);">
            <div class="modal-header" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border: none; padding: 2rem;">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-50px me-4">
                        <div class="symbol-label bg-white bg-opacity-20">
                            <i class="ki-duotone ki-abstract-41 fs-2x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-white fw-bold fs-2 mb-1" id="batasModalLabel">Edit Batas Wilayah</h2>
                        <p class="text-white fs-6 mb-0" style="opacity: 0.8;">Kelola data batas wilayah desa</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-6">
                <form id="batasForm">
                    @csrf
                    <input type="hidden" id="batas_id" name="id">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Arah <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="arah" id="batas_arah" required>
                                <option value="">Pilih Arah</option>
                                <option value="utara">Utara</option>
                                <option value="selatan">Selatan</option>
                                <option value="timur">Timur</option>
                                <option value="barat">Barat</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Berbatasan Dengan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="berbatasan_dengan" id="batas_berbatasan_dengan" required placeholder="Nama desa/kelurahan yang berbatasan...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jenis Wilayah <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="jenis_wilayah" id="batas_jenis_wilayah" required>
                                <option value="">Pilih Jenis Wilayah</option>
                                <option value="desa">Desa</option>
                                <option value="kelurahan">Kelurahan</option>
                                <option value="kecamatan">Kecamatan</option>
                                <option value="kabupaten">Kabupaten</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jarak (km)</label>
                            <input type="number" class="form-control form-control-lg" name="jarak_km" id="batas_jarak_km" step="0.01" min="0" placeholder="Jarak dalam kilometer...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Koordinat GPS</label>
                            <input type="text" class="form-control form-control-lg" name="koordinat" id="batas_koordinat" placeholder="Contoh: -4.321303, 102.765089">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Status Aktif</label>
                            <select class="form-select form-select-lg" name="is_active" id="batas_is_active">
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Landmark</label>
                            <textarea class="form-control form-control-lg" name="landmark" id="batas_landmark" rows="3" placeholder="Patokan geografis seperti sungai, gunung, jalan, dll..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Keterangan</label>
                            <textarea class="form-control form-control-lg" name="keterangan" id="batas_keterangan" rows="3" placeholder="Keterangan tambahan..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background: #f8f9fa; border: none; padding: 2rem;">
                <button type="button" class="btn btn-light btn-lg me-3" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-4 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Batal
                </button>
                <button type="button" class="btn btn-success btn-lg" onclick="saveBatas()" data-kt-indicator="off">
                    <span class="indicator-label">
                        <i class="ki-duotone ki-check fs-4 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Simpan
                    </span>
                    <span class="indicator-progress">Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Edit Batas Wilayah-->
