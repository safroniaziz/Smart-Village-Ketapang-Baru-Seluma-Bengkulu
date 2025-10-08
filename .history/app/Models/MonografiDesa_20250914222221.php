<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonografiDesa extends Model
{
    protected $table = 'monografi_desa';

    protected $fillable = [
        'nama_desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'kode_area',
        'status_desa',
        'tahun_berdiri',
        'luas_wilayah',
        'ketinggian_mdpl',
        'topografi',
        'iklim',
        'suhu_rata_rata',
        'jarak_ke_kecamatan',
        'waktu_ke_kecamatan',
        'jarak_ke_kabupaten',
        'waktu_ke_kabupaten',
        'latitude',
        'longitude',
        'google_street_view_url',
        'deskripsi'
    ];

    protected $casts = [
        'tahun_berdiri' => 'integer',
        'luas_wilayah' => 'decimal:2',
        'ketinggian_mdpl' => 'integer',
        'jarak_ke_kecamatan' => 'decimal:2',
        'waktu_ke_kecamatan' => 'decimal:2',
        'jarak_ke_kabupaten' => 'decimal:2',
        'waktu_ke_kabupaten' => 'decimal:2',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7'
    ];
}
