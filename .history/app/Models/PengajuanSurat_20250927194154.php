<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengajuanSurat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pengajuan_surats';

    protected $fillable = [
        'user_id',
        'jenis_surat',
        'data_surat',
        'status',
        'submitted_at',
        'approved_at',
        'approved_by',
        'rejected_at',
        'rejected_by',
        'alasan_reject',
        'is_public'
    ];

    protected $casts = [
        'data_surat' => 'array',
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
        'is_public' => 'boolean'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik', 'nik');
    }

    // Scopes
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Accessors
    public function getWargaDataAttribute()
    {
        return $this->data_surat['warga_data'] ?? null;
    }

    public function getLampiranAttribute()
    {
        return $this->data_surat['lampiran'] ?? null;
    }
}


