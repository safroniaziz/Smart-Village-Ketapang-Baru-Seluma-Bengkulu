<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Bersih Diri</title>
    <style>
        /* Gunakan font PDF-safe */
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 9.5pt;  /* ukuran font dikecilkan */
            line-height: 1.4;  /* line height diperapat */
            color: #000;
            margin: 0;
            padding: 0;
        }

        /* Enforce font consistency */
        .page, .header, .content, table, td, p, div {
            font-family: 'DejaVu Sans', Arial, sans-serif;
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
            font-family: 'DejaVu Sans', Arial, sans-serif;
        }
        .village-name {
            font-size: 13pt; font-weight: 700; text-transform: uppercase;
            font-family: 'DejaVu Sans', Arial, sans-serif;
        }
        .district-info { font-size: 9.5pt; }
        .contact-info { font-size: 9pt; font-style: italic; }

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

        /* Approval sections - 3 columns in 1 row */
        .approval-section {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
        .approval-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 15px;
        }
        .approval-item {
            flex: 1;
            text-align: center;
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
            Yang bertandatangan dibawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras, Kabupaten Seluma dengan ini menerangkan bahwa :
        </div>

        <!-- Data Ayah -->
        <div class="section">
            <div class="section-title">Ayah</div>
            <table class="data-table">
                <tr><td>Nama</td><td>{{ $nama_ayah ?? 'SUKARDI SUKI' }}</td></tr>
                <tr><td>Umur</td><td>{{ $umur_ayah ?? '68' }} Tahun</td></tr>
                <tr><td>Agama</td><td>{{ $agama_ayah ?? 'Islam' }}</td></tr>
                <tr><td>Pekerjaan</td><td>{{ $pekerjaan_ayah ?? 'Petani/Pekebun' }}</td></tr>
                <tr><td>Alamat</td><td>{{ $alamat_ayah ?? 'Desa Ketapang Baru, Kec. SAM, Kabupaten Seluma' }}</td></tr>
            </table>
        </div>

        <!-- Data Ibu -->
        <div class="section">
            <div class="section-title">Ibu</div>
            <table class="data-table">
                <tr><td>Nama</td><td>{{ $nama_ibu ?? 'MARTIANA' }}</td></tr>
                <tr><td>Umur</td><td>{{ $umur_ibu ?? '63' }} Tahun</td></tr>
                <tr><td>Agama</td><td>{{ $agama_ibu ?? 'Islam' }}</td></tr>
                <tr><td>Pekerjaan</td><td>{{ $pekerjaan_ibu ?? 'Mengurus Rumah Tangga' }}</td></tr>
                <tr><td>Alamat</td><td>{{ $alamat_ibu ?? 'Desa Ketapang Baru, Kec. SAM, Kabupaten Seluma' }}</td></tr>
            </table>
        </div>

        <!-- Data Anak -->
        <div class="section">
            <div class="section-title">Anak</div>
            <table class="data-table">
                <tr><td>Nama</td><td>{{ $nama_anak ?? 'NEPI RESMAINI' }}</td></tr>
                <tr><td>Tempat/Tanggal lahir</td><td>{{ $tempat_lahir_anak ?? 'Ketapang Baru' }}, {{ $tanggal_lahir_anak ?? '29 Mei 1985' }}</td></tr>
                <tr><td>Kebangsaan</td><td>{{ $kebangsaan_anak ?? 'Indonesia' }}</td></tr>
                <tr><td>Agama</td><td>{{ $agama_anak ?? 'Islam' }}</td></tr>
                <tr><td>Pekerjaan</td><td>{{ $pekerjaan_anak ?? 'Petani/Pekebun' }}</td></tr>
                <tr><td>Alamat</td><td>{{ $alamat_anak ?? 'Rimbo Besar, Kecamatan SAM, Kabupaten Seluma' }}</td></tr>
            </table>
        </div>

        <!-- Statement -->
        <div class="statement-box">
            <div class="statement-text">
                Menurut pengamatan kami bahwah nomor satu dan dua diatas adalah benar-benar Orang Tua dari anak tersebut. Berdasarkan pengetahuan kami ketiga orang tersebut diatas benar-benar berkelakuan baik dan tidak terlibat G 30 S PKI, dan Organisasi terlarang maupun pekara pidana lainnya.
            </div>
        </div>

        <div class="closing-text">
            Demikianlah surat keterangan ini saya buat dengan sebenarnya dan dapat dipergunakan seperlunya.
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
                    <div class="official-name">{{ $nama_kepala ?? 'ZULTAN ALHARA' }}</div>
                    <div class="official-id">{{ $nip ?? 'NIP. -' }}</div>
                </div>
            </div>
        </div>

        <!-- Approval Sections - 3 columns in 1 row -->
        <div class="approval-section">
            <div class="approval-row">
                <div class="approval-item">
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
                </div>

                <div class="approval-item">
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
                </div>

                <div class="approval-item">
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
                </div>
            </div>
        </div>

        <!-- Stamp -->
        <div class="stamp">
            STEMPEL<br>DESA<br>KETAPANG<br>BARU
        </div>
    </div>
</body>
</html>
