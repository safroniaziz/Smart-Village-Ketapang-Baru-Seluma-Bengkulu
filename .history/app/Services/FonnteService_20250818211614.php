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
        $this->sendWithResponse($targetPhone, $message, $mediaPublicUrl);
    }

    /**
     * Send and return Fonnte raw response for debugging
     * @return array{ok:bool,response:mixed}
     */
    public function sendWithResponse(string $targetPhone, string $message, ?string $mediaPublicUrl = null): array
    {
        $token = config('services.fonnte.token');
        if (empty($token) || empty($targetPhone)) {
            return ['ok' => false, 'response' => 'Missing token or target phone'];
        }

        $payload = [
            'target' => $this->normalizePhone($targetPhone),
            'message' => $message,
            // 'countryCode' => '62', // optional per docs
        ];

        if (!empty($mediaPublicUrl)) {
            $payload['url'] = $mediaPublicUrl;
        }

        try {
            $resp = Http::withHeaders(['Authorization' => $token])
                ->asForm()
                ->post('https://api.fonnte.com/send', array_filter($payload));

            $body = $resp->body();
            $json = json_decode($body, true);
            return ['ok' => $resp->ok(), 'response' => $json ?? $body];
        } catch (\Throwable $e) {
            Log::warning('Fonnte send failed: ' . $e->getMessage());
            return ['ok' => false, 'response' => $e->getMessage()];
        }
    }

    private function normalizePhone(string $raw): string
    {
        $digits = preg_replace('/\D/', '', $raw) ?? '';
        if (str_starts_with($digits, '0')) {
            $digits = '62' . substr($digits, 1);
        }
        return $digits;
    }

    public function sendPengaduanToKades(Pengaduan $pengaduan): void
    {
        $kadesPhone = config('services.kades_wa'); // format 62xxxxxxxxxxx
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


