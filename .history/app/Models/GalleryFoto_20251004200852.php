<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryFoto extends Model
{
    use HasFactory;

    protected $table = 'gallery_foto';

    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'url_foto',
        'alt_text',
        'urutan',
        'status_aktif',
        'is_hero',
        'views',
        'photographer',
        'tanggal_foto'
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
        'is_hero' => 'boolean',
        'urutan' => 'integer',
        'views' => 'integer',
        'tanggal_foto' => 'date',
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
        return $query->where('kategori', $kategori);
    }

    public function scopeUrutan($query)
    {
        return $query->orderBy('urutan', 'asc')->orderBy('created_at', 'desc');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('views', 'desc');
    }

    // Static methods untuk kategori
    public static function getKategoriList()
    {
        return [
            'pantai' => 'Pantai Ancol Seluma',
            'makanan_khas' => 'Makanan Khas',
            'seni_budaya' => 'Seni & Budaya',
            'kerajinan' => 'Kerajinan Lokal',
            'festival' => 'Festival & Acara',
            'pemandangan' => 'Pemandangan Alam',
            'aktivitas' => 'Aktivitas Wisata'
        ];
    }

    public static function getKategoriOptions()
    {
        return collect(self::getKategoriList())->map(function ($label, $value) {
            return [
                'value' => $value,
                'label' => $label
            ];
        })->values();
    }

    // Accessor
    public function getKategoriLabelAttribute()
    {
        $kategoriList = self::getKategoriList();
        return $kategoriList[$this->kategori] ?? ucfirst(str_replace('_', ' ', $this->kategori));
    }

    // Mutator
    public function setKategoriAttribute($value)
    {
        $this->attributes['kategori'] = strtolower(str_replace(' ', '_', $value));
    }

    // Helper methods
    public function incrementViews()
    {
        $this->increment('views');
    }
}
