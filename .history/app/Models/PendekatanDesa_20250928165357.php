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
        'strategi'
    ];


    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc');
    }
}
