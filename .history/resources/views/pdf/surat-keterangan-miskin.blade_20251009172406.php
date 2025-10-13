<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Miskin</title>
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
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .info-header p {
            font-size: 11pt;
            margin-bottom: 2px;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .title {
            text-align: center;
            margin: 30px 0;
        }

        .title h3 {
            font-size: 16pt;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 10px;
        }

        .nomor {
            font-size: 12pt;
            font-weight: bold;
        }

        .content {
            margin: 25px 0;
            text-align: justify;
        }

        .content p {
            margin-bottom: 15px;
            text-indent: 0;
        }

        .data-pejabat {
            margin-left: 0;
        }

        .data-pejabat table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-pejabat td {
            padding: 3px 0;
            vertical-align: top;
        }

        .data-pejabat .label {
            width: 180px;
        }

        .data-pejabat .colon {
            width: 20px;
            text-align: center;
        }

        .data-pemohon {
            margin: 20px 0;
            margin-left: 20px;
        }

        .data-pemohon table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-pemohon td {
            padding: 3px 0;
            vertical-align: top;
        }

        .data-pemohon .label {
            width: 180px;
        }

        .data-pemohon .colon {
            width: 20px;
            text-align: center;
        }

        .keterangan-text {
            margin: 20px 0;
            text-align: justify;
            line-height: 1.8;
        }

        .signature-section {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .signature-left {
            width: 45%;
            text-align: center;
        }

        .signature-right {
            width: 45%;
            text-align: center;
        }

        .signature-space {
            height: 100px;
            margin: 20px 0;
        }

        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }

        .tracking-section {
            position: fixed;
            bottom: 20mm;
            right: 20mm;
            text-align: center;
        }

        .tracking-qr {
            width: 60px;
            height: 60px;
            margin-bottom: 5px;
        }

        .tracking-number {
            font-size: 8pt;
            color: #666;
        }

        .tembusan {
            margin-top: 30px;
            page-break-inside: avoid;
        }

        .tembusan h4 {
            font-size: 12pt;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .tembusan ol {
            margin-left: 20px;
        }

        .tembusan li {
            margin-bottom: 5px;
        }

        @media print {
            body {
                padding: 15mm;
            }

            .tracking-section {
                bottom: 15mm;
                right: 15mm;
            }
        }
    </style>
</head>
<body>
    <!-- Kop Surat -->
    <div class="kop-surat clearfix">
        <div class="logo">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==" alt="Logo" style="width: 80px; height: 80px; background: #ddd;">
        </div>
        <div class="info-header">
            <h1>PEMERINTAH KABUPATEN SELUMA</h1>
            <h2>KECAMATAN SEMIDANG ALAS MARAS</h2>
            <h2>DESA KETAPANG BARU</h2>
            <p>Alamat: Ketapang Baru, Kec. Semidang Alas Maras, Kab. Seluma, Provinsi Bengkulu</p>
            <p>Kode Pos: 38874 | Email: ketapangbaru@seluma.go.id</p>
        </div>
    </div>

    <!-- Judul Surat -->
    <div class="title">
        <h3>SURAT KETERANGAN MISKIN</h3>
        <div class="nomor">NOMOR : {{ $nomor_surat }}</div>
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <p>Yang bertanda tangan dibawah ini :</p>

        <div class="data-pejabat">
            <table>
                <tr>
                    <td class="label">Nama</td>
                    <td class="colon">:</td>
                    <td>{{ $kepala_desa_nama }}</td>
                </tr>
                <tr>
                    <td class="label">NIP</td>
                    <td class="colon">:</td>
                    <td>{{ $nip ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Pangkat/ Golongan</td>
                    <td class="colon">:</td>
                    <td>{{ $pangkat_golongan ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Jabatan</td>
                    <td class="colon">:</td>
                    <td>Kepala Desa</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td class="colon">:</td>
                    <td>Ketapang Baru, Kec. Semidang Alas Maras, Kab. Seluma</td>
                </tr>
            </table>
        </div>

        <p style="margin-top: 25px;">Menerangkan bahwa,</p>

        <div class="data-pemohon">
            <table>
                <tr>
                    <td style="width: 30px;">1.</td>
                    <td class="label">Nama</td>
                    <td class="colon">:</td>
                    <td>{{ strtoupper($nama) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="label">Tempat Tanggal Lahir</td>
                    <td class="colon">:</td>
                    <td>{{ $tempat_lahir }}, {{ $tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="label">Agama</td>
                    <td class="colon">:</td>
                    <td>{{ $agama }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="label">Kewarganegaraan</td>
                    <td class="colon">:</td>
                    <td>WNI</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="label">Status</td>
                    <td class="colon">:</td>
                    <td>{{ $jenis_kelamin === 'Laki-Laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="label">Alamat</td>
                    <td class="colon">:</td>
                    <td>{{ $alamat }}</td>
                </tr>
            </table>
        </div>

        <div class="keterangan-text">
            <p>Menerangkan dengan sebenar-benarnya bahwa yang namanya tertera di atas benar termasuk keluarga tidak mampu (MISKIN) dan TERDAFTAR Dalam Data Terpadu Kesejahteraan Sosial (DTKS).</p>

            <p>Demikian Surat Keterangan ini dibuat demi kepentingan yang bersangkutan untuk pengurusan PIP, terima kasih.</p>
        </div>

        <!-- Tanda Tangan -->
        <div class="signature-section">
            <div class="signature-left">
                <p>Mengetahui Camat</p>
                <div class="signature-space">
                    @if(isset($jenis_ttd_camat) && $jenis_ttd_camat === 'qrcode' && isset($qr_ttd_camat_base64))
                        <img src="data:image/png;base64,{{ $qr_ttd_camat_base64 }}" alt="QR TTD Camat" style="width: 80px; height: 80px; margin: 10px auto;">
                        <p style="font-size: 8pt; color: #666;">*Scan QR untuk verifikasi tanda tangan</p>
                    @elseif(isset($jenis_ttd_camat) && $jenis_ttd_camat === 'gambar')
                        <img src="{{ asset('images/ttd-camat.png') }}" alt="TTD Camat" style="width: 120px; height: auto; margin: 10px auto;">
                    @endif
                </div>
                <p class="signature-name">{{ $nama_camat ?? '.........................' }}</p>
                @if(isset($nip_camat) && $nip_camat)
                    <p>NIP. {{ $nip_camat }}</p>
                @endif
            </div>

            <div class="signature-right">
                <p>{{ $tanggal_surat }}</p>
                <p>Kepala Desa Ketapang Baru</p>
                <div class="signature-space">
                    @if(isset($jenis_ttd) && $jenis_ttd === 'qrcode' && isset($qr_ttd_base64))
                        <img src="data:image/png;base64,{{ $qr_ttd_base64 }}" alt="QR TTD Kepala Desa" style="width: 80px; height: 80px; margin: 10px auto;">
                        <p style="font-size: 8pt; color: #666;">*Scan QR untuk verifikasi tanda tangan</p>
                    @elseif(isset($jenis_ttd) && $jenis_ttd === 'gambar')
                        <img src="{{ asset('images/ttd-kepala-desa.png') }}" alt="TTD Kepala Desa" style="width: 120px; height: auto; margin: 10px auto;">
                    @endif
                </div>
                <p class="signature-name">{{ $kepala_desa_nama }}</p>
                @if(isset($nip) && $nip && $nip !== '-')
                    <p>NIP. {{ $nip }}</p>
                @endif
            </div>
        </div>

        <!-- Tembusan -->
        @if(isset($tembusan) && count($tembusan) > 0)
            <div class="tembusan">
                <h4>Tembusan:</h4>
                <ol>
                    @foreach($tembusan as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
    </div>

    <!-- Tracking QR Code -->
    @if(isset($tracking_qr_code))
        <div class="tracking-section">
            <img src="data:image/png;base64,{{ $tracking_qr_code }}" alt="Tracking QR" class="tracking-qr">
            <div class="tracking-number">{{ $tracking_number }}</div>
        </div>
    @endif
</body>
</html>
