<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    
    protected $fillable = [
        'nomor_tracking',
        'nama_lengkap',
        'nik',
        'email',
        'telepon',
        'alamat',
        'jenis_pengaduan',
        'prioritas',
        'judul',
        'deskripsi',
        'lokasi',
        'tanggal_kejadian',
        'lampiran',
        'anonim',
        'status',
        'catatan_petugas',
        'petugas',
        'tanggal_selesai'
    ];

    protected $casts = [
        'anonim' => 'boolean',
        'tanggal_selesai' => 'datetime',
    ];

    // Generate tracking number
    public static function generateTrackingNumber()
    {
        $prefix = 'PGD';
        $year = date('Y');
        $month = date('m');
        $lastPengaduan = self::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'desc')
            ->first();
        
        if ($lastPengaduan) {
            $lastNumber = (int) substr($lastPengaduan->nomor_tracking, -4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        
        return $prefix . $year . $month . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
}
