<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Undangan</title>
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

        .surat-info {
            margin: 10px 0;
            text-align: left;
        }

        .surat-info table {
            border-collapse: collapse;
            margin-bottom: 0px;
        }

        .surat-info td {
            padding: 2px 5px;
            vertical-align: top;
        }

        .content {
            text-align: justify;
            margin: 10px 0;
        }

        .content p {
            margin: 10px 0;
        }

        .detail-acara {
            margin: 10px 0 20px 50px;
        }

        .detail-acara table {
            border-collapse: collapse;
        }

        .detail-acara td {
            padding: 3px 10px 3px 0;
            vertical-align: top;
        }

        .signature {
            margin-top: 15px;
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

    <div class="surat-info">
        <!-- Tabel dua kolom: Kiri (No/Lampiran/Perihal) - Kanan (Tanggal, Kepada/Yth/Di) -->
        <table style="width: 100%;">
            <!-- Baris 0: Tanggal di kolom kanan, rata kiri -->
            <tr>
                <td style="width: 70px;"></td>
                <td style="width: 15px;"></td>
                <td style="width: 35%;"></td>
                <td colspan="3" style="text-align: left; padding-bottom: 10px;">
                    Ketapang Baru, {{ $tanggal_surat ?? \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                </td>
            </tr>
            <!-- Baris 1: No - Kepada -->
            <tr>
                <td>No</td>
                <td>:</td>
                <td>{{ $nomor_surat ?? '...../SP/KTB/..../.....'}}</td>
                <td style="width: 60px;">Kepada</td>
                <td style="width: 15px;">:</td>
                <td></td>
            </tr>
            <!-- Baris 2: Lampiran - Yth -->
            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td>{{ $lampiran ?? '1 (satu) Berkas' }}</td>
                <td>Yth</td>
                <td>:</td>
                <td>{{ $kepada ?? 'Bapak/Ibu ........................' }}</td>
            </tr>
            <!-- Baris 3: Perihal - Di Tempat -->
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td><strong>{{ $perihal ?? 'Panggilan Penting' }}</strong></td>
                <td>Di</td>
                <td>:</td>
                <td><strong>Tempat</strong></td>
            </tr>
        </table>
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

    <!-- Footer with Signature -->
    <div class="footer" style="margin-top: 15px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%; vertical-align: top;"></td>
                <td style="width: 50%; vertical-align: top; text-align: center;">
                    <div style="font-size: 10pt; margin-bottom: 6px;">
                        Ketapang Baru, {{ $tanggal_ttd ?? \Carbon\Carbon::now()->translatedFormat('d F Y') }}
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

    @if($qrCode ?? null)
        <div class="qr-code">
            <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code" style="width: 100%; height: 100%;">
        </div>
    @endif
</div>
</body>
</html>
