@extends('layouts.dashboard.dashboard')

@section('title', 'Admin - Manajemen Pengaduan')

@section('menu')
    Manajemen Pengaduan
@endsection

@section('link')
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-500 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">Manajemen Pengaduan</li>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="ki-duotone ki-check-circle fs-2 text-success me-3"><span class="path1"></span><span class="path2"></span></i>
                        <div class="flex-grow-1">
                            <div class="fw-bold mb-1">Berhasil</div>
                            <div>{{ session('success') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header border-0 py-6">
                    <div class="card-title w-100">
                        <form method="get" class="d-flex align-items-center gap-3 flex-wrap">
                            <div class="d-flex align-items-center position-relative">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4 z-index-2 text-primary">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" name="q" value="{{ request('q') }}" class="form-control form-control-lg form-control-solid ps-12" style="min-width:260px;" placeholder="Cari judul / tracking" />
                            </div>
                            <select name="status" class="form-select form-select-solid" style="min-width:180px;" data-control="select2" data-placeholder="Semua Status" data-hide-search="true">
                                <option value="">Semua Status</option>
                                @foreach(['Diterima','Dalam Proses','Selesai','Ditolak'] as $s)
                                    <option value="{{ $s }}" @selected(request('status')===$s)>{{ $s }}</option>
                                @endforeach
                            </select>
                            <select name="asal" class="form-select form-select-solid" style="min-width:180px;" data-control="select2" data-placeholder="Semua Asal" data-hide-search="true">
                                <option value="">Semua Asal</option>
                                @foreach(['Warga Desa','Eksternal'] as $a)
                                    <option value="{{ $a }}" @selected(request('asal')===$a)>{{ $a }}</option>
                                @endforeach
                            </select>
                            <select name="fu" class="form-select form-select-solid" style="min-width:180px;" data-control="select2" data-placeholder="Followup" data-hide-search="true">
                                <option value="">Semua Followup</option>
                                <option value="has" @selected(request('fu')==='has')>Sudah di-followup</option>
                                <option value="none" @selected(request('fu')==='none')>Tanpa followup</option>
                            </select>
                            <select name="sort" class="form-select form-select-solid" style="min-width:180px;" data-control="select2" data-hide-search="true">
                                <option value="latest" @selected(request('sort','latest')==='latest')>Terbaru</option>
                                <option value="fu_desc" @selected(request('sort')==='fu_desc')>Followup terbanyak</option>
                                <option value="fu_asc" @selected(request('sort')==='fu_asc')>Followup tersedikit</option>
                            </select>
                            <button class="btn btn-primary">
                                <i class="ki-duotone ki-filter fs-5 me-2"><span class="path1"></span><span class="path2"></span></i>
                                Terapkan
                            </button>
                            @if(request()->hasAny(['q','status','asal']))
                            <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-light">Reset</a>
                            @endif
                        </form>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge badge-light-primary">Total: {{ $pengaduans->total() }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-row-dashed align-middle gy-4">
                            <thead>
                                <tr class="fw-bold text-gray-800">
                                    <th class="min-w-140px">Tracking</th>
                                    <th class="min-w-280px">Judul</th>
                                    <th class="min-w-180px">Pelapor</th>
                                    <th class="min-w-140px">Asal</th>
                                    <th class="min-w-120px">Prioritas</th>
                                    <th class="min-w-140px">Status</th>
                                    <th class="min-w-160px">Petugas Terakhir</th>
                                    <th class="min-w-120px">Followup</th>
                                    <th class="min-w-140px">Tanggal</th>
                                    <th class="w-100px text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengaduans as $p)
                                    <tr>
                                        <td>
                                            <span class="badge badge-light-dark fw-bold">{{ $p->nomor_tracking }}</span>
                                        </td>
                                        <td class="text-gray-900 fw-semibold">{{ $p->judul }}</td>
                                        <td class="text-gray-700">{{ $p->anonim ? 'Anonim' : ($p->nama_lengkap ?? '-') }}</td>
                                        <td>
                                            <span class="badge {{ $p->is_warga ? 'badge-light-success' : 'badge-light-secondary' }}">{{ $p->asal_pelapor }}</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-light-info">{{ $p->prioritas }}</span>
                                        </td>
                                        <td>
                                            @php
                                                $statusClass = [
                                                    'Diterima' => 'badge-light-primary',
                                                    'Dalam Proses' => 'badge-light-warning',
                                                    'Selesai' => 'badge-light-success',
                                                    'Ditolak' => 'badge-light-danger',
                                                ][$p->status] ?? 'badge-light';
                                            @endphp
                                            <span class="badge {{ $statusClass }}">{{ $p->status }}</span>
                                        </td>
                                        <td class="text-gray-700">{{ $p->petugas ?? '-' }}</td>
                                        <td>
                                            <span class="badge badge-light-primary">{{ $p->followups_count ?? 0 }}</span>
                                        </td>
                                        <td class="text-muted">{{ $p->created_at?->format('d M Y') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.pengaduan.show', $p->id) }}" class="btn btn-sm btn-light-primary">
                                                <i class="ki-duotone ki-eye fs-5 me-1"><span class="path1"></span><span class="path2"></span></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-10">
                                            <div class="text-muted">Belum ada pengaduan</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between gap-3 mt-6">
                        <div class="text-muted small">
                            Menampilkan {{ $pengaduans->firstItem() ?? 0 }} - {{ $pengaduans->lastItem() ?? 0 }} dari {{ $pengaduans->total() }} data
                        </div>
                        <div class="ms-md-auto">
                            {{ $pengaduans->onEachSide(1)->links('pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


