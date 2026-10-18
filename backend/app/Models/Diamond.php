<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diamond extends Model
{
    use HasFactory;

    protected $table = 'diamonds';

    protected $fillable = [
        'name',
        'sku',
        'carat',
        'cut',
        'color',
        'clarity',
        'price',
        'is_active',
    ];

    protected $casts = [
        'carat' => 'decimal:2',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function scopeSearch($query, ?string $term)
    {
        return $term ? $query->where('name', 'like', "%{$term}%") : $query;
    }
}
