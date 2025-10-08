@forelse($familyGroups as $noKK => $familyMembers)
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
    @foreach($familyMembers->sortByDesc('is_kepala_keluarga') as $warga)
        <tr class="family-member" data-family="{{ $noKK }}">
            <td>
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-50px me-3">
                        @if($warga->foto)
                            <div class="symbol-label" style="background-image: url('{{ Storage::url($warga->foto) }}')"></div>
                        @else
                            <div class="symbol-label bg-light-{{ $warga->jenis_kelamin == 'Laki-laki' || $warga->jenis_kelamin == 'L' ? 'primary' : 'danger' }}">
                                <i class="ki-duotone ki-{{ $warga->jenis_kelamin == 'Laki-laki' || $warga->jenis_kelamin == 'L' ? 'user' : 'woman' }} fs-2x text-{{ $warga->jenis_kelamin == 'Laki-laki' || $warga->jenis_kelamin == 'L' ? 'primary' : 'danger' }}">
                                    <span class="path1"></span>
                                    @if($warga->jenis_kelamin != 'Laki-laki' && $warga->jenis_kelamin != 'L')
                                        <span class="path2"></span>
                                    @endif
                                </i>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex flex-column">
                        <a href="{{ route('data-warga.show', $warga) }}" class="text-gray-800 text-hover-primary fw-bold fs-6 mb-1">
                            {{ $warga->nama_lengkap }}
                            @if($warga->is_kepala_keluarga)
                                <span class="badge badge-light-success ms-2">Kepala Keluarga</span>
                            @endif
                        </a>
                        <span class="text-muted fw-semibold d-block fs-7">{{ $warga->nik }}</span>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <span class="text-gray-800 fw-bold fs-6">{{ $warga->jenis_kelamin }}</span>
                    <span class="text-muted fw-semibold fs-7">
                        {{ $warga->calculated_age }} tahun
                    </span>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <span class="text-gray-800 fw-bold fs-6">{{ $warga->dusun ?: 'Tidak diketahui' }}</span>
                    <span class="text-muted fw-semibold fs-7">{{ $warga->rt ?: '-' }}/{{ $warga->rw ?: '-' }}</span>
                </div>
            </td>
            <td>
                <span class="text-gray-800 fw-bold fs-6">{{ $warga->agama ?: 'Tidak diketahui' }}</span>
            </td>
            <td>
                <span class="text-gray-800 fw-bold fs-6">{{ $warga->pendidikan ?: 'Tidak diketahui' }}</span>
            </td>
            <td>
                <span class="text-gray-800 fw-bold fs-6">{{ $warga->pekerjaan ?: ($warga->mata_pencaharian ?: 'Tidak diketahui') }}</span>
            </td>
            <td>
                @if($warga->status_aktif)
                    <span class="badge badge-light-success">Aktif</span>
                @else
                    <span class="badge badge-light-danger">Tidak Aktif</span>
                @endif
            </td>
            <td class="text-end">
                <div class="d-flex justify-content-end flex-shrink-0">
                    <a href="{{ route('data-warga.show', $warga) }}" class="btn btn-sm btn-icon btn-success" title="Lihat Detail">
                        <i class="ki-duotone ki-eye fs-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </a>
                    <a href="{{ route('data-warga.edit', $warga) }}" class="btn btn-sm btn-icon btn-warning ms-2" title="Edit Data">
                        <i class="ki-duotone ki-pencil fs-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
@empty
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
@endforelse