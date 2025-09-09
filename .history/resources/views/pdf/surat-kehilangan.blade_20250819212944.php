<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        /* Gunakan font PDF-safe */
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11pt;
            line-height: 1.5;
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
            font-size: 13pt; font-weight: 600; text-transform: uppercase;
            font-family: 'DejaVu Sans', Arial, sans-serif;
        }
        .village-name {
            font-size: 15pt; font-weight: 700; text-transform: uppercase;
            font-family: 'DejaVu Sans', Arial, sans-serif;
        }
        .district-info { font-size: 11pt; }
        .contact-info { font-size: 10pt; font-style: italic; }

        /* Title */
        .document-title { text-align: center; margin: 30px 0 20px; }
        .title-main {
            font-size: 18pt; font-weight: 700; text-transform: uppercase;
            margin-bottom: 5px; letter-spacing: 1px;
        }
        .document-number { font-size: 11pt; font-family: 'DejaVu Sans Mono', 'Courier New', monospace; }

        /* Section */
        .section { margin-bottom: 20px; }
        .section-title {
            font-size: 11pt; font-weight: 700; margin-bottom: 6px;
            padding-bottom: 3px; border-bottom: 1px solid #555;
            font-family: 'DejaVu Sans', Arial, sans-serif;
            text-transform: uppercase;
        }
        .data-table { width: 100%; border-collapse: collapse; }
        .data-table td {
    padding: 4px 6px;
    vertical-align: top;
    border-bottom: 1px dashed #bbb;
    font-size: 11pt;
    font-weight: normal;     /* samakan dengan teks biasa */
    line-height: 1.5;        /* samakan dengan paragraf */
    letter-spacing: 0.2px;   /* biar lebih lega */
}

.data-table td:first-child {
    width: 160px;
    font-family: inherit;   /* pakai font yg sama dengan body */
}



        /* Statement */
        .statement-box {
            padding: 10px;
            margin: 20px 0;
        }
        .statement-text { text-align: justify; font-size: 11pt; }

        .closing-text {
            text-align: center; margin-top: 20px; font-style: italic;
        }

        /* Footer */
        .footer { margin-top: 50px; }
        .signature-wrapper {
            display: flex; justify-content: flex-end; align-items: flex-start;
            gap: 30px;
        }
        .signature-section { text-align: center; }
        .signature-title { margin-bottom: 60px; }
        .official-name { font-weight: 700; text-decoration: underline; }
        .official-id { font-size: 10pt; }

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
            <div class="title-main">Surat Keterangan Kehilangan</div>
            <div class="document-number">
                Nomor: {{ $nomor_surat ?? '63/170505/05/05/SKK/III/2025' }}
            </div>
        </div>

        <!-- Intro -->
        <p style="text-align: justify; margin-bottom: 20px;">
            Yang bertanda tangan di bawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma, dengan ini menerangkan bahwa:
        </p>

        <!-- Data Pemohon -->
        <div class="section">
            <div class="section-title">Data Pemohon</div>
            <table class="data-table">
                <tr><td>Nama Lengkap</td><td>{{ $nama_pemohon ?? 'HELESMI' }}</td></tr>
                <tr><td>NIK</td><td>{{ $nik ?? '1701115607870003' }}</td></tr>
                <tr><td>Tempat, Tanggal Lahir</td><td>{{ $tempat_lahir ?? 'Muara Dua' }}, {{ $tanggal_lahir ?? '16 Juli 1987' }}</td></tr>
                <tr><td>Jenis Kelamin</td><td>{{ $jenis_kelamin ?? 'Perempuan' }}</td></tr>
                <tr><td>Agama</td><td>{{ $agama ?? 'Islam' }}</td></tr>
                <tr><td>Pekerjaan</td><td>{{ $pekerjaan ?? 'Mengurus Rumah Tangga' }}</td></tr>
                <tr><td>Alamat</td><td>{{ $alamat ?? 'Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma' }}</td></tr>
            </table>
        </div>

        <!-- Detail Kehilangan -->
        <div class="section">
            <div class="section-title">Detail Kehilangan</div>
            <table class="data-table">
                <tr><td>Dokumen/Barang</td><td>{{ $jenis_dokumen ?? 'KARTU KELUARGA' }}</td></tr>
                <tr><td>Nomor Dokumen</td><td>{{ $nomor_dokumen ?? '1705052511190005' }}</td></tr>
                <tr><td>Tempat Kehilangan</td><td>{{ $tempat_kehilangan ?? 'Desa Ketapang Baru' }}</td></tr>
                <tr><td>Waktu Kehilangan</td><td>{{ $waktu_kehilangan ?? '6 Bulan yang lalu' }}</td></tr>
                <tr><td>Keperluan</td><td>{{ $keperluan ?? 'Pengurusan administrasi kependudukan' }}</td></tr>
            </table>
        </div>

        <!-- Statement -->
        <div class="statement-box">
            <p class="statement-text">
                Orang tersebut adalah benar-benar penduduk Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma dan memang telah kehilangan <strong>{{ $jenis_dokumen ?? 'KARTU KELUARGA' }}</strong> sebagaimana dimaksud di atas. Surat keterangan ini berlaku hingga tanggal <strong>{{ date('d F Y', strtotime('+6 months')) }}</strong>.
            </p>
        </div>

        <div class="closing-text">
            Demikian surat keterangan ini dibuat atas dasar yang sebenarnya dan dapat dipergunakan sebagaimana mestinya.
        </div>

        <!-- Footer -->
        <div class="footer">
            <div style="text-align: right; margin-bottom: 10px;">
                {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? '06 Maret 2025' }}
            </div>
            <div class="signature-wrapper">
                <!-- QR Code -->
                <div>
                    <img class="qr-code" src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ urlencode('https://desa-ketapangbaru.go.id/verifikasi/'.$nomor_surat ?? '63/170505/05/05/SKK/III/2025') }}" alt="QR Code">
                    <div style="font-size:9pt; text-align:center;">Verifikasi Online</div>
                </div>

                <!-- Signature -->
                <div class="signature-section">
                    <div class="signature-title">An. Kepala Desa / Kasi Pemerintahan</div>
                    <div class="official-name">{{ $nama_kepala ?? 'Desmerti Mustika Sari' }}</div>
                    <div class="official-id">{{ $nip ?? 'NIP. -' }}</div>
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
