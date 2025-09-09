<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            font-size: 11pt;
            line-height: 1.4;
            color: #2c3e50;
            background: #f8f9fa;
            padding: 20px;
        }

        .page {
            max-width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-radius: 0;
            overflow: hidden;
            position: relative;
        }

        /* Watermark */
        .page::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 60pt;
            color: rgba(52, 152, 219, 0.03);
            font-weight: 800;
            z-index: 1;
            pointer-events: none;
            white-space: nowrap;
        }

        /* Header Section */
        .header {
            padding: 30px 40px 20px;
            border-bottom: 3px solid #3498db;
            position: relative;
            z-index: 2;
            background: white;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }

        .header-table td {
            border: none;
            padding: 0;
            vertical-align: middle;
        }

        .logo-cell {
            width: 100px;
            text-align: center;
        }

        .logo {
            width: 80px;
            height: 80px;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .text-cell {
            text-align: center;
            padding-left: 20px;
        }

        .government-name {
            font-size: 16pt;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 3px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        .village-name {
            font-size: 18pt;
            font-weight: 800;
            color: #3498db;
            margin-bottom: 8px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .district-info {
            font-size: 11pt;
            color: #7f8c8d;
            font-weight: 400;
            margin-bottom: 2px;
        }

        .contact-info {
            font-size: 10pt;
            color: #95a5a6;
            font-style: italic;
            margin-top: 10px;
        }

        /* Document Title */
        .document-title {
            text-align: center;
            padding: 30px 40px 20px;
            background: white;
            position: relative;
            z-index: 2;
        }

        .title-main {
            font-size: 18pt;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
        }

        .title-main::after {
            content: '';
            display: block;
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #3498db, #2980b9);
            margin: 8px auto;
            border-radius: 2px;
        }

        .document-number {
            font-size: 11pt;
            font-weight: 500;
            color: #7f8c8d;
            background: #ecf0f1;
            display: inline-block;
            padding: 6px 16px;
            border-radius: 15px;
            border: 1px solid #bdc3c7;
            font-family: 'Courier New', monospace;
        }

        .number-value {
            font-weight: 600;
            color: #2c3e50;
        }

        /* Content Area */
        .content {
            padding: 20px 40px 30px;
            position: relative;
            z-index: 2;
            background: white;
        }

        .intro-text {
            text-align: justify;
            margin-bottom: 25px;
            color: #34495e;
            font-size: 11pt;
            line-height: 1.6;
            background: #f8f9fa;
            padding: 15px 20px;
            border-left: 4px solid #3498db;
            border-radius: 0 8px 8px 0;
        }

        .section {
            margin-bottom: 25px;
        }

        .section-title {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            font-size: 11pt;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 6px 6px 0 0;
            margin-bottom: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Data Table */
        .data-container {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 0 0 6px 6px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table tr {
            transition: background-color 0.2s ease;
        }

        .data-table tr:nth-child(even) {
            background: #f8f9fa;
        }

        .data-table tr:hover {
            background: #e3f2fd;
        }

        .data-table td {
            padding: 12px 20px;
            vertical-align: top;
            border-bottom: 1px solid #e9ecef;
            font-size: 10pt;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .data-table td:first-child {
            width: 160px;
            font-weight: 600;
            color: #2c3e50;
            background: rgba(52, 152, 219, 0.05);
            border-right: 1px solid #e9ecef;
        }

        .data-table td:last-child {
            color: #34495e;
            font-weight: 500;
        }

        /* Statement Box */
        .statement-box {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            border: 1px solid #f39c12;
            border-left: 4px solid #f39c12;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            box-shadow: 0 2px 8px rgba(243, 156, 18, 0.1);
        }

        .statement-text {
            color: #856404;
            font-size: 10pt;
            line-height: 1.6;
            margin: 0;
            text-align: justify;
            font-weight: 500;
        }

        .closing-text {
            text-align: center;
            font-style: italic;
            color: #7f8c8d;
            font-size: 10pt;
            margin-top: 25px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 6px;
            border: 1px solid #e9ecef;
        }

        /* Footer */
        .footer {
            padding: 30px 40px;
            background: white;
            position: relative;
            z-index: 2;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .date-location {
            font-size: 10pt;
            color: #7f8c8d;
            font-weight: 500;
        }

        .signature-section {
            text-align: center;
            position: relative;
        }

        .signature-title {
            font-size: 10pt;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .signature-box {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 30px 25px 20px;
            min-width: 180px;
            position: relative;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .signature-space {
            height: 60px;
            margin-bottom: 10px;
        }

        .official-name {
            font-size: 11pt;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 4px;
            text-decoration: underline;
            text-decoration-color: #3498db;
            text-underline-offset: 2px;
        }

        .official-id {
            font-size: 9pt;
            color: #7f8c8d;
            font-weight: 400;
        }

        /* Official Stamp */
        .stamp {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            border: 2px solid #c0392b;
            border-radius: 50%;
            color: white;
            font-size: 7pt;
            font-weight: 700;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            line-height: 1;
            box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
            transform: rotate(-15deg);
        }

        .stamp-text {
            text-transform: uppercase;
            letter-spacing: 0.3px;
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
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .footer-content {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .content {
                padding: 20px 20px;
            }

            .data-table td:first-child {
                width: 120px;
                font-size: 9pt;
            }

            .data-table td:last-child {
                font-size: 9pt;
            }
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
                        <div class="government-name">PEMERINTAHAN KABUPATEN SELUMA</div>
                        <div class="village-name">DESA KETAPANG BARU</div>
                        <div class="district-info">Kecamatan Semidang Alas Maras</div>
                        <div class="district-info">Kabupaten Seluma, Provinsi Bengkulu</div>
                        <div class="contact-info">Kode Pos: 38874 | Email: ketapangbaru@seluma.go.id</div>
                    </td>
                </tr>
            </table>
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
