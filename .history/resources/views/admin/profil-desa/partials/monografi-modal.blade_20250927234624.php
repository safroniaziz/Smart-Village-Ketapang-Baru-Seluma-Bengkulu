<!--begin::Modal Edit Monografi Desa-->
<div class="modal fade" id="monografiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.2);">
            <div class="modal-header" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); border: none; padding: 2rem;">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-50px me-4">
                        <div class="symbol-label bg-white bg-opacity-20">
                            <i class="ki-duotone ki-profile-user fs-2x text-white">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-white fw-bold fs-2 mb-1">Edit Monografi Desa</h2>
                        <p class="text-white fs-6 mb-0" style="opacity: 0.8;">Kelola data monografi desa</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-6">
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