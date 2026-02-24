<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Surat Pengantar Perkawinan</title>
    <style>
        body { font-family: 'Times New Roman', serif; font-size: 12pt; color: #000; margin: 0; padding: 20mm; }
        .kop { text-align: center; }
        .kop h2 { margin: 0; font-size: 14pt; font-weight: bold; text-transform: uppercase; }
        .kop p { margin: 2px 0; font-size: 10pt; }
        .nomor { text-align: center; margin-top: 12px; margin-bottom: 18px; font-weight: bold; }
        .title { text-align: center; font-size: 14pt; font-weight: bold; margin-bottom: 6px; text-decoration: underline; }
        .content { text-align: justify; }
        .section { margin: 10px 0; }
        .label { display: inline-block; width: 200px; vertical-align: top; }
        .value { display: inline-block; width: calc(100% - 210px); }
        .small { font-size: 10pt; }
        .signature { margin-top: 40px; text-align: right; }
        .ttd-space { height: 80px; }
        .bold { font-weight: bold; }
        .line { border-top: 2px solid #000; margin-top: 8px; width: 220px; }
        @page { size: A4; margin: 2cm; }
    </style>
</head>
<body>
    <div class="kop">
        <h2>KANTOR DESA / KELURAHAN : KETAPANG BARU</h2>
        <p>KECAMATAN : SEMIDANG ALAS MARAS</p>
        <p>KABUPATEN/KOTA : SELUMA</p>
    </div>

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
                <div><span class="label">Warga Negara</span><span class="value">: {{ $ayah_warga_negara ?? '-' }}</span></div>
                <div><span class="label">Agama</span><span class="value">: {{ $ayah_agama ?? '-' }}</span></div>
                <div><span class="label">Pekerjaan</span><span class="value">: {{ $ayah_pekerjaan ?? '-' }}</span></div>
                <div><span class="label">Alamat</span><span class="value">: {{ $ayah_alamat ?? '-' }}</span></div>
            </div>
        </div>

        <div class="section">
            <p class="small bold">Dengan seorang wanita :</p>
            <div class="small">
                <div><span class="label">Nama</span><span class="value">: {{ $wanita_nama ?? '-' }}</span></div>
                <div><span class="label">NIK</span><span class="value">: {{ $wanita_nik ?? '-' }}</span></div>
                <div><span class="label">Tempat dan Tanggal Lahir</span><span class="value">: {{ $wanita_tempat_tanggal_lahir ?? '-' }}</span></div>
                <div><span class="label">Warga Negara</span><span class="value">: {{ $wanita_warga_negara ?? '-' }}</span></div>
                <div><span class="label">Agama</span><span class="value">: {{ $wanita_agama ?? '-' }}</span></div>
                <div><span class="label">Pekerjaan</span><span class="value">: {{ $wanita_pekerjaan ?? '-' }}</span></div>
                <div><span class="label">Alamat</span><span class="value">: {{ $wanita_alamat ?? '-' }}</span></div>
            </div>
        </div>

        <div class="section">
            <p>Demikian Surat Pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.</p>
        </div>

    </div>

    <div class="signature">
        <div>Ketapang Baru, {{ $tanggal_surat ?? now()->format('d F Y') }}</div>
        <div style="height: 60px;"></div>
        <div class="bold">Kepala Desa</div>
        <div class="line"></div>
        <div class="bold">{{ $kepala_desa_nama ?? 'ZAKI ALQAJAR' }}</div>
    </div>

</body>
</html>
