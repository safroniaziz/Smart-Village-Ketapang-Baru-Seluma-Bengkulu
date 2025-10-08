<!--begin::Modal Add/Edit Iklim Desa-->
<div class="modal fade" id="iklimModal" tabindex="-1" aria-hidden="true">
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
                        <h2 class="text-white fw-bold fs-2 mb-1" id="iklimModalTitle">Tambah Data Iklim</h2>
                        <p class="text-white fs-6 mb-0" style="opacity: 0.8;">Kelola data iklim desa</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-6">
                <form id="iklimForm">
                    @csrf
                    <input type="hidden" id="iklim_id" name="id">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jenis Iklim <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="jenis_iklim" id="jenis_iklim" required>
                                <option value="">Pilih Jenis Iklim</option>
                                <option value="Tropis">Tropis</option>
                                <option value="Tropis Pesisir">Tropis Pesisir</option>
                                <option value="Tropis Basah">Tropis Basah</option>
                                <option value="Tropis Kering">Tropis Kering</option>
                                <option value="Subtropis">Subtropis</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Suhu Minimum (°C)</label>
                            <input type="number" class="form-control form-control-lg" name="suhu_min" id="suhu_min" step="0.1" min="0" max="50">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Suhu Maksimum (°C)</label>
                            <input type="number" class="form-control form-control-lg" name="suhu_max" id="suhu_max" step="0.1" min="0" max="50">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kelembaban Rata-rata (%)</label>
                            <input type="number" class="form-control form-control-lg" name="kelembaban_rata" id="kelembaban_rata" step="0.1" min="0" max="100">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Curah Hujan Tahunan (mm)</label>
                            <input type="number" class="form-control form-control-lg" name="curah_hujan_tahunan" id="curah_hujan_tahunan" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Hari Hujan per Tahun</label>
                            <input type="number" class="form-control form-control-lg" name="hari_hujan_pertahun" id="hari_hujan_pertahun" min="0" max="365">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Musim Kering</label>
                            <input type="text" class="form-control form-control-lg" name="musim_kering" id="musim_kering" placeholder="Contoh: Juni - Agustus">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Musim Hujan</label>
                            <input type="text" class="form-control form-control-lg" name="musim_hujan" id="musim_hujan" placeholder="Contoh: November - Maret">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Angin Dominan</label>
                            <input type="text" class="form-control form-control-lg" name="angin_dominan" id="angin_dominan" placeholder="Contoh: Angin Laut (Barat-Barat Daya)">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Karakteristik Iklim</label>
                            <textarea class="form-control form-control-lg" name="karakteristik_iklim" id="karakteristik_iklim" rows="4" placeholder="Deskripsi karakteristik iklim desa secara umum..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="background: #f8f9fa; border: none; padding: 2rem;">
                <button type="button" class="btn btn-light btn-lg me-3" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success btn-lg" onclick="saveIklim()" data-kt-indicator="off">
                    <span class="indicator-label">Simpan</span>
                    <span class="indicator-progress">Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Add/Edit Iklim Desa-->
