<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiamondShape extends Model
{
    use HasFactory;

    protected $table = 'diamond_shapes';

    protected $fillable = [
        'name',
        'code',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeSearch($query, ?string $term)
    {
        return $term ? $query->where('name', 'like', "%{$term}%") : $query;
    }
}
