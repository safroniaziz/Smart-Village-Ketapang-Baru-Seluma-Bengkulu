<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Surat Pengantar Perkawinan</title>
    <style>
        @page {
            size: legal portrait;
            margin: 8mm 15mm 8mm 15mm;
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 9pt;
            line-height: 1.25;
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

        .nomor { text-align: center; margin-top: 2px; margin-bottom: 5px; font-weight: bold; font-size: 9pt; }
        .title { text-align: center; font-size: 11pt; font-weight: bold; margin-bottom: 0px; text-decoration: underline; }
        .content { text-align: justify; }
        .section { margin: 4px 0; }
        .label { display: inline-block; width: 230px; vertical-align: top; font-size: 9pt; }
        .value { display: inline-block; width: calc(100% - 240px); font-size: 9pt; }
        .small { font-size: 9pt; }
        .signature { margin-top: 5px; text-align: right; }
        .ttd-space { height: 40px; }
        .bold { font-weight: bold; }
        .line { border-top: 2px solid #000; margin-top: 5px; width: 200px; }
    </style>
</head>
<body>
<div class="page">
<!-- Header with Logo and Model N1 Reference -->
    <table style="width: 100%; margin-bottom: 12px;">
        <tr>
            <td style="width: 100px; vertical-align: middle; text-align: center;">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/logo_kemenag.png'))) }}" alt="Logo Kemenag" style="width: 100px; height: auto;">
            </td>
            <td style="width: 20%;"></td>
            <td style="width: auto; text-align: left; font-size: 9pt; line-height: 1.4; vertical-align: middle;">
                Lampiran I<br>
                Keputusan Direktur Jenderal Bimbingan Masyarakat Islam<br>
                Nomor 713 tahun 2018<br>
                Tentang :<br>
                Laporan Formulir dan laporan pencatatan Perkawinan atau Rujuk<br><br>
                <strong>Model N1</strong>
            </td>
        </tr>
    </table>

    <!-- Office Info -->
    <table style="width: 100%; margin-bottom: 12px; font-size: 9pt;">
        <tr>
            <td style="width: 200px;">KANTOR DESA /KELURAHAN</td>
            <td>: KETAPANG BARU</td>
        </tr>
        <tr>
            <td>KECAMATAN</td>
            <td>: SEMIDANG ALAS MARAS</td>
        </tr>
        <tr>
            <td>KABUPATEN/KOTA</td>
            <td>: SELUMA</td>
        </tr>
    </table>

    <div class="title">SURAT PENGANTAR PERKAWINAN</div>
    <div class="nomor">Nomor : {{ $nomor_surat ?? '-' }}</div>

    <div class="content">
        <p>Yang bertanda tangan dibawah ini menerangkan dengan sesungguhnya bahwa :</p>

        <div class="section">
            <div><span class="label">Nama</span><span class="value bold">: {{ $nama ?? '-' }}</span></div>
            <div><span class="label">Nomor Induk Kependudukan (NIK)</span><span class="value">: {{ $nik ?? '-' }}</span></div>
            <div><span class="label">Jenis Kelamin</span><span class="value">: {{ $jenis_kelamin ?? '-' }}</span></div>
            <div><span class="label">Tempat dan Tanggal Lahir</span><span class="value">: {{ $tempat_tanggal_lahir ?? '-' }}</span></div>
            <div><span class="label">Warga Negara</span><span class="value">: {{ $warga_negara ?? 'Indonesia' }}</span></div>
            <div><span class="label">Agama</span><span class="value">: {{ $agama ?? '-' }}</span></div>
            <div><span class="label">Pekerjaan</span><span class="value">: {{ $pekerjaan ?? '-' }}</span></div>
            <div><span class="label">Alamat</span><span class="value">: {{ $alamat ?? '-' }}</span></div>
        </div>

        <div class="section">
            <p class="small">Status Perkawinan</p>
            <div class="small">
                <div><span class="label">Laki-laki</span><span class="value">: {{ $status_pria ?? '-' }}</span></div>
                <div><span class="label">Perempuan</span><span class="value">: {{ $status_wanita ?? '-' }}</span></div>
                <div><span class="label">Nama Istri/Suami terdahulu</span><span class="value">: {{ $nama_pasangan_terdahulu ?? '' }}</span></div>
            </div>
        </div>

        <div class="section">
            <p class="small bold">Adalah benar Anak dari Perkawinan seorang pria :</p>
            <div class="small">
                <div><span class="label">Nama</span><span class="value">: {{ $ayah_nama ?? '-' }}</span></div>
                <div><span class="label">NIK</span><span class="value">: {{ $ayah_nik ?? '-' }}</span></div>
                <div><span class="label">Tempat dan Tanggal Lahir</span><span class="value">: {{ $ayah_tempat_tanggal_lahir ?? '-' }}</span></div>
                <div><span class="label">Warga Negara</span><span class="value">: {{ $ayah_warga_negara ?? 'Indonesia' }}</span></div>
                <div><span class="label">Agama</span><span class="value">: {{ $ayah_agama ?? '-' }}</span></div>
                <div><span class="label">Pekerjaan</span><span class="value">: {{ $ayah_pekerjaan ?? '-' }}</span></div>
                <div><span class="label">Alamat</span><span class="value">: {{ $ayah_alamat ?? '-' }}</span></div>
            </div>
        </div>

        <div class="section">
            <p class="small bold">Ibu (Orang Tua Pemohon) :</p>
            <div class="small">
                <div><span class="label">Nama</span><span class="value">: {{ $ibu_nama ?? '-' }}</span></div>
                <div><span class="label">NIK</span><span class="value">: {{ $ibu_nik ?? '-' }}</span></div>
                <div><span class="label">Bin/Binti</span><span class="value">: {{ $ibu_bin ?? '-' }}</span></div>
                <div><span class="label">Tempat dan Tanggal Lahir</span><span class="value">: {{ $ibu_tempat_tanggal_lahir ?? '-' }}</span></div>
                <div><span class="label">Warga Negara</span><span class="value">: {{ $ibu_warga_negara ?? 'WNI' }}</span></div>
                <div><span class="label">Agama</span><span class="value">: {{ $ibu_agama ?? '-' }}</span></div>
                <div><span class="label">Pekerjaan</span><span class="value">: {{ $ibu_pekerjaan ?? '-' }}</span></div>
                <div><span class="label">Alamat</span><span class="value">: {{ $ibu_alamat ?? '-' }}</span></div>
            </div>
        </div>

        <div class="section">
            <p>Demikian Surat Pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.</p>
        </div>

    </div>

    <div style="margin-top: 8px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%;"></td>
                <td style="width: 50%; text-align: center;">
                    <div style="font-size: 9pt;">Ketapang Baru, {{ $tanggal_surat ?? now()->translatedFormat('d F Y') }}</div>

                    <div class="bold" style="margin-top: 8px; font-size: 9pt;">Kepala Desa</div>

                    @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                        <div style="margin: 12px 0;">
                            <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 130px; height: auto;" alt="TTD Gambar">
                        </div>
                    @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode')
                        <div style="margin: 12px 0;">
                            @if(isset($qr_ttd_base64) && $qr_ttd_base64)
                                <img src="{{ $qr_ttd_base64 }}" style="width: 100px; height: auto;" alt="QR Code TTD">
                            @else
                                <div style="height: 40px;"></div>
                            @endif
                        </div>
                    @elseif(isset($jenis_ttd) && $jenis_ttd == 'manual')
                        <div style="height: 45px; margin: 12px 0;"></div>
                    @else
                        <div style="height: 45px; margin: 12px 0;"></div>
                    @endif

                    <div class="bold" style="text-decoration: underline; font-size: 9pt;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                    <div style="font-size: 9pt;">NIP. {{ $nip ?? '-' }}</div>
                </td>
            </tr>
        </table>
    </div>
</div>

<!-- PAGE 2: SURAT PERSETUJUAN MEMPELAI -->
<div class="page" style="page-break-before: always;">
    <!-- Header with Logo and Model N1 Reference -->
    <table style="width: 100%; margin-bottom: 15px;">
        <tr>
            <td style="width: 120px; vertical-align: middle; text-align: center;">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/logo_kemenag.png'))) }}" alt="Logo Kemenag" style="width: 100px; height: auto;">
            </td>
            <td style="width: 20%;"></td>
            <td style="width: auto; text-align: left; font-size: 9pt; line-height: 1.5; vertical-align: middle;">
                Lampiran III<br>
                Keputusan Direktur Jenderal Bimbingan Masyarakat Islam<br>
                Nomor 713 tahun 2018<br>
                Tentang :<br>
                Laporan Formulir dan laporan pencatatan Perkawinan atau Rujuk<br><br>
                <strong>Model N3</strong>
            </td>
        </tr>
    </table>

    <div class="title" style="margin-bottom: 15px;">SURAT PERSETUJUAN MEMPELAI</div>

    <div class="content">
        <p>Yang bertandatangan di bawah ini :</p>

        <!-- CALON SUAMI -->
        <div class="section">
            <p class="bold">CALON SUAMI</p>
            <div>
                <div><span class="label">Nama</span><span class="value">: {{ $nama ?? '-' }}</span></div>
                <div><span class="label">Nomor Induk Kependudukan (NIK)</span><span class="value">: {{ $nik ?? '-' }}</span></div>
                <div><span class="label">Jenis Kelamin</span><span class="value">: {{ $jenis_kelamin ?? 'Laki-Laki' }}</span></div>
                <div><span class="label">Tempat dan Tanggal Lahir</span><span class="value">: {{ $tempat_tanggal_lahir ?? '-' }}</span></div>
                <div><span class="label">Warga Negara</span><span class="value">: {{ $warga_negara ?? 'Indonesia' }}</span></div>
                <div><span class="label">Agama</span><span class="value">: {{ $agama ?? '-' }}</span></div>
                <div><span class="label">Pekerjaan</span><span class="value">: {{ $pekerjaan ?? '-' }}</span></div>
                <div><span class="label">Alamat</span><span class="value">: {{ $alamat ?? '-' }}</span></div>
            </div>
        </div>

        <!-- CALON ISTRI -->
        <div class="section">
            <p class="bold">CALON ISTRI :</p>
            <div>
                <div><span class="label">Nama lengkap dan alias</span><span class="value">: {{ $calon_istri_nama ?? '-' }}</span></div>
                <div><span class="label">Bin/Binti</span><span class="value">: {{ $calon_istri_bin ?? '-' }}</span></div>
                <div><span class="label">Nomor Induk Kependudukan (NIK)</span><span class="value">: {{ $calon_istri_nik ?? '-' }}</span></div>
                <div><span class="label">Tempat dan Tanggal Lahir</span><span class="value">: {{ $calon_istri_tempat_tanggal_lahir ?? '-' }}</span></div>
                <div><span class="label">Warga Negara</span><span class="value">: {{ $calon_istri_warga_negara ?? 'Indonesia' }}</span></div>
                <div><span class="label">Agama</span><span class="value">: {{ $calon_istri_agama ?? '-' }}</span></div>
                <div><span class="label">Pekerjaan</span><span class="value">: {{ $calon_istri_pekerjaan ?? '-' }}</span></div>
                <div><span class="label">Tempat tinggal</span><span class="value">: {{ $calon_istri_alamat ?? '-' }}</span></div>
            </div>
        </div>

        <div class="section" style="margin-top: 15px;">
            <p style="text-align: justify;">Menyatakan dengan sesungguhnya bahwa atas dasar sukarela, dengan kesadaran sendiri tanpa paksaan siapapun juga, setuju untuk melangsungkan pernikahan. Demikianlah surat persetujuan ini dibuat untuk dipergunakan seperlunya.</p>
        </div>
    </div>

    <!-- Signature Section -->
    <div style="margin-top: 20px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%; text-align: center; vertical-align: top;">
                    <div class="bold">Calon Suami</div>
                    <div style="height: 60px;"></div>
                    <div style="text-decoration: underline;">{{ $nama ?? '-' }}</div>
                </td>
                <td style="width: 50%; text-align: center; vertical-align: top;">
                    <div class="bold">Calon Istri</div>
                    <div style="height: 60px;"></div>
                    <div style="text-decoration: underline;">{{ $calon_istri_nama ?? '-' }}</div>
                </td>
            </tr>
        </table>
    </div>
</div>

<!-- PAGE 3: SURAT IZIN ORANG TUA -->
<div class="page" style="page-break-before: always;">
    <!-- Header with Logo and Model N1 Reference -->
    <table style="width: 100%; margin-bottom: 10px;">
        <tr>
            <td style="width: 100px; vertical-align: middle; text-align: center;">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/logo_kemenag.png'))) }}" alt="Logo Kemenag" style="width: 100px; height: auto;">
            </td>
            <td style="width: 20%;"></td>
            <td style="width: auto; text-align: left; font-size: 9pt; line-height: 1.3; vertical-align: middle;">
                Lampiran 1<br>
                Keputusan Direktur Jenderal Bimbingan Masyarakat Islam<br>
                Nomor 713 tahun 2018<br>
                Tentang :<br>
                Laporan Formulir dan laporan pencatatan Perkawinan atau Rujuk<br><br>
                <strong>Model N5</strong>
            </td>
        </tr>
    </table>

    <div class="title" style="margin-bottom: 10px;">SURAT IZIN ORANG TUA</div>

    <div class="content">
        <p>Yang bertandatangan di bawah ini:</p>

        <!-- DATA AYAH -->
        <div class="section" style="margin: 8px 0;">
            <p class="small bold">DATA AYAH:</p>
            <div class="small">
                <div><span class="label">Nama lengkap dan alias</span><span class="value">: {{ $ayah_nama ?? '-' }}</span></div>
                <div><span class="label">Bin/Binti</span><span class="value">: {{ $ayah_bin ?? '-' }}</span></div>
                <div><span class="label">Nomor Induk Kependudukan (NIK)</span><span class="value">: {{ $ayah_nik ?? '-' }}</span></div>
                <div><span class="label">Tempat dan Tanggal Lahir</span><span class="value">: {{ $ayah_tempat_tanggal_lahir ?? '-' }}</span></div>
                <div><span class="label">Warga Negara</span><span class="value">: {{ $ayah_warga_negara ?? 'Indonesia' }}</span></div>
                <div><span class="label">Agama</span><span class="value">: {{ $ayah_agama ?? '-' }}</span></div>
                <div><span class="label">Pekerjaan</span><span class="value">: {{ $ayah_pekerjaan ?? '-' }}</span></div>
                <div><span class="label">Tempat tinggal</span><span class="value">: {{ $ayah_alamat ?? '-' }}</span></div>
            </div>
        </div>

        <!-- DATA IBU -->
        <div class="section" style="margin: 8px 0;">
            <p class="small bold">DATA IBU:</p>
            <div class="small">
                <div><span class="label">Nama</span><span class="value">: {{ $ibu_nama ?? '-' }}</span></div>
                <div><span class="label">Bin/Binti</span><span class="value">: {{ $ibu_bin ?? '-' }}</span></div>
                <div><span class="label">Nomor Induk Kependudukan (NIK)</span><span class="value">: {{ $ibu_nik ?? '-' }}</span></div>
                <div><span class="label">Tempat dan Tanggal Lahir</span><span class="value">: {{ $ibu_tempat_tanggal_lahir ?? '-' }}</span></div>
                <div><span class="label">Warga Negara</span><span class="value">: {{ $ibu_warga_negara ?? 'WNI' }}</span></div>
                <div><span class="label">Agama</span><span class="value">: {{ $ibu_agama ?? '-' }}</span></div>
                <div><span class="label">Pekerjaan</span><span class="value">: {{ $ibu_pekerjaan ?? '-' }}</span></div>
                <div><span class="label">Alamat</span><span class="value">: {{ $ibu_alamat ?? '-' }}</span></div>
            </div>
        </div>

        <!-- KETERANGAN ANAK -->
        <div class="section" style="margin: 5px 0;">
            <p>Adalah benar Ayah kandung dan Ibu kandung dari seorang</p>
            <div>
                <div><span class="label">Nama</span><span class="value">: {{ $nama ?? '-' }}</span></div>
                <div><span class="label">Nomor Induk Kependudukan (NIK)</span><span class="value">: {{ $nik ?? '-' }}</span></div>
                <div><span class="label">Jenis Kelamin</span><span class="value">: {{ $jenis_kelamin ?? 'Laki-Laki' }}</span></div>
                <div><span class="label">Tempat dan Tanggal Lahir</span><span class="value">: {{ $tempat_tanggal_lahir ?? '-' }}</span></div>
                <div><span class="label">Warga Negara</span><span class="value">: {{ $warga_negara ?? 'Indonesia' }}</span></div>
                <div><span class="label">Agama</span><span class="value">: {{ $agama ?? '-' }}</span></div>
                <div><span class="label">Pekerjaan</span><span class="value">: {{ $pekerjaan ?? '-' }}</span></div>
                <div><span class="label">Alamat</span><span class="value">: {{ $alamat ?? '-' }}</span></div>
            </div>
        </div>

        <!-- DATA CALON ISTRI -->
        <div class="section" style="margin: 5px 0;">
            <p>Memberikan Izin Kepadanya untuk melakukan Pernikahan dengan:</p>
            <div>
                <div><span class="label">Nama lengkap dan alias</span><span class="value">: {{ $calon_istri_nama ?? '-' }}</span></div>
                <div><span class="label">Bin/Binti</span><span class="value">: {{ $calon_istri_bin ?? '-' }}</span></div>
                <div><span class="label">Nomor Induk Kependudukan (NIK)</span><span class="value">: {{ $calon_istri_nik ?? '-' }}</span></div>
                <div><span class="label">Tempat dan Tanggal Lahir</span><span class="value">: {{ $calon_istri_tempat_tanggal_lahir ?? '-' }}</span></div>
                <div><span class="label">Warga Negara</span><span class="value">: {{ $calon_istri_warga_negara ?? 'Indonesia' }}</span></div>
                <div><span class="label">Agama</span><span class="value">: {{ $calon_istri_agama ?? '-' }}</span></div>
                <div><span class="label">Pekerjaan</span><span class="value">: {{ $calon_istri_pekerjaan ?? '-' }}</span></div>
                <div><span class="label">Tempat tinggal</span><span class="value">: {{ $calon_istri_alamat ?? '-' }}</span></div>
            </div>
        </div>

        <div class="section" style="margin-top: 10px;">
            <p style="text-align: justify;">Demikian surat izin ini dibuat dengan kesadaran tanpa ada paksaan dari siapapun juga dan untuk dipergunakan seperlunya.</p>
        </div>
    </div>

    <!-- Signature Section -->
    <div style="margin-top: 12px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%;"></td>
                <td style="width: 50%; text-align: center; vertical-align: top;">
                    <div style="font-size: 9pt;">Ketapang Baru, {{ $tanggal_surat ?? now()->translatedFormat('d F Y') }}</div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%; text-align: center; vertical-align: top;">
                    <div class="bold">Ayah</div>
                    <div style="height: 55px;"></div>
                    <div style="text-decoration: underline;">{{ $ayah_nama ?? '-' }}</div>
                </td>
                <td style="width: 50%; text-align: center; vertical-align: top;">
                    <div class="bold">Ibu</div>
                    <div style="height: 55px;"></div>
                    <div style="text-decoration: underline;">{{ $ibu_nama ?? '-' }}</div>
                </td>
            </tr>
        </table>
    </div>
</div>

<!-- PAGE 4: SURAT PERNYATAAN BELUM PERNAH MENIKAH -->
<div class="page" style="page-break-before: always;">
    <!-- Header with Logo Only -->
    <table style="width: 100%; margin-bottom: 15px;">
        <tr>
            <td style="width: 100px; vertical-align: middle; text-align: center;">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/logo_kemenag.png'))) }}" alt="Logo Kemenag" style="width: 100px; height: auto;">
            </td>
        </tr>
    </table>

    <div class="title" style="margin-bottom: 15px;">SURAT PERNYATAAN BELUM PERNAH MENIKAH</div>

    <div class="content">
        <p>Yang bertandatangan dibawah ini :</p>

        <div class="section">
            <div>
                <div><span class="label">Nama</span><span class="value">: {{ $nama ?? '-' }}</span></div>
                <div><span class="label">Bin</span><span class="value">: {{ $ayah_nama ?? '-' }}</span></div>
                <div><span class="label">Tempat/tanggal lahir</span><span class="value">: {{ $tempat_tanggal_lahir ?? '-' }}</span></div>
                <div><span class="label">NIK</span><span class="value">: {{ $nik ?? '-' }}</span></div>
                <div><span class="label">Jenis Kelamin</span><span class="value">: {{ $jenis_kelamin ?? '-' }}</span></div>
                <div><span class="label">Warga Negara</span><span class="value">: {{ $warga_negara ?? 'Indonesia' }}</span></div>
                <div><span class="label">Agama</span><span class="value">: {{ $agama ?? '-' }}</span></div>
                <div><span class="label">Pekerjaan</span><span class="value">: {{ $pekerjaan ?? '-' }}</span></div>
                <div><span class="label">Alamat</span><span class="value">: {{ $alamat ?? '-' }}</span></div>
            </div>
        </div>

        <div class="section" style="margin-top: 15px;">
            <p style="text-align: justify;">Dengan ini menyatakan bahwa saya benar benar Belum pernah menikah (JEJAKA).</p>
            <p style="text-align: justify; margin-top: 10px;">Demikianlah surat pernyataan ini saya buat atas dasar yang sebenarnya dan apabilah saya membuat pernyataan ini tidak benar maka saya siap dituntut kepada yang berwajib. Atas perhatiannya saya ucapkan terimakasih.</p>
        </div>
    </div>

    <!-- Signature Section -->
    <div style="margin-top: 30px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%;"></td>
                <td style="width: 50%; text-align: center; vertical-align: top;">
                    <div style="font-size: 9pt;">Ketapang Baru, {{ $tanggal_surat ?? now()->translatedFormat('d F Y') }}</div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%; text-align: center; vertical-align: top;">
                    <div class="bold">Orang Tua / Wali</div>
                    <div style="height: 80px;"></div>
                    <div style="text-decoration: underline;">{{ $ayah_nama ?? '-' }}</div>
                </td>
                <td style="width: 50%; text-align: center; vertical-align: top;">
                    <div class="bold">Yang membuat pernyataan</div>
                    <div style="height: 80px;"></div>
                    <div style="text-decoration: underline;">{{ $nama ?? '-' }}</div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Kepala Desa Section -->
    <div style="margin-top: 40px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 25%;"></td>
                <td style="width: 50%; text-align: center;">
                    <div class="bold" style="font-size: 9pt;">MENGETAHUI :</div>
                    <div class="bold" style="margin-top: 10px; font-size: 9pt;">Kepala Desa Ketapang Baru</div>

                    @if(isset($jenis_ttd) && $jenis_ttd == 'gambar' && isset($ttd_base64) && $ttd_base64)
                        <div style="margin: 15px 0;">
                            <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 140px; height: auto;" alt="TTD Gambar">
                        </div>
                    @elseif(isset($jenis_ttd) && $jenis_ttd == 'qrcode')
                        <div style="margin: 15px 0;">
                            @if(isset($qr_ttd_base64) && $qr_ttd_base64)
                                <img src="{{ $qr_ttd_base64 }}" style="width: 110px; height: auto;" alt="QR Code TTD">
                            @else
                                <div style="height: 45px;"></div>
                            @endif
                        </div>
                    @elseif(isset($jenis_ttd) && $jenis_ttd == 'manual')
                        <div style="height: 50px; margin: 15px 0;"></div>
                    @else
                        <div style="height: 50px; margin: 15px 0;"></div>
                    @endif

                    <div class="bold" style="text-decoration: underline; font-size: 9pt;">{{ strtoupper($kepala_desa_nama ?? 'ZULTAN ALHARA') }}</div>
                    <div style="font-size: 9pt;">NIP. {{ $nip ?? '-' }}</div>
                </td>
                <td style="width: 25%;"></td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
