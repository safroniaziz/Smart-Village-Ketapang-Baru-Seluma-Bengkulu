<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Bersih Diri</title>
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
        .document-title { text-align: center; margin: 30px 0 20px; }
        .title-main {
            font-size: 14pt; font-weight: 700; text-transform: uppercase;
            margin-bottom: 5px; letter-spacing: 0.5px;
        }
        .document-number { font-size: 9.5pt; font-family: 'DejaVu Sans Mono', 'Courier New', monospace; }

        /* Section */
        .section { margin-bottom: 15px; }
        .section-title {
            font-size: 10pt; font-weight: 700; margin-bottom: 4px;
            padding-bottom: 2px; border-bottom: 1px solid #555;
            font-family: 'DejaVu Sans', Arial, sans-serif;
            text-transform: uppercase;
        }
        .data-table { width: 100%; border-collapse: collapse; }
        .data-table td {
            padding: 3px 5px;  /* padding lebih kecil */
            vertical-align: top;
            border-bottom: 1px dashed #bbb;  /* garis putus-putus */
            font-size: 9pt;  /* ukuran font lebih kecil */
            line-height: 1.3;  /* line height lebih rapat */
            letter-spacing: 0;
        }

        .data-table td:first-child {
            width: 160px;
            font-family: inherit;   /* pakai font yg sama dengan body */
        }

        /* Intro */
        .intro-text {
            text-align: justify;
            font-size: 9pt;
            line-height: 1.3;
            margin-bottom: 10px;
        }

        /* Statement */
        .statement-box {
            margin: 10px 0;
            padding: 8px 0;
        }
        .statement-text { text-align: justify; font-size: 9pt; }

        .closing-text {
            text-align: center; margin-top: 15px; font-style: italic; font-size: 9pt;
        }

        /* Footer */
        .footer { margin-top: 30px; }
        .signature-wrapper {
            display: flex; justify-content: flex-end; align-items: flex-start;
            gap: 20px;
        }
        .signature-section { text-align: center; }
        .signature-title { margin-bottom: 40px; }
        .official-name { font-weight: 700; text-decoration: underline; }
        .official-id { font-size: 9pt; }

        /* QR Code */
        .qr-code {
            width: 90px; height: 90px;
            border: 1px solid #ddd; padding: 5px;
        }

        /* Stamp */
        .stamp {
            position: absolute; right: 140px; bottom: 140px;
            width: 120px; height: 120px; border: 3px solid #c0392b;
            border-radius: 50%; text-align: center; line-height: 1.2;
            font-size: 9pt; font-weight: 700; color: #c0392b;
            opacity: 0.2; padding-top: 30px;
        }

        /* Approval sections - 3 columns in 1 row using table */
        .approval-section {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
        .approval-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .approval-table td {
            width: 33.33%;
            text-align: center;
            vertical-align: top;
            padding: 0 5px;
            font-size: 8pt;
        }
        .approval-title {
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 9pt;
        }
        .approval-form {
            margin: 5px 0;
            font-size: 7pt;
        }
        .form-line {
            margin: 3px 0;
        }
        .form-label {
            display: inline-block;
            width: 50px;
            text-align: left;
        }
        .form-dots {
            border-bottom: 1px dotted #000;
            display: inline-block;
            width: 80px;
            margin-left: 5px;
        }

        @media print {
            body { background: white; padding: 0; }
            .page { box-shadow: none; border: none; }
            .stamp { opacity: 0.3; }
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
            <div class="title-main">Surat Keterangan Bersih Diri</div>
            <div class="document-number">
                Nomor: {{ $nomor_surat ?? '90/170505/05/05/SKBD/KTB/V/2025' }}
            </div>
        </div>

        <!-- Intro -->
        <div class="intro-text">
            Yang bertanda tangan dibawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma, Menerangkan bahwa :
        </div>

        <!-- Data Pemohon -->
        <div class="section" style="margin: 20px 0;">
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
            <div style="text-align: right; margin-bottom: 10px;">
                {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? '07 Mei 2025' }}
            </div>
            <div class="signature-wrapper">
                <!-- QR Code -->
                @if(isset($qr_base64))
                <div>
                    <img class="qr-code" src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code">
                    <div style="font-size:9pt; text-align:center;">Verifikasi Online</div>
                </div>
                @endif

                <!-- Signature -->
                <div class="signature-section">
                    <div class="signature-title">Kepala Desa</div>

                    @if(isset($jenis_ttd) && $jenis_ttd === 'qrcode' && isset($qr_ttd_base64))
                        <!-- QR Code TTD -->
                        <div style="text-align: center; margin: 20px 0;">
                            <img src="{{ $qr_ttd_base64 }}" style="width: 120px; height: auto;" alt="QR Code TTD">
                            <p style="font-size: 7pt; color: #666; margin-top: 5px;">
                                Scan untuk verifikasi: {{ $tracking_number ?? '' }}
                            </p>
                        </div>
                    @elseif(isset($jenis_ttd) && $jenis_ttd === 'gambar' && isset($ttd_image_path) && file_exists($ttd_image_path))
                        <!-- Regular TTD -->
                        <div style="text-align: center; margin: 20px 0;">
                            <img src="{{ $ttd_image_path }}" style="width: 150px; height: auto;" alt="Tanda Tangan">
                        </div>
                    @else
                        <!-- Fallback: Empty signature space -->
                        <div style="height: 80px; text-align: center; margin: 20px 0;">
                            <p style="font-size: 8pt; color: #999; margin-top: 60px;">(Tanda Tangan)</p>
                        </div>
                    @endif

                    <div class="official-name">{{ $nama_kepala ?? 'ZULTAN ALHARA' }}</div>
                    <div class="official-id">{{ $nip ?? 'NIP. -' }}</div>
                </div>
            </div>
        </div>

        <!-- Approval Sections - 3 columns in 1 row using table -->
        <div class="approval-section">
            <div style="text-align: center; font-weight: 700; margin-bottom: 15px; font-size: 10pt;">MENGETAHUI :</div>
            <table class="approval-table">
                <tr>
                    <td>
                        <div class="approval-form">
                            <div class="form-line">
                                <span class="form-label">Nomor</span><span class="form-dots"></span>
                            </div>
                            <div class="form-line">
                                <span class="form-label">Tanggal</span><span class="form-dots"></span>
                            </div>
                        </div>
                        <div style="margin-top: 8px; font-weight: 700;">Camat SAM</div>
                        <div style="margin-top: 25px; font-weight: 700;">{{ $nama_camat ?? 'Nama Camat' }}</div>
                        <div style="margin-top: 3px;">NIP. {{ $nip_camat ?? '........................' }}</div>
                    </td>

                    <td>
                        <div class="approval-form">
                            <div class="form-line">
                                <span class="form-label">Nomor</span><span class="form-dots"></span>
                            </div>
                            <div class="form-line">
                                <span class="form-label">Tanggal</span><span class="form-dots"></span>
                            </div>
                        </div>
                        <div style="margin-top: 8px; font-weight: 700;">DANRAMIL SAM</div>
                        <div style="margin-top: 25px; font-weight: 700;">{{ $nama_danramil ?? 'Nama Danramil' }}</div>
                        <div style="margin-top: 3px;">NRP. {{ $nrp_danramil ?? '........................' }}</div>
                    </td>

                    <td>
                        <div class="approval-form">
                            <div class="form-line">
                                <span class="form-label">Nomor</span><span class="form-dots"></span>
                            </div>
                            <div class="form-line">
                                <span class="form-label">Tanggal</span><span class="form-dots"></span>
                            </div>
                        </div>
                        <div style="margin-top: 8px; font-weight: 700;">POLSEK SAM</div>
                        <div style="margin-top: 25px; font-weight: 700;">{{ $nama_kapolsek ?? 'Nama Kapolsek' }}</div>
                        <div style="margin-top: 3px;">NRP. {{ $nrp_kapolsek ?? '........................' }}</div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Tembusan -->
        @if(isset($tembusan) && !empty($tembusan))
        <div style="margin-top: 20px;">
            <div style="font-weight: 700; margin-bottom: 5px;">Tembusan :</div>
            @foreach($tembusan as $index => $item)
            <div style="margin-left: 15px; margin-bottom: 2px;">
                {{ $index + 1 }}. {{ $item }}
            </div>
            @endforeach
        </div>
        @endif

        <!-- Stamp -->
        <div class="stamp">
            STEMPEL<br>DESA<br>KETAPANG<br>BARU
        </div>
    </div>
</body>
</html>
