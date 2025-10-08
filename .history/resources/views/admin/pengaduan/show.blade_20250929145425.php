@extends('layouts.dashboard.dashboard')

@section('title', 'Detail Pengaduan - ' . $p->nomor_tracking)

@section('menu')
    Detail Pengaduan
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted"><a href="{{ route('admin.pengaduan.index') }}" class="text-muted text-hover-primary">Manajemen Pengaduan</a></li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Detail</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="row g-5 g-xl-10">
                <div class="col-xl-8">
                    <div class="card shadow-sm">
                        <div class="card-header border-0 py-5">
                            <div class="card-title d-flex align-items-center gap-3">
                                <span class="badge badge-light-dark fs-7 fw-bold">Tracking: {{ $p->nomor_tracking }}</span>
                                <span class="badge {{ $p->is_warga ? 'badge-light-success' : 'badge-light-secondary' }}">{{ $p->asal_pelapor }}</span>
                                @php
                                    $statusClass = [
                                        'Diterima' => 'badge-light-primary',
                                        'Dalam Proses' => 'badge-light-warning',
                                        'Selesai' => 'badge-light-success',
                                        'Ditolak' => 'badge-light-danger',
                                    ][$p->status] ?? 'badge-light';
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ $p->status }}</span>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row mb-7">
                                <div class="col-md-6">
                                    <div class="text-muted fs-7">Judul</div>
                                    <div class="fs-6 fw-semibold text-gray-900">{{ $p->judul }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-muted fs-7">Prioritas</div>
                                    <div><span class="badge badge-light-info">{{ $p->prioritas }}</span></div>
                                </div>
                            </div>
                            <div class="mb-7">
                                <div class="text-muted fs-7">Deskripsi</div>
                                <div class="fs-6 text-gray-800">{{ $p->deskripsi }}</div>
                            </div>
                            <div class="row mb-7">
                                <div class="col-md-6">
                                    <div class="text-muted fs-7">Lokasi</div>
                                    <div class="fs-6 fw-semibold text-gray-900">{{ $p->lokasi }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-muted fs-7">Tanggal Kejadian</div>
                                    <div class="fs-6 fw-semibold text-gray-900">{{ optional($p->tanggal_kejadian)->format('d M Y') }}</div>
                                </div>
                            </div>

                            <div class="row mb-7">
                                <div class="col-md-6">
                                    <div class="text-muted fs-7">Pelapor</div>
                                    <div class="fs-6 text-gray-900">
                                        @if($p->anonim)
                                            <span class="text-muted fst-italic">(Anonim)</span>
                                        @else
                                            {{ $p->nama_lengkap ?? '-' }}
                                        @endif
                                    </div>
                                    <div class="text-muted fs-7 mt-3">NIK</div>
                                    <div class="fs-6 text-gray-900">{{ $p->nik ?? '-' }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-muted fs-7">Kontak</div>
                                    <div class="fs-6 text-gray-900">Email: {{ $p->email }}</div>
                                    <div class="fs-6 text-gray-900">Telepon: {{ $p->telepon ?? '-' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card shadow-sm">
                        <div class="card-header border-0 py-5">
                            <div class="card-title fw-bold">Status & Tindak Lanjut</div>
                        </div>
                        <div class="card-body pt-0">
                            <form method="post" action="{{ route('admin.pengaduan.update', $p->id) }}" class="row g-5">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label fs-8 text-muted">Ubah Status</label>
                                    <select name="status" class="form-select form-select-solid">
                                        @foreach(['Diterima','Dalam Proses','Selesai','Ditolak'] as $s)
                                            <option value="{{ $s }}" @selected($p->status===$s)>{{ $s }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fs-8 text-muted">Catatan Tindak Lanjut</label>
                                    <textarea name="catatan_petugas" class="form-control form-control-solid" rows="3" placeholder="Ringkas, jelas, dan profesional"></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fs-8 text-muted">Petugas</label>
                                    <select name="petugas_id" class="form-select form-select-solid">
                                        <option value="">- Pilih Petugas -</option>
                                        @foreach(\App\Models\User::whereNull('deleted_at')->orderBy('nama_lengkap')->get() as $u)
                                            <option value="{{ $u->id }}" @selected($p->petugas && $p->petugas===$u->nama_lengkap)>{{ $u->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 d-grid">
                                    <button class="btn btn-primary">
                                        <i class="ki-duotone ki-check fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5 g-xl-10 mt-0">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header border-0 py-5">
                            <div class="card-title fw-bold">Timeline Tindak Lanjut</div>
                        </div>
                        <div class="card-body pt-0">
                            @if($followups->isEmpty())
                                <div class="text-center text-muted py-10">Belum ada tindak lanjut</div>
                            @else
                                <div class="timeline">
                                    @foreach($followups as $f)
                                        @php
                                            $dotClass = [
                                                'Diterima' => 'bg-primary',
                                                'Dalam Proses' => 'bg-warning',
                                                'Selesai' => 'bg-success',
                                                'Ditolak' => 'bg-danger',
                                            ][$f->status] ?? 'bg-secondary';
                                        @endphp
                                        <div class="timeline-item">
                                            <div class="timeline-line"></div>
                                            <div class="timeline-icon {{ $dotClass }}">
                                                <i class="ki-duotone ki-check text-white fs-7"><span class="path1"></span><span class="path2"></span></i>
                                            </div>
                                            <div class="timeline-content d-flex">
                                                <div class="me-5">
                                                    <span class="badge {{ $dotClass === 'bg-primary' ? 'badge-light-primary' : ($dotClass === 'bg-warning' ? 'badge-light-warning' : ($dotClass === 'bg-success' ? 'badge-light-success' : 'badge-light-danger')) }}">{{ $f->status }}</span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="fw-semibold text-gray-900">{{ $f->catatan ?? '-' }}</div>
                                                        <div class="text-muted fs-8">{{ $f->created_at->format('d M Y H:i') }}</div>
                                                    </div>
                                                    <div class="text-muted fs-8 mt-1">Petugas: {{ $f->petugas ?? '-' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


