<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanSurat extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_surats';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'no_hp',
        'alamat',
        'jenis_surat',
        'keperluan',
        'lampiran',
        'status',
    ];


}


