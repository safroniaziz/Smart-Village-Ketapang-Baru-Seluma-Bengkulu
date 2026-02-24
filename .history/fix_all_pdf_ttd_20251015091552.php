<?php

/**
 * Script untuk memperbaiki logika TTD di semua file PDF template
 * 
 * Perbaikan yang dilakukan:
 * 1. Menggunakan $ttd_image_path untuk gambar TTD
 * 2. Menambahkan kondisi $qr_base64 && $qr_base64 untuk QR code verifikasi
 * 3. Membuat QR code verifikasi lebih kecil (60x60px)
 * 4. Menambahkan komentar yang lebih jelas
 */

$pdfFiles = [
    'surat-keterangan-domisili.blade.php',
    'surat-pindah.blade.php',
    'surat-rekomendasi.blade.php',
    'surat-pengantar-nikah.blade.php',
    'surat-hibah.blade.php',
    'surat-keterangan-miskin.blade.php',
    'surat-kehilangan.blade.php',
    'surat-pengantar-akta-kelahiran.blade.php',
    'surat-keterangan-berkelakuan-baik.blade.php',
    'surat-undangan.blade.php',
    'surat-keterangan-belum-menikah.blade.php',
    'surat-keterangan-menikah.blade.php',
    'surat-pengantar-kk.blade.php',
    'surat-keterangan-kematian.blade.php',
    'surat-izin-keramaian.blade.php',
    'surat-keterangan-tidak-mampu.blade.php',
    'surat-keterangan-penghasilan-ortu.blade.php',
    'surat-perjanjian-perdamaian.blade.php'
];

$pdfPath = '/Users/jurusankoding/docker/smart-village/resources/views/pdf/';

// Pattern untuk mencari dan mengganti TTD logic
$patterns = [
    // Pattern 1: TTD dengan isset($jenis_ttd) && $jenis_ttd === 'gambar'
    [
        'search' => '/@if\(isset\(\$jenis_ttd\) && \$jenis_ttd === \'gambar\'\)\s*<!-- Gambar TTD -->\s*<div style="margin-bottom: 15px;">\s*<img src="\{\{ public_path\(\'assets\/images\/ttd\.png\'\) \}\}" style="width: 150px; height: auto;" alt="TTD">\s*<\/div>/',
        'replace' => '@if($jenis_ttd == \'gambar\')\n                    <!-- Gambar TTD -->\n                    <div style="margin-bottom: 15px;">\n                        <img src="{{ $ttd_image_path ?? public_path(\'assets/images/ttd.png\') }}" style="width: 150px; height: auto;" alt="TTD Gambar">\n                    </div>'
    ],
    
    // Pattern 2: QR Code TTD dengan isset
    [
        'search' => '/@elseif\(isset\(\$jenis_ttd\) && \$jenis_ttd === \'qrcode\' && isset\(\$qr_ttd_base64\)\)\s*<!-- QR Code TTD -->\s*<div style="margin-bottom: 15px;">\s*<img src="data:image\/png;base64,\{\{ \$qr_ttd_base64 \}\}" style="width: 120px; height: auto;" alt="QR TTD">\s*<\/div>/',
        'replace' => '@elseif($jenis_ttd == \'qrcode\')\n                    <!-- QR Code TTD - QR code yang berisi gambar TTD -->\n                    <div style="margin-bottom: 15px;">\n                        <img src="data:image/png;base64,{{ $qr_ttd_base64 }}" style="width: 120px; height: auto;" alt="QR Code TTD">\n                    </div>'
    ],
    
    // Pattern 3: QR Code verifikasi dengan isset($qr_base64)
    [
        'search' => '/@if\(isset\(\$qr_base64\)\)\s*<div style="margin-bottom: 15px;">\s*<img class="qr-code" src="data:image\/png;base64,\{\{ \$qr_base64 \}\}" alt="QR Code">\s*<\/div>\s*@endif/',
        'replace' => '@if(isset($qr_base64) && $qr_base64)\n                <div style="margin-bottom: 15px;">\n                    <img class="qr-code" src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code Verifikasi Surat" style="width: 60px; height: 60px;">\n                </div>\n                @endif'
    ]
];

echo "Memulai perbaikan TTD di semua file PDF...\n";

foreach ($pdfFiles as $file) {
    $filePath = $pdfPath . $file;
    
    if (!file_exists($filePath)) {
        echo "File tidak ditemukan: $file\n";
        continue;
    }
    
    $content = file_get_contents($filePath);
    $originalContent = $content;
    
    // Apply patterns
    foreach ($patterns as $pattern) {
        $content = preg_replace($pattern['search'], $pattern['replace'], $content);
    }
    
    // Additional specific fixes
    $content = str_replace(
        '<!-- QR Code Verifikasi di bawah TTD -->',
        '<!-- QR Code Verifikasi Surat (untuk tracking, opsional) -->',
        $content
    );
    
    $content = str_replace(
        '<!-- QR Code Verifikasi di atas nama kepala desa -->',
        '<!-- QR Code Verifikasi Surat (untuk tracking, opsional) -->',
        $content
    );
    
    if ($content !== $originalContent) {
        file_put_contents($filePath, $content);
        echo "✓ Diperbaiki: $file\n";
    } else {
        echo "- Tidak ada perubahan: $file\n";
    }
}

echo "\nPerbaikan selesai!\n";
echo "Total file yang diproses: " . count($pdfFiles) . "\n";
