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

        $displayName = $pengaduan->anonim ? '-' : ($pengaduan->nama_lengkap ?: '-');

        $message = "Pengaduan Baru\n"
            . "Tracking: {$pengaduan->nomor_tracking}\n"
            . "Nama: {$displayName}\n"
            . "Jenis/Prioritas: {$pengaduan->jenis_pengaduan} / {$pengaduan->prioritas}\n"
            . "Judul: {$pengaduan->judul}\n\n"
            . "Cek status: {$statusUrl}";

        $mediaUrl = null;
        if (!empty($pengaduan->lampiran)) {
            try {
                $candidate = Storage::disk('public')->url($pengaduan->lampiran);
                if ($this->isPublicUrl($candidate)) {
                    $mediaUrl = $candidate; // kirim sebagai media url
                } else {
                    // Jika URL lokal (dev) atau tidak publik, cantumkan sebagai teks saja
                    $message .= "\nLampiran: " . $candidate;
                }
            } catch (\Exception $e) {
                Log::warning('Failed to get storage URL for pengaduan attachment: ' . $e->getMessage());
                $message .= "\nLampiran: " . $pengaduan->lampiran;
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

    /**
     * Send follow-up notification to user about their complaint
     */
    public function sendPengaduanFollowupToUser(Pengaduan $pengaduan, string $status, string $catatan = null): void
    {
        if (empty($pengaduan->no_wa)) {
            Log::warning('No WhatsApp number for pengaduan ' . $pengaduan->id);
            return;
        }

        $statusUrl = route('pengaduan') . '?no=' . $pengaduan->nomor_tracking . '#cek-status';
        
        $message = "🔔 *Update Pengaduan Anda*\n\n"
            . "📋 *Nomor Tracking:* {$pengaduan->nomor_tracking}\n"
            . "📝 *Judul:* {$pengaduan->judul}\n"
            . "📊 *Status Terbaru:* {$status}\n"
            . "📅 *Tanggal Update:* " . now()->format('d F Y H:i') . "\n\n";

        if (!empty($catatan)) {
            $message .= "💬 *Catatan Petugas:*\n{$catatan}\n\n";
        }

        $message .= "🔍 *Cek Status Lengkap:*\n{$statusUrl}\n\n"
            . "_Terima kasih telah melaporkan pengaduan Anda._";

        $res = $this->sendWithResponse($pengaduan->no_wa, $message);
        Log::info('Pengaduan followup sent to user', [
            'pengaduan_id' => $pengaduan->id,
            'phone' => $pengaduan->no_wa,
            'status' => $status,
            'ok' => $res['ok'] ?? null,
            'response' => $res['response'] ?? null
        ]);
    }

    /**
     * Send a PDF/document file to a phone number via Fonnte (multipart upload)
     * storagePath refers to the path on the `public` disk (e.g. "surat/abc.pdf")
     * Returns raw Fonnte response for debugging
     *
     * @return array{ok:bool,response:mixed}
     */
    public function sendPdfToPhone(string $targetPhone, string $storagePathOnPublicDisk, string $message = ''): array
    {
        $token = config('services.fonnte.token');
        if (empty($token) || empty($targetPhone) || empty($storagePathOnPublicDisk)) {
            return ['ok' => false, 'response' => 'Missing token/target/path'];
        }

        try {
            $fullPath = Storage::disk('public')->path($storagePathOnPublicDisk);
            if (!is_file($fullPath)) {
                return ['ok' => false, 'response' => 'File not found: '.$fullPath];
            }

            $resp = Http::withHeaders(['Authorization' => $token])
                ->attach('file', fopen($fullPath, 'r'), basename($fullPath))
                ->post('https://api.fonnte.com/send', [
                    'target' => $this->normalizePhone($targetPhone),
                    'message' => $message,
                ]);

            $body = $resp->body();
            $json = json_decode($body, true);
            return ['ok' => $resp->ok(), 'response' => $json ?? $body];
        } catch (\Throwable $e) {
            Log::warning('Fonnte sendPdfToPhone failed: ' . $e->getMessage());
            return ['ok' => false, 'response' => $e->getMessage()];
        }
    }
}


