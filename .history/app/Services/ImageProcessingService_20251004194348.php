<?php

namespace App\Services;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\JpegEncoder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class ImageProcessingService
{
    protected $manager;
    protected $allowedMimes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
    protected $maxFileSize = 10 * 1024 * 1024; // 10MB

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());

        // Ensure storage directories exist
        $this->ensureDirectoriesExist();
    }

    /**
     * Process gallery image - crop to landscape aspect ratio (3:2)
     * Supports both URL sources and uploaded files
     *
     * @param string|UploadedFile $source
     * @param int $width
     * @param int $height
     * @return string|null
     */
    public function processGalleryImage($source, $width = 900, $height = 600)
    {
        try {
            // Create filename for processed image
            $filename = 'gallery/processed/' . Str::random(40) . '.jpg';

            // Read image from source (URL or uploaded file)
            $image = $this->readImageFromSource($source);

            if (!$image) {
                throw new \Exception('Failed to read image from source');
            }

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
     * Ensure required storage directories exist
     */
    protected function ensureDirectoriesExist()
    {
        $directories = [
            'gallery/processed',
            'gallery/thumbnails',
            'gallery/originals',
            'gallery/uploads'
        ];

        foreach ($directories as $dir) {
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
        }
    }

    /**
     * Read image from various sources (URL, UploadedFile, local path)
     *
     * @param string|UploadedFile $source
     * @return \Intervention\Image\Interfaces\ImageInterface|null
     */
    protected function readImageFromSource($source)
    {
        try {
            // Handle UploadedFile
            if ($source instanceof UploadedFile) {
                // Validate file
                if (!$this->validateUploadedFile($source)) {
                    throw new \Exception('Invalid uploaded file');
                }

                return $this->manager->read($source->getPathname());
            }

            // Handle URL or local path
            if (is_string($source)) {
                // Check if it's a URL
                if (filter_var($source, FILTER_VALIDATE_URL)) {
                    // Download and read from URL
                    $context = stream_context_create([
                        'http' => [
                            'timeout' => 30,
                            'user_agent' => 'Smart Village Image Processor/1.0'
                        ]
                    ]);

                    $imageData = file_get_contents($source, false, $context);
                    if ($imageData === false) {
                        throw new \Exception('Failed to download image from URL');
                    }

                    return $this->manager->read($imageData);
                } else {
                    // Local path
                    return $this->manager->read($source);
                }
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Failed to read image from source: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Validate uploaded file
     *
     * @param UploadedFile $file
     * @return bool
     */
    protected function validateUploadedFile(UploadedFile $file): bool
    {
        // Check file size
        if ($file->getSize() > $this->maxFileSize) {
            Log::error('File too large: ' . $file->getSize() . ' bytes');
            return false;
        }

        // Check mime type
        if (!in_array($file->getMimeType(), $this->allowedMimes)) {
            Log::error('Invalid mime type: ' . $file->getMimeType());
            return false;
        }

        return true;
    }

    /**
     * Store uploaded file to originals directory
     *
     * @param UploadedFile $file
     * @return string|null
     */
    public function storeOriginalFile(UploadedFile $file): ?string
    {
        try {
            if (!$this->validateUploadedFile($file)) {
                return null;
            }

            $filename = 'gallery/originals/' . Str::random(40) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public', $filename);

            return $path ? asset('storage/' . $filename) : null;
        } catch (\Exception $e) {
            Log::error('Failed to store original file: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Process gallery data with mixed sources (URLs and uploads)
     *
     * @param array $galleryData Format: [['source' => $url_or_file, 'judul' => '', 'keterangan' => '']]
     * @return array
     */
    public function processMixedGalleryData($galleryData)
    {
        $processedGallery = [];

        foreach ($galleryData as $index => $photo) {
            $source = $photo['source'] ?? $photo['url'] ?? null;

            if (!$source) {
                Log::warning("No source provided for gallery item {$index}");
                continue;
            }

            // Store original if it's an upload
            $originalUrl = null;
            if ($source instanceof UploadedFile) {
                $originalUrl = $this->storeOriginalFile($source);
            } else {
                $originalUrl = $source;
            }

            // Process image
            $processedUrl = $this->processGalleryImage($source);

            if ($processedUrl) {
                $processedGallery[] = [
                    'url' => $processedUrl,
                    'original_url' => $originalUrl,
                    'judul' => $photo['judul'] ?? null,
                    'keterangan' => $photo['keterangan'] ?? null,
                    'processed_at' => now()->toISOString(),
                ];
            }
        }

        return $processedGallery;
    }

    /**
     * Clean up old processed images
     *
     * @param int $daysOld
     */
    public function cleanupOldImages($daysOld = 30)
    {
        $directories = ['gallery/processed', 'gallery/thumbnails', 'gallery/originals'];
        $cutoff = now()->subDays($daysOld);

        foreach ($directories as $directory) {
            $files = Storage::disk('public')->allFiles($directory);

            foreach ($files as $file) {
                $fileTime = Storage::disk('public')->lastModified($file);
                if ($fileTime < $cutoff->timestamp) {
                    Storage::disk('public')->delete($file);
                    Log::info("Cleaned up old file: {$file}");
                }
            }
        }
    }
}
