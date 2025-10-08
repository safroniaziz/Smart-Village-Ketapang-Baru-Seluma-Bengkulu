@if($tahapan->count() > 0)
    @foreach($tahapan as $item)
        <div class="card card-bordered mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center mb-2">
                            @if($item->icon)
                                <i class="{{ $item->icon }} fs-2 text-primary me-3"></i>
                            @endif
                            <h5 class="card-title text-dark fw-bold mb-0">{{ $item->nama_tahapan }}</h5>
                        </div>
                        <p class="card-text text-gray-600">{{ Str::limit($item->deskripsi, 150) }}</p>
                        @if($item->kegiatan)
                            <div class="mt-2">
                                <small class="text-primary fw-semibold">Kegiatan:</small>
                                <small class="text-muted">{{ Str::limit($item->kegiatan, 100) }}</small>
                            </div>
                        @endif
                        @if($item->waktu)
                            <div class="mt-1">
                                <small class="text-success fw-semibold">Waktu:</small>
                                <small class="text-muted">{{ $item->waktu }}</small>
                            </div>
                        @endif
                        <small class="text-muted">
                            <i class="ki-duotone ki-calendar fs-6">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            {{ $item->created_at->format('d M Y') }}
                        </small>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light-primary" type="button" data-bs-toggle="dropdown">
                            <i class="ki-duotone ki-setting-2 fs-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="editTahapan({{ $item->id }})">
                                    <i class="ki-duotone ki-pencil fs-6 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Edit
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="javascript:void(0)" onclick="deleteTahapan({{ $item->id }})">
                                    <i class="ki-duotone ki-trash fs-6 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                    Hapus
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="text-center py-10">
        <i class="ki-duotone ki-information-5 fs-3x text-muted mb-5">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
        </i>
        <h4 class="text-muted">Belum ada data tahapan</h4>
        <p class="text-muted">Klik tombol "Tambah" untuk menambahkan tahapan implementasi</p>
    </div>
@endif
