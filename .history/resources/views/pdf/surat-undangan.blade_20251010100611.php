<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Undangan</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            color: #000;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #000;
            padding-bottom: 15px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            float: left;
            margin-right: 20px;
        }
        
        .header-text {
            text-align: center;
            font-weight: bold;
        }
        
        .header-text h1 {
            font-size: 16pt;
            margin: 5px 0;
            text-transform: uppercase;
        }
        
        .header-text h2 {
            font-size: 14pt;
            margin: 2px 0;
            text-transform: uppercase;
        }
        
        .header-text p {
            font-size: 10pt;
            margin: 2px 0;
            font-weight: normal;
        }
        
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
        
        .surat-info {
            margin: 20px 0;
            text-align: left;
        }
        
        .surat-info table {
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        .surat-info td {
            padding: 2px 5px;
            vertical-align: top;
        }
        
        .content {
            text-align: justify;
            margin: 20px 0;
        }
        
        .content p {
            margin: 10px 0;
            text-indent: 50px;
        }
        
        .detail-acara {
            margin: 20px 0 20px 50px;
        }
        
        .detail-acara table {
            border-collapse: collapse;
        }
        
        .detail-acara td {
            padding: 3px 10px 3px 0;
            vertical-align: top;
        }
        
        .signature {
            margin-top: 40px;
            text-align: center;
        }
        
        .signature-left {
            float: left;
            width: 45%;
            text-align: center;
        }
        
        .signature-right {
            float: right;
            width: 45%;
            text-align: center;
        }
        
        .signature-name {
            margin-top: 80px;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
        }
        
        .qr-code {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 100px;
            height: 100px;
        }
        
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 72pt;
            color: rgba(0, 0, 0, 0.05);
            z-index: -1;
            font-weight: bold;
        }
        
        @media print {
            body { margin: 0; }
            .qr-code { position: fixed; }
        }
    </style>
</head>
<body>
    <div class="watermark">DESA KETAPANG BARU</div>
    
    <div class="header clearfix">
        <img src="data:image/png;base64,{{ $logoBase64 ?? '' }}" alt="Logo Desa" class="logo">
        <div class="header-text">
            <h1>PEMERINTAH KABUPATEN SELUMA</h1>
            <h2>KECAMATAN TALO</h2>
            <h2>DESA KETAPANG BARU</h2>
            <p>Alamat: Jl. Raya Ketapang Baru, Kec. Talo, Kab. Seluma, Bengkulu</p>
            <p>Email: desaketapangbaru@gmail.com | Telp: (0739) 123456</p>
        </div>
    </div>

    <div class="surat-info">
        <table>
            <tr>
                <td style="width: 120px;">No</td>
                <td style="width: 20px;">:</td>
                <td>{{ $nomor_surat ?? '...../SP/KTB/..../.....'}}</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td>{{ $lampiran ?? '1 (satu) Berkas' }}</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td><strong>{{ $perihal ?? 'Panggilan Penting' }}</strong></td>
            </tr>
        </table>

        <div style="text-align: right; margin-bottom: 30px;">
            Ketapang Baru, {{ $tanggal_surat ?? \Carbon\Carbon::now()->format('d F Y') }}
        </div>

        <div style="margin-bottom: 30px;">
            <p>Kepada</p>
            <p>Yth, {{ $kepada ?? 'Bapak/Ibu ........................' }}</p>
            <p>Di</p>
            <p style="margin-left: 50px;">Tempat</p>
        </div>
    </div>

    <div class="content">
        <p><strong>Dengan Hormat,</strong></p>
        
        <p>{{ $pembukaan ?? 'Sehubungan dengan telah disepakati pembentukan time pendataan smart village pada tanggal 4 Juni 2025, mengingat acara ini sangat penting maka kami mengundang bapak/ibu untuk hadir:' }}</p>

        <div class="detail-acara">
            <table>
                <tr>
                    <td style="width: 80px;">Hari</td>
                    <td style="width: 20px;">:</td>
                    <td>{{ $hari_tanggal ?? 'Jum\'at, 13 Juni 2025' }}</td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td>:</td>
                    <td>{{ $jam ?? '09.30 WIB – selesai' }}</td>
                </tr>
                <tr>
                    <td>Acara</td>
                    <td>:</td>
                    <td>{{ $acara ?? 'Penegasan Tanggung jawab kerja pendataan smart village' }}</td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td>:</td>
                    <td>{{ $tempat ?? 'Gedung Perpustakaan/Kantor Desa Ketapang Baru' }}</td>
                </tr>
            </table>
        </div>

        <p>{{ $penutup ?? 'Demikian panggilan ini kami sampaikan dan semoga Bapak/Ibu dapat menghadiri dengan tepat waktu, atas perhatiannya Kami ucapkan terimakasih.' }}</p>
    </div>

    <div class="signature clearfix">
        <div class="signature-right">
            <p>Ketapang Baru, {{ $tanggal_ttd ?? \Carbon\Carbon::now()->format('d F Y') }}</p>
            <p><strong>Kepala Desa</strong></p>
            <br><br><br><br>
            <p class="signature-name">{{ $kepala_desa ?? 'ZULTAN ALHARA' }}</p>
        </div>
    </div>

    @if($qrCode ?? null)
        <div class="qr-code">
            <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code" style="width: 100%; height: 100%;">
        </div>
    @endif
</body>
</html>