#!/bin/bash

# Daftar file template yang perlu diupdate
templates=(
    "/Users/jurusankoding/docker/smart-village/resources/views/pdf/surat-keterangan-miskin.blade.php"
    "/Users/jurusankoding/docker/smart-village/resources/views/pdf/surat-keterangan-berkelakuan-baik.blade.php"
    "/Users/jurusankoding/docker/smart-village/resources/views/pdf/surat-kehilangan.blade.php"
    "/Users/jurusankoding/docker/smart-village/resources/views/pdf/surat-keterangan-menikah.blade.php"
)

# Template signature yang baru
new_signature='    <!-- Footer -->
    <div style="margin-top: 50px;">
        <div style="text-align: right; margin-bottom: 10px; font-size: 10pt;">
            {{ $tempat_surat ?? '\''Ketapang Baru'\'' }}, {{ $tanggal_surat ?? '\''07 Mei 2025'\'' }}
        </div>
        <div style="text-align: center; margin-top: 30px;">
            <!-- Signature area di tengah -->
            <div style="display: inline-block; text-align: center;">
                <div style="font-weight: 600; margin-bottom: 10px; font-size: 10pt;">Kepala Desa</div>

                <!-- QR Code Verifikasi di atas nama kepala desa -->
                @if(isset($qr_base64))
                <div style="margin-bottom: 15px;">
                    <img class="qr-code" src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code">
                </div>
                @endif

                <div style="font-weight: 700; text-decoration: underline; font-size: 10pt;">{{ $kepala_desa_nama ?? '\''Zultan Alhara'\'' }}</div>
                <div style="font-size: 9pt;">{{ $nip ?? '\''NIP. -'\'' }}</div>
            </div>
        </div>
    </div>'

echo "Script update template signature created"
