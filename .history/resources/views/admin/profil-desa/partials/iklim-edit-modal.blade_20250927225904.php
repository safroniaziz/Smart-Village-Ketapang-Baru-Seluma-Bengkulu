<!--begin::Modal Edit Iklim Desa-->
<div class="modal fade" id="iklimEditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
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
                        <h2 class="text-white fw-bold fs-2 mb-1">Edit Data Iklim Desa</h2>
                        <p class="text-white fs-6 mb-0" style="opacity: 0.8;">Kelola data iklim desa per bulan</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-6">
                <form id="iklimEditForm">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jenis Iklim <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" name="jenis_iklim" id="edit_jenis_iklim" required>
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
                            <input type="number" class="form-control form-control-lg" name="suhu_min" id="edit_suhu_min" step="0.1" min="0" max="50">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Suhu Maksimum (°C)</label>
                            <input type="number" class="form-control form-control-lg" name="suhu_max" id="edit_suhu_max" step="0.1" min="0" max="50">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kelembaban Rata-rata (%)</label>
                            <input type="number" class="form-control form-control-lg" name="kelembaban_rata" id="edit_kelembaban_rata" step="0.1" min="0" max="100">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Curah Hujan Tahunan (mm)</label>
                            <input type="number" class="form-control form-control-lg" name="curah_hujan_tahunan" id="edit_curah_hujan_tahunan" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Hari Hujan per Tahun</label>
                            <input type="number" class="form-control form-control-lg" name="hari_hujan_pertahun" id="edit_hari_hujan_pertahun" min="0" max="365">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Musim Kering</label>
                            <input type="text" class="form-control form-control-lg" name="musim_kering" id="edit_musim_kering" placeholder="Contoh: Juni - Agustus">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Musim Hujan</label>
                            <input type="text" class="form-control form-control-lg" name="musim_hujan" id="edit_musim_hujan" placeholder="Contoh: November - Maret">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Angin Dominan</label>
                            <select class="form-select form-select-lg" name="angin_dominan" id="edit_angin_dominan">
                                <option value="">Pilih Arah Angin Dominan</option>
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
                        <div class="col-12">
                            <label class="form-label fw-bold">Karakteristik Iklim</label>
                            <textarea class="form-control form-control-lg" name="karakteristik_iklim" id="edit_karakteristik_iklim" rows="4" placeholder="Deskripsi karakteristik iklim desa secara umum..."></textarea>
                        </div>
                    </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Curah Hujan (mm)</label>
                                        <input type="number" class="form-control" name="april_curah_hujan" step="0.01" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Suhu (Celsius)</label>
                                        <input type="number" class="form-control" name="april_suhu" step="0.1" min="0" max="50">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Kelembaban (%)</label>
                                        <input type="number" class="form-control" name="april_kelembaban" step="0.1" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mei -->
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-header bg-light-info">
                                    <h5 class="card-title text-info fw-bold mb-0">Mei</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Curah Hujan (mm)</label>
                                        <input type="number" class="form-control" name="mei_curah_hujan" step="0.01" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Suhu (Celsius)</label>
                                        <input type="number" class="form-control" name="mei_suhu" step="0.1" min="0" max="50">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Kelembaban (%)</label>
                                        <input type="number" class="form-control" name="mei_kelembaban" step="0.1" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Juni -->
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-header bg-light-dark">
                                    <h5 class="card-title text-dark fw-bold mb-0">Juni</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Curah Hujan (mm)</label>
                                        <input type="number" class="form-control" name="juni_curah_hujan" step="0.01" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Suhu (Celsius)</label>
                                        <input type="number" class="form-control" name="juni_suhu" step="0.1" min="0" max="50">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Kelembaban (%)</label>
                                        <input type="number" class="form-control" name="juni_kelembaban" step="0.1" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Juli -->
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-header bg-light-primary">
                                    <h5 class="card-title text-primary fw-bold mb-0">Juli</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Curah Hujan (mm)</label>
                                        <input type="number" class="form-control" name="juli_curah_hujan" step="0.01" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Suhu (Celsius)</label>
                                        <input type="number" class="form-control" name="juli_suhu" step="0.1" min="0" max="50">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Kelembaban (%)</label>
                                        <input type="number" class="form-control" name="juli_kelembaban" step="0.1" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Agustus -->
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-header bg-light-danger">
                                    <h5 class="card-title text-danger fw-bold mb-0">Agustus</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Curah Hujan (mm)</label>
                                        <input type="number" class="form-control" name="agustus_curah_hujan" step="0.01" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Suhu (Celsius)</label>
                                        <input type="number" class="form-control" name="agustus_suhu" step="0.1" min="0" max="50">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Kelembaban (%)</label>
                                        <input type="number" class="form-control" name="agustus_kelembaban" step="0.1" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- September -->
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-header bg-light-success">
                                    <h5 class="card-title text-success fw-bold mb-0">September</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Curah Hujan (mm)</label>
                                        <input type="number" class="form-control" name="september_curah_hujan" step="0.01" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Suhu (Celsius)</label>
                                        <input type="number" class="form-control" name="september_suhu" step="0.1" min="0" max="50">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Kelembaban (%)</label>
                                        <input type="number" class="form-control" name="september_kelembaban" step="0.1" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Oktober -->
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-header bg-light-warning">
                                    <h5 class="card-title text-warning fw-bold mb-0">Oktober</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Curah Hujan (mm)</label>
                                        <input type="number" class="form-control" name="oktober_curah_hujan" step="0.01" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Suhu (Celsius)</label>
                                        <input type="number" class="form-control" name="oktober_suhu" step="0.1" min="0" max="50">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Kelembaban (%)</label>
                                        <input type="number" class="form-control" name="oktober_kelembaban" step="0.1" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- November -->
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-header bg-light-info">
                                    <h5 class="card-title text-info fw-bold mb-0">November</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Curah Hujan (mm)</label>
                                        <input type="number" class="form-control" name="november_curah_hujan" step="0.01" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Suhu (Celsius)</label>
                                        <input type="number" class="form-control" name="november_suhu" step="0.1" min="0" max="50">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Kelembaban (%)</label>
                                        <input type="number" class="form-control" name="november_kelembaban" step="0.1" min="0" max="100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Desember -->
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-header bg-light-dark">
                                    <h5 class="card-title text-dark fw-bold mb-0">Desember</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Curah Hujan (mm)</label>
                                        <input type="number" class="form-control" name="desember_curah_hujan" step="0.01" min="0">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Suhu (Celsius)</label>
                                        <input type="number" class="form-control" name="desember_suhu" step="0.1" min="0" max="50">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Kelembaban (%)</label>
                                        <input type="number" class="form-control" name="desember_kelembaban" step="0.1" min="0" max="100">
                                    </div>
                                </div>
                            </div>
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
                <button type="button" class="btn btn-success btn-lg" onclick="saveIklimEdit()" data-kt-indicator="off">
                    <span class="indicator-label">
                        <i class="ki-duotone ki-check fs-4 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Simpan Semua Data
                    </span>
                    <span class="indicator-progress">Menyimpan... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal Edit Iklim Desa-->
