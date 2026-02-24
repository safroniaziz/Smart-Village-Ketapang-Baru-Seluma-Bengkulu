<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Bersih Diri</title>
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
            font-size: 12pt; font-weight: 700; text-transform: uppercase;
            margin-bottom: 0px; letter-spacing: 0.5px;
            text-decoration: underline;
        }
        .document-number { font-size: 10pt; }

        /* Section */
        .section { margin-bottom: 2px; }
        .section-title {
            font-size: 10pt; font-weight: bold; margin-bottom: 2px;
            padding-bottom: 1px; border-bottom: 1px solid #555;
            text-transform: uppercase;
        }
        .data-table { width: 100%; border-collapse: collapse; }
        .data-table td {
            padding: 1.5px 2px;
            vertical-align: top;
            border-bottom: 1px dashed #ccc;
            font-size: 8.2pt;
            line-height: 1.1;
        }
        .data-table td:first-child {
            width: 135px;
        }
        .data-table tr:last-child td {
            border-bottom: none;
        }

        /* Intro */
        .intro-text {
            text-align: justify;
            font-size: 10pt;
            line-height: 1.25;
            margin-bottom: 6px;
        }

        /* Statement */
        .statement-box {
            margin: 4px 0;
            padding: 2px 0;
        }
        .statement-text { text-align: justify; font-size: 8.2pt; line-height: 1.2; }

        .closing-text {
            text-align: left; margin-top: 3px; margin-bottom: 25px; font-size: 8.2pt;
        }

        /* Footer */
        .footer { margin-top: 15px; }

        /* QR Code */
        .qr-code {
            width: 80px; height: 80px;
            border: 1px solid #ddd; padding: 3px;
        }

        @media print {
            body { background: white; padding: 0; }
            .page { box-shadow: none; border: none; }
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
            <div class="title-main">Surat Keterangan Bersih Diri</div>
            <div class="document-number">
                Nomor: {{ $nomor_surat ?? '90/170505/05/05/SKBD/KTB/V/2025' }}
            </div>
        </div>

        <!-- Intro -->
        <div class="intro-text">
            Yang bertandatangan dibawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras, Kabupaten Seluma dengan ini menerangkan bahwa :
        </div>

        <!-- Data Ayah -->
        <div class="section">
            <div class="section-title">1. Ayah</div>
            <table class="data-table">
                <tr><td>Nama</td><td>{{ $nama_ayah ?? '-' }}</td></tr>
                <tr><td>Umur</td><td>{{ $umur_ayah ?? '68' }} Tahun</td></tr>
                <tr><td>Agama</td><td>{{ $agama_ayah ?? 'Islam' }}</td></tr>
                <tr><td>Pekerjaan</td><td>{{ $pekerjaan_ayah ?? 'Petani/Pekebun' }}</td></tr>
                <tr><td>Alamat</td><td>{{ $alamat_ayah ?? 'Desa Ketapang Baru, Kec. SAM, Kabupaten Seluma' }}</td></tr>
            </table>
        </div>

        <!-- Data Ibu -->
        <div class="section">
            <div class="section-title">2. Ibu</div>
            <table class="data-table">
                <tr><td>Nama</td><td>{{ $nama_ibu ?? '-' }}</td></tr>
                <tr><td>Umur</td><td>{{ $umur_ibu ?? '63' }} Tahun</td></tr>
                <tr><td>Agama</td><td>{{ $agama_ibu ?? 'Islam' }}</td></tr>
                <tr><td>Pekerjaan</td><td>{{ $pekerjaan_ibu ?? 'Mengurus Rumah Tangga' }}</td></tr>
                <tr><td>Alamat</td><td>{{ $alamat_ibu ?? 'Desa Ketapang Baru, Kec. SAM, Kabupaten Seluma' }}</td></tr>
            </table>
        </div>

        <!-- Keterangan Orang Tua -->
        <div class="statement-text" style="margin-top: 10px; margin-bottom: 6px;">
            Menurut pengamatan kami bahwa nomor satu dan dua diatas adalah benar-benar Orang Tua dari :
        </div>

        <!-- Data Anak -->
        <div class="section">
            <div class="section-title">3. Anak</div>
            <table class="data-table">
                <tr><td>Nama</td><td>{{ $nama_anak ?? '-' }}</td></tr>
                <tr><td>Tempat/Tanggal lahir</td><td>{{ $tempat_lahir_anak ?? 'Ketapang Baru' }}, {{ $tanggal_lahir_anak ?? '29 Mei 1985' }}</td></tr>
                <tr><td>Kebangsaan</td><td>{{ $kebangsaan_anak ?? 'Indonesia' }}</td></tr>
                <tr><td>Agama</td><td>{{ $agama_anak ?? 'Islam' }}</td></tr>
                <tr><td>Pekerjaan</td><td>{{ $pekerjaan_anak ?? 'Petani/Pekebun' }}</td></tr>
                <tr><td>Alamat</td><td>{{ $alamat_anak ?? 'Rimbo Besar, Kecamatan SAM, Kabupaten Seluma' }}</td></tr>
            </table>
        </div>

        <!-- Statement -->
        <div class="statement-box">
            <div class="statement-text" style="text-indent: 40px;">
                Berdasarkan pengetahuan kami ketiga orang tersebut diatas benar-benar berkelakuan baik dan tidak terlibat G 30 S PKI, dan Organisasi terlarang maupun perkara pidana lainnya.
            </div>
            <div class="statement-text" style="margin-top: 6px;">
                Surat keterangan ini diberikan pada yang bersangkutan untuk melengkapi persyaratan: {{ $keperluan ?? 'Administrasi Anak Kandung Mendaftar SECATA PK TNI-AL' }}.
            </div>
        </div>

        <div class="closing-text">
            Demikianlah surat keterangan ini saya buat dengan sebenarnya dan dapat dipergunakan seperlunya.
        </div>

        <!-- Footer -->
        <div class="footer">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="width: 50%; vertical-align: top;"></td>
                    <td style="width: 50%; vertical-align: top; text-align: center;">
                        <div style="font-size: 9.5pt; margin-bottom: 6px;">
                            {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? '07 Mei 2025' }}
                        </div>
                        <div style="font-weight: bold; margin-bottom: 6px; font-size: 9.5pt;">Kepala Desa</div>

                        <!-- TTD berdasarkan pilihan admin -->
                        @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                            <!-- Gambar TTD -->
                            <div style="margin-bottom: 4px;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 140px; height: auto;" alt="TTD Gambar">
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode')
                            <!-- QR Code TTD -->
                            <div style="margin-bottom: 4px;">
                                @if(isset($qr_ttd_base64) && $qr_ttd_base64)
                                    <img src="{{ $qr_ttd_base64 }}" style="width: 110px; height: auto;" alt="QR Code TTD">
                                @else
                                    <div style="height: 45px;"><!-- Ruang kosong --></div>
                                @endif
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'manual')
                            <!-- Manual TTD - Ruang kosong -->
                            <div style="height: 45px; margin-bottom: 4px;">
                                <!-- Ruang kosong untuk TTD manual -->
                            </div>
                        @else
                            <!-- Default - Ruang kosong -->
                            <div style="height: 45px; margin-bottom: 4px;">
                                <!-- Ruang kosong untuk TTD -->
                            </div>
                        @endif

                        <!-- QR Code Verifikasi Surat (untuk tracking, opsional) -->
                        @if(isset($qr_base64) && $qr_base64)
                        <div style="margin-bottom: 4px;">
                            <img class="qr-code" src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code Verifikasi Surat" style="width: 55px; height: 55px;">
                        </div>
                        @endif

                        <div style="font-weight: bold; text-decoration: underline; font-size: 9.5pt;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                        <div style="font-size: 8.5pt;">NIP. {{ $nip ?? '-' }}</div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Tembusan -->
        @if(isset($tembusan) && !empty($tembusan))
        <div style="margin-top: 15px;">
            <div style="font-weight: bold; margin-bottom: 4px; font-size: 8.2pt;">Tembusan :</div>
            @foreach($tembusan as $index => $item)
            <div style="margin-left: 15px; margin-bottom: 2px; font-size: 8.2pt;">
                {{ $index + 1 }}. {{ $item }}
            </div>
            @endforeach
        </div>
        @endif


    </div>
</body>
</html>
