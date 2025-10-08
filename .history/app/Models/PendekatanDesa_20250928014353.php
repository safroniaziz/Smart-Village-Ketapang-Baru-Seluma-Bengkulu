<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendekatanDesa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pendekatan_desa';

    protected $fillable = [
        'nama_pendekatan',
        'deskripsi',
        'strategi',
        'icon',
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