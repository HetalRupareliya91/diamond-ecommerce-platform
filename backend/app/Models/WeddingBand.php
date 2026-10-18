<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingBand extends Model
{
    use HasFactory;

    protected $table = 'wedding_bands';

    protected $fillable = [
        'name',
        'sku',
        'width_mm',
        'price',
    ];

    protected $casts = [
        'width_mm' => 'decimal:2',
        'price' => 'decimal:2',
    ];

    public function scopeSearch($query, ?string $term)
    {
        return $term ? $query->where('name', 'like', "%{$term}%") : $query;
    }
}
