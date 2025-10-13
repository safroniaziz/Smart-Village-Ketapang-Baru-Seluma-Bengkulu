<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT PERINTAH TUGAS</title>
    <style>
        @page {
            margin: 2cm 2cm 2cm 2cm;
        }

        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.6;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .kop-surat {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .kop-surat .logo {
            width: 60px;
            height: 60px;
            float: left;
            margin-right: 15px;
            margin-top: 5px;
        }

        .kop-surat .header-text {
            text-align: center;
            margin-left: 75px;
        }

        .kop-surat h2 {
            font-size: 16pt;
            font-weight: bold;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .kop-surat h3 {
            font-size: 14pt;
            font-weight: bold;
            margin: 2px 0;
            text-transform: uppercase;
        }

        .kop-surat p {
            font-size: 10pt;
            margin: 1px 0;
            font-style: italic;
        }

        .judul-surat {
            text-align: center;
            margin: 30px 0;
        }

        .judul-surat h1 {
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .nomor-surat {
            text-align: center;
            font-size: 12pt;
            margin-bottom: 30px;
        }

        .isi-surat {
            margin: 20px 0;
            text-align: justify;
        }

        .pembuka {
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
            font-size: 12pt;
        }

        .detail-tugas {
            margin: 20px 0;
        }

        .detail-tugas table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .detail-tugas td {
            padding: 5px 10px;
            vertical-align: top;
            font-size: 12pt;
        }

        .label {
            width: 25%;
            font-weight: bold;
        }

        .separator {
            width: 5%;
            text-align: center;
        }

        .value {
            width: 70%;
        }

        .personel-list {
            margin-left: 20px;
        }

        .personel-item {
            margin-bottom: 8px;
        }

        .ttd-section {
            margin-top: 40px;
            text-align: center;
        }

        .ttd-kanan {
            float: right;
            width: 300px;
            text-align: center;
        }

        .ttd-nama {
            margin-top: 80px;
            font-weight: bold;
            text-decoration: underline;
        }

        .ttd-jabatan {
            margin-top: 5px;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .qr-code {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 80px;
            height: 80px;
        }

        .qr-code img {
            width: 100%;
            height: 100%;
        }

        .ttd-image {
            max-width: 120px;
            max-height: 60px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <!-- KOP SURAT -->
    <div class="kop-surat">
        <img src="{{ public_path('images/logo-bengkulu.png') }}" alt="Logo" class="logo">
        <div class="header-text">
            <h2>PEMERINTAH KABUPATEN SELUMA</h2>
            <h3>KECAMATAN SELUMA BARAT</h3>
            <h3>DESA KETAPANG BARU</h3>
            <p>Alamat: Jl. Raya Ketapang Baru No. 123, Kec. Seluma Barat, Kab. Seluma</p>
            <p>Email: desaketapangbaru@seluma.go.id | Telp: (0739) 123456</p>
        </div>
        <div style="clear: both;"></div>
    </div>

    <!-- JUDUL SURAT -->
    <div class="judul-surat">
        <h1>SURAT PERINTAH TUGAS</h1>
    </div>

    <!-- NOMOR SURAT -->
    <div class="nomor-surat">
        <strong>Nomor: {{ $nomor_surat }}/170505/05/05/SPT/{{ date('Y') }}</strong>
    </div>

    <!-- ISI SURAT -->
    <div class="isi-surat">
        <div class="pembuka">
            <strong>MENUGASKAN :</strong>
        </div>

        <div class="detail-tugas">
            <table>
                <tr>
                    <td class="label"><strong>KEPADA</strong></td>
                    <td class="separator">:</td>
                    <td class="value">
                        <div class="personel-list">
                            @foreach($personel as $index => $person)
                            <div class="personel-item">
                                {{ $index + 1 }}. Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $person['nama'] }}<br>
                                &nbsp;&nbsp;&nbsp;Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $person['jabatan'] }}
                            </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label"><strong>TUJUAN</strong></td>
                    <td class="separator">:</td>
                    <td class="value">{{ $tujuan }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>UNTUK</strong></td>
                    <td class="separator">:</td>
                    <td class="value">{{ $keperluan }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>TANGGAL BERANGKAT</strong></td>
                    <td class="separator">:</td>
                    <td class="value">{{ \Carbon\Carbon::parse($tanggal_berangkat)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>TANGGAL KEMBALI</strong></td>
                    <td class="separator">:</td>
                    <td class="value">{{ \Carbon\Carbon::parse($tanggal_kembali)->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="label"><strong>TRANSPORTASI</strong></td>
                    <td class="separator">:</td>
                    <td class="value">{{ $transportasi }}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- TANDA TANGAN -->
    <div class="ttd-section clearfix">
        <div class="ttd-kanan">
            <p>Ketapang Baru, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
            <p><strong>KEPALA DESA KETAPANG BARU</strong></p>

            @if($jenis_ttd === 'gambar' && $ttd_path)
                <img src="{{ public_path('storage/' . $ttd_path) }}" alt="Tanda Tangan" class="ttd-image">
            @elseif($jenis_ttd === 'qrcode' && $qr_code)
                <img src="data:image/png;base64,{{ $qr_code }}" alt="QR Code TTD" style="width: 100px; height: 100px; margin: 10px 0;">
            @else
                <div style="height: 80px;"></div>
            @endif

            <div class="ttd-nama">{{ $kepala_desa_nama }}</div>
            <div class="ttd-jabatan">Kepala Desa</div>
        </div>
    </div>

    <!-- QR CODE UNTUK VERIFIKASI (pojok kanan bawah) -->
    @if($tracking_qr_code)
    <div class="qr-code">
        <img src="data:image/png;base64,{{ $tracking_qr_code }}" alt="QR Code Verifikasi">
    </div>
    @endif

</body>
</html>
