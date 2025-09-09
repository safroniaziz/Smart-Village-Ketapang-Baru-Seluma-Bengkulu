<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
            color: #000;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 20px;
        }
        .kantor-desa {
            font-size: 16pt;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .alamat-kantor {
            font-size: 11pt;
            margin-bottom: 5px;
        }
        .nomor-surat {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            margin: 30px 0;
        }
        .isi-surat {
            text-align: justify;
            margin-bottom: 30px;
        }
        .data-pemohon {
            margin: 20px 0;
        }
        .data-pemohon table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-pemohon td {
            padding: 5px 10px;
            vertical-align: top;
        }
        .data-pemohon td:first-child {
            width: 200px;
            font-weight: bold;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .ttd {
            margin-top: 80px;
        }
        .nama-kepala {
            font-weight: bold;
            text-decoration: underline;
        }
        .nip {
            font-size: 10pt;
        }
        .stempel {
            position: absolute;
            right: 100px;
            top: 600px;
            width: 80px;
            height: 80px;
            border: 2px solid #000;
            border-radius: 50%;
            text-align: center;
            font-size: 8pt;
            font-weight: bold;
            line-height: 1.2;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="kantor-desa">PEMERINTAH DESA SELUMA</div>
        <div class="alamat-kantor">Kecamatan Seluma, Kabupaten Seluma</div>
        <div class="alamat-kantor">Provinsi Bengkulu</div>
    </div>

    <!-- Nomor Surat -->
    <div class="nomor-surat">
        SURAT KETERANGAN KEHILANGAN<br>
        Nomor: {{ $nomor_surat }}
    </div>

    <!-- Isi Surat -->
    <div class="isi-surat">
        <p>Yang bertanda tangan di bawah ini:</p>
        
        <div class="data-pemohon">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $nama_pemohon }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>: {{ $nik }}</td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>: {{ $tempat_lahir }}, {{ $tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $alamat }}</td>
                </tr>
                <tr>
                    <td>RT/RW</td>
                    <td>: {{ $rt_rw }}</td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>: {{ $no_hp }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: {{ $pekerjaan }}</td>
                </tr>
            </table>
        </div>

        <p>Berdasarkan pengakuan yang bersangkutan, bahwa yang bersangkutan telah kehilangan:</p>
        
        <div class="data-pemohon">
            <table>
                <tr>
                    <td>Jenis Dokumen/Barang</td>
                    <td>: {{ $jenis_dokumen }}
                        @if($nama_barang_lainnya)
                            - {{ $nama_barang_lainnya }}
                        @endif
                    </td>
                </tr>
                @if($nomor_dokumen)
                <tr>
                    <td>Nomor Dokumen/Barang</td>
                    <td>: {{ $nomor_dokumen }}</td>
                </tr>
                @endif
                <tr>
                    <td>Tempat Kehilangan</td>
                    <td>: {{ $tempat_kehilangan }}</td>
                </tr>
                <tr>
                    <td>Waktu Kehilangan</td>
                    <td>: {{ $waktu_kehilangan }}
                        @if($keterangan_waktu)
                            - {{ $keterangan_waktu }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Keperluan</td>
                    <td>: {{ $keperluan }}</td>
                </tr>
            </table>
        </div>

        <p>Surat keterangan ini dibuat untuk keperluan {{ $keperluan }} dan berlaku sampai dengan tanggal {{ date('d/m/Y', strtotime('+6 months')) }}.</p>
        
        <p>Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div>Seluma, {{ $tanggal_surat }}</div>
        <div>Kepala Desa Seluma</div>
        <div class="ttd">
            <div class="nama-kepala">SAHRI, S.Pd</div>
            <div class="nip">NIP. 1975052511190005</div>
        </div>
    </div>

    <!-- Stempel -->
    <div class="stempel">
        STEMPEL<br>
        DESA<br>
        SELUMA
    </div>
</body>
</html>
