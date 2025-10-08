<!-- Pendekatan Modal -->
<div class="modal fade" id="pendekatanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold" id="pendekatanModalTitle">Tambah Pendekatan Partisipatif</h2>
                <div id="pendekatanModalClose" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <form id="pendekatanForm">
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n5 pe-5" id="pendekatanModalScroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#pendekatanModalHeader" data-kt-scroll-wrappers="#pendekatanModalScroll" data-kt-scroll-offset="5px">
                        <div class="mb-5 fv-row">
                            <label class="required fw-semibold fs-6 mb-2">Nama Pendekatan</label>
                            <input type="text" class="form-control form-control-solid" name="nama_pendekatan" id="pendekatan_nama" placeholder="Masukkan nama pendekatan">
                        </div>
                        <div class="mb-5 fv-row">
                            <label class="required fw-semibold fs-6 mb-2">Deskripsi</label>
                            <textarea class="form-control form-control-solid" rows="4" name="deskripsi" id="pendekatan_deskripsi" placeholder="Masukkan deskripsi pendekatan"></textarea>
                        </div>
                        <div class="mb-5 fv-row">
                            <label class="fw-semibold fs-6 mb-2">Strategi</label>
                            <textarea class="form-control form-control-solid" rows="3" name="strategi" id="pendekatan_strategi" placeholder="Masukkan strategi implementasi"></textarea>
                        </div>
                        <div class="mb-5 fv-row">
                            <label class="fw-semibold fs-6 mb-2">Icon (FontAwesome)</label>
                            <input type="text" class="form-control form-control-solid" name="icon" id="pendekatan_icon" placeholder="Contoh: fas fa-users">
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="pendekatanSubmitBtn">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Mohon tunggu...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
