<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Perintah Perjalanan Dinas</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 10mm 15mm;
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 9pt;
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
        .document-title { text-align: center; margin: 8px 0; }
        .title-main {
            font-size: 12pt; font-weight: 700; text-transform: uppercase;
            margin-bottom: 3px; letter-spacing: 0.5px;
            text-decoration: underline;
        }
        .document-number {
            font-size: 9pt;
            text-align: center;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        /* Content */
        .intro-text {
            text-align: justify;
            font-size: 9pt;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        /* Data Table */
        .data-table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        .data-table td {
            padding: 3px 5px;
            vertical-align: top;
            font-size: 9pt;
            line-height: 1.3;
        }
        .data-table td:first-child {
            width: 80px;
            font-weight: 600;
            white-space: nowrap;
        }
        .data-table td:nth-child(2) {
            width: 15px;
            text-align: center;
        }

        /* Personel List */
        .personel-item {
            margin-bottom: 5px;
            padding-left: 15px;
        }

        /* Statement */
        .statement-text { 
            text-align: justify; 
            font-size: 9pt; 
            line-height: 1.3;
            margin-top: 10px;
        }

        .closing-text {
            text-align: center; 
            margin-top: 10px; 
            font-style: italic; 
            font-size: 9pt;
        }

        /* Footer */
        .footer { margin-top: 15px; }
        .footer-table { width: 100%; border-collapse: collapse; }
        .footer-table td { vertical-align: top; }

        /* QR Code */
        .qr-code {
            width: 80px; height: 80px;
        }

        @media print {
            body { background: white; padding: 0; }
            .page { box-shadow: none; border: none; }
        }
</style>
</head>
<body>
    @php
        // Helper untuk menghandle data lama yang mungkin menyimpan warga_id bukan nama
        if (isset($personel) && is_array($personel)) {
            foreach ($personel as $idx => $p) {
                // Jika tidak ada 'nama' tapi ada 'warga_id', ambil dari database
                if (empty($p['nama']) && !empty($p['warga_id'])) {
                    $warga = \App\Models\User::find($p['warga_id']);
                    if ($warga) {
                        $personel[$idx]['nama'] = $warga->nama_lengkap;
                    }
                }
            }
        }
    @endphp
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
            <div class="title-main">SURAT PERINTAH TUGAS</div>
            <div class="document-number">
                @if(isset($nomor_surat) && $nomor_surat)
                    Nomor: {{ $nomor_surat }}
                @else
                    Nomor:
                @endif
            </div>
            <div class="title-main" style="margin-top: 10px;">MENUGASKAN :</div>
        </div>

        <!-- Data Perjalanan -->
        <table class="data-table">
            @if(isset($personel) && is_array($personel) && count($personel) > 0)
                @foreach($personel as $index => $p)
                    <tr>
                        <td style="vertical-align: top;">@if($index == 0)<strong>KEPADA</strong>@endif</td>
                        <td style="vertical-align: top; text-align: center;">@if($index == 0):@endif</td>
                        <td style="vertical-align: top; padding-bottom: 3px;">
                            {{-- Baris Nama --}}
                            <div>
                                <span style="display:inline-block; width: 20px; vertical-align: baseline;">{{ $index + 1 }}.</span>
                                <span style="display:inline-block; width: 70px; vertical-align: baseline;">Nama</span>
                                <span style="display:inline-block; width: 15px; text-align:center; vertical-align: baseline;">:</span>
                                <span style="vertical-align: baseline;">{{ $p['nama'] ?? '-' }}</span>
                            </div>
                            {{-- Baris Jabatan --}}
                            <div>
                                <span style="display:inline-block; width: 20px; vertical-align: baseline;"></span>
                                <span style="display:inline-block; width: 70px; vertical-align: baseline;">Jabatan</span>
                                <span style="display:inline-block; width: 15px; text-align:center; vertical-align: baseline;">:</span>
                                <span style="vertical-align: baseline;">{{ $p['jabatan'] ?? '-' }}</span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td style="vertical-align: top;"><strong>KEPADA</strong></td>
                    <td style="vertical-align: top; text-align: center;">:</td>
                    <td style="vertical-align: top;">1. Nama : {{ $nama_lengkap ?? '-' }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: top; padding-left: 16px;">Jabatan : {{ $jabatan ?? '-' }}</td>
                </tr>
            @endif
            <tr>
                <td><strong>TUJUAN</strong></td>
                <td style="text-align: center;">:</td>
                <td>{{ $tujuan ?? '-' }}</td>
            </tr>
            <tr>
                <td><strong>UNTUK</strong></td>
                <td style="text-align: center;">:</td>
                <td>{{ $keperluan ?? '-' }}</td>
            </tr>
            <tr>
                <td><strong>TANGGAL BERANGKAT</strong></td>
                <td style="text-align: center;">:</td>
                <td>{{ isset($tanggal_berangkat) && $tanggal_berangkat ? \Carbon\Carbon::parse($tanggal_berangkat)->translatedFormat('d F Y') : '-' }}</td>
            </tr>
            <tr>
                <td><strong>TANGGAL KEMBALI</strong></td>
                <td style="text-align: center;">:</td>
                <td>{{ isset($tanggal_kembali) && $tanggal_kembali ? \Carbon\Carbon::parse($tanggal_kembali)->translatedFormat('d F Y') : '-' }}</td>
            </tr>
            <tr>
                <td><strong>TRANSPORTASI</strong></td>
                <td style="text-align: center;">:</td>
                <td>{{ $transportasi ?? '-' }}</td>
            </tr>
        </table>


        <!-- Footer -->
        <div class="footer">
            <table class="footer-table">
                <tr>
                    <td style="width: 50%;"></td>
                    <!-- TTD -->
                    <td style="width: 50%; text-align: center;">
                        <div style="font-size: 9pt; margin-bottom: 3px;">
                            Ditetapkan di : Ketapang Baru
                        </div>
                        <div style="font-size: 9pt; margin-bottom: 5px;">
                            Pada Tanggal : {{ now()->translatedFormat('d F Y') }}
                        </div>
                        <div style="font-weight: 600; margin-bottom: 5px; font-size: 9pt;">PEJABAT YANG BERWENANG</div>
                        <div style="font-weight: 700; margin-bottom: 5px; font-size: 9pt;">KEPALA DESA KETAPANG BARU</div>

                        <!-- TTD berdasarkan pilihan admin -->
                        @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                            <div style="margin: 5px 0;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 120px; height: auto;" alt="TTD">
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode' && isset($qr_ttd_base64) && $qr_ttd_base64)
                            <div style="margin: 5px 0;">
                                <img src="{{ $qr_ttd_base64 }}" style="width: 80px; height: 80px;" alt="QR Code TTD">
                            </div>
                        @else
                            <div style="height: 60px;"></div>
                        @endif

                        <div style="font-weight: 700; text-decoration: underline; font-size: 9pt;">
                            {{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}
                        </div>
                        <div style="font-size: 9pt;">NIP. {{ $nip ?? '-' }}</div>
                    </td>
                </tr>
            </table>

            <!-- Tembusan di bawah TTD -->
            <div style="font-size: 9pt; margin-top: 15px; text-align: left;">
                <strong>Tembusan :</strong><br>
                1. Sekretaris Desa<br>
                2. Bendahara Desa
            </div>
        </div>
    </div>

    <!-- PAGE 2 -->
    <div class="page" style="page-break-before: always;">
        <!-- Header (sama dengan halaman 1) -->
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

        <!-- Info Lembaran -->
        <div style="text-align: right; font-size: 9pt; margin-top: 10px;">
            <table style="margin-left: auto;">
                <tr>
                    <td style="text-align: left; padding-right: 10px;"><strong>Lembaran ke</strong></td>
                    <td>:</td>
                    <td style="padding-left: 5px;">1</td>
                </tr>
                <tr>
                    <td style="text-align: left; padding-right: 10px;"><strong>Kode No.</strong></td>
                    <td>:</td>
                    <td style="padding-left: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: left; padding-right: 10px;"><strong>Nomor</strong></td>
                    <td>:</td>
                    <td style="padding-left: 5px;">@if(isset($nomor_surat) && $nomor_surat){{ $nomor_surat }}@endif</td>
                </tr>
            </table>
        </div>

        <!-- Title SPD -->
        <div style="text-align: center; margin: 15px 0;">
            <div style="font-size: 11pt; font-weight: 700;">SURAT PERJALANAN DINAS</div>
            <div style="font-size: 10pt; font-weight: 600;">(SPD)</div>
        </div>

        <!-- Form SPD -->
        <table style="width: 100%; border-collapse: collapse; font-size: 9pt; border: 1px solid #ccc;">
            <tr>
                <td style="width: 25px; vertical-align: top; padding: 5px; border: 1px solid #ccc;">1.</td>
                <td style="width: 250px; vertical-align: top; padding: 5px; border: 1px solid #ccc;">Pejabat yang memberi perintah</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">KEPALA DESA KETAPANG BARU</td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">2.</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">Nama / NIP Pegawai yang melaksanakan perjalanan dinas</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">
                    @if(isset($personel) && is_array($personel) && count($personel) > 0)
                        {{ $personel[0]['nama'] ?? '-' }}
                    @else
                        {{ $nama_lengkap ?? '-' }}
                    @endif
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">3.</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">
                    a. Pangkat/Golongan<br>
                    b. Jabatan/Instansi<br>
                    c. Tingkat biaya perjalanan dinas
                </td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">
                    -<br>
                    @if(isset($personel) && is_array($personel) && count($personel) > 0)
                        {{ $personel[0]['jabatan'] ?? '-' }}
                    @else
                        -
                    @endif<br>
                    -
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">4.</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">Maksud Perjalanan Dinas</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">{{ $keperluan ?? '-' }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">5.</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">Alat Angkut yang Digunakan</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">{{ $transportasi ?? '-' }}</td>
            </tr>
            <!-- Item 6a -->
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">6.</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">a. Tempat Berangkat</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">Desa Ketapang Baru</td>
            </tr>
            <!-- Item 6b -->
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;"></td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">b. Tempat Tujuan</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">{{ $tujuan ?? '-' }}</td>
            </tr>
            @php
                $lamaHari = 1;
                if(isset($tanggal_berangkat) && isset($tanggal_kembali) && $tanggal_berangkat && $tanggal_kembali) {
                    try {
                        $start = \Carbon\Carbon::parse($tanggal_berangkat);
                        $end = \Carbon\Carbon::parse($tanggal_kembali);
                        $lamaHari = abs($start->diffInDays($end)) + 1;
                    } catch (\Exception $e) {
                        $lamaHari = 1;
                    }
                }
            @endphp
            <!-- Item 7a -->
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">7.</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">a. Lamanya Perjalanan Dinas</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">{{ $lamaHari }} ({{ $lamaHari == 1 ? 'satu' : $lamaHari }}) Hari</td>
            </tr>
            <!-- Item 7b -->
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;"></td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">b. Tanggal Berangkat</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">{{ isset($tanggal_berangkat) && $tanggal_berangkat ? \Carbon\Carbon::parse($tanggal_berangkat)->translatedFormat('d F Y') : '-' }}</td>
            </tr>
            <!-- Item 7c -->
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;"></td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">c. Tanggal harus kembali/tiba di tempat</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">{{ isset($tanggal_kembali) && $tanggal_kembali ? \Carbon\Carbon::parse($tanggal_kembali)->translatedFormat('d F Y') : '-' }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">8.</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">Pengikut</td>
                <td style="vertical-align: top; padding: 0; border: 1px solid #ccc;">
                    <table style="width: 100%; border-collapse: collapse;">
                        @php
                            $pengikutList = [];
                            if (isset($personel) && is_array($personel)) {
                                foreach ($personel as $idx => $p) {
                                    if ($idx > 0) {
                                        $pengikutList[] = $p['nama'] ?? '-';
                                    }
                                }
                            }
                        @endphp

                        @if(count($pengikutList) > 0)
                            @foreach($pengikutList as $i => $namaPengikut)
                                <tr>
                                    <td style="padding: 3px 5px; border-bottom: 1px solid #ccc;">
                                        {{ $i + 1 }}. {{ $namaPengikut }}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td style="padding: 3px 5px;">-</td>
                            </tr>
                        @endif
                    </table>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">9.</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;"></td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">
                    APBDes Desa Ketapang Baru Tahun {{ date('Y') }}<br>
                    T.A. {{ date('Y') }}
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">10.</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">Keterangan Lain-Lain</td>
                <td style="vertical-align: top; padding: 5px; border: 1px solid #ccc;">-</td>
            </tr>
        </table>

        <!-- Footer halaman 2 -->
        <div style="margin-top: 20px;">
            <table style="width: 100%; font-size: 9pt;">
                <tr>
                    <td style="width: 50%;"></td>
                    <td style="width: 50%; text-align: center;">
                        <div style="margin-bottom: 3px;">Dikeluarkan di Ketapang Baru</div>
                        <div style="margin-bottom: 5px;">Pada Tanggal : {{ now()->translatedFormat('d F Y') }}</div>
                        <div style="font-weight: 700; margin-bottom: 5px;">KEPALA DESA KETAPANG BARU</div>
                        
                        @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                            <div style="margin: 5px 0;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 100px; height: auto;" alt="TTD">
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode' && isset($qr_ttd_base64) && $qr_ttd_base64)
                            <div style="margin: 5px 0;">
                                <img src="{{ $qr_ttd_base64 }}" style="width: 70px; height: 70px;" alt="QR Code TTD">
                            </div>
                        @else
                            <div style="height: 50px;"></div>
                        @endif
                        
                        <div style="font-weight: 700; text-decoration: underline;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- HALAMAN 3 - Form Perjalanan (tanpa kop surat) -->
    <div class="page" style="page-break-before: always;">
        <div style="font-size: 8pt; line-height: 1.2;">
            <!-- Header Info - Di sebelah kanan, rata kiri -->
            <div style="margin-left: 50%;">
                <table style="width: 100%; margin-bottom: 8px;">
                    <tr>
                        <td style="width: 120px;">SPPD NO</td>
                        <td style="width: 10px;">:</td>
                        <td>@if(isset($nomor_surat) && $nomor_surat){{ $nomor_surat }}@endif</td>
                    </tr>
                    <tr>
                        <td>Berangkat Dari</td>
                        <td>:</td>
                        <td>Ketapang Baru</td>
                    </tr>
                    <tr>
                        <td>(Tempat Kedudukan)</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Pada Tanggal</td>
                        <td>:</td>
                        <td>{{ isset($tanggal_berangkat) && $tanggal_berangkat ? \Carbon\Carbon::parse($tanggal_berangkat)->translatedFormat('d F Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Ke</td>
                        <td>:</td>
                        <td>{{ $tujuan ?? '-' }}, Kabupaten Seluma</td>
                    </tr>
                </table>

                <div style="margin-bottom: 8px; text-align: center;">
                    Pejabat Pelaksana Kegiatan
                </div>

                <div style="margin-bottom: 50px; text-align: center;">
                    ………………………….
                </div>

                <div style="margin-bottom: 10px; text-align: center;">
                    ……………………..
                </div>
            </div>

            <!-- Tabel Perjalanan -->
            <table style="width: 100%; border-collapse: collapse; border: 1px solid #000;">
                <!-- Baris 1 -->
                <tr>
                    <td style="width: 50%; border: 1px solid #000; padding: 8px; vertical-align: top;">
                        <table style="width: 100%;">
                            <tr><td style="width: 20px;">1.</td><td>Tiba di</td><td style="width: 10px;">:</td><td>{{ $tujuan ?? '-' }} Seluma</td></tr>
                            <tr><td>2.</td><td>Pada tanggal</td><td>:</td><td>{{ isset($tanggal_berangkat) && $tanggal_berangkat ? \Carbon\Carbon::parse($tanggal_berangkat)->translatedFormat('d F Y') : '-' }}</td></tr>
                            <tr><td colspan="4">Kepada</td></tr>
                            <tr><td colspan="4">&nbsp;</td></tr>
                        </table>
                        <div style="height: 50px;"></div>
                        <div style="text-align: center;">( ........................................)</div>
                        <div style="text-align: center;">NIP. ...................................</div>
                    </td>
                    <td style="width: 50%; border: 1px solid #000; padding: 8px; vertical-align: top;">
                        <table style="width: 100%;">
                            <tr><td style="width: 85px;">Berangkat dari</td><td style="width: 10px;">:</td><td>{{ $tujuan ?? '-' }} Seluma</td></tr>
                            <tr><td>Ke</td><td>:</td><td>Desa Ketapang Baru</td></tr>
                            <tr><td>Pada Tanggal</td><td>:</td><td>{{ isset($tanggal_kembali) && $tanggal_kembali ? \Carbon\Carbon::parse($tanggal_kembali)->translatedFormat('d F Y') : '-' }}</td></tr>
                            <tr><td colspan="3">Kepada</td></tr>
                        </table>
                        <div style="height: 50px;"></div>
                        <div style="text-align: center;">( .................................................)</div>
                        <div style="text-align: center;">NIP. ............................................</div>
                    </td>
                </tr>
                <!-- Baris I -->
                <tr>
                    <td style="border: 1px solid #000; padding: 8px; vertical-align: top;">
                        <table style="width: 100%;">
                            <tr><td style="width: 20px;">I.</td><td>Tiba di</td><td style="width: 10px;">:</td><td>...................................</td></tr>
                            <tr><td></td><td>Pada tanggal</td><td>:</td><td>...................... {{ date('Y') }}</td></tr>
                            <tr><td colspan="4">Kepada</td></tr>
                            <tr><td colspan="4">&nbsp;</td></tr>
                        </table>
                        <div style="height: 50px;"></div>
                        <div style="text-align: center;">( ........................................)</div>
                        <div style="text-align: center;">NIP. ...................................</div>
                    </td>
                    <td style="border: 1px solid #000; padding: 8px; vertical-align: top;">
                        <table style="width: 100%;">
                            <tr><td style="width: 85px;">Berangkat dari</td><td style="width: 10px;">:</td><td>...................................</td></tr>
                            <tr><td>Ke</td><td>:</td><td>...................................</td></tr>
                            <tr><td>Pada Tanggal</td><td>:</td><td>...................... {{ date('Y') }}</td></tr>
                            <tr><td colspan="3">Kepada</td></tr>
                        </table>
                        <div style="height: 50px;"></div>
                        <div style="text-align: center;">( .................................................)</div>
                        <div style="text-align: center;">NIP. ............................................</div>
                    </td>
                </tr>
                <!-- Baris II -->
                <tr>
                    <td style="border: 1px solid #000; padding: 8px; vertical-align: top;">
                        <table style="width: 100%;">
                            <tr><td style="width: 20px;">II.</td><td>Tiba di</td><td style="width: 10px;">:</td><td>...................................</td></tr>
                            <tr><td></td><td>Pada tanggal</td><td>:</td><td>...................... {{ date('Y') }}</td></tr>
                            <tr><td colspan="4">Kepada</td></tr>
                            <tr><td colspan="4">&nbsp;</td></tr>
                        </table>
                        <div style="height: 50px;"></div>
                        <div style="text-align: center;">( ........................................)</div>
                        <div style="text-align: center;">NIP. ...................................</div>
                    </td>
                    <td style="border: 1px solid #000; padding: 8px; vertical-align: top;">
                        <table style="width: 100%;">
                            <tr><td style="width: 85px;">Berangkat dari</td><td style="width: 10px;">:</td><td>...................................</td></tr>
                            <tr><td>Ke</td><td>:</td><td>...................................</td></tr>
                            <tr><td>Pada Tanggal</td><td>:</td><td>...................... {{ date('Y') }}</td></tr>
                            <tr><td colspan="3">Kepada</td></tr>
                        </table>
                        <div style="height: 50px;"></div>
                        <div style="text-align: center;">( .................................................)</div>
                        <div style="text-align: center;">NIP. ............................................</div>
                    </td>
                </tr>
            </table>

            <!-- Section III - Di luar tabel -->
            <div style="margin-top: 10px;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 50%; vertical-align: top;">
                            <div>III. Tiba di : Ketapang Baru</div>
                            <div>Pada Tanggal :</div>
                        </td>
                        <td style="width: 50%; vertical-align: top; text-align: left;">
                            <div>Telah diperiksa dengan keterangan bahwa</div>
                            <div>Perjalanan Tersebut di atas benar dilakukan</div>
                            <div>Atas perintahnya dan semata mata untuk</div>
                            <div>Kepentingan, jabatan dalam waktu yang</div>
                            <div>Sesingkat-singkatnya.</div>
                            <div style="text-align: center; font-weight: 700; margin-top: 35px;">KEPALA DESA KETAPANG BARU</div>

                            @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                                <div style="margin: 5px 0; text-align: center;">
                                    <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 100px; height: auto;" alt="TTD">
                                </div>
                            @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode' && isset($qr_ttd_base64) && $qr_ttd_base64)
                                <div style="margin: 5px 0; text-align: center;">
                                    <img src="{{ $qr_ttd_base64 }}" style="width: 70px; height: 70px;" alt="QR Code TTD">
                                </div>
                            @else
                                <div style="height: 30px;"></div>
                            @endif

                            <div style="text-align: center; font-weight: 700; text-decoration: underline;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- HALAMAN 4 - Catatan, Perhatian, dan Rincian Biaya -->
    <div class="page" style="page-break-before: always;">
        <div style="font-size: 8pt; line-height: 1.2;">
            <!-- Section IV dst: Catatan, Perhatian, dan Rincian Biaya -->
            <div style="margin-top: 5px; font-size: 8pt;">
                @php
                    $biayaItems = $biaya_items ?? [];
                    $biayaTotal = $biaya_total ?? 0;

                    if (!function_exists('format_rp_sppd')) {
                        function format_rp_sppd($angka) {
                            return 'Rp. ' . number_format($angka ?? 0, 0, ',', '.') . ',-';
                        }
                    }
                @endphp

                <div style="margin-bottom: 5px;">VI. CATATAN LAIN</div>

                <div style="margin-top: 8px; margin-bottom: 5px;">V. PERHATIAN</div>
                <div style="text-align: justify; margin-bottom: 10px;">
                    Pejabat yang berwenang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat
                    yang mengesahkan tanggal berangkat/tiba serta bendaharawan bertanggung jawab berdasarkan
                    peraturan keuangan negara apabila negara mendapat rugi akibat kesalahan kealpaannya.
                </div>

                <div style="text-align: center; font-weight: 700; margin: 10px 0;">
                    RINCIAN BIAYA PERJALANAN DINAS
                </div>

                <!-- Tabel identitas + rincian biaya full width -->
                <table style="width: 100%; font-size: 8pt; margin-bottom: 8px;">
                    <tr>
                        <td style="width: 80px;">NAMA</td>
                        <td style="width: 10px;">:</td>
                        <td>{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</td>
                    </tr>
                    <tr>
                        <td>JABATAN</td>
                        <td>:</td>
                        <td>KEPALA DESA KETAPANG BARU</td>
                    </tr>
                    <tr>
                        <td>NO/TGL SPPD</td>
                        <td>:</td>
                        <td>
                            @if(isset($nomor_surat) && $nomor_surat){{ $nomor_surat }}@endif
                            ({{ isset($tanggal_berangkat) && $tanggal_berangkat ? \Carbon\Carbon::parse($tanggal_berangkat)->translatedFormat('d F Y') : '-' }})
                        </td>
                    </tr>
                </table>

                <table style="width: 100%; border-collapse: collapse; font-size: 8pt; margin-bottom: 10px;" border="1">
                    <tr>
                        <th style="width: 30px; padding: 3px;">No</th>
                        <th style="padding: 3px;">Perincian Biaya</th>
                        <th style="width: 90px; padding: 3px;">Jumlah</th>
                        <th style="width: 50px; padding: 3px;">Ket</th>
                    </tr>
                    @forelse($biayaItems as $i => $row)
                        <tr>
                            <td style="text-align: center; padding: 3px;">{{ $i + 1 }}</td>
                            <td style="padding: 3px;">{{ $row['uraian'] ?? '-' }}</td>
                            <td style="padding: 3px; text-align: right;">{{ format_rp_sppd($row['jumlah'] ?? 0) }}</td>
                            <td style="padding: 3px;">{{ $row['ket'] ?? '' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 3px; text-align: center;">-</td>
                        </tr>
                    @endforelse
                </table>

                <!-- Tanda tangan Bendahara & Yang Menerima di bawah tabel, dua kolom -->
                <table style="width: 100%; font-size: 8pt; margin-top: 10px;">
                    <tr>
                        <td style="width: 50%; text-align: left;">
                            Telah dibayar sejumlah<br>
                            {{ format_rp_sppd($biayaTotal) }}<br><br>
                            Bendahara Desa<br><br><br>
                            <span style="text-decoration: underline;">Sapta Anike Putri</span>
                        </td>
                        <td style="width: 50%; text-align: left;">
                            Ketapang Baru, {{ isset($tanggal_kembali) && $tanggal_kembali ? \Carbon\Carbon::parse($tanggal_kembali)->translatedFormat('d F Y') : '-' }}<br>
                            Telah menerima jumlah uang<br>
                            {{ format_rp_sppd($biayaTotal) }}<br><br>
                            Yang Menerima<br><br><br>
                            <span style="text-decoration: underline;">HERMANJO</span>
                        </td>
                    </tr>
                </table>

                <!-- Perhitungan SPPD Rampung: judul tengah, isi kiri, TTD di bawah kanan -->
                <div style="margin-top: 20px; font-size: 8pt;">
                    <div style="text-align: center; font-weight: 700; margin-bottom: 8px;">
                        PERHITUNGAN SPPD RAMPUNG
                    </div>

                    <table style="width: 100%;">
                        <tr>
                            <!-- Isi perhitungan rata kiri -->
                            <td style="width: 60%; vertical-align: top;">
                                <table style="font-size: 8pt;">
                                    <tr>
                                        <td style="width: 180px;">Ditetapkan sejumlah</td>
                                        <td style="width: 10px;">:</td>
                                        <td>{{ format_rp_sppd($biayaTotal) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Yang telah dibayar sementara</td>
                                        <td>:</td>
                                        <td>{{ format_rp_sppd($biayaTotal) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sisa kurang/lebih</td>
                                        <td>:</td>
                                        <td>{{ format_rp_sppd(0) }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width: 40%;"></td>
                        </tr>
                    </table>

                    <div style="margin-top: 20px; width: 50%; margin-left: auto; text-align: center;">
                        <div style="font-weight: 700;">KEPALA DESA KETAPANG BARU</div>
                        <br>
                        @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                            <div style="margin: 5px 0;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 100px; height: auto;" alt="TTD">
                            </div>
                        @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode' && isset($qr_ttd_base64) && $qr_ttd_base64)
                            <div style="margin: 5px 0;">
                                <img src="{{ $qr_ttd_base64 }}" style="width: 70px; height: 70px;" alt="QR Code TTD">
                            </div>
                        @else
                            <div style="height: 30px;"></div>
                        @endif

                        <div style="font-weight: 700; text-decoration: underline; margin-top: 5px;">
                            {{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
