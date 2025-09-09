<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        /* Use PDF-safe fonts only (no remote imports) */

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11pt;
            line-height: 1.5;
            color: #000;
            background: #ffffff;
            padding: 20px;
            margin: 0;
        }

        .page {
            max-width: 210mm;
            min-height: 297mm;
            margin: auto;
            background: #ffffff;
            padding: 30px 40px;
            position: relative;
            border: 1px solid #e5e7eb;
        }

        /* no decorative stripes to keep PDF clean */

        /* Header */
        .header {
            border-bottom: 3px double #000;
            padding-bottom: 12px;
            margin-bottom: 22px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            vertical-align: middle;
            padding: 5px;
        }

        .logo-cell {
            width: 120px;
            text-align: center;
        }

        .logo { width: 85px; height: auto; }

        .text-cell {
            text-align: center;
            padding-left: 15px;
        }

        .government-name {
            font-size: 13pt;
            font-weight: 600;
            text-transform: uppercase;
        }

        .village-name {
            font-size: 16pt;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .district-info { font-size: 11pt; }

        .contact-info { font-size: 10pt; font-style: italic; }

        /* Title */
        .document-title { text-align: center; margin: 30px 0 22px; }

        .title-main {
            font-size: 18pt;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 6px;
            letter-spacing: 1px;
        }

        .document-number {
            font-size: 11pt;
            font-family: 'Courier New', Courier, monospace;
        }

        /* Intro */
        .intro-text {
            text-align: justify;
            margin-bottom: 18px;
        }

        /* Section */
        .section { margin-bottom: 20px; }

        .section-title {
            font-size: 12pt;
            font-weight: 700;
            margin-bottom: 10px;
            padding-bottom: 4px;
            border-bottom: 1px solid #999;
            text-transform: uppercase;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 8px 10px;
            vertical-align: top;
            border-bottom: 1px solid #e5e7eb;
        }

        .data-table td:first-child { width: 170px; font-weight: 600; }

        .data-table td:last-child { font-weight: 500; }

        /* Statement */
        .statement-box { border: 1px solid #999; padding: 16px; margin: 20px 0; }

        .statement-text { text-align: justify; font-size: 11pt; }

        .highlight { font-weight: 700; }

        .closing-text { text-align: center; margin-top: 20px; font-style: italic; }

        /* Footer */
        .footer { margin-top: 35px; }

        .date-location {
            text-align: right;
            margin-bottom: 25px;
            font-size: 11pt;
            color: #374151;
            font-weight: 500;
        }

        .signature-wrapper { display: flex; justify-content: space-between; align-items: flex-start; gap: 30px; }

        .qr-section { text-align: center; }

        .qr-code { width: 90px; height: 90px; margin-bottom: 8px; }

        .qr-label { font-size: 8pt; }

        .signature-section {
            text-align: center;
            min-width: 180px;
        }

        .signature-title { margin-bottom: 60px; font-size: 10pt; }

        .official-name { font-weight: 700; font-size: 11pt; text-decoration: underline; margin-bottom: 6px; }

        .official-id { font-size: 9pt; }

        /* Stamp */
        .stamp {
            position: absolute;
            right: 120px;
            bottom: 120px;
            width: 120px;
            height: 120px;
            border: 2px solid #c0392b;
            border-radius: 50%;
            text-align: center;
            line-height: 1.2;
            font-size: 9pt;
            font-weight: 700;
            color: #c0392b;
            opacity: 0.2;
            padding-top: 30px;
        }

        /* Status Badge - lebih subtle */
        /* status badge removed for PDF cleanliness */

        /* Print compatibility */
        @media print {
            body {
                background: white;
                padding: 0;
            }

            .page { border: 1px solid #aaa; background: white; }

            .page::before {
                display: none;
            }

            .header { background: white; }

            .section { background: white; border: none; }



            .statement-box { background: #f9f9f9; }

            .footer { background: white; }

            .qr-section { background: white; }

            .stamp {
                opacity: 0.3;
            }
        }

        @media (max-width: 768px) {
            body { padding: 10px; }
            .page { padding: 20px; }
            .signature-wrapper {
                flex-direction: column;
                gap: 25px;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="status-badge">DOKUMEN RESMI</div>

        <!-- Header -->
        <div class="header">
            <table class="header-table">
                <tr>
                    <td class="logo-cell">
                        <div class="logo">S</div>
                    </td>
                    <td class="text-cell">
                        <div class="government-name">Pemerintah Kabupaten Seluma</div>
                        <div class="village-name">Desa Ketapang Baru</div>
                        <div class="district-info">Kecamatan Semidang Alas Maras</div>
                        <div class="district-info">Kabupaten Seluma, Provinsi Bengkulu</div>
                        <div class="contact-info">📧 ketapangbaru@seluma.go.id | 📮 38874</div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Title -->
        <div class="document-title">
            <div class="title-main">Surat Keterangan Kehilangan</div>
            <div class="document-number">
                📄 Nomor: 63/170505/05/05/SKK/III/2025
            </div>
        </div>

        <!-- Intro -->
        <div class="intro-text">
            Yang bertanda tangan di bawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma, dengan ini menerangkan bahwa:
        </div>

        <!-- Data Pemohon -->
        <div class="section">
            <div class="section-title">👤 Data Pemohon</div>
            <table class="data-table">
                <tr><td>Nama Lengkap</td><td>HELESMI</td></tr>
                <tr><td>NIK</td><td>1701115607870003</td></tr>
                <tr><td>Tempat, Tanggal Lahir</td><td>Muara Dua, 16 Juli 1987</td></tr>
                <tr><td>Jenis Kelamin</td><td>Perempuan</td></tr>
                <tr><td>Agama</td><td>Islam</td></tr>
                <tr><td>Pekerjaan</td><td>Mengurus Rumah Tangga</td></tr>
                <tr><td>Alamat</td><td>Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma</td></tr>
            </table>
        </div>

        <!-- Detail Kehilangan -->
        <div class="section">
            <div class="section-title">📋 Detail Kehilangan</div>
            <table class="data-table">
                <tr><td>Dokumen/Barang</td><td><span class="highlight">KARTU KELUARGA</span></td></tr>
                <tr><td>Nomor Dokumen</td><td>1705052511190005</td></tr>
                <tr><td>Tempat Kehilangan</td><td>Desa Ketapang Baru</td></tr>
                <tr><td>Waktu Kehilangan</td><td>6 Bulan yang lalu</td></tr>
                <tr><td>Keperluan</td><td>Pengurusan administrasi kependudukan</td></tr>
            </table>
        </div>

        <!-- Statement -->
        <div class="statement-box">
            <div class="statement-text">
                Orang tersebut adalah benar-benar penduduk Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma dan memang telah kehilangan <span class="highlight">KARTU KELUARGA</span> sebagaimana dimaksud di atas. Surat keterangan ini berlaku hingga tanggal <strong>06 September 2025</strong>.
            </div>
        </div>

        <div class="closing-text">
            Demikian surat keterangan ini dibuat atas dasar yang sebenarnya dan dapat dipergunakan sebagaimana mestinya.
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="date-location">
                Ketapang Baru, 06 Maret 2025
            </div>
            <div class="signature-wrapper">
                <!-- QR Code -->
                <div class="qr-section">
                    <img class="qr-code" src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=https://desa-ketapangbaru.go.id/verifikasi/63/170505/05/05/SKK/III/2025&bgcolor=f8fafc&color=1e40af" alt="QR Code">
                    <div class="qr-label">🔒 Verifikasi Digital</div>
                </div>

                <!-- Signature -->
                <div class="signature-section">
                    <div class="signature-title">An. Kepala Desa / Kasi Pemerintahan</div>
                    <div class="official-name">Desmerti Mustika Sari</div>
                    <div class="official-id">NIP. -</div>
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
