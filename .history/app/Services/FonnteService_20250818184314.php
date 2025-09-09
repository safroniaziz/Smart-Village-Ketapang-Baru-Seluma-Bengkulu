<?php

namespace App\Services;

use App\Models\Pengaduan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FonnteService
{
    public function send(string $targetPhone, string $message, ?string $mediaPublicUrl = null): void
    {
        $token = env('FONNTE_TOKEN');
        if (empty($token) || empty($targetPhone)) {
            return;
        }

        $payload = [
            'target' => $targetPhone,
            'message' => $message,
            // 'countryCode' => '62', // optional per docs
        ];

        if (!empty($mediaPublicUrl)) {
            $payload['url'] = $mediaPublicUrl;
        }

        try {
            Http::withHeaders(['Authorization' => $token])
                ->asForm()
                ->post('https://api.fonnte.com/send', array_filter($payload));
        } catch (\Throwable $e) {
            Log::warning('Fonnte send failed: ' . $e->getMessage());
        }
    }

    public function sendPengaduanToKades(Pengaduan $pengaduan): void
    {
        $kadesPhone = env('KADES_WA'); // format 62xxxxxxxxxxx
        if (empty($kadesPhone)) {
            return;
        }

        $statusUrl = route('pengaduan') . '?no=' . $pengaduan->nomor_tracking . '#cek-status';

        $message = "Pengaduan Baru\n"
            . "Tracking: {$pengaduan->nomor_tracking}\n"
            . "Nama: {$pengaduan->nama_lengkap}\n"
            . "Jenis/Prioritas: {$pengaduan->jenis_pengaduan} / {$pengaduan->prioritas}\n"
            . "Judul: {$pengaduan->judul}\n\n"
            . "Cek status: {$statusUrl}";

        $mediaUrl = null;
        if (!empty($pengaduan->lampiran)) {
            $mediaUrl = Storage::disk('public')->url($pengaduan->lampiran);
        }

        $this->send($kadesPhone, $message, $mediaUrl);
    }
}


