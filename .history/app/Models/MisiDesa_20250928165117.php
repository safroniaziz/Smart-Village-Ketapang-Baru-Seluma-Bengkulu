<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MisiDesa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'misi_desa';

    protected $fillable = [
        'judul',
        'deskripsi',
        'indikator'
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
