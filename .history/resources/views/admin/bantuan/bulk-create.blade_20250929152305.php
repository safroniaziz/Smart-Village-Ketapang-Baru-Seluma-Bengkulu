@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Tambah Bantuan Massal')

@section('menu')
    Tambah Bantuan Massal
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.bantuan.index') }}" class="text-muted text-hover-primary">Manajemen Bantuan</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Tambah Massal</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-cross-circle fs-2 text-danger me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Terjadi Kesalahan</div>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="alert alert-info mb-5">
                <div class="d-flex align-items-center">
                    <i class="ki-duotone ki-information fs-2 text-info me-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                    <div>
                        <div class="fw-bold mb-1">Bantuan Massal</div>
                        <div>Pilih program bantuan terlebih dahulu, kemudian centang warga yang akan menerima bantuan. Sistem akan otomatis melewati warga yang sudah terdaftar dalam program yang sama pada tahun yang sama.</div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="fw-bold">Form Tambah Bantuan Massal</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.bantuan.index') }}" class="btn btn-sm btn-light">
                            <i class="ki-duotone ki-arrow-left fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.bantuan.bulk-store') }}">
                        @csrf
                        <div class="row mb-8">
                            <div class="col-md-6">
                                <div class="mb-6">
                                    <label for="program" class="form-label required">Program Bantuan</label>
                                    <input type="text" name="program" id="program" class="form-control form-control-solid" placeholder="Contoh: BLT, PKH, Bansos, dll" value="{{ old('program') }}" required>
                                    @error('program')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-6">
                                    <label for="tahun" class="form-label required">Tahun</label>
                                    <input type="number" name="tahun" id="tahun" class="form-control form-control-solid" min="2020" max="{{ date('Y') + 5 }}" value="{{ old('tahun', date('Y')) }}" required>
                                    @error('tahun')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-6">
                                    <label for="nominal" class="form-label">Nominal (Rp)</label>
                                    <input type="number" name="nominal" id="nominal" class="form-control form-control-solid" placeholder="0" value="{{ old('nominal') }}" min="0" step="1000">
                                    @error('nominal')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-6">
                                    <label for="status" class="form-label required">Status</label>
                                    <select name="status" id="status" class="form-select form-select-solid" required>
                                        <option value="Aktif" @selected(old('status', 'Aktif') === 'Aktif')>Aktif</option>
                                        <option value="Tidak Aktif" @selected(old('status') === 'Tidak Aktif')>Tidak Aktif</option>
                                        <option value="Selesai" @selected(old('status') === 'Selesai')>Selesai</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-8">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control form-control-solid" rows="2" placeholder="Keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="separator separator-dashed my-8"></div>

                        <div class="mb-6">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h4 class="fw-bold">Pilih Warga Penerima</h4>
                                <div class="d-flex gap-2">
                                    <input type="text" id="search-warga" class="form-control form-control-sm" placeholder="Cari nama/NIK..." style="width: 200px;">
                                    <button type="button" id="select-all" class="btn btn-sm btn-light-primary">Pilih Semua</button>
                                    <button type="button" id="deselect-all" class="btn btn-sm btn-light-secondary">Batal Semua</button>
                                </div>
                            </div>
                            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                <table class="table table-row-dashed align-middle gy-2">
                                    <thead class="sticky-top bg-light">
                                        <tr class="fw-bold text-gray-800 fs-7">
                                            <th class="w-50px">
                                                <div class="form-check form-check-sm">
                                                    <input class="form-check-input" type="checkbox" id="check-all">
                                                </div>
                                            </th>
                                            <th class="min-w-200px">Nama Lengkap</th>
                                            <th class="min-w-150px">NIK</th>
                                            <th class="min-w-120px">Dusun</th>
                                        </tr>
                                    </thead>
                                    <tbody id="warga-list">
                                        @foreach($wargas as $warga)
                                            <tr class="warga-row" data-name="{{ strtolower($warga->nama_lengkap) }}" data-nik="{{ $warga->nik }}">
                                                <td>
                                                    <div class="form-check form-check-sm">
                                                        <input class="form-check-input warga-checkbox" type="checkbox" name="user_ids[]" value="{{ $warga->id }}" id="warga_{{ $warga->id }}" @checked(in_array($warga->id, old('user_ids', [])))>
                                                    </div>
                                                </td>
                                                <td class="text-gray-900 fw-semibold">{{ $warga->nama_lengkap }}</td>
                                                <td class="text-gray-700">{{ $warga->nik }}</td>
                                                <td class="text-gray-600">{{ $warga->dusun ?? '-' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @error('user_ids')
                                <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                            @enderror
                            @error('user_ids.*')
                                <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-3">
                            <a href="{{ route('admin.bantuan.index') }}" class="btn btn-light">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ki-duotone ki-check fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                Simpan Massal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-warga');
    const checkAll = document.getElementById('check-all');
    const selectAllBtn = document.getElementById('select-all');
    const deselectAllBtn = document.getElementById('deselect-all');
    const wargaRows = document.querySelectorAll('.warga-row');
    const wargaCheckboxes = document.querySelectorAll('.warga-checkbox');

    // Search functionality
    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        wargaRows.forEach(row => {
            const name = row.dataset.name;
            const nik = row.dataset.nik;
            if (name.includes(query) || nik.includes(query)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Check all functionality
    checkAll.addEventListener('change', function() {
        const visibleCheckboxes = Array.from(wargaCheckboxes).filter(cb => 
            cb.closest('.warga-row').style.display !== 'none'
        );
        visibleCheckboxes.forEach(cb => cb.checked = this.checked);
    });

    // Select all button
    selectAllBtn.addEventListener('click', function() {
        const visibleCheckboxes = Array.from(wargaCheckboxes).filter(cb => 
            cb.closest('.warga-row').style.display !== 'none'
        );
        visibleCheckboxes.forEach(cb => cb.checked = true);
        checkAll.checked = true;
    });

    // Deselect all button
    deselectAllBtn.addEventListener('click', function() {
        wargaCheckboxes.forEach(cb => cb.checked = false);
        checkAll.checked = false;
    });

    // Update check-all state when individual checkboxes change
    wargaCheckboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            const visibleCheckboxes = Array.from(wargaCheckboxes).filter(cb => 
                cb.closest('.warga-row').style.display !== 'none'
            );
            const checkedVisible = visibleCheckboxes.filter(cb => cb.checked);
            checkAll.checked = checkedVisible.length === visibleCheckboxes.length && visibleCheckboxes.length > 0;
            checkAll.indeterminate = checkedVisible.length > 0 && checkedVisible.length < visibleCheckboxes.length;
        });
    });
});
</script>
@endpush
