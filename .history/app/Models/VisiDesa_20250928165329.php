<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisiDesa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'visi_desa';

    protected $fillable = [
        'visi',
        'deskripsi',
        'deskripsi_section',
        'pendekatan_deskripsi'
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc');
    }
}
