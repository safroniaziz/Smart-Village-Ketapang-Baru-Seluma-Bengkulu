<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BltDd extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_anggaran',
        'nama',
        'jenis_kelamin',
        'nik',
        'alamat',
        'no_rekening',
        'nominal_bantuan',
        'is_active'
    ];

    protected $casts = [
        'nominal_bantuan' => 'decimal:2',
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

    public function scopeLakiLaki($query)
    {
        return $query->where('jenis_kelamin', 'L');
    }

    public function scopePerempuan($query)
    {
        return $query->where('jenis_kelamin', 'P');
    }

    public function getFormattedNominalBantuanAttribute()
    {
        return $this->nominal_bantuan ? 'Rp ' . number_format($this->nominal_bantuan, 0, ',', '.') : '-';
    }

    public function getJenisKelaminLengkapAttribute()
    {
        return $this->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan';
    }
}
