@if($visi->count() > 0)
    @foreach($visi as $item)
        <div class="card card-bordered mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title text-dark fw-bold">{{ $item->visi }}</h5>
                        @if($item->deskripsi)
                            <p class="card-text text-gray-600">{{ Str::limit($item->deskripsi, 150) }}</p>
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
                                <a class="dropdown-item" href="javascript:void(0)" onclick="editVisi({{ $item->id }})">
                                    <i class="ki-duotone ki-pencil fs-6 me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Edit
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="javascript:void(0)" onclick="deleteVisi({{ $item->id }})">
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
        <h4 class="text-muted">Belum ada data visi</h4>
        <p class="text-muted">Klik tombol "Tambah" untuk menambahkan visi desa</p>
    </div>
@endif
