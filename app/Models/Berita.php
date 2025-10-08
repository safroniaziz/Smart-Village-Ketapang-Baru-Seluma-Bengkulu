<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'excerpt',
        'gambar',
        'penulis',
        'tanggal_publikasi',
        'views',
        'featured',
        'published',
        'kategori',
        'read_time',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'datetime',
        'featured' => 'boolean',
        'published' => 'boolean',
        'views' => 'integer',
        'read_time' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
            if (empty($berita->excerpt) && !empty($berita->konten)) {
                $berita->excerpt = Str::limit(strip_tags($berita->konten), 150);
            }
            if (empty($berita->tanggal_publikasi)) {
                $berita->tanggal_publikasi = now();
            }
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('judul')) {
                $berita->slug = Str::slug($berita->judul);
            }
            if ($berita->isDirty('konten') && empty($berita->excerpt)) {
                $berita->excerpt = Str::limit(strip_tags($berita->konten), 150);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function getFormattedDateAttribute()
    {
        return $this->tanggal_publikasi?->format('d F Y');
    }

    public function getReadTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->konten));
        return ceil($words / 200); // Assuming 200 words per minute reading speed
    }
}
