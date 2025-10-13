<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Pindah Penduduk</title>
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
        
        .nomor-surat {
            text-align: center;
            font-size: 12pt;
            margin: 15px 0;
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
            display: flex;
        }
        
        .data-label {
            width: 150px;
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
        
        .pindah-section {
            margin: 20px 0;
        }
        
        .pengikut-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 11pt;
        }
        
        .pengikut-table th,
        .pengikut-table td {
            border: 1px solid #000;
            padding: 8px 4px;
            text-align: center;
            vertical-align: middle;
        }
        
        .pengikut-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        .pengikut-table .no-col { width: 8%; }
        .pengikut-table .nama-col { width: 25%; }
        .pengikut-table .jk-col { width: 15%; }
        .pengikut-table .ttl-col { width: 20%; }
        .pengikut-table .hubungan-col { width: 17%; }
        .pengikut-table .pendidikan-col { width: 15%; }
        
        .signature-section {
            margin-top: 40px;
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
        
        .clearfix {
            clear: both;
        }
        
        .spacing {
            margin: 50px 0;
        }
        
        .underline {
            border-bottom: 1px solid #000;
            display: inline-block;
            min-width: 200px;
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
        Surat Keterangan Pindah Penduduk
    </div>

    <div class="nomor-surat">
        <strong>Nomor : {{ $nomor_surat ?? '69/ 170505 / 05 / 05 / SKP / IV/ 2025' }}</strong>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma dengan ini menerangkan bahwa :</p>
        
        <div class="data-section">
            <div class="data-row">
                <span class="data-label">Nama</span>
                <span class="data-colon">:</span>
                <span class="data-value"><strong>{{ $nama ?? 'AZIS RAHMAN' }}</strong></span>
            </div>
            <div class="data-row">
                <span class="data-label">Tempat / Tanggal Lahir</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $tempat_tanggal_lahir ?? 'Ketapang Baru/26 Mei 2003' }}</span>
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
                <span class="data-label">Status Perkawinan</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $status_perkawinan ?? 'Kawin' }}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Pekerjaan</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $pekerjaan ?? 'Petani/Pekebun' }}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Pendidikan</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $pendidikan ?? 'SLTA' }}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Kewarganegaraan</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $kewarganegaraan ?? 'WNI' }}</span>
            </div>
            <div class="data-row">
                <span class="data-label">Alamat</span>
                <span class="data-colon">:</span>
                <span class="data-value">{{ $alamat_asal ?? 'Ketapang Baru, Kecamatan Semidang Alas Maras Kabupaten Seluma.' }}</span>
            </div>
        </div>

        <div class="pindah-section">
            <p><strong>Pindah Ke :</strong></p>
            <div class="data-section">
                <div class="data-row">
                    <span class="data-label">Kelurahan / Desa</span>
                    <span class="data-colon">:</span>
                    <span class="data-value">{{ $alamat_tujuan ?? 'Ds. Karang Anyar, Kecamatan Semidang Alas Maras, Kabupaten Seluma.' }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Pada Tanggal</span>
                    <span class="data-colon">:</span>
                    <span class="data-value">{{ $tanggal_pindah ?? '09 April 2025' }}</span>
                </div>
                <div class="data-row">
                    <span class="data-label">Alasan Pindah</span>
                    <span class="data-colon">:</span>
                    <span class="data-value">{{ $alasan_pindah ?? 'Ikut Isteri' }}</span>
                </div>
            </div>
        </div>

        <div class="pengikut-section">
            <p><strong>Pengikut</strong></p>
            <table class="pengikut-table">
                <thead>
                    <tr>
                        <th class="no-col">NO</th>
                        <th class="nama-col">NAMA</th>
                        <th class="jk-col">JENIS KELAMIN</th>
                        <th class="ttl-col">TTL/UMUR</th>
                        <th class="hubungan-col">HUBUNGAN</th>
                        <th class="pendidikan-col">PENDIDIKAN</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($pengikut) && is_array($pengikut))
                        @foreach($pengikut as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p['nama'] ?? '' }}</td>
                                <td>{{ $p['jenis_kelamin'] ?? '' }}</td>
                                <td>{{ $p['ttl_umur'] ?? '' }}</td>
                                <td>{{ $p['hubungan'] ?? '' }}</td>
                                <td>{{ $p['pendidikan'] ?? '' }}</td>
                            </tr>
                        @endforeach
                        @if(count($pengikut) < 3)
                            @for($i = count($pengikut); $i < 3; $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endfor
                        @endif
                    @else
                        @for($i = 0; $i < 3; $i++)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        @endfor
                    @endif
                </tbody>
            </table>
        </div>

        <div class="signature-section">
            <div class="signature-left">
                <p><strong>Mengetahui:</strong></p>
                <p><strong>Camat Semidang Alas Maras</strong></p>
                <div class="spacing"></div>
                <p><strong><span class="underline">{{ $nama_camat ?? '................................' }}</span></strong></p>
                <p><strong>NIP {{ $nip_camat ?? '................................' }}</strong></p>
            </div>

            <div class="signature-right">
                <p><strong>Ketapang Baru, {{ $tanggal_surat ?? date('d F Y') }}</strong></p>
                <p><strong>Kepala Desa Ketapang Baru</strong></p>
                <div class="spacing"></div>
                <p><strong><span class="underline">{{ $kepala_desa_nama ?? 'ZULTAN ALHARA' }}</span></strong></p>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</body>
</html>