<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengaduanFollowup extends Model
{
    use HasFactory;

    protected $table = 'pengaduan_followups';

    protected $fillable = [
        'pengaduan_id',
        'status',
        'catatan',
        'petugas_id',
    ];
}


