<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Hibah</title>
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

        .title {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 3px 0;
            text-transform: uppercase;
        }

        .content {
            text-align: justify;
            margin-bottom: 0px;
        }

        .data-section {
            margin: 5px 0;
        }

        .data-row {
            margin: 3px 0;
        }

        .batas-tanah {
            margin: 3px 0;
            margin-left: 20px;
        }

        .signature-section {
            margin-top: 15px;
        }

        .signature-left {
            float: left;
            width: 40%;
            text-align: center;
        }

        .signature-right {
            float: right;
            width: 40%;
            text-align: center;
        }

        .signature-center {
            text-align: center;
            margin-top: 60px;
            clear: both;
        }

        .saksi-section {
            margin-top: 10px;
            float: left;
            width: 40%;
        }

        .clearfix {
            clear: both;
        }

        .underline {
            border-bottom: 1px solid #000;
            display: inline-block;
            min-width: 200px;
            margin-left: 10px;
        }

        .spacing {
            margin: 40px 0;
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

    <div class="title">
        Surat Keterangan Hibah
    </div>

    <div class="content">
        <p>Kami yang bertanda tangan dibawah ini :</p>

        <div class="data-section">
            <div class="data-row">Nama : {{ $nama_penghibah ?? '................................' }}</div>
            <div class="data-row">Umur : {{ $umur_penghibah ?? '................................' }}</div>
            <div class="data-row">Pekerjaan : {{ $pekerjaan_penghibah ?? '................................' }}</div>
            <div class="data-row">Agama : {{ $agama_penghibah ?? '................................' }}</div>
            <div class="data-row">Alamat : {{ $alamat_penghibah ?? '................................' }}</div>
        </div>

        <p style="text-align: center; margin-bottom: 2px;"><strong>Disebut Pihak Ke I / Satu (Penghibah)</strong></p>

        <p style="margin: 2px 0;">Pemerintah Desa Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma</p>
        <p style="text-align: center; margin-top: 2px;"><strong>Disebut Pihak Ke II/ Dua (Penerima)</strong></p>

        <p style="margin-top: 3px; margin-bottom: 3px;">Pada hari ini <strong>{{ $hari_tanggal ?? '........................................................................' }}</strong> Tahun Dua Ribu Dua Puluh Lima Pihak Ke I (Satu) Telah Menghibahkan Tanah Dengan luas ±<strong>{{ $luas_tanah ?? '............' }}</strong> M<sup>2</sup> yang berlokasikan di Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma Kepada Pihak Ke II (Dua) Adapun batas – batas tanah tersebut :</p>

        <div class="batas-tanah">
            <div class="data-row">Sebelah Utara batas Dengan Tanah {{ $batas_utara ?? '..................' }} ( {{ $pemilik_utara ?? '..................' }} )</div>
            <div class="data-row">Sebelah Barat batas Dengan Tanah {{ $batas_barat ?? '..................' }} ( {{ $pemilik_barat ?? '..................' }} )</div>
            <div class="data-row">Sebelah Selatan batas Dengan Tanah {{ $batas_selatan ?? '..................' }} ( {{ $pemilik_selatan ?? '..................' }} )</div>
            <div class="data-row">Sebelah Timur batas Dengan Tanah {{ $batas_timur ?? '..................' }} ( {{ $pemilik_timur ?? '..................' }} )</div>
        </div>

        <p style="margin-top: 0px;">Demikianlah surat Hibah ini dibuat dengan sesungguhnya untuk dapat digunakan bila mana perlu.</p>

        <!-- Signature Section -->
        <div style="margin-top: 0px;">
            <table style="width: 100%; border-collapse: collapse;">
                <!-- Row 1: TTD Pihak Ke Satu (Kanan) -->
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 60%; text-align: center;">
                        <div style="font-size: 10pt; margin-bottom: 1px;">Pihak Ke Satu (1)</div>
                        <div style="height: 35px;"></div>
                        <div style="font-weight: bold; text-decoration: underline; font-size: 10pt;">{{ strtoupper($nama_penghibah ?? '................................') }}</div>
                    </td>
                </tr>

                <!-- Row 2: Saksi-saksi (List) -->
                <tr>
                    <td style="padding-top: 1px;" colspan="2">
                        <p style="margin: 0; font-size: 10pt;">Saksi-saksi:</p>
                        <p style="margin: 1px 0 0 20px; font-size: 10pt;">1. {{ $saksi_1 ?? '................................' }}</p>
                        <p style="margin: 1px 0 0 20px; font-size: 10pt;">2. {{ $saksi_2 ?? '................................' }}</p>
                        <p style="margin: 1px 0 0 20px; font-size: 10pt;">3. {{ $saksi_3 ?? '................................' }}</p>
                    </td>
                </tr>

                <!-- Row 3: TTD Kepala Desa (Kanan) -->
                <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 60%; vertical-align: top; text-align: center; padding-top: 1px;">
                        <div style="font-weight: bold; margin-bottom: 2px; font-size: 10pt;">Mengetahui :</div>
                        <div style="font-weight: bold; margin-bottom: 2px; font-size: 10pt;">Kepala Desa</div>

                        @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                            <div style="margin-bottom: 4px;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 140px; height: auto;" alt="TTD Gambar">
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode')
                            <div style="margin-bottom: 4px;">
                                @if(isset($qr_ttd_base64) && $qr_ttd_base64)
                                    <img src="{{ $qr_ttd_base64 }}" style="width: 110px; height: auto;" alt="QR Code TTD">
                                @else
                                    <div style="height: 45px;"></div>
                                @endif
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'manual')
                            <div style="height: 45px; margin-bottom: 4px;"></div>
                        @else
                            <div style="height: 45px; margin-bottom: 4px;"></div>
                        @endif

                        <div style="font-weight: bold; text-decoration: underline; font-size: 10pt;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                        <div style="font-size: 10pt;">NIP. {{ $nip ?? '-' }}</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
