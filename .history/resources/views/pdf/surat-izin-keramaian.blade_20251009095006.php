<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Izin Keramaian</title>
    <style>
        @page {
            margin: 2cm 2cm 2cm 2cm;
        }

        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.8;
            color: #000;
            margin: 0;
            padding: 0;
        }

        /* Header Styles */
        .header {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .logo-cell {
            width: 80px;
            text-align: left;
            vertical-align: middle;
            padding-right: 15px;
        }

        .logo {
            width: 70px;
            height: 70px;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .text-cell {
            text-align: center;
            vertical-align: middle;
        }

        .government-name {
            font-size: 16pt;
            font-weight: 700;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 1px;
        }

        .village-name {
            font-size: 14pt;
            font-weight: 700;
            text-transform: uppercase;
            margin: 2px 0;
        }

        .district-info {
            font-size: 12pt;
            font-weight: 600;
            text-transform: uppercase;
            margin: 1px 0;
        }

        .contact-info {
            font-size: 10pt;
            font-style: italic;
            margin: 1px 0;
        }

        /* Document Title */
        .document-title {
            text-align: center;
            margin: 30px 0;
            font-size: 14pt;
            font-weight: 700;
            text-decoration: underline;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .document-number {
            text-align: center;
            margin-bottom: 30px;
            font-size: 12pt;
            font-weight: 600;
        }

        /* Content Styles */
        .content {
            margin: 30px 0;
            text-align: justify;
        }

        .pembuka {
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .data-table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 5px 0;
            vertical-align: top;
        }

        .label {
            width: 15%;
            font-weight: 600;
        }

        .separator {
            width: 5%;
            text-align: center;
        }

        .value {
            width: 80%;
        }

        .penutup {
            margin-top: 30px;
            text-align: justify;
            line-height: 1.8;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
        }

        .signature-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .tembusan-section {
            width: 200px;
            text-align: left;
        }

        .signature-section {
            width: 300px;
            text-align: center;
        }

        .signature-title {
            margin-bottom: 60px;
            font-weight: 600;
        }

        .official-name {
            font-weight: 700;
            text-decoration: underline;
        }

        .official-title {
            font-weight: 600;
            margin-top: 5px;
        }

        /* QR Code */
        .qr-code {
            width: 90px;
            height: 90px;
            border: 1px solid #ddd;
            padding: 5px;
        }

        /* TTD Image */
        .ttd-image {
            max-width: 120px;
            max-height: 80px;
            margin: 10px 0;
        }

        /* Tracking QR */
        .tracking-qr {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 80px;
            height: 80px;
        }

        .tracking-qr img {
            width: 100%;
            height: 100%;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .page {
                box-shadow: none;
                border: none;
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
            Surat Izin Keramaian
        </div>

        <!-- Document Number -->
        <div class="document-number">
            <strong>NOMOR : {{ $nomor_surat }}</strong>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="pembuka">
                Saya yang bertanda tangan dibawah ini :
            </div>

            <!-- Data Kepala Desa -->
            <table class="data-table">
                <tr>
                    <td class="label">Nama</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $kepala_desa_nama }}</td>
                </tr>
                <tr>
                    <td class="label">Jabatan</td>
                    <td class="separator">:</td>
                    <td class="value">Kepala Desa Ketapang Baru</td>
                </tr>
            </table>

            <div style="margin: 20px 0;">
                Memberikan Izin Keramaian Kepada:
            </div>

            <!-- Data Pemohon (dari database user) -->
            <table class="data-table">
                <tr>
                    <td class="label">Nama</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $nama_pemohon }}</td>
                </tr>
                <tr>
                    <td class="label">NIK</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $nik_pemohon }}</td>
                </tr>
                <tr>
                    <td class="label">Umur</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $umur_pemohon }} Tahun</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $alamat_pemohon }}</td>
                </tr>
                <tr>
                    <td class="label">Untuk</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $keperluan_acara }}</td>
                </tr>
            </table>

            <div class="penutup">
                Demikian surat izin Keramaian ini dibuat atas dasar yang sebenarnya dan dapat dipergunakan sebagaimana mestinya.
            </div>
        </div>

        <!-- Footer with Signature -->
        <div class="footer">
            <div class="signature-wrapper">
                <!-- Tembusan (Left side) - Dinamis -->
                @if(isset($tembusan) && !empty($tembusan))
                <div class="tembusan-section">
                    <div style="font-weight: 700; margin-bottom: 5px;">Tembusan :</div>
                    @foreach($tembusan as $index => $item)
                    <div style="margin-bottom: 2px;">
                        {{ $index + 1 }}. {{ $item }}
                    </div>
                    @endforeach
                </div>
                @else
                <div class="tembusan-section"></div>
                @endif

                <!-- Signature (Right side) -->
                <div class="signature-section">
                    <div class="signature-title">
                        Ketapang Baru, {{ $tanggal_surat }}<br>
                        <strong>KEPALA DESA KETAPANG BARU</strong>
                    </div>

                    @if($jenis_ttd === 'gambar')
                        <img src="{{ public_path('assets/images/ttd.png') }}" alt="Tanda Tangan" class="ttd-image">
                    @elseif($jenis_ttd === 'qrcode' && $qr_ttd_base64)
                        <img src="data:image/png;base64,{{ $qr_ttd_base64 }}" alt="QR Code TTD" class="qr-code">
                    @else
                        <div style="height: 80px;"></div>
                    @endif

                    <div class="official-name">{{ $kepala_desa_nama }}</div>
                    <div class="official-title">Kepala Desa</div>
                </div>
            </div>
        </div>
    </div>

    <!-- QR Code untuk tracking (pojok kanan bawah) -->
    @if($tracking_qr_code)
    <div class="tracking-qr">
        <img src="data:image/png;base64,{{ $tracking_qr_code }}" alt="QR Code Tracking">
    </div>
    @endif
</body>
</html>
