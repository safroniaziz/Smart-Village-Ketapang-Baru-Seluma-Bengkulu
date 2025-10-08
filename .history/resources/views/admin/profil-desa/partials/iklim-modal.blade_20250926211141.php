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
                            <label class="form-label fw-bold">Bulan <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="bulan" id="iklim_bulan" required>
                                <option value="">Pilih Bulan</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tahun <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-lg" name="tahun" id="iklim_tahun" min="2000" max="2030" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Curah Hujan (mm)</label>
                            <input type="number" class="form-control form-control-lg" name="curah_hujan" id="iklim_curah_hujan" step="0.01" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Suhu Rata-rata (°C)</label>
                            <input type="number" class="form-control form-control-lg" name="suhu_rata_rata" id="iklim_suhu_rata_rata" step="0.1" min="0" max="50">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kelembaban (%)</label>
                            <input type="number" class="form-control form-control-lg" name="kelembaban" id="iklim_kelembaban" step="0.1" min="0" max="100">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kecepatan Angin (km/jam)</label>
                            <input type="number" class="form-control form-control-lg" name="kecepatan_angin" id="iklim_kecepatan_angin" step="0.1" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Arah Angin</label>
                            <select class="form-select form-select-lg" name="arah_angin" id="iklim_arah_angin">
                                <option value="">Pilih Arah Angin</option>
                                <option value="Utara">Utara</option>
                                <option value="Timur Laut">Timur Laut</option>
                                <option value="Timur">Timur</option>
                                <option value="Tenggara">Tenggara</option>
                                <option value="Selatan">Selatan</option>
                                <option value="Barat Daya">Barat Daya</option>
                                <option value="Barat">Barat</option>
                                <option value="Barat Laut">Barat Laut</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Musim</label>
                            <select class="form-select form-select-lg" name="musim" id="iklim_musim">
                                <option value="">Pilih Musim</option>
                                <option value="Hujan">Hujan</option>
                                <option value="Kemarau">Kemarau</option>
                                <option value="Pancaroba">Pancaroba</option>
                            </select>
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
