<!-- Tahapan Modal -->
<div class="modal fade" id="tahapanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold" id="tahapanModalTitle">Tambah Tahapan Implementasi</h2>
                <div id="tahapanModalClose" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <form id="tahapanForm">
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n5 pe-5" id="tahapanModalScroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#tahapanModalHeader" data-kt-scroll-wrappers="#tahapanModalScroll" data-kt-scroll-offset="5px">
                        <div class="mb-5 fv-row">
                            <label class="required fw-semibold fs-6 mb-2">Nama Tahapan</label>
                            <input type="text" class="form-control form-control-solid" name="nama_tahapan" id="tahapan_nama" placeholder="Masukkan nama tahapan">
                        </div>
                        <div class="mb-5 fv-row">
                            <label class="required fw-semibold fs-6 mb-2">Deskripsi</label>
                            <textarea class="form-control form-control-solid" rows="4" name="deskripsi" id="tahapan_deskripsi" placeholder="Masukkan deskripsi tahapan"></textarea>
                        </div>
                        <div class="mb-5 fv-row">
                            <label class="fw-semibold fs-6 mb-2">Kegiatan</label>
                            <textarea class="form-control form-control-solid" rows="3" name="kegiatan" id="tahapan_kegiatan" placeholder="Masukkan kegiatan yang dilakukan"></textarea>
                        </div>
                        <div class="mb-5 fv-row">
                            <label class="fw-semibold fs-6 mb-2">Waktu</label>
                            <input type="text" class="form-control form-control-solid" name="waktu" id="tahapan_waktu" placeholder="Contoh: 3-6 bulan">
                        </div>
                        <div class="mb-5 fv-row">
                            <label class="fw-semibold fs-6 mb-2">Icon (FontAwesome)</label>
                            <input type="text" class="form-control form-control-solid" name="icon" id="tahapan_icon" placeholder="Contoh: fas fa-clipboard-list">
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="tahapanSubmitBtn">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Mohon tunggu...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
