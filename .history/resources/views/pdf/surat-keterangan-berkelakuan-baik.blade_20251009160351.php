<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Berkelakuan Baik</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.6;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .page {
            max-width: 210mm;
            min-height: 297mm;
            margin: auto;
            padding: 30px 40px;
            background: #fff;
        }

        /* Header */
        .header {
            border-bottom: 2px double #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header-table { width: 100%; border-collapse: collapse; }
        .header-table td { vertical-align: middle; }
        .logo-cell { width: 120px; text-align: center; }
        .logo img { width: 90px; }
        .text-cell { text-align: center; }
        .government-name {
            font-size: 11pt; font-weight: 600; text-transform: uppercase;
        }
        .village-name {
            font-size: 13pt; font-weight: 700; text-transform: uppercase;
        }
        .district-info { font-size: 9.5pt; }
        .contact-info { font-size: 9pt; font-style: italic; }

        /* Content */
        .intro-text { text-align: justify; margin: 15px 0; }

        /* Title */
        .document-title { text-align: center; margin: 20px 0; }
        .title-main {
            font-size: 14pt; font-weight: 700; text-transform: uppercase;
            text-decoration: underline; margin-bottom: 5px;
        }
        .document-number { font-size: 10pt; }

        /* Footer & Signature */
        .footer {
            margin-top: 40px;
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
            margin: 20px 0;
        }
        .signature-date {
            margin-bottom: 60px;
        }
        .signature-name {
            font-weight: 700;
            text-decoration: underline;
        }

        /* QR Code */
        .qr-section {
            text-align: left;
            margin-top: 20px;
        }
        .qr-code {
            width: 80px;
            height: 80px;
        }
        .tracking-info {
            font-size: 8pt;
            margin-top: 5px;
            color: #666;
        }

        /* Tembusan */
        .tembusan-section {
            margin-top: 30px;
            page-break-inside: avoid;
        }
        .tembusan-title {
            font-weight: 700;
            margin-bottom: 10px;
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
                        <div class="government-name">Pemerintah Kabupaten Seluma</div>
                        <div class="village-name">Desa Ketapang Baru</div>
                        <div class="district-info">Kecamatan Semidang Alas Maras</div>
                        <div class="district-info">Kabupaten Seluma, Provinsi Bengkulu</div>
                        <div class="contact-info">Kode Pos: 38874 | Email: ketapangbaru@seluma.go.id</div>
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
        <div style="margin: 20px 0;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="width: 150px; padding: 3px 0; vertical-align: top;">Nama</td>
                    <td style="width: 20px; text-align: center; vertical-align: top;">:</td>
                    <td style="vertical-align: top;">{{ strtoupper($nama_pemohon ?? 'PRENGKI PIRMANSAH') }}</td>
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
        <div style="margin: 20px 0; text-align: justify; line-height: 1.8;">
            <p style="margin: 0;">
                Orang tersebut adalah benar penduduk Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma dan Berdasarkan pengetahuan kami orang tersebut diatas benar-benar berkelakuan baik dan tidak terlibat G 30 S PKI, dan Organisasi terlarang maupun pekara pidana lainnya.
            </p>
        </div>

        <div style="margin: 20px 0; text-align: justify;">
            <p style="margin: 0;">
                Demikian surat keterangan ini dibuat atas dasar yang sebenarnya dan dapat dipergunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="signature-left">
                <!-- QR Code Section (if exists) -->
                @if(isset($tracking_qr_code) && $tracking_qr_code)
                <div class="qr-section">
                    <img src="data:image/png;base64,{{ $tracking_qr_code }}" class="qr-code" alt="QR Code">
                    <div class="tracking-info">
                        Tracking: {{ $tracking_number ?? '' }}
                    </div>
                </div>
                @endif
            </div>

            <div class="signature-right">
                <div class="signature-section">
                    <div class="signature-date">{{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? now()->format('d F Y') }}</div>
                    <div>Kepala Desa Ketapang Baru</div>

                    @if(isset($jenis_ttd) && $jenis_ttd === 'qrcode' && isset($qr_ttd_base64))
                        <!-- QR Code TTD -->
                        <div style="margin: 20px 0;">
                            <img src="data:image/png;base64,{{ $qr_ttd_base64 }}" style="width: 80px; height: 80px;" alt="QR TTD">
                        </div>
                    @else
                        <!-- Space for manual signature -->
                        <div style="height: 60px;"></div>
                    @endif

                    <div class="signature-name">{{ $kepala_desa_nama ?? 'ZULTAN ALHARA' }}</div>
                </div>
            </div>
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
