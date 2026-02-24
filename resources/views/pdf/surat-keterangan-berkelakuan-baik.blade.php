<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Berkelakuan Baik</title>
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

        /* Content */
        .intro-text { text-align: justify; margin: 15px 0; }

        /* Title */
        .document-title { text-align: center; margin: 5px 0; }
        .title-main {
            font-size: 14pt; font-weight: bold; text-transform: uppercase;
            text-decoration: underline; margin-bottom: 0px;
        }
        .document-number { font-size: 10pt; }

        /* Footer & Signature */
        .footer {
            margin-top: 15px;
            display: table;
            width: 100%;
        }
        .signature-left, .signature-right {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }
        .signature-section {
            text-align: center;
            margin: 10px 0;
        }
        .signature-date {
            margin-bottom: 60px;
        }
        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }

        /* QR Code */
        .qr-section {
            text-align: left;
            margin-top: 20px;
        }
        .qr-code {
            width: 80px;
            height: 50px;
        }
        .tracking-info {
            font-size: 8pt;
            margin-top: 5px;
            color: #666;
        }

        /* Tembusan */
        .tembusan-section {
            margin-top: 15px;
            page-break-inside: avoid;
        }
        .tembusan-title {
            font-weight: bold;
            margin-bottom: 0px;
        }
        .tembusan-list {
            margin-left: 0;
            padding-left: 0;
        }
        .tembusan-item {
            margin: 3px 0;
            list-style: none;
        }

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
            <div class="title-main">Surat Keterangan Berkelakuan Baik</div>
            <div class="document-number">
                Nomor: {{ $nomor_surat ?? '132/170505/05/05/SKBB/' . date('m') . '/' . date('Y') }}
            </div>
        </div>

        <!-- Intro -->
        <div class="intro-text">
            Yang bertanda tangan dibawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma, Menerangkan bahwa :
        </div>

        <!-- Data Pemohon -->
        <div style="margin: 10px 0;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="width: 150px; padding: 3px 0; vertical-align: top;">Nama</td>
                    <td style="width: 20px; text-align: center; vertical-align: top;">:</td>
                    <td style="vertical-align: top;">{{ strtoupper($nama_pemohon ?? '-') }}</td>
                </tr>
                <tr>
                    <td style="padding: 3px 0; vertical-align: top;">Nik</td>
                    <td style="text-align: center; vertical-align: top;">:</td>
                    <td style="vertical-align: top;">{{ $nik_pemohon ?? '1705050107030044' }}</td>
                </tr>
                <tr>
                    <td style="padding: 3px 0; vertical-align: top;">Tempat/Tgllahir</td>
                    <td style="text-align: center; vertical-align: top;">:</td>
                    <td style="vertical-align: top;">{{ $tempat_lahir ?? 'Ketapang Baru' }}, {{ $tanggal_lahir ?? '12 Oktober 1979' }}</td>
                </tr>
                <tr>
                    <td style="padding: 3px 0; vertical-align: top;">Jenis kelamin</td>
                    <td style="text-align: center; vertical-align: top;">:</td>
                    <td style="vertical-align: top;">{{ $jenis_kelamin ?? 'Laki-Laki' }}</td>
                </tr>
                <tr>
                    <td style="padding: 3px 0; vertical-align: top;">Agama</td>
                    <td style="text-align: center; vertical-align: top;">:</td>
                    <td style="vertical-align: top;">{{ $agama ?? 'Islam' }}</td>
                </tr>
                <tr>
                    <td style="padding: 3px 0; vertical-align: top;">Pekerjaan</td>
                    <td style="text-align: center; vertical-align: top;">:</td>
                    <td style="vertical-align: top;">{{ $pekerjaan ?? 'Petani / Pekebun' }}</td>
                </tr>
            </table>
        </div>

        <!-- Statement -->
        <div style="margin: 10px 0; text-align: justify; line-height: 1.8;">
            <p style="margin: 0;">
                Orang tersebut adalah benar penduduk Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma dan Berdasarkan pengetahuan kami orang tersebut diatas benar-benar berkelakuan baik dan tidak terlibat G 30 S PKI, dan Organisasi terlarang maupun pekara pidana lainnya.
            </p>
        </div>

        <div style="margin: 10px 0; text-align: justify;">
            <p style="margin: 0;">
                Demikian surat keterangan ini dibuat atas dasar yang sebenarnya dan dapat dipergunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- Footer -->
        <div style="margin-top: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="width: 50%;"></td>
                    <td style="width: 50%; text-align: center;">
                        <div style="margin-bottom: 0px; font-size: 10pt;">
                            {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? '07 Mei 2025' }}
                        </div>
                        
                        <div style="font-weight: bold; margin-bottom: 0px; font-size: 10pt;">Kepala Desa</div>

                        @if(isset($jenis_ttd) && $jenis_ttd == 'qrcode')
                            <div style="margin-bottom: 0px;">
                                <img src="{{ $qr_ttd_base64 }}" style="width: 110px; height: auto;" alt="QR Code TTD">
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'gambar')
                            <div style="margin-bottom: 0px;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 150px; height: auto;" alt="TTD Gambar">
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'manual')
                            <div style="height: 50px; margin-bottom: 0px;"></div>
                        @else
                            <div style="height: 50px; margin-bottom: 0px;"></div>
                        @endif

                        @if(isset($qr_base64) && $qr_base64)
                        <div style="margin-bottom: 0px;">
                            <img src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code Verifikasi" style="width: 60px; height: 60px;">
                        </div>
                        @endif

                        <div style="font-weight: bold; text-decoration: underline; font-size: 10pt;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                        <div style="font-size: 10pt;">NIP. {{ $nip ?? '-' }}</div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Tembusan Section -->
        @if(isset($tembusan) && count($tembusan) > 0)
        <div class="tembusan-section">
            <div class="tembusan-title">Tembusan:</div>
            <ul class="tembusan-list">
                @foreach($tembusan as $item)
                    <li class="tembusan-item">{{ $loop->iteration }}. {{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</body>
</html>
