<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengaduan extends Model
{
    use HasFactory, SoftDeletes;

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
        'asal_pelapor',
        'is_warga',
        'status',
        'catatan_petugas',
        'petugas',
        'tanggal_selesai'
    ];

    protected $casts = [
        'anonim' => 'boolean',
        'is_warga' => 'boolean',
        'tanggal_selesai' => 'datetime',
    ];

    // Generate tracking number
    public static function generateTrackingNumber(): string
    {
        $prefix = 'PGD';
        $yearMonth = date('Ym');
        $base = $prefix . $yearMonth;

        // Find the last nomor_tracking with the same prefix (based on nomor_tracking, not created_at)
        $lastTracking = self::where('nomor_tracking', 'like', $base . '%')
            ->orderBy('nomor_tracking', 'desc')
            ->value('nomor_tracking');

        $nextNumber = 1;
        if ($lastTracking) {
            $lastNumber = (int) substr($lastTracking, -4);
            $nextNumber = $lastNumber + 1;
        }

        // Ensure uniqueness in case of rare race condition
        do {
            $candidate = $base . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
            $exists = self::where('nomor_tracking', $candidate)->exists();
            if ($exists) {
                $nextNumber++;
            }
        } while ($exists);

        return $candidate;
    }
}
