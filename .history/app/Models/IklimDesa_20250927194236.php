<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IklimDesa extends Model
{
    use SoftDeletes;
    protected $table = 'iklim_desa';

    protected $fillable = [
        'jenis_iklim',
        'suhu_min',
        'suhu_max',
        'kelembaban_rata',
        'curah_hujan_tahunan',
        'musim_kering',
        'musim_hujan',
        'karakteristik_iklim',
        'angin_dominan',
        'hari_hujan_pertahun',
        'is_active'
    ];

    protected $casts = [
        'suhu_min' => 'decimal:2',
        'suhu_max' => 'decimal:2',
        'kelembaban_rata' => 'decimal:2',
        'curah_hujan_tahunan' => 'integer',
        'hari_hujan_pertahun' => 'integer',
        'is_active' => 'boolean'
    ];

    // Accessor untuk format suhu
    public function getSuhuRangeAttribute()
    {
        return $this->suhu_min . '-' . $this->suhu_max . '°C';
    }

    // Scope untuk data aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
