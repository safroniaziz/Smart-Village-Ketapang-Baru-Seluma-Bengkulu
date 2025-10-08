<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class APBDes extends Model
{
    use HasFactory;

    protected $table = 'apbdes';

    protected $fillable = [
        'tahun_anggaran',
        'jenis_anggaran',
        'keterangan',
        'anggaran',
        'keterangan_detail',
        'is_active'
    ];

    protected $casts = [
        'anggaran' => 'decimal:2',
        'is_active' => 'boolean',
        'tahun_anggaran' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('tahun_anggaran', $year);
    }

    public function scopePendapatan($query)
    {
        return $query->where('jenis_anggaran', 'pendapatan');
    }

    public function scopeBelanja($query)
    {
        return $query->where('jenis_anggaran', 'belanja');
    }

    public function getFormattedAnggaranAttribute()
    {
        return 'Rp ' . number_format($this->anggaran, 0, ',', '.');
    }
}
