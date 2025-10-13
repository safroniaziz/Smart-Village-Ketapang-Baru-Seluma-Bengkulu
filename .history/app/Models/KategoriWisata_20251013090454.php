<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KategoriWisata extends Model
{
    use HasFactory;

    protected $table = 'kategori_wisata';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'icon',
        'warna',
        'aktif',
        'urutan'
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'urutan' => 'integer'
    ];

    // Boot method to auto generate slug
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($kategori) {
            if (empty($kategori->slug)) {
                $kategori->slug = Str::slug($kategori->nama);
            }
        });

        static::updating(function ($kategori) {
            if ($kategori->isDirty('nama') && empty($kategori->slug)) {
                $kategori->slug = Str::slug($kategori->nama);
            }
        });
    }

    // Relationships
    public function potensiWisata()
    {
        return $this->hasMany(PotensiWisata::class, 'kategori_wisata_id');
    }

    // Scopes
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeUrutan($query)
    {
        return $query->orderBy('urutan', 'asc')->orderBy('nama', 'asc');
    }

    // Accessors
    public function getJumlahWisataAttribute()
    {
        return $this->potensiWisata()->count();
    }
}