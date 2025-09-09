<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            font-size: 11pt;
            line-height: 1.6;
            color: #1a202c;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 210mm;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            position: relative;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3182ce, #805ad5, #38b2ac);
        }

        .page-content {
            padding: 40px;
            position: relative;
        }

        .status-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 9pt;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(72, 187, 120, 0.3);
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .logo-section {
            flex-shrink: 0;
        }

        .logo {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #3182ce, #2c5282);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 36px;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            box-shadow: 0 8px 20px rgba(49, 130, 206, 0.3);
        }

        .header-text {
            flex: 1;
            text-align: center;
        }

        .government-name {
            font-size: 14pt;
            font-weight: 700;
            color: #2d3748;
            text-transform: uppercase;
            margin-bottom: 6px;
            font-family: 'Playfair Display', serif;
        }

        .village-name {
            font-size: 18pt;
            font-weight: 700;
            color: #1a202c;
            text-transform: uppercase;
            margin-bottom: 8px;
            font-family: 'Playfair Display', serif;
        }

        .district-info {
            font-size: 11pt;
            color: #4a5568;
            margin-bottom: 3px;
        }

        .contact-info {
            font-size: 10pt;
            color: #718096;
            background: #f1f5f9;
            padding: 6px 12px;
            border-radius: 12px;
            display: inline-block;
            margin-top: 6px;
        }

        /* Title Styles */
        .document-title {
            text-align: center;
            margin: 35px 0 30px;
        }

        .title-main {
            font-size: 22pt;
            font-weight: 700;
            color: #2b6cb0;
            text-transform: uppercase;
            margin-bottom: 10px;
            letter-spacing: 1.5px;
            font-family: 'Playfair Display', serif;
        }

        .document-number {
            font-size: 11pt;
            color: #718096;
            background: #f7fafc;
            padding: 8px 16px;
            border-radius: 20px;
            display: inline-block;
            border: 1px solid #e2e8f0;
        }

        /* Intro Text */
        .intro-text {
            text-align: justify;
            margin-bottom: 25px;
            font-size: 11pt;
            color: #2d3748;
            line-height: 1.7;
            background: #f8fafc;
            padding: 18px;
            border-radius: 10px;
            border-left: 4px solid #3182ce;
        }

        /* Section Styles */
        .section {
            margin-bottom: 25px;
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .section:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 13pt;
            font-weight: 700;
            margin-bottom: 15px;
            color: #2b6cb0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-family: 'Playfair Display', serif;
            position: relative;
            padding-bottom: 8px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: linear-gradient(90deg, #3182ce, #805ad5);
            border-radius: 1px;
        }

        /* Data Table */
        .data-row {
            display: flex;
            margin-bottom: 12px;
            padding: 12px;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            border-radius: 8px;
            border: 1px solid #f1f5f9;
            transition: all 0.2s ease;
        }

        .data-row:hover {
            background: linear-gradient(135deg, #edf2f7 0%, #f8fafc 100%);
            transform: translateX(3px);
        }

        .data-label {
            width: 160px;
            font-weight: 600;
            color: #4a5568;
            flex-shrink: 0;
            position: relative;
            padding-left: 15px;
        }

        .data-label::before {
            content: '▶';
            position: absolute;
            left: 0;
            color: #3182ce;
            font-size: 8pt;
        }

        .data-value {
            flex: 1;
            color: #1a202c;
            font-weight: 500;
            padding-left: 15px;
        }

        /* Statement Box */
        .statement-box {
            background: linear-gradient(135deg, #ebf8ff 0%, #bee3f8 100%);
            border: 2px solid #3182ce;
            border-radius: 12px;
            padding: 20px;
            margin: 25px 0;
            position: relative;
            box-shadow: 0 6px 20px rgba(49, 130, 206, 0.15);
        }

        .statement-box::before {
            content: '📋';
            position: absolute;
            top: -12px;
            left: 20px;
            background: #ffffff;
            padding: 6px;
            border-radius: 50%;
            font-size: 16px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .statement-text {
            text-align: justify;
            font-size: 11pt;
            color: #1e4a66;
            font-weight: 500;
            line-height: 1.7;
            margin-top: 8px;
        }

        .highlight {
            background: linear-gradient(120deg, #ed8936, #dd6b20);
            padding: 2px 6px;
            border-radius: 4px;
            color: white;
            font-weight: 700;
        }

        .closing-text {
            text-align: center;
            margin-top: 25px;
            font-style: italic;
            color: #718096;
            font-size: 10pt;
            background: #f7fafc;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            background: #ffffff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .date-location {
            text-align: right;
            margin-bottom: 25px;
            font-size: 11pt;
            color: #2d3748;
            font-weight: 500;
        }

        .signature-area {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 30px;
        }

        .qr-section {
            text-align: center;
            background: #f8fafc;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }

        .qr-code {
            width: 90px;
            height: 90px;
            border-radius: 6px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 8px;
        }

        .qr-label {
            font-size: 8pt;
            color: #718096;
            font-weight: 600;
            text-transform: uppercase;
        }

        .signature-section {
            text-align: center;
            min-width: 180px;
        }

        .signature-title {
            margin-bottom: 70px;
            font-size: 10pt;
            color: #4a5568;
        }

        .official-name {
            font-weight: 700;
            font-size: 11pt;
            color: #1a202c;
            text-decoration: underline;
            margin-bottom: 6px;
            font-family: 'Playfair Display', serif;
        }

        .official-id {
            font-size: 9pt;
            color: #718096;
        }

        /* Stamp */
        .stamp {
            position: absolute;
            right: 100px;
            bottom: 100px;
            width: 120px;
            height: 120px;
            border: 3px solid #e53e3e;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(229, 62, 62, 0.1) 0%, rgba(229, 62, 62, 0.05) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 9pt;
            font-weight: 700;
            color: #e53e3e;
            opacity: 0.7;
            transform: rotate(-12deg);
            line-height: 1.2;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .page-content {
                padding: 25px;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .signature-area {
                flex-direction: column;
                gap: 25px;
                align-items: center;
            }

            .data-row {
                flex-direction: column;
                gap: 5px;
            }

            .data-label {
                width: auto;
                padding-left: 0;
            }

            .data-label::before {
                display: none;
            }

            .data-value {
                padding-left: 0;
            }

            .stamp {
                right: 50px;
                bottom: 80px;
                width: 100px;
                height: 100px;
            }
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .container {
                box-shadow: none;
                border-radius: 0;
            }

            .page-content {
                padding: 20mm;
            }

            .section {
                box-shadow: none;
                background: white;
            }

            .header {
                background: #f8f9fa;
                box-shadow: none;
            }

            .stamp {
                opacity: 0.5;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-content">
            <div class="status-badge">DOKUMEN RESMI</div>

            <!-- Header -->
            <div class="header">
                <div class="header-content">
                    <div class="logo-section">
                        <div class="logo">S</div>
                    </div>
                    <div class="header-text">
                        <div class="government-name">Pemerintah Kabupaten Seluma</div>
                        <div class="village-name">Desa Ketapang Baru</div>
                        <div class="district-info">Kecamatan Semidang Alas Maras</div>
                        <div class="district-info">Kabupaten Seluma, Provinsi Bengkulu</div>
                        <div class="contact-info">📧 ketapangbaru@seluma.go.id | 📮 38874</div>
                    </div>
                </div>
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
                <div class="data-row">
                    <div class="data-label">Nama Lengkap</div>
                    <div class="data-value">HELESMI</div>
                </div>
                <div class="data-row">
                    <div class="data-label">NIK</div>
                    <div class="data-value">1701115607870003</div>
                </div>
                <div class="data-row">
                    <div class="data-label">Tempat, Tanggal Lahir</div>
                    <div class="data-value">Muara Dua, 16 Juli 1987</div>
                </div>
                <div class="data-row">
                    <div class="data-label">Jenis Kelamin</div>
                    <div class="data-value">Perempuan</div>
                </div>
                <div class="data-row">
                    <div class="data-label">Agama</div>
                    <div class="data-value">Islam</div>
                </div>
                <div class="data-row">
                    <div class="data-label">Pekerjaan</div>
                    <div class="data-value">Mengurus Rumah Tangga</div>
                </div>
                <div class="data-row">
                    <div class="data-label">Alamat</div>
                    <div class="data-value">Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma</div>
                </div>
            </div>

            <!-- Detail Kehilangan -->
            <div class="section">
                <div class="section-title">📋 Detail Kehilangan</div>
                <div class="data-row">
                    <div class="data-label">Dokumen/Barang</div>
                    <div class="data-value"><span class="highlight">KARTU KELUARGA</span></div>
                </div>
                <div class="data-row">
                    <div class="data-label">Nomor Dokumen</div>
                    <div class="data-value">1705052511190005</div>
                </div>
                <div class="data-row">
                    <div class="data-label">Tempat Kehilangan</div>
                    <div class="data-value">Desa Ketapang Baru</div>
                </div>
                <div class="data-row">
                    <div class="data-label">Waktu Kehilangan</div>
                    <div class="data-value">6 Bulan yang lalu</div>
                </div>
                <div class="data-row">
                    <div class="data-label">Keperluan</div>
                    <div class="data-value">Pengurusan administrasi kependudukan</div>
                </div>
            </div>

            <!-- Statement -->
            <div class="statement-box">
                <div class="statement-text">
                    Orang tersebut adalah benar-benar penduduk Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma dan memang telah kehilangan <span class="highlight">KARTU KELUARGA</span> sebagaimana dimaksud di atas. Surat keterangan ini berlaku hingga tanggal <strong>06 September 2025</strong>.
                </div>
            </div>

            <div class="closing-text">
                ✨ Demikian surat keterangan ini dibuat atas dasar yang sebenarnya dan dapat dipergunakan sebagaimana mestinya ✨
            </div>

            <!-- Footer -->
            <div class="footer">
                <div class="date-location">
                    📍 Ketapang Baru, 06 Maret 2025
                </div>
                <div class="signature-area">
                    <!-- QR Code -->
                    <div class="qr-section">
                        <img class="qr-code" src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://desa-ketapangbaru.go.id/verifikasi/63/170505/05/05/SKK/III/2025&bgcolor=f8fafc&color=2b6cb0" alt="QR Code">
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
    </div>
</body>
</html>
