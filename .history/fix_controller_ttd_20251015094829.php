<?php

/**
 * Script untuk memperbaiki controller agar mengirim ttd_image_path yang benar
 */

$controllerFile = '/Users/jurusankoding/docker/smart-village/app/Http/Controllers/SuratController.php';

if (!file_exists($controllerFile)) {
    echo "Controller file tidak ditemukan!\n";
    exit;
}

$content = file_get_contents($controllerFile);
$originalContent = $content;

// Pattern untuk mencari dan mengganti TTD data yang tidak lengkap
$patterns = [
    // Pattern 1: TTD data yang hanya mengirim jenis_ttd tanpa ttd_image_path
    [
        'search' => '/\$ttdData = \[\s*\'jenis_ttd\' => \'gambar\',\s*\];/',
        'replace' => '$ttdData = [
                \'jenis_ttd\' => \'gambar\',
                \'ttd_image_path\' => \'assets/images/ttd.png\'
            ];'
    ],
    
    // Pattern 2: TTD data yang menggunakan public_path
    [
        'search' => '/\'ttd_image_path\' => public_path\(\'assets\/images\/ttd\.png\'\)/',
        'replace' => '\'ttd_image_path\' => \'assets/images/ttd.png\''
    ]
];

echo "Memperbaiki controller TTD data...\n";

foreach ($patterns as $pattern) {
    $content = preg_replace($pattern['search'], $pattern['replace'], $content);
}

if ($content !== $originalContent) {
    file_put_contents($controllerFile, $content);
    echo "✓ Controller berhasil diperbaiki!\n";
} else {
    echo "- Controller sudah benar\n";
}

echo "Perbaikan controller selesai!\n";
