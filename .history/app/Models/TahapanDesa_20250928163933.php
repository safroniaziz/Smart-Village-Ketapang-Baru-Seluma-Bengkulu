<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahapanDesa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tahapan_desa';

    protected $fillable = [
        'nama_tahapan',
        'deskripsi',
        'kegiatan',
        'waktu',
        'is_active'
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
        return $query->orderBy('created_at', 'asc');
    }
}
