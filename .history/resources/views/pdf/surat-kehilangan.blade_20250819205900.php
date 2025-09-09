<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'DejaVu Sans', Arial, sans-serif;
            font-size: 11pt;
            line-height: 1.5;
            color: #000;
            background: #f8f9fa;
            padding: 20px;
        }

        .page {
            max-width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            padding: 25px 40px;
            position: relative;
        }



        /* Header */
        .header {
            border-bottom: 2px double #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            vertical-align: middle;
        }

        .logo-cell {
            width: 120px;
            text-align: center;
        }

        .logo img {
            width: 90px;
            height: auto;
        }

        .text-cell {
            text-align: center;
        }

        .government-name {
            font-size: 13pt;
            font-weight: 600;
            text-transform: uppercase;
            font-family: 'Inter', sans-serif;
        }

        .village-name {
            font-size: 15pt;
            font-weight: 700;
            text-transform: uppercase;
            font-family: 'Inter', sans-serif;
        }

        .district-info {
            font-size: 11pt;
        }

        .contact-info {
            font-size: 10pt;
            font-style: italic;
        }

        /* Title */
        .document-title {
            text-align: center;
            margin: 30px 0 20px;
        }

        .title-main {
            font-size: 18pt;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .document-number {
            font-size: 11pt;
            font-family: 'Courier New', monospace;
        }

        /* Content */
        .content {
            margin-top: 20px;
        }

        .intro-text {
            text-align: justify;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 11pt;
            font-weight: 700;
            border-bottom: 1px solid #555;
            margin-bottom: 8px;
            padding-bottom: 3px;
            text-transform: uppercase;
            font-family: 'Inter', sans-serif;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 6px 8px;
            vertical-align: top;
            border-bottom: 1px solid #ddd;
        }

        .data-table td:first-child {
            width: 160px;
            font-weight: 600;
        }

        /* Statement */
        .statement-box {
            border: 1px solid #444;
            padding: 15px;
            margin: 20px 0;
        }

        .statement-text {
            text-align: justify;
            font-size: 11pt;
        }

        .closing-text {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
        }

        .date-location {
            font-size: 11pt;
        }

        .signature-section {
            text-align: center;
        }

        .signature-title {
            margin-bottom: 60px;
        }

        .official-name {
            font-weight: 700;
            text-decoration: underline;
        }

        .official-id {
            font-size: 10pt;
        }

        /* Stamp */
        .stamp {
            position: absolute;
            right: 100px;
            bottom: 100px;
            width: 120px;
            height: 120px;
            border: 3px solid #c0392b;
            border-radius: 50%;
            text-align: center;
            line-height: 1.2;
            font-size: 9pt;
            font-weight: 700;
            color: #c0392b;
            opacity: 0.2;
            padding-top: 30px;
        }

        /* Print */
        @media print {
            body {
                background: white;
                padding: 0;
            }
            .page {
                box-shadow: none;
                padding: 0 40px;
            }
            .page::before {
                display: none;
            }
            .stamp {
                opacity: 0.3;
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

        <!-- Content -->
        <div class="content">
            <div class="intro-text">
                Yang bertanda tangan di bawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma, dengan ini menerangkan bahwa:
            </div>

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
                    <tr><td>Dokumen/Barang</td><td>{{ $jenis_dokumen ?? 'KARTU KELUARGA' }} @if($nama_barang_lainnya ?? false)- {{ $nama_barang_lainnya }}@endif</td></tr>
                    <tr><td>Nomor Dokumen</td><td>{{ $nomor_dokumen ?? '1705052511190005' }}</td></tr>
                    <tr><td>Tempat Kehilangan</td><td>{{ $tempat_kehilangan ?? 'Desa Ketapang Baru' }}</td></tr>
                    <tr><td>Waktu Kehilangan</td><td>{{ $waktu_kehilangan ?? '6 Bulan yang lalu' }} @if($keterangan_waktu ?? false)- {{ $keterangan_waktu }}@endif</td></tr>
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
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <div class="date-location">
                    {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? '06 Maret 2025' }}
                </div>
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
