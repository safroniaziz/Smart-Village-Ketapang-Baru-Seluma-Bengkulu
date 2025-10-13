<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class QrCodeService
{
    /**
     * Generate QR Code from TTD signature image
     *
     * @param string $data Data to encode in QR code (e.g., tracking number, verification URL)
     * @param int $size Size of the QR code (default: 200px)
     * @return string Base64 encoded image data
     */
    public function generateQrCodeFromTtd($data, $size = 200)
    {
        try {
            // Path ke gambar TTD
            $ttdPath = public_path('assets/images/ttd.png');

            // Check if TTD image exists
            if (!file_exists($ttdPath)) {
                throw new \Exception('TTD signature image not found at: ' . $ttdPath);
            }

            // Generate QR Code
            $qrCode = QrCode::format('png')
                ->size($size)
                ->margin(2)
                ->errorCorrection('M')
                ->generate($data);

            // Create Image Manager
            $manager = new ImageManager(new Driver());

            // Load TTD image using Intervention Image v3
            $ttdImage = $manager->read($ttdPath);

            // Resize TTD image to appropriate size (keep aspect ratio)
            $ttdImage->scale(height: $size * 0.6);

            // Create QR code image from generated data
            $qrImage = $manager->read($qrCode);

            // Create a canvas that can fit both images
            $canvasWidth = max($qrImage->width(), $ttdImage->width()) + 40; // padding
            $canvasHeight = $qrImage->height() + $ttdImage->height() + 60; // padding between images

            $canvas = $manager->create($canvasWidth, $canvasHeight)->fill('ffffff');

            // Calculate positions to center the images
            $qrX = (int)(($canvasWidth - $qrImage->width()) / 2);
            $qrY = 20;

            $ttdX = (int)(($canvasWidth - $ttdImage->width()) / 2);
            $ttdY = $qrY + $qrImage->height() + 20;

            // Insert QR code at the top
            $canvas->place($qrImage, 'top-left', $qrX, $qrY);

            // Insert TTD signature below QR code
            $canvas->place($ttdImage, 'top-left', $ttdX, $ttdY);

            // Convert to base64
            $base64 = 'data:image/png;base64,' . base64_encode($canvas->toPng());

            return $base64;

        } catch (\Exception $e) {
            // Log error and return null or throw exception
            Log::error('QR Code generation failed: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Generate simple QR Code without TTD signature
     *
     * @param string $data Data to encode in QR code
     * @param int $size Size of the QR code
     * @return string Base64 encoded QR code
     */
    public function generateSimpleQrCode($data, $size = 200)
    {
        try {
            $qrCode = QrCode::format('png')
                ->size($size)
                ->margin(2)
                ->errorCorrection('M')
                ->generate($data);

            return 'data:image/png;base64,' . base64_encode($qrCode);

        } catch (\Exception $e) {
            Log::error('Simple QR Code generation failed: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Generate verification URL for QR code
     *
     * @param string $trackingNumber Tracking number of the surat
     * @return string Verification URL
     */
    public function generateVerificationUrl($trackingNumber)
    {
        return url('/surat/verify/' . $trackingNumber);
    }

    /**
     * Save QR code to storage
     *
     * @param string $base64Data Base64 encoded image data
     * @param string $filename Filename to save
     * @return string Storage path
     */
    public function saveQrCodeToStorage($base64Data, $filename)
    {
        try {
            // Remove data URL prefix if present
            $imageData = str_replace('data:image/png;base64,', '', $base64Data);
            $imageData = base64_decode($imageData);

            $path = 'qr-codes/' . $filename . '.png';
            Storage::disk('public')->put($path, $imageData);

            return $path;

        } catch (\Exception $e) {
            Log::error('QR Code save failed: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Generate QR code for surat verification
     * This method combines tracking number with verification URL
     *
     * @param \App\Models\PengajuanSurat $pengajuanSurat
     * @return string Base64 encoded QR code with TTD
     */
    public function generateSuratQrCode($pengajuanSurat)
    {
        $verificationData = [
            'tracking_number' => $pengajuanSurat->tracking_number,
            'nama' => $pengajuanSurat->nama_lengkap,
            'jenis_surat' => $pengajuanSurat->jenis_surat,
            'tanggal' => $pengajuanSurat->created_at->format('Y-m-d'),
            'verify_url' => $this->generateVerificationUrl($pengajuanSurat->tracking_number)
        ];

        $qrData = json_encode($verificationData);

        return $this->generateQrCodeFromTtd($qrData);
    }
}
