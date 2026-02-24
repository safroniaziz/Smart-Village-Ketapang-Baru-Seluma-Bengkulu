<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Pindah Penduduk</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 10mm 15mm;
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 10pt;
            line-height: 1.3;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .page {
            max-width: 100%;
            margin: 0;
            padding: 0;
            background: #fff;
        }

        /* Header */
        .header {
            border-bottom: 2px double #000;
            padding-bottom: 5px;
            margin-bottom: 8px;
        }
        .header-table { width: 100%; border-collapse: collapse; }
        .header-table td { vertical-align: middle; }
        .logo-cell { width: 100px; text-align: center; }
        .logo img { width: 80px; }
        .text-cell { text-align: center; }
        .government-name {
            font-size: 18px; font-weight: 700; text-transform: uppercase;
        }
        .village-name {
            font-size: 16px; font-weight: 700; text-transform: uppercase;
        }
        .contact-info { font-size: 12px; }

        /* Title */
        .document-title { text-align: center; margin: 5px 0; }
        .title-main {
            font-size: 12pt; font-weight: 700; text-transform: uppercase;
            margin-bottom: 0px; letter-spacing: 0.5px;
            text-decoration: underline;
        }
        .document-number { font-size: 10pt; }

        /* Content */
        .intro-text {
            text-align: justify;
            font-size: 10pt;
            line-height: 1.4;
            margin-bottom: 8px;
        }

        .data-table { width: 100%; border-collapse: collapse; }
        .data-table td {
            padding: 2px 3px;
            vertical-align: top;
            font-size: 10pt;
            line-height: 1.2;
        }
        .data-table td:first-child {
            width: 150px;
        }

        .section-title {
            font-weight: bold;
            margin: 10px 0 5px 0;
            font-size: 10pt;
        }

        .pengikut-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
            font-size: 9pt;
        }

        .pengikut-table th,
        .pengikut-table td {
            border: 1px solid #000;
            padding: 5px 3px;
            text-align: center;
            vertical-align: middle;
        }

        .pengikut-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        /* Footer */
        .footer { margin-top: 15px; }

        @media print {
            body { background: white; padding: 0; }
            .page { box-shadow: none; border: none; }
        }
    </style>
</head>
<body>
    <div class="page">
        <!-- Header -->
        <div class="header">
            <table class="header-table">
                <tr>
                    <td class="logo-cell">
                        <div class="logo">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/seluma.png'))) }}" alt="Logo Seluma">
                        </div>
                    </td>
                    <td class="text-cell">
                        <div class="government-name">PEMERINTAH KABUPATEN SELUMA</div>
                        <div class="village-name">KECAMATAN SEMIDANG ALAS MARAS</div><div class="village-name">DESA KETAPANG BARU</div>
                        <div class="contact-info">Alamat : Jln Lintas Bengkulu – Manna Desa Ketapang Baru Kode Pos 38575</div>
                        <div class="contact-info">Website: ketapangbaru.selumakab.go.id</div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Title -->
        <div class="document-title">
            <div class="title-main">Surat Keterangan Pindah Penduduk</div>
            <div class="document-number">
                Nomor: {{ $nomor_surat ?? '-' }}
            </div>
        </div>

        <!-- Intro -->
        <div class="intro-text">
            Yang bertandatangan dibawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras, Kabupaten Seluma dengan ini menerangkan bahwa :
        </div>

        <!-- Data Pemohon -->
        <table class="data-table">
            <tr><td>Nama</td><td>: <strong>{{ $nama ?? '-' }}</strong></td></tr>
            <tr><td>Tempat/Tgl Lahir</td><td>: {{ $tempat_tanggal_lahir ?? '-' }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>: {{ $jenis_kelamin ?? '-' }}</td></tr>
            <tr><td>Agama</td><td>: {{ $agama ?? '-' }}</td></tr>
            <tr><td>Status Perkawinan</td><td>: {{ $status_perkawinan ?? '-' }}</td></tr>
            <tr><td>Pekerjaan</td><td>: {{ $pekerjaan ?? '-' }}</td></tr>
            <tr><td>Pendidikan</td><td>: {{ $pendidikan ?? '-' }}</td></tr>
            <tr><td>Kewarganegaraan</td><td>: {{ $kewarganegaraan ?? 'WNI' }}</td></tr>
            <tr><td>Alamat</td><td>: {{ $alamat_asal ?? '-' }}</td></tr>
        </table>

        <div class="section-title">Pindah Ke :</div>

        <table class="data-table">
            <tr><td>Kelurahan/Desa</td><td>: {{ $alamat_tujuan ?? '-' }}</td></tr>
            <tr><td>Pada Tanggal</td><td>: {{ $tanggal_pindah ?? '-' }}</td></tr>
            <tr><td>Alasan Pindah</td><td>: {{ $alasan_pindah ?? '-' }}</td></tr>
        </table>

        <div class="section-title">Pengikut :</div>

        @if(!empty($pengikut) && is_array($pengikut) && count($pengikut) > 0)
        <table class="pengikut-table">
            <thead>
                <tr>
                    <th style="width: 8%;">NO</th>
                    <th style="width: 25%;">NAMA</th>
                    <th style="width: 15%;">JENIS KELAMIN</th>
                    <th style="width: 20%;">TTL/UMUR</th>
                    <th style="width: 17%;">HUBUNGAN</th>
                    <th style="width: 15%;">PENDIDIKAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengikut as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p['nama'] ?? '' }}</td>
                        <td>{{ $p['jenis_kelamin'] ?? '' }}</td>
                        <td>{{ $p['ttl_umur'] ?? '' }}</td>
                        <td>{{ $p['hubungan'] ?? '' }}</td>
                        <td>{{ $p['pendidikan'] ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div style="font-size: 10pt; font-style: italic; margin-bottom: 10px;">Tidak ada pengikut</div>
        @endif

        <!-- Footer with Signature -->
        <div class="footer">
            <table style="width: 100%; border-collapse: collapse;">
                <!-- Baris 1: Mengetahui | Dikeluarkan di & Pada Tanggal -->
                <tr>
                    <td style="width: 50%; vertical-align: top; text-align: left;">
                        <div style="font-size: 10pt;">&nbsp;</div>
                    </td>
                    <td style="width: 50%; vertical-align: top; text-align: left; padding-left: 30px;">
                        <div style="font-size: 10pt;">
                            Dikeluarkan di : {{ $tempat_surat ?? 'Ketapang Baru' }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%; vertical-align: top; text-align: left;">
                        <div style="font-size: 10pt;">Mengetahui:</div>
                    </td>
                    <td style="width: 50%; vertical-align: top; text-align: left; padding-left: 30px;">
                        <div style="font-size: 10pt;">
                            Pada Tanggal : {{ $tanggal_surat ?? now()->translatedFormat('d F Y') }}
                        </div>
                    </td>
                </tr>
                <!-- Baris 2: Camat | Kepala Desa -->
                <tr>
                    <td style="width: 50%; vertical-align: top; text-align: left;">
                        <div style="font-weight: bold; font-size: 10pt; margin-top: 6px;">Camat Semidang Alas Maras</div>
                    </td>
                    <td style="width: 50%; vertical-align: top; text-align: left; padding-left: 30px;">
                        <div style="font-weight: bold; font-size: 10pt; margin-top: 6px;">Kepala Desa</div>
                    </td>
                </tr>
                <!-- Baris 3: Ruang TTD -->
                <tr>
                    <td style="width: 50%; vertical-align: top; text-align: left;">
                        <div style="height: 60px;"></div>
                    </td>
                    <td style="width: 50%; vertical-align: top; text-align: left; padding-left: 30px;">
                        <!-- TTD berdasarkan pilihan admin -->
                        @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                            <div style="margin-top: 5px;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 140px; height: auto;" alt="TTD Gambar">
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode')
                            <div style="margin-top: 5px;">
                                @if(isset($qr_ttd_base64) && $qr_ttd_base64)
                                    <img src="{{ $qr_ttd_base64 }}" style="width: 110px; height: auto;" alt="QR Code TTD">
                                @else
                                    <div style="height: 60px;"></div>
                                @endif
                            </div>
                        @else
                            <div style="height: 60px;"></div>
                        @endif
                    </td>
                </tr>
                <!-- Baris 4: Nama -->
                <tr>
                    <td style="width: 50%; vertical-align: top; text-align: left;">
                        <div style="font-weight: bold; font-size: 10pt;">{{ $nama_camat ?? '……………………………………………..' }}</div>
                    </td>
                    <td style="width: 50%; vertical-align: top; text-align: left; padding-left: 30px;">
                        <div style="font-weight: bold; text-decoration: underline; font-size: 10pt;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                    </td>
                </tr>
                <!-- Baris 5: NIP -->
                <tr>
                    <td style="width: 50%; vertical-align: top; text-align: left;">
                        <div style="font-size: 10pt;">NIP. {{ $nip_camat ?? '…………………………………….' }}</div>
                    </td>
                    <td style="width: 50%; vertical-align: top; text-align: left; padding-left: 30px;">
                        <div style="font-size: 10pt;">NIP. {{ $nip ?? '-' }}</div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Tembusan -->
        @if(isset($tembusan) && !empty($tembusan))
        <div style="margin-top: 15px;">
            <div style="font-weight: bold; margin-bottom: 4px; font-size: 10pt;">Tembusan :</div>
            @foreach($tembusan as $index => $item)
            <div style="margin-left: 15px; margin-bottom: 2px; font-size: 10pt;">
                {{ $index + 1 }}. {{ $item }}
            </div>
            @endforeach
        </div>
        @endif
    </div>
</body>
</html>
