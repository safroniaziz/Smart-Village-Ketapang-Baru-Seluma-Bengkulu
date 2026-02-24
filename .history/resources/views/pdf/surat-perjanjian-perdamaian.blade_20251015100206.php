<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Perjanjian Perdamaian</title>
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

        .pihak-section {
            margin: 15px 0;
            margin-left: 40px;
        }

        .pihak-data {
            margin: 3px 0;
        }

        .pihak-label {
            text-align: right;
            margin: 10px 0;
            font-weight: bold;
        }

        .isi-perjanjian {
            margin: 20px 0;
            counter-reset: item-counter;
        }

        .isi-item {
            counter-increment: item-counter;
            margin: 15px 0;
            text-indent: 20px;
        }

        .isi-item::before {
            content: counter(item-counter, decimal) ". ";
            font-weight: bold;
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
            margin-top: 40px;
            clear: both;
        }

        .saksi-section {
            margin-top: 20px;
            text-align: left;
        }

        .saksi-column {
            display: inline-block;
            width: 45%;
            vertical-align: top;
            margin: 0 2%;
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

        .indent {
            margin-left: 40px;
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
        Surat Perjanjian Perdamaian
    </div>

    <div class="content">
        <p>Kami yang bertanda tangan di bawah ini :</p>

        <div class="pihak-section">
            <div class="pihak-data">Nama : {{ $pihak1_nama ?? 'RANI OKVIANTI. Me' }}</div>
            <div class="pihak-data">Umur : {{ $pihak1_umur ?? '30' }} Tahun</div>
            <div class="pihak-data">Pekerjaan : {{ $pihak1_pekerjaan ?? 'Wiraswasta' }}</div>
            <div class="pihak-data">Agama : {{ $pihak1_agama ?? 'Islam' }}</div>
            <div class="pihak-data">Alamat : {{ $pihak1_alamat ?? 'Ketapang Baru Kec. SAM Kab. Seluma' }}</div>
            <div class="pihak-label">(Disebut Pihak ke I/Satu)</div>
        </div>

        <div class="pihak-section">
            <div class="pihak-data">Nama : {{ $pihak2_nama ?? 'MULYANO. S' }}</div>
            <div class="pihak-data">Umur : {{ $pihak2_umur ?? '50' }} Tahun</div>
            <div class="pihak-data">Pekerjaan : {{ $pihak2_pekerjaan ?? 'Petani/Pekebun' }}</div>
            <div class="pihak-data">Agama : {{ $pihak2_agama ?? 'Islam' }}</div>
            <div class="pihak-data">Alamat : {{ $pihak2_alamat ?? 'Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma.' }}</div>
            <div class="pihak-label">(Disebut Pihak ke II/Dua)</div>
        </div>

        <p>Pada hari ini <strong>{{ $hari_tanggal_perjanjian ?? 'Senin Tanggal Lima Bulan Mei' }}</strong> Tahun Dua Ribu Dua Puluh Lima dengan ini Kami Pihak Ke I (Satu) dan Pihak Ke II (Dua) Sepakat Berdamai atas persistiwa kesalah pahaman perbuatan yang tidak menyenangkan antara Pihak ke I dan Pihak ke II yang terjadi pada Hari <strong>{{ $hari_tanggal_kejadian ?? 'Sabtu Malam Minggu Tanggal Dua Puluh Enam April' }}</strong> Tahun Dua Ribuh Dua Puluh Lima Pukul <strong>{{ $waktu_kejadian ?? '22:15' }}</strong> di Desa Ketapang Baru. Adapun isi perjanjian perdamaian ini sebagai berikut :</p>

        <div class="isi-perjanjian">
            <div class="isi-item">
                Pihak Ke I (Satu) dan Pihak Ke II (Dua) sepakat berdamai dan Pihak ke II (Dua) berjanji tidak akan mengulangi perbuatan tersebut diatas baik kepada pihak ke I (Satu) maupun kepada orang lain.
            </div>

            <div class="isi-item">
                Pihak ke II (Dua) Bersedia memenuhi tuntutan adat berupa <strong>{{ $jenis_denda ?? 'satu buah jambar tutup ayam' }}</strong> dan uang sebesar <strong>Rp {{ number_format($nominal_denda ?? 250000, 0, ',', '.') }},-</strong> (<strong>{{ $terbilang_denda ?? 'Dua Ratus Lima Puluh Ribuh Rupiah' }}</strong>) dan denda adat tersebut telah di penuhinya oleh pihak ke II (Dua) pada hari ini <strong>{{ $hari_tanggal_perjanjian ?? 'Senin Tanggal Lima Bulan Mei' }}</strong> Tahun Dua Ribuh Dua Puluh Lima.
            </div>

            <div class="isi-item">
                Apabila Pihak ke II (Dua) melakukan/mengulangi perbuatan tersebut diatas maka permasalahan ini akan ditangani oleh pihak yang berwajib (Polisi)
            </div>

            <div class="isi-item">
                Pihak Ke I (Satu) dan Pihak Ke II (Dua) tidak akan menuntut Pihak manapun atas peristiwa tersebut diatas dan Pihak Ke I (Satu) dan Pihak Ke II (Dua) Sepakat tidak ada tuntutan di kemudian hari.
            </div>
        </div>

        <p>Demikianlah surat perjanjian Perdamaian ini di buat dalam keadaan sadar dan Kami buat dengan sesungguhnya untuk dapat digunakan bila mana perlu.</p>

        <div class="signature-section">
            <div class="signature-left">
                <p><strong>Pihak ke I (satu)</strong></p>
                <div class="spacing"></div>
                <p><strong><span class="underline">{{ $pihak1_nama ?? 'RANI OKTAVIANTI. Me' }}</span></strong></p>
            </div>

            <div class="signature-right">
                <p><strong>Pihak ke II (dua)</strong></p>
                <div class="spacing"></div>
                <p><strong><span class="underline">{{ $pihak2_nama ?? 'MULYANO.S' }}</span></strong></p>
            </div>

            <div class="clearfix"></div>

            <div class="signature-center">
                <div style="float: left; width: 50%;">
                    <p><strong>Mengetahui</strong></p>
                    <p><strong>Kepala Desa</strong></p>

                    <!-- TTD berdasarkan pilihan admin -->
                    @if($jenis_ttd == 'gambar')
                        <!-- Gambar TTD -->
                        <div style="margin-bottom: 15px;">
                            <img src="{{ public_path($ttd_image_path ?? 'assets/images/ttd.png') }}" style="width: 150px; height: auto;" alt="TTD Gambar">
                        </div>
                    @elseif($jenis_ttd == 'qrcode')
                        <!-- QR Code TTD - QR code yang berisi gambar TTD -->
                        <div style="margin-bottom: 15px;">
                            <img src="data:image/png;base64,{{ $qr_ttd_base64 }}" style="width: 120px; height: auto;" alt="QR Code TTD">
                        </div>
                    @elseif($jenis_ttd == 'manual')
                        <!-- Manual TTD - Ruang kosong -->
                        <div style="height: 80px; margin-bottom: 15px;">
                            <!-- Ruang kosong untuk TTD manual -->
                        </div>
                    @else
                        <!-- Default - Ruang kosong -->
                        <div style="height: 80px; margin-bottom: 15px;">
                            <!-- Ruang kosong untuk TTD -->
                        </div>
                    @endif

                    <div class="spacing"></div>
                    <p><strong><span class="underline">{{ $kepala_desa_nama ?? 'ZULTAN ALHARA' }}</span></strong></p>
                </div>

                <div style="float: right; width: 50%;">
                    <p><strong>Saksi – saksi :</strong></p>
                    <div class="saksi-section">
                        <div class="saksi-column">
                            <p><strong>{{ $saksi_1 ?? 'SIHAINI' }}</strong></p>
                            <p>(...................................)</p>


                            <p><strong>{{ $saksi_3 ?? 'MERI KUSNIDI' }}</strong></p>
                            <p>(...................................)</p>
                        </div>
                        <div class="saksi-column">
                            <p><strong>{{ $saksi_2 ?? 'HERMANJO' }}</strong></p>
                            <p>(...................................)</p>


                            <p><strong>{{ $saksi_4 ?? 'SAPTA ANIKE PUTRI' }}</strong></p>
                            <p>(...................................)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
