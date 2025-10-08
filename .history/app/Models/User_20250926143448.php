<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        // Warga fields
        'nik',
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
        'pendidikan',
        'mata_pencaharian',
        'kewarganegaraan',
        'foto',
        'status_aktif',
        'status',
        'is_kepala_keluarga',
        'status_rumah',
        'status_sosial',
        'kelayakan_rumah',
        'jumlah_jiwa_kk',
        'lat',
        'long',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'tanggal_lahir' => 'date',
            'status_aktif' => 'boolean',
            'is_kepala_keluarga' => 'boolean',
        ];
    }

    /**
     * Get bantuan untuk user ini
     */
    public function bantuan()
    {
        return $this->hasMany(\App\Models\PenerimaBantuan::class, 'warga_id');
    }

    /**
     * Get foto URL using FotoService
     */
    public function getFotoUrlAttribute(): string
    {
        $fotoService = new \App\Services\FotoService();
        return $fotoService->getFotoUrl($this->foto);
    }
}
