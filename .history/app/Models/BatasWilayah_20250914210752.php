<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatasWilayah extends Model
{
    protected $table = 'batas_wilayah';

    protected $fillable = [
        'arah',
        'berbatasan_dengan',
        'jenis_wilayah',
        'jarak_km',
        'landmark',
        'koordinat',
        'keterangan',
        'is_active'
    ];

    protected $casts = [
        'jarak_km' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    // Scope untuk data aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk sorting berdasarkan arah (Utara, Timur, Selatan, Barat)
    public function scopeOrdered($query)
    {
        return $query->orderByRaw("FIELD(arah, 'utara', 'timur', 'selatan', 'barat')");
    }

    // Accessor untuk format jarak
    public function getJarakFormatAttribute()
    {
        return $this->jarak_km ? number_format($this->jarak_km, 1) . ' km' : null;
    }
}
