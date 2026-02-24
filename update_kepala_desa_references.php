<?php

// Script untuk mengganti semua hardcode kepala_desa_nama dengan helper method

$file = 'app/Http/Controllers/SuratController.php';
$content = file_get_contents($file);

// Pattern 1: Replace standalone kepala_desa_nama
$patterns = [
    // Pattern untuk: 'kepala_desa_nama' => 'Zultan Alhara',
    // Menjadi: ] + $this->getKepalaDesa() + [
    [
        'old' => "            'tanggal_surat' => now()->format('d F Y'),\n            'kepala_desa_nama' => 'Zultan Alhara',\n",
        'new' => "            'tanggal_surat' => now()->format('d F Y'),\n        ] + \$this->getKepalaDesa() + [\n"
    ],
    [
        'old' => "            'wanita_alamat' => \$wanitaAlamat,\n\n            'kepala_desa_nama' => 'Zultan Alhara',\n",
        'new' => "            'wanita_alamat' => \$wanitaAlamat,\n        ] + \$this->getKepalaDesa() + [\n"
    ],
    [
        'old' => "            'saksi_3' => \$data['saksi_3'] ?? '',\n\n            'kepala_desa_nama' => 'Zultan Alhara'\n",
        'new' => "            'saksi_3' => \$data['saksi_3'] ?? '',\n        ] + \$this->getKepalaDesa() + [\n"
    ],
    [
        'old' => "            'saksi_4' => \$data['saksi_4'] ?? '',\n\n            'kepala_desa_nama' => 'Zultan Alhara'\n",
        'new' => "            'saksi_4' => \$data['saksi_4'] ?? '',\n        ] + \$this->getKepalaDesa() + [\n"
    ],
    [
        'old' => "            'nip_camat' => \$data['nip_camat'] ?? '',\n            'kepala_desa_nama' => 'Zultan Alhara'\n",
        'new' => "            'nip_camat' => \$data['nip_camat'] ?? '',\n        ] + \$this->getKepalaDesa() + [\n"
    ],
    [
        'old' => "            'penghasilan_bulanan' => \$data['penghasilan_bulanan'] ?? null,\n\n            'kepala_desa_nama' => 'Zultan Alhara'\n",
        'new' => "            'penghasilan_bulanan' => \$data['penghasilan_bulanan'] ?? null,\n        ] + \$this->getKepalaDesa() + [\n"
    ],
];

foreach ($patterns as $pattern) {
    $content = str_replace($pattern['old'], $pattern['new'], $content);
}

// Save the file
file_put_contents($file, $content);

echo "✅ Updated all kepala_desa_nama references in SuratController.php\n";
echo "✅ Now all PDF generation functions will use data from database\n";
