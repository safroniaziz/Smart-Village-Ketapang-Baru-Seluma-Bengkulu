<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kontak extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kontak';

    protected $fillable = [
        'nama_desa',
        'alamat',
        'kode_pos',
        'telepon',
        'email',
        'website',
        'kepala_desa',
        'sekretaris_desa',
        'bendahara_desa',
        'jam_operasional',
        'latitude',
        'longitude',
        'deskripsi',
        'aktif',
    ];

    protected $casts = [
        'jam_operasional' => 'array',
        'aktif' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kontak) {
            if (empty($kontak->nama_desa)) {
                $kontak->nama_desa = 'Desa Ketapang Baru';
            }
        });
    }

    // Scope untuk kontak aktif
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    // Accessor untuk jam operasional yang sudah diformat
    public function getJamOperasionalFormattedAttribute()
    {
        if (!$this->jam_operasional || !is_array($this->jam_operasional)) {
            return [];
        }

        $hari = [
            'senin' => 'Senin',
            'selasa' => 'Selasa',
            'rabu' => 'Rabu',
            'kamis' => 'Kamis',
            'jumat' => 'Jumat',
            'sabtu' => 'Sabtu',
            'minggu' => 'Minggu'
        ];

        $formatted = [];
        foreach ($this->jam_operasional as $key => $jam) {
            if ($jam && isset($hari[$key])) {
                $formatted[] = $hari[$key] . ': ' . $jam;
            }
        }

        return $formatted;
    }

    // Accessor untuk alamat lengkap
    public function getAlamatLengkapAttribute()
    {
        $alamat = $this->alamat;
        if ($this->kode_pos) {
            $alamat .= ', ' . $this->kode_pos;
        }
        return $alamat;
    }

    // Accessor untuk koordinat
    public function getKoordinatAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude . ', ' . $this->longitude;
        }
        return null;
    }

    // Method untuk mendapatkan kontak utama (yang pertama)
    public static function getKontakUtama()
    {
        return static::aktif()->first();
    }
}
