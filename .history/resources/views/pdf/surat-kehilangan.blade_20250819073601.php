<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            font-size: 11pt;
            line-height: 1.5;
            color: #1a202c;
            background: #f7fafc;
            padding: 20px;
        }

        .page {
            max-width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: #ffffff;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            border-radius: 12px;
            overflow: hidden;
            position: relative;
        }

        /* Elegant Watermark */
        .page::before {
            content: 'DESA KETAPANG BARU';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-family: 'Playfair Display', serif;
            font-size: 72pt;
            color: rgba(45, 55, 72, 0.02);
            font-weight: 700;
            z-index: 1;
            pointer-events: none;
            white-space: nowrap;
            letter-spacing: 8px;
        }

        /* Premium Header Section */
        .header {
            padding: 40px 50px 35px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            z-index: 2;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 0%, transparent 50%),
                        radial-gradient(circle at 75% 75%, rgba(255,255,255,0.1) 0%, transparent 50%);
            opacity: 0.3;
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 30px;
            position: relative;
            z-index: 2;
        }

        .logo-container {
            flex-shrink: 0;
            position: relative;
        }

        .logo {
            width: 120px;
            height: 150px;
            background: white;
            border-radius: 16px;
            padding: 15px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            position: relative;
            overflow: hidden;
        }

        .logo::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.8) 50%, transparent 70%);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            position: relative;
            z-index: 1;
        }

        .header-text {
            flex: 1;
            color: white;
        }

        .government-name {
            font-family: 'Playfair Display', serif;
            font-size: 18pt;
            font-weight: 600;
            margin-bottom: 8px;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .village-name {
            font-family: 'Playfair Display', serif;
            font-size: 24pt;
            font-weight: 700;
            margin-bottom: 12px;
            letter-spacing: 2px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .district-info {
            font-size: 12pt;
            font-weight: 400;
            margin-bottom: 4px;
            opacity: 0.9;
        }

        .contact-info {
            font-size: 10pt;
            opacity: 0.8;
            margin-top: 15px;
            padding: 8px 16px;
            background: rgba(255,255,255,0.1);
            border-radius: 20px;
            display: inline-block;
            backdrop-filter: blur(10px);
        }

        /* Document Title */
        .document-title {
            text-align: center;
            padding: 40px 50px 30px;
            background: white;
            position: relative;
            z-index: 2;
        }

        .title-main {
            font-family: 'Playfair Display', serif;
            font-size: 22pt;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 15px;
            letter-spacing: 3px;
            position: relative;
            text-transform: uppercase;
        }

        .title-main::after {
            content: '';
            display: block;
            width: 120px;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            margin: 15px auto;
            border-radius: 2px;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
        }

        .document-number {
            font-size: 12pt;
            font-weight: 500;
            color: #4a5568;
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            display: inline-block;
            padding: 12px 24px;
            border-radius: 25px;
            border: 2px solid #e2e8f0;
            font-family: 'Courier New', monospace;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .number-value {
            font-weight: 600;
            color: #2d3748;
        }

        /* Content Area */
        .content {
            padding: 30px 50px 40px;
            position: relative;
            z-index: 2;
            background: white;
        }

        .intro-text {
            text-align: justify;
            margin-bottom: 35px;
            color: #2d3748;
            font-size: 12pt;
            line-height: 1.7;
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            padding: 25px 30px;
            border-left: 5px solid #667eea;
            border-radius: 0 12px 12px 0;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
            position: relative;
        }

        .intro-text::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 20px;
            font-size: 48pt;
            color: #667eea;
            font-family: 'Playfair Display', serif;
            opacity: 0.3;
        }

        .section {
            margin-bottom: 35px;
        }

        .section-title {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 12pt;
            font-weight: 600;
            padding: 15px 25px;
            border-radius: 12px 12px 0 0;
            margin-bottom: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .section-title::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="white" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        }

        /* Enhanced Data Table */
        .data-container {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0 0 12px 12px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table tr {
            transition: all 0.3s ease;
        }

        .data-table tr:nth-child(even) {
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
        }

        .data-table tr:hover {
            background: linear-gradient(135deg, #ebf8ff, #bee3f8);
            transform: translateX(5px);
        }

        .data-table td {
            padding: 18px 25px;
            vertical-align: top;
            border-bottom: 1px solid #e2e8f0;
            font-size: 11pt;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .data-table td:first-child {
            width: 180px;
            font-weight: 600;
            color: #2d3748;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.08), rgba(118, 75, 162, 0.08));
            border-right: 2px solid #e2e8f0;
            position: relative;
        }

        .data-table td:first-child::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 8px solid #e2e8f0;
            border-top: 6px solid transparent;
            border-bottom: 6px solid transparent;
        }

        .data-table td:last-child {
            color: #4a5568;
            font-weight: 500;
        }

        /* Premium Statement Box */
        .statement-box {
            background: linear-gradient(135deg, #fffaf0, #fef5e7);
            border: 2px solid #f6ad55;
            border-left: 6px solid #f6ad55;
            padding: 30px;
            border-radius: 16px;
            margin: 35px 0;
            box-shadow: 0 8px 32px rgba(246, 173, 85, 0.15);
            position: relative;
            overflow: hidden;
        }

        .statement-box::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(246, 173, 85, 0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .statement-text {
            color: #744210;
            font-size: 11pt;
            line-height: 1.7;
            margin: 0;
            text-align: justify;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .closing-text {
            text-align: center;
            font-style: italic;
            color: #4a5568;
            font-size: 11pt;
            margin-top: 35px;
            padding: 20px;
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        }

        /* Footer */
        .footer {
            padding: 40px 50px;
            background: white;
            position: relative;
            z-index: 2;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 40px;
        }

        .date-location {
            font-size: 11pt;
            color: #4a5568;
            font-weight: 500;
            padding: 15px 20px;
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        }

        .signature-section {
            text-align: center;
            position: relative;
        }

        .signature-title {
            font-size: 11pt;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .signature-box {
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            padding: 35px 30px 25px;
            min-width: 200px;
            position: relative;
            box-shadow: 0 12px 40px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .signature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .signature-space {
            height: 80px;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #f7fafc, #edf2f7);
            border-radius: 8px;
            border: 2px dashed #cbd5e0;
            position: relative;
        }

        .signature-space::before {
            content: 'Tanda Tangan';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #a0aec0;
            font-size: 9pt;
            font-weight: 500;
        }

        .official-name {
            font-size: 12pt;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 6px;
            text-decoration: underline;
            text-decoration-color: #667eea;
            text-underline-offset: 3px;
            text-decoration-thickness: 2px;
        }

        .official-id {
            font-size: 10pt;
            color: #718096;
            font-weight: 400;
        }

        /* Premium Official Stamp */
        .stamp {
            position: absolute;
            top: -15px;
            right: -15px;
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #e53e3e, #c53030);
            border: 3px solid #c53030;
            border-radius: 50%;
            color: white;
            font-size: 8pt;
            font-weight: 700;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            line-height: 1.2;
            box-shadow: 0 8px 24px rgba(229, 62, 62, 0.4);
            transform: rotate(-15deg);
            animation: stampGlow 3s ease-in-out infinite;
        }

        @keyframes stampGlow {
            0%, 100% { box-shadow: 0 8px 24px rgba(229, 62, 62, 0.4); }
            50% { box-shadow: 0 8px 32px rgba(229, 62, 62, 0.6), 0 0 20px rgba(229, 62, 62, 0.3); }
        }

        .stamp-text {
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Decorative Elements */
        .corner-decoration {
            position: absolute;
            width: 60px;
            height: 60px;
            opacity: 0.1;
        }

        .corner-decoration.top-left {
            top: 20px;
            left: 20px;
            border-top: 3px solid #667eea;
            border-left: 3px solid #667eea;
            border-radius: 8px 0 0 0;
        }

        .corner-decoration.top-right {
            top: 20px;
            right: 20px;
            border-top: 3px solid #667eea;
            border-right: 3px solid #667eea;
            border-radius: 0 8px 0 0;
        }

        .corner-decoration.bottom-left {
            bottom: 20px;
            left: 20px;
            border-bottom: 3px solid #667eea;
            border-left: 3px solid #667eea;
            border-radius: 0 0 0 8px;
        }

        .corner-decoration.bottom-right {
            bottom: 20px;
            right: 20px;
            border-bottom: 3px solid #667eea;
            border-right: 3px solid #667eea;
            border-radius: 0 0 8px 0;
        }

        /* Print Styles */
        @media print {
            body {
                padding: 0;
                background: white;
            }

            .page {
                box-shadow: none;
                border-radius: 0;
                max-width: none;
                margin: 0;
                min-height: auto;
            }

            .page::before {
                display: none;
            }

            .corner-decoration {
                display: none;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .footer-content {
                flex-direction: column;
                gap: 30px;
                text-align: center;
            }

            .content {
                padding: 25px 25px;
            }

            .data-table td:first-child {
                width: 140px;
                font-size: 10pt;
            }

            .data-table td:last-child {
                font-size: 10pt;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <!-- Decorative Corner Elements -->
        <div class="corner-decoration top-left"></div>
        <div class="corner-decoration top-right"></div>
        <div class="corner-decoration bottom-left"></div>
        <div class="corner-decoration bottom-right"></div>

        <!-- Header -->
        <div class="header">
            <div class="header-content">
                <div class="logo-container">
                    <div class="logo">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/seluma.png'))) }}" alt="Logo Seluma">
                    </div>
                </div>
                <div class="header-text">
                    <div class="government-name">PEMERINTAHAN KABUPATEN SELUMA</div>
                    <div class="village-name">DESA KETAPANG BARU</div>
                    <div class="district-info">Kecamatan Semidang Alas Maras</div>
                    <div class="district-info">Kabupaten Seluma, Provinsi Bengkulu</div>
                    <div class="contact-info">Kode Pos: 38874 | Email: ketapangbaru@seluma.go.id</div>
                </div>
            </div>
        </div>

        <!-- Document Title -->
        <div class="document-title">
            <div class="title-main">Surat Keterangan Kehilangan</div>
            <div class="document-number">
                Nomor: <span class="number-value">{{ $nomor_surat ?? '63/170505/05/05/SKK/III/2025' }}</span>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="intro-text">
                Yang bertanda tangan di bawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma, dengan ini menerangkan bahwa:
            </div>

            <!-- Data Pemohon Section -->
            <div class="section">
                <div class="section-title">Data Pemohon</div>
                <div class="data-container">
                    <table class="data-table">
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>{{ $nama_pemohon ?? 'HELESMI' }}</td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>{{ $nik ?? '1701115607870003' }}</td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>{{ $tempat_lahir ?? 'Muara Dua' }}, {{ $tanggal_lahir ?? '16 Juli 1987' }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>{{ $jenis_kelamin ?? 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>{{ $agama ?? 'Islam' }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>{{ $pekerjaan ?? 'Mengurus Rumah Tangga' }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{ $alamat ?? 'Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Detail Kehilangan Section -->
            <div class="section">
                <div class="section-title">Detail Kehilangan</div>
                <div class="data-container">
                    <table class="data-table">
                        <tr>
                            <td>Dokumen/Barang</td>
                            <td>{{ $jenis_dokumen ?? 'KARTU KELUARGA' }}
                                @if($nama_barang_lainnya ?? false)
                                    - {{ $nama_barang_lainnya }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor Dokumen</td>
                            <td>{{ $nomor_dokumen ?? '1705052511190005' }}</td>
                        </tr>
                        <tr>
                            <td>Tempat Kehilangan</td>
                            <td>{{ $tempat_kehilangan ?? 'Desa Ketapang Baru' }}</td>
                        </tr>
                        <tr>
                            <td>Waktu Kehilangan</td>
                            <td>{{ $waktu_kehilangan ?? '6 Bulan yang lalu' }}
                                @if($keterangan_waktu ?? false)
                                    - {{ $keterangan_waktu }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Keperluan</td>
                            <td>{{ $keperluan ?? 'Pengurusan administrasi kependudukan' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Statement Box -->
            <div class="statement-box">
                <p class="statement-text">
                    Orang tersebut adalah benar-benar penduduk Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma dan memang telah kehilangan <strong>{{ $jenis_dokumen ?? 'KARTU KELUARGA' }}</strong> sebagaimana dimaksud di atas. Surat keterangan ini berlaku hingga tanggal <strong>{{ date('d F Y', strtotime('+6 months')) }}</strong>.
                </p>
            </div>

            <div class="closing-text">
                Demikian surat keterangan ini dibuat atas dasar yang sebenarnya dan dapat dipergunakan sebagaimana mestinya.
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <div class="date-location">
                    {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? '06 Maret 2025' }}
                </div>
                <div class="signature-section">
                    <div class="signature-title">An. Kepala Desa / Kasi Pemerintahan</div>
                    <div class="signature-box">
                        <div class="signature-space"></div>
                        <div class="official-name">{{ $nama_kepala ?? 'Desmerti Mustika Sari' }}</div>
                        <div class="official-id">{{ $nip ?? 'NIP. -' }}</div>

                        <!-- Official Stamp -->
                        <div class="stamp">
                            <div class="stamp-text">
                                STEMPEL<br>
                                DESA<br>
                                KETAPANG<br>
                                BARU
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
