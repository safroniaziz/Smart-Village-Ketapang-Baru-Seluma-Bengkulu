<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonografiDesa extends Model
{
    protected $table = 'monografi_desa';

    protected $fillable = [
        'nama_desa',
        'kode_desa',
        'nama_kecamatan',
        'nama_kabupaten',
        'nama_provinsi',
        'kode_pos',
        'kode_area',
        'tahun_pembentukan',
        'dasar_hukum',
        'tipologi_desa',
        'klasifikasi_desa',
        'kategori_desa',
        'luas_wilayah',
        'batas_utara',
        'batas_selatan',
        'batas_timur',
        'batas_barat',
        'orbitrasi_kecamatan',
        'orbitrasi_kabupaten',
        'orbitrasi_provinsi',
        'waktu_ke_kecamatan',
        'waktu_ke_kabupaten',
        'jumlah_penduduk',
        'jumlah_kk',
        'kepadatan_penduduk',
        'koordinat_kantor',
        'ketinggian_dpl',
        'google_street_view_url',
        'topografi_persentase'
    ];

    protected $casts = [
        'tahun_pembentukan' => 'integer',
        'luas_wilayah' => 'decimal:2',
        'orbitrasi_kecamatan' => 'decimal:1',
        'orbitrasi_kabupaten' => 'decimal:1',
        'orbitrasi_provinsi' => 'decimal:1',
        'waktu_ke_kecamatan' => 'decimal:1',
        'waktu_ke_kabupaten' => 'decimal:1',
        'jumlah_penduduk' => 'integer',
        'jumlah_kk' => 'integer',
        'kepadatan_penduduk' => 'decimal:2',
        'ketinggian_dpl' => 'integer',
        'topografi_persentase' => 'integer'
    ];
}
