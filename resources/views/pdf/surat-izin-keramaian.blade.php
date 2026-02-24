<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Izin Keramaian</title>
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

        /* Title */
        .document-title { text-align: center; margin: 5px 0; }
        .title-main {
            font-size: 14pt; font-weight: bold; text-transform: uppercase;
            margin-bottom: 0px; letter-spacing: 0.5px;
            text-decoration: underline;
        }
        .document-number { font-size: 10pt; font-family: 'DejaVu Sans', Arial, sans-serif; }

        /* Content Styles */
        .content {
            margin: 15px 0;
            text-align: justify;
        }

        .pembuka {
            margin-bottom: 0px;
            line-height: 1.8;
        }

        .data-table {
            width: 100%;
            margin: 10px 0;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 5px 0;
            vertical-align: top;
        }

        .label {
            width: 15%;
            font-weight: bold;
        }

        .separator {
            width: 5%;
            text-align: center;
        }

        .value {
            width: 80%;
        }

        .penutup {
            margin-top: 15px;
            text-align: justify;
            line-height: 1.8;
        }

        /* QR Code */
        .qr-code {
            width: 90px; height: 90px;
            border: 1px solid #ddd; padding: 5px;
        }

        @media print {
            body { background: white; padding: 0; }
            .page { box-shadow: none; border: none; }
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

        <!-- Title -->
        <div class="document-title">
            <div class="title-main">Surat Izin Keramaian</div>
            <div class="document-number">
                Nomor: {{ $nomor_surat }}
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="pembuka">
                Saya yang bertanda tangan dibawah ini :
            </div>

            <!-- Data Kepala Desa -->
            <table class="data-table">
                <tr>
                    <td class="label">Nama</td>
                    <td class="separator">:</td>
                    <td class="value">{{ strtoupper($kepala_desa_nama) }}</td>
                </tr>
                <tr>
                    <td class="label">Jabatan</td>
                    <td class="separator">:</td>
                    <td class="value">Kepala Desa Ketapang Baru</td>
                </tr>
            </table>

            <div style="margin: 10px 0;">
                Memberikan Izin Keramaian Kepada:
            </div>

            <!-- Data Pemohon (dari database user) -->
            <table class="data-table">
                <tr>
                    <td class="label">Nama</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $nama_pemohon }}</td>
                </tr>
                <tr>
                    <td class="label">NIK</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $nik_pemohon }}</td>
                </tr>
                <tr>
                    <td class="label">Umur</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $umur_pemohon }} Tahun</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $alamat_pemohon }}</td>
                </tr>
                <tr>
                    <td class="label">Untuk</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $keperluan_acara }}</td>
                </tr>
            </table>

            <div class="penutup">
                Demikian surat izin Keramaian ini dibuat atas dasar yang sebenarnya dan dapat dipergunakan sebagaimana mestinya.
            </div>
        </div>

        <!-- Footer -->
        <div style="margin-top: 15px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%;"></td>
                    <td style="width: 50%; text-align: center;">
                        <!-- Tanggal -->
                        <div style="margin-bottom: 0px; font-size: 10pt;">
                            {{ $tempat_surat ?? 'Ketapang Baru' }}, {{ $tanggal_surat ?? '07 Mei 2025' }}
                        </div>
                        
                        <!-- Kepala Desa title -->
                        <div style="font-weight: bold; margin-bottom: 0px; font-size: 10pt;">Kepala Desa Ketapang Baru</div>

                        <!-- TTD berdasarkan pilihan admin -->
                        @if(isset($jenis_ttd) && $jenis_ttd == 'qrcode')
                            <!-- QR Code TTD -->
                            <div style="margin-bottom: 0px;">
                                @if(isset($qr_ttd_base64) && $qr_ttd_base64)
                                    <img src="{{ $qr_ttd_base64 }}" style="width: 110px; height: auto;" alt="QR Code TTD">
                                @else
                                    <div style="height: 50px;"><!-- Ruang kosong --></div>
                                @endif
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'gambar')
                            <!-- Gambar TTD -->
                            <div style="margin-bottom: 0px;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 150px; height: auto;" alt="TTD Gambar">
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'manual')
                            <!-- Manual TTD - Ruang kosong -->
                            <div style="height: 50px; margin-bottom: 0px;">
                                <!-- Ruang kosong untuk TTD manual -->
                            </div>
                        @else
                            <!-- Default - Ruang kosong -->
                            <div style="height: 50px; margin-bottom: 0px;">
                                <!-- Ruang kosong untuk TTD -->
                            </div>
                        @endif

                        <!-- QR Code Verifikasi Surat (untuk tracking, opsional) -->
                        @if(isset($qr_base64) && $qr_base64)
                        <div style="margin-bottom: 0px;">
                            <img class="qr-code" src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code Verifikasi Surat" style="width: 60px; height: 60px;">
                        </div>
                        @endif

                        <!-- Nama Kepala Desa -->
                        <div style="font-weight: bold; text-decoration: underline; font-size: 10pt;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                        <div style="font-size: 10pt;">NIP. {{ $nip ?? '-' }}</div>
                    </td>
                </tr>
            </table>

            <!-- Tembusan -->
            @if(isset($tembusan) && !empty($tembusan))
            <div style="margin-top: 20px;">
                <div style="font-weight: bold; margin-bottom: 0px;">Tembusan :</div>
                @foreach($tembusan as $index => $item)
                <div style="margin-left: 15px; margin-bottom: 2px;">
                    {{ $index + 1 }}. {{ $item }}
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</body>
</html>
