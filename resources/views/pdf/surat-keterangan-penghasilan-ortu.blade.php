<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Miskin</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 8mm 13mm;
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 9.5pt;
            line-height: 1.25;
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
            padding-bottom: 3px;
            margin-bottom: 6px;
        }
        .header-table { width: 100%; border-collapse: collapse; }
        .header-table td { vertical-align: middle; }
        .logo-cell { width: 85px; text-align: center; }
        .logo img { width: 72px; }
        .text-cell { text-align: center; }
        .government-name {
            font-size: 16px; font-weight: 700; text-transform: uppercase;
        }
        .village-name {
            font-size: 14px; font-weight: 700; text-transform: uppercase;
        }
        .contact-info { font-size: 11px; }

        /* Title */
        .document-title { text-align: center; margin: 4px 0; }
        .title-main {
            font-size: 11pt; font-weight: 700; text-transform: uppercase;
            margin-bottom: 0px; letter-spacing: 0.5px;
            text-decoration: underline;
        }
        .document-number { font-size: 9.5pt; }

        /* Content */
        .intro-text {
            text-align: justify;
            font-size: 9.5pt;
            line-height: 1.35;
            margin-bottom: 6px;
        }

        .data-table { width: 100%; border-collapse: collapse; }
        .data-table td {
            padding: 1.5px 2px;
            vertical-align: top;
            font-size: 9.5pt;
            line-height: 1.2;
        }
        .data-table td:first-child {
            width: 155px;
        }

        .section-title {
            font-weight: bold;
            margin: 6px 0 4px 0;
            font-size: 9.5pt;
        }

        .closing-text {
            text-align: left;
            margin-top: 8px;
            margin-bottom: 10px;
            font-size: 9.5pt;
            text-indent: 40px;
        }

        /* Footer */
        .footer { margin-top: 10px; }

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
            <div class="title-main">SURAT KETERANGAN MISKIN</div>
            <div class="document-number">
                Nomor: {{ $nomor_surat ?? '-' }}
            </div>
        </div>

        <!-- Intro -->
        <div class="intro-text">
            Yang bertandatangan dibawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras, Kabupaten Seluma dengan ini menerangkan bahwa :
        </div>

        <!-- Data Anak -->
        <table class="data-table">
            <tr><td>Nama</td><td>: <strong>{{ strtoupper($nama ?? '-') }}</strong></td></tr>
            <tr><td>Tempat/Tgl Lahir</td><td>: {{ $tempat_lahir ?? '-' }}, {{ $tanggal_lahir ?? '-' }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>: {{ $jenis_kelamin ?? '-' }}</td></tr>
            <tr><td>Pekerjaan</td><td>: {{ $pekerjaan ?? '-' }}</td></tr>
            <tr><td>Alamat</td><td>: {{ $alamat ?? '-' }}</td></tr>
        </table>

        <div class="intro-text" style="margin-top: 10px;">
            Adalah benar anak kandung dari :
        </div>

        <!-- Data Ayah -->
        <div class="section-title">1. Ayah</div>
        <table class="data-table">
            <tr><td>Nama</td><td>: {{ strtoupper($nama_ayah ?? '-') }}</td></tr>
            <tr><td>Tempat/Tgl Lahir</td><td>: {{ $tempat_lahir_ayah ?? '-' }}, {{ $tanggal_lahir_ayah ?? '-' }}</td></tr>
            <tr><td>Agama</td><td>: {{ $agama_ayah ?? '-' }}</td></tr>
            <tr><td>Pekerjaan</td><td>: {{ $pekerjaan_ayah ?? '-' }}</td></tr>
            <tr><td>Kebangsaan</td><td>: Indonesia</td></tr>
            <tr><td>Penghasilan</td><td>: Rp {{ number_format($penghasilan_ayah ?? 0, 0, ',', '.') }} / Bulan</td></tr>
            <tr><td>Alamat</td><td>: {{ $alamat_ayah ?? '-' }}</td></tr>
        </table>

        <!-- Data Ibu -->
        <div class="section-title">2. Ibu</div>
        <table class="data-table">
            <tr><td>Nama</td><td>: {{ strtoupper($nama_ibu ?? '-') }}</td></tr>
            <tr><td>Tempat/Tgl Lahir</td><td>: {{ $tempat_lahir_ibu ?? '-' }}, {{ $tanggal_lahir_ibu ?? '-' }}</td></tr>
            <tr><td>Agama</td><td>: {{ $agama_ibu ?? '-' }}</td></tr>
            <tr><td>Pekerjaan</td><td>: {{ $pekerjaan_ibu ?? '-' }}</td></tr>
            <tr><td>Kebangsaan</td><td>: Indonesia</td></tr>
            <tr><td>Penghasilan</td><td>: Rp {{ number_format($penghasilan_ibu ?? 0, 0, ',', '.') }} / Bulan</td></tr>
            <tr><td>Alamat</td><td>: {{ $alamat_ibu ?? '-' }}</td></tr>
        </table>


        <div class="closing-text">
            Demikian Surat Keterangan Miskin ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagai persyaratan <strong>{{ $keperluan ?? 'Administrasi' }}</strong>.
        </div>

        <!-- Footer with Signature -->
        <div class="footer">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="width: 50%; vertical-align: top;"></td>
                    <td style="width: 50%; vertical-align: top; text-align: center;">
                        <div style="font-size: 10pt; margin-bottom: 6px;">
                            {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? now()->translatedFormat('d F Y') }}
                        </div>
                        <div style="font-weight: bold; margin-bottom: 6px; font-size: 10pt;">Kepala Desa</div>

                        <!-- TTD berdasarkan pilihan admin -->
                        @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                            <div style="margin-bottom: 4px;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 140px; height: auto;" alt="TTD Gambar">
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode')
                            <div style="margin-bottom: 4px;">
                                @if(isset($qr_ttd_base64) && $qr_ttd_base64)
                                    <img src="{{ $qr_ttd_base64 }}" style="width: 110px; height: auto;" alt="QR Code TTD">
                                @else
                                    <div style="height: 50px;"></div>
                                @endif
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'manual')
                            <div style="height: 50px; margin-bottom: 4px;"></div>
                        @else
                            <div style="height: 50px; margin-bottom: 4px;"></div>
                        @endif

                        <div style="font-weight: bold; text-decoration: underline; font-size: 10pt;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                        <div style="font-size: 10pt;">NIP. {{ $nip ?? '-' }}</div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Tembusan -->
        @if(isset($tembusan) && !empty($tembusan))
        <div style="margin-top: 15px;">
            <div style="font-weight: bold; margin-bottom: 4px; font-size: 10pt;">Tembusan :</div>
            @foreach($tembusan as $index => $item)
            <div style="margin-left: 15px; margin-bottom: 2px; font-size: 10pt;">
                {{ $index + 1 }}. {{ $item }}
            </div>
            @endforeach
        </div>
        @endif
    </div>
</body>
</html>
