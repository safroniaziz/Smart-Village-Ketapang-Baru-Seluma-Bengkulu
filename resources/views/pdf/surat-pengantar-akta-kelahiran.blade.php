<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Pengantar Akta Kelahiran</title>
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

        .form-header {
            margin: 10px 0;
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
            margin: 15px 0 20px 0;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .section {
            margin: 10px 0;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 0px;
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
            margin-top: 20px;
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
                <td class="value">{{ $nama_kepala_keluarga ?? '-' }}</td>
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
                <td class="value">{{ $nama_bayi ?? '-' }}</td>
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
                <td class="value">{{ $nama_ibu ?? '-' }}</td>
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
                <td class="value">{{ $nama_ayah ?? '-' }}</td>
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
                <td class="value">{{ $nama_pelapor ?? '-' }}</td>
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
                <td class="value">{{ $nama_saksi1 ?? '-' }}</td>
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
                <td class="value">{{ $nama_saksi2 ?? '-' }}</td>
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
    <div style="margin-top: 20px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%;"></td>
                <td style="width: 50%; text-align: center;">
                    <div style="margin-bottom: 0px; font-size: 10pt;">
                        {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? '07 Mei 2025' }}
                    </div>
                    
                    <div style="font-weight: bold; margin-bottom: 0px; font-size: 10pt;">Kepala Desa</div>

                    @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                        <div style="margin-bottom: 0px;">
                            <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 140px; height: auto;" alt="TTD Gambar">
                        </div>
                    @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode')
                        <div style="margin-bottom: 0px;">
                            @if(isset($ttd_base64) && $ttd_base64)
                                <img src="{{ $ttd_base64 }}" style="width: 110px; height: auto;" alt="QR Code TTD">
                            @else
                                <div style="width: 120px; height: 120px; border: 2px dashed #ccc; margin: 0 auto;"></div>
                            @endif
                        </div>
                    @elseif(isset($jenis_ttd) && $jenis_ttd == 'manual')
                        <div style="height: 50px; margin-bottom: 0px;"></div>
                    @else
                        <div style="height: 50px; margin-bottom: 0px;"></div>
                    @endif

                    @if(isset($qr_base64) && $qr_base64)
                    <div style="margin-bottom: 0px;">
                        <img src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code Verifikasi" style="width: 60px; height: 60px;">
                    </div>
                    @endif

                    <div style="font-weight: bold; text-decoration: underline; font-size: 10pt;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                    <div style="font-size: 10pt;">NIP. {{ $nip ?? '-' }}</div>
                </td>
            </tr>
        </table>
    </div>

    @if($qrCode ?? null)
        <div class="qr-code">
            <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code" style="width: 100%; height: 100%;">
        </div>
    @endif
</div>
</body>
</html>
