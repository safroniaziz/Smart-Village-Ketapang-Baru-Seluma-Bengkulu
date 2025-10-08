<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BatasWilayah extends Model
{
    use SoftDeletes;
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

    // Scope untuk sorting berdasarkan created_at ascending
    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc');
    }

    // Accessor untuk format jarak
    public function getJarakFormatAttribute()
    {
        return $this->jarak_km ? number_format($this->jarak_km, 1) . ' km' : null;
    }
}
