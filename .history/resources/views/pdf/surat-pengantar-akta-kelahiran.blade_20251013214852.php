<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Pengantar Akta Kelahiran</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 11pt;
            line-height: 1.4;
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

        .form-header {
            margin: 20px 0;
        }

        .form-header table {
            width: 100%;
            border-collapse: collapse;
        }

        .form-header td {
            padding: 3px 0;
            vertical-align: top;
        }

        .form-title {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            margin: 30px 0 20px 0;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .section {
            margin: 20px 0;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
            text-decoration: underline;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .data-table td {
            padding: 3px 5px;
            vertical-align: top;
        }

        .data-table .label {
            width: 200px;
            font-weight: normal;
        }

        .data-table .colon {
            width: 20px;
            text-align: center;
        }

        .data-table .value {
            font-weight: normal;
        }

        .signature-section {
            margin-top: 50px;
            display: table;
            width: 100%;
        }

        .signature-left {
            display: table-cell;
            width: 50%;
            text-align: center;
            vertical-align: top;
        }

        .signature-right {
            display: table-cell;
            width: 50%;
            text-align: center;
            vertical-align: top;
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

    <div class="form-header">
        <table class="data-table">
            <tr>
                <td class="label">Pemerintah Kab/Kota</td>
                <td class="colon">:</td>
                <td class="value">{{ $kabupaten ?? 'Seluma' }}</td>
            </tr>
            <tr>
                <td class="label">Kecamatan</td>
                <td class="colon">:</td>
                <td class="value">{{ $kecamatan ?? 'Talo' }}</td>
            </tr>
            <tr>
                <td class="label">Desa</td>
                <td class="colon">:</td>
                <td class="value">{{ $desa ?? 'Ketapang Baru' }}</td>
            </tr>
        </table>
    </div>

    <div class="form-title">FORMULIR PELAPORAN KELAHIRAN</div>

    <div class="section">
        <table class="data-table">
            <tr>
                <td class="label">Nama Kepala Keluarga</td>
                <td class="colon">:</td>
                <td class="value">{{ $nama_kepala_keluarga ?? 'ROZI PUTRA HANDI' }}</td>
            </tr>
            <tr>
                <td class="label">NO. Kartu Keluarga</td>
                <td class="colon">:</td>
                <td class="value">{{ $no_kk ?? '' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <table class="data-table">
            <tr>
                <td class="label">Surat Keterangan Kelahiran</td>
                <td class="colon">:</td>
                <td class="value">{{ $surat_ket_kelahiran ?? '' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">BAYI/ANAK</div>
        <table class="data-table">
            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td class="value">{{ $nama_bayi ?? 'RAIQAL JUSTIN GILBERT' }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="colon">:</td>
                <td class="value">{{ $jenis_kelamin_bayi ?? 'Laki-Laki' }}</td>
            </tr>
            <tr>
                <td class="label">Tempat Kelahiran</td>
                <td class="colon">:</td>
                <td class="value">{{ $tempat_lahir_bayi ?? 'Seluma' }}</td>
            </tr>
            <tr>
                <td class="label">Hari dan Tanggal Lahir</td>
                <td class="colon">:</td>
                <td class="value">{{ $hari_tanggal_lahir ?? '12 Agustus 2024' }}</td>
            </tr>
            <tr>
                <td class="label">Pukul</td>
                <td class="colon">:</td>
                <td class="value">{{ $pukul_lahir ?? '' }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelahiran</td>
                <td class="colon">:</td>
                <td class="value">{{ $jenis_kelahiran ?? 'Tunggal' }}</td>
            </tr>
            <tr>
                <td class="label">Kelahiran Ke</td>
                <td class="colon">:</td>
                <td class="value">{{ $kelahiran_ke ?? '2 (Dua)' }}</td>
            </tr>
            <tr>
                <td class="label">Penolong Kelahiran</td>
                <td class="colon">:</td>
                <td class="value">{{ $penolong_kelahiran ?? 'Bidan' }}</td>
            </tr>
            <tr>
                <td class="label">Berat Bayi</td>
                <td class="colon">:</td>
                <td class="value">{{ $berat_bayi ?? '' }}</td>
            </tr>
            <tr>
                <td class="label">Panjang Bayi</td>
                <td class="colon">:</td>
                <td class="value">{{ $panjang_bayi ?? '' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">IBU</div>
        <table class="data-table">
            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td class="value">{{ $nik_ibu ?? '1705054507980001' }}</td>
            </tr>
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td class="value">{{ $nama_ibu ?? 'HAVEZA DIANA' }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Kelahiran</td>
                <td class="colon">:</td>
                <td class="value">{{ $tanggal_lahir_ibu ?? 'Ketapang Baru, 15 Juli 1998' }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td class="value">{{ $pekerjaan_ibu ?? 'Mengurus Rumah Tangga' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td class="value">{{ $alamat_ibu ?? 'Ketapang Baru, Kec. Talo, Kab. Seluma' }}</td>
            </tr>
            <tr>
                <td class="label">Kewarganegaraan</td>
                <td class="colon">:</td>
                <td class="value">{{ $kewarganegaraan_ibu ?? 'WNI' }}</td>
            </tr>
            <tr>
                <td class="label">Kebangsaan</td>
                <td class="colon">:</td>
                <td class="value">{{ $kebangsaan_ibu ?? 'Indonesia' }}</td>
            </tr>
            <tr>
                <td class="label">No/Tanggal Perkawinan</td>
                <td class="colon">:</td>
                <td class="value">{{ $tanggal_perkawinan ?? '31 Agustus 2019' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">AYAH</div>
        <table class="data-table">
            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td class="value">{{ $nik_ayah ?? '1705050208000002' }}</td>
            </tr>
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td class="value">{{ $nama_ayah ?? 'ROZI PUTRA HANDI' }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Kelahiran</td>
                <td class="colon">:</td>
                <td class="value">{{ $tanggal_lahir_ayah ?? 'Ketapang Baru, 01 September 1997' }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td class="value">{{ $pekerjaan_ayah ?? 'Wiraswasta' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td class="value">{{ $alamat_ayah ?? 'Ketapang Baru, Kec. Talo, Kab. Seluma' }}</td>
            </tr>
            <tr>
                <td class="label">Kewarganegaraan</td>
                <td class="colon">:</td>
                <td class="value">{{ $kewarganegaraan_ayah ?? 'WNI' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">PELAPOR</div>
        <table class="data-table">
            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td class="value">{{ $nik_pelapor ?? '1705054507980001' }}</td>
            </tr>
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td class="value">{{ $nama_pelapor ?? 'HAVEZA DIANA' }}</td>
            </tr>
            <tr>
                <td class="label">Umur</td>
                <td class="colon">:</td>
                <td class="value">{{ $umur_pelapor ?? '28 Tahun' }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="colon">:</td>
                <td class="value">{{ $jenis_kelamin_pelapor ?? 'Perempuan' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">SAKSI I</div>
        <table class="data-table">
            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td class="value">{{ $nik_saksi1 ?? '1605214503890002' }}</td>
            </tr>
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td class="value">{{ $nama_saksi1 ?? 'UMIYATI' }}</td>
            </tr>
            <tr>
                <td class="label">Umur</td>
                <td class="colon">:</td>
                <td class="value">{{ $umur_saksi1 ?? '35 Tahun' }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="colon">:</td>
                <td class="value">{{ $jenis_kelamin_saksi1 ?? 'Perempuan' }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Pekerjaan</td>
                <td class="colon">:</td>
                <td class="value">{{ $pekerjaan_saksi1 ?? 'Bidan' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td class="value">{{ $alamat_saksi1 ?? 'Muara Timput, Kec. Talo, Kab. Seluma' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">SAKSI II</div>
        <table class="data-table">
            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td class="value">{{ $nik_saksi2 ?? '1705054107780042' }}</td>
            </tr>
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td class="value">{{ $nama_saksi2 ?? 'HERMAYATI' }}</td>
            </tr>
            <tr>
                <td class="label">Umur</td>
                <td class="colon">:</td>
                <td class="value">{{ $umur_saksi2 ?? '47 Tahun' }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="colon">:</td>
                <td class="value">{{ $jenis_kelamin_saksi2 ?? 'Perempuan' }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Pekerjaan</td>
                <td class="colon">:</td>
                <td class="value">{{ $pekerjaan_saksi2 ?? 'Petani/Pekebun' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td class="value">{{ $alamat_saksi2 ?? 'Muara Timput, Kec. Talo, Kab. Seluma' }}</td>
            </tr>
        </table>
    </div>

    <!-- Footer -->
    <div style="margin-top: 50px;">
        <div style="text-align: right; margin-bottom: 10px; font-size: 10pt;">
            {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? '07 Mei 2025' }}
        </div>
        <div style="text-align: center; margin-top: 30px;">
            <!-- Signature area di tengah -->
            <div style="display: inline-block; text-align: center;">
                <div style="font-weight: 600; margin-bottom: 10px; font-size: 10pt;">Kepala Desa</div>

                <!-- QR Code Verifikasi di atas nama kepala desa -->
                @if(isset($qr_base64))
                <div style="margin-bottom: 15px;">
                    <img class="qr-code" src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code">
                </div>
                @endif

                <div style="font-weight: 700; text-decoration: underline; font-size: 10pt;">{{ $kepala_desa_nama ?? 'Zultan Alhara' }}</div>
                <div style="font-size: 9pt;">{{ $nip ?? 'NIP. -' }}</div>
            </div>
        </div>
    </div>

    @if($qrCode ?? null)
        <div class="qr-code">
            <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code" style="width: 100%; height: 100%;">
        </div>
    @endif
</body>
</html>
