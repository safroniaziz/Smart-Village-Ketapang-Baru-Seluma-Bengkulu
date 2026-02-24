<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Perjanjian Perdamaian</title>
    <style>
        @page {
            size: legal portrait;
            margin: 10mm 15mm;
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 10pt;
            line-height: 1.1;
            color: #000;
            margin: 0;
            padding: 0;
            background: #fff;
        }

        .page {
            max-width: 100%;
            margin: 0;
            padding: 0;
            background: #fff;
            color: #000;
        }

        /* Header */
        .header {
            border-bottom: 2px double #000;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }
        .header-table { width: 100%; border-collapse: collapse; }
        .header-table td { vertical-align: middle; color: #000; }
        .logo-cell { width: 100px; text-align: center; }
        .logo img { width: 80px; }
        .text-cell { text-align: center; }
        .government-name {
            font-size: 18px; font-weight: 700; text-transform: uppercase; color: #000;
        }
        .village-name {
            font-size: 16px; font-weight: 700; text-transform: uppercase; color: #000;
        }
        .contact-info { font-size: 12px; color: #000; }

        .title {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 3px 0;
            text-transform: uppercase;
            color: #000;
        }

        .content {
            text-align: justify;
            margin-bottom: 0px;
            color: #000;
        }

        p, div, span, strong, td, th {
            color: #000;
        }

        .pihak-section {
            margin: 5px 0;
            margin-left: 40px;
        }

        .pihak-data {
            margin: 1px 0;
            color: #000;
        }

        .pihak-label {
            text-align: center;
            margin: 3px 0;
            font-style: italic;
            font-size: 9pt;
            color: #000;
        }

        /* Numbered list using table */
        .isi-perjanjian-table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
        }

        .isi-perjanjian-table td {
            vertical-align: top;
            padding: 2px 0;
            color: #000;
        }

        .isi-perjanjian-table .number-cell {
            width: 25px;
            text-align: left;
            font-weight: bold;
            padding-right: 8px;
        }

        .isi-perjanjian-table .content-cell {
            text-align: justify;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        .signature-table td {
            vertical-align: top;
            padding: 2px;
            text-align: center;
            color: #000;
        }

        .ttd-space {
            height: 30px;
        }

        .underline {
            border-bottom: 1px solid #000;
            display: inline-block;
            min-width: 180px;
        }

        .saksi-list {
            margin-top: 5px;
            text-align: left;
        }

        .saksi-list p {
            margin: 1px 0;
            color: #000;
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
                    <div class="village-name">KECAMATAN SEMIDANG ALAS MARAS</div>
                    <div class="village-name">DESA KETAPANG BARU</div>
                    <div class="contact-info">Alamat : Jln Lintas Bengkulu – Manna Desa Ketapang Baru Kode Pos 38575</div>
                    <div class="contact-info">Website: ketapangbaru.selumakab.go.id</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="title">
        Surat Perjanjian Perdamaian
    </div>

    <div class="content">
        <p>Kami yang bertanda tangan di bawah ini :</p>

        <div class="pihak-section">
            <div class="pihak-data">Nama : {{ $pihak1_nama ?? 'RANI OKVIANTI. Me' }}</div>
            <div class="pihak-data">Umur : {{ $pihak1_umur ?? '30' }} Tahun</div>
            <div class="pihak-data">Pekerjaan : {{ $pihak1_pekerjaan ?? 'Wiraswasta' }}</div>
            <div class="pihak-data">Agama : {{ $pihak1_agama ?? 'Islam' }}</div>
            <div class="pihak-data">Alamat : {{ $pihak1_alamat ?? 'Ketapang Baru Kec. SAM Kab. Seluma' }}</div>
            <div class="pihak-label">(Disebut Pihak ke I/Satu)</div>
        </div>

        <div class="pihak-section">
            <div class="pihak-data">Nama : {{ $pihak2_nama ?? 'MULYANO. S' }}</div>
            <div class="pihak-data">Umur : {{ $pihak2_umur ?? '50' }} Tahun</div>
            <div class="pihak-data">Pekerjaan : {{ $pihak2_pekerjaan ?? 'Petani/Pekebun' }}</div>
            <div class="pihak-data">Agama : {{ $pihak2_agama ?? 'Islam' }}</div>
            <div class="pihak-data">Alamat : {{ $pihak2_alamat ?? 'Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma.' }}</div>
            <div class="pihak-label">(Disebut Pihak ke II/Dua)</div>
        </div>

        <p>Pada hari ini <strong>{{ $hari_tanggal_perjanjian ?? 'Senin Tanggal Lima Bulan Mei' }}</strong> Tahun Dua Ribu Dua Puluh Lima dengan ini Kami Pihak Ke I (Satu) dan Pihak Ke II (Dua) Sepakat Berdamai atas persistiwa kesalah pahaman perbuatan yang tidak menyenangkan antara Pihak ke I dan Pihak ke II yang terjadi pada Hari <strong>{{ $hari_tanggal_kejadian ?? 'Sabtu Malam Minggu Tanggal Dua Puluh Enam April' }}</strong> Tahun Dua Ribuh Dua Puluh Lima Pukul <strong>{{ $waktu_kejadian ?? '22:15' }}</strong> di Desa Ketapang Baru. Adapun isi perjanjian perdamaian ini sebagai berikut :</p>

        <table class="isi-perjanjian-table">
            <tr>
                <td class="number-cell">1.</td>
                <td class="content-cell">Pihak Ke I (Satu) dan Pihak Ke II (Dua) sepakat berdamai dan Pihak ke II (Dua) berjanji tidak akan mengulangi perbuatan tersebut diatas baik kepada pihak ke I (Satu) maupun kepada orang lain.</td>
            </tr>
            <tr>
                <td class="number-cell">2.</td>
                <td class="content-cell">Pihak ke II (Dua) Bersedia memenuhi tuntutan adat berupa <strong>{{ $jenis_denda ?? 'satu buah jambar tutup ayam' }}</strong> dan uang sebesar <strong>Rp {{ number_format($nominal_denda ?? 250000, 0, ',', '.') }},-</strong> (<strong>{{ $terbilang_denda ?? 'Dua Ratus Lima Puluh Ribuh Rupiah' }}</strong>) dan denda adat tersebut telah di penuhinya oleh pihak ke II (Dua) pada hari ini <strong>{{ $hari_tanggal_perjanjian ?? 'Senin Tanggal Lima Bulan Mei' }}</strong> Tahun Dua Ribuh Dua Puluh Lima.</td>
            </tr>
            <tr>
                <td class="number-cell">3.</td>
                <td class="content-cell">Apabila Pihak ke II (Dua) melakukan/mengulangi perbuatan tersebut diatas maka permasalahan ini akan ditangani oleh pihak yang berwajib (Polisi)</td>
            </tr>
            <tr>
                <td class="number-cell">4.</td>
                <td class="content-cell">Pihak Ke I (Satu) dan Pihak Ke II (Dua) tidak akan menuntut Pihak manapun atas peristiwa tersebut diatas dan Pihak Ke I (Satu) dan Pihak Ke II (Dua) Sepakat tidak ada tuntutan di kemudian hari.</td>
            </tr>
        </table>

        <p>Demikianlah surat perjanjian Perdamaian ini di buat dalam keadaan sadar dan Kami buat dengan sesungguhnya untuk dapat digunakan bila mana perlu.</p>

        <!-- Tanda Tangan menggunakan Table -->
        <table class="signature-table">
            <!-- Baris 1: Pihak II (kiri) dan Pihak I (kanan) -->
            <tr>
                <td style="width: 50%;">
                    <p><strong>Pihak ke II (dua)</strong></p>
                </td>
                <td style="width: 50%;">
                    <p><strong>Pihak ke I (satu)</strong></p>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="ttd-space"></div>
                </td>
                <td>
                    <div class="ttd-space"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <p><strong>{{ $pihak2_nama ?? 'MULYANO.S' }}</strong></p>
                </td>
                <td>
                    <p><strong>{{ $pihak1_nama ?? 'RANI OKTAVIANTI. Me' }}</strong></p>
                </td>
            </tr>
        </table>

        <!-- Mengetahui Kepala Desa (Tengah) -->
        <table class="signature-table">
            <tr>
                <td style="text-align: center;">
                    <p><strong>Mengetahui</strong></p>
                    <p><strong>Kepala Desa</strong></p>

                    @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                        <div style="margin: 10px 0;">
                            <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 140px; height: auto;" alt="TTD Gambar">
                        </div>
                    @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode')
                        <div style="margin: 10px 0;">
                            @if(isset($qr_ttd_base64) && $qr_ttd_base64)
                                <img src="{{ $qr_ttd_base64 }}" style="width: 110px; height: auto;" alt="QR Code TTD">
                            @else
                                <div class="ttd-space"></div>
                            @endif
                        </div>
                    @else
                        <div class="ttd-space"></div>
                    @endif

                    <p><strong>{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</strong></p>
                    <p style="font-size: 10pt;">NIP. {{ $nip ?? '-' }}</p>
                </td>
            </tr>
        </table>

        <!-- Saksi-saksi -->
        <div class="saksi-list">
            <p><strong>Saksi-saksi :</strong></p>
            <p>1. {{ $saksi_1 ?? 'SIHAINI' }}</p>
            <p>2. {{ $saksi_2 ?? 'HERMANJO' }}</p>
            <p>3. {{ $saksi_3 ?? 'MERI KUSNIDI' }}</p>
            <p>4. {{ $saksi_4 ?? 'SAPTA ANIKE PUTRI' }}</p>
        </div>
    </div>
</div>
</body>
</html>
