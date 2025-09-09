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
            line-height: 1.5;
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
            overflow: hidden;
            position: relative;
            padding-bottom: 50px;
        }

        /* Header */
        .header {
            padding: 30px 40px 25px;
            border-bottom: 3px solid #3498db;
            background: white;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo {
            width: 100px;
            height: 130px;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .header-text {
            flex: 1;
            text-align: center;
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

        /* Content */
        .content {
            padding: 20px 40px 30px;
            background: white;
            position: relative;
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

        /* Section */
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

        /* Data without table */
        .data-container {
            background: white;
            border-radius: 0 0 6px 6px;
            padding: 15px 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }

        .data-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .data-label {
            width: 160px;
            font-weight: 600;
            color: #2c3e50;
        }

        .data-value {
            flex: 1;
            font-weight: 400;
            color: #34495e;
        }

        /* Statement Box */
        .statement-box {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
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
        }

        .footer-content {
            display: flex;
            justify-content: flex-end;
            align-items: flex-start;
            gap: 20px;
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

        /* QR Code */
        .qr-code {
            width: 100px;
            height: 100px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .footer-content {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .data-label {
                width: 120px;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/seluma.png'))) }}" alt="Logo Seluma">
            </div>
            <div class="header-text">
                <div class="government-name">PEMERINTAHAN KABUPATEN SELUMA</div>
                <div class="village-name">DESA KETAPANG BARU</div>
                <div class="district-info">Kecamatan Semidang Alas Maras</div>
                <div class="district-info">Kabupaten Seluma, Provinsi Bengkulu</div>
                <div class="contact-info">Kode Pos: 38874 | Email: ketapangbaru@seluma.go.id</div>
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

            <!-- Data Pemohon -->
            <div class="section">
                <div class="section-title">Data Pemohon</div>
                <div class="data-container">
                    <div class="data-row">
                        <div class="data-label">Nama Lengkap</div>
                        <div class="data-value">{{ $nama_pemohon ?? 'HELESMI' }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">NIK</div>
                        <div class="data-value">{{ $nik ?? '1701115607870003' }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Tempat, Tanggal Lahir</div>
                        <div class="data-value">{{ $tempat_lahir ?? 'Muara Dua' }}, {{ $tanggal_lahir ?? '16 Juli 1987' }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Jenis Kelamin</div>
                        <div class="data-value">{{ $jenis_kelamin ?? 'Perempuan' }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Agama</div>
                        <div class="data-value">{{ $agama ?? 'Islam' }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Pekerjaan</div>
                        <div class="data-value">{{ $pekerjaan ?? 'Mengurus Rumah Tangga' }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Alamat</div>
                        <div class="data-value">{{ $alamat ?? 'Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma' }}</div>
                    </div>
                </div>
            </div>

            <!-- Detail Kehilangan -->
            <div class="section">
                <div class="section-title">Detail Kehilangan</div>
                <div class="data-container">
                    <div class="data-row">
                        <div class="data-label">Dokumen/Barang</div>
                        <div class="data-value">
                            {{ $jenis_dokumen ?? 'KARTU KELUARGA' }}
                            @if($nama_barang_lainnya ?? false)
                                - {{ $nama_barang_lainnya }}
                            @endif
                        </div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Nomor Dokumen</div>
                        <div class="data-value">{{ $nomor_dokumen ?? '1705052511190005' }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Tempat Kehilangan</div>
                        <div class="data-value">{{ $tempat_kehilangan ?? 'Desa Ketapang Baru' }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Waktu Kehilangan</div>
                        <div class="data-value">
                            {{ $waktu_kehilangan ?? '6 Bulan yang lalu' }}
                            @if($keterangan_waktu ?? false)
                                - {{ $keterangan_waktu }}
                            @endif
                        </div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Keperluan</div>
                        <div class="data-value">{{ $keperluan ?? 'Pengurusan administrasi kependudukan' }}</div>
                    </div>
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
                <!-- QR code -->
                <div class="qr-code">
                    <img src="data:image/png;base64,{{ $qr_code ?? '' }}" alt="QR Code" style="width:100%; height:100%;">
                </div>

                <!-- Signature -->
                <div class="signature-section">
                    <div class="signature-title">An. Kepala Desa / Kasi Pemerintahan</div>
                    <div class="signature-box">
                        <div class="signature-space"></div>
                        <div class="official-name">{{ $nama_kepala ?? 'Desmerti Mustika Sari' }}</div>
                        <div class="official-id">{{ $nip ?? 'NIP. -' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
