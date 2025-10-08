<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Pengumuman extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'excerpt',
        'penulis',
        'tanggal_publikasi',
        'tanggal_berakhir',
        'prioritas',
        'views',
        'published',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'datetime',
        'tanggal_berakhir' => 'datetime',
        'views' => 'integer',
        'published' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pengumuman) {
            if (empty($pengumuman->slug)) {
                $pengumuman->slug = Str::slug($pengumuman->judul);
            }
            if (empty($pengumuman->excerpt) && !empty($pengumuman->konten)) {
                $pengumuman->excerpt = Str::limit(strip_tags($pengumuman->konten), 150);
            }
            if (empty($pengumuman->tanggal_publikasi)) {
                $pengumuman->tanggal_publikasi = now();
            }
        });

        static::updating(function ($pengumuman) {
            if ($pengumuman->isDirty('judul')) {
                $pengumuman->slug = Str::slug($pengumuman->judul);
            }
            if ($pengumuman->isDirty('konten') && empty($pengumuman->excerpt)) {
                $pengumuman->excerpt = Str::limit(strip_tags($pengumuman->konten), 150);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('tanggal_publikasi', '<=', now())
                    ->where(function($q) {
                        $q->whereNull('tanggal_berakhir')
                          ->orWhere('tanggal_berakhir', '>=', now());
                    });
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeByPriority($query)
    {
        return $query->orderByRaw("FIELD(prioritas, 'tinggi', 'sedang', 'rendah')")
                    ->orderByDesc('tanggal_publikasi');
    }

    public function getFormattedDateAttribute()
    {
        return $this->tanggal_publikasi?->format('d F Y');
    }

    public function getFormattedEndDateAttribute()
    {
        return $this->tanggal_berakhir?->format('d F Y');
    }

    public function getIsExpiredAttribute()
    {
        return $this->tanggal_berakhir && $this->tanggal_berakhir->isPast();
    }

    public function getPriorityBadgeClassAttribute()
    {
        return match($this->prioritas) {
            'Tinggi' => 'badge-danger',
            'Sedang' => 'badge-warning',
            'Rendah' => 'badge-success',
            default => 'badge-secondary',
        };
    }
}
