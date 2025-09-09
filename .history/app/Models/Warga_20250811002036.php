<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'rt_rw',
        'dusun',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'kewarganegaraan',
        'foto',
        'status_aktif'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date'
    ];

    public function surat()
    {
        return $this->hasMany(Surat::class, 'created_by');
    }

    public function getUmurAttribute()
    {
        return $this->tanggal_lahir->age;
    }

    public function getAlamatLengkapAttribute()
    {
        return "{$this->alamat}, RT/RW {$this->rt_rw}, {$this->desa}, {$this->kecamatan}, {$this->kabupaten}, {$this->provinsi}";
    }
}
