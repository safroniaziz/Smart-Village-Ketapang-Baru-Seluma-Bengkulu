<!--begin::Modal Edit Batas Wilayah-->
<div class="modal fade" id="batasModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 2rem; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.3); background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
            <!-- Enhanced Header with Floating Elements -->
            <div class="modal-header position-relative" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #f97316 100%); border: none; padding: 3rem 2rem; min-height: 200px;">
                <!-- Floating Particles -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="20" cy="20" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

                <!-- Gradient Overlays -->
                <div class="position-absolute top-0 end-0" style="width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%); transform: translate(50%, -50%);"></div>
                <div class="position-absolute bottom-0 start-0" style="width: 150px; height: 150px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%); transform: translate(-50%, 50%);"></div>

                <!-- Top Accent Line -->
                <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #f59e0b, #f97316, #fb923c, #fdba74);"></div>

                <div class="d-flex align-items-center position-relative" style="z-index: 10;">
                    <div class="symbol symbol-80px me-4">
                        <div class="symbol-label bg-white bg-opacity-25 backdrop-blur-sm" style="border-radius: 1.5rem; border: 2px solid rgba(255,255,255,0.3);">
                            <i class="ki-duotone ki-geolocation fs-1 text-white" style="filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-white fw-bold fs-1 mb-2" id="batasModalLabel" style="text-shadow: 0 4px 12px rgba(0,0,0,0.3);">Edit Batas Wilayah</h2>
                        <p class="text-white fs-5 mb-0" style="opacity: 0.9; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">Kelola data batas wilayah desa dengan presisi</p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="bg-white bg-opacity-20 rounded-pill px-3 py-1 me-3">
                                <i class="ki-duotone ki-verify fs-6 text-white me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span class="text-white fw-semibold fs-7">GPS Akurat</span>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-pill px-3 py-1">
                                <i class="ki-duotone ki-shield-tick fs-6 text-white me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span class="text-white fw-semibold fs-7">Koordinat Valid</span>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 2rem; right: 2rem; z-index: 20; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));"></button>
            </div>
            <!-- Enhanced Body with Better Spacing -->
            <div class="modal-body" style="padding: 3rem 2rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
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
                            <select class="form-select form-select-lg" name="jenis_wilayah" id="batas_jenis_wilayah">
                                <option value="">Pilih Jenis Wilayah</option>
                                <option value="desa">Desa</option>
                                <option value="kelurahan">Kelurahan</option>
                                <option value="kecamatan">Kecamatan</option>
                                <option value="kabupaten">Kabupaten</option>
                                <option value="laut">Laut</option>
                                <option value="hutan">Hutan</option>
                                <option value="sungai">Sungai</option>
                                <option value="gunung">Gunung</option>
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
            <!-- Enhanced Footer with Gradient Background -->
            <div class="modal-footer" style="background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%); border: none; padding: 2.5rem; border-top: 1px solid rgba(0,0,0,0.05);">
                <div class="d-flex justify-content-end w-100">
                    <button type="button" class="btn btn-light btn-lg me-4 px-6" data-bs-dismiss="modal" style="border: 2px solid #e5e7eb; font-weight: 600;">
                        <i class="ki-duotone ki-cross fs-3 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Batal
                    </button>
                    <button type="button" class="btn btn-lg px-6" onclick="saveBatas()" data-kt-indicator="off" 
                            style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border: none; color: white; font-weight: 600; box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);">
                        <span class="indicator-label">
                            <i class="ki-duotone ki-check fs-3 me-2">
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
</div>
<!--end::Modal Edit Batas Wilayah-->
