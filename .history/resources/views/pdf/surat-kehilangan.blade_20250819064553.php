<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 11pt;
            line-height: 1.6;
            color: #2d3748;
            background: #ffffff;
            padding: 30px;
        }

        .page {
            max-width: 750px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #e2e8f0;
        }

        /* Header - Simple & Clean */
        .header {
            background: #2d3748;
            color: white;
            padding: 35px 40px;
            text-align: center;
            border-bottom: 2px solid #4a5568;
        }

        .kantor-desa {
            font-size: 18pt;
            font-weight: 600;
            margin-bottom: 6px;
            letter-spacing: 0.5px;
        }

        .alamat-kantor {
            font-size: 11pt;
            font-weight: 400;
            margin-bottom: 3px;
            opacity: 0.9;
        }

        .provinsi {
            font-size: 10pt;
            font-weight: 300;
            opacity: 0.8;
        }

        /* Nomor Surat - Clean Design */
        .nomor-surat-container {
            background: #f7fafc;
            border: 1px solid #e2e8f0;
            padding: 20px;
            margin: 25px 40px;
            text-align: center;
        }

        .nomor-surat-label {
            font-size: 9pt;
            font-weight: 500;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .nomor-surat {
            font-size: 14pt;
            font-weight: 600;
            color: #2d3748;
        }

        .nomor-angka {
            font-family: 'Courier New', monospace;
            color: #4a5568;
        }

        /* Content Area */
        .content {
            padding: 0 40px 30px 40px;
        }

        .section-title {
            font-size: 11pt;
            font-weight: 600;
            color: #2d3748;
            margin: 25px 0 15px 0;
            padding-bottom: 6px;
            border-bottom: 1px solid #e2e8f0;
        }

        /* Data Tables - Clean & Simple */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            border: 1px solid #e2e8f0;
        }

        .data-table tr {
            border-bottom: 1px solid #e2e8f0;
        }

        .data-table tr:last-child {
            border-bottom: none;
        }

        .data-table td {
            padding: 10px 12px;
            vertical-align: top;
        }

        .data-table td:first-child {
            width: 200px;
            font-weight: 500;
            color: #4a5568;
            background: #f7fafc;
            border-right: 1px solid #e2e8f0;
        }

        .data-table td:last-child {
            color: #2d3748;
            font-weight: 400;
        }

        /* Footer - Clean Design */
        .footer {
            background: #f7fafc;
            border-top: 1px solid #e2e8f0;
            padding: 25px 40px;
            text-align: right;
        }

        .footer-location {
            font-size: 10pt;
            color: #718096;
            margin-bottom: 15px;
        }

        .footer-title {
            font-size: 11pt;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 20px;
        }

        .signature-area {
            display: inline-block;
            text-align: center;
            padding: 15px 25px;
            background: white;
            border: 1px solid #e2e8f0;
        }

        .nama-kepala {
            font-size: 11pt;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 4px;
            text-decoration: underline;
            text-decoration-color: #4a5568;
        }

        .nip {
            font-size: 9pt;
            color: #718096;
            font-weight: 400;
        }

        /* Stempel - Simple & Clean */
        .stempel {
            position: absolute;
            right: 100px;
            top: 600px;
            width: 70px;
            height: 70px;
            background: #e53e3e;
            border: 2px solid #c53030;
            border-radius: 50%;
            color: white;
            font-size: 7pt;
            font-weight: 600;
            text-align: center;
            line-height: 1.2;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Print styles */
        @media print {
            .page {
                border: none;
                box-shadow: none;
            }

            .stempel {
                position: fixed;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <!-- Header -->
        <div class="header">
            <div class="kantor-desa">PEMERINTAH DESA SELUMA</div>
            <div class="alamat-kantor">Kecamatan Seluma, Kabupaten Seluma</div>
            <div class="provinsi">Provinsi Bengkulu</div>
        </div>

        <!-- Nomor Surat -->
        <div class="nomor-surat-container">
            <div class="nomor-surat-label">Surat Keterangan Kehilangan</div>
            <div class="nomor-surat">Nomor: <span class="nomor-angka">{{ $nomor_surat }}</span></div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="section-title">Data Pemohon</div>
            <p style="margin-bottom: 15px; color: #718096; font-size: 10pt;">Yang bertanda tangan di bawah ini:</p>

            <table class="data-table">
                <tr>
                    <td>Nama Lengkap</td>
                    <td>{{ $nama_pemohon }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>{{ $nik }}</td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>{{ $tempat_lahir }}, {{ $tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $alamat }}</td>
                </tr>
                <tr>
                    <td>RT/RW</td>
                    <td>{{ $rt_rw }}</td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>{{ $no_hp }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>{{ $pekerjaan }}</td>
                </tr>
            </table>

            <div class="section-title">Detail Kehilangan</div>
            <p style="margin-bottom: 15px; color: #718096; font-size: 10pt;">Berdasarkan pengakuan yang bersangkutan, bahwa yang bersangkutan telah kehilangan:</p>

            <table class="data-table">
                <tr>
                    <td>Jenis Dokumen/Barang</td>
                    <td>{{ $jenis_dokumen }}
                        @if($nama_barang_lainnya)
                            - {{ $nama_barang_lainnya }}
                        @endif
                    </td>
                </tr>
                @if($nomor_dokumen)
                <tr>
                    <td>Nomor Dokumen/Barang</td>
                    <td>{{ $nomor_dokumen }}</td>
                </tr>
                @endif
                <tr>
                    <td>Tempat Kehilangan</td>
                    <td>{{ $tempat_kehilangan }}</td>
                </tr>
                <tr>
                    <td>Waktu Kehilangan</td>
                    <td>{{ $waktu_kehilangan }}
                        @if($keterangan_waktu)
                            - {{ $keterangan_waktu }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Keperluan</td>
                    <td>{{ $keperluan }}</td>
                </tr>
            </table>

            <div style="margin: 25px 0; padding: 15px; background: #f7fafc; border-left: 3px solid #4a5568; border-radius: 0 4px 4px 0;">
                <p style="color: #2d3748; font-weight: 500; margin: 0; font-size: 10pt;">
                    <strong>Catatan:</strong> Surat keterangan ini dibuat untuk keperluan {{ $keperluan }} dan berlaku sampai dengan tanggal {{ date('d F Y', strtotime('+6 months')) }}.
                </p>
            </div>

            <p style="text-align: center; color: #718096; font-style: italic; font-size: 10pt;">
                Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-location">Seluma, {{ $tanggal_surat }}</div>
            <div class="footer-title">Kepala Desa Seluma</div>
            <div class="signature-area">
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
    </div>
</body>
</html>
