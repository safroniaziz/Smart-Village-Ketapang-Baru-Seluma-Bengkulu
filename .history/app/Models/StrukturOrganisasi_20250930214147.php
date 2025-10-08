<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasi extends Model
{
    use SoftDeletes;

    protected $table = 'struktur_organisasi';

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'tugas',
        'wewenang',
        'parent_id',
        'urutan',
        'kategori',
        'level',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'urutan' => 'integer',
        'tugas' => 'array',
        'wewenang' => 'array',
    ];

    protected $dates = [
        'deleted_at',
    ];

    /**
     * Relationship: Parent (Atasan)
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(StrukturOrganisasi::class, 'parent_id');
    }

    /**
     * Relationship: Children (Bawahan)
     */
    public function children(): HasMany
    {
        return $this->hasMany(StrukturOrganisasi::class, 'parent_id')->orderBy('urutan');
    }

    /**
     * Accessor: Get full foto URL
     */
    public function getFotoUrlAttribute(): string
    {
        if ($this->foto) {
            return Storage::url($this->foto);
        }
        return asset('images/struktur/default-person.png');
    }

    /**
     * Accessor: Get formatted tugas as string
     */
    public function getTugasFormattedAttribute(): string
    {
        if (is_array($this->tugas)) {
            return implode(', ', $this->tugas);
        }
        return $this->tugas ?: '';
    }

    /**
     * Accessor: Get formatted wewenang as string
     */
    public function getWewenangFormattedAttribute(): string
    {
        if (is_array($this->wewenang)) {
            return implode(', ', $this->wewenang);
        }
        return $this->wewenang ?: '';
    }

    /**
     * Scope: Only active records
     */
    public function scopeActive($query)
    {
        return $query->where('aktif', true);
    }

    /**
     * Scope: By category (pemerintahan/bpd)
     */
    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    /**
     * Scope: Root level (no parent)
     */
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope: Ordered by urutan
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan');
    }

    /**
     * Helper: Get level badge
     */
    public function getLevelBadgeAttribute(): string
    {
        $badges = [
            'kepala' => '👑',
            'wakil' => '🤝',
            'sekretaris' => '📋',
            'kasi_kaur' => '⚙️',
            'kadus' => '🏘️',
            'anggota' => '👤',
        ];

        return $badges[$this->level] ?? '👤';
    }

    /**
     * Helper: Get category badge
     */
    public function getCategoryBadgeAttribute(): string
    {
        return $this->kategori === 'bpd' ? '⚖️' : '🏛️';
    }

    /**
     * Helper: Check if has children
     */
    public function hasChildren(): bool
    {
        return $this->children()->count() > 0;
    }

    /**
     * Helper: Get all descendants
     */
    public function getAllChildren()
    {
        $children = collect();

        foreach ($this->children as $child) {
            $children->push($child);
            $children = $children->merge($child->getAllChildren());
        }

        return $children;
    }

    /**
     * Boot method for model events
     */
    protected static function boot()
    {
        parent::boot();

        // Set default urutan when creating
        static::creating(function ($model) {
            if (!$model->urutan) {
                $maxUrutan = static::where('kategori', $model->kategori)
                    ->where('parent_id', $model->parent_id)
                    ->max('urutan');
                $model->urutan = $maxUrutan + 1;
            }
        });

        // Delete foto when model is force deleted
        static::forceDeleted(function ($model) {
            if ($model->foto && Storage::exists($model->foto)) {
                Storage::delete($model->foto);
            }
        });
    }
}
