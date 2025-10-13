<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar Kartu Keluarga</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 10pt;
            line-height: 1.2;
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

        .kk-title {
            text-align: center;
            font-size: 16pt;
            font-weight: bold;
            margin: 30px 0 20px 0;
            text-transform: uppercase;
        }

        .kk-number {
            text-align: right;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .kk-header {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }

        .kk-info-left, .kk-info-right {
            display: table-cell;
            vertical-align: top;
            width: 48%;
        }

        .kk-info-right {
            text-align: right;
        }

        .info-row {
            margin: 3px 0;
        }

        .kk-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 9pt;
        }

        .kk-table th, .kk-table td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
            vertical-align: middle;
        }

        .kk-table th {
            background-color: #f0f0f0;
            font-weight: bold;
            font-size: 8pt;
        }

        .kk-table .no-col {
            width: 3%;
        }

        .kk-table .nama-col {
            width: 15%;
        }

        .kk-table .nik-col {
            width: 12%;
        }

        .kk-table .jk-col {
            width: 8%;
        }

        .kk-table .tempat-col {
            width: 10%;
        }

        .kk-table .tgl-col {
            width: 8%;
        }

        .kk-table .agama-col {
            width: 8%;
        }

        .kk-table .pendidikan-col {
            width: 12%;
        }

        .kk-table .pekerjaan-col {
            width: 14%;
        }

        .kk-table .goldar-col {
            width: 6%;
        }

        .empty-row {
            height: 25px;
        }

        .signature {
            margin-top: 40px;
            text-align: right;
            width: 300px;
            float: right;
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
            left: 20px;
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

        /* Table continuation for second part */
        .table-part2 {
            margin-top: 10px;
        }

        .table-part2 .kk-table th {
            font-size: 7pt;
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

    <div class="kk-title">KARTU KELUARGA</div>

    <div class="kk-number">
        NOMOR : {{ $nomor_kk ?? '1705052309190002' }}
    </div>

    <div class="kk-header">
        <div class="kk-info-left">
            <div class="info-row"><strong>NAMA KEPALA KELUARGA</strong> : {{ $nama_kepala_keluarga ?? 'ROZI PUTRA HANDI' }}</div>
            <div class="info-row"><strong>ALAMAT</strong> : {{ $alamat ?? 'DESA KETAPANG BARU' }}</div>
            <div class="info-row"><strong>RT/ RW</strong> : {{ $rt_rw ?? 'DUSUN 1' }}</div>
            <div class="info-row"><strong>DESA/ KELURAHAN</strong> : {{ $desa ?? 'KETAPANG BARU' }}</div>
        </div>
        <div class="kk-info-right">
            <div class="info-row"><strong>KECAMATAN</strong> : {{ $kecamatan ?? 'TALO' }}</div>
            <div class="info-row"><strong>KABUPATEN/KOTA</strong> : {{ $kabupaten ?? 'SELUMA' }}</div>
            <div class="info-row"><strong>KODE POS</strong> : {{ $kode_pos ?? '38875' }}</div>
            <div class="info-row"><strong>PROPINSI</strong> : {{ $propinsi ?? 'BENGKULU' }}</div>
        </div>
    </div>

    <!-- Tabel Bagian 1 -->
    <table class="kk-table">
        <thead>
            <tr>
                <th rowspan="2" class="no-col">NO</th>
                <th rowspan="2" class="nama-col">NAMA LENGKAP</th>
                <th rowspan="2" class="nik-col">NIK</th>
                <th rowspan="2" class="jk-col">JENIS KELAMIN</th>
                <th rowspan="2" class="tempat-col">TEMPAT LAHIR</th>
                <th rowspan="2" class="tgl-col">TANGGAL LAHIR</th>
                <th rowspan="2" class="agama-col">AGAMA</th>
                <th rowspan="2" class="pendidikan-col">PENDIDIKAN</th>
                <th rowspan="2" class="pekerjaan-col">JENIS PEKERJAAN</th>
                <th rowspan="2" class="goldar-col">GOL DARAH</th>
            </tr>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($anggota_keluarga) && is_array($anggota_keluarga))
                @foreach($anggota_keluarga as $index => $anggota)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td style="text-align: left;">{{ $anggota['nama_lengkap'] ?? '' }}</td>
                        <td>{{ $anggota['nik'] ?? '-' }}</td>
                        <td>{{ $anggota['jenis_kelamin'] ?? '' }}</td>
                        <td>{{ $anggota['tempat_lahir'] ?? '' }}</td>
                        <td>{{ $anggota['tanggal_lahir'] ?? '' }}</td>
                        <td>{{ $anggota['agama'] ?? '' }}</td>
                        <td>{{ $anggota['pendidikan'] ?? '' }}</td>
                        <td>{{ $anggota['pekerjaan'] ?? '' }}</td>
                        <td>{{ $anggota['gol_darah'] ?? '' }}</td>
                    </tr>
                @endforeach

                @for($i = count($anggota_keluarga); $i < 8; $i++)
                    <tr class="empty-row">
                        <td>{{ $i + 1 }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endfor
            @else
                @for($i = 1; $i <= 8; $i++)
                    <tr class="empty-row">
                        <td>{{ $i }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>

    <!-- Tabel Bagian 2 -->
    <div class="table-part2">
        <table class="kk-table">
            <thead>
                <tr>
                    <th rowspan="2" class="no-col">NO</th>
                    <th rowspan="2" style="width: 12%;">STATUS PERKAWINAN</th>
                    <th rowspan="2" style="width: 10%;">TANGGAL KAWIN</th>
                    <th rowspan="2" style="width: 15%;">STATUS HUB. DALAM KELUARGA</th>
                    <th rowspan="2" style="width: 12%;">KEWARGANEGARAAN</th>
                    <th rowspan="2" style="width: 12%;">DOKUMENTASI IMIGRASI</th>
                    <th colspan="2" style="width: 20%;">NAMA ORANG TUA</th>
                    <th rowspan="2" style="width: 8%;">NO. PASPOR</th>
                    <th rowspan="2" style="width: 8%;">NO. KITAS/ KITAP</th>
                </tr>
                <tr>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th style="width: 10%;">AYAH</th>
                    <th style="width: 10%;">IBU</th>
                    <th>15</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($anggota_keluarga) && is_array($anggota_keluarga))
                    @foreach($anggota_keluarga as $index => $anggota)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $anggota['status_perkawinan'] ?? '' }}</td>
                            <td>{{ $anggota['tanggal_kawin'] ?? '-' }}</td>
                            <td>{{ $anggota['status_hubungan'] ?? '' }}</td>
                            <td>{{ $anggota['kewarganegaraan'] ?? 'WNI' }}</td>
                            <td>{{ $anggota['dok_imigrasi'] ?? '' }}</td>
                            <td style="text-align: left;">{{ $anggota['nama_ayah'] ?? '' }}</td>
                            <td style="text-align: left;">{{ $anggota['nama_ibu'] ?? '' }}</td>
                            <td>{{ $anggota['no_paspor'] ?? '' }}</td>
                            <td>{{ $anggota['no_kitas'] ?? '' }}</td>
                        </tr>
                    @endforeach

                    @for($i = count($anggota_keluarga); $i < 8; $i++)
                        <tr class="empty-row">
                            <td>{{ $i + 1 }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endfor
                @else
                    @for($i = 1; $i <= 4; $i++)
                        <tr class="empty-row">
                            <td>{{ $i }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endfor
                @endif
            </tbody>
        </table>
    </div>

    <div class="signature">
        <p>Ketapang Baru, {{ $tanggal_ttd ?? \Carbon\Carbon::now()->format('d F Y') }}</p>
        <p><strong>Kepala Desa Ketapang Baru</strong></p>
        <br><br><br><br>
        <p class="signature-name">{{ $kepala_desa ?? 'ZULTAN ALHARA' }}</p>
    </div>

    @if($qrCode ?? null)
        <div class="qr-code">
            <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code" style="width: 100%; height: 100%;">
        </div>
    @endif

    <div style="clear: both;"></div>

    <div style="margin-top: 50px; text-align: center; font-size: 9pt; color: #666;">
        <p><em>Jika masih ada kesalahan harap hubungi admin agar diperbaiki</em></p>
    </div>
</body>
</html>
