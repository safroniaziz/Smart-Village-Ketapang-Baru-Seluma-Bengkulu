@if(isset($familyGroups) && $familyGroups->count() > 0)
    @foreach($familyGroups as $noKK => $familyMembers)
        @php
            $kepalaKeluarga = $familyMembers->where('is_kepala_keluarga', true)->first();
            $namaKepala = $kepalaKeluarga ? $kepalaKeluarga->nama_lengkap : 'Kepala Keluarga Tidak Diketahui';
            $dusunKeluarga = $kepalaKeluarga ? $kepalaKeluarga->dusun : 'Dusun Tidak Diketahui';
        @endphp
        {{-- Family Header Row --}}
        <tr class="bg-light-primary family-header" data-family="{{ $noKK }}">
            <td colspan="8" class="py-3">
                <div class="d-flex align-items-center">
                    <i class="ki-duotone ki-home-2 fs-2 text-primary me-3">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <div>
                        <div class="fw-bold fs-6 text-primary">
                            Keluarga {{ $namaKepala }}
                            @if($noKK && $noKK !== '-')
                                <span class="text-muted fs-7">({{ $noKK }})</span>
                            @endif
                        </div>
                        <div class="text-muted fs-7">
                            <i class="ki-duotone ki-geolocation fs-7 me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            {{ $dusunKeluarga }} • {{ $familyMembers->count() }} anggota keluarga
                        </div>
                    </div>
                    <div class="ms-auto">
                        <button class="btn btn-sm btn-light-primary family-toggle" data-family="{{ $noKK }}">
                            <i class="ki-duotone ki-up fs-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </button>
                    </div>
                </div>
            </td>
        </tr>

        {{-- Family Members --}}
        @foreach($familyMembers as $warga)
        <tr class="border-bottom border-gray-300 family-member" data-family="{{ $noKK }}" data-warga-id="{{ $warga->id }}">
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="{{ $warga->id }}" />
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-40px me-3">
                        <div class="symbol-label overflow-hidden">
                            @if($warga->foto)
                                <img src="{{ asset('storage/' . $warga->foto) }}" alt="{{ $warga->nama_lengkap }}" class="w-100 h-100 object-fit-cover" />
                            @else
                                <div class="symbol-label fs-6 fw-bold {{ in_array($warga->jenis_kelamin, ['Laki-laki', 'L']) ? 'bg-light-primary text-primary' : 'bg-light-danger text-danger' }}">
                                    {{ substr($warga->nama_lengkap, 0, 1) }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-1">
                            @if($warga->is_kepala_keluarga)
                                <span class="badge badge-light-success fs-8 me-2">
                                    <i class="ki-duotone ki-crown fs-6 me-1"></i>
                                    Kepala Keluarga
                                </span>
                            @endif
                        </div>
                        <a href="{{ route('data-warga.show', $warga) }}" class="text-gray-800 text-hover-primary fw-bold fs-6 mb-1">
                            {{ $warga->nama_lengkap }}
                        </a>
                        <div class="text-muted fs-7">
                            <i class="ki-duotone ki-geolocation fs-7 me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            NIK: {{ $warga->nik ?? 'Tidak diketahui' }}
                        </div>
                    </div>
                </div>
            </td>
            <td class="text-center">
                @if(in_array($warga->jenis_kelamin, ['Laki-laki', 'L']))
                    <span class="badge badge-light-primary fw-bold">
                        <i class="ki-duotone ki-profile-user fs-6 me-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        Laki-laki
                    </span>
                @elseif(in_array($warga->jenis_kelamin, ['Perempuan', 'P']))
                    <span class="badge badge-light-danger fw-bold">
                        <i class="ki-duotone ki-profile-user fs-6 me-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        Perempuan
                    </span>
                @else
                    <span class="text-muted">Tidak Diketahui</span>
                @endif
            </td>
            <td class="text-center">
                @if($warga->calculated_age)
                    <div class="fw-bold text-gray-800 fs-6">{{ $warga->calculated_age }}</div>
                    <div class="text-muted fs-7">tahun</div>
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>
            <td class="d-none d-lg-table-cell text-center">
                @if($warga->dusun)
                    <span class="badge badge-light-info">{{ $warga->dusun }}</span>
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>
            <td class="d-none d-xl-table-cell">
                @if($warga->mata_pencaharian)
                    <span class="text-gray-700 fw-semibold">{{ $warga->mata_pencaharian }}</span>
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>
            <td class="text-center">
                @if($warga->status_aktif)
                    <span class="badge badge-light-success">Aktif</span>
                @else
                    <span class="badge badge-light-danger">Tidak Aktif</span>
                @endif
            </td>
            <td class="text-end">
                <div class="d-flex justify-content-end gap-1">
                    <a href="{{ route('data-warga.show', $warga) }}" class="btn btn-sm btn-icon btn-success" title="Lihat Detail">
                        <i class="ki-duotone ki-eye fs-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </a>
                    <a href="{{ route('data-warga.edit', $warga) }}" class="btn btn-sm btn-icon btn-warning" title="Edit Data">
                        <i class="ki-duotone ki-pencil fs-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    <button type="button" class="btn btn-sm btn-icon btn-danger" title="Hapus Data" onclick="deleteWarga({{ $warga->id }})">
                        <i class="ki-duotone ki-trash fs-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    @endforeach
@else
    <tr>
        <td colspan="8" class="text-center py-10">
            <div class="d-flex flex-column align-items-center">
                <i class="ki-duotone ki-file-deleted fs-2x text-gray-400 mb-3">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <span class="text-muted">Tidak ada data warga</span>
            </div>
        </td>
    </tr>
@endif