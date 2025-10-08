<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaguEarmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_anggaran',
        'kegiatan',
        'satuan',
        'jumlah_pagu',
        'keterangan'
    ];

    protected $casts = [
        'jumlah_pagu' => 'decimal:2',
        'tahun_anggaran' => 'integer'
    ];

    public function scopeByYear($query, $year)
    {
        return $query->where('tahun_anggaran', $year);
    }

    public function getFormattedJumlahPaguAttribute()
    {
        return 'Rp ' . number_format($this->jumlah_pagu, 0, ',', '.');
    }
}
