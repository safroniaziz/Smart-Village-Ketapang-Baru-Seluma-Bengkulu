<!-- Misi Modal -->
<div class="modal fade" id="misiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold" id="misiModalTitle">Tambah Misi Desa</h2>
                <div id="misiModalClose" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <form id="misiForm">
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n5 pe-5" id="misiModalScroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#misiModalHeader" data-kt-scroll-wrappers="#misiModalScroll" data-kt-scroll-offset="5px">
                        <div class="mb-5 fv-row">
                            <label class="required fw-semibold fs-6 mb-2">Judul Misi</label>
                            <input type="text" class="form-control form-control-solid" name="judul" id="misi_judul" placeholder="Masukkan judul misi">
                        </div>
                        <div class="mb-5 fv-row">
                            <label class="required fw-semibold fs-6 mb-2">Deskripsi</label>
                            <textarea class="form-control form-control-solid" rows="4" name="deskripsi" id="misi_deskripsi" placeholder="Masukkan deskripsi misi"></textarea>
                        </div>
                        <div class="mb-5 fv-row">
                            <label class="fw-semibold fs-6 mb-2">Indikator</label>
                            <textarea class="form-control form-control-solid" rows="3" name="indikator" id="misi_indikator" placeholder="Masukkan indikator keberhasilan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="misiSubmitBtn">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Mohon tunggu...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
