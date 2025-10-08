<?php

namespace App\Services;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FotoService
{
    /**
     * Upload dan resize foto ke ukuran pas foto 4x6 cm (413x590 pixels)
     * Ratio 4:6 = 1:1.43 (untuk pas foto standar)
     */
    public function uploadFotoPasfoto(UploadedFile $file, ?string $oldFilePath = null): string
    {
        // Hapus foto lama jika ada
        if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
            Storage::disk('public')->delete($oldFilePath);
        }

        // Generate nama file unik
        $fileName = 'foto-' . Str::random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = 'foto-warga/' . $fileName;

        // Buat direktori jika belum ada
        if (!Storage::disk('public')->exists('foto-warga')) {
            Storage::disk('public')->makeDirectory('foto-warga');
        }

        // Load dan resize gambar ke ukuran pas foto 4x6 cm (413x590 px)
        $image = Image::read($file);
        
        // Resize dengan mempertahankan aspek ratio dan crop jika perlu
        $image->cover(413, 590); // Ukuran standar pas foto 4x6 cm dalam pixel
        
        // Simpan dengan kualitas tinggi
        $image->save(Storage::disk('public')->path($filePath), quality: 90);

        return $filePath;
    }

    /**
     * Hapus foto dari storage
     */
    public function deleteFoto(?string $filePath): bool
    {
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->delete($filePath);
        }
        return false;
    }

    /**
     * Get URL foto atau default placeholder
     */
    public function getFotoUrl(?string $filePath): string
    {
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->url($filePath);
        }
        
        // Return placeholder image dari internet
        return 'https://via.placeholder.com/413x590/e3f2fd/1976d2?text=Foto+4x6';
    }

    /**
     * Validasi ukuran file dan format
     */
    public static function getValidationRules(): array
    {
        return [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=300,min_height=400'
        ];
    }

    /**
     * Get pesan validasi
     */
    public static function getValidationMessages(): array
    {
        return [
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format foto harus JPEG, PNG, atau JPG.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
            'foto.dimensions' => 'Foto minimal berukuran 300x400 pixel untuk hasil terbaik.',
        ];
    }
}