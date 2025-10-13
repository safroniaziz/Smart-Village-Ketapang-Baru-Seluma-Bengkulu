<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Rekomendasi</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.4;
            margin: 0;
            padding: 20px;
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
        
        .nomor-surat {
            text-align: center;
            font-size: 12pt;
            margin: 15px 0 30px 0;
        }
        
        .content {
            text-align: justify;
            margin-bottom: 20px;
        }
        
        .data-section {
            margin: 15px 0;
            margin-left: 40px;
        }
        
        .data-row {
            margin: 3px 0;
            display: flex;
            align-items: flex-start;
        }
        
        .data-label {
            width: 180px;
            display: inline-block;
        }
        
        .data-colon {
            width: 20px;
            display: inline-block;
            text-align: center;
        }
        
        .data-value {
            flex: 1;
        }
        
        .usaha-section {
            margin: 20px 0;
            margin-left: 40px;
        }
        
        .usaha-section h4 {
            font-weight: bold;
            margin: 15px 0 10px 0;
        }
        
        .signature-section {
            margin-top: 40px;
            text-align: right;
            margin-right: 80px;
        }
        
        .signature-content {
            text-align: center;
        }
        
        .spacing {
            margin: 50px 0;
        }
        
        .underline {
            border-bottom: 1px solid #000;
            display: inline-block;
            min-width: 200px;
        }
        
        .indent {
            margin-left: 40px;
        }
        
        .text-justify {
            text-align: justify;
        }
        
        .mt-20 {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Kop Surat -->
    <div class="kop-surat">
        <h1>Pemerintah Kabupaten Seluma</h1>
        <h2>Kecamatan Semidang Alas Maras</h2>
        <h2>Desa Ketapang Baru</h2>
        <p>Alamat: Jl. Raya Ketapang Baru, Kecamatan Semidang Alas Maras</p>
        <p>Kabupaten Seluma, Provinsi Bengkulu</p>
    </div>

    <!-- Title -->
    <div class="title">
        Surat Rekomendasi
    </div>

    <!-- Nomor Surat -->
    <div class="nomor-surat">
        <strong>Nomor : {{ $nomor_surat ?? '/170505/05/05/SK/KTB/...../2024' }}</strong>
    </div>

    <!-- Content -->
    <div class="content">
        <p>Yang bertanda tangan dibawa ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma dengan ini menerangkan bahwa :</p>
        
        <!-- Data Pemohon -->
        <div class="data-section">
            <div class="data-row">
                <span class="data-label">Nama</span>
                <span class="data-colon">:</span>
                <span class="data-value"><strong>{{ $nama ?? '................................' }}</strong></span>
            </div>
            <div class="data-row">
                <span class="data-label">NIK</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $nik ?? '1705050907500002' }}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Jenis Kelamin</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $jenis_kelamin ?? 'Laki-laki' }}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Agama</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $agama ?? 'Islam' }}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Pekerjaan</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $pekerjaan ?? 'Pensiunan' }}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Alamat</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $alamat ?? 'Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma.' }}</span>
            </div>
        </div>

        <!-- Isi Rekomendasi -->
        <div class="mt-20">
            <p class="text-justify">
                {{ $isi_rekomendasi ?? 'Adalah benar penduduk Desa Ketapang Baru yang mempunyai Usaha Pupuk Bersubsidi yang terletak di Desa Ketapang Baru dengan Nama Usaha Sebagai Berikut :' }}
            </p>
        </div>

        <!-- Detail Usaha (jika ada) -->
        @if(!empty($nama_usaha) || !empty($alamat_usaha))
        <div class="usaha-section">
            <div class="data-row">
                <span class="data-label">Nama Usaha</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $nama_usaha ?? 'Jual Pupuk Bersubsidi' }}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Alamat Usaha</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $alamat_usaha ?? 'Desa Ketapang Baru' }}</span>
            </div>
            @if(!empty($nomor_telepon))
            <div class="data-row">
                <span class="data-label">Nomor Telepon</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $nomor_telepon }}</span>
            </div>
            @endif
            @if(!empty($luas_lahan))
            <div class="data-row">
                <span class="data-label">Luas Lahan</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $luas_lahan }} M<sup>2</sup></span>
            </div>
            @endif
            @if(!empty($luas_bangunan))
            <div class="data-row">
                <span class="data-label">Luas Bangunan</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $luas_bangunan }} M<sup>2</sup></span>
            </div>
            @endif
            @if(!empty($kapasitas))
            <div class="data-row">
                <span class="data-label">Kapasitas</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $kapasitas }} Ton</span>
            </div>
            @endif
            @if(!empty($modal_usaha))
            <div class="data-row">
                <span class="data-label">Modal Usaha</span>
                <span class="data-colon">:</span>
                <span class="data-value">Rp {{ number_format($modal_usaha, 0, ',', '.') }},00-</span>
            </div>
            @endif
            @if(!empty($penghasilan_bulanan))
            <div class="data-row">
                <span class="data-label">Penghasilan/Bln</span>
                <span class="data-colon">:</span>
                <span class="data-value">Rp {{ number_format($penghasilan_bulanan, 0, ',', '.') }},00</span>
            </div>
            @endif
        </div>
        @endif

        <!-- Penutup -->
        <div class="mt-20">
            <p class="text-justify">
                {{ $penutup ?? 'Demikianlah Surat keterangan ini dibuat dengan sebenarnya dan dapat dipergunakan sebagai mana mestinya.' }}
            </p>
        </div>

        <!-- Tanda Tangan -->
        <div class="signature-section">
            <div class="signature-content">
                <p><strong>Ketapang Baru, {{ $tanggal_surat ?? date('d F Y') }}</strong></p>
                <p><strong>Kepala Desa Ketapang Baru</strong></p>
                <div class="spacing"></div>
                <p><strong><span class="underline">{{ $kepala_desa_nama ?? 'ZULTAN ALHARA' }}</span></strong></p>
            </div>
        </div>
    </div>
</body>
</html>