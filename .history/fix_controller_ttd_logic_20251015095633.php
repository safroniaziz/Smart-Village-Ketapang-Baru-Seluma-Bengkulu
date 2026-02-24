<?php

/**
 * Script untuk memperbaiki logika TTD di controller
 */

$controllerFile = '/Users/jurusankoding/docker/smart-village/app/Http/Controllers/SuratController.php';

if (!file_exists($controllerFile)) {
    echo "Controller file tidak ditemukan!\n";
    exit;
}

$content = file_get_contents($controllerFile);
$originalContent = $content;

// Pattern untuk memperbaiki logika TTD di controller
$patterns = [
    // Pattern 1: Ganti else dengan elseif untuk jenis_ttd === 'gambar'
    [
        'search' => '/} else {\s*\/\/ Use regular TTD\s*\$ttdData = \[\s*\'jenis_ttd\' => \'gambar\',\s*\'ttd_image_path\' => \'assets\/images\/ttd\.png\'\s*\];\s*}/',
        'replace' => '} elseif ($pengajuan->jenis_ttd === \'gambar\') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                \'jenis_ttd\' => \'gambar\',
                \'ttd_image_path\' => \'assets/images/ttd.png\'
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                \'jenis_ttd\' => \'manual\'
            ];
        }'
    ],

    // Pattern 2: Ganti else dengan elseif untuk jenis_ttd === 'gambar' (versi lain)
    [
        'search' => '/} else {\s*\/\/ Use regular TTD\s*\$ttdData = \[\s*\'jenis_ttd\' => \'gambar\',\s*\'ttd_image_path\' => \'assets\/images\/ttd\.png\'\s*\];\s*}\s*\/\/ Format jenis kelamin/',
        'replace' => '} elseif ($pengajuan->jenis_ttd === \'gambar\') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                \'jenis_ttd\' => \'gambar\',
                \'ttd_image_path\' => \'assets/images/ttd.png\'
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                \'jenis_ttd\' => \'manual\'
            ];
        }

        // Format jenis kelamin'
    ]
];

echo "Memperbaiki logika TTD di controller...\n";

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
