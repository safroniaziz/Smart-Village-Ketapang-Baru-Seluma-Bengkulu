<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeruntukanLahan extends Model
{
    use SoftDeletes;
    protected $table = 'peruntukan_lahan';

    protected $fillable = [
        'kategori',
        'sub_kategori',
        'luas_hektar',
        'icon',
        'warna',
        'deskripsi',
        'urutan'
    ];

    protected $casts = [
        'luas_hektar' => 'decimal:2',
        'urutan' => 'integer'
    ];

    // Scope untuk data aktif

    // Scope untuk sorting berdasarkan created_at ascending
    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc');
    }
}
