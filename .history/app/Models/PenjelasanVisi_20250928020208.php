<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenjelasanVisi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penjelasan_visi';

    protected $fillable = [
        'judul',
        'deskripsi',
        'icon',
        'warna',
        'is_active',
        'urutan'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}
