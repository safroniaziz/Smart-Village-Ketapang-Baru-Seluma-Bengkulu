<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 10mm 15mm;
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 10pt;
            line-height: 1.3;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .page {
            max-width: 100%;
            margin: 0;
            padding: 0;
            background: #fff;
        }

        /* Header */
        .header {
            border-bottom: 2px double #000;
            padding-bottom: 5px;
            margin-bottom: 8px;
        }
        .header-table { width: 100%; border-collapse: collapse; }
        .header-table td { vertical-align: middle; }
        .logo-cell { width: 100px; text-align: center; }
        .logo img { width: 80px; }
        .text-cell { text-align: center; }
        .government-name {
            font-size: 18px; font-weight: 700; text-transform: uppercase;
        }
        .village-name {
            font-size: 16px; font-weight: 700; text-transform: uppercase;
        }
        .contact-info { font-size: 12px; }

        /* Title */
        .document-title { text-align: center; margin: 5px 0; }
        .title-main {
            font-size: 14pt; font-weight: bold; text-transform: uppercase;
            margin-bottom: 0px; letter-spacing: 0.5px;
            text-decoration: underline;
        }
        .document-number { font-size: 10pt; font-family: 'DejaVu Sans', Arial, sans-serif; }

        /* Section */
        .section {
            margin-bottom: 3px;
            page-break-inside: avoid;
        }
        .section-title {
            font-size: 10pt; font-weight: bold; margin-bottom: 3px;
            padding-bottom: 2px; border-bottom: 1px solid #555;
            font-family: 'DejaVu Sans', Arial, sans-serif;
            text-transform: uppercase;
        }

        /* Data Table - Untuk layout yang rapi tanpa indent */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px;
        }

        .data-table td {
            padding: 3px 0;
            vertical-align: top;
            border-bottom: 1px solid #e5e7eb;
            font-family: 'DejaVu Sans', Arial, sans-serif !important;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .data-label {
            width: 200px;
            font-weight: bold;
            font-size: 10pt;
            font-family: 'DejaVu Sans', Arial, sans-serif !important;
            color: #374151;
        }

        .data-separator {
            width: 10px;
            text-align: center;
            font-family: 'DejaVu Sans', Arial, sans-serif;
        }

        .data-value {
            font-size: 10pt;  /* Sesuaikan dengan body font */
            font-family: 'DejaVu Sans', Arial, sans-serif;
            color: #000;
        }

        /* Statement */
        .intro-text, .statement-text {
            text-align: justify;
            font-size: 10pt;
            font-family: 'DejaVu Sans', Arial, sans-serif;
            line-height: 1.25;
            margin-bottom: 8px;
        }

        .statement-box {
            margin: 5px 0;
            padding: 5px 0;
        }

        .closing-text {
            text-align: left;
            margin-top: 10px;
            font-family: 'DejaVu Sans', Arial, sans-serif;
        }

        /* Footer */
        .footer {
            margin-top: 15px;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .footer-date {
            text-align: right;
            margin-bottom: 8px;  /* Kurangi margin */
            page-break-after: avoid;
        }

        .signature-section {
            text-align: right;
            page-break-inside: avoid;  /* Jangan pisah signature */
            break-inside: avoid;
        }
        .signature-title {
            margin-bottom: 30px;
        }
        .official-name { font-weight: bold; text-decoration: underline; }
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
            font-size: 10pt; font-weight: bold; color: #c0392b;
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
                        <div class="government-name">PEMERINTAH KABUPATEN SELUMA</div>
                        <div class="village-name">KECAMATAN SEMIDANG ALAS MARAS</div><div class="village-name">DESA KETAPANG BARU</div>
                        <div class="contact-info">Alamat : Jln Lintas Bengkulu – Manna Desa Ketapang Baru Kode Pos 38575</div>
                        <div class="contact-info">Website: ketapangbaru.selumakab.go.id</div>
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
        <div class="intro-text">
            Yang bertanda tangan di bawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma, dengan ini menerangkan bahwa:
        </div>

        <!-- Data Pemohon - tanpa header -->
        <div class="section">
            <table class="data-table">
                <tr>
                    <td class="data-label">Nama</td>
                    <td class="data-separator">:</td>
                    <td class="data-value">{{ $nama_pemohon ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="data-label">NIK</td>
                    <td class="data-separator">:</td>
                    <td class="data-value">{{ $nik ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="data-label">Tempat/Tgl Lahir</td>
                    <td class="data-separator">:</td>
                    <td class="data-value">{{ $tempat_lahir ?? '-' }}, {{ $tanggal_lahir ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="data-label">Jenis Kelamin</td>
                    <td class="data-separator">:</td>
                    <td class="data-value">{{ $jenis_kelamin ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="data-label">Agama</td>
                    <td class="data-separator">:</td>
                    <td class="data-value">{{ $agama ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="data-label">Pekerjaan</td>
                    <td class="data-separator">:</td>
                    <td class="data-value">{{ $pekerjaan ?? '-' }}</td>
                </tr>
            </table>
        </div>

        <!-- Statement -->
        <div class="statement-box">
            <div class="statement-text">
                Orang tersebut adalah benar-benar penduduk Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma dan memang telah kehilangan <strong>{{ $jenis_dokumen ?? 'KARTU KELUARGA' }}</strong> ± {{ $waktu_kehilangan ?? '6 Bulan' }} yang lalu. Surat keterangan ini dibuat untuk keperluan <strong>{{ $keperluan ?? 'Pengurusan administrasi kependudukan' }}</strong>.
            </div>
        </div>

        <div class="closing-text">
            Demikian surat keterangan ini dibuat atas dasar yang sebenarnya dan dapat dipergunakan sebagaimana mestinya.
        </div>

        <!-- Footer -->
        <div style="margin-top: 15px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%;"></td>
                    <td style="width: 50%; text-align: center;">
                        <!-- Tanggal -->
                        <div style="margin-bottom: 0px; font-size: 10pt;">
                            {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? '07 Mei 2025' }}
                        </div>
                        
                        <!-- Kepala Desa title -->
                        <div style="font-weight: bold; margin-bottom: 0px; font-size: 10pt;">Kepala Desa</div>

                        <!-- TTD berdasarkan pilihan admin -->
                        @if(isset($jenis_ttd) && $jenis_ttd == 'qrcode')
                            <!-- QR Code TTD -->
                            <div style="margin-bottom: 0px;">
                                @if(isset($qr_ttd_base64) && $qr_ttd_base64)
                                    <img src="{{ $qr_ttd_base64 }}" style="width: 110px; height: auto;" alt="QR Code TTD">
                                @else
                                    <div style="height: 50px;"><!-- Ruang kosong --></div>
                                @endif
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'gambar')
                            <!-- Gambar TTD -->
                            <div style="margin-bottom: 0px;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 150px; height: auto;" alt="TTD Gambar">
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'manual')
                            <!-- Manual TTD - Ruang kosong -->
                            <div style="height: 50px; margin-bottom: 0px;">
                                <!-- Ruang kosong untuk TTD manual -->
                            </div>
                        @else
                            <!-- Default - Ruang kosong -->
                            <div style="height: 50px; margin-bottom: 0px;">
                                <!-- Ruang kosong untuk TTD -->
                            </div>
                        @endif

                        <!-- QR Code Verifikasi Surat (untuk tracking, opsional) -->
                        @if(isset($qr_base64) && $qr_base64)
                        <div style="margin-bottom: 0px;">
                            <img class="qr-code" src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code Verifikasi Surat" style="width: 60px; height: 60px;">
                        </div>
                        @endif

                        <!-- Nama Kepala Desa -->
                        <div style="font-weight: bold; text-decoration: underline; font-size: 10pt;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                        <div style="font-size: 10pt;">NIP. {{ $nip ?? '-' }}</div>
                    </td>
                </tr>
            </table>

            <!-- Tembusan -->
            @if(isset($tembusan) && !empty($tembusan))
            <div style="margin-top: 20px;">
                <div style="font-weight: bold; margin-bottom: 0px;">Tembusan :</div>
                @foreach(explode("
", $tembusan) as $index => $item)
                    @if(trim($item))
                    <div style="margin-left: 15px; margin-bottom: 2px;">
                        {{ $index + 1 }}. {{ trim($item) }}
                    </div>
                    @endif
                @endforeach
            </div>
            @endif
        </div>
    </div>
</body>
</html>
