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
            color: #1f2937;
            background: #ffffff;
            padding: 30px;
        }
        
        .page {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        
        /* Header dengan gradient dan border */
        .header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        
        .kantor-desa {
            font-size: 24pt;
            font-weight: 700;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }
        
        .alamat-kantor {
            font-size: 12pt;
            font-weight: 400;
            margin-bottom: 4px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }
        
        .provinsi {
            font-size: 11pt;
            font-weight: 300;
            opacity: 0.8;
            position: relative;
            z-index: 1;
        }
        
        /* Nomor Surat dengan design modern */
        .nomor-surat-container {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            margin: 30px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .nomor-surat-label {
            font-size: 10pt;
            font-weight: 500;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }
        
        .nomor-surat {
            font-size: 16pt;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 5px;
        }
        
        .nomor-angka {
            font-size: 14pt;
            font-weight: 600;
            color: #475569;
            font-family: 'Courier New', monospace;
        }
        
        /* Content Area */
        .content {
            padding: 30px;
        }
        
        .section-title {
            font-size: 12pt;
            font-weight: 600;
            color: #1e40af;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #dbeafe;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 2px;
            background: #3b82f6;
        }
        
        /* Data Tables dengan design modern */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: #f8fafc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .data-table tr {
            border-bottom: 1px solid #e2e8f0;
        }
        
        .data-table tr:last-child {
            border-bottom: none;
        }
        
        .data-table td {
            padding: 12px 16px;
            vertical-align: top;
        }
        
        .data-table td:first-child {
            width: 220px;
            font-weight: 600;
            color: #374151;
            background: #f1f5f9;
            border-right: 1px solid #e2e8f0;
        }
        
        .data-table td:last-child {
            color: #1f2937;
            font-weight: 500;
        }
        
        /* Footer dengan design modern */
        .footer {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-top: 1px solid #e2e8f0;
            padding: 30px;
            text-align: right;
        }
        
        .footer-location {
            font-size: 11pt;
            color: #64748b;
            margin-bottom: 20px;
        }
        
        .footer-title {
            font-size: 12pt;
            font-weight: 600;
            color: #374151;
            margin-bottom: 25px;
        }
        
        .signature-area {
            display: inline-block;
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
        }
        
        .nama-kepala {
            font-size: 12pt;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 5px;
            text-decoration: underline;
            text-decoration-color: #3b82f6;
            text-decoration-thickness: 2px;
        }
        
        .nip {
            font-size: 10pt;
            color: #64748b;
            font-weight: 500;
        }
        
        /* Stempel dengan design modern */
        .stempel {
            position: absolute;
            right: 120px;
            top: 650px;
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            border: 3px solid #dc2626;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 8pt;
            font-weight: 700;
            text-align: center;
            line-height: 1.2;
            box-shadow: 0 4px 8px rgba(220, 38, 38, 0.3);
        }
        
        .stempel::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #dc2626, #b91c1c, #dc2626);
            border-radius: 50%;
            z-index: -1;
            animation: rotate 3s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        /* Responsive design */
        @media print {
            .page {
                box-shadow: none;
                border-radius: 0;
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
            <p style="margin-bottom: 20px; color: #64748b;">Yang bertanda tangan di bawah ini:</p>
            
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

            <div class="section-title" style="margin-top: 30px;">Detail Kehilangan</div>
            <p style="margin-bottom: 20px; color: #64748b;">Berdasarkan pengakuan yang bersangkutan, bahwa yang bersangkutan telah kehilangan:</p>
            
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

            <div style="margin: 30px 0; padding: 20px; background: #f0f9ff; border-left: 4px solid #3b82f6; border-radius: 0 8px 8px 0;">
                <p style="color: #1e40af; font-weight: 500; margin: 0;">
                    <strong>Catatan:</strong> Surat keterangan ini dibuat untuk keperluan {{ $keperluan }} dan berlaku sampai dengan tanggal {{ date('d F Y', strtotime('+6 months')) }}.
                </p>
            </div>

            <p style="text-align: center; color: #64748b; font-style: italic;">
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
