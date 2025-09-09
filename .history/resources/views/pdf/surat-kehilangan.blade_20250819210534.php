<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Times+New+Roman&display=swap');

        body {
            font-family: 'Times New Roman', serif;
            font-size: 11pt;
            line-height: 1.5;
            color: #000;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            padding: 20px;
            margin: 0;
        }

        .page {
            max-width: 210mm;
            min-height: 297mm;
            margin: auto;
            background: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1), 0 4px 15px rgba(0,0,0,0.05);
            position: relative;
            border: 1px solid #e5e7eb;
        }

        .page::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #1e40af, #3b82f6, #06b6d4);
        }

        /* Header */
        .header {
            border-bottom: 3px double #1e40af;
            padding-bottom: 15px;
            margin-bottom: 25px;
            background: linear-gradient(135deg, #fefefe 0%, #f8fafc 100%);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
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

        .logo {
            width: 85px;
            height: 85px;
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            margin: 0 auto;
            box-shadow: 0 6px 20px rgba(30, 64, 175, 0.25);
            border: 3px solid #ffffff;
        }

        .text-cell {
            text-align: center;
            padding-left: 15px;
        }

        .government-name {
            font-size: 13pt;
            font-weight: 600;
            text-transform: uppercase;
            font-family: 'Inter', sans-serif;
            color: #1e40af;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
        }

        .village-name {
            font-size: 16pt;
            font-weight: 700;
            text-transform: uppercase;
            font-family: 'Inter', sans-serif;
            color: #1f2937;
            margin-bottom: 8px;
            letter-spacing: 1px;
        }

        .district-info {
            font-size: 11pt;
            color: #374151;
            margin-bottom: 2px;
            font-weight: 500;
        }

        .contact-info {
            font-size: 10pt;
            font-style: italic;
            color: #6b7280;
            background: #f1f5f9;
            padding: 6px 12px;
            border-radius: 15px;
            display: inline-block;
            margin-top: 5px;
            border: 1px solid #e5e7eb;
        }

        /* Title */
        .document-title {
            text-align: center;
            margin: 35px 0 25px;
        }

        .title-main {
            font-size: 20pt;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 1.5px;
            color: #1e40af;
            text-shadow: 0 2px 4px rgba(30, 64, 175, 0.1);
            font-family: 'Inter', sans-serif;
        }

        .document-number {
            font-size: 11pt;
            font-family: 'Times New Roman', serif;
            color: #6b7280;
            background: #f8fafc;
            padding: 6px 15px;
            border-radius: 20px;
            display: inline-block;
            border: 1px solid #e5e7eb;
        }

        /* Intro */
        .intro-text {
            text-align: justify;
            margin-bottom: 25px;
            font-size: 11pt;
            line-height: 1.6;
            color: #374151;
            background: #fefefe;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid #3b82f6;
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
        }

        /* Section */
        .section {
            margin-bottom: 25px;
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            border: 1px solid #f1f5f9;
            transition: all 0.2s ease;
        }

        .section:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
            transform: translateY(-1px);
        }

        .section-title {
            font-size: 12pt;
            font-weight: 700;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e5e7eb;
            font-family: 'Inter', sans-serif;
            text-transform: uppercase;
            color: #1e40af;
            letter-spacing: 0.5px;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 40px;
            height: 2px;
            background: #3b82f6;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 10px 12px;
            vertical-align: top;
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.2s ease;
        }

        .data-table tr:hover td {
            background-color: #f8fafc;
        }

        .data-table td:first-child {
            width: 170px;
            font-weight: 600;
            color: #374151;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 6px 0 0 6px;
        }

        .data-table td:last-child {
            color: #1f2937;
            font-weight: 500;
            background: linear-gradient(135deg, #ffffff 0%, #fefefe 100%);
            border-radius: 0 6px 6px 0;
        }

        /* Statement */
        .statement-box {
            border: 2px solid #3b82f6;
            padding: 20px;
            margin: 25px 0;
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.12);
            position: relative;
        }

        .statement-box::before {
            content: '📋';
            position: absolute;
            top: -12px;
            left: 20px;
            background: white;
            padding: 6px;
            border-radius: 50%;
            font-size: 14px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .statement-text {
            text-align: justify;
            font-size: 11pt;
            color: #1e40af;
            font-weight: 500;
            line-height: 1.6;
            margin-top: 5px;
        }

        .highlight {
            background: linear-gradient(120deg, #f59e0b, #d97706);
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 700;
            text-shadow: 0 1px 2px rgba(0,0,0,0.2);
        }

        .closing-text {
            text-align: center;
            margin-top: 25px;
            font-style: italic;
            color: #6b7280;
            font-size: 10pt;
            background: #f9fafb;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            background: #fefefe;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
            border: 1px solid #f1f5f9;
        }

        .date-location {
            text-align: right;
            margin-bottom: 25px;
            font-size: 11pt;
            color: #374151;
            font-weight: 500;
        }

        .signature-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 30px;
        }

        .qr-section {
            text-align: center;
            background: #f8fafc;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .qr-code {
            width: 90px;
            height: 90px;
            border-radius: 6px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            margin-bottom: 8px;
        }

        .qr-label {
            font-size: 8pt;
            color: #6b7280;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .signature-section {
            text-align: center;
            min-width: 180px;
        }

        .signature-title {
            margin-bottom: 70px;
            font-size: 10pt;
            color: #374151;
        }

        .official-name {
            font-weight: 700;
            font-size: 11pt;
            color: #1f2937;
            text-decoration: underline;
            margin-bottom: 6px;
        }

        .official-id {
            font-size: 9pt;
            color: #6b7280;
        }

        /* Stamp */
        .stamp {
            position: absolute;
            right: 120px;
            bottom: 120px;
            width: 120px;
            height: 120px;
            border: 3px solid #dc2626;
            border-radius: 50%;
            text-align: center;
            line-height: 1.2;
            font-size: 9pt;
            font-weight: 700;
            color: #dc2626;
            opacity: 0.4;
            padding-top: 32px;
            transform: rotate(-15deg);
            background: radial-gradient(circle, rgba(220, 38, 38, 0.05) 0%, transparent 70%);
            box-shadow: inset 0 0 20px rgba(220, 38, 38, 0.1);
        }

        /* Status Badge - lebih subtle */
        .status-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 8pt;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
            opacity: 0.9;
        }

        /* Print compatibility */
        @media print {
            body {
                background: white;
                padding: 0;
            }

            .page {
                box-shadow: none;
                border: 1px solid #aaa;
                border-radius: 0;
                background: white;
            }

            .page::before {
                display: none;
            }

            .header {
                background: white;
                box-shadow: none;
            }

            .section {
                background: white;
                box-shadow: none;
                border: none;
            }

            .status-badge {
                background: #666;
                box-shadow: none;
            }

            .statement-box {
                background: #f9f9f9;
                box-shadow: none;
            }

            .footer {
                background: white;
                box-shadow: none;
            }

            .qr-section {
                background: white;
            }

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
