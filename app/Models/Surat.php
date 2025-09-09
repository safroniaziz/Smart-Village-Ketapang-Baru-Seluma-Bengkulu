<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'jenis_surat',
        'tanggal_surat',
        'data_pemohon',
        'isi_surat',
        'status',
        'created_by',
        'approved_by',
        'tanggal_approval'
    ];

    protected $casts = [
        'data_pemohon' => 'array',
        'isi_surat' => 'array',
        'tanggal_surat' => 'date',
        'tanggal_approval' => 'date'
    ];

    public function pemohon()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
