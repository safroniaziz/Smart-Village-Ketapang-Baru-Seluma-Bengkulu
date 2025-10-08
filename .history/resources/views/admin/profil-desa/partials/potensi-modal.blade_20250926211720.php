<!--begin::Modal Add/Edit Potensi Desa-->
<div class="modal fade" id="potensiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.2);">
            <div class="modal-header" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); border: none; padding: 2rem;">
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
                        <h2 class="text-white fw-bold fs-2 mb-1" id="potensiModalTitle">Tambah Potensi Desa</h2>
                        <p class="text-white fs-6 mb-0" style="opacity: 0.8;">Kelola data potensi desa</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-6">
                <form id="potensiForm">
                    @csrf
                    <input type="hidden" id="potensi_id" name="id">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Potensi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" name="nama_potensi" id="potensi_nama_potensi" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="kategori" id="potensi_kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Alam">Alam</option>
                                <option value="Budaya">Budaya</option>
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="Sosial">Sosial</option>
                                <option value="Wisata">Wisata</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Lokasi</label>
                            <input type="text" class="form-control form-control-lg" name="lokasi" id="potensi_lokasi">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nilai Ekonomi (Rp)</label>
                            <input type="number" class="form-control form-control-lg" name="nilai_ekonomi" id="potensi_nilai_ekonomi" step="1000" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Status</label>
                            <select class="form-select form-select-lg" name="status" id="potensi_status">
                                <option value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                                <option value="Dalam Pengembangan">Dalam Pengembangan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Unggulan</label>
                            <select class="form-select form-select-lg" name="is_unggulan" id="potensi_is_unggulan">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <textarea class="form-control form-control-lg" name="deskripsi" id="potensi_deskripsi" rows="3" placeholder="Masukkan deskripsi potensi desa..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background: #f8f9fa; border: none; padding: 2rem;">
                <button type="button" class="btn btn-light btn-lg me-3" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary btn-lg" onclick="savePotensi()" data-kt-indicator="off">
                    <span class="indicator-label">Simpan</span>
                    <span class="indicator-progress">Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Add/Edit Potensi Desa-->
