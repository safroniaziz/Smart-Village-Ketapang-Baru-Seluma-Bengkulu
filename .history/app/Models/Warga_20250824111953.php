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
        'status'
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

    ## **Daftar Singkatan yang Dikoreksi** 📝
    
    ### **Status Rumah** (2 pilihan):
    - **MS** - Milik Sendiri
    - **SW** - Sewa
    
    ### **Status Sosial** (4 pilihan, termasuk ME):
    - **ME** - Menumpang
    - **MSK** - Miskin
    - **RM** - Rentan Miskin
    - **MK** - Mampu/Kaya
    
    ### **Kelayakan Rumah** (5 pilihan):
    - **TLH** - Tidak Layak Huni
    - **LH** - Layak Huni
    - **SP** - Sangat Perlu
    - **P** - Perlu
    - **M** - Mampu
    
    ### **Mata Pencaharian** (5 pilihan):
    - **PTN** - Petani
    - **SWT** - Swasta
    - **PNS** - PNS
    - **NLY** - Nelayan
    - **LN** - Lainnya
    
    ### **Jenis Bantuan** (9 pilihan):
    - **PKH** - Program bantuan keluarga
    - **PBI** - Program bantuan iuran
    - **BPD** - BPJS Daerah
    - **BPM** - BPJS Mandiri
    - **SBK** - Sembako
    - **BBM** - BLT BBM
    - **PPK** - BPMT PPKM
    - **BST** - Bantuan Sosial Tunai
    - **COV** - BLT COVID
    
    ### **Pendidikan** (8 tingkat):
    - **TS** - Tidak Sekolah
    - **SD** - SD
    - **SMP** - SLTP/SMP
    - **SMA** - SLTA/SMA
    - **DIP** - Diploma
    - **S1** - Sarjana
    - **S2** - Magister
    - **S3** - Doktor
    
    ## **Update Model Accessor** 🔧
    ```php
    // Update accessor untuk status rumah (hanya 2 pilihan)
    public function getStatusRumahDisplayAttribute()
    {
        $labels = [
            'MS' => 'Milik Sendiri',
            'SW' => 'Sewa'
        ];
        return $labels[$this->status_rumah] ?? $this->status_rumah;
    }
    
    // Status sosial sekarang include ME
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
    ```
}
