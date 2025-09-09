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
            $candidate = Storage::disk('public')->url($pengaduan->lampiran);
            if ($this->isPublicUrl($candidate)) {
                $mediaUrl = $candidate; // kirim sebagai media url
            } else {
                // Jika URL lokal (dev) atau tidak publik, cantumkan sebagai teks saja
                $message .= "\nLampiran: " . $candidate;
            }
        }

        $res = $this->sendWithResponse($kadesPhone, $message, $mediaUrl);
        Log::info('Fonnte sendPengaduanToKades response', ['ok' => $res['ok'] ?? null, 'response' => $res['response'] ?? null]);
    }

    private function isPublicUrl(string $url): bool
    {
        $parts = parse_url($url);
        if (!$parts || empty($parts['host']) || empty($parts['scheme'])) {
            return false;
        }
        $host = $parts['host'];
        if (in_array($host, ['localhost', '127.0.0.1'])) {
            return false;
        }
        // Optionally ensure https
        // if ($parts['scheme'] !== 'https') return false;
        return true;
    }
}


