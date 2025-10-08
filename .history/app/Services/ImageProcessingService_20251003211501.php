<?php

namespace App\Services;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\JpegEncoder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ImageProcessingService
{
    protected $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }

    /**
     * Process gallery image - crop to landscape aspect ratio
     *
     * @param string $imageUrl
     * @param int $width
     * @param int $height
     * @return string|null
     */
    public function processGalleryImage($imageUrl, $width = 800, $height = 450)
    {
        try {
            // Create filename for processed image
            $filename = 'gallery/processed/' . Str::random(40) . '.jpg';

            // Read image from URL or local path
            $image = $this->manager->read($imageUrl);

            // Get original dimensions
            $originalWidth = $image->width();
            $originalHeight = $image->height();

            // Calculate scaling to fit the target dimensions while maintaining aspect ratio
            $scaleX = $width / $originalWidth;
            $scaleY = $height / $originalHeight;
            $scale = max($scaleX, $scaleY); // Use the larger scale to ensure full coverage

            // Scale the image
            $newWidth = (int)($originalWidth * $scale);
            $newHeight = (int)($originalHeight * $scale);
            $image = $image->resize($newWidth, $newHeight);

            // Crop to exact dimensions from center
            $image = $image->crop($width, $height, position: 'center');

            // Apply optimization and encode
            $encodedImage = $image->encode(new JpegEncoder(85)); // 85% quality

            // Store the processed image
            Storage::disk('public')->put($filename, $encodedImage);

            return asset('storage/' . $filename);

        } catch (\Exception $e) {
            Log::error('Image processing failed: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Process multiple gallery images
     *
     * @param array $galleryData
     * @return array
     */
    public function processGalleryImages($galleryData)
    {
        $processedGallery = [];

        foreach ($galleryData as $photo) {
            $processedUrl = $this->processGalleryImage($photo['url']);

            $processedGallery[] = [
                'url' => $processedUrl ?: $photo['url'], // Fallback to original if processing fails
                'original_url' => $photo['url'],
                'judul' => $photo['judul'] ?? null,
                'keterangan' => $photo['keterangan'] ?? null,
            ];
        }

        return $processedGallery;
    }

    /**
     * Generate thumbnail version
     *
     * @param string $imageUrl
     * @param int $width
     * @param int $height
     * @return string|null
     */
    public function generateThumbnail($imageUrl, $width = 300, $height = 200)
    {
        try {
            $filename = 'gallery/thumbnails/' . Str::random(40) . '.jpg';

            $image = $this->manager->read($imageUrl);

            // Get original dimensions
            $originalWidth = $image->width();
            $originalHeight = $image->height();

            // Calculate scaling
            $scaleX = $width / $originalWidth;
            $scaleY = $height / $originalHeight;
            $scale = max($scaleX, $scaleY);

            // Scale and crop
            $newWidth = (int)($originalWidth * $scale);
            $newHeight = (int)($originalHeight * $scale);

            $encodedImage = $image->resize($newWidth, $newHeight)
                          ->crop($width, $height, position: 'center')
                          ->encode(new JpegEncoder(75)); // Lower quality for thumbnails

            Storage::disk('public')->put($filename, $encodedImage);

            return asset('storage/' . $filename);

        } catch (\Exception $e) {
            Log::error('Thumbnail generation failed: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Clean up old processed images
     *
     * @param int $daysOld
     */
    public function cleanupOldImages($daysOld = 30)
    {
        $files = Storage::disk('public')->allFiles('gallery/processed');
        $cutoff = now()->subDays($daysOld);

        foreach ($files as $file) {
            $fileTime = Storage::disk('public')->lastModified($file);
            if ($fileTime < $cutoff->timestamp) {
                Storage::disk('public')->delete($file);
            }
        }
    }
}
