<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Warga - Smart Village</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 15px;
        }
        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 3px solid #2c5282;
            padding-bottom: 15px;
        }
        .header-top {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        .logo {
            width: 60px;
            height: 60px;
            margin-right: 20px;
        }
        .header-text {
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            color: #1a365d;
            font-weight: bold;
            text-transform: uppercase;
        }
        .header h2 {
            margin: 2px 0;
            font-size: 16px;
            color: #2d3748;
            font-weight: bold;
        }
        .header h3 {
            margin: 2px 0;
            font-size: 14px;
            color: #4a5568;
            font-weight: normal;
        }
        .header p {
            margin: 2px 0;
            color: #718096;
            font-size: 10px;
        }
        .doc-title {
            background-color: #bee3f8;
            padding: 8px;
            margin: 15px 0;
            border-radius: 5px;
            border: 1px solid #90cdf4;
        }
        .doc-title h4 {
            margin: 0;
            font-size: 14px;
            color: #1e3a8a;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
            font-size: 9px;
        }
        td {
            font-size: 8px;
        }
        .text-center {
            text-align: center;
        }
        .family-header {
            background-color: #e3f2fd;
            font-weight: bold;
        }
        .kepala-keluarga {
            background-color: #fff3cd;
        }
        .footer {
            margin-top: 25px;
            border-top: 2px solid #e2e8f0;
            padding-top: 15px;
            font-size: 9px;
            color: #4a5568;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .signature-box {
            text-align: center;
            width: 200px;
        }
        .signature-line {
            border-bottom: 1px solid #333;
            margin-top: 50px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-top">
            <div class="header-text">
                <h1>Pemerintah Desa {{ $monografi->nama_desa ?? 'Ketapang Baru' }}</h1>
                <h2>Kecamatan {{ $monografi->kecamatan ?? 'Semidang Alas Maras' }}</h2>
                <h3>Kabupaten {{ $monografi->kabupaten ?? 'Seluma' }} - Provinsi {{ $monografi->provinsi ?? 'Bengkulu' }}</h3>
                <p>Alamat: Desa {{ $monografi->nama_desa ?? 'Ketapang Baru' }}, {{ $monografi->kecamatan ?? 'Semidang Alas Maras' }}, {{ $monografi->kabupaten ?? 'Seluma' }}</p>
                <p>Kode Pos: {{ $monografi->kode_pos ?? '38874' }} | Kode Area: {{ $monografi->kode_area ?? '0736' }}</p>
            </div>
        </div>

        <div class="doc-title">
            <h4>DAFTAR PENDUDUK DESA {{ strtoupper($monografi->nama_desa ?? 'KETAPANG BARU') }}</h4>
            <p style="margin: 3px 0; color: #4a5568;">Berdasarkan Data Kependudukan {{ date('Y') }}</p>
        </div>

        <table style="width: 100%; border: none; margin: 10px 0; font-size: 9px;">
            <tr style="border: none;">
                <td style="border: none; width: 50%; text-align: left;">
                    <strong>Dokumen:</strong> Daftar Penduduk<br>
                    <strong>Periode:</strong> {{ date('F Y') }}
                </td>
                <td style="border: none; width: 50%; text-align: right;">
                    <strong>Dicetak:</strong> {{ date('d/m/Y H:i:s') }}<br>
                    <strong>Total:</strong> {{ $wargas->count() }} Penduduk
                </td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">NIK</th>
                <th width="12%">No. KK</th>
                <th width="20%">Nama Lengkap</th>
                <th width="8%">JK</th>
                <th width="8%">Umur</th>
                <th width="10%">Dusun</th>
                <th width="8%">Agama</th>
                <th width="12%">Pekerjaan</th>
                <th width="12%">Pendidikan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $currentFamily = null;
                $familyGroups = $wargas->groupBy('no_kk');
            @endphp

            @foreach($familyGroups as $noKk => $familyMembers)
                @if($currentFamily !== $noKk)
                    @php
                        $currentFamily = $noKk;
                        $kepalaKeluarga = $familyMembers->where('is_kepala_keluarga', true)->first();
                        $namaKepala = $kepalaKeluarga ? $kepalaKeluarga->nama_lengkap : 'Tidak Ada Kepala Keluarga';
                    @endphp
                    <tr class="family-header">
                        <td colspan="12" class="text-center">
                            <strong>KELUARGA: {{ $noKk ?? 'Tidak Ada' }} - {{ $namaKepala }} ({{ $familyMembers->count() }} anggota)</strong>
                        </td>
                    </tr>
                @endif

                @foreach($familyMembers->sortByDesc('is_kepala_keluarga') as $warga)
                    <tr class="{{ $warga->is_kepala_keluarga ? 'kepala-keluarga' : '' }}">
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $warga->nik }}</td>
                        <td>{{ $warga->no_kk ?? '-' }}</td>
                        <td>
                            {{ $warga->nama_lengkap }}
                            @if($warga->is_kepala_keluarga)
                                <small>(Kepala Keluarga)</small>
                            @endif
                        </td>
                        <td class="text-center">{{ $warga->jenis_kelamin == 'L' ? 'L' : 'P' }}</td>
                        <td class="text-center">{{ $warga->calculated_age ?? 0 }}</td>
                        <td>{{ $warga->alamat ?? '-' }}</td>
                        <td class="text-center">{{ $warga->rt_rw ?? '-' }}</td>
                        <td>{{ $warga->dusun ?? '-' }}</td>
                        <td>{{ $warga->agama ?? '-' }}</td>
                        <td>{{ $warga->status_perkawinan ?? '-' }}</td>
                        <td>{{ $warga->pendidikan ?? '-' }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <table style="width: 100%; border: none; font-size: 9px;">
            <tr style="border: none;">
                <td style="border: none; width: 60%;">
                    <strong>Ringkasan Data:</strong><br>
                    • Total Penduduk: {{ $wargas->count() }} orang<br>
                    • Jumlah Keluarga: {{ $familyGroups->count() }} KK<br>
                    • Laki-laki: {{ $wargas->where('jenis_kelamin', 'Laki-laki')->count() }} orang<br>
                    • Perempuan: {{ $wargas->where('jenis_kelamin', 'Perempuan')->count() }} orang
                </td>
                <td style="border: none; width: 40%; text-align: right;">
                    <strong>{{ $monografi->nama_desa ?? 'Ketapang Baru' }}, {{ date('d F Y') }}</strong><br><br>
                    <div style="text-align: center;">
                        <p>Kepala Desa {{ $monografi->nama_desa ?? 'Ketapang Baru' }}</p>
                        <div style="height: 50px;"></div>
                        <div style="border-bottom: 1px solid #333; width: 150px; margin: 0 auto;"></div>
                        <p style="margin-top: 5px;"><strong>(__________________)</strong></p>
                    </div>
                </td>
            </tr>
        </table>

        <div style="margin-top: 15px; text-align: center; font-size: 8px; color: #718096;">
            <p>Dokumen ini dibuat secara otomatis melalui Smart Village Management System</p>
            <p>Desa {{ $monografi->nama_desa ?? 'Ketapang Baru' }} - {{ $monografi->kabupaten ?? 'Seluma' }} - {{ $monografi->provinsi ?? 'Bengkulu' }}</p>
        </div>
    </div>
</body>
</html>
