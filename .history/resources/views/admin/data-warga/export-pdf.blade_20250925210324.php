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
            margin-top: 20px;
            font-size: 8px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-top">
            <div class="header-text">
                <h1>Pemerintah Desa Ketapang Baru</h1>
                <h2>Kecamatan Seluma</h2>
                <h3>Kabupaten Seluma - Provinsi Bengkulu</h3>
                <p>Alamat: Jl. Raya Ketapang Baru, Seluma, Bengkulu</p>
                <p>Kode Pos: 38874 | Telp: (0736) 123456</p>
            </div>
        </div>
        
        <div class="doc-title">
            <h4>DAFTAR PENDUDUK DESA KETAPANG BARU</h4>
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
                <th width="3%">No</th>
                <th width="12%">NIK</th>
                <th width="12%">No. KK</th>
                <th width="15%">Nama Lengkap</th>
                <th width="6%">JK</th>
                <th width="5%">Umur</th>
                <th width="12%">Alamat</th>
                <th width="6%">RT/RW</th>
                <th width="8%">Dusun</th>
                <th width="6%">Agama</th>
                <th width="8%">Status</th>
                <th width="7%">Pendidikan</th>
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
                    @php $currentFamily = $noKk; @endphp
                    <tr class="family-header">
                        <td colspan="12" class="text-center">
                            <strong>KELUARGA: {{ $noKk ?? 'Tidak Ada' }} ({{ $familyMembers->count() }} anggota)</strong>
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
        <p>Total: {{ $wargas->count() }} warga dari {{ $familyGroups->count() }} keluarga</p>
        <p>Dokumen ini dibuat secara otomatis oleh Smart Village Management System</p>
    </div>
</body>
</html>
