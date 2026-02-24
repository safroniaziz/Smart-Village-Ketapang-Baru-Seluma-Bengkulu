<?php

// Daftar template yang perlu diupdate
$templates = [
    'surat-keterangan-tidak-mampu.blade.php',
    'surat-keterangan-belum-menikah.blade.php',
    'surat-keterangan-usaha.blade.php',
    'surat-keterangan-miskin.blade.php',
    'surat-keterangan-berkelakuan-baik.blade.php',
    'surat-kehilangan.blade.php',
    'surat-keterangan-menikah.blade.php',
    'surat-keterangan-kematian.blade.php',
    'surat-pengantar-akta-kelahiran.blade.php',
    'surat-rekomendasi.blade.php',
    'surat-hibah.blade.php',
    'surat-izin-keramaian.blade.php'
];

$basePath = '/Users/jurusankoding/docker/smart-village/resources/views/pdf/';

// Pattern lama yang akan diganti
$oldPattern = '<!-- QR Code Verifikasi di atas nama kepala desa -->
                @if(isset($qr_base64))
                <div style="margin-bottom: 15px;">
                    <img class="qr-code" src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code">
                </div>
                @endif

                <div style="font-weight: 700; text-decoration: underline; font-size: 10pt;">{{ $kepala_desa_nama ?? \'Zultan Alhara\' }}</div>
                <div style="font-size: 9pt;">{{ $nip ?? \'NIP. -\' }}</div>';

// Pattern baru dengan logika TTD
$newPattern = '<!-- TTD berdasarkan pilihan admin -->
                @if(isset($jenis_ttd) && $jenis_ttd === \'qrcode\' && isset($qr_ttd_base64))
                    <!-- QR Code TTD -->
                    <div style="margin-bottom: 15px;">
                        <img src="data:image/png;base64,{{ $qr_ttd_base64 }}" style="width: 120px; height: auto;" alt="QR TTD">
                    </div>
                @elseif(isset($jenis_ttd) && $jenis_ttd === \'gambar\' && isset($ttd_image_path) && file_exists($ttd_image_path))
                    <!-- Gambar TTD -->
                    <div style="margin-bottom: 15px;">
                        <img src="{{ $ttd_image_path }}" style="width: 150px; height: auto;" alt="TTD">
                    </div>
                @else
                    <!-- Manual TTD - Ruang kosong -->
                    <div style="height: 80px; margin-bottom: 15px;">
                        <!-- Ruang kosong untuk TTD manual -->
                    </div>
                @endif

                <!-- QR Code Verifikasi di bawah TTD -->
                @if(isset($qr_base64))
                <div style="margin-bottom: 15px;">
                    <img class="qr-code" src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code">
                </div>
                @endif

                <div style="font-weight: 700; text-decoration: underline; font-size: 10pt;">{{ $kepala_desa_nama ?? \'Zultan Alhara\' }}</div>
                <div style="font-size: 9pt;">{{ $nip ?? \'NIP. -\' }}</div>';

echo "TTD Logic Update Script Created\n";
echo "Templates to update: " . count($templates) . "\n";

foreach ($templates as $template) {
    echo "- $template\n";
}
