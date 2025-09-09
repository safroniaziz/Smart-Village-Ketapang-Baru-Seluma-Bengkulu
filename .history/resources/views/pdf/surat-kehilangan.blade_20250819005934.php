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
            font-size: 12pt;
            line-height: 1.5;
            color: #1a1a1a;
            background: #ffffff;
            padding: 20px;
        }

        .page {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        /* Header Section - Elegant & Professional */
        .header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            padding: 30px 40px;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            transform: rotate(45deg);
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 25px;
            position: relative;
            z-index: 2;
        }

        .logo-container {
            flex-shrink: 0;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            font-weight: 600;
            color: #1e40af;
            font-size: 10pt;
            text-align: center;
        }

        .header-text {
            flex: 1;
        }

        .government-name {
            font-size: 18pt;
            font-weight: 700;
            margin-bottom: 4px;
            letter-spacing: 0.5px;
        }

        .village-name {
            font-size: 20pt;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: 1px;
        }

        .district-info {
            font-size: 11pt;
            font-weight: 400;
            opacity: 0.9;
            margin-bottom: 2px;
        }

        /* Document Title Section */
        .document-title {
            background: #f8fafc;
            border-bottom: 3px solid #e2e8f0;
            padding: 25px 40px;
            text-align: center;
        }

        .title-main {
            font-size: 16pt;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .document-number {
            font-size: 12pt;
            font-weight: 500;
            color: #64748b;
            background: white;
            display: inline-block;
            padding: 8px 20px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
        }

        .number-value {
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: #1e40af;
        }

        /* Content Area */
        .content {
            padding: 35px 40px;
        }

        .intro-text {
            text-align: center;
            margin-bottom: 30px;
            color: #475569;
            font-size: 11pt;
            line-height: 1.6;
        }

        .section {
            margin-bottom: 35px;
        }

        .section-title {
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            color: white;
            font-size: 12pt;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 8px 8px 0 0;
            margin-bottom: 0;
        }

        /* Data Table - Modern & Clean */
        .data-container {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0 0 8px 8px;
            overflow: hidden;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table tr {
            transition: background-color 0.2s ease;
        }

        .data-table tr:nth-child(even) {
            background: #f8fafc;
        }

        .data-table tr:hover {
            background: #e0e7ff;
        }

        .data-table td {
            padding: 15px 20px;
            vertical-align: top;
            border-bottom: 1px solid #e2e8f0;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .data-table td:first-child {
            width: 180px;
            font-weight: 600;
            color: #374151;
            background: rgba(30, 64, 175, 0.05);
            border-right: 1px solid #e2e8f0;
        }

        .data-table td:last-child {
            color: #1f2937;
            font-weight: 500;
        }

        /* Notice Box */
        .notice-box {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            border-left: 4px solid #f59e0b;
            padding: 20px;
            border-radius: 8px;
            margin: 30px 0;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.1);
        }

        .notice-title {
            font-weight: 700;
            color: #92400e;
            font-size: 11pt;
            margin-bottom: 8px;
        }

        .notice-text {
            color: #92400e;
            font-size: 10pt;
            line-height: 1.6;
            margin: 0;
        }

        .closing-text {
            text-align: center;
            font-style: italic;
            color: #64748b;
            font-size: 11pt;
            margin-top: 25px;
            padding: 20px;
            background: #f1f5f9;
            border-radius: 8px;
        }

        /* Footer - Signature Area */
        .footer {
            background: #f8fafc;
            padding: 30px 40px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .date-location {
            font-size: 11pt;
            color: #64748b;
            font-weight: 500;
        }

        .signature-section {
            text-align: center;
            position: relative;
        }

        .signature-title {
            font-size: 11pt;
            font-weight: 600;
            color: #374151;
            margin-bottom: 15px;
        }

        .signature-box {
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px 30px;
            min-width: 200px;
            position: relative;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .official-name {
            font-size: 12pt;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 8px;
            text-decoration: underline;
            text-decoration-color: #3b82f6;
            text-underline-offset: 3px;
        }

        .official-id {
            font-size: 9pt;
            color: #64748b;
            font-weight: 500;
            font-family: 'Courier New', monospace;
        }

        /* Official Stamp */
        .stamp {
            position: absolute;
            top: -15px;
            right: -15px;
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #dc2626, #ef4444);
            border: 3px solid #b91c1c;
            border-radius: 50%;
            color: white;
            font-size: 8pt;
            font-weight: 700;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            line-height: 1.1;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
            transform: rotate(-15deg);
        }

        .stamp-text {
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Print Styles */
        @media print {
            body {
                padding: 0;
            }

            .page {
                box-shadow: none;
                border-radius: 0;
                max-width: none;
            }

            .stamp {
                position: fixed;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .footer {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .content {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <!-- Header -->
        <div class="header">
            <div class="header-content">
                <div class="logo-container">
                    <div class="logo">
                        <!-- Logo akan dimuat dari assets/images/seluma.png -->
                        <img src="{{ asset('assets/images/seluma.png') }}" alt="Logo Seluma" style="width: 100%; height: 100%; object-fit: contain; border-radius: 8px;">
                    </div>
                </div>
                <div class="header-text">
                    <div class="government-name">PEMERINTAHAN KABUPATEN SELUMA</div>
                    <div class="village-name">DESA KETAPANG BARU</div>
                    <div class="district-info">KECAMATAN SEMIDANG ALAS MARAS</div>
                    <div class="district-info">Kabupaten Seluma, Provinsi Bengkulu</div>
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
                Yang bertanda tangan di bawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras<br>
                Kabupaten Seluma, menerangkan bahwa:
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

            <!-- Notice Box -->
            <div class="notice-box">
                <div class="notice-title">📋 Penting!</div>
                <p class="notice-text">
                    Orang tersebut adalah benar penduduk Desa Ketapang Baru, Kecamatan Semidang Alas Maras,
                    Kabupaten Seluma dan memang telah kehilangan {{ $jenis_dokumen ?? 'KARTU KELUARGA' }} sebagaimana dimaksud di atas.
                    Surat keterangan ini berlaku sampai dengan tanggal <strong>{{ date('d F Y', strtotime('+6 months')) }}</strong>.
                </p>
            </div>

            <div class="closing-text">
                Demikian surat keterangan ini dibuat atas dasar yang sebenarnya dan dapat dipergunakan sebagaimana mestinya.
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="date-location">
                {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? '06 Maret 2025' }}
            </div>
            <div class="signature-section">
                <div class="signature-title">An. Kepala Desa / Kasi Pemerintahan</div>
                <div class="signature-box">
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
</body>
</html>
