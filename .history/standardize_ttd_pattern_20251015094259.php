<?php

/**
 * Script untuk standardisasi logika TTD di semua file PDF
 * 
 * Pola standar yang akan digunakan:
 * @if($jenis_ttd == 'gambar')
 * @elseif($jenis_ttd == 'qrcode')
 * @else
 * 
 * Dan untuk QR code verifikasi:
 * @if(isset($qr_base64) && $qr_base64)
 */

$pdfFiles = [
    'surat-keterangan-domisili.blade.php',
    'surat-keterangan-usaha.blade.php',
    'surat-pindah.blade.php',
    'surat-rekomendasi.blade.php',
    'surat-hibah.blade.php',
    'surat-keterangan-miskin.blade.php',
    'surat-kehilangan.blade.php',
    'surat-pengantar-akta-kelahiran.blade.php',
    'surat-keterangan-berkelakuan-baik.blade.php',
    'surat-keterangan-belum-menikah.blade.php',
    'surat-keterangan-menikah.blade.php',
    'surat-keterangan-kematian.blade.php',
    'surat-izin-keramaian.blade.php',
    'surat-keterangan-tidak-mampu.blade.php',
    'surat-keterangan-penghasilan-ortu.blade.php'
];

$pdfPath = '/Users/jurusankoding/docker/smart-village/resources/views/pdf/';

echo "Memulai standardisasi logika TTD di semua file PDF...\n";

foreach ($pdfFiles as $file) {
    $filePath = $pdfPath . $file;
    
    if (!file_exists($filePath)) {
        echo "File tidak ditemukan: $file\n";
        continue;
    }
    
    $content = file_get_contents($filePath);
    $originalContent = $content;
    
    // Pattern 1: Ganti isset($jenis_ttd) && $jenis_ttd === 'gambar' dengan $jenis_ttd == 'gambar'
    $content = preg_replace(
        '/@if\(isset\(\$jenis_ttd\) && \$jenis_ttd === \'gambar\'\)/',
        '@if($jenis_ttd == \'gambar\')',
        $content
    );
    
    // Pattern 2: Ganti isset($jenis_ttd) && $jenis_ttd === 'qrcode' && isset($qr_ttd_base64) dengan $jenis_ttd == 'qrcode'
    $content = preg_replace(
        '/@if\(isset\(\$jenis_ttd\) && \$jenis_ttd === \'qrcode\' && isset\(\$qr_ttd_base64\)\)/',
        '@if($jenis_ttd == \'qrcode\')',
        $content
    );
    
    $content = preg_replace(
        '/@elseif\(isset\(\$jenis_ttd\) && \$jenis_ttd === \'qrcode\' && isset\(\$qr_ttd_base64\)\)/',
        '@elseif($jenis_ttd == \'qrcode\')',
        $content
    );
    
    // Pattern 3: Ganti isset($jenis_ttd) && $jenis_ttd === 'gambar' dengan $jenis_ttd == 'gambar'
    $content = preg_replace(
        '/@elseif\(isset\(\$jenis_ttd\) && \$jenis_ttd === \'gambar\'\)/',
        '@elseif($jenis_ttd == \'gambar\')',
        $content
    );
    
    // Pattern 4: Pastikan QR code verifikasi menggunakan kondisi yang benar
    $content = preg_replace(
        '/@if\(isset\(\$qr_base64\)\)(?!.*&& \$qr_base64)/',
        '@if(isset($qr_base64) && $qr_base64)',
        $content
    );
    
    // Pattern 5: Standardisasi komentar TTD
    $content = str_replace(
        '<!-- TTD berdasarkan pilihan admin -->',
        '<!-- TTD berdasarkan pilihan admin -->',
        $content
    );
    
    // Pattern 6: Pastikan gambar TTD menggunakan $ttd_image_path
    $content = preg_replace(
        '/src="\{\{ public_path\(\'assets\/images\/ttd\.png\'\) \}\}"/',
        'src="{{ $ttd_image_path ?? public_path(\'assets/images/ttd.png\') }}"',
        $content
    );
    
    // Pattern 7: Standardisasi alt text
    $content = str_replace('alt="TTD"', 'alt="TTD Gambar"', $content);
    $content = str_replace('alt="QR TTD"', 'alt="QR Code TTD"', $content);
    
    // Pattern 8: Tambahkan komentar yang konsisten
    $content = preg_replace(
        '/<!-- QR Code TTD -->/',
        '<!-- QR Code TTD - QR code yang berisi gambar TTD -->',
        $content
    );
    
    $content = preg_replace(
        '/<!-- Gambar TTD -->/',
        '<!-- Gambar TTD -->',
        $content
    );
    
    if ($content !== $originalContent) {
        file_put_contents($filePath, $content);
        echo "✓ Distandardisasi: $file\n";
    } else {
        echo "- Sudah standar: $file\n";
    }
}

echo "\nStandardisasi selesai!\n";
echo "Total file yang diproses: " . count($pdfFiles) . "\n";
