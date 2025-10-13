<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotensiWisata extends Model
{
    use HasFactory;

    protected $table = 'potensi_wisata';

    protected $fillable = [
        'nama',
        'deskripsi',
        'lokasi',
        'aktivitas_wisata',
        'nomor_telepon',
        'whatsapp',
        'info_guide',
        'jam_buka',
        'harga_tiket',
        'fasilitas_parkir',
        'warung_makan',
        'fitur_unggulan',
        'kategori_wisata',
        'jam_operasional',
        'tiket_masuk',
        'kontak',
        'latitude',
        'longitude',
        'gambar',
        'video_youtube',
        'sumber_video',
        'file_potensi_desa',
        'views'
    ];

    protected $casts = [
        'gambar' => 'array', // [{"url":"", "judul":"", "keterangan":""}]
        'fitur_unggulan' => 'array', // [{"icon":"fas fa-leaf", "judul":"Alam Asri", "deskripsi":"..."}]
        'views' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
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

    public function getGambarAttribute($value)
    {
        if (is_null($value) || $value === '') {
            return [];
        }

        $decoded = json_decode($value, true);
        return is_array($decoded) ? $decoded : [];
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

    /**
     * Get category color for badge display
     */
    public function getCategoryColor()
    {
        $colors = [
            'pantai' => 'info',
            'gunung' => 'success',
            'air_terjun' => 'primary',
            'sejarah' => 'warning',
            'budaya' => 'secondary',
            'kuliner' => 'danger',
            'religi' => 'dark',
            'alam' => 'success',
            'adventure' => 'primary'
        ];

        return $colors[$this->kategori_wisata] ?? 'secondary';
    }

    /**
     * Get category label (readable name)
     */
    public function getCategoryLabel()
    {
        $labels = [
            'pantai' => 'Pantai',
            'gunung' => 'Gunung',
            'air_terjun' => 'Air Terjun',
            'sejarah' => 'Sejarah',
            'budaya' => 'Budaya',
            'kuliner' => 'Kuliner',
            'religi' => 'Religi',
            'alam' => 'Alam',
            'adventure' => 'Adventure'
        ];

        return $labels[$this->kategori_wisata] ?? 'Lainnya';
    }

    // Boot method to handle slug generation
    protected static function boot()
    {
        parent::boot();

        // Temporarily disabled slug generation (no slug column in current migration)
        // static::creating(function ($wisata) {
        //     if (empty($wisata->slug)) {
        //         $wisata->slug = $wisata->generateSlug($wisata->nama);
        //     }
        // });

        // static::updating(function ($wisata) {
        //     if ($wisata->isDirty('nama') && empty($wisata->slug)) {
        //         $wisata->slug = $wisata->generateSlug($wisata->nama);
        //     }
        // });
    }

    // Generate unique slug
    private function generateSlug($nama)
    {
        $slug = \Illuminate\Support\Str::slug($nama);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    // Route model binding by slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
