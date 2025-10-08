<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenerimaBantuan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penerima_bantuan';

    protected $fillable = [
        'warga_id',
        'program',
        'tahun',
        'nominal',
        'status',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'warga_id');
    }

    // Backward compatibility
    public function warga()
    {
        return $this->user();
    }
}


