<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Hibah</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.4;
            margin: 0;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .kop-surat {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .kop-surat h1 {
            font-size: 16pt;
            font-weight: bold;
            margin: 0;
            text-transform: uppercase;
        }
        
        .kop-surat h2 {
            font-size: 14pt;
            font-weight: bold;
            margin: 5px 0;
            text-transform: uppercase;
        }
        
        .kop-surat p {
            font-size: 10pt;
            margin: 2px 0;
        }
        
        .title {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 20px 0;
            text-transform: uppercase;
        }
        
        .content {
            text-align: justify;
            margin-bottom: 20px;
        }
        
        .data-section {
            margin: 15px 0;
        }
        
        .data-row {
            margin: 3px 0;
        }
        
        .batas-tanah {
            margin: 15px 0;
            margin-left: 20px;
        }
        
        .signature-section {
            margin-top: 40px;
        }
        
        .signature-left {
            float: left;
            width: 40%;
            text-align: center;
        }
        
        .signature-right {
            float: right;
            width: 40%;
            text-align: center;
        }
        
        .signature-center {
            text-align: center;
            margin-top: 60px;
            clear: both;
        }
        
        .saksi-section {
            margin-top: 20px;
            float: left;
            width: 40%;
        }
        
        .clearfix {
            clear: both;
        }
        
        .underline {
            border-bottom: 1px solid #000;
            display: inline-block;
            min-width: 200px;
            margin-left: 10px;
        }
        
        .spacing {
            margin: 40px 0;
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        <h1>Pemerintah Kabupaten Seluma</h1>
        <h2>Kecamatan Semidang Alas Maras</h2>
        <h2>Desa Ketapang Baru</h2>
        <p>Alamat: Jl. Raya Ketapang Baru, Kecamatan Semidang Alas Maras</p>
        <p>Kabupaten Seluma, Provinsi Bengkulu</p>
    </div>

    <div class="title">
        Surat Keterangan Hibah
    </div>

    <div class="content">
        <p>Kami yang bertanda tangan dibawah ini :</p>
        
        <div class="data-section">
            <div class="data-row">Nama<span class="underline">{{ $nama_penghibah ?? '................................' }}</span></div>
            <div class="data-row">Umur<span class="underline">{{ $umur_penghibah ?? '................................' }}</span></div>
            <div class="data-row">Pekerjaan<span class="underline">{{ $pekerjaan_penghibah ?? '................................' }}</span></div>
            <div class="data-row">Agama<span class="underline">{{ $agama_penghibah ?? '................................' }}</span></div>
            <div class="data-row">Alamat<span class="underline">{{ $alamat_penghibah ?? '................................' }}</span></div>
        </div>

        <p><strong>Disebut Pihak Ke I / Satu (Penghibah)</strong></p>

        <div class="spacing"></div>

        <p><strong>Pemerintah Desa Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma</strong></p>
        <p><strong>Disebut Pihak Ke II/ Dua (Penerima)</strong></p>

        <div class="spacing"></div>

        <p>Pada hari ini <strong>{{ $hari_tanggal ?? '........................................................................' }}</strong> Tahun Dua Ribu Dua Puluh Lima Pihak Ke I (Satu) Telah Menghibahkan Tanah Dengan luas ±<strong>{{ $luas_tanah ?? '............' }}</strong> M<sup>2</sup> yang berlokasikan di Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma Kepada Pihak Ke II (Dua) Adapun batas – batas tanah tersebut :</p>

        <div class="batas-tanah">
            <div class="data-row">Sebelah Utara batas Dengan Tanah <span class="underline">{{ $batas_utara ?? '..................' }}</span> ( <span class="underline">{{ $pemilik_utara ?? '..................' }}</span> )</div>
            <div class="data-row">Sebelah Barat batas Dengan Tanah <span class="underline">{{ $batas_barat ?? '..................' }}</span> ( <span class="underline">{{ $pemilik_barat ?? '..................' }}</span> )</div>
            <div class="data-row">Sebelah Selatan batas Dengan Tanah <span class="underline">{{ $batas_selatan ?? '..................' }}</span> ( <span class="underline">{{ $pemilik_selatan ?? '..................' }}</span> )</div>
            <div class="data-row">Sebelah Timur batas Dengan Tanah <span class="underline">{{ $batas_timur ?? '..................' }}</span> ( <span class="underline">{{ $pemilik_timur ?? '..................' }}</span> )</div>
        </div>

        <div class="spacing"></div>

        <p>Demikianlah surat Hibah ini dibuat dengan sesungguhnya untuk dapat digunakan bila mana perlu.</p>

        <div class="signature-section">
            <div class="signature-left">
                <p><strong>Pihak Ke Satu (1)</strong></p>
                <div class="spacing"></div>
                <p><strong><span class="underline">{{ $nama_penghibah ?? '................................' }}</span></strong></p>
            </div>

            <div class="signature-right">
                <div class="saksi-section">
                    <p><strong>Saksi :</strong></p>
                    <p>1. <span class="underline">{{ $saksi_1 ?? '................................' }}</span></p>
                    <p>2. <span class="underline">{{ $saksi_2 ?? '................................' }}</span></p>
                    <p>3. <span class="underline">{{ $saksi_3 ?? '................................' }}</span></p>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="signature-center">
                <p><strong>Mengetahui :</strong></p>
                <p><strong>Kepala Desa Ketapang Baru</strong></p>
                <div class="spacing"></div>
                <p><strong><span class="underline">{{ $kepala_desa_nama ?? 'ZULTAN ALHARA' }}</span></strong></p>
            </div>
        </div>
    </div>
</body>
</html>