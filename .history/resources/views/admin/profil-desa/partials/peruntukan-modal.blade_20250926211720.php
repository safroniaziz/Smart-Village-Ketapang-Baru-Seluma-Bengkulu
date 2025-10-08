<!--begin::Modal Add/Edit Peruntukan Lahan-->
<div class="modal fade" id="peruntukanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.2);">
            <div class="modal-header" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border: none; padding: 2rem;">
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
                        <h2 class="text-white fw-bold fs-2 mb-1" id="peruntukanModalTitle">Tambah Peruntukan Lahan</h2>
                        <p class="text-white fs-6 mb-0" style="opacity: 0.8;">Kelola data peruntukan lahan desa</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-6">
                <form id="peruntukanForm">
                    @csrf
                    <input type="hidden" id="peruntukan_id" name="id">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kategori Lahan <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="kategori_lahan" id="peruntukan_kategori_lahan" required>
                                <option value="">Pilih Kategori Lahan</option>
                                <option value="Perumahan">Perumahan</option>
                                <option value="Pertanian">Pertanian</option>
                                <option value="Perkebunan">Perkebunan</option>
                                <option value="Hutan">Hutan</option>
                                <option value="Tambang">Tambang</option>
                                <option value="Industri">Industri</option>
                                <option value="Komersial">Komersial</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Luas (hektar) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-lg" name="luas" id="peruntukan_luas" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Persentase (%)</label>
                            <input type="number" class="form-control form-control-lg" name="persentase" id="peruntukan_persentase" step="0.01" min="0" max="100">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Status Kepemilikan</label>
                            <select class="form-select form-select-lg" name="status_kepemilikan" id="peruntukan_status_kepemilikan">
                                <option value="">Pilih Status Kepemilikan</option>
                                <option value="Pemerintah">Pemerintah</option>
                                <option value="Swasta">Swasta</option>
                                <option value="Masyarakat">Masyarakat</option>
                                <option value="Campuran">Campuran</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <textarea class="form-control form-control-lg" name="deskripsi" id="peruntukan_deskripsi" rows="3" placeholder="Masukkan deskripsi peruntukan lahan..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background: #f8f9fa; border: none; padding: 2rem;">
                <button type="button" class="btn btn-light btn-lg me-3" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-warning btn-lg" onclick="savePeruntukan()" data-kt-indicator="off">
                    <span class="indicator-label">Simpan</span>
                    <span class="indicator-progress">Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Add/Edit Peruntukan Lahan-->
