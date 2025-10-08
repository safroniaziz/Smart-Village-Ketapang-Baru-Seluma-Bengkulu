@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Tambah Bantuan Individual')

@section('menu')
    Tambah Bantuan Individual
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
    <li class="breadcrumb-item text-muted">Tambah Individual</li>
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

            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="fw-bold">Form Tambah Bantuan Individual</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.bantuan.index') }}" class="btn btn-sm btn-light">
                            <i class="ki-duotone ki-arrow-left fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.bantuan.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-6">
                                    <label for="user_id" class="form-label required">Pilih Warga</label>
                                    <select name="user_id" id="user_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Pilih warga..." required>
                                        <option value="">Pilih warga...</option>
                                        @foreach($wargas as $warga)
                                            <option value="{{ $warga->id }}" @selected(old('user_id') == $warga->id)>
                                                {{ $warga->nama_lengkap }} - {{ $warga->nik }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-6">
                                    <label for="program_select" class="form-label required">Program Bantuan</label>
                                    <select name="program_select" id="program_select" class="form-select form-select-solid" data-control="select2" data-placeholder="Pilih program bantuan..." required>
                                        <option value="">Pilih program bantuan...</option>
                                        <option value="BLT" @selected(old('program') === 'BLT')>BLT (Bantuan Langsung Tunai)</option>
                                        <option value="PKH" @selected(old('program') === 'PKH')>PKH (Program Keluarga Harapan)</option>
                                        <option value="Bansos" @selected(old('program') === 'Bansos')>Bansos (Bantuan Sosial)</option>
                                        <option value="BPNT" @selected(old('program') === 'BPNT')>BPNT (Bantuan Pangan Non Tunai)</option>
                                        <option value="BST" @selected(old('program') === 'BST')>BST (Bantuan Sosial Tunai)</option>
                                        <option value="PIP" @selected(old('program') === 'PIP')>PIP (Program Indonesia Pintar)</option>
                                        <option value="KIS" @selected(old('program') === 'KIS')>KIS (Kartu Indonesia Sehat)</option>
                                        <option value="Sembako" @selected(old('program') === 'Sembako')>Bantuan Sembako</option>
                                        <option value="Lainnya" @selected(!in_array(old('program'), ['BLT','PKH','Bansos','BPNT','BST','PIP','KIS','Sembako']) && old('program'))>Lainnya</option>
                                    </select>
                                    @error('program')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-6" id="program_custom_wrap" style="display: none;">
                                    <label for="program_custom" class="form-label required">Nama Program Bantuan</label>
                                    <input type="text" name="program_custom" id="program_custom" class="form-control form-control-solid" placeholder="Masukkan nama program bantuan" value="{{ !in_array(old('program'), ['BLT','PKH','Bansos','BPNT','BST','PIP','KIS','Sembako']) ? old('program') : '' }}">
                                    <input type="hidden" name="program" id="program_hidden" value="{{ old('program') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-6">
                                    <label for="tahun" class="form-label required">Tahun</label>
                                    <input type="number" name="tahun" id="tahun" class="form-control form-control-solid" min="2020" max="{{ date('Y') + 5 }}" value="{{ old('tahun', date('Y')) }}" required>
                                    @error('tahun')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-6">
                                    <label for="nominal" class="form-label">Nominal (Rp)</label>
                                    <input type="number" name="nominal" id="nominal" class="form-control form-control-solid" placeholder="0" value="{{ old('nominal') }}" min="0" step="1000">
                                    @error('nominal')
                                        <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-6">
                                    <label class="form-label">Status</label>
                                    <div class="form-control form-control-solid d-flex align-items-center">
                                        <span class="badge badge-light-success">Aktif</span>
                                        <span class="text-muted ms-2">(Otomatis aktif saat ditambahkan)</span>
                                    </div>
                                    <input type="hidden" name="status" value="Aktif">
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control form-control-solid" rows="3" placeholder="Keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="text-danger fs-7 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end gap-3">
                            <a href="{{ route('admin.bantuan.index') }}" class="btn btn-light">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ki-duotone ki-check fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                Simpan
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
    const programSelect = document.getElementById('program_select');
    const programCustomWrap = document.getElementById('program_custom_wrap');
    const programCustom = document.getElementById('program_custom');
    const programHidden = document.getElementById('program_hidden');

    function toggleCustomProgram() {
        if (programSelect.value === 'Lainnya') {
            programCustomWrap.style.display = 'block';
            programCustom.setAttribute('required', 'required');
            programHidden.value = programCustom.value;
        } else {
            programCustomWrap.style.display = 'none';
            programCustom.removeAttribute('required');
            programHidden.value = programSelect.value;
        }
    }

    // Initialize on page load
    toggleCustomProgram();

    // Handle select change
    programSelect.addEventListener('change', toggleCustomProgram);

    // Handle custom input change
    programCustom.addEventListener('input', function() {
        if (programSelect.value === 'Lainnya') {
            programHidden.value = this.value;
        }
    });
});
</script>
@endpush
