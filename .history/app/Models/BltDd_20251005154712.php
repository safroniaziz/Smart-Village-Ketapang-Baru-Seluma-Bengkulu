<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BltDd extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'umur',
        'alamat',
        'jumlah_bantuan',
        'tahun',
        'keterangan'
    ];

    protected $casts = [
        'jumlah_bantuan' => 'decimal:2',
        'tahun' => 'integer',
        'umur' => 'integer'
    ];

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
