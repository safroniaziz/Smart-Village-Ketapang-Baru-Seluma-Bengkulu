<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kehilangan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            font-size: 11pt;
            line-height: 1.6;
            color: #1a1a1a;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 30px 20px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .page {
            max-width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15), 0 8px 20px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
            animation: slideUp 0.6s ease-out 0.2s both;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .page::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #06b6d4);
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%, 100% { transform: translateX(-100%); }
            50% { transform: translateX(100%); }
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 35px;
            border: 1px solid #e1e5e9;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            position: relative;
            overflow: hidden;
        }

        .header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            vertical-align: middle;
            padding: 10px;
        }

        .logo-cell {
            width: 130px;
            text-align: center;
        }

        .logo {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
            animation: logoFloat 3s ease-in-out infinite;
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }

        .logo-text {
            color: white;
            font-size: 24pt;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
        }

        .text-cell {
            text-align: center;
            padding-left: 20px;
        }

        .government-name {
            font-size: 16pt;
            font-weight: 700;
            color: #1e40af;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            font-family: 'Playfair Display', serif;
        }

        .village-name {
            font-size: 20pt;
            font-weight: 700;
            color: #1f2937;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 8px;
            font-family: 'Playfair Display', serif;
        }

        .district-info {
            font-size: 12pt;
            color: #4b5563;
            margin-bottom: 4px;
            font-weight: 500;
        }

        .contact-info {
            font-size: 10pt;
            color: #6b7280;
            font-style: italic;
            background: #f1f5f9;
            padding: 8px 16px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 8px;
        }

        /* Title */
        .document-title {
            text-align: center;
            margin: 40px 0 35px;
            position: relative;
        }

        .title-main {
            font-size: 24pt;
            font-weight: 700;
            color: #1e40af;
            text-transform: uppercase;
            margin-bottom: 12px;
            letter-spacing: 2px;
            font-family: 'Playfair Display', serif;
            text-shadow: 0 2px 4px rgba(30, 64, 175, 0.1);
        }

        .document-number {
            font-size: 12pt;
            font-family: 'Inter', sans-serif;
            color: #6b7280;
            background: #f1f5f9;
            padding: 8px 20px;
            border-radius: 25px;
            display: inline-block;
            border: 1px solid #e2e8f0;
        }

        /* Intro Text */
        .intro-text {
            text-align: justify;
            margin-bottom: 30px;
            font-size: 12pt;
            color: #374151;
            line-height: 1.7;
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            border-left: 4px solid #3b82f6;
        }

        /* Section */
        .section {
            margin-bottom: 30px;
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            border: 1px solid #e5e7eb;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .section:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        }

        .section-title {
            font-size: 14pt;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1e40af;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'Playfair Display', serif;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            border-radius: 2px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 12px 0;
            vertical-align: top;
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.2s ease;
        }

        .data-table tr:hover td {
            background-color: #f8fafc;
        }

        .data-table td:first-child {
            width: 180px;
            font-weight: 600;
            color: #374151;
            padding-right: 20px;
        }

        .data-table td:last-child {
            color: #1f2937;
            font-weight: 500;
        }

        /* Statement */
        .statement-box {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            border: 2px solid #3b82f6;
            border-radius: 16px;
            padding: 25px;
            margin: 30px 0;
            position: relative;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
        }

        .statement-box::before {
            content: '📋';
            position: absolute;
            top: -15px;
            left: 25px;
            background: white;
            padding: 8px;
            border-radius: 50%;
            font-size: 20pt;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .statement-text {
            text-align: justify;
            font-size: 12pt;
            color: #1e40af;
            font-weight: 500;
            line-height: 1.7;
            margin-top: 10px;
        }

        .closing-text {
            text-align: center;
            margin-top: 30px;
            font-style: italic;
            color: #6b7280;
            font-size: 11pt;
            background: #f9fafb;
            padding: 15px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        /* Footer */
        .footer {
            margin-top: 50px;
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            border: 1px solid #e5e7eb;
        }

        .date-location {
            text-align: right;
            margin-bottom: 30px;
            font-size: 12pt;
            color: #374151;
            font-weight: 500;
        }

        .signature-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 40px;
        }

        .qr-section {
            text-align: center;
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .qr-code {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 10px;
        }

        .qr-label {
            font-size: 9pt;
            color: #6b7280;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .signature-section {
            text-align: center;
            min-width: 200px;
        }

        .signature-title {
            margin-bottom: 80px;
            font-size: 11pt;
            color: #374151;
            font-weight: 500;
        }

        .official-name {
            font-weight: 700;
            font-size: 12pt;
            color: #1f2937;
            text-decoration: underline;
            margin-bottom: 8px;
            font-family: 'Playfair Display', serif;
        }

        .official-id {
            font-size: 10pt;
            color: #6b7280;
            font-weight: 500;
        }

        /* Decorative Elements */
        .decorative-corner {
            position: absolute;
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            opacity: 0.05;
            border-radius: 50%;
        }

        .corner-top-left {
            top: -40px;
            left: -40px;
        }

        .corner-bottom-right {
            bottom: -40px;
            right: -40px;
        }

        /* Stamp */
        .stamp {
            position: absolute;
            right: 120px;
            bottom: 120px;
            width: 140px;
            height: 140px;
            border: 4px solid #dc2626;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(220, 38, 38, 0.1) 0%, rgba(220, 38, 38, 0.05) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 10pt;
            font-weight: 700;
            color: #dc2626;
            opacity: 0.6;
            transform: rotate(-15deg);
            line-height: 1.3;
            animation: stampPulse 4s ease-in-out infinite;
        }

        @keyframes stampPulse {
            0%, 100% { transform: rotate(-15deg) scale(1); }
            50% { transform: rotate(-15deg) scale(1.02); }
        }

        /* Status Badge */
        .status-badge {
            position: absolute;
            top: 30px;
            right: 30px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 9pt;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
            animation: badgeGlow 2s ease-in-out infinite;
        }

        @keyframes badgeGlow {
            0%, 100% { box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3); }
            50% { box-shadow: 0 6px 25px rgba(16, 185, 129, 0.5); }
        }

        /* Enhanced Data Table */
        .data-table td:first-child {
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            border-radius: 8px 0 0 8px;
            font-weight: 600;
            color: #334155;
            position: relative;
        }

        .data-table td:first-child::before {
            content: '▶';
            color: #3b82f6;
            margin-right: 8px;
            font-size: 8pt;
        }

        .data-table td:last-child {
            background: linear-gradient(135deg, #ffffff, #f8fafc);
            border-radius: 0 8px 8px 0;
            font-weight: 500;
        }

        .data-table tr {
            margin-bottom: 4px;
            display: block;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
            transition: all 0.3s ease;
        }

        .data-table tr:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .data-table td {
            display: table-cell;
            border-bottom: none;
            padding: 15px 20px;
        }

        /* Highlight Important Text */
        .highlight {
            background: linear-gradient(120deg, #fbbf24, #f59e0b);
            padding: 2px 8px;
            border-radius: 6px;
            color: white;
            font-weight: 700;
            text-shadow: 0 1px 2px rgba(0,0,0,0.2);
        }

        /* Print Styles */
        @media print {
            body {
                background: white;
                padding: 0;
            }

            .page {
                box-shadow: none;
                border-radius: 0;
                background: white;
                animation: none;
            }

            .header {
                background: #f8f9fa;
                box-shadow: none;
                animation: none;
            }

            .section {
                background: white;
                box-shadow: none;
                animation: none;
            }

            .stamp {
                opacity: 0.4;
                animation: none;
            }

            .status-badge {
                background: #10b981;
                animation: none;
                box-shadow: none;
            }

            * {
                animation: none !important;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            body { padding: 15px; }
            .page { padding: 25px; }
            .header { padding: 20px; }
            .section { padding: 20px; }
            .signature-wrapper { flex-direction: column; gap: 30px; text-align: center; }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="decorative-corner corner-top-left"></div>
        <div class="decorative-corner corner-bottom-right"></div>

        <div class="status-badge">DOKUMEN RESMI</div>

        <!-- Header -->
        <div class="header">
            <table class="header-table">
                <tr>
                    <td class="logo-cell">
                        <div class="logo">
                            <div class="logo-text">S</div>
                        </div>
                    </td>
                    <td class="text-cell">
                        <div class="government-name">Pemerintah Kabupaten Seluma</div>
                        <div class="village-name">Desa Ketapang Baru</div>
                        <div class="district-info">Kecamatan Semidang Alas Maras</div>
                        <div class="district-info">Kabupaten Seluma, Provinsi Bengkulu</div>
                        <div class="contact-info">📧 ketapangbaru@seluma.go.id | 📮 38874</div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Title -->
        <div class="document-title">
            <div class="title-main">Surat Keterangan Kehilangan</div>
            <div class="document-number">
                📄 Nomor: 63/170505/05/05/SKK/III/2025
            </div>
        </div>

        <!-- Intro -->
        <div class="intro-text">
            Yang bertanda tangan di bawah ini Kepala Desa Ketapang Baru Kecamatan Semidang Alas Maras Kabupaten Seluma, dengan ini menerangkan bahwa:
        </div>

        <!-- Data Pemohon -->
        <div class="section">
            <div class="section-title">👤 Data Pemohon</div>
            <table class="data-table">
                <tr><td>Nama Lengkap</td><td>HELESMI</td></tr>
                <tr><td>NIK</td><td>1701115607870003</td></tr>
                <tr><td>Tempat, Tanggal Lahir</td><td>Muara Dua, 16 Juli 1987</td></tr>
                <tr><td>Jenis Kelamin</td><td>Perempuan</td></tr>
                <tr><td>Agama</td><td>Islam</td></tr>
                <tr><td>Pekerjaan</td><td>Mengurus Rumah Tangga</td></tr>
                <tr><td>Alamat</td><td>Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma</td></tr>
            </table>
        </div>

        <!-- Detail Kehilangan -->
        <div class="section">
            <div class="section-title">📋 Detail Kehilangan</div>
            <table class="data-table">
                <tr><td>Dokumen/Barang</td><td><span class="highlight">KARTU KELUARGA</span></td></tr>
                <tr><td>Nomor Dokumen</td><td>1705052511190005</td></tr>
                <tr><td>Tempat Kehilangan</td><td>Desa Ketapang Baru</td></tr>
                <tr><td>Waktu Kehilangan</td><td>6 Bulan yang lalu</td></tr>
                <tr><td>Keperluan</td><td>Pengurusan administrasi kependudukan</td></tr>
            </table>
        </div>

        <!-- Statement -->
        <div class="statement-box">
            <div class="statement-text">
                Orang tersebut adalah benar-benar penduduk Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma dan memang telah kehilangan <span class="highlight">KARTU KELUARGA</span> sebagaimana dimaksud di atas. Surat keterangan ini berlaku hingga tanggal <strong>06 September 2025</strong>.
            </div>
        </div>

        <div class="closing-text">
            ✨ Demikian surat keterangan ini dibuat atas dasar yang sebenarnya dan dapat dipergunakan sebagaimana mestinya ✨
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="date-location">
                📍 Ketapang Baru, 06 Maret 2025
            </div>
            <div class="signature-wrapper">
                <!-- QR Code -->
                <div class="qr-section">
                    <img class="qr-code" src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=https://desa-ketapangbaru.go.id/verifikasi/63/170505/05/05/SKK/III/2025&bgcolor=f8fafc&color=1e40af" alt="QR Code">
                    <div class="qr-label">🔒 Verifikasi Digital</div>
                </div>

                <!-- Signature -->
                <div class="signature-section">
                    <div class="signature-title">An. Kepala Desa / Kasi Pemerintahan</div>
                    <div class="official-name">Desmerti Mustika Sari</div>
                    <div class="official-id">NIP. -</div>
                </div>
            </div>
        </div>

        <!-- Stamp -->
        <div class="stamp">
            STEMPEL<br>DESA<br>KETAPANG<br>BARU
        </div>
    </div>

    <script>
        // Add subtle interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll animations
            const sections = document.querySelectorAll('.section');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = 'slideUp 0.6s ease-out forwards';
                    }
                });
            }, { threshold: 0.1 });

            sections.forEach(section => {
                observer.observe(section);
            });

            // Add click effect to QR code
            const qrCode = document.querySelector('.qr-code');
            if (qrCode) {
                qrCode.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 150);
                });
            }
        });
    </script>
</body>
</html>
