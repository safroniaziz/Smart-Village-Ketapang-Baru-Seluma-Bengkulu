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
                        <h2 class="text-white fw-bold fs-2 mb-1">Edit Batas Wilayah</h2>
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
                            <label class="form-label fw-bold">Utara <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="utara" id="batas_utara" required placeholder="Batas sebelah utara...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Selatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="selatan" id="batas_selatan" required placeholder="Batas sebelah selatan...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Timur <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="timur" id="batas_timur" required placeholder="Batas sebelah timur...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Barat <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="barat" id="batas_barat" required placeholder="Batas sebelah barat...">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <textarea class="form-control form-control-lg" name="deskripsi" id="batas_deskripsi" rows="3" placeholder="Masukkan deskripsi batas wilayah..."></textarea>
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
