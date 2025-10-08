<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasDesa extends Model
{
    protected $table = 'fasilitas_desa';

    protected $fillable = [
        'nama_fasilitas',
        'kategori',
        'deskripsi',
        'alamat',
        'kondisi',
        'tahun_dibangun',
        'luas_bangunan',
        'luas_tanah',
        'status_kepemilikan',
        'fasilitas_yang_tersedia',
        'kapasitas',
        'pengelola',
        'foto',
        'koordinat',
        'is_active',
        'urutan'
    ];

    protected $casts = [
        'tahun_dibangun' => 'integer',
        'luas_bangunan' => 'decimal:2',
        'luas_tanah' => 'decimal:2',
        'kapasitas' => 'integer',
        'is_active' => 'boolean',
        'urutan' => 'integer'
    ];

    // Scope untuk fasilitas aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk kategori tertentu
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Scope untuk sorting berdasarkan created_at ascending
    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc');
    }
}
