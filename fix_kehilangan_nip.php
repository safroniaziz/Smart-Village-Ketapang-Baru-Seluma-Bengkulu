<?php

$file = 'app/Http/Controllers/SuratController.php';
$content = file_get_contents($file);

// Pattern untuk fungsi previewPDFKehilangan dan approveSuratKehilangan
$pattern = "/(\\/\\/ Generate nomor surat\n        \\\$nomorSurat = '470\\/' \\. date\\('m'\\) \\. '\\/' \\. date\\('Y'\\) \\. '\\/' \\. \\\$pengajuanId;\n\n        \\/\\/ Prepare data for PDF\n        \\\$pdfData = \\[\n            'nomor_surat' => \\\$nomorSurat,\n            'tanggal_surat' => now\\(\\)->format\\('d F Y'\\),\n            'nama_pemohon')/";

$replacement = "$1\n        ] + \$this->getKepalaDesa() + [\n            'nama_pemohon'";

$content = preg_replace($pattern, $replacement, $content);

// Save
file_put_contents($file, $content);

echo "✅ Fixed all kehilangan functions\n";
