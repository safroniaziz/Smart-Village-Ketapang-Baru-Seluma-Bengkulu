<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PotensiDesa extends Model
{
    protected $table = 'potensi_desa';

    protected $fillable = [
        'kategori',
        'nama_potensi',
        'deskripsi',
        'nilai_ekonomi',
        'jumlah_unit',
        'satuan',
        'lokasi',
        'pengelola',
        'status',
        'icon',
        'foto',
        'peluang_pengembangan',
        'kendala',
        'is_unggulan',
        'urutan'
    ];

    protected $casts = [
        'nilai_ekonomi' => 'decimal:2',
        'jumlah_unit' => 'integer',
        'is_unggulan' => 'boolean',
        'urutan' => 'integer'
    ];

    // Scope untuk potensi unggulan
    public function scopeUnggulan($query)
    {
        return $query->where('is_unggulan', true);
    }

    // Scope untuk status aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk sorting berdasarkan created_at ascending
    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'asc');
    }

    // Accessor untuk format nilai ekonomi
    public function getNilaiEkonomiFormatAttribute()
    {
        return $this->nilai_ekonomi ? 'Rp ' . number_format($this->nilai_ekonomi, 0, ',', '.') : null;
    }
}
