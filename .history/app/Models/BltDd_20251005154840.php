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
        'nominal_bantuan'
    ];

    protected $casts = [
        'nominal_bantuan' => 'decimal:2',
        'tahun_anggaran' => 'integer'
    ];

    public function scopeByYear($query, $year)
    {
        return $query->where('tahun', $year);
    }

    public function scopeLakiLaki($query)
    {
        return $query->where('jenis_kelamin', 'L');
    }

    public function scopePerempuan($query)
    {
        return $query->where('jenis_kelamin', 'P');
    }

    public function getFormattedJumlahBantuanAttribute()
    {
        return $this->jumlah_bantuan ? 'Rp ' . number_format($this->jumlah_bantuan, 0, ',', '.') : '-';
    }

    public function getJenisKelaminLengkapAttribute()
    {
        return $this->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan';
    }
}
