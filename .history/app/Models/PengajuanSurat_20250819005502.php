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

    public static function generateTrackingNumber(): string
    {
        $prefix = 'SRT';
        $yearMonth = date('Ym');
        $base = $prefix . $yearMonth;
        $last = self::where('nomor_tracking', 'like', $base.'%')
            ->orderBy('nomor_tracking', 'desc')
            ->value('nomor_tracking');
        $next = 1;
        if ($last) {
            $next = (int) substr($last, -4) + 1;
        }
        do {
            $candidate = $base . str_pad($next, 4, '0', STR_PAD_LEFT);
            $exists = self::where('nomor_tracking', $candidate)->exists();
            if ($exists) { $next++; }
        } while ($exists);
        return $candidate;
    }
}


