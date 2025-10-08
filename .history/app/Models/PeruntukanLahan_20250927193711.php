<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeruntukanLahan extends Model
{
    protected $table = 'peruntukan_lahan';

    protected $fillable = [
        'kategori',
        'sub_kategori',
        'luas_hektar',
        'icon',
        'warna',
        'deskripsi',
        'is_active',
        'urutan'
    ];

    protected $casts = [
        'luas_hektar' => 'decimal:2',
        'is_active' => 'boolean',
        'urutan' => 'integer'
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
}
