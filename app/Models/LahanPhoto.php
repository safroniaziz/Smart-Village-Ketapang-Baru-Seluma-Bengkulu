<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LahanPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'lahan_point_id',
        'path',
        'order_index',
    ];

    public function lahanPoint()
    {
        return $this->belongsTo(LahanPoint::class);
    }
}


