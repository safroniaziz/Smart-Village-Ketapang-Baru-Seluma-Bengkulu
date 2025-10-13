<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Domisili</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.6;
            color: #000;
            padding: 20mm;
            background-color: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .kop-surat {
            border-bottom: 3px solid #000;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .logo {
            float: left;
            width: 80px;
            height: 80px;
            margin-right: 20px;
        }

        .info-header {
            text-align: center;
            line-height: 1.4;
        }

        .info-header h1 {
            font-size: 18pt;
            font-weight: bold;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .info-header h2 {
            font-size: 16pt;
            font-weight: bold;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .info-header p {
            font-size: 11pt;
            margin: 2px 0;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .title-surat {
            text-align: center;
            margin: 30px 0;
        }

        .title-surat h3 {
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .nomor-surat {
            font-size: 12pt;
            font-weight: normal;
        }

        .content {
            text-align: justify;
            margin: 25px 0;
            line-height: 1.8;
        }

        .content p {
            margin-bottom: 15px;
            text-indent: 40px;
        }

        .data-pemohon {
            margin: 20px 0;
            line-height: 2;
        }

        .data-row {
            display: flex;
            margin-bottom: 8px;
        }

        .data-label {
            width: 200px;
            font-weight: normal;
        }

        .data-separator {
            width: 20px;
            text-align: center;
        }

        .data-value {
            flex: 1;
            font-weight: normal;
        }

        .ttd-section {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }

        .ttd-left, .ttd-right {
            width: 45%;
            text-align: center;
        }

        .ttd-content {
            margin-top: 15px;
        }

        .jabatan {
            font-weight: bold;
            margin-bottom: 60px;
        }

        .nama-ttd {
            font-weight: bold;
            text-decoration: underline;
        }

        .qr-ttd {
            width: 80px;
            height: 80px;
            margin: 10px auto;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qr-ttd img {
            width: 70px;
            height: 70px;
        }

        .footer {
            margin-top: 40px;
            font-size: 10pt;
            text-align: center;
            color: #666;
        }

        @media print {
            body {
                padding: 15mm;
                font-size: 11pt;
            }

            .header {
                margin-bottom: 20px;
            }

            .ttd-section {
                margin-top: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Header/Kop Surat -->
    <div class="kop-surat clearfix">
        <img src="{{ public_path('assets/images/logo-seluma.png') }}" alt="Logo" class="logo">
        <div class="info-header">
            <h1>Pemerintah Kabupaten Seluma</h1>
            <h2>Kecamatan Semidang Alas Maras</h2>
            <h2>Desa Ketapang Baru</h2>
            <p>Alamat: Jl. Raya Ketapang Baru, Kec. Semidang Alas Maras</p>
            <p>Kabupaten Seluma, Provinsi Bengkulu</p>
            <p>Kode Pos: 38467</p>
        </div>
    </div>

    <!-- Judul Surat -->
    <div class="title-surat">
        <h3>Surat Keterangan Domisili</h3>
        <div class="nomor-surat">
            Nomor : {{ $nomor_surat }}
        </div>
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <p>Yang bertanda tangan dibawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma dengan ini menerangkan bahwa :</p>

        <div class="data-pemohon">
            <div class="data-row">
                <div class="data-label">Nama</div>
                <div class="data-separator">:</div>
                <div class="data-value">{{ strtoupper($nama_pemohon) }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Nik</div>
                <div class="data-separator">:</div>
                <div class="data-value">{{ $nik_pemohon }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Tempat/Tanggal lahir</div>
                <div class="data-separator">:</div>
                <div class="data-value">{{ $tempat_lahir }}, {{ $tanggal_lahir }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Jenis Kelamin</div>
                <div class="data-separator">:</div>
                <div class="data-value">{{ $jenis_kelamin }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Agama</div>
                <div class="data-separator">:</div>
                <div class="data-value">{{ $agama }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Status Perkawinan</div>
                <div class="data-separator">:</div>
                <div class="data-value">{{ $status_perkawinan }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Pekerjaan</div>
                <div class="data-separator">:</div>
                <div class="data-value">{{ $pekerjaan }}</div>
            </div>
            <div class="data-row">
                <div class="data-label">Alamat</div>
                <div class="data-separator">:</div>
                <div class="data-value">{{ $alamat }}</div>
            </div>
        </div>

        <p>Nama tersebut diatas adalah benar Penduduk Desa Karang Dapo Kecamatan Semidang Alas Maras Kabupaten Seluma dan Benar – Benar Berdomisili di Desa Ketapang Baru.</p>

        <p>Demikianlah Surat keterangan ini dibuat dengan sebenarnya dan dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <!-- TTD Section -->
    <div class="ttd-section">
        <div class="ttd-left">
            <!-- Kosong untuk TTD pemohon jika diperlukan -->
        </div>
        <div class="ttd-right">
            <div class="ttd-content">
                <p>Ketapang Baru, {{ $tanggal_surat }}</p>
                <div class="jabatan">Kepala Desa Ketapang Baru</div>

                @if(isset($jenis_ttd) && $jenis_ttd === 'qrcode' && isset($qr_ttd_base64))
                    <div class="qr-ttd">
                        <img src="data:image/png;base64,{{ $qr_ttd_base64 }}" alt="QR TTD">
                    </div>
                @else
                    <div style="height: 80px;"></div>
                @endif

                <div class="nama-ttd">{{ $kepala_desa_nama ?? 'ZULTAN ALHARA' }}</div>
            </div>
        </div>
    </div>

    <!-- Footer dengan QR Code untuk Tracking -->
    <div class="footer">
        @if(isset($tracking_qr_code))
            <div style="margin-top: 30px; text-align: center;">
                <p style="font-size: 9pt; margin-bottom: 5px;">Verifikasi Surat:</p>
                <img src="data:image/png;base64,{{ $tracking_qr_code }}" style="width: 60px; height: 60px;">
                <p style="font-size: 8pt; color: #666;">{{ $tracking_number ?? '' }}</p>
            </div>
        @endif

        @if(isset($tembusan) && !empty($tembusan))
            <div style="margin-top: 20px; text-align: left; font-size: 10pt;">
                <p><strong>Tembusan:</strong></p>
                @foreach($tembusan as $item)
                    <p>{{ $loop->iteration }}. {{ $item }}</p>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
