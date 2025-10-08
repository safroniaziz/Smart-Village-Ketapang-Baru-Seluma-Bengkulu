<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PotensiWisata extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'potensi_wisata';

    protected $fillable = [
        'nama',
        'deskripsi',
        'lokasi',
        'gambar',
        'video_youtube',
        'thumbnail',
        'kategori_wisata',
        'fasilitas',
        'jam_operasional',
        'tiket_masuk',
        'kontak',
        'latitude',
        'longitude',
        'status_aktif',
        'urutan',
        'views'
    ];

    protected $casts = [
        'gambar' => 'array',
        'fasilitas' => 'array',
        'status_aktif' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'views' => 'integer',
        'urutan' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Scopes
    public function scopeAktif($query)
    {
        return $query->where('status_aktif', true);
    }

    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori_wisata', $kategori);
    }

    public function scopeUrutan($query)
    {
        return $query->orderBy('urutan', 'asc')->orderBy('created_at', 'desc');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('views', 'desc');
    }

    // Accessors
    public function getYoutubeEmbedUrlAttribute()
    {
        if (!$this->video_youtube) {
            return null;
        }

        // Extract YouTube ID from various URL formats
        $youtubeId = $this->extractYoutubeId($this->video_youtube);
        
        if ($youtubeId) {
            return "https://www.youtube.com/embed/{$youtubeId}?rel=0&showinfo=0&modestbranding=1";
        }

        return null;
    }

    public function getYoutubeThumbnailAttribute()
    {
        if (!$this->video_youtube) {
            return null;
        }

        $youtubeId = $this->extractYoutubeId($this->video_youtube);
        
        if ($youtubeId) {
            return "https://img.youtube.com/vi/{$youtubeId}/maxresdefault.jpg";
        }

        return null;
    }

    public function getKategoriLabelAttribute()
    {
        $labels = [
            'pantai' => '🏖️ Pantai',
            'gunung' => '🏔️ Gunung',
            'air_terjun' => '💧 Air Terjun',
            'budaya' => '🎭 Budaya',
            'kuliner' => '🍽️ Kuliner',
            'sejarah' => '🏛️ Sejarah',
            'religi' => '🕌 Religi',
            'alam' => '🌿 Alam',
            'adventure' => '🎯 Adventure'
        ];

        return $labels[$this->kategori_wisata] ?? '📍 ' . ucfirst($this->kategori_wisata);
    }

    public function getMainImageAttribute()
    {
        if ($this->thumbnail) {
            return $this->thumbnail;
        }

        if (is_array($this->gambar) && count($this->gambar) > 0) {
            return $this->gambar[0];
        }

        return asset('images/wisata/default-wisata.jpg');
    }

    public function getLocationUrlAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return "https://www.google.com/maps?q={$this->latitude},{$this->longitude}";
        }

        return null;
    }

    // Helper Methods
    public function incrementViews()
    {
        $this->increment('views');
        return $this;
    }

    private function extractYoutubeId($url)
    {
        // Handle different YouTube URL formats
        $patterns = [
            '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]+)/',
            '/^([a-zA-Z0-9_-]+)$/' // Direct ID
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    public function getFasilitasListAttribute()
    {
        if (!is_array($this->fasilitas)) {
            return [];
        }

        return $this->fasilitas;
    }

    public function getKategoriColorAttribute()
    {
        $colors = [
            'pantai' => 'blue',
            'gunung' => 'green',
            'air_terjun' => 'cyan',
            'budaya' => 'purple',
            'kuliner' => 'orange',
            'sejarah' => 'amber',
            'religi' => 'emerald',
            'alam' => 'lime',
            'adventure' => 'red'
        ];

        return $colors[$this->kategori_wisata] ?? 'gray';
    }

    // Static Methods
    public static function getKategoriOptions()
    {
        return [
            'pantai' => '🏖️ Pantai',
            'gunung' => '🏔️ Gunung', 
            'air_terjun' => '💧 Air Terjun',
            'budaya' => '🎭 Budaya',
            'kuliner' => '🍽️ Kuliner',
            'sejarah' => '🏛️ Sejarah',
            'religi' => '🕌 Religi',
            'alam' => '🌿 Alam',
            'adventure' => '🎯 Adventure'
        ];
    }

    public static function getFasilitasOptions()
    {
        return [
            'toilet' => '🚻 Toilet',
            'parkir' => '🅿️ Area Parkir',
            'mushola' => '🕌 Mushola',
            'warung' => '🍽️ Warung Makan',
            'gazebo' => '🏡 Gazebo',
            'wifi' => '📶 WiFi',
            'atm' => '🏧 ATM',
            'guide' => '👨‍🏫 Pemandu Wisata',
            'penginapan' => '🏨 Penginapan',
            'souvenir' => '🛍️ Toko Souvenir',
            'rescue' => '⛑️ Pos Rescue',
            'camping' => '⛺ Area Camping'
        ];
    }
}
