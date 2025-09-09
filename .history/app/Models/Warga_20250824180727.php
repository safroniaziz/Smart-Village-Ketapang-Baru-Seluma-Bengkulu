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
        'no_kk',
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
        'pendidikan',
        'kewarganegaraan',
        'foto',
        'status_aktif',
        'status',
        'status_rumah',
        'status_sosial',
        'kelayakan_rumah',
        'mata_pencaharian',
        'jumlah_jiwa_kk'
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

    public function getStatusRumahDisplayAttribute()
    {
        $labels = [
            'MS' => 'Milik Sendiri',
            'SW' => 'Sewa'
        ];
        return $labels[$this->status_rumah] ?? $this->status_rumah;
    }

    public function getStatusSosialDisplayAttribute()
    {
        $labels = [
            'ME' => 'Menumpang',
            'MSK' => 'Miskin',
            'RM' => 'Rentan Miskin',
            'MK' => 'Mampu/Kaya'
        ];
        return $labels[$this->status_sosial] ?? $this->status_sosial;
    }

    public function getKelayakanRumahDisplayAttribute()
    {
        $labels = [
            'TLH' => 'Tidak Layak Huni',
            'LH' => 'Layak Huni',
            'SP' => 'Sangat Perlu',
            'P' => 'Perlu',
            'M' => 'Mampu'
        ];
        return $labels[$this->kelayakan_rumah] ?? $this->kelayakan_rumah;
    }

    public function getMataPencarianDisplayAttribute()
    {
        $labels = [
            'PTN' => 'Petani',
            'SWT' => 'Swasta',
            'PNS' => 'PNS',
            'NLY' => 'Nelayan',
            'LN' => 'Lainnya'
        ];
        return $labels[$this->mata_pencaharian] ?? $this->mata_pencaharian;
    }

    public function getPendidikanDisplayAttribute()
    {
        $labels = [
            'TS' => 'Tidak Sekolah',
            'SD' => 'SD',
            'SMP' => 'SLTP/SMP',
            'SMA' => 'SLTA/SMA',
            'DIP' => 'Diploma',
            'S1' => 'Sarjana',
            'S2' => 'Magister',
            'S3' => 'Doktor'
        ];
        return $labels[$this->pendidikan] ?? $this->pendidikan;
    }
}
