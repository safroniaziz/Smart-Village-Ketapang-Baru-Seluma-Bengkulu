<!--begin::Modal Edit Monografi Desa-->
<div class="modal fade" id="monografiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 2rem; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.3); background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
            <!-- Enhanced Header with Floating Elements -->
            <div class="modal-header position-relative" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 50%, #2563eb 100%); border: none; padding: 3rem 2rem; min-height: 200px;">
                <!-- Floating Particles -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="20" cy="20" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

                <!-- Gradient Overlays -->
                <div class="position-absolute top-0 end-0" style="width: 200px; height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%); transform: translate(50%, -50%);"></div>
                <div class="position-absolute bottom-0 start-0" style="width: 150px; height: 150px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%); transform: translate(-50%, 50%);"></div>

                <!-- Top Accent Line -->
                <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #3b82f6, #2563eb, #60a5fa, #93c5fd);"></div>

                <div class="d-flex align-items-center position-relative" style="z-index: 10;">
                    <div class="symbol symbol-80px me-4">
                        <div class="symbol-label bg-white bg-opacity-25 backdrop-blur-sm" style="border-radius: 1.5rem; border: 2px solid rgba(255,255,255,0.3);">
                            <i class="ki-duotone ki-profile-user fs-1 text-white" style="filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-white fw-bold fs-1 mb-2" style="text-shadow: 0 4px 12px rgba(0,0,0,0.3);">Edit Monografi Desa</h2>
                        <p class="text-white fs-5 mb-0" style="opacity: 0.9; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">Profil lengkap dan identitas desa</p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="bg-white bg-opacity-20 rounded-pill px-3 py-1 me-3">
                                <i class="ki-duotone ki-verify fs-6 text-white me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span class="text-white fw-semibold fs-7">Data Resmi</span>
                            </div>
                            <div class="bg-white bg-opacity-20 rounded-pill px-3 py-1">
                                <i class="ki-duotone ki-shield-tick fs-6 text-white me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <span class="text-white fw-semibold fs-7">Tervalidasi</span>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute" data-bs-dismiss="modal" aria-label="Close" style="top: 2rem; right: 2rem; z-index: 20; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));"></button>
            </div>
            <!-- Enhanced Body with Better Spacing -->
            <div class="modal-body" style="padding: 3rem 2rem; background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);">
                <form id="monografiForm">
                    @csrf
                    <input type="hidden" id="monografi_id" name="id">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Desa <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="nama_desa" id="nama_desa" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kecamatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="kecamatan" id="kecamatan" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kabupaten <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="kabupaten" id="kabupaten" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Provinsi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="provinsi" id="provinsi" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kode Pos</label>
                            <input type="text" class="form-control form-control-lg" name="kode_pos" id="kode_pos" pattern="[0-9]{5}" maxlength="5">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kode Area</label>
                            <input type="text" class="form-control form-control-lg" name="kode_area" id="kode_area">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Status Desa <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="status_desa" id="status_desa" required>
                                <option value="">Pilih Status</option>
                                <option value="Swadaya">Swadaya</option>
                                <option value="Swakarya">Swakarya</option>
                                <option value="Swasembada">Swasembada</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tahun Berdiri</label>
                            <input type="number" class="form-control form-control-lg" name="tahun_berdiri" id="tahun_berdiri" min="1800" max="{{ date('Y') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Luas Wilayah (km²)</label>
                            <input type="number" class="form-control form-control-lg" name="luas_wilayah" id="luas_wilayah" step="0.01" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Ketinggian (mdpl)</label>
                            <input type="number" class="form-control form-control-lg" name="ketinggian_mdpl" id="ketinggian_mdpl" min="0">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Sejarah Desa</label>
                            <textarea class="form-control form-control-lg" name="sejarah" id="sejarah" rows="4" placeholder="Ceritakan sejarah singkat desa..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Visi Desa</label>
                            <textarea class="form-control form-control-lg" name="visi" id="visi" rows="3" placeholder="Visi desa untuk masa depan..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Misi Desa</label>
                            <textarea class="form-control form-control-lg" name="misi" id="misi" rows="4" placeholder="Misi dan program desa..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background: #f8f9fa; border: none; padding: 2rem;">
                <button type="button" class="btn btn-light btn-lg me-3" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary btn-lg" onclick="saveMonografi()" data-kt-indicator="off">
                    <span class="indicator-label">Simpan</span>
                    <span class="indicator-progress">Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Edit Monografi Desa-->